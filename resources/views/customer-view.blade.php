<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Document</title>
    <style>
    /* Custom CSS to position the button */
    .btn-wrapper {
      display: flex;
      justify-content: flex-end;
    }
.bg-gradient {
  background: linear-gradient(to right, #f6d365, #fda085);
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
  <!-- <div class="row"> -->

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
      @if(!Session::has('customers'))
                    <li class="nav-item">
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

  <div class="container mt-2">
<div class="row">
  <form action="" class="col-md-9">
<div class="form-group d-flex">
<input type="search" name="search" class="form-control mr-4" value="{{$search}}" placeholder="search here"/>
<button class="btn btn-success">
  Search
  </button>
  </div>
  </form>
  <div class="btn-wrapper ml-auto">
  <a href="{{route('customer.create')}}">
        <button class="btn btn-primary ">Add Me</button>
      </div>
  </a>
  </div>
  </div>
<div class="container">
<table class="container-fluid table table-striped table-bordered mt-3">
  <thead class="thead-dark">
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Gender</th>
      <th>Address</th>
      <th>Country</th>
      <th>DOB</th>
      <th>Status</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
  @foreach($customer as $cust)
    <tr>
      <td>{{$cust->name}}</td>
      <td>{{$cust->email}}</td>
      <td>
        @if($cust->gender=="Male")
          M
          @elseif($cust->gender=="Female")
          F
          @else
          O
          @endif
      </td>
      <td>{{$cust->address}}</td>
      <td>{{$cust->country}}</td>
      <td>{{$cust->dob}}</td>
      <td>
        @if($cust->status=="1")
        <button class="btn" >
          <span class="badge badge-success">Active</span>
</button>
        @else
        <button class="btn" >
        <span class="badge badge-danger">InActive</span>
</button>
        @endif
      </td>
      <td>
        <!-- <a href="{{url('/customer/delete')}}/{{$cust->customer_id}}"> -->
        <a href="{{route('customer.delete',['id'=>$cust->customer_id])}}">
<button class="btn btn-danger">Delete</button>
  </a>
  <a href="{{url('/customer/edit')}}/{{$cust->customer_id}}">
<button class="btn btn-warning">Update</button>
  </a>
  </td>
    </tr>
    @endforeach
  </tbody>
</table>
  <div class="row">
    <nav area-label="Page navigation">
<ul class="pagination">
@if($customer instanceof \Illuminate\Contracts\Pagination\Paginator)
  {{$customer->links()}}
@endif
  </ul>
  </nav>
  </div>
</div>
</body>
</html>