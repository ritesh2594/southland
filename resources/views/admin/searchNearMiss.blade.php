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
            <a href="{{ route('near_missEdit', $data->id) }}"
                class="badge badge-primary"><i class='fas fa-edit'></i>
                Edit</a>
            <a href="#" class="badge badge-success"><i
                    class="far fa-file-pdf"></i> Export Pdf</a>
            <a href="{{ route('near_miss_destroy', $data->id) }}"
                class="badge badge-danger delete"><i
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
