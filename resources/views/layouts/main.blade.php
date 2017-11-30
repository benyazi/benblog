<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ben Yazi Blog</title>
    <!-- Styles -->
    <link href="/css/font-face.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/benyazi_style.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/fe8a4938db.js"></script>
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
<div class="container benContainer">
    <div class="row">
        <div class="col-xs-3">
            <div class="leftSide">
                <div class="leftSide_logo">
                    <a href="{{ url('/') }}">BenYaziBlog</a>
                </div>
                <div class="leftSide_image">
                    <img src="/imgs/self_benyazi.jpg" alt="..." class="img-circle" style="width: 100%;">
                </div>
                <div class="leftSide_block">
                    <div class="leftSide_block__title">My contacts:</div>
                    <div>
                        <dl class="dl-horizontal">
                            <dt>GitHub <i class="fa fa-github"></i>:</dt>
                            <dd><a href="https://github.com/benyazi" target="_blank">benyazi</a></dd>
                            <dt>Email:</dt>
                            <dd><a href="mailto:yo@benyazi.ru">yo@benyazi.ru</a></dd>
                            <dt>LinkedIn:</dt>
                            <dd><a href="#" target="_blank">s.klabukov</a></dd>
                            <dt>Facebook:</dt>
                            <dd><a href="https://facebook.com/benjamin.yazi" target="_blank">ben.yazi</a></dd>
                            <dt>Twitter:</dt>
                            <dd><a href="https://twitter.com/ben_yazi" target="_blank">ben_yazi</a></dd>
                        </dl>
                    </div>
                </div>
                <div class="leftSide_block clearfix">
                    <div class="leftSide_block__title">Menu:</div>
                    <div>
                        <ul class="nav nav-pills nav-stacked">
                            @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                            @else
                            <li><a href="#">Hi, {{ Auth::user()->name }}</a></li>
                            <li><a href="{{ route('post.add')}}">Add new post</a></li>
                            <li>
                                <a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-9">
            @yield('content')
        </div>
    </div>
</div>


<!-- Scripts -->
<script src="/js/app.js"></script>
<!-- Yandex.Metrika counter --> <script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter39700705 = new Ya.Metrika({ id:39700705, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true, trackHash:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/39700705" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
</body>
</html>
