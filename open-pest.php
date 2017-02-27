<?php 
    require_once 'classes/FILE.php';
    // Nếu người dùng click Upload
    if (isset($_POST['upload_pest']))
    {
        $success_alert = "<script>$('#formOpenPest .alert').attr('class', 'alert alert-success');$('#formOpenPest .alert').html('Upload file thành công!');</script>";
        $hide_modal = "<script>$('#modalUpload').modal('hide');</script>";
        $show_modal = "<script>$('#modalUpload').modal('show');</script>";
        // Nếu người dùng có chọn file để upload
        if (isset($_FILES['file_pest']))
        {
              // Nếu file upload không bị lỗi,
              // Tức là thuộc tính error > 0
              if ($_FILES['file_pest']['error'] > 0)
              {
                echo 'File Upload Bị Lỗi';
              }
              else{
                    // nếu là file .txt thì upload
                    if ($_FILES['file_pest']['type'] == "text/plain"|| $_FILES['file_pest']['type'] == "application/octet-stream")
                    {
                        if ($_FILES['file_pest']['size'] > 1048576) {
                            echo "<script>$('#formOpenPest .alert').html('File không được lớn hơn 1MB !');</script>";
                            sleep(1);
                            echo "<script>$('#modalUpload .progress-bar').css('width', '0');$('#percent').html('0');</script>";                   
                        }
                        else 
                        {
                            // tạo đối tượng
                            $file = new FILE();
                            // lấy url ở client
                            $file->path = $_FILES['file_pest']['tmp_name'];                              
                            $file->fopen = @fopen($file->path,"r");
                            $file->file_array = file($file->path); // chuyển thành mảng
                            $file->count_file = count($file->file_array); // đếm số dòng trong mảng
                            $file->get_array($flag); // tại mảng kết hợp
                            $file->result(); // in ra mảng
                            if (file_exists($file->path)){                            
                                unlink($file->path);
                            }else {
                                echo 'Lỗi gì đó , vui lòng thử lại!';
                            }
                            sleep(1);
                            echo $hide_modal;
                        }                      
                                                  
                    }
                    // ngược lại ko phải .txt
                    else
                    {
                        echo "<script>$('#formOpenPest .alert').html('Không đúng định dạng. Vui lòng upload file .txt hoặc .exm !');</script>";
                        sleep(1);
                        echo "<script>$('#modalUpload .progress-bar').css('width', '0');$('#percent').html('0');</script>";
                    }                
              }
        }
        else{
            echo "<script>$('#formOpenPest .alert').html('Bạn chưa chọn file. Vui lòng upload file .txt !');</script>";
            sleep(1);
            echo "<script>$('#modalUpload .progress-bar').css('width', '0');$('#percent').html('0');</script>";
        }
    } 

 ?>