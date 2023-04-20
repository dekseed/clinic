<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permission = Permission::orderBy('updated_at', 'desc')->get();

        return view('pages.admin.manage_users.permissions.index')->withPermission($permission);
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
        // dd($request);

              if ($request->permission_type == 'basic') {

                $permission = new Permission();
                $permission->name = $request->name;
                $permission->display_name = $request->display_name;
                $permission->description = $request->description;
                $permission->save();

                // Session::flash('message', 'Permission has been successfully added');
                return redirect()->route('permission.index')->with('success_insert','success');

              } elseif ($request->permission_type == 'crud') {

                $crud_selected = "create,read,update,delete";
                $crud = explode(',', $crud_selected);
                if (count($crud) > 0) {
                  foreach ($crud as $x) {
                    $slug = strtolower($x) . '-' . strtolower($request->resource);
                    $display_name = ucwords($x . " " . $request->resource);
                    $description = "Allows a user to " . strtoupper($x) . ' a ' . ucwords($request->resource);

                    $permission = new Permission();
                    $permission->name = $slug;
                    $permission->display_name = $display_name;
                    $permission->description = $description;
                    $permission->save();
                  }
                //   Session::flash('message-permission', 'เพิ่มข้อมูลสิทธิการใช้งานเรียบร้อย !');
                  return redirect()->route('permission.index')->with('success_insert','success');
              } else {
                return redirect()->route('permission.index')->with('error','error');
              }
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
        $permission = Permission::findOrFail($id);
        // $permission->delete();

        if($permission->delete()){

            return redirect()->route('permission.index')->with('success_delete','success');

        }else{

            return redirect()->route('permission.index')->with('error','error');

        }
    }
}
