<!DOCTYPE html>
<html>

<head>
	@include('blocks.head')
</head>

<body>

	@include('blocks.navbar')


    @include('blocks.header')


	@yield('content')
    

    @include('blocks.footer')
    

	@include('blocks.foot')
</body>

</html>