$(document).ready(function() {
	const activar = $('li a');
	for(let elem of activar){
		$( elem ).click(function(event) {
			event.preventDefault();
			const otherElem = $('a.active')[0];
			$(otherElem).removeClass("active");
			$( elem ).addClass( "active" );
		});
	}
})