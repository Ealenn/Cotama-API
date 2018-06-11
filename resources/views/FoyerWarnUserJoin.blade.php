@extends('layout')

@section('content')

  @lang('mail.header', ['name' => $User->first_name])


  @lang('mail.foyer.warnuser.intro', ['name' => $UserJoin->first_name])


  @lang('mail.foyer.warnuser.outro', ['group' =>  $Foyer->name])

@endsection
