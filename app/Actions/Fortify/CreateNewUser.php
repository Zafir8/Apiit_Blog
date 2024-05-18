<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Rules\EmailDomainRule;
use Illuminate\Validation\ValidationException;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    protected $domains = [
        'student' => ['students.apiit.lk'],
        'staff' => ['apiit.lk'],
        'alumni' => ['*'],
        'club' => ['students.apiit.lk', 'apiit.lk']
    ];

    public function create(array $input)
    {
        $validator = Validator::make($input, $this->rules($input), $this->messages());

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $userAttributes = $this->extractUserAttributes($input);
        return User::create($userAttributes);
    }

    protected function rules(array $data): array
    {
        $userType = $data['user_type'] ?? 'student';
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users,email',
                new EmailDomainRule($this->domains[$userType], $userType),
            ],
            'password' => $this->passwordRules(),
            'user_type' => ['required', 'in:student,staff,alumni,club'],
            'terms' => ['accepted', 'required'],
            'school' => $userType === 'student' ? ['required', 'string', 'max:255'] : [],
            'degree' => $userType === 'student' ? ['nullable', 'string', 'max:255'] : ['nullable'],
            'level' => $userType === 'student' ? ['nullable', 'string', 'max:255'] : ['nullable'],
        ];

        if ($userType === 'student') {
            $rules['cb_number'] = [
                'required',
                'string',
                'regex:/^cb\d{6}$/i',
                'unique:users,cb_number'
            ];
        }

        if ($userType === 'alumni') {
            $rules['nic_or_passport'] = [
                'required',
                'string',
                'unique:users,nic_or_passport',
                function ($attribute, $value, $fail) {
                    if (!DB::table('allowed_users')->where('NIC_or_passport', $value)->exists()) {
                        $fail('The NIC or Passport number is not recognized.');
                    }
                },
            ];
        }

        return $rules;
    }

    protected function messages(): array
    {
        return [
            'cb_number.unique' => 'The CB number has already been registered.',
            'cb_number.regex' => 'The CB number must be in the format "cbXXXXXX" where X are digits.',
            'nic_or_passport.unique' => 'The NIC or Passport number has already been registered.',
            'email.unique' => 'The email address is already in use.',
        ];
    }

    protected function extractUserAttributes(array $data): array
    {
        return [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'user_type' => $data['user_type'],
            'school' => $data['school'] ?? null,
            'cb_number' => $data['cb_number'] ?? null,
            'nic_or_passport' => $data['nic_or_passport'] ?? null,
            'degree' => $data['degree'] ?? null,
            'level' => $data['level'] ?? null,
            'role' => $this->determineUserRole($data['user_type']),
        ];
    }

    protected function determineUserRole($userType)
    {
        return match ($userType) {
            'club' => User::ROLE_CLUB,
            default => User::ROLE_USER,
        };
    }
}
