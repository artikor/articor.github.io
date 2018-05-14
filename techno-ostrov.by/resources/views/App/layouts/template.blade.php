@section('header')
	@include('App/layouts/header')
@show
<div class="space-content grow ra12">
	<div class="content ra11 center p1">
		@yield('content')
	</div>
</div>
@section('footer')
	@include('App/layouts/footer')
@show