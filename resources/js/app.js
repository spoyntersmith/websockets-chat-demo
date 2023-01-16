import './bootstrap';
import '../css/app.css';

function sendMessage(type, message) {
    axios.post('/message', {
        sender: type,
        message: message,
    }).then(response => {
        console.log(response);
        document.getElementById('message').value = '';
    }).catch(error => {
        console.log(error);
    });
}

function sendUserMessage() {
    sendMessage('user', document.getElementById('user-message').value);
}

function sendAgentMessage() {
    sendMessage('agent', document.getElementById('agent-message').value);
}

function receiveMessage(type) {

}

console.log('Welcome to the demo running on real websockets');
Echo.listen('chat', 'MessageSent', (e) => {
    if (e.sender == 'user') {
        // add user message to the agent chat window
        document.getElementById('user-chat').innerHTML += `<div class="user-message">${e.message}</div>`;
        // add agent message to the user chat window
        document.getElementById('agent-chat').innerHTML += `<div class="user-message">${e.message}</div>`;
    }

    if (e.sender == 'agent') {
        // add agent message to the agent chat window
        document.getElementById('agent-chat').innerHTML += `<div class="agent-message">${e.message}</div>`;
        // add user message to the user chat window
        document.getElementById('user-chat').innerHTML += `<div class="agent-message">${e.message}</div>`;
    }
});

document.addEventListener('DOMContentLoaded', function() {
   document.getElementById('send-agent-message').addEventListener('click', function () {
         sendAgentMessage();
   });
});
