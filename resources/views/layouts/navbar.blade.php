<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @auth
                @if(Illuminate\Support\Facades\Auth::user()->inGroup())
                    @component('layouts.nav-user-verified')
                    @endcomponent
                @endif
                @if(Illuminate\Support\Facades\Auth::user()->is_admin)
                    @component('layouts.nav-user-admin')
                    @endcomponent
                @endif
                @endauth
            </ul>


            @auth
            <button class="btn btn-outline-danger" type="submit" data-bs-toggle="modal" data-bs-target="#logoutModal">Выйти</button>

            <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Выйти</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Вы уверены, что хотите выйти из аккаунта?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                        <form action="{{route('auth.logout')}}" method="POST">
                            @csrf
                            <input type="submit" class="btn btn-danger" value="Выйти">
                        </form>
                    </div>
                </div>
            </div>
            @endauth

            @guest
            <div>
                <a href="{{route('register.index')}}" class="btn btn-outline-primary" type="submit">Регистрация</a>
                <a href="{{route('auth.index')}}" class="btn btn-outline-primary" type="submit">Вход</a>
            </div>
            @endguest
        </div>
    </div>
</nav>