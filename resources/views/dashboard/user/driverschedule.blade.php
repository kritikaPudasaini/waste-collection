<!DOCTYPE html>
<html>
  <head> 
    @include('dashboard.css')
  </head>
  <body>
    @include('dashboard.header')
    @include('dashboard.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
        </div>
        <div class="container-fluid">
            <h1>All Schedules</h1>
            <table class="table table-striped">
            <tr>
                <th>S.N</th>
                <th>Collection Day</th>
                <th>Collection Time</th>
                <th>Area</th>
                <th>Status</th>
                <th>Edit</th>
            </tr>
            @foreach($schedules as $schedule)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $schedule->collection_day }}</td>
                <td>{{ $schedule->collection_time }}</td>
                <td>{{ $schedule->area->address }}</td>
                <td>{{ $schedule->status }}</td>
                <td>
                  <a class="btn btn-success" href="{{ url('edit_driverschedule', $schedule->id) }}">Edit</a>
                </td>  
            </tr>
          @endforeach
        </table>

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