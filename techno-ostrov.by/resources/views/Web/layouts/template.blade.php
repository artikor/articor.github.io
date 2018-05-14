@section('header')
	@include('Web/layouts/header')
@show
<div class="work-space">
  	<div class="content">
		@yield('content')
	</div>
</div>
@section('footer')
	@include('Web/layouts/footer')
@show