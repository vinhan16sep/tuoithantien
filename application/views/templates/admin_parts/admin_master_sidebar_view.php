<?php if ($this->ion_auth->logged_in()): ?>
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar" style="height: auto;">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo site_url('assets/admin/'); ?>dist/img/admin.png" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>MN Tuổi Thần Tiên</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->

            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->



            <ul class="sidebar-menu tree" data-widget="tree">

                <li class="header">MAIN NAVIGATION</li>
                <li class="<?php echo ($active == 'dashboard')? 'active' : '' ?>">
                    <a href="<?php echo base_url('admin/dashboard'); ?>">
                        <i class="fa fa-tachometer" aria-hidden="true"></i>
                        <span>Dashboard</span>
                        <span class="pull-right-container"></span>
                    </a>
                </li>
                <li class="<?php echo ($active == 'menu')? 'active' : '' ?>">
                    <a href="<?php echo base_url('admin/menu'); ?>">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                        <span>Menu</span>
                        <span class="pull-right-container"></span>
                    </a>
                </li>

                <li class="<?php echo ($active == 'banner')? 'active' : '' ?>">
                    <a href="<?php echo base_url('admin/banner/index'); ?>">
                        <i class="fa fa-picture-o" aria-hidden="true"></i>
                        <span>Banner</span>
                        <span class="pull-right-container">
                </span>
                    </a>
                </li>

                <li class="<?php echo ($active == 'subcribe')? 'active' : '' ?>">
                    <a href="<?php echo base_url('admin/subcribe'); ?>">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                        <span>Đăng ký theo dõi</span>
                        <span class="pull-right-container"></span>
                    </a>
                </li>

                <li class="<?php echo ($active == 'register')? 'active treeview' : 'treeview' ?>">
                    <a href=""><i class="fa fa-graduation-cap" aria-hidden="true"></i> Đăng ký nhập học
                        <span class="pull-right-container">
                    <span class="label label-primary pull-right">2</span>
                  </span>
                    </a>

                    <ul class="treeview-menu">
                        <li class="<?php echo ($active == 'register' && $sub_active == 'index')? 'active' : '' ?>">
                            <a href="<?php echo base_url('admin/register/index'); ?>"><i class="fa fa-minus" aria-hidden="true"></i> Chờ xử lý</a>
                        </li>

                        <li class="<?php echo ($sub_active == 'register_finish')? 'active' : '' ?>">
                            <a href="<?php echo base_url('admin/register/register_finish'); ?>"><i class="fa fa-minus" aria-hidden="true"></i> Đã hoàn thành</a>
                        </li>
                    </ul>
                </li>

                <li class="<?php echo ($active == 'placement')? 'active' : '' ?>">
                    <a href="<?php echo base_url('admin/placement/index'); ?>">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <span>Cơ sở</span>
                        <span class="pull-right-container">
                </span>
                    </a>
                </li>

                <li class="<?php echo ($active == 'class')? 'active' : '' ?>">
                    <a href="<?php echo base_url('admin/classification/index'); ?>">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <span>Lớp học</span>
                        <span class="pull-right-container">
                </span>
                    </a>
                </li>

                <li class="<?php echo ($active == 'article')? 'active' : '' ?>">
                    <a href="<?php echo base_url('admin/article/index'); ?>">
                        <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                        <span>Bài viết</span>
                        <span class="pull-right-container">
                </span>
                    </a>
                </li>

                <li class="<?php echo ($active == 'introduce')? 'active treeview' : 'treeview' ?>">
                    <a href=""><i class="fa fa-list" aria-hidden="true"></i> Giới thiệu
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>

                    <ul class="treeview-menu">
                            <li class="<?php echo ($active == 'introduce' && $sub_active == 'category')? 'active' : '' ?>">
                                <a href="<?php echo base_url('admin/introduce/category') ?>"><i class="fa fa-wrench" aria-hidden="true"></i>Thêm/sửa danh mục</a>
                            </li>
                        <?php if(!empty($introduce_menu)): ?>
                            <?php foreach($introduce_menu as $value): ?>
                                <li class="<?php echo ($active == 'introduce' && $sub_active == 'list_in_category' && $icon_active == $value['id'])? 'active' : '' ?>">
                                    <a href="<?php echo base_url('admin/introduce/list_in_category/' . $value['id']); ?>"  title="<?php echo (strlen($value['title']) > 30)? $value['title'] : '' ?>">
                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                        <?php
                                            $string_title = substr($value['title'], 0, 30);
                                            $result = substr($string_title, 0, strrpos($string_title, ' '));
                                            if (strlen($value['title']) > 30){
                                                echo $result . ' ...';
                                            }else{
                                                echo $value['title'];
                                            }
                                        ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>

                        <?php endif; ?>
                    </ul>
                </li>

                <li class="<?php echo ($active == 'admission')? 'active treeview' : 'treeview' ?>">
                    <a href=""><i class="fa fa-list" aria-hidden="true"></i> Thông tin nhập học
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>

                    <ul class="treeview-menu">
                        <li class="<?php echo ($active == 'admission' && $sub_active == 'category')? 'active' : '' ?>">
                            <a href="<?php echo base_url('admin/admission/category') ?>"><i class="fa fa-wrench" aria-hidden="true"></i> Thêm/sửa danh mục
                            </a>
                        </li>
                        <?php if(!empty($admission_menu)): ?>
                            <?php foreach($admission_menu as $value): ?>
                                <li class="<?php echo ($active == 'admission' && $sub_active == 'list_in_category' && $icon_active == $value['id'])? 'active' : '' ?>">
                                    <a href="<?php echo base_url('admin/admission/list_in_category/' . $value['id']); ?>"  title="<?php echo (strlen($value['title']) > 30)? $value['title'] : '' ?>">
                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                        <?php
                                            $string_title = substr($value['title'], 0, 30);
                                            $result = substr($string_title, 0, strrpos($string_title, ' '));
                                            if (strlen($value['title']) > 30){
                                                echo $result . ' ...';
                                            }else{
                                                echo $value['title'];
                                            }
                                        ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </li>

                <li class="<?php echo ($active == 'parental')? 'active treeview' : 'treeview' ?>">
                    <a href=""><i class="fa fa-handshake-o" aria-hidden="true"></i> Phối hợp cùng phụ huynh
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>

                    <ul class="treeview-menu">
                        <li class="<?php echo ($active == 'parental' && $sub_active == 'category')? 'active' : '' ?>">
                            <a href="<?php echo base_url('admin/parental/category') ?>"><i class="fa fa-wrench" aria-hidden="true"></i> Thêm/sửa danh mục
                            </a>
                        </li>
                        <?php if(!empty($parental_menu)): ?>
                            <?php foreach($parental_menu as $value): ?>
                                <li class="<?php echo ($active == 'parental' && $sub_active == 'list_in_category' && $icon_active == $value['id'])? 'active' : '' ?>">
                                    <a href="<?php echo base_url('admin/parental/list_in_category/' . $value['id']); ?>"  title="<?php echo (strlen($value['title']) > 30)? $value['title'] : '' ?>">
                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                        <?php
                                            $string_title = substr($value['title'], 0, 30);
                                            $result = substr($string_title, 0, strrpos($string_title, ' '));
                                            if (strlen($value['title']) > 30){
                                                echo $result . ' ...';
                                            }else{
                                                echo $value['title'];
                                            }
                                        ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </li>

                <li class="<?php echo ($active == 'activity')? 'active treeview' : 'treeview' ?>">
                    <a href=""><i class="fa fa-laptop"></i></i> Hoạt động
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>

                    <ul class="treeview-menu">
                        <li class="<?php echo ($active == 'activity' && $sub_active == 'category')? 'active' : '' ?>">
                            <a href="<?php echo base_url('admin/activity/category') ?>"><i class="fa fa-wrench" aria-hidden="true"></i> Thêm/sửa danh mục
                            </a>
                        </li>
                        <?php if(!empty($activity_menu)): ?>
                            <?php foreach($activity_menu as $value): ?>
                                <li class="<?php echo ($active == 'activity' && $sub_active == 'list_in_category' && $icon_active == $value['id'])? 'active' : '' ?>">
                                    <a href="<?php echo base_url('admin/activity/list_in_category/' . $value['id']); ?>"  title="<?php echo (strlen($value['title']) > 30)? $value['title'] : '' ?>">
                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                        <?php
                                            $string_title = substr($value['title'], 0, 30);
                                            $result = substr($string_title, 0, strrpos($string_title, ' '));
                                            if (strlen($value['title']) > 30){
                                                echo $result . ' ...';
                                            }else{
                                                echo $value['title'];
                                            }
                                        ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </li>

                <li class="<?php echo ($active == 'library' || $active == 'video')? 'active treeview' : 'treeview' ?>">
                    <a href=""><i class="fa fa-address-book" aria-hidden="true"></i> Thư viện
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>

                    <ul class="treeview-menu">
                        <li class="<?php echo ($active == 'library' && $sub_active == 'index')? 'active' : '' ?>">
                            <a href="<?php echo base_url('admin/library/index'); ?>"><i class="fa fa-picture-o" aria-hidden="true"></i> Thư viện ảnh</a>
                        </li>

                        <li class="<?php echo ($active == 'video' && $sub_active == 'index')? 'active' : '' ?>">
                            <a href="<?php echo base_url('admin/video/index'); ?>"><i class="fa fa-video-camera" aria-hidden="true"></i> Thư viện video</a>
                        </li>
                    </ul>
                </li>




                <!--          <li class="--><?php //echo ($active == 'introduce')? 'active treeview' : 'treeview' ?><!--">-->
                <!--            <a href="">-->
                <!--              <i class="fa fa-list" aria-hidden="true"></i>-->
                <!--              <span>Giới thiệu</span>-->
                <!--              <span class="pull-right-container">-->
                <!--                <i class="fa fa-angle-left pull-right"></i>-->
                <!--              </span>-->
                <!--            </a>-->
                <!--            <ul class="treeview-menu">-->
                <!--              <li class="--><?php //echo ($sub_active == 'overview')? 'active' : '' ?><!--">-->
                <!--                <a href="--><?php //echo base_url('admin/introduce/overview'); ?><!--">-->
                <!--                  <i class="fa fa-info-circle" aria-hidden="true"></i> Tổng quan-->
                <!--                </a>-->
                <!--              </li>-->
                <!---->
                <!--              <li class="--><?php //echo ($sub_active == 'index' && $icon_active != '' && $icon_active != 'ngoai-khoa')? 'active treeview' : 'treeview' ?><!--">-->
                <!--                <a href=""><i class="fa fa-graduation-cap" aria-hidden="true"></i> Giáo dục-->
                <!--                  <span class="pull-right-container">-->
                <!--                    <span class="label label-primary pull-right">4</span>-->
                <!--                  </span>-->
                <!--                </a>-->
                <!---->
                <!--                <ul class="treeview-menu">-->
                <!--                  <li class="--><?php //echo ($sub_active == 'index' && $icon_active == 'muc-tieu')? 'active' : '' ?><!--">-->
                <!--                    <a href="--><?php //echo base_url('admin/introduce/index/muc-tieu'); ?><!--"><i class="fa fa-minus" aria-hidden="true"></i> Mục tiêu</a>-->
                <!--                  </li>-->
                <!---->
                <!--                  <li class="--><?php //echo ($sub_active == 'index' && $icon_active == 'ngoai-ngu')? 'active' : '' ?><!--">-->
                <!--                    <a href="--><?php //echo base_url('admin/introduce/index/ngoai-ngu'); ?><!--"><i class="fa fa-minus" aria-hidden="true"></i> Ngoại ngữ</a>-->
                <!--                  </li>-->
                <!---->
                <!--                  <li class="--><?php //echo ($sub_active == 'index' && $icon_active == 'giao-duc-theo-lua-tuoi')? 'active' : '' ?><!--">-->
                <!--                    <a href="--><?php //echo base_url('admin/introduce/index/giao-duc-theo-lua-tuoi'); ?><!--"><i class="fa fa-minus" aria-hidden="true"></i> Giáo dục theo lứa tuổi</a>-->
                <!--                  </li>-->
                <!---->
                <!--                  <li class="--><?php //echo ($sub_active == 'index' && $icon_active == 'tap-huan')? 'active' : '' ?><!--">-->
                <!--                    <a href="--><?php //echo base_url('admin/introduce/index/tap-huan'); ?><!--"><i class="fa fa-minus" aria-hidden="true"></i> Tập huấn</a>-->
                <!--                  </li>-->
                <!--                </ul>-->
                <!--              </li>-->
                <!---->
                <!--              <li class="--><?php //echo ($sub_active == 'index' && $icon_active == 'ngoai-khoa')? 'active' : '' ?><!--">-->
                <!--                <a href="--><?php //echo base_url('admin/introduce/index/ngoai-khoa'); ?><!--"><i class="fa fa-gamepad" aria-hidden="true"></i> Ngoại khoá</a>-->
                <!--              </li>-->
                <!--            </ul>-->
                <!--          </li>-->
                <!---->
                <!---->
                <!--          <li class="--><?php //echo ($active == 'admission')? 'active treeview' : 'treeview' ?><!--">-->
                <!--            <a href="#">-->
                <!--              <i class="fa fa-list" aria-hidden="true"></i>-->
                <!--              <span>Thông tin nhập học</span>-->
                <!--              <span class="pull-right-container">-->
                <!--                <span class="label label-primary pull-right">4</span>-->
                <!--              </span>-->
                <!--            </a>-->
                <!--            <ul class="treeview-menu">-->
                <!---->
                <!--              <li class="--><?php //echo ($sub_active == 'admission_procedure' && $icon_active == 'thu-tuc-nhap-hoc')? 'active' : '' ?><!--">-->
                <!--                <a href="--><?php //echo base_url('admin/admission/admission_procedure/thu-tuc-nhap-hoc'); ?><!--">-->
                <!--                  <i class="fa fa-address-book" aria-hidden="true"></i> Thủ tục nhập học-->
                <!--                 </a>-->
                <!--              </li>-->
                <!---->
                <!--              <li class="--><?php //echo ($sub_active == 'list' && $icon_active == 'hoc-phi')? 'active' : '' ?><!--">-->
                <!--                <a href="--><?php //echo base_url('admin/admission/show_list/hoc-phi'); ?><!--">-->
                <!--                  <i class="fa fa-money" aria-hidden="true"></i> Học phí-->
                <!--                </a>-->
                <!--              </li>-->
                <!---->
                <!--              <li class="--><?php //echo ($sub_active == 'admission_procedure' && $icon_active == 'lich-hoc')? 'active' : '' ?><!--">-->
                <!--                <a href="--><?php //echo base_url('admin/admission/admission_procedure/lich-hoc'); ?><!--">-->
                <!--                  <i class="fa fa-calendar" aria-hidden="true"></i> Lịch học-->
                <!--                </a>-->
                <!--              </li>-->
                <!---->
                <!--              <li class="--><?php //echo ($sub_active == 'list' && $icon_active == 'chuong-trinh-khuyen-mai')? 'active' : '' ?><!--">-->
                <!--                <a href="--><?php //echo base_url('admin/admission/show_list/chuong-trinh-khuyen-mai'); ?><!--">-->
                <!--                  <i class="fa fa-gift" aria-hidden="true"></i> Chương trình khuyến mại-->
                <!--                </a>-->
                <!--              </li>-->
                <!---->
                <!--            </ul>-->
                <!--          </li>-->
                <!---->
                <!---->
                <!--          <li class="--><?php //echo ($active == 'parental')? 'active treeview' : 'treeview' ?><!--">-->
                <!--            <a href="#">-->
                <!--              <i class="fa fa-handshake-o" aria-hidden="true"></i>-->
                <!--              <span>Phối hợp cùng phụ huynh</span>-->
                <!--              <span class="pull-right-container">-->
                <!--                <i class="fa fa-angle-left pull-right"></i>-->
                <!--              </span>-->
                <!--            </a>-->
                <!--            <ul class="treeview-menu">-->
                <!--              <li class="--><?php //echo ($sub_active == 'activity' && $icon_active == 'che-do-sinh-hoat-1-ngay')? 'active' : '' ?><!--">-->
                <!--                <a href="--><?php //echo base_url('admin/parental/activity/che-do-sinh-hoat-1-ngay'); ?><!--">-->
                <!--                  <i class="fa fa-circle-o"></i> Chế độ sinh hoạt 1 ngày-->
                <!--                </a>-->
                <!--              </li>-->
                <!---->
                <!--              <li class="--><?php //echo ($sub_active == 'list' && $icon_active == 'lien-lac')? 'active' : '' ?><!--">-->
                <!--                <a href="--><?php //echo base_url('admin/parental/show_list/lien-lac'); ?><!--">-->
                <!--                  <i class="fa fa-paper-plane-o" aria-hidden="true"></i> Liên lạc-->
                <!--                </a>-->
                <!--              </li>-->
                <!---->
                <!--              <li class="--><?php //echo ($sub_active == 'list' && $icon_active == 'thuc-don')? 'active' : '' ?><!--">-->
                <!--                <a href="--><?php //echo base_url('admin/parental/show_list/thuc-don'); ?><!--">-->
                <!--                  <i class="fa fa-cutlery" aria-hidden="true"></i> Thực đơn-->
                <!--                </a>-->
                <!--              </li>-->
                <!---->
                <!--              <li class="--><?php //echo ($sub_active == 'list' && $icon_active == 'y-te')? 'active' : '' ?><!--">-->
                <!--                <a href="--><?php //echo base_url('admin/parental/show_list/y-te'); ?><!--">-->
                <!--                  <i class="fa fa-medkit" aria-hidden="true"></i> Y tế-->
                <!--                </a>-->
                <!--              </li>-->
                <!---->
                <!--              <li class="--><?php //echo ($sub_active == 'activity' && $icon_active == 'gio-dua-don')? 'active' : '' ?><!--">-->
                <!--                <a href="--><?php //echo base_url('admin/parental/activity/gio-dua-don'); ?><!--">-->
                <!--                  <i class="fa fa-hourglass-start" aria-hidden="true"></i> Giờ đưa đón-->
                <!--                </a>-->
                <!--              </li>-->
                <!---->
                <!--              <li class="--><?php //echo ($sub_active == 'list' && $icon_active == 'ky-luat')? 'active' : '' ?><!--">-->
                <!--                <a href="--><?php //echo base_url('admin/parental/show_list/ky-luat'); ?><!--">-->
                <!--                  <i class="fa fa-address-book" aria-hidden="true"></i> Kỷ luật-->
                <!--                </a>-->
                <!--              </li>-->
                <!--            </ul>-->
                <!--          </li>-->
                <!---->
                <!---->
                <!--          <li class="--><?php //echo ($active == 'activity' || $active == 'library' || $active == 'video')? 'active treeview' : 'treeview' ?><!--">-->
                <!--            <a href="#">-->
                <!--              <i class="fa fa-laptop"></i>-->
                <!--              <span>Hoạt động</span>-->
                <!--              <span class="pull-right-container">-->
                <!--                <i class="fa fa-angle-left pull-right"></i>-->
                <!--              </span>-->
                <!--            </a>-->
                <!--            <ul class="treeview-menu">-->
                <!--              <li class="--><?php //echo ($sub_active == 'index' && $icon_active == 'thong-bao')? 'active' : '' ?><!--">-->
                <!--                <a href="--><?php //echo base_url('admin/activity/index/thong-bao'); ?><!--">-->
                <!--                  <i class="fa fa-bullhorn" aria-hidden="true"></i> Thông báo-->
                <!--                </a>-->
                <!--              </li>-->
                <!---->
                <!--              <li class="--><?php //echo ($active == 'library')? 'active' : '' ?><!--">-->
                <!--                <a href="--><?php //echo site_url('admin/library/index') ?><!--">-->
                <!--                  <i class="fa fa-picture-o" aria-hidden="true"></i> Thư viện ảnh-->
                <!--                </a>-->
                <!--              </li>-->
                <!---->
                <!--              <li class="--><?php //echo ($active == 'video')? 'active' : '' ?><!--">-->
                <!--                <a href="--><?php //echo site_url('admin/video') ?><!--">-->
                <!--                  <i class="fa fa-video-camera" aria-hidden="true"></i> Thư viện video-->
                <!--                </a>-->
                <!--              </li>-->
                <!---->
                <!--              <li class="--><?php //echo ($sub_active == 'index' && $icon_active == 'tuyen-sinh')? 'active' : '' ?><!--">-->
                <!--                <a href="--><?php //echo base_url('admin/activity/index/tuyen-sinh'); ?><!--">-->
                <!--                  <i class="fa fa-binoculars" aria-hidden="true"></i> Tuyển sinh-->
                <!--                </a>-->
                <!--              </li>-->
                <!---->
                <!--              <li class="--><?php //echo ($sub_active == 'index' && $icon_active == 'trai-nghiem')? 'active' : '' ?><!--">-->
                <!--                <a href="--><?php //echo base_url('admin/activity/index/trai-nghiem'); ?><!--">-->
                <!--                  <i class="fa fa-eye" aria-hidden="true"></i> Trải nghiệm-->
                <!--                </a>-->
                <!--              </li>-->
                <!---->
                <!--            </ul>-->
                <!--          </li>-->
                <!---->
                <!--          <li style="display: none;">-->
                <!--            <a href="--><?php //echo base_url('admin/comment') ?><!--">-->
                <!--              <i class="fa fa-commenting-o" aria-hidden="true"></i>-->
                <!--              <span>Bình luận</span>-->
                <!--            </a>-->
                <!--          </li>-->
                <!---->
                <!--            <li class="--><?php //echo ($active == 'subcribe')? 'active' : '' ?><!--">-->
                <!--                <a href="--><?php //echo base_url('admin/subcribe/index'); ?><!--">-->
                <!--                    <i class="fa fa-hand-pointer-o" aria-hidden="true"></i>-->
                <!--                    <span>Subcribe</span>-->
                <!--                    <span class="pull-right-container">-->
                <!--                    </span>-->
                <!--                </a>-->
                <!--            </li>-->

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
<?php endif; ?>