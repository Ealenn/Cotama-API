@extends('layouts.app')

@section('content')
  <login
    url_login="{{ route('login') }}"
    url_reset="{{ route('password.request') }}"
    url_register="{{ route('register') }}"
    email="{{ old('email') }}"
    error="{{ $errors->first('email')  }} {{ $errors->first('password')  }}"
  ></login>
@endsection
