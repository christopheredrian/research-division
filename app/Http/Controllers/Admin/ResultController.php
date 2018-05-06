<?php

namespace App\Http\Controllers\Admin;

use App\Http\NLPUtilities;
use App\Ordinance;
use App\Questionnaire;
use App\Resolution;
use App\Suggestion;
use App\Response;
use DB;
use App\Answer;
use App\Question;
use Facebook\Exceptions\FacebookResponseException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

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

        if ($questionnaire->ordinance_id !== null) {
            $ordinance = Ordinance::find($questionnaire->ordinance_id);
            return view('admin.result.show')
                ->with('questionnaire', $questionnaire)
                ->with('legislation', $ordinance);
        } else {
            $resolution = Resolution::find($questionnaire->resolution_id);
            return view('admin.result.show')
                ->with('questionnaire', $questionnaire)
                ->with('legislation', $resolution);
        }

//        return view('admin.result.show')
//        ->with('questionnaire', $questionnaire);
    }

    public function downloadExcel($id)
    {
        try {
            $questionnaire = Questionnaire::find($id);
            if ($questionnaire->ordinance_id !== null) {
                $ordinance = Ordinance::find($questionnaire->ordinance_id);
//                $file_name = str_replace('.', '', $ordinance->title);
//                $file_name = str_replace(' ','_', $file_name);
                $file_name = "Sanguniang Panlungsod Ordinance number " .$ordinance->number . " of series " . $ordinance->series;
            } else {
                $resolution = Resolution::find($questionnaire->resolution_id);
                $file_name = "Sanguniang Panlungsod Resolution number " . $resolution->number . " of series " . $resolution->series;
            }

            Excel::create($file_name, function ($excel) use ($id) {
                $excel->sheet('Excel sheet', function ($sheet) use ($id) {
                    $questions_arr = [];
                    $answers_arr = [];
                    $count = 0;
                    $space = 5; // will appear first on A[number], will appear on A4
                    $skip = $space + 1; //answers will append after the question
                    $questionnaire = Questionnaire::find($id);
                    foreach ($questionnaire->questions as $question) {
                        $questions_arr[] = $question->question;
                        foreach ($question->answers as $answer) {
                            $answers_arr[$count][] = $answer->answer;// 0:
                        }
                        $count += 1;
                    }

                    $sheet->setOrientation('landscape');

                    if ($questionnaire->ordinance_id !== null) {
                        $ordinance = Ordinance::find($questionnaire->ordinance_id);
                        $heading = "Answers to Ordinance number " .$ordinance->number . " of series " . $ordinance->series . " Questionnaire ";
                    } else {
                        $resolution = Resolution::find($questionnaire->resolution_id);
                        $heading = "Answers to Resolution number " . $resolution->number . " of series " . $resolution->series . " Questionnaire ";
                    }
                    $sheet->rows(array(
                        array('Republic of the Philippines', 'Republic of the Philippines'),
                        array('Sangguniang Panglungsod ng Baguio', 'Sangguniang Panglungsod ng Baguio'),
                        array('Research Division ', 'Research Division'),
                        array($heading, $heading),
                    ));

                    // filling arrays with data ^
                    $sheet->appendRow($space, $questions_arr);

                    $rows = [];
                    for ($x = 0; $x < count($answers_arr); $x++) {
                        for ($y = 0; $y < count($answers_arr[$x]); $y++) {
                            $rows[$y][$x] = $answers_arr[$x][$y];
                        }
                    }

                    foreach ($rows as $row) {
                        $sheet->appendRow($skip,$row);
                        $skip++;
                    }



                    $sheet->mergeCells('A1:B1');
                    $sheet->mergeCells('A2:B2');
                    $sheet->mergeCells('A3:B3');
                    $sheet->mergeCells('A4:B4');

                    $sheet->cells('A1:B1', function($cells) {
                        $cells->setAlignment('center');
                        $cells->setValignment('center');
                    });

                    $sheet->cells('A2:B2', function($cells) {
                        $cells->setAlignment('center');
                        $cells->setValignment('center');
                    });

                    $sheet->cells('A3:B3', function($cells) {
                        $cells->setAlignment('center');
                        $cells->setValignment('center');
                    });

                    $sheet->cells('A4:B4', function($cells) {
                        $cells->setAlignment('center');
                        $cells->setValignment('center');
                    });



//                    $sheet->setHeight(array(
//                        1     =>  50,
//                        2     =>  25,
//                        3     =>  50
//                    ));

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

    public function showComments($id, $flag, Request $request){
        if($flag=='ordinances'){
            $ordinance = Ordinance::find($id);
            $legislation_number = $ordinance->number;
            $series = $ordinance->series;
            $suggestions = $ordinance->suggestions;
        }else{
            $resolution = Resolution::find($id);
            $legislation_number = $resolution->number;
            $series = $resolution->series;
            $suggestions = $resolution->suggestions;
        }

        // Get sentiments of system comments
        foreach ($suggestions as $suggestion) {
            $temp_sentences[] = $suggestion->suggestion;
        }

        $sentiments = NLPUtilities::getSentiments($temp_sentences);
        $suggestions_with_sentiments = $suggestions->toArray();

        for($i = 0; $i < count($suggestions_with_sentiments); $i++) {
            $suggestions_with_sentiments[$i]['sentiment'] = $sentiments[$i]->sentiment;
        }

        $suggestions_with_sentiments = collect($suggestions_with_sentiments);

        // Get sentiments of Facebook comments
        if (NLPUtilities::isNLPEnabled()) {
            try{
                if($flag=='ordinances'){
                    $facebook_comments = app('App\Http\Controllers\Admin\FacebookPostsController')->getComments($ordinance);
                } else {
                    $facebook_comments = app('App\Http\Controllers\Admin\FacebookPostsController')->getComments($resolution);
                }
            } catch(FacebookResponseException $e) {
                if($flag=='ordinances'){
                    $ordinance->facebook_post_id = null;
                    $ordinance->save();
                } else {
                    $resolution->facebook_post_id = null;
                    $resolution->save();
                }

                $facebook_comments = [];
            }

            $isNLPEnabled = 1;
        }

        return view('admin.result.showComments', [
            'suggestions' => $suggestions_with_sentiments,
            'facebook_comments' => $facebook_comments,
            'isNLPEnabled'=> $isNLPEnabled,
            'pass_id' => $id,
            'flag' => $flag,
            'series' => $series,
            'legislation_number' => $legislation_number,
        ]);

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

    public function deleteComment($id)
    {

        if(DB::table('ordinance_suggestion')->where('suggestion_id', '=', $id)->first() != null){
            DB::table('ordinance_suggestion')->where('suggestion_id', '=', $id)->delete();
        }else{
            DB::table('resolution_suggestion')->where('suggestion_id', '=', $id)->delete();
        }

        Suggestion::destroy($id);
        return response()->json(['id'=>$id]);
    }

    public function downloadCommentsExcel($id,$flag)
    {
        // file name to ordinance num

        try {
            if($flag ==='ordinances'){
                $ordinance = Ordinance::find($id);
                $file_name = 'ordinance no.'.$ordinance->number.', '.$ordinance->series.' - comments';
            }else{
                $resolution = Resolution::find($id);
                $file_name = 'resolution no.'.$resolution->number.', '.$resolution->series.' - comments';
            }

            Excel::create($file_name, function ($excel) use ($id,$flag) {
                $excel->sheet('Excel sheet', function ($sheet) use ($id,$flag) {
                    if($flag==='ordinances'){
                        $ordinance = Ordinance::find($id);
                        $suggestions = $ordinance->suggestions;
                    }else{
                        $resolution = Resolution::find($id);
                        $suggestions = $resolution->suggestions;
                    }
                    $header_arr=['name','email','suggestion'];
                    $name_arr = [];
                    $email_arr = [];
                    $suggestion_arr = [];
                    $count = 0;
                    $space = 5; // will appear first on A[number], will appear on A4
                    $skip = $space + 1; //answers will append after the question
                    foreach ( $suggestions as $suggestion) {
                        $name_arr[$count] = $suggestion->first_name.' '.$suggestion->last_name;
                        $email_arr[] = $suggestion->email ;
                        $suggestion_arr[] = $suggestion->suggestion;
                        $count += 1;
                    }

                    $sheet->setOrientation('landscape');

                    if ($flag==='ordinances') {
                        $ordinance = Ordinance::find($id);
                        $heading = "Comments on Ordinance number " . $ordinance->number . " of series " . $ordinance->series;
                    } else {
                        $resolution = Resolution::find($id);
                        $heading = "Comments on Resolution number " . $resolution->number . " of series " . $resolution->series;
                    }

                    $sheet->rows(array(
                        array('Republic of the Philippines', 'Republic of the Philippines'),
                        array('Sangguniang Panglungsod ng Baguio', 'Sangguniang Panglungsod ng Baguio'),
                        array('Research Division ', 'Research Division'),
                        array($heading, $heading),
                    ));


                    $sheet->mergeCells('A1:C1');
                    $sheet->mergeCells('A2:C2');
                    $sheet->mergeCells('A3:C3');
                    $sheet->mergeCells('A4:C4');

                    $sheet->cells('A1:C1', function($cells) {
                        $cells->setAlignment('center');
                        $cells->setValignment('center');
                    });

                    $sheet->cells('A2:C2', function($cells) {
                        $cells->setAlignment('center');
                        $cells->setValignment('center');
                    });

                    $sheet->cells('A3:C3', function($cells) {
                        $cells->setAlignment('center');
                        $cells->setValignment('center');
                    });

                    $sheet->cells('A4:C4', function($cells) {
                        $cells->setAlignment('center');
                        $cells->setValignment('center');
                    });


                    // filling arrays with data ^
                    $sheet->appendRow($space, $header_arr);
//                    $rows = [];
                    for ($x = 0; $x < $count; $x++) {
                        $sheet->appendRow([$name_arr[$x],$email_arr[$x],$suggestion_arr[$x]]);
                    }

//                    foreach ($rows as $row) {
//                        $sheet->appendRow($row);
//                    }

                });
            })->export('xls');
        } catch (\Exception $e) {
            dd('Invalid query....');
        }

    }

    public function notifications()
    {
        $suggestions = Suggestion::Where('created_at','>', Carbon::now()->subDays(4))->OrderByDesc('created_at')->get();
        $responses = Response::Where('created_at','>', Carbon::now()->subDays(4))->OrderByDesc('created_at')->get();

        $data = [
            'suggestions' => $suggestions,
            'responses' => $responses
        ];

        return view('admin.result.notifications', $data);

    }
}
