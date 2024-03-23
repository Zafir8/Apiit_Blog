<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <!-- Toggle Button for Alumni Form -->
        <div class="flex justify-end mb-4">
            <button type="button" id="toggleAlumniForm" class="px-4 py-2 text-white bg-black hover:bg-gray-500 rounded-md focus:outline-none">
                Alumni
            </button>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Hidden input to differentiate alumni registration -->
            <input type="hidden" name="is_alumni" id="is_alumni" value="0">

            <!-- Alumni specific fields -->
            <div id="alumniFields" style="display: none;">
                <x-label for="nic_or_passport" value="{{ __('NIC or Passport') }}" />
                <x-input id="nic_or_passport" class="block mt-1 w-full" type="text" name="nic_or_passport"  />
            </div>

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <label for="school" class="block text-sm font-medium text-gray-700">{{ __('School') }}</label>
                <select id="school" name="school" class="block mt-1 w-full" required>
                    <option value="faculty">{{ __('Faculty') }}</option>
                    <option value="computing">{{ __('Computing') }}</option>
                    <option value="business">{{ __('Business') }}</option>
                    <option value="law">{{ __('Law') }}</option>
                </select>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms"/>

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
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

<script>
    document.getElementById('toggleAlumniForm').addEventListener('click', function() {
        var alumniFields = document.getElementById('alumniFields');
        var isAlumniInput = document.getElementById('is_alumni');
        document.getElementById('toggleAlumniForm').innerText = isAlumniInput.value === '0' ? 'Student/Staff Sign up' : 'Alumni Sign up';



        // Toggle visibility of alumni fields
        alumniFields.style.display = alumniFields.style.display === 'none' ? 'block' : 'none';

        // Toggle the is_alumni hidden input value
        isAlumniInput.value = isAlumniInput.value === '0' ? '1' : '0';
    });
</script>
