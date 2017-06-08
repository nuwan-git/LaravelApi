<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\Job;

class myController extends Controller
{
    //
    public function jobAdd(Request $request){

             $name  = $request->job["name"];
             $description = $request->job["description"];
             $value = $request->job["price"];

             try{
                $job = new Job();
                $job->name = $name;
                $job->description = $description;
                 $job->value = $value;
             
            }catch(Exception $e){
                return response()->json(['status'=>'failed','error'=>$e->errorInfo]);
            }

            try{
                 $job->save();
                 return response()->json(['status'=>'success','code'=>200]);
            }catch(Exception $e){
                return response()->json(['status'=>'failed','error'=>$e->errorInfo]);
            }

    }

    public function jobList(){
        $jobs = Job::where('value',23)->get();

        return response()->json(['jobs' => $jobs]);
       

    }

     public function jobDelete(Request $request){
        try{
            // $id = $request->input('jobid');
            $id = $request->jobid;
            $job = Job::find($id);
            if($job->delete()){
                return response()->json(['status'=>'success','code'=>200]);
            }
        }catch(Exception $e){
            return response()->json(['status'=>'failed','error'=>$e->errorInfo]);
        }
    }
}
