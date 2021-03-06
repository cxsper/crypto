@extends('layout.master')

@section('navbar')
    <div class="portal">
    @include('layout.navbar')
@endsection

@section('body')

    <div class="container">
        @yield('content')
    </div>
</div>

@endsection


@section('footer')
    <footer>
        Cryptovault &copy; <span id="date"></span>
    </footer>
@endsection

@section('foot')
    <script src="{{ asset('js/portal.js') }}"></script>

    @yield('scripts')

@endsection
