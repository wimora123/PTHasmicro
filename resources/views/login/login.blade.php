@extends('indexLogin')

@section('content')

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-8 offset-md-2">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                </div>
                                @if($message = Session::get('loginBack'))
                                <div class="text-center alert alert-secondary">
                                    {{ $message }}
                                </div>
                                @elseif($message = Session::get('failed'))
                                <div class="text-center alert alert-danger">
                                    {{ $message }}
                                </div>
                                @endif

                                <form class="user" action="{{'/postLogin'}}" method="POST">
                                @csrf
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control form-control-user {{ $errors->has('username') ? 'is-invalid' : '' }}" placeholder="Your Username" value="{{ old('username') }}"> 
                                    @if($errors->has('username'))
                                    <span class="invalid-feedback">{{ $errors->first('username') }}</span>
                                    @endif
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="Password" value="{{ old('password') }}">
                                    @if($errors->has('password'))
                                    <span class="invalid-feedback">{{ $errors->first('password') }}</span>
                                    @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>


@endsection