<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'quantity',
        'status'
    ];



    public static function filterActivities($from, $to, $query)
    {
        return static::query()
            ->with('product', 'user')
            ->whereBetween('created_at', [$from, $to])
            ->whereHas('product', function ($q) use ($query) {
                return $q->where('name', 'like', "%$query%");
            })
            ->oldest()
            ->get();
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
