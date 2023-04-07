<?php
class ProductController extends Controller
{
    public function SelectAll()
    {
        $model = $this->model('Product');
        $products = $model->SelectAll();
        // $this->view('templates/header');
        $this->view('product/index', ['product' => $products]);
        // $this->view('templates/footer');
    }
    public function Select($id)
    {
        $model = $this->model('Product');
        if ($id) {
            $product = $model->Select($id);
        }
        // $this->view('templates/header');
        $this->view('product/index', ['product' => $product]);
        // $this->view('templates/footer');
    }
    public function Insert()
    {
        $data = json_decode(file_get_contents("php://input"));
        $name = $data->name;
        $image = $data->image;
        $category_id = $data->category_id;
        $model = $this->model('Product');
        if ($name) {
            $product = $model->Insert($name, $image, $category_id);
        }
        // $this->view('templates/header');
        $this->view('product/index', ['product' => $product]);
        // $this->view('templates/footer');
    }
    public function Update()
    {
        $data = json_decode(file_get_contents("php://input"));
        $id = $data->id;
        $status = $data->status;
        $model = $this->model('Product');
        if ($status) {
            $product = $model->Update($id, $status);
        }
        // $this->view('templates/header');
        $this->view('product/index', ['product' => $product]);
        // $this->view('templates/footer');
    }
    public function Delete($id)
    {
        $model = $this->model('Product');
        if ($id) {
            $product = $model->Delete($id);
        }
        // $this->view('templates/header');
        $this->view('product/index', ['product' => $product]);
        // $this->view('templates/footer');
    }
}
