<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Services\CommonService;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request){

        $keyword = $request->get('q');
        $perPage = config('constants.PAGE_SIZE');

        $role_id = $request->get('role_id');

        $users = User::select('users.id as user_id','users.name','users.email','users.role_id');

        if (!empty($keyword)) {
            $keyword = CommonService::correctSearchKeyword($keyword);
            $users = $users->where(function ($query) use ($keyword) {
                $query->orWhere('name', 'LIKE', $keyword);
                $query->orWhere('email', 'LIKE', $keyword);
            });
        }

        if (!empty($role_id)) {
            $users = $users->join('roles', 'roles.id', '=', 'users.role_id')
                ->where('role_id', $role_id)
                ->orderBy('name');
        }

        $users = $users->paginate($perPage);



        return view('admin.profile.index',compact('users','role_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        $user = Auth::user();

        return view('admin.profile.show', compact('user'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.profile.edit', compact('user'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255|regex:/^[\pL\s\-]+$/u',
            'email' => "required|string|email|max:255|unique:users,email,$id",
        ]);
        $requestData = $request->all();

        $user = User::findOrFail($id);
        $user->update($requestData);

        Session::flash('flash_message', 'Đã cập nhật hồ sơ cá nhân!');

        return redirect('home/profile');
    }
}
