<?php
class Product
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    public function SelectAll()
    {
        $sql = "SELECT * FROM product";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }
    public function Select($id)
    {
        $sql = "SELECT * FROM product WHERE id = :id LIMIT 0,1";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(":id", $id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    }
    public function Insert($name, $image, $category_id)
    {
        $sql = "INSERT INTO product SET name = :name , image = :image , category_id = :category_id";
        $statement = $this->db->prepare($sql);
        $name = htmlspecialchars(strip_tags($name));
        $statement->bindParam(":name", $name);
        $statement->bindParam(":image", $image);
        $statement->bindParam(":category_id", $category_id);
        $statement->execute();
    }
    public function Update($id, $name)
    {
        $sql = "UPDATE product SET name = :name WHERE id = :id";
        $statement = $this->db->prepare($sql);
        $name = htmlspecialchars(strip_tags($name));
        $statement->bindParam(":id", $id);
        $statement->bindParam(":name", $name);
        $statement->execute();
    }
    public function Delete($id)
    {
        $sql = "DELETE FROM product WHERE id = :id";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(":id", $id);
        $statement->execute();
    }
}
