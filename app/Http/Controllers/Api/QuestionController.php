<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use Validator;
use Auth;
use App\User;
use App\Models\SurveyAPI;

class QuestionController extends Controller
{
    public function getByUser($id){
        return response()->json(User::find($id)->question);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $resource = User::findOrFail($user->id)->question;
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
    public function store(Request $request, $surveyID)
    {
        $rules = [
            'question' => 'required|string',
            'type' => 'in:check,free'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $user = Auth::user();
        $survey = SurveyAPI::find($surveyID);
        if (!$survey){
            return response()->json(["message" => "survey not found"], 404);
        }
        else {
            if ($survey->user_id == $user->id){
                $question = Question::create([
                    "user_id" => $user->id,
                    "question" => $request->question,
                    "type" => $request->type,
                    "survey_id" => $surveyID
                ]);
                return response()->json(["message" => "question stored", "resource" => $question], 201);
            }
            else{
                return response()->json(["message" => "unauthorize user"], 401);
            }
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
            'question' => 'required|string',
            'type' => 'required|in:check,free'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $user = Auth::user();
        $question = Question::find($id);
        if (!$question){
            return response()->json(["message" => "survey not found"], 404);
        }
        else {
            if ($question->user_id == $user->id){
                $question->update([
                    "question" => $request->question,
                    "type" => $request->type
                ]);
                return response()->json(["message" => "question updated", "resource" => $question], 200);
            }
            else{
                return response()->json(["message" => "unauthorize user"], 401);
            }
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
        $resource = Question::findOrFail($id);
        if ($resource->user_id == $user->id){
            $resource->delete();
            return response()->json(["message" => "deleted", "resource" => $resource], 200);
        }
        else {
            return response()->json(["message" => "unauthorize user"], 401);
        }
    }
}
