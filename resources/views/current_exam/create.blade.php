@extends('layouts.app')

@section('title', 'Current Exam')
@push('styles')
    <link rel="stylesheet" href="{{ asset('storage/assets/css/plugins/datepicker-bs5.min.css') }}" />
    <style>
        @media screen and (max-width: 600px) {
            #subjectsTable thead {
                display: none;
            }

            #subjectsTable,
            #subjectsTable tbody,
            #subjectsTable tr,
            #subjectsTable td {
                display: block;
                width: 100%;
            }

            #subjectsTable tr {
                margin-bottom: 15px;
            }

            #subjectsTable td {
                text-align: right;
                padding-left: 50%;
                position: relative;
            }

            #subjectsTable td::before {
                content: attr(data-label);
                position: absolute;
                left: 6px;
                width: 45%;
                padding-right: 10px;
                white-space: nowrap;
                text-align: left;
                font-weight: bold;
            }


        }
    </style>
@endpush

@section('content')

    <!-- [ Pre-loader ] start -->
    <div class="page-loader">
        <div class="bar"></div>
    </div>
    <!-- [ Pre-loader ] End -->

    <!-- [ Sidebar Menu ] start -->
    @include('partials.sidebar')
    <!-- [ Sidebar Menu ] end -->

    <!-- [ Header Topbar ] start -->
    @include('partials.header')
    <!-- [ Header Topbar ] end -->

    <div class="pc-container">
        <div class="pc-content">
            <!-- Modal start-->
            @include('modals.cropper')
            <!-- Modal start-->
            <!-- [ Main Content ] start -->
            <div class="row">

                <div class="tab-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Current Exam - <span class="text-primary">Add</span></h5>
                                </div>
                                <div class="card-body">
                                    {{-- <form action="{{ route('collectorates.store') }}" method="POST" enctype="multipart/form-data"> --}}
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="exam_id">Exam ID <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="exam_id" name="exam_id"
                                                    readonly required value="20240719165037">
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="exam_type">Type of Exam<span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control" id="exam_type" name="exam_type" required>
                                                    <option disabled selected>Select Exam Type</option>
                                                    <option value="Objective">Objective</option>
                                                    <option value="Descriptive">Descriptive</option>
                                                    <option value="CBT">CBT</option>
                                                    <option value="Objective+Descriptive">Objective + Descriptive </option>
                                                </select>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="exam_model">Exam Model<span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control" id="exam_model" name="exam_model" required>
                                                    <option disabled selected>Select Exam Model</option>
                                                    <option value="Major">Major</option>
                                                    <option value="Minor">Minor</option>
                                                </select>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="exam_tiers">Exam Tiers<span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control" id="exam_tiers" name="exam_tiers" required>
                                                    <option disabled selected>Select Exam Tiers</option>
                                                    <option value="1">1 - (Single Tier)</option>
                                                    <option value="2">2 - (Multi Tiers)</option>
                                                </select>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="exam_service">Exam Service<span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control" id="exam_service" name="exam_service" required>
                                                    <option disabled selected>Select Exam Service</option>
                                                    <option value="001">GROUP I SERVICES EXAMINATION</option>
                                                    <option value="002">GROUP I-A SERVICES EXAMINATION</option>
                                                </select>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="notif_no">Notification no <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="notif_no" name="notif_no"
                                                    required placeholder="08/2024">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="mb-3 ">
                                                <label class="form-label" for="notif_date">Notification Date <span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group date">
                                                    <input type="text" name="notif_date" class="form-control"
                                                        value="05/20/2017" id="notif_date" />
                                                    <span class="input-group-text">
                                                        <i class="feather icon-calendar"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="exam_name">Exam Name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="exam_name" name="exam_name"
                                                    required placeholder="Combined Civil Services Examination - II">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="exam_name_tamil">Exam Name in Tamil <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="exam_name_tamil"
                                                    name="exam_name_tamil" required
                                                    placeholder="ஒருங்கிணைந்த சிவில் சர்வீசஸ் தேர்வு - II (குரூப் II மற்றும் IIA சேவைகள்)">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="post_name">Post Name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="post_name"
                                                    name="post_name" required placeholder="Group II and IIA Services">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="mb-3 ">
                                                <label class="form-label" for="last_date_apply">Last Date For Apply <span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group date">
                                                    <input type="text" name="last_date_apply" class="form-control"
                                                        value="05/20/2017" id="last_date_apply" />
                                                    <span class="input-group-text">
                                                        <i class="feather icon-calendar"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="mb-3 ">
                                                <label class="form-label" for="exam_start_date">Exam Start Date <span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group date">
                                                    <input type="text" name="exam_start_date" class="form-control"
                                                        value="05/20/2017" id="exam_start_date" />
                                                    <span class="input-group-text">
                                                        <i class="feather icon-calendar"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Exam Subjects, Date, and Session</h5>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="subjectsTable">
                                        <thead>
                                            <tr>
                                                <th>Exam Date</th>
                                                <th>Session</th>
                                                <th>Time</th>
                                                <th>Duration</th>
                                                <th>Subject</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td data-label="Exam Date">
                                                    <div class="input-group date">
                                                        <input type="text" name="exam_date" class="form-control"
                                                            value="05/20/2017" id="exam_date" required />
                                                        <span class="input-group-text">
                                                            <i class="feather icon-calendar"></i>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td data-label="Session">
                                                    <select name="subjects[0][session]" class="form-control" required>
                                                        <option disabled selected>Select Session</option>
                                                        <option value="fn">FN</option>
                                                        <option value="an">AN</option>
                                                    </select>
                                                </td>
                                                <td data-label="Time">
                                                    <select name="subjects[0][time]" class="form-control" required>
                                                        <option disabled selected>Select Time</option>
                                                        <option value="09:30AM">09:30AM</option>
                                                        <option value="10:00AM">10:00AM</option>
                                                        <option value="10:30AM">10:30AM</option>
                                                        <option value="11:00AM">11:00AM</option>
                                                        <option value="11:30AM">11:30AM</option>
                                                        <option value="02:00PM">02:00PM</option>
                                                        <option value="02:30PM">02:30PM</option>
                                                        <option value="03:00PM">03:00PM</option>
                                                        <option value="03:30PM">03:30PM</option>
                                                    </select>
                                                </td>
                                                <td data-label="Duration">
                                                    <select name="subjects[0][duration]" class="form-control" required>
                                                        <option disabled selected>Select Duration</option>
                                                        <option value="2hrs">2 Hrs</option>
                                                        <option value="2.5hrs">2:30 Hrs</option>
                                                        <option value="3hrs">3 Hrs</option>
                                                    </select>
                                                </td>
                                                <td data-label="Subject">
                                                    <input type="text" name="subjects[0][name]" class="form-control"
                                                        placeholder="Subject Name" required />
                                                </td>
                                                <td data-label="Action">
                                                    <button type="button" class="btn btn-success add-row">+</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-end btn-page">
                            <div class="btn btn-outline-secondary">Cancel</div>
                            <div class="btn btn-primary">Create</div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>

    @include('partials.footer')

    @push('scripts')
        <script src="{{ asset('storage/assets/js/plugins/datepicker-full.min.js') }}"></script>
        <script>
            function initializeDatepicker(element) {
                new Datepicker(element, {
                    buttonClass: 'btn',
                    todayBtn: true,
                    clearBtn: true,
                    format: 'dd-mm-yyyy'
                });
            }
            document.addEventListener('DOMContentLoaded', function() {
                let rowIndex = 1;
                // Initialize datepickers for existing elements
                document.querySelectorAll('.date input').forEach(initializeDatepicker);
                // Add a new row
                document.querySelector('#subjectsTable').addEventListener('click', function(e) {
                    if (e.target.classList.contains('add-row')) {
                        e.preventDefault();

                        const newRow = `
                                    <tr>
                                        <td data-label="Exam Date">
                                            <div class="input-group date">
                                                <input type="text" name="subjects[${rowIndex}][date]" class="form-control" value="05/20/2017" id="exam_date" required />
                                                <span class="input-group-text">
                                                    <i class="feather icon-calendar"></i>
                                                </span>
                                            </div>
                                        </td>
                                        <td data-label="Session">
                                            <select name="subjects[${rowIndex}][session]" class="form-control" required>
                                                <option disabled selected>Select Session</option>
                                                <option value="fn">FN</option>
                                                <option value="an">AN</option>
                                            </select>
                                        </td>
                                        <td data-label="Time">
                                            <select name="subjects[${rowIndex}][time]" class="form-control" required>
                                                <option disabled selected>Select Time</option>
                                                <option value="09:30AM">09:30AM</option>
                                                <option value="10:00AM">10:00AM</option>
                                                <option value="10:30AM">10:30AM</option>
                                                <option value="11:00AM">11:00AM</option>
                                                <option value="11:30AM">11:30AM</option>
                                                <option value="02:00PM">02:00PM</option>
                                                <option value="02:30PM">02:30PM</option>
                                                <option value="03:00PM">03:00PM</option>
                                                <option value="03:30PM">03:30PM</option>
                                            </select>
                                        </td>
                                        <td data-label="Duration">
                                            <select name="subjects[${rowIndex}][duration]" class="form-control" required>
                                                <option disabled selected>Select Duration</option>
                                                <option value="2hrs">2 Hrs</option>
                                                <option value="2.5hrs">2:30 Hrs</option>
                                                <option value="3hrs">3 Hrs</option>
                                            </select>
                                        </td>
                                        <td data-label="Subject">
                                            <input type="text" name="subjects[${rowIndex}][name]" class="form-control" placeholder="Subject Name" required />
                                        </td>
                                        <td data-label="Action">
                                            <button type="button" class="btn btn-danger remove-row">-</button>
                                        </td>
                                    </tr>
                                `;

                        document.querySelector('#subjectsTable tbody').insertAdjacentHTML('beforeend', newRow);

                        // Initialize datepicker for the new row
                        initializeDatepicker(document.querySelector(
                            `#subjectsTable tbody tr:last-child .date input`));

                        rowIndex++;
                    }
                });

                // Remove a row
                document.querySelector('#subjectsTable').addEventListener('click', function(e) {
                    if (e.target.classList.contains('remove-row')) {
                        e.preventDefault();
                        e.target.closest('tr').remove();
                    }
                });

            });
        </script>
    @endpush
    @include('partials.theme')

@endsection
