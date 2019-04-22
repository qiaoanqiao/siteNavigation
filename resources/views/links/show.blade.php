@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>Link / Show #{{ $link->id }}</h1>
      </div>

      <div class="card-body">
        <div class="card-block bg-light">
          <div class="row">
            <div class="col-md-6">
              <a class="btn btn-link" href="{{ route('links.index') }}"><- Back</a>
            </div>
            <div class="col-md-6">
              <a class="btn btn-sm btn-warning float-right mt-1" href="{{ route('links.edit', $link->id) }}">
                Edit
              </a>
            </div>
          </div>
        </div>
        <br>

        <label>Title</label>
<p>
	{{ $link->title }}
</p> <label>Url</label>
<p>
	{{ $link->url }}
</p> <label>Order</label>
<p>
	{{ $link->order }}
</p> <label>Icon</label>
<p>
	{{ $link->icon }}
</p>
      </div>
    </div>
  </div>
</div>

@endsection
