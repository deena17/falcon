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
        $this->data['pageTitle'] = 'Contact List';
        $this->data['contacts'] = $this->contact->where('customer_id', $id)->find();
        $this->data['customer'] = $this->customer->where('id', $id)->first();
        return view($this->viewsFolder . '/' . 'list', $this->data);
    }

    public function show($id = null)
    {
        $contact = $this->contact->find($id);
        return json_encode($contact);
    }

    public function create($id = null)
    {
        // $id = $this->request->getVar('id');
        $this->data['pageTitle'] = 'New Contact';
        $this->data['customer'] = $this->customer->where('id', $id)->first();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            return view($this->viewsFolder . '/' . 'add', $this->data);
        } else {
            $validation = $this->validate([
                'contact_name' => 'required',
                'contact_mobile' => 'required|numeric',
                'contact_alternate' => 'required',
                'contact_email' => 'required|valid_email',
                'contact_designation' => 'required'
            ]);
            if (!$validation) {
                return view($this->viewsFolder . '/' . 'add', $this->data, [$this->validator]);
            } else {
                $contact_data = [
                    'customer_id' => $id,
                    'name' => $this->request->getVar('contact_name'),
                    'phone' => $this->request->getVar('contact_mobile'),
                    // 'contact_alternate' => $this->request->getVar('contact_alternate'),
                    'email' => $this->request->getVar('contact_email'),
                    'designation' => $this->request->getVar('contact_designation'),
                    'notes' => $this->request->getVar('contact_remarks'),
                ];
                $result = $this->contact->insert($contact_data);
                return redirect()->to("customer/$id/contact/list");
            }
        }
    }

    public function list()
    {
        return view('customer/contact/list');
    }

    public function edit($customer = null, $id = null)
    {
        $this->data['pageTitle'] = 'Edit Contact';
        $this->data['customer'] = $this->customer->where('id', $customer)->first();
        $this->data['contact'] = $this->contact->where('id', $id)->first();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            return view($this->viewsFolder . '/' . 'edit', $this->data);
        } else {
            // $validation = $this->validate([
            //     // 'contact_name' => 'required',
            //     // 'contact_mobile' => 'required|numeric',
            //     // 'contact_alternate' => 'required',
            //     // 'contact_email' => 'required|valid_email',
            //     // 'contact_designation' => 'required'
            // ]);
            // if (!$validation) {
            //     return view($this->viewsFolder . '/' . 'edit', $this->data, [$this->validator]);
            // } else {
            $contact_data = [
                'customer_id' => $customer,
                'name' => $this->request->getVar('contact_name'),
                'phone' => $this->request->getVar('contact_mobile'),
                // 'contact_alternate' => $this->request->getVar('contact_alternate'),
                'email' => $this->request->getVar('contact_email'),
                'designation' => $this->request->getVar('contact_designation'),
                'notes' => $this->request->getVar('contact_remarks'),
            ];
            $this->contact->update($id, $contact_data);
            return url_to('customer.contact.list', $customer);
            // }
        }
    }

}