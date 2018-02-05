@extends('layouts.app')

@section('content')
  <register
    url_login="{{ route('login') }}"
    url_register="{{ route('register') }}"
    email="{{ old('email') }}"
    pseudo="{{ old('pseudo') }}"
    firstName="{{ old('first_name') }}"
    lastName="{{ old('last_name') }}"
    error="{{ $errors->first('email')  }} {{ $errors->first('password')  }} {{ $errors->first('pseudo')  }} {{ $errors->first('last_name')  }} {{ $errors->first('first_name')  }}"
  ></register>

@endsection
