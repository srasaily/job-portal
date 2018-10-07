<?php

namespace App\Http\Controllers;

use App\JobSkill;
use App\Mail\JobVerify;
use App\Job;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    /**
     * Displays the list of jobs.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $searchParam = request('search');

        if (!empty($searchParam)) {
            $jobs = Job::where('is_verified', true)
                ->where('title', 'like', "%{$searchParam}%")
                ->orWhere('email', 'like', "%{$searchParam}%")
                ->latest()
                ->get();
        } else {
            $jobs = Job::latest()->where('is_verified', '=', true)->get();
        }

        return view('jobs.index', compact('jobs'));
    }

    /**
     * Displays the form for creating the job.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $skills         = JobSkill::pluck('name', 'id');
        $selectedSkills = [];

        return view('jobs.create', compact('skills', 'selectedSkills'));
    }

    /**
     * Stores the job in database.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $this->validate(request(), [
            'title'  => 'required|min:3|max:100',
            'email'  => 'required|email',
            'detail' => 'required',
        ]);
        $inputData                       = request()->all();
        $inputData['is_verified']        = false;
        $inputData['verification_token'] = str_random(30);
        $job                             = Job::create($inputData);
        $job->jobSkills()->attach($inputData['skills']);

        Mail::to($inputData['email'])->send(new JobVerify($inputData['verification_token']));

        flash('Job created successfully!')->success();

        return redirect()->route('jobs.index');
    }

    /**
     * Displays the details of a job.
     *
     * @param Job $job
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Job $job)
    {
        return view('jobs.show', compact('job'));
    }

    /**
     * Displays the form for editing job.
     *
     * @param Job $job
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Job $job)
    {
        if(!$job->is_verified){
            abort(404);
        }
        $skills         = JobSkill::pluck('name', 'id');
        $selectedSkills = $job->jobSkills()->pluck('job_skills.id')->toArray();

        return view('jobs.edit', compact('job', 'skills', 'selectedSkills'));
    }

    /**
     * Updates a job.
     *
     * @param Job $job
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Job $job)
    {
        $job->update(request()->all());
        $job->jobSkills()->sync(request('skills'));

        return redirect()->route('jobs.show', $job->id);
    }

    /**
     * Verifies the job.
     *
     * @param string $token
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verify(string $token)
    {
        $job = Job::where('verification_token', '=', $token)->first();
        if (!$job) {
            abort(404);
        }

        $job->update(['is_verified'        => true,
                      'verification_token' => '']);

        flash("Job verified successfully")->success();

        return redirect()->route('jobs.index');
    }
}
