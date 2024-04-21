<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::get();
        return response()->json(['projects' => $projects]);
    }


    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        $project = new Project();
        $project->name = $request->name;
        $project->description = $request->description;
        $project->save();
        return response()->json(['status' => "success"]);
    }


    public function show($id)
    {
        $project = Project::find($id);
        return response()->json(['project' => $project]);
    }


    public function update(Request $request, $id)
    {
        request()->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        $project = Project::find($id);
        $project->name = $request->name;
        $project->description = $request->description;
        $project->save();
        return response()->json(['status' => "success"]);
    }

 
    public function destroy($id)
    {
        Project::destroy($id);
        return response()->json(['status' => "success"]);
    }
}