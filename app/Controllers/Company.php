<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CompanyModel;

class Company extends BaseController{

    public $data = [];

    protected $viewsFolder = '\App\Views\company';

    public function __construct(){
        helper(['url', 'form']);
        $this->company = new CompanyModel();
    }

    public function index()
    {
        $this->data['pageTitle'] = 'Company List';
        $this->data['company'] = $this->company->findAll();
        return view($this->viewsFolder.'/'.'list', $this->data);
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
            return $this->failNotFound('Company details not found');
        }
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $this->data['pageTitle'] = 'New company';
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            return view($this->viewsFolder.'/'.'add', $this->data);
        }

        $rules = [
            'name' => 'required',
            'phone' => 'required',
            'street' => 'required',
            'city' => 'required',
            'district' => 'required',
            'state' => 'required',
            'pincode' => 'required',
            'email' => 'required'
        ];

        $messages = [
            'name' => [
                'required' => 'Please enter company name'
            ],
            'phone' => [
                'required' => 'Please enter phone number'
            ]
        ];

        if(!$this->validate($rules, $messages)){
            return view(
                $this->viewsFolder.'/'.'add',
                $this->data,
                [$this->validator]
            );
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'phone' => $this->request->getPost('phone'),
            'landline' => $this->request->getPost('landline'),
            'street' => $this->request->getPost('street'),
            'city' => $this->request->getPost('city'),
            'district' => $this->request->getPost('district'),
            'state' => $this->request->getPost('state'),
            'pincode' => $this->request->getPost('pincode'),
            'email' => $this->request->getPost('email'),
            'website' => $this->request->getPost('website'),
            'pan_number' => $this->request->getPost('pan_number'),
            'gst_number' => $this->request->getPost('gst_number'),
            'logo' => $this->request->getPost('logo'),
            'is_active' => $this->request->getPost('is_active')
        ];
        $id = $model->company($data);
        if($id){
            return redirect()->to('company');
        }
        else{
            return $this->fail($this->model->errors(), 400);
        }
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id=null)
    {
        $this->data['pageTitle'] = 'New company';
        $this->data['company'] = $this->company->where('id', $id)->first();
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            return view($this->viewsFolder.'/'.'edit', $this->data);
        }
        $json = $this->request->getJSON();
        $data = [
            'id' => $id,
            'name' => $json->name,
            'phone' => $json->phone,
            'landline' => $json->landline,
            'street' => $json->street,
            'city' => $json->city,
            'district' => $json->district,
            'state' => $json->state,
            'pincode' => $json->pincode,
            'email' => $json->email,
            'website' => $json->website,
            'pan_number' => $json->pan_number,
            'gst_number' => $json->gst_number,
            'logo' => $json->logo, 
            'is_active' => $json->is_active
        ];
        $affected_row = $model->update($id, $data);
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
                    'success' => 'Company details deleted successfully'
                ]
            ];
            return $this->respondDeleted($response);
        }
        else{
            return $this->failNotFound('Company details not found');
        }
        
    }
}
