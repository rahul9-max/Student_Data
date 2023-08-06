
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <title>Document</title>
    <style>
.carousel-indicators li {
  width: 10px;
  height: 10px;
  border-radius: 50%;
  margin: 0 5px;
  background-color: #fff;
}

.carousel-control-prev,
.carousel-control-next {
  width: 15px;
  height: 15px;
  background-color: rgba(0, 0, 0, 0.5);
  border-radius: 50%;
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
  display: none;
}
.bg-gradient {
  background: linear-gradient(to right, #ff416c, #ff4b2b);
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
    <script>
$('.carousel').carousel({
  interval: 3000
});
        </script>
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
               ` <div class="ml-auto">
                <div class="dropdown">
                    @if(Session::has('customers'))
                    <button type="button" class="btn btn-success rounded-pill dropdown-toggle shadow-sm" data-toggle="dropdown">
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
            </div>`
</div>
        </nav>
    </div>
    <div class="container-fluid">
  <div class="row">
    <div class="col-md-12 bg-light" ></div>
  </div>
  <div class="row mt-5">
    <div class="col-md-8 mx-auto">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="height: 400px;">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner h-100">
          <div class="carousel-item active h-100">
            <img src="https://picsum.photos/600/300?random=1" class="d-block w-100 h-100" alt="Slide 1">
          </div>
          <div class="carousel-item h-100">
            <img src="https://picsum.photos/600/300?random=2" class="d-block w-100 h-100" alt="Slide 2">
          </div>
          <div class="carousel-item h-100">
            <img src="https://picsum.photos/600/300?random=3" class="d-block w-100 h-100" alt="Slide 3">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </div>
</div>
<div class="container mt-5 pb-5">
  <div class="row">
    <div class="col-md-6 offset-md-1">
      <h1>Welcome to My Website</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eget sapien vitae elit blandit pretium. Etiam malesuada sapien eget leo convallis, in vestibulum mauris porta. Aliquam sagittis, sem eu efficitur tempor, ipsum sapien pharetra nisl, ac dapibus neque sapien a elit.</p>
      <a href="{{url('/learn-more')}}" class="btn btn-primary">Learn More</a>
    </div>
    <div class="col-md-4 offset-md-1">
      <img src="https://picsum.photos/400/300" alt="Placeholder Image" class="img-fluid">
    </div>
  </div>
</div>>

    <!-- Bootstrap 4 JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>