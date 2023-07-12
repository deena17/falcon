<?php

namespace App\Controllers;

use App\Models\SpareModel;
use App\Models\ProductModel;

class Spare extends BaseController
{

    public $data = [];

    protected $session;

    protected $validation;

    protected $validationListTemplate = 'list';

    protected $viewsFolder = '\App\Views\master/spare';

    public function __construct()
    {
        helper(['form', 'url']);
        $this->ionAuth = new \App\Libraries\IonAuth();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $model = new SpareModel();
        $this->data['pageTitle'] = 'Spare List';
        $this->data['spares'] = $model->findAll();
        return view($this->viewsFolder . '/' . 'list', $this->data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $data = $this->model->find($id);
        if($data){
            return $this->respond($data);
        }
        else{
            return $this->failNotFound('Spares not found');
        }
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $product = new ProductModel();

        $this->data['pageTitle'] = 'Add Spare';
        $this->data['products'] = $product->findAll();
        
        $this->data['item_code'] = [
            'name'  => 'item_code',
            'id'    => 'item_code',
            'type'  => 'text',
            'class' => 'form-control',
            'value' => set_value('item_code'),
        ];

        $this->data['item_name'] = [
            'name'  => 'item_name',
            'id'    => 'item_name',
            'type'  => 'text',
            'class' => 'form-control',
            'value' => set_value('item_name'),
        ];

        $this->data['description'] = [
            'name'  => 'description',
            'id'    => 'description',
            'type'  => 'text',
            'class' => 'form-control',
            'value' => set_value('description'),
        ];

        $this->data['basic_unit'] = [
            'name'  => 'basic_unit',
            'id'    => 'basic_unit',
            'type'  => 'text',
            'class' => 'form-control',
            'value' => set_value('basic_unit'),
        ];

        $this->data['unit_rate'] = [
            'name'  => 'unit_rate',
            'id'    => 'unit_rate',
            'type'  => 'text',
            'class' => 'form-control',
            'value' => set_value('unit_rate'),
        ];

        $this->data['shelf_number'] = [
            'name'  => 'shelf_number',
            'id'    => 'shelf_number',
            'type'  => 'text',
            'class' => 'form-control',
            'value' => set_value('shelf_number'),
        ];

        $this->data['rack_number'] = [
            'name'  => 'rack_number',
            'id'    => 'rack_number',
            'type'  => 'text',
            'class' => 'form-control',
            'value' => set_value('rack_number'),
        ];


        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            return view(
                $this->viewsFolder . '/' . 'add',
                $this->data
            );
        } else {
            $rules = [
                'item_code' => 'required',
                'item_name' => 'required',
                'basic_unit' => 'required',
                'unit_rate' => 'required',
                'rack_number' => 'required',
                'shelf_number' => 'required',
                'critical_spare' => 'required',
                'product_id' => 'required',

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
                    'customer_type'     => $this->request->getVar('customer_type'),
                    'customer_name'     => $this->request->getVar('customer_name'),
                    'contact_number'    => $this->request->getVar('contact_number'),
                    'contact_landline'  => $this->request->getVar('contact_landline'),
                    'contact_email'     => $this->request->getVar('contact_email'),
                    'contact_street'    => $this->request->getVar('contact_street'),
                    'contact_city'      => $this->request->getVar('contact_city'),
                    'contact_district'  => $this->request->getVar('contact_district'),
                    'contact_state'     => $this->request->getVar('contact_state'),
                    'contact_pincode'   => $this->request->getVar('contact_pincode'),
                    'contact_area'      => $this->request->getVar('contact_area'),
                    'distance'          => $this->request->getVar('distance'),
                    'latitude'  => $this->request->getVar('contact_latitude'),
                    'longitude' => $this->request->getVar('contact_longitude'),
                    // 'created_by'        => auth()->id(),
                    // 'modified_by'       => auth()->id()
                ];
                $customer_id = $this->customer->insert($customer_data);
            }
            return redirect()->to('customer/');
        }
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $json = $this->request->getJSON();
        $data = [
            'id' => $id,
            'item_code' => $json->item_code,
            'item_name' => $json->item_name,
            'description' => $json->description,
            'item_image' => $json->item_image,
            'basic_unit' => $json->basic_unit,
            'unit_rate' => $json->unit_rate,
            'rack_number' => $json->rack_number,
            'shelf_number' => $json->shelf_number,
            'critical_spare' => $json->critical_spare,
            'product_id' => $json->product,
            'product_model_id' => $json->product_model
        ];
        $affected_row = $this->model->update($id, $data);
        if($affected_row){
            return $this->respond($this->model->find($id));
        }
        else{
            return $this->fail($this->model->errors(), 400);
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $data = $this->model->find($id);
        if($data){
            $this->model->delete($id);
            $response = [
                'status' => 200,
                'message' => [
                    'success' => 'Spare deleted successfully'
                ]
            ];
            return $this->respondDeleted($response);
        }
        else{
            return $this->failNotFound('Spare not found');
        }
    }
}
