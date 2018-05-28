@extends('layout')

@section('content')

  Bonjour {{ $User->first_name }}.

  Bonne nouvelle : **{{ $UserJoin->first_name }}** se porte volontaire pour faire la vaiselle tout les jours !

  En fait, c'est faux. *Et c'est bien dommage*.

  Mais tu peux maintenant compter sur lui ! Il viens de rejoindre ton esquade "**{{ $Foyer->name }}**".

@endsection
