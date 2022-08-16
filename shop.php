<?php
  include('./server/connection.php');

  //use search section
  if(isset($_POST['search'])){
    $category = $_POST['category'];
    $price = $_POST['price'];
    echo $_POST['price'];


    $stmt = $conn->prepare("SELECT * FROM products WHERE product_category=? AND product_price<=?");

    $stmt->bind_param("si", $category, $price);

    $stmt->execute();

    $product = $stmt->get_result();

  //return all products
  }else{

    $stmt = $conn->prepare("SELECT * FROM products");
    $stmt->execute();

    $product = $stmt->get_result();
  }

?>

<?php include('layouts/header.php'); ?>


    <div class="row my-5 py-5 ">
      <section class="col-sm-2 p-5 " id="search" >
        <div class="container mt-5 py-5">
          <p>Search Products</p>
          <hr>
        </div>

        <form action="shop.php" method="POST">
          <div class="row mx-auto container">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <p>Category</p>

              <div class="form-check">
                <input class="form-check-input" values="bags" type="radio" name="category" id="category_two" checked>
                <label class="form-check-label" for="flexRadioDefault2">
                  All
                </label>
              </div>

              <div class="form-check">
                <input class="form-check-input" value="shoes" type="radio" name="category" id="category_one" >
                <label class="form-check-label" for="flexRadioDefault1">
                  Shoes
                </label>
              </div>

              <div class="form-check">
                <input class="form-check-input" value="accessory" type="radio" name="category" id="category_two" >
                <label class="form-check-label" for="flexRadioDefault2">
                  Accessoires
                </label>
              </div>

              <div class="form-check">
                <input class="form-check-input" values="watches" type="radio" name="category" id="category_two" >
                <label class="form-check-label" for="flexRadioDefault2">
                  Watches
                </label>
              </div>
            </div>
          </div>


          <div class="row mx-auto mt-5 container">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <p>Price</p>
              <input type="range" class="form-range w-50" name="price" value="100" min="1" max="1000" id="customRange2">
              <div class="w-50">
                <span style="float: left;">1</span>
                <span style="float: right;">1000</span>
              </div>
            </div>
          </div>


          <div class="form-group my-3 mx-3">
            <input type="submit" name="search" value="Search" class="btn btn-primary">
          </div>
        </form>
      </section>

      <section class="col-sm-10 " id="shop" >
        <div class="container  mt-5 py-5">
          <h3>Our Products</h3>
          <hr>
          <p>Here you can check out our featured products</p>
        </div>

        <div class="row mx-auto container">
          <?php while($row = $product->fetch_assoc()) { ?>
          <div onclick="window.location.href='single_product.html'" class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="./asssets/image/products/<?php echo $row['product_image1']?>" />
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name text-dark"><?php echo $row['product_name']?></h5>
            <h4 class="p-price text-dark">$<?php echo $row['product_price']?></h4>
            <a class="btn buy-btn" href="<?php echo "single_product.php?product_id=".$row['product_id']; ?>">Buy Now</a>
          </div>
          <?php } ?>


          <nav aria-label="Page navigation example">
            <ul class="pagination mt-5">
              <li class="page-item"><a href="#" class="page-link">Previous</a></li>
              <li class="page-item"><a href="#" class="page-link">1</a></li>
              <li class="page-item"><a href="#" class="page-link">2</a></li>
              <li class="page-item"><a href="#" class="page-link">3</a></li>
              <li class="page-item"><a href="#" class="page-link">Next</a></li>
            </ul>
          </nav>

        </div>
      </section>
    </div>


    <?php include('layouts/footer.php') ?>