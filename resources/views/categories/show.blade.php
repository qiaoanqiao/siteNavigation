@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>Category / Show #{{ $category->id }}</h1>
      </div>

      <div class="card-body">
        <div class="card-block bg-light">
          <div class="row">
            <div class="col-md-6">
              <a class="btn btn-link" href="{{ route('categories.index') }}"><- Back</a>
            </div>
            <div class="col-md-6">
              <a class="btn btn-sm btn-warning float-right mt-1" href="{{ route('categories.edit', $category->id) }}">
                Edit
              </a>
            </div>
          </div>
        </div>
        <br>

        <label>Title</label>
<p>
	{{ $category->title }}
</p> <label>Parent_id</label>
<p>
	{{ $category->parent_id }}
</p> <label>Order</label>
<p>
	{{ $category->order }}
</p> <label>Icon</label>
<p>
	{{ $category->icon }}
</p>
      </div>
    </div>
  </div>
</div>

@endsection
