<?php
include '../../config/database.php';
session_start();

if(isset($_POST['nameubtn'])){
$name = $_POST['update name'];
$name_regex ='/^[a-zA-Z]+( [a-zA-Z]+)*$/';
if(!$name){ 
    $flag= true;
$_SESSION["name_error"] = "name field is required!!";
header("location: ../ settings.php");
}else if(!preg_match($name_regex,$name)){ $flag= true;
    $_SESSION["name_error"] = "name is in-valid!!";
    header("location: ../settings.php");
}else{
    $id = $_SESSION['author_id'];
$namequery = "UPDATE  users SET name= '$name' WHERE  id= '$id'";
 $result = mysqli_query($db,$namequery);

$_SESSION['author_name'] = $name;
$_SESSION['name_update'] = 'name update sussessful';
header('location: settings.php');
}
//  email update
if(isset($_POST['emailubtn'])){
    $email = $_POST['update email'];
    $email_regex ='/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    if(!$email){ $flag= true;
        $_SESSION["email_error"] = "email field is required!!";
        header("location:../settings.php");
    }else if(!preg_match($email_regex,$email)){ $flag= true;
        $_SESSION["email_error"] = "email is in-valid!!";
        header("location:../settings.php");
        
    }else{
        $email_match_query = "SELECT * FROM'users' WHERE email = '$email'";
        $connect = mysqli_query($db,$email_match_query);
        $emailmatch = mysqli_num_rows($connect);

        if($emailmatch > 0){
            $_SESSION['email_error'] = "Email Already Taken";
            header("location:../settings.php");
        }else {
            $id = $_SESSION['author_id'];
$emailquery = "UPDATE  users SET name= '$email' WHERE  id= '$id'";
$connect= mysqli_query($db,$emailquery);

$_SESSION['author_email'] = $email;
$_SESSION['email_update'] = 'email update sussessful';
header('location:../ settings.php');
        };
    }
    


    $name = $_POST['name'];
    if($name){
$id = $_SESSION['author_id'];
$query = "UPDATE  users SET name= '$name' WHERE  id= '$id'";
mysqli_query($db,$query);

$_SESSION['author_name'] = $name;
$_SESSION['name_update'] = 'name update sussessful';
header('location: settings.php');

    }else{
        $_SESSION['name_error'] = 'name error';
        header('location: settings.php');
    }

    
}

if(isset($_POST['passubtn'])){
    
    
    $oldpass = $_POST['oldpass '];
    $newpass = $_POST['newpass'];
    $cpass = $_POST['cpass'];
    $password_regex_upper = '/^(?=.*?[A-Z])/';
    $password_regex_lower ='/^(?=.*?[a-z])/';
    $password_regex_number ='/^(?=.*?[0-9])/';
    $password_regex_char ='/^(?=.*?[#?!@$%^&*-])/';
    $password_regex_length ='/^.{8,}/';
    if(!$password){
        $flag= true;
        $_SESSION["oldpass_error"] = "oldpass is required !!";
        header("location:../settings.php");
    }else if(!$newpass){ 
        $_SESSION["password_error"] = "password  is required !!";
        header("location:../settings.php");
    }else if(!preg_match($password_regex_lower,$password)){ $flag= true;
        $_SESSION["password_error"] = "password required At least one lower case !!";
        header("location:../settings.php");
    }else if(!$cpass){ 
        $_SESSION["password_error"] = "password is required !!";
        header("location:../settings.php");
    }else if(!preg_match($password_regex_char,$newpass)){ $flag= true;
        $_SESSION["password_error"] = "password required fail !!";
        header("location:../settings.php");
    }else { 
        $oldpass_encrypt = md5($oldpass);
        $id = $_SESSION['author_id'];
       $passmatch_qurery ="SELECT COUNT(*) AS 'match' FROM usere WHERE id ='$id' AND password= '$oldpass_encrypt'";
       $passconnect = mysqli_query($db,$passmatch_qurery);
       $match_result = mysqli_fetch_assoc($passconnect)['match'];
    //    $match_result = mysqli_fetch_assoc($passconnect)['match'];
       if($match_result == 1){
        if($newpass == $cpass){

        $newpass_encrypt = md5($newpass);
        $passquery ="UPDATE users SET password ='$newpass_encrypt' WHERE id = ' $id'";
        mysqli_query($db,$passquery);
       
        $_SESSION["pass_success"] = "password update successful !!";
        header("location:../settings.php");
        }else {
        $_SESSION["passw_error"] = "password is not match!!";
        header("location:../settings.php"); 
    }
}else{
        $_SESSION["passw_error"] = " old password is not match!!";
        header("location:../settings.php");
    }

}
}else {
    echo " error";
}
    if($oldpass && $newpass && $cpass){
        $encrypt = md5($oldpass);
        $id = $_SESSION['author_id'];
        $match_query = "SELECT COUNT(*) AS 'match' FROM users WHERE id='' AND password ='$encrypt'";
        $connect = mysqli_query($db,$match_query);

        $match = mysqli_fetch_assoc($connect)['match'];

if($match == 1  ){
    if($newpass == $connect){
$new_encrypt = md5($newpass);
$query = "UPDATE  users SET password= '$new_encrypt' WHERE  id= '$id'";
mysqli_query($db,$query); 
$_SESSION['pass_update'] = 'password update sussessful';
header('location: settings.php');
}else{
$_SESSION['pass_error'] = 'aga mila';
header('location: settings.php');  
}

}else{
    $_SESSION['pass_error'] = 'pass match kore nai';
    header('location: settings.php');
}


// $id = $_SESSION['author_id'];
// $query = "UPDATE  users SET name= '$name' WHERE  id= '$id'";
// mysqli_query($db,$query);

// $_SESSION['author_name'] = $name;
// $_SESSION['name_update'] = 'name update sussessful';
// header('location: settings.php');

    }else{
        $_SESSION['pass_error'] = 'pass error';
        header('location: settings.php');
    }

    
}
// /image start
if(isset($_POST['imageubtn'])){
    $image = $_FILES['image'] ['name'];
    $tmp_path = $_FILES['image'] ['tem_name'];
    
    if($image){
    $id = $_SESSION['author_id'];
    $name =$_SESSION['author_name'];
    $explode = explode('.',$image);
    $extention = end($explode );

    $new_name = $id . "-" . $name ."-" .date('d-m-Y') . '.' . $extention;
    $local_path= "../../public/uploads/profile/".$new_name;
    if(move_uploaded_file($tmp_path,$local_path)){
        
        $query = "UPDATE  users SET image= '$new_name' WHERE  id= '$id'";
         mysqli_query($db,$query);
        
        header('location: settings.php');
    }
    }
//     if($name){
//     $id = $_SESSION['author_id'];
// $query = "UPDATE  users SET name= '$name' WHERE  id= '$id'";
// mysqli_query($db,$query);

// $_SESSION['author_name'] = $name;
// $_SESSION['name_update'] = 'name update sussessful';
// header('location: settings.php');
// }
}
?>