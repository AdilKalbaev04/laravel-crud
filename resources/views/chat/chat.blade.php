@extends('layouts.app')

@section('title', 'Чат')

@section('content')
<div class="container mt-5">
    <!-- Чат -->
    <div id="chat">
        <div id="messages" class="border p-3" style="height: 300px; overflow-y: scroll;"></div>
        <input type="text" id="messageInput" class="form-control" placeholder="Введите сообщение...">
        <button onclick="sendMessage()" class="btn btn-primary mt-2">Отправить</button>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    Pusher.logToConsole = true;

    var pusher = new Pusher('{{ env("PUSHER_APP_KEY") }}', {
        cluster: '{{ env("PUSHER_APP_CLUSTER") }}',
        encrypted: true
    });

    var channel = pusher.subscribe('private-chat');
    channel.bind('App\\Events\\MessageSent', function(data) {
        var messageElement = document.createElement('div');
        messageElement.innerText = data.message.user.name + ': ' + data.message.message;
        document.getElementById('messages').appendChild(messageElement);
    });

    function sendMessage() {
        var message = document.getElementById('messageInput').value;
        fetch('/chat', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ message: message })
        }).then(response => response.json()).then(data => {
            document.getElementById('messageInput').value = '';
        });
    }
</script>
@endpush
