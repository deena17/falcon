<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Customer extends BaseController
{
    public $data = [];

    protected $session;

    protected $validation;

    protected $validationListTemplate = 'list';

    protected $viewsFolder = '\App\Views\customer';

    protected $department, $ctype, $billing, $shipping, $customer, $engineer = null;

    public function __construct()
    {
        helper(['form', 'url']);
        $this->ionAuth = new \App\Libraries\IonAuth();
        $this->billing = new \App\Models\BillingAddressModel();
        $this->shipping = new \App\Models\ShippingAddressModel();
        $this->department = new \App\Models\DepartmentModel();
        $this->ctype = new \App\Models\CustomerTypeModel();
        $this->customer = new \App\Models\CustomerModel();
        $this->call = new \App\Models\ServiceCallModel();
        $this->enquiry = new \App\Models\EnquiryModel();
        $this->engineer = $this->ionAuth->user()->row();
        $this->session = \Config\Services::session();
    }

    public function index()
    { 
        $this->data['message'] = null;
        $this->data['page_title'] = 'Customer List';
        $name = $this->request->getVar('customer_name');
        if ($name) {
            $this->data['customers'] = $this->customer->like('customer_name', $name)->find();
        } else {
            $this->data['customers'] = $this->customer->where('display', 'Y')->paginate(10);
        }
        $this->data['pager'] =  $this->customer->pager;
        $this->data['department'] = $this->department->findAll();
        if(empty($this->data['customers']))
            $this->data['message'] = 'No customer found';
        return view($this->viewsFolder . '/' . 'list', $this->data);
    }

    public function create($enquiry=null)
    {
        // if(!$this->ionAuth->checkPermission('add_customer')){
        //     return view('auth/403', ['page_title' => 'Access Denined']);
        // }
        $this->data['page_title'] = 'New customer';
        $this->data['department'] = $this->department->findAll();
        $this->data['customer_type'] = $this->ctype->findAll();
        $this->data['engineer'] = $this->ionAuth->users()->result();
        if(!empty($enquiry)){
            $this->data['enquiry'] = $this->enquiry->where('id', $enquiry)->first();
        }
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            return view(
                $this->viewsFolder . '/' . 'add',
                $this->data
            );
        } else {
            $rules = [
                'customer_name' => 'required',
                'contact_number' => 'required|regex_match[/^[0-9]{10}$/]',
                'contact_email' => 'required|valid_email',
                'contact_street' => 'required',
                'contact_city' => 'required',
                'contact_district' => 'required',
                'contact_state' => 'required',
                'contact_pincode' => 'required|numeric',
                'contact_area' => 'required',
                'billing_street' => 'required',
                'billing_city' => 'required',
                'billing_district' => 'required',
                'billing_state' => 'required',
                'billing_pincode' => 'required|numeric',
                'shipping_street' => 'required',
                'shipping_city' => 'required',
                'shipping_district' => 'required',
                'shipping_state' => 'required',
                'shipping_pincode' => 'required',

            ];
            $validation = $this->validate($rules);
            $messages = [

            ];
            if (!$validation) {
                return view(
                    $this->viewsFolder . '/' . 'add',
                    $this->data,
                    [$this->validator]
                );
            } else {
                $customer_data = [
                    'customer_type'     => $this->request->getPost('customer_type'),
                    'customer_name'     => $this->request->getPost('customer_name'),
                    'contact_number'    => $this->request->getPost('contact_number'),
                    'contact_landline'  => $this->request->getPost('contact_landline'),
                    'contact_email'     => $this->request->getPost('contact_email'),
                    'contact_street'    => $this->request->getPost('contact_street'),
                    'contact_city'      => $this->request->getPost('contact_city'),
                    'contact_district'  => $this->request->getPost('contact_district'),
                    'contact_state'     => $this->request->getPost('contact_state'),
                    'contact_pincode'   => $this->request->getPost('contact_pincode'),
                    'contact_area'      => $this->request->getPost('contact_area'),
                    'distance'          => $this->request->getPost('distance'),
                    'latitude'          => $this->request->getPost('latitude'),
                    'longitude'         => $this->request->getPost('longitude'),
                    'display'           => 'Y',
                    'created_by'        => $this->ionAuth->user()->row()->id,
                    'modified_by'       => $this->ionAuth->user()->row()->id,
                ];
                $customer_id = $this->customer->insert($customer_data);
                if ($customer_id) {
                    $department = $this->request->getPost('department');
                    $customerDepartment = new \App\Models\CustomerDepartmentModel();
                    foreach ($department as $key => $value) :
                        $data = [
                            'department' => $value,
                            'customer' => $customer_id
                        ];
                        $customerDepartment->insert($data);
                    endforeach;

                    $billing_data = [
                        'customer_id'   => $customer_id,
                        'street'        => $this->request->getVar('billing_street'),
                        'city'          => $this->request->getVar('billing_city'),
                        'district'      => $this->request->getVar('billing_district'),
                        'state'         => $this->request->getVar('billing_state'),
                        'pincode'       => $this->request->getVar('billing_pincode'),
                        'area'          => $this->request->getVar('contact_area'),
                        'iec_number'    => $this->request->getVar('billing_iec_number'),
                        'pan_number'    => $this->request->getVar('billing_pan_number'),
                        'gst_number'    => $this->request->getVar('billing_gst_number'),
                    ];
                    $this->billing->insert($billing_data);

                    $shipping_data = [
                        'customer_id'   => $customer_id,
                        'street'        => $this->request->getVar('shipping_street'),
                        'city'          => $this->request->getVar('shipping_city'),
                        'district'      => $this->request->getVar('shipping_district'),
                        'state'         => $this->request->getVar('shipping_state'),
                        'pincode'       => $this->request->getVar('shipping_pincode'),
                        'area'          => $this->request->getVar('contact_area'),
                    ];
                    $this->shipping->insert($shipping_data);
                }
            }
            return redirect()->to('customer/');
        }
    }

    public function edit(int $id = null)
    {
        $this->data['page_title'] = 'Update customer';
        $this->data['customer'] = $this->customer->find($id);
        $filter = ['customer_id' => $id, 'display' => 'Y'];
        $this->data['billing'] = $this->billing->where($filter)->first();
        $this->data['shipping'] = $this->shipping->where($filter)->first();
        $this->data['department'] = $this->department->findAll();
        $customerDepartment = new \App\Models\CustomerDepartmentModel();
        $this->data['selectedDepartment'] = $customerDepartment->where('customer', $id)->find();
        $this->data['customer_type'] = $this->ctype->findAll();
        $this->data['engineer'] = $this->ionAuth->user()->result();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            return view(
                $this->viewsFolder . '/' . 'edit',
                $this->data
            );
        }
        else{
            $customer_data = [
                'customer_type'     => $this->request->getPost('customer_type'),
                'customer_name'     => $this->request->getPost('customer_name'),
                'contact_number'    => $this->request->getPost('contact_number'),
                'contact_landline'  => $this->request->getPost('contact_landline'),
                'contact_email'     => $this->request->getPost('contact_email'),
                'contact_street'    => $this->request->getPost('contact_street'),
                'contact_city'      => $this->request->getPost('contact_city'),
                'contact_district'  => $this->request->getPost('contact_district'),
                'contact_state'     => $this->request->getPost('contact_state'),
                'contact_pincode'   => $this->request->getPost('contact_pincode'),
                'contact_area'      => $this->request->getPost('contact_area'),
                'distance'          => $this->request->getPost('distance'),
                'latitude'          => $this->request->getPost('latitude'),
                'longitude'         => $this->request->getPost('longitude'),
                'created_by'        => $this->ionAuth->user()->row()->id,
                'updated_by'        => $this->ionAuth->user()->row()->id,
            ];
            $this->customer->update($id, $customer_data);
            $department = $this->request->getPost('department');
            $customerDepartment = new \App\Models\CustomerDepartmentModel();
            $customerDepartment->where('customer', $id)->delete();
            foreach ($department as $key => $value) :
                $data = [
                    'department' => $value,
                    'customer' => $id
                ];
                $customerDepartment->insert($data);
            endforeach;
            $billing_data = [
                'customer_id'           => $id,
                'street'     => $this->request->getVar('billing_street'),
                'city'       => $this->request->getVar('billing_city'),
                'district'   => $this->request->getVar('billing_district'),
                'state'      => $this->request->getVar('billing_state'),
                'pincode'    => $this->request->getVar('billing_pincode'),
                'area'      => $this->request->getVar('contact_area'),
                'iec_number' => $this->request->getVar('billing_iec_number'),
                'pan_number' => $this->request->getVar('billing_pan_number'),
                'gst_number' => $this->request->getVar('billing_gst_number'),
            ];
            $this->billing->set('display', 'N')->where('customer_id', $id)->update();
            $this->billing->insert($billing_data);
            $shipping_data = [
                'customer_id'           => $id,
                'street'    => $this->request->getVar('shipping_street'),
                'city'      => $this->request->getVar('shipping_city'),
                'district'  => $this->request->getVar('shipping_district'),
                'state'     => $this->request->getVar('shipping_state'),
                'pincode'   => $this->request->getVar('shipping_pincode'),
                'area'      => $this->request->getVar('contact_area'),
            ];
            $this->shipping->set('display', 'N')->where('customer_id', $id)->update();
            $this->shipping->insert($shipping_data);
            return redirect()->to('customer');
        }
    }

    public function delete($id = null)
    {
        $this->data['page_title'] = 'Delete Customer';
        $this->data['customer'] = $this->customer->find($id);
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            return view($this->viewsFolder.'/'.'delete', $this->data);
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $this->request->getPost('id');
            $this->customer->update($id, ['display' => 'N']);
            return redirect()->to("customer");
        }
    }

    public function detail($id=null)
    {
        $this->data['customer'] = $this->customer->find($id);
        if(!$this->data['customer']){
            return view('auth/404', ['page_title' => '404 Not Found']);
        }
        $this->data['page_title'] = 'Customer Detail';
        $this->data['billing'] = $this->billing->where(['customer_id'=>$id, 'display'=>'Y'])->findAll();
        $this->data['shipping'] = $this->shipping->where(['customer_id'=>$id, 'display'=>'Y'])->findAll();
        $this->data['calls'] = count($this->call->customer_calls($id));
        return view($this->viewsFolder . '/' . 'detail', $this->data);
    }


    public function confirm_list(){
        $this->data['page_title'] = 'Confirm List';
        $this->data['customers'] = $this->enquiry->where([
            'display' => 'Y',
            'status'  => 1,
            'customer_type' => 0
        ])->find();
        return view($this->viewsFolder.'/'.'confirm_list', $this->data);
    }

    public function get_customer($id){
        header('Content-Type application/json; charset=UTF-8');
        return json_encode($this->customer->find($id));
    }
}