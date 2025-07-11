<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">

        <div>
            <h6 class="logo-text">BookShop Database</h6>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('sell.dashboard') }}" target="_self"
>
                <div class="parent-icon"><i class='bx bxs-dashboard'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <hr>
        {{-- <li class="menu-label"></li> --}}
        <li>
            <a href="{{ route('pos') }}" target="_self"
>
                <div class="parent-icon"><i class='bx bxs-store-alt'></i>
                </div>
                <div class="menu-title">Order Prodect</div>
            </a>
        </li>
        <hr>

        <li>
            <a class="has-arrow" href="javascript:;" target="_self"
>
                <div class="parent-icon"><i class='bx bxs-purchase-tag-alt'></i>
                </div>
                <div class="menu-title">Sold</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.Sold') }}"><i class='bx bxs-shopping-bag'></i>Sold</a>
                </li>
                <li> <a href="{{ route('all.Sold.gift') }}"><i class='bx bxs-gift'></i>Gift</a>
                </li>
            </ul>
        </li>
        <hr>
        <li>

            <a href="{{ route('Prodect') }}" target="_self"
>
                <div class="parent-icon"><i class='bx bxs-book-add'></i>
                </div>
                <div class="menu-title">All Prodect</div>
            </a>
        </li>

        <hr>
        <li>

            <a href="{{ route('Page.Money') }}"target="_self"
 >
                <div class="parent-icon"><i class='bx bxs-wallet-alt'></i>
                </div>
                <div class="menu-title">Add Money</div>
            </a>
        </li>


        <hr>
        <li>
            <a class="has-arrow" href="javascript:;" target="_self"
>
                <div class="parent-icon"><i class="bx bxs-user-pin"></i>
                </div>
                <div class="menu-title">Team Memembers</div>
            </a>
            <ul>
                <li> <a href="{{ route('Users') }}"><i class='bx bxs-user-plus'></i>Users</a>
                </li>
                <li> <a href="{{ route('Employee') }}"><i class='bx bxs-user-detail'></i>Employee</a>
                </li>
                <li> <a href="{{ route('Muchadrawakn') }}"><i class='bx bx-money'></i>Payment of salaries</a>
                </li>
            </ul>
        </li>
        <hr>
        <li>
            <a class="has-arrow" href="javascript:;" target="_self"
>
                <div class="parent-icon"><i class='bx bxs-wallet'></i>
                </div>
                <div class="menu-title">Expenses</div>
            </a>
            <ul>
                <li> <a target="_self"
 href="{{ route('Employee.Expenses') }}"><i class='bx bx-check'></i>Employee expenses</a>
                </li>
                <li> <a target="_self"
 href="{{ route('Rental.Expenses') }}"><i class='bx bx-check'></i>Rental expenses</a>
                </li>
                <li> <a target="_self"
 href="{{ route('Book.Expenses') }}"><i class='bx bx-check'></i>Book expenses</a>
                </li>
                <li> <a target="_self"
 href="{{ route('Balance.Expenses') }}"><i class='bx bx-check'></i>Balance expenses</a>
                </li>
                <li> <a target="_self"
 href="{{ route('Learning.Expenses') }}"><i class='bx bx-check'></i>Learning expenses</a>
                </li>
                <li> <a target="_self"
 href="{{ route('Reklam.Expenses') }}"><i class='bx bx-check'></i>Rekalm expenses</a>
                </li>
                <li> <a target="_self"
 href="{{ route('Course.Expenses') }}"><i class='bx bx-check'></i>Course expenses</a>
                </li>
                <li> <a target="_self"
 href="{{ route('Office.Expenses') }}"><i class='bx bx-check'></i>Office expenses</a>
                </li>
                <li> <a target="_self"
 href="{{ route('Technological.Expenses') }}"><i class='bx bx-check'></i>Technological
                        expenses</a>
                </li>
                <li> <a target="_self"
 href="{{ route('Exhibition.Expenses') }}"><i class='bx bx-check'></i>Exhibition
                        expenses</a>
                </li>
                <li> <a target="_self"
 href="{{ route('personal.Expenses') }}"><i class='bx bx-check'></i>Personal Expenses</a>
                </li>
            </ul>
        </li>
        {{-- <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-map-alt"></i>
                </div>
                <div class="menu-title">Maps</div>
            </a>
            <ul>
                <li> <a href="map-google-maps.html"><i class='bx bx-radio-circle'></i>Google Maps</a>
                </li>
                <li> <a href="map-vector-maps.html"><i class='bx bx-radio-circle'></i>Vector Maps</a>
                </li>
            </ul>
        </li> --}}
        <hr>
        <li class=" ">
            <a href="{{ route('user.logout') }}" target="_self"
>
                <div class="parent-icon"><i class='bx bxs-log-out text-danger'></i>
                </div>
                <div class="menu-title text-danger">Logout</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->
