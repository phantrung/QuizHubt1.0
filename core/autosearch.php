<?php 
	
	// lấy ds file trong folder upload
	$list = scandir('upload');
	// khai báo mảng
	$filelist = array();

	$length = count($list);
	for ($i=2; $i < $length; $i++) { 
		$filelist[] = xuly_filename($list[$i]);
	}
	$size = count($filelist);
	// hàm xóa bỏ đuôi .txt của tên file
	function xuly_filename($string)
	{
		$string = str_replace('.txt', '', $string);
		return $string;
	}
	?>
	<script type="text/javascript" language="javascript"> 
		 filename = [ <?php
			for ($i=0; $i < $size; $i++) { 
				echo '{ value : '."'".$filelist[$i]."', data:".$i.'},';		
			} ?>];
	</script> 
	<?php
 ?>