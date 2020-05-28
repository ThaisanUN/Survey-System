<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SurveyAPI;
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
    public function index()
    {
        $user = Auth::user();
        // $resource = SurveyAPI::findOrFail($user->id);
        $resource = User::findOrFail($user->id)->survey;
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
        $survey = SurveyAPI::create([
            "user_id" => $user->id,
            "title" => $request->title,
            "description" => $request->description
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
            return response()->json($resource, 200);
        }
        else {
            return response()->json(["message" => "unauthorize user"]);
        }
        // $updateData = $request->validate([
        //     'name' => 'required|max:255',
        //     'email' => 'required|max:255',
        //     'phone' => 'required|numeric',
        //     'password' => 'required|max:255',
        // ]);
        // Student::whereId($id)->update($updateData);
        // return redirect('/students')->with('completed', 'Student has been updated');

        // $poll->update($request->all());
        
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
