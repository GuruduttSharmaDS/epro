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
        
        $jobs = DB::table('fp_jobs')
                 ->select('fp_jobs.*', 'fp_cities.name as city','fp_countries.name as country',
                 'fp_states.name as state','fp_job_requests.*','fp_job_requests.status as job_request_status')
                 ->join('fp_job_requests', 'fp_job_requests.job_id', '=', 'fp_jobs.id')
                 ->join('fp_cities', 'fp_cities.id', '=', 'fp_jobs.city_id')
                 ->join('fp_countries', 'fp_countries.id', '=', 'fp_jobs.country_id')
                 ->join('fp_states', 'fp_states.id', '=', 'fp_jobs.state_id')
                 ->where('fp_job_requests.client_id', '=', $client_id)
                 ->where('fp_jobs.status', '!=', 3)
                 ->where('fp_job_requests.status', '=', 0)
                 ->get();
             
		
		return view("client/client_job_request",compact('jobs','pageTitle','user'));
        
    }
}
