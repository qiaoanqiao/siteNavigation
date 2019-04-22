<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LinkRequest;

class LinksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $links = Link::paginate();

        return view('links.index', compact('links'));
    }

    public function show(Link $link)
    {
        return view('links.show', compact('link'));
    }

    public function create(Link $link)
    {
        return view('links.create_and_edit', compact('link'));
    }

    public function store(LinkRequest $request)
    {
        $link = Link::create($request->all());

        return redirect()->route('links.show', $link->id)->with('message',
            'Created successfully.');
    }

    public function edit(Link $link)
    {
        $this->authorize('update', $link);

        return view('links.create_and_edit', compact('link'));
    }

    public function update(LinkRequest $request, Link $link)
    {
        $this->authorize('update', $link);
        $link->update($request->all());

        return redirect()->route('links.show', $link->id)->with('message',
            'Updated successfully.');
    }

    public function destroy(Link $link)
    {
        $this->authorize('destroy', $link);
        $link->delete();

        return redirect()->route('links.index')->with('message',
            'Deleted successfully.');
    }
}
