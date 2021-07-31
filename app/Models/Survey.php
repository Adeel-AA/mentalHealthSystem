<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function questionCategories()
    {
        return $this->belongsTo(questionCategory::class);
    }

    public function responses()
    {
        return $this->hasMany(SurveyResponse::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
