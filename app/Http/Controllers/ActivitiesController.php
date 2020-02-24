<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class ActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::latest()->paginate(5);

        return view('activities.index',compact('activities'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        return view('activities.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'activity_name' => 'required',
            'activity_delivery_estimated' => 'required',
            'activity_cost' => 'required',
            'customer_id' => 'required'
        ]);

        Activity::create($request->all());

        return redirect()->route('activities.index')->with('success','Activity created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        return view('activities.show',compact('activity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        $customers = Customer::all();
        return view('activities.edit',compact('activity', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity)
    {
        $request->validate([
            'activity_name' => 'required',
        ]);

        if($request['activity_finish'] === 'on') {
            $request['activity_finish'] =  date('Y-m-d');
        }
        $activity->update($request->all());

        return redirect()->route('activities.index')->with('success','Activity updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        $activity->delete();
        return redirect()->route('activities.index')->with('success','Activity deleted successfully');
    }
}
