<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Books Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  </head>
  <body>
   <div class="bg-dark py-3">
    <h3 class ="text-white text-center">Books Management System</h3>
   </div>
   <div class ="container">
   <div class="row justify-content-center mt-3">
   
    <div class="col-md-10 d-flex justify-content-end mb-3">
        <a href="{{ route('books.create') }}" class="btn btn-dark">Insert Data</a>
    </div>
    @php
    $searchValue = request('search', ''); 
@endphp
    <div class="col-md-10">
        <form action="" class="d-flex flex-column">
            <div class="form-group col-md-6 p-0">
                <input type="search" name="search" id="search" class="form-control" placeholder="Search By Title Or Author Name" value="{{ $searchValue }}">
            </div>
            <div class="d-flex mt-2">
                <button type="submit" class="btn btn-primary mr-2" style="margin-right:10px;">Search</button>
                <a href="{{ url('/books') }}" class="btn btn-secondary">Reset</a>
                
            </div>
        </form>
    </div>
</div>


 

    <div class ="row d-flex justify-content-center">
        @if (Session::has('success'))
        <div class="col-md-10 mt-4">
        <div class="alert alert-success">
        {{ Session::get('success') }}
        </div>
         @endif
        </div>
        <div class="col-md-10">
         <div class="card border-0 shadow-lg my-4">
            <div class="card-header bg-dark">
                <h3 class="text-white">Books</h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Description</th>
                        <th>Published Date</th>
                        <th>Action</th>
                    </tr>
                    @if($books->isNotEmpty())
                    @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->id}}</td>
                        <td>{{ $book->title}}</td>
                        <td>{{ $book->author}}</td>
                        <td>{{ $book->description}}</td>
                        <td>{{ \Carbon\Carbon::parse($book->published_date)->format('d M, Y')}}</td>
                        <td>
                            <a href="{{route('books.edit',$book->id)}}" class="btn btn-dark">Edit</a>
                            <a href="#" onclick="deleteBook({{ $book->id }})" class="btn btn-danger">Delete</a>
                            <form id="delete-book-form-{{ $book->id }}" action="{{ route('books.destroy',$book->id) }}" method = "post">
                            @csrf
                            @method('delete')
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                  
                </table>
            </div>
         </div>
        </div>
    </div>
   </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>

<script>


    function deleteBook(id){
        if(confirm("Are you sure you want to delete the data?")){
            document.getElementById("delete-book-form-"+id).submit();
        }
    }


</script>