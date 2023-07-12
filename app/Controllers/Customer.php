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
        $this->engineer = $this->ionAuth->user()->row();
        $this->session = \Config\Services::session();
    }

    public function index()
    { 
        $this->data['pageTitle'] = 'Customer List';
        if (! $this->ionAuth->loggedIn() || ! $this->ionAuth->isAdmin())
		{
			return redirect()->to('/auth/login');
		}
        if(!$this->ionAuth->checkPermission('view_customer')){
            return view('auth/403', ['pageTitle' => 'Access Denined']);
        }
        $this->data['message'] = null;
        $name = $this->request->getVar('customer_name');
        if ($name) {
            $this->data['customers'] = $this->customer->like('customer_name', $name)->find();
        } else {
            $this->data['customers'] = $this->customer->findAll();
        }
        $this->data['department'] = $this->department->getCustomerDepartments(1);
        if(empty($this->data['customers']))
            $this->data['message'] = 'No customer found';
        return view($this->viewsFolder . '/' . 'list', $this->data);
    }

    public function show($id = null)
    {
        $this->data = [
            'customer' => $this->customer->find($id),
            'billing' => $this->billing->where('customer_id', $id)->first(),
            'shipping' => $this->shipping->where('customer_id', $id)->first()
        ];
        return view($this->viewsFolder . '/' . 'detail', $this->data);
    }

    public function create()
    {
        if(!$this->ionAuth->checkPermission('add_customer')){
            return view('auth/403', ['pageTitle' => 'Access Denined']);
        }
        $this->data['pageTitle'] = 'New customer';
        $this->data['department'] = $this->department->findAll();
        $this->data['customer_type'] = $this->ctype->findAll();
        $this->data['engineer'] = $this->ionAuth->user()->result();
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
            $messages = [
                'customer_name' => [
                    'required' => 'Please enter customer name'
                ],
                'contact_number' => [
                    'required' => 'Please enter contact number',
                    'regex_match' => 'Please enter valid mobile number'
                ],
                'contact_email' => [
                    'required' => 'Please enter email address',
                    'valid_email' => 'Please enter valid email address'
                ],
                'contact_street' => [
                    'required' => 'Please enter street name'
                ],
                'contact_city' => [
                    'required' => 'Please enter city name'
                ],
                'contact_district' => [
                    'required' => 'Please enter district name'
                ],
                'contact_state' => [
                    'required' => 'Please enter state name'
                ],
                'contact_area' => [
                    'required' => 'Please enter area name'
                ],
                'contact_pincode' => [
                    'required' => 'Please enter pincode'
                ]
            ];
            $validation = $this->validate($rules, $messages);
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
                    'latitude'  => $this->request->getPost('contact_latitude'),
                    'longitude' => $this->request->getPost('contact_longitude'),
                    // 'created_by'        => auth()->id(),
                    // 'modified_by'       => auth()->id()
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
                        'customer_id'           => $customer_id,
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
                    $this->billing->insert($billing_data);

                    $shipping_data = [
                        'customer_id'           => $customer_id,
                        'street'    => $this->request->getVar('shipping_street'),
                        'city'      => $this->request->getVar('shipping_city'),
                        'district'  => $this->request->getVar('shipping_district'),
                        'state'     => $this->request->getVar('shipping_state'),
                        'pincode'   => $this->request->getVar('shipping_pincode'),
                        'area'      => $this->request->getVar('contact_area'),
                    ];
                    $this->shipping->insert($shipping_data);
                }
            }
            return redirect()->to('customer/');
        }
    }

    public function edit(int $id = null)
    {
        $rules = [
            'customer_name' => 'trim|required',
            'contact_number' => 'trim|required',
            'contact_landline' => 'trim|required'
        ];
        $customer = $this->customer->find($id);
        $billing  = $this->billing->where('customer_id', $customer->id)->first();
        $shipping = $this->shipping->where('customer_id', $customer->id)->first();
        $departments = $this->department->findAll();
        $customer_type = $this->ctype->findAll();
        if ($this->request->getPost()) {
            if ($this->validation->withRequest($this->request)->run()) {
                echo "success";
            } else {
                exit;
            }
        }
        $this->data['validation'] = $this->validator;
        $department_list = [
            '0' => 'Select Department'
        ];
        foreach ($departments as $d) :
            $department_list[$d->code] = $d->name;
        endforeach;
        $type_list = [
            '0' => 'Select Customer Type'
        ];
        foreach ($customer_type as $t) :
            $type_list[$t->id] = $t->type;
        endforeach;
        $this->data['department'] = [
            'id'      => 'customer-department',
            'class'   => 'form-control',
            'name'    => 'department',
            'options' => $department_list,
            'value'   => set_select('department')
        ];
        $this->data['customer_type'] = [
            'id'      => 'customer-type',
            'class'   => 'form-control',
            'name'    => 'customer_type',
            'options' => $type_list,
            'value'   => set_select('customer_type')
        ];
        $this->data['customer_name'] = [
            'type'    => 'text',
            'id'      => 'customer-name',
            'class'   => 'form-control',
            'name'    => 'customer_name',
            'value'   => set_value('customer_name', $customer->customer_name)
        ];
        $this->data['contact_number'] = [
            'type'    => 'text',
            'id'      => 'contact-number',
            'class'   => 'form-control',
            'name'    => 'contact_number',
            'value'   => set_value('contact_number', $customer->contact_number)
        ];
        $this->data['contact_landline'] = [
            'type'    => 'text',
            'id'      => 'contact-landline',
            'class'   => 'form-control',
            'name'    => 'contact_landline',
            'value'   => set_value('contact_landline', $customer->contact_landline)
        ];
        $this->data['contact_email'] = [
            'type'    => 'text',
            'id'      => 'contact-email',
            'class'   => 'form-control',
            'name'    => 'contact_email',
            'value'   => set_value('contact_email', $customer->contact_email)
        ];
        $this->data['contact_street'] = [
            'type'    => 'text',
            'id'      => 'contact-street',
            'class'   => 'form-control',
            'name'    => 'contact_street',
            'value'   => set_value('contact_street', $customer->contact_street)
        ];
        $this->data['contact_city'] = [
            'type'    => 'text',
            'id'      => 'contact-city',
            'class'   => 'form-control',
            'name'    => 'contact_city',
            'value'   => set_value('contact_city', $customer->contact_city)
        ];
        $this->data['contact_district'] = [
            'type'    => 'text',
            'id'      => 'contact-district',
            'class'   => 'form-control',
            'name'    => 'contact_district',
            'value'   => set_value('contact_district', $customer->contact_district)
        ];
        $this->data['contact_state'] = [
            'type'    => 'text',
            'id'      => 'contact-state',
            'class'   => 'form-control',
            'name'    => 'contact_state',
            'value'   => set_value('contact_state', $customer->contact_state)
        ];
        $this->data['contact_pincode'] = [
            'type'    => 'text',
            'id'      => 'contact-pincode',
            'class'   => 'form-control',
            'name'    => 'contact_pincode',
            'value'   => set_value('contact_pincode', $customer->contact_pincode)
        ];
        $this->data['contact_website'] = [
            'type'    => 'text',
            'id'      => 'contact-website',
            'class'   => 'form-control',
            'name'    => 'contact_website',
            'value'   => set_value('contact_website', $customer->website)
        ];
        $this->data['contact_latitude'] = [
            'type'    => 'text',
            'id'      => 'contact-latitude',
            'class'   => 'form-control',
            'name'    => 'contact_latitude',
            'placeholder' => 'Latitude',
            'value'   => set_value('contact_latitude', $customer->latitude)
        ];
        $this->data['contact_longitude'] = [
            'type'    => 'text',
            'id'      => 'contact-longitude',
            'class'   => 'form-control',
            'name'    => 'contact_longitude',
            'placeholder' => 'Longitude',
            'value'   => set_value('contact_longitude', $customer->longitude)
        ];
        $this->data['billing_street'] = [
            'type'    => 'text',
            'id'      => 'billing-street',
            'class'   => 'form-control',
            'name'    => 'billing_street',
            'value'   => set_value('billing_street', isset($billing['street']) ? $billing['street'] : '')
        ];
        $this->data['billing_city'] = [
            'type'    => 'text',
            'id'      => 'billing-city',
            'class'   => 'form-control',
            'name'    => 'billing_city',
            'value'   => set_value('billing_city', isset($billing['city']) ? $billing['city'] : '')
        ];
        $this->data['billing_district'] = [
            'type'    => 'text',
            'id'      => 'billing-district',
            'class'   => 'form-control',
            'name'    => 'billing_district',
            'value'   => set_value('billing_district', isset($billing['district']) ? $billing['district'] : '')
        ];
        $this->data['billing_state'] = [
            'type'    => 'text',
            'id'      => 'billing-state',
            'class'   => 'form-control',
            'name'    => 'billing_state',
            'value'   => set_value('billing_state', isset($billing['state']) ? $billing['state'] : '')
        ];
        $this->data['billing_pincode'] = [
            'type'    => 'text',
            'id'      => 'billing-pincode',
            'class'   => 'form-control',
            'name'    => 'billing_pincode',
            'value'   => set_value('billing_pincode', isset($billing['pincode']) ? $billing['pincode'] : '')
        ];
        $this->data['billing_iec_number'] = [
            'type'    => 'text',
            'id'      => 'billing-iec-number',
            'class'   => 'form-control',
            'name'    => 'billing_iec_number',
            'value'   => set_value('billing_iec_number', isset($billing['iec_number']) ? $billing['iec_number'] : '')
        ];
        $this->data['billing_pan_number'] = [
            'type'    => 'text',
            'id'      => 'billing-pan-number',
            'class'   => 'form-control',
            'name'    => 'billing_pan_number',
            'value'   => set_value('billing_pan_number', isset($billing['pan_number']) ? $billing['pan_number'] : '')
        ];
        $this->data['billing_gst_number'] = [
            'type'    => 'text',
            'id'      => 'billing-gst-number',
            'class'   => 'form-control',
            'name'    => 'billing_gst_number',
            'value'   => set_value('billing_gst_number', isset($billing['gst_number']) ? $billing['gst_number'] : '')
        ];
        $this->data['shipping_street'] = [
            'type'    => 'text',
            'id'      => 'shipping-street',
            'class'   => 'form-control',
            'name'    => 'shipping_street',
            'value'   => set_value('shipping_street', isset($shipping['street']) ? $shipping['street'] : '')
        ];
        $this->data['shipping_city'] = [
            'type'    => 'text',
            'id'      => 'shipping-city',
            'class'   => 'form-control',
            'name'    => 'shipping_city',
            'value'   => set_value('shipping_city', isset($shipping['city']) ? $shipping['city'] : '')
        ];
        $this->data['shipping_district'] = [
            'type'    => 'text',
            'id'      => 'shipping-district',
            'class'   => 'form-control',
            'name'    => 'shipping_district',
            'value'   => set_value('shipping_district', isset($shipping['district']) ? $shipping['district'] : '')
        ];
        $this->data['shipping_state'] = [
            'type'    => 'text',
            'id'      => 'shipping-state',
            'class'   => 'form-control',
            'name'    => 'shipping_state',
            'value'   => set_value('shipping_state', isset($shipping['state']) ? $shipping['state'] : '')
        ];
        $this->data['shipping_pincode'] = [
            'type'    => 'text',
            'id'      => 'shipping-pincode',
            'class'   => 'form-control',
            'name'    => 'shipping_pincode',
            'value'   => set_value('shipping_pincode', isset($shipping['pincode']) ? $shipping['pincode'] : '')
        ];
        return view($this->viewsFolder . DIRECTORY_SEPARATOR . 'edit', $this->data);
    }

    public function update($id = null)
    {
        $data = [
            'id' => $id,
            'customer_type' => $this->request->getVar('customer_type'),
            'department' => $this->request->getVar('department'),
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
            'created_by' => $this->request->getVar('created_by'),
            'modified_by' => $this->request->getVar('modified_by')
        ];
        $this->customer->update($id, $data);
        $billing_address = [
            'street' => $this->request->getVar('street'),
            'city' => $this->request->getVar('city'),
            'district' => $this->request->getVar('district'),
            'state' => $this->request->getVar('state'),
            'pincode' => $this->request->getVar('pincode'),
            'area' => $this->request->getVar('area'),
            'pan_number' => $this->request->getVar('pan_number'),
            'iec_number' => $this->request->getVar('iec_number'),
            'gst_number' => $this->request->getVar('gst_number'),
            'customer_id' => $id,
        ];
        $this->billing->update($billing_address);
        $shipping_address = [
            'street' => $this->request->getVar('street'),
            'city' => $this->request->getVar('city'),
            'district' => $this->request->getVar('district'),
            'state' => $this->request->getVar('state'),
            'pincode' => $this->request->getVar('pincode'),
            'area' => $this->request->getVar('area'),
            //'customer_id' => $insert_id,
        ];
        $this->shipping->update($shipping_address);
        $response = [
            'status' => 200,
            'message' => [
                'success' => 'Customer details updated successfully'
            ]
        ];
        // return $this->respond($response);
    }

    public function delete($id = null)
    {
        $data = $this->customer->find($id);
        if ($data) {
            $customerDepartment = new \App\Models\CustomerDepartmentModel();
            $this->billing->where('customer_id', $id)->delete();
            $this->shipping->where('customer_id', $id)->delete();
            $customerDepartment->where('customer', $id)->delete();
            $this->customer->delete($id);
            return redirect()->to('customer/');
        } else {
            echo "Something went wrong";
        }
    }

    public function detail($id=null)
    {
        $this->data['customer'] = $this->customer->find($id);
        $this->data['billing'] = $this->billing->where('customer_id', $id)->findAll();
        $this->data['shipping'] = $this->shipping->where('customer_id', $id)->findAll();

        $this->data['calls'] = count($this->call->customerCalls($id));

        $this->data['pageTitle'] = 'Customer Detail';
        return view($this->viewsFolder . '/' . 'detail', $this->data);
    }
}