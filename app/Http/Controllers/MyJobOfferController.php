<?php

namespace App\Http\Controllers;

use App\Models\JobOffer;
use Illuminate\Http\Request;

class MyJobOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobsOffers = auth()->user()->employer->jobOffers()->latest()->get();

        return view('my_job_offer.index', ['jobOffers' => $jobsOffers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('my_job_offer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'salary' => 'required|numeric|min:20000',
            'description' => 'required|string',
            'experience' => 'required|in:' . implode(',', JobOffer::$experience),
            'category' => 'required|in:' . implode(',', JobOffer::$category)
        ]);

        auth()->user()->employer->jobOffers()->create($validatedData);

        return redirect()->route('my-job-offers.index')->with('success', 'Job offer created succesfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
