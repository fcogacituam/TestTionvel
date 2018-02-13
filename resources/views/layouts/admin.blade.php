<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <title>Tionvel</title>

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     
</head>
<body>
    <div class="container main-container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>Prueba Tionvel</h2>
            </div>
        </div>
        @yield('content')
        @yield('alert')
        @yield('result')
        
       
    </div>
    

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">


  <script>
        $(document).ready(function(){
            $('.details').click(function(){
                if($('i.fa-angle-down',this).hasClass('rotated')){
                    $('i.fa-angle-down',this).removeClass("rotated");
                    $('i.fa-angle-down',this).removeClass("fa-rotate-180");
                }else{
                    $('i.fa-angle-down',this).addClass("rotated");
                    $('i.fa-angle-down',this).addClass("fa-rotate-180");
                }
                
            });
        });
</script>


  
</body>
</html>
