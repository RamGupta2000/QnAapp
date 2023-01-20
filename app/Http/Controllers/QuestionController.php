<?php

namespace App\Http\Controllers;

// use App\Models\Categories;
// use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Questions;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{

    // public function 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetch($lang)
    {
        $ques = Questions::where('question_cat_id', $lang)->get();
        $response = [
            'success' => true,
            'data' => $ques,
        ];
        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $user_id = Auth::user()->id;
        // $user = $request->user()->id;
        // dd($user_id);

        $task = Questions::create([
            'question_title' => $request->title,
            'question_desc' => $request->description,
            'question_cat_id' => $request->ques_cat_id,
            // 'question_user_id' => $user_id
        ]);

        return response()->json(['message' => 'Task created successfully', 'task' => $task], 201);




        // $ques = new Questions();
        // $ques->question_title = $request->title;
        // $ques->question_desc = $request->description;
        // $ques->question_user_id = $user;
        // $ques->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}