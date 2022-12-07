<?php

namespace App\Http\Controllers;

use App\Models\categoryDrugs;
use App\Http\Requests\StorecategoryDrugsRequest;
use App\Http\Requests\UpdatecategoryDrugsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CategoryDrugsController extends Controller
{
    private  $module = 'drugscategories';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $view = 'L';
        $columns = ['Código', 'Nombre', 'Comentario', 'estado'];
        $module = $this->module;
        $searchbox = trim($request->get('searchbox'));
        $categories = DB::table('categoriesDrugs')
            ->select('id', 'code', 'name', 'observation', 'z_xOne')
            ->where('code', 'LIKE', '%' . $searchbox . '%')
            ->orWhere('name', 'LIKE', '%' . $searchbox . '%')
            ->orWhere('observation', 'LIKE', '%' . $searchbox . '%')
            ->orderBy('code')
            ->paginate(18);

        return view('drugsCategories.drugsCategories_l', compact('columns', 'searchbox', 'categories', 'module', 'view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $module = $this->module;
        $view = 'C';
        return view('drugsCategories.drugsCategories_c', compact('module', 'view'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorecategoryDrugsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecategoryDrugsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categoryDrugs  $categoryDrugs
     * @return \Illuminate\Http\Response
     */
    public function show(categoryDrugs $categoryDrugs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categoryDrugs  $categoryDrugs
     * @return \Illuminate\Http\Response
     */
    public function edit(categoryDrugs $categoryDrugs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecategoryDrugsRequest  $request
     * @param  \App\Models\categoryDrugs  $categoryDrugs
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecategoryDrugsRequest $request, categoryDrugs $categoryDrugs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categoryDrugs  $categoryDrugs
     * @return \Illuminate\Http\Response
     */
    public function destroy(categoryDrugs $categoryDrugs)
    {
        //
    }
}
