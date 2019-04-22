@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>
          Link
          <a class="btn btn-success float-xs-right" href="{{ route('links.create') }}">Create</a>
        </h1>
      </div>

      <div class="card-body">
        @if($links->count())
          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th class="text-xs-center">#</th>
                <th>Title</th> <th>Url</th> <th>Order</th> <th>Icon</th>
                <th class="text-xs-right">OPTIONS</th>
              </tr>
            </thead>

            <tbody>
              @foreach($links as $link)
              <tr>
                <td class="text-xs-center"><strong>{{$link->id}}</strong></td>

                <td>{{$link->title}}</td> <td>{{$link->url}}</td> <td>{{$link->order}}</td> <td>{{$link->icon}}</td>

                <td class="text-xs-right">
                  <a class="btn btn-sm btn-primary" href="{{ route('links.show', $link->id) }}">
                    V
                  </a>

                  <a class="btn btn-sm btn-warning" href="{{ route('links.edit', $link->id) }}">
                    E
                  </a>

                  <form action="{{ route('links.destroy', $link->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-sm btn-danger">D </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $links->render() !!}
        @else
          <h3 class="text-xs-center alert alert-info">Empty!</h3>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection
