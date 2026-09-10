<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index()
    {
        $users = [
            [
                'username' => 'admin',
                'full_name' => 'Cenon Dale Macaraeg',
                'role' => 'Administrator'
            ],
            [
                'username' => 'cashier01',
                'full_name' => 'Ning Yizhuo',
                'role' => 'Cashier'
            ],
            [
                'username' => 'cashier02',
                'full_name' => 'Kim Minjoo',
                'role' => 'Cashier'
            ],
            [
                'username' => 'manager01',
                'full_name' => 'Cho Yihyun',
                'role' => 'Manager'
            ],
            [
                'username' => 'staff01',
                'full_name' => 'Yoonchae Jeung',
                'role' => 'Staff'
            ]
        ];

        return view('users', ['users' => $users]);
    }
}