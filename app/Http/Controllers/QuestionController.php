<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Questions;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{

    protected $user;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            $this->user = Auth::user();

            return $next($request);
        });
    }


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
        // This will check if the user is authenticated
        // if (!Auth::check()) {
        //     return response()->json(['message' => 'Unauthorized'], 401);
        // }

        // $user_email = $this->user->email;
        // $user_email = $request->user()->email;
        $user_email = Auth::user()->email;

        $task = Questions::create([
            'question_title' => $request->title,
            'question_desc' => $request->description,
            'question_cat_id' => $request->ques_cat_id,
            'question_email' => $user_email,
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