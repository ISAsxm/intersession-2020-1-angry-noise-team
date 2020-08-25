@extends('base')

@section('content')

    <div id="app">
    <header-component></header-component>
    <h1>Hello world</h1>
        <p>@{{ message }}</p>
        <example-component></example-component>
        @yield('content')
    </div>

@endsection
