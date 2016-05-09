/********************
Newsletters
*********************/

$('#form-newsletters').submit(function (event) {
	event.preventDefault();

	$.ajax({
		url: PATHA + 'controller/newsletter.php',
		method: 'POST',
		data: $(this).serialize(),
		dataType: 'json',
		beforeSend: function () {			
			$('#form-newsletters button[type="submit"]').attr('disabled', true);			
		},
		success: function(data) {

			$('#form-newsletters .newsletters-resposnse p').html(data.message);
			$('#form-newsletters .newsletters-resposnse').show(200);			

			setTimeout( function () {
				$('#form-newsletters button[type="submit"]').attr('disabled', false);
				$('#form-newsletters .newsletters-resposnse').hide(200);
				$('#form-newsletters .newsletters-resposnse p').html('');
			}, 5000);
			
		},
		error: function() {			
			$(this).find('.newsletters-resposnse').html('Por favor, tente mais tarde.').toggle();
		}
	});
});