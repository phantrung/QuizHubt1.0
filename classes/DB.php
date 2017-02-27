<?php 
	Class DB {
		// khai báo biến private
		private $hostname = 'localhost',
				$username = 'root',
				$password = 'mysql',
				$dbname   = 'inote';

		// khai báo biến kết nối toàn cục
		public $cn = null;
		public $rs = null;

		//hàm kết nối
		public function connect() {
			//kết nôi
			$this->cn = mysqli_connect(
					$this -> hostname,
					$this -> username,
					$this -> password,
					$this -> dbname
				);
		}

		// hàm ngắt kết nối
		public function close() {
			// nếu đã kết nối
			if ($this -> cn ) {
				mysqli_close($this->cn);
			};
		}

		// hàm truy vấn
		public function query($sql = null) {
			if ($this -> cn) {
				mysqli_query($this ->cn , $sql);
			}
		}
		// hàm đếm hàng
		public function num_rows($sql = null) {
			if ($this->cn) {
				$query = mysqli_query($this->cn,$sql);
				$row = mysqli_num_rows($query);
				return $row;
			}
		}

		// hàm lấy dữ liệu
		public function fetch_assoc($sql = null, $type) {
			if ($this->cn) {
				$query = mysqli_query($this->cn,$sql);
				if ($type == 0) {
					while ($row = mysqli_fetch_assoc($query)) 
					{
						$data[] = $row;
					}
					return $data;
				}
				// nếu type = 1 
				if ($type = 1) {
					$data = mysqli_fetch_assoc($query);
					return $data;
				}
			}
		}

		// ham xử lý chuỗi
		public function real_escape_string($str) {
			if ($this->cn) {
				$str = mysqli_escape_string($this->cn,$str);
			}
			else 
			{
				$str = $str;
			}
			return $str;
		}

		// hàm lấy id vừa insert
		public function insert_id()
		{
			if ($this->cn) {
				// trả về id vừa insert
				return mysqli_insert_id($this->cn);
			}
		}
	}
 ?>