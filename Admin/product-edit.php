<?php
session_start();
include '../connection.php';
include('header.php');

$sql = "SELECT * FROM category ORDER BY category_name DESC";
$result = mysqli_query($connection,$sql);

$user_id = $_SESSION['id'];
$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_name = mysqli_real_escape_string($connection ,$_POST['product_name']);
    $product_cat = mysqli_real_escape_string($connection, $_POST['product_cat']);
    $product_price = mysqli_real_escape_string($connection, $_POST['product_price']);
    $product_stock = mysqli_real_escape_string($connection, $_POST['product_stock']);
    $product_desc = mysqli_real_escape_string($connection, $_POST['product_desc']);

   

$update = "UPDATE products SET product_name = '$product_name',product_cat = '$product_cat', product_desc = '$product_desc', product_stock = '$product_stock', product_price = '$product_price', updated_by = '$user_id',updated_at = CURRENT_TIMESTAMP()
WHERE product_id = $id";

    mysqli_query($connection,$update);



    $last_id = $id;

    

    $upload_dir = "product-image/";
    if ($_FILES['product_img']['name']) {
        $FILENAME = $last_id . '-' . $_FILES['product_img']['name'];
        move_uploaded_file(
        $_FILES['product_img']['tmp_name'],
        $upload_dir . $FILENAME
        );
        $sql = "UPDATE products
        SET product_img = '$FILENAME'
        WHERE product_id = $last_id";
        mysqli_query($connection, $sql);
    }
    echo "<script>alert('Product has been successfully Updated !!'); window.location.href='products.php'</script>";
}


$sql_edit = "SELECT * FROM products WHERE product_id = '$id'";
$result_edit = mysqli_query($connection,$sql_edit);
$row_edit = mysqli_fetch_array($result_edit);
?>


<style>
    .dataTable-container{
        min-height:200px;
    }
</style>

   
                <div class="nk-content">
                    <div class="container">
                        <div class="nk-content-inner">
                            <br>       <br>
                            <div class="nk-content-body">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-between flex-wrap gap g-2">
                                        <div class="nk-block-head-content">
                                            <h2 class="nk-block-title">Edit Product</h1>
                                                <nav>
                                                    <ol class="breadcrumb breadcrumb-arrow mb-0">
                                                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                                        <li class="breadcrumb-item" aria-current="page">Product Management</li>
                                                        <li class="breadcrumb-item active" aria-current="page">Add Product</li>
                                                    </ol>
                                                </nav>
                                        </div>
                                
                                    </div><!-- .nk-block-head-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="card card-gutter-md">
                                        <div class="card-body">
                                            <div class="bio-block">
                                                <h4 class="bio-block-title mb-4">Product Details</h4>
                                                <form action=" " method="POST" class="row g-3" enctype="multipart/form-data">
                                                    <div class="row g-3">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="product_name" class="form-label">Product Name</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $row_edit["product_name"] ?>" placeholder="Product Name" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="product_cat" class="form-label">Product Category</label>
                                                                <div class="form-control-wrap">
                                                                <select class="js-select" id="product_cat" name="product_cat" data-search="true" data-sort="false" required>
                                                                        <option value="">Select Product Category</option>
                                                                        <?php
       while($row = mysqli_fetch_array($result)){ 
       ?>
        <option value="<?php echo $row["category_id"] ?>"  <?php if($row_edit["product_cat"] == $row["category_id"]) { echo 'selected'; } ?>><?php echo $row["category_name"] ?></option>
<?php
}
?>
       
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                      
                                                       
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="product_price" class="form-label">Price</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="number" step=".01" class="form-control" id="product_price" value="<?php echo $row_edit["product_price"] ?>" name="product_price" min="1" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="product_stock" class="form-label">Stock</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="number" class="form-control" id="product_stock" name="product_stock" value="<?php echo $row_edit["product_stock"] ?>" min="1" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="product_img" class="form-label">Product Image  <sup>(Replace existing Image)</sup></label>
                                                                <div class="form-control-wrap">
                                                                    <input type="file" class="form-control" id="product_img" name="product_img" accept="image/*">
                                                                    <br>
                                                                    <img src="product-image/<?php echo $row_edit["product_img"] ?>" alt="Product Image" style="height:250px; width:450px;  object-fit: cover;  border: 5px solid #555;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="aboutme" class="form-label">Description</label>
                                                                <div class="form-control-wrap">
                                                                    <textarea class="form-control" id="product_desc" name="product_desc" rows="3" maxlength="500" required><?php echo $row_edit["product_desc"] ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <button class="btn btn-primary" type="submit">Update</button>
                                                           
                                                        </div>
                                                    </div>
                                                </form>
                                            </div><!-- .bio-block -->
                                        </div><!-- .card-body -->
                                    </div><!-- .card -->
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div> <!-- .nk-content -->
          
<?php
include('footer.php');
?>
