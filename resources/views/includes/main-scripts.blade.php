<script src="{{asset('public/mantra/js/jquery-2.2.4.min.js')}}"></script>
<script src="{{asset('public/mantra/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/mantra/js/select2.min.js')}}"></script>
<script src="{{asset('public/mantra/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('public/mantra/js/custom.js')}}"></script>

<!-- Live Style Switcher JS File - only demo -->
<script src="{{asset('public/mantra/js/styleswitcher.js')}}"></script>
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