<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">

     .form-group label{
            color:white;
        }
    
    	.div_deg{
    		display: flex;
    		margin:60px; 
    	}

    	input[type='text']
    	{
    		width: 300px;
    		height: 50px;
    	}
      input[type='number']
    	{
    		width: 300px;
    		height: 50px;
    	}
    </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
          @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
          <h1 style="color:white;">Update Area</h1>
            	<form action="{{ url('update_area', $area->id) }}" method="post">
            		@csrf
            		<div class="form-group">
                        <label for="local_unit">Local Unit</label>
                         <input type="text" class="form-control" name="local_unit" value="{{$area->local_unit}}">
                     </div>
                        
                     <div class="form-group">
                        <label for="ward_no">Ward No</label>
                         <input type="number" class="form-control" name="ward_no" value="{{$area->ward_no}}">
                     </div>
                         
                     <div class="form-group">
                        <label for="address">Local Address</label>
                        <input type="text" class="form-control" name="address" value="{{$area->address}}">
                     </div>
                         <button class="btn btn-success" type="submit">Update Area</button>
                         <a href="{{ url('/view_area') }}" class="btn btn-secondary">Cancel</a>
                     </div>
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