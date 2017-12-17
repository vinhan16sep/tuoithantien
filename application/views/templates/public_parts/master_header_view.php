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
                    <?php if(!empty($menus)): ?>
                    <?php foreach($menus as $key => $value): ?>
                        <li class="<?php echo (!empty($value['sub'])) ? 'dropdown' : ''; ?>" style="color:<?php echo ($value['level'] == 1) ? $value['color'] : ''; ?>">
                            <a style="color:<?php echo ($value['level'] == 1) ? $value['color'] : ''; ?>" href="<?php echo $value['url']; ?>" <?php echo (!empty($value['sub'])) ? ' class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"' : ''; ?>>
                                <?php echo $value['title']; ?> <?php echo (!empty($value['sub'])) ? '<span class="caret"></span>' : ''; ?>
                            </a>
                            <?php if(!empty($value['sub'])): ?>
                                <ul class="dropdown-menu" style="color:<?php echo ($value['level'] == 1) ? $value['color'] : ''; ?>">
                                    <?php foreach($value['sub'] as $k => $v): ?>
                                        <li><a href="<?php echo $v['url'] ?>"><?php echo $v['title'] ?></a></li>
                                    <?php endforeach; ?>

                                </ul>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>

