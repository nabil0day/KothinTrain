<?php

  require_once 'db.php';

  function validateLogin ($username, $password) {
    $con = getConnection();

    $sql = "SELECT * FROM user WHERE username='{$username}' and password='{$password}'";

		$result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    if ($count > 0) {
      return true;
    } else {
      return false;
    }
    
  }

  
  function registration($name, $username, $password, $cpassword, $user_type) { 
    $con = getConnection();

    $sql = "INSERT INTO user VALUES('{$name}', '{$username}', '{$password}', '{$user_type}')";

    $result = mysqli_query($con, $sql);
    
    if($result){
      return true;
    }else{
      return false;
    }

  }

  function getPersonalData($accNumber) {
    $conn = getconnection();
    $sql = "select * from users where Account_Number='{$accNumber}'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if($count > 0){
      while($row = mysqli_fetch_assoc($result)){
        $args = array(
          "Name" => $row['Name'],
          "Phone" => $row['Phone'],
          "Email" => $row['Email'],
          "NID" => $row['NID'],
          "dob" => $row['dob'],
          "Permanent_Add" => $row['Permanent_Add'],
          "Temporary_Add" => $row['Temporary_Add'],
          "Area_Code" => $row['Area_Code'],
          "Gender" => $row['Gender'],
          "Account_Type" => $row['Account_Type'],
          "Account_Number" => $row['Account_Number'],
          "Balance" => $row['Balance'],
          "Picture" => $row['Picture'],
        );
      }
        return $args;
    } else {
      echo 'No Data Found!!!';
    }
  }
  
  function customerList ($Fsearch) {
    $conn = getconnection();
    $sql = "select * from users where Name='{$Fsearch}'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if($count > 0){
      while($row = mysqli_fetch_assoc($result)){
        $args = array(
        "Name" => $row['Name'],
        "Phone" => $row['Phone'],
        "Email" => $row['Email'],
        "NID" => $row['NID'],
        "dob" => $row['dob'],
        "Permanent_Add" => $row['Permanent_Add'],
        "Temporary_Add" => $row['Temporary_Add'],
        "Area_Code" => $row['Area_Code'],
        "Gender" => $row['Gender'],
        "Account_Type" => $row['Account_Type'],
        "Account_Number" => $row['Account_Number'],
        "Balance" => $row['Balance'],
        );
      }
      return $args;
    } else {
      echo 'No Data Found!!!';
    }

}


  function getAllUser($user){
    $con = getConnection();
    
    $sql = "select * from user";
    $result = mysqli_query($con, $sql);
    $users = [];

    while($row = mysqli_fetch_assoc($result)){
      array_push($users, $row);
    }

    return $users;
  }


  function getUserById($id){
    $con = getConnection();

    $sql = "select * from user where id='{$id}'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

    return $row;
  }

  function deleteUser($id){
    $con = getConnection();

    $sql = "DELETE FROM user WHERE id='{$id}'";
    $result = mysqli_query($con, $sql);

    return $result;
  }
  

  



?>