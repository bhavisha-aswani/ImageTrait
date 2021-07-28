<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CRUD Image</title>
	@include('layouts.head')
</head>
<body>
	@include('layouts.sidebar')
	<div class="container">
		<div class="main">
		@section('main-content')
		@show
		</div>
	</div>
	@include('layouts.footer')
</body>
</html>