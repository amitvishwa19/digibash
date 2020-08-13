<?php

namespace App\Http\Controllers\Admin;

use App\Models\Media;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return Media::orderby('created_at','desc')->get();
        return view('admin.pages.media.media');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $media = Media::orderby('created_at','desc')->get();
        return request()->json(200,$media);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('file');
        $image_name = time().'_'.$image->getClientOriginalName();
        $image->storeAs('uploads', $image_name, 'public');

        $media = new Media();
        $media->user_id = auth()->user()->id;
        $media->filename = $image_name;
        $media->url = url('public/storage/uploads/' . $image_name);
        $media->type = $image->getMimeType();
        $media->extention = $image->getClientOriginalExtension();
        $media->public = true;
        $media->save();



        //$url = uploadImage($image);
        //return $url;
        return request()->json(200,'wola');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //return $id;
        $media = Media::find($id);
        $is_deleted = $media->delete();
        if($is_deleted){
            $media = Media::orderby('created_at','desc')->get();
            return request()->json(200,$media);
        }
    }
}
