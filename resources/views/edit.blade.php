@extends('layouts.app')
@section('main-content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Update Image</h2>
        </div>
        <div class="pull-right">
         <a class="btn btn-primary" href="{{ route('image.index') }}">Back</a>
        </div>
    </div>
</div>
<div class="row">
	<div class="col">
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('image.update',$images->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH') 
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Upload:</strong>
                        <input type="file" name="image" class="form-control" placeholder="Name">
                    </div>

                    <div class="form-group">
                        <strong>Old Image:</strong>
                        <img src="{{ asset('/storage/'.$images->image) }}" width="150px" height="150px"> 
                        <input type="hidden" name="old_image" value="{{$images->image}}">
                    </div>
                </div>

                
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">update</button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection