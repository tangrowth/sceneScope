<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Date;
use App\Models\Performance;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reservation.thanks');
    }

    public function create(Request $request)
    {
        $data =array(
            'number' => $request['number'],
            'date' => Date::where('id', $request->date_id)->first(),
            'performance' =>Performance::where('id', $request->performance_id)->first(),
        );
        $inputs = $request->all();
        return view('reservation.confirm', ['data' => $data, 'inputs' => $inputs]);
    }

    public function store(Request $request)
    {
        $user_id = Auth::id();
        $form = [
            'user_id' => $user_id, 
            'performance_id' => $request->input('performance_id'),
            'date_id' => $request->input('date_id'),
            'number' => $request->input('number'),
        ];
        $action = $request->input('action');
        if ($action !== '申込みを確定する') {
            return redirect()
            ->route('performance', ['id' => $form['performance_id']]);
        } else {
            Reservation::create($form);
            return redirect()->route('reserve.thanks');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}