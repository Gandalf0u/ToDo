<?php

namespace App\Http\Controllers;

use App\Sharedtodolist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Amis;

class SharedtodolistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Sharedtodolist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sharedtodolist  $sharedtodolist
     * @return \Illuminate\Http\Response
     */
    public function show(Sharedtodolist $sharedtodolist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sharedtodolist  $sharedtodolist
     * @return \Illuminate\Http\Response
     */
    public function edit(Sharedtodolist $sharedtodolist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sharedtodolist  $sharedtodolist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sharedtodolist $sharedtodolist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sharedtodolist  $sharedtodolist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sharedtodolist $sharedtodolist)
    {
        //
    }

    public function amis(Request $request)
    {
        if ($request->ajax()) {
            $user_id = Auth::id();
            $list = Amis::where('user1', '=', $user_id)
                ->where('pending', '=', 1)
                ->orWhere('user2', '=', $user_id)
                ->where('pending', '=', 1)
                ->get();

            return $list;
        }
        abort(404);
    }
}