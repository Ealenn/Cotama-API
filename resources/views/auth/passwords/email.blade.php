@extends('layouts.app')

@section('content')
  <email
    url_password_email="{{ route('password.email') }}"
    status="{{ session('status') }}"
    error="{{ $errors->first('email')  }}"
  ></email>
@endsection
