<?php

namespace App\Http\Controllers;

use App\Models\JobOffer;
use Illuminate\Http\Request;

class JobOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {



        $searchQuery = $request->get('search');
        $minSalary = $request->get('min_salary');
        $maxSalary = $request->get('max_salary');
        $experienceLevel = $request->get('experience');
        $jobCategory = $request->get('category');

        $jobs = JobOffer::with('employer')
            ->filterByTitleAndDescription($searchQuery)
            ->filterByEmployerName($searchQuery)
            ->filterByMinSalary($minSalary)
            ->filterByMaxSalary($maxSalary)
            ->filterByExperience($experienceLevel)
            ->filterByJobCategory($jobCategory)
            ->get();


        return view('job.index', ['jobs' => $jobs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(JobOffer $job)
    {
        return view('job.show', ['job' => $job->load('employer')]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobOffer $jobOffer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JobOffer $jobOffer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobOffer $jobOffer)
    {
        //
    }
}
