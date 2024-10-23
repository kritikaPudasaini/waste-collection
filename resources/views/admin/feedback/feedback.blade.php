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
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
        </div>
		<div class="container-fluid">
			<table class="table table-striped">
				<tr>
					<th>S.N</th>
					<th>Name</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Message</th>
				</tr>
				@foreach($feedbacks as $feedback)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ $feedback->name }}</td>
					<td>{{ $feedback->email }}</td>
					<td>{{ $feedback->phone }}</td>
					<td>{!! Str::limit($feedback->message, 100) !!}</td>
					
				</tr>
			  @endforeach
			</table>
		</div>
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