<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 1) {
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin-top: 20px;
        }

        .footer_area {
            position: relative;
            z-index: 1;
            overflow: hidden;
            box-shadow: 0 8px 48px 8px rgba(47, 91, 234, 0.175);
            padding: 60px;
        }

        .footer_area .row {
            margin-left: -25px;
            margin-right: -25px;
        }

        .footer_area .row .col,
        .footer_area .row .col-1,
        .footer_area .row .col-10,
        .footer_area .row .col-11,
        .footer_area .row .col-12,
        .footer_area .row .col-2,
        .footer_area .row .col-3,
        .footer_area .row .col-4,
        .footer_area .row .col-5,
        .footer_area .row .col-6,
        .footer_area .row .col-7,
        .footer_area .row .col-8,
        .footer_area .row .col-9,
        .footer_area .row .col-auto,
        .footer_area .row .col-lg,
        .footer_area .row .col-lg-1,
        .footer_area .row .col-lg-10,
        .footer_area .row .col-lg-11,
        .footer_area .row .col-lg-12,
        .footer_area .row .col-lg-2,
        .footer_area .row .col-lg-3,
        .footer_area .row .col-lg-4,
        .footer_area .row .col-lg-5,
        .footer_area .row .col-lg-6,
        .footer_area .row .col-lg-7,
        .footer_area .row .col-lg-8,
        .footer_area .row .col-lg-9,
        .footer_area .row .col-lg-auto,
        .footer_area .row .col-md,
        .footer_area .row .col-md-1,
        .footer_area .row .col-md-10,
        .footer_area .row .col-md-11,
        .footer_area .row .col-md-12,
        .footer_area .row .col-md-2,
        .footer_area .row .col-md-3,
        .footer_area .row .col-md-4,
        .footer_area .row .col-md-5,
        .footer_area .row .col-md-6,
        .footer_area .row .col-md-7,
        .footer_area .row .col-md-8,
        .footer_area .row .col-md-9,
        .footer_area .row .col-md-auto,
        .footer_area .row .col-sm,
        .footer_area .row .col-sm-1,
        .footer_area .row .col-sm-10,
        .footer_area .row .col-sm-11,
        .footer_area .row .col-sm-12,
        .footer_area .row .col-sm-2,
        .footer_area .row .col-sm-3,
        .footer_area .row .col-sm-4,
        .footer_area .row .col-sm-5,
        .footer_area .row .col-sm-6,
        .footer_area .row .col-sm-7,
        .footer_area .row .col-sm-8,
        .footer_area .row .col-sm-9,
        .footer_area .row .col-sm-auto,
        .footer_area .row .col-xl,
        .footer_area .row .col-xl-1,
        .footer_area .row .col-xl-10,
        .footer_area .row .col-xl-11,
        .footer_area .row .col-xl-12,
        .footer_area .row .col-xl-2,
        .footer_area .row .col-xl-3,
        .footer_area .row .col-xl-4,
        .footer_area .row .col-xl-5,
        .footer_area .row .col-xl-6,
        .footer_area .row .col-xl-7,
        .footer_area .row .col-xl-8,
        .footer_area .row .col-xl-9,
        .footer_area .row .col-xl-auto {
            padding-right: 25px;
            padding-left: 25px;
        }

        .single-footer-widget {
            position: relative;
            z-index: 1;
        }

        .single-footer-widget .copywrite-text a {
            color: #747794;
            font-size: 1rem;
        }

        .single-footer-widget .copywrite-text a:hover,
        .single-footer-widget .copywrite-text a:focus {
            color: #3f43fd;
        }

        .single-footer-widget .widget-title {
            margin-bottom: 1.5rem;
        }

        .single-footer-widget .footer_menu li a {
            color: #747794;
            margin-bottom: 1rem;
            display: block;
            font-size: 1rem;
        }

        .single-footer-widget .footer_menu li a:hover,
        .single-footer-widget .footer_menu li a:focus {
            color: #3f43fd;
        }

        .single-footer-widget .footer_menu li:last-child a {
            margin-bottom: 0;
        }

        .footer_social_area {
            position: relative;
            z-index: 1;
        }

        .footer_social_area a {
            border-radius: 50%;
            height: 40px;
            text-align: center;
            width: 40px;
            display: inline-block;
            background-color: #f5f5ff;
            line-height: 40px;
            -webkit-box-shadow: none;
            box-shadow: none;
            margin-right: 10px;
        }

        .footer_social_area a i {
            line-height: 36px;
        }

        .footer_social_area a:hover,
        .footer_social_area a:focus {
            color: #ffffff;
        }

        @-webkit-keyframes bi-cycle {
            0% {
                left: 0;
            }

            100% {
                left: 100%;
            }
        }

        @keyframes bi-cycle {
            0% {
                left: 0;
            }

            100% {
                left: 100%;
            }
        }

        ol li,
        ul li {
            list-style: none;
        }

        ol,
        ul {
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">TRANG CHỦ</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/tlunews1/views/admin/login.php">Đăng nhập</a>
                    </li>
                </ul>
                <form action="index.php" method="get" class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" name="search" aria-label="Search" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>

            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <h1>Admin Dashboard</h1>
        <div class="mt-4">
            <h3>Chào mừng, <?= htmlspecialchars($_SESSION['user']['username']) ?>!</h3>
            <a href="#" class="btn btn-danger" id="logoutButton">Đăng xuất</a>
        </div>

        <div class="mt-5">
            <h2>Quản lý</h2>
            <div class="list-group">
                <a href="/tlunews1/views/admin/news/index.php" class="list-group-item list-group-item-action">Quản lý Tin tức</a>
                <a href="/tlunews1/views/admin/category/index.php" class="list-group-item list-group-item-action">Quản lý Danh mục</a>
                <a href="/CngheWEB/tlunews1/views/admin/user/index.php" class="list-group-item list-group-item-action">Quản lý Người dùng</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('logoutButton').addEventListener('click', function(event) {
            event.preventDefault();
            if (confirm("Bạn có chắc chắn muốn đăng xuất không?")) {
                window.location.href = 'logout.php';
            }
        });
    </script>
    <!-- Footer -->
    <footer class="footer_area section_padding_130_0">
        <div class="container">
            <div class="row">
                <!-- Single Widget-->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-footer-widget section_padding_0_130">
                        <!-- Footer Logo-->
                        <div class="footer-logo mb-3"></div>
                        <p>Bản quyền này thuộc về nhóm Đỉnh Count CNW.</p>
                        <!-- Footer Social Area-->
                        <div class="footer_social_area"><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Pinterest"><i class="fa fa-pinterest"></i></a><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Skype"><i class="fa fa-skype"></i></a><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></div>
                    </div>
                </div>
                <!-- Single Widget-->
                <div class="col-12 col-sm-6 col-lg">
                    <div class="single-footer-widget section_padding_0_130">
                        <!-- Widget Title-->
                        <h5 class="widget-title">Thành viên nhóm</h5>
                        <!-- Footer Menu-->
                        <div class="footer_menu">
                            <ul>
                                <li><a href="#">Nguyễn Quang Hiếu</a></li>
                                <li><a href="#">Lương Thị Thùy Liên</a></li>
                                <li><a href="#">Đỗ Thị Hiền Lương</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Single Widget-->
                <div class="col-12 col-sm-6 col-lg">
                    <div class="single-footer-widget section_padding_0_130">
                        <!-- Widget Title-->
                        <h5 class="widget-title">Được hướng dẫn</h5>
                        <!-- Footer Menu-->
                        <div class="footer_menu">
                            <ul>
                                <li><a href="#">Kiều Tuấn Dũng</a></li>
                                <li><a href="#">Tạ Chí Hiếu</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Single Widget-->
                <div class="col-12 col-sm-6 col-lg">
                    <div class="single-footer-widget section_padding_0_130">
                        <!-- Widget Title-->
                        <h5 class="widget-title">Contact</h5>
                        <!-- Footer Menu-->
                        <div class="footer_menu">
                            <ul>
                                <li><a href="#">64KTPM3</a></li>
                                <li><a href="#">Thuy Loi University</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>


</body>

</html>
