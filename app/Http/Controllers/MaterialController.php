<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Material;

class MaterialController extends Controller
{
    public function index($id)
    {
        $material = Material::all();
        return view('dashboard.detail', [
            'title' => 'Detail',
            'course' => Course::where('id', $id)->first(),
        ],compact("material"));
    }

    public function store(Request $request){

        $material = new Material;
        $material->id_course = $request->id_course;
        $material->judul = $request->judul;
        $material->deskripsi = $request->deskripsi;
        $material->link = $request->link;
        $material->save();
        // return 'success';
        return redirect('/course')->with('success','success');
    }
    public function edit($id){
        return view('dashboard.material.edit', [
            'title' => 'Edit',
            'material' => Material::where('id', $id)->first(),
        ]);
    }
    public function update(Request $request, $id){
        $material = Material::find($id);
        $material->judul = $request->judul;
        $material->deskripsi = $request->deskripsi;
        $material->link = $request->link;
        $material->save();
        return redirect()->route('course')->with('success', "Link get updated!");
    }
    public function destroy($id){
        $material = Material::find($id);

        $material->delete();
        return redirect()->back()->with('success', 'Link deleted successfully');
    }

}