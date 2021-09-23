<?php
  session_start();
  include 'Connection.php';
  if(isset($_SESSION['uid']))
  {
    $uid = $_SESSION['uid'];
  }
?>
<html>
  <head>
    <link href="CSS/Index.css" rel="stylesheet"/>
    <link href="CSS/Contact Us.css" rel="stylesheet"/>
    <title>Try & Buy</title>
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
          <a href="index.php"><li>Home</li></a>
          <a href="Product.php"><li>Products</li></a>
          <li><a href="About.php">About Us</a></li>
          <a href="Contact Us.php"><li>Contact Us</li></a>
          <?php
            if (isset($_SESSION['uid']))
            {
              $query = "select * from registration where id=$uid";

              $res = mysqli_query($con,$query);

              while($data = mysqli_fetch_array($res))
              {
            ?>
            <a href="Logout.php"><li>Logout</li></a>
            <li style="color:black;">Welcome <?php echo $data['name'];?></li>

            <?php
              }
            }
            else
            {
            ?>
            <a href="Login.php">
              <li>Login</li></a>
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
      <div id="box1">
        Contact Us
        <div id="address">
          Bhavnagar,<br>
          Gujarat<br>
          test@gmail.com<br>
          +91 908765 4321
        </div>
      </div>
      <div id="box2">
        <form method="post" action="">
          <input type="text" placeholder="Name" name="name"/>
          <input type="text" placeholder="Phone" name="phone"/>
          <input type="email" placeholder="Email" name="email"/>
          <textarea placeholder="Message" name="address"></textarea>
          <br>
          <input type="submit" value="Send" name="submit" id="btn"/>
        </form>
      </div>
    </div>
  </body>
</html>
<?php
  if(isset($_POST['submit']))
  {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $query = "insert into contactus(name,phone,email,msg) values('$name',$phone,'$email','$address')";

    $res = mysqli_query($con,$query);

    if($res)
    {
      echo "<script>alert('Query Submitted.')</script>";
    }
    else {
      echo "<script>alert('Query Error.')</script>";
    }
  }

 ?>
