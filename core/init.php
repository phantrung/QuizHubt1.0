<?php 
	// include các thư viện
	require_once 'classes/DB.php';
	require_once 'classes/Session.php';

	// khởi tạo obj DB
	$db = new DB();
	// kết nối db
	$db->connect();

	// khởi tạo session
	$session = new Session();
	// bắt đầu session
	$session->start();
	// lấy dữ liệu user
	$user = $session->get();
	// Múi giờ chung
	date_default_timezone_set('Asia/Ho_Chi_Minh'); 
	$date_current = '';
	$date_current = date("Y-m-d H:i:sa");

	// nếu user tồn tại
	if ($user) {
		$sql_get_data_user = "Select * from users where username = '$user' ";

		// lấy thông tin user
		$data_user = $db->fetch_assoc($sql_get_data_user,1);
	}
 ?>