<?php
class Comment
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    public function SelectAll()
    {
        $sql = "SELECT * FROM comment";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }
    public function Select($id)
    {
        $sql = "SELECT * FROM comment WHERE id = :id LIMIT 0,1";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(":id", $id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    }
    public function Insert($body, $product_id, $user_id)
    {
        $sql = "INSERT INTO comment SET body = :body , product_id = :product_id , user_id = :user_id";
        $statement = $this->db->prepare($sql);
        $body = htmlspecialchars(strip_tags($body));
        $statement->bindParam(":body", $body);
        $statement->bindParam(":product_id", $product_id);
        $statement->bindParam(":user_id", $user_id);
        $statement->execute();
    }
    public function Update($id, $status)
    {
        $sql = "UPDATE comment SET status = :status WHERE id = :id";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(":id", $id);
        $statement->bindParam(":status", $status);
        $statement->execute();
    }
    public function Delete($id)
    {
        $sql = "DELETE FROM comment WHERE id = :id";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(":id", $id);
        $statement->execute();
    }
}
