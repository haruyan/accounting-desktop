<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $fillable = ['date', 'account_id', 'account_number', 'activity_type', 'activity_desc', 'budget_type', 'amount'];
}
