<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        $payments = \App\Helpers::getSheetValues("TRESORERIE", 600);

        # Check header
        if(!($payments[0][1] == "Membre" && $payments[0][2] == "Payement"))
            throw new \ValueError("Unexpected GSheet header for 'Trésorerie'.");

        # Try to find a match
        foreach($payments as $row)
        {
            if(
                $row[2] == "Cotisation" &&
                $row[1] == $this->last_name . " " . $this->first_name
            )
                return true;
        }
        return false;
    }
}
