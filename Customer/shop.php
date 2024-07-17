<?php
include('include/header.php');

$sql_products = "SELECT * FROM products LEFT JOIN category ON products.product_cat = category.category_id ORDER BY product_id DESC";
$result_products = mysqli_query($connection,$sql_products);

?>
    
    <!--shop  area start-->
    <div class="shop_area shop_reverse mt-70 mb-70">
        <div class="container">
            <div class="row">
       
                
                <div class="col-lg-12 col-md-12">
                    <!--shop wrapper start-->
                    <!--shop toolbar start-->
                    <div class="shop_toolbar_wrapper">
                        <div class="shop_toolbar_btn">

                           
                        </div>
                        <div class=" niceselect_option">
                         
                               <input type="text" name="search" id="filter" style="width:300px;" placeholder="Search Here..">
                
                        </div>
                       
                    </div>
                     <!--shop toolbar end-->
                     <div class="row shop_wrapper">

                     <?php
       while($row_products = mysqli_fetch_array($result_products)){ 
       ?>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-12 ">
                            <div class="single_product">
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
                                <div class="product_content grid_content">
                                        <h4 class="product_name"><a href="view_product.php?id=<?php echo $row_products['product_id']; ?>"><?php echo $row_products['product_name']; ?></a></h4>
                                        <p><a href="#"><?php echo $row_products['category_name']; ?></a></p>
                                        <div class="price_box"> 
                                            <span class="current_price">RM <?php echo $row_products['product_price']; ?></span>
                                          
                                        </div>
                                    </div>
               
                            </div>
                        </div>
                        <?php
       }
       ?>
                       
                    </div>
<br> <br>
                    <!--shop toolbar end-->
                    <!--shop wrapper end-->
                </div>
            </div>
        </div>
    </div>
    <!--shop  area end-->
    <?php
include('include/footer.php');

?>
<script>
    $(document).ready(function(){
    $("#filter").keyup(function(){
 
       
        var filter = $(this).val(), count = 0;
 
        
        $(".col-md-3").each(function(){
 
            
            if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                $(this).fadeOut();
 
            
            } else {
                $(this).show();
                count++;
            }
        });

    });
});
  </script>