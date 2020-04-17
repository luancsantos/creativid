<html>
    <head></head>
    <body>
        Olá, houve um comentário em seu chamado n° {{ $ticket->id }} <br/>
        Data de abertura: {{ $ticket->created_at }} <br/>
        Descrição breve: {{ $ticket->label }} <br/>
    </body>
</html>
