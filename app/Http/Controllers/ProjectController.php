<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Project;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $project = Department::with(['project'])  // Certifique-se de que o nome do relacionamento está correto. Pode ser 'projects' se um departamento tiver múltiplos projetos.
            ->where('name', $request->name)
            ->first();

        // Certifique-se de retornar uma chave apropriada e o objeto correto.
        return Inertia::render('Project/Project', ['department' => $project]);
    }

    // public function indexFinancial()
    // {
    //     $financial = Department::where('name', 'financial');
    //     return Inertia::render('Financial/Financial', ['department' => $financial]);
    // }

    // public function indexDevelopment()
    // {
    //     $development = Department::where('name', 'development');
    //     return Inertia::render('Development/Development', ['department' => $development]);
    // }

    // public function indexSelling()
    // {
    //     $selling = Department::where('name', 'selling');
    //     return Inertia::render('Selling/Selling', ['department' => $selling]);
    // }

    // public function indexMarketing()
    // {
    //     $marketing = Department::where('name', 'marketing');
    //     return Inertia::render('Marketing/Marketing', ['department' => $marketing]);
    // }

    // public function indexAttendance()
    // {
    //     $attendance = Department::where('name', 'attendance');
    //     return Inertia::render('Attendance/Attendance', ['department' => $attendance]);
    // }

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
        //
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
    public function destroy(Project $project)
    {
        //
    }
}
