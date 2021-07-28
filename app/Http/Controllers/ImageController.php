<?php

namespace App\Http\Controllers;

use App\Image;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::latest()->paginate(5);
        return view('index',compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['image'] = $this->verifyAndUpload($request, 'image', 'images');
        Image::create($input);
        return redirect('image/')
            ->with('success','record created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $images = Image::find($id);
        return view('edit',compact('images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Image $image)
    {
        $old_image = $request->old_image;
        $input = $request->all();
        $input['image'] = $this->verifyAndUpload($request, 'image', 'images');
        Storage::disk('public')->delete($old_image);
        $image->update($input);
        return redirect('image/')
            ->with('success','record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::find($id);
        $delete_img = $image->image;
        Storage::disk('public')->delete($delete_img);
        $image->delete();
        return redirect('image/')->with('success','Image deleted successfully');
    }
}
