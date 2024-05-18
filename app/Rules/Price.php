<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Price implements ValidationRule {
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void {

        if (!is_numeric($value)) {
            $fail('The :attribute must be a valid number.');
        }

        if ($value <= 0) {
            $fail('The :attribute must be bigger than 0.');
        }
    }
}
