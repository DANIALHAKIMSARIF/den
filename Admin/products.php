<?php
include '../connection.php';
session_start();
include('header.php');

$user_id = $_SESSION['id'];

if (!isset($_SESSION['id']))
{
    if ($_SESSION['id'] == ''){
    
       header("location: ../index.php");
    
    }
}

$sql = "SELECT * FROM products LEFT JOIN category ON products.product_cat = category.category_id ORDER BY product_id DESC";
$result = mysqli_query($connection,$sql);
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
                                            <h2 class="nk-block-title">Products List</h1>
                                                <nav>
                                                    <ol class="breadcrumb breadcrumb-arrow mb-0">
                                                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                                        <li class="breadcrumb-item active" aria-current="page">Product Management</li>
                                                    </ol>
                                                </nav>
                                        </div>
                                        <div class="nk-block-head-content">
                                            <ul class="d-flex">
                                                <li>
                                                    <a href="product-create.php" class="btn btn-primary d-none d-md-inline-flex">
                                                        <em class="icon ni ni-plus"></em>
                                                        <span>Add Product</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div><!-- .nk-block-head-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block dtble">
                                    <div class="card">
                                        <table class="datatable-init table" data-nk-container="table-responsive">
                                            <thead class="table-light">
                                                <tr>
                                                    <th class="tb-col">
                                                        <span class="overline-title">No</span>
                                                    </th>
                                                    <th class="tb-col">
                                                        <span class="overline-title">Product</span>
                                                    </th>
                                                    <th class="tb-col">
                                                        <span class="overline-title">Category</span>
                                                    </th>
                                                    <th class="tb-col tb-col-xl">
                                                        <span class="overline-title">Price</span>
                                                    </th>
                                                    <th class="tb-col tb-col-xl">
                                                        <span class="overline-title">Stock</span>
                                                    </th>
                                                    <th class="tb-col">
                                                        <span class="overline-title">Last Update</span>
                                                    </th>
                                                    <th class="tb-col tb-col-end" data-sortable="false">
                                                        <span class="overline-title">Action</span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
       $i = 0;
       while($row = mysqli_fetch_array($result)){ 
       ?>
                                                <tr>
                                                <td class="tb-col"><?php echo ++$i ?></td>
                                                    <td class="tb-col"><?php echo $row["product_name"] ?></td>
                                                    <td class="tb-col"><?php echo $row["category_name"] ?></td>
                                                    <td class="tb-col">RM <?php echo $row["product_price"] ?></td>
                                                    <td class="tb-col"><?php echo $row["product_stock"] ?></td>
                                                    <td class="tb-col"><?php echo $row["updated_at"] ?></td>
                                                   
                                                    <td class="tb-col tb-col-end">
                                                        <div class="dropdown">
                                                            <a href="#" class="btn btn-sm btn-icon btn-zoom me-n1" data-bs-toggle="dropdown">
                                                                <em class="icon ni ni-more-v"></em>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-top">
                                                                <div class="dropdown-content py-1">
                                                                    <ul class="link-list link-list-hover-bg-primary link-list-md">
                                                                        <li>
                                                                            <a href="product-edit.php?id=<?php echo $row["product_id"] ?>"><em class="icon ni ni-edit"></em><span>Edit</span></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="deleteproduct.php?id=<?php echo $row["product_id"] ?>" onclick="return confirm('Are you sure you want remove this Product?');"><em class="icon ni ni-trash"></em><span>Delete</span></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product-view.php?id=<?php echo $row["product_id"] ?>"><em class="icon ni ni-eye"></em><span>View</span></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div><!-- dropdown -->
                                                    </td>
                                                </tr>
                                                <?php
}
?>
                                               
                                            </tbody>
                                        </table>
                                    </div><!-- .card -->
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div> <!-- .nk-content -->
          
<?php
include('footer.php');
?>
