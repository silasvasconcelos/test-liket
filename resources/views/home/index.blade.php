@extends('layouts.master')


@section('content')

<div class="col-md-12">
    <h1>RANKING</h1>
</div>
<form action=".">
    <div class="form-group row">
        <input type="search" name="q" value="{{ $q }}" class="form-control form-control-lg col-md-8 left">
        <button type="submit" class="btn btn-secondary btn-lg col-md-4 left">Search</button>
    </div>
</form>

<div class="row">
    
    <div class="table-responsive">
        <table class="table">
            <thead class="thead">
                <tr>
                    <th>NAME</th>
                    <th width="200">
                        <img src="https://cdn3.iconfinder.com/data/icons/halloween-2/512/skull-crossbones-icon.png" class="skull">
                        KILLS
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($players as $player)
                <tr>
                    <td>{{ $player->name }}</td>
                    <td>{{ $player->my_kills }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</div>

@endsection