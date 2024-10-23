<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')
    
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
      </div>

      <!-- Payment HTML here -->
      <div class="container-fluid">
        <h1>Update Payment</h1>
    
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    
        <form action="{{ url('update_payment', $payment->id) }}" method="post">
            @csrf
           
            <div class="form-group">
                <label for="user_id">User</label>
                <select name="user_id" id="user_id" class="form-control">
                    @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $payment->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="payment_method">Payment Method</label>
                <select name="payment_method" id="payment_method" class="form-control">
                    <option value="esewa" {{ $payment->payment_method == 'esewa' ? 'selected' : '' }}>eSewa</option>
                    <option value="khalti" {{ $payment->payment_method == 'khalti' ? 'selected' : '' }}>Khalti</option>
                </select>
            </div>
            <div class="form-group">
                <label for="payment_date">Payment Date</label>
                <input type="date" name="payment_date" id="payment_date" class="form-control" value="{{ $payment->payment_date }}">
            </div>
            <div class="form-group">
                <label for="payment_amount">Payment Amount</label>
                <input type="text" name="payment_amount" id="payment_amount" class="form-control" value="{{ $payment->payment_amount }}">
            </div>
            <div class="form-group">
                <label for="payment_period">Payment Month</label>
                <input type="text" name="payment_period" id="payment_period" class="form-control" value="{{ $payment->payment_period }}">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="pending" {{ $payment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="completed" {{ $payment->status == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="failed" {{ $payment->status == 'failed' ? 'selected' : '' }}>Failed</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Update Payment</button>
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