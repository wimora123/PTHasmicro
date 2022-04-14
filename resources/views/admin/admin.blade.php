@extends('indexAdmin')

@section('content')

<div class="main pt-3">
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<h1>Selamat datang, <span class="text-info font-weight-bold">{{ auth()->user()->name }}</span> </h1>
			</div>
			<div class="col-sm-4">
				<a class="btn btn-warning text-white font-weight-bold" href="{{'/postLogout'}}">Logout</a>
			</div>
		</div>	
	</div>	
</div>	

@endsection