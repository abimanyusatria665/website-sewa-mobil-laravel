<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Rent;
use App\Models\RentDetails;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentController extends Controller
{
    public function home()
    {
        $data = Car::all();
        return view('index', compact('data'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [];
        if (Auth::user()->role == "admin") {
            $data = Rent::with('rentDetails', 'rentDetails.car')->get();
        } else {
            $data = Rent::with('rentDetails', 'rentDetails.car')->where('user_id', Auth::user()->id)->get();
        }

        foreach ($data as $rent) {
            foreach ($rent->rentDetails as $detail) {
                if ($detail->status == 0) {
                    $totalPrice = 0;
                    $shouldBeReturned = new Carbon($detail->should_be_returned);

                    $hoursLate = $shouldBeReturned->diffInHours(Carbon::now(), false);
                    if ($hoursLate >= 0) {
                        $detail->penalty = $hoursLate * 10000;
                        $detail->save();
                    }

                    $totalPrice += $detail->sub_total + $detail->penalty;
                    $totalTime = $hoursLate >= 0 ? $rent->created_at->diffInHours($shouldBeReturned) + $hoursLate : $rent->created_at->diffInHours($shouldBeReturned);

                    $rent = Rent::where('id', $rent->id)->update([
                        'total_price' => $totalPrice,
                        'total_time' => $totalTime
                    ]);
                }
            }

        }
        return view('rent.index', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $car = Car::all();
        return view('rent.rent', compact('car'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $car = Car::where('id', $request->car)->first();
        $sub_total = $car->price * $request->total_days;
        $rent = Rent::create([
            'user_id' => Auth::User()->id,
            'total_price' => $sub_total,
            'total_time' => $request->total_days
        ]);
        $should_be_returned = Carbon::now()->addDays($request->total_days);
        $rent_details = RentDetails::create([
            'rent_id' => $rent->id,
            'car_id' => $car->id,
            'sub_total' => $sub_total,
            'should_be_returned' => $should_be_returned
        ]);

        return redirect('/rent/data')->with('success', "Success");
    }

    /**
     * Display the specified resource.
     */
    public function show(Rent $rent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rent $rent)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rent $rent, $id)
    {
        RentDetails::where('rent_id', $id)->update([
            'status' => 1
        ]);
        return back()->with('success', "Successfully Return The Rent");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rent $rent)
    {
        //
    }
}
