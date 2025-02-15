<?php

namespace App\Rules;

use Closure;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\ValidationRule;

class MinimumPostRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $user = User::where('email', $value)->first();
        if ($user && $user->posts->count() == 0) {
            $fail('You must be having alteast one posts.');
        }
    }
}
