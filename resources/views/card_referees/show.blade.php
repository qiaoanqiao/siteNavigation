@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>CardReferee / Show #{{ $card_referee->id }}</h1>
      </div>

      <div class="card-body">
        <div class="card-block bg-light">
          <div class="row">
            <div class="col-md-6">
              <a class="btn btn-link" href="{{ route('card_referees.index') }}"><- Back</a>
            </div>
            <div class="col-md-6">
              <a class="btn btn-sm btn-warning float-right mt-1" href="{{ route('card_referees.edit', $card_referee->id) }}">
                Edit
              </a>
            </div>
          </div>
        </div>
        <br>

        <label>Title</label>
<p>
	{{ $card_referee->title }}
</p> <label>Describe</label>
<p>
	{{ $card_referee->describe }}
</p> <label>Category_title</label>
<p>
	{{ $card_referee->category_title }}
</p> <label>Icon</label>
<p>
	{{ $card_referee->icon }}
</p> <label>Url</label>
<p>
	{{ $card_referee->url }}
</p> <label>User_id</label>
<p>
	{{ $card_referee->user_id }}
</p> <label>Nickname</label>
<p>
	{{ $card_referee->nickname }}
</p> <label>Homepage</label>
<p>
	{{ $card_referee->homepage }}
</p> <label>Contact</label>
<p>
	{{ $card_referee->contact }}
</p> <label>Label</label>
<p>
	{{ $card_referee->label }}
</p>
      </div>
    </div>
  </div>
</div>

@endsection
