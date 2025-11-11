<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\PaymentMethod;
use App\PaymentMethodType;
use Carbon\Carbon;

class Member extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
    ];

    /**
     * Checks in the treasury google sheet whether this member has paid registration fees (using Google API)
     * 
     * @return bool
     */
    function has_paid_registration()
    {
        $payments = \App\Helpers::getSheetValues("TRESORERIE", env('GAPI_CACHE_TTL'));

        # Check header
        if(!($payments[0][1] == "Membre" && $payments[0][2] == "Payement"))
            throw new \ValueError("Unexpected GSheet header for 'Trésorerie'.");

        # Try to find a match
        foreach($payments as $row)
        {
            if(
                count($row) >= 2 &&
                $row[2] == "Cotisation" &&
                $row[1] == $this->last_name . " " . $this->first_name
            )
                return true;
        }
        return false;
    }

    /**
     * Retrieve the current payment method for the given section, 
     * with the number of remaining sessions and the validity date
     * 
     * @param string $section The section to check, or 'cotisation'
     * 
     * @return ?PaymentMethod
     */
    function current_payment_method($section) {
        if ($section === 'cotisation') {
            return new PaymentMethod(null, null, Carbon::parse(env('VALIDITY_COTISATION')));
        }

        $participations = \App\Helpers::getSheetValues(
            strtoupper($section),
            env('GAPI_CACHE_TTL')
        );
        
        # Check header
        $idx_remaining = array_search("Séances\nrestantes", $participations[0]);
        $idx_part = array_search("Part.\npayantes", $participations[0]);
        $idx_cards = array_search("Carte de\n10 séances", $participations[0]);
        $header_str = json_encode($participations[0]);
        if(!$idx_remaining || !$idx_part || !$idx_cards)
            throw new \ValueError("Unexpected GSheet header for '$section': $header_str");

        # Try to find a match
        foreach($participations as $row)
        {
            if($row[0] == $this->last_name . " " . $this->first_name) {
                if ($row[$idx_remaining] == '∞')
                    return new PaymentMethod(
                        PaymentMethodType::Subscription, 
                        null, 
                        Carbon::parse(env('VALIDITY_SUBSCRIPTION'))
                    );

                if ($row[$idx_remaining] == 0 && $row[$idx_part] == 0)
                    return null;

                return new PaymentMethod(
                    PaymentMethodType::Card,
                    $row[$idx_remaining],
                    $row[$idx_cards] == 0
                        ? Carbon::parse(env('VALIDITY_CARD_OLD'))
                        : Carbon::parse(env('VALIDITY_CARD_NEW'))
                );
            }
        }
        return null;
    }
}
