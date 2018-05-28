@extends('layout')

@section('content')

  Bonjour {{ $User->first_name }}.

  Je tiens à te féliciter, te voila chef d'escouade !

  Partage ce code pour inviter ton équipe à rejoindre "**{{ $Foyer->name }}**" :

  @component('mail::panel')
    <div style="text-align: center">{{ $Foyer->key }}</div>
  @endcomponent

  C'est un honneur, ne decois pas tes guerriers.
  Ils sont prêts à perdre une fourchette pour toi !

  Les chemins de poussière ne vous font pas peur.

@endsection
