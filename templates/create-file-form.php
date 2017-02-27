<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="login-form panel panel-default">
                <div class="panel-heading">
                    <h3><span class="glyphicon glyphicon-plus"></span> Tạo Pest mới</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" onsubmit="return false;" id="formCreatePest">
                        <div class="alert alert-danger hidden"></div>
                        <div class="form-group">
                            <label for="user_signin">Tiêu đề</label>
                            <input type="text" class="form-control" id="title_create_pest">
                        </div>
                        <div class="form-group">
                            <label for="pass_signin">Nội dung</label>
                            <textarea class="form-control" id="body_create_pest" rows="18"></textarea>
                        </div>
                        <a href="admin.php" class="btn btn-default">
                            <span class="glyphicon glyphicon-arrow-left"></span> Trở về
                        </a>
                        <button class="btn btn-primary" id="submit_create_pest">
                            <span class="glyphicon glyphicon-ok"></span> Tạo Pest
                        </button>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>