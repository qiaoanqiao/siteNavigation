@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>
          CardReferee
          <a class="btn btn-success float-xs-right" href="{{ route('card_referees.create') }}">Create</a>
        </h1>
      </div>

      <div class="card-body">
        @if($card_referees->count())
          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th class="text-xs-center">#</th>
                <th>Title</th> <th>Describe</th> <th>Category_title</th> <th>Icon</th> <th>Url</th> <th>User_id</th> <th>Nickname</th> <th>Homepage</th> <th>Contact</th> <th>Label</th>
                <th class="text-xs-right">OPTIONS</th>
              </tr>
            </thead>

            <tbody>
              @foreach($card_referees as $card_referee)
              <tr>
                <td class="text-xs-center"><strong>{{$card_referee->id}}</strong></td>

                <td>{{$card_referee->title}}</td> <td>{{$card_referee->describe}}</td> <td>{{$card_referee->category_title}}</td> <td>{{$card_referee->icon}}</td> <td>{{$card_referee->url}}</td> <td>{{$card_referee->user_id}}</td> <td>{{$card_referee->nickname}}</td> <td>{{$card_referee->homepage}}</td> <td>{{$card_referee->contact}}</td> <td>{{$card_referee->label}}</td>

                <td class="text-xs-right">
                  <a class="btn btn-sm btn-primary" href="{{ route('card_referees.show', $card_referee->id) }}">
                    V
                  </a>

                  <a class="btn btn-sm btn-warning" href="{{ route('card_referees.edit', $card_referee->id) }}">
                    E
                  </a>

                  <form action="{{ route('card_referees.destroy', $card_referee->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-sm btn-danger">D </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $card_referees->render() !!}
        @else
          <h3 class="text-xs-center alert alert-info">Empty!</h3>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection
