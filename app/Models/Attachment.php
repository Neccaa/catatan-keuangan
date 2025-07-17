<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $fillable = ['transaction_id', 'file_path'];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
