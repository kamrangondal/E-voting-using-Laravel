<?php

namespace App\Http\Controllers;
use App\Models\Election;
use Illuminate\Http\Request;

class ElectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function index()
    {
        return view('election/election');
    }

    public function store(Request $request) {

        $elections = new Election; 
        $elections->status = $request->get('status');
        $elections->start = $request->get('start');
        $elections->end = $request->get('end');
        $elections->name = $request->get('name');

        $elections->save(); 

        return redirect('election/election');
    }

    public function read() {
        $elections = Election::all(); 
       
        return view('election/read-election')
        ->with(['elections' => $elections]);
    }

    public function update($id) {
        $elections = Election::find($id);
        return view('election/update-election')
        ->with(['elections' => $elections]);
    }

    public function saveUpdatedData(request $updateForm, $id) {
        $elections = Election::find($id);   
    
        $elections->status = $updateForm->get('status');
        $elections->start = $updateForm->get('start');
        $elections->end = $updateForm->get('end');
        $elections->name = $updateForm->get('name');
    
        $elections->save();
    
        return redirect('election/read-election');
    }


    public function delete($id){
        Election::destroy($id);

        return redirect('election/read-election');
    }

}
