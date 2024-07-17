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

$sql = "SELECT * FROM orders_hdr LEFT JOIN users ON orders_hdr.created_by = users.user_id ORDER BY orders_hdr.order_id DESC";
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
                                            <h2 class="nk-block-title">Order List</h1>
                                                <nav>
                                                    <ol class="breadcrumb breadcrumb-arrow mb-0">
                                                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                                        <li class="breadcrumb-item active" aria-current="page">Order Management</li>
                                                    </ol>
                                                </nav>
                                        </div>
                                        <div class="nk-block-head-content">
                                            <ul class="d-flex">
                                               
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
                                                        <span class="overline-title">Customer</span>
                                                    </th>
                                                    <th class="tb-col">
                                                        <span class="overline-title">Total Amount</span>
                                                    </th>
                                                    <th class="tb-col tb-col-xl">
                                                        <span class="overline-title">Payment Status</span>
                                                    </th>
                                                    <th class="tb-col tb-col-xl">
                                                        <span class="overline-title">Order Status</span>
                                                    </th>
                                                    <th class="tb-col">
                                                        <span class="overline-title">Date & Time</span>
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
                                                    <td class="tb-col"><?php echo $row["username"] ?></td>
                                                    <td class="tb-col">RM <?php echo $row["total_amount"] ?></td>
                                                    <td class="tb-col"><?php echo $row["payment_status"] ?></td>
                                                    <td class="tb-col"><?php echo $row["order_status"] ?></td>
                                                    <td class="tb-col"><?php echo $row["created_at"] ?></td>
                                                   
                                                    <td class="tb-col tb-col-end">
                                                        <div class="dropdown">
                                                            <a href="#" class="btn btn-sm btn-icon btn-zoom me-n1" data-bs-toggle="dropdown">
                                                                <em class="icon ni ni-more-v"></em>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-top">
                                                                <div class="dropdown-content py-1">
                                                                    <ul class="link-list link-list-hover-bg-primary link-list-md">
                                                                       
                                                                       
                                                                        <li>
                                                                            <a href="orders-view.php?id=<?php echo $row["order_id"] ?>"><em class="icon ni ni-eye"></em><span>View</span></a>
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
