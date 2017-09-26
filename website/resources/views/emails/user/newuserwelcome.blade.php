@component('mail::message')
# Bem-vindo {{ $user->name }} ao website da Fatec Marília

Você está recebendo suas credenciais para autenticar-se na área privada do website.

@component('mail::panel')
    Use os dados abaixo para efetuar o login:
    Usuário: {{ $user->email }}
    Senha: {{ $user->plainPassword }}
@endcomponent

@component('mail::button', ['url' => 'http://fatec.app/login'])
Acessar minha área
@endcomponent

<strong>Esse e-mail foi enviado automaticamente. Por favor, não responda esse e-mail. </strong>

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
