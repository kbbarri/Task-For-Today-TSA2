<?php

namespace App\Controllers;

use App\Models\TaskModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Tasks extends BaseController
{
    public function index()
    {
        $taskModel = new TaskModel();

        $data = [
            'title' => 'All Tasks',
            'tasks' => $taskModel->getAllTasks()
        ];

        return view('tasks', $data);
    }

    public function new()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login')
                ->with('error', 'Please login to manage tasks.');
        }

        return view('task_form', [
            'title' => 'New Task',
            'task' => null
        ]);
    }

    public function create()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login')
                ->with('error', 'Please login to manage tasks.');
        }

        $rules = [
            'title'     => 'required|max_length[150]',
            'task_date' => 'required|valid_date[Y-m-d]',
            'status'    => 'required|in_list[pending,completed]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $taskModel = new TaskModel();

        $taskModel->insert([
            'title'       => trim($this->request->getPost('title')),
            'status'      => $this->request->getPost('status'),
            'task_date'   => $this->request->getPost('task_date'),
            'created_at'  => date('Y-m-d H:i:s'),
            'is_archived' => 0
        ]);

        return redirect()->to('/tasks')
            ->with('success', 'Task created successfully.');
    }

    public function edit($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login')
                ->with('error', 'Please login to manage tasks.');
        }

        $taskModel = new TaskModel();
        $task = $taskModel->find($id);

        if (!$task || $task['is_archived']) {
            throw PageNotFoundException::forPageNotFound('Task not found.');
        }

        return view('task_form', [
            'title' => 'Edit Task',
            'task'  => $task
        ]);
    }

    public function update($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login')
                ->with('error', 'Please login to manage tasks.');
        }

        $taskModel = new TaskModel();
        $task = $taskModel->find($id);

        if (!$task || $task['is_archived']) {
            throw PageNotFoundException::forPageNotFound('Task not found.');
        }

        $rules = [
            'title'     => 'required|max_length[150]',
            'task_date' => 'required|valid_date[Y-m-d]',
            'status'    => 'required|in_list[pending,completed]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $taskModel->update($id, [
            'title'     => trim($this->request->getPost('title')),
            'status'    => $this->request->getPost('status'),
            'task_date' => $this->request->getPost('task_date')
        ]);

        return redirect()->to('/tasks')
            ->with('success', 'Task updated successfully.');
    }

    public function delete($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login')
                ->with('error', 'Please login to manage tasks.');
        }

        $taskModel = new TaskModel();
        $task = $taskModel->find($id);

        if (!$task || $task['is_archived']) {
            throw PageNotFoundException::forPageNotFound('Task not found.');
        }

        $taskModel->update($id, [
            'is_archived' => 1
        ]);

        return redirect()->to('/tasks')
            ->with('success', 'Task archived successfully.');
    }
}