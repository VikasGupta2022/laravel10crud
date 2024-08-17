<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Books Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
   <div class="bg-dark py-3">
    <h3 class ="text-white text-center">Books Management System</h3>
   </div>
   <div class ="container">
   <div class="row justify-content-center mt-4">
        <div class="col-md-10 d-flex justify-content-end">
           <a href="{{ route('books.index') }}" class="btn btn-dark">Back</a>
        </div>
    </div>
    <div class ="row d-flex justify-content-center">
        <div class="col-md-10">
         <div class="card border-0 shadow-lg my-4">
            <div class="card-header bg-dark">
                <h3 class="text-white">Insert Data</h3>
            </div>
            <form enctype="multipart/form-data" action="{{ route('books.update',$book->id) }}" method="post">
                @method('put')
                @csrf
             <div class="card-body">
                <div class="mb-3">
                    <label for="" class="form-label h5">Title</label>
                    <input value="{{old('title', $book->title)}}" type="text" class="@error('title') is-invalid @enderror form-control form-control-lg" placeholder="Title" name="title">
                    @error('title')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class=" form-label h5">Author</label>
                    <input value="{{ old('author',$book->author) }}" type="text" class=" @error('author') is-invalid @enderror form-control form-control-lg" placeholder="Author Name" name="author">
                    @error('author')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label h5">Description</label>
                   <textarea placeholder="description" class="form-control"  name="description"  cols="30" rows="5">{{old('description',$book->description)}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="" class=" form-label h5">Published Date</label>
                    <input value="{{ old('published_date',$book->published_date) }}" type="text" class=" @error('published_date') is-invalid @enderror form-control form-control-lg" placeholder="Publieshed Date" name="published_date">
                    @error('published_date')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                   <div class="d-grid">
                  <button class="btn btn-lg btn-primary">Update</button>
                </div>
                <div>
                </div>
             </div>
             </form>
         </div>
        </div>
    </div>
   </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>