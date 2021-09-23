<?php
  if(isset($_POST['login']))
  {
    $uid = $_POST['uid'];
    $pass = $_POST['pass'];

    if($uid=='admin' and $pass=='admin')
    {
      session_start();

      $_SESSION['uid']=1;

      header('location:home.php');


    }
    else {
      echo "<script>alert('Invalid UserID or Password');</script>";
    }
  }
?>
<html>
  <head>
    <link href="CSS/Login.css" rel="stylesheet"/>
    <style>
    a{
      text-decoration: none;
      color:black;
    }
    </style>
  </head>
  <body>
    <form action="" method="post">
    <div id="main">
      <div id="title">
        LOGIN
      </div>
      <div id="username">
        <input type="text" placeholder="User ID" name="uid"/>
      </div>
      <div id="password">
        <input type="password" placeholder="Password" name="pass"/>
      </div>
      <div id="btn">
        <input type="submit" value="LOGIN" name="login"/>
      </div>
      <div id="img">
        <img src="../Images/Light.png" />
      </div>
    </div>
  </form>
  </body>
</html>
