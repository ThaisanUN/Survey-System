<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Question;
use Validator;
use Auth;
use App\User;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $resource = User::findOrFail($user->id)->answer;
        return response()->json($resource, 200);
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
    public function store(Request $request, $questionID)
    {
        $rules = [
            'answer' => 'required|string'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $user = Auth::user();
        $question = Question::find($questionID);
        if (!$question){
            return response()->json(["message" => "question not found"], 404);
        }
        if($question->user_id == $user->id){
            $survey = Answer::create([
                "user_id" => $user->id,
                "survey_id" => $question->survey_id,
                "question_id" => $questionID,
                "answer" => $request->answer
            ]);
            return response()->json(["message" => "answer created", "resource" => $survey], 201);
        }
        else {
            return response()->json(["message" => "unauthorize user"], 401);
        }
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        $rules = [
            'answer' => 'required|string'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $user = Auth::user();
        $resource = Answer::find($id);
        if (!$resource){
            return response()->json(["message" => "answer not found"], 404);
        }
        if ($resource->user_id == $user->id){
            $resource->update([
                "answer" => $request->answer
            ]);
            return response()->json(["message" => "updated", "resource" => $resource], 200);
        }
        else {
            return response()->json(["message" => "unauthorize user"], 401);
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
        $user = Auth::user();
        $resource = Answer::findOrFail($id);
        if ($resource->user_id == $user->id){
            $resource->delete();
            return response()->json(["message" => "deleted", "resource" => $resource], 200);
        }
        else {
            return response()->json(["message" => "unauthorize user"], 401);
        }
    }
}
