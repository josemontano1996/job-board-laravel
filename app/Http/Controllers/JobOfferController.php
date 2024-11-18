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

        $jobs = JobOffer::query();


        $searchQuery = $request->get('search');
        $minSalary = $request->get('min_salary');
        $maxSalary = $request->get('max_salary');
        $experienceLevel = $request->get('experience');
        $jobCategory = $request->get('category');

        $jobs->when(
            $searchQuery,
            function ($query) use ($searchQuery) {
                $query->where(function ($query) use ($searchQuery) {
                    $query->where('title', 'like', '%' . $searchQuery . '%')
                        ->orWhere('description', 'like', '%' . $searchQuery . '%');
                });
            }
        );

        $jobs->when(
            $minSalary,
            function ($query) use ($minSalary) {
                $query->where('salary', '>=', $minSalary);
            }
        );

        $jobs->when(
            $maxSalary,
            function ($query) use ($maxSalary) {
                $query->where('salary', '<=', $maxSalary);
            }
        );

        $jobs->when(
            $experienceLevel,
            function ($query) use ($experienceLevel) {
                $query->where('experience', $experienceLevel);
            }
        );
        $jobs->when(
            $jobCategory,
            function ($query) use ($jobCategory) {
                $query->where('category', $jobCategory);
            }
        );

        return view('job.index', ['jobs' => $jobs->get()]);
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
        return view('job.show', ['job' => $job]);
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
