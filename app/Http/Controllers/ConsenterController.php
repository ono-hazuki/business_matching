<?php
namespace App\Http\Controllers;

use App\Consenter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Demand;

class ConsenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Demand $demand)
    {
        $consenter = new Consenter();
        $consenter->user_id = Auth::id();
        $consenter->demand_id = $demand->id;
        $consenter->save();
        
        return redirect('/')->with('store_message', '立候補を行いました');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Consenter  $consenter
     * @return \Illuminate\Http\Response
     */
    public function show(Consenter $consenter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Consenter  $consenter
     * @return \Illuminate\Http\Response
     */
    public function edit(Consenter $consenter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Consenter  $consenter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Demand $demand, Consenter $consenter)
    {
        if($request->demand_id == $demand->id && $request->user_id == Auth::id()){
            $consenter->status = $request->input('status');
            $consenter->save();
            
            return response()->json($consenter);
            
        }else{
            return redirect('/')->with('warning_message', '指定のページへのアクセスはできません');
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Consenter  $consenter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Demand $demand, Consenter $consenter)
    {
        $consenter->delete();
        
        return redirect('/candidacy_demands')->with('destroy_message', '案件を辞退しました');
    }
    
    public function candidacy_demands()
    {
        $consenters = Consenter::where('user_id', '=', Auth::id())->get();

        return view('consenters.candidacy_demands', compact('consenters'));
    }
}
