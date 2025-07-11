@extends('backend.sell.master')
@section('title', 'Pay the salary')
@section('content')

    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

                <div class="ps-3">
                    <h6 class="mb-0 text-uppercase">Add User</h6>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ route('Muchadrawakn') }}" class="btn btn-primary"><i
                                class="bx bx-arrow-back pb-1"></i>Back</a>

                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <hr />
            <div class="row">
                <div class="col-xl-8 mx-auto">
                    <div class="row card">
                        <div class="card-body p-4 row">
                            <form action="{{ route('update.mucha', $muchdan->id) }}" method="post"
                                class="row g-3 needs-validation" novalidate>
                                @csrf
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Employee</label>
                                    <select id="name" class="form-select" name="name" required>

                                        @foreach ($employess as $employee)
                                            <option value="{{ $employee->name }}"
                                                @if ($employee->id == $muchdan->employee_id) selected @endif>{{ $employee->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="Month" class="form-label">Month</label>
                                    <select id="Month" class="form-select" name="Month" required>
                                        @for ($i = 1; $i <= 12; $i++)
                                            <option value="{{ $i }}"
                                                @if ($i == $muchdan->mang) selected @endif>{{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                    @error('Month')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="col-md-6">
                                    <label for="Year" class="form-label">Year</label>
                                    <select id="Year" class="form-select" name="Year" required>
                                        <option value="{{ $muchdan->year }}" selected>{{ $muchdan->year }}</option>
                                        @php
                                            // Extract the year from the muchdan table based on the selected name
                                            $selectedYear = $muchdan->year ?? null;

                                            // If year is not found, default to the current year
                                            if (!$selectedYear) {
                                                $selectedYear = date('Y');
                                            }

                                            // Set the start year and end year based on the selected year
                                            $endYear = $selectedYear + 10;

                                            // Loop through the range of years
                                            for ($i = $selectedYear; $i <= $endYear; $i++) {
                                                echo "<option value=\"$i\" @if ($i == $selectedYear)  @endif>$i</option>";
                                            }
                                        @endphp
                                    </select>
                                    @error('Year')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>





                                <div class="col-md-6">
                                    <label for="Start_date" class="form-label">Date</label>
                                    <input type="date" class="form-control" id="Start_date" name="Start_date"
                                        value="{{ date('Y-m-d') }}" required>
                                    @error('Start_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div id="salaryDisplay" class="col-md-6">
                                    <label for="salary" class="form-label">Salary</label>
                                    <input type="text" value="{{ $muchdan->salary }}" id="salary"
                                        class="form-control" name="salary" readonly>
                                </div>

                                <div id="salaryDisplay" class="col-md-6">
                                    <label for="reward" class="form-label">Reward</label>
                                    <input type="number" value="{{ $muchdan->reward }}" id="reward"
                                        class="form-control" name="reward">
                                    @error('reward')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>




                                <div class="col-md-12">
                                    <div class="d-md-flex d-grid align-items-center gap-3">
                                        <button type="submit" value="Pay the salary" class="btn btn-primary px-4">Update
                                            the
                                            salary</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
