<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EnquiryModel;
use App\Models\EnquiryProductsModel;
use App\Models\DepartmentModel;
use App\Models\StatusModel;

class Enquiry extends BaseController
{

    public $data = [];

    protected $viewsFolder = '\App\Views\enquiry';

    public function __construct()
    {
        helper(['form', 'url']);
        $this->model = new EnquiryModel();
        $this->product = new EnquiryProductsModel();
        $this->customer = new \App\Models\CustomerModel();
        $this->department = new DepartmentModel();
        $this->status = new StatusModel();
        $this->validation  = \Config\Services::validation();
        $this->ionAuth = new \App\Libraries\IonAuth();
    }

    public function index($customer=null)
    {
        $this->data['pageTitle'] = 'Enquiry List';
        if(!empty($customer)){
            $this->data['enquiry'] = $this->model->where('customer_id', $customer)->find();
            $this->data['customer'] = $this->customer->where('id', $customer)->first();
        }
        else{
            $this->data['enquiry'] = $this->model->findAll();
        }
        return view($this->viewsFolder . DIRECTORY_SEPARATOR . 'list', $this->data);
    }

    public function enquiryByParams()
    {
        $customer = $this->request->getVar('customer');
        $user = $this->request->getVar('user');
        if ($customer)
            $data = $model->where('customer_id', $customer)->findAll();
        if ($user)
            $data = $model->where('user', $user)->findAll();
        if ($data)
            return $this->respond($data);
        return $this->failNotFound('No enquiries found');
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $model = new EnquiryModel();
        $data = $model->find($id);
        if ($data)
            return $this->respond($data);
        return $this->failNotFound('No enquiry found');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function createOld($customer=null)
    {
        if(!empty($customer)){
            $this->data['customer'] = $this->customer->find($customer);
        }
        $this->data['pageTitle'] = 'New Enquiry';
        $this->data['enquiries'] = $this->model->findAll();
        $this->data['departments'] = $this->department->findAll();
        $this->data['enquiry_number'] = [
            'id'        => 'enquiry-number',
            'name'      => 'enquiry_number',
            'class'     => 'form-control',
            'type'      => 'text',
            'value'     => set_value('enquiry_number')
        ];
        $this->data['enquiry_date'] = [
            'id'        => 'enquiry-date',
            'name'      => 'enquiry_date',
            'class'     => 'form-control date-picker',
            'type'      => 'text',
            'value'     => set_value('enquiry_date')
        ];
        $this->data['name'] = [
            'id'        => 'name',
            'name'      => 'name',
            'class'     => 'form-control',
            'type'      => 'text',
            'value'     => set_value('name')
        ];
        $this->data['phone'] = [
            'id'        => 'phone',
            'name'      => 'phone',
            'class'     => 'form-control',
            'type'      => 'text',
            'value'     => set_value('phone')
        ];
        $this->data['landline'] = [
            'id'        => 'landline',
            'name'      => 'landline',
            'class'     => 'form-control',
            'type'      => 'text',
            'value'     => set_value('landline')
        ];
        $this->data['street'] = [
            'id'        => 'street',
            'name'      => 'street',
            'class'     => 'form-control',
            'type'      => 'text',
            'value'     => set_value('street')
        ];
        $this->data['city'] = [
            'id'        => 'city',
            'name'      => 'city',
            'class'     => 'form-control',
            'type'      => 'text',
            'value'     => set_value('city')
        ];
        $this->data['district'] = [
            'id'        => 'district',
            'name'      => 'district',
            'class'     => 'form-control',
            'type'      => 'text',
            'value'     => set_value('district')
        ];
        $this->data['state'] = [
            'id'        => 'state',
            'name'      => 'state',
            'class'     => 'form-control',
            'type'      => 'text',
            'value'     => set_value('state')
        ];
        $this->data['pincode'] = [
            'id'        => 'pincode',
            'name'      => 'pincode',
            'class'     => 'form-control',
            'type'      => 'text',
            'value'     => set_value('pincode')
        ];
        $this->data['area'] = [
            'id'        => 'area',
            'name'      => 'area',
            'class'     => 'form-control',
            'type'      => 'text',
            'value'     => set_value('area')
        ];
        $this->data['distance'] = [
            'id'        => 'distance',
            'name'      => 'distance',
            'class'     => 'form-control',
            'type'      => 'text',
            'value'     => set_value('distance')
        ];
        $this->data['website'] = [
            'id'        => 'website',
            'name'      => 'website',
            'class'     => 'form-control',
            'type'      => 'text',
            'value'     => set_value('website')
        ];
        $this->data['marketing_reference'] = [
            'id'        => 'marketing-reference',
            'name'      => 'marketing_reference',
            'class'     => 'form-control',
            'type'      => 'text',
            'value'     => set_value('marketing_reference')
        ];
        $this->data['from_time'] = [
            'id'        => 'from-time',
            'name'      => 'from_time',
            'class'     => 'form-control',
            'type'      => 'text',
            'value'     => set_value('from_time')
        ];
        $this->data['to_time'] = [
            'id'        => 'to-time',
            'name'      => 'to_time',
            'class'     => 'form-control',
            'type'      => 'text',
            'value'     => set_value('to_time')
        ];
        $this->data['traveling_kms'] = [
            'id'        => 'traveling-kms',
            'name'      => 'traveling_kms',
            'class'     => 'form-control',
            'type'      => 'text',
            'value'     => set_value('traveling_kms')
        ];
        $this->data['followup_date'] = [
            'id'        => 'followup-date',
            'name'      => 'followup_date',
            'class'     => 'form-control',
            'type'      => 'text',
            'value'     => set_value('followup_date')
        ];
        $this->data['remarks'] = [
            'id'        => 'remarks',
            'name'      => 'remarks',
            'class'     => 'form-control',
            'type'      => 'text',
            'value'     => set_value('remarks')
        ];
        $this->data['department'] = [
            'id'        => 'department',
            'name'      => 'department',
            'class'     => 'form-control',
            'type'      => 'text',
            'value'     => set_value('department')
        ];
        $this->data['forward_to'] = [
            'id'        => 'forward-to',
            'name'      => 'forward_to',
            'class'     => 'form-control',
            'type'      => 'text',
            'value'     => set_value('forward_to')
        ];
        $this->data['status'] = [
            'id'        => 'status',
            'name'      => 'status',
            'class'     => 'form-control',
            'type'      => 'text',
            'value'     => set_value('status')
        ];
        return view($this->viewsFolder . DIRECTORY_SEPARATOR . 'customer_enquiry', $this->data);
        $data = [
            'enquiry_number' => $this->request->getVar('enquiry_number'),
            'enquiry_date' => $this->request->getVar('enquiry_date'),
            'name' => $this->request->getVar('name'),
            'phone' => $this->request->getVar('phone'),
            'landline' => $this->request->getVar('landline'),
            'street' => $this->request->getVar('street'),
            'city' => $this->request->getVar('city'),
            'district' => $this->request->getVar('district'),
            'state' => $this->request->getVar('state'),
            'pincode' => $this->request->getVar('pincode'),
            'area' => $this->request->getVar('area'),
            'distance' => $this->request->getVar('distance'),
            'website' => $this->request->getVar('website'),
            'marketting_reference' => $this->request->getVar('marketting_reference'),
            'from_time' => $this->request->getVar('from_time'),
            'to_time' => $this->request->getVar('to_time'),
            'travelling_kms' => $this->request->getVar('travelling_kms'),
            'remarks' => $this->request->getVar('remarks'),
            'followup_date' => $this->request->getVar('followup_date'),
            'department_id' => $this->request->getVar('department'),
            'forward_id' => $this->request->getVar('forward'),
            'status_id' => $this->request->getVar('status')
        ];
        $insert_id = $model->insert($data);
        if ($insert_id) {
            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'Enquiry details added successfully',
                'data' => $model->find($insert_id)
            ];
            return $this->respondCreated($response);
        } else {
            return $this->failNotFound('Unable to create');
        }
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $model = new EnquiryModel();
        $data = [
            'id' => $id,
            'enquiry_number' => $this->request->getVar('enquiry_number'),
            'enquiry_date' => $this->request->getVar('enquiry_date'),
            'name' => $this->request->getVar('name'),
            'phone' => $this->request->getVar('phone'),
            'landline' => $this->request->getVar('landline'),
            'street' => $this->request->getVar('street'),
            'city' => $this->request->getVar('city'),
            'district' => $this->request->getVar('district'),
            'state' => $this->request->getVar('state'),
            'pincode' => $this->request->getVar('pincode'),
            'area' => $this->request->getVar('area'),
            'distance' => $this->request->getVar('distance'),
            'website' => $this->request->getVar('website'),
            'marketting_reference' => $this->request->getVar('marketting_reference'),
            'from_time' => $this->request->getVar('from_time'),
            'to_time' => $this->request->getVar('to_time'),
            'travelling_kms' => $this->request->getVar('travelling_kms'),
            'remarks' => $this->request->getVar('remarks'),
            'followup_date' => $this->request->getVar('followup_date'),
            'department_id' => $this->request->getVar('department'),
            'forward_id' => $this->request->getVar('forward'),
            'status_id' => $this->request->getVar('status')
        ];
        $model->update($id, $data);
        $response = [
            'status' => 200,
            'error' => false,
            'message' => 'Enquiry details updated successfully'
        ];
        return $this->respond($response);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $model = new EnquiryModel();
        $data = $model->find($id);
        if ($data) {
            $model . delete($id);
            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'Enquiry details deleted successfully'
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Unable to delete enquiry details');
        }
    }

