@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>
          Card
          <a class="btn btn-success float-xs-right" href="{{ route('cards.create') }}">Create</a>
        </h1>
      </div>

      <div class="card-body">
        @if($cards->count())
          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th class="text-xs-center">#</th>
                <th>Name</th> <th>Describe</th> <th>Url</th> <th>Icon</th> <th>Category_id</th> <th>Label</th> <th>Like</th> <th>Order</th>
                <th class="text-xs-right">OPTIONS</th>
              </tr>
            </thead>

            <tbody>
              @foreach($cards as $card)
              <tr>
                <td class="text-xs-center"><strong>{{$card->id}}</strong></td>

                <td>{{$card->name}}</td> <td>{{$card->describe}}</td> <td>{{$card->url}}</td> <td>{{$card->icon}}</td> <td>{{$card->category_id}}</td> <td>{{$card->label}}</td> <td>{{$card->like}}</td> <td>{{$card->order}}</td>

                <td class="text-xs-right">
                  <a class="btn btn-sm btn-primary" href="{{ route('cards.show', $card->id) }}">
                    V
                  </a>

                  <a class="btn btn-sm btn-warning" href="{{ route('cards.edit', $card->id) }}">
                    E
                  </a>

                  <form action="{{ route('cards.destroy', $card->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-sm btn-danger">D </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $cards->render() !!}
        @else
          <h3 class="text-xs-center alert alert-info">Empty!</h3>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection
