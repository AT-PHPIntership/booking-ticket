<?php

namespace App\Http\Controllers\Admin;

use PHPUnit\Framework\MockObject\Stub\Exception;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use DB;

class UserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $data = [
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'address' => $request->address
        ];
        if (User::create($data)) {
            return redirect()->route('admin.users.index')
                ->with('message', trans('user.admin.add.message.add_success'));
        }
        return redirect()->back()
                ->with('message', trans('user.admin.add.message.msg_add_error'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = User::orderBy('id')->paginate(config('define.user.limit_rows'));
        return view('admin.pages.users.index', compact('datas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user user
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.pages.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     * @param User                     $user    user
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $request['password'] = bcrypt($request['password']);
        try {
            $user->update($request->all());
            return redirect()->route('admin.users.index')
                ->with('message', trans('user.admin.edit.message.edit_success'));
        } catch (Exception $e) {
            return redirect()->back()
                ->with('message', trans('user.admin.edit.message.edit_error'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param User $user User
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        try {
            return view('admin.pages.users.show', compact('user'));
        } catch (Exception $e) {
            return redirect()->route('admin.users.index')
                ->with('message', trans('user.admin.message.edit_fail'));
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param User $user user
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        DB::beginTransaction();
        try {
            $user->bookings()->delete();
            $user->comments()->delete();
            $user->ratings()->delete();
            $user->delete();
            DB::commit();
            return redirect()->back()->with('message', trans('user.admin.message.del_success'));
        } catch (Exception $ex) {
            DB::rollBack();
            return redirect()->back()->with('message', trans('user.admin.message.del_fail'));
        }
    }
}
