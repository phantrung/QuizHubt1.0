<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
        	<div class="login-form panel panel-default">
        		<div class="panel-heading">
                    <h3 class="text-primary"><span class="glyphicon glyphicon-upload"></span> Upload</h3>
                </div>
                <div class="panel-body">                		        	
		        	<form method="POST" action="admin-upload.php" id="formUploadPest" enctype="multipart/form-data">
						<div class="form-group">
							<label for="myfile">Chọn File Upload</label>
							<input type="file" name="pest" class="form-control" name="myfile" id="myfile" multiple>
						</div>
						<a href="admin.php" class="btn btn-default">
		                    <span class="glyphicon glyphicon-arrow-left"></span> Trở về
		                </a>
		                <input type="submit" class="btn btn-primary" id="submit_upload_pest" name="uploadclick" value="Upload">		                
		                <div id="progress-group">
			                <div class="progress progress-striped active">
			                  <div class="progress-bar" id="progressbar" role="progressbar">
			                  </div>
			                  <div class="progress-text" id="percent">0%</div>
			                </div>
			            </div>
			            <div class="alert alert-danger hidden" id="result"></div>
		        	</form>
		        	<?php require_once 'admin-upload.php'; ?>
                </div>
        	</div>
        </div>
    </div>
</div>