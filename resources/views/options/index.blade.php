@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>
          Option
          <a class="btn btn-success float-xs-right" href="{{ route('options.create') }}">Create</a>
        </h1>
      </div>

      <div class="card-body">
        @if($options->count())
          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th class="text-xs-center">#</th>
                <th>Name</th> <th>Value</th>
                <th class="text-xs-right">OPTIONS</th>
              </tr>
            </thead>

            <tbody>
              @foreach($options as $option)
              <tr>
                <td class="text-xs-center"><strong>{{$option->id}}</strong></td>

                <td>{{$option->name}}</td> <td>{{$option->value}}</td>

                <td class="text-xs-right">
                  <a class="btn btn-sm btn-primary" href="{{ route('options.show', $option->id) }}">
                    V
                  </a>

                  <a class="btn btn-sm btn-warning" href="{{ route('options.edit', $option->id) }}">
                    E
                  </a>

                  <form action="{{ route('options.destroy', $option->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-sm btn-danger">D </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $options->render() !!}
        @else
          <h3 class="text-xs-center alert alert-info">Empty!</h3>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection
