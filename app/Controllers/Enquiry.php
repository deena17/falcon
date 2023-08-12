<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EnquiryModel;
use App\Models\EnquiryProductsModel;
use App\Models\DepartmentModel;
use App\Models\StatusModel;
use App\Models\ProductModel;
use App\Models\ProductItemModel;

class Enquiry extends BaseController
{

    public $data = [];

    protected $viewsFolder = '\App\Views\enquiry';

    public function __construct()
    {
        helper(['form', 'url']);
        $this->model = new EnquiryModel();
        $this->enquiry_product = new EnquiryProductsModel();
        $this->customer = new \App\Models\CustomerModel();
        $this->department = new DepartmentModel();
        $this->products = new ProductModel();
        $this->product_model = new ProductItemModel();
        $this->status = new StatusModel();
        $this->validation  = \Config\Services::validation();
        $this->ionAuth = new \App\Libraries\IonAuth();
    }

    public function index($customer=null)
    {
        $this->data['page_title'] = 'Enquiry List';
        if(!empty($customer)){
            $this->data['enquiry'] = $this->model->enquiry_detail($customer);
            $this->data['customer'] = $this->customer->where(['id'=>$customer, 'display'=>'Y'])->first();
        }
        else{
            $this->data['enquiry'] = $this->model->enquiry_detail();
        }
        return view($this->viewsFolder . DIRECTORY_SEPARATOR . 'list', $this->data);
    }

