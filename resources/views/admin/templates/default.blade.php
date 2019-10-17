<!DOCTYPE html>
<html>

{{-- memaggil file partials header --}}
@include('admin.templates.partials.head')

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    {{-- memaggil file partials header --}}
    @include('admin.templates.partials.header')
    
    {{-- memaggil file partials sidebar --}}
    @include('admin.templates.partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ Breadcrumbs::current()->title }}
            </h1>
            {{ Breadcrumbs::render() }}
            <!-- <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol> -->
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Booking tempat untuk child view -->
            @yield('content')
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    
    {{-- memaggil file partials footer --}}
    @include('admin.templates.partials.footer')

    {{-- memaggil file partials control --}}
    @include('admin.templates.partials.control')

    <!-- Add the sidebar's background. This div must be placed
        immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
    </div>
<!-- ./wrapper -->

{{-- memaggil file partials scripts --}}
@include('admin.templates.partials.scripts')

</body>
</html>
