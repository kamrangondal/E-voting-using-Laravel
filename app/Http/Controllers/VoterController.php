<?php

namespace App\Http\Controllers;
use App\Models\Position;
use App\Models\Election;
use App\Models\Nominee;
use App\Models\Voter;
use Illuminate\Http\Request;

class VoterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $elections = Election::all();
        $positions = Position::all();
        $nominees = Nominee::all();
        return view ("voter/voter")
            ->with(['elections' => $elections])
            ->with(['positions' => $positions])
            ->with(['nominees' => $nominees]);
    }

    public function store(Request $request) {

        $voters = new Voter; 
        $voters->name = $request->get('name');
        $voters->special_id = $request->get('special_id');
        $voters->vote_counter = $request->get('vote_counter');

        $voters->election_id = $request->get('election');
        $voters->position_id = $request->get('position');
        $voters->nominee_id = $request->get('nominee');

        $voters->save(); 

        return redirect('voter/voter');
    }
}
