<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaveDataModel extends Model
{
    protected $table="purchase_code_verifier";
    protected $fillable = [
        'id',
        'item_id',
        'item_name',
        'purchase_code',
        'installed_version',
        'purchase_time',
        'buyer',
        'activated_domain',
        'license',
        'user_agent',
        'ip',
        'os',
        'purchase_count',
        'status',
        'hash',
        'decryption_key',
        'last_validate_request',
    ];
    
}
