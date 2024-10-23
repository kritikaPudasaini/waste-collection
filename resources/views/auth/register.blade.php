<x-guest-layout>
    <div class="login-page">
      
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                    <!-- <h1>Waste Collection</h1> -->
                    <img src="/admincss/img/waste/MP2logo.jpg" alt="Logo" class="logo-img">
                  </div>
                </div>
              </div>
            </div>

            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                <form method="POST" action="{{ route('register') }}">
                  @csrf
                  <!-- Name -->
                  <div class="form-group-material">
                      <label for="name" class="label-material">Name</label>
                      <input id="name" class="input-material" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" data-msg="Please enter your name" />
                      @error('name')
                          <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                      @enderror
                  </div>

                  <!-- Email Address -->
                  <div class="form-group-material mt-4">
                      <label for="email" class="label-material">Email Address</label>
                      <input id="email" class="input-material block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" data-msg="Please enter a valid email address">
                      @error('email')
                          <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                      @enderror
                  </div>

                <!-- Phone -->
                <div class="form-group-material mt-4">
                    <label for="phone" class="label-material">Phone</label>
                    <input id="phone" class="input-material block mt-1 w-full" type="text" name="phone" :value="old('phone')" pattern="\d{10}" title="Phone number must be exactly 10 digits" required autofocus autocomplete="phone" data-msg="Please enter a valid phone number">
                    @error('phone')
                        <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                    @enderror
                </div>

                  <!-- Address -->
                <div class="form-group-material mt-4">
                    <label for="address" class="label-material">Address</label>
                    <input id="address" class="input-material block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus autocomplete="address" data-msg="Please enter your address">
                    @error('address')
                        <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                    @enderror
                </div>
      
                  <!-- Password -->
                  <div class="form-group-material mt-4">
                      <label for="password" class="label-material">Password</label>
                      <input id="password" class="input-material block mt-1 w-full" type="password" name="password" required autocomplete="new-password" data-msg="Please enter your password">
                      @error('password')
                          <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                      @enderror
                  </div>

                    <!-- Confirm Password -->
                    <div class="form-group-material mt-4">
                        <label for="password_confirmation" class="label-material">Confirm Password</label>
                        <input id="password_confirmation" class="input-material block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" data-msg="Please confirm your password">
                        @error('password_confirmation')
                            <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                        @enderror
                    </div>


                      <!-- Area -->
                      <div class="form-group-material mt-4">
                          <lable for="area_id" class="label-material" style="color:white;">Area</label>
                          <select id="area_id" name="area_id" style="color: #131413;" class="rounded-md" required>
                              <option value="">Select an area</option>
                              @foreach ($areas as $area)
                                  <option value="{{ $area->id }}">{{ $area->address }}</option>
                              @endforeach
                          </select>
                          @error('area_id')
                                <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                            @enderror
                      </div>

                        <!-- Hidden Role ID -->
                        <div class="form-group mt-4">
                            <input type="hidden" class="form-control" name="role_id" value="2"> <!-- Default role ID for "user" -->
                        </div>

                      <!-- Submit Button -->
                      <div class="flex items-center mt-4">
                          <div class="container-fluid">
                            <button type="submit" class="btn btn-success">Register</button>
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md 
                            focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" 
                            href="{{ route('login') }}" style="color:white; padding-left:5px;">
                              Already registered?</a>
                          </div>
                        </div>
                      </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</x-guest-layout>