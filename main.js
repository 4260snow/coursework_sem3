$(document).ready(function(){
    $('#btnSend').click(function(elem){
        $.post('delete.php',  {note_id: $('#btnSend').val()});
	});
});
