<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Photo;

class PhotoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // we will create index function
        // we need to show all data from "photo" table
        $photos = Photo::all();
        // show data to our view
        return view('photo.index',['photos' => $photos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('photo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // we will create validation function here
        $this->validate($request,[
            'title'=> 'required',
            'description' => 'required',
        ]);

        $photo = new Photo;
        $photo->title = $request->title;
        $photo->description = $request->description;
        $photo->photo_file_id = $request->photo_file_id;
        $photo->owner_id=$request->user()->id;
        // save all data
        $photo->save();
        //redirect page after save data
        return redirect('photos')->with('message','data has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $photo = Photo::find($id);
        
        // return to 404 page
        if(!$photo){
          abort(404);
        }
        
        // display the article to single page
        return view('photo.detail')->with('photo',$photo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $photo = Photo::find($id);
        
        // return to 404 page
        if(!$photo){
          abort(404);
        }

        return view('photo.edit')->with('photo',$photo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // we will create validation function here
        $this->validate($request,[
            'title'=> 'required',
            'description' => 'required',
        ]);

        $photo = Photo::find($id);
        $photo->title = $request->title;
        $photo->description = $request->description;
        $photo->photo_file_id = $request->photo_file_id;
        $photo->owner_id=$request->user()->id;
        // save all data
        $photo->save();
        //redirect page after save data
        return redirect('photos')->with('message','data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        die('delete me plllleeeesse');
    }
}
