<!DOCTYPE html>
<html lang="en" data-kit-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <base href="{{ asset('') }}">
    
    <title>City Tours CMS</title>
    
    <!-- Favicon & Logo -->
    <link rel="icon" type="image/png" href="components/kit/core/img/logo.svg" />
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    
    <!-- Vendors -->
    <link rel="stylesheet" type="text/css" href="vendors/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="vendors/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" type="text/css" href="vendors/ladda/dist/ladda-themeless.min.css">
    <link rel="stylesheet" type="text/css" href="vendors/bootstrap-select/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="vendors/select2/dist/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="vendors/tempus-dominus-bs4/build/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" type="text/css" href="vendors/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet" type="text/css" href="vendors/bootstrap-sweetalert/dist/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="vendors/summernote/dist/summernote.css">
    <link rel="stylesheet" type="text/css" href="vendors/owl.carousel/dist/assets/owl.carousel.min.css">
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/fc-3.2.5/r-2.2.2/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="vendors/c3/c3.min.css">
    <link rel="stylesheet" type="text/css" href="vendors/chartist/dist/chartist.min.css">
    <link rel="stylesheet" type="text/css" href="vendors/nprogress/nprogress.css">
    <link rel="stylesheet" type="text/css" href="vendors/jquery-steps/demo/css/jquery.steps.css">
    <link rel="stylesheet" type="text/css" href="vendors/dropify/dist/css/dropify.min.css">
    <link rel="stylesheet" type="text/css" href="vendors/font-feathericons/dist/feather.css">
    <link rel="stylesheet" type="text/css" href="vendors/font-linearicons/style.css">
    <link rel="stylesheet" type="text/css" href="vendors/font-icomoon/style.css">
    <link rel="stylesheet" type="text/css" href="vendors/font-awesome/css/font-awesome.min.css">
    
    <!-- components -->
    <link rel="stylesheet" type="text/css" href="components/kit/vendors/style.css">
    <link rel="stylesheet" type="text/css" href="components/kit/core/style.css">
    <link rel="stylesheet" type="text/css" href="components/cleanui/styles/style.css">
    <link rel="stylesheet" type="text/css" href="components/kit/widgets/style.css">
    <link rel="stylesheet" type="text/css" href="components/kit/apps/style.css">
    <link rel="stylesheet" type="text/css" href="components/cleanui/dashboards/style.css">
    <link rel="stylesheet" type="text/css" href="components/cleanui/system/auth/style.css">
    <link rel="stylesheet" type="text/css" href="components/cleanui/layout/breadcrumbs/style.css">
    <link rel="stylesheet" type="text/css" href="components/cleanui/layout/footer/style.css">
    <link rel="stylesheet" type="text/css" href="components/cleanui/layout/menu-left/style.css">
    <link rel="stylesheet" type="text/css" href="components/cleanui/layout/sidebar/style.css">
    <link rel="stylesheet" type="text/css" href="components/cleanui/layout/topbar/style.css">
    
    <!-- Common -->
    <link rel="stylesheet" type="text/css" href="common/css/custom.css">
    <link rel="stylesheet" type="text/css" href="common/css/preloader.css">
    
    @stack('css')
    
    <!-- JS -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.js"></script>
    <script src="vendors/jquery-ui/jquery-ui.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.js"></script>
    <script src="vendors/jquery-mousewheel/jquery.mousewheel.min.js"></script>
    <script src="vendors/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="vendors/spin.js/spin.js"></script>
    <script src="vendors/ladda/dist/ladda.min.js"></script>
    <script src="vendors/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="vendors/select2/dist/js/select2.full.min.js"></script>
    <script src="vendors/select2/dist/js/i18n/vi.js"></script>
    <script src="vendors/html5-form-validation/dist/jquery.validation.min.js"></script>
    <script src="vendors/jquery-typeahead/dist/jquery.typeahead.min.js"></script>
    <script src="vendors/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
    <script src="vendors/autosize/dist/autosize.min.js"></script>
    <script src="vendors/bootstrap-show-password/dist/bootstrap-show-password.min.js"></script>
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/tempus-dominus-bs4/build/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="vendors/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="vendors/bootstrap-sweetalert/dist/sweetalert.min.js"></script>
    <script src="vendors/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js"></script>
    <script src="vendors/summernote/dist/summernote.min.js"></script>
    <script src="vendors/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="vendors/nestable/jquery.nestable.js"></script>
    <script src="https://cdn.datatables.net/v/bs4/dt-1.10.18/fc-3.2.5/r-2.2.2/datatables.min.js"></script>
    <script src="vendors/editable-table/mindmup-editabletable.js"></script>
    <script src="vendors/d3/d3.min.js"></script>
    
    <script src="vendors/jquery-countTo/jquery.countTo.js"></script>
    <script src="vendors/nprogress/nprogress.js"></script>
    <script src="vendors/jquery-steps/build/jquery.steps.min.js"></script>
    <script src="vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="vendors/dropify/dist/js/dropify.min.js"></script>
    <script src="vendors/d3-dsv/dist/d3-dsv.js"></script>
    <script src="vendors/d3-time-format/dist/d3-time-format.js"></script>
    
    <!-- Template modules -->
    <script src="components/kit/core/index.js"></script>
    <script src="components/cleanui/layout/menu-left/index.js"></script>
    <script src="components/cleanui/layout/sidebar/index.js"></script>
    <script src="components/cleanui/layout/topbar/index.js"></script>
    <script src="common/js/preloader.js"></script>
    <script src="common/js/custom.js"></script>
</head>
<body class="cui__layout--cardsShadow cui__layout--grayBackground cui__menuLeft--shadow cui__layout--squaredBorders cui__menuLeft--dark cui__menuTop--dark">
    <div class="initial__loading"></div>
    <div class="cui__layout cui__layout--hasSider">
        @include('cms.layout.components.left-menu')
        
        <div class="cui__layout">
            <div class="cui__layout__header">
                @include('cms.layout.components.top-bar')
            </div>
            <div class="cui__layout__content">
                @stack('content')
            </div>
            <div class="cui__layout__footer">
                @include('cms.layout.components.footer')
            </div>
        </div>
    </div>
    
    <!-- Modals -->
    @include('modals.error')
    @include('modals.success')
    @include('modals.confirm')
    
    <!-- Javascript -->
    <script>
    @if (Session::has('error'))
        $('#alert-error').find('#alert-error-message').html("{{ Session::get('error') }}");
        $('#alert-error').find('#button-error-confirm').text("{{ trans('button.retry') }}");
        $('#alert-error').modal();
    @endif
    @if (Session::has('success'))
        $('#alert-success').find('#alert-success-message').html("{{ Session::get('success') }}");
        $('#alert-success').find('#button-success-confirm').text("{{ trans('button.ok') }}");
        $('#alert-success').modal();
    @endif
    
    function copyToClipboard(text) {
        var $temp = $('<input>');
        $('body').append($temp);
        $temp.val(text).select();
        document.execCommand('copy');
        $temp.remove();
        
        $.notify(
            {
                title: '<i class="fe fe-check-circle mr-2"></i>',
                message: "{{ ' '.trans('message.copied_clipboard') }}",
            },
            { type: 'success', delay: 2000, z_index: 1051, }
        );
    }
    $(function() {
        $.fn.dataTable.ext.errMode = 'none';
    });
    </script>
    
    @stack('js')
</body>