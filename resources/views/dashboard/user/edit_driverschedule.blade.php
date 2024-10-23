<!DOCTYPE html>
<html>
  <head> 
    @include('dashboard.css')
  </head>
  <body>
    @include('dashboard.header')
    @include('dashboard.sidebar')
    <style type="text/css">

    	input[type='text']
    	{
    		width: 300px;
    		height: 40px;	
       
    	}

        .form-group label{
            color:white;
        }

    	.div_deg
    	{
    		display: flex;
    		margin: 30px;
    	}

    	.table_deg{

    		border: 2px solid yellowgreen;
    		margin-top: 50px;
    		margin-left: 10px;

    	}

    	th{
    		background-color: skyblue;
    		padding: 15px;
    		font-size: 20px;
    		font-weight: bold;
    		color:white;
    	}

    	td{
    		color: white;
    		padding: 10px;
    		border: 1px solid skyblue;

    	}
      input[type='search']{
        width: 300px;
        height: 40px;
        margin-left:20px;
      }
    </style>
      <!-- Sidebar Navigation end-->
    <div class="page-content">
        <div class="page-header">
        </div>
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
        <h1 style="color:white;">Update Schedule</h1>
        <div class="div_deg">
            <form action="{{ url('update_driverschedule', $schedule->id) }}" method="post">
            		@csrf
                    <div class="form-group">
                        <input type="text" name="collection_day" class="form-control" value="{{$schedule->collection_day}}">
                    </div>
                    <div class="form-group">
                      <input type="number" name="collection_time" class="form-control" value="{{ \Carbon\Carbon::parse($schedule->collection_time)->format('H') }}" required min="0" max="23" step="1" placeholder="collection time(Hour) only">
                    </div>
                    <div class="form-group">
                        <label for="area">Area</label>
                        <select name="area_id" id="area" class="form-control">
                            @foreach($areas as $area)
                                <option value="{{ $area->id }}" {{ $area->id == $schedule->area_id ? 'selected' : '' }}>{{ $area->address }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option style="color:skyblue;" value="pending" {{ $schedule->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option style="color:skyblue;" value="completed" {{ $schedule->status == 'completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                    </div>
                    <button class="btn btn-success" type="submit">Update Schedule</button>
                    <a href="{{ url('/view_schedule') }}" class="btn btn-secondary">Cancel</a>
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