<?php

namespace App\Http\Controllers;

use Hash;
use App\Models\Role;
use App\Models\Jobs_title;
use App\Models\User;
use App\Models\TitleName;
use App\Models\Permission;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('updated_at', 'desc')->get();
        $titleName_id = TitleName::orderBy('updated_at', 'desc')->get();
        $val_jobs_title = Jobs_title::all();

        return view('pages.admin.manage_users.index', compact('titleName_id', 'val_jobs_title'))->withUsers($users);
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
        //  dd($request);
        $user = new User();

        $user->titleName_id = $request->val_title_name;
        $user->first_name = $request->val_first_name;
        $user->last_name = $request->val_last_name;
        $user->email = $request->val_email;
        $user->tel = $request->val_tel;
        $user->status = '0';
        $user->jobs_title_id = $request->val_jobs_title;
        $user->is_admin ='1';
        $user->password = Hash::make($request->val_password);

        if($user->save()){

            return redirect()->route('user.index')->with('success','success');

        }else{
            // Session::flash('danger', 'ไม่สามารถลงข้อมูลได้');
            return redirect()->route('user.index')->with('error','error');
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
        $user = User::where('id', $id)->with('roles')->first();
        $titleName_id = TitleName::orderBy('updated_at', 'desc')->get();
        $role_id = Role::all();
        $val_jobs_title = Jobs_title::all();

         return view('pages.admin.manage_users.show', compact('titleName_id', 'role_id', 'val_jobs_title'))->withUser($user);
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
        // dd($request);
        $user = User::findOrFail($id);

        if ($request->val_password) {
            $this->validate($request, [
                'val_password' => ['required', 'string', 'min:6', 'confirmed'],
            ]);


            $user->password = Hash::make($request->val_password);
            $user->save();

            if ($user->save()) {
                return redirect()->route('user.show', $user->id)->with('success_password', 'success_password');
            } else {
                return redirect()->route('user.show', $user->id)->with('error', 'error');
            }
            // return redirect()->route('user.show', $user->id)->with('success_password', 'success_password');

        }elseif ($request->role) {

            $permissions = implode(',', $request->role);
            $user->syncRoles(explode(',', $permissions));
            return redirect()->route('user.show', $user->id)->with('success_role_insert', 'success');

         }else{

            $user->titleName_id = $request->val_title_name;
            $user->first_name = $request->val_first_name;
            $user->last_name = $request->val_last_name;
            $user->email = $request->val_email;
            $user->tel = $request->val_tel;
            $user->jobs_title_id = $request->val_jobs_title;

            if ($user->save()) {
                return redirect()->route('user.show', $user->id)->with('success', 'success');
            } else {
                return redirect()->route('user.show', $user->id)->with('error', 'error');
            }
        }


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
        $user = User::find($id);
        $user->delete();

        return redirect()->route('user.index')->with('success_destroy', 'success_destroy');
    }
}
