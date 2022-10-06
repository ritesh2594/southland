<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Incident-Near Miss</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Toster -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
    <!-- fontawesome 5 -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<style>
    .error {
        background: #ffe1b8 none repeat scroll 0 0;
        border-color: #e1972d;
    }
</style>

<body>
    <div class="container">
        <div class="col-md-12">
            <div class="container" style="padding:0;">
                <div class="row justify-content-between">
                    <div class="col-2">
                        <img src="{{ asset('assets/images/brandt.png') }}" class="img-fluid mt-2" style="height: 70px;">
                    </div>
                    <div class="col-8">
                        <h4 class="mt-4 font-weight-bold">Incident Form - Near Miss</h4>
                    </div>

                </div>
                <hr class="text-muted" style="border: 2px solid;">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @if (session()->has('success'))
                            <div class="alert alert-success font-weight-bold" role="alert">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        @if (count($errors->all()) > 0)
                            <div class="alert alert-danger" role="alert">
                                <p><b>Required Fields Missing!</b></p>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div id="ajax-alert" class="col-md-12 ">

                    </div>
                </div>
            </div>
            <form id="nearMissForm" method="POST">
                @csrf
                <input name="id" type="hidden" value="{{ $formdata ? $formdata->id : '' }}" />

                <div class="container bg-primary text-center">
                    <span class="font-weight-bold text-white" style="font-size:20px;">Injury Type</span>
                </div>
                <div class="container mb-3 border">
                    <div class="row p-2">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="font-weight-bold">
                                        Incident Date:
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control form-control-sm" type="date" name="incidentDate"
                                        id="incidentDate" value="{{ old('incidentDate', $formdata ? $formdata->incidentDate : '') }}"
                                        readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="font-weight-bold">
                                        Incident Time:
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control form-control-sm" type="time" name="incidentTime"
                                        id="incidentTime" value="{{ old('incidentTime', $formdata ? $formdata->incidentTime : '') }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="font-weight-bold">
                                        Were there injuries involved?
                                    </label>
                                </div>
                                <div class="col-md-6 d-flex">
                                    <div class="form-check form-check-inline"> Yes
                                        <input class="form-check-input ml-2" type="radio" name="injury"
                                            value="Yes" checked="checked">
                                    </div>
                                    <div class="form-check form-check-inline ml-2"> No
                                        <input class="form-check-input ml-2" type="radio" name="injury"
                                            value="No">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-center text-danger">
                            <i>IF INJURIES WERE INVOLVED, MUST FILL OUT A INCIDENT FORM- INJURY</i>
                        </div>
                    </div>
                </div>
                <div class="container bg-primary text-center">
                    <span class="font-weight-bold text-white" style="font-size:20px;">Employee Information</span>
                </div>
                <div class="container mb-3 border">
                    <div class="row p-2">
                        <div class="col-md-6">
                            <label class="font-weight-bold">
                                Temp Employee?
                            </label>
                            <div class="form-check form-check-inline ml-5"> Yes
                                <input class="form-check-input ml-2" type="radio" name="tempEmployee" value="Yes"
                                    checked="checked">
                            </div>
                            <div class="form-check form-check-inline"> No
                                <input class="form-check-input ml-2" type="radio" name="tempEmployee"
                                    value="No">
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="font-weight-bold">
                                        Employee Name:
                                    </label>
                                </div>
                                <div class="col-md-6 d-flex justify-content-center">
                                    <input class="form-control form-control-sm" type="text" name="employeeName"
                                        id="employeeName"
                                        value="{{ old('employeeName', $formdata ? $formdata->employeeName : '') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="font-weight-bold">
                                        Employee ID:
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control form-control-sm" type="text" name="employeeId"
                                        id="employeeId"
                                        value="{{ old('employeeId', $formdata ? $formdata->employeeId : '') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="font-weight-bold">
                                        Department:
                                    </label>
                                </div>
                                <div class="col-md-6 d-flex justify-content-center">
                                    <input class="form-control form-control-sm" type="text" name="department"
                                        id="department"
                                        value="{{ old('department', $formdata ? $formdata->department : '') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="font-weight-bold">
                                        Job Title:
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control form-control-sm" type="text" name="jobTitle"
                                        id="jobTitle"
                                        value="{{ old('jobTitle', $formdata ? $formdata->jobTitle : '') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="font-weight-bold">
                                        Involved Employees Contact Number:
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control form-control-sm" type="text" name="involvedContact"
                                        id="involvedContact"
                                        value="{{ old('involvedContact', $formdata ? $formdata->involvedContact : '') }}" maxlength="10">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="font-weight-bold">
                                        Supervisor Name:
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control form-control-sm" type="text" name="supervisorName"
                                        id="supervisorName"
                                        value="{{ old('supervisorName', $formdata ? $formdata->supervisorName : '') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-5 d-flex">
                            <label class="font-weight-bold">
                                Other Employees Involved:
                            </label>
                            <div class="form-check form-check-inline mb-2">
                                <input class="form-check-input ml-5" type="radio" name="otherEmployee_involved"
                                    value="No" checked="checked"> No
                                <input class="form-check-input ml-3" type="radio" name="otherEmployee_involved"
                                    id="otherEmployee_involved" value="Yes">
                                Yes,Whom
                            </div>
                        </div>
                        <div class="col-md-7">
                            <input class="form-control form-control-sm" type="text" name="otherEmp"
                                id="otherEmp" value="{{ old('otherEmp', $formdata ? $formdata->otherEmp : '') }}">
                        </div>
                    </div>
                </div>
                <div class="container bg-primary text-center">
                    <span class="font-weight-bold text-white" style="font-size:20px;">Incident Information</span>
                </div>
                <div class="container border mb-3">
                    <div class="row  p-2">
                        <label class="font-weight-bold">
                            Where did the incident occur? <small>(explain below)</small>
                        </label>
                        <textarea class="form-control" id="incidentOccur" name="incidentOccur" value="" rows="3">{{ old('incidentOccur', $formdata ? $formdata->incidentOccur : '') }}</textarea>
                    </div>
                    <div class="row p-2">
                        <label class="font-weight-bold">
                            What was the involved employee doing before the incident? <small>(explain below)</small>
                        </label>
                        <textarea class="form-control" id="employeeBefore" name="employeeBefore" value="" rows="3">{{ old('employeeBefore', $formdata ? $formdata->employeeBefore : '') }}</textarea>
                    </div>
                    <div class="row p-2">
                        <label class="font-weight-bold">
                            Explain what happened below (Who, What, Where, When, Why, How)
                        </label>
                        <textarea class="form-control" id="happenedBelow" name="happenedBelow" value="" rows="3">{{ old('happenedBelow', $formdata ? $formdata->happenedBelow : '') }}</textarea>
                    </div>
                    <div class="row p-2">
                        <div class="col text-center text-danger">
                            Please include a photo of the following: THA/ Work Area/ Reenactment
                        </div>
                    </div>
                </div>
                <div class="container modal-footer mt-5" id="">
                    <button type="reset" class="btn btn-danger">
                        <i class="fas fa-times"></i> Cancel
                    </button>
                    <input type="hidden" name="submit">
                    <button type="button" class="btn btn-primary" name="submit" id="submitbtn"
                        onclick="validation()">
                        <i class="fa fa-fw fa-check"></i> Update
                    </button>
                </div>

            </form>
        </div>
    </div>
