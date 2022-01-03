<?php

namespace App\Http\Controllers;
use App\Models\Position;
use App\Models\Election;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function index(){
        $elections = Election::all();
        return view ("position/position")->with(['elections' => $elections]);
    }

    public function store(Request $request) {

        $positions = new Position; 
        $positions->name = $request->get('name');

        $positions->election_id = $request->get('election');

        $positions->save(); 

        return redirect('position/position');
    }

    public function read() {
        $positions = Position::all(); 
       
        return view('position/read-position')
        ->with(['positions' => $positions]);
    }

    public function update($id) {
        $positions = Position::find($id);
        $elections = Election::all();
        return view('position/update-position')
        ->with(['positions' => $positions])
        ->with(['elections' => $elections]);
    }

    public function saveUpdatedData(request $updateForm, $id) {
        $positions = Position::find($id);   
    
        $positions->name = $updateForm->get('name');
    
        $positions->election_id = $updateForm->get('election');
    
    
        $positions->save();
    
        return redirect('position/read-position');
    }

    public function delete($id){
        Position::destroy($id);

        return redirect('position/read-position');
    }
}
