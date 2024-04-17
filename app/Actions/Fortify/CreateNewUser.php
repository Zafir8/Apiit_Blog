<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Rules\EmailDomainRule;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    public function create(array $input): User
    {
        $userType = $input['user_type'] ?? 'student';
        $domains = [
            'student' => ['students.apiit.lk'],
            'staff' => ['apiit.lk'],
            'alumni' => ['*'] // Assume all domains are allowed for alumni
        ];

        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users',
                new EmailDomainRule($domains[$userType], $userType),
            ],
            'password' => $this->passwordRules(),
            'user_type' => ['required', 'in:student,staff,alumni'],
            'school' => ['required_if:user_type,!=,alumni', 'string', 'max:255'],
            'terms' => ['accepted', 'required'],
        ];

        // Conditionally apply rules only for students
        if ($userType === 'student') {
            $rules['cb_number'] = ['required', 'string'];
            $rules['degree'] = ['required', 'string'];
            $rules['level'] = ['required', 'string'];
        }

        // Conditionally apply nic_or_passport rules only for alumni
        if ($userType === 'alumni') {
            $rules['nic_or_passport'] = [
                'required', 'string',
                function ($attribute, $value, $fail) {
                    if (!DB::table('allowed_users')->where('NIC_or_passport', $value)->exists()) {

                        $fail('The NIC or Passport number with the given name is not recognized or not allowed.');
                    }
                },
            ];
        }

        Validator::make($input, $rules)->validate();

        $userAttributes = [
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'user_type' => $userType,
            'school' => $input['school'] ?? null, // Nullable for alumni
            'cb_number' => $input['cb_number'] ?? null,
            'degree' => $input['degree'] ?? null,
            'level' => $input['level'] ?? null,
            'nic_or_passport' => $input['nic_or_passport'] ?? null, // Nullable for non-alumni
        ];

        $user = User::create($userAttributes);

        return $user;
    }
}
