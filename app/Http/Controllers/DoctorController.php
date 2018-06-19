<?php

namespace App\Http\Controllers;

use App\Hospital;
use App\Http\Requests\DoctorFormRequest;
use Illuminate\Http\Request;
use App\Doctor;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::all();
        $hospitals = Hospital::all();
        //dd($doctors);
        return view('doctor.index')->with('doctors', $doctors)->with('hospitals', $hospitals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(DoctorFormRequest $request)
    {
        try {
            $validated = $request->validated();
            $doctor = new Doctor;

            $doctor->fill($validated);
            $doctor->save();

            return redirect()->action('DoctorController@show', ['id' => $doctor->id]);
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
        $doctor = Doctor::find($id);
        $hospitals = Hospital::whereDoesntHave('doctors', function ($query) use($id){
            $query->where('doctor_id',$id);
        })->get();
        //dd($hospitals);
        return view('doctor.detail')->with('doctor', $doctor)->with('hospitals', $hospitals);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctor=Doctor::find($id);
        return view('doctor.edit')->with('doctor',$doctor);
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
        $validated = $request->validate([
            'firstName'=>'required',
            'lastName'=>'required',
            'age'=>'nullable',
            'gender'=>'nullable',
        ]);

        $doctor=Doctor::find($id);
        $doctor->fill($validated);

        $doctor->save();

        return redirect()->action('DoctorController@show', ['id' => $doctor->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor=Doctor::find($id);
        $doctor->delete();

        return redirect()->action('DoctorController@index');
    }

    public function addHospitalsToDoctor(Request $request)
    {
        $validated = $request->validate([
            'doctor_id' => 'required',
            'hospital_id' => 'required',
        ]);

        $hospital = Hospital::find($validated['hospital_id']);
        $hospital->doctors()->attach($validated['doctor_id']);

        return redirect()->action('DoctorController@show', ['id' => $validated['doctor_id']]);
    }

    public function removeHospitalsFromDoctor(Request $request)
    {
        $validated = $request->validate([
            'doctor_id' => 'required',
            'hospital_id' => 'required',
        ]);

        $hospital = Hospital::find($validated['hospital_id']);
        $hospital->doctors()->detach($validated['doctor_id']);

        return redirect()->action('DoctorController@show', ['id' => $validated['doctor_id']]);

    }
}
