<?php
include('server.php');
$errors = array();
session_start();

if(isset($_POST['save'])){
    $time = time('Y-m-d H:i:s');
    $titel = mysqli_real_escape_string($conn,$_POST['titel']);
    $detail = mysqli_real_escape_string($conn,$_POST['detail']);
}

if (empty($titel)) {
    array_push($errors,"กรุณากรอกข้อมูล");
    $_SESSION['error'] = "กรุณากรอกข้อมูล";
}
if (empty($time)) {
    array_push($errors,"กรุณากรอกข้อมูล");
    $_SESSION['error'] = "กรุณากรอกข้อมูล";
}
if (empty($detail)) {
    array_push($errors,"กรุณากรอกข้อมูล");
    $_SESSION['error'] = "กรุณากรอกข้อมูล";
}
if(count($errors)>> 1){
    $_SESSION['error'] = "กรุณากรอกข้อมูลให้ครบถ้วน";
}

if(count($errors)==0){
   
    $sql = "INSERT INTO mynote (time,titel,detail) VALUES ('$time','$titel','$detail')";
    mysqli_query($conn,$sql);
    header('location: index.php');

}else{

    header('location: add.php');
}


?>


