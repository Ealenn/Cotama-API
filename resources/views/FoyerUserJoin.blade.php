@extends('layout')

@section('content')

  @lang('mail.header', ['name' => $User->first_name])


  @lang('mail.foyer.userjoin.intro', ['group' => $Foyer->name])


  @lang('mail.foyer.userjoin.outro')

@endsection
