<?php 
	/**
	* 
	*/
	Class FILE {
		public 	$file_name = null, // tên file
				  $folder = 'upload/', // folder chứa file
				  $path = null, // đường dẫn file
				  $fopen = null,  // biến để mở file
				  $file_array = null, // chuyển sang mảng
				  $count_file = null , // tổng số dòng trong file
				  $question_array = array(), // mảng chứa chứa các câu hỏi trong pest
				  $question = array( // mảng kết hợp chứa câu hỏi và đáp án
				  	'question' => null,
				  	'A' => null,
				  	'B' => null,
				  	'C' => null,
				  	'D' => null
				  ),
				  $qs = array() ; 

		// hàm kiểm tra có file ko
		// nếu có thì mở thành công
		// ngc lại báo lỗi
		public function check_file() {
			if (!$this->fopen) {
				echo 'mở không thành công';
			} else {
				echo 'mở thành công';
				
				
			}
		}

		
		// test
		public function get_array($flag)
		{	
			$pattern = '/\w/';
			$j = 0;
			// chuyển file thành mảng các dòng
			$this->file_array = file($this->path);
			// đếm số dòng trong file
			$this->count_file = count($this->file_array);

			for ($i=0; $i < $this->count_file; $i++) {
				$value = trim($this->file_array[$i]);					
				if (   $this->startWith($value, 'TITL')==1
				|| $this->startWith($value, 'COMP')==1
				|| $this->startWith($value, 'MVER')==1
				|| $this->startWith($value, 'MODI')==1
				|| $this->startWith($value, 'TIME')==1
				|| $this->startWith($value, 'NOTE')==1
				|| $this->startWith($value, '\'')   ==1) {
					continue;					
				}				
				// nếu phân tử không rỗng
				if (preg_match($pattern,$value) ) {		
					$this->qs["$j"] = $value;
					$j++;		
				}
				// ngc lại nếu phần tử rỗng tức là ký tự xuống dòng
				else {
					// nếu mảng qs ko rỗng thì thêm qs vào question_array
					if (empty($this->qs) != 1) {
						array_push($this->question_array, $this->qs);
					}					
					$this->qs = array();
					$j = 0;
				}
				if ($i == $this->count_file-1) {
					if (empty($this->qs) != 1) {
						array_push($this->question_array, $this->qs);
					}
				}
			}
			// đảo vị trí câu hỏi trong mảng
			if ($flag == 1) {
				# code...
				shuffle($this->question_array);
			}
			
		}
		public function result()
		{				
                foreach ($this->question_array as $key => $this->qs)
                {                   		
                		$ul = $key + 1;            	
                		echo '<ul class="qs'.$ul.'">';
	                    echo  '<div><strong>'.$this->xuly_chuoi1($this->qs[0]) . '</strong></div>';
	                    echo  $this->check_img($this->qs[0]);
	                    // xóa phần tử đầu tiên là câu hỏi , còn lại là các đáp án
	                    array_shift($this->qs);
	                    // đảo vị trí đáp án
	                    shuffle($this->qs);
	                    $id = count($this->qs);
	                    for ($i=0; $i < $id; $i++) { 
	                    	$li = $i + 1;
	                    	$check = $this->qs[$i]{0};
	                    	if ($check === "*") {
	                    		$str = strstr($this->qs[$i],$this->qs[$i]{1});
	                    		echo  '<li id="s'.$li.'" class="true">'. $this->xuly_chuoi($str) .  '</li>'; 
	                    	} else {
	                    		echo  '<li id="s'.$li.'" class="false">'. $this->xuly_chuoi($this->qs[$i]) .  '</li>'; 
	                    	}
	                    }	                                      
	                    echo '</ul>';
	                
                }             
		}

		// hàm xử lý đáp án
		public function xuly_chuoi($string)
		{
			$array = array('a.','b.','c.','d.');
			$array1 = array('<script>','</script>','<?php','?>');
			$string = str_replace($array, '+)', $string);
			$string = str_replace($array1,'',$string);
			$string = str_replace('[CR]','</br>',$string);			
			return $string;
		}
		public function xuly_chuoi1($string)
		{			
			$array1 = array('<script>','</script>','<?php','?>');			
			$string = str_replace($array1,'',$string);
			$string = str_replace('[CR]','</br>',$string);			
			return $string;
		}
		// kiểm tra câu hỏi có hình ảnh không
		public function check_img($string1)
		{	
			// kiểm tra có định dạng .jpg trong chuỗi ko
			
			$jpg = strrpos($string1, ".jpg");
			$png = strrpos($string1, ".png");
			$bmp = strrpos($string1, ".bmp");
			if ($jpg > 0 || $png > 0 || $bmp > 0) {
				// nếu có ký tự < thì lấy chuỗi từ ký tự < đến hết chuỗi
				$img = strrchr($string1, "<");
				// $img se có giá trị là <abc.jpg> 
				// xóa bỏ ký tự < và > ở 2 đầu chuỗi
				$arr = array('<','>');
				$img = str_replace($arr, '', $img);
				// lấy đường dẫn img
				$url_img = 'img/'.$this->file_name.'/'.$img;
				// in ra hình ảnh của img
				echo '<div class="img"><img src="'.$url_img.'" class="img-responsive" /></div>';
			}
			
		}


		public function startWith($haystack, $needle) 
		{
			return $needle === "" || strrpos($haystack, $needle, - strlen($haystack)) !== false;
		}
		public function endsWith($haystack, $needle) 
		{
		    return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== false);
		}
	}
 ?>