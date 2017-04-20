<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionDataRequest;

class PermissionController extends Controller
{
    /**
     * PermissionController constructor.
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
        //dd(Permission::all());
        //get all Permission data from the database
        $permissions = Permission::all();
        // show the homepage and pass the Permission info to it
        return view('permissions.permissions')->with('permissions',$permissions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permissions.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionDataRequest $request)
    {
        $Permission = new Permission;

        $Permission->label  = $request->get('label');
        $Permission->name  = $request->get('name');
        $Permission->save();


        //$Permissions = Permission::all();
        // show the homepage and pass the Permission info to it
        //return view('Permissions')->with('Permissions',$Permissions);
        $request->session()->flash('flash_message', 'New Permission added successfully!');
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
        // find the Permission of given id
        $permission = Permission::find($id);

        // show the view and pass the Permission info to it
        return view('permissions.permission')->with('permission',$permission);
        //
    }

    /**
     * Display version of Permissions view with tow buttons for edit and delete
     *
     * @return $this
     */
    public function viewEdit()
    {
        $permissions = Permission::all();
        return view('permissions.edit')->with('permissions',$permissions);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find the Permission of given id
        $permission = Permission::find($id);

        // show the edit form and pass the Permission info to it
        return view('permissions.edit_form')->with('permission',$permission);
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
        $Permission = Permission::find($id);
        $Permission->label     = $request->get('label');
        $Permission->name      = $request->get('name');
        $Permission->save();
        //$Permissions = Permission::all();

        //return view('permissions')->with('permissions',$permissions);
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
        $Permission = Permission::find($id);
        $Permission->delete();

        // redirect
        //$Permissions = Permission::all();
        //return view('Permissions')->with('Permissions',$Permissions);
        session()->flash('flash_message', 'Permission deleted successfully!');
        return redirect()->back();
    }
}
