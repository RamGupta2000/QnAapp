<?php

namespace App\Http\Controllers;

use App\Models\Questions;
use App\Models\Answers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AnswerController extends Controller
{

    public function fetch($lang)
    {
        try {
            $category = Questions::where('question_id', $lang)->firstOrFail();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Question_id does not exist'], 500);
        }


        $user_email = Auth::user()->email;
        $ques = Answers::where('ans_que_id', $lang)->latest()->get();
        $response = [
            'success' => true,
            'data' => $ques,
            'email' => $user_email,
        ];
        return response()->json($response, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $answer_question_id)
    {

        try {
            $question = Questions::where('question_id', $answer_question_id)->firstOrFail();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Question_id does not exist'], 500);
        }

        $user_email = Auth::user()->email;
        $task = Answers::create([
            'ans' => $request->ans,
            'ans_que_id' => $answer_question_id,
            'ans_email' => $user_email,
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
    public function destroy($ans_id)
    {
        try {
            $answer = Answers::findOrFail($ans_id);
            $answer->delete();
            return response()->json(['message' => 'Answer deleted successfully.'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Answer_id not found.'], 404);
        }
    }
}