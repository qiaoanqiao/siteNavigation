<?php

namespace App\Http\Controllers;

use App\Models\Option;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\OptionRequest;

class OptionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$options = Option::paginate();
		return view('options.index', compact('options'));
	}

    public function show(Option $option)
    {
        return view('options.show', compact('option'));
    }

	public function create(Option $option)
	{
		return view('options.create_and_edit', compact('option'));
	}

	public function store(OptionRequest $request)
	{
		$option = Option::create($request->all());
		return redirect()->route('options.show', $option->id)->with('message', 'Created successfully.');
	}

	public function edit(Option $option)
	{
        $this->authorize('update', $option);
		return view('options.create_and_edit', compact('option'));
	}

	public function update(OptionRequest $request, Option $option)
	{
		$this->authorize('update', $option);
		$option->update($request->all());

		return redirect()->route('options.show', $option->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Option $option)
	{
		$this->authorize('destroy', $option);
		$option->delete();

		return redirect()->route('options.index')->with('message', 'Deleted successfully.');
	}
}