{{-- <table class="table table-striped" id="ajax-alert"> --}}
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col" class="sorting" data-sorting_type="asc" data-column_name="id" id="column-name-id"
                style="cursor: pointer">Id <span id="id_icon"></span></th>
            <th scope="col" class="sorting" data-sorting_type="asc" data-column_name="employeeName"
                id="column-name-employeeName" style="cursor: pointer">Employee Name <span id="employeeName_icon"></span>
            </th>
            <th scope="col" class="sorting" data-sorting_type="asc" data-column_name="employeeId"
                id="column-name-employeeId" style="cursor: pointer">Employee Id <span id="employeeId_icon"></span>
            </th>
            <th scope="col" class="sorting" data-sorting_type="asc" data-column_name="department"
                id="column-name-department" style="cursor: pointer">Department <span id="department_icon"></span>
            </th>
            <th scope="col" class="sorting" data-sorting_type="asc"
                data-column_name="jobTitle"id="column-name-jobTitle" style="cursor: pointer">Job Title <span
                    id="jobTitle_icon"></span>
            </th>
            <th scope="col" class="sorting" data-sorting_type="asc"
                data-column_name="supervisorName"id="column-name-supervisorName" style="cursor: pointer">
                Supervisor Name <span id="supervisorName_icon"></span>
            </th>
            <th scope="col" class="sorting" data-sorting_type="asc" data-column_name="created_at"
                id="column-name-created_at" style="cursor: pointer">Date <span id="created_at_icon"></span></th>
            <th scope="col" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @if (!$datas->isEmpty())
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
                        <a href="{{ route('near_missEdit', $data->id) }}" class="badge badge-primary"><i
                                class='fas fa-edit'></i>
                            Edit</a>
                        <a href="#" class="badge badge-success"><i class="far fa-file-pdf"></i> Export Pdf</a>
                        <a href="{{ route('near_miss_destroy', $data->id) }}" class="badge badge-danger delete"><i
                                class='fas fa-trash-alt'></i>
                            Delete</a>
                    </td>
                </tr>
            @endforeach
        @else
            <tr class="text-center">
                <td colspan="8" class="text-danger fw-bold">No data available in table
                </td>
            </tr>
        @endif
    </tbody>
</table>
<div class="paginations">
    {!! $datas->appends($_GET)->links() !!}
</div>
