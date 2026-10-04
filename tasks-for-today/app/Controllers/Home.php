<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Home extends BaseController
{
    public function index()
    {
        $taskModel = new TaskModel();

        $data = [
            'title' => 'Tasks for Today',
            'tasks' => $taskModel->getTodaysTasks()
        ];

        return view('welcome', $data);
    }
}