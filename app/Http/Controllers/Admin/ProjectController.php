<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $projectsArray = Project::all();

        // dd($projectsArray);

        return view('admin.projects.index', compact('projectsArray'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProjectRequest $request)
    {

        $projectData = $request->all();

        // dd($projectData);

        $newProject = new Project();
        $newProject->fill($projectData);
        $newProject->slug = Str::slug($newProject->name, '_');
        $newProject->save();

        return redirect()->route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {

        // dd($project);

        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {

        $projectData = $request->all();

        // dd($projectData);
        
        $project->update($projectData);
        $project->slug = Str::slug($project->name, '_');
        $project->save();

        return redirect()->route('admin.projects.index', ['project' => $project->slug]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
