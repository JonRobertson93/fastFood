// ONLY NEEDED FOR INDEX.HTML

$('.tt-suggestions').hover(function(){
	$(this).addClass('boldHover').siblings().removeClass('boldHover');
});

$(document).ready(function(){
	$('input.typeahead').typeahead({
		name: 'typeahead',
		remote:'typeaheadSearch.php?key=%QUERY',
		limit : 30
	});
});

