<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminsController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function index(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('admin.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }

        $status = $request->input('v', 1);
        $search = $request->input('search_keyword');
        if ($status === 'trush' && $search) {
            $data = Admin::onlyTrashed()->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%");
            });
        } elseif ($search) {
            $data = Admin::where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%")
                    ->where('email', 'LIKE', "%$search%");
            })->get();
        } elseif ($status === 'trush') {
            $data = Admin::onlyTrashed()
                ->orderBy('deleted_at', 'desc')
                ->get();
        } else {
            $data = Admin::all();
        }

        $admins = $data->where('id', '!=', 1);

        return view('admin::settings.admins.index', compact('admins'));
    }

    public function create()
    {
        if (is_null($this->user) || !$this->user->can('admin.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any admin !');
        }

        $roles  = Role::where('id', '!=', 1)->get();;
        return view('admin::settings.admins.create', compact('roles'));
    }

    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('admin.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any admin !');
        }

        try {
            // Validation Data
            $request->validate([
                'name' => 'required|max:50',
                'email' => 'required|max:100|email|unique:admins',
                'username' => 'required|max:100|unique:admins',
                'password' => 'required|min:6|confirmed',
            ]);

            // Create New Admin
            $admin = new Admin();
            $admin->name = $request->name;
            $admin->username = $request->username;
            $admin->email = $request->email;
            $admin->password = Hash::make($request->password);
            $admin->save();

            if ($request->roles) {
                $admin->assignRole($request->roles);
            }


            return redirect()->route('admin.admins.index')->with('success', 'Admin has been created !!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function edit(int $id)
    {
        if (is_null($this->user) || !$this->user->can('admin.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any admin !');
        }

        $admin = Admin::find($id);
        $roles  = Role::where('id', '!=', 1)->get();
        return view('admin::settings.admins.edit', compact('admin', 'roles'));
    }

    public function update(Request $request, int $id)
    {
        if (is_null($this->user) || !$this->user->can('admin.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any admin !');
        }

        try {
            if ($id === 1) {
                session()->flash('error', 'Sorry !! You are not authorized to update this Admin as this is the Super Admin. Please create new one if you need to test !');
                return back();
            }

            // Create New Admin
            $admin = Admin::find($id);

            // Validation Data
            $request->validate([
                'name' => 'required|max:50',
                'email' => 'required|max:100|email|unique:admins,email,' . $id,
                'password' => 'nullable|min:6|confirmed',
            ]);


            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->username = $request->username;
            if ($request->password) {
                $admin->password = Hash::make($request->password);
            }
            $admin->save();

            $admin->roles()->detach();
            if ($request->roles) {
                $admin->assignRole($request->roles);
            }

            return redirect()->route('admin.admins.index')->with('success', 'Admin has been updated !!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function hideShow(Request $request)
    {

        if (is_null($this->user) || !$this->user->can('admin.disabled')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any admin !');
        }

        $type = $request->type;
        $id = $request->id;

        if ($id === 1) {
            session()->flash('error', 'Sorry !! You are not authorized to delete this Admin as this is the Super Admin. Please create new one if you need to test !');
            return back();
        }

        try {
            if ($type == 'hide') {
                Admin::find($id)->delete();
                session()->flash('success', 'Admin has been disabled !!');
            } else {
                Admin::onlyTrashed()->find($id)->restore();
                session()->flash('success', 'Admin has been enabled !!');
            }   

            return back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function destroy(int $id)
    {

        if (is_null($this->user) || !$this->user->can('admin.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any admin !');
        }

        if ($id === 1) {
            session()->flash('error', 'Sorry !! You are not authorized to delete this Admin as this is the Super Admin. Please create new one if you need to test !');
            return back();
        }
        
        Admin::onlyTrashed()->find($id)->forceDelete();

        session()->flash('success', 'Admin has been deleted !!');
        return back();
    }
}
