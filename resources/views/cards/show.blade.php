@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>Card / Show #{{ $card->id }}</h1>
      </div>

      <div class="card-body">
        <div class="card-block bg-light">
          <div class="row">
            <div class="col-md-6">
              <a class="btn btn-link" href="{{ route('cards.index') }}"><- Back</a>
            </div>
            <div class="col-md-6">
              <a class="btn btn-sm btn-warning float-right mt-1" href="{{ route('cards.edit', $card->id) }}">
                Edit
              </a>
            </div>
          </div>
        </div>
        <br>

        <label>Name</label>
<p>
	{{ $card->name }}
</p> <label>Describe</label>
<p>
	{{ $card->describe }}
</p> <label>Url</label>
<p>
	{{ $card->url }}
</p> <label>Icon</label>
<p>
	{{ $card->icon }}
</p> <label>Category_id</label>
<p>
	{{ $card->category_id }}
</p> <label>Label</label>
<p>
	{{ $card->label }}
</p> <label>Like</label>
<p>
	{{ $card->like }}
</p> <label>Order</label>
<p>
	{{ $card->order }}
</p>
      </div>
    </div>
  </div>
</div>

@endsection
