<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SurveyAPI;
use App\Models\Question;
use Validator;
use Auth;
use App\User;

class SurveyApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Display survey by user
    public function index()
    {
        $user = Auth::user();
        $resource = User::findOrFail($user->id)->survey;
        return response()->json($resource, 200);
    }

    // Display survey with question by survey id
    public function getSurFtQue($survey_id){
        $user = Auth::user();
        if(!$user){
            return response()->json(["message" => "unauthorize user"], 401);
        }
        $survey = SurveyAPI::find($survey_id);
        if (!$survey){
            return response()->json(["message" => "survey not found"], 404);
        }
        if ($survey->user_id == $user->id){
            $question = SurveyAPI::find($survey_id)->question;
            if (!$question){
                return response()->json(["message" => "found survey only", "survey" => $survey], 200);
            }
            else {
                return response()->json(["message" => "found survey with question", 
                    "survey" => $survey, 
                    "question" => $question], 200);
            }
        }
    }

    // Display survey with ans

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    function generate_string($strength = 6) {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $input_length = strlen($permitted_chars);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            $random_character = $permitted_chars[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
     
        return $random_string;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|string',
            'description' => 'nullable|string'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $user = Auth::user();
        $survey_code = $this->generate_string();
        // return response()->json($survey_code);
        $survey = SurveyAPI::create([
            "user_id" => $user->id,
            "title" => $request->title,
            "description" => $request->description,
            "survey_code" => $survey_code
        ]);
        return response()->json($survey, 201);
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
            'title' => 'string|max:255',
            'description' => 'nullable|string'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $user = Auth::user();
        $resource = SurveyAPI::findOrFail($id);
        if ($resource->user_id == $user->id){
            $resource->update([
                "title" => $request->title,
                "description" => $request->description
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
        $resource = SurveyAPI::findOrFail($id);
        if ($resource->user_id == $user->id){
            $resource->delete();
            return response()->json(["message" => "deleted", "resource" => $resource], 200);
        }
        else {
            return response()->json(["message" => "unauthorize user"], 401);
        }
    }

    // Get survey with question by code 
    public function getSurFtQueByCode($q=''){
        dd($survey_code);
        $survey = SurveyAPI::where('survey_code', '=', $survey_code);
        dd($survey);
        if (!$survey){
            return response()->json(["message" => "survey not found"], 404);
        }
        if ($survey){
            $question = SurveyAPI::find($survey->id)->question;
            if (!$question){
                return response()->json(["message" => "found survey only", "survey" => $survey], 200);
            }
            else {
                return response()->json(["message" => "found survey with question", 
                    "survey" => $survey, 
                    "question" => $question], 200);
            }
        }
    }
}
