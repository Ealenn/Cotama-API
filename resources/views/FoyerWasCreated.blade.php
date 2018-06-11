@extends('layout')

@section('content')

  @lang('mail.header', ['name' => $User->first_name])


  @lang('mail.foyer.created.intro', ['name' => $Foyer->name])

  @component('mail::panel')
    <div style="text-align: center">{{ $Foyer->key }}</div>
  @endcomponent

  @lang('mail.foyer.created.outro')

@endsection
