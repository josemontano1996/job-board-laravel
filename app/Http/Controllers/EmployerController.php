<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    use AuthorizesRequests;

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Employer::class);

        return view('employer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Employer::class);

        $validatedData = $request->validate([
            'company_name' => 'required|min:3|unique:employers,company_name'
        ]);

        auth()->user()->employer()->create([...$validatedData]);

        return redirect()->route('jobs.index')->with('success', 'Employer account created successfully.');
    }

}
