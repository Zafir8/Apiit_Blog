<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class EmailDomainRule implements Rule
{
    protected $allowedDomains;
    protected $userType;

    public function __construct(array $allowedDomains, string $userType)
    {
        $this->allowedDomains = $allowedDomains;
        $this->userType = $userType;
    }

    public function passes($attribute, $value)
    {
        // If all domains are allowed for alumni, return true
        if ($this->userType === 'alumni' && in_array('*', $this->allowedDomains)) {
            return true;
        }

        // Otherwise, check the domain against allowed domains
        $emailDomain = substr(strrchr($value, "@"), 1);
        return in_array($emailDomain, $this->allowedDomains);
    }

    public function message()
    {
        return match ($this->userType) {
            'student' => 'Students must use an email ending with @students.apiit.lk.',
            'staff' => 'Staff must use an email ending with @apiit.lk.',
            'alumni' => 'Alumni can use any email, but NIC or passport verification is required.',
            default => 'Invalid email domain for the selected user type.'
        };
    }
}
