$(document).ready(function(){

	$("#email").on("change", function(){

		$('.alert').remove();

		let email = $(this).val();
		const datos = new FormData();
		datos.append('validaEmail', email);
		$.ajax({
			url: "views/sources/ajaxForm.php",
			method: "POST",
			data: datos,
			cache: false,
			dataType: "json",
			contentType: false,
			processData: false,
			success: function(res){
				if(res){
					$("#email").val("");
					$("#email").after("<div class='alert alert-warning'><strong>Error." + 
						"</strong> Correo existente en la base de datos; por favor introduce otro email.</div>");
				}
			}
		});
	});
});