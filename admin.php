<?php 
	// include db , session
	require_once 'core/init.php';
	require_once 'core/list-file-functions.php';
	// include header.php
	require_once 'includes/header.php';
	/**
	 *  LAYOUT
	 */
	// Nếu tồn tại user
	if ($user) {
		// kiểm tra hành động
		// Nếu thực hiện hành động 
		if (isset($_GET['ac'])) 
		{
			// xử lý chuỗi
			$ac = addslashes(trim(htmlentities($_GET['ac'])));

			// nếu hành động là tạo mới
			if ( $ac == 'create_pest') {
				// include template upload.php
				require_once 'templates/create-file-form.php';
			}
			// Nếu hành động là upload
			else if ( $ac == 'upload_pest')
			{
				// include template upload.php
				require_once 'templates/upload-form.php';
			}
			// nếu hành động là chỉnh sửa file
			else if ($ac == 'edit_pest') 
			{
				// Nếu có id truyền vào
				if (isset($_GET['id'])) 
				{
					$get_id = addslashes(trim(htmlentities($_GET['id'])));
					if ($get_id != '') 
					{
						// nếu id truyền vào nhỏ hơn tổng số file
						if ($get_id < $length_file)
						{
							// include template chỉnh sửa file
							require_once 'templates/edit-file.php';
						}	
						else
						{
							// Hiển thị thông báo lỗi
		                    echo '
		                        <div class="container">
		                            <div class="alert alert-danger">
		                                Pest này không tồn tại.
		                            </div>
		                        </div>
		                    ';
						}
					}
					else
					{
						header('Location : admin.php');
					}
				}
				else
				{
					header('Location : admin.php');
				}
			}
		}
		// Nếu ko thực hiện hành động gì
		else
		{
			// include template list-file.php
			require_once 'templates/list-file.php';
			//require_once 'autosearch.php';
		}
	}
	// ngược lại ko tồn tại user
	else
	{
		// include template đăng nhập
		require_once 'templates/login-form.php';
	}
	require_once 'includes/footer.php';
 ?>