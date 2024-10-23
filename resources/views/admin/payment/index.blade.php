<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')
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
    		/* justify-content: center;
    		align-items: center; */
    		margin: 30px;
    	}

    	.table_deg{
    		/* text-align: center; */
    		/* margin: auto; */
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
    </style>
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
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>User Name</th>
                    <th>Payment Method</th>
                    <th>Payment Date</th>
                    <th>Payment Amount</th>
                    <th>Payment Period</th>
                    <th>Status</th>
                    <th colspan=2>Actions</th>
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