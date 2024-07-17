<?php
include('include/header.php');

$sql_products = "SELECT * FROM products LEFT JOIN category ON products.product_cat = category.category_id ORDER BY product_id DESC";
$result_products = mysqli_query($connection,$sql_products);

?>
    
 <!--slider area start-->
<section class="slider_section">
    <div class="slider_area owl-carousel">
        <div class="single_slider d-flex align-items-center" data-bgimg="assets/img/nbbwall.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="slider_content">
                            <h1 style="color:white;">Be stylish by buying shoes with us</h1>
                            <h2 style="color:white;">Step Up Your Style</h2>
                            <p style="color:white;">
                                Perfect shoes with Den Shoes Store!
                            </p> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single_slider d-flex align-items-center" data-bgimg="assets/img/pumawallpape.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="slider_content">
                            <h1 style="color:white;">Comfort Meets Style</h1>
                            <h2 style="color:white;">Shoes for Every Journey</h2>
                            <p style="color:white;">
                                Explore our wide range of comfortable and stylish shoes for all-day wear.
                            </p> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single_slider d-flex align-items-center" data-bgimg="assets/img/senakers.avif">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="slider_content">
                            <h1 style="color:white;">Premium Quality Footwear</h1>
                            <h2 style="color:white;">Crafted for Perfection</h2>
                            <p style="color:white;">
                                Experience the best in craftsmanship and materials with our premium shoes.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--slider area end-->

    
   <br>   <br>   <br>
   
        
   
    
    
    <!--custom product area start-->
    <div class="custom_product_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                       <p>Recently added our store </p>
                       <h2>Featured Products</h2>
                    </div>
                </div>
            </div> 

            <!--home three bg area start-->   
    <div class=" product_five">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-12 col-md-12">
                    <div class="productbg_right_side">
                        
                        <div class="product_conatiner3">
                            <div class="section_title">
                             
                            </div>
                            <div class="product_carousel product3_column3 owl-carousel">


                            <?php
       while($row_products = mysqli_fetch_array($result_products)){ 
       ?>
                                <div class="product_items">
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                  <a class="primary_img" href="view_product.php?id=<?php echo $row_products['product_id']; ?>"><img src="../Admin/product-image/<?php echo $row_products["product_img"] ?>" alt=""></a>
                                        <a class="secondary_img" href="view_product.php?id=<?php echo $row_products['product_id']; ?>"><img src="../Admin/product-image/<?php echo $row_products["product_img"] ?>" alt=""></a>
                                                <div class="label_product">
                                                    <span class="label_sale">Sale</span>
                                                    <span class="label_new">New</span>
                                                </div>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="add_to_cart.php?id=<?php echo $row_products['product_id']; ?>" data-tippy="Add to cart" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true"> <span class="lnr lnr-cart"></span></a></li>
                                                       
                                                    </ul>
                                                </div>
                                            </div>
                                            <figcaption class="product_content">
                                               <h4 class="product_name"><a href="view_product.php?id=<?php echo $row_products['product_id']; ?>"><?php echo $row_products['product_name']; ?></a></h4>
                                                <p><a href="#">Fruits</a></p>
                                                <div class="price_box"> 
                                                    <span class="current_price">RM <?php echo $row_products['product_price']; ?></span>

                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                  
                                   
                                </div>
                                                        <?php
       }
       ?>
                                
                    </div>
                </div>
            </div>
        </div>
    </div>
     </div>
      </div>
    <!--home three bg area end--> 
           
        </div>
    </div>
    <!--custom product area end-->
    
    <br>    <br>    <br>

<?php
include('include/footer.php');

?>