<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ProxyExportFormatRule implements Rule
{

    private array $formats = [
        'ip:port@login:password',
        'ip@login:password',
        'ip',
        'ip:port',
    ];

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return in_array($value, $this->formats);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Given format is invalid';
    }
}
