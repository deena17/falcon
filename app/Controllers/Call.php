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
use App\Models\ServiceTypeModel;

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
        $this->service_type = new ServiceTypeModel();
    }
    public function index($customer=null)
    {
        $this->data['page_title'] = 'Service Call List';
        if(!empty($customer)){
            $this->data['calls'] = $this->call->where(['customer_id'=>$customer, 'display' => 'Y'])->find();
            $this->data['customer'] = $this->customer->where('display','Y')->find($customer);
        }
        else{
            $this->data['calls'] = $this->call->where('display','Y')->findAll();
        }
        return view($this->viewsFolder . '/' . 'list', $this->data);
    }

    public function create($customer=null)
    {
        if(!empty($customer)){
            $this->data['customer'] = $this->customer->find($customer);
        }
        $this->data['page_title'] = 'New Service Call';
        $this->data['customers'] = $this->customer->findAll();
        $this->data['contacts'] = $this->contact->where('customer_id', $customer)->find();
        $this->data['callType'] = $this->type->findAll();
        $this->data['callRelated'] = $this->related->findAll();
        $this->data['department'] = $this->department->findAll();
        $this->data['products'] = $this->product->findAll();
        $this->data['product_models'] = $this->productModel->findAll();
        $this->data['call_number'] = $this->call->generateCallNumber();
        $this->data['service_type'] = $this->service_type->findAll();
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            return view($this->viewsFolder .'/'. 'create', $this->data);
        }
        else{
            $rules = [
                'call_date' => 'required',
                'call_time' => 'required',
                'contact_person' => 'required',
                'contact_number' => 'required',
                'complaint_nature' => 'required',
            ];
            if(!$this->validate($rules)){
                return view(
                    $this->viewsFolder.'/'.'create',
                    $this->data,
                    [$this->validator]
                );
            }else{
                $data = [
                    'customer_id' => isset($customer) ? $customer : $this->request->getPost('customer'),
                    'department_id' => $this->request->getPost('department'),
                    'call_number' => $this->request->getPost('call_number'),
                    'call_date' => date('Y-m-d', strtotime($this->request->getPost('call_date'))),
                    'call_time' => $this->request->getPost('call_time'),
                    'call_type_id' => $this->request->getPost('call_type'),
                    'contact_number' => $this->request->getPost('contact_number'),
                    'product_id' => $this->request->getPost('product'),
                    'product_model_id' => $this->request->getPost('product_model'),
                    'installation_date' => date('Y-m-d', strtotime($this->request->getPost('installation_date'))),
                    'expiry_date' => date('Y-m-d', strtotime($this->request->getPost('expiry_date'))),
                    'service_type_id' => $this->request->getPost('service_type'),
                    'complaint_nature' => $this->request->getPost('complaint_nature'),
                    'remarks' => $this->request->getPost('remarks'),
                    'created_by' => $this->ionAuth->user()->row()->id,
                    'updated_by' => $this->ionAuth->user()->row()->id,
                    'status_id' => 6,
                    'allocate_status' => 0
                ];
                if($this->request->getPost('contact_person') == 'o'){
                    $data['contact_name'] = $this->request->getPost('contact_person1');
                }
                else{
                    $contact = explode("~", $this->request->getPost('contact_person'));
                    $data['contact_name'] = $contact[1];
                }
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
        $this->data['page_title'] = 'Edit Service Call';
        $this->data['customer'] = $this->customer->find($customer);
        $this->data['contacts'] = $this->contact->where('customer_id', $customer)->find();
        $this->data['call_type'] = $this->type->findAll();
        $this->data['department'] = $this->department->getCustomerDepartments($customer);
        $this->data['products'] = $this->product->findAll();
        $this->data['product_models'] = $this->productModel->findAll();
        $this->data['service_type'] = $this->service_type->findAll();
        $this->data['call'] = $this->call->find($id);
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            return view($this->viewsFolder.'/'.'edit', $this->data);
        }
        $data = [
            'customer_id' => $customer,
            'department_id' => $this->request->getPost('department'),
            'call_number' => $this->request->getPost('call_number'),
            'call_date' => date('Y-m-d', strtotime($this->request->getPost('call_date'))),
            'call_time' => $this->request->getPost('call_time'),
            'call_type_id' => $this->request->getPost('call_type'),
            'contact_number' => $this->request->getPost('contact_number'),
            'product_id' => $this->request->getPost('product'),
            'product_model_id' => $this->request->getPost('product_model'),
            'installation_date' => date('Y-m-d', strtotime($this->request->getPost('installation_date'))),
            'expiry_date' => date('Y-m-d', strtotime($this->request->getPost('expiry_date'))),
            'service_type_id' => $this->request->getPost('service_type'),
            'complaint_nature' => $this->request->getPost('complaint_nature'),
            'remarks' => $this->request->getPost('remarks'),
            'created_by' => $this->ionAuth->user()->row()->id,
            'updated_by' => $this->ionAuth->user()->row()->id,
            'status_id' => 6,
        ];
        if($this->request->getPost('contact_person') == 'o'){
            $data['contact_name'] = $this->request->getPost('contact_person1');
        }
        else{
            $contact = explode("~", $this->request->getPost('contact_person'));
            $data['contact_name'] = $contact[1];
        }
        $affected_row = $this->call->update($id, $data);
        if ($affected_row) {
            return redirect()->to("customer/$customer/call/list");
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($customer, $id = null)
    {
        $this->data['page_title'] = 'Delete Service Call';
        $this->data['call'] = $this->call->find($id);
        $this->data['customer'] = $this->customer->find($customer);
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            return view($this->viewsFolder.'/'.'delete', $this->data);
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $this->request->getPost('id');
            $this->call->update($id, ['display' => 'N']);
            return redirect()->to("customer/$customer/call/list");
        }
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

    public function allocation()
    {
        $this->data['page_title'] = 'Call Allocation';
        $this->data['calls'] = $this->call->get_calls();
        return view($this->viewsFolder . DIRECTORY_SEPARATOR . 'allocation', $this->data);
    }

    public function modify_allocation()
    {
        $this->data['page_title'] = 'Modify Call Allocation';
        $this->data['calls'] = $this->call->get_calls(1);
        return view($this->viewsFolder . DIRECTORY_SEPARATOR . 'allocation', $this->data);
    }

    public function allocate($call)
    {
        $this->data['page_title'] = 'Call Allocation';
        $this->data['call'] = $this->call->get_call_detail($call);
        $this->data['engineer'] = $this->ionAuth->users()->result();
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            return view($this->viewsFolder . DIRECTORY_SEPARATOR . 'allocate', $this->data);
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $rules = [
                'due_date' => 'required',
                'engineer' => 'required',
            ];
            if(!$this->validate($rules)){
                return view(
                    $this->viewsFolder.'/'.'allocate',
                    $this->data,
                    [$this->validator]
                );
            }else{
                $allocation = new \App\Models\ServiceCallAllocationModel();
                if($this->request->getPost('is_combined') == 'yes'){
                    $this->call->set('is_combined', 1)->set('allocate_status', 1)->where('id', $call)->update();
                    $engineer = $this->request->getPost('engineer');
                    foreach ($engineer as $key => $value) :
                        $data = [
                            'engineer_id'   => $value,
                            'call_id'       => $call,
                            'due_date'      => $this->request->getPost('due_date'),
                            'remarks'       => $this->request->getPost('remarks'),
                            'created_by'    => $this->ionAuth->user()->row()->id,
                            'updated_by'    => $this->ionAuth->user()->row()->id,
                        ];
                        $allocation->insert($data);
                    endforeach;
                }
                else{
                    $this->call->set('is_combined', 0)->set('allocate_status', 1)->where('id', $call)->update();
                    $data = [
                        'engineer_id'   => $this->request->getPost('engineer'),
                        'call_id'       => $call,
                        'due_date'      => $this->request->getPost('due_date'),
                        'remarks'       => $this->request->getPost('remarks'),
                        'created_by'    => $this->ionAuth->user()->row()->id,
                        'updated_by'    => $this->ionAuth->user()->row()->id,
                    ];
                    $allocation->insert($data);
                }
                return redirect()->to('call/allocation');
            }
        }
    }
}