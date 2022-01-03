<?php

namespace App\Http\Controllers;
use App\Models\Result1;
use App\Models\Position;
use App\Models\Election;
use App\Models\Nominee;
use Illuminate\Http\Request;

class Result1Controller extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('result1');
    }

    public function search(Request $request)
    {
        $keywords = $request->get('keywords');
        $name = $request->get('name');

        $nominees = Nominee::where('name',$name)->
                                when(isset($keywords), function ($query, $keywords) {
                                    //$query->where('description','LIKE','%'.$keywords.'%');

                                })->
                                get();
                         
                                if(count($nominees) > 0){

                                    return view('result1',compact('nominees'))->withQuery ( $keywords );
                                
                                }
                                else return view ('result1',compact('nominees'))->withMessage('No Details found. Try to search again !');

                            
                          
        
    }

}
