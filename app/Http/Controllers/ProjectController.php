<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Project;
use App\Models\Task;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $departments = Department::with(['projects.user:id,name', 'projects.tasks'])
            ->where('name', $request->name)
            ->get();

        if ($departments->isEmpty()) {
            return redirect()->back()->with('error', 'Departamento não encontrado.');
        }

        $departmentData = $departments->map(function ($department) {
            return [
                'department' => $department,
                'projects' => $department->projects->map(function ($project) {
                    return [
                        'project' => $project,
                        'tasks' => $project->tasks,
                        'totalTasks' => $project->tasks->count(),
                        'finishedTasks' => $project->tasks->where('is_finished', 1)->count(),
                    ];
                })
            ];
        });

        return Inertia::render('Project/Project', [
            'departments' => $departmentData
        ]);
    }

    /**
     * Show the form for creating a new resource.   
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $project = new Project();

        try {
            $project->title = $request->title;
            $project->description = $request->description;
            $project->start_date = $request->start_date;
            $project->end_date = $request->end_date;
            $project->is_finished = false;
            $project->department_id = $request->department_id;
            $project->user_id = Auth::id();
            $project->save();
            return redirect()->back();
        } catch (Exception $e) {
            return response()->json('Erro ao salvar: ' . $e, 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request): JsonResponse
    {
        $project =  Project::where('id', $request->project_id)->delete();
        return response()->json($project, 200);
    }
}
