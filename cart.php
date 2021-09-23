<?php
  session_start();
  if(isset($_SESSION['uid']))
  {
    $uid = $_SESSION['uid'];
  }
  include 'Connection.php';



  if(isset($_POST['cart']))
  {
    if (isset($_SESSION['uid']))
    {
      $cid = $_SESSION['uid'];
      $pid = $_GET['pid'];
      $price = $_POST['price'];
      $qty = $_POST['qty'];
      $query2 = "insert into temp_cart(cid,pid,price,qty,status) values($cid,$pid,$price,$qty,0)";
      $res2 = mysqli_query($con,$query2);
      if($res2)
      {
          echo "<script>alert('Product inserted successfully.')</script>";
      }
      else {
          echo "<script>alert('Failed')</script>";
      }
    }
    else {
      echo "<script>alert('Please Login to your account.')</script>";
    }
  }

?>

<html>
  <head>
    <title>Giffy</title>
    <link href="CSS/Index.css" rel="stylesheet"/>
    <link href="CSS/cart.css" rel="stylesheet"/>
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


    <table border="0" cellspacing="50" cellpadding="10" style="margin-left:100px; border:1px solid silver; margin-top:50px; margin-bottom:50px;">
      <tr style="font-family:arial; font-size:20px; font-weight:bold;">
        <td>

        </td>
        <td>NAME</td>
        <td>PRICE</td>
        <td>QUANTITY</td>
        <td>TOTAL</td>
      </tr>
      <?php
        if(isset($_SESSION['uid']))
        {
          $query5 = "select * from temp_cart where cid=$uid and status=0";

          $res5 = mysqli_query($con,$query5);

          $totalprice = 0;

          while($data5=mysqli_fetch_array($res5))
          {
            $proid = $data5['pid'];
      ?>
      <tr style="font-family:arial; font-size:16px;">

        <td><?php
          $query6 = "select * from products where id=$proid";

          $res6 = mysqli_query($con,$query6);



          while($data6=mysqli_fetch_array($res6))
          {
          ?>
        <img src="Images/Product/<?php echo $data6['image'];?>" width="200px"/>

        </td>
        <td><?php echo $data6['pname'];?></td>
        <?php
        }
        ?>
        <td><?php echo $data5['price'];?></td>
        <td><?php echo $data5['qty'];?></td>
        <td><?php echo $data5['price']*$data5['qty'];?></td>
      </tr>
      <?php
          $totalprice = $totalprice + ($data5['price']*$data5['qty']);
        }
      }
       ?>
    </table>
    <table style="position:absolute; top:200px; right:100px; font-size:20px; font-family:arial;">
      <tr>
        <td>
          <b>Total : </b><?php echo $totalprice; ?>
          <a href="Payment.html"><button style="height:40px; width:150px; background:black; color:white; border:none; margin-left:60px;">CHECKOUT</button></a>
        </td>
      </tr>

    </table>
  </body>
</html>
