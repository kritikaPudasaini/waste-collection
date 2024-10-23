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
            <h1>Payment Details</h1>
            <p>User: {{ $payment->user->name }}</p>
            <p>Amount: {{ $payment->payment_amount }}</p>
            <p>Payment Date: {{ $payment->payment_date }}</p>
            <p>Payment Period: {{ $payment->payment_period }}</p>
            <p>Status: {{ $payment->status }}</p>

            @if($payment->status == 'pending')
            <form action="{{ route('esewa', $payment) }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{$payment->user_id}}">
                <input type="hidden" name="payment_amount" value="{{ $payment->payment_amount}}">
                <input type="hidden" name="payment_period" value="{{$payment->payment_period}}">
                <input type="hidden" name="status" value="{{$payment->status}}">
                <button type="submit" class="btn btn-primary">Esewa</button>
            </form>
            @endif

            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
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