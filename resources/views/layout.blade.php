@component('mail::layout')

  @slot('header')
    @component('mail::header', ['url' => config('app.url')])
      {{ config('app.name') }}
    @endcomponent
  @endslot

  @yield('content')

  Au plaisir de vous revoir,
  L'équipe Cotama.

  @slot('footer')
    @component('mail::footer')
      © {{ date('Y') }} {{ config('app.name') }}.
    @endcomponent
  @endslot
@endcomponent
