<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Course;
use App\lecture;
use App\User;
use App\UserLectureHomework;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
       $courses = Course::all();

       return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('courses.create');  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course = Course::create([
                'name'      => $request['name'],                
                'duration'     => $request['duration'],
                'description'     => $request['description']
            ]);
        
        
        
            

        return redirect()->route('get_all_courses')->withSuccess('New Student Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $courses          = Course::find($id);
        $user_homeworks = UserLectureHomework::where('user_id', '=', $id)->get();

        return view('courses.show', compact('course', 'user_homeworks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::findOrFail($id);

       return view('courses.edit', compact('course'));
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
        $course = Course::findOrFail($id);
        $course->name      = $request['name'];                
        $course->duration     = $request['duration'];
         $course->description     = $request['description'];
        
        $course->save();             

        return redirect()->route('get_all_courses')->withSuccess('New Course Successfully Created');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         //dd($id);
        $course = Course::find($id);
        $course->lectures()->delete();
        $course->delete();

        return redirect()->route('get_all_courses')->withSuccess('Course deleted');
    }
}
