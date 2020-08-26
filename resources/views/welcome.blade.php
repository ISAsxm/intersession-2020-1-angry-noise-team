@extends('base')

@section('content')

    <div id="app">
    <nav-component></nav-component>
    <header-component></header-component>
    <!--<h1>Hello world</h1>
        <p>@{{ message }}</p>-->
        <main-component></main-component>
        @yield('content')
    </div>

@endsection
