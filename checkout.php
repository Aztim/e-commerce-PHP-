<?php

session_start();


if( !empty($_SESSION['cart']) && isset($_POST)) {
  //let user in


  //send user to home page
}else{
  header('location: index.php');
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
    <title>Home</title>
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
              <a class="nav-link" href="index.html">Home</a>
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
              <a href="cart.html"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
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

    <!-- Checkout -->
  <section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
      <h2 class="form-weight-bold">Check out</h2>
      <hr class="mx-auto">
    </div>
    <div class="mx-auto container">
      <form id="checkout-form" method="POST" action="server/place_order.php">
        <div class="form-group checkout-small-element">
          <label for="">Name</label>
          <input type="text" class="form-control" id="checkout-name" name="name" placeholder="Name" required />
        </div>

        <div class="form-group checkout-small-element">
          <label for="">Email</label>
          <input type="text" class="form-control" id="checkout-email" name="email" placeholder="Email" required />
        </div>

        <div class="form-group checkout-small-element">
          <label for="">Phone</label>
          <input type="phone" class="form-control" id="checkout-phone" name="phone" placeholder="Phone" required />
        </div>

        <div class="form-group checkout-small-element">
          <label for="">City</label>
          <input type="text" class="form-control" id="checkout-city" name="city" placeholder="City" required />
        </div>
        <div class="form-group checkout-large-element">
          <label for="">Address</label>
          <input type="text" class="form-control" id="checkout-address" name="address" placeholder="Address" required />
        </div>

        <div class="form-group checkout-btn-container">
          <p>Total amount: $<?php echo $_SESSION['total']; ?></p>
          <input type="submit" class="btn" id="checkout-btn" name="place_order" value="Place Order" />
        </div>
      </form>
    </div>
  </section>

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

  </body>
</html>