@component('mail::message')
# Caro(a), {{ $user->name }}.<br>Bem-vindo(a) ao website da Fatec Marília.<br>

Você está recebendo suas credenciais para autenticar-se na área privada do website.<br>

Use os dados abaixo para efetuar o login:
@component('mail::panel')
    Usuário: {{ $user->email }}<br>
    Senha: {{ $password }}
@endcomponent

@component('mail::button', ['url' => 'http://fatec.app/login', 'color' => 'green'])
Acessar minha Área
@endcomponent

#Esse e-mail foi enviado automaticamente. Por favor, não responda esse e-mail.

Cordialmente,<br>
{{ config('app.name') }}
@endcomponent
