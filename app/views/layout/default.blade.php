@include('layout.header')
    @yield('head')
<nav class="navbar navbar-inverse" role="navigation">
</nav>
<div class="container">
	    @if(Session::has('message'))
	        <p class="alert alert-success">{{ Session::get('message') }}</p>
	    @endif
    @yield('content')
</div>
@include('layout.footer')