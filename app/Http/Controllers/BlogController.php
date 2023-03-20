<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $blogs = Blog::get(); //Select * FROM users, guna model User untuk access database
        
        return view('blogs.blog',//tambah return untuk display data 
        compact('blogs'), //send data daripada declare ($) kepada index.blade (compact), mesti sama nama dengan $
    ); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() //create =method 
    {
        //
        //$blogs = Blog::get(); //Select * FROM users, guna model User untuk access database
      
        return view('blogs.create');//tambah return untuk display data 
        //compact('blogs'), //send data daripada declare ($) kepada index.blade (compact), mesti sama nama dengan $
    //); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate input
        $validator = Validator::make($request->all(),[
            "title" =>"required|string",
            "description" =>"required|string",

        ]);
        //Insert data to database. no need view sebab ianya process
        Blog::create($validator->validate());
            // "title" =>$request->title,
            // "description" =>$request->description, //kiri:nama database, kanan:nama input in UI
        //]);

        //Redirect back to list of blog page
        return redirect()->route('blogs');
    } 

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) //get id from URL
    {
        //SELECT * FROM TABLE blogs WHERE id=12
        $blog = Blog::find($id);
        return view('blogs.edit',
        compact ("blog"),
);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $blog = Blog::find($id);
        //Insert data to database. no need view sebab ianya process
        //Insert data to database. no need view sebab ianya process
        $blog->update([
        "title" =>$request->title,
        "description" =>$request->description, //kiri:nama database, kanan:nama input in UI
        ]);
        return redirect()->route('blogs');
    }

    function delete($id)
    {
        $blog = Blog::find($id);

        $blog->delete();

        return redirect()->route('blogs');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }


}
