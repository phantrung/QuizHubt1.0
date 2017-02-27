<?php 
	require_once 'core/list-file-functions.php'; 
	// lấy dữ liệu theo pest ID
	$path = $file_list[$get_id]; // lấy url
	$title_file = str_replace(array('upload/','.txt'),'',$path); // lấy tên file từ url
	$edit_last_time = date('d/m/Y H:i:s', filectime($path)); // lấy thời gian chỉnh sửa cuối cùng
	// mở file a+
	$fp = @fopen($path, "a+");
    // kiểm tra pest này có ảnh không
    $path_img = 'img/'.$title_file;

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="login-form panel panel-default">
                <div class="panel-heading">
                    <h3>Chỉnh sửa Pest</h3>
                    <div class="alert alert-info">
                        <?php
                            // Hiển thị ngày tháng tạo
                            echo 'Đã tạo vào ngày : '.$edit_last_time;
                        ?>
                    </div>
                </div>
                <div class="panel-body">
                    <!-- Nav tabs edit -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a href="#edit-pest" role="tab" data-toggle="tab">Pest</a></li>
                        <li><a href="#edit-img" role="tab" data-toggle="tab">Ảnh</a></li>
                    </ul>
                    <div class="tab-content">
                        <!-- Tab chỉnh sửa pest -->
                        <div class="tab-pane active" id="edit-pest">
                            <form method="POST" onsubmit="return false;" id="formEditPest">
                                <div class="alert alert-danger hidden"></div>
                                <div class="form-group">
                                    <label for="user_signin">Tiêu đề</label>
                                    <input type="text" class="form-control" id="title_edit_pest" value="<?php echo $title_file;  ?>">
                                </div>
                                <div class="form-group">
                                    <label for="pass_signin">Nội dung</label>
                                    <textarea class="form-control" id="body_edit_pest" rows="20"><?php echo file_get_contents($path);?></textarea>
                                </div>
                                <a href="admin.php" class="btn btn-default">
                                    <span class="glyphicon glyphicon-arrow-left"></span> Trở về
                                </a>
                                <button class="btn btn-danger pull-right" data-toggle="modal" data-target="#modalDeletePest">
                                    <span class="glyphicon glyphicon-trash"></span> Xoá
                                </button>                
                                <button class="btn btn-primary" id="submit_edit_pest">
                                    <span class="glyphicon glyphicon-ok"></span> Lưu
                                </button>
                                <div class="modal fade" id="modalDeletePest" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-trash"></span> Xoá Pest</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p>Bạn chắc chắn muốn xoá Pest này không ?</p>
                                                <div class="alert alert-danger hidden"></div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Không</button>
                                                <button type="button" class="btn btn-primary" id="submit_delete_pest">Đồng ý</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Tab chỉnh sửa ảnh -->
                        <div class="tab-pane" id="edit-img" >
                            <form method="POST" action="admin-upload.php" id="formUploadImg" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="user_signin">Thư mục ảnh upload</label>
                                    <input type="text" class="form-control" name="path_img" id="title_edit_pest" value="<?php echo $title_file;  ?>">
                                </div>
                                <div class="form-group">
                                    <label for="myfile">Chọn Ảnh Upload</label>
                                    <input type="file" name="img" class="form-control" name="myfile" id="myfile" multiple>
                                </div>
                                <a href="admin.php" class="btn btn-default">
                                    <span class="glyphicon glyphicon-arrow-left"></span> Trở về
                                </a>
                                <input type="submit" class="btn btn-primary" id="submit_upload_img" name="uploadclick_img" value="Upload">                     
                                <div id="progress-group">
                                    <div class="progress progress-striped active">
                                      <div class="progress-bar" id="progressbar" role="progressbar">
                                      </div>
                                      <div class="progress-text" id="percent">0%</div>
                                    </div>
                                </div>
                                <div class="alert alert-danger hidden" id="result"></div>
                            </form>
                            <div class="resutl-list-img"><?php get_img($path_img);; ?></div>
                        </div>
                    </div>
                    
                </div>
            </div>
            
            
        </div>
    </div>
</div>
    