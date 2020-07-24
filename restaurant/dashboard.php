<?php
session_start();
include_once "connection.php";
$id = $_SESSION['restaurant_id'];
$result = mysqli_query($con, "SELECT * FROM items WHERE restaurant_id = $id");
$result_order = mysqli_query($con, "SELECT * FROM orders WHERE restaurant_id = $id");
?>

<!DOCTYPE html>

<head>
    <title>
        Foodshala's Admin page
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../restaurant/css/homeStyle.css" type="text/css">
</head>

<body id="page-top">
    <div class="container-fluid mColor">
        <div class="container p-2">
            <div class="px-md-4">
                <nav class="navbar navbar-expand-lg navbar-light p-4">
                    <a class="navbar-brand" href="home.php">
                        <img src="image/logo.png" width="120" height="auto" class="img">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-lg-auto px-2" id="navChangeActive">
                            <li class="nav-item active">
                                <a class="nav-link" href="#dashboard">Dashboard<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#menu">Menu</a>
                            </li>
                        </ul>
                    </div>

                    <a class="nav-link" href="logout.php">Logout</a>
                </nav>
            </div>

        </div>
    </div>


    <div class="container" id="dashboard">
        <div class="my-md-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#dashboard">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Overview</li>
            </ol>
            <div class="p-2">
                <h1>Administrator Panel</h1>
            </div>
            <hr>
            <div class="col-12">
                <h5>Overview of the system</h5>
                <div class="card border-info">
                    <div class="card-header">
                        <i class="fas fa-fw fa-chart-area"></i>
                        Current Order List
                    </div>
                    <div class="card-body">
                        <table id="tblCurrentOrder" table class="table table-bordered" width="100%" cellspacing="0">
                                    
                            <thead class='text-center'>
                                <th>Order ID</th>
                                <th>Item Name</th>
                                <th>Customer Name</th>
                                <th>Total Amount</th>
                            </thead>
                            <?php
                                        $j = 1;
                                        while ($row = mysqli_fetch_array($result_order)){
                                        
                                    ?>

                            <tbody>
                                        <th><?php echo $j; ?></th>
                                        <th><?php 
                                            $id = $row['item_id'];
                                            $item_name = mysqli_query($con,"SELECT item_name, item_price FROM items WHERE item_id = $id" );
                                            $items = mysqli_fetch_array($item_name);
                                            echo $items['item_name'];?></th>
                                        <th><?php
                                        $id = $row['user_id'];
                                        $user_name = mysqli_query($con,"SELECT user_name FROM customer WHERE user_id = $id" );
                                        $user = mysqli_fetch_array($user_name);
                                        echo $user['user_name'];
                                     ?></th>
                                        <th><?php echo $items['item_price']; ?></th>
                            </tbody>

                            <?php
                                $j++;
                                        }
                            ?>
                        </table>
                    </div>
                                </div>
            </div>

        </div>
    </div>
    <br>
    <br>

    <div class="container" id="menu">
        <div class="my-md-4">
            <div class="p-2">
                <h1>Menu Management</h1>
            </div>
            <hr>
            <div class="col-12">
                <h5>Add items</h5>
                <div class="card border-info">
                    <div class="card-header">
                        <nav class="navbar navbar-light bg-light">
                            Menu List
                            <form class="form-inline">
                                <button class="btn btn-sm btn-primary" type="button" data-toggle="modal"
                                    data-target="#addCategorymodal">
                                    Add Item
                                </button>
                            </form>
                        </nav>

                    </div>
                    <div class="card-body">
                         <div class="card border-info">
                            <div class="card-body">
                                <table id="tblCurrentOrder" table class="table table-bordered" width="100%"
                                    cellspacing="0">
                                    <thead class='text-center'>
                                        <th>#</th>
                                        <th>Item Name</th>
                                        <th>Price(RM)</th>
                                        <th>Veg/Non-veg</th>
                                    </thead>
                                    
                                    <?php
                                        $i = 1;
                                        while ($row = mysqli_fetch_array($result)){
                                            
                                    ?>
                                    <tbody class="text-center">
                                        
                                        <th><?php echo $i; ?></th>
                                        <th><?php echo $row['item_name']; ?></th>
                                        <th><?php echo $row['item_price']; ?></th>
                                        <th><?php 
                                            if (!$row['is_nonveg']){
                                                echo "Veg";
                                            }
                                            else{
                                                echo "Non-veg";
                                            }
                                        
                                        ?></th>
                                    </tbody>
                                    <?php 
                                        $i++;
                                        }
                                    ?>
                                </table>
                            </div>

                        </div>

                        
                    </div>
                
                </div>

            </div>
            
        </div>
        <a type="button" class="btn btn-outline-warning float-right" href="#page-top">
            <i class="fa fa-arrow-up" aria-hidden="true"></i>
    </a>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="container-fluid">
        <footer class="fixed-bottom text-white text-center bg-dark">
            <div class="container my-md-4">
                <div class="copyright text-center my-auto">
                    <span>Copyright © FoodShala</span>
                </div>
            </div>
        </footer>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="addCategorymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="additem.php" method="POST">
                        <div class="form-group">
                            <label class="col-form-label">Item Name:</label>
                            <input type="text" class="form-control" name="item_name"
                                placeholder="Chapati..">
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="is_nonveg" id="isnonveg"> &nbsp;  
                            <label class="col-form-label" for="isnonveg">Non-veg</label>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Price</label>
                            <input type="number" class="form-control" name="item_price"
                                placeholder="10.00">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Image:</label>
                            <input type="file" class="form-control" name="image"
                                placeholder="">
                        </div>
                        <div class="form-group float-right">
                    <button type="submit" class="btn btn-success">Add</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>



