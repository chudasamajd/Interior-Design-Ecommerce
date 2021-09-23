<?php

  include 'Connection.php';


  if(isset($_POST['reg']))
  {
    $name = $_POST['name'];
    $email= $_POST['email'];
    $userid = $_POST['userid'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];

    if($name != '' and $email != '' and $userid != '' and $pass != '' and $cpass != '')
    {
      if($pass==$cpass)
      {
        $query = "insert into registration(name,email,userid,pass) values('$name','$email','$userid','$pass')";

        $res = mysqli_query($con,$query);

        if($res)
        {
            echo "<script>alert('Registration Successful.');</script>";
            session_start();
            $last_id = $con->insert_id;
            $_SESSION['uid'] = $last_id;
            header('location:index.php');
        }
        else
        {
              echo "<script>alert('Registration Failed.');</script>";
        }
      }
      else {
        echo "<script>alert('Password and Confirm Password Not Match.');</script>";
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
    <link href="CSS/Register.css" rel="stylesheet"/>
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
        REGISTR<br>ATION
      </div>
      <form action="" method="post">
        <div id="username">
          <input type="text" placeholder="Name" name="name"/>
        </div>
        <div id="email">
          <input type="email" placeholder="E-Mail ID" name="email"/>
        </div>
        <div id="userid">
          <input type="text" placeholder="User ID" name="userid"/>
        </div>
        <div id="password">
          <input type="password" placeholder="Password" name="pass"/>
        </div>
        <div id="cpassword">
          <input type="password" placeholder="Confirm Password" name="cpass"/>
        </div>
        <div id="btn">
          <input type="submit" value="SUBMIT" name="reg"/>
        </div>
      </form>
    </div>
  </body>
</html>
