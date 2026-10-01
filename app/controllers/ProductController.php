<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: ProductController
 * 
 * Automatically generated via CLI.
 */
class ProductController extends Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load_product_model();
        $this->call->view('ProductView', [
            'products' => $this->ProductModel->all(),
            'form_title' => 'Add product',
            'form_action' => site_url('products'),
            'product' => null,
        ]);
    }

    public function create()
    {
        $this->call->view('ProductView', [
            'products' => [],
            'form_title' => 'Add product',
            'form_action' => site_url('products'),
            'product' => null,
        ]);
    }

    public function store()
    {
        $this->load_product_model();
        $this->ProductModel->create($this->product_data());
        redirect('products');
    }

    public function edit($id)
    {
        $this->load_product_model();
        $product = $this->ProductModel->find($id);

        if (!$product) {
            redirect('products');
        }

        $this->call->view('ProductView', [
            'products' => $this->ProductModel->all(),
            'form_title' => 'Edit product',
            'form_action' => site_url('products/edit/' . (int) $id),
            'product' => $product,
        ]);
    }

    public function update($id)
    {
        $this->load_product_model();
        $this->ProductModel->change($id, $this->product_data());
        redirect('products');
    }

    public function delete($id)
    {
        $this->load_product_model();
        $this->ProductModel->remove($id);
        redirect('products');
    }

    private function load_product_model()
    {
        $this->call->database();
        $this->call->model('ProductModel');
    }

    private function product_data()
    {
        return [
            'product_name' => trim((string) $this->request->post('product_name')),
            'description' => trim((string) $this->request->post('description')),
            'price' => (float) $this->request->post('price'),
            'quantity' => (int) $this->request->post('quantity'),
        ];
    }
}