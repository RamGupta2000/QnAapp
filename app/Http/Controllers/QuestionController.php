<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\DB;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\Questions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\Console\Question\Question;

class QuestionController extends Controller
{

    // protected $user;

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetch($lang)
    {
        try {
            $category = Categories::where('category_id', $lang)->firstOrFail();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Category_id does not exist'], 500);
        }


        $user_email = Auth::user()->email;
        $ques = Questions::where('question_cat_id', $lang)->latest()->get();
        $response = [
            'success' => true,
            'data' => $ques,
            'email' => $user_email,
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
        try {
            $category = Categories::where('category_id', $request->ques_cat_id)->firstOrFail();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Category_id does not exist'], 500);
        }

        $user_email = Auth::user()->email;

        $task = Questions::create([
            'question_title' => $request->title,
            'question_desc' => $request->description,
            'question_cat_id' => $request->ques_cat_id,
            'question_email' => $user_email,
        ]);

        return response()->json(['message' => 'Task created successfully', 'task' => $task], 201);
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
    public function destroy($question_id)
    {
        try {
            $answer = Questions::findOrFail($question_id);
            $answer->delete();
            return response()->json(['message' => 'Question deleted successfully.'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Question_id not found.'], 404);
        }
    }
}