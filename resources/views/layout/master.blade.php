<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LaraCrud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
   
    <div class="bg-dark py-2">
      <h3 class="text-white text-center"><a href="{{ route('products.index') }}" class="text-white text-decoration-none">LaraCrud</a></h3>
    </div>
    <div class="container">
        @yield('content')
    </div>

    <div class="bg-dark py-2">
        <h6 class="text-white text-center">All rights Reserved {{ now()->year }} &copy; LaraCrud</h6>
    </div>
  </body>
</html>