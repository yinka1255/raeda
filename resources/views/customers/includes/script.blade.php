<script src="{{asset('public/customer/js/jquery.min.js')}}"></script>
    <script src="{{asset('public/customer/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('public/customer/js/metismenu.min.js')}}"></script>
    <script src="{{asset('public/customer/js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('public/customer/js/waves.min.js')}}"></script>

    
    <!-- App js -->
    <script src="{{asset('public/customer/js/app.js')}}"></script>

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
swal({
      title: "Info!",
      text: "{{Session::get('info')}}",
      icon: "info",
      buttons:  ["Later", "Login or Register now"],
      //dangerMode: true,
    })
    .then((login) => {
      if (login) {
        $("#meLogin").modal("toggle");
      } else {
        
      }
    });
</script>

@endif
@if(Session::has('info2'))
<script>
swal({
      title: "Info!",
      text: "{{Session::get('info2')}}",
      icon: "info",
      buttons:  ["Later", "Fund wallet now"],
      //dangerMode: true,
    })
    .then((fund) => {
      if (fund) {
        window.open("/customers/profile", "_self");
      } else {
        
      }
    });
</script>

@endif