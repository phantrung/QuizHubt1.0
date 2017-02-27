<?php require_once 'core/init.php'; ?>
<?php require_once 'includes/header.php'; ?>
<?php require_once 'onl.php'; ?>
<div class="container">
	<div class="row">
		<!--Search form-->
		<div class="search_file col-md-12 col-sm-12 col-sx-12 ">
			<div class=" panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Tìm kiếm môn học</h3>
				</div>
				<div class="panel-body">
					<div class="input-group">
				        <input type="text" class="form-control pull-left biginput" id="title_file" value="" placeholder="Nhập tên môn học ở đây"/>
				        <span class="input-group-btn">
					        <button type="submit" class="btn btn-primary" name="open_file"  id="open_file" >Let Go!</button>
				        </span>
			        </div>					
		            <div class="alert alert-danger hidden pull-left"></div>
				</div>
			</div>		
		</div>
		<div class="col-md-3 col-sm-4 hidden-xs">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Mục lục câu hỏi</h3>
				</div>
				<div class="panel-body">
					<div class="list_question"></div>
				</div>
			</div>
		</div>
		<!--score-->
		<div class="col-md-9 col-sm-8 col-xs-12 pull-right">
			<div class="score col-md-12 col-sm-12 col-xs-12">
				<div class="total_question col-md-3 col-sm-3 col-xs-6">
					Tổng : <input type="text" id="total_question" value="0" disabled="disabled">		
				</div>
				<div class="total_clicked col-md-3 col-sm-3 col-xs-6">
					Đã làm : <input type="text" id="total_clicked" value="0" disabled="disabled">		
				</div>
				<div class="question_true col-md-3 col-sm-3 col-xs-6">
					Đúng : <input type="text" id="question_true" value="0" disabled="disabled">
				</div>
				<div class="total_score col-md-3 col-sm-3 col-xs-6">
					Điểm : <input type="text" id="total_score" value="0" disabled="disabled">
				</div>	
			</div>
		</div>
		<!--question-->
		<div class="col-md-9 col-sm-8 col-xs-12 pull-right">
			<div class="result col-md-12 col-sm-12 col-xs-12">
				<div class="col-md-12 question">
						<?php require_once 'core/info.php' ; ?>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-4 col-xs-12">
			<div class="control col-md-12 col-sm-12 col-xs-12">
				<button type="submit" class="btn btn-primary"   id="prev" >
					Câu trước		
				</button>
				<button type="submit" class="btn btn-primary"   id="next" >
						Câu tiếp		
				</button>
			</div>
		</div>
	</div>
</div>
<?php require_once 'libs/sound/sound.php' ?>
<?php require_once 'includes/footer.php'; ?>