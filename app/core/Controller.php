<?php
class Controller
{
    protected $dsn = "mysql";
    protected $host = "127.0.0.1";
    protected $db_name = "shop";
    protected $username = "root";
    protected $password = "";

    public function getDB()
    {
        return new PDO($this->dsn . ":host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
    }
    protected function model($model)
    {
        require_once '/xampp/htdocs/projects/Shop_MVC/app/models/' . $model . '.php';
        return new $model($this->getDB());
    }

    protected function view($view, $data = [])
    {
        require_once '/xampp/htdocs/projects/Shop_MVC/app/views/' . $view . '.php';
    }
}
