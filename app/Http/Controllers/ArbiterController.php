<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArbiterStoreRequest;
use App\Http\Requests\ArbiterUpdateRequest;
use App\User;
use App\Profile;
use File;

class ArbiterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arbiters = User::where('role', '=', 'arbiter')->get();
        return view('admin.arbiter.index', ['arbiters' => $arbiters]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.arbiter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArbiterStoreRequest $request)
    {
        $arbiter = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
            'role'      => 'arbiter'
        ]);
        
        $arbiter_profile = new Profile();
        $arbiter_profile->user_id = $arbiter->id;
        if ($request->file('picture')){
            $filename = date('Y-m-d_Hisu'). '.' .$request->file('picture')->getClientOriginalExtension();
            $request->file('picture')->move('pictures', $filename); 
            $arbiter_profile->picture = $filename;
        }
        $arbiter_profile->save();
        return redirect()->route('arbiter.index')->with('message', 'Успешно създатохте съдия ' . $arbiter->name . '.');
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
        $arbiter = User::findOrFail($id);
        return view('admin.arbiter.edit', ['arbiter' => $arbiter]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArbiterUpdateRequest $request, $id)
    {
        $arbiter = User::findOrFail($id);
        $arbiter->name = $request->name;
        $arbiter->email = $request->email;
        $arbiter->password = bcrypt($request->password);

        $old_picture = $arbiter->profile->picture;
        if ($request->file('picture')){
            $filename = date('Y-m-d_Hisu'). '.' .$request->file('picture')->getClientOriginalExtension();
            $request->file('picture')->move('pictures', $filename); 
            $arbiter->profile()->update([
                'picture' => $filename,
            ]);

            if ($old_picture != 'user.png') {
                $delete_file = public_path('pictures'). '/' .$old_picture;
                File::delete($delete_file);
            }
        }

        $arbiter->save();
        
        return redirect()->route('arbiter.index')->with('message', 'Успешно редактирахте съдия ' . $arbiter->name . '.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $arbiter = User::findOrFail($id);
        $delete_file = public_path('pictures'). '/' .$arbiter->profile->picture;
        if ($arbiter->profile->picture != 'user.png') {
            File::delete($delete_file);
        }
        $arbiter->profile->delete();
        $arbiter->delete();
        return redirect()->route('arbiter.index')->with('message', 'Успешно изтрихте съдия ' . $arbiter->name . '.');
    }

    public function reset_picture($id){
        $arbiter = User::findOrFail($id);
        $old_picture = $arbiter->profile->picture;

        if ($old_picture != 'user.png') {
        $arbiter->profile()->update(['picture' => 'user.png']);
        $delete_file = public_path('pictures'). '/' .$old_picture;
        File::delete($delete_file);
        }

        return redirect()->route('arbiter.index')->with('message', 'Успешно нулирахте снимка на съдия ' . $arbiter->name . '.');
    }
}
