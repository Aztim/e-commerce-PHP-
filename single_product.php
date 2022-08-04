<?php
  include('./server/connection.php');

  if(isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");

    $stmt->bind_param("i",$product_id);

    $stmt->execute();

    $product = $stmt->get_result();

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

  <!-- Single product -->
  <section class="container single-product my-5 pt-5">
    <div class="row mt-5">
      <?php while($row = $product->fetch_assoc()) { ?>
        <div class="col-lg-5 col-md-6 col-sm-12">
          <img id="mainImg" src="asssets/image/products/single_products/<?php echo $row['product_image1']; ?>" alt="" class="img-fluid w-100 pb-1">
          <div class="small-img-group">
          <div class="small-img-col">
              <img src="asssets/image/products/single_products/<?php echo $row['product_image1']; ?>" alt="" width="100%" class="small-img" />
            </div>
            <div class="small-img-col">
              <img src="asssets/image/products/single_products/<?php echo $row['product_image2']; ?>" alt="" width="100%" class="small-img" />
            </div>
            <div class="small-img-col">
              <img src="asssets/image/products/single_products/<?php echo $row['product_image3']; ?>" alt="" width="100%" class="small-img" />
            </div>

            <div class="small-img-col">
              <img src="asssets/image/products/single_products/<?php echo $row['product_image4']; ?>" alt="" width="100%" class="small-img" />
            </div>
          </div>
        </div>


        <div class="col-lg-6 col-md-12 col-12">
          <h6>Shoes</h6>
          <h3 class="py-4"><?php echo $row['product_name']; ?></h3>
          <h2>$<?php echo $row['product_price']; ?></h2>

          <form method="POST" action="cart.php">
            <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>" />
            <input type="hidden" name="product_image" value="<?php echo $row['product_image1']; ?>" />
            <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>" />
            <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>" />
            <input type="number" name="product_quantity" value="1" />
            <button class="buy-btn" type="submit" name="add_to_cart">Add To Cart</button>
          </form>

          <h4 class="mt-5 mb-5">Product details</h4>
          <span><?php echo $row['product_description']; ?></span>
        </div>

      <?php } ?>

    </div>
  </section>

  <!-- Related products -->
  <section id="related-products" class="my-5 pb-5">
    <div class="container text-center mt-5 py-5">
      <h3>Related products</h3>
      <hr class="mx-auto">
      <p>Here you can check out our featured products</p>
    </div>
    <div class="row mx-auto container-fluid text-dark">
      <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="./asssets/image/products/shoes1.jpg" alt="">
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name text-dark">Sports Shoes</h5>
        <h4 class="p-price text-dark">$199.8</h4>
        <button class="buy-btn">Buy Now</button>
      </div>

      <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="./asssets/image/products/shoes2.jpg" alt="">
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name text-dark">Sports Shoes</h5>
        <h4 class="p-price text-dark">$199.8</h4>
        <button class="buy-btn">Buy Now</button>
      </div>

      <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="./asssets/image/products/shoes3.jpg" alt="">
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name text-dark">Sports Shoes</h5>
        <h4 class="p-price text-dark">$199.8</h4>
        <button class="buy-btn">Buy Now</button>
      </div>

      <div class="product text-center col-lg-3 col-md-4 col-sm-12 ">
        <img class="img-fluid mb-3" src="./asssets/image/products/shoes4.jpg" alt="">
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name text-dark">Sports Shoes</h5>
        <h4 class="p-price text-dark">$199.8</h4>
        <button class="buy-btn">Buy Now</button>
      </div>
    </div>
  </section>


  <footer class="mt-5 py-5">
    <div class="row container mx-auto pt-5">
      <div class="footer-one col-lg-3 col-md-6 col-sm-12">
        <img class="logo" src="./asssets/image/logo/logo.png" alt="">
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

  <script>
    let mainImg = document.getElementById('mainImg');
    let smallImg = document.getElementsByClassName('small-img');

    for (let i = 0; i < 4; i++) {
      smallImg[i].onclick = function() {
        mainImg.src = smallImg[i].src;
      }
    }

  </script>
</body>