    public function create($customer = null)
    {
        if (! $this->ionAuth->loggedIn())
		{
			return redirect()->to('/auth/login');
		}

        if(!$this->ionAuth->checkPermission('add_enquiry')){
            return view('auth/403', ['pageTitle' => 'Access Denined']);
        }

        $this->data['page_title'] = 'New Enquiry';
        if(!empty($customer)){
            $this->data['customer'] = $this->customer->find($customer);
        }
        $this->data['departments'] = $this->department->findAll();
        $this->data['status'] = $this->status->where('id < 5')->find();
        $this->data['products'] = $this->products->where(['display'=>'Y'])->find();
        $this->data['enquiry_number'] = $this->model->generateEnquiryNumber();
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            return view($this->viewsFolder . DIRECTORY_SEPARATOR . 'add', $this->data);
        }
        else{
            $rules = [
                'enquiry_number' => 'required'
            ];
            if(!$this->validate($rules)){
                return view(
                    $this->viewsFolder.DIRECTORY_SEPARATOR.'add',
                    $this->data,
                    [$this->validator]
                );
            }
            else{
                $data = [
                    'customer_id' => isset($customer) ? $customer : null,
                    'customer_type' => isset($customer) ? 1 : 0,
                    'enquiry_number' => $this->request->getPost('enquiry_number'),
                    'enquiry_date' => date('Y-m-d', strtotime($this->request->getPost('enquiry_date'))),
                    'department_id' => $this->request->getPost('department'),
                    'customer_name' => $this->request->getPost('customer_name'),
                    'contact_number' => $this->request->getPost('contact_number'),
                    'contact_landline' => $this->request->getPost('contact_landline'),
                    'street' => $this->request->getPost('street'),
                    'city' => $this->request->getPost('city'),
                    'district' => $this->request->getPost('district'),
                    'state' => $this->request->getPost('state'),
                    'pincode' => $this->request->getPost('pincode'),
                    'area' => $this->request->getPost('area'),
                    'distance' => $this->request->getPost('distance'),
                    'from_time' => $this->request->getPost('from_time'),
                    'to_time' => $this->request->getPost('to_time'),
                    'marketing_reference' => $this->request->getPost('marketing_reference'),
                    'travelling_kms' => $this->request->getPost('travelling_kms'),
                    'forward_to' => $this->request->getPost('forward_to'),
                    'status' => $this->request->getPost('status'),
                    'remarks' => $this->request->getPost('remarks'),
                    'created_by' => $this->ionAuth->user()->row()->id,
                    'updated_by' => $this->ionAuth->user()->row()->id,
                ];
                $id = $this->model->insert($data);
                if($id){
                    $product = $this->request->getPost('product');
                    $model  = $this->request->getPost('product_model');
                    $quantity = $this->request->getPost('quantity');
                    $description  = $this->request->getPost('description');
                    $specification  = $this->request->getPost('specification');
                    for($i =0; $i< count($product); $i++):
                        $additional_data = [
                            'enquiry_id' => $id,
                            'product_id' => $product[$i],
                            'product_model_id' => $model[$i],
                            'quantity' => $quantity[$i],
                            'description' => $description[$i],
                            'specification' => $specification[$i],
                        ];
                        $this->enquiry_product->insert($additional_data);
                    endfor;
                    if(!empty($customer)){
                        return redirect()->to('enquiry/list');
                    }
                    else{
                        return redirect()->to("customer/$customer/enquiry/list");
                    }
                }
            }
        }
    }
  
    public function update($customer=null, $id=null)
    {
        $this->data['page_title'] = 'Edit Enquiry';
        $this->data['customer'] = $this->customer->find($customer);
        $this->data['departments'] = $this->department->findAll();
        $this->data['products'] = $this->products->findAll();
        $this->data['status'] = $this->status->findAll();
        $this->data['product_models'] = $this->product_model->findAll();
        $this->data['enquiry'] = $this->model->find($id);
        $this->data['enquiry_products'] = $this->enquiry_product->where(['enquiry_id'=>$id, 'display'=>'Y'])->find();
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            return view($this->viewsFolder.'/'.'edit', $this->data);
        }
        $data = [
            'id' => $id,
            'enquiry_number' => $this->request->getPost('enquiry_number'),
            'enquiry_date' => date('Y-m-d', strtotime($this->request->getPost('enquiry_date'))),
            'department_id' => $this->request->getPost('department'),
            'customer_name' => $this->request->getPost('customer_name'),
            'contact_number' => $this->request->getPost('contact_number'),
            'contact_landline' => $this->request->getPost('contact_landline'),
            'street' => $this->request->getPost('street'),
            'city' => $this->request->getPost('city'),
            'district' => $this->request->getPost('district'),
            'state' => $this->request->getPost('state'),
            'pincode' => $this->request->getPost('pincode'),
            'area' => $this->request->getPost('area'),
            'distance' => $this->request->getPost('distance'),
            'from_time' => $this->request->getPost('from_time'),
            'to_time' => $this->request->getPost('to_time'),
            'marketing_reference' => $this->request->getPost('marketing_reference'),
            'travelling_kms' => $this->request->getPost('travelling_kms'),
            'forward_to' => $this->request->getPost('forward_to'),
            'status' => $this->request->getPost('status'),
            'remarks' => $this->request->getPost('remarks'),
            'created_by' => $this->ionAuth->user()->row()->id,
            'updated_by' => $this->ionAuth->user()->row()->id,
        ];
        $this->model->update($id, $data);
        $this->enquiry_product->set('display', 'N')->where('enquiry_id', $id)->update();
        $product = $this->request->getPost('product');
        $model  = $this->request->getPost('product_model');
        $quantity = $this->request->getPost('quantity');
        $description  = $this->request->getPost('description');
        $specification  = $this->request->getPost('specification');
        for($i =0; $i< count($product); $i++):
            $additional_data = [
                'enquiry_id' => $id,
                'product_id' => $product[$i],
                'product_model_id' => $model[$i],
                'quantity' => $quantity[$i],
                'description' => $description[$i],
                'specification' => $specification[$i],
                'display' => 'Y'
            ];
            $this->enquiry_product->insert($additional_data);
        endfor;
        if(!empty($customer)){
            return redirect()->to('enquiry/list');
        }
        else{
            return redirect()->to("customer/$customer/enquiry/list");
        }
    }


    public function detail($customer=null, $id=null)
    {
        $this->data['page_title'] = 'Enquiry Detail';
        $this->data['customer'] = $this->customer->find($customer);
        $this->data['departments'] = $this->department->findAll();
        $this->data['products'] = $this->products->findAll();
        $this->data['status'] = $this->status->findAll();
        $this->data['product_models'] = $this->product_model->findAll();
        $this->data['enquiry'] = $this->model->find($id);
        $this->data['enquiry_products'] = $this->enquiry_product->where(['enquiry_id'=>$id,'display'=>'Y'])->find();
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            return view($this->viewsFolder.'/'.'detail', $this->data);
        }
    }


    public function delete($customer, $id = null)
    {
        $this->data['page_title'] = 'Delete Enquiry';
        $this->data['enquiry'] = $this->model->find($id);
        $this->data['customer'] = $this->customer->find($customer);
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            return view($this->viewsFolder.'/'.'delete', $this->data);
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $this->request->getPost('id');
            $this->model->update($id, ['display'=>'N']);
            $this->enquiry_product->set('display', 'N')->where('enquiry_id', $id)->update();
            return redirect()->to("customer/$customer/enquiry/list");
        }
    }
}