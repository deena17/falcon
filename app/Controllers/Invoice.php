<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InvoiceModel;
use App\Models\CustomerModel;
use App\Models\ProductModel;
use App\Models\ProductItemModel;
use App\Models\InvoiceItemModel;
use App\Models\CurrencyModel;
use App\Models\InvoiceStatusModel;
use App\Models\EnquiryModel;

class Invoice extends BaseController
{
    public $data = [];

    protected $viewsFolder = '\App\Views\invoice';

    public function __construct()
    {
        helper(['url', 'form']);
        $this->ionAuth = new \App\Libraries\IonAuth();
        $this->model = new InvoiceModel();
        $this->customer = new CustomerModel();
        $this->products = new ProductModel();
        $this->product_models = new ProductModel();
        $this->invoice_items = new InvoiceItemModel();
        $this->currency = new CurrencyModel();
        $this->invoice_status = new InvoiceStatusModel();
        $this->enquiry = new EnquiryModel();
    }

    public function index($customer=null)
    {
        $this->data['page_title'] = 'Invoice List';
        $this->data['invoices'] = $this->model->where(['display'=> 'Y'])->find();
        if(!empty($customer))
            $this->data['customer'] = $this->customer->find($customer);
        return view($this->viewsFolder . DIRECTORY_SEPARATOR . 'list', $this->data);
    }

