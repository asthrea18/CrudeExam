<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('asset/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('asset/dist/css/adminlte.min.css')}}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @include('admin.modals');
    <!-- jQuery -->
    <script src="{{asset('asset/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('asset/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('asset/dist/js/adminlte.min.js')}}"></script>

    <script>
        $(document).ready(function(){
            fetchdata();
            function fetchdata(){
                $.ajax({
                    type:'GET',
                    url:'fetchdata',
                    dataType:"json",
                    success: function(response){
                        //console.log(response.userData);
                        $('.AccountTable').html("");
                        $.each(response.userData, function (key,item){
                            if($.trim(item.remarks) == null ){

                            }
                            $('.AccountTable').append('<tr>\
                                <td>'+item.name+'</td>\
                                <td>'+item.username+'</td>\
                                <td>'+item.email+'</td>\
                                <td>'+(item.created_at || '')+'</td>\
                                <td>'+(item.updated_at || '')+'</td>\
                                <td>\
                                    <button type="button" id="'+item.name+'" value="'+item.name+'" class="btn btn-sm btn-info bg-gradient-warning editmodal">Edit</button>\
                                    <button type="button" id="'+item.id+'" value="'+item.id+'" class="btn btn-sm btn-info bg-gradient-danger removemodal">Remove</button>\
                                </td>\
                            </tr>');
                        })

                    }
                });
            }
            $(document).on('click','.removemodal',function(e){
                e.preventDefault();
                var id = $(this).val();
                $('#modal-remove').modal('show');
                $("#id_remove").val(id);
                // alert(id);
            });

            $(document).on('click','.addAccount',function(e){
                e.preventDefault();

                var data = {
                    'name':$('#name').val(),
                    'email':$('#email').val(),
                    'username':$('#username').val(),
                    'password':$('#password').val(),
                }

               if($('#password').val()!=$('#conpassword').val()){
                    alert("error");

               }else{
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: "POST",
                        url: "/newAccount",
                        data: data,
                        dataType: "json",
                        success: function (response) {
                            // console.log(response);
                            if (response.status == 400) {

                                alert(response.errors);

                            }else if(response.status == 404){
                                alert(response.errors);
                            }else if(response.status == 500){
                                alert(response.errors);
                            }
                            else {

                                alert(response.message);

                                fetchdata();
                                $('#name').val('');
                                $('#email').val('');
                                $('#username').val('');
                                $('#password').val('');
                                $('#conpassword').val('');
                            }
                        }
                    });
               }

            });
        });

    </script>
</body>
</html>
