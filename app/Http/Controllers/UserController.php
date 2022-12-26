<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Genre;
use App\Models\Artist;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // ----------------------- Admin Log Page -----------------------
    public function adminLog()
    {
        return view('Users.adminLog');
    }

    // ----------------------- Manage event Page -----------------------
    public function manage()
    {
        return view('Users.manageEvent', [
            'eventings' => Event::all(),
            'geners' => Genre::all(),
            'artists' => Artist::all(),
            'venues' => Venue::all()
        ]);
    }

    // ----------------------- check login Credentials and logged in -----------------------
    public function adminAuth(Request $request)
    {
        // dd($request->email);
        // ddd($request);
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'You are now logged in!');
        }

        // Credentials Failed
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    // ----------------------- store genre -----------------------
    public function create_g(Request $request)
    {
        $formField = $request->validate([
            'name' => 'required',
        ]);

        Genre::create($formField);

        // Session::flash('message','Event Created');
        return back()->with('message', 'Genre Created!');
    }

    // ----------------------- store venue -----------------------
    public function create_v(Request $request)
    {
        $formField = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'contact' => 'required',
        ]);

        Venue::create($formField);

        // Session::flash('message','Event Created');
        return back()->with('message', 'Venue Created!');
    }

    // ----------------------- store artist -----------------------
    public function create_a(Request $request)
    {
        $formField = $request->validate([
            'name' => 'required',
        ]);

        Artist::create($formField);

        // Session::flash('message','Event Created');
        return back()->with('message', 'Artist Created!');
    }

    // ----------------------- update Genre -----------------------
    public function update_g(Request $request, Genre $g)
    {
        $formField = $request->validate([
            'name' => 'required',
        ]);
        $g_id = $request->id;
        $g->where('id', $g_id)->update($formField);

        // Session::flash('message','Event Created');
        return back()->with('message', 'Genre Updated!');
    }

    // ----------------------- delete Genre -----------------------
    public function destroy_g(Request $request, Genre $g)
    {
        $g_id = $request->id;
        $g->where('id', $g_id)->delete();
        return back()->with('message', 'Genre Deleted!');
    }

    // ----------------------- update Artist -----------------------
    public function update_a(Request $request, Artist $a)
    {
        $formField = $request->validate([
            'name' => 'required',
        ]);
        $a_id = $request->id;
        $a->where('id', $a_id)->update($formField);

        // Session::flash('message','Event Created');
        return back()->with('message', 'Artist Updated!');
    }

    // ----------------------- delete Artist -----------------------
    public function destroy_a(Request $request, Artist $a)
    {
        $a_id = $request->id;
        $a->where('id', $a_id)->delete();
        return back()->with('message', 'Artist Deleted!');
    }

    // ----------------------- update Venue -----------------------
    public function update_v(Request $request, Venue $v)
    {
        $formField = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'contact' => 'required',
        ]);
        $v_id = $request->id;
        $v->where('id', $v_id)->update($formField);

        // Session::flash('message','Event Created');
        return back()->with('message', 'Artist Updated!');
    }

    // ----------------------- delete Venue -----------------------
    public function destroy_v(Request $request, Venue $v)
    {
        $v_id = $request->id;
        $v->where('id', $v_id)->delete();
        return back()->with('message', 'Venue Deleted!');
    }

    // ----------------------- logout -----------------------
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'See you again!');
    }
}
