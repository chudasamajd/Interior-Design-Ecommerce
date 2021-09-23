<?php
  session_start();
  include 'Connection.php';
  if(!isset($_SESSION['uid']))
  {
      header('location:index.php');
  }
?>

<html>
  <head>
    <link href="CSS/Add Product.css" rel="stylesheet"/>
    <style>
      #totalcustomer
      {
        height: 100px;
        width:400px;
        border:1px solid black;
        line-height: 100px;
        font-family: arial;
        font-size:20px;
        text-align: center;
        margin-top:200px;
        margin-left:100px;
      }
      #totalproduct
      {
        height: 100px;
        width:400px;
        border:1px solid black;
        line-height: 100px;
        font-family: arial;
        font-size:20px;
        text-align: center;
        position: absolute;
        top:200px;
        left:650px;
      }
      a{
        text-decoration: none;
        color:black;
      }
    </style>
  </head>
  <body>
    <div id="menu">
      <div id="mainmenu">
        <ul>
          <a href="Home.php"><li>HOME</li></a>
          <a href="Add Product.php"><li>ADD PRODUCT</li></a>
          <a href="View Products.php"><li>VIEW PRODUCT</li></a>
          <a href="Customer.php"><li>CUSTOMER LIST</li></a>
          <a href="Complete Order.php"><li>ORDER LIST</li></a>
          <a href="Logout.php"><li>LOGOUT</li></a>
        </ul>
      </div>
    </div>
    <div id="main">
        <div id="totalcustomer">
          <b>TOTAL CUSTOMERS : </b>
          <?php
            $query3 = "select * from registration";
            $res3 = mysqli_query($con,$query3);
            $count = mysqli_num_rows($res3);
            echo $count;
          ?>
        </div>
        <div id="totalproduct">
          <b>TOTAL PRODUCTS : </b>
          <?php
            $query3 = "select * from products";
            $res3 = mysqli_query($con,$query3);
            $count = mysqli_num_rows($res3);
            echo $count;
          ?>
        </div>
    </div>
  </body>
</html>
