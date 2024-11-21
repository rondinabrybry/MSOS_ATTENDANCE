<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <!-- Display Profile Picture -->
        <div>
            <x-input-label for="profile_image" :value="__('Profile Picture')" />
            <div class="flex items-center">
                @if ($user->profile_image)
                    <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Profile Picture" class="w-24 h-24 rounded-full object-cover mr-4">
                @else
                    <span class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center mr-4">No Image</span>
                @endif
                <x-text-input id="profile_image" name="profile_image" type="file" class="mt-1 block w-full" accept=".jpg,.jpeg,.png" />
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('profile_image')" />
        </div>

        <div>
            <x-input-label for="rf_id">
                RF ID
                <span style="color: rgb(145, 145, 145);">(Read only.)</span>
            </x-input-label>
            <x-text-input id="rf_id" name="rf_id" type="number" class="mt-1 block w-full" :value="old('rf_id', $user->rf_id)" placeholder="RD ID" readonly/>
            <x-input-error class="mt-2" :messages="$errors->get('rf_id')" />
        </div>

            <div>
                <x-input-label for="student_id" :value="__('Student ID')" />
                <x-text-input id="student_id" name="student_id" type="number" class="mt-1 block w-full" :value="old('student_id', $user->student_id)"/>
                <x-input-error class="mt-2" :messages="$errors->get('student_id')" />
            </div>

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <x-input-label for="course" :value="__('Course')" />
            <select id="course" name="course" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" required>
                <option value="BIT COMPUTER" {{ old('course', $user->course) == 'BIT COMPUTER' ? 'selected' : '' }}>BIT COMPUTER</option>
                <option value="BIT DRAFTING" {{ old('course', $user->course) == 'BIT DRAFTING' ? 'selected' : '' }}>BIT DRAFTING</option>
                <option value="BIT ELECTRICAL" {{ old('course', $user->course) == 'BIT ELECTRICAL' ? 'selected' : '' }}>BIT ELECTRICAL</option>
                <option value="BIT ELECTRONICS" {{ old('course', $user->course) == 'BIT ELECTRONICS' ? 'selected' : '' }}>BIT ELECTRONICS</option>
                <option value="BSIT" {{ old('course', $user->course) == 'BSIT' ? 'selected' : '' }}>BSIT</option>
                <option value="BSMX" {{ old('course', $user->course) == 'BSMX' ? 'selected' : '' }}>BSMX</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('course')" />
        </div>

        <div>
            <x-input-label for="section" :value="__('Section')" />
            <div class="flex">
            <select id="section" name="section" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" required>
                <option value="1" {{ old('section', $user->section) == '1' ? 'selected' : '' }}>1</option>
                <option value="2" {{ old('section', $user->section) == '2' ? 'selected' : '' }}>2</option>
                <option value="3" {{ old('section', $user->section) == '3' ? 'selected' : '' }}>3</option>
                <option value="4" {{ old('section', $user->section) == '4' ? 'selected' : '' }}>4</option>
            </select>
                <x-input-error class="mt-2" :messages="$errors->get('section')" />

            <select id="section1" name="section1" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" required>
                <option value="A" {{ old('section1', $user->section1) == 'A' ? 'selected' : '' }}>A</option>
                <option value="B" {{ old('section1', $user->section1) == 'B' ? 'selected' : '' }}>B</option>
                <option value="C" {{ old('section1', $user->section1) == 'C' ? 'selected' : '' }}>C</option>
                <option value="D" {{ old('section1', $user->section1) == 'D' ? 'selected' : '' }}>D</option>
                <option value="E" {{ old('section1', $user->section1) == 'E' ? 'selected' : '' }}>E</option>
                <option value="F" {{ old('section1', $user->section1) == 'F' ? 'selected' : '' }}>F</option>
                <option value="G" {{ old('section1', $user->section1) == 'G' ? 'selected' : '' }}>G</option>
                <option value="H" {{ old('section1', $user->section1) == 'H' ? 'selected' : '' }}>H</option>
                <option value="I" {{ old('section1', $user->section1) == 'I' ? 'selected' : '' }}>I</option>
                <option value="J" {{ old('section1', $user->section1) == 'J' ? 'selected' : '' }}>J</option>
            </select>
                <x-input-error class="mt-2" :messages="$errors->get('section1')" />
            </div>
        </div>

        <div>
            <x-input-label for="time_preference">
                Day/Night  
                (<span style="color: red;">If IRREGULAR, choose your main schedule.</span>)
            </x-input-label>
            
            <select id="time_preference" name="time_preference" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" required>
                <option value="Day" {{ old('time_preference', $user->time_preference) == 'Day' ? 'selected' : '' }}>Day</option>
                <option value="Night" {{ old('time_preference', $user->time_preference) == 'Night' ? 'selected' : '' }}>Night</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('time_preference')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>
                <span class="flex-1 text-left mr-2">{{ __('Update Profile') }}</span>
                <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg>
            </x-primary-button>
            

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
