$(document).ready(function() {
function search(text) {
	$.post('search.php', { username: text }, function(data, status) {
		$('#result').html(data);
	});
}

search('');

$('#search').change(function() {
	search($(this).val());
});

$('#flag').click(function() {
	$('#modal').show();
});

$('#close_modal').click(function() {
	$('#modal').hide();
});

$('#login').click(function() {
	$('#modal_login').show();
	$('#username').focus();
});

$('#logout').click(function() {
	$.get('logout.php', function(data, status) {
		location.reload();
	});
});

$('#close_modal_login').click(function() {
	$('#modal_login').hide();
	$('#search').focus();
});

$('#login_form').submit(function(e) {
	e.preventDefault();
	$.post('login.php', { username: $('#username').val(), password: $('#password').val() }, function(data, status) {
		var j = JSON.parse(data);
		if (j.success) location.reload();
		else alert(j.msg);
	});
});

});
