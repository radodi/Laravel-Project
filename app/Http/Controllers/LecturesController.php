<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Lecture;
use App\UserLectureHomework;
use App\Http\Requests\StoreLectureRequest;
class LecturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        
        return view('lectures.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('lectures.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLectureRequest $request)
    {
        $lecture = Lecture::create([
                'name'      => $request['name'],                
                'start_date'     => $request['start_date'],
                'end_date'     => $request['end_date'],
                 'hasHomework'      => $request['hasHomework'],
                 'course_id'      => $request['course_id']

            ]);

         return redirect()->route('get_all_lectures')->withSuccess('New Lecture Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lecture          = Lecture::find($id);
        $user_homeworks = UserLectureHomework::where('user_id', '=', $id)->get();

        return view('lectures.show', compact('lecture', 'user_homeworks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lecture = Lecture::findOrFail($id);

       return view('lectures.edit', compact('lecture')); 
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
         $lecture = Lecture::findOrFail($id);
        $lecture->name      = $request['name'];                
        $lecture->start_date     = $request['start_date'];
         $lecture->end_date     = $request['end_date'];
         $lecture->hasHomework     = $request['hasHomework'];
          $lecture->course_id     = $request['course_id'];
        
        $lecture->save();             

        return redirect()->route('get_all_lectures')->withSuccess('New Lectures Successfully Created');
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
        $lecture = Lecture::find($id);
        //$lecture->homeworks->delete();
       // $lecture->course->delete();
        $lecture->delete();

        return redirect()->route('get_all_lectures')->withSuccess('Lecture deleted');
    }
}
