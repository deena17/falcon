<?php

namespace App\Controllers\Masters;

use CodeIgniter\RESTful\ResourceController;
use App\Models\ActivityModel;

class Activity extends ResourceController
{
    protected $format = 'json';

    public function index()
    {
        $model = new ActivityModel();
        $data = $model->findAll();
        if($data){
            return $this->respond($data);
        }
        else{
            return $this->failNotFound('No activity found');
        }
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $model = new ActivityModel();
        $data = $model->where('id', $id)->find();
        return $this->respond($data);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $model = new ActivityModel();
        $json = $this->request->getJSON();
        $data = [
            'type' => $json->type
        ];
        $model->insert($data);
        $response = [
            'status' => 200,
            'message' => [
                'success' => 'Activity added successfully'
            ]
        ];
        return $this->respondCreated($response);
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $model = new ActivityModel();
        $data = $model->find($id);
        return $this->repond($data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $model = new ActivityModel();
        $json = $this->request->getJSON();
        $data = [
            'type' => $json->type
        ];
        $model->update($id, $data);
        $response = [
            'status' => 200,
            'message' => [
                'success' => 'Activity updated successfully'
            ]
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
        $model = new ActivityModel();
        $data = $model->find($id);
        if($data){
            $model.delete($id);
            $response = [
                'status' => 200,
                'message' => [
                    'success' => 'Activity deleted successfully'
                ]
            ];
        }
    }
}
