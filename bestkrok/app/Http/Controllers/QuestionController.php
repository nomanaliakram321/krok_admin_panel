<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Imports\QuestionImport;
use Maatwebsite\Excel\Facades\Excel;
class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $questions = Question::all();
        return view('question.index',compact('questions'),compact('categories'));
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
        $question=new Question();
        $question->question=$request->input('question');
        $question->answer=$request->input('answer');
        $question->category_id=$request->input('category');

        if($question->save()){
            return redirect()->back()->with('success', 'Saved successfully!');
        }
        return redirect()->back()->with('failed', 'Could not save!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question =Question::find($id);
        $categories=Category::all();
        return view('question.edit',compact('question'),compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $question=Question::find($id);
        $question->question=$request->input('question');
        $question->answer=$request->input('answer');
        $question->category_id=$request->input('category');
               if($question->save()){
            return redirect('all-questions')->with('success', 'Saved successfully!');
        }
        return redirect('all-questions')->with('failed', 'Could not save!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
    public function fileImport() {
        Excel::import(new QuestionImport, request()->file('file'));
        return back()->with('success', 'Saved successfully!');
        }
}
