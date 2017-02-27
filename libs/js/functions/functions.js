
$(function () {
	$no = document.getElementById("no") ;
	$audio1 = document.getElementById("GodLike") ;
	$audio2 = document.getElementById("DoubleKill");
	$audio3 = document.getElementById("TripleKill");
	$audio4 = document.getElementById("QuadraKill");
	$audio5 = document.getElementById("PentaKill");
	$audio6 = document.getElementById("Legendary");
	
	

	// bắt sự kiện click vào checkbox để tắt âm thanh
	$('#functions #muted').click(function() {
		var $muted = $('#functions #muted');
		$checked = $muted.hasClass('checked');
		if ($checked == false) {
			$muted.addClass('checked');
			$no.muted = true ;
			$audio1.muted = true;
			$audio2.muted = true;
			$audio3.muted = true;
			$audio4.muted = true;
			$audio5.muted = true;
			$audio6.muted = true;
		}
		else 
		{
			$no.muted = false ;
			$audio1.muted = false;
			$audio2.muted = false;
			$audio3.muted = false;
			$audio4.muted = false;
			$audio5.muted = false;
			$audio6.muted = false;
			$muted.removeClass('checked');
		}
	});

	// bắt sự kiện đổi font chữ
	$('#font').on('change', function() {
		var $font = $('#font').val();
			$font = '"'+$font+'"';
		$('.question ul').css('font-family', $font);
	});
})