    public function customerEnquiryList($customer = null)
    {
        $this->data['pageTitle'] = 'Enquiry List';
        $this->data['enquiry'] = $this->model->where('customer_id', $customer)->find();
        $this->data['customer'] = $this->customer->where('id', $customer)->first();
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

        $this->data['pageTitle'] = 'New Customer Enquiry';
        if(!empty($customer)){
            $this->data['customer'] = $this->customer->find($customer);
        }
        $this->data['departments'] = $this->department->findAll();
        $this->data['status'] = $this->status->where('id < 5')->find();
        $this->data['enquiry_number'] = $this->model->generateEnquiryNumber();
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            return view($this->viewsFolder . DIRECTORY_SEPARATOR . 'customer_enquiry', $this->data);
        }
        else{
            $rules = [
                'enquiry_number' => 'required'
            ];
            if(!$this->validate($rules)){
                return view(
                    $this->viewsFolder.DIRECTORY_SEPARATOR.'customer_enquiry',
                    $this->data,
                    [$this->validator]
                );
            }
            else{
                $data = [
                    'customer_id' => $customer,
                    'enquiry_number' => $this->request->getPost('enquiry_number'),
                    'enquiry_date' => $this->request->getPost('enquiry_date'),
                    'department_id' => $this->request->getPost('department'),
                    'customer_name' => $this->request->getPost('customer_name'),
                    'contact_number' => $this->request->getPost('contact_number'),
                    'landline' => $this->request->getPost('landline'),
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
                    'travelling_kms' => $this->request->getPost('traveling_kms'),
                    'forward_to' => $this->request->getPost('forward_to'),
                    'status_id' => $this->request->getPost('status'),
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
                        $this->product->insert($additional_data);
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

    
}