    public function create($customer= null)
    {
        $this->data['page_title'] = 'New Invoice';
        if(!empty($customer))
            $this->data['customer'] = $this->customer->find($customer);
        $this->data['enquiries'] = $this->enquiry->where([
            'display'=> 'Y',
            'status >' => '1',
            'status <' => '4'
            ])->find();
        $this->data['invoice_number'] = $this->model->generateInvoiceNumber();
        $this->data['products'] = $this->products->findAll();
        $this->data['currency'] = $this->currency->findAll();
        $this->data['status'] = $this->invoice_status->findAll();
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            return view($this->viewsFolder . DIRECTORY_SEPARATOR . 'create', $this->data);
        }
        $rules = [
            'invoice_date' => 'required',
            'due_date' => 'required'
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
                'invoice_number' => $this->request->getPost('invoice_number'),
                'invoice_date' => date('Y-m-d', strtotime($this->request->getPost('invoice_date'))),
                'due_date' => date('Y-m-d', strtotime($this->request->getPost('due_date'))),
                'customer_name' => $this->request->getPost('customer_name'),
                'contact_number' => $this->request->getPost('contact_number'),
                'contact_landline' => $this->request->getPost('contact_landline'),
                'street' => $this->request->getPost('street'),
                'city' => $this->request->getPost('city'),
                'district' => $this->request->getPost('district'),
                'state' => $this->request->getPost('state'),
                'pincode' => $this->request->getPost('pincode'),
                'area' => $this->request->getPost('area'),
                'total_amount' => $this->request->getPost('total_amount'),
                'discount' => $this->request->getPost('discount'),
                'grand_total' => $this->request->getPost('grand_total'),
                'remarks' => $this->request->getPost('remarks'),
                'status' => $this->request->getPost('status'),
                'currency' => $this->request->getPost('currency'),
                'display' => 'Y',
                'created_by' => $this->ionAuth->user()->row()->id,
                'updated_by' => $this->ionAuth->user()->row()->id,
            ];
            $id = $this->model->insert($data);
            if($id){
                $product = $this->request->getPost('product');
                $model  = $this->request->getPost('product_model');
                $description  = $this->request->getPost('description');
                $specification  = $this->request->getPost('specification');
                $quantity = $this->request->getPost('quantity');
                $unit_rate = $this->request->getPost('unit_rate');
                $amount  = $this->request->getPost('amount');
                
                for($i =0; $i< count($product); $i++):
                    $additional_data = [
                        'invoice_id' => $id,
                        'invoice_number' => $this->request->getPost('invoice_number'),
                        'product_id' => $product[$i],
                        'product_model_id' => $model[$i],
                        'currency_id' => $this->request->getPost('currency'),
                        'description' => $description[$i],
                        'specification' => $specification[$i],
                        'quantity' => $quantity[$i],
                        'unit_rate' => $unit_rate[$i],
                        'amount' => $amount[$i],
                        'display' => 'Y',
                        'currency_id' => $this->request->getPost('currency'),
                        'created_by' => $this->ionAuth->user()->row()->id,
                        'updated_by' => $this->ionAuth->user()->row()->id,
                    ];
                    $this->invoice_items->insert($additional_data);
                endfor;
                if(!empty($customer)){
                    return redirect()->to('invoice/list');
                }
                else{
                    return redirect()->to("customer/$customer/invoice/list");
                }
            }
        }
    }


    public function edit($id, $customer=null)
    {
        $this->data['page_title'] = 'Edit Invoice';
        if(!empty($customer))
            $this->data['customer'] = $this->customer->find($customer);
        $this->data['enquiries'] = $this->enquiry->where([
            'display'=> 'Y',
            'status >' => '1',
            'status <' => '4'
            ])->find();
        $this->data['invoice_number'] = $this->model->generateInvoiceNumber();
        $this->data['products'] = $this->products->findAll();
        $this->data['product_models'] = $this->product_models->findAll();
        $this->data['currency'] = $this->currency->findAll();
        $this->data['status'] = $this->invoice_status->findAll();
        $this->data['invoice'] = $this->model->find($id);
        $this->data['invoice_items'] = $this->invoice_items->where(['display'=> 'Y'])->find();
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            return view($this->viewsFolder . DIRECTORY_SEPARATOR . 'edit', $this->data);
        }
        $data = [
            'customer_id' => $customer,
            'invoice_number' => $this->request->getPost('invoice_number'),
            'invoice_date' => date('Y-m-d', strtotime($this->request->getPost('invoice_date'))),
            'due_date' => date('Y-m-d', strtotime($this->request->getPost('due_date'))),
            'customer_name' => $this->request->getPost('customer_name'),
            'contact_number' => $this->request->getPost('contact_number'),
            'contact_landline' => $this->request->getPost('contact_landline'),
            'street' => $this->request->getPost('street'),
            'city' => $this->request->getPost('city'),
            'district' => $this->request->getPost('district'),
            'state' => $this->request->getPost('state'),
            'pincode' => $this->request->getPost('pincode'),
            'area' => $this->request->getPost('area'),
            'total_amount' => $this->request->getPost('total_amount'),
            'discount' => $this->request->getPost('discount'),
            'grand_total' => $this->request->getPost('grand_total'),
            'remarks' => $this->request->getPost('remarks'),
            'status' => $this->request->getPost('status'),
            'currency' => $this->request->getPost('currency'),
            'display' => 'Y',
            'created_by' => $this->ionAuth->user()->row()->id,
            'updated_by' => $this->ionAuth->user()->row()->id,
        ];
        $this->model->update($id, $data);
        $this->invoice_items->set('display', 'N')->where('invoice_id', $id)->update();
        $product = $this->request->getPost('product');
        $model  = $this->request->getPost('product_model');
        $description  = $this->request->getPost('description');
        $specification  = $this->request->getPost('specification');
        $quantity = $this->request->getPost('quantity');
        $unit_rate = $this->request->getPost('unit_rate');
        $amount  = $this->request->getPost('amount');
        for($i =0; $i< count($product); $i++):
            $additional_data = [
                'invoice_id' => $id,
                'invoice_number' => $this->request->getPost('invoice_number'),
                'product_id' => $product[$i],
                'product_model_id' => $model[$i],
                'currency_id' => $this->request->getPost('currency'),
                'description' => $description[$i],
                'specification' => $specification[$i],
                'quantity' => $quantity[$i],
                'unit_rate' => $unit_rate[$i],
                'amount' => $amount[$i],
                'display' => 'Y',
                'currency_id' => $this->request->getPost('currency'),
                'created_by' => $this->ionAuth->user()->row()->id,
                'updated_by' => $this->ionAuth->user()->row()->id,
            ];
            $this->invoice_items->insert($additional_data);
        endfor;
        if(empty($customer)){
            return redirect()->to('invoice/list');
        }
        else{
            return redirect()->to("customer/$customer/invoice/list");
        }
    }

    public function detail($id, $customer=null, )
    {
        $this->data['page_title'] = 'Invoice Detail';
        if(!empty($customer))
            $this->data['customer'] = $this->customer->find($customer);
        $this->data['invoice_number'] = $this->model->generateInvoiceNumber();
        $this->data['products'] = $this->products->findAll();
        $this->data['product_models'] = $this->product_models->findAll();
        $this->data['currency'] = $this->currency->findAll();
        $this->data['status'] = $this->invoice_status->findAll();
        $this->data['invoice'] = $this->model->find($id);
        $this->data['invoice_items'] = $this->invoice_items->where(['display'=> 'Y'])->find();
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            return view($this->viewsFolder . DIRECTORY_SEPARATOR . 'detail', $this->data);
        }
    }

    public function delete($id, $customer = null)
    {
        $this->data['page_title'] = 'Delete Invoice';
        $this->data['invoice'] = $this->model->find($id);
        if(!empty($customer))
            $this->data['customer'] = $this->customer->find($customer);
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            return view($this->viewsFolder.'/'.'delete', $this->data);
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $this->request->getPost('id');
            $this->model->update($id, ['display'=>'N']);
            $this->invoice_items->set('display', 'N')->where('invoice_id', $id)->update();
            return redirect()->to("customer/$customer/invoice/list");
        }
    } 
}