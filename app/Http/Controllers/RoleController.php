<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionDataRequest;
use App\Http\Requests\RoleDataRequest;
use App\Permission;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * RoleController constructor.
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
        $users = User::all();
        // show the homepage and pass the member info to it
        return view('roles.users')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RoleDataRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleDataRequest $request)
    {
        $Role = new Role;

        $Role->label = $request->get('label');
        $Role->name  = $request->get('name');
        $Role->save();

        $request->session()->flash('flash_message', 'New Role added successfully!');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // lists() deprecated at 5.3. Use pluck() instead.
        // $roles = Role::lists('label', 'id');
        $roles = Role::pluck('label', 'id');
        $user = User::findOrFail($id);
        // $user_roles = $user->roles->lists('id')->toArray();
        $user_roles = $user->roles->pluck('id')->toArray();

        return view('roles.roles')
            ->with(['user' => $user, 'roles' => $roles, 'user_roles' => $user_roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RoleDataRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    // MethodNotAllowedHttpException
    //public function storeRoles(RoleDataRequest $request)
    public function storeRoles(Request $request)
    {
        $user_id = $request->get('user_id');
        $user = User::findOrFail($user_id);

        $roles = Role::find($request->get('user_roles'));

        $user->roles()->detach();

        if (!empty($roles)) {
            foreach ($roles as $role) {
                $user->roles()->save($role);
            }
        }

        $request->session()->flash('flash_message', 'New Roles added successfully!');
        return redirect()->back();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * List to Edit the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function list_edit()
    {
        $roles = Role::all();
        return view('roles.list_edit')->with('roles',$roles);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editRole($id)
    {
        // lists() deprecated at 5.3. Use pluck() instead.
        // $permissions = Permission::lists('label', 'id');
        $permissions = Permission::pluck('label', 'id');
        $role = Role::findOrFail($id);
        // $role_permissions = $role->permissions->lists('id')->toArray();
        $role_permissions = $role->permissions->pluck('id')->toArray();

        return view('roles.permissions')
            ->with(['role' => $role, 'permissions' => $permissions, 'role_permissions' => $role_permissions]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyRole($id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RoleDataRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    // MethodNotAllowedHttpException
    //public function storePermission(PermissionDataRequest $request)
    public function storePermissions(Request $request)
    {
        $role_id = $request->get('role_id');
        $role = Role::findOrFail($role_id);

        $permissions = Permission::find($request->get('role_permissions'));

        $role->permissions()->detach();

        if (!empty($permissions)) {
            foreach ($permissions as $permission) {
                $role->givePermissionTo($permission);
            }
        }

        $request->session()->flash('flash_message', 'New Permissiuon added successfully!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyPermission($id)
    {
        //
    }


}
