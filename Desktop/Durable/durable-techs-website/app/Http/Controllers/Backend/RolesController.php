<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    public $user;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('role.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any role !');
        }
        $search = $request->input('search_keyword');
        if ($request->search_keyword) {
            $roles = Role::where('name', $search)->where('id', '!=', 1)->get();
        } else {
            $roles = Role::where('id', '!=', 1)->get();
        }

        return view('admin::settings.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('role.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any role !');
        }

        $all_permissions  = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('admin::settings.roles.create', compact('all_permissions', 'permission_groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('role.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any role !');
        }

        try {

            // Validation Data
            $request->validate([
                'name' => 'required|max:100|unique:roles'
            ], [
                'name.requried' => 'Please give a role name'
            ]);

            // Process Data
            $role = Role::create(['name' => $request->name, 'guard_name' => 'admin']);

            // $role = DB::table('roles')->where('name', $request->name)->first();
            $permissions = $request->input('permissions');

            if (!empty($permissions)) {
                $role->syncPermissions($permissions);
            }


            return redirect()->route('admin.roles.index')->with('success', 'Role has been created !!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
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
    public function edit(int $id)
    {
        if (is_null($this->user) || !$this->user->can('role.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any role !');
        }

        $role = Role::findById($id, 'admin');
        $all_permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('admin::settings.roles.edit', compact('role', 'all_permissions', 'permission_groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        if (is_null($this->user) || !$this->user->can('role.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any role !');
        }

        try {

            // TODO: You can delete this in your local. This is for heroku publish.
            // This is only for Super Admin role,
            // so that no-one could delete or disable it by somehow.
            if (Auth::guard('admin')->user()->id !== 1) {
                session()->flash('error', 'Sorry !! You are not authorized to edit this role !');
                return back();
            }

            // Validation Data
            $request->validate([
                'name' => 'required|max:100|unique:roles,name,' . $id
            ], [
                'name.requried' => 'Please give a role name'
            ]);

            $role = Role::findById($id, 'admin');
            $permissions = $request->input('permissions');

            if (!empty($permissions)) {
                $role->name = $request->name;
                $role->save();
                $role->syncPermissions($permissions);
            }

            return redirect()->route('admin.roles.index')->with('success', 'Role has been updated !!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        if (is_null($this->user) || !$this->user->can('role.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any role !');
        }

        // TODO: You can delete this in your local. This is for heroku publish.
        // This is only for Super Admin role,
        // so that no-one could delete or disable it by somehow.
        if ($id === 1) {
            session()->flash('error', 'Sorry !! You are not authorized to delete this role !');
            return back();
        }

        $role = Role::findById($id, 'admin');
        if (!is_null($role)) {
            $role->delete();
        }

        session()->flash('success', 'Role has been deleted !!');
        return back();
    }
}
