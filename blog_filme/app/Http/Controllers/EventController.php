<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

class EventController extends Controller
{
    public function index(){  
        $events = Event::all();
        return view('home', ['events' => $events]);
    }

    public function create(){  
        return view('events.create');
    }

    public function store(Request $request){
        $event = new Event;

        $event->title = $request->title;
        $event->description = $request->description;

        //upload image
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('images/events'), $imageName);
            $event->image = $imageName;

        }
        
        $user = auth()->user();
        $event->user_id = $user->id;




        $event->save();

        return redirect('/')->with('msg', 'Avaliação realizada com sucesso!');

    }

    public function show($id){
        $event = Event::findOrFail($id);

        $eventOwner = User::where('id', $event->user_id)->first()->toArray();

        return view('events.show', ['event' => $event, 'eventOwner' => $eventOwner]);
    }

    public function dashboard(){
        $user = auth()->user();

        $events = $user->events;

        return view('events.dashboard', ['events' => $events]);

    }

    public function destroy($id){

        Event::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Critica deletada com sucesso!');
    }

    public function edit($id){

        $event = Event::findOrFail($id);

        return view('events.edit', ['event' => $event]);

    }

    public function update(Request $request){
        $data = $request->all();
        
        //upload image
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('images/events'), $imageName);
            $data['image']->image = $imageName;

        }
        Event::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg', 'Critica editada com sucesso!');

    }
}
