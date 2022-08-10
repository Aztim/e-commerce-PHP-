<?php
  session_start();
  include('./server/connection.php');

  if(!isset($_SESSION['logged_in'])){
    header('location: login.php');
    exit;
  }

  if(isset($_GET['logout'])) {
    if(isset($_SESSION['logged_in'])){
      unset($_SESSION['logged_in']);
      unset($_SESSION['user_email']);
      unset($_SESSION['user_name']);
      header('location: login.php');
      exit;
    }
  }

  if(isset($_POST['change_password'])){
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $user_email = $_SESSION['user_email'];

     //if passwords dont match
     if($password !== $confirmPassword){
      header('location: account.php?error=passwords dont match');

      //if password less than 6 char
    }else if(strlen($password) < 6){
      header('location: account.php?error=password must be at least 6 charachters');

    //no errors
    }else{
      $stmt = $conn->prepare("UPDATE users SET user_password=? WHERE user_email=?");
      $stmt->bind_param('ss',md5($password), $user_email);

      if($stmt->execute()){
        header('location: account.php?message=password has been updated successfully');
      }else{
        header('location: account.php?error=could not update password');
      }
    }

  }


  //get orders
  if(isset($_SESSION['logged_in'])){

  $user_id = $_SESSION['user_id'];

  $stmt = $conn->prepare("SELECT * FROM orders WHERE user_id=? ");

  $stmt->bind_param('i', $user_id);

  $stmt->execute();

  $orders = $stmt->get_result();

  }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="./asssets/styles/styles.css">
    <script src="https://use.fontawesome.com/d003a1a8dd.js"></script>
    <title>Login</title>
  </head>
  <body>

    <!--  NAVBAR  -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 fixed-top" >
      <div class="container">
        <img class="logo" src="asssets/image/logo/logo.png"></img>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="shop.html">Shop</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Blog</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact Us</a>
            </li>

            <li class="nav-item icons">
              <a href="cart.php"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
              <a href="account.html"><i class="fa fa-user" aria-hidden="true"></i></a>
            </li>
          </ul>

          <!-- <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form> -->
        </div>
      </div>
    </nav>


    <!--  Account  -->
    <section class="my-5 py-5">
      <div class="row container mx-auto">
        <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 com-sm-12">
          <p class="text-center" style="color:green"><?php if(isset($_GET['register_success'])) { echo $_GET['register_success']; } ?></p>
          <p class="text-center" style="color:green"><?php if(isset($_GET['login_success'])) { echo $_GET['login_success']; } ?></p>
          <h3 class="font-weight-bold">Account Info</h3>
          <hr class="mx-auto">
          <div class="account-info">
            <p>Name<span><?php if(isset($_SESSION['user_name'])){echo $_SESSION['user_name'];} ?></span></p>
            <p>Email<span><?php if(isset($_SESSION['user_email'])){echo $_SESSION['user_email'];} ?></span></p>
            <p><a href="#orders" id="orders-btn">Your orders</a></p>
            <p><a href="account.php?logout=1" id="logout-btn">Logout</a></p>
          </div>
        </div>

        <div class="col-lg-6 col-md-12 col-sm-12">
          <form id="account-form" method="POST" action="account.php">
            <p class="text-center" style="color:red"><?php if(isset($_GET['error'])) { echo $_GET['error']; } ?></p>
            <p class="text-center" style="color:green"><?php if(isset($_GET['message'])) { echo $_GET['message']; } ?></p>
            <h3>Change Password</h3>
            <hr class="mx-auto">
            <div class="form-group">
              <label for="">Password</label>
              <input type="password" class="form-control" name="password" id="account-password" placeholder="Password" required />
            </div>
            <div class="form-group">
              <label for="">Confirm Password</label>
              <input type="password" class="form-control" name="confirmPassword" id="account-password-confirm" placeholder="Password" required />
            </div>
            <div class="form-group">
              <input type="submit" value="Change Password" name="change_password" class="btn" id="change-pass-btn">
            </div>
          </form>
        </div>
      </div>
    </section>

    <!-- Orders -->
    <section id="orders" class="orders container my-5 py-3">
      <div class="container mt-2">
        <h2 class="font-weight-bold text-center">You Orders</h2>
        <hr class="mx-auto">
      </div>

      <table class="mt-5 pt-5">
        <tr>
          <th>Order id</th>
          <th>Order cost</th>
          <th>Order status</th>
          <th>Order date</th>
          <th>Order details</th>
        </tr>

        <?php while($row = $orders->fetch_assoc()){ ?>

          <tr>
            <td>
              <div class="product-info">
                <!-- <img src="asssets/image/products/shoes1.jpg" alt=""> -->
                <div>
                  <p class="mt-3"><?php echo $row['order_id'] ?></p>
                </div>
              </div>
            </td>

            <td>
              <span><?php echo $row['order_cost'] ?></span>
            </td>

            <td>
              <span><?php echo $row['order_status'] ?></span>
            </td>

            <td>
              <span><?php echo $row['order_date'] ?></span>
            </td>

            <td>
              <form method="POST" action="order_details.php">
                <input type="hidden" value="<?php echo $row['order_id']; ?>" name="order_id" />
                <input type="submit" class="btn order-details-btn" name="order-details-btn" value="details" />
              </form>
            </td>
          </tr>

        <?php } ?>

      </table>
    </section>

    <!-- Footer -->
    <footer class="mt-5 py-5">
      <div class="row container mx-auto pt-5">
        <div class="footer-one col-lg-3 col-md-6 col-sm-12">
          <img class="logo" src="" alt="">
          <p class="pt-3">We providee the best products for the most affordable prices</p>
        </div>
        <div class="footer-one col-lg-3 col-md-6 col-sm-12">
          <h5 class="pb-2">Featured</h5>
          <ul class="text-uppercase">
            <li><a href="#">men</a></li>
            <li><a href="#">women</a></li>
            <li><a href="#">boys</a></li>
            <li><a href="#">girls</a></li>
            <li><a href="#">new arrivals</a></li>
            <li><a href="#">clothes</a></li>
          </ul>
        </div>


        <div class="footer-one col-lg-3 col-md-6 col-sm-12">
          <h5 class="pb-2">Contact Us</h5>
          <div>
            <h6 class="text-uppercase">Addres</h6>
            <p>1234 Street Name City</p>
          </div>

          <div>
            <h6 class="text-uppercase">Phone</h6>
            <p>123 456 7890</p>
          </div>

          <div>
            <h6 class="text-uppercase">Email</h6>
            <p>info@email.com</p>
          </div>
        </div>


        <div class="footer-one col-lg-3 col-md-6 col-sm-12">
          <h5 class="pb-2">Instagram</h5>
          <div class="row">
            <img src="./asssets/image/instagram/insta1.jpg" alt="" class="img-fluid w-25 h-100 m-2">
            <img src="./asssets/image/instagram/insta2.jpg" alt="" class="img-fluid w-25 h-100 m-2">
            <img src="./asssets/image/instagram/insta3.jpg" alt="" class="img-fluid w-25 h-100 m-2">
            <img src="./asssets/image/instagram/insta4.jpg" alt="" class="img-fluid w-25 h-100 m-2">
            <img src="./asssets/image/instagram/insta5.jpg" alt="" class="img-fluid w-25 h-100 m-2">
            <img src="./asssets/image/instagram/insta6.jpg" alt="" class="img-fluid w-25 h-100 m-2">
          </div>
        </div>
      </div>

      <div class="copyright mt-5">
          <div class="row container mx-auto">
            <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
              <img src="" alt="">
            </div>
            <div class="col-lg-3 col-md-5 col-sm-12 mb-4 text-nowrap mb-2">
              <p>eCommerce 2022 All Right Reserved</p>
            </div>
        </div>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
  </body>
</html>