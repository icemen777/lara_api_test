<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\EventItem;
use Illuminate\Http\Request;
use App\Service\MemberService;

class MemberController extends Controller
{

    public function eventMembers($id) 
    {
        $models = EventItem::find($id)->members()->Paginate(10);
        return response()->json($models, 200);
    }


    /**
     * Store a newly created resource in storage.

     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|unique:members',
            'event_item_id' => 'required|exists:event_items,id'
        ]);

        $member = new Member([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'event_item_id' => $request->get('event_item_id')
        ]);
        $member->save();
        MemberService::sendMail($request->get('email'));
        return response()->json(['created' => 'true'], 201);
    }


    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|unique:members,email,'.$id
        ]);

        $member = Member::find($id);

        $member->first_name = $request->get('first_name');
        $member->last_name = $request->get('last_name');
        $member->email = $request->get('email');

        $member->save();
        MemberService::sendMail($request->get('email'), 'Ваши данные изменены.');
        return response()->json(['created' => 'true'], 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Member::find($id)->delete();
        return response()->json(null, 204);
    }
}
