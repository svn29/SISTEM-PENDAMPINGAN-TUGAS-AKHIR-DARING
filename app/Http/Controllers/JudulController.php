<?php

namespace App\Http\Controllers;

use App\Models\Judul;
use App\Models\User;
use Illuminate\Http\Request;

class JudulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $juduls = Judul::all();

        return view('judul.index', compact('juduls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ppas = User::all();

        return view('judul.create', compact('ppas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Judul::create($request->all());

        return redirect()->route('judul.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $judul = Judul::find($id);

        return view('judul.show', compact('judul'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $judul = Judul::find($id);

        return view('judul.edit', compact('judul'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Judul::find($id)->update($request->all());

        return redirect()->route('judul.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Judul::find($id)->delete();

        return redirect()->back();
    }

    public function putValidasi(Request $request, $id)
    {
        Judul::find($id)->update([
            'status' => $request->status
        ]);

        return redirect()->back();
    }
}
