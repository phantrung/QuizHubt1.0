<div class="container"> 
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="login-form panel panel-default">
                <div class="panel-heading">
                    <h3>Đăng nhập</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" onsubmit="return false;" id="formSignin">
                        <div class="form-group">
                            <label for="user_signin">Tên đăng nhập</label>
                            <input type="text" class="form-control" id="user_signin" placeholder="Nhập tài khoản">
                        </div>
                        <div class="form-group">
                            <label for="pass_signin">Mật khẩu</label>
                            <input type="password" class="form-control" id="pass_signin" placeholder="Nhập mật khẩu">
                        </div>
                        <button class="btn btn-primary" id="submit_signin">Đăng nhập</button>
                        <a href="index.php" class="btn btn-default pull-right">
                            <span class="glyphicon glyphicon-arrow-left"></span> Trở về
                        </a>
                        <br><br>
                        <div class="alert alert-success">Chức năng này chỉ dành cho Admin.</div>
                    </form>
                </div>
            </div>           
        </div>
    </div>
</div>