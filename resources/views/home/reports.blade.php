@extends('layouts.master')


@section('content')

<div class="col-md-12">
    <h1>REPORTS</h1>
</div>

<div class="row">
    
    <div class="table-responsive">
        <table class="table">
            <thead class="thead">
                <tr>
                    <th width="200">Game</th>
                    <th colspan="2">
                        <img src="https://cdn3.iconfinder.com/data/icons/halloween-2/512/skull-crossbones-icon.png" class="skull">
                        KILLS BY MEANS
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($games as $game)
                <tr class="table-success">
                    <td colspan="3">{{ $game->name }}</td>
                </tr>
                    @foreach ($game->kills_by_means as $mode => $kills)
                        <tr class="table-info">
                            <td></td>
                            <td>{{ $mode }}</td>
                            <td>{{ $kills }}</td>
                        </tr>
                    @endforeach
                @endforeach
                <tr>
                    <td colspan="3" class="text-right">
                        <strong>TOTAL KILLS:</strong> {{ $games->sum(function($g){ return array_sum($g->kills_by_means); }) }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
</div>
<a class="btn btn-link float-right" target="_blank" href="{{ route('reports') }}?type=json">Viwe as json</a>

@endsection