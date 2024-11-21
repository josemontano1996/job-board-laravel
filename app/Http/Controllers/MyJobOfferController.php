<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobOfferRequest;
use App\Models\JobOffer;
use Illuminate\Http\Request;

class MyJobOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobsOffers = auth()->user()->employer->jobOffers()->with('employer', 'jobApplications', 'jobApplications.user')->latest()->get();

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
    public function store(JobOfferRequest $request)
    {

        auth()->user()->employer->jobOffers()->create($request->validated());

        return redirect()->route('my-job-offers.index')->with('success', 'Job offer created succesfully.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobOffer $myJobOffer)
    {
        return view('my_job_offer.edit', ['jobOffer' => $myJobOffer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobOfferRequest $request, JobOffer $myJobOffer)
    {
        $myJobOffer->update($request->validated());

        return redirect()->route('my-job-offers.index')->with('success', 'Job updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
