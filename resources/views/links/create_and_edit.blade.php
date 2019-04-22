@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          Link /
          @if($link->id)
            Edit #{{ $link->id }}
          @else
            Create
          @endif
        </h1>
      </div>

      <div class="card-body">
        @if($link->id)
          <form action="{{ route('links.update', $link->id) }}" method="POST" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('links.store') }}" method="POST" accept-charset="UTF-8">
        @endif

          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          
                <div class="form-group">
                	<label for="title-field">Title</label>
                	<input class="form-control" type="text" name="title" id="title-field" value="{{ old('title', $link->title ) }}" />
                </div> 
                <div class="form-group">
                	<label for="url-field">Url</label>
                	<input class="form-control" type="text" name="url" id="url-field" value="{{ old('url', $link->url ) }}" />
                </div> 
                <div class="form-group">
                    <label for="order-field">Order</label>
                    <input class="form-control" type="text" name="order" id="order-field" value="{{ old('order', $link->order ) }}" />
                </div> 
                <div class="form-group">
                	<label for="icon-field">Icon</label>
                	<input class="form-control" type="text" name="icon" id="icon-field" value="{{ old('icon', $link->icon ) }}" />
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link float-xs-right" href="{{ route('links.index') }}"> <- Back</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
