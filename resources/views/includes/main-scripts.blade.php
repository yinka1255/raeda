<script type="text/javascript" src="{{asset('public/main/js/plugin.js')}}"></script>
<script type="text/javascript" src="{{asset('public/main/js/main.js')}}"></script>
<script type="text/javascript" src="{{asset('public/main/js/formcalculations.js')}}"></script>
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