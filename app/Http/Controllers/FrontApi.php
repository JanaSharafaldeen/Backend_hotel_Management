<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\model\Mypro_contactQuery;
use App\model\Mypro_subscribeUsers;
use App\model\Mypro_service;
use App\model\Mypro_roomBookingRequest;
use App\model\Mypro_room_type;
use App\model\Myprof_feedback_type;
use App\model\ Mypro_feedback;

class FrontApi extends Controller
{
    public function testing(Request $request){
        print_r($request->all());
    }
    public function save_contect_query(Request $request){
       $validator=Validator::make($request->all() , ['name'=>'required' , 'email'=>'required' ,'mobile_no'=>'required' ,'message'=>'required']);
    if($validator->passes()){
        
        $obj = new Mypro_contactQuery();
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->mobile_no = $request->mobile_no;
        $obj->message = $request->message;
        $obj->save();
        $arr = array('status'=>'true' , 'message'=>'Contact Query Successfully Send');

    }
    else{
      $arr = array('status'=>'false' , 'message'=>$validator->errors()->all());
    }
    echo json_encode($arr);
    }

    public function subscribe_user(Request $request){
        $validator = Validator::make($request->all() , ['email'=>'required']);
        if($validator->passes()){
            $check_status = Mypro_subscribeUsers::where('email' , $request->email)->get()->toArray();
            if( $check_status){
                $arr = array('status'=>'false' , 'message'=>'Email Already Exists ');

            }
            else{
            $subscribe = new Mypro_subscribeUsers();
            $subscribe->email = $request->email;
            $subscribe->save();
            $arr = array('status'=>'true' , 'message'=>'Contact Query Successfully Subscribe');
            }
        }
        else{
          $arr = array('status'=>'false' , 'message'=>$validator->errors()->all());
        }
        echo json_encode($arr);
    }
    
        public function get_service(){

            $services=Mypro_service::get()->toArray();
            if($services){
                    $arr=array('status'=>'true' ,'message'=>'success' ,'data'=>$services);
            }
            else{
                $arr=array('status'=>'false' ,'message'=>'Service not found');
            }
            echo json_encode($arr);
        }

        public function room_booking_request(Request $request){
            $validator = Validator::make($request->all(), ['name'=>'required' , 'email'=>'required', 'mobile_no'=>'required' ]);

            if( $validator->passes()){

            $req = new Mypro_roomBookingRequest();
            $req->name =$request->name;
            $req->email =$request->email;
            $req->mobile_no =$request->mobile_no;
            $req->address =$request->address;
            $req->from_date=$request->from_date;
            $req->to_date =$request->to_date;
            $req->no_of_member =$request->no_of_member;
            $req->no_of_rooms =$request->no_of_rooms;
            $req->room_type =$request->room_type;
            $req->status =0;
            $req->save();

            $arr =array('status'=>'true','message'=>'Success');
           }
            else{

                $arr = array('status'=>'false' ,'message'=>$validator->errors()->all());
            }
            echo json_encode($arr);

        }


    public function get_room_type(Request $request){
        $room_type=Mypro_room_type::select(['id','title'])->where('status' ,'1')->get()->toArray();
        if($room_type){
            $arr=array('status'=>'true' , 'message'=>'Success' , 'data'=>$room_type);
        }
        else{
            $arr=array('status'=>'false' , 'message'=>'Room type not found');
        }
        echo json_encode($arr);
    }
    
    public function get_feedback_type(){
        $feedback_type=Myprof_feedback_type::select(['id','title'])->where('status','1')->get()->toArray();
        if($feedback_type){
            $arr=array('status'=>'true' , 'message'=>'Success' , 'data'=>$feedback_type);
        }
        else{
            $arr=array('status'=>'false' , 'message'=>'Feedback type not found');
        }
        echo json_encode($arr);
    }
    public function save_feedback(Request $request){
        $validator = Validator::make($request->all() , ['name'=>'required' ,'email'=>'required','mobile_no'=>'required','feedback_type'=>'required','message'=>'required']);
        if($validator->passes()){
          
            
            $feedback = new  Mypro_feedback();
            $feedback->name = $request->name;
            $feedback->email = $request->email;
            $feedback->mobile_no = $request->mobile_no;
            $feedback->feedback_type = $request->feedback_type;
            $feedback->message = $request->message;
            $feedback->save();
            $arr = array('status'=>'true' , 'message'=>'Contact feedback is sent');
            
        }
        else{
          $arr = array('status'=>'false' , 'message'=>$validator->errors()->all());
        }
        echo json_encode($arr);
    }
    
}