$(document).ready(function(){	
	$("a[name='like']").click(function(e) {
		console.log('Like');
		e.preventDefault();
		return true;
	});
	return true;
});

