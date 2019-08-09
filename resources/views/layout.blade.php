<!DOCTYPE html>
<html lang="ja">

@include('components.header')

<body id="page-top">
  @include('components.nav')

  <div id="wrapper">

    <div id="content-wrapper" class="d-flex flex-column">
      @yield('content')
    </div>

  </div>
</body>