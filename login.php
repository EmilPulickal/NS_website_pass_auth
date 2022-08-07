<?php
$servername = "localhost";
$username = "root";
$password = '';
$dbname = "NSLab";

if($_SERVER["REQUEST_METHOD"]=="POST"){
  session_start();
  $conn=mysqli_connect($servername,$username,$password,$dbname);
  if(!$conn){
    echo "Error".mysqli_error();
  }
  if (isset($_POST['username'])&&isset($_POST['password'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $password2=hash('md5',$password);

    $sql="SELECT name,number,projects FROM users WHERE username = '$username' and password = '$password2'";

    $result = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);
    if(mysqli_num_rows($result) > 0 ){

      $row = mysqli_fetch_assoc($result);
      $currentuser_name = $row["name"];
      $currentuser_number = $row["number"];
      $currentuser_projects =  $row["projects"];

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {
         //session_register("myusername");
         $_SESSION['loginuser_name'] = $currentuser_name;
         $_SESSION['loginuser_number'] = $currentuser_number;
         $_SESSION['loginuser_projects'] = $currentuser_projects;

         header("location: page1.php");
      }else {
         $error = "Your User Name or Password is invalid";
      }
    }
    else{echo "Please Enter Valid Username And Password";}
  }else{echo "ummmm";}
}


?>
