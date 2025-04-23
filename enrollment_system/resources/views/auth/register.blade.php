<x-guest-layout>
    <div style="padding-top: 150px;">
        <div style="position: fixed; top: 0; left: 0; width: 100%; background-color: #890000; color: #fff; padding: 10px 20px; display: flex; justify-content: space-between; align-items: center;">
            <div style="display: flex; align-items: center;">
                <img src="https://upload.wikimedia.org/wikipedia/en/thumb/3/3d/University_of_the_Philippines_Manila_Seal.svg/1200px-University_of_the_Philippines_Manila_Seal.svg.png" alt="UPM Logo" style="width: 50px; height: 50px; margin-right: 10px;">
                <div style="font-size: 24px; font-weight: bold;"><a href="{{ url('/') }}" style="text-decoration: none; color: inherit;">UPM ENROLLMENT SYSTEM</a></div>
            </div>
        </div>

        <div style="display: flex; justify-content: center; align-items: flex-start; height: calc(100vh - 70px); padding: 0 20px;">
            <div style="background-color: #890000; color: #fff; padding: 40px; border-radius: 10px; width: 100%; max-width: 400px;">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div style="position: relative; margin-bottom: 35px;">
                        <x-input-label for="name" :value="__('Name')" style="position: absolute; top: -20px; left: -5px; background-color: #890000; padding: 0 5px;"/>
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" style="padding-top: 10px; width: 100%; max-width: 390px;"/>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>


                    <div style="position: relative; margin-bottom: 35px;">
                        <x-input-label for="email" :value="__('Email')" style="position: absolute; top: -20px; left: -5px; background-color: #890000; padding: 0 5px;"/>
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" style="padding-top: 10px; width: 100%; max-width: 390px;"/>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>


                    <div style="position: relative; margin-bottom: 35px;">
                        <x-input-label for="password" :value="__('Password')" style="position: absolute; top: -20px; left: -5px; background-color: #890000; padding: 0 5px;"/>
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" style="padding-top: 10px; width: 100%; max-width: 390px;"/>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>


                    <div style="position: relative; margin-bottom: 35px;">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" style="position: absolute; top: -20px; left: -5px; background-color: #890000; padding: 0 5px;"/>
                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" style="padding-top: 10px; width: 100%; max-width: 390px;"/>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div style="position: relative; margin-bottom: 20px;">
                        <x-input-label for="role" :value="__('Role')" />
                        <select id="role" name="role" class="block mt-1 w-full">
                            <option value="" disabled selected>Select Role</option>
                            <option value="student">Student</option>
                            <option value="professor">Professor</option>
                        </select>
                        <x-input-error :messages="$errors->get('role')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm" style="color: #27D46D;" href="{{ route('login') }}">
                            <b>{{ __('Already registered?')}}</b>
                        </a>
                        <x-primary-button style="background-color: #0E4424; color: #fff; padding: 10px 20px; border: none; border-radius: 10px; cursor: pointer; font-size: 15px; margin-left: 100px;">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>