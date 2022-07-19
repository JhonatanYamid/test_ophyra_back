<?php
require_once PROJECT_ROOT_PATH . "/Model/Database.php";
class Products
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getAll($start = 0, $limit = 5)
    {
        $stmt = $this->db->prepare("SELECT * FROM tbl_products LIMIT ?,?");
        $stmt->bind_param('ii', $start, $limit);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    public function insert($title, $price, $description, $image)
    {
        $stmt = $this->db->prepare("INSERT INTO tbl_products (price, description, title, image) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('isss', $price, $description, $title, $image);
        $stmt->execute();
        return array('response' => 'Success');
    }

    public function update($id, $title, $price, $description, $image)
    {
        $stmt = $this->db->prepare("UPDATE tbl_products SET price=?,description=?,title=?, image=? WHERE id = ?");
        $stmt->bind_param('ssssi', $price, $description, $title, $image, $id);
        $stmt->execute();
        return array('response' => 'Success');
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM tbl_products WHERE id =  ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        return array('response' => 'Success');
    }
}
