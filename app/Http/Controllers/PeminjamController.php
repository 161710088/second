<?php

namespace App\Http\Controllers;

use App\peminjam;
use App\barang;
use App\User;
use Illuminate\Http\Request;

class PeminjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjam = peminjam::all();
        // dd($peminjam);
        return view('peminjam.index',compact('peminjam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        $barang = barang::all();
        return view('peminjam.create',compact('user','barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'user_id' => 'required|',
            'barang_id' => 'required|',
            'dipinjam' => 'required|'
        ]);
        $peminjam = new peminjam;
        $peminjam->dipinjam = $request->dipinjam;
        $peminjam->user_id = $request->user_id;
        $peminjam->barang_id = $request->barang_id;
        $peminjam->save();
        return redirect()->route('peminjam.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\peminjam  $peminjam
     * @return \Illuminate\Http\Response
     */
    public function show(peminjam $peminjam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\peminjam  $peminjam
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peminjam = peminjam::findOrFail($id);
        $user = user::all();
        $barang = barang::all();
        $selecteduser = peminjam::findOrFail($id)->user_id;
        $selectedbarang = peminjam::findOrFail($id)->barang_id;
        // dd($selected);
        return view('peminjam.edit',compact('peminjam','user','selecteduser','selectedbarang','barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\peminjam  $peminjam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
         $this->validate($request,[
            'user_id' => 'required|',
            'barang_id' => 'required|',
            'dipinjam' => 'required|'
        ]);
        $peminjam = peminjam::findOrFail($id);
        $peminjam->dipinjam = $request->dipinjam;
        $peminjam->user_id = $request->user_id;
        $peminjam->save();
        return redirect()->route('peminjam.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\peminjam  $peminjam
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peminjam = peminjam::findOrFail($id);
        $peminjam->delete();
        return redirect()->route('peminjam.index');
    }
}
