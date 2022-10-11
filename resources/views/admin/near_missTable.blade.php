<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.partial.head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Near Miss</title>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('admin.partial.navbar')
        @include('admin.partial.sidebar')
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Near Miss</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Export</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="card">
                                <div class="card-header border-0">
                                    <h3 class="card-title">
                                        <i class="fa fa-search"></i> Search
                                    </h3>
                                    <div class="card-tools">
                                        {{-- <button type="button" class="btn btn-primary btn-sm daterange"
                                            title="Date range">
                                            <i class="far fa-calendar-alt"></i>
                                        </button> --}}
                                        <button type="button" class="btn btn-primary btn-sm"
                                            data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div id="" style="width: 100%;">
                                        <form id="searchMiss">
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label><b>Employee Name:</b></label>
                                                    <input type="text" class="form-control" name="employeeName"
                                                        id="employeeName">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label><b>Department:</b></label>
                                                    <input type="text" class="form-control" name="department"
                                                        id="department">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label><b>Supervisor Name:</b></label>
                                                    <input type="text" class="form-control" name="supervisorName"
                                                        id="supervisorName">
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <a class="btn btn-danger"
                                                    href="{{ route('near_missTable') }}">Cancel</a>
                                                <input type="hidden" name="search" value="search">
                                                <button type="button" class="btn btn-primary btn" id="searchbtnMiss"
                                                    name="search">Search
                                                    <span class="spinner-border spinner-border-sm text-light"
                                                        id="spinnerSearch"></span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <section class="col-lg-12 connectedSortable" id="ajax-alert">
                                    @include('admin.searchNearMiss')
                        </section>
                        <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                        <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />
                        <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />
                    </div>
                </div>
            </section>
        </div>
        @include('admin.partial.footer')
    </div>
    @include('admin.partial.foot')
</body>
<script type="text/javascript">
    $('.delete').click(function(e) {
        if (!confirm('Are you sure you want to delete this?')) {
            e.preventDefault();
        }
    });
</script>
<script>
    $(document).ready(function() {
        $('#spinnerSearch').hide();
        var search = '';
        var employeeName = '';
        var department = '';
        var supervisorName = '';
        var column_name = '';
        var sort_type = '';
        var page = '';

        function clear_icon() {
            $('#id_icon').html('');
            $('#employeeName_icon').html('');
            $('#employeeId_icon').html('');
            $('#department_icon').html('');
            $('#jobTitle_icon').html('');
            $('#supervisorName_icon').html('');
            $('#created_at_icon').html('');
        }
        $("#searchbtnMiss").click(function() {
            search = 'search';
            employeeName = $('#employeeName').val().trim();
            department = $('#department').val().trim();
            supervisorName = $('#supervisorName').val().trim();
            column_name = $('#hidden_column_name').val();
            sort_type = $('#hidden_sort_type').val();
            page = $('#hidden_page').val();
            getSearch();
        });

        function getSearch() {
            $.ajax({
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('near_missTable') }}",
                data: {
                    search: search,
                    employeeName: employeeName,
                    department: department,
                    supervisorName: supervisorName,
                    sort_type: sort_type,
                    column_name: column_name,
                    page: page
                },
                // beforeSend: function() {
                //     $('#searchbtnMiss').addClass('disabled');
                //     $("#spinnerSearch").show();
                // },
                success: function(data) {
                    if (data.html !== null) {
                        $('#ajax-alert').empty();
                        $('#ajax-alert').append(data.html);
                    }
                },
                // complete: function() {
                //     $('#searchbtnMiss').removeClass('disabled');
                //     $("#spinnerSearch").hide();
                // }
            });
        }
        $(document).on('click', '.sorting', function() {
            var id = $(this).attr('id');
            column_name = $(this).data('column_name');
            sort_type = $(this).attr('data-sorting_type');
            // $(this).attr('data-sorting_type', 'Undertaker');
            // $(this).data('sorting_type', 'desc');
            $('#hidden_column_name').val(column_name);
            $('#hidden_sort_type').val(reverse_order);
            page = $('#hidden_page').val();
            search = $('#serach').val();
            
            var reverse_order = '';
            if (sort_type == 'asc') {
                $('#' + id).attr('data-sorting_type', 'desc');
                reverse_order = 'desc';
                clear_icon();
                $('#' + column_name + '_icon').html(
                    '<span class="fa fa-angle-up"></span>');
            }
            if (sort_type == 'desc') {
                $('#' + id).attr('data-sorting_type', 'asc');
                reverse_order = 'asc';
                clear_icon();
                $('#' + column_name + '_icon').html(
                    '<span class="fa fa-angle-down"></span>');
            }
            getSearch();
        });

        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            page = $(this).attr('href').split('page=')[1];
            $('#hidden_page').val(page);
            $('li').removeClass('active');
            $(this).parent().addClass('active');
            getSearch();
        });

    });
</script>

</html>
