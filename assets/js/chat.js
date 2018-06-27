window.addEventListener('load',function() {
	console.log('salut');
})

var chat = document.querySelector('.lechat');
var userNameInput = document.querySelector('#UserName');
var messageInput = document.querySelector('#Message');
GetMess();

// get message 
function GetMess() {
var xhr = new XMLHttpRequest();
xhr.open('GET', 'https://jsonplaceholder.typicode.com/posts',true);
xhr.onload = function() {
    if (xhr.status === 200) {
		var maskey = JSON.parse(xhr.responseText);
		console.log(maskey);
		chat.innerHTML = "";
		for (let i = 0; i < maskey.length ; i++) {
			chat.innerHTML += '<div class="Alde"><small class="Sard">'+maskey[i].id+'</small><p class="Zera">'+maskey[i].body+'</p></div>'
		}
    }
    else {
        alert('Request failed.  Returned status of ' + xhr.status);
    }
};
xhr.send();
}

// post message

function SendMess() {
	console.log('lecul');
	let userName = userNameInput.value;
	let message = messageInput.value;
	console.log(userName);
	console.log(message);
	userNameInput.value = "";
	messageInput.value = "";
	  var xhttp = new XMLHttpRequest();
	  xhttp.open("POST", "http://localhost:3000/oui", true);
	  xhttp.setRequestHeader("Content-type", "application/json");
	  xhttp.send(userName);
	GetMess();
}