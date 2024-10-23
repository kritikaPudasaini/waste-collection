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
    </style>


  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
        </div>

        <!-- your html here -->
        <div class="container">
        <h2>Leave a Comment</h2>
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

    <form action="{{ route('comments.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" required>
        </div>

        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" class="form-control" rows="5" required>{{ old('message') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
        <!-- end html here -->


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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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