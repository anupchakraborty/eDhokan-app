<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\Admin;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
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
     * Display a listing of the resource..
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Role Base Authentication Permision create
        if (is_null($this->user) || !$this->user->can('admin.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }

        $admins = Admin::all();
        return view('backend.pages.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Role Base Authentication Permision create
        if (is_null($this->user) || !$this->user->can('admin.create')) {
            abort(403, 'Sorry !! You are Unauthorized to Create any admin !');
        }

        $roles  = Role::all();
        return view('backend.pages.admins.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation Data
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:100|email|unique:admins',
            'username' => 'required|max:100|unique:admins',
            'password' => 'required|min:6|confirmed',
            'image' => 'required | mimes:jpeg,jpg,png,PNG | max:1000',
        ]);
        // dd($request->all());
        // Create New Admin
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->username = $request->username;
        $admin->password = Hash::make($request->password);
        if ($request->hasfile('image')) {
            // File store in public folder------
             $image = $request->file('image'); //catch File from input field
             $extension = $image->getClientOriginalExtension(); //File extension define
             $filename = time().'.'.$extension; //File filename define
             $image->move('backend/img/admin/',$filename); //File location define im public folder
             $admin->image = $filename; //File name save in db
         }
        //  dd($admin);
        $admin->save();

        if ($request->roles) {
            $admin->assignRole($request->roles);
        }

        Alert::success('created Successful', 'Admin has been created !!');
        return redirect()->route('admin.admins.index');
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
        //Role Base Authentication Permision create
        if (is_null($this->user) || !$this->user->can('admin.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to Edit any admin !');
        }

        $admin = Admin::find($id);
        $roles  = Role::all();
        return view('backend.pages.admins.edit', compact('admin', 'roles'));
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
        //Role Base Authentication Permision create
        if (is_null($this->user) || !$this->user->can('admin.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to Edit any admin !');
        }

        // Create New Admin
        $admin = Admin::find($id);

        // Validation Data
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:100|email|unique:admins,email,' . $id,
            'password' => 'nullable|min:6|confirmed',
        ]);
        // dd($request->all());

        $admin->name = $request->name;
        $admin->email = $request->email;
        if ($request->password) {
            $admin->password = Hash::make($request->password);
        }
        $admin->username = $request->username;
        if ($request->hasfile('image')) {
            if($request->old_image){
                unlink('backend/img/admin/'.$request->old_image);
            }else{            
            // Image store in public folder------
            $image = $request->file('image'); //catch image from input field
            $extension = $image->getClientOriginalExtension(); //image extension define
            $filename = time().'.'.$extension; //image filename define
            $image->move('backend/img/admin/',$filename); //image location define im public folder
            $admin->image = $filename; //image name save in db
            }
        }else{
            $admin->image = $request->old_image;
        }
        // dd($admin);
        $admin->save();

        $admin->roles()->detach();
        if ($request->roles) {
            $admin->assignRole($request->roles);
        }

        Alert::success('Edit Successful', 'Admin has been updated !!');
        return redirect()->route('admin.admins.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Role Base Authentication Permision create
        if (is_null($this->user) || !$this->user->can('admin.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to Delete any admin !');
        }
        
        $admin = Admin::find($id);
        if (!is_null($admin)) {
            $admin->delete();
        }

        Alert::success('Delete Successful', 'Admin has been deleted !!');
        return back();
    }
}
