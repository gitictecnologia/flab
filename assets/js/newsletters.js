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
			console.log('antes');
		},
		success: function(data) {
			console.log(data);
		},
		error: function() {
			console.log('erro');
		},
	});
});