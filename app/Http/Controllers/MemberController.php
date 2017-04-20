<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\MemberDataRequest;

class MemberController extends Controller
{
    /**
     * MemberController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(Member::all());
        //get all member data from the database
        $members = Member::all();
        // show the homepage and pass the member info to it
        return view('members.members')->with('members',$members);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('members.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemberDataRequest $request)
    {
        $Member = new Member;

        $Member->name  = $request->get('name');
        $Member->email = $request->get('email');
        $Member->phone = $request->get('phone');
        $Member->country = $request->get('country');
        $Member->save();


        //$members = Member::all();
        // show the homepage and pass the member info to it
        //return view('members')->with('members',$members);
        $request->session()->flash('flash_message', 'New member added successfully!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // find the member of given id
        $member = Member::find($id);

        // show the view and pass the member info to it
        return view('members.member')->with('member',$member);
        //
    }

    /**
     * Display version of members view with tow buttons for edit and delete
     *
     * @return $this
     */
    public function viewEdit()
    {
        $members = Member::all();
        return view('members.edit')->with('members',$members);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find the member of given id
        $member = Member::find($id);

        // show the edit form and pass the member info to it
        return view('members.edit_form')->with('member',$member);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $member = Member::find($id);
        $member->name      = $request->get('name');
        $member->email = $request->get('email');
        $member->phone      = $request->get('phone');
        $member->country = $request->get('country');
        $member->save();
        //$members = Member::all();

        //return view('members')->with('members',$members);
        $request->session()->flash('flash_message', 'Data updated successfully!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete
        $member = Member::find($id);
        $member->delete();

        // redirect
        //$members = Member::all();
        //return view('members')->with('members',$members);
        session()->flash('flash_message', 'Member deleted successfully!');
        return redirect()->back();
    }
}
