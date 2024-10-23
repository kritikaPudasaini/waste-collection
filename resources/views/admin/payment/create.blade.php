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
            <h1>Add New Payment</h1>
        
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        
            <form action="{{ route('payments.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="user_id">User</label>
                    <select name="user_id" id="user_id" class="form-control" style="width: 300px;">
                        @foreach($users as $user)
                        <option value="{{ $user->id }}" style="background:skyblue;">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="payment_method">Payment Method</label>
                    <select name="payment_method" id="payment_method" class="form-control" style="width: 200px;">
                        <option value="esewa">eSewa</option>
                        {{-- <option value="khalti">Khalti</option> --}}
                    </select>
                </div>
                <div class="form-group">
                    <label for="payment_date">Payment Date</label>
                    <input type="date" name="payment_date" id="payment_date" class="form-control" value="{{ old('payment_date') }}" style="width: 200px;">
                </div>
                <div class="form-group">
                    <label for="payment_amount">Payment Amount</label>
                    <input type="text" name="payment_amount" id="payment_amount" class="form-control" value="{{ old('payment_amount') }}">
                </div>
                <div class="form-group">
                    <label for="payment_period">Payment Month</label>
                    <input type="text" name="payment_period" id="payment_period" class="form-control" value="{{ old('payment_period') }}">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control" style="width: 200px;">
                        <option value="pending" style="background:skyblue;">Pending</option>
                        <option value="completed" style="background:skyblue;">Completed</option>
                        <option value="failed" style="background:skyblue;">Failed</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Add Payment</button>
            </form>
        </div>
         <!-- End payment HTML here -->
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