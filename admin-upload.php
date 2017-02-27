<?php 
	require_once 'core/list-file-functions.php';
	// Nếu người dùng click Upload
    if (isset($_POST['uploadclick']))
    {
    	// biến thông báo
    	$success_alert = "<script>$('#formUploadPest .alert').attr('class', 'alert alert-success');</script>";
        // Nếu người dùng có chọn file để upload
        if (isset($_FILES['pest']))
        {
            // Nếu file upload không bị lỗi,
            // Tức là thuộc tính error > 0
            if ($_FILES['pest']['error'] > 0)
            {
                echo 'File Upload Bị Lỗi';
            }
            else{
            	// nếu là file .txt thì upload
            	if ($_FILES['pest']['type'] == "text/plain")
            	{
            		// Upload file
	                move_uploaded_file($_FILES['pest']['tmp_name'], './upload/'.$_FILES['pest']['name']);
	                echo $success_alert.'Upload file thành công! Sau 3s sẽ reload.';
	                reload('',3000);
            	}
            	// ngược lại ko phải .txt
            	else 
            	{
            		echo 'Không đúng định dạng. Vui lòng upload file .txt !';
            		reload('',3000);
            	}
                
            }
        }
        else{
            echo 'Bạn chưa chọn file upload';
        }
    }
    // Nếu là upload ảnh
    else if (isset($_POST['uploadclick_img']))
    {
    	// biến thông báo
    	$success_alert = "<script>$('#formUploadImg .alert').attr('class', 'alert alert-success text-center');</script>";
    	// Nếu người dùng có chọn file để upload
        if (isset($_FILES['img']))
        {
        	
            // Nếu file upload không bị lỗi,
            // Tức là thuộc tính error > 0
            if ($_FILES['img']['error'] > 0)
            {
                echo 'Ảnh Upload Bị Lỗi ';
            }
            else
            {
            	// nếu là file ảnh thì upload
            	if ($_FILES['img']['type'] == "image/jpeg" ||
            		$_FILES['img']['type'] == "image/jpg" ||
            		$_FILES['img']['type'] == "image/png" ||
                    $_FILES['img']['type'] == "image/bmp")
            	{
            		// Nhận dữ liệu gửi về
    				$path_img = 'img/'.$_POST['path_img'];
    				// nếu thư mục chứa ảnh chưa có thì tạo
    				if (!is_dir($path_img)) {
    					mkdir($path_img);
    				}
    				$url_img = $path_img.'/'.$_FILES['img']['name'];
            		// Upload file
	                move_uploaded_file($_FILES['img']['tmp_name'], $url_img );
	                echo $success_alert.'Upload file thành công!';
	                echo '<img src="'.$url_img.'" class="img-responsive img-thumbnail" alt="">';
	                //reload('',5000);
            	}
            	// ngược lại ko phải .txt
            	else 
            	{
            		echo 'Không đúng định dạng ảnh. Vui lòng upload lại !';
            	}   
            }
        }
        else{
            echo 'Bạn chưa chọn file upload';
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