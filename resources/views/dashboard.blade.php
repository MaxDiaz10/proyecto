

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
                            <div class="dash-param fix-param" style="border-bottom: none;"><b><s-requests>{{ $requests }}</s-requests></b> Peticiones <extra>por segundo</extra></div>
                            <div class="dash-param" style="border-top: 1px solid #b8b8b8;border-bottom: none;"><b><s-requests-today>{{ session('spectrum')->TodayRequests }}</s-requests-today></b> Peticiones atentidas <extra>hoy</extra></div>
                        </div>
                    </div>
                    <div class="dash-box">
                        <div id="attack-graphic" class="progress-circle {{ ($attacks > 50) ? 'over50' : '' }} p{{ $attacks }}">
                           <span>{{ $attacks }}%</span>
                           <div class="left-half-clipper">
                              <div class="first50-bar"></div>
                              <div class="value-bar"></div>
                           </div>
                        </div>
                        <div class="details">
                            <div class="dash-title">Ataques</div>
                            <div class="dash-param fix-param" style="border-bottom: none;"><b><s-attacks>{{ session('spectrum')->TodayAttacks }}</s-attacks></b> atacantes <extra>baneados</extra></div>
                            <div class="dash-param" style="border-top: 1px solid #b8b8b8;border-bottom: none;"><b><s-attacks-today>{{ session('spectrum')->TodayAttacks }}</s-attacks-today></b> ataques totales <extra>eliminados</extra></div>
                        </div>
                    </div>
                    <div class="dash-box">
                    <div id="flood-graphic" class="progress-circle {{ ($floods > 50) ? 'over50' : '' }} p{{ $floods }}">
                        <span>{{ $floods }}%</span>
                        <div class="left-half-clipper">
                            <div class="first50-bar"></div>
                            <div class="value-bar"></div>
                        </div>
                    </div>
                    <div class="details">
                        <div class="dash-title">Floods</div>
                        <div class="dash-param fix-param" style="border-bottom: none;"><b><s-floods>{{ session('spectrum')->TodayFloods }}</s-floods></b> floods <extra>mitigados</extra></div>
                        <div class="dash-param" style="border-top: 1px solid #b8b8b8;border-bottom: none;"><b><s-floods-today>{{ session('spectrum')->TodayFloods }}</s-floods-today></b> floods totales <extra>mitigados</extra></div>
                    </div>
                </div>
            </div>
            <div class="left-box">
                <div class="title">Balanceadores (<balancers-count>{{ session('spectrum')->TodayFloods }}</balancers-count>) : <balancers-connections>X conexiones</balancers-connections></div>
                <div class="box" style="background-color: #fff;justify-content: left;overflow-x: hidden;">
                    <div class="balancer-list">
                        @foreach ($balancers as $balancer)
                        <span id="b-{{ $balancer->SalvePort }}">
                            <div class="balancer black">SPECTRUM:{{ $balancer->SalvePort }}</div>
                            <div class="balancer green">Disponible</div>
                            <div class="balancer-text"><b>{{ $balancer->Connections }} Conexiones</b>; Sin incidencias registradas</div>
                        </span>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="right-box">
                <div class="title">Notificaciones</div>
                <div class="box over-list" style="background-color: #fff;justify-content: left;">
                    <div class="balancer-info">
                        <div class="spetsnaz-alert">En esta lista se muestran todos los balanceadores disponibles en su red Spectrum, puede ver su estado, sus registros y si ocurre alguna incidencia en ellos en tiempo real.</div>
                        <div class="spetsnaz-alert">Si un balanceador esta bajo ataque, se mostrará en rojo y comenzará el proceso de migración a los demás balanceadores disponibles, de este modo no notará en absoluto el ataque en sus servidores y no se verá afectado.</div>
                        <div class="spetsnaz-alert">El número de balanceadores varía en el tiempo y es gestionado de forma automática con el fin de obtener la mayor eficacia y disponibilidad para todos nuestros clientes.</div>
                    </div>
                </div>
            </div>
            </div>
            <footer>Spectrum Web by Máx Díaz © 2022</footer>
        </div>
    </div>
</body>
</html>
