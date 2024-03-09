<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CarouselItems;
use Illuminate\Http\Request;

class CarouselItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CarouselItems::all();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $CarouselItem = CarouselItems::create([
            'carousel_name'     => $request->carousel_name,
            'image_path'        => $request->image_path,
            'description'       => $request->description,
            'user_id'           => $request->user_id,
        ]);

        return $CarouselItem;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return CarouselItems::find($id);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $CarouselItem = CarouselItems::findORFail($id);

        $CarouselItem->delete();

        return $CarouselItem;
    }
}
