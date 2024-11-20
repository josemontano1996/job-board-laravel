<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobOffer extends Model
{
    /** @use HasFactory<\Database\Factories\JobOfferFactory> */
    use HasFactory;


    public static array $experience = ['entry', 'intermediate', 'senior'];
    public static array $category = ['IT', 'Finance', 'Sales', 'Marketing'];

    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }

    public function scopeFilterByTitleAndDescription(Builder $query, ?string $searchQuery): Builder
    {

        return $query->when(
            $searchQuery,
            function ($query) use ($searchQuery) {
                $query->where(function ($query) use ($searchQuery) {
                    $query->where('title', 'like', '%' . $searchQuery . '%')
                        ->orWhere('description', 'like', '%' . $searchQuery . '%');
                });
            }
        );

    }

    public function scopeFilterByMinSalary(Builder $query, ?int $minSalary): Builder
    {
        return $query->when(
            $minSalary,
            function ($query) use ($minSalary) {
                $query->where('salary', '>=', $minSalary);
            }
        );
    }

    public function scopeFilterByMaxSalary(Builder $query, ?int $maxSalary): Builder
    {
        return $query->when(
            $maxSalary,
            function ($query) use ($maxSalary) {
                $query->where('salary', '<=', $maxSalary);
            }
        );

    }

    public function scopeFilterByExperience(Builder $query, ?string $experienceLevel): Builder
    {
        return $query->when(
            $experienceLevel,
            function ($query) use ($experienceLevel) {
                $query->where('experience', $experienceLevel);
            }
        );
        ;
    }

    public function scopeFilterByJobCategory(Builder $query, ?string $jobCategory): Builder
    {
        return $query->when(
            $jobCategory,
            function ($query) use ($jobCategory) {
                $query->where('category', $jobCategory);
            }
        );
    }

}



