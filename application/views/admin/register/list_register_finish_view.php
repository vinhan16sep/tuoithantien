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
                <form action="<?php echo base_url('admin/register/register_finish/') ?>" class="form-horizontal col-md-12 col-sm-12 col-xs-12" method="get" style="margin-bottom: 30px;">

                    <input type="text" name="search" value="<?php echo $search; ?>" placeholder="Tìm Kiếm Tên Học Sinh..." class="form-control" style=" width: 40%; float: left;margin-right: 5px;">
                    <select name="search_place" class="form-control" style="width: 15%; float: left; margin-right: 5px;" id="search_place">
                        <option value="" selected="selected">Chọn cơ sở</option>
                        <?php foreach ($placement as $item): ?>
                            <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <select name="search_grade" class="form-control" style="width: 20%; float: left; margin-right: 5px;" id="search_grade">
                        <option value="" selected="selected">Chọn một cơ sở trước</option>
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
                            </tr>
                            <?php foreach ($register as $value): ?>
                                <tr class="row_">
                                    <td><?php echo $value['name']; ?></td>
                                    <td><?php echo date_format(date_create($value['dob']), "d-m-Y"); ?></td>
                                    <td><?php echo $value['pob']; ?></td>
                                    <td id="result_call_<?php echo $value['id'] ?>">
                                        <?php
                                        switch ($value['callback']){
                                            case '1':
                                                echo '<span style="color: red">Cần tư vấn thêm</span>';
                                                break;
                                            case '2':
                                                echo '<span style="color: #00a65a">Đã gọi tư vấn</span>';
                                                break;
                                            default:
                                                echo '';
                                                break;
                                        }
                                        ?>
                                    </td>
                                    <td><a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapse_<?php echo $value['id']; ?>" aria-expanded="false" aria-controls="collapseExample">
                                            Chi tiết
                                        </a>
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
                                                            <?php echo $value['sub_grade']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="#">Cở sở trường học:</a></td>
                                                        <td>
                                                            <?php echo $value['sub_place']; ?>
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
<script type="text/javascript">
    $('#search_place').change(function () {
        var search_place = $(this).val();
        jQuery.ajax({
            method: "get",
            url: "http://localhost/tuoithantien/admin/register/select_class",
            // url: location.protocol + "//" + location.host + (location.port ? ':' + location.port : '') + "/tuoithantien/comment/create_comment",
            data: {search_place : search_place},
            success: function(result){
                $('#search_grade').html(result);
            }
        });
    });
</script>