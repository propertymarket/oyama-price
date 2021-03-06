@extends('layouts.app')

@section('title','売買/'.$room->building->building_name)

@section('content')

    <div class="row">
        <h2><a href="{{ route('buildings_show',$room->building_id) }}">{{ $room->building->building_name }}</a>・売買</h2>
            <div class="bottun">
                <a href="{{ route('room_rent',$room->id) }}" class='btn btn-success'>賃貸</a>
            </div>
            </div>
            <table class='table table-striped table-bordered table-sm'>
                <tr>
                    <th>部屋番号</th>
                    <th>階数</th>
                    <th>間取り</th>
                    <th>間取りタイプ</th>
                    <th>方角</th>
                    <th>占有面積</th>
                    <th>掲載中の価格(万円)</th>
                    <th>変更前価格(万円)</th>
                    <th>登録年月日</th>
                    <th>変更年月日</th>
                    <th>成約価格</th>
                    <th>成約前価格</th>
                    <th>登録年月日</th>
                    <th>変更年月日</th>
                    <th>予想売買価格</th>
                    <th>謄本</th>
                    @if($stockSalesRoom || $soldSalesRoom)
                        <th></th>
                    @endif
                </tr>
            <tr>
                <td><a href="{{ route('room_show',$room->id) }}">{{ $room->room_number }}</a></td>
                <td>{{ $room->floor_number }}</td>
                <td>{{ $room->layout }}</td>
                <td>{{ $room->layout_type }}</td>
                <td>{{ $room->direction }}</td>
                <td>{{ $room->occupied_area }}㎡</td>
                <td>
                    @if(isset($stockSalesRoom))
                        {{ $stockSalesRoom->price }}
                    @endif
                </td>
                <td>
                    @if(isset($stockSalesRoom))
                        {{ $stockSalesRoom->previous_price }}
                    @endif
                </td>
                <td>
                    @if(isset($stockSalesRoom))
                        {{ $stockSalesRoom->registered_at }}
                    @endif
                </td>
                <td>
                    @if(isset($stockSalesRoom))
                        {{ $stockSalesRoom->changed_at }}
                    @endif
                </td>
                <td>
                    @if(isset($soldSalesRoom))
                        {{ $soldSalesRoom->price }}
                    @endif
                </td>
                <td>
                    @if(isset($soldSalesRoom))
                        {{ $soldSalesRoom->previous_price }}
                    @endif
                </td>
                <td>
                    @if(isset($soldSalesRoom))
                        {{ $soldSalesRoom->registered_at }}
                    @endif
                </td>
                <td>
                    @if(isset($soldSalesRoom))
                        {{ $soldSalesRoom->changed_at }}
                    @endif
                </td>
                <td>{{ $room->expected_price }}</td>
                
                <td><a href="#">リンク</a></td>
                @if($stockSalesRoom || $soldSalesRoom)
                    <td>
                        <a href="{{ route('sales_edit',$room->id) }}">編集</a>
                    </td>
                @endif
            </tr>
            </table>     
            <p>新規登録</p>
            <a href="{{ route('stock_sales_create',$room->id) }}">売買在庫</a>
            <a href="{{ route('stock_rent_create',$room->id) }}">/賃貸在庫</a>
            <a href="{{ route('sold_sales_create',$room->id) }}">/売買成約</a>
            <a href="{{ route('sold_rent_create',$room->id) }}">/賃貸成約</a>  
    </div>
@endsection