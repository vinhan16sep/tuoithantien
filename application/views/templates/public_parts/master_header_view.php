<!doctype html>
<html><!-- InstanceBegin template="/Templates/temp.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta charset="utf-8">
    <meta name="description" content="Mầm non TTT - Parallax">
    <meta name="author" content="hung.luong@matocreative.vn">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Tuổi thần tiên</title>
    <!-- InstanceEndEditable -->
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/public/libraries/css/bootstrap.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/public/libraries/css/font-awesome.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/public/css/reset-bootstrap.css') ?>">
    <link href="https://fonts.googleapis.com/css?family=Itim|Pacifico" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/public/css/font-settings.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/public/css/animate.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/public/css/hover.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/public/css/main.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/public/css/responsive.css') ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/public/theme/'.$theme.'/css/theme.css') ?>">

    <script type="text/javascript" src="<?php echo site_url('assets/public/libraries/js/jquery-3.2.1.js') ?>"></script>
    <script type="text/javascript" src="<?php echo site_url('assets/public/libraries/js/bootstrap.js') ?>"></script>

    <script type="text/javascript" src="<?php echo site_url('assets/public/js/wow.min.js') ?>"></script>

    <!-- InstanceBeginEditable name="head" -->
    <!-- InstanceEndEditable -->
</head>

<body>

<header class="header">
    
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url('trang-chu') ?>">
                    <div id="main_logo"></div>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav navbar-right">
                    <li class="cyan"><a href="<?php echo base_url('trang-chu') ?>">Trang chủ</a></li>
                    <li class="dropdown orange">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Giới thiệu <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu orange">
                            <li><a href="<?php echo base_url('gioi-thieu') ?>">Tổng quan</a></li>
                            <li><a href="<?php echo base_url('gioi-thieu/muc-tieu') ?>">Mục tiêu</a></li>
                            <li><a href="<?php echo base_url('gioi-thieu/ngoai-ngu') ?>">Ngoại ngữ</a></li>
                            <li><a href="<?php echo base_url('gioi-thieu/giao-duc-theo-lua-tuoi') ?>">Giáo dục theo lứa tuổi</a></li>
                            <li><a href="<?php echo base_url('gioi-thieu/tap-huan') ?>">Tập huấn</a></li>
                            <li><a href="<?php echo base_url('gioi-thieu/ngoai-khoa') ?>">Ngoại khóa</a></li>
                        </ul>
                    </li>
                    <li class="dropdown yellow">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Thông tin nhập học <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu yellow">
                            <li><a href="<?php echo base_url('thong-tin-nhap-hoc/thu-tuc-nhap-hoc') ?>">Thủ tục nhập học</a></li>
                            <li><a href="<?php echo base_url('thong-tin-nhap-hoc/danh-sach/hoc-phi') ?>">Học phí</a></li>
                            <li><a href="<?php echo base_url('thong-tin-nhap-hoc/lich-hoc') ?>">Lịch học</a></li>
                            <li><a href="<?php echo base_url('thong-tin-nhap-hoc/danh-sach/chuong-trinh-khuyen-mai') ?>">Chương trình khuyến mãi</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo base_url('nhap-hoc/dang-ky-nhap-hoc') ?>">Đăng ký nhập học</a></li>
                        </ul>
                    </li>
                    <li class="dropdown pink">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Phối hợp cùng phụ huynh <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu pink">
                            <li><a href="<?php echo base_url('phoi-hop-cung-phu-huynh/che-do-sinh-hoat-1-ngay') ?>">Chế độ sinh hoạt 1 ngày</a></li>
                            <li><a href="<?php echo base_url('phoi-hop-cung-phu-huynh/danh-sach/lien-lac') ?>">Liên lạc</a></li>
                            <li><a href="<?php echo base_url('phoi-hop-cung-phu-huynh/danh-sach/thuc-don') ?>">Thực đơn</a></li>
                            <li><a href="<?php echo base_url('phoi-hop-cung-phu-huynh/danh-sach/y-te') ?>">Y tế</a></li>
                            <li><a href="<?php echo base_url('phoi-hop-cung-phu-huynh/gio-dua-don') ?>">Giờ đưa đón</a></li>
                            <li><a href="<?php echo base_url('phoi-hop-cung-phu-huynh/danh-sach/ky-luat') ?>">Kỷ luật</a></li>
                        </ul>
                    </li>
                    <li class="dropdown cyan">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Hoạt động <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu cyan">
                            <li><a href="<?php echo base_url('hoat-dong/thong-bao') ?>">Thông báo của trường</a></li>
                            <li><a href="<?php echo base_url('thu-vien/thu-vien-anh') ?>">Thư viện ảnh</a></li>
                            <li><a href="<?php echo base_url('thu-vien/video') ?>">Video</a></li>
                            <li><a href="<?php echo base_url('hoat-dong/tuyen-sinh') ?>">Tuyển sinh</a></li>
                            <li><a href="<?php echo base_url('hoat-dong/trai-nghiem') ?>">Trải nghiệm</a></li>
                        </ul>
                    </li>
                    <li class="orange"><a href="<?php echo base_url('lien-he') ?>">Liên hệ</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>

