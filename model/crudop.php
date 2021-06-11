<?php
session_start();

class users{
    //for database conection
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname ="rand";
    public $conn;

    public function __construct(){
        $this->conn=new mysqli($this->host, $this->username,$this->password, $this->dbname);
        if(mysqli_connect_error())
        {
            echo "connection error";
        }
        return $this->conn;
    }

    function insert_data($users){
        $fname = $this->conn->real_escape_string($users['fname']);
        $lname = $this->conn->real_escape_string($users['lname']);
        $age = $this->conn->real_escape_string($users['age']);
        $gender = $this->conn->real_escape_string($users['gender']);
        $photo = $this->conn->real_escape_string($users['fileName']);
       //print_r($_FILES);
            $query = "INSERT INTO users (first_name, last_name, age, gender, photo)
                      VALUES ('$fname', '$lname', $age, '$gender', '$photo')";

            $sql = $this->conn->query($query);
            if(!$sql==TRUE){
                //echo "Error: " . $sql . "<br>" . $this->conn->error;
                return false;
            }
            return true;
        }
        
        function set_insertError($msg){
            if(empty($msg)){
                $msg = ""; 
            }
            $_SESSION['insmessage']=$msg;

        }
        function show_insertError(){
            if(isset($_SESSION['insmessage'])){
                echo $_SESSION['insmessage'];
                unset($_SESSION['insmessage']);
            }
        }

        function display_alldata(){   
            $query = "SELECT * FROM users";
            $result = $this->conn->query($query);
            $users=[];

            while($row = mysqli_fetch_assoc($result)){
            		array_push($users, $row);
            	}
            return $users;            
        }

        function display_userby_id($id){
            $query = "SELECT * FROM users WHERE id = {$id}";
            $result = $this->conn->query($query);
            $row = mysqli_fetch_assoc($result);
            return $row;
        }

        function update_user($users){   
            $query ="UPDATE users 
                     SET 
                        first_name='{$users['fname']}', last_name='{$users['lname']}', 
                        age='{$users['age']}', gender='{$users['gender']}'
                     WHERE 
                        id = {$users['id']}";

            $sql = $this->conn->query($query);
            if(!$sql==TRUE){     
                echo "Error: " . $sql . "<br>" . $this->conn->error;
                return false;
            }  
            return true;
        }

        function profilepic_change($user_pic){
            $query ="UPDATE users 
                     SET 
                        photo='{$user_pic['photo']}'
                     WHERE
                        id = {$user_pic['id']}";

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
            if(!$sql==TRUE){
                echo "Error: " . $sql . "<br>" . $this->conn->error;
                return false;
            }
            return true;
        }

        function set_message($fmsg, $lmsg, $amsg ){
            if(empty($fmsg)){
                $fmsg = ""; //for first name
            }
            if(empty($lmsg)){
                $lmsg = ""; //for last name
            }
            if(empty($amsg)){
                $amsg = ""; // for age
            }
            $_SESSION['fmessage']=$fmsg;
            $_SESSION['lmessage']=$lmsg;
            $_SESSION['amessage']=$amsg;
        }

        function set_photoMessage($pmsg){
            if(empty($pmsg)){
                $pmsg = ""; //for photo
            }
            $_SESSION['pmessage']=$pmsg;
        }

        //for photo error
        function show_pmessage(){
            if(isset($_SESSION['pmessage'])){
                echo $_SESSION['pmessage'];
                unset($_SESSION['pmessage']);
            }
        }

        //for first name error
        function show_fmessage(){
            if(isset($_SESSION['fmessage'])){
                echo $_SESSION['fmessage'];
                unset($_SESSION['fmessage']);
            }
        }

        //for last name error
        function show_lmessage(){
            if(isset($_SESSION['lmessage'])){
                echo $_SESSION['lmessage'];
                unset($_SESSION['lmessage']);
            }
        }

        //for age error
        function show_amessage(){
            if(isset($_SESSION['amessage'])){
                echo $_SESSION['amessage'];
                unset($_SESSION['amessage']);
            }
        }
}
