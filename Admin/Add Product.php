<?php
  session_start();
  include 'Connection.php';
  if(!isset($_SESSION['uid']))
  {
      header('location:index.php');
  }
?>
<?php
    include 'Connection.php';

    if(isset($_POST['btn']))
    {
      $pname = $_POST['name'];
      $cat = $_POST['cat'];
      $price = $_POST['price'];
      $qty = $_POST['qty'];
      $des = $_POST['des'];
      $image = $_FILES['image']['name'];

      $query = "insert into products(pname, category, price, quantity, description, image) values('$pname', '$cat', $price, $qty, '$des', '$image')";

      $res = mysqli_query($con,$query);

      if($res)
      {
        move_uploaded_file($_FILES['image']['tmp_name'],'../Images/Product/'.$image);
        echo "<script>alert('Product Added Successfully.')</script>";
      }
      else {
        echo "<script>alert('Failed to add new product.')</script>";
      }
    }
?>

<html>
  <head>
    <link href="CSS/Add Product.css" rel="stylesheet"/>
    <style>
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
      <div id="title">ADD PRODUCT</div>
      <div id="form">
        <form action="" method="post" enctype="multipart/form-data">
          <input type="text" placeholder="Product Name" name="name"/>
          <select name="cat">
            <option>Category</option>
            <option>Decoration</option>
            <option>Ceiling</option>
            <option>Floor</option>
            <option>LED</option>-
            <option>Chair</option>
            <option>Sofa</option>
          </select>
          <input type="text" placeholder="Price" name="price"/>
          <input type="text" placeholder="Quantity" name="qty"/>
          <textarea placeholder="Description" name="des"></textarea>
          <input type="file" name="image" />
          <input type="submit" value="ADD PRODUCT" id="btn" name="btn"/>
        </form>
      </div>
    </div>
  </body>
</html>
