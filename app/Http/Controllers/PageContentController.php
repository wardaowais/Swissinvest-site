<?php

namespace App\Http\Controllers;
use App\Models\PageContent;
use Illuminate\Http\Request;

class PageContentController extends Controller
{
 
    public function contentList(Request $request)
{
    $selectedPage = $request->input('page_name');
    $searchTerm = $request->input('search_term');

    // Start the query
    $query = PageContent::query();

    // If a page name is selected, filter the contents based on the selected page name
    if ($selectedPage) {
        $query->where('page_name', $selectedPage);
    }

    // If a search term is provided, filter based on the search term
    if ($searchTerm) {
        $query->where(function ($q) use ($searchTerm) {
            $q->where('content_key', 'LIKE', '%' . $searchTerm . '%')
              ->orWhere('content_value', 'LIKE', '%' . $searchTerm . '%');
        });
    }

    // Get the filtered contents
    $contents = $query->orderBy('id', 'desc')->get();

    // Get all unique page names for the dropdown
    $pageNames = PageContent::select('page_name')->distinct()->get();

    return view('admin.web-pages.index', compact('contents', 'pageNames', 'selectedPage'));
}

    public function search(Request $request)
    {
        $searchTerm = $request->input('search_term');

        // Start the query
        $query = PageContent::query();

        // Apply search term if provided
        if ($searchTerm) {
            $query->where(function ($q) use ($searchTerm) {
                $q->where('content_key', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('content_value', 'LIKE', '%' . $searchTerm . '%');
            });
        }

        // Get the filtered contents
        $contents = $query->get();

        return response()->json($contents);
    }

    public function create()
    {
        return view('admin.web-pages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'page_name' => 'required|string',
            'content_key' => 'required|string|unique:page_contents',
            'content_value' => 'required|string',
            'content_type' => 'required|string',
        ]);

        PageContent::create($request->all());

        return redirect()->route('contentList')->with('success', 'Content added successfully!');
    }

    public function edit($id)
    {
        $content = PageContent::findOrFail($id);
        return view('admin.web-pages.edit', compact('content'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            // 'page_name' => 'required|string',
            // 'content_key' => 'required|string|unique:page_contents,content_key,' . $id,
            'content_value' => 'required|string',
            // 'content_type' => 'required|string',
        ]);

        $content = PageContent::findOrFail($id);
        $content->update($request->all());

        return redirect()->route('contentList')->with('success', 'Content updated successfully!');
    }
}
