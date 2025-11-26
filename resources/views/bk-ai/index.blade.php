@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">{{ $role == 'guru' ? 'BK AI - Guru' : 'Ajukan Konseling - Siswa' }}</h1>

    <div id="chat-box" style="border:1px solid #ccc; padding:10px; height:300px; overflow-y:auto; background:#f9f9f9;"></div>

    <div class="mt-2 d-flex">
        <input type="text" id="message" class="form-control me-2" placeholder="Tulis curhatanmu...">
        <button id="send" class="btn btn-primary">Kirim</button>
    </div>
</div>

<script>
document.getElementById('send').addEventListener('click', function(){
    let msg = document.getElementById('message').value;
    if(msg.trim() === '') return;

    let chatBox = document.getElementById('chat-box');
    chatBox.innerHTML += '<div><b>Kamu:</b> ' + msg + '</div>';

    fetch('{{ route("bk.ai.chat") }}', {
        method: 'POST',
        headers: {
            'Content-Type':'application/json',
            'X-CSRF-TOKEN':'{{ csrf_token() }}'
        },
        body: JSON.stringify({message: msg})
    }).then(res => res.json()).then(data => {
        chatBox.innerHTML += '<div><b>AI:</b> ' + data.reply + '</div>';
        chatBox.scrollTop = chatBox.scrollHeight;
    });

    document.getElementById('message').value = '';
});
</script>
@endsection
