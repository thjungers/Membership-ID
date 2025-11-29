<?php

namespace App\Http\Controllers;

use App\Http\Requests\DetailsPinRequest;
use App\Models\Member;

class CardController extends Controller
{
    /**
     * Display the virtual member card.
     */
    public function show_card(Member $member)
    {
        return view('member.card', [
            'member' => $member,
            'details' => false,
            'season' => env("APP_SEASON"),
        ]);
    }

    /**
     * Display a form to prompt the user for a PIN
     */
    public function prompt_pin()
    {
        return view('member.pin-form');
    }

    /**
     * Display the member card details if PIN is valid
     */
    public function show_details(DetailsPinRequest $request, Member $member)
    {
        if ($member->pin != $request->pin) {
            return redirect()
                ->route('card.prompt', ['member' => $member])
                ->withErrors(['pin' => 'PIN incorrect']);
        }
        return view('member.card', [
            'member' => $member, 
            'details' => true,
            'season' => env("APP_SEASON"),
        ]);
    }
}
