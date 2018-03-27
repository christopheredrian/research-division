<?php

namespace App\Http\Controllers\Admin;

use App\Http\GoogleDriveUtilities;
use App\Http\NLPUtilities;
use App\Ordinance;
use App\Questionnaire;
use App\Question;
use App\Value;
use App\StatusReport;
use App\UpdateReport;
use Carbon\Carbon;
use Facebook\Facebook;
use GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\File;
use Mockery\Exception;

class OrdinancesController extends Controller
{
    const RR = 'RR';
    const ordinanceColumns = [
        'number',
        'series',
        'title',
        'keywords',
    ];

    public function validateData($request)
    {
        if ($request->has('is_accepting')) {
            $validatedData = $request->validate([
                'number' => 'required|numeric',
                'series' => 'required|numeric|digits:4',
                'title' => 'required|string',
                'keywords' => 'required|string',
                'is_monitoring' => '',
                'is_accepting' => '',
                'pdf' => '',
                'status_report_date' => '',
                'summary' => '',
                'status' => '',
                'legislative_action' => '',
                'updates' => '',
            ]);
        } else {
            $validatedData = $request->validate([
                'number' => 'required|numeric',
                'series' => 'required|numeric|digits:4',
                'title' => 'required|string',
                'keywords' => 'required|string',
                'is_monitoring' => '',
                'pdf' => '',
                'status_report_date' => '',
                'summary' => '',
                'status' => '',
                'legislative_action' => '',
                'updates' => '',
            ]);
        }

        return $validatedData;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = 5;
        $colName = $request->colName;
        $order = $request->order;

        // Check if there is a provided column to be sorted
        if (!$colName) {
            $colName = 'created_at';
        }

        // Check if there is a provided order
        if (!$order) {
            $order = 'desc';
        }

        if ($request->q) {
            $q = $request->q;
            $ordinances = Ordinance::where(function ($query) use ($q) {
                $query->where('keywords', 'LIKE', '%' . $q . '%')
                    ->orWhere('number', 'LIKE', '%' . $q . '%')
                    ->orWhere('series', 'LIKE', '%' . $q . '%')
                    ->orWhere('title', 'LIKE', '%' . $q . '%');
            })->where(function ($query) {
                $query->where('is_monitoring', 0);
            });
        } else {
            $ordinances = Ordinance::where('is_monitoring', 0);
        }

        // Filtering by columns
        if ($request->has('col-number') || $request->has('col-series') || $request->has('col-title') || $request->has('col-keywords')) {
            $ordinances = $ordinances->where('number', 'LIKE', '%' . $request->input('col-number') . '%')
                ->where('keywords', 'LIKE', '%' . $request->input('col-keywords') . '%')
                ->where('series', 'LIKE', '%' . $request->input('col-series') . '%')
                ->where('title', 'LIKE', '%' . $request->input('col-title') . '%');
        }
        // Implement filtering / sorting
        $ordinances = $ordinances->orderBy($colName, $order);

        // Paginate with filters
        $ordinances = $ordinances->paginate($limit)->appends($request->all());

        return view('admin.ordinances.index', [
            'ordinances' => $ordinances,
            'type' => OrdinancesController::RR,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ordinances.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Check if request has 'is_accepting'
        $validatedData = $this->validateData($request);
        $file = $request->file('pdf');

        $ordinance = new Ordinance();
        $ordinance->fill($validatedData);
        $ordinance->save();
        $ordinance->pdf_file_path =
            $request->has('pdf') ? GoogleDriveUtilities::upload($ordinance, $file, 'ordinances') : '';
        $ordinance->pdf_file_name = $ordinance->pdf_file_path === "" ? "" :
            substr($ordinance->pdf_file_path, strrpos($ordinance->pdf_file_path, '/') + 1);
        $ordinance->save();

        Session::flash('flash_message', "Successfully added <strong> Ordinance " . $ordinance->number . "</strong>!");

        // POST TO FACEBOOK
        if (NLPUtilities::isNLPEnabled() and $request->fbpost) {
            app('App\Http\Controllers\Admin\FacebookPostsController')->postToPage($ordinance);
        }

        $redirectLink = $ordinance->is_monitoring == 1 ? '/admin/forms/ordinances' : '/admin/ordinances';

        return redirect($redirectLink);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ordinance = Ordinance::findOrFail($id);
        $questionnaire = Questionnaire::where('ordinance_id', $id)->first();
        $variables = [
            'ordinance' => $ordinance,
            'questionnaire' => $questionnaire,
            'flag' => FormsController::ORDINANCES,
        ];

        if (NLPUtilities::isNLPEnabled()) {
            $variables['facebook_comments'] = app('App\Http\Controllers\Admin\FacebookPostsController')->getComments($ordinance);
            $variables['isNLPEnabled'] = 1;

            if($ordinance->facebook_post_id !== null){
                $variables['positive_count'] = 0;
                $variables['negative_count'] = 0;
                $variables['neutral_count'] = 0;

                foreach ($variables['facebook_comments'] as $facebook_comment) {
                    if($facebook_comment['result']->sentiment === 'positive'){
                        $variables['positive_count']++;
                    } elseif ($facebook_comment['result']->sentiment === 'negative') {
                        $variables['negative_count']++;
                    } else {
                        $variables['neutral_count']++;
                    }
                }
            }
        }

        return view('admin.ordinances.show', $variables);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ordinance = Ordinance::findOrFail($id);

        return view('admin.ordinances.edit', [
            'ordinance' => $ordinance,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $this->validateData($request);
        $file = $request->file('pdf');

        $ordinance = Ordinance::find($id);
        $ordinance->update($validatedData);
        $ordinance->pdf_file_path =
            $request->has('pdf') ? GoogleDriveUtilities::upload($ordinance, $file, 'ordinances') : $ordinance->pdf_file_path;
        $ordinance->pdf_file_name = $ordinance->pdf_file_path === "" ? "" :
            substr($ordinance->pdf_file_path, strrpos($ordinance->pdf_file_path, '/') + 1);
        $ordinance->save();

        if (NLPUtilities::isNLPEnabled() and $request->fbpost) {
            app('App\Http\Controllers\Admin\FacebookPostsController')->postToPage($ordinance);
        }

        Session::flash('flash_message', "Successfully updated <strong>Ordinance " . $ordinance->number . "</strong>!");

        if ($ordinance->is_monitored) {
            $redirectLink = '/admin/forms/ordinances?status=monitored';
        } elseif ($ordinance->is_monitoring) {
            $redirectLink = '/admin/forms/ordinances';
        } else {
            $redirectLink = '/admin/ordinances';
        }

        return redirect($redirectLink);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ordinance::destroy($id);
        Session::flash('flash_message', "Delete Successful!");

//        return redirect('/admin/ordinances');
        return back();
    }

    public function softDelete($id)
    {
        $ordinance = Ordinance::findOrFail($id);
        $ordinance->deleted_at = Carbon::now();
        $ordinance->save();

        Session::flash('flash_message', 'Successfully deleted Ordinance ' . $ordinance->number . ' series of ' . $ordinance->series);

        return back();
    }

    public function statusReportCreate($ordinanceID)
    {
        $ordinance = Ordinance::findOrFail($ordinanceID);

        return view('admin.ordinances.uploadStatusReport', [
            'ordinance' => $ordinance,
        ]);

    }

    public function updateReportCreate($ordinanceID)
    {
        $ordinance = Ordinance::findOrFail($ordinanceID);

        return view('admin.ordinances.uploadUpdateReport', [
            'ordinance' => $ordinance,
        ]);
    }

    public function storeStatusReport(Request $request)
    {
        $validatedData = $request->validate([
            'ordinance_id' => '',
            'pdf' => 'required|file',
        ]);

        // Check if there is existing Status Report
        if (Ordinance::findOrFail($validatedData['ordinance_id'])->statusReport !== null) {
            $statusReport = Ordinance::findOrFail($validatedData['ordinance_id'])->statusReport;
        } else {
            $statusReport = new StatusReport();
        }

        $file = $request->file('pdf');

        // Store Status Report
        $statusReport->ordinance_id = $validatedData['ordinance_id'];
        $statusReport->save();
        $statusReport->pdf_file_path = GoogleDriveUtilities::upload($statusReport, $file, 'statusreports');
        $statusReport->pdf_file_name = substr($statusReport->pdf_file_path,
            strrpos($statusReport->pdf_file_path, '/') + 1);
        $statusReport->save();

        $ordinance = Ordinance::find($validatedData['ordinance_id']);

        $questionnaire = $ordinance->getQuestionnaire();
        $questionnaire->isAccepting = 0;
        $questionnaire->save();

        $ordinance->is_accepting = 0;
        $ordinance->is_monitored = 1;
        $ordinance->save();

        Session::flash('flash_message',
            "Successfully uploaded status report for <strong> Ordinance " . $statusReport->ordinance->number . "</strong>!");

        return redirect('/admin/ordinances/' . $statusReport->ordinance_id);
    }

    public function storeUpdateReport(Request $request)
    {
        $validatedData = $request->validate([
            'ordinance_id' => '',
            'pdf' => 'required|file',
        ]);

        $file = $request->file('pdf');
        $updateReport = new UpdateReport();

        // Store Update Report
        $updateReport->ordinance_id = $validatedData['ordinance_id'];
        $updateReport->save();
        $updateReport->pdf_file_path = GoogleDriveUtilities::upload($updateReport, $file, 'updatereports');
        $updateReport->pdf_file_name = substr($updateReport->pdf_file_path, strrpos($updateReport->pdf_file_path, '/') + 1);
        $updateReport->save();

        Session::flash('flash_message',
            "Successfully uploaded update report for<strong> Ordinance " . $updateReport->ordinance->number . "</strong>!");

        return redirect('/admin/ordinances/' . $updateReport->ordinance_id);
    }

    public function preview($id)
    {
        $questionnaire = Questionnaire::Where('ordinance_id', '=', $id)->first();
        $questions = Question::Where('questionnaire_id', '=', $questionnaire->id)->get();
        $values = Value::WhereIn('question_id', $questions->pluck('id'))->get();
        $required = false;
        $ordinance = Ordinance::Where('id', '=', $id)->first();

        return view('admin.ordinances.preview',
            ['questionnaire' => $questionnaire],
            ['questions' => $questions])
            ->with('values', $values)
            ->with('required', $required)
            ->with('ordinance', $ordinance);
    }
}
