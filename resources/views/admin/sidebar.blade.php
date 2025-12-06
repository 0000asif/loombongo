<!-- BEGIN: Sidebar-->
            <div class="page-sidebar custom-scroll" id="sidebar">
                <div class="sidebar-header"><a class="sidebar-brand" href="{{ URL::to('dashboard')}}">IT Plan BD</a><a class="sidebar-brand-mini" href="index.html">Rd</a><span class="sidebar-points"><span class="badge badge-success badge-point mr-2"></span><span class="badge badge-danger badge-point mr-2"></span><span class="badge badge-warning badge-point"></span></span></div>
                <ul class="sidebar-menu metismenu">
                    <li class="heading"><span>DASHBOARDS</span></li>
                    <li class="mm-active"><a href="{{ URL::to('/dashboard') }}">
                        <i class="sidebar-item-icon ft-home"></i><span class="nav-label">Dashboards</span></a>
                    </li>
                    <li><a href="javascript:;"><i class="sidebar-item-icon ft-anchor"></i><span class="nav-label">Form</span><i class="arrow la la-angle-right"></i></a>
                        <ul class="nav-2-level">
                            <li><a href="{{ URL::to('newform') }}">New Form</a></li>
                            <li><a href="{{ URL::to('datatables') }}">Datatable</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- END: Sidebar-->
