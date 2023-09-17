<?php

namespace App\Http\Controllers;

use App\Models\student;
use domain\Facades\StudentFacade;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentController extends Controller
{
    protected $task;

    public function __construct()
    {
        $this->task = new student();
    }

    public function index()
    {
        // $response['tasks'] = $this->task->all();
        // return Inertia::render('Student/index')->with($response);
        $response['tasks'] = StudentFacade::all();
        //$response['tasks'] = $this->task->where('status', 1)->get();
        return Inertia::render('Student/index')->with($response);
    }
}
