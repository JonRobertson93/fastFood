$('#toiletRatings input:radio').addClass('input_hidden');
$('#toiletRatings label').click(function(){
	$(this).addClass('selected').siblings().removeClass('selected');
	$(this).previousSibling.addClass('selected');
});