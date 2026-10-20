<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customers extends BaseController
{
    public function index()
    {
        $customerModel = new CustomerModel();

        return view('customers', [
            'customers' => $customerModel->findAll()
        ]);
    }

    public function newForm()
    {
        return view('customers_new');
    }

    public function create()
    {
        $rules = [
            'full_name' => 'required',
            'email' => 'required|valid_email',
            'phone' => 'permit_empty'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $customerModel = new CustomerModel();
        $customerModel->insert([
            'full_name' => $this->request->getPost('full_name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/customers');
    }

    public function edit(int $id)
    {
        $customerModel = new CustomerModel();
        $customer = $customerModel->find($id);

        if (!$customer) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Customer not found');
        }

        return view('customer_edit', ['customer' => $customer]);
    }

    public function update(int $id)
    {
        $rules = [
            'full_name' => 'required',
            'email' => 'required|valid_email',
            'phone' => 'permit_empty'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $customerModel = new CustomerModel();
        $customerModel->update($id, [
            'full_name' => $this->request->getPost('full_name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
        ]);

        return redirect()->to('/customers');
    }
}
