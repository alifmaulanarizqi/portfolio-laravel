<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Portfolio extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function portfolioCategory(): BelongsTo
    {
        return $this->belongsTo(PortfolioCategory::class, 'portfolio_category_id');
    }

    public function portfolioImages(): HasMany
    {
        return $this->hasMany(PortfolioImage::class, 'portfolio_id');
    }
}
