<?php

namespace App\Controllers;

use App\Models\TaskModel;
use App\Models\UserModel;

class Pages extends BaseController
{
    public function home()
    {
        $taskModel = new TaskModel();
        $today = date('Y-m-d');

        return view('home', [
            'tasks' => $taskModel->where('task_date', $today)->orderBy('id', 'ASC')->findAll(),
            'today' => $today,
        ]);
    }

    public function tasks()
    {
        $taskModel = new TaskModel();

        return view('tasks', [
            'tasks' => $taskModel->orderBy('task_date', 'ASC')->orderBy('id', 'ASC')->findAll(),
        ]);
    }

    public function profile()
    {
        $userModel = new UserModel();

        return view('profile', [
            'user' => $userModel->first(),
        ]);
    }

    public function about()
    {
        return view('about');
    }
}
