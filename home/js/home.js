var user = 'yash.choukse123@gmail.com';

function appendThreadTab(x){
	console.log(x);
	var tmp = "<div class='chat-tab'>"+x+"</div>";	
	$('left-container').append(tmp);
}

function initChat(){
	var url = 'api/initChat/index.php';

	$.post(url,function(e){
		var data = $.parseJSON(e);
		for(var i = 0; i < data.length ; i++){

			if(data[i].receiver === user){
				appendThreadTab(data[i].sender);
			}
		}
	});
}

$(document).ready(function(e){
	initChat();
});