<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
    <div class="main-wrapper">
    <div class="header">
        <div class="header-left">
            <a href="index2.php" class="logo">
                <img src="assets/img/logo.png" width="35" height="35" alt=""> 
                <span>Health Care</span>
            </a>
        </div>
        <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
        <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
        <ul class="nav user-menu float-right">
            <li class="nav-item dropdown d-none d-sm-block">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><i class="fa fa-bell-o"></i> 
                    <span class="badge badge-pill bg-danger float-right">3</span>
                </a>
                <div class="dropdown-menu notifications">
                    <div class="topnav-dropdown-header">
                        <span>Notifications</span>
                    </div>
                    <div class="drop-scroll">
                        <ul class="notification-list">
                            <li class="notification-message">
                                <a href="activities.php">
                                    <div class="media">
                                        <span class="avatar">
                                            <img alt="John Doe" src="assets/img/user.jpg" class="img-fluid">
                                        </span>
                                        <div class="media-body">
                                            <p class="noti-details"><span class="noti-title">John Doe</span> added new task <span class="noti-title">Patient appointment booking</span></p>
                                            <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="activities.php">
                                    <div class="media">
                                        <span class="avatar">V</span>
                                        <div class="media-body">
                                            <p class="noti-details"><span class="noti-title">Tarah Shropshire</span> changed the task name <span class="noti-title">Appointment booking with payment gateway</span></p>
                                            <p class="noti-time"><span class="notification-time">6 mins ago</span></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="activities.php">
                                    <div class="media">
                                        <span class="avatar">L</span>
                                        <div class="media-body">
                                            <p class="noti-details"><span class="noti-title">Misty Tison</span> added <span class="noti-title">Domenic Houston</span> and <span class="noti-title">Claire Mapes</span> to project <span class="noti-title">Doctor available module</span></p>
                                            <p class="noti-time"><span class="notification-time">8 mins ago</span></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="activities.php">
                                    <div class="media">
                                        <span class="avatar">G</span>
                                        <div class="media-body">
                                            <p class="noti-details"><span class="noti-title">Rolland Webber</span> completed task <span class="noti-title">Patient and Doctor video conferencing</span></p>
                                            <p class="noti-time"><span class="notification-time">12 mins ago</span></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="activities.php">
                                    <div class="media">
                                        <span class="avatar">V</span>
                                        <div class="media-body">
                                            <p class="noti-details"><span class="noti-title">Bernardo Galaviz</span> added new task <span class="noti-title">Private chat module</span></p>
                                            <p class="noti-time"><span class="notification-time">2 days ago</span></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="topnav-dropdown-footer">
                        <a href="activities.php">View all Notifications</a>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown d-none d-sm-block">
                <a href="javascript:void(0);" id="open_msg_box" class="hasnotifications nav-link">
                    <i class="fa fa-comment-o"></i> <span class="badge badge-pill bg-danger float-right">8</span>
                </a>
            </li>
            <li class="nav-item dropdown has-arrow">
                <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                    <span class="user-img"><img class="rounded-circle" src="assets/img/user.jpg" width="40" alt="Admin">
                        <span class="status online"></span></span>
                    <span>Admin</span>
                </a>
                <div class="dropdown-menu">
                    <!-- Redirect to Jetstream Profile Page -->
                    <a class="dropdown-item" href="{{ route('profile.show') }}">My Profile</a>

                    <!-- Edit Profile - custom route (if needed) -->
                    <a class="dropdown-item" href="{{url('/edit-profile')}}">Edit Profile</a>

                    <!-- Settings (if applicable) -->
                    <a class="dropdown-item" href="settings.php">Settings</a>

                    <!-- Logout with Jetstream -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); this.closest('form').submit();">
                            Logout
                        </a>
                    </form>
                </div>
            </li>
        </ul>
        <div class="dropdown mobile-user-menu float-right">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-ellipsis-v"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="profile.php">My Profile</a>
                <a class="dropdown-item" href="edit-profile.php">Edit Profile</a>
                <a class="dropdown-item" href="settings.php">Settings</a>
                <a class="dropdown-item" href="{{ route('logout') }}" 
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            </div>
        </div>
    </div>

    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title">Main</li>
                    <li class="{{ request()->is('index2') ? 'active' : '' }}">
                        <a href="{{url('/index2')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                    </li>
                    <li class="{{ request()->is('doctors') ? 'active' : '' }}">
                        <a href="{{url('/doctors')}}"><i class="fa fa-user-md"></i> <span>Doctors</span></a>
                    </li>
                    <li class="{{ request()->is('patients') ? 'active' : '' }}">
                        <a href="{{url('/patients')}}"><i class="fa fa-wheelchair"></i> <span>Patients</span></a>
                    </li>
                    <li class="{{ request()->is('appointments') ? 'active' : '' }}">
                        <a href="{{url('/appointments')}}"><i class="fa fa-calendar"></i> <span>Appointments</span></a>
                    </li>
                    <li class="{{ request()->is('schedule') ? 'active' : '' }}">
                        <a href="{{url('/schedule')}}"><i class="fa fa-calendar-check-o"></i> <span>Doctor Schedule</span></a>
                    </li>
                    <li class="{{ request()->is('departments') ? 'active' : '' }}">
                        <a href="{{url('/departments')}}"><i class="fa fa-hospital-o"></i> <span>Departments</span></a>
                    </li>

                    <li class="menu-title">Extras</li>
                    <li class="submenu">
                        <a href="#"><i class="fa fa-columns"></i> <span>Pages</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('profile.show') }}"> Profile </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


</body>
</html>