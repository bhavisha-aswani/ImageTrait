@extends('layouts.app')
@section('main-content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="pull-left">
            <h2>All Images</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('image.create') }}">Add New</a>
        </div>
	</div>
</div>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
       @if ($message = Session::get('success'))
       <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>Image</th>
            <th width="280px">Action</th>
        </tr>
        @forelse($images as $image)
        <tr>
            <td>
             <img src="{{ asset('/storage/'.$image->image) }}" width="150px" height="150px"> 
            </td>
             <td>
                <form action="{{ route('image.destroy',$image->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('image.edit',$image->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td>
                no records found
            </td>
        </tr>
        @endforelse
    </table>
    <div style="margin-left: 40%;margin-bottom: 20%;">
      {!! $images->links() !!}
    </div>
    </div>
</div>
@endsection