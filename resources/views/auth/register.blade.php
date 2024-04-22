<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Dropdown for selecting user type -->
            <div class="mb-4">
                <label for="user_type" class="block text-sm font-medium text-gray-700">Register as:</label>
                <select id="user_type" name="user_type" class="block mt-1 w-full" onchange="toggleUserFields()">
                    <option value="">Select</option>
                    <option value="student">Student</option>
                    <option value="staff">Staff</option>
                    <option value="alumni">Alumni</option>
                </select>
            </div>

            <!-- Container for all dynamic fields -->
            <div id="registrationFields" style="display: none;">

                <!-- Alumni specific fields -->
                <div id="alumniFields" style="display: none;">
                    <x-label for="nic_or_passport" :value="__('NIC or Passport')" />
                    <x-input id="nic_or_passport" class="block mt-1 w-full" type="text" name="nic_or_passport" :value="old('nic_or_passport')" />
                </div>

                <!-- Student specific fields -->
                <div id="studentFields" style="display: none;">
                    <x-label for="cb_number" :value="__('CB Number')" />
                    <x-input id="cb_number" class="block mt-1 w-full" type="text" name="cb_number" :value="old('cb_number')" />

                    <x-label for="degree" :value="__('Degree')" />
                    <x-input id="degree" class="block mt-1 w-full" type="text" name="degree" :value="old('degree')" />

                    <x-label for="level" :value="__('Level')" />
                    <select id="level" name="level" class="block mt-1 w-full">
                        <option value="4">Level 4</option>
                        <option value="5">Level 5</option>
                        <option value="6">Level 6</option>
                    </select>
                </div>

                <!-- School field for all user types -->
                <x-label for="school" :value="__('School')" />
                <select id="school" name="school" class="block mt-4 w-full" required>
                    <option value="computing">Computing</option>
                    <option value="business">Business</option>
                    <option value="law">Law</option>
                </select>

                <!-- Common registration fields -->
                <x-label for="name" :value="__('Name')" />
                <x-input id="name" class="block mt-4 w-full" type="text" name="name" :value="old('name')" required autofocus />

                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-4 w-full" type="email" name="email" :value="old('email')" required />

                <x-label for="password" :value="__('Password')" />
                <x-input id="password" class="block mt-4 w-full" type="password" name="password" required autocomplete="new-password" />

                <x-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-input id="password_confirmation" class="block mt-4 w-full" type="password" name="password_confirmation" required />

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-label for="terms">
                            <div class="flex items-center">
                                <x-checkbox name="terms" id="terms" />
                                <div class="ml-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-label>
                    </div>
                @endif

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-button class="ml-4">
                        {{ __('Register') }}
                    </x-button>
                </div>
            </div> <!-- End of registrationFields -->
        </form>
    </x-authentication-card>
</x-guest-layout>

<script>
    function toggleUserFields() {
        var userType = document.getElementById('user_type').value;
        var registrationFields = document.getElementById('registrationFields');
        var alumniFields = document.getElementById('alumniFields');
        var studentFields = document.getElementById('studentFields');

        // Hide all fields initially
        registrationFields.style.display = 'none';
        alumniFields.style.display = 'none';
        studentFields.style.display = 'none';

        // Display fields based on the selected user type
        if (userType === 'alumni' || userType === 'student' || userType === 'staff') {
            registrationFields.style.display = 'block';
            alumniFields.style.display = userType === 'alumni' ? 'block' : 'none';
            studentFields.style.display = userType === 'student' ? 'block' : 'none';
        }
    }
</script>
