<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\NoteModel;

class Note extends ResourceController{

    public function index()
    {
        $model = new NoteModel();
        $customer = $this->request->getVar('customer');
        if($customer){
            $data = $model->where('customer_id', $customer)->find();
            $data = $model->getCustomerNotes($customer);
            if($data){
                $response = [
                    'status' => 200,
                    'error' => false,
                    'message' => 'Notes retrived successfully',
                    'data' => $data
                ];
            }
            else{
                $response = [
                    'status' => 404,
                    'error' => true,
                    'message' => "Notes not found with customer id=$customer"
                ];
            }
        }
        else{
            $data = $model->findAll();
            if($data){
                $response = [
                    'status' => 200,
                    'error' => false,
                    'message' => 'Notes retrived successfully',
                    'data' => $data
                ];
            }
            else{
                $response = [
                    'status' => 404,
                    'error' => true,
                    'message' => "Notes not found"
                ];
            }
        }
        
        return $this->respond($response);
    }

    public function customerNote(){
        $model = new NoteModel();
        $customer = $this->request->getVar('customer');
        $data = $model->getCustomerNotes($customer);
        if($data){
            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'Notes retrived successfully',
                'data' => $data
            ];
        }
        else{
            $response = [
                'status' => 404,
                'error' => true,
                'message' => "Notes not found with customer id=$customer"
            ];
        }
        return $this->respond($response);
    }
    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $model = new NoteModel();
        $data = $model->find($id);
        if($data){
            $response = [
                'status' => 200,
                'error' => false,
                'message' => "Note found with id=$id",
                'data' => $data
            ];
        }
        else{
            $response = [
                'status' => 404,
                'error' => ture,
                'message' => "Note not found with id=$id",
            ];
        }
        return $this->respond($response);
    }


    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $model = new NoteModel();
        $data = [
            'customer_id' => $this->request->getVar('customer'),
            'note' => $this->request->getVar('note'),
            'date' => $this->request->getVar('date'),
        ];
        $insert_id = $model->insert($data);
        if($insert_id){
            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'Note created successfully',
                'data' => $model->find($insert_id)
            ];
        }
        else{
            $response = [
                'status' => 404,
                'error' => true,
                'message' => $model->errors()
            ];
        }
        return $this->respondCreated($response);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $model = new NoteModel();
        $data = [
            'id' => $id,
            'customer_id' => $this->response->getVar('customer'),
            'note' => $this->response->getVar('note'),
            'date' => $this->request->getVar('date'),
        ];
        $affected_row = $model->update($id, $data);
        if($affected_row){
            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'Note updated successfully',
                'data' => $model->find($id)
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
        $model = new NoteModel();
        $data = $model->find($id);
        if($data){
            $model->delete($id);
            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'Note details deleted successfully'
                ];
        }
        else{
            $response = [
                'status' => 404,
                'error' => true,
                'message' => 'Note details not found'
            ];
        }
        $this->respondDeleted($response);
    }
}
