<?php

include_once './helpers/dbConnection.php';
function get_users(){
    $conn = connectToDB();
    $data = $conn -> query("SELECT * FROM users");
    return $data -> fetchAll();
}
function get_specific_user($email,$password){
    $conn = connectToDB();
    $data=$conn->query('SELECT * FROM users where email = "'.$email.'"and password ="'.$password.'"');
    return $data ->fetch();
}
// function get_specific_user2($username,$id){
//     $conn = connectToDB();
//     $data=$conn->query('SELECT * FROM users where username = "'.$username.'"and id ="'.$id.'"');
//     return $data ->fetch();
// }
function register($username ,$email,$password,$phone){
    $conn = connectToDB();
    $sql = 'INSERT INTO users (username,email,password,phone,type)
    VALUES (:username,:email,:password,:phone,"client")';
    $stm = $conn->prepare($sql);
    $stm->bindParam(':username',$username);
    $stm->bindParam(':password',$password);
    $stm->bindParam(':email',$email);
    $stm->bindParam(':phone',$phone);
    $stm->execute();
}
function check_exist_email( $email ){
    $conn = connectToDB();
   $data=$conn->query('SELECT * FROM users where email = "'.$email.'"');
   return $data->fetch();
}
function update($username,$email,$phone,$password,$id){
    $conn = connectToDB();
    $sql = "UPDATE users SET username = :username, email=:email, password= :password, phone= :phone WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}