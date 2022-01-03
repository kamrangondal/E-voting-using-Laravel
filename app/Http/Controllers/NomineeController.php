<?php

namespace App\Http\Controllers;
use App\Models\Position;
use App\Models\Election;
use App\Models\Nominee;
use Illuminate\Http\Request;

class NomineeController extends Controller
{
    public function index(){
        $elections = Election::all();
        $positions = Position::all();
        return view ("nominee/nominee")->with(['elections' => $elections])->with(['positions' => $positions]);
    }

    public function store(Request $request) {

        $nominees = new Nominee; 
        $nominees->name = $request->get('name');

        $nominees->election_id = $request->get('election');
        $nominees->position_id = $request->get('position');

        $nominees->save(); 

        return redirect('nominee/nominee');
    }

    public function read() {
        $nominees = Nominee::all(); 
       
        return view('nominee/read-nominee')
        ->with(['nominees' => $nominees]);
    }

    public function update($id) {
        $nominees = Nominee::find($id);
        $elections = Election::all();
        $positions = Position::all();
        return view('nominee/update-nominee')
        ->with(['nominees' => $nominees])
        ->with(['elections' => $elections])
        ->with(['positions' => $positions]);
    }

    public function saveUpdatedData(request $updateForm, $id) {
        $nominees = Nominee::find($id);   
    
        $nominees->name = $updateForm->get('name');
    
        $nominees->election_id = $updateForm->get('election');
        $nominees->position_id = $updateForm->get('position');
    
    
        $nominees->save();
    
        return redirect('nominee/read-nominee');
    }

    public function delete($id){
        Nominee::destroy($id);

        return redirect('nominee/read-nominee');
    }
}
