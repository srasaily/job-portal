<?php

namespace App\Http\Controllers;

use App\Mail\JobVerify;
use Illuminate\Http\Request;
use App\Job;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    public function index()
    {
        $searchParam = request('search');
        if(!empty($searchParam)){
            $jobs = Job::where('is_verified', true)
                ->where('title', 'like', "%{$searchParam}%")
                ->orWhere('email', 'like', "%{$searchParam}%")
                ->latest()
                ->get();
        }
        else{
            $jobs = Job::latest()->where('is_verified', '=', true)->get();
        }
//dd($jobs);
        return view ('jobs.index', compact('jobs'));
    }
    public function create()
    {
        return view ('jobs.create');
    }

    public function store()
    {
//        dd(request()->all());
        $this->validate(request(), [
           'title' => 'required|min:3|max:100',
            'email' => 'required|email',
            'detail' => 'required'
        ]);
        $inputData = request()->all();
        $inputData['is_verified'] = false;
        $inputData['verification_token'] = str_random(30);
        Job::create($inputData);

        Mail::to($inputData['email'])->send(new JobVerify($inputData['verification_token']));

        flash('Job created successfully!')->success();
        return redirect()->route('jobs.index');
    }

    public function show(Job $job)
    {
        dd($job);
        return view ('jobs.show', compact('job'));
    }

    public function edit(Job $job)
    {
    return view ('jobs.edit', compact('job'));
    }

    public function update(Job $job)
    {
       // dd(request()->all());
        $job->update(request()->all());

        return redirect()->route('jobs.show', $job->id);
    }

    public function verify(string $token)
    {
       $job = Job::where('verification_token', '=', $token)->first();
       if(!$job){
           abort(404);
       }

        $job->update(['is_verified' => true,
            'verification_token' => '']);

        flash("Job verified successfully")->success();

        return redirect()->route('jobs.index');
    }
}
