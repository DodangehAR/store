<?php
class UserController extends Controller
{
    public function SelectAll()
    {
        $model = $this->model('User');
        $users = $model->SelectAll();
        // $this->view('templates/header');
        $this->view('user/index', ['user' => $users]);
        // $this->view('templates/footer');
    }
    public function Select($id)
    {
        $model = $this->model('User');
        if ($id) {
            $user = $model->Select($id);
        }
        // $this->view('templates/header');
        $this->view('user/index', ['user' => $user]);
        // $this->view('templates/footer');
    }
    public function Insert()
    {
        $data = json_decode(file_get_contents("php://input"));
        $name = $data->name;
        $email = $data->email;
        $password = $data->password;
        $model = $this->model('User');
        if ($name) {
            $user = $model->Insert($name, $email, $password);
        }
        // $this->view('templates/header');
        $this->view('user/index', ['user' => $user]);
        // $this->view('templates/footer');
    }
    public function Update()
    {
        $data = json_decode(file_get_contents("php://input"));
        $id = $data->id;
        $name = $data->name;
        $model = $this->model('User');
        if ($name) {
            $user = $model->Update($id, $name);
        }
        // $this->view('templates/header');
        $this->view('user/index', ['user' => $user]);
        // $this->view('templates/footer');
    }
    public function Delete($id)
    {
        $model = $this->model('User');
        if ($id) {
            $user = $model->Delete($id);
        }
        // $this->view('templates/header');
        $this->view('user/index', ['user' => $user]);
        // $this->view('templates/footer');
    }
}
