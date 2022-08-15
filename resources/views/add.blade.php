<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Add</title>
  </head>
  <body>
    <div class="container" style="margin-top:20px">
        <div class="row">
            <div class="col-md-12">
                <h2>Add new product</h2>
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>
                @endif
                <form action="{{url('save')}}" method="POST">
                    @csrf
                    <div class="md-3">
                        <label for="id" class="form-label">ID</label>
                        <input type="text" name="id" class="form-control" placeholder="Enter a product id">
                        @error('id')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="md-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter a product name">
                        @error('name')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="md-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" name="price" class="form-control" placeholder="Enter a product price">
                        @error('price')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="md-3">
                        <label for="details" class="form-label">Details</label>
                        <textarea name="details" rows="5" class="form-control" placeholder="Enter product details"></textarea>
                        @error('details')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="md-3">
                        <label for="image1" class="form-label">Image1</label>
                        <input type="file" name="image1" class="form-control" placeholder="Select a product image">
                        @error('image1')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="md-3">
                        <label for="artist" class="form-label">Artist</label>
                        <select name= "artist" class="form-control">
                            @foreach($data as $prd)
                            <option value="{{$prd->artistID}}">{{$prd->artistName}}</option>
                            @endforeach
                        </select>
                        <!--<input type="text" name="producer" class="form-control" placeholder="Enter a producer id">-->
                        @error('artist')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div> <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{url('table')}}" class="btn btn-success">Back</a>
                </form>
            </div>
        </div>
    </div>
  </body>
</html>