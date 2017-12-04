$(document).ready(function() {
function scan(text) {
	$('#result').html('');
	$.post('nmap.php', { target: text }, function(data, status) {
		$('#result').html(data);
	});
}

$('#nmap').change(function() {
	scan($(this).val());
});

$('#flag').click(function() {
	$('#modal').show();
});

$('#close_modal').click(function() {
	$('#modal').hide();
});

});
