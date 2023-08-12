<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ContactModel;
use App\Models\CustomerModel;

class Contact extends BaseController
{
    public $data = [];

    protected $viewsFolder = '\App\Views\contact';

    protected $contact, $customer = null;

    public function __construct()
    {
        helper(['form', 'url']);
        $this->contact = new ContactModel();
        $this->customer = new CustomerModel();
    }
    public function index($id = null)
    {
        $this->data['page_title'] = 'Contact List';
        $this->data['contacts'] = $this->contact->where('customer_id', $id)->find();
        $this->data['customer'] = $this->customer->where('id', $id)->first();
        return view($this->viewsFolder . '/' . 'list', $this->data);
    }

    public function create($id = null)
    {
        $this->data['page_title'] = 'New Contact';
        $this->data['customer'] = $this->customer->where('id', $id)->first();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            return view($this->viewsFolder . '/' . 'add', $this->data);
        } else {
            $validation = $this->validate([
                'contact_name' => 'required',
                'contact_mobile' => 'required|numeric',
                'contact_email' => 'required|valid_email',
                'contact_designation' => 'required'
            ]);
            if (!$validation) {
                return view($this->viewsFolder . '/' . 'add', $this->data, [$this->validator]);
            } else {
                $contact_data = [
                    'customer_id' => $id,
                    'name' => $this->request->getPost('contact_name'),
                    'phone' => $this->request->getPost('contact_mobile'),
                    'alternate_number' => $this->request->getPost('contact_alternate'),
                    'email' => $this->request->getPost('contact_email'),
                    'designation' => $this->request->getPost('contact_designation'),
                    'notes' => $this->request->getPost('contact_remarks'),
                    'is_primary' => $this->request->getPost('is_primary')
                ];
                $result = $this->contact->insert($contact_data);
                return redirect()->to("customer/$id/contact/list");
            }
        }
    }


    public function edit($customer = null, $id = null)
    {
        $this->data['page_title'] = 'Edit Contact';
        $this->data['customer'] = $this->customer->where('id', $customer)->first();
        $this->data['contact'] = $this->contact->where('id', $id)->first();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            return view($this->viewsFolder . '/' . 'edit', $this->data);
        } else {
            $contact_data = [
                'customer_id' => $customer,
                'name' => $this->request->getPost('contact_name'),
                'phone' => $this->request->getPost('contact_mobile'),
                'alternate_number' => $this->request->getPost('contact_alternate'),
                'email' => $this->request->getPost('contact_email'),
                'designation' => $this->request->getPost('contact_designation'),
                'notes' => $this->request->getPost('contact_remarks'),
                'is_primary' => $this->request->getPost('is_primary')
            ];
            $this->contact->update($id, $contact_data);
            return redirect()->to("customer/$customer/contact/list");
        }
    }

    public function delete($customer, $id=null){
        $this->data['pageTitle'] = 'Delete contact';
        $this->data['contact'] = $this->contact->find($id);
        $this->data['customer'] = $this->customer->find($customer);
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            return view($this->viewsFolder.'/'.'delete', $this->data);
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $this->request->getPost('id');
            $this->contact->delete($id);
            return redirect()->to("customer/$customer/contact/list");
        }
    }

}