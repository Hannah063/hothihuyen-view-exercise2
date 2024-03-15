<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - Unicode</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/clients/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/clients/css/style.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    @yield('css')
    <style>
        .shadow {
            filter: drop-shadow(0px 5px 4px rgba(0, 0, 0, .4));
        }

        .svg-item {
            width: 100%;
            font-size: 16px;
            margin: 0 auto;
            animation: donutfade 1s;
        }

        @keyframes donutfade {

            /* this applies to the whole svg item wrapper */
            0% {
                opacity: .2;
            }

            100% {
                opacity: 1;
            }
        }

        @media (min-width: 992px) {
            .svg-item {
                width: 80%;
            }
        }

        .donut-ring {
            stroke: #EBEBEB;
        }

        .donut-segment {
            transform-origin: center;
            stroke: #FF6200;
        }
        .form-control:focus {
            box-shadow: none;
        }

        .form-control-underlined {
            border-width: 0;
            border-bottom-width: 1px;
            border-radius: 0;
            padding-left: 0;
        }

        .form-control::placeholder {
            font-size: 0.95rem;
            color: #aaa;
            font-style: italic;
        }

        a {
            text-decoration: none;
        }

        .chart-area {
            margin: 5em 20em;
        }

        .donut-segment-2 {
            stroke: aqua;
            animation: donut1 3s;
        }

        .donut-segment-3 {
            stroke: #d9e021;
            animation: donut2 3s;
        }

        .donut-segment-4 {
            stroke: #ed1e79;
            animation: donut3 3s;
        }

        .segment-1 {
            fill: #ccc;
        }

        .segment-2 {
            fill: aqua;
        }

        .segment-3 {
            fill: #d9e021;
        }

        .segment-4 {
            fill: #ed1e79;
        }

        .donut-percent {
            animation: donutfadelong 1s;
        }

        @keyframes donutfadelong {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @keyframes donut1 {
            0% {
                stroke-dasharray: 0, 100;
            }

            100% {
                stroke-dasharray: 69, 31;
            }
        }

        @keyframes donut2 {
            0% {
                stroke-dasharray: 0, 100;
            }

            100% {
                stroke-dasharray: 30, 70;
            }
        }

        @keyframes donut3 {
            0% {
                stroke-dasharray: 0, 100;
            }

            100% {
                stroke-dasharray: 1, 99;
            }
        }

        .donut-text {
            font-family: Arial, Helvetica, sans-serif;
            fill: #FF6200;
        }

        .donut-text-1 {
            fill: aqua;
        }

        .donut-text-2 {
            fill: #d9e021;
        }

        .donut-text-3 {
            fill: #ed1e79;
        }

        .donut-label {
            font-size: 0.28em;
            font-weight: 700;
            line-height: 1;
            fill: #000;
            transform: translateY(0.25em);
        }

        .donut-percent {
            font-size: 0.5em;
            line-height: 1;
            transform: translateY(0.5em);
            font-weight: bold;
        }

        .donut-data {
            font-size: 0.12em;
            line-height: 1;
            transform: translateY(0.5em);
            text-align: center;
            text-anchor: middle;
            color: #666;
            fill: #666;
            animation: donutfadelong 1s;
        }

        html {
            text-align: center;
        }

        .svg-item {
            max-width: 30%;
            display: inline-block;
        }

        .simple-bar-chart {
            --line-count: 10;
            --line-color: currentcolor;
            --line-opacity: 0.25;
            --item-gap: 2%;
            --item-default-color: #060606;

            height: 10rem;
            display: grid;
            grid-auto-flow: column;
            gap: var(--item-gap);
            align-items: end;
            padding-inline: var(--item-gap);
            --padding-block: 1.5rem;
            /*space for labels*/
            padding-block: var(--padding-block);
            position: relative;
            isolation: isolate;
        }

        .simple-bar-chart::after {
            content: "";
            position: absolute;
            inset: var(--padding-block) 0;
            z-index: -1;
            --line-width: 1px;
            --line-spacing: calc(100% / var(--line-count));
            background-image: repeating-linear-gradient(to top, transparent 0 calc(var(--line-spacing) - var(--line-width)), var(--line-color) 0 var(--line-spacing));
            box-shadow: 0 var(--line-width) 0 var(--line-color);
            opacity: var(--line-opacity);
        }

        .simple-bar-chart>.item {
            height: calc(1% * var(--val));
            background-color: var(--clr, var(--item-default-color));
            position: relative;
            animation: item-height 1s ease forwards
        }

        @keyframes item-height {
            from {
                height: 0
            }
        }

        .simple-bar-chart>.item>* {
            position: absolute;
            text-align: center
        }

        .simple-bar-chart>.item>.label {
            inset: 100% 0 auto 0
        }

        .simple-bar-chart>.item>.value {
            inset: auto 0 100% 0
        }
    </style>
</head>

<body class="container mt-3" style="background-color: rgb(239, 239, 242)">
    <header>
        <div class="row">
            <div class="col-3">
                <div class="card col-6">
                    <div class="card-body">
                        <img src="{{ asset('assets/clients/images/images.png') }}" alt="" class="col-4">
                        <span class="col-8" style="text-align: center">Finance</span>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <div class="row">
                    <div class="col-7" style="margin-left: 10px">
                        <div class="input-group rounded">
                            <span class="input-group-text border-0" id="search-addon">
                                <i class="fas fa-search"></i>
                            </span>
                            <input type="search" class="form-control rounded" placeholder="Search here..."
                                aria-label="Search" aria-describedby="search-addon" />
                        </div>
                    </div>
                    <div class="col-3" style="margin-left: 130px">
                        <img src="{{ asset('assets/clients/images/notification-alert.svg') }}" alt=""
                            class="col-4" style="width: 25px">
                        <img src="{{ asset('assets/clients/images/messages-alert-svgrepo-com.svg') }}" alt=""
                            class="col-4" style="width: 25px">
                        <img src="{{ asset('assets/clients/images/avatar.jpg') }}" alt="" class="col-4"
                            style="width: 45px; border-radius: 100%">
                    </div>
                </div>
            </div>

        </div>
    </header>
    <main class="py-3">
        <div class="container-fluit">
            <div class="row">
                <div class="col-3">
                    <nav id="navbar-example3" class="navbar navbar-light bg-light flex-column align-items-stretch p-3">
                        <nav class="nav nav-pills flex-column">
                            <a class="nav-link" href="#">Dashboard</a>
                            <nav class="nav nav-pills flex-column">
                                <a class="nav-link ms-3 my-1" href="#">Classic</a>
                                <a class="nav-link ms-3 my-1" href="#">Minimal</a>
                            </nav>
                            <a class="nav-link" href="2">Pages</a>
                            <a class="nav-link" href="#">Applications</a>
                            <a class="nav-link" href="#">UI Components</a>
                            <a class="nav-link" href="#">Widgets</a>
                            <a class="nav-link" href="#">Forms</a>
                            <a class="nav-link" href="#">Charts</a>
                        </nav>
                    </nav>
                </div>
                <div class="col-9" style="background-color: white">
                    <div class="content  mt-4" style="margin-left: 25px; ">
                        <div class="content1">
                            @include('card')
                        </div>
                        <div class="content2 row">
                            <div class="col-6">
                                <canvas id="comboChart" width="400" height="400"></canvas>
                                <script>
                                    var ctx = document.getElementById('comboChart').getContext('2d');
                                    var comboChart = new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                            labels: ['Jan 01', '03 Jan', '05 Jan', '07 Jan', '09 Jan', '11 Jan'],
                                            datasets: [{
                                                label: 'Column Data',
                                                data: [410, 450, 405, 630, 210, 405],
                                                backgroundColor: 'purple',
                                                borderColor: 'purple',
                                                borderWidth: 1
                                            }, {
                                                label: 'Line Data',
                                                data: [380, 650, 480, 410, 670, 470],
                                                type: 'line',
                                                fill: false,
                                                borderColor: 'purple',
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                yAxes: [{
                                                    ticks: {
                                                        beginAtZero: true
                                                    }
                                                }]
                                            }
                                        }
                                    });
                                </script>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-6 mt-4 mb-4 " style="background-color:ghostwhite;">
                                        <p>% of income Budget</p>
                                        <div class="svg-item">
                                            <svg width="100%" height="100%" viewBox="0 0 40 40" class="donut">
                                                <circle class="donut-hole" cx="20" cy="20"
                                                    r="15.91549430918954" fill="#fff"></circle>
                                                <circle class="donut-ring" cx="20" cy="20"
                                                    r="15.91549430918954" fill="transparent" stroke-width="3.5">
                                                </circle>
                                                <circle class="donut-segment donut-segment-2" cx="20"
                                                    cy="20" r="15.91549430918954" fill="transparent"
                                                    stroke-width="3.5" stroke-dasharray="69 31"
                                                    stroke-dashoffset="25"></circle>
                                                <g class="donut-text donut-text-1">
                                                    <text y="50%" transform="translate(0, 2)">
                                                        <tspan x="50%" text-anchor="middle" class="donut-percent">69%
                                                        </tspan>
                                                    </text>
                                                    <text y="60%" transform="translate(0, 2)">
                                                        <tspan x="50%" text-anchor="middle" class="donut-data">3450
                                                            widgets</tspan>
                                                    </text>
                                                </g>
                                            </svg>
                                        </div>
                                        <hr>
                                        <a href="#">View full Report</a>
                                    </div>

                                    <div class="col-6 mt-4 mb-4" style="background-color:ghostwhite;">
                                        <p>% of income Budget</p>
                                        <div class="svg-item">
                                            <svg width="100%" height="100%" viewBox="0 0 40 40" class="donut">
                                                <circle class="donut-hole" cx="20" cy="20"
                                                    r="15.91549430918954" fill="#fff"></circle>
                                                <circle class="donut-ring" cx="20" cy="20"
                                                    r="15.91549430918954" fill="transparent" stroke-width="3.5">
                                                </circle>
                                                <circle class="donut-segment donut-segment-2" cx="20"
                                                    cy="20" r="15.91549430918954" fill="transparent"
                                                    stroke-width="3.5" stroke-dasharray="69 31"
                                                    stroke-dashoffset="25"></circle>
                                                <g class="donut-text donut-text-1">
                                                    <text y="50%" transform="translate(0, 2)">
                                                        <tspan x="50%" text-anchor="middle" class="donut-percent">69%
                                                        </tspan>
                                                    </text>
                                                    <text y="60%" transform="translate(0, 2)">
                                                        <tspan x="50%" text-anchor="middle" class="donut-data">3450
                                                            widgets</tspan>
                                                    </text>
                                                </g>
                                            </svg>
                                        </div>
                                        <hr>
                                        <a href="#">View full Report</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
    <script src="{{ asset('assets/clients/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/clients/js/custom.js') }}"></script>
    @yield('js')
    @stack('scripts')
</body>

</html>
