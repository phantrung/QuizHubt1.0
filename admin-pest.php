<?php
 
	// Kết nối database, session, general info
	require_once 'core/init.php';
	 
	// Nếu không tồn tại $user
	if (!$user)
	{
	    header('Location: admin.php'); // Di chuyển đến trang chủ
	}

	// nếu tồn tại hành động gửi đến
	if (isset($_POST['ac']))
	{
		$ac = $_POST['ac'];
		// nếu hành động là create
		if ($ac == 'create')
		{
			// Nhận dữ liệu gửi về
			$title_create_pest = trim(@$_POST['title_create_pest']);
			$body_create_pest = @$_POST['body_create_pest'];

			// Các biến chứa code JS về thông báo
	        $show_alert = "<script>$('#formCreatePest .alert').removeClass('hidden');</script>";
	        $hide_alert = "<script>$('#formCreatePest .alert').addClass('hidden');</script>";
	        $success_alert = "<script>$('#formCreatePest .alert').attr('class', 'alert alert-success');</script>";

	        // Lệnh tạo file pest
	        $url = 'upload/'.$title_create_pest.'.txt';
	        if (file_exists($url))
			{
			    echo 'Tên Pest đã tồn tại. Hãy kiểm tra lại ! ';
			}
			else
			{
				$fp = @fopen($url,"w+"); // tạo file
				// tiền hành ghi file
				file_put_contents($url,$body_create_pest);
				// đóng file
				fclose($fp);
				echo $show_alert.$success_alert .'Tạo pest thành công ! Sau 3s sẽ chuyển về trang admin.';
				reload('admin.php',3000);
			}
	        
		}
		// nếu hành động là edit
		else if ($ac == 'edit')
		{
			// Nhận dữ liệu gửi về
			$old_title_pest = trim(@$_POST['old_title_pest']);
			$title_edit_pest = trim(@$_POST['title_edit_pest']);
			$body_edit_pest = @$_POST['body_edit_pest'];
			// Các biến chứa code JS về thông báo
	        $show_alert = "<script>$('#formEditPest .alert').removeClass('hidden');</script>";
	        $hide_alert = "<script>$('#formEditPest .alert').addClass('hidden');</script>";
	        $success_alert = "<script>$('#formEditPest .alert').attr('class', 'alert alert-success');</script>";

	        // Lấy url của file
	        $url = 'upload/'.$old_title_pest.'.txt';
	        $old_url_img = 'img/'.$old_title_pest;
	        // Kiểm tra file có tồn tại không
	        if (file_exists($url))
	        {	
	        	// nếu tồn tại	        	
	        	$fp = @fopen($url,"a+"); // mở file
	        	// tiền hành ghi file
				file_put_contents($url,$body_edit_pest);
				// đóng file
				fclose($fp);
				// nếu $old_title_pest khác $title_edit_pest thì thực hiện đổi tên
	        	if ($old_title_pest != $title_edit_pest) {
	        		$new_url = 'upload/'.$title_edit_pest.'.txt'; // tên file mới
	        		$new_url_img = 'img/'.$title_edit_pest; // tên thư mục chứa ảnh mới
	        		rename($url,$new_url);
	        		if (is_dir($old_url_img)) {
	        			rename($old_url_img,$new_url_img);
	        		}
	        	}
				echo $show_alert.$success_alert .'Chỉnh sửa thành công !';
				//reload('admin.php',3000);
	        }

		}
		// nếu hành động là xóa
		else if ($ac == 'delete')
		{
			// Nhận dữ liệu gửi về
			$title_edit_pest = trim(@$_POST['title_edit_pest']);
			// lấy đường dẫn của file
			$url = 'upload/'.$title_edit_pest.'.txt';
			$folder_img = 'img/'.$title_edit_pest;
			// kiểm tra file có tồn tại ko
			if (file_exists($url)) {
				// xóa file
				unlink($url);
				// nếu tồn tại thực chứa ảnh thì xóa
				if (is_dir($folder_img)) {
					
					$img_list = array_filter(glob($folder_img.'/*'),'is_file');	
					$count_img = count($img_list);
					// nếu $count_img = 0 tức là folder rỗng
					if ($count_img == 0) {
						rmdir($folder_img); // thực hiện xóa
					}
					// ngược lại tức là folder có chứa ảnh 
					else {
						for ($i=0; $i < $count_img; $i++) { 
							unlink($img_list[$i]); // xóa lần lượt các ảnh trong folder
						}
						rmdir($folder_img); // thực hiện xóa folder
					}											
				}
				echo 'Xóa pest thành công !. Sau 2s sẽ chuyển hướng về trang admin.';
				reload('admin.php',2000);
			}
			else {
				echo 'Tên pest không tồn tại ! Vui lòng lưu thông tin trước khi xóa.';
			}
		}
		// nếu hành động là xóa ảnh
		else if ($ac =='delete_img')
		{
			// Nhận dữ liệu gửi về
			// Lấy url của ảnh
			$url_img = $_POST['url_img'];
			if (file_exists($url_img)) {
				unlink($url_img);
				echo 'Xóa pest thành công !. Sau 2s sẽ reload.';
				reload('',2000);
			}
			else {
				echo 'Lỗi';
			}
		}
	}
	function reload($url,$time) {
		echo "
			<script>
				function reload(){
					location.href = '$url';
				}
				setTimeout(reload,'$time');
			</script>
		";
	}
?>