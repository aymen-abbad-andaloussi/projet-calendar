<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Calendar::all();
        return view('management',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $events = Calendar::all();
        $events = $events->map(function ($event) {
            return [
                "id" => $event->id,
                "owner" => $event->user_id,
                "start" => $event->start,
                "end" => $event->end,
                "backgroundColor" =>  'black',
            ];
        });
        return response()->json([
            "events" => $events
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "start" => "required",
            "end" => "required"
        ]);


        Calendar::create([
            "start" => $request->start,
            "end" => $request->end,
            "user_id" => Auth::user()->id

        ]);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Calendar $calendar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Calendar $calendar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Calendar $calendar)
    {
        $calendar->update([
            "start" => $request->updateStart,
            "end" => $request->updateEnd
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Calendar $calendar)
    {
        $calendar->delete();
        return back();
    }
}
