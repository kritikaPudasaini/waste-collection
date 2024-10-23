<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
   

    <style type="text/css">

    .page-content {
        position: relative;
        background: #117d59db;
        min-height: 100vh;
        width: calc(100% - 280px);
        padding: 0;
        padding-bottom: 70px;
    }

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
        <h1 style="color:white">Add User</h1>
        <div class="div_deg">
          <form action="{{ url('add_user') }}" method="post">
              @csrf
              <div class="row">
                  <div class="form-group col-md-6">
                      <label for="name" style="color:white;">Full Name</label>
                      <input type="text" name="name" class="form-control" required>
                  </div>
                  <div class="form-group col-md-6">
                      <label for="email" style="color:white;">Email</label>
                      <input type="email" name="email" class="form-control" required>
                  </div>
              </div>
              <div class="row">
                  <div class="form-group col-md-6">
                      <label for="password" style="color:white;">Password</label>
                      <input type="password" name="password" class="form-control" required>
                  </div>
                  <div class="form-group col-md-6">
                      <label for="password_confirmation" style="color:white;">Confirm Password</label>
                      <input type="password" name="password_confirmation" class="form-control" required>
                  </div>
              </div>
              <div class="row">
                  <div class="form-group col-md-6">
                      <label for="phone" style="color:white;">Phone</label>
                      <input type="text" name="phone" class="form-control" pattern="\d{10}" title="Phone number must be exactly 10 digits" required>
                  </div>
                  <div class="form-group col-md-6">
                      <label for="address" style="color:white;">Address</label>
                      <input type="text" name="address" class="form-control" required>
                  </div>
              </div>
              <div class="row">
                  <div class="form-group col-md-6">
                      <label for="role">Role</label>
                      <select name="role_id" id="role" class="form-control" required>
                          @foreach($roles as $role)
                              <option value="{{ $role->id }}" style="background:skyblue;">{{ $role->name }}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="form-group col-md-6">
                      <label for="area">Area</label>
                      <select name="area_id" id="area" class="form-control" required>
                          @foreach($areas as $area)
                              <option value="{{ $area->id }}" style="background:skyblue;">{{ $area->address }}</option>
                          @endforeach
                      </select>
                  </div>
              </div>
              <div class="row">
                  <div class="form-group col-md-12">
                      <input class="btn btn-success" type="submit" value="Add User">
                  </div>
              </div>
          </form>
      </div>
       </div>
       <table class="table table-striped">
           <tr>
               <th>S.N</th>
               <th>Name</th>
               <th>Email</th>
               <th>Phone</th>
               <th>Address</th>
               <th>Role</th>
               <th>Area</th>
               <th>Actions</th>
           </tr>
           @foreach($users as $user)
           <tr>
               <td>{{ $loop->iteration }}</td>
               <td>{{ $user->name }}</td>
               <td>{{ $user->email }}</td>
               <td>{{ $user->phone }}</td>
               <td>{{ $user->address }}</td>
               <td>{{ $user->role->name }}</td>
               <td>{{ $user->area->address }}</td>
               <td>
                   <a class="btn btn-success" href="{{ url('edit_user', $user->id) }}">Edit</a>
                   <a class="btn btn-danger" onclick="confirmation(event)" href="{{ url('delete_user', $user->id )}}">Delete</a>
               </td>
               
           </tr>
         @endforeach
       </table>
        <!-- Render pagination links -->
      <div class="d-flex justify-content-center" style="margin-top:10px;">
        {{ $users->links() }}
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