<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PaymentModel;
use App\Models\CustomerModel;
use App\Models\CurrencyModel;
use App\Models\PaymentMethodModel;

class Payment extends BaseController
{
    public $data = [];

    protected $viewsFolder = '\App\Views\payment';

    public function __construct()
    {
        helper(['url', 'form']);
        $this->ionAuth = new \App\Libraries\IonAuth();
        $this->model = new PaymentModel();
        $this->customer = new CustomerModel();
        $this->payment_method = new PaymentMethodModel();
        $this->currency = new CurrencyModel();
    }

    public function index($customer=null)
    {
        $this->data['page_title'] = 'Payment List';
        $this->data['payments'] = $this->model->where(['display'=> 'Y'])->find();
        $this->data['customer'] = $this->customer->find($customer);
        return view($this->viewsFolder . DIRECTORY_SEPARATOR . 'list', $this->data);
    }

    public function create($customer= null)
    {
        $this->data['page_title'] = 'New Payment';
        $this->data['customer'] = $this->customer->find($customer);
        $this->data['payment_number'] = $this->model->generate_payment_number();
        $this->data['payment_method'] = $this->payment_method->findAll();
        $this->data['currency'] = $this->currency->findAll();
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            return view($this->viewsFolder . DIRECTORY_SEPARATOR . 'create', $this->data);
        }
        $rules = [
            'payment_date' => 'required',
            'amount' => 'required'
        ];
        if(!$this->validate($rules)){
            return view(
                $this->viewsFolder.DIRECTORY_SEPARATOR.'create',
                $this->data,
                [$this->validator]
            );
        }
        else{
            $data = [
                'customer_id' => $customer,
                'payment_number' => $this->request->getPost('payment_number'),
                'payment_date' => date('Y-m-d', strtotime($this->request->getPost('payment_date'))),
                'mode_of_payment' => $this->request->getPost('payment_method'),
                'customer_name' => $this->request->getPost('customer_name'),
                'contact_number' => $this->request->getPost('contact_number'),
                'contact_landline' => $this->request->getPost('contact_landline'),
                'street' => $this->request->getPost('street'),
                'city' => $this->request->getPost('city'),
                'district' => $this->request->getPost('district'),
                'state' => $this->request->getPost('state'),
                'pincode' => $this->request->getPost('pincode'),
                'amount' => $this->request->getPost('amount'),
                'ref_number' => $this->request->getPost('reference_number'),   
                'remarks' => $this->request->getPost('remarks'),
                'currency_id' => $this->request->getPost('currency'),
                'display' => 'Y',
            ];
            $id = $this->model->insert($data);
            if(!empty($customer)){
                return redirect()->to('payment/list');
            }
            else{
                return redirect()->to("customer/$customer/payment/list");
            }
        }
    }


    public function edit($customer=null, $id = null)
    {
        $this->data['page_title'] = 'Edit Payment';
        $this->data['customer'] = $this->customer->find($customer);
        $this->data['payment_number'] = $this->model->generate_payment_number();
        $this->data['payment_method'] = $this->payment_method->findAll();
        $this->data['payment'] = $this->model->find($id);
        $this->data['currency'] = $this->currency->findAll();
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            return view($this->viewsFolder . DIRECTORY_SEPARATOR . 'edit', $this->data);
        }
        $data = [
            'customer_id' => $customer,
            'payment_number' => $this->request->getPost('payment_number'),
            'payment_date' => date('Y-m-d', strtotime($this->request->getPost('payment_date'))),
            'mode_of_payment' => $this->request->getPost('payment_method'),
            'customer_name' => $this->request->getPost('customer_name'),
            'contact_number' => $this->request->getPost('contact_number'),
            'contact_landline' => $this->request->getPost('contact_landline'),
            'street' => $this->request->getPost('street'),
            'city' => $this->request->getPost('city'),
            'district' => $this->request->getPost('district'),
            'state' => $this->request->getPost('state'),
            'pincode' => $this->request->getPost('pincode'),
            'amount' => $this->request->getPost('amount'),
            'ref_number' => $this->request->getPost('reference_number'),   
            'remarks' => $this->request->getPost('remarks'),
            'currency_id' => $this->request->getPost('currency'),
            'display' => 'Y',
        ];
        $this->model->update($id, $data);
        if(empty($customer)){
            return redirect()->to('payment/list');
        }
        else{
            return redirect()->to("customer/$customer/payment/list");
        }
    }

    public function detail($customer=null, $id = null)
    {
        $this->data['page_title'] = 'Payment Detail';
        $this->data['customer'] = $this->customer->find($customer);
        $this->data['payment_number'] = $this->model->generate_payment_number();
        $this->data['payment_method'] = $this->payment_method->findAll();
        $this->data['payment'] = $this->model->find($id);
        $this->data['currency'] = $this->currency->findAll();
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            return view($this->viewsFolder . DIRECTORY_SEPARATOR . 'detail', $this->data);
        }
    }

    public function delete($customer, $id = null)
    {
        $this->data['page_title'] = 'Delete Payment';
        $this->data['payment'] = $this->model->find($id);
        $this->data['customer'] = $this->customer->find($customer);
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            return view($this->viewsFolder.'/'.'delete', $this->data);
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $this->request->getPost('id');
            $this->model->update($id, ['display'=>'N']);
            return redirect()->to("customer/$customer/payment/list");
        }
    } 
}