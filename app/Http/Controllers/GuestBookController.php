<?php

namespace App\Http\Controllers;

use App\Models\GuestBook;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GuestBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.guestbook.index', [
            'models' => GuestBook::latest()->take(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.guestbook.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'city' => 'required',
            'message' => 'required',
        ]);

        $requestData['posted'] = Carbon::now()->format('Y-m-d');

        GuestBook::create($requestData);

        return redirect()->route('home')->with('success', 'Data berhasil  ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $guestbook = GuestBook::findOrFail($request->get('id'));
        return response()->json([
            'status' => 200,
            'guestbook' => $guestbook
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        // Cek apakah data berdasarkan ID ada dalam database
        $guestbook = Guestbook::find($request->id);

        if ($guestbook) {
            // Data ditemukan, lakukan update
            $guestbook->name = $request->name;
            $guestbook->email = $request->email;
            $guestbook->address = $request->address;
            $guestbook->city = $request->city;
            $guestbook->message = $request->message;
            $guestbook->save();

            return redirect()->route('home')->with('success', 'Data berhasil diupdate');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GuestBook $guest_book)
    {
        $guest_book->delete();
        return back();
    }
}
