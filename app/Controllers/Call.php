<?php

namespace App\Controllers;

use App\Models\ServiceCallModel;
use App\Models\CallTypeModel;
use App\Models\CallRelatedModel;
use App\Models\CustomerModel;
use App\Models\ContactModel;
use App\Models\DepartmentModel;
use App\Models\ProductModel;
use App\Models\ProductItemModel;

class Call extends \App\Controllers\BaseController
{
    public $data = [];

    protected $viewsFolder = '\App\Views\call';

    public function __construct()
    {
        helper(['url', 'form']);
        $this->ionAuth = new \App\Libraries\IonAuth();
        $this->call = new ServiceCallModel();
        $this->type = new CallTypeModel();
        $this->related = new CallRelatedModel();
        $this->customer = new CustomerModel();
        $this->contact = new ContactModel();
        $this->department = new DepartmentModel();
        $this->product = new ProductModel();
        $this->productModel = new ProductItemModel();
    }
    public function index()
    {

        $this->data['pageTitle'] = 'Calls List';
        $this->data['calls'] = $this->call->where('customer_id', $customer)->find();
        $this->data['customer'] = $this->customer->where('id', $customer)->first();
        return view($this->viewsFolder . '/' . 'list', $this->data);
    }

    public function customer_call($customer)
    {
        $this->data['pageTitle'] = 'Calls List';
        $this->data['calls'] = $this->call->where('customer_id', $customer)->find();
        $this->data['customer'] = $this->customer->where('id', $customer)->first();
        return view($this->viewsFolder . DIRECTORY_SEPARATOR . 'list', $this->data);
    }

    public function show($id = null)
    {
        $model = new CallModel();
        $data = $model->find($id);
        if ($data) {
            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'Call details retrived successfully',
                'data' => $data
            ];
        } else {
            $response = [
                'status' => 404,
                'error' => true,
                'message' => 'Call details not found with id=' . $id,
            ];
        }
        return $this->respond($response);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create($customer)
    {
        $this->data['customer'] = $this->customer->find($customer);
        $this->data['pageTitle'] = 'Add Call';
        $this->data['contacts'] = $this->contact->where('customer_id', $customer)->find();
        $this->data['callType'] = $this->type->findAll();
        $this->data['callRelated'] = $this->related->findAll();
        $this->data['department'] = $this->department->getCustomerDepartments($customer);
        $this->data['products'] = $this->product->findAll();
        $this->data['product_models'] = $this->productModel->findAll();
        $this->data['call_number'] = $this->call->generateCallNumber();

        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            return view($this->viewsFolder .'/'. 'create', $this->data);
        }
        else{
            $rules = [
                'call_date' => 'required',
                'call_time' => 'required',
                // 'call_number' => 'required',
                'contact_person' => 'required',
                'contact_number' => 'required',
                'compliant_nature' => 'required',
            ];
            if(!$this->validate($rules)){
                return view(
                    $this->viewsFolder.'/'.'create',
                    $this->data,
                    [$this->validator]
                );
            }else{
                $data = [
                    'customer_id' => $customer,
                    'department_id' => $this->request->getPost('department'),
                    'call_number' => $this->request->getPost('call_number'),
                    'call_date' => $this->request->getPost('call_date'),
                    'call_time' => $this->request->getPost('call_time'),
                    'call_type_id' => $this->request->getPost('call_type'),
                    'contact_person' => $this->request->getPost('contact_person'),
                    'contact_number' => $this->request->getPost('contact_number'),
                    'product_id' => $this->request->getPost('product'),
                    'product_model_id' => $this->request->getPost('product_model'),
                    'installation_date' => $this->request->getPost('installation_date'),
                    'expiry_date' => $this->request->getPost('expiry_date'),
                    'service_type_id' => $this->request->getPost('service_type'),
                    'compliant_nature' => $this->request->getPost('compliant_nature'),
                    'remarks' => $this->request->getPost('remarks'),
                    'created_by' => $this->ionAuth->user()->row()->id,
                    'updated_by' => $this->ionAuth->user()->row()->id,
                    'status_id' => 6,
                ];
                $id = $this->call->insert($data);
                if($id){
                    return redirect()->to("customer/$customer/call/list");
                }
            }
        }
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function edit($customer, $id = null)
    {
        $this->data['pageTitle'] = 'Edit Calls';
        $this->data['customer'] = $this->customer->find($customer);
        $this->data['contacts'] = $this->contact->where('customer_id', $customer)->find();
        $this->data['callType'] = $this->type->findAll();
        $this->data['callRelated'] = $this->related->findAll();
        $this->data['department'] = $this->department->getCustomerDepartments($customer);
        $this->data['products'] = $this->product->findAll();
        $this->data['product_models'] = $this->productModel->findAll();
        $this->data['call'] = $this->call->find($id);
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            return view($this->viewsFolder.'/'.'edit', $this->data);
        }
        $model = new CallModel();
        $data = [
            'id' => $id,
            'customer_id' => $this->request->getVar('customer_id'),
            'call_date' => $this->request->getVar('call_date'),
            'call_time' => $this->request->getVar('call_time'),
            'description' => $this->request->getVar('description'),
            'call_type' => $this->request->getVar('call_type'),
            'related' => $this->request->getVar('related')
        ];
        $affected_row = $model->update($id, $data);
        if ($affected_row) {
            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'Call details updated successfully',
                'data' => $model->find($id)
            ];
        } else {
            $response = [
                'status' => 500,
                'error' => true,
                'message' => $model->errors()
            ];
        }
        return $this->respond($response);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $model = new CallModel();
        $data = $model->find($id);
        if ($data) {
            $model->delete($id);
            $response = [
                'status' => 200,
                'error' => false,
                'message' =>  'Call details deleted successfully',
            ];
        } else {
            $response = [
                'status' => 404,
                'error' => true,
                'message' =>  'No Call details found with id=' . $id,
            ];
        }
        $this->respondDeleted($response);
    }

    private function call_type($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('mst_call_type');        // 'mytablename' is the name of your table
        $builder->select('id', 'type');       // names of your columns
        $builder->where('id', $id);                // where clause
        $query = $builder->get();
        return $query();
    }

    public function allocation($customer)
    {
        $this->data['customer'] = $this->customer->find($customer);
        $this->data['pageTitle'] = 'Call Allocation';
        $this->data['callType'] = $this->type->findAll();
        $this->data['callRelated'] = $this->related->findAll();
        return view($this->viewsFolder . DIRECTORY_SEPARATOR . 'allocation', $this->data);
    }

    public function allocate($customer)
    {
        $this->data['customer'] = $this->customer->find($customer);
        $this->data['pageTitle'] = 'Call Allocation';
        $this->data['callType'] = $this->type->findAll();
        $this->data['callRelated'] = $this->related->findAll();
        return view($this->viewsFolder . DIRECTORY_SEPARATOR . 'allocate', $this->data);
    }
}