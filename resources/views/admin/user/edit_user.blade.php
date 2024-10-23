<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">
    	.div_deg{
    		display: flex;
    		/* justify-content: center;
    		align-items:center; */
    		margin:10; 
    	}

    	input[type='text']
    	{
    		width: 400px;
    		height: 50px;
    	}

      input[type='number']
    	{
    		background:black;
    	}
    </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
  <div class="page-content">
    <div class="page-header">
    </div>
    <div class="container-fluid">
        <h1>Update User</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="div_deg">
            <form action="{{ url('update_user', $user->id) }}" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
                </div>
                <div class="form-group">
                    <input type="text" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}" pattern="\d{10}" title="Phone number must be exactly 10 digits">
                </div>
                <div class="form-group">
                    <input type="text" name="address" class="form-control" value="{{ old('address', $user->address) }}">
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role_id" id="role" class="form-control">
                        @foreach($roles as $role)
                            <option style="background-color:skyblue;" value="{{ $role->id }}" {{ $role->id == old('role_id', $user->role_id) ? 'selected' : '' }}>{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="area">Area</label>
                    <select name="area_id" id="area" class="form-control">
                        @foreach($areas as $area)
                            <option style="background-color:skyblue;" value="{{ $area->id }}" {{ $area->id == old('area_id', $user->area_id) ? 'selected' : '' }}>{{ $area->address }}</option>
                        @endforeach
                    </select>
                </div>
                <input class="btn btn-success" type="submit" value="Update User">
                <a href="{{ url('/view_user') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>

    <!-- JavaScript files-->
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
  </body>
</html>