<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }


    public function index()
    {
        $users = User::all();

        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'img' => 'required',
            'usertype' => 'required'
        ]);

        $file = $request->img;
        $imgName = $file->getClientOriginalName();

        if( $file->storeAs('img/users',$imgName) ){

            $validatedData['img'] = $imgName;

            $createUser = User::create($validatedData);

            return redirect()->route('admins.index')->with('status','User is created');
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
    public function edit(User $user)
    {
    
        return view('admin.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
       // dd($user->img);

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'usertype' => 'required'
        ]);

        if($request->hasFile('img')){

            if( file_exists(public_path().'/img/users/'.$user->img) ){
                unlink( public_path().'/img/users/'.$user->img );
            }

            $file = $request->img;
            $imgName = $file->getClientOriginalName();

            if( $file->storeAs('img/users',$imgName) ){

                $validatedData['img'] = $imgName;
 
            }
        }

        $updateUser = $user->update($validatedData);

        return redirect()->route('admins.index')->with('status','User is updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if( file_exists(public_path().'/img/users/'.$user->img) ){
            unlink( public_path().'/img/users/'.$user->img );
        }

        $deleteUser = $user->delete();

        return redirect()->route('admins.index')->with('status','User is deleted');
    }
}
