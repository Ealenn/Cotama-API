@extends('layout')

@section('content')

  @lang('mail.header', ['name' => $User->first_name])


  @lang('mail.foyer.userdelete.intro', ['group' => $Foyer->name])


  @lang('mail.foyer.userdelete.outro')


  @component('mail::button', ['url' => config('app.url'), 'color' => 'green'])
    {{ config('app.url') }}
  @endcomponent

@endsection
