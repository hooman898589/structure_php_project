<?php
namespace Model;
require_once 'vendor/autoload.php';
use Conn\pdo;

trait crud {
    protected $table;


    public function set_setting($table,$filable){
        $conn=new pdo();
        $conn=$conn->getConnection();
        $this->filable=$filable;
        $this->conn=$conn;
        $this->table=$table;
        
    }

    public   function create($data) {
    
        $fields = implode(",", array_values($this->filable));
     
        $placeholders =  implode(",", array_values($data));
        
        $sql = "INSERT INTO " . $this->table . " ($fields) VALUES ($placeholders)";
        
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute();
    }

    public  function update($id, $data) {
        $set = "";
        foreach ($data as $key => $value) {
            $set .= "$key = :$key, ";
        }
        $set = rtrim($set, ", ");
        $sql = "UPDATE " . $this->table . " SET $set WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $data['id'] = $id;
        return $stmt->execute($data);
    }

    public  function updateByslug($slug, $data) {
        $set = "";
        foreach ($data as $key => $value) {
            $set .= "$key = :$key, ";
        }
        $set = rtrim($set, ", ");
        $sql = "UPDATE " . $this->table . " SET $set WHERE slug = :slug";
        $stmt = $this->conn->prepare($sql);
        $data['slug'] = $slug;
        return $stmt->execute($data);
    }

    public  function destroy($id) {
        $sql = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }

    public  function destroyByslug($slug) {
        $sql = "DELETE FROM " . $this->table . " WHERE slug = :slug";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['slug' => $slug]);
    }

    public  function all() {
        
        $sql = "SELECT * FROM " . $this->table;
        return $this->conn->query($sql)->fetchAll();
    }

    public  function where($field1, $separator, $field2) {
        $sql1 = " WHERE $field1 $separator '$field2'";
        $this->sql1=$sql1;
 
    }

    public  function limit($limit, $offset) {
        $sql2 = " LIMIT $limit OFFSET $offset ";
        $this->sql2=$sql2;
    }

    public  function join($table, $field1, $separator, $field2) {
        $sql3 = 
               " INNER JOIN $table ON $field1 $separator $field2";
        $this->sql3=$sql3;
    }

    public  function select() {

        $sql1=!empty($this->sql1) ? $this->sql1 : "";
        $sql2=!empty($this->sql2) ? $this->sql2 : "";
        $sql3=!empty($this->sql3) ? $this->sql3 : "";

        $query=$sql3.$sql1.$sql2;
        $query="SELECT * FROM ".$this->table."".$query;

        $stm=$this->conn->prepare($query);
        $stm->execute();
        $data=$stm->fetchAll();

        return $data;
    }

}



