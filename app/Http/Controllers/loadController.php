<?php

namespace App\Http\Controllers;
use App\Load;
use Illuminate\Http\Request;

class loadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loads= Load::all();
        return view('loads.index')->with('loads', $loads);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view ('loads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'originCity'=> 'required',
        'originState'=> 'required',
        'destinationCity'=> 'required',
        'destinationState'=> 'required'
      ]);

      $load = new Load;
      $load->originCity= $request->input('originCity');
      $load->originState = $request->input('originState');
      $load->destinationCity= $request->input('destinationCity');
      $load->destinationState = $request->input('destinationState');
      $load->distance= $request->input('distance');
      $load->pickupDate = $request->input('pickupDate');
      $load->type = $request->input('type');
      $load->rate = $request->input('rate');
      $load->weight = $request->input('weight');
      $load->save();

      return redirect('/loads')->with('success', 'Load Posted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $load= Load::find($id);
      return view('loads.show')->with('load', $load);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $load= Load::find($id);
      return view('loads.edit')->with('load', $load);
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
      $this->validate($request, [
        'originCity'=> 'required',
        'originState'=> 'required',
        'destinationCity'=> 'required',
        'destinationState'=> 'required'
      ]);

      $load= Load::find($id);
      $load->originCity= $request->input('originCity');
      $load->originState = $request->input('originState');
      $load->destinationCity= $request->input('destinationCity');
      $load->destinationState = $request->input('destinationState');
      $load->distance= $request->input('distance');
      $load->pickupDate = $request->input('pickupDate');
      $load->save();

      return redirect('/loads')->with('success', 'Load Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $load = Load::find($id);
      $load->delete();
      return redirect('/loads')->with('success', 'Load Removed');
    }
}
