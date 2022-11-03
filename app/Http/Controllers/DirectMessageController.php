<?php

namespace App\Http\Controllers;

use App\DirectMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Consenter;
use App\Demand;
use App\User;
class DirectMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function message(Demand $demand)
    {
        $registered = Consenter::where('demand_id', '=', $demand->id)->where('user_id', '=', Auth::id())->where('status', '=', 1)->exists();
        if($demand->user_id == Auth::id() || $registered){
            $direct_messages = DirectMessage::where('demand_id', '=', $demand->id)->get();
            $my_user_id = Auth::id();
            
            return view('direct_messages.message', compact('direct_messages', 'demand', 'my_user_id'));
            
        }else{
            return redirect('/')->with('warning_message', '指定のページへのアクセスはできません');
        }

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
        $direct_message = new DirectMessage();
        $direct_message->user_id = Auth::id();
        $direct_message->demand_id = $demand->id;
        $direct_message->text = $request->input('text');
        $direct_message->save();
        
        return redirect()->action(
            'DirectMessageController@message', ['id' => $demand->id])->with('message', 'メッセージを送りました');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DirectMessage  $directMessage
     * @return \Illuminate\Http\Response
     */
    public function show(DirectMessage $directMessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DirectMessage  $directMessage
     * @return \Illuminate\Http\Response
     */
    public function edit(DirectMessage $directMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DirectMessage  $directMessage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Demand $demand, DirectMessage $directMessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DirectMessage  $directMessage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Demand $demand, DirectMessage $directMessage)
    {
        $directMessage->delete();
        
        return redirect()->action(
            'DirectMessageController@message', ['id' => $demand->id])->with('message', 'メッセージを削除しました');
    }
}
