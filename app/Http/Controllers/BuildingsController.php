<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Building;
use App\Room;

class BuildingsController extends Controller
{
    /* 
    *全建物データ取得
    *
    */
    public function index()
    {
        
        $builings = Building::getWithRooms();
        return view('welcome',['buildings' => $builings]);
    }
    /* 
    * @param $building->id
    *
    */
    public function show(Request $request,$id)
    {
        $rooms = new Room();
        $building = Building::select('id','building_name')->find($id);
        //部屋番号検索
        $keyword = $request->input('room_number');
        if(!empty($keyword)){
            $query = Room::with('building');
            $query->where('building_id','=',$id);
            $query->where(function ($query) use($keyword) {
                $query->where('room_number',$keyword)->orWhere('room_number','like','%'.$keyword);
            });
            $rooms = $query->orderBy('created_at')->get();
        }else{
            $rooms = $rooms->getForRoomsShow($id);
        }
        $prices = [];
        
        return view('buildings.show',compact('rooms','building','prices'));
    }
    
}
