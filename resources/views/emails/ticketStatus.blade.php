<html>
    <head></head>
    <body>
        Olá {{ $user->name }} o chamado de n° {{ $ticket->id }} mudou de status <br/>
        Data da alteração: {{ $ticket->created_at }} <br/>
        Status atual: {{ $status->name }} <br/>
    </body>
</html>
