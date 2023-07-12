<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Material;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modal.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'judul' => 'required',
            'deskripsi' => 'required',
            'durasi' => 'required',
        ]);

        $course = new Course;
        $course->judul = $request->judul;
        $course->deskripsi = $request->deskripsi;
        $course->durasi = $request->durasi;
        $course->save();

        return redirect()->back()->with('success','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $material = Material::all();
        $course = Course::find($id)->with('materials')->get();
        return view('dashboard.detail', [
            'title' => 'Detail',
            'course' => Course::where('id', $id)->first(),
        ],compact("course"));
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.edit', [
            'title' => 'Edit',
            'course' => Course::where('id', $id)->first(),
        ]);
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
        $course = Course::where('id', $id)->first();
        $course->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'durasi' => $request->durasi,
        ]);
        $course->save();
        return redirect()->route('course')->with('success', "Link get updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        $course = Course::find($id);

        $course->delete();
        return redirect()->back()->with('success', 'Link deleted successfully');
    }
}
