<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        
        <meta charset="utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Admin Dashboard </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Pinegrove School, Subathu" name="description" />
        <meta content="Pinegrove School, Subathu" name="keywords" />
        <meta content="Pinegrove School, Subathu" name="author" />
        <!-- App favicon -->
            <!-- CK editor -->
            {{-- <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script> --}}
       
        <link rel="shortcut icon" href="{{asset('admin_assets/images/faviconn.ico')}}">

        <!-- Bootstrap Css -->
        <link href="{{asset('admin_assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset('admin_assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{asset('admin_assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
		
		<!-- DataTables -->
        <link href="{{asset('admin_assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin_assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        
        <!-- trix editor -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" />

         <!-- pickday -->
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css"> 
        @livewireStyles
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script> 
   
        <style type="text/css" rel='stylesheet'>
            .shimmer {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: shimmer 1.5s infinite;
            }

            @keyframes shimmer {
            0% {
                background-position: -200% 0;
            }
            100% {
                background-position: 200% 0;
            }
            }

           
        </style>
 
    </head>

    <body data-sidebar="dark" data-layout-mode="light">
        <!-- page wrapper-->
        <div id="layout-wrapper">
            <header id="page-topbar">
                @include('livewire.backend.common.page-header')
            </header>

            <!-- Sidebar Start -->
            <div class="vertical-menu">
            @include('livewire.backend.common.sidenav')
            </div>
            <!-- Sidebar End -->
            
            <!-- Page content -->
            <div class="main-content">
                {{ $slot }}

              @include('livewire.backend.common.footer')
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->  



        <!-- JAVASCRIPT -->
        <script src="{{asset('admin_assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('admin_assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('admin_assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('admin_assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('admin_assets/libs/node-waves/waves.min.js')}}"></script>

        <!-- Required datatable js -->
        <script src="{{asset('admin_assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('admin_assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Datatable init js -->
        <script src="{{asset('admin_assets/js/pages/datatables.init.js')}}"></script>



        <script src="{{asset('admin_assets/js/app.js')}}"></script>
         @livewireScripts

        <!-- App js -->


     
            


     <!-- pickday -->
     <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>

     <script>
      var picker = new Pikaday({ field: document.getElementById('dated') });
      var picker2 = new Pikaday({ field: document.getElementById('newsDate') });
      var picker3 = new Pikaday({ field: document.getElementById('picDate') });
      var picker4 = new Pikaday({ field: document.getElementById('grapDate') });
      var picker5 = new Pikaday({ field: document.getElementById('schoolDate') });
      
     </script>



    </body>
</html>