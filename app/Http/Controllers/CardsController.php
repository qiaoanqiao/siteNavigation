<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CardRequest;

class CardsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$cards = Card::paginate();
		return view('cards.index', compact('cards'));
	}

    public function show(Card $card)
    {
        return view('cards.show', compact('card'));
    }

	public function create(Card $card)
	{
		return view('cards.create_and_edit', compact('card'));
	}

	public function store(CardRequest $request)
	{
		$card = Card::create($request->all());
		return redirect()->route('cards.show', $card->id)->with('message', 'Created successfully.');
	}

	public function edit(Card $card)
	{
        $this->authorize('update', $card);
		return view('cards.create_and_edit', compact('card'));
	}

	public function update(CardRequest $request, Card $card)
	{
		$this->authorize('update', $card);
		$card->update($request->all());

		return redirect()->route('cards.show', $card->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Card $card)
	{
		$this->authorize('destroy', $card);
		$card->delete();

		return redirect()->route('cards.index')->with('message', 'Deleted successfully.');
	}
}