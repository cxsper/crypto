
<div class="navbar">
    <div class="container">
        <div class="navbar-brand">
            <a href="{{ route('home') }}" class="navbar-logo">
                <img src="{{ asset('img/logo.png') }}" alt="">
            </a>

            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navMenu">
              <span aria-hidden="true"></span>
              <span aria-hidden="true"></span>
              <span aria-hidden="true"></span>
            </a>
        </div>

        <div class="navbar-menu" id="navMenu">
            <div class="navbar-end">
                <div class="tabs">
                    <ul>
                        <li class="@isRoute('home')">
                            <a href="{{ route('home') }}">Главная</a>
                        </li>
                        <li class="@isRoute('portal.sell')">
                            <a href="{{ route('portal.sell') }}">Продажа</a>
                        </li>
                        @auth('web')
                            <li class="@isRoute('portal.dashboard')">
                                <a href="{{ route('portal.dashboard') }}">История</a>
                            </li>
                            <li class="@isRoute('portal.tickets')">
                                <a href="{{ route('portal.tickets') }}">
                                    Поддержка
                                    @if($unread_responses)
                                        ({{ $unread_responses }})
                                    @endif
                                </a>
                            </li>
                            <li class="@isRoute('portal.withdrawals')">
                                <a href="{{ route('portal.withdrawals') }}">
                                    Вывод
                                </a>
                            </li>
                        @endauth
                        <li class="@isRoute('rules')">
                            <a href="{{ route('rules') }}">Правила</a>
                        </li>
                        <li class="@isRoute('contact')">
                            <a href="{{ route('contact') }}">Контакты</a>
                        </li>
                        @auth('web')
                            <li class="bulma-mobile--visible">
                                <a href="{{ route('logout') }}">Выход</a>
                            </li>
                        @else
                            <li class="@isRoute('auth.login') bulma-mobile--visible">
                                <a href="{{ route('login') }}">Вход</a>
                            </li>
                            <li class="@isRoute('auth.register') bulma-mobile--visible">
                                <a href="{{ route('signup') }}">Регистрация</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
            <div class="navbar-end navbar-auth">
            @auth
                <div class="tags has-addons">
                    <span class="tag is-dark">Баланс</span>
                    <span class="tag is-info">{{ $user->pretty_balance }}</span>
                </div>
                <a class="navbar-item portal-navbar-item" href="{{ route('logout') }}">Выход</a>
            @else
                <a class="navbar-item" href="{{ route('login') }}">Вход</a>
                <a class="navbar-item" href="{{ route('signup') }}">Регистрация</a>
            @endauth
            </div>
        </div>
    </div>
</div>
