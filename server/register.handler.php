
<?php
session_start();
require_once('../connection/connect.php');
if(isset($_POST['register']))

{
    if(isset($_POST['first_name'],$_POST['last_name'],$_POST['email'],$_POST['pwd'])&& !empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email']) && !empty($_POST['pwd']))
    {
        $firstName = trim($_POST['first_name']);
        $lastName = trim($_POST['last_name']);
        $email = trim($_POST['email']);
        $password = trim($_POST['pwd']);
        $is_admin = 0;
       
        
        
        $options = array("cost"=>4);
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);
       
 
        if(filter_var($email, FILTER_VALIDATE_EMAIL))
		{
            $sql = 'SELECT * FROM users WHERE email = :email';
            $stmt = $conn->prepare($sql);
            $p = ['email'=>$email];
            $stmt->execute($p);
            
            if($stmt->rowCount() == 0)
            {
                $sql = "INSERT INTO users (first_name, last_name, email, pwd,is_admin) values(:fname,:lname,:email,:pass,:is_admin)";
            
                try{
                    $handle = $conn->prepare($sql);
                    $params = [
                        ':fname'=>$firstName,
                        ':lname'=>$lastName,
                        ':email'=>$email,
                        ':pass'=>$hashPassword,
                       ':is_admin'=>$is_admin,
                                        ];
                    
                    $handle->execute($params);
                    
                    $success = 'User has been created successfully';
                    header('location:../login.php'); 
                    exit(); 
                    
                }
                catch(PDOException $e){
                    $errors[] = $e->getMessage();{}
                }
            }
            else
            {
                $valFirstName = $firstName;
                $valLastName = $lastName;
                $valEmail = '';
                $valPassword = $password;
 
                $errors[] = 'Email address already registered';
            }
        }
        else
        {
            $errors[] = "Email address is not valid";
        }
    }
    else
    {
        if(!isset($_POST['first_name']) || empty($_POST['first_name']))
        {
            $errors[] = 'First name is required';
        }
        else
        {
            $valFirstName = $_POST['first_name'];
        }
        if(!isset($_POST['last_name']) || empty($_POST['last_name']))
        {
            $errors[] = 'Last name is required';
        }
        else
        {
            $valLastName = $_POST['last_name'];
        }
 
        if(!isset($_POST['email']) || empty($_POST['email']))
        {
            $errors[] = 'Email is required';
        }
        else
        {
            $valEmail = $_POST['email'];
        }
 
        if(!isset($_POST['pwd']) || empty($_POST['pwd']))
        {
            $errors[] = 'Password is required';
        }
        else
        {
            $valPassword = $_POST['pwd'];
        }
        
    }
    }