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

      <!-- Payment HTML here -->
      <div class="container-fluid">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>User Name</th>
                    <th>Payment Method</th>
                    <th>Payment Date</th>
                    <th>Payment Amount</th>
                    <th>Payment Period</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $payment->user->name }}</td>
                    <td>{{ $payment->payment_method }}</td>
                    <td>{{ $payment->payment_date }}</td>
                    <td>{{ $payment->payment_amount }}</td>
                    <td>{{ $payment->payment_period }}</td>
                    <td>{{ $payment->status }}</td>
                    <td>
                      <a class="btn btn-success" href="{{ url('edit_payment', $payment->id) }}">Edit</a>
                    </td>
                    <td>
                        <a class="btn btn-danger" onclick="confirmation(event)" href="{{ url('delete_payment', $payment->id )}}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
      <!-- End payment HTML here -->
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