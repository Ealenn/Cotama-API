@extends('layouts.app')

@section('content')
  <register
    url_login="{{ route('login') }}"
    url_register="{{ route('register') }}"
  ></register>

@endsection
