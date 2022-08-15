<?php include('layouts/header.php'); ?>
  <!--  NAVBAR  -->


  <section id="home">
    <div class="container">
      <h5><b>NEW ARRIVALS</b></h5>
      <h1><span>Best Prices</span>This Season</h1>
      <p>Eshop offers the best products for the most affordable prices</p>
      <button>Shop Now</button>
    </div>
  </section>

  <section id="brand" class="container">
    <div class="row">
      <img src="asssets/image/logo/brand1.jpg" alt="" class="img-fluid col-lg-3 col-md-6 col-sm-12" >
      <img src="asssets/image/logo/brand2.jpg" alt="" class="img-fluid col-lg-3 col-md-6 col-sm-12" >
      <img src="asssets/image/logo/brand5.png" alt="" class="img-fluid col-lg-3 col-md-6 col-sm-12" >
      <img src="asssets/image/logo/brand4.jpg" alt="" class="img-fluid col-lg-3 col-md-6 col-sm-12" >
    </div>
  </section>

  <section id="new" class="w-100">
    <div class="row p-0 m-0">
      <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
        <img src="./asssets/image/shape1.jpg" alt="" class="img-fluid">
        <div class="details">
          <h2>Men's collection</h2>
          <button class="text-uppercase">Shop Now</button>
        </div>
      </div>

      <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
        <img src="./asssets/image/shape2.jpg" alt="" class="img-fluid">
        <div class="details">
          <h2>Women's collection</h2>
          <button class="text-uppercase">Shop Now</button>
        </div>
      </div>

      <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
        <img src="./asssets/image/shape3.jpg" alt="" class="img-fluid">
        <div class="details">
          <h2>Lifestyle collection</h2>
          <button class="text-uppercase">Shop Now</button>
        </div>
      </div>
    </div>
  </section>

  <!-- Shoes -->
  <section id="featured" class="my-5 pb-5">
    <div class="container text-center mt-5 py-5">
      <h3>Our Featured</h3>
      <hr class="mx-auto">
      <p>Here you can check out our featured products</p>
    </div>
    <div class="row mx-auto container-fluid text-dark">

      <?php include('server/get_featured_products.php'); ?>
      <?php while($row=$featured_products->fetch_assoc())  { ?>

        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid mb-3" src="./asssets/image/products/<?php echo $row['product_image1']; ?>" alt="">
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name text-dark"><?php echo $row['product_name']; ?></h5>
          <h4 class="p-price text-dark">$<?php echo $row['product_price']; ?></h4>

           <a href="<?php echo "single_product.php?product_id=". $row['product_id'];?>">
            <button class="buy-btn">Buy Now</button>
          </a>
        </div>
      <?php } ?>
    </div>
  </section>

   <!-- Banner -->
  <section id="banner" class="my-5 py-5">
    <div class="container">
      <h4>MID SEASON'S SALE</h4>
      <h1>Autumn Collection <br>Up to 30% OFF</h1>
      <button class="text-uppercase">shop now</button>
    </div>

  </section>

  <!-- Accessories -->
  <section id="featured" class="my-5 pb-5">
    <div class="container text-center mt-5 py-5">
      <h3>Accessories</h3>
      <hr class="mx-auto">
      <p>Here you can check out our amazing accessories</p>
    </div>
    <div class="row mx-auto container-fluid text-dark">

      <?php include('server/get_accessories.php'); ?>
      <?php while($row=$accessories->fetch_assoc()) { ?>

        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid mb-3" src="./asssets/image/products/<?php echo $row['product_image1']; ?>" alt="">
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name text-dark"><?php echo $row['product_name']; ?></h5>
          <h4 class="p-price text-dark">$<?php echo $row['product_price']; ?></h4>

          <a href="<?php echo "single_product.php?product_id=". $row['product_id'];?>">
            <button class="buy-btn">Buy Now</button>
          </a>
        </div>
      <?php } ?>

    </div>
  </section>

<?php include('layouts/footer.php') ?>