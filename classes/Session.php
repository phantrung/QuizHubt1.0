<?php 
	class Session {
		// hàm gửi dữ liệu
		public function send($user)
		{
			$_SESSION['user'] = $user;
		}

		// hàm lưu session
		public function start()
		{
			session_start();
		}

		//hàm lấy dữ liệu
		public function get()
		{
			// nếu tồn tại user
			if (isset($_SESSION['user'])) 
			{
				$user = $_SESSION['user'];
			}
			else
			{
				$user = '';
			}
			return $user;
		}

		// hàm xóa user
		public function destroy()
		{
			session_destroy();
		}
	}
 ?>