</body>
<!-- Jquery  -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
<!-- Toaster Js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
   
    function validation() {
        var error_count = 0;
        $('.error').removeClass('error');
        if ($("#employeeName").val().trim() == "") {
            $("#employeeName").addClass("error");
            error_count++
        }
        if ($("#employeeId").val().trim() == "") {
            $("#employeeId").addClass("error");
            error_count++
        }
        if ($("#department").val().trim() == "") {
            $("#department").addClass("error");
            error_count++
        }
        if ($("#supervisorName").val().trim() == "") {
            $("#supervisorName").addClass("error");
            error_count++
        }
        if (error_count > 0) {
            $("#spinner").hide();
            $("html, body").animate({
                    scrollTop: "0px",
                },
                800
            );
            return false;
        } else {
            submit();
            involved();
        }
    }
    toastr.options.progressBar = true;
    toastr.options.closeButton = true;

    function showFirstform() {
        location.reload(true);
        $("html, body").animate({
                scrollTop: "0px",
            },
            800
        );
    }

    function submit() {
        var forms = $("#nearMissForm");
        var url = "{{ route('near-miss.register') }}";
        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url,
            data: forms.serialize(),
            beforeSend: function() {
                $('#submitbtn').addClass('disabled');
                $("#submitbtn").text("Sending...");
            },
            success: function(data) {
                var html = "";
                var html = '<div class="alert alert-success" role="alert">';
                html += data.message;
                html += '</div>';
                $('#ajax-alert').empty();
                $('#ajax-alert').append(html);
                setTimeout(showFirstform, 1000);

            },
            error: function(xhr, status, error) {
                var html = "";
                var html = '<div class="alert alert-danger" role="alert">';
                html += ' <p><b>Required Fields Missing!</b></p>';
                html +=
                    '<ul>';
                if (xhr.responseJSON.errors) {
                    $.each(xhr.responseJSON.errors, function(key,
                        value) {
                        html += '<li>' + value + '</li>'
                    });
                } else {
                    html += '<li>Something went wrong</li>'
                }
                html += '</ul></div>';
                $('#ajax-alert').empty();
                $('#ajax-alert').append(html);
            },
            complete: function() {
                $('#submitbtn').removeClass('disabled');
                $("#submitbtn").html('<i class="fa fa-fw fa-check"></i> Submit');
                $("html, body").animate({
                    scrollTop: "0px",
                }, 800);
            }

        });
    }
</script>

</html>
