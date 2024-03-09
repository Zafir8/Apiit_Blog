<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class EmailDomainRule implements Rule
{
    protected $allowedDomains;

    public function __construct($allowedDomains)
    {
        $this->allowedDomains = $allowedDomains;
    }

    public function passes($attribute, $value)
    {
        // Extract the domain from the email address
        $emailDomain = explode('@', $value)[1] ?? null;

        // Check if the domain is in the allowed list
        return in_array($emailDomain, $this->allowedDomains);
    }

    public function message(): string
    {
        return 'The :attribute must be a valid email address from the allowed domains.';
    }
}
