<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    // protected $casts = ["value" => "array"];
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'logo','application_title', 'application_credit', 'developer_url','copyright_text','maintenance_words'
    ];
}
