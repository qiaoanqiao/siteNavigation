@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          CardReferee /
          @if($card_referee->id)
            Edit #{{ $card_referee->id }}
          @else
            Create
          @endif
        </h1>
      </div>

      <div class="card-body">
        @if($card_referee->id)
          <form action="{{ route('card_referees.update', $card_referee->id) }}" method="POST" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('card_referees.store') }}" method="POST" accept-charset="UTF-8">
        @endif

          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          
                <div class="form-group">
                	<label for="title-field">Title</label>
                	<input class="form-control" type="text" name="title" id="title-field" value="{{ old('title', $card_referee->title ) }}" />
                </div> 
                <div class="form-group">
                	<label for="describe-field">Describe</label>
                	<input class="form-control" type="text" name="describe" id="describe-field" value="{{ old('describe', $card_referee->describe ) }}" />
                </div> 
                <div class="form-group">
                	<label for="category_title-field">Category_title</label>
                	<input class="form-control" type="text" name="category_title" id="category_title-field" value="{{ old('category_title', $card_referee->category_title ) }}" />
                </div> 
                <div class="form-group">
                	<label for="icon-field">Icon</label>
                	<input class="form-control" type="text" name="icon" id="icon-field" value="{{ old('icon', $card_referee->icon ) }}" />
                </div> 
                <div class="form-group">
                	<label for="url-field">Url</label>
                	<input class="form-control" type="text" name="url" id="url-field" value="{{ old('url', $card_referee->url ) }}" />
                </div> 
                <div class="form-group">
                    <label for="user_id-field">User_id</label>
                    <input class="form-control" type="text" name="user_id" id="user_id-field" value="{{ old('user_id', $card_referee->user_id ) }}" />
                </div> 
                <div class="form-group">
                	<label for="nickname-field">Nickname</label>
                	<input class="form-control" type="text" name="nickname" id="nickname-field" value="{{ old('nickname', $card_referee->nickname ) }}" />
                </div> 
                <div class="form-group">
                	<label for="homepage-field">Homepage</label>
                	<input class="form-control" type="text" name="homepage" id="homepage-field" value="{{ old('homepage', $card_referee->homepage ) }}" />
                </div> 
                <div class="form-group">
                	<label for="contact-field">Contact</label>
                	<input class="form-control" type="text" name="contact" id="contact-field" value="{{ old('contact', $card_referee->contact ) }}" />
                </div> 
                <div class="form-group">
                	<label for="label-field">Label</label>
                	<input class="form-control" type="text" name="label" id="label-field" value="{{ old('label', $card_referee->label ) }}" />
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link float-xs-right" href="{{ route('card_referees.index') }}"> <- Back</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
