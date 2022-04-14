@extends('indexAdmin')

@section('content')

<div class="main pt-3">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1 class="text-center">Nested Loop</h1>

				@if($message = Session::get('success'))
					<div class="alert alert-success">{{ $message }}</div>
				@endif

				<a href="{{'/insertLoop'}}" class="btn btn-info pt-2">Add Data</a>

				<table class="table table-responsive pt-2">
					<thead>
						<tr>
							<th>Nomor</th>
							<th>Input 1</th>
							<th>Input 2</th>
							<th>Persentase</th>
							<th colspan="2"><center>Action</center></th>
						</tr>
					</thead>

					<tbody>
						@if(count($loops)>0)
							@foreach($loops AS $lp)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $lp->input1 }}</td>
								<td>{{ $lp->input2 }}</td>
								<td>{{ $lp->percentage .'%' }}</td>
								<td><a href="{{'/editLoop/'.$lp->id}}" class="btn btn-success">Update</a></td>
								<td><form method="POST" action="{{ '/deleteLoop/'.$lp->id }}">
									@csrf
									<button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this data?')">Delete</button>
								</form>
								</td>
							</tr>
							@endforeach

						@else
							<tr>
								<td colspan="6"><h1 class="text-danger">Data tidak ditemukan</h1></td>
							</tr>

						@endif
					</tbody>

				</table>

			</div>
		</div>	
	</div>	
</div>	

@endsection