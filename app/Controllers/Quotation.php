<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\QuotationModel;
use App\Models\CustomerModel;
use App\Models\ProductModel;
use App\Models\ProductItemModel;
use App\Models\QuotationItemModel;
use App\Models\CurrencyModel;
use App\Models\InvoiceStatusModel;

class Quotation extends BaseController
{
    public $data = [];

    protected $viewsFolder = '\App\Views\quotation';

    public function __construct()
    {
        helper(['url', 'form']);
        $this->ionAuth = new \App\Libraries\IonAuth();
        $this->model = new QuotationModel();
        $this->customer = new CustomerModel();
        $this->products = new ProductModel();
        $this->product_models = new ProductModel();
        $this->quotation_items = new QuotationItemModel();
        $this->currency = new CurrencyModel();
        $this->invoice_status = new InvoiceStatusModel();
    }

    public function index($customer)
    {
        $this->data['page_title'] = 'Quotation List';
        $this->data['quotations'] = $this->model->where(['display' => 'Y'])->find();
        $this->data['customer'] = $this->customer->find($customer);
        return view($this->viewsFolder . DIRECTORY_SEPARATOR . 'list', $this->data);
    }

    public function create($customer= null)
    {
        $this->data['page_title'] = 'New Quotation';
        $this->data['customer'] = $this->customer->find($customer);
        $this->data['quotation_number'] = $this->model->generate_quotation_number();
        $this->data['products'] = $this->products->findAll();
        $this->data['currency'] = $this->currency->findAll();
        $this->data['status'] = $this->invoice_status->findAll();
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            return view($this->viewsFolder . DIRECTORY_SEPARATOR . 'create', $this->data);
        }
        $rules = [
            'quotation_date' => 'required',
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
                'quotation_number' => $this->request->getPost('quotation_number'),
                'quotation_date' => date('Y-m-d', strtotime($this->request->getPost('quotation_date'))),
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
                'currency_id' => $this->request->getPost('currency'),
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
                        'quotation_id' => $id,
                        'quotation_number' => $this->request->getPost('quotation_number'),
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
                    $this->quotation_items->insert($additional_data);
                endfor;
                if(!empty($customer)){
                    return redirect()->to('quotation/list');
                }
                else{
                    return redirect()->to("customer/$customer/quotation/list");
                }
            }
        }
    }


    public function edit($customer=null, $id = null)
    {
        $this->data['page_title'] = 'Edit Quotation';
        $this->data['customer'] = $this->customer->find($customer);
        $this->data['quotation_number'] = $this->model->generate_quotation_number();
        $this->data['products'] = $this->products->findAll();
        $this->data['product_models'] = $this->product_models->findAll();
        $this->data['currency'] = $this->currency->findAll();
        $this->data['status'] = $this->invoice_status->findAll();
        $this->data['quotation'] = $this->model->find($id);
        $this->data['quotation_items'] = $this->quotation_items->where(['display'=> 'Y'])->find();
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            return view($this->viewsFolder . DIRECTORY_SEPARATOR . 'edit', $this->data);
        }
        $data = [
            'customer_id' => $customer,
            'quotation_number' => $this->request->getPost('quotation_number'),
            'quotation_date' => date('Y-m-d', strtotime($this->request->getPost('quotation_date'))),
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
            'currency_id' => $this->request->getPost('currency'),
            'display' => 'Y',
            'created_by' => $this->ionAuth->user()->row()->id,
            'updated_by' => $this->ionAuth->user()->row()->id,
        ];
        $this->model->update($id, $data);
        $this->quotation_items->set('display', 'N')->where('quotation_id', $id)->update();
        $product = $this->request->getPost('product');
        $model  = $this->request->getPost('product_model');
        $description  = $this->request->getPost('description');
        $specification  = $this->request->getPost('specification');
        $quantity = $this->request->getPost('quantity');
        $unit_rate = $this->request->getPost('unit_rate');
        $amount  = $this->request->getPost('amount');
        for($i =0; $i< count($product); $i++):
            $additional_data = [
                'quotation_id' => $id,
                'quotation_number' => $this->request->getPost('quotation_number'),
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
            $this->quotation_items->insert($additional_data);
        endfor;
        if(empty($customer)){
            return redirect()->to('quotation/list');
        }
        else{
            return redirect()->to("customer/$customer/quotation/list");
        }
    }

    public function detail($customer=null, $id = null)
    {
        $this->data['page_title'] = 'Quotation Detail';
        $this->data['customer'] = $this->customer->find($customer);
        $this->data['quotation_number'] = $this->model->generate_quotation_number();
        $this->data['products'] = $this->products->findAll();
        $this->data['product_models'] = $this->product_models->findAll();
        $this->data['currency'] = $this->currency->findAll();
        $this->data['status'] = $this->invoice_status->findAll();
        $this->data['quotation'] = $this->model->find($id);
        $this->data['quotation_items'] = $this->quotation_items->where(['display'=> 'Y'])->find();
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            return view($this->viewsFolder . DIRECTORY_SEPARATOR . 'detail', $this->data);
        }
    }

    public function delete($customer, $id = null)
    {
        $this->data['page_title'] = 'Delete Quotation';
        $this->data['quotation'] = $this->model->find($id);
        $this->data['customer'] = $this->customer->find($customer);
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            return view($this->viewsFolder.'/'.'delete', $this->data);
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $this->request->getPost('id');
            $this->model->update($id, ['display'=>'N']);
            $this->quotation_items->set('display', 'N')->where('quotation_id', $id)->update();
            return redirect()->to("customer/$customer/quotation/list");
        }
    } 
    
}