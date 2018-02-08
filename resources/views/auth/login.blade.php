@extends('layouts.app')

@section('content')
  <login
    url_login="{{ route('login') }}"
    url_reset="{{ route('password.request') }}"
    url_register="{{ route('register') }}"
  ></login>
@endsection
