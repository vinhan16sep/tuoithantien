<!--main content start-->
<div class="content-wrapper" style="min-height: 916px;">
    <div class="box-body pad table-responsive">
        <h3>Thống kê</h3>
<!--        --><?php //foreach ($themes as $item): ?>
<!--            <button type="button" class="btn btn-success btn-lg btn-theme" style="width: 20%" data-id="--><?php //echo $item['id'] ?><!--" --><?php //echo ($item['is_active'] == 1)? 'disabled="disabled"' : '' ?><!-- >--><?php //echo $item['name'] ?><!--</button>-->
<!--        --><?php //endforeach; ?>
    </div>

    <div class="">
        <div class="col-md-6">
            <div class="info-box">
                <span class="info-box-icon bg-blue">
                    <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Tổng số bài viết</span>
                    <span class="info-box-number"><?php echo $total_acticle; ?></span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info-box">
                <a href="#" data-toggle="modal" data-target="#posts">
                    <span class="info-box-icon bg-blue">
                        <i class="fa fa-file-text-o" aria-hidden="true"></i>
                    </span>
                </a>
                <div class="info-box-content">
                    <span class="info-box-text">Số bài viết trong ngày</span>
                    <span class="info-box-number"><?php echo $total_day_acticle; ?></span>
                </div>
            </div>
        </div>

        <div class="modal fade" id="posts" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Số bài viết trong ngày</h4>
              </div>
              <div class="modal-body">
                <ul class="nav nav-pills nav-justified" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#intro" aria-controls="intro" role="tab" data-toggle="tab">
                            Giới thiệu <span class="badge"><?php echo $day_introduce ?></span>
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#admission" aria-controls="profile" role="tab" data-toggle="tab">
                            Thông tin nhập học <span class="badge"><?php echo $day_admission ?></span>
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#parental" aria-controls="messages" role="tab" data-toggle="tab">
                            Phối hợp cùng phụ huynh <span class="badge"><?php echo $day_parental ?></span>
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#activity" aria-controls="settings" role="tab" data-toggle="tab">
                            Hoạt động <span class="badge"><?php echo $day_activity ?></span>
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#article" aria-controls="profile" role="tab" data-toggle="tab">
                            Bài viết <span class="badge"><?php echo $day_article ?></span>
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#library" aria-controls="messages" role="tab" data-toggle="tab">
                            Thư viện ảnh <span class="badge"><?php echo $day_library ?></span>
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#video" aria-controls="settings" role="tab" data-toggle="tab">
                            Thư viện video <span class="badge"><?php echo $day_video ?></span>
                        </a>
                    </li>
                </ul>

                  <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="intro">
                        <?php if ($list_introduce): ?>
                            <table class="table table-hover">
                                <theader>
                                    <tr>
                                        <td style="width: 150px;"><strong>Ảnh đại diện</strong></td>
                                        <td><strong>Tiêu đề</strong></td>
                                        <td><strong>Slug</strong></td>
                                        <td style="width: 150px;"><strong>Hành động</strong></td>
                                    </tr>
                                <tbody>
                                    
                                        <?php foreach ($list_introduce as $key => $value): ?>
                                            <tr>
                                                <td><img src="<?php echo base_url('assets/upload/introduce/'.$value['image']) ?>" width="100px"></td>
                                                <td><?php echo $value['title'] ?></td>
                                                <td><?php echo $value['slug'] ?></td>
                                                <td><a href="<?php echo base_url('admin/introduce/edit/'.$value['id']) ?>">Link tới bài viết</a></td>
                                            </tr>
                                        <?php endforeach ?>
                                    
                                </tbody>                        
                            </table>
                        <?php else: ?>
                            Không có bài viết mới trong ngày!
                        <?php endif ?>
                    </div>

                    <div role="tabpanel" class="tab-pane" id="admission">
                        <?php if ($list_admission): ?>
                            <table class="table table-hover">
                                <theader>
                                    <tr>
                                        <td style="width: 150px;"><strong>Ảnh đại diện</strong></td>
                                        <td><strong>Tiêu đề</strong></td>
                                        <td><strong>Slug</strong></td>
                                        <td style="width: 150px;"><strong>Hành động</strong></td>
                                    </tr>
                                <tbody>
                                    
                                        <?php foreach ($list_admission as $key => $value): ?>
                                            <tr>
                                                <td><img src="<?php echo base_url('assets/upload/admission/'.$value['image']) ?>" width="100px"></td>
                                                <td><?php echo $value['title'] ?></td>
                                                <td><?php echo $value['slug'] ?></td>
                                                <td><a href="<?php echo base_url('admin/admission/edit/'.$value['id']) ?>">Link tới bài viết</a></td>
                                            </tr>
                                        <?php endforeach ?>
                                    
                                </tbody>                        
                            </table>
                        <?php else: ?>
                            Không có bài viết mới trong ngày!
                        <?php endif ?>
                    </div>

                    <div role="tabpanel" class="tab-pane" id="parental">
                        <?php if ($list_parental): ?>
                            <table class="table table-hover">
                                <theader>
                                    <tr>
                                        <td style="width: 150px;"><strong>Ảnh đại diện</strong></td>
                                        <td><strong>Tiêu đề</strong></td>
                                        <td><strong>Slug</strong></td>
                                        <td style="width: 150px;"><strong>Hành động</strong></td>
                                    </tr>
                                <tbody>
                                    
                                        <?php foreach ($list_parental as $key => $value): ?>
                                            <tr>
                                                <td><img src="<?php echo base_url('assets/upload/parental/'.$value['image']) ?>" width="100px"></td>
                                                <td><?php echo $value['title'] ?></td>
                                                <td><?php echo $value['slug'] ?></td>
                                                <td><a href="<?php echo base_url('admin/parental/edit/'.$value['id']) ?>">Link tới bài viết</a></td>
                                            </tr>
                                        <?php endforeach ?>
                                    
                                </tbody>                        
                            </table>
                        <?php else: ?>
                            Không có bài viết mới trong ngày!
                        <?php endif ?>
                    </div>

                    <div role="tabpanel" class="tab-pane" id="activity">
                        <?php if ($list_activity): ?>
                            <table class="table table-hover">
                                <theader>
                                    <tr>
                                        <td style="width: 150px;"><strong>Ảnh đại diện</strong></td>
                                        <td><strong>Tiêu đề</strong></td>
                                        <td><strong>Slug</strong></td>
                                        <td style="width: 150px;"><strong>Hành động</strong></td>
                                    </tr>
                                <tbody>
                                    
                                        <?php foreach ($list_activity as $key => $value): ?>
                                            <tr>
                                                <td><img src="<?php echo base_url('assets/upload/activity/'.$value['image']) ?>" width="100px"></td>
                                                <td><?php echo $value['title'] ?></td>
                                                <td><?php echo $value['slug'] ?></td>
                                                <td><a href="<?php echo base_url('admin/activity/edit/'.$value['id']) ?>">Link tới bài viết</a></td>
                                            </tr>
                                        <?php endforeach ?>
                                    
                                </tbody>                        
                            </table>
                        <?php else: ?>
                            Không có bài viết mới trong ngày!
                        <?php endif ?>
                    </div>

                    <div role="tabpanel" class="tab-pane" id="article">
                        <?php if ($list_article): ?>
                            <table class="table table-hover">
                                <theader>
                                    <tr>
                                        <td style="width: 150px;"><strong>Ảnh đại diện</strong></td>
                                        <td><strong>Tiêu đề</strong></td>
                                        <td><strong>Slug</strong></td>
                                        <td style="width: 150px;"><strong>Hành động</strong></td>
                                    </tr>
                                <tbody>
                                    
                                        <?php foreach ($list_article as $key => $value): ?>
                                            <tr>
                                                <td><img src="<?php echo base_url('assets/upload/article/'.$value['image']) ?>" width="100px"></td>
                                                <td><?php echo $value['title'] ?></td>
                                                <td><?php echo $value['slug'] ?></td>
                                                <td><a href="<?php echo base_url('admin/article/edit/'.$value['id']) ?>">Link tới bài viết</a></td>
                                            </tr>
                                        <?php endforeach ?>
                                    
                                </tbody>                        
                            </table>
                        <?php else: ?>
                            Không có bài viết mới trong ngày!
                        <?php endif ?>
                    </div>

                    <div role="tabpanel" class="tab-pane" id="library">
                        <?php if ($list_library): ?>
                            <table class="table table-hover">
                                <theader>
                                    <tr>
                                        <td style="width: 150px;"><strong>Ảnh đại diện</strong></td>
                                        <td><strong>Tiêu đề</strong></td>
                                        <td><strong>Slug</strong></td>
                                        <td style="width: 150px;"><strong>Hành động</strong></td>
                                    </tr>
                                <tbody>
                                    
                                        <?php foreach ($list_library as $key => $value): ?>
                                            <tr>
                                                <td><img src="<?php echo base_url('assets/upload/image/'.$value['slug'].'/'.$value['sub']) ?>" width="100px"></td>
                                                <td><?php echo $value['title'] ?></td>
                                                <td><?php echo $value['slug'] ?></td>
                                                <td><a href="<?php echo base_url('admin/library/edit/'.$value['id']) ?>">Link tới bài viết</a></td>
                                            </tr>
                                        <?php endforeach ?>
                                    
                                </tbody>                        
                            </table>
                        <?php else: ?>
                            Không có bài viết mới trong ngày!
                        <?php endif ?>
                    </div>

                    <div role="tabpanel" class="tab-pane" id="video">
                        <?php if ($list_video): ?>
                            <table class="table table-hover">
                                <theader>
                                    <tr>
                                        <td><strong>Tiêu đề</strong></td>
                                        <td style="width: 150px;"><strong>Hành động</strong></td>
                                    </tr>
                                <tbody>
                                    <?php foreach ($list_video as $key => $value): ?>
                                        <tr>
                                            <td><?php echo $value['title'] ?></td>
                                            <td><a href="<?php echo base_url('admin/video/edit/'.$value['id']) ?>">Link tới bài viết</a></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>                        
                            </table>
                        <?php else: ?>
                            Không có bài viết mới trong ngày!
                        <?php endif ?>
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
            <div class="info-box">
                <span class="info-box-icon bg-blue">
                    <i class="fa fa-comments-o" aria-hidden="true"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Số lượng nhận xét mới</span>
                    <span class="info-box-number"><?php echo $total_comment; ?></span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info-box">
                <a href="<?php echo base_url('admin/register/index') ?>">
                    <span class="info-box-icon bg-blue">
                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                    </span>
                </a>
                <div class="info-box-content">
                    <span class="info-box-text">Số lượng đăng ký nhập học mới</span>
                    <span class="info-box-number"><?php echo $total_register; ?></span>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-12">
        <h3>THEME</h3>
        <div class="box box-info">
            <div class="box-header with-border">
                <h3>Chỉnh sửa Theme</h3>
            </div>
            <div class="box-body">
                <div class="row">
                <?php foreach ($themes as $item): ?>
                    <div class="col-md-3">
                        <button type="button" class="btn btn-success btn-lg btn-theme" style="width: 100%" data-id="<?php echo $item['id'] ?>" <?php echo ($item['is_active'] == 1)? 'disabled="disabled"' : '' ?> ><?php echo $item['name'] ?></button>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3>Thống kê khảo sát</h3>
            </div>
            <div class="box-body">
                <script src="<?php echo site_url('assets/admin/'); ?>Chart.js-2.7.1/Chart.js"></script>
                <script src="<?php echo site_url('assets/admin/'); ?>Chart.js-2.7.1/Chart.min.js"></script>

                <section class="content row">
                    <div>
                        <canvas id="surveyChart" width="200" height="30"></canvas>
                    </div>
                </section>
            </div>
        </div>
    </div>


</div>

<script>
    var surveyChartLabel = ['Con được học và chơi gì?', '"Khi đến tường cô giáo như mẹ hiền"', 'Con được ăn gì? Uống gì? Ngủ ngon không?', 'Tất cả các ý kiến trên'];
    var surveyChartData = [<?php echo '"'.implode('","',  $count ).'"' ?>];
    var ctx = document.getElementById("surveyChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'horizontalBar',
        data: {
            labels: surveyChartLabel,
            datasets: [{
                label: 'Bạn quan tâm nhất điều gì khi con tới trường?',
                data: surveyChartData,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
//            legend: {
//                display: false
//            },
            scales: {
                xAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }],
                yAxes: [{
                    barThickness: 20,
                    stacked: true
                }]
            }
        }
    });

    $('.btn-theme').click(function () {
        $('.btn-theme').attr('disabled', false);
        $(this).attr('disabled', true);
        var id = $(this).attr('data-id');
        jQuery.ajax({
            type: "get",
            url: "http://localhost/tuoithantien/admin/dashboard/edit_theme",
            // url: location.protocol + "//" + location.host + (location.port ? ':' + location.port : '') + "/tuoithantien/comment/create_comment",
            data: {id : id},
            success: function(result){
                if(JSON.parse(result).isExists == true){
                    alert("Thay đổi THEME thành công");
                }
            }
        })
    });

</script>

