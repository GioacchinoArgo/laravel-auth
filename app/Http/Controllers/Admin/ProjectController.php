<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderByDesc('updated_at')->orderByDesc('created_at')->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $project = new Project();
        return view('admin.projects.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $request->validate([
            'title' => 'required|string|min:5|max:20|unique:projects',
            'content' => 'required|string',
        ], 
        [
            'title.required' => 'Il titolo è obbligatorio',
            'title.min' => 'Il titolo deve essere almeno :min caratteri',
            'title.max' => 'Il titolo deve essere di massimo :max caratteri',
            'title.unique' => 'Esiste già un progetto con questo titolo',
            'content.required' => 'La descrizione del progetto è obbligatoria'
        ]);

        $data = $request->all();

        $project = new Project();

        $project->fill($data);
        $project->slug = Str::slug($project->title);

        $project->save();

        return to_route('admin.projects.show', $project)->with('message', 'Progetto creato con successo')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
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
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:5', 'max:20', Rule::unique('projects')->ignore($project->id)],
            'content' => 'required|string',
        ], 
        [
            'title.required' => 'Il titolo è obbligatorio',
            'title.min' => 'Il titolo deve essere almeno :min caratteri',
            'title.max' => 'Il titolo deve essere di massimo :max caratteri',
            'title.unique' => 'Esiste già un progetto con questo titolo',
            'content.required' => 'La descrizione del progetto è obbligatoria'
        ]);
        $data = $request->all();

        $project->fill($data);
        $project->slug = Str::slug($project->title);
        $project->save();

        return to_route('admin.projects.show', $project)->with('message', 'Progetto creato con successo')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return to_route('admin.projects.index')->with('type', 'success')->with('message', 'Progetto eliminato con successo');
    }
}
