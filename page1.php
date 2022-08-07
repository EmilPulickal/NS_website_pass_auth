<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Website</title>
  <link rel="icon"
    href="https://us.123rf.com/450wm/wellgod/wellgod2006/wellgod200600102/149713537-sport-supercar-front-view-line-art.jpg?ver=6"
    type="image/png">
</head>

<body>
  <header id="center">


    <h1 id="heading">Welcome!</h1>
    <hr>
    <?php
    session_start();
    if(isset($_SESSION['loginuser_name'])){
    echo "<p style='color:blue;'>
      Welcome ".$_SESSION['loginuser_name'].".<br> </p>";
    echo "<p style='color:blue;'>
      Current Projects You Are Working On: ".$_SESSION['loginuser_projects'].".<br> </p>";
    }
      else{echo "<p style='color:blue;'>Please login/register</p>";}?>
    <hr>


  </header>


</body>

<style media="screen">


  body {
    margin-left: 50px;
    margin-right: 50px;
    margin-top: 10px;
    margin-bottom: 200px;
    background-image: url("https://wallpaperaccess.com/full/2492629.jpg");
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: 100%;

  }

  h1 {
    color: purple;
    font-size: 30px;
    text-align: center;
    font-family: cursive;
    padding-top: 10px;
  }


  p {
    color: black;
    font-size: 18px;
    font-family: cursive;
  }


  #center {
    text-align: center;
  }


</style>

</html>
