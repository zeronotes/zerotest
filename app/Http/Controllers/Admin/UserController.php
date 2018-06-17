<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserFormRequest;
use App\Http\Requests\LoginFormRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at','DESC')->paginate(10);
        return view('admin.users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $rq)
    {
        $user = new User;
        $user->username = $rq->username;
        $user->password = Hash::make($rq->password);
        $user->email = $rq->email;
        $user->name = $rq->name;
        if ($user->save()) {
            return redirect()->route('admin.users.index')->with('msg_success','Created successfully.'); // redirect to route
        } else{
            return redirect()->back(); // redirect to back page
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
        $user = User::find($id);
        return view('admin.users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserFormRequest $rq, $id)
    {
        $user = User::find($id);
        if (! empty($rq->password)) {
            $user->password = bcrypt($rq->password);
        }
        $user->name = $rq->name;
        $user->save();
        return redirect()->back()->with('msg_success','Update thành công!'); // redirect with flash session message
    }

    public function profile()
    {
        echo 'cl';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->action('Admin\UserController@index')->with('msg_success','Deleted successfully.'); //redirect to controller action
    }

    public function getLogin()
    {
        // if (Auth::viaRemember()) {
        //     exit('da login');
        // }
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        else {
            return view('admin.users.login');
        }
    }

    public function postLogin(LoginFormRequest $rq)
    {
        // remember me
        $remember = ($rq->rememberme == 'forever') ? true : false;

        if (Auth::attempt(['username' => $rq->username, 'password' => $rq->password], $remember)) {
            // dang nhap thanh cong
            return redirect()->route('admin.dashboard');
        }
        else {
            // dang nhap that bai
            return redirect()->back()->withErrors(['Invalid username or password.']);
        }
    }

    public function getLogout()
    {
        exit('wtf');
    }

    public function postLogout() {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
