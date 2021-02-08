@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="card-header">
                <form action="/groups/{{$group->id}}" method="POST" >
                    @csrf
                    @method("PATCH")
                   {{-- <input type="hidden" name="_method" value="POST">--}}
                    <input type="hidden" name="id" value="{{$group->id}}">
                    <div class="form-group">
                        <label>Group name</label><br>
                        <input type="text" id="name" name="name" value="{{$group->name}}">

                    </div>
                    <div class="form-group">
                        <label>Description</label><br>
                        <textarea type="area" id="description" name="description">{{$group->description}}</textarea><br>
                    </div>
                    <button type="submit" class="btn-block btn btn-secondary">Edit</button>
                </form>

            </div>
        </div>
    </div>


@endsection
