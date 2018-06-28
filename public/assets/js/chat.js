var chat = document.querySelector('.messages-chat');
var messageInput = document.querySelector('#Message');
GetMess();

// get message 
function GetMess() {
var xhr = new XMLHttpRequest();
xhr.open('GET', 'http://localhost:8000/api/messages',true);
xhr.onload = function() {
    if (xhr.status === 200) {
		var maskey = JSON.parse(xhr.responseText);
		console.log(maskey);
		chat.innerHTML = "";
		for (let i = 0; i < maskey.length ; i++) {
			chat.innerHTML += '<li class="msg-chat"><span class="username-chat">'+maskey[i].user+'</span><span class="message-chat">'+maskey[i].content+'</span>'
		}
		var chatWindow = document.querySelector('.messages-chat');
		var xH = chatWindow.scrollHeight; 
		chatWindow.scrollTo(0, xH);
    }
};
xhr.send();
}

messageInput.addEventListener('keydown',function(event){
	if (event.which == 13) {
		SendMess();
	}
})

// post message
function SendMess() {
	console.log('lecul');
	let message = messageInput.value;
	let event = new Date();
	let jsonDate = event.toJSON();
	messageInput.value = "";
    xhr = new XMLHttpRequest();
	xhr.open('POST', 'http://localhost:8000/api/messages');
	xhr.setRequestHeader('Content-Type', 'application/json');
	message = JSON.stringify({content: message,date: jsonDate });
	xhr.send(message);
	GetMess();
}

