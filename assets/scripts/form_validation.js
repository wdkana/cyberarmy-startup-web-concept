$(function(){
	
	$("form input[type=submit] ").on('click',function()
	{
		if($("form input.not_null").val() == ''){
			alert('Lengkapi Form');

		}
	});

});