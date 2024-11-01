<?php 
  if(isset($_POST['addSchool'])){
    $schoolName = $_POST['schoolName'];
    $schoolType = $_POST['schoolType'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    require('../reusables/connect.php');

    $query = "INSERT INTO publicschools (`School Name`, `School Level`, `Phone`, `Email`) VALUES ('$schoolName','$schoolType', '$phone', '$email')";

    $school = mysqli_query($connect, $query);

  }
