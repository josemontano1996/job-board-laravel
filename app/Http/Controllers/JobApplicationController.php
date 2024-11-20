<?php

namespace App\Http\Controllers;

use App\Models\JobOffer;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    use AuthorizesRequests;
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, JobOffer $job)
    {
        $this->authorize('apply', $job);

        /*  if ($request->user()->cannot('apply', $job)) {
             abort(403);
         } */
        return view('job_application.create', ['job' => $job]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobOffer $job, Request $request)
    {
        $job->jobApplications()->create([
            'user_id' => $request->user()->id,
            ...$request->validate([
                'expected_salary' => 'required|min:1|max:1000000'
            ])
        ]);

        return redirect()->route('jobs.show', $job)->with('success', 'Job application submitted.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
