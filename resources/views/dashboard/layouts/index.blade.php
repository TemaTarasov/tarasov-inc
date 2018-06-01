@extends('layouts.index')

@section('styles')
  <link rel="stylesheet" href="/css/dashboard.css?version={{ $version }}">
@endsection

@section('layout')
  <header>
    <div class="flex">
      <div id="burger" class="header-burger" data-target="#navigation" data-className="opened">
        @include('components.icons.index', [
          'icon' => 'burger'
        ])
      </div>
      <div class="header-logo">
        <div class="header-logo-content">
          Tarasov Inc.
        </div>
      </div>
    </div>
    <div>
      <div class="header-user">
        User Name

        @include('components.icons.index', [
          'icon' => 'arrow'
        ])
      </div>
    </div>
  </header>

  <div class="flex h100">
    <div class="navigation h100">
      <div id="navigation" class="navigation-content">
        @foreach ($navigation['items'] as $item)
          @if ($item === '-')
            <div class="separator">
              <span class="icon"></span>
              <span class="text"></span>
            </div>
          @else
            <a href="{{ $item['href'] }}" class="{{ $item['label'] === $navigation['current'] ? 'current' : '' }}">
              <span>
                @include('components.icons.index', [
                  'icon' => $item['icon']
                ])
              </span>

              {{ $item['label'] }}
            </a>
          @endif
        @endforeach
      </div>
    </div>

    <div class="content h100">
      @yield('content')
    </div>
  </div>
@endsection

@section('scripts')
  <script src="/js/dashboard.js?version={{ $version }}"></script>
@endsection