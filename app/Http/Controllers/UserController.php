<?php

namespace App\Http\Controllers;
Use App\Models\User;
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
        $data = User::all();
        return view('index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'profile_photo' => 'required|image',
        ]);

        //Run the command  php artisan storage::link
        $path = $request->file('profile_photo')->store('public/uploads');

        $data = new User;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->profile_photo = $path;
        $data->save();
        
        return redirect('/');
    }

    public function show(User $user)
    {
        return view('show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('edit',compact('user'));
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
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'profile_photo' => '',
        ]);

    $post = User::find($id);
    if($request->hasFile('profile_photo')){
        $request->validate([
          'profile_photo' => 'required|image',
        ]);
        $path = $request->file('profile_photo')->store('public/images');
        $post->profile_photo = $path;
    }

    $post->name = $request->name;
    $post->email = $request->email;
    $post->save();
    return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/');
    }
}
