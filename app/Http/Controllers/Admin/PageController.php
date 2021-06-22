<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
        return view('admin.pages', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages-create');
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
            'slug' => 'required',
            'image' => 'nullable|image'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $folder = date('Y-m-d');
            $data['image'] = $request->file('image')->store("images/{$folder}");
        }

        if (isset($data['content_lt'])) {
            $data['content_lt'] = Page::getFormattedContent($data['content_lt']);
        }
        if (isset($data['content_en'])) {
            $data['content_en'] = Page::getFormattedContent($data['content_en']);
        }
        if (isset($data['content_ru'])) {
            $data['content_ru'] = Page::getFormattedContent($data['content_ru']);
        }

        $page = Page::create($data);

        return redirect()->route('admin.pages.index')->with('success', 'Страница добавлена');
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
        $page = Page::findOrFail($id);

        return view('admin.pages-edit', compact('page'));
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
            'slug' => 'required',
            'image' => 'nullable|image'
        ]);

        $page = Page::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('image')) {
            Storage::delete($page->image);
            $folder = date('Y-m-d');
            $data['image'] = $request->file('image')->store("images/{$folder}");
        }

        if (isset($data['content_lt'])) {
            $data['content_lt'] = Page::getFormattedContent($data['content_lt']);
        }
        if (isset($data['content_en'])) {
            $data['content_en'] = Page::getFormattedContent($data['content_en']);
        }
        if (isset($data['content_ru'])) {
            $data['content_ru'] = Page::getFormattedContent($data['content_ru']);
        }

        $page->update($data);

        return redirect()->route('admin.pages.index')->with('success', 'Страница обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::find($id);
        $page->delete();

        return redirect()->route('admin.pages.index')->with('success', 'Страница удалена');
    }
}
