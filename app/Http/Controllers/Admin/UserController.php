<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use PHPUnit\Framework\MockObject\Stub\Exception;

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
        } else {
            return redirect()->back()
                        ->with('message', trans('user.admin.add.message.add_error'));
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = User::orderBy('id', 'ASC')->paginate(10);
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
    public function update(CreateUserRequest $request, User $user)
    {
        $data = [
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'address' => $request->address
        ];
        try {
            $user->update($data);
            return redirect()->route('admin.users.index')
                            ->with('message', trans('user.admin.edit.message.edit_success'));
        } catch (Exception $e) {
            return redirect()->back()
                            ->with('message', trans('user.admin.edit.message.edit_error'));
        }
    }
}
