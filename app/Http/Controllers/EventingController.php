<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Event;
use App\Models\Genre;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;



class EventingController extends Controller
{
    // ----------------------- show all event ---------------------
    public function index(Request $request){
        // dd($request);
        return view('Events.index',[
            // Filter if search field available
            'eventings' => Event::latest()->filter(request(['tag','search','typeA','typeG','start','end']))->paginate(20),
            'geners' => Genre::all(),   // show all geners
            'artists' => Artist::all(), // show all artists
            'venues' => Venue::all()    // show all venues
        ]);
    }

    // ----------------------- show one event ---------------------
    public function show(Event $event){
        return view('Events.showEvent',[
            'sevent' => $event,
            'geners' => Genre::all(),   // show all geners
            'artists' => Artist::all(), // show all artists
            'venues' => Venue::all()    // show all venues
        ]);
    }

    // ----------------------- create event ---------------------
    public function create(){
        return view('Events.createEvent',[
            'geners' => Genre::all(),   // show all geners
            'artists' => Artist::all(), // show all artists
            'venues' => Venue::all()    // show all venues
        ]);
    }

    // ----------------------- store event ---------------------
    public function store(Request $request){
        // dd(request()->all() );
        $formField = $request->validate([
            'artist_Name' => 'required',
            'gerne' => 'required',
            'shortDesc' => 'required',
            'amount' => 'required',
            'date' => 'required',
            'venue' => 'required'
        ]);
        if($request->hasFile('image')){
            $formField['image'] = $request->file('image')->store('image','public');
        }

        // Create New Event
        Event::create($formField);
        // Session::flash('message','Event Created');
        return redirect('/')->with('message','Event Created!');
    }

    // ----------------------- edit form ---------------------
    public function edit(Event $event){
        return view('Events.editEvent',[
            'eventings' => $event,
            'geners' => Genre::all(),   // show all geners
            'artists' => Artist::all(), // show all artists
            'venues' => Venue::all()    // show all venues
        ]);
    }

    // ----------------------- update event ---------------------
    public function update(Request $request, Event $event){
        $formField = $request->validate([
                'artist_Name' => 'required',
                'gerne' => 'required',
                'shortDesc' => 'required',
                'amount' => 'required',
                'date' => 'required',
                'venue' => 'required'
        ]);
        if($request->hasFile('image')){
            $formField['image'] = $request->file('image')->store('image','public');
        }
        
        // Update Event
        $event->update($formField);
        // Session::flash('message','Event Created');
        return back()->with('message','Event Updated!');
        }

    // --------------------- Delete Event ---------------------
    public function destroy(Event $event){
        $event->delete();
        return back()->with('message','Event Deleted!');
    }

}
