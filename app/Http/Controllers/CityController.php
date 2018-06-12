<?php

namespace App\Http\Controllers;

use App\Hospital;
use App\Http\Requests\AddHospitalsToCityFormRequest;
use App\Http\Requests\CityFormRequest;
use App\Http\Requests\RemoveHospitalsFromCityFormRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\City;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();
        //dd($cities);
        return view('city.index')->with(compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('city.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityFormRequest $request)
    {
        try {
            $validated = $request->validated();
            $city = new City;

//            dd($validated);
//            dd($city);
//            $city->name=$validated["name"];
//            $city->country=$validated["country"];

            $city->fill($validated);


            $city->save();

            return redirect()->action('CityController@show', ['id' => $city->id]);
            //flash('Successfully saved entry to database')->success();
        } catch (QueryException $exception) {
            //flash('Saving entry to database failed!')->fail();
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $city = City::find($id);
        $hospitals = Hospital::pluck('name', 'id');
        //dd($city);
        return view('city.detail')->with('city', $city)->with('hospitals', $hospitals);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addHospitalsToCity(AddHospitalsToCityFormRequest $request)
    {
        $validated = $request->validated();
        $hospital = Hospital::find($validated['hospital_id']);
        //dd($hospital);
        $hospital->city_id=$validated['city_id'];
        //dd($hospital);
        $hospital->save();

//        DB::table('hospital')
//            ->where('id', $validated['hospital_id'])
//            ->update(['city_id' => $validated['city_id']]);

        return redirect()->action('CityController@show', ['id' => $validated['city_id']]);
    }

    public function removeHospitalsFromCity($id)
    {
        $hospital=Hospital::find($id);
        dd($hospital);
        $hospital->city_id=null;
        dd($hospital);
        $hospital->save();

        return redirect()->action('CityController@show', ['id' => $hospital->id]);
    }
}
