@extends('base')

@section('content')

<header-component></header-component>
<main-component url-action="{{ env('APP_PAYPAL_ACTION_URL') }}" url-img="{{ env('APP_PAYPAL_IMG_URL') }}" hash-value="{{ env('APP_PAYPAL_HASH_VALUE') }}" ></main-component>
<footer-component></footer-component>

@endsection