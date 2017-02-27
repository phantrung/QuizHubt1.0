	<?php if (!$user) {
		require_once 'notif.php';
	} ?>	
		<div class="fb text-center hidden-xs">
			<div class="fb-like" data-href="https://www.facebook.com/TMooQuiz" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
		</div>

	<footer>
		<div class="copyright text-center col-md-12 col-sm-12 col-xs12">
			<p>&#169 2016 <a href="https://www.facebook.com/TMooQuiz/" target="_blank" title="Fanpage">TMooQuiz</a><span class="badge"><?php echo $count_user_online; ?></span></p>
		</div>	
		<div class="author text-center">
			<p>Design by <a href="https://www.facebook.com/boykutehb1" title="Trung Phan">TrungPhan</a></p>
		</div>
	</footer>
	<script type="text/javascript" src="libs/js/jquery.autocomplete.min.js"></script>
	<script type="text/javascript" src="libs/js/jquery.form.min.js"></script>
	<?php require_once 'core/autosearch.php'; ?>
    <script src="libs/js/functions/question.min.js"></script>
    <script src="libs/js/functions/pest.js"></script>
    <script src="libs/js/functions/functions.js"></script>
    <script src="libs/admin_js/signin.js"></script>
    <script src="libs/admin_js/upload-pest.js"></script>
    <script src="libs/admin_js/create-pest.js"></script>
    <script src="libs/admin_js/edit-pest.js"></script>
    <script src="libs/admin_js/delete-pest.js"></script>
    <script src="libs/bootstrap/js/bootstrap.min.js"></script>
    <?php require_once 'toolchat.php'; ?>
</body>
</html>