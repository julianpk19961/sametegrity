<?php


namespace App\Http\Controllers;

use App\Models\questions;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class QuestionsController extends Controller
{

    private  $module = 'questions';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 
        $module = $this->module;
        $view = 'L';
        $columns = ['Nombre', 'Pregunta', 'Notas', 'Abierta', 'Unica Respuesta', 'Estado'];
        $searchbox = trim($request->get('searchbox'));
        $rows = DB::table('questions')
            ->select('id', 'name', 'description', 'notes', 'open', 'unique_answer', 'z_xOne')
            ->where('z_xOne', 1)
            ->orderBy('created_at', 'asc')
            ->paginate(18);

        return view($module . '.' . $module . '_' . $view, compact('columns', 'rows', 'searchbox', 'module', 'view'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $module = $this->module;
        $view = 'C';
        return view($module . '.question_' . $view, compact('module', 'view'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $validated = $request->validate([
            'name' => 'required|unique:questions|max:120',
            'description' => 'required|unique:questions',
        ]);

        $question = new questions;
        $question->name = $request->input('name');
        $question->slug = str::slug($request->input('name'));
        $question->description = $request->input('description');
        $question->notes = $request->input('notes');
        $question->open = $request->input('open');
        $question->unique_answer = $request->input('unique_answer');
        $question->z_xOne = $request->input('status');
        $question->save();

        return $this->saveRecord($question);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function show(questions $questions)
    {
        $module = $this->module;
        $view = '_';
        return view($module . '.question_', compact('questions', 'module', 'view'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function edit(questions $questions)
    {
        //
        $module = $this->module;
        $view = 'M';
        return view($module . '.question_M', compact('questions', 'module', 'view'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, questions $questions)
    {
        //

        $validated = $request->validate([
            'name' => 'required|max:120',
            'description' => 'required',
        ]);

        $questions->name = $request->input('name');
        $questions->description = $request->input('description');
        $questions->notes = $request->input('notes');
        $questions->open = $request->input('open');
        $questions->slug = str::slug($request->input('name'));
        $questions->unique_answer = $request->input('unique_answer');
        $questions->z_xOne = $request->input('status');
        $questions->save();
        return $this->saveRecord($questions);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function destroy(questions $questions)
    {
        //
        $questions->delete();
        return redirect()->route($this->module);
    }

    public function saveRecord($questions = '')
    {
        return redirect()->route($this->module . 'Show', compact('questions'));
    }
}
