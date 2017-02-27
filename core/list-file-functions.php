<?php 
	// Lấy danh sách file trong folder upload/
    // $file_list là mảng để lưu ds file  
    $file_list = array_filter(glob('upload/*'),'is_file');
    // Tổng số lượng file trong mảng
    $length_file = count($file_list);
    // thiết lập múi giờ chung
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	/**
	 * @param $total_size : Tổng số dung lượng 
	 */
	$total_size = null;
		for ($i=0; $i < $length_file; $i++) { 
			$size = round(filesize($file_list[$i])/1024,2);
			$total_size = $total_size + $size;
		}
	
	/**
	 * Hàm Lấy thông tin của file Pest
	 * @param   $path : Đường dẫn file pest
	 * @param $id : id của file trong mảng
	 */
	function get_info($id,$path) {
		$title = str_replace(array('upload/','.txt'),'',$path);
		if ($id == $length_file-1) {
			$title = $title.'<span class="badge">Mới</span>';
		}
		$size = round(filesize($path)/1024,2);
		$time = date('d/m/Y', filectime($path));
		echo '
		<a href="admin.php?ac=edit_pest&&id='.$id.'" class="list-group-item" data-toggle="tooltip" data-placement="right" title="Click để chỉnh sửa">
			<h4>'.$title.'</h4>
			<small class="center-block"> ID : '.$id.'</small>
			<small class="center-block"> Size : '.$size.' KB</small>
			<small> Chỉnh sửa lần cuối : '.$time.'</small>	
		</a>			
		';
		}

	/**
	 * Hàm in ảnh ra nếu có
	 */
	function get_img($path_img){ 
        // nếu tồn tại thư mục chứa ảnh     
        if (is_dir($path_img)) {
            // lấy ds ảnh trong thư mục
            $list_img = array_filter(glob($path_img.'/*'),'is_file');
            $count_img = count($list_img);
            // in ảnh ra 
            echo '<label>Danh sách ảnh <span class="total-img badge">'.$count_img.'</span></label>';
            echo '<div id="result-img">';
            for ($i=0; $i < $count_img; $i++) {
                $url_img = $list_img[$i];
                $title_img = str_replace(array($path_img,'/'),'',$url_img);
                echo '
                <div class="item col-md-3 col-sm-3 col-xs-4 text-center">
	                <div class="item-img">
	                	<img src="'.$url_img.'" class="img-responsive" alt="">
	                </div>
	                <h5 class="title-img" id="img-'.$i.'">'.$title_img.'</h5>
	                <button class="btn btn-danger" id="delete-img-'.$i.'" onclick="delete_img('.$i.')" >
	                    <span class="glyphicon glyphicon-trash"></span> Xoá
	                </button>
                </div>';                  
            }
            echo '</div>';
        }
        // nếu ko tồn tại thư mục chứa ảnh
        else {
            echo '<div class="alert alert-danger">Pest này chưa có ảnh nào</div>';
        }
    }
 ?>