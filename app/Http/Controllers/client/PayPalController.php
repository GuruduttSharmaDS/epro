<?php

namespace App\Http\Controllers\client;
use App\Models\JobRequest;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Srmklive\PayPal\Services\ExpressCheckout;
use DB;
use Session;

class PayPalController extends Controller
{
    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function payment(Request $request)
    {
      
        $data = [];
        $data['items'] = [
            [
                'name' => 'job post',
                'price' => $request->price,
                'desc'  => 'job post job post job post',
                'qty' => 1,
                'job_id' =>  $request->job_id,
            ]
        ];

        $data['invoice_id'] = 1;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('payment.success');
        $data['cancel_url'] = route('payment.cancel');
        
        $data['total'] = $request->price;
        Session::put(['job_id'=>$request->job_id,'job_req_id'=>$request->job_req_id,'user_id'=>$request->user_id,'client_id'=>$request->client_id]);
        

        $provider = new ExpressCheckout;

        $response = $provider->setExpressCheckout($data);

        $response = $provider->setExpressCheckout($data, true);
        
        return redirect($response['paypal_link']);

    }

    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function cancel()
    {
        dd('Your payment is canceled. You can create cancel page here.');
    }

    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function success(Request $request)
    {
      
		$provider = new ExpressCheckout;
        $response = $provider->getExpressCheckoutDetails($request->token);
        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            $data = array();
            $data['token'] = $response['TOKEN'];
            $data['job_req_id'] = session::get('job_req_id');
            $data['job_id'] = session::get('job_id');
            $data['user_id'] = session::get('user_id');
            $data['client_id'] = session::get('client_id');
            $fp_payment =  DB::table('fp_payment')->insert($data);
            $id = DB::getPdo()->lastInsertId();
             
            $jobs = DB::table('fp_jobs')
            ->select('fp_jobs.*')
            ->where('id', '=', session::get('job_id'))
            ->first();
           
            $user_Hire = array();
            $user_Hire['job_req_id'] = session::get('job_req_id');
            $user_Hire['payment_id'] = $id;
            $user_Hire['user_id'] = session::get('user_id');
            $user_Hire['client_id'] = session::get('client_id');
            $user_Hire['valid_from'] = $jobs->job_start_on;
            $user_Hire['valid_upto'] = $jobs->job_end_on;
            $user_Hire['price'] = $jobs->price;
            $fp_user_hire =  DB::table('fp_user_hire')->insert($user_Hire);
            
            $job_req_id = session::get('job_req_id');
            $Job_req = JobRequest::find($job_req_id);
            $Job_req->is_payment = 1;
            if($Job_req->save()){
                $request->session()->flash("msg", "Payment done successfully.");
			} else {			
				$request->session()->flash("errormsg", "Data not updated on server");
            
            }
           
        }else{
            $request->session()->flash("errormsg", "Something Wrong.");
        }
        return redirect("/client/job/job-request");  
        
    }
}
