<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MemberMaster;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = MemberMaster::all()->load('detail');
        return view('member.index', compact('members'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MemberMaster  $memberMaster
     * @return \Illuminate\Http\Response
     */
    public function show(MemberMaster $memberMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MemberMaster  $memberMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(MemberMaster $memberMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MemberMaster  $memberMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MemberMaster $memberMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MemberMaster  $memberMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(MemberMaster $memberMaster)
    {
        //
    }
}