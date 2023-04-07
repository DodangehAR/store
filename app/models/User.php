<?php
class User
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    public function SelectAll()
    {
        $sql = "SELECT * FROM user";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }
    public function Select($id)
    {
        $sql = "SELECT * FROM user WHERE id = :id LIMIT 0,1";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(":id", $id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    }
    public function Insert($name, $email, $password)
    {
        $sql = "INSERT INTO user SET name = :name , email = :email , password = :password";
        $statement = $this->db->prepare($sql);
        $name = htmlspecialchars(strip_tags($name));
        $statement->bindParam(":name", $name);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":password", $password);
        $statement->execute();
    }
    public function Update($id, $name)
    {
        $sql = "UPDATE user SET name = :name WHERE id = :id";
        $statement = $this->db->prepare($sql);
        $name = htmlspecialchars(strip_tags($name));
        $statement->bindParam(":id", $id);
        $statement->bindParam(":name", $name);
        $statement->execute();
    }
    public function Delete($id)
    {
        $sql = "DELETE FROM user WHERE id = :id";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(":id", $id);
        $statement->execute();
    }
}
