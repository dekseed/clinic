<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('pages.admin.manage_users.roles.index')->withRoles($roles)->withPermissions($permissions);
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
        $permissions = implode(',', $request->permissions);

        // dd($permissions);

          $role = new Role();
          $role->display_name = $request->display_name;
          $role->name = $request->name;
          $role->description = $request->description;
          $role->save();

          if ($request->permissions) {
             $role->syncPermissions(explode(',', $permissions));
            // foreach ($request->permissions as $key => $value) {
            //     $role->attachRole($value);
            // }
          }

            //   Session::flash('message', 'เพิ่มบทบาทหน้าที่ ' . $role->display_name . ' สำเร็จ !!!');
            return redirect()->route('role.show', $role->id)->with('success_insert','success');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::where('id', $id)->with('permissions')->first();
        $permissions = Permission::all();
        return view('pages.admin.manage_users.roles.show')->withRole($role)->withPermissions($permissions);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       //
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
        $permissions = implode(',', $request->permissions);

        $role = Role::findOrFail($id);

          $role->display_name = $request->display_name;
          $role->name = $request->name;
          $role->description = $request->description;
          $role->save();

          if ($request->permissions) {
             $role->syncPermissions(explode(',', $permissions));
            // foreach ($request->permissions as $key => $value) {
            //     $role->attachRole($value);
            // }
          }

            //   Session::flash('message', 'เพิ่มบทบาทหน้าที่ ' . $role->display_name . ' สำเร็จ !!!');
            return redirect()->route('role.show', $role->id)->with('success_insert','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $permission = Role::where('id', $id)->with('permissions')->first();

        if ($permission->delete()) {
            return redirect()->route('role.index')->with('success_delete', 'success');
        }else{
            return redirect()->route('role.show', $id)->with('error', 'error');
        }
    }
}
