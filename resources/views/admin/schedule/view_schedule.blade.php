<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">

    	input[type='text']
    	{
    		width: 200px;
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

    
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <form action="{{ url('schedule_search') }}" method="get">
            @csrf
            <input type="search" name="search">
            <input type="submit" class="btn btn-secondary" value="Submit">
          </form>
      </div>
      <div class="container-fluid">
        <h1>Add Schedule</h1>
        
        <div class="div_deg">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                  </ul>
              </div>
          @endif
             <form action="{{ url('add_schedule') }}" method="post">
                 @csrf
                 <div class="form-group">
                    <label for="collection_day">Collection Day</label>
                     <input type="text" name="collection_day" class="form-control">
                </div>
                <div class="form-group">
                  <label for="collection_time">Collection Time (Hour)</label>
                  <input type="number" name="collection_time" class="form-control" value="{{ old('collection_time') }}" required min="0" max="23" step="1">
              </div>
                <div class="form-group">
                    <label for="area">Area</label>
                    <select name="area_id" id="area" class="form-control">
                        @foreach($areas as $area)
                            <option value="{{ $area->id }}" style="background:skyblue;">{{ $area->address }}</option>
                        @endforeach
                    </select>
                </div>
                     <button class="btn btn-success" type="submit">Add Schedule</button>
             </form>
         </div>

       </div>
   
        <table class="table table-striped">
            <tr>
                <th>S.N</th>
                <th>Collection Day</th>
                <th>Collection Time</th>
                <th>Area</th>
                <th>Status</th>
                <th>Actions</th>
              
            </tr>
            @foreach($schedules as $schedule)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $schedule->collection_day }}</td>
                <td>{{ $schedule->collection_time }}</td>
                <td>{{ $schedule->area->address }}</td>
                <td>{{ $schedule->status }}</td>
                <td>
                  <a class="btn btn-success" href="{{ url('edit_schedule', $schedule->id) }}">Edit</a>
                  <a class="btn btn-danger" onclick="confirmation(event)" href="{{ url('delete_schedule', $schedule->id )}}">Delete</a>
                </td>
                
            </tr>
          @endforeach
        </table>
   
    </div>
    <!-- JavaScript files-->
    <script type="text/javascript">
    	
    	function confirmation(ev)
    	{
    		ev.preventDefault();

    		var urlToRedirect = ev.currentTarget.getAttribute('href');
    		console.log(urlToRedirect);

    		swal({

    			title:"Are you sure to delete this",
    			text:"This delete will be permanent",
    			icon:"warning",
    			buttons:true,
    			dangerMode:true,
    		})

    		.then((willCancel)=>{
    			if(willCancel){
    				window.location.href=urlToRedirect;
    			}

    		});
    	}
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" 
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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