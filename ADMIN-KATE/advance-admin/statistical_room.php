<?php 
    include("controls.php");
    session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Bootstrap Advance Admin Template</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">THE PIER HOTEL</a>
            </div>

            <div class="header-right">

              <a href="message-task.html" class="btn btn-info" title="New Message"><b>30 </b><i class="fa fa-envelope-o fa-2x"></i></a>
                <a href="message-task.html" class="btn btn-primary" title="New Task"><b>40 </b><i class="fa fa-bars fa-2x"></i></a>
                <a href="login.html" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"></i></a>


             </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                    <div class="user-img-div">
                        <img src="../../UPLOAD/Home/meomeo.jpg" class="img-thumbnail" />

                            <div class="inner-text">
                                Katesi
                            <br />
                                <small>Xin chào</small>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-yelp"></i> Category <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="category_select.php"><i class="fa fa-eye"></i>Category list</a>
                            </li>
                            <li>
                                <a href="category_register.php"><i class="fa fa-plus "></i>Add new category</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-yelp"></i> Room <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="room_select.php"><i class="fa fa-eye"></i>Room list</a>
                            </li>
                            <li>
                                <a href="room_register.php"><i class="fa fa-plus "></i>Add new Room</a>
                            </li>
                           
                        </ul>
                    </li>
                    <li>
                        <a href="booking_select.php"><i class="fa fa-yelp "></i>Booking</a>
                    </li>
                    <li>
                        <a href="contact_select.php"><i class="fa fa-yelp "></i>Contacts</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-yelp "></i> Report <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="Warehouses.php"><i class="fa fa-eye"></i>Warehouses</a>
                            </li>
                            <li>
                                <a href="Payment.php"><i class="fa fa-eye"></i>Payment</a>
                            </li>
                           
                        </ul>
                    </li>
                    <li>
                        <a href="login.php"><i class="fa fa-sign-in "></i>Login</a>
                    </li>
                    <li>
                        <a href="register.php"><i class="fa fa-sign-in "></i>Register</a>
                    </li>

                </ul>
            </div>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Booking</h1>
                    </div>
                </div>
                <!-- /. ROW  -->
              
            <div class="row">
               
                <div class="col-md-12">
                     <!--   Basic Table  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Booking
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th style="width:100px;">Check_In</th>
                                            <th style="width:100px;">Check_Out</th>
                                            <th style="width:100px;">room</th>
                                            <th style="width:150px;">type room</th>
                                            <th>nodays</th>
                                            <th>Price/Day</th>
                                            <th>Gr.Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $tbl_booking = new tbl_booking();
                                            $bookings = $tbl_booking->select_all();
                                            $tbl_room = new tbl_room();  
                                            $sum = 0;                                    
                                            foreach($bookings as $booking) { 
                                                $room = $tbl_room->select_room($booking["room_id"]);
                                                // Lấy thông tin phòng
                                                $room_info = $room->fetch_assoc(); // Sử dụng fetch_assoc() để lấy thông tin phòng dưới dạng mảng kết hợp
                                                $room_price = $room_info["price"]; // Lấy giá của phòng từ mảng kết hợp

                                                // Lấy thông tin đặt phòng
                                                // $booking_info = $booking->fetch_assoc(); // Sử dụng fetch_assoc() để lấy thông tin đặt phòng dưới dạng mảng kết hợp
                                                // $nodays = $booking_info["nodays"]; // Lấy số ngày đặt phòng từ mảng kết hợp

                                                // Tính tổng giá của đặt phòng
                                                $total_price = $room_price * $booking["nodays"];
                                                $sum += $total_price;                                                                                      
                                        ?>

                                        <tr> 
                                            <td> <?php echo $booking["Name"] ?> </td>
                                            <td> <?php echo $booking["email"] ?> </td>
                                            <td> <?php echo $booking["Check_in"] ?> </td>
                                            <td> <?php echo $booking["Check_out"] ?> </td>
                                            <td> <?php echo $booking["name_room"] ?> </td>
                                            <td> <?php echo $booking["category"] ?> </td>
                                            <td> <?php echo $booking["nodays"] ?> </td>
                                            <td> <?php echo $total_price; ?></td>
                                            <td> <?php echo $sum; ?></td>
                                        </tr>

                                        <?php 
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                      <!-- End  Basic Table  -->
                </div>
            </div>
            
                <!-- /. ROW  -->

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <div id="footer-sec">
        &copy; 2014 YourCompany | Design By : <a href="http://www.binarytheme.com/" target="_blank">BinaryTheme.com</a>
    </div>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
     <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>
</html>
