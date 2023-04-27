<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Technology;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();

        $data = [
            'projects' => $projects
        ];
        return view('projects.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::orderBy('name', 'asc')->get();
        $technologies = Technology::orderBy('name', 'asc')->get();


        return view('projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'unique:projects,title|max:150|required',
            'description' => 'string|nullable',
            'slug' => 'string|required',
            'project_image' => 'string|nullable',
            'project_id' => 'nullable|exists:types,id',
            'technologies' => 'nullable|exists:technologies,id'
        ]);
        $project = Project::create($data);

        if (isset($data['technologies'])) {
            $project->technologies()->attach($data['technologies']);
        }

        return to_route('projects.show', $project);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $types = Type::orderBy('name', 'asc')->get();
        $technologies = Technology::orderBy('name', 'asc')->get();
        return view('projects.edit', compact('project', 'types','technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
         $data = $request->all();
         $project->title = $data['title'];
         $project->slug = $data['slug'];
         $project->description = $data['description'];
         $project->project_image = $data['project_image'];
         $project->save();

         if ($data['title'] !== $project->title) {
            $data['slug'] = Str::slug($data['title']);
        }

        $project->update($data);

        if (isset($data['technologies'])) {
            $project->technologies()->sync($data['technologies']);
        } else {
            $project->technologies()->sync([]);
        }
         return to_route('projects.index', $project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return to_route('projects.index');
    }
}
