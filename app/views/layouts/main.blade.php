<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Роги&Копита</title>
        <meta name="description" content="Lorem ipsum dolor sit amet.">
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        {{ HTML::style('css/normalize.css') }}
        {{ HTML::style('css/main.css') }}
        {{ HTML::script('js/vendor/modernizr-2.6.2.min.js') }}
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">Ви використовуєте <strong>застарілий</strong> Браузер. Будь ласка, <a href="http://browsehappy.com/">оновіть ваш браузер</a> або <a href="http://www.google.com/chromeframe/?redirect=true">активуйте Google Chrome Frame</a> для повноцінної роботи сайту.</p>
        <![endif]-->

        <div id="wrapper">
            <header>
                <section id="action-bar">
                    <div id="logo">
                        <a href="/">Роги<span id="logo-accent">&</span>Копита</a>
                    </div><!-- end logo -->

                    <nav class="dropdown">
                        <ul>
                            <li>
                                <a href="#">Категорії {{ HTML::image('img/down-arrow.gif', 'Категорії') }}</a>
                                <ul>
                                  @foreach($catnav as $cat)
                                    <li>{{ HTML::link('/store/category/'.$cat->id, $cat->name) }}</li>
                                  @endforeach
                                </ul>
                            </li>
                        </ul>
                    </nav>

                    <div id="search-form">
                      {{ Form::open(array('url' => 'store/search', 'method' => 'get')) }}
                      {{ Form::text('keyword', null, array('placeholder' => 'Пошук…', 'class' => 'search')) }}
                      {{ Form::submit('Знайти', array('class' => 'search submit')) }}
                      {{ Form::close() }}
                    </div><!-- end search-form -->

                    <div id="user-menu">
                        @if (Auth::check())
                            <nav class="dropdown">
                                <ul>
                                    <li>
                                        <a href="#">{{ HTML::image('img/user-icon.gif', Auth::user()->firstname) }} {{ Auth::user()->firstname }} {{ HTML::image('img/down-arrow.gif', Auth::user()->firstname) }}</a>
                                        <ul>
                                            @if(Auth::user()->admin == 1) 
                                                <li>Розділи адміністратора:</li>
                                                <li>{{ HTML::link('/orders/index', 'Всі замовлення') }}</li>  
                                                <li>{{ HTML::link('/admin/deliveries', 'Служби доставки') }}</li>  
                                                <li>{{ HTML::link('/admin/statuses', 'Статуси замовлень') }}</li>  
                                                <li>{{ HTML::link('/admin/categories', 'Категорії товарів') }}</li>  
                                                <li>{{ HTML::link('/admin/companies', 'Компанії виробники') }}</li>  
                                                <li>{{ HTML::link('/admin/specifications', 'Характеристики товарів') }}</li>    
                                                <li>{{ HTML::link('/admin/products', 'Керування товарами') }}</li>   
                                                <li><hr></li>
                                            @endif
                                            <li>{{ HTML::link('/orders/ordershistory', 'Історія замовлень') }}</li>
                                            <li>{{ HTML::link('/store/wishlist', 'Список бажаного') }}</li>
                                            <li>{{ HTML::link('/users/signout', 'Вийти') }}</li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        @else
                            <nav id="signin" class="dropdown">
                                <ul>
                                    <li>
                                        <a href="#">{{ HTML::image('img/user-icon.gif', 'Увійти') }} Увійти {{ HTML::image('img/down-arrow.gif', 'Увійти') }}</a>
                                        <ul>
                                            <li>{{ HTML::link('/users/signin', 'Увійти') }}</li>
                                            <li>{{ HTML::link('/users/newaccount', 'Реєстрація') }}</li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        @endif
                    </div><!-- end user-menu -->

                    <div id="view-cart">
                        <a href="/store/cart">{{ HTML::image('img/blue-cart.gif', 'Кошик') }} Кошик
                            @if (Cart::totalItems())
                               ({{ Cart::totalItems() }})
                            @endif
                        </a>
                    </div><!-- end view-cart -->
                </section><!-- end action-bar -->
            </header>

            @yield('promo')

            @yield('search-keyword')

            <hr />

            <section id="main-content" class="clearfix">
                @if(Session::has('message'))
                  <p class="alert">{{ Session::get('message') }}</p>
                @endif

                @yield('content')
            </section><!-- end main-content -->

            <hr />

            @yield('pagination')
            <footer>
                <section id="contact">
                    <h3>Для замовлення по телефону: 0-999-9999. Також<br>ви можете написати нам <a href="mailto:office@shop.com">office@shop.com</a></h3>
                </section><!-- end contact -->

                <hr />

                <section id="links">
                    <div id="my-account">
                        <h4>МІЙ АКАУНТ</h4>
                        <ul>
                            <li>{{ HTML::link('/users/signin', 'Увійти') }}</li>
                            <li>{{ HTML::link('/users/newaccount', 'Реєстрація') }}</li>
                            <li><a href="/store/cart">Кошик</a></li>
                        </ul>
                    </div><!-- end my-account -->
                    <div id="info">
                        <h4>ІНФОРМАЦІЯ</h4>
                        <ul>
                            <li><a href="#">Умови використання</a></li>
                            <li><a href="#">Політика конфіденційності</a></li>
                        </ul>
                    </div><!-- end info -->
                    <div id="extras">
                        <h4>Додатково</h4>
                        <ul>
                            <li><a href="#">Про нас</a></li>
                            <li>{{ HTML::link('/store/contact', 'Зв\'яжіться з нами') }}</li>
                        </ul>
                    </div><!-- end extras -->
                </section><!-- end links -->

                <hr />

                <section class="clearfix">
                    <div id="copyright">
                        <div id="logo">
                            <a href="#">Роги<span id="logo-accent">&</span>Копита</a>
                        </div><!-- end logo -->
                        <p id="store-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, error, dolore neque aliquid sint explicabo odit laborum cum tenetur accusamus debitis sapiente culpa. Sapiente, est, odio amet magnam quisquam reprehenderit..</p>
                        <p id="store-copy">&copy; 2014 Роги&Копита.</p>
                    </div><!-- end copyright -->
                </section>
            </footer>
        </div><!-- end wrapper -->

        <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
        <!-- <script>window.jQuery || document.write("{{ HTML::script('js/vendor/jquery-1.9.1.min.js') }}")</script> -->
        {{ HTML::script('js/vendor/jquery-1.9.1.min.js') }}
        {{ HTML::script('js/plugins.js') }}
        {{ HTML::script('js/main.js') }}

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <!-- <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script> -->
    </body>
</html>
