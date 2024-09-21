<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Models\Member;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('member.index', [
            'members' => Member::orderBy('last_name')->orderBy('first_name')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('member.edit', [
            'member' => null
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMemberRequest $request)
    {
        $input = $request->all();
        
        $new_member = new Member($input);
        $new_member->qr_key = fake()->regexify('[A-Za-z0-9_-]{5}');
        $new_member->save();

        return redirect('/members/' . $new_member->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        return view('member.show', [
            'member' => $member
        ]);
    }

    /**
     * Display the virtual card member.
     */
    public function show_card(Member $member)
    {
        return view('member.card', [
            'member' => $member
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        return view('member.edit', [
            'member' => $member
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMemberRequest $request, Member $member)
    {
        $input = $request->all();
        
        $member->fill($input);
        $member->save();

        return redirect('/members/' . $member->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        $member->delete();

        return redirect('/members/');
    }
}
