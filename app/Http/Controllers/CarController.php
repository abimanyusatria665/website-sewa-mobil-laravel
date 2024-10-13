<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Car::all();
        return view('product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validate the incoming request data
            $data = $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'name' => 'required|string|max:255',
                'price' => 'required|numeric|min:0'
            ]);
            // Handle the image upload
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            // Create a new car record using validated data
            $car = Car::create([
                'image' => $imageName,
                'name' => $request->name,
                'price' => $request->price
            ]);

            // Redirect with a success message
            return redirect('/car')->with('success', 'Car added successfully.');
        } catch (\Throwable $th) {
            // Optionally log the error
            Log::error('Car creation failed: ' . $th->getMessage());

            // Redirect back with a failure message
            return back()->with('fail', $th->getMessage());
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car, $id)
    {
        $data = Car::where('id', $id)->first();
        return view('product.update', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car, $id)
    {
        try {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'name' => 'required',
                'price' => 'required'
            ]);

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            Car::where('id', $id)->update([
                'image' => $imageName,
                'name' => $request->name,
                'price' => $request->price
            ]);

            return redirect('/car')->with('success', "Success");
        } catch (\Throwable $th) {
            return back()->with('fail', $th->getMessage());
            //throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car, $id)
    {
        Car::where('id', $id)->delete();
        return back()->with('success', 'Success');
    }
}
