<?php

namespace App\Controllers;

use App\Models\UserModel;

class Profile extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();

        $data = [
            'title' => 'Profile',
            'user' => $userModel->getUser()
        ];

        return view('profile', $data);
    }
}