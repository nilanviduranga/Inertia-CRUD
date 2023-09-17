<?php

namespace domain\Services;

use App\Models\student;

class StudentService
{
    protected $task;
    public function __construct()
    {
        $this->task = new student();
    }

    public function all()
    {
        return $this->task->where('status', 1)->get();
    }

    public function setActive($task_id)
    {
        $task = $this->task->find($task_id);
        $task->status = 1;
        $task->save();
    }

    public function setInactive($task_id)
    {
        $task = $this->task->find($task_id);
        $task->status = 0;
        $task->save();
    }

    public function store($data)
    {

        $taskData = [
            'nic' => $data['nic'],
            'name' => $data['name'],
            'birth_date' => $data['birth_date'],
        ];

        if (isset($data['image'])) {
            $image_name = $data['image']->store('images', 'public');
            $taskData['image'] = $image_name;
        }

        $this->task->create($taskData);
    }

    public function delete($task_id)
    {
        $task = $this->task->find($task_id);
        $task->delete();
    }

    public function update($data)
    {
        $student = Student::find($data['id']);

        $student->nic = $data['nic'];
        $student->name = $data['name'];
        $student->birth_date = $data['birth_date'];

        if (isset($data['image'])) {
            $image_name = $data['image']->store('images', 'public');
            $student->image = $image_name;
        }

        $student->save();
    }
}
