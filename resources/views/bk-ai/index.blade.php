@extends('layouts.app')

@section('content')
<div class="container" style="max-width:600px;">
    <h1 class="mb-4 text-center">{{ $role == 'guru' ? 'BK AI - Guru' : 'BK AI - Untuk semua orang' }}</h1>

    <!-- Chat Box -->
    <div id="chat-box" style="border:1px solid #ccc; border-radius:10px; padding:10px; height:400px; overflow-y:auto; background:#e5ddd5; display:flex; flex-direction:column;"></div>

    <!-- Input -->
    <div class="mt-2 d-flex">
        <input type="text" id="message" class="form-control me-2" placeholder="Tulis curhatanmu..." onkeypress="if(event.key==='Enter'){sendMessage();}">
        <button id="send" class="btn btn-success" onclick="sendMessage()">Kirim</button>
    </div>
</div>

<style>
/* Styling balon chat */
.chat-bubble {
    max-width: 70%;
    padding: 8px 12px;
    border-radius: 20px;
    margin: 5px 0;
    word-wrap: break-word;
}
.user-message {
    background-color: #dcf8c6;
    align-self: flex-end;
}
.ai-message {
    background-color: #fff;
    align-self: flex-start;
}
.timestamp {
    font-size: 0.7rem;
    color: #888;
    margin-top: 2px;
}
</style>

<script>
function formatTime() {
    const now = new Date();
    return now.getHours().toString().padStart(2,'0') + ':' + now.getMinutes().toString().padStart(2,'0');
}

function addMessage(message, sender) {
    const chatBox = document.getElementById('chat-box');
    const bubble = document.createElement('div');
    bubble.classList.add('chat-bubble', sender === 'user' ? 'user-message' : 'ai-message');
    bubble.innerHTML = message + '<div class="timestamp">'+formatTime()+'</div>';
    chatBox.appendChild(bubble);
    chatBox.scrollTop = chatBox.scrollHeight;
}

function sendMessage() {
    let msgInput = document.getElementById('message');
    let msg = msgInput.value.trim();
    if(msg === '') return;

    addMessage(msg, 'user');

    fetch('{{ route("bk.ai.chat") }}', {
        method: 'POST',
        headers: {
            'Content-Type':'application/json',
            'X-CSRF-TOKEN':'{{ csrf_token() }}'
        },
        body: JSON.stringify({message: msg})
    }).then(res => res.json())
    .then(data => {
        addMessage(data.reply, 'ai');
    });

    msgInput.value = '';
}
</script>
@endsection
