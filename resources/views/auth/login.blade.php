<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                    <div class="logo">
                    <img src="/admincss/img/waste/MP2logo.jpg" alt="Logo" class="logo-img">
                  </div>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                  <form method="POST" class="form-validate" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                    <label for="email" class="label-material">Email Address</label>
                      <input id="email" type="email" name="email" 
                      required data-msg="Please enter your email" 
                      class="input-material" autocomplete="email">
                      @error('email')
                                <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="password" class="label-material">Password</label>
                      <input id="password" type="password" name="password" 
                      required data-msg="Please enter your password" 
                      class="input-material" autocomplete="current-password" >
                      @error('password')
                            <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Remember Me -->
                    <div class="form-group mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                            <span class="ms-2 text-sm">{{ __('Remember me') }}</span>
                        </label>
                    </div>
                    <div class="flex items-center">
                        <div class="container-fluid">
                            <button id="login" type="submit" class="btn btn-success">Login</button>
                        @if (Route::has('password.request'))
                                <a class="underline text-sm hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" 
                                href="{{ route('password.request') }}" style="color: white; padding-left: 5px;">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
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
