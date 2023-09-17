<?php

namespace App\Http\Controllers;

use App\Models\student;
use domain\Facades\HomeFacade;
use domain\Facades\StudentFacade;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends ParentController
{

    public function index()
    {
        $response['tasks'] = HomeFacade::all();
        return Inertia::render('Dashboard/index')->with($response);;
    }

    public function updateView($task_id)
    {
        $task =  HomeFacade::updateView($task_id);
        return Inertia::render('Dashboard/update', ['task' => $task,]);
    }

    public function addNew()
    {
        return Inertia::render('Dashboard/add');
    }

    //  Crud Functions.................................................................

    public function store(Request $request)
    {
        $request->validate([
            'nic' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'birth_date' => 'required|date',
        ]);

        StudentFacade::store($request->all());
    }


    public function delete($task_id)
    {
        return StudentFacade::delete($task_id);
    }

    public function update(Request $request)
    {
        return StudentFacade::update($request->all());
    }

    public function setActive($task_id)
    {
        return StudentFacade::setActive($task_id);
    }

    public function setInactive($task_id)
    {
        return StudentFacade::setInactive($task_id);
    }
}
