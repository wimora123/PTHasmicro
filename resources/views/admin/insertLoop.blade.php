@extends('indexAdmin')

@section('content')

<div class="main pt-3">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1 class="text-center">Insert Loop</h1>

				<form method="POST" action="{{'/addLoop'}}">
				@csrf
				  	<div class="form-group">
					    <label>Input 1</label>
					    <input type="text" class="form-control {{ $errors->has('input1') ? 'is-invalid' : '' }}" name="input1" value="{{ old('input1') }}">
					    @if($errors->has('input1'))
					    <span class="invalid-feedback">{{ $errors->first('input1') }}</span>
					    @endif
				  	</div>

				 	<div class="form-group">
					    <label>Input 2</label>
					    <input type="text" class="form-control {{ $errors->has('input2') ? 'is-invalid' : '' }}" name="input2" value="{{ old('input2') }}">
					    @if($errors->has('input2'))
					    <span class="invalid-feedback">{{ $errors->first('input2') }}</span>
					    @endif
				  </div>

				  <input type="hidden" class="form-control" name="percentage">

				  <center><button type="submit" class="btn btn-primary">Add Data</button> <a href="{{'/nestedLoop'}}" class="btn btn-warning ml-2">Back</a></center>
				</form>

			</div>
		</div>	
	</div>	
</div>	

@endsection