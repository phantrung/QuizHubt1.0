<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <title>TMoo Quiz</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta itemprop="name" content="TMoo Quiz | Ứng dụng ôn thi trắc nghiệm Online ">
    <meta property="og:title" content="TMoo Quiz | Ứng dụng ôn thi trắc nghiệm Online" />
    <meta name="revisit-after" content="1 days" />
    <meta name="robots" content="INDEX,FOLLOW"/>
    <meta name="keywords" content="TMoo, TMoo trắc nghiệm , TMoo trac nghiem, TMoo pest, tmoo quiz , tmoo trac nghiem quiz , quiz hubt ,tmoo hubt, trac nghiem tmoo ,pest hubt , on thi hubt , on thi trac nghiem hubt, trac nghiem hubt, pest trac nghiem hubt, phan mem on thi trac nghiem hubt"/>
    <meta name="description" content="Trang web ứng dụng ôn thi trắc nghiệm HUBT giúp việc ôn thi hiệu quả nhất"/>
    <meta itemprop="description" content="Trang web ứng dụng ôn thi trắc nghiệm HUBT giúp việc ôn thi hiệu quả nhất">
    <meta property="og:description" content="Trang web ứng dụng ôn thi trắc nghiệm HUBT giúp việc ôn thi hiệu quả nhất" />
    <meta itemprop="image" content="http://www.pesthubt.com/libs/logo.png">
    <meta property="og:image" content="http://www.pesthubt.com/libs/logo.png" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://www.pesthubt.com/" />
    <meta property="og:site_name" content="pesthubt" />
    <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">    
    <link rel="stylesheet" href="libs/css/style.css">
    <link rel="stylesheet" href="libs/css/animate.css">
    <link href="favicon.ico" rel=”shortcut icon” />
    <script src="libs/js/jquery-2.0.0.min.js"></script>
    <script type="text/javascript">
        // makes sure the whole site is loaded
        jQuery(window).load(function() {
            $("#modalNotif").modal('show');
        })
    </script>
</head>
<body>
    <?php  include_once("analyticstracking.php"); ?>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=151017315247923";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    
    <header>
        <?php 
            // Nếu tồn tại $user
            if ($user)
            {
                echo '
                    <nav class="navbar navbar-default" role="navigation">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse" aria-expanded="false">
                                    <span class="sr-only">Menu</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="http://localhost/QuizHubt1.0"><span class="glyphicon glyphicon-edit"></span>TMooQuiz</a>
                            </div>
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse">
                                    <ul class="nav navbar-nav navbar-right">
                                    <li>
                                        <a href="admin.php">
                                            <span class="glyphicon glyphicon-home"></span> Home
                                        </a>
                                    </li> 
                                    <li>
                                        <a href="admin.php?ac=upload_pest">
                                            <span class="glyphicon glyphicon-upload"></span> Upload
                                        </a>
                                    </li>          
                                    <li>
                                        <a href="admin.php?ac=create_pest">
                                            <span class="glyphicon glyphicon-plus"></span> Pest mới
                                        </a>
                                    </li>
                                    <li>
                                        <a href="signout.php">
                                            <span class="glyphicon glyphicon-off"></span> Thoát
                                        </a>
                                    </li>
                                </ul>
                                <div id="functions" class="navbar-left">
                                        <input type="checkbox" name="chk[]" id="muted"  /> Tắt âm thanh
                                </div>                               
                            </div>
                        </div>
                    </nav>
                ';
            }
            // Ngược lại ko tồn tại user
            else 
            {
                echo '
                    <nav class="navbar navbar-default" role="navigation">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="http://www.pesthubt.com/"><span class="glyphicon glyphicon-edit"></span>TMooQuiz</a>
                            </div>
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse">
                                <ul class="nav navbar-nav navbar-left">
                                    <li class="functions">
                                        <a>
                                        <button class="btn-upload" data-toggle="modal" data-target="#modalUpload">
                                            <span class="glyphicon glyphicon-folder-open"></span> Mở File
                                        </button> 
                                        </a>
                                    </li>
                                    <li id="functions">
                                        <span>Thời gian chuyển câu : </span><input type="number" id="timer" value="2" min="0" max="10" />
                                    </li>
                                    <li id="functions">
                                        <input type="checkbox" name="chk[]" id="muted"  /> Tắt âm thanh
                                    </li>
                                    <li id="functions">
                                        <input type="checkbox"  id="dao_qs"  /> <span>Đảo câu hỏi</span>
                                    </li>
                                </ul>                                    
                            </div>
                        </div>
                    </nav>

                ';
                
            }
         ?>
         <!--Modal upload-->
        <div class="modal fade" id="modalUpload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">                
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-upload"></span> Mở File</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="open-pest.php" id="formOpenPest" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="myfile">Chọn File .txt hoặc .exm từ máy tính</label>
                                <input type="file" name="file_pest" class="form-control" name="myfile" id="myfile" multiple>
                            </div>
                            <input type="submit" class="btn btn-primary " id="upload_pest" name="upload_pest" value="Upload"/>
                            <input type="reset" class="rs hidden" name="" value="">
                            <div id="progress-group">
                            <div class="progress progress-striped active">
                                  <div class="progress-bar" id="progressbar" role="progressbar">
                                  </div>
                                  <div class="progress-text" id="percent">0%</div>
                                </div>
                            </div>                            
                            <div class="alert alert-danger hidden" id="resutl"></div>
                        </form>
                        <ul class="bg-success">
                            <li><strong>Chức năng có thể mở được tất cả đề của phần mềm TMooQuiz (đuôi là .exm) từ máy tính của bạn</strong></li>
                            <li><strong>Các bạn kiểm tra cấu trúc đề của file trước khi mở để tránh lỗi nhé !</strong></li>
                            <li><strong>Nếu trong đề có chứa ảnh vui lòng liên hệ <a href="https://www.facebook.com/TMooQuiz/" title="Fanpage TMooQuiz" target="_blank">Fanpage</a> để được giúp đỡ .</strong></li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-arrow-left"></span>Trở về</button>                       
                    </div>                
                </div>
            </div>
        </div>
    </header>