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
        <h1>Payments for {{ $user->name }}</h1>
    
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
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
                    <td>{{ $payment->id }}</td>
                    <td>{{ $payment->payment_method }}</td>
                    <td>{{ $payment->payment_date }}</td>
                    <td>{{ $payment->payment_amount }}</td>
                    <td>{{ $payment->payment_period }}</td>
                    <td>{{ $payment->status }}</td>
                    <td>
                       {{-- <a href="{{ route('payments.show', $payment->id) }}" class="btn btn-primary">View</a> --}}
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
                    </td>
                  </tr>
                  @endforeach
            </tbody>
        </table>
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