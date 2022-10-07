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
                                                    <input type="text" class="form-control" name="employeeName">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label><b>Department:</b></label>
                                                    <input type="text" class="form-control" name="department">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label><b>Supervisor Name:</b></label>
                                                    <input type="text" class="form-control" name="supervisorName">
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
                        <section class="col-lg-12 connectedSortable">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Employee Name</th>
                                        <th scope="col">Employee Id</th>
                                        <th scope="col">Department</th>
                                        <th scope="col">Job Title</th>
                                        <th scope="col">Supervisor Name</th>
                                        <th scope="col">Date</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="ajax-alert">
                                    @foreach ($datas as $data)
                                        <tr>
                                            <th scope="row">{{ $data->id }}</th>
                                            <td>{{ $data->employeeName }}</td>
                                            <td>{{ $data->employeeId }}</td>
                                            <td>{{ $data->department }}</td>
                                            <td>{{ $data->jobTitle }}</td>
                                            <td>{{ $data->supervisorName }}</td>
                                            <td>{{ date('d-m-Y', strtotime($data->created_at)) }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('near_missEdit', $data->id) }}"
                                                    class="badge badge-primary"><i class='fas fa-edit'></i>
                                                    Edit</a>
                                                <a href="#" class="badge badge-success"><i
                                                        class="far fa-file-pdf"></i> Export Pdf</a>
                                                <a href="{{ route('near_miss_destroy', $data->id) }}"
                                                    class="badge badge-danger delete"><i class='fas fa-trash-alt'></i>
                                                    Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination">
                                {!! $datas->appends(\Request::except('page'))->render() !!}
                            </div>
                        </section>
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
    $('#spinnerSearch').hide();
    $(document).ready(function() {
        $("#searchbtnMiss").click(function() {
            var forms = $("#searchMiss");
            var url = "{{ route('near_missTable') }}";
            $.ajax({
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                data: forms.serialize(),
                beforeSend: function() {
                    $('#searchbtnMiss').addClass('disabled');
                    $("#spinnerSearch").show();
                },
                success: function(data) {
                    if (data.html !== null) {
                            $('#ajax-alert').empty();
                            $('#ajax-alert').append(data.html);
                        }
                },
                complete: function() {
                    $('#searchbtnMiss').removeClass('disabled');
                    $("#spinnerSearch").hide();
                }
            });
        });
    });
</script>

</html>
