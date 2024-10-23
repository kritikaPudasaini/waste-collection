<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

         <!-- Phone -->
        <div>
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" pattern="\d{10}" title="Phone number must be exactly 10 digits" required autofocus autocomplete="phone" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

         <!-- Address -->
        <div>
            <x-input-label for="address" :value="__('Address')" />
            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus autocomplete="address" />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>


        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="form-group mt-4">
            <label for="area_id">Area</label>
            <select id="area_id" name="area_id" class="form-control" required>
                <option value="">Select an area</option>
                @foreach ($areas as $area)
                    <option value="{{ $area->id }}">{{ $area->address }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mt-4">
        <input type="hidden" class="form-control" name="role_id" value="2"> <!-- Default role ID for "user" -->
        </div>
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>




<form class="text-left form-validate" method="POST" action="{{ route('register') }}">
                    <!-- Name-->
                    <div class="form-group-material">
                        <label for="name" class="label-material">Name</label>
                        <input id="name" type="text" name="name" :value="old('name')" required data-msg="Please enter your name" class="input-material" autofocus autocomplete="name" >
                    </div>
                    
                    <!-- Email -->
                    <div class="form-group-material">
                        <label for="email" class="label-material">Email Address</label>
                      <input id="email" type="email" name="email" :value="old('email')" required data-msg="Please enter a valid email address" class="input-material" autocomplete="email">
                    </div>

                      <!-- Phone -->
                      <div class="form-group-material">
                          <label for="phone" class="label-material">Phone</label>
                        <input id="phone" type="text" name="phone" :value="old('phone')" required data-msg="Please enter a valid phone number" class="input-material" autocomplete="phone">
                      </div>

                       <!-- Address -->
                       <div class="form-group-material">
                           <label for="address" class="label-material">Address</label>
                        <input id="address" type="text" name="address" :value="old('address')" required data-msg="Please enter your " class="input-material" autocomplete="address">
                      </div>
                      <!-- Password -->
                    <div class="form-group-material">
                        <label for="password" class="label-material">Password</label>
                      <input id="password" type="password" name="password" required data-msg="Please enter your password" class="input-material" autocomplete="new-password">
                    </div>

                     <!-- Confirm Password -->
                     <div class="form-group-material">
                         <label for="password_confirmation" class="label-material">Password</label>
                        <input id="password" type="password" name="password" required data-msg="Please enter your password" class="input-material" autocomplete="new-password">
                      </div>
                      <!-- Area -->
                      <div class="form-group-material">
                        <label for="area_id">Area</label>
                        <select id="area_id" name="area_id" class="form-control" required>
                            <option value="">Select an area</option>
                            @foreach ($areas as $area)
                                <option value="{{ $area->id }}">{{ $area->address }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group terms-conditions text-center">
                        <label for="register-agree">I agree with the terms and policy</label>
                      <input id="register-agree" name="registerAgree" type="checkbox" required value="1" data-msg="Your agreement is required" class="checkbox-template">
                    </div>
                    <div class="form-group text-center">
                      <input id="register" type="submit" value="Register" class="btn btn-primary">
                    </div>
                  </form><small>Already have an account? </small><a href="{{ route('login') }}" class="signup">Login</a>