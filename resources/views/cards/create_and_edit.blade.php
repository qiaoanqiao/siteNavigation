@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          Card /
          @if($card->id)
            Edit #{{ $card->id }}
          @else
            Create
          @endif
        </h1>
      </div>

      <div class="card-body">
        @if($card->id)
          <form action="{{ route('cards.update', $card->id) }}" method="POST" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('cards.store') }}" method="POST" accept-charset="UTF-8">
        @endif

          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          
                <div class="form-group">
                	<label for="name-field">Name</label>
                	<input class="form-control" type="text" name="name" id="name-field" value="{{ old('name', $card->name ) }}" />
                </div> 
                <div class="form-group">
                	<label for="describe-field">Describe</label>
                	<input class="form-control" type="text" name="describe" id="describe-field" value="{{ old('describe', $card->describe ) }}" />
                </div> 
                <div class="form-group">
                	<label for="url-field">Url</label>
                	<input class="form-control" type="text" name="url" id="url-field" value="{{ old('url', $card->url ) }}" />
                </div> 
                <div class="form-group">
                	<label for="icon-field">Icon</label>
                	<input class="form-control" type="text" name="icon" id="icon-field" value="{{ old('icon', $card->icon ) }}" />
                </div> 
                <div class="form-group">
                    <label for="category_id-field">Category_id</label>
                    <input class="form-control" type="text" name="category_id" id="category_id-field" value="{{ old('category_id', $card->category_id ) }}" />
                </div> 
                <div class="form-group">
                	<label for="label-field">Label</label>
                	<input class="form-control" type="text" name="label" id="label-field" value="{{ old('label', $card->label ) }}" />
                </div> 
                <div class="form-group">
                    <label for="like-field">Like</label>
                    <input class="form-control" type="text" name="like" id="like-field" value="{{ old('like', $card->like ) }}" />
                </div> 
                <div class="form-group">
                    <label for="order-field">Order</label>
                    <input class="form-control" type="text" name="order" id="order-field" value="{{ old('order', $card->order ) }}" />
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link float-xs-right" href="{{ route('cards.index') }}"> <- Back</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
