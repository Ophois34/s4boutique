/* panier.js */
$(document).ready(function(){

	$('.modif').on('click', function(){
		elem = $(this).prop('id').substr(1);
		value = $('#i'+elem).val();
		alert('modif' + ' '+ elem + ' ' + value);
		$.ajax({
			url: '{{ path("/modifPanier")}}',
			type: "post",
			success: function(data)
			{
				alert(data);
			},
			error: function(a,b,c)
			{
				alert('oups' + a + b + c);
			}
		});

	});

	$('.supp').on('click', function(){
		$.ajax({
			url: "suppPanier",
			type: "post",
			data: {'id' : $(this).prop('id').substr(1)},
			dataType: 'json',
			error: function(a, b, c)
			{
				alert(a + b + c);
			},
			success: function(data)
			{
				alert(data.a);
			}
		});
	});

});