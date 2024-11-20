<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function jobApplications(): HasMany
    {
        return $this->hasMany(JobApplication::class);
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


    public function scopeFilterByEmployerName(Builder $query, ?string $employerName): Builder
    {
        return $query->when(
            $employerName,
            function ($query) use ($employerName) {
                $query->orWhereHas('employer', function ($query) use ($employerName) {
                    $query->where('company_name', 'like', '%' . $employerName . '%');
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



