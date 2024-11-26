<?php

namespace App\Http\Controllers;

use App\Models\JobOffer;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class JobOfferController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $this->authorize('viewAny', JobOffer::class);

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
            ->latest()
            ->get();


        return view('job.index', ['jobs' => $jobs]);
    }

    /**
     * Display the specified resource.
     */
    public function show(JobOffer $job)
    {
        $this->authorize('view', $job);
        return view('job.show', ['job' => $job->load('employer.jobOffers')]);
    }

}
