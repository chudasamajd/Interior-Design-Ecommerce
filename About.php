<?php
  session_start();
  include 'Connection.php';

?>
<html>
  <head>
    <style>
      input{
        height: 40px;
        width:300px;
        margin-bottom:40px;
      }
      label{
        font-family: arial;
        font-size: 15px;
      }
      #main
      {
        position: absolute;
        top:50%;
        left:50%;
        transform: translate(-50%,-50%);
      }
      #btn{
        background-color: black;
        border:none;
        color:white;
      }
      #main{
        font-family: arial;
        font-size:18px;
        text-align: justify;
      }
    </style>
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
              $uid = $_SESSION['uid'];
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
                  $uid = $_SESSION['uid'];
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
      <div id="light">
        <img src="Images/About.jpg" width="100%" height="100%"/>
      </div>

  </body>
</html>
