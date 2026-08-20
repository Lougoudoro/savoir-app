<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

abstract class BaseModel extends Model
{
    use HasFactory;

    public static array $stringLimits = [];

    public function getModelName(): string
    {
        return Str::afterLast(static::class, '\\');
    }

    public function getModelIdentifier(): string
    {
        return (string) $this->id;
    }

    public function getModelLabel(): string
    {
        return (string) $this->id;
    }

    public static function options(string $valueName = 'name'): array
    {
        return static::get()->options($valueName);
    }

    public function isOlderThanMinutes(int $minutes): bool
    {
        return $this->created_at->addMinutes($minutes)->isPast();
    }

    public function scopeCreatedAfter(Builder $query, Carbon $date): Builder
    {
        return $query->whereDate('created_at', '>=', $date);
    }

    public function scopeCreatedBefore(Builder $query, Carbon $date): Builder
    {
        return $query->whereDate('created_at', '<=', $date);
    }

    public function scopeWhereCreatedAt(Builder $query, Carbon $date): Builder
    {
        return $query->whereDate('created_at', $date);
    }

    public static function random(): ?self
    {
        return static::inRandomOrder()->first();
    }
}
