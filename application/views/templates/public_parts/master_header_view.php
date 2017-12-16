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

    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/public/theme/xmas/css/theme.css') ?>">

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
                            <?php if ($introduce_nav): ?>
                                <?php foreach ($introduce_nav as $item): ?>
                                    <li><a href="<?php echo base_url('gioi-thieu/').$item['slug'] ?>"><?php echo $item['title'] ?></a></li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <li class="dropdown yellow">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Thông tin nhập học <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu yellow">
                            <?php if ($admission_nav): ?>
                                <?php foreach ($admission_nav as $item): ?>
                                    <li><a href="<?php echo base_url('thong-tin-nhap-hoc/').$item['slug'] ?>"><?php echo $item['title'] ?></a></li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo base_url('nhap-hoc/dang-ky-nhap-hoc') ?>">Đăng ký nhập học</a></li>
                        </ul>
                    </li>
                    <li class="dropdown pink">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Phối hợp cùng phụ huynh <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu pink">
                            <?php if ($parental_nav): ?>
                                <?php foreach ($parental_nav as $item): ?>
                                    <li><a href="<?php echo base_url('phoi-hop-cung-phu-huynh/').$item['slug'] ?>"><?php echo $item['title'] ?></a></li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <li class="dropdown cyan">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Hoạt động <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu cyan">
                            <li><a href="<?php echo base_url('thu-vien/thu-vien-anh/')?>">Thư viện ảnh</a></li>
                            <li><a href="<?php echo base_url('thu-vien/video') ?>">Thư viện video</a></li>
                            <?php if ($activity_nav): ?>
                                <?php foreach ($activity_nav as $item): ?>
                                    <li><a href="<?php echo base_url('hoat-dong/').$item['slug'] ?>"><?php echo $item['title'] ?></a></li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <li class="orange"><a href="<?php echo base_url('lien-he') ?>">Liên hệ</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>

