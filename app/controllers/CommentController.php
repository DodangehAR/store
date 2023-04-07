<?php
class CommentController extends Controller
{
    public function SelectAll()
    {
        $model = $this->model('Comment');
        $comments = $model->SelectAll();
        // $this->view('templates/header');
        $this->view('comment/index', ['comment' => $comments]);
        // $this->view('templates/footer');
    }
    public function Select($id)
    {
        $model = $this->model('Comment');
        if ($id) {
            $comment = $model->Select($id);
        }
        // $this->view('templates/header');
        $this->view('comment/index', ['comment' => $comment]);
        // $this->view('templates/footer');
    }
    public function Insert()
    {
        $data = json_decode(file_get_contents("php://input"));
        $body = $data->body;
        $product_id = $data->product_id;
        $user_id = $data->user_id;
        $model = $this->model('Category');
        if ($body) {
            $comment = $model->Insert($body, $product_id, $user_id);
        }
        // $this->view('templates/header');
        $this->view('comment/index', ['comment' => $comment]);
        // $this->view('templates/footer');
    }
    public function Update()
    {
        $data = json_decode(file_get_contents("php://input"));
        $id = $data->id;
        $status = $data->status;
        $model = $this->model('Comment');
        if ($status) {
            $comment = $model->Update($id, $status);
        }
        // $this->view('templates/header');
        $this->view('comment/index', ['comment' => $comment]);
        // $this->view('templates/footer');
    }
    public function Delete($id)
    {
        $model = $this->model('Comment');
        if ($id) {
            $comment = $model->Delete($id);
        }
        // $this->view('templates/header');
        $this->view('comment/index', ['comment' => $comment]);
        // $this->view('templates/footer');
    }
}
