@extends('layout')

@section('content')

  @lang('mail.header', ['name' => $User->first_name])

  L'heure est grave.

  L'escouade "**{{ $Foyer->name }}**" a abandonné le champ de bataille.

  La fourchette de trop ? Personne ne sais. Mais une chose est sûr, on ne pourra plus compter sur eux maintenant.

  Tu peux encore rassembler des guerrier, des pro du menage ou de la vaiselle.

  @component('mail::button', ['url' => config('app.url'), 'color' => 'green'])
    En cliquant ici
  @endcomponent

@endsection
