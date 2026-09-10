<?php

namespace App\Controllers;

class Customers extends BaseController
{
    public function index()
    {
        $customers = [
            [
                'full_name' => 'Cenon Dale Macaraeg',
                'email' => 'cenondale@gmail.com',
                'phone' => '09171234567'
            ],
            [
                'full_name' => 'Ning Yizhuo',
                'email' => 'ningning@gmail.com',
                'phone' => '09181234567'
            ],
            [
                'full_name' => 'Kim Minjoo',
                'email' => 'kimminjoo@gmail.com',
                'phone' => '09191234567'
            ],
            [
                'full_name' => 'Cho Yihyun',
                'email' => 'choyihyun@gmail.com',
                'phone' => '09201234567'
            ],
            [
                'full_name' => 'Yoonchae Jeung',
                'email' => 'yoonchae@gmail.com',
                'phone' => '09211234567'
            ]
        ];

        return view('customers', ['customers' => $customers]);
    }
}