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
        <div class="container-fluid">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

            <h1>Add Area</h1>
            <div class="div_deg">
                 <form action="{{ url('add_area') }}" method="post">
                     @csrf
                     <div class="form-group">
                        <label for="local_unit">Local Unit</label>
                         <input type="text" class="form-control" name="local_unit" required>
                     </div>
                        
                     <div class="form-group">
                        <label for="ward_no">Ward No</label>
                         <input type="number" class="form-control" name="ward_no" required min="1">
                     </div>
                         
                     <div class="form-group">
                        <label for="address">Local Address</label>
                        <input type="text" class="form-control" name="address" required>
                     </div>
                         <button class="btn btn-success" type="submit">Add Area</button>
                     </div>
                 </form>
           </div>
            <table class="table table-striped">
                <tr>
                    <th>S.N</th>
                    <th>Local Unit</th>
                    <th>Ward No</th>
                    <th>Address</th>
                    <th>Edit</th>
                    <th>Delete</th>
                   
                </tr>
                @foreach($areas as $area)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $area->local_unit }}</td>
                    <td>{{ $area->ward_no }}</td> 
                    <td>{{ $area->address }}</td>
                    <td>
                        <a class="btn btn-success" href="{{ url('edit_area', $area->id) }}">Edit</a>
                    </td>
                    <td>
                        <a class="btn btn-danger" onclick="confirmation(event)" href="{{ url('delete_area', $area->id )}}">Delete</a>
                    </td>
                </tr>
              @endforeach
            </table>
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