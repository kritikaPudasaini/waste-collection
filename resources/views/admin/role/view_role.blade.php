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

      <!-- Write your html here --> 
      <div class="container-fluid">
        <h2 style="color:white">Add Role</h1>
         <div class="div_deg">
           <form action="{{ url('add_role') }}" method="post">
               @csrf
               <div>
                  <label for="name" style="color:white;">Role Name</label>
                   <input type="text" name="name">
                   <input class="btn btn-success" type="submit" value="Add Role">
               </div>
           </form>
       </div>
       </div>
       <table class="table table-stripped">
           <tr>
               <th>S.N</th>
               <th>Role Name</th>
               <th>Actions</th>
           </tr>
           @foreach($roles as $role)
           <tr>
               <td>{{ $loop->iteration }}</td>
               <td>{{ $role->name }}</td>
               <td>
                   <a class="btn btn-success" href="{{ url('edit_role', $role->id) }}">Edit</a>
                   <a class="btn btn-danger" onclick="confirmation(event)" href="{{ url('delete_role', $role->id )}}">Delete</a>
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

    			title:"Are you sure to delete this?",
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