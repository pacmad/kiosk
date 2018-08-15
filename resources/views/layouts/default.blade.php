<!DOCTYPE html>
<html lang="{{config('app.locale')}}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{asset('stylesheets/app.min.css') . '?v=' . time()}}">
        <title>{{config('app.name')}}</title>
    </head>
    <body>
        <header class="header">
            <div class="header__wrap">
                <nav class="navigation-main">
                    <ul class="navigation-main__list">
                        <li class="navigation-main__item @if(strpos(request()->route()->getActionName(), 'GodparenthoodController@index')) navigation-main__item--active @endif">
                            <a class="navigation-main__link" href="{{url('/')}}">
                                Dashboard
                            </a>
                        </li>
                        <li class="navigation-main__item @if(strpos(request()->route()->getActionName(), 'GodparenthoodController@create')) navigation-main__item--active @endif">
                            <a class="navigation-main__link" href="{{action('GodparenthoodController@create')}}">
                                Neue Patenschaft
                            </a>
                        </li>
                        <li class="navigation-main__item @if(strpos(request()->route()->getActionName(), 'ChildController@create')) navigation-main__item--active @endif">
                            <a class="navigation-main__link" href="{{action('ChildController@create')}}">
                                Neues Kind
                            </a>
                        </li>
                        <li class="navigation-main__item @if(strpos(request()->route()->getActionName(), 'DebitEntryController@statistics')) navigation-main__item--active @endif">
                            <a class="navigation-main__link" href="{{action('DebitEntryController@statistics')}}">
                                Statistiken
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
        <main class="main">
            <div class="main__wrap">
                <aside class="main__sidebar">
                    <div class="article">
                        <form class="form" action="{{action('SearchController@search')}}" action="get">
                            <div class="form__field">
                                <label class="form__label">Suche</label>
                                <input type="text" class="form__input" name="q" autofocus>
                            </div>
                            <button class="button button--primary button--without-icon" type="submit">Suchen</button>
                        </form>
                    </div>
                    <div class="article">
                        <h2 class="headline">
                            Einnahmen <strong class="strong">{{number_format($earnings, 2, ',', '.')}} €</strong>
                        </h2>
                    </div>
                    <div class="article">
                        <h2 class="headline">Weiteres</h2>
                        <div class="small">
                            <ul class="list">
                                <li>
                                    <a class="link link--unobtrusive" href="{{action('Controller@generateDbDump')}}">Backup der Datenbank</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </aside>
                <section class="main__content">
                    @yield('main')
                </section>
            </div>
        </main>
        <footer class="footer">
            <figure class="footer__logo">
                <a href="https://www.runepiper.de" target="_blank" rel="noopener">
                    <img width="50" src="https://www.runepiper.de/assets/images/runepiper.svg" alt="{{ config('app.name') }}">
                </a>
            </figure>
            <section class="footer__additional">
                <a href="https://github.com/runepiper/kiosk" class="link link--bright" target="_blank" rel="noopener">GitHub</a>
                <br>
                <small class="small">{{ config('app.name') }} – {{ config('app.env') }}</small>
            </section>
        </footer>
    </body>
</html>