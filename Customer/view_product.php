<?php
include('include/header.php');

$id = $_GET['id'];
$sql_product =  "SELECT * FROM products LEFT JOIN category ON products.product_cat = category.category_id WHERE products.product_id = '$id'";
$result_product = mysqli_query($connection,$sql_product);
$row_product = mysqli_fetch_array($result_product);

?>


    <!--product details start-->
    <div class="product_details mt-70 mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product-details-tab">
                        <div id="img-1" class="zoomWrapper single-zoom">
                            <a href="#">
                                <img id="zoom1" src="../Admin/product-image/<?php echo $row_product["product_img"] ?>" data-zoom-image="../Admin/product-image/<?php echo $row_product["product_img"] ?>" alt="big-1">
                            </a>
                        </div>
                       
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product_d_right">
                       <form action="add_to_cart2.php" method="POST">
                           
                            <h1><a href="#"><?php echo $row_product['product_name']; ?></a></h1>
                            <input type="hidden" name="id" value="<?php echo $row_product['product_id']; ?>">

                        
                            <div class="price_box">
                                <span class="current_price">RM <?php echo $row_product['product_price']; ?></span>
                          
                                
                            </div>
                            <div class="product_variant quantity">
                                <label>quantity</label>
                                <input min="1" max="<?php echo $row_product['product_stock']; ?>" value="1" name="qty" type="number">
                                <button class="button" type="submit">add to cart</button>  
                                
                            </div>
                            
                            <div class="product_meta">
                                <span>Category: <a href="#"><?php echo $row_product['category_name']; ?></a></span>
                            </div>
                            
                        </form>
                       

                    </div>
                </div>
            </div>
        </div>    
    </div>
    <!--product details end-->
    
    <!--product info start-->
    <div class="product_d_info mb-65">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="product_d_inner">   
                        <div class="product_info_button">    
                            <ul class="nav" role="tablist" id="nav-tab">
                                <li >
                                    <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Description</a>
                                </li>
                               
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="info" role="tabpanel" >
                                <div class="product_info_content">
                                    <p><?php echo $row_product['product_desc']; ?></p>
                                  
                                </div>    
                            </div>
                        </div>
                    </div>     
                </div>
            </div>
        </div>    
    </div>  
    <!--product info end-->
    
    
    

<?php
include('include/footer.php');

?>