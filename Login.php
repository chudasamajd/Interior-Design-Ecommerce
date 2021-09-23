<?php
session_start();
include 'Connection.php';
if(isset($_SESSION['uid']))
{
  header('location:index.php');
}

if(isset($_POST['login']))
{
  $userid = $_POST['userid'];
  $pass = $_POST['pass'];

  if($userid != '' and $pass != '')
  {
    $query = "select * from registration where userid='$userid' and pass='$pass'";

    $res = mysqli_query($con,$query);

    $count = mysqli_num_rows($res);

    if($count == 1)
    {
        echo "<script>alert('Login Successful.');</script>";

        session_start();
        while($data=mysqli_fetch_array($res))
        {
          $last_id = $data['id'];
        }

        $_SESSION['uid'] = $last_id;
        header('location:index.php');
    }
    else
    {
          echo "<script>alert('Invalid User ID or Password.');</script>";
    }
  }
  else {
    echo "<script>alert('Please fill all the fields.');</script>";
  }
}
?>
<html>
  <head>
    <link href="CSS/Index.css" rel="stylesheet"/>
    <link href="CSS/Login.css" rel="stylesheet"/>
    <style>
    #reg
    {
      height: 40px;
      width: 160px;
      background-color: #b2c0ce;
      border:none;
      border-radius: 40px;
      margin-top:-40px;
      margin-left:650px;
    }
    </style>
    <title>Giffy</title>
    <link href="CSS/Index.css" rel="stylesheet"/>
    <style>
      a{
        color:black;
        text-decoration: none;

      }
      #totalitem
      {
        height:20px;
        width:20px;
        background-color: black;
        border-radius: 50%;
        color:white;
        line-height: 20px;
        text-align: center;
        position: absolute;
        margin-top:-25px;
        margin-left:17px;
      }
    </style>
  </head>
  <body>
    <div id="menu">
      <div id="logo">
        Try & Buy
      </div>
      <div id="rightmenu">
        <ul>
          <li id="active"><a href="index.php">Home</a></li>
          <li><a href="Product.php">Products</a></li>
          <li><a href="About.php">About Us</a></li>
          <li><a href="Contact Us.php">Contact Us</a></li>
          <?php
            if (isset($_SESSION['uid']))
            {
              $query = "select * from registration where id=$uid";

              $res = mysqli_query($con,$query);

              while($data = mysqli_fetch_array($res))
              {
            ?>
            <li><a href="Logout.php">Logout</a></li>
            <a href="My Account.php"><li style="color:black;">Welcome <?php echo $data['name'];?></li></a>

            <?php
              }
            }
            else
            {
            ?>
            <li><a href="Login.php">Login</a></li>
            <?php
            }
            ?>
            <li><img src="images/supermarket.png" width="23px"/>
              <?php
                if (isset($_SESSION['uid']))
                {
                  $query5 = "select * from temp_cart where cid=$uid";

                  $res5 = mysqli_query($con,$query5);
                  $total = 0;
                  while($data5 = mysqli_fetch_array($res5))
                  {
                      $total = $total + 1;
                  }
                }
               ?>
              <a href="cart.php"><div id="totalitem">
              <?php
              if (isset($_SESSION['uid']))
              {
              echo $total;
              }
              else
              {
                echo "0";
              }
              ?></div></a>
        </ul>
      </div>
    </div>
    <div id="main">
      <div id="title">
        LOGIN
      </div>
      <form action="" method="post">
        <div id="username">
          <input type="text" placeholder="User ID" name="userid"/>
        </div>
        <div id="password">
          <input type="password" placeholder="Password" name="pass"/>
        </div>
        <div id="btn" style="margin-left:-100px;">
          <input type="submit" value="LOGIN" name="login" id="login"/>
        </div>
        <div id="btn2">
          <a href="Registration.php"><input type="button" value="REGISTER" id="reg"/></a>
        </div>
      </form>

    </div>
  </body>
</html>
