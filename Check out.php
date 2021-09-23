<html>
  <head>
    <link href="CSS/Index.css" rel="stylesheet"/>
    <link href="CSS/Checkout.css" rel="stylesheet"/>
  </head>
  <body>
    <div id="menu">
      <div id="logo">
        <img src="Images/logo.png"/>
      </div>
      <div id="rightmenu">
        <ul>
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="Products.php">Products</a></li>
            <li><a href="">About Us</a></li>
            <li><a href="Contact Us.php">Contact Us</a></li>
            <li><a href="Login.php">Login</a></li>
          </ul>
        </ul>
      </div>
    </div>
    <div id="title">CHECKOUT</div>
    <div id="main">
      <div id="box1">
        <div id="bill">
          <div id="orderid"><b>ORDER ID</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <div class="fvalue">123</div></div><br>
          <div id="subtotal"><b>SUBTOTAL</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <div class="fvalue">123</div></div><br>
          <div id="shpping"><b>SHPPING CHARGE</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <div class="fvalue">123</div></div><br><br><br><br>
          <div id="line"></div><br><br><br>
          <div id="total"><b>TOTAL</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <div class="fvalue">123</div></div><br>
        </div>
      </div>
      <div id="box2">
        <form method="post" action="">
          <input type="text" placeholder="Name" name="name"/>
          <input type="text" placeholder="Phone" name="phone"/>
          <input type="email" placeholder="Email" name="email"/>
          <textarea placeholder="Address" name="address"></textarea>
          <br>

          <input type="submit" value="Send" name="submit" id="btn"/>
        </form>
      </div>
    </div>
  </body>
</html>
