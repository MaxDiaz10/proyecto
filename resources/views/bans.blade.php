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
                      <div class="center-box" style="display: none;">
                <div class="notification"></div>
            </div>
            <div class="ban-box">
                <div class="title" style="margin-bottom: 10px;">Lista de Baneos</div>
                <div class="box" style="justify-content: left;height: 610px;margin-bottom: 20px;">
                    <div class="list-bans">
                        <table>
                            <tr class="head">
                                <th>Host</th>
                                <th>Motivo</th>
                                <th style="width: 10%;">Acciones</th>
                            </tr>
                        </table>
                        <div class="over-list" style="height: 610px;">
                        <table>
                        @php
                        $diff = 0;
                        $asn = 0;
                        $floods = 0;
                        $attack = 0;
                        $ddos = 0;
                        $database = 0;
                        $country = 0;
                        $proxy = 0;

                        foreach (\App\Models\SpectrumGlobal::where('spectrum', '=', session('spectrum')->SpectrumKey)->get() as $ban) {
                            $diff++;
                            $reason = str_replace('[', '', $ban['reason']);
                            $reason = str_replace(']', '', $reason);

                            switch ($reason) {
                                case 'FLOOD':
                                    $floods++;
                                    break;
                                case 'NOT DATABASE':
                                    $database++;
                                    break;
                                case 'DDOS':
                                    $ddos++;
                                    break;
                                case 'ASN BANEADO':
                                    $asn++;
                                    break;
                                case 'MAX CONNECTIONS':
                                    $attack++;
                                    break;
                                case 'COUNTRY BAN':
                                    $country++;
                                    break;
                                case 'PROXY':
                                    $proxy++;
                                    break;
                            }
                        @endphp
                            <tr class="{{ ($diff % 2 == 1) ? 'body' : '' }} ban-{{ $ban->ip }}">
                                <td style="width: 39.5%;">{{ $ban->ip }}</td>
                                <td class="reason">{{ $ban->reason }}</td>
                                <td class="action">
                                    <span id="ban-{{ $ban->ip }}" class="remove-ban">Quitar</span>
                                </td>
                            </tr>
                        @php } @endphp
                        </table>
                      </div>
                    </div>
                          </div>
                          </div>
                        @php

                        $floodGraph = intval((100 * $floods) / $diff);
                        $asnGraph = intval((100 * $asn) / $diff);
                        $attackGraph = intval((100 * $attack) / $diff);
                        $ddosGraph = intval((100 * $ddos) / $diff);
                        $dbGraph = intval((100 * $database) / $diff);
                        $countryGraph = intval((100 * $country) / $diff);
                        $proxyGraph = intval((100 * $proxy) / $diff);

                        $maxs = [
                            [$floodGraph, "Flood"],
                            [$asnGraph, "ASN"],
                            [$attackGraph, "Max Conn."],
                            [$ddosGraph, "DDoS"],
                            [$dbGraph, "Database"],
                            [$countryGraph, "Country"],
                            [$proxyGraph, "Proxy"],
                        ];

                        @endphp

            <div class="info-box">
                <div class="title" style="visibility: hidden;">Acerca de la lista</div>
                <div class="box" style="justify-content: left;">
                    <div class="bans-info">
                        @php

                        function getTops(array $data) : array {
                          $values = array_map(function ($value) {
                              return $value[0];
                          }, $data);

                          $sorted = [];
                          foreach ($values as $key => $value) {
                              $max = max($values);

                              foreach ($data as $k => $v) {
                                  if ($v[0] == $max) {
                                      $sorted[] = [$max, $v[1]];

                                      unset($data[$k]);
                                      unset($values[$k]);
                                      break;
                                  }
                              }
                          }
                          return $sorted;
                      }
                      @endphp

                      @foreach (array_reverse(getTops($maxs)) as $top)
                      <div class="ban-stat">
                            <span>{{ $top[1] }}</span>
                            <div class="progressWrapper progressColor" style="float:left;width: 70%;margin-top: 15px;">
                                <span class="tooltip2" style="left:{{ $top[0] }}%">{{ $top[0] }}%</span>
                                <progress max="100" value="{{ $top[0] }}" data-value="100" class="progressColor" style="width: 100%;"></progress>
                            </div>
                        </div>
                      @endforeach
                    </div>
                </div>
            </div>
            <footer>Spectrum Web by Máx Díaz © 2022</footer>
        </div>
    </div>
</body>
</html>
