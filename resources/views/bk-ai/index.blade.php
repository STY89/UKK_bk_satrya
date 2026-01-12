@extends('dashboard.menu') {{-- layout masuk card tengah --}}

@section('content')

<h1 class="text-2xl font-bold mb-4 text-center">
    {{ $role == 'guru' ? 'BK AI - Guru' : 'BK AI - Untuk semua orang' }}
</h1>

{{-- Card Tengah --}}
<div class="bg-white rounded-xl shadow-lg p-6 max-w-3xl mx-auto">

    <!-- Chat Box -->
    <div id="chat-box" class="h-96 overflow-y-auto p-4 mb-4 flex flex-col bg-[#e5ddd5] rounded-lg"></div>

    <!-- Input -->
    <div class="flex gap-2">
        <input type="text" id="message" class="form-control flex-1 px-3 py-2 border rounded" placeholder="Tulis curhatanmu..." 
               onkeypress="if(event.key==='Enter'){sendMessage();}">
        <button id="send" class="btn btn-success px-4 py-2" onclick="sendMessage()">Kirim</button>
    </div>

</div> {{-- Akhir card tengah --}}

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

<a href="{{ route('dashboard') }}" class="block py-2 px-4 rounded-lg hover:bg-blue-100 transition mt-4">dashboard</a>

@endsection
