<?php
class Category
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    public function SelectAll()
    {
        $sql = "SELECT * FROM category";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }
    public function Select($id)
    {
        $sql = "SELECT * FROM category WHERE id = :id LIMIT 0,1";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(":id", $id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    }
    public function Insert($title)
    {
        $sql = "INSERT INTO category SET title = :title";
        $statement = $this->db->prepare($sql);
        $title = htmlspecialchars(strip_tags($title));
        $statement->bindParam(":title", $title);
        $statement->execute();
    }
    public function Update($id, $title)
    {
        $sql = "UPDATE category SET title = :title WHERE id = :id";
        $statement = $this->db->prepare($sql);
        $title = htmlspecialchars(strip_tags($title));
        $statement->bindParam(":id", $id);
        $statement->bindParam(":title", $title);
        $statement->execute();
    }
    public function Delete($id)
    {
        $sql = "DELETE FROM category WHERE id = :id";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(":id", $id);
        $statement->execute();
    }
}
