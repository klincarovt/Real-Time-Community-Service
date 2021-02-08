@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="card-header">
                <form action="/groups" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Group name</label><br>
                        <input type="text" id="name" name="name">

                    </div>
                    <div class="form-group">
                        <label>Description</label><br>
                        <textarea type="area" id="name" name="description"></textarea><br>
                    </div>
                    <button type="submit" class="btn-block btn btn-secondary">Create</button>
                </form>

            </div>
        </div>
    </div>


@endsection
