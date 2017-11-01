<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Requests\DancerStoreRequest;
use \App\Http\Requests\DancerUpdateRequest;
use App\User;
use App\Profile;
use File;

class DancerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index()
    {
        $dancers = User::where('role', '=', 'dancer')->get();
        return view('admin.dancer.index', ['dancers' => $dancers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dancer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DancerStoreRequest $request)
    {
        $dancer = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
            'role'      => 'dancer'
        ]);
        
        $dancer_profile = new Profile();
        $dancer_profile->user_id = $dancer->id;
        $dancer_profile->country = $request->country;
        if ($request->file('picture')){
            $filename = date('Y-m-d_Hisu'). '.' .$request->file('picture')->getClientOriginalExtension();
            $request->file('picture')->move('pictures', $filename); 
            $dancer_profile->picture = $filename;
        }
        $dancer_profile->save();
        return redirect()->route('dancer.index')->with('message', 'Успешно създатохте танцьор ' . $dancer->name . '.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dancer = User::findOrFail($id);
        return view('admin.dancer.show', ['dancer' => $dancer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dancer = User::findOrFail($id);
        return view('admin.dancer.edit', ['dancer' => $dancer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DancerUpdateRequest $request, $id)
    {
        $dancer = User::findOrFail($id);
        $dancer->name = $request->name;
        $dancer->email = $request->email;
        $dancer->password = bcrypt($request->password);

        $old_picture = $dancer->profile->picture;
        if ($request->file('picture')){
            $filename = date('Y-m-d_Hisu'). '.' .$request->file('picture')->getClientOriginalExtension();
            $request->file('picture')->move('pictures', $filename); 
            $dancer->profile()->update([
                'picture' => $filename,
                'country' => $request->country,
            ]);

            if ($old_picture != 'user.png') {
                $delete_file = public_path('pictures'). '/' .$old_picture;
                File::delete($delete_file);
            }
        } else{
            $dancer->profile()->update([
                'country' => $request->country,
            ]);
        }
        

        $dancer->save();
        
        return redirect()->route('dancer.index')->with('message', 'Успешно редактирахте танцьор ' . $dancer->name . '.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dancer = User::findOrFail($id);
        $delete_file = public_path('pictures'). '/' .$dancer->profile->picture;
        if ($dancer->profile->picture != 'user.png') {
            File::delete($delete_file);
        }
        $dancer->profile->delete();
        $dancer->delete();
        return redirect()->route('dancer.index')->with('message', 'Успешно изтрихте танцьор ' . $dancer->name . '.');
    }

    public function reset_picture($id){
        $dancer = User::findOrFail($id);
        $old_picture = $dancer->profile->picture;

        if ($old_picture != 'user.png') {
        $dancer->profile()->update(['picture' => 'user.png']);
        $delete_file = public_path('pictures'). '/' .$old_picture;
        File::delete($delete_file);
        }

        return redirect()->route('dancer.index')->with('message', 'Успешно нулирахте снимка на танцьор ' . $dancer->name . '.');
    }
}
