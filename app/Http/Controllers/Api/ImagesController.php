<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\images;
use App\Models\imageslist;
use Illuminate\Http\Request;

class ImagesController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = images::all();
        return $this->sendResponse($images, 'User register successfully.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $model = new images;
        $modelImages = new imageslist;
        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        $model->user_id = $request->user_id;
        $model->name = $request->name;
        $model->url = $imageName;
        $model->description = $request->description;
        $model->save();
        $id = $model->id;

        $modelImages->image_id = $id;
        $modelImages->url = $imageName;
        $modelImages->save();

        return $this->sendResponse([$id], 'User register successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\images  $images
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $image = images::find($id);
        return $this->sendResponse($image, 'User register successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\images  $images
     * @return \Illuminate\Http\Response
     */
    public function edit(images $images)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\images  $images
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $images = images::find($id);
        $modelImages = new imageslist;
        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        
        $images->name = $request->name;
        $images->url = $imageName;
        $images->description = $request->description;
        $images->save();
        

        $modelImages->image_id = $images->id;
        $modelImages->url = $imageName;
        $modelImages->save();
        return $this->sendResponse($images->id, 'User register successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\images  $images
     * @return \Illuminate\Http\Response
     */
    public function destroy(images $images)
    {
        //
    }
}
