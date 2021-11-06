<?php

namespace Modules\PageCreation\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\PageCreation\Database\factories\PageFactory;
use Modules\Users\Entities\User;

class Page extends Model
{
    use HasFactory;

    protected $fillable = ['creator_id', 'slug', 'title', 'head_title', 'body'];

    public function creator() {
        return $this->belongsTo(User::class);
    }

    protected static function newFactory()
    {
        return PageFactory::new();
    }
}
