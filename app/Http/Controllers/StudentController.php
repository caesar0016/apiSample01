<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return student::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //-- Insert data into the database
        $fields = $request->validate([
            'name' => 'required|max:255',
            'location' => 'required',
            'age' => 'required',
            'course' => 'required',
        ]);

        $student = student::create($fields);
        return [ 'student001' => $student];
    }

    /**
     * Display the specified resource.
     */
    public function show(student $student)
    {
        //-- display the data

        return $student;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, student $student)
    {
        //-- Validate the request here

        //-- Insert data into the database
        $fields = $request->validate([
            'name' => 'required|max:255',
            'location' => 'required',
            'age' => 'required',
            'course' => 'required',
        ]);

        $student->update($fields);
        return $student;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(student $student)
    {
        //-- Hello world

        $student->delete();
        return ['message' => 'The post was deleted'];
    }
}
