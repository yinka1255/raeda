<li class="active"><a href="{{url('/')}}">Home</a></li>
<li><a href="{{url('about')}}">About</a></li>
<li><a href="javascript:void(0)">Programs</a>
    <ul class="submenu"> 
        @foreach($programs as $program)
        <li style="padding-top: 10px;padding-bottom: 10px;"><a href="{{url('register/'.$program->category_id)}}">{{$program->name}} ({{$program->category_name}})</a></li>
        @endforeach
    </ul><!-- /.submenu -->
</li>     
<li><a href="{{url('contact')}}">Contact</a></li> 
<li><a href="{{url('gallery')}}">Gallery</a></li> 

@if(Auth::user())
<li><a href="{{url('orders')}}">Orders</a></li>  
<li><a href="{{url('students/profile')}}">Profile</a></li>  
<li><a href="{{url('logout')}}">Logout</a></li>   
@else
<li><a href="{{url('login')}}">Login</a></li>     
@endif
<script src="{{asset('public/admin/sweetalert/docs/assets/sweetalert/sweetalert.min.js')}}"></script>
    
@if(Session::has('success'))
  
  <script>
    swal({
      title: "Success!",
      text: "{{Session::get('success')}}",
      icon: "success",
      buttons: true,
      //dangerMode: true,
    });
    
	</script>
  
@endif
@if(Session::has('error'))
    <script>
    swal("Error!", "{{Session::get('error')}}", "error").then((value) => {
        });
    </script>

@endif
@if(Session::has('info'))
<script>
  swal("Info!", "{{Session::get('info')}}", "info").then((value) => {
	});
</script>

@endif