$(document).ready(function(){
	$("input[name='author']").keyup(function(){
		let value = $(this).val();

		$("input[name='authorID']").val("");


		$.ajax({
			type: "GET",
			url: "api/listAuthors.php",
			data: {
				inputValue: value
			},
			dataType: "json",
			success: function(data){
				$("#autocompleteAuthors").empty();

				if(data){
					for(var i = 0; i < data.length; i++){
						$("#autocompleteAuthors").append(
							$("<div data-id='"+data[i].id+"'>").text(data[i].name)
						);
					}

					$("#autocompleteAuthors").show();
				} else {
					$("#autocompleteAuthors").hide();
				}
			},
			error: function(err){
				console.log("Error "+err.status);
				console.log(err);
			}
		});
	}).focusout(function(){
		$("#autocompleteAuthors").hide(250);
	});
});

$(document).on("click", "#autocompleteAuthors div", function(){
	let value = $(this).text();
	let id = $(this).data("id");

	$("input[name='author']").val(value);
	$("input[name='authorID']").val(id);
	$("#autocompleteAuthors").empty().hide();
});
