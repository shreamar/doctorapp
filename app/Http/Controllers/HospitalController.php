<?php

namespace App\Http\Controllers;

use App\City;
use App\Doctor;
use App\Hospital;
use App\Http\Requests\HospitalFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hospitals = Hospital::all();
        //dd($hospitals);
        return view('hospital.index')->with('hospitals', $hospitals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::pluck('name', 'id');
        //dd($cities);
        return view('hospital.create')->with('cities', $cities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(HospitalFormRequest $request)
    {
        try {
            $validated = $request->validated();
            $hospital = new Hospital;

            $hospital->fill($validated);
            $hospital->save();

            return redirect()->action('HospitalController@show', ['id' => $hospital->id]);
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
        $hospital = Hospital::find($id);
        $doctors = Doctor::all();//->hospitals()->wherePivot('hospital_id','<>',$id);
        //dd($hospital);
        return view('hospital.detail')->with('hospital', $hospital)->with('doctors', $doctors);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hospital=Hospital::find($id);
        $cities = City::pluck('name','id');
        return view('hospital.edit')->with('hospital',$hospital)->with('cities',$cities);
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
        $validated=$request->validate([
            'name'=>'required',
            'city_id'=>'nullable',
        ]);

        $hospital=Hospital::find($id);
        $hospital->fill($validated);

        $hospital->save();

        return redirect()->action('HospitalController@show', ['id' => $hospital->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hospital=Hospital::find($id);
        $hospital->delete();

        return redirect()->action('HospitalController@index');
    }

    public function addDoctorsToHospital(Request $request)
    {
        $validated = $request->validate([
            'doctor_id' => 'required',
            'hospital_id' => 'required',
        ]);

//        DB::table('doctor_hospital')->insert([
//            'doctor_id' => $validated['doctor_id'],
//            'hospital_id' => $validated['hospital_id'],
//        ]);
        $doctor=Doctor::find($validated['doctor_id']);
        $doctor->hospitals()->attach($validated['hospital_id']);

        return redirect()->action('HospitalController@show', ['id' => $validated['hospital_id']]);
    }

    public function removeDoctorsFromHospital(Request $request)
    {
        $validated = $request->validate([
            'doctor_id' => 'required',
            'hospital_id' => 'required',
        ]);

//        $id=Doctor::find($validated['doctor_id'])->pivot->wherePivot('hospital_id','=',$validated['hospital_id'])->id;
//        dd($id);

//        DB::table('doctor_hospital')->where('doctor_id', '=', $validated['doctor_id'])->where('hospital_id', '=', $validated['hospital_id'])->update(['deleted_at' => Carbon::now()]);

        $doctor=Doctor::find($validated['doctor_id']);
        $doctor->hospitals()->detach($validated['hospital_id']);

        return redirect()->action('HospitalController@show', ['id' => $validated['hospital_id']]);
    }
}
