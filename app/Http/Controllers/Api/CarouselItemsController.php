<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarouselItemRequest;
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
    public function store(CarouselItemRequest $request)
    {

        $validated = $request->validated();

        $CarouselItem = CarouselItems::create($validated);

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
    public function update(CarouselItemRequest $request, string $id)
    {
        $validated = $request->validated();

        $CarouselItem = CarouselItems::findORFail($id);

        $CarouselItem->update($validated);

        return $CarouselItem;
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
