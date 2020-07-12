<?php

namespace App\Http\Controllers;


use App\Models\EventItem;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    //
    public function index() {
        $models = EventItem::Paginate(10);
        return view('admin.index', ['models' => $models, 'title' => 'admin page']);
    }

    public function show($id) {
        $model = EventItem::find($id);
        return view('admin.page2', ['model' => $model, 'event_item_id'=> $id, 'title' => 'event page']);
    }

}
