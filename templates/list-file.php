<?php require_once 'core/list-file-functions.php'; ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="list bg-primary text-center">
				<h3 class="title-list"><span class="glyphicon glyphicon-list"></span> Danh sách Pest</h3>
				<small>Tổng số Pest : <?php echo $length_file; ?></small>
			</div>
            
            <div class="list-group">
		        
		        <?php			        
					// in ra ds file pest
					foreach ($file_list as $id => $value) {
						//get_info($id,$value);
						//$total_size = $total_size + $size;
					}
					for ($i=$length_file-1; $i >= 0 ; $i--) { 
						# code...
						get_info($i,$file_list[$i]);
						$total_size = $total_size + $size;
					}
		        ?>

		    </div>						
            <div class="alert alert-danger hidden"></div>
        </div>
	</div>
</div>