

$('#formulario-contato').submit(function( event ){	

    event.preventDefault();

	// Necessidade de validar os campos

    var nome = $('#formulario-contato #nome').val();
	var email = $('#formulario-contato #email').val();
	var telefone = $('#formulario-contato #telefone').val();
    var assunto = $('#formulario-contato #assunto').val();
	var assuntoId = 1;
	var texto = $('#formulario-contato #texto').val();


	$.ajax({
        type: 'POST',
        url: '/admin/action/contatos.php',
        data: {'do':'add','nome':nome, 'email':email, 'telefone':telefone, 'assunto':assunto, 'assuntoId':assuntoId, 'texto':texto},
        dataType: 'html',
        success: function (data) {
            $('#formulario-contato').parents('#vamosconversar').addClass('sucesso');
        },
        error: function (data) {
            
            alert('Erro: ' + data);
        }
    });	

});



$('#formulario-contato-x').submit(function( event ){  

    event.preventDefault();


    // Necessidade de validar os campos

    var nome = $('#formulario-contato-x #nome').val();
    var email = $('#formulario-contato-x #email').val();
    var telefone = $('#formulario-contato-x #telefone').val();
    var assunto = $('#formulario-contato-x #assunto').val();
    var assuntoId = 1;
    var texto = $('#formulario-contato-x #texto').val();    

    $.ajax({
        type: 'POST',
        url: '/admin/action/contatos.php',
        data: {'do':'add','nome':nome, 'email':email, 'telefone':telefone, 'assunto':assunto, 'assuntoId':assuntoId, 'texto':texto},
        dataType: 'html',
        success: function (data) {

            alert(data);

            $('#formulario-contato-x').hide();
            $('.fake-success').show(250);
        },
        error: function (data) {
            
            alert(data);

            $('#formulario-contato-x').hide();
            $('.fake-fail').show(200);
        }
    }); 
});

