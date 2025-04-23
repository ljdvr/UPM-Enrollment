<x-guest-layout>
    <div style="padding-top: 150px;">
        <div style="position: fixed; top: 0; left: 0; width: 100%; background-color: #890000; color: #fff; padding: 10px 20px; display: flex; justify-content: space-between; align-items: center;">
            <div style="display: flex; align-items: center;">
                <img src="https://upload.wikimedia.org/wikipedia/en/thumb/3/3d/University_of_the_Philippines_Manila_Seal.svg/1200px-University_of_the_Philippines_Manila_Seal.svg.png" alt="UPM Logo" style="width: 50px; height: 50px; margin-right: 10px;">
                <div style="font-size: 24px; font-weight: bold;"><a href="{{ url('/') }}" style="text-decoration: none; color: inherit;">UPM ENROLLMENT SYSTEM</a></div>
            </div>
        </div>
        <div style="display: flex; justify-content: center; align-items: flex-start; height: calc(100vh - 70px); padding: 0 20px;"> <!-- Adjusted padding -->
            <div style="background-color: #890000; color: #fff; padding: 40px; border-radius: 10px; width: 100%; max-width: 400px;">
                <x-auth-session-status class="mb-4" :status="session('status')" />
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div style="position: relative; margin-bottom: 35px;">
                        <x-input-label for="email" :value="__('Email')" style="position: absolute; top: -20px; left: -5px; background-color: #890000; padding: 0 5px;"/>
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" style="padding-top: 10px; width: 100%; max-width: 390px;"/> <!-- Adjusted width -->
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div style="position: relative; margin-bottom: 35px;">
                        <x-input-label for="password" :value="__('Password')" style="position: absolute; top: -20px; left: -5px; background-color: #890000; padding: 0 5px;"/>
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" style="padding-top: 10px; width: 100%; max-width: 390px;"/> <!-- Adjusted width -->
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="ms-3" style="background-color: #0E4424; color: #fff; padding: 10px 20px; border: none; border-radius: 10px; cursor: pointer; font-size: 15px;">
                            {{ __('Log in') }}
                        </x-primary-button>
                        <span class="mt-3 text-center" style="margin-left: 45px">Don't have an account? <a href="{{ route('register') }}" style= "color: #27D46D;">Register here</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
