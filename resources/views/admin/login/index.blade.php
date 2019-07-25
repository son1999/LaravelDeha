<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login page</title>
    <link rel="stylesheet" href="{{ asset('assets/admin/css/sb-admin-2.min.css') }}">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6 offset-lg-3 offset-md-3">
            @if(session('error'))
                <div class="alert alert-danger mt-2">
                    {{session('error')}}

                </div>
            @endif
            <form action="{{route('login')}}" method="POST" class="mt-4">
                @csrf
                <div class="form-group">
                    <label for="email"> email </label>
                    <input class="form-control" type="text" name="email" id="email">
                    @if($errors->has('email'))
                        <div class="alert alert-danger mt-2">{{ $errors->first('email') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password"> Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                    @if($errors->has('password'))
                        <div class="alert alert-danger mt-2">{{ $errors->first('password') }}</div>
                    @endif
                </div>
                <input type="submit" class="btn btn-primary" value="Login"></input>
            </form>
        </div>
    </div>
</div>
</body>
</html>
