@extends('layout')

@section('content')

  Bonjour {{ $User->first_name }}.

  Tu viens de rejoindre l'escouade "**{{ $Foyer->name }}**".

  Bien évidemment, je tiens tout d'abord à te féliciter.

  Tu prête désormais allégeance à celle-ci.

  Les chemins de poussière ne vous font pas peur.

@endsection
