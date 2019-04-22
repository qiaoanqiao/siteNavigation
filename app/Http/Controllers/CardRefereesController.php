<?php

namespace App\Http\Controllers;

use App\Models\CardReferee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CardRefereeRequest;

class CardRefereesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$card_referees = CardReferee::paginate();
		return view('card_referees.index', compact('card_referees'));
	}

    public function show(CardReferee $card_referee)
    {
        return view('card_referees.show', compact('card_referee'));
    }

	public function create(CardReferee $card_referee)
	{
		return view('card_referees.create_and_edit', compact('card_referee'));
	}

	public function store(CardRefereeRequest $request)
	{
		$card_referee = CardReferee::create($request->all());
		return redirect()->route('card_referees.show', $card_referee->id)->with('message', 'Created successfully.');
	}

	public function edit(CardReferee $card_referee)
	{
        $this->authorize('update', $card_referee);
		return view('card_referees.create_and_edit', compact('card_referee'));
	}

	public function update(CardRefereeRequest $request, CardReferee $card_referee)
	{
		$this->authorize('update', $card_referee);
		$card_referee->update($request->all());

		return redirect()->route('card_referees.show', $card_referee->id)->with('message', 'Updated successfully.');
	}

	public function destroy(CardReferee $card_referee)
	{
		$this->authorize('destroy', $card_referee);
		$card_referee->delete();

		return redirect()->route('card_referees.index')->with('message', 'Deleted successfully.');
	}
}