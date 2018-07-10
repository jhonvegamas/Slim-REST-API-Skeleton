<?php
namespace App\Model;

use App\Lib\Database;
use App\Lib\Response;

class TestModel
{
    private $db;
    private $table = 'test';
    private $response;

    public function __CONSTRUCT()
    {
        $this->db       = Database::StartUp();
        $this->response = new Response();
    }

    public function getAll()
    {
        try
        {
            $result = array();

            $stm = $this->db->prepare("SELECT * FROM $this->table");
            $stm->execute();

            $this->response->setResponse(true);
            $this->response->result = $stm->fetchAll();

            return $this->response;
        } catch (Exception $e) {
            $this->response->setResponse(false, $e->getMessage());
            return $this->response;
        }
    }

    public function get($value)
    {
        try
        {
            $result = array();

            $stm = $this->db->prepare("SELECT * FROM $this->table WHERE id = ?");
            $stm->execute(array($value));

            $this->response->setResponse(true);
            $this->response->result = $stm->fetch();

            return $this->response;
        } catch (Exception $e) {
            $this->response->setResponse(false, $e->getMessage());
            return $this->response;
        }
    }

    public function insert($data)
    {

        $id         = $data['id'];
        $first_name = $data['first_name'];
        $last_name  = $data['last_name'];
        $email      = $data['email'];
        $password   = $data['password'];

        $query = "INSERT INTO $this->table (id, first_name, last_name, email, password) VALUES (:id, :first_name, :last_name, :email, :password)";

        try {

            $stmt = $this->db->prepare($query);
            $stmt->bindParam("id", $id);
            $stmt->bindParam("first_name", $first_name);
            $stmt->bindParam("last_name", $last_name);            
            $stmt->bindParam("email", $email);
            $stmt->bindParam("password", $password);            
            $stmt->execute();

            $this->response->setResponse(true, 'Successfully Insertion');
            $this->response->result = "";
        } catch (Exception $e) {
            $this->response->setResponse(false, $e->getMessage());
        }
        return $this->response;
    }

    public function update($data)
    {
        $id         = $data['id'];
        $first_name = $data['first_name'];
        $last_name  = $data['last_name'];
        $email      = $data['email'];
        $password   = $data['password'];

        $query = "UPDATE $this->table SET id = :id, first_name = :first_name, last_name = :last_name, email = :email, password = :password";

        try {

            $stmt = $this->db->prepare($query);
            $stmt->bindParam("id", $id);
            $stmt->bindParam("first_name", $first_name);
            $stmt->bindParam("last_name", $last_name);            
            $stmt->bindParam("email", $email);
            $stmt->bindParam("password", $password);            
            $stmt->execute();

            $this->response->setResponse(true, "Successfully Updated");
            $this->response->result = "";
            return $this->response;

        } catch (Exception $e) {
            $this->response->setResponse(false, $e->getMessage());
        }
    }

    public function delete($id)
    {
        $query = "DELETE FROM $this->table WHERE id = :id";
        try {

            $stmt = $this->db->prepare($query);
            $stmt->bindParam("id", $id);
            $stmt->execute();

            $this->response->setResponse(true, "Successfully Deleted");
            $this->response->result = "";
            return $this->response;

        } catch (Exception $e) {
            $this->response->setResponse(false, $e->getMessage());
        }
    }    
}
