<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>

    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<style>
/* .bg-gradient {
  background: linear-gradient(to right, #1e3c72, #2a5298);
} */
.bg-gradient {
  background: linear-gradient(to right, #7028e4, #e5b2ca);
}
.custom-logo {
  font-family: 'Arial', sans-serif;
  font-size: 24px;
}
.nav-link:hover {
  color: #fff;
  background-color: #007bff;
  border-radius: 5px;
}
.nav-link {
  font-size: 18px;
}
    </style>
</head>
<body>
    <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-gradient">
  <a class="navbar-brand custom-logo" href="#">Logo</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="{{url('/home')}}">Home</a>
      </li>
      @if(Session::has('customers'))
      <li>
      <a class="nav-link" href="{{url('/customer/signin')}}">Login</a>
      </li>
      @endif
      <li class="nav-item">
        <a class="nav-link" href="{{url('/customer')}}">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/customer/view')}}">Customer</a>
      </li>
    </ul>
   
    <div class="ml-auto">
                <div class="dropdown">
                    @if(Session::has('customers'))
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            {{ Session::get('customers.name') }}
                        </button>
                        <div class="dropdown-menu">
                            <form id="logout-form" action="{{route('customer.logout')}}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </div>
                    @else
                        <a class="btn btn-primary" href="/customer/signin">Login</a>
                    @endif
                </div>
            </div>
</div>
</nav>
</div>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center">{{$title}}</h1>
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{$url}}">
                            @csrf

                            <div class="form-group">
                                <label for="customer_id">{{ __('Customer ID') }}</label>

                                <input id="customer_id" type="text" class="form-control" name="customer_id" value="{{ old('customer_id')}}" required autocomplete="customer_id" autofocus>

                                @error('customer_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name">{{ __('Name') }}</label>

                                <input id="name" type="text" class="form-control " name="name" value="{{ old('name',$customer->name) }}" required autocomplete="name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">{{ __('Email address') }}</label>

                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email',$customer->email) }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">{{ __('Confirm Password') }}</label>

                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>

                            <div class="form-group">
                                <label for="gender">{{ __('Gender') }}</label>

                                <select id="gender" class="form-control" name="gender" required>
                                    <option value="">-- Select gender --</option>
                                    <option value="male"  {{ old('gender') === "Male" ? "checked" : "" }}>Male</option>
                                    <option value="female" {{ old('gender') === "Female" ? "checked" : "" }}>Female</option>
                                    <option value="others" {{ old('gender') === "Others" ? "checked" : "" }}>Others</option>
                                </select>

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="address">{{ __('Address') }}</label>

                                <textarea id="address" class="form-control " name="address" required> {{ old('address') }} </textarea>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="country">{{ __('Country') }}</label>

                                <input id="country" type="text" class="form-control" name="country" value="{{ old('country') }}" required>

                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                           <div class="form-group">
                                <label for="dob">{{ __('Date of Birth') }}</label>

                                <input id="dob" type="date" class="form-control" name="dob" value="{{ old('dob') }}" required>

                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                    <a class="btn btn-link" href="{{ url('customer/signin') }}">{{ __('Already Registered?') }}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
    <!-- Bootstrap 4 JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>