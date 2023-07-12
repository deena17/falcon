<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\CustomerModel;
use App\Models\BillingAddressModel;
use App\Models\ShippingAddressModel;

class Customer extends ResourceController
{
    public function index()
    {
        $data = $this->customer->findAll();
        if ($data)
            return $this->respond($data);
        return $this->failNotFound('No customer found');
    }

    public function show($id = null)
    {
        $customer = new CustomerModel();
        $billing = new BillingAddressModel();
        $shipping = new ShippingAddressModel();

        $result = [
            'customer' => $customer->find($id),
            'billing' => $billing->where('customer_id', $id)->first(),
            'shipping' => $shipping->where('customer_id', $id)->first()
        ];
        if ($result)
            return $this->respond($result);
        return $this->failNotFound('No customer details found with id=' . $id);
    }

    public function create()
    {
        $data = [
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
        $insert_id = $this->customer->insert($data);
        if ($insert_id) {
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
                'customer_id' => $insert_id,
            ];
            $this->billing->insert($billing_address);
            $shipping_address = [
                'street' => $this->request->getVar('street'),
                'city' => $this->request->getVar('city'),
                'district' => $this->request->getVar('district'),
                'state' => $this->request->getVar('state'),
                'pincode' => $this->request->getVar('pincode'),
                'area' => $this->request->getVar('area'),
                'customer_id' => $insert_id,
            ];
            $this->shipping->insert($shipping_address);
        }
        $response = [
            'status' => 200,
            'message' => [
                'success' => 'Customer created successfully'
            ]
        ];
        return $this->respondCreated($response);
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
            'customer_id' => $insert_id,
        ];
        $this->shipping->update($shipping_address);
        $response = [
            'status' => 200,
            'message' => [
                'success' => 'Customer details updated successfully'
            ]
        ];
        return $this->respond($response);
    }

    public function delete($id = null)
    {
        $data = $model->find($id);
        if ($data) {
            $this->customer->delete($id);
            $this->billing->where('customer_id', $id)->delete();
            $this->shipping->where('customer_id', $id)->delete();
            $response = [
                'status' => 200,
                'error' => false,
                'message' => [
                    'success' => 'Customer details deleted successfully'
                ]
            ];
            $this->respond($response);
        } else {
            $response = [
                'status' => 500,
                'error' => true,
                'message' => [
                    'error' => 'No customer found'
                ]
            ];
        }
        return $this->respondDeleted($response);
    }
}