@component('mail::layout')

  @slot('header')
    @component('mail::header', ['url' => config('app.url')])
      {{ config('app.name') }}
    @endcomponent
  @endslot

  @yield('content')

  @lang('mail.footer')

  @slot('footer')
    @component('mail::footer')
      © {{ date('Y') }} {{ config('app.name') }}.
    @endcomponent
  @endslot
@endcomponent
