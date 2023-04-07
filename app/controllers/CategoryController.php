<?php
class CategoryController extends Controller
{
    public function SelectAll()
    {
        $model = $this->model('Category');
        $categories = $model->SelectAll();
        // $this->view('templates/header');
        $this->view('category/index', ['category' => $categories]);
        // $this->view('templates/footer');
    }
    public function Select($id)
    {
        $model = $this->model('Category');
        if ($id) {
            $category = $model->Select($id);
        }
        // $this->view('templates/header');
        $this->view('category/index', ['category' => $category]);
        // $this->view('templates/footer');
    }
    public function Insert()
    {
        $data = json_decode(file_get_contents("php://input"));
        $title = $data->title;
        $model = $this->model('Category');
        if ($title) {
            $category = $model->Insert($title);
        }
        // $this->view('templates/header');
        $this->view('category/index', ['category' => $category]);
        // $this->view('templates/footer');
    }
    public function Update()
    {
        $data = json_decode(file_get_contents("php://input"));
        $id = $data->id;
        $title = $data->title;
        $model = $this->model('Category');
        if ($title) {
            $category = $model->Update($id, $title);
        }
        // $this->view('templates/header');
        $this->view('category/index', ['category' => $category]);
        // $this->view('templates/footer');
    }
    public function Delete($id)
    {
        $model = $this->model('Category');
        if ($id) {
            $category = $model->Delete($id);
        }
        // $this->view('templates/header');
        $this->view('category/index', ['category' => $category]);
        // $this->view('templates/footer');
    }
}
