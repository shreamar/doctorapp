<?php

namespace App\Http\Controllers;

use App\City;
use App\Hospital;
use App\Http\Requests\HospitalFormRequest;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hospitals=Hospital::all();
        //dd($hospitals);
        return view('hospital.index')->with('hospitals',$hospitals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::pluck('name','id');
        //dd($cities);
        return view('hospital.create')->with('cities',$cities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HospitalFormRequest $request)
    {
        try{
            $validated=$request->validated();
            $hospital = new Hospital;

            $hospital->fill($validated);
            $hospital->save();

            return redirect()->action('HospitalController@show', ['id' => $hospital->id]);
            //flash('Successfully saved entry to database')->success();
        }
        catch (QueryException $exception){
            //flash('Saving entry to database failed!')->fail();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hospital=Hospital::find($id);
        //dd($hospital);
        return view('hospital.detail')->with('hospital',$hospital);
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
    }
}
