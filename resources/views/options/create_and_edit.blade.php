@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          Option /
          @if($option->id)
            Edit #{{ $option->id }}
          @else
            Create
          @endif
        </h1>
      </div>

      <div class="card-body">
        @if($option->id)
          <form action="{{ route('options.update', $option->id) }}" method="POST" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('options.store') }}" method="POST" accept-charset="UTF-8">
        @endif

          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          
                <div class="form-group">
                	<label for="name-field">Name</label>
                	<input class="form-control" type="text" name="name" id="name-field" value="{{ old('name', $option->name ) }}" />
                </div> 
                <div class="form-group">
                	<label for="value-field">Value</label>
                	<input class="form-control" type="text" name="value" id="value-field" value="{{ old('value', $option->value ) }}" />
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link float-xs-right" href="{{ route('options.index') }}"> <- Back</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
