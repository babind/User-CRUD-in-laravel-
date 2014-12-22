<!-- /var/www/html/ideasoffshore-projects/laraseries/app/views/users/show.blade.php -->

		<title> I am showing the Data</title>
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
	</head>
	<body>
	<div class="container">

	<nav class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{URL::to('users')}}">User alert</a>
		</div>
		<ul class="nav navbar-inverse">
			<li><a href="{{URL::to('users')}}">View All the Users</a></li>
			<li><a href="{{URL::to('users/create')}}">Create A User</a></li>
		</ul>
	</nav>

<h1>Show{{$user->name}}</h1>
	
	<div class="jumbotron text-center">
		<h2>{{$user->name}}</h2>

		<p>
		<strong>Email:</strong>{{$user->email}}<br>
		</p>
	</div>

