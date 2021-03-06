@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Favorite
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Favaorite Form -->
                    <form action="{{ url('favorite') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="favorie-name" class="col-sm-3 control-label">Favorite</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="favorite-name" class="form-control" value="{{ old('favorite') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="favorie-url" class="col-sm-3 control-label">URL</label>

                            <div class="col-sm-6">
                                <input type="text" name="url" id="favorite-url" class="form-control" value="{{ old('favorite') }}">
                            </div>
                        </div>

                        <!-- Add Favorite Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add Favorite 
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Favorite -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Current Favorites
                </div>
                @if (count($favorites) > 0)
                    <div class="panel-body">
                        <table class="table table-striped favorite-table">
                            <thead>
                                <th>サムネイル</th>
                                <th>Favorite</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($favorites as $favorite)
                                    <tr>
                                        <td>
                                            <!--<img src="http://i.ytimg.com/vi/{{ $favorite->song_key }}/default.jpg">-->
                                            <iframe width="120" height="90" src="https://www.youtube.com/embed/{{ $favorite->song_key }}" frameborder="0" allowfullscreen></iframe>
                                        </td>
                                        <td class="table-text">
                                            <a href="https://www.youtube.com/watch?v={{ $favorite->song_key }}" target="_blank">{{ $favorite->name }}</a>
                                        </td>
                                        <td>
                                        @can('like', $favorite)
                                                <form action="{{url('favorite/' . $favorite->id) . '/like'}}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PUT') }}
                                                    <button type="submit" id="like-favorite-{{ $favorite->id }}" class="btn fa fa-star"></button>
                                                </form>
                                        @else
                                            <form action="{{url('favorite/' . $favorite->id) . '/unlike'}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('PUT') }}
                                                <button type="submit" id="like-favorite-{{ $favorite->id }}" class="btn btn-warning fa fa-star"></button>
                                            </form>
                                        @endcan
                                        <td>
                                            <form action="{{url('favorite/' . $favorite->id)}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" id="delete-favorite-{{ $favorite->id }}" class="btn fa fa-btn fa-trash">
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div>
                        There is nothing yet.
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
