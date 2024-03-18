<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class EmailDomainRule implements Rule
{
    protected $allowedDomains;
    protected $enforceDomainRestriction;

    public function __construct($allowedDomains, $enforceDomainRestriction = true)
    {
        $this->allowedDomains = $allowedDomains;
        $this->enforceDomainRestriction = $enforceDomainRestriction;
    }

    public function passes($attribute, $value)
    {
        // If domain restriction enforcement is turned off, automatically pass validation
        if (!$this->enforceDomainRestriction) {
            return true;
        }

        // Extract the domain from the email address
        $emailDomain = explode('@', $value)[1] ?? null;

        // Check if the domain is in the allowed list
        return in_array($emailDomain, $this->allowedDomains);
    }

    public function message(): string
    {
        return 'You are not allowed to register with this email domain. Please use APIIT email addresses only. If you are an alumnus, please press the button above ';
    }
}
