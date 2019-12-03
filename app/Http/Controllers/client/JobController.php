<?php

namespace App\Http\Controllers\client;
use App\Models\JobRequest;
use App\Models\Job;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Http\Controllers\Controller;
use Session;
use Validator;
use DB;
use View;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 public function __construct()
    {
		//parent::__construct();
		
	
		

    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("client/job_create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\client\job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\client\job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\client\job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\client\job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(job $job)
    {
        //
    }
	 public function request_listing()
    {
		$user_id = session::get('roleId');
		
		$user = Client::with([])
			->where('id', '=', $user_id)
			->first();
		$pageTitle = "Job Request";
		$client_id = session::get('roleId');
		$jobs = JobRequest::with([''])
		->where('client_id', '=', $client_id)
		->get();
		
		return view("client/client_job_request",compact('jobs','pageTitle','user'));
        
    }
}
