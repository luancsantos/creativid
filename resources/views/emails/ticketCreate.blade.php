<html>
    <head></head>
    <body>
        {{ $user->name }} abriu um chamado. <br/>
        Data de abertura: {{ $ticket->created_at }} <br/>
        Descrição breve: {{ $ticket->label }} <br/>
        Convênio: {{ $health }}
    </body>
</html>
