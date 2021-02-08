@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="card-header">
                <form method="post" action="/groups/{{$groups}}/blogs" >
                    @csrf
                    <div class="form-group">
                        <label>Blog name</label><br>
                        <input type="text" id="name" name="name">

                    </div>
                    <div class="form-group">
                        <label>Description</label><br>
                        <textarea type="area" id="description" name="description"></textarea><br>
                    </div>
                    <button type="submit" class="btn-block btn btn-secondary">Create</button>
                </form>

            </div>
        </div>
    </div>


@endsection
