<?php 
      require_once 'classes/FILE.php';
      $title_pest = isset($_POST['title_pest']) ? $_POST['title_pest'] : false;
      $flag = isset($_POST['flag']) ? $_POST['flag'] : false;
      $file = new FILE(); // khởi tạo đối tượng
      $file->file_name = $title_pest; // tên file
      $file->path = $file->folder.$file->file_name.'.txt'; // gán đường dẫn
      $file->fopen = @fopen($file->path, "r"); // mở file với quyền only read
       
      // kiểm tra file có tồn tại ko
      if (!$file->fopen) {
            // nếu ko tồn tại
            ?>
            <script type="text/javascript" language="javascript">
                  $(' .alert').removeClass('hidden');
                  $(' .alert').html('Tên pest không tồn tại.');
            </script>' 
            <?php
      }
      else 
      { // nếu tồn tại
            $file->file_array = file($file->path); // chuyển thành mảng
            $file->count_file = count($file->file_array); // đếm số dòng trong mảng
            $file->get_array($flag); // tại mảng kết hợp
            $file->result(); // in ra mảng
      }
      

 ?>