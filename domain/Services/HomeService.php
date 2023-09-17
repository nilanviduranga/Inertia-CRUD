<?php

namespace domain\Services;

use App\Models\student;
use Illuminate\Console\View\Components\Task;

class HomeService
{
    protected $task;
    public function __construct()
    {
        $this->task = new student();
    }

    public function all()
    {
        return $this->task->all();
    }
    public function updateView($task_id)
    {
        return $this->task->find($task_id);
    }
}
