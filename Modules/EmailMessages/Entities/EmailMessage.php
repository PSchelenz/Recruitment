<?php

namespace Modules\EmailMessages\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmailMessage extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\EmailMessages\Database\factories\EmailMessageFactory::new();
    }
}
