@extends('layouts.app')

@section('content')
  <reset
    url_password_email="{{ route('password.request') }}"
    status="{{ session('status') }}"
    error="{{ $errors->first('email') }} {{ $errors->first('password') }}"
    iemail="{{ $email or old('email') }}"
    token="{{ $token }}"
  ></reset>
@endsection
