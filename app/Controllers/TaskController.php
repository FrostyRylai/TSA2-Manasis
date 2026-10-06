<?php

namespace App\Controllers;

use App\Models\TaskModel;

class TaskController extends BaseController
{
    
    public function index()
    {
        $taskModel = new TaskModel();
        $today = date('Y-m-d');
        
        $data['tasks'] = $taskModel->where('is_archived', 0)
                                   ->where('task_date', $today)
                                   ->findAll();

        return view('welcome_task', $data);
    }

    
    public function list()
    {
        $taskModel = new TaskModel();
        
        $data['tasks'] = $taskModel->where('is_archived', 0)
                                   ->orderBy('task_date', 'ASC')
                                   ->findAll();

        return view('task_list', $data);
    }

    
    public function create()
    {
        return view('task_create_view');
    }

    
    public function store()
    {
        $rules = [
            'title'     => 'required|max_length[150]',
            'task_date' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $taskModel = new TaskModel();
        $taskModel->save([
            'title'       => $this->request->getPost('title'),
            'status'      => $this->request->getPost('status') ?? 'pending',
            'task_date'   => $this->request->getPost('task_date'),
            'created_at'  => date('Y-m-d H:i:s'),
            'is_archived' => 0
        ]);

        return redirect()->to('/tasks')->with('success', 'Task created successfully!');
    }

    
    public function edit($id)
    {
        $taskModel = new TaskModel();
        $data['task'] = $taskModel->find($id);

        if (!$data['task']) {
            return redirect()->to('/tasks')->with('error', 'Task not found.');
        }

        return view('task_edit_view', $data);
    }

    
    public function update($id)
    {
        $rules = [
            'title'     => 'required|max_length[150]',
            'task_date' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $taskModel = new TaskModel();
        $taskModel->update($id, [
            'title'     => $this->request->getPost('title'),
            'status'    => $this->request->getPost('status'),
            'task_date' => $this->request->getPost('task_date')
        ]);

        return redirect()->to('/tasks')->with('success', 'Task updated successfully!');
    }

    
    public function delete($id)
    {
        $taskModel = new TaskModel();
        $taskModel->update($id, ['is_archived' => 1]);

        return redirect()->to('/tasks')->with('success', 'Task archived successfully!');
    }
}