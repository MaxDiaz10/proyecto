

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Spectrum Web - Panel</title>
    <link href="https://fonts.googleapis.com/css?family=Krub:100,300,400,500,700|Rubik:300,400,500,700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/panel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/circles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="{{ asset('js/moonlight-helper.js') }}"></script>
    <script src="{{ asset('js/spectrum-dash.js') }}"></script>
</head>
<body>
    <div class="wrapper">
        <header class="header">
            <div id="head">
                <div id="logo">Spetsnaz <span>{{ session('spectrum')->Site }}</span></div>
                <nav>
                    <a href="/logout">(Salir)</a>
                    <a href="/ban-list">Baneos</a>
                    <a href="#">Firewall</a>
                    <a href="/">Dashboard</a>
                </nav>
            </div>
        </header>
        <div class="content">
            <div class="center-box">
                <div class="title">Dashboard : Estadísticas</div>
                <div class="box dashboard-box">
                    <div class="dash-box">
                        <div id="request-graphic" class="progress-circle {{ ($requests > 50) ? 'over50' : '' }} p{{ $requests }}">
                           <span>{{ $requests }}%</span>
                           <div class="left-half-clipper">
                              <div class="first50-bar"></div>
                              <div class="value-bar"></div>
                           </div>
                        </div>
                        <div class="details">
                            <div class="dash-title">Peticiones</div>
                            <div class="dash-param fix-param" style="border-bottom: none;"><b><s-requests>0</s-requests></b> Peticiones <extra>por segundo</extra></div>
                            <div class="dash-param" style="border-top: 1px solid #b8b8b8;border-bottom: none;"><b><s-requests-today>{{ session('spectrum')->TodayRequests }}</s-requests-today></b> Peticiones atentidas <extra>hoy</extra></div>
                        </div>
                    </div>

                </div>
            </div>
            <footer>Spectrum Web by Máx Díaz © 2022</footer>-
        </div>
    </div>
</body>
</html>
