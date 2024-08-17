<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    
    public function index(Request $request){

        $search =$request['search'] ?? "";

        if($search != ""){
          $books = Book::where('title','LIKE',"%$search%")->orWhere('author','LIKE',"%$search%")->get();
         }
         else{
            $books = Book::orderBy('published_date')->get();
          
         }
            return view('books.list',[
            'books' => $books
            ]);
         
    }
   
    
    public function create(){
      return view('books.create');
    }
    
    
    public function store(Request $request){
        $rules = [
            'title' => 'required|min:3',
            'author' => 'required|min:3',
            'published_date' => 'required|date'
        ];
        

       
       $validator =  Validator::make($request->all(),$rules);

       if($validator->fails()){
        return redirect()->route('books.create')->withInput()->withErrors($validator);
       }

       
       $book = new Book();
       $book->title = $request->title; 
       $book->author = $request->author;
       $book->description = $request->description;
       $book->published_date = $request->published_date;
       $book->save();

      
       return redirect()->route('books.index')->with('success','Data added Successfully.'); 
    }

    
    public function edit($id){
    $book = Book::findOrFail($id);
     return view('books.edit',[
        'book' => $book
     ]);
    }
   
    
    public function update($id, Request $request){
        $book = Book::findOrFail($id);

        $rules = [
            'title' => 'required|min:3',
            'author' => 'required|min:3',
            'published_date' => 'required|date'
        ];
        

       

       $validator =  Validator::make($request->all(),$rules);

       if($validator->fails()){
        return redirect()->route('books.edit',$book->id)->withInput()->withErrors($validator);
       }

      
       $book = new Book();
       $book->title = $request->title; 
       $book->author = $request->author;
       $book->description = $request->description;
       $book->published_date = $request->published_date;
       $book->save();


     
       return redirect()->route('books.index')->with('success','Data updated Successfully.'); 
    }
 
    
    public function destroy($id){
      $book = Book::findOrFail($id);
      $book->delete();
      return redirect()->route('books.index')->with('success','Data deleted Successfully.');

    }

}
