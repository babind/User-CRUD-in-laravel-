<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<title>crud</title>
	{{HTML::style("css/bootstrap.css")	}}
	{{HTML::script("js/jquery.js")	}}
		{{HTML::script("js/bootstrap.js")	}}
</head>
<body>
    @yield('head')
<nav class="navbar navbar-inverse" role="navigation">
</nav>
<div class="container">
	    @if(Session::has('message'))
	        <p class="alert alert-success">{{ Session::get('message') }}</p>
	    @endif
    @yield('content')
</div>
</body>
</html>