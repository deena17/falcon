<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\ProductItemModel;
use App\Models\SupplierModel;
use CodeIgniter\Files\File;

class Model extends BaseController
{
    public $data = [];

    protected $viewsFolder = '\App\Views\product_models';

    public function __construct()
    {
        helper(['form', 'url']);
        $this->ionAuth = new \App\Libraries\IonAuth();
        $this->engineer = $this->ionAuth->user()->row();
        $this->product = new ProductModel();
        $this->model = new ProductItemModel();
        $this->supplier = new SupplierModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $this->data['pageTitle'] = 'Product Models';
        $this->data['models'] = $this->model->findAll();
        return view($this->viewsFolder.'/'.'list', $this->data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $this->data['pageTitle'] = 'View product model';
        $this->data['model'] = $this->model->where('id', $id)->first();
        return view($this->viewsFolder.'/'.'view', $this->data);
    }


    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        // if(!$this->ionAuth->checkPermission('add_master')){
        //     return view('auth/403', ['pageTitle' => 'Access Denined']);
        // }
        $this->data['pageTitle'] = 'Add Product Model';
        $this->data['product'] = $this->product->findAll();
        $this->data['model'] = $this->model->findAll();
        $this->data['supplier'] = $this->supplier->findAll();
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            return view($this->viewsFolder.'/'.'add', $this->data);
        }
        else{
            $rules = [
                'product' => 'required',
                'model' => 'required',
                'description' => 'required',
                'product_image' => [
                    'uploaded[product_image]',
                    'is_image[product_image]',
                    'mime_in[product_image,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    // 'max_size[product_image,1000]',
                    // 'max_dims[product_image,1024,768]',
                ],
            ];
            $messages = [
                'product' => [
                    'required' => 'Product required'
                ],
                'model' => [
                    'required' => 'Model name required'
                ],
                'description' => [
                    'required' => 'description required'
                ]
            ];
            $validation = $this->validate($rules, $messages);
            if(!$validation){
                print_r('welcome');
                return view(
                    $this->viewsFolder.'/'.'add',
                    $this->data,
                    [$this->validator]
                );
            }
            else{
                $img = $this->request->getFile('product_image');

                if (! $img->hasMoved()) {
                    $filepath = WRITEPATH . 'uploads/models/' . $img->store();

                    $fileData = new File($filepath);

                    $data = [
                        'product_id' => $this->request->getPost('product'),
                        'name' => $this->request->getPost('model'),
                        'description' => $this->request->getPost('description'),
                        'specification' => $this->request->getPost('specification'),
                        'dimensions' => $this->request->getPost('dimension'),
                        'weight' => $this->request->getPost('currency'),
                        'supplier' => $this->request->getPost('unit_price'),
                        'image' => 'writable/uploads/models/'.$fileData->getBaseName()
                        
                    ];
                    $id = $this->model->insert($data);
                    if($id){
                        if(!empty($this->request->getPost('related'))){
                            $related = $this->request->getPost('related');
                            $productRelated = new \App\Models\ProductRelatedModel();
                            foreach ($related as $key => $value) :
                                $data = [
                                    'related' => $value,
                                    'product' => $id
                                ];
                                $productRelated->insert($data);
                            endforeach;
                            return redirect()->to('master/product-models');
                        }
                    }
                    
                }

            }
        }

        return view('product_models/add', $this->data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $model = new ProductItemModel();
        $data = [
            'id' => $id,
            'product_id' => $this->request->getVar('product'),
            'product_model_id' => $this->request->getVar('product_model'),
            'description' => $this->request->getVar('description'),
            'specification' => $this->request->getVar('specification'),
            'quantity' => $this->request->getVar('quantity'),
            'weight' => $this->request->getVar('weight'),
            'image' => $this->request->getVar('image'),
            'supplier' => $this->request->getVar('supplier')
        ];
        $model->update($id, $data);
        $response = [
            'status' => 200,
            'error' => false,
            'message' => 'Product item updated successfully',
            'data' => $data
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
        $model = new ProductItemModel();
        $data = $model->find($id);
        if($data){
            $model->delete($id);
            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'Product item deleted successfully'
            ];
            $this->respondDeleted($response);
        }
        else{
            return $this->failNotFound('No item found');
        }
    }

    public function getModelByProduct($product){
        $data = $this->model->getModelByProduct($product);
        echo json_encode($data);
    }
}
