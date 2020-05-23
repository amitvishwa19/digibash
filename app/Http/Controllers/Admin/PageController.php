<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PageRequest;
use App\Http\Controllers\Controller;
use App\Models\Page;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::latest()->get();

        return view('admin.pages.page.page',compact('pages'));

        //return response()->json($pages);
    }

    public function create()
    {
        $pages = Page::latest()->get();

        return response()->json($pages);
    }

    public function store(PageRequest $request)
    {
        $page = Page::create($request->all());

        return response()->json($page, 201);
    }

    public function show($id)
    {
        $page = Page::findOrFail($id);

        return response()->json($page);
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);

        //return response()->json($page);

        return view('admin.pages.page.page_edit',compact('page'));
    }

    public function update(PageRequest $request, $id)
    {
        $page = Page::findOrFail($id);
        $page->update($request->all());

        return response()->json($page, 200);
    }

    public function destroy($id)
    {
        Page::destroy($id);

        return response()->json(null, 204);
    }
}