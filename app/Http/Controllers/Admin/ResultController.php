<?php

namespace App\Http\Controllers\Admin;

use App\Ordinance;
use App\Questionnaire;
use App\Suggestion;
use DB;
use App\Answer;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Psy\Exception\ErrorException;

class ResultController extends Controller
{
    //
    public function index()
    {
        return view('admin.result.show');
    }// no data passed


    public function show($id)
    {
        // NOTE: An alternative for the above query
        $questionnaire = Questionnaire::find($id);
        $allQuestions = $questionnaire->questions;


        return view('admin.result.show')
            ->with('questionnaire', $questionnaire);
    }

    public function downloadExcel($id)
    {
        // file name to ordinance num

        try {
            $questionnaire = Questionnaire::find($id);
            $file_name = $questionnaire->name;
            Excel::create($file_name, function ($excel) use ($id) {
                $excel->sheet('Excel sheet', function ($sheet) use ($id) {
                    $questions_arr = [];
                    $answers_arr = [];
                    $count = 0;
                    $questionnaire = Questionnaire::find($id);
                    foreach ($questionnaire->questions as $question) {
                        $questions_arr[] = $question->question;
                        foreach ($question->answers as $answer) {
                            $answers_arr[$count][] = $answer->answer;// 0:
                        }
                        $count += 1;
                    }
                    // filling arrays with data ^
                    $sheet->appendRow($questions_arr);
                    $rows = [];
                    for ($x = 0; $x < count($answers_arr); $x++) {
                        for ($y = 0; $y < count($answers_arr[$x]); $y++) {
                            $rows[$y][$x] = $answers_arr[$x][$y];
                        }
                    }

                    foreach ($rows as $row) {
                        $sheet->appendRow($row);
                    }

                    $sheet->setOrientation('landscape');

                });
            })->export('xls');
        } catch (\Exception $e) {
            dd('Invalid query....');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::Where('id','=',Answer::find($id)->question_id)->first();
        Answer::destroy($id);
        return response()->json(['id'=>$id]);
//        return redirect('/admin/result/'.$question->questionnaire_id);
    }

    public function updateAnswer(Request $request)
    {
        $this->validate($request, [
            'value' => 'bail|required'
        ]);
        $answer = Answer::find($request->pk);
        $answer->answer = $request->value;
        $answer->save();

        return response()->json(['success'=>'done']);

    }

    public function updateComment(Request $request)
    {
        $this->validate($request, [
            'value' => 'bail|required'
        ]);
        $suggestion = Suggestion::find($request->pk);
        $suggestion->suggestion = $request->value;
        $suggestion->save();

        return response()->json(['success'=>'done']);

    }

    public function showComments($id, Request $request){
        $ordinance = Ordinance::find($id);
        $suggestions = $ordinance->suggestions;
//        if ($request->from && $request->to){
////            dd(date($request->to));
//            $from = new Carbon($request->from);
//            $to = new Carbon($request->to);
//            $to->addDay();
//
//            $logs = $suggestions->where('created_at', '<=', $to->toDateString())
//                ->where('created_at', '>', $from->toDateString())
//                ->orderBy('id','desc')
//                ->paginate(15);
//        } else{
//            $logs=$suggestions->orderBy('id', 'desc')->paginate(15);
//        }
        return view('admin.result.showComments', [
            'suggestions' => $suggestions,
            'ordinance_id' => $id
        ]);
    }

    public function deleteComment($id)
    {
        DB::table('ordinance_suggestion')->where('suggestion_id', '=', $id)->delete();
        Suggestion::destroy($id);
        return response()->json(['id'=>$id]);
    }

    public function downloadCommentsExcel($id)
    {
        // file name to ordinance num

        try {
            $ordinance = Ordinance::find($id);
            $suggestions = $ordinance->suggestions;
            $file_name = 'ordinance no.'.$ordinance->number.', '.$ordinance->series.' - comments';
            Excel::create($file_name, function ($excel) use ($id) {
                $excel->sheet('Excel sheet', function ($sheet) use ($id) {
                    $ordinance = Ordinance::find($id);
                    $suggestions = $ordinance->suggestions;
                    $header_arr=['name','email','suggestion'];
                    $name_arr = [];
                    $email_arr = [];
                    $suggestion_arr = [];
                    $count = 0;
                    foreach ( $suggestions as $suggestion) {
                        $name_arr[$count] = $suggestion->first_name.' '.$suggestion->last_name;
                        $email_arr[] = $suggestion->email ;
                        $suggestion_arr[] = $suggestion->suggestion;
                        $count += 1;
                    }
                    // filling arrays with data ^
                    $sheet->appendRow($header_arr);
//                    $rows = [];
                    for ($x = 0; $x < $count; $x++) {
                        $sheet->appendRow([$name_arr[$x],$email_arr[$x],$suggestion_arr[$x]]);
                    }

//                    foreach ($rows as $row) {
//                        $sheet->appendRow($row);
//                    }

                    $sheet->setOrientation('landscape');

                });
            })->export('xls');
        } catch (\Exception $e) {
            dd('Invalid query....');
        }

    }
}
