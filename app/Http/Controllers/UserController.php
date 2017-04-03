<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Role;
use App\Traits\ModelFinder;
use App\User;

class UserController extends Controller
{
    use ModelFinder;

    protected $pp = 6;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->getUsers()->paginate($this->pp);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        $roles = $this->getRoles()->get();

        return view('admin.users.create', compact('user', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //Create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            ]);

        //Assign role
        $user->assignRole($request->role);

        flash()->success('The new user has been created');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = $this->getRoles()->get();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        // Update user
        /*Without password*/
        if ($request->password == null)
        {
            $user->update($request->except('password'));
        }

        /*With password*/
        $input['name'] = $request->name;
        $input['email'] = $request->email;
        $input['password'] = bcrypt($request->password);

        $user->update($input);

        // Update roles
        $user->assignRole($request->role);

        flash()->success('The user account has been updated');
        return redirect($user->path('edit'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        flash()->success('The user has been deleted.');
        return back();
    }

    public function change_role(Request $request, User $user)
    {

    }
}
