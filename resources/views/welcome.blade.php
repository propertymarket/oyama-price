@extends('layouts.app')

@section('title','物件一覧')

@section('content')

<div class="container">
    <div class="row">
        <div class='col-sm-12'>
            <h1>大山査定</h1>
            <table class='table table-striped table-bordered table-sm'>
                <tr>
                    <th>物件名</th>
                    <th>総戸数</th>
                    <th>新築時価格有り戸数</th>
                    <th>大山査定数</th>
                    <th>査定進捗率(総戸数比)</th>
                </tr>
                @foreach($buildings as $building)
                <tr>
                    <td>{{ $building->building_name }}</td>
                    <td>{{ $building->total_unit }}</td>
                    <td>
                        @if(isset($building->rooms->published_price))
                        {{ count($building->rooms->published_price) }}
                        @endif
                    </td>
                    <td>
                        @if(isset($building->rooms->expected_price))
                        {{ count($building->rooms->expected_price) }}</td>
                        @endif
                    <td>
                        @if(isset($building->rooms->expected_price) && isset($building->room->total_unit))
                        {{ round($building->rooms->expected_price / $building->total_unit * 100,2) }}
                        @endif
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
