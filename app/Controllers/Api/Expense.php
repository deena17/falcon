<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\ExpenseModel;

class Expense extends ResourceController{

    public function index()
    {
        $model = new ExpenseModel();
        $data = $model->findAll();
        if($data)
            return $this->respond($data);
        return $this->failNotFound('No expenses found');
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $model = new ExpenseModel();
        $data = $model->find($id);
        if($data)
            return $this->respond($data);
        return $this->failNotFound('No expenses found');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $model = new ExpenseModel();
        $data = [
            'customer_id' => $this->request->getVar('customer'),
            'title' => $this->request->getVar('title'),
            'description' => $this->request->getVar('description'),
            'date' => $this->request->getVar('date'),
            'amount' => $this->request->getVar('amount'),
            'expense_by_id' => $this->request->getVar('expense'),
            'receipt' => $this->request->getVar('receipt')
        ];
        $insert_id = $model->insert($data);
        $response = [
            'status' => 200,
            'error' => false,
            'message' => 'Expense created successfully',
            'data' => $model->find($insert_id)
        ];
        return $this->respondCreated($response);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $model = new ExpenseModel();

        $data = [
            'id' => $id,
            'customer_id' => $this->request->getVar('customer'),
            'title' => $this->request->getVar('title'),
            'description' => $this->request->getVar('description'),
            'date' => $this->request->getVar('date'),
            'amount' => $this->request->getVar('amount'),
            'expense_by_id' => $this->request->getVar('expense'),
            'receipt' => $this->request->getVar('receipt')
        ];
        $model->update($id, $data);
        $response = [
            'status' => 200,
            'error' => false,
            'message' => 'Expense updated successfully'
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
        $data = $model->find($id);
        if($data){
            $model->delete($id);
            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'Expense deleted successfully'
                ];
            $this->respond($response);
        }
        else{
            return $this->failNotFound('No expense found');
        }
    }
}
