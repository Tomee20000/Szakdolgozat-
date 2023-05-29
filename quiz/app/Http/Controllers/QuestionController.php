<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('questions.index',[
            'users_count' => \App\Models\User::count(),
            'categories_count' => \App\Models\Category::count(),
            'questions' => Question::all(),
            'categories' => \App\Models\Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {


        Session::flash('question_answered');

        return view('questions.edit',[
            'question' => $question,
            'questions' => \App\Models\Question::all(),
            'categories' => \App\Models\Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $validated = $request->validate(
            [
                'firstquestion' => 'required|in:1,2,3,4' ,
                'secondquestion1' => 'nullable',
                'secondquestion2' => 'nullable',
                'secondquestion3' => 'nullable',
                'thirdquestion' => 'required|in:1,2,3' ,
                'memories' => 'required|min:10',
                'impressions' => 'required|min:10',
            ]
        );

        // Post adatainak frissítése

        if(isset($validated['secondquestion1'])){
            if ($validated['secondquestion1'] == "on"){
                $validated['secondquestion1'] = 1;
            }
        }else{
            $validated['secondquestion1']=0;
        }
        if(isset($validated['secondquestion2'])){
            if ($validated['secondquestion2'] == "on"){
                $validated['secondquestion2'] = 1;
            }
        }else{
            $validated['secondquestion2']=0;
        }
        if(isset($validated['secondquestion3'])){
            if ($validated['secondquestion3'] == "on"){
                $validated['secondquestion3'] = 1;
            }
        }else{
            $validated['secondquestion3']=0;
        }

        $question->question2_1 = $validated['secondquestion1'];
        $question->question2_2 = $validated['secondquestion2'];
        $question->question2_3 = $validated['secondquestion3'];
        $question->question1_points = $validated['firstquestion'];
        $question->question3_points = $validated['thirdquestion'];
        $question->question4_text = $validated['memories'];
        $question->question5_text = $validated['impressions'];
        $question->question2_points = $question->question2_1 + $question->question2_2 + $question->question2_3;
        $question->sum = $question->question1_points + $question->question2_points + $question->question3_points;
        $question->done = true;
        $question->save();


        $c1 = 0;
        $c2 = 0;
        $c3 = 0;
        $done = true;
        $questions = Question::all();

        foreach ($questions as $question) {
            echo "ads";
            if ($question->user == Auth::user()){
                if ($question->category->id === 1){
                    $c1 += $question->sum;
                }
                else if ($question->category->id === 2){
                    $c2 += $question->sum;
                }
                else if ($question->category->id === 3){
                    $c3 += $question->sum;
                }
                $done = $done && $question->done;
            }
        }

        Auth::user()->category1_points = $c1;
        Auth::user()->category2_points = $c2;
        Auth::user()->category3_points = $c3;
        Auth::user()->done = $done;

        Auth::user()->save();

        Session::flash('question_answered');


        return Redirect::route('questions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
