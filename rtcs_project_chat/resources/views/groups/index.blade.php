@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="text-left">
                            {{ __('All Groups') }}
                            <div class="card-header">
                                <div class="text-left">
                                    {{ __('Search for groups' ) }}
                                </div>
                                <input type="text" value="" class="form-control">
                            </div>
                        </div>

                    </div>

                    <div class="container" align="center">
                        <h4 align="center">Your groups</h4>
                        <table class="table-borderless  ">
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Join</th>
                            </tr>

                            @foreach($groups as $group)
                                @if($group!=null)

                                    <tr>
                                        <td class="font-weight-bold">
                                            {{$group->name}}
                                        </td>
                                        <td>
                                            {{$group->description}}
                                        </td>
                                        <td>
                                            <a href="/groups/{{$group->id}}/join" class="btn btn-info">Join</a>
                                        </td>
                                        <td>


                                        </td>
                                    </tr>
                                @endif
                            @endforeach

                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
