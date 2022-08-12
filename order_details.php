
<?php

/*
  not paid
  shipped
  delivered
*/


  include('./server/connection.php');

  if(isset($_POST['order_datails_btn']) && isset($_POST['order_id'])) {
    $order_id = $_POST['order_id'];
    $order_status = $_POST['order_status'];

    $stmt = $conn->prepare("SELECT * FROM order_items WHERE order_id = ?");

    $stmt->bind_param('i', $order_id);

    $stmt->execute();

    $order_details = $stmt->get_result();
  }else{
    header('location: account.php');
    exit;
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


    <section id="orders" class="orders container my-5 py-3">
      <div class="container mt-5">
        <h2 class="font-weight-bold text-center">Order details</h2>
        <hr class="mx-auto">
      </div>

      <table class="mt-5 pt-5 mx-auto">
        <tr>
          <th>Product</th>
          <th>Price</th>
          <th>Quantity</th>
        </tr>

        <?php while($row= $order_details->fetch_assoc()) {?>
          <tr>
            <td>
              <div class="product-info">
                <img src="asssets/image/products/<?php echo $row['product_image']; ?>" alt="">
                <div>
                  <p class="mt-3"><?php echo $row['product_name']; ?></p>
                </div>
              </div>
            </td>

            <td>
              <span>$<?php echo $row['product_price']; ?></span>
            </td>

            <td>
              <span></span>
            </td>

            <td>
              <span><?php echo $row['product_quantity']; ?></span>
            </td>
<!--
            <td>
              <input type="submit" class="btn order-details-btn" value="details" />
            </td> -->
          </tr>
        <?php } ?>

      </table>

      <?php if($order_status == "not paid"){?>
        <form style="float: right;">
          <input type="submit" class="btn btn-primary" value="Pay Now" />
        </form>

      <?php } ?>
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