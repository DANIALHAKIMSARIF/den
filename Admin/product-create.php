<?php
session_start();
include '../connection.php';
include('header.php');

$sql = "SELECT * FROM category ORDER BY category_name DESC";
$result = mysqli_query($connection,$sql);

$user_id = $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_name = mysqli_real_escape_string($connection ,$_POST['product_name']);
    $product_cat = mysqli_real_escape_string($connection, $_POST['product_cat']);
    $product_price = mysqli_real_escape_string($connection, $_POST['product_price']);
    $product_stock = mysqli_real_escape_string($connection, $_POST['product_stock']);
    $product_desc = mysqli_real_escape_string($connection, $_POST['product_desc']);

    $insert = "INSERT INTO products (product_name, product_cat, product_desc, product_stock,product_price,created_by,updated_by,updated_at) 
    VALUES ('$product_name', '$product_cat', '$product_desc','$product_stock','$product_price','$user_id','$user_id',CURRENT_TIMESTAMP())";
    mysqli_query($connection,$insert);

    $last_id = $connection->insert_id;

    

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
    echo "<script>alert('New Product has been successfully inserted !!'); window.location.href='products.php'</script>";
}
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
                                            <h2 class="nk-block-title">Add Product</h1>
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
                                                                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name" required>
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
        <option value="<?php echo $row["category_id"] ?>"><?php echo $row["category_name"] ?></option>
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
                                                                    <input type="number" step=".01" class="form-control" id="product_price" name="product_price" min="1" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="product_stock" class="form-label">Stock</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="number" class="form-control" id="product_stock" name="product_stock" min="1" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="product_img" class="form-label">Product Image</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="file" class="form-control" id="product_img" name="product_img" accept="image/*" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="aboutme" class="form-label">Description</label>
                                                                <div class="form-control-wrap">
                                                                    <textarea class="form-control" id="product_desc" name="product_desc" rows="3" maxlength="500" required></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <button class="btn btn-primary" type="submit">Submit</button>
                                                            <button class="btn btn-danger" type="reset">Reset</button>
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
