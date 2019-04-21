<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$categories = Category::paginate();
		return view('categories.index', compact('categories'));
	}

    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

	public function create(Category $category)
	{
		return view('categories.create_and_edit', compact('category'));
	}

	public function store(CategoryRequest $request)
	{
		$category = Category::create($request->all());
		return redirect()->route('categories.show', $category->id)->with('message', 'Created successfully.');
	}

	public function edit(Category $category)
	{
        $this->authorize('update', $category);
		return view('categories.create_and_edit', compact('category'));
	}

	public function update(CategoryRequest $request, Category $category)
	{
		$this->authorize('update', $category);
		$category->update($request->all());

		return redirect()->route('categories.show', $category->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Category $category)
	{
		$this->authorize('destroy', $category);
		$category->delete();

		return redirect()->route('categories.index')->with('message', 'Deleted successfully.');
	}
}