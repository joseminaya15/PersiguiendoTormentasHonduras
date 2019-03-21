var $win = $(window);
$win.scroll(function () {
	if ($win.scrollTop() > 45) {
		$(".js-header").addClass("navbarcolor");
	} else {
		$(".js-header").removeClass("navbarcolor");
	}
});
$('a.link[href^="#"]').click(function(e) {
 	var target = $(this).attr('href');
 	var strip = target.slice(1);
 	var anchor = $("section[id='" + strip + "']");
 	e.preventDefault();
 	y = (anchor.offset() || {
 		"top" : NaN
 	}).top;
 	$('html, body').animate({
 		scrollTop : (y - 40)
 	}, 'slow');
});
function sendInformation(){
	var check_book  = null;
	var name 		= $('#name').val();
	var surname 	= $('#surname').val();
	var email 		= $('#email').val();
	var phone 		= $('#phone').val();
	var company 	= $('#company').val();
	var position 	= $('#position').val();
	var option1     = $('#option-1').is(':checked');
	var option2		= $('#option-2').is(':checked');
	var option3 	= $('#option-3').is(':checked');
	var option4		= $('#option-4').is(':checked');
	if(name == null || name == '') {
		msj('error', 'Nombre debe completarse');
		return;
	}
	if(surname == null || surname == '') {
		msj('error', 'Apellido debe completarse');
		return;
	}
	if(email == null || email == '') {
		msj('error', 'Email debe completarse');
		return;
	}
	if(!validateEmail(email)){
		msj('error', 'El formato de email es incorrecto');
		return;
	}
	if(phone == null || phone == '') {
		msj('error', 'Teléfono debe completarse');
		return;
	}
	if(company == null || company == '') {
		msj('error', 'Empresa debe completarse');
		return;
	}
	if(position == null || position == '') {
		msj('error', 'Cargo debe completarse');
		return;
	}
	if(option1 == true){
		check_book = 1;
	}else if(option2 == true) {
		check_book = 2;
	}else if(option3 == true) {
		check_book = 3;
	}else if(option4 == true) {
		check_book = 4;
	}
	$.ajax({
		data : {Name	    : name,
				Surname	    : surname,
				Email 	    : email,
				Phone	    : phone,
				Company	    : company,
				Position    : position,
				Book	    : check_book},
		url  : 'home/register',
		type : 'POST'
	}).done(function(data){
		try {
			data = JSON.parse(data);
			if(data.error == 0){
				$('.js-input').find('input').val('');
				$('.mdl-radio').removeClass('is-checked');
				$('.mdl-radio__button').prop('checked', false);
				msj('success', data.msj);
        	}else{
        		msj('error', data.msj);
        		return;
        	}
		} catch (err) {
			msj('error', err.message);
		}
	});
}
function validateEmail(email){
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
function verificarDatos(e) {   
	if(e.keyCode === 13){
		e.preventDefault();
		ingresar();
    }
}
function openModalLibro(id){
	var id = $('#'+id);
	var modalTeam = $('#ModalLibro');
	var tituloModal = id.parents('.jm-book').find('h2');
	var descripcion = id.parents('.jm-book').find('p');
	var contenido = id.find('.jm-tea__contenido');
	modalTeam.find('h2').text(tituloModal[0].innerText);
	modalTeam.find('p').text(descripcion[0].innerText);
	modalTeam.modal('show');
}