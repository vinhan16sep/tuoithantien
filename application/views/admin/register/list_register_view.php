<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content row">
        <div class="container col-md-12">
            <h3 style="text-transform: uppercase; text-align: center;">
            </h3>
            <div>
                <span><?php echo $this->session->flashdata('message'); ?></span>
            </div>
            <div class="row">
                <form action="<?php echo base_url('admin/register/index/') ?>" class="form-horizontal col-md-12 col-sm-12 col-xs-12" method="get" style="margin-bottom: 30px;">

                    <input type="text" name="search" value="<?php  ?>" placeholder="Tìm Kiếm Tên Học Sinh..." class="form-control" style=" width: 40%; float: left;margin-right: 5px;">
                    <select name="search_place" class="form-control" style="width: 15%; float: left; margin-right: 5px;">
                        <option value="" selected="selected">Chọn cơ sở</option>
                        <option value="1">Cơ sở I Hà Đông</option>
                        <option value="2">Cơ sở II Hà Đông</option>
                        <option value="3">Cơ sở III Hà Đông</option>
                        <option value="4">Cơ sở IV Hà Đông</option>
                        <option value="5">Cơ sở V Hà Đông</option>
                    </select>
                    <select name="search_grade" class="form-control" style="width: 20%; float: left; margin-right: 5px;">
                        <option value="" selected="selected">Chọn một lớp</option>
                        <option value="1">Lớp bé (Trẻ từ 3-4 tuổi)</option>
                        <option value="2">Lớp nhỡ (Trẻ từ 4-5 tuổi)</option>
                        <option value="3">Lớp lớn (Trẻ hơn 5 tuổi)</option>
                    </select>
                    <input type="submit" name="btn-search" value="Tìm Kiếm" class="btn btn-primary" style="float: left">
                </form>
            </div>
            <?php if($register): ?>
                <div class="row">
                    <div class="col-lg-12" style="margin-top: 10px;">
                        <table class="table table-hover table-bordered table-condensed">
                            <tbody>
                            <tr>
                                <td style="width: 150px"><b><a href="#">Họ và tên học sinh</a></b></td>
                                <td><b><a href="#">Ngày sinh</a></b></td>
                                <td><b><a href="#">Nơi sinh</a></b></td>
                                <td><b><a href="#">Tư vấn</a></b></td>
                                <td><b><a href="#">Chi tiết</a></b></td>
                                <td><b>Thực hiện</b></td>
                            </tr>
                            <?php foreach ($register as $value): ?>
                                <tr class="row_">
                                    <td><?php echo $value['name']; ?></td>
                                    <td><?php echo date_format(date_create($value['dob']), "d-m-Y"); ?></td>
                                    <td><?php echo $value['pob']; ?></td>
                                    <td><?php echo ($value['callback'] == 0)? '' : 'Cần tư vấn thêm' ; ?></td>
                                    <td><a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapse_<?php echo $value['id']; ?>" aria-expanded="false" aria-controls="collapseExample">
                                            Chi tiết
                                        </a></td>
                                    <td>
                                        <form class="form_ajax">
                                            <a href="<?php echo base_url('admin/activity/edit/') ?>" title="Đã tư vấn">
                                                <i class="fa fa-phone-square" aria-hidden="true"></i>
                                            </a>
                                            &nbsp;&nbsp;
                                            <a href="<?php echo base_url('admin/activity/remove') ?>" title="Hoàn thành" class="btn-remove" data-id="<?php  ?>" >
                                                <i class="fa fa-list-alt" aria-hidden="true"></i>
                                            </a>
                                        </form>
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6">
                                        <div class="collapse" id="collapse_<?php echo $value['id']; ?>">
                                            <div class="well">
                                                <table class="table">
                                                    <tr>
                                                        <td><a href="#">Họ và tên học sinh:</a></td>
                                                        <td><?php echo $value['name']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="#">Ngày sinh:</a></td>
                                                        <td><?php echo date_format(date_create($value['dob']), "d-m-Y"); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="#">Nơi sinh:</a></td>
                                                        <td><?php echo $value['pob']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="#">Lớp học tham gia:</a></td>
                                                        <td>
                                                            <?php
                                                                switch ($value['grade']){
                                                                    case '1':
                                                                        echo 'Lớp bé (Trẻ từ 3-4 tuổi)';
                                                                        break;
                                                                    case '2':
                                                                        echo 'Lớp nhỡ (Trẻ từ 4-5 tuổi)';
                                                                        break;
                                                                    case '3':
                                                                        echo 'Lớp lớn (Trẻ hơn 5 tuổi)';
                                                                        break;
                                                                    default:
                                                                        # code...
                                                                        break;
                                                                }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="#">Cở sở trường học:</a></td>
                                                        <td>
                                                            <?php
                                                            switch ($value['place']){
                                                                case '1':
                                                                    echo 'Cơ sở I Hà Đông';
                                                                    break;
                                                                case '2':
                                                                    echo 'Cơ sở II Hà Đông';
                                                                    break;
                                                                case '3':
                                                                    echo 'Cơ sở III Hà Đông';
                                                                    break;
                                                                case '4':
                                                                    echo 'Cơ sở IV Hà Đông';
                                                                    break;
                                                                case '5':
                                                                    echo 'Cơ sở V Hà Đông';
                                                                    break;
                                                                default:
                                                                    # code...
                                                                    break;
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="#">Họ và Tên phụ huynh, người đăng ký:</a></td>
                                                        <td><?php echo $value['parent_name']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="#">Số điện thoại liên hệ:</a></td>
                                                        <td><?php echo $value['phone']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="#">Email liên hệ:</a></td>
                                                        <td><?php echo $value['email']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="#">Địa chỉ hiện tại:</a></td>
                                                        <td><?php echo $value['address']; ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="col-md-6 col-md-offset-5 page">
                            <?php echo $page_links; ?>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="row">
                    Không có bài viết nào!
                </div>
            <?php endif; ?>
        </div>
    </section>
</div>