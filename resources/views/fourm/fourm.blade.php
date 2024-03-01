<!DOCTYPE html>
<html>
<head>
    <title>Pharmacy Signup| SignIn</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    
</head>
<body>
    {{-- Main Content --}}
    @yield('content')
    {{-- End Main Content --}}
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <script src= "https://code.jquery.com/jquery-3.6.1.min.js" 
        integrity= "sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" 
        crossorigin="anonymous"> 
    </script> 
      
    <script> 
        $(function () { 
            $("#datepicker").datepicker({  
                autoclose: true,  
                todayHighlight: true, 
                todayBtn : "linked", 
            }).datepicker('update', new Date()); 
        }); 
    </script> 
    <script src= "https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" 
        integrity= "sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" 
        crossorigin="anonymous"> 
    </script> 
    <script src= "https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" 
        integrity= "sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
        crossorigin="anonymous"> 
    </script> 
    <script src= "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"> 
    </script> 
</body>
</html>