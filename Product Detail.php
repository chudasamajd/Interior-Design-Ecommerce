<?php
  session_start();
  if(isset($_SESSION['uid']))
  {
    $uid = $_SESSION['uid'];
  }
  include 'Connection.php';

  if(!isset($_GET['pid']))
  {
    header('location:Products.php');
  }
  else {
    $id = $_GET['pid'];

    $query4 = "select * from products where id=$id";

    $res4 = mysqli_query($con,$query4);

  }

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
    <link href="CSS/Product Detail2.css" rel="stylesheet"/>
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
            <a href="Login.php"><li>Login</li></a>
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
            </li>
        </ul>
      </div>
    </div>


    <?php


        while($data4 = mysqli_fetch_array($res4))
        {
     ?>
     <form action="" method="post">
    <div id="mainproductbox">
      <div id="mainproductimg">
        <img src="Images/Product/<?php echo $data4['image'];?>"/>
      </div>
      <div id="productdetails">
        <div id="mainproducttitle">
          <?php echo $data4['pname'];?>
        </div>
        <div id="mainproductdes">
          <div id="label">Description</div>
          <?php echo $data4['description'];?>
        </div>
        <div id="mainproductprice">
          <div id="label">Price</div>
          Rs.<?php echo $data4['price'];?>
          <input type="hidden" value="<?php echo $data4['price'];?>" name="price"/>
          <br><br>
          <div id="mainproductqty">
            <div id="label">Quantity</div>
            <select name="qty" id="qty">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
          </div>
        </div>

        <div id="mainproductbtn">
          <input type="submit" id="cartbtn" value="ADD TO CART" name="cart"/>
        </div>
      </div>
    </div>
  </form>
    <?php
  }
   ?>
  </body>
</html>
