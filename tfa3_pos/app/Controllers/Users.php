<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();

        return view('users', [
            'users' => $userModel->findAll()
        ]);
    }

    public function newForm()
    {
        return view('user_new');
    }

    public function create()
    {
        $rules = [
            'username' => 'required|is_unique[users.username]',
            'full_name' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $userModel = new UserModel();
        $userModel->insert([
            'username' => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/users');
    }

    public function edit(int $id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);

        if (!$user) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('User not found');
        }

        return view('user_edit', ['user' => $user]);
    }

    public function update(int $id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);

        if (!$user) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('User not found');
        }

        $rules = [
            'username' => 'required|is_unique[users.username,id,' . $id . ']',
            'full_name' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
        ];

        $file = $this->request->getFile('avatar');
        if ($file && $file->getError() !== UPLOAD_ERR_NO_FILE) {
            if (!$file->isValid()) {
                return redirect()->back()->withInput()->with('errors', ['avatar' => 'The avatar upload failed.']);
            }

            $allowedMimes = ['image/jpeg', 'image/png'];
            if (!in_array($file->getMimeType(), $allowedMimes, true) || $file->getSize() > 2 * 1024 * 1024) {
                return redirect()->back()->withInput()->with('errors', ['avatar' => 'Avatar must be JPG or PNG and no larger than 2 MB.']);
            }

            $uploadDir = FCPATH . 'uploads';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0775, true);
            }

            $filename = $file->getRandomName();
            service('image')->withFile($file->getTempName())->fit(200, 200)->save($uploadDir . DIRECTORY_SEPARATOR . $filename);
            $data['avatar'] = $filename;
        }

        $userModel->update($id, $data);

        return redirect()->to('/users');
    }
}
