<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blank;
use Illuminate\Http\Request;

class BlankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blanks = Blank::all();
        return view('admin.blanks', compact('blanks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blanks-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'slug' => 'required'
        ]);

        Blank::create($request->all());

        return redirect()->route('admin.blanks.index')->with('success', 'Бланк добавлен');
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
        $blank = Blank::findOrFail($id);
        return view('admin.blanks-edit', compact('blank'));
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
        $request->validate([
            'slug' => 'required'
        ]);
        $blank = Blank::findOrFail($id);
        $blank->update($request->all());

        return redirect()->route('admin.blanks.index')->with('success', 'Бланк обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blank = Blank::find($id);
        $blank->delete();

        return redirect()->route('admin.blanks.index')->with('success', 'Бланк удален');
    }

    public function getBlank($id)
    {
        $blank = Blank::find($id);

        return response()->json([
            'title' => $blank->title_lt,
            'text' => $blank->text_lt
        ]);
    }
}
