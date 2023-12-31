@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List</h2>
            </div>
            <div class="pull-right">
                
                <a class="btn btn-success" href="{{route('lists.create')}}"> Create New</a>
              
            </div>
        </div>
    </div>


    <table class="table table-bordered">
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th width="230px">Action</th>
        </tr>
       
        @foreach ($lists as $list)
	    <tr>
           
	        <td>{{$list->title}}</td>
	        <td>{{$list->description}}</td>
	        <td>{{$list->name}}</td>
	        <td>
                 
                    
                <form action="{{ route('lists.destroy', $list->id) }}" method="POST">
                    <a class="btn btn-info" href="{{route('lists.show',$list->id)}}">Show</a>
                    <a class="btn btn-primary" href="{{route('lists.edit',$list->id)}}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
                
	        </td>
	    </tr>
        @endforeach
    </table>


@endsection