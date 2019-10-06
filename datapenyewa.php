<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modeldatapenyewa;
use validator;

class datapenyewa extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Modeldatapenyewa::all();
        //return view('datapenyewa', compact('data'));
        return view('datapenyewa', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('datapenyewa_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required',
            'nohp' => 'required',
            'alamat' => 'required',
        ]);

        $data = new Modeldatapenyewa();
        $data->nama = $request->nama;
        $data->email = $request->email;
        $data->nohp = $request->nohp;
        $data->alamat = $request->alamat;
        $data->save();

        return redirect()->route('datapenyewa.index')->with('alert_message','berhasil menambah data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = Modeldatapenyewa::where('id', $id)->get();
        return view('datapenyewa_edit', compact('data'));
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
        //
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required',
            'nohp' => 'required',
            'alamat' => 'required',
        ]);

        $data = Modeldatapenyewa::where('id',$id)->first();
        $data->nama = $request->nama;
        $data->email = $request->email;
        $data->nohp = $request->nohp;
        $data->alamat = $request->alamat;
        $data->save();

        return redirect()->route('datapenyewa.index')->with('alert_message','berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = Modeldatapenyewa::where('id', $id)->first();
        $data->delete();

        return redirect()->route('datapenyewa.index')->with('alert_message', "Berhasil Menghapus data1");
    }
}
