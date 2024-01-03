<?php
class Database{
    
    private $servername="localhost";
    private $username="root";
    private $password="";
    private $dbname="mydb";
    private $conn;

    function __construct(){
        
        $this->conn = new mysqli($this->servername,$this->username,$this->password,$this->dbname);

        if(!$this->conn){
            echo mysqli_error();
        }
    }
    public function addData($data){
        $name = $data['taskName'];
       $sql = "insert into task (task_name) values ('$name')";
       $result = $this->conn->query($sql);
       if($result){
        header('location:view.php');
       }
       else{
        echo "error";
       }
    }

    public function displayData(){
        $sql="select * from task";
        $result = $this->conn->query($sql);
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }
            return $data;
        }
    }
    public function deleteData($id){
        $sql = "delete from task where task_id='$id'";
        $result=$this->conn->query($sql);
        if($result){
            header('location:view.php');
        }
        else{
            echo "error while deleting";
        }
    }

    public function displayDataById($id){
        $sql="select * from task where task_id='$id'";
        $result= $this->conn->query($sql);
        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            return $row;
        }

    }
    public function updateData($name, $id){
       $sql = "update task set task_name = '$name' where task_id='$id'";
       $result = $this->conn->query($sql);
       if($result){
        header('location:view.php');
       }
       else{
        echo "error";
       }
    }

}
?>