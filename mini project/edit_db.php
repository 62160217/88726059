<?php
include('server.php');
$errors = array();
session_start();
$id = $_POST['id'];
if(isset($_POST['save'])){
    
    $date = date('Y-m-d H:i:s');
    $article = mysqli_real_escape_string($conn,$_POST['article']);
    $detail = mysqli_real_escape_string($conn,$_POST['detail']);


if (empty($article)) {
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
   
    $sql ="UPDATE mynote SET  titel= '$titel' , detail='$detail'WHERE mynote.id = '$id'";
    mysqli_query($conn,$sql);
    header('location: index.php');

}else{

    header('location: add.php');
}
}else{
    $sql = "DELETE FROM mynote WHERE mynote.id = '$id' ";
    mysqli_query($conn,$sql);
    header('location: index.php');
}

?>



