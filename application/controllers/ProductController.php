<?php
class ProductController extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('CategoryModel','category');
        $this->load->model('ProductModel','product');
    }

    /**
     * initiate creating product
     * Route GET /proudct/create
     */
    public function create(){
        $product = new Product;

        $categories = $this->prepareCategory();

        $data['product'] = $product;
        $data['categories'] = $categories;
        $this->render('create',$data);
    }

    /**
     * @param product id
     * GET /product/edit/{id}
     */
    public function edit(){
        $id = filter_var($this->uri->segment(3),FILTER_VALIDATE_INT);

        $product = $this->product->find($id);

        $categories = $this->prepareCategory();

        $data['product'] = $product;
        $data['categories'] = $categories;
        $this->render('create',$data);

    }
    /**
     * save product to db
     * POST /product/save
     */
    public function save(){
        $product = $this->bindFormValues($this->input->post());
        $this->product->save($product);

        $this->redirectTo('all');
    }

    public function delete(){
        $id = filter_var($this->uri->segment(3),FILTER_VALIDATE_INT);
        $this->product->delete($id);

        $this->redirectTo('all');
    }
    /**
     * Get all producsts
     * Route GET : product/all
     */
    public function all(){
        $products = $this->product->getProducts();

        $data['products'] = $products;

        $this->render('list', $data);
    }


    /******** HELPER METHODS **********/
    /**
     * Converts array of objects to Key Value pair for combo
     * @param array of objects
     * @return associative array
     */

    private function prepareCategory(){
        $categories = $this->category->getCategories();
        $categories = $this->generateKeyValue($categories);
        return $categories;
    }
    private function generateKeyValue($array){
        $result = array();
        foreach ($array as $key => $value) {
            $result[$value->category_id] = $value->category_name;
        }
        return $result;
    }

    private function bindFormValues($fields){
        $allowed_fields = array('product_category_id','product_id', 'product_name','product_description','product_price');
        $product = new Product;

        foreach ($fields as $key => $value) {
            if(in_array($key,$allowed_fields)){
                $product->$key = $fields[$key];
            }
        }
        return $product;
    }

    private function render($view, $viewmodel){
        $this->load->view('products/'.$view, $viewmodel);
    }

    private function redirectTo($path){
        redirect('/product/'.$path,'refresh');
    }
}
