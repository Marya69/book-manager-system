<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon logo of website-->
    {{-- <link rel="icon" href="{{ asset('assets/images/favicon-32x32.png') }}" type="image/png" /> --}}
    <!--plugins-->
    <link href="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/js/pace.min.js') }}"></script>
    {{-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> --}}
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!-- Bootstrap CSS -->
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">
    <!-- Theme Style CSS -->
    {{--  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.bundle.min.js"></script>

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
    {{--  --}}

    <link rel="stylesheet" href="{{ asset('assets/css/dark-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/semi-dark.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/header-colors.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}" />
    <link rel="icon" href="{{ asset('assets/images/logo.png') }}" type="image/png">

    <title> @yield('title', 'Main Page') </title>

</head>
<body>
    <!--wrapper-->
    <div class="wrapper">



        @includeIf('backend.sell.layout.sidebar')
        <!--sidebar wrapper -->

        <!--end sidebar wrapper -->
        <!--start header -->
        @includeIf('backend.sell.layout.header')
        <!--end header -->
        <!--start page wrapper -->

        @yield('content')
        @auth


            <!--end page wrapper -->
            <!--start overlay-->
            <div class="overlay toggle-icon"></div>
            <!--end overlay-->
            <!--Start Back To Top Button-->
            <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
            <!--End Back To Top Button-->
            @includeIf('backend.layout.footer')

        </div>
    @endauth
    <!--end wrapper-->


    <!-- search modal -->

    <!-- end search modal -->




    <!--start switcher-->
    <script src="{{ asset('assets/js/sweetalert2@11') }}"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--end switcher-->

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('assets/plugins/chartjs/js/chart.js') }}"></script>
    <script src="{{ asset('assets/js/index.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script> --}}
    <script src="{{ asset('assets/js/toastr.min.js') }}"></script>
    <!--app JS-->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script>
        new PerfectScrollbar(".app-container")
    </script>
    <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        @endif
    </script>

    <script>
        $(document).ready(function() {
            $(document).on('click', '#delete', function(e) {
                e.preventDefault();
                var link = $(this).attr('href');

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link;
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                        });
                    }
                });
            });
        });
    </script>






    <script>
        document.getElementById('name').addEventListener('change', function() {
            var selectedEmployeeName = this.value;
            var employees = {!! json_encode($employess) !!};

            var monthSelect = document.getElementById('Month');
            var yearSelect = document.getElementById('Year');
            var salaryInput = document.getElementById('salary');

            monthSelect.innerHTML = '';
            yearSelect.innerHTML = '';
            salaryInput.value = '';

            if (selectedEmployeeName) {
                var selectedEmployee = employees.find(employee => employee.name === selectedEmployeeName);

                if (selectedEmployee && selectedEmployee.dateofwork) {
                    var dateOfWork = new Date(selectedEmployee.dateofwork);
                    var startMonth = dateOfWork.getMonth(); // Get month from dateofwork
                    var startYear = dateOfWork.getFullYear(); // Get year from dateofwork
                    console.log(startYear);
                    var months = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'];

                    months.forEach(function(month, index) {
                        var option = document.createElement('option');
                        option.value = index + 1;
                        option.textContent = month;
                        monthSelect.appendChild(option);
                    });

                    monthSelect.value = startMonth + 1;

                    var endYear = startYear + 10;

                    for (var i = startYear; i <= endYear; i++) {
                        var option = document.createElement('option');
                        option.value = i;
                        option.textContent = i;
                        yearSelect.appendChild(option);
                    }

                    salaryInput.value = selectedEmployee.salary;

                    var existingEntries = {!! json_encode($muchdan) !!};

                    if (existingEntries && existingEntries.length > 0) {
                        var lastEntry = existingEntries[existingEntries.length - 1];
                        var lastMang = lastEntry.mang;
                        var newMonth = parseInt(lastMang) + 1;

                        if (newMonth > 12) {
                            newMonth = 1;
                            yearSelect.value = parseInt(lastEntry.year) + 1;
                        }

                        monthSelect.value = newMonth;
                    }
                }
            }
        });
    </script>




    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var usersLink = document.getElementById("usersLink");
            var usersSubMenu = document.getElementById("usersSubMenu");
            var isSubMenuVisible = false;

            // Hide submenu initially
            usersSubMenu.style.display = "none";

            // Toggle submenu visibility when clicking on the "Users" link
            usersLink.addEventListener("click", function(event) {
                event.preventDefault(); // Prevent the default action of the link

                // Toggle submenu visibility
                if (!isSubMenuVisible) {
                    usersSubMenu.style.display = "block";
                    isSubMenuVisible = true;
                } else {
                    usersSubMenu.style.display = "none";
                    isSubMenuVisible = false;
                }
            });

            // Redirect to the user page when clicking on the "Users" link if submenu is not visible
            usersLink.addEventListener("click", function(event) {
                if (!isSubMenuVisible) {
                    window.location.href = usersLink.getAttribute("href");
                }
            });

            // Prevent submenu from closing when clicking on submenu items
            usersSubMenu.addEventListener("click", function(event) {
                event.stopPropagation(); // Prevent the click event from bubbling up to the parent element
            });

            // Hide submenu when clicking outside of it
            document.addEventListener("click", function(event) {
                if (!usersLink.contains(event.target) && !usersSubMenu.contains(event.target)) {
                    usersSubMenu.style.display = "none";
                    isSubMenuVisible = false;
                }
            });
        });
    </script>


    {{-- side bar --}}


    @yield('script')

</body>

</html>
