@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>
          Category
          <a class="btn btn-success float-xs-right" href="{{ route('categories.create') }}">Create</a>
        </h1>
      </div>

      <div class="card-body">
        @if($categories->count())
          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th class="text-xs-center">#</th>
                <th>Title</th> <th>Parent_id</th> <th>Order</th> <th>Icon</th>
                <th class="text-xs-right">OPTIONS</th>
              </tr>
            </thead>

            <tbody>
              @foreach($categories as $category)
              <tr>
                <td class="text-xs-center"><strong>{{$category->id}}</strong></td>

                <td>{{$category->title}}</td> <td>{{$category->parent_id}}</td> <td>{{$category->order}}</td> <td>{{$category->icon}}</td>

                <td class="text-xs-right">
                  <a class="btn btn-sm btn-primary" href="{{ route('categories.show', $category->id) }}">
                    V
                  </a>

                  <a class="btn btn-sm btn-warning" href="{{ route('categories.edit', $category->id) }}">
                    E
                  </a>

                  <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-sm btn-danger">D </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $categories->render() !!}
        @else
          <h3 class="text-xs-center alert alert-info">Empty!</h3>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection
