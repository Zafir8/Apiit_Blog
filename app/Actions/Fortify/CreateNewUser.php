<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str; // Make sure to import Str
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use App\Rules\EmailDomainRule;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     * @return User
     */
    public function create(array $input): User
    {
        // Use the request() helper to check if the registration is for an alumnus
        $enforceDomainRestriction = request()->input('is_alumni') != '1'; // Do not enforce for alumni

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users',
                new EmailDomainRule(['students.apiit.lk', 'apiit.lk'], $enforceDomainRestriction),
            ],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            'school' => ['required', 'string', 'max:255'],
            'nic_or_passport' => [
                'required_if:is_alumni,1',
                function ($attribute, $value, $fail) {
                    if (!empty($value)) {
                        // NIC validation: 12 digits
                        if (is_numeric($value) && strlen($value) == 12) {
                            return true;
                        }
                        // Passport validation: 8 characters, not strictly numeric to allow letters
                        elseif (strlen($value) == 8) {
                            return true;
                        } else {
                            $fail('The ' . $attribute . ' must be either 12 digits for NIC or 8 characters for Passport.');
                        }
                    }
                },
            ],
            // Add any additional fields you need to validate here
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'school' => $input['school'],
            // Handle the NIC or Passport only for alumni
            'nic_or_passport' => request()->input('is_alumni') == '1' ? $input['nic_or_passport'] ?? null : null,
        ]);
    }
}
