<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;

class MyJobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applications = auth()->user()->jobApplications()->with(['jobOffer' => fn($query) => $query->withCount('jobApplications')->withAvg('jobApplications', 'expected_salary'), 'jobOffer.employer'])->latest()->get();

        return view('my_job_application.index', ['applications' => $applications]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobApplication $myJobApplication)
    {
        $myJobApplication->delete();

        return redirect()->back()->with('success', 'Job application removed.');
    }
}
