<?php
// print_r($d);
// phpinfo();

if (isset($_SESSION['user'])) {
    $username = $_SESSION['user'];
} else {
    $username = '';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sale Up To 50% - FplBee</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        #welcome-message {
            position: fixed;
            /* Thay đổi thành fixed để luôn nằm ở góc phải */
            top: -100px;
            /* Bắt đầu ở vị trí trên cùng */
            right: 20px;
            /* Đặt ở góc phải */
            background-color: #4caf50;
            color: white;
            padding: 20px;
            border-radius: 5px;
            opacity: 1;
            /* Bắt đầu với độ trong suốt 100% */
            transition: top 1s, opacity 2s;
            /* Thời gian chuyển tiếp cho hiệu ứng */
            z-index: 9999;
            /* Đặt z-index cao để thông điệp nổi bật */
        }
    </style>
</head>

<body>
    <div id="welcome-message" class="<?php echo $username ? '' : 'hidden'; ?>">
        <?php if (isset($_SESSION['role_admin'])) { ?>
            Chào admin, <?php echo htmlspecialchars($username); ?>!
        <?php } ?>
        <?php if (isset($_SESSION['role_epl'])) { ?>
            Chào nhân viên, <?php echo htmlspecialchars($username); ?>!
        <?php } ?>
        <?php if (isset($_SESSION['role_customers'])) { ?>
            Chào mừng bạn, <?php echo htmlspecialchars($username); ?>!
        <?php } ?>
    </div>

    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center h-100">
                    <a class="text-body mr-3" href="">Giới Thiệu</a>
                    <a class="text-body mr-3" href="">Liên Hệ</a>
                    <a class="text-body mr-3" href="">Hỗ Trợ</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center" style="padding-right: 100px;">
                    <?php
                    if(isset($data_Gift) && !empty($data_Gift)){?>
                        <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fas fa-bell text-primary"> <?php echo count($data_Gift) ?></i></a>
                        <div class="dropdown-menu rounded-0 border-0 m-0 custom-dropdown">
                            <label class="dropdown-item" style="font-weight: bold;">Voucher Của Bạn</label>
                           <?php foreach($data_Gift as $Gift){ ?>
                            <a href="?act=shop" class="dropdown-item"><?= $Gift['code']."(-".$Gift['discount_percent']*100?>%) Mua sắm ngay!!</a> 
                          <?php } ?>
                        </div>
                    </div>
                    <?php } elseif (isset($_SESSION['user']) && empty($data_Gift)){ ?>
                        <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fas fa-bell text-primary"></i></a>
                        <div class="dropdown-menu rounded-0 border-0 m-0 custom-dropdown">
                            <label class="dropdown-item" style="font-weight: bold;">Voucher Của Bạn</label>
                            <a href="?act=shop" class="dropdown-item <?php echo "nav-link disabled"?>">Bạn đã sử dụng hết voucher!!</a> 
                        </div>
                    </div>
                     <?php } else{ ?>
                        <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fas fa-bell text-primary"></i></a>
                        <div class="dropdown-menu rounded-0 border-0 m-0 custom-dropdown">
                            <label class="dropdown-item" style="font-weight: bold;">Voucher Của Bạn</label>
                            <a href="?act=register" class="dropdown-item <?php if(isset($_SESSION['role_admin'])){echo "nav-link disabled";} ?>" >Đăng ký thành viên để nhận nhiều ưu đãi</a> 
                        </div>
                    </div>
                       <?php  }?>
                    <?php
                    if (isset($_SESSION['user'])) { ?>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown"><?php if (isset($_SESSION['user'])) {
                                                                                                                            echo $_SESSION['user'];
                                                                                                                        } ?></button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <?php if (isset($_SESSION['role_customers'])) { ?>
                                    <button class="dropdown-item" type="button"><a class="text-dark" href="?act=info">Truy Cập Bee member</a></button>
                                    <button class="dropdown-item" type="button"><a class="text-dark" href="?act=info_customers">Đơn hàng của tôi</a></button>
                                    <button class="dropdown-item" type="button"><a class="text-dark" href="?act=info_customers">Sổ địa chỉ nhận hàng</a></button>
                                <?php  } ?>
                                <?php if (isset($_SESSION['role_admin'])) { ?>
                                    <button class="dropdown-item" type="button"><a class="text-dark" href="?act=admin">Admin</a></button>
                                <?php  } ?>
                                <?php if (isset($_SESSION['role_epl']) && !empty($_SESSION['role_epl'])) { ?>
                                    <button class="dropdown-item" type="button"><a class="text-dark" href="?act=admin">Nhân Viên</a></button>
                                <?php  } ?>
                                <button class="dropdown-item" type="button"><a class="text-dark" href="?act=logout">Đăng Xuất</a></button>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Tài Khoản</button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <button class="dropdown-item" type="button"><a class="text-dark" href="?act=login">Đăng Nhập</a></button>
                                <button class="dropdown-item" type="button"><a class="text-dark" href="?act=register">Đăng Ký</a></button>
                            </div>
                        </div>
                    <?php  } ?>
                </div>
                <div class="d-inline-flex align-items-center d-block d-lg-none">
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-heart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-shopping-cart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2">FPL</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Bee</span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Tìm sản phẩm">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Danh Mục</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
                        <!-- áo -->
                        <div class="nav-item dropdown dropright">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Áo<i class="fa fa-angle-right float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                                <?php
                                foreach ($d as $categories) { ?>
                                    <?php if ($categories->only == 0) { ?>
                                        <a href="" class="dropdown-item"><?= $categories->name ?></a>
                                    <?php } ?>
                                <?php }
                                ?>
                            </div>
                        </div>
                        <!-- end áo -->
                        <!-- quần -->
                        <div class="nav-item dropdown dropright">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Quần<i class="fa fa-angle-right float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                                <?php
                                foreach ($d as $categories) { ?>
                                    <?php if ($categories->only == 1) { ?>
                                        <a href="" class="dropdown-item"><?= $categories->name ?></a>
                                    <?php } ?>
                                <?php }
                                ?>
                            </div>
                        </div>
                        <!-- end quần -->
                        <!-- đồ ngủ -->
                        <div class="nav-item dropdown dropright">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Bộ Đồ Ngủ<i class="fa fa-angle-right float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                                <?php
                                foreach ($d as $categories) { ?>
                                    <?php if ($categories->only == 2) { ?>
                                        <a href="" class="dropdown-item"><?= $categories->name ?></a>
                                    <?php } ?>
                                <?php }
                                ?>
                            </div>
                        </div>
                        <!-- end đồ ngủ -->
                        <!-- đồ thể thao -->
                        <div class="nav-item dropdown dropright">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Đồ Thể Thao<i class="fa fa-angle-right float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                                <?php
                                foreach ($d as $categories) { ?>
                                    <?php if ($categories->only == 5 || $categories->only == 4) { ?>
                                        <a href="" class="dropdown-item"><?= $categories->name ?></a>
                                    <?php } ?>
                                <?php }
                                ?>
                            </div>
                        </div>
                        <!-- end đồ thể thao -->

                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="<?= BASE_URL ?>" class="nav-item nav-link active">Trang Chủ</a>
                            <a href="?act=shop" class="nav-item nav-link">Cửa hàng</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Tra cứu <i class="fa fa-angle-down mt-1"></i></a>
                                <div class="dropdown-menu bg-primary rounded-0 border-0 m-0">
                                    <a href="?act=shoping-Cart" class="dropdown-item">Giỏ Hàng</a>
                                    <a href="?act=history_shop" class="dropdown-item">Lịch Sử Mua Hàng</a>
                                </div>
                            </div>
                            <a href="?act=shop-Contact" class="nav-item nav-link">Liên Hệ</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <a href="?act=shoping-Cart" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;"><?php if(isset($_SESSION['cart'])){echo count($_SESSION['cart']);} ?></span>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->
    <!-- Carousel Start -->
    <div class="container-fluid mb-3">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#header-carousel" data-slide-to="1"></li>
                        <li data-target="#header-carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item position-relative active" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="img/banner1.png" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Thời trang nam</h1>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Mua Ngay</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="img/banner2.png" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Áo polo</h1>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Mua Ngay</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="img/banner3.png" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Áo sơ mi</h1>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Mua Ngay</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="product-offer mb-30" style="height: 200px;">
                    <img class="img-fluid" src="img/banner4.png" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Giảm 20%</h6>
                        <a href="" class="btn btn-primary">Mua Ngay</a>
                    </div>
                </div>
                <div class="product-offer mb-30" style="height: 200px;">
                    <img class="img-fluid" src="img/banner5.png" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Save 20%</h6>
                        <h3 class="text-white mb-3">Áo khoác nam</h3>
                        <a href="" class="btn btn-primary">Mua Ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->


    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Categories</span></h2>
        <div class="row px-xl-5 pb-3">

           <?php foreach($d as $List_category) { ?>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="">
                    <div class="cat-item d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                                <img src="<?= $List_category->image ?>" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6><?= $List_category->name ?></h6>
                            <small class="text-body">100 Products</small>
                        </div>
                    </div>
                </a>
            </div>
       <?php    } ?>
        </div>
    </div>
    <!-- Categories End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Featured Products</span></h2>
        <div class="row px-xl-5">
            <?php foreach($products as $data_products){ ?>
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="<?= $data_products->image  ?>" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href="?act=products_detail&product_id=<?= $data_products->product_id?>"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="?act=products_detail&product_id=<?= $data_products->product_id?>"><?= $data_products->name ?></a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5><?= $data_products->price?>Đ</h5>
                        </div>
                    </div>
                </div>
            </div>
         <?php } ?>
            
        </div>
    </div>
    <!-- Products End -->
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4">Get In Touch</h5>
                <p class="mb-4">No dolore ipsum accusam no lorem. Invidunt sed clita kasd clita et et dolor sed dolor. Rebum tempor no vero est magna amet no</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Quick Shop</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">My Account</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Newsletter</h5>
                        <p>Duo stet tempor ipsum sit amet magna ipsum tempor est</p>
                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Your Email Address">
                                <div class="input-group-append">
                                    <button class="btn btn-primary">Sign Up</button>
                                </div>
                            </div>
                        </form>
                        <h6 class="text-secondary text-uppercase mt-4 mb-3">Follow Us</h6>
                        <div class="d-flex">
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-secondary">
                    &copy; <a class="text-primary" href="#">Domain</a>. All Rights Reserved. Designed
                    by
                    <a class="text-primary" href="">HTML Codex</a>
                    <br>Distributed By: <a href="" target="_blank">ThemeWagon</a>
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="img/payments.png" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
        window.onload = function() {
            const welcomeMessage = document.getElementById('welcome-message');

            // Hiện thông điệp nếu có tên người dùng
            if (welcomeMessage.classList.contains('hidden') === false) {
                welcomeMessage.style.top = '20px'; // Di chuyển xuống màn hình
                welcomeMessage.style.opacity = '1'; // Đặt độ trong suốt về 100%

                // Đợi một lúc trước khi làm mờ và ẩn đi
                setTimeout(() => {
                    welcomeMessage.style.opacity = '0'; // Làm mờ thông điệp
                }, 2000); // Thời gian chờ trước khi bắt đầu làm mờ

                // Đợi cho đến khi mờ hoàn toàn để ẩn thông điệp
                setTimeout(() => {
                    welcomeMessage.classList.add('hidden');
                    welcomeMessage.style.top = '-100px'; // Trở về vị trí ban đầu
                }, 1500); // Thời gian chờ sau khi làm mờ hoàn toàn
            }
        };


    </script>
</body>

</html>