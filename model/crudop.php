<?php

class users{

    //for database conection
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname ="rand";

    public $conn;

    public function __construct()
    {
        $this->conn=new mysqli($this->host, $this->username,$this->password, $this->dbname);

        if(mysqli_connect_error())
        {
            echo "connection error";
        }

        //echo "connection successful";
        return $this->conn;
    }

    function insert_data($fileName)
    {
        $fname = $this->conn->real_escape_string($_POST['fname']);
        $lname = $this->conn->real_escape_string($_POST['lname']);
        $age = $this->conn->real_escape_string($_POST['age']);
        $gender = $this->conn->real_escape_string($_POST['gender']);
        $photo = $this->conn->real_escape_string($fileName);
       //print_r($_FILES);
    
        

        
            $query = "INSERT INTO users (first_name, last_name, age, gender, photo)
                  VALUES ('$fname', '$lname', $age, '$gender', '$photo')";

            $sql = $this->conn->query($query);

            if($sql==TRUE){
                
                echo "insert successful";
            }
            else{
                echo "Error: " . $sql . "<br>" . $this->conn->error;
            }
        }

        function display_alldata()
        {
            
            $query = "SELECT * FROM users";

            $result = $this->conn->query($query);

            $users=[];

           while($row = mysqli_fetch_assoc($result)){
            		array_push($users, $row);
            	}

            return $users;            

        }

        function display_userby_id($id)
        {
            $query = "SELECT * FROM users WHERE id = {$id}";
            $result = $this->conn->query($query);
            $row = mysqli_fetch_assoc($result);

            return $row;




        }

        function update_user($users)
        {   
            $query ="UPDATE users SET first_name='{$users['fname']}', last_name='{$users['lname']}', 
                     age='{$users['age']}', gender='{$users['gender']}', photo='{$users['photo']}'
                     WHERE id = {$users['id']}";

            $sql = $this->conn->query($query);

            if(!$sql==TRUE){
                
                echo "Error: " . $sql . "<br>" . $this->conn->error;
                return false;
            }
            
            return true;

        }

        function delete_user($id){

            $query ="DELETE FROM users WHERE id = '{$id}' ";
            $sql = $this->conn->query($query);

            if($sql =!TRUE)
            {
                echo "Error: " . $sql . "<br>" . $this->conn->error;
                return false;
            }

            return true;
           


        }

}

?>