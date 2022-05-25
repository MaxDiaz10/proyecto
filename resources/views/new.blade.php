<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Spectrum Web - Inicio</title>
    <link href="https://fonts.googleapis.com/css?family=Krub:100,300,400,500,700|Rubik:300,400,500,700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link href="{{ asset('css/panel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/circles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="{{ asset('js/moonlight-helper.js') }}"></script>
    <script src="{{ asset('js/spectrum-login.js') }}"></script>
</head>
<body>
    <div class="wrapper">
@if ($errors->has('email'))
    <span class="invalid-feedback">
        <strong>{{ $errors->first('email') }}</strong>
    </span>
@endif
        <header class="header">
            <div id="head">
                <div id="logo">Spectrum WEB</div>
                <nav>
                    <a href="/">Inicia sesión</a>
                </nav>
            </div>
        </header>
        <div class="content">
            <div class="login-box">
                <form action="#" id="users" method="POST">
                    <div class="area" style="width: 100%;margin-bottom: 20px;">Crea una cuenta ahora <span id="login-error"></span><span id="login-ok"></span></div>
                    <input type="text" name="email" placeholder="Usuario" style="margin-bottom: 15px;" required="required">
                    <input type="password" name="password" placeholder="Contraseña" style="margin-bottom: 15px;" required="required">
                    <input type="email" name="email" placeholder="Email" style="margin-bottom: 15px;" required="required">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                    <input id="filter-submit" type="submit" value="REGISTRARME">
                </form>
                <img id="spectrum-image" src="{{ asset('img/foz.jpg') }}">
            </div>
            <div class="cuarz-box">
                <div class="title">Bienvenid@ a Spectrum Web</div>
                <div class="text">Para conectarte al panel debes introducir tu nombre de cliente y tu client-key. <br><br>Spectrum Panel es una plataforma de control, creada para llevar acabo una administración segura y perfecta de tu red de balanceadores Spectrum. El panel esta dotado para solucionar automáticamente los conflictos que puedan surgir de forma inesperada en tu red.</div>
                <div class="title" style="margin-top: 20px;width:100%">Últimas Noticias</div>
                <div class="text">
                Te traemos las últimas novedades:
                <ul>
                    <li>Estadística de tráfico en mbps/gbps.</li>
                    <li>Alertas de ataque y recomendaciones inteligentes.</li>
                    <li>Notificaciones vía email de posibles ataques.</li>
                </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
