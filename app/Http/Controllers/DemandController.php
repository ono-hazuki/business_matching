<?php

namespace App\Http\Controllers;

use App\Demand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Consenter;


class DemandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        
        $demands = Demand::where('user_id', '!=', $user_id)->get();
        
        return view('demands.index', compact('demands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('demands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $demand = new Demand();
        $demand->title = $request->input('title');
        $demand->description = $request->input('description');
        $demand->price = $request->input('price');
        $demand->deadline = $request->input('deadline');
        $demand->status = $request->input('status');
        $demand->user_id = Auth::id();
        $demand->save();
        
        return redirect()->route('demands.show', ['id'=> $demand->id])->with('message', '新しい案件が作成されました');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Demand  $demand
     * @return \Illuminate\Http\Response
     */
    public function show(Demand $demand)
    {
        if($demand->user_id == Auth::id()){
            return view('demands.show', compact('demand'));
        }else{
            $registered = Consenter::where('user_id', '=', Auth::id())->where('demand_id', '=', $demand->id)->exists();
            $consenter = Consenter::where('user_id', '=', Auth::id())->where('demand_id', '=', $demand->id)->first();;
            return view('demands.other_show', compact('demand','registered', 'consenter'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Demand  $demand
     * @return \Illuminate\Http\Response
     */
    public function edit(Demand $demand)
    {
        if($demand->user_id == Auth::id()){
            return view('demands.edit', compact('demand'));
        }else{
            return redirect('/')->with('message', '指定のページへのアクセスはできません');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Demand  $demand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Demand $demand)
    {
        $demand->title = $request->input('title');
        $demand->description = $request->input('description');
        $demand->price = $request->input('price');
        $demand->deadline = $request->input('deadline');
        $demand->status = $request->input('status');
        $demand->user_id = Auth::id();
        $demand->save();
        
        return redirect()->route('demands.show', ['id'=> $demand->id])->with('message', '案件が修正されました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Demand  $demand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Demand $demand)
    {
        $demand->delete();
        
        return redirect('/my_demands')->with('message', '案件が削除されました');
    }
    
    public function my_demands()
    {
        $user_id = Auth::id();
        $my_demands = Demand::where('user_id', '=', $user_id)->get();
        
        return view('demands.my_demands', compact('my_demands'));
    }
    
}
