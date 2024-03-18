<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicineClassificationMapping extends Model
{
    use HasFactory;

    protected $table = "medicine_classification_mapping";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'medicine_id',
        'classification_id',
        'created_at',
        'updated_at'
    ];
}
