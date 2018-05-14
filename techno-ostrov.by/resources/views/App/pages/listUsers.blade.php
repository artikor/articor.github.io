@extends("App/layouts/template")

@section("description","Список пользователей")
@section("title","Список пользователей")

@section("content")

{{--@if(Auth::user()->role=="admin")
	
@endif--}}


<div class="ra10 center">
	<h1>Список пользователей</h1>
</div>
<div class="ra12 rd10 center">
	@for($i=0; $i<count($users); $i++)
	<div class="ra10 rf7 center just_between item-user">
		<div class="image-min">
			<img class="image" src="{{url('public/Image/users/'.$users[$i]->image)}}">
		</div>	
		<div class="c6 just_around">
			<p>{{ $users[$i]->fio }}</p>
			<p>{{ $users[$i]->position }}</p>
			<p>{{ $users[$i]->phone }}</p>
		</div>	
		<div class="p5">
			<a title="развернутая информация о пользователе" href="{{route('user',$users[$i]->id)}}" class="fa fa-eye fa-lg but-nav" aria-hidden="true"></a>
			@if(Auth::user()->role=="admin")
			<a title="редактировать карточку пользователя" href="{{route('userUpdate',$users[$i]->id)}}" class="fa fa-pencil fa-lg but-nav" aria-hidden="true"></a>
			@endif
		</div>
		
	</div>
	@endfor
</div>

<div class="ra10 p5 center row-height">
	<?php echo $users->links(); ?>
</div>




@endsection