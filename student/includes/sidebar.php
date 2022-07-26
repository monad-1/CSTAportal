<?php

if ($pageValue == 0) {
       $strSidebar = '';
       // <!-- Sidebar -->
       $strSidebar .= '<ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:#432616;">';

       // <!-- Sidebar - Brand -->
       $strSidebar .= '        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">';
       $strSidebar .= '            <div class="sidebar-brand-icon rotate-n-10">';
       $strSidebar .= '               <img src="img/CSTA_SMALL.png" width="100" style="margin-top:100px; margin-bottom:50px;" alt="">';
       $strSidebar .= '            </div>';
       $strSidebar .= '        </a>';
       $strSidebar .= '        ';
       $strSidebar .= '        <div class="sidebar-brand-text text-center text-gray-100" style="margin-top:50px;"><strong>CSTA Student Portal</strong></div>';
       $strSidebar .= '        <br>';
       // <!-- Nav Item - Dashboard -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link" href="index.php">';
       $strSidebar .= '                <i class="fas fa-fw fa-home"></i>';
       $strSidebar .= '                <span>Home</span></a>';
       $strSidebar .= '        </li>';

       // <!-- Nav Item - Profile -->
       $strSidebar .= '          <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link" href="profile.php">';
       $strSidebar .= '                <i class="fas fa-fw fa-user"></i>';
       $strSidebar .= '                <span>Profile</span></a>';
       $strSidebar .= '        </li>';

       // <!-- Nav Item - Class Schedules -->
       $strSidebar .= '          <li class="nav-item" '.$sidebar_schedule.'>';
       $strSidebar .= '            <a class="nav-link" href="schedules.php">';
       $strSidebar .= '				<i class="fas fa-fw fa-thumbtack"></i>';
       $strSidebar .= '                <span>Class Schedules</span></a>';
       $strSidebar .= '        </li>';

       // <!-- Nav Item - Calendar -->
       $strSidebar .= '          <li class="nav-item" '.$sidebar_calendar.'>';
       $strSidebar .= '            <a class="nav-link" href="calendar.php">';
       $strSidebar .= '				<i class="fas fa-fw fa-calendar"></i>';
       $strSidebar .= '                <span>Calendar of Events</span></a>';
       $strSidebar .= '        </li>';



       //<!-- Nav Item - passowrd -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link" href="settings.php">';
       $strSidebar .= '                <i class="fas fa-fw fa-key"></i>';
       $strSidebar .= '                <span>Change Password</span></a>';
       $strSidebar .= '        </li>';

       // <!-- Nav Item - Faqs -->
       $strSidebar .= '          <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link" href="frequently-asked-questions.php">';
       $strSidebar .= '				<i class="fas fa-fw fa-question"></i>';
       $strSidebar .= '                <span>FAQs</span></a>';
       $strSidebar .= '        </li>';


       // <!-- Nav Item - Document -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '         <a class="nav-link" href="logout.php">';
       $strSidebar .= '             <i class="fas fa-fw fa-sign-out-alt"></i>';
       $strSidebar .= '            <span>Logout</span></a>';
       $strSidebar .= '     </li>';
       $strSidebar .= '</ul>';
} else if ($pageValue == 1) {
       $strSidebar = '';
       // <!-- Sidebar -->
       $strSidebar .= '<ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:#432616;">';

       // <!-- Sidebar - Brand -->
       $strSidebar .= '        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">';
       $strSidebar .= '            <div class="sidebar-brand-icon rotate-n-10">';
       $strSidebar .= '               <img src="img/CSTA_SMALL.png" width="100" style="margin-top:100px; margin-bottom:50px;" alt="">';
       $strSidebar .= '            </div>';
       $strSidebar .= '        </a>';
       $strSidebar .= '       ';
       $strSidebar .= '        <div class="sidebar-brand-text text-center text-gray-100" style="margin-top:50px;"><strong>CSTA Student Portal</strong></div>';
       $strSidebar .= '        <br>';
       // <!-- Nav Item - Dashboard -->
       $strSidebar .= '        <li class="nav-item active">';
       $strSidebar .= '            <a class="nav-link" href="index.php">';
       $strSidebar .= '                <i class="fas fa-fw fa-home"></i>';
       $strSidebar .= '                <span>Home</span></a>';
       $strSidebar .= '        </li>';

       // <!-- Nav Item - Profile -->
       $strSidebar .= '          <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link" href="profile.php">';
       $strSidebar .= '                <i class="fas fa-fw fa-user"></i>';
       $strSidebar .= '                <span>Profile</span></a>';
       $strSidebar .= '        </li>';

       // <!-- Nav Item - Class Schedules -->
       $strSidebar .= '          <li class="nav-item" '.$sidebar_schedule.'>';
       $strSidebar .= '            <a class="nav-link" href="schedules.php">';
       $strSidebar .= '				<i class="fas fa-fw fa-thumbtack"></i>';
       $strSidebar .= '                <span>Class Schedules</span></a>';
       $strSidebar .= '        </li>';

       // <!-- Nav Item - Calendar -->
       $strSidebar .= '          <li class="nav-item" '.$sidebar_calendar.'>';
       $strSidebar .= '            <a class="nav-link" href="calendar.php">';
       $strSidebar .= '				<i class="fas fa-fw fa-calendar"></i>';
       $strSidebar .= '                <span>Calendar of Events</span></a>';
       $strSidebar .= '        </li>';

       //<!-- Nav Item - Enrollment -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link" href="settings.php">';
       $strSidebar .= '                <i class="fas fa-fw fa-key"></i>';
       $strSidebar .= '                <span>Change Password</span></a>';
       $strSidebar .= '        </li>';

       
       // <!-- Nav Item - Faqs -->
       $strSidebar .= '          <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link" href="frequently-asked-questions.php">';
       $strSidebar .= '				<i class="fas fa-fw fa-question"></i>';
       $strSidebar .= '                <span>FAQs</span></a>';
       $strSidebar .= '        </li>';

       // <!-- Nav Item - Document -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '         <a class="nav-link" href="logout.php">';
       $strSidebar .= '             <i class="fas fa-fw fa-sign-out-alt"></i>';
       $strSidebar .= '            <span>Logout</span></a>';
       $strSidebar .= '     </li>';
       $strSidebar .= '</ul>';
} elseif ($pageValue == 2) {
       $strSidebar = '';
       // <!-- Sidebar -->
       $strSidebar .= '<ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:#432616;">';

       // <!-- Sidebar - Brand -->
       $strSidebar .= '        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">';
       $strSidebar .= '            <div class="sidebar-brand-icon rotate-n-10">';
       $strSidebar .= '               <img src="img/CSTA_SMALL.png" width="100" style="margin-top:100px; margin-bottom:50px;" alt="">';
       $strSidebar .= '            </div>';
       $strSidebar .= '        </a>';
       $strSidebar .= '       ';
       $strSidebar .= '        <div class="sidebar-brand-text text-center text-gray-100" style="margin-top:50px;"><strong>CSTA Student Portal</strong></div>';
       $strSidebar .= '        <br>';
       // <!-- Nav Item - Dashboard -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link" href="index.php">';
       $strSidebar .= '                <i class="fas fa-fw fa-home"></i>';
       $strSidebar .= '                <span>Home</span></a>';
       $strSidebar .= '        </li>';

       // <!-- Nav Item - Profile -->
       $strSidebar .= '          <li class="nav-item active">';
       $strSidebar .= '            <a class="nav-link" href="profile.php">';
       $strSidebar .= '                <i class="fas fa-fw fa-user"></i>';
       $strSidebar .= '                <span>Profile</span></a>';
       $strSidebar .= '        </li>';

       // <!-- Nav Item - Class Schedules -->
       $strSidebar .= '          <li class="nav-item" '.$sidebar_schedule.'>';
       $strSidebar .= '            <a class="nav-link" href="schedules.php">';
       $strSidebar .= '				<i class="fas fa-fw fa-thumbtack"></i>';
       $strSidebar .= '                <span>Class Schedules</span></a>';
       $strSidebar .= '        </li>';

       // <!-- Nav Item - Calendar -->
       $strSidebar .= '          <li class="nav-item" '.$sidebar_calendar.'>';
       $strSidebar .= '            <a class="nav-link" href="calendar.php">';
       $strSidebar .= '				<i class="fas fa-fw fa-calendar"></i>';
       $strSidebar .= '                <span>Calendar of Events</span></a>';
       $strSidebar .= '        </li>';

       //<!-- Nav Item - Enrollment -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link" href="settings.php">';
       $strSidebar .= '                <i class="fas fa-fw fa-key"></i>';
       $strSidebar .= '                <span>Change Password</span></a>';
       $strSidebar .= '        </li>';

       
       // <!-- Nav Item - Faqs -->
       $strSidebar .= '          <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link" href="frequently-asked-questions.php">';
       $strSidebar .= '				<i class="fas fa-fw fa-question"></i>';
       $strSidebar .= '                <span>FAQs</span></a>';
       $strSidebar .= '        </li>';

       // <!-- Nav Item - Document -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '         <a class="nav-link" href="logout.php">';
       $strSidebar .= '             <i class="fas fa-fw fa-sign-out-alt"></i>';
       $strSidebar .= '            <span>Logout</span></a>';
       $strSidebar .= '     </li>';
       $strSidebar .= '</ul>';
} else if ($pageValue === 3) {
       $strSidebar = '';
       // <!-- Sidebar -->
       $strSidebar .= '<ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:#432616;">';

       // <!-- Sidebar - Brand -->
       $strSidebar .= '        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">';
       $strSidebar .= '            <div class="sidebar-brand-icon rotate-n-10">';
       $strSidebar .= '               <img src="img/CSTA_SMALL.png" width="100" style="margin-top:100px; margin-bottom:50px;" alt="">';
       $strSidebar .= '            </div>';
       $strSidebar .= '        </a>';
       $strSidebar .= '        ';
       $strSidebar .= '        <div class="sidebar-brand-text text-center text-gray-100" style="margin-top:50px;"><strong>CSTA Student Portal</strong></div>';
       $strSidebar .= '        <br>';
       // <!-- Nav Item - Dashboard -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link" href="index.php">';
       $strSidebar .= '                <i class="fas fa-fw fa-home"></i>';
       $strSidebar .= '                <span>Home</span></a>';
       $strSidebar .= '        </li>';

       // <!-- Nav Item - Profile -->
       $strSidebar .= '          <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link" href="profile.php">';
       $strSidebar .= '                <i class="fas fa-fw fa-user"></i>';
       $strSidebar .= '                <span>Profile</span></a>';
       $strSidebar .= '        </li>';

       // <!-- Nav Item - Class Schedules -->
       $strSidebar .= '          <li class="nav-item active" '.$sidebar_schedule.'>';
       $strSidebar .= '            <a class="nav-link active" href="schedules.php">';
       $strSidebar .= '				<i class="fas fa-fw fa-thumbtack"></i>';
       $strSidebar .= '                <span>Class Schedules</span></a>';
       $strSidebar .= '        </li>';

       // <!-- Nav Item - Calendar -->
       $strSidebar .= '          <li class="nav-item" '.$sidebar_calendar.'>';
       $strSidebar .= '            <a class="nav-link" href="calendar.php">';
       $strSidebar .= '				<i class="fas fa-fw fa-calendar"></i>';
       $strSidebar .= '                <span>Calendar of Events</span></a>';
       $strSidebar .= '        </li>';

       //<!-- Nav Item - Enrollment -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link" href="settings.php">';
       $strSidebar .= '                <i class="fas fa-fw fa-key"></i>';
       $strSidebar .= '                <span>Change Password</span></a>';
       $strSidebar .= '        </li>';

       
       // <!-- Nav Item - Faqs -->
       $strSidebar .= '          <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link" href="frequently-asked-questions.php">';
       $strSidebar .= '				<i class="fas fa-fw fa-question"></i>';
       $strSidebar .= '                <span>FAQs</span></a>';
       $strSidebar .= '        </li>';

       // <!-- Nav Item - Document -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '         <a class="nav-link" href="logout.php">';
       $strSidebar .= '             <i class="fas fa-fw fa-sign-out-alt"></i>';
       $strSidebar .= '            <span>Logout</span></a>';
       $strSidebar .= '     </li>';
       $strSidebar .= '</ul>';
} elseif ($pageValue === 4) {
       $strSidebar = '';
       // <!-- Sidebar -->
       $strSidebar .= '<ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:#432616;">';

       // <!-- Sidebar - Brand -->
       $strSidebar .= '        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">';
       $strSidebar .= '            <div class="sidebar-brand-icon rotate-n-10">';
       $strSidebar .= '               <img src="img/CSTA_SMALL.png" width="100" style="margin-top:100px; margin-bottom:50px;" alt="">';
       $strSidebar .= '            </div>';
       $strSidebar .= '        </a>';
       $strSidebar .= '        ';
       $strSidebar .= '        <div class="sidebar-brand-text text-center text-gray-100" style="margin-top:50px;"><strong>CSTA Student Portal</strong></div>';
       $strSidebar .= '        <br>';
       // <!-- Nav Item - Dashboard -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link" href="index.php">';
       $strSidebar .= '                <i class="fas fa-fw fa-home"></i>';
       $strSidebar .= '                <span>Home</span></a>';
       $strSidebar .= '        </li>';

       // <!-- Nav Item - Profile -->
       $strSidebar .= '          <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link" href="profile.php">';
       $strSidebar .= '                <i class="fas fa-fw fa-user"></i>';
       $strSidebar .= '                <span>Profile</span></a>';
       $strSidebar .= '        </li>';

       // <!-- Nav Item - Class Schedules -->
       $strSidebar .= '          <li class="nav-item" '.$sidebar_schedule.'>';
       $strSidebar .= '            <a class="nav-link" href="schedules.php">';
       $strSidebar .= '				<i class="fas fa-fw fa-thumbtack"></i>';
       $strSidebar .= '                <span>Class Schedules</span></a>';
       $strSidebar .= '        </li>';

       // <!-- Nav Item - Calendar -->
       $strSidebar .= '          <li class="nav-item active" '.$sidebar_calendar.'>';
       $strSidebar .= '            <a class="nav-link" href="calendar.php">';
       $strSidebar .= '				<i class="fas fa-fw fa-calendar"></i>';
       $strSidebar .= '                <span>Calendar of Events</span></a>';
       $strSidebar .= '        </li>';

       //<!-- Nav Item - Enrollment -->
       $strSidebar .= '        <li class="nav-item ">';
       $strSidebar .= '            <a class="nav-link" href="settings.php">';
       $strSidebar .= '                <i class="fas fa-fw fa-key"></i>';
       $strSidebar .= '                <span>Change Password</span></a>';
       $strSidebar .= '        </li>';


       
       // <!-- Nav Item - Faqs -->
       $strSidebar .= '          <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link" href="frequently-asked-questions.php">';
       $strSidebar .= '				<i class="fas fa-fw fa-question"></i>';
       $strSidebar .= '                <span>FAQs</span></a>';
       $strSidebar .= '        </li>';
       // <!-- Nav Item - Document -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '         <a class="nav-link" href="logout.php">';
       $strSidebar .= '             <i class="fas fa-fw fa-sign-out-alt"></i>';
       $strSidebar .= '            <span>Logout</span></a>';
       $strSidebar .= '     </li>';
       $strSidebar .= '</ul>';
} elseif ($pageValue === 5) {
       $strSidebar = '';
       // <!-- Sidebar -->
       $strSidebar .= '<ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:#432616;">';

       // <!-- Sidebar - Brand -->
       $strSidebar .= '        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">';
       $strSidebar .= '            <div class="sidebar-brand-icon rotate-n-10">';
       $strSidebar .= '               <img src="img/CSTA_SMALL.png" width="100" style="margin-top:100px; margin-bottom:50px;" alt="">';
       $strSidebar .= '            </div>';
       $strSidebar .= '        </a>';
       $strSidebar .= '        ';
       $strSidebar .= '        <div class="sidebar-brand-text text-center text-gray-100" style="margin-top:50px;"><strong>CSTA Student Portal</strong></div>';
       $strSidebar .= '        <br>';
       // <!-- Nav Item - Dashboard -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link" href="index.php">';
       $strSidebar .= '                <i class="fas fa-fw fa-home"></i>';
       $strSidebar .= '                <span>Home</span></a>';
       $strSidebar .= '        </li>';

       // <!-- Nav Item - Profile -->
       $strSidebar .= '          <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link" href="profile.php">';
       $strSidebar .= '                <i class="fas fa-fw fa-user"></i>';
       $strSidebar .= '                <span>Profile</span></a>';
       $strSidebar .= '        </li>';

       // <!-- Nav Item - Class Schedules -->
       $strSidebar .= '          <li class="nav-item" '.$sidebar_schedule.'>';
       $strSidebar .= '            <a class="nav-link" href="schedules.php">';
       $strSidebar .= '				<i class="fas fa-fw fa-thumbtack"></i>';
       $strSidebar .= '                <span>Class Schedules</span></a>';
       $strSidebar .= '        </li>';

       // <!-- Nav Item - Calendar -->
       $strSidebar .= '          <li class="nav-item" '.$sidebar_calendar.'>';
       $strSidebar .= '            <a class="nav-link" href="calendar.php">';
       $strSidebar .= '				<i class="fas fa-fw fa-calendar"></i>';
       $strSidebar .= '                <span>Calendar of Events</span></a>';
       $strSidebar .= '        </li>';

       //<!-- Nav Item - Enrollment -->
       $strSidebar .= '        <li class="nav-item active">';
       $strSidebar .= '            <a class="nav-link" href="settings.php">';
       $strSidebar .= '                <i class="fas fa-fw fa-key"></i>';
       $strSidebar .= '                <span>Change Password</span></a>';
       $strSidebar .= '        </li>';

       
       // <!-- Nav Item - Faqs -->
       $strSidebar .= '          <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link" href="frequently-asked-questions.php">';
       $strSidebar .= '				<i class="fas fa-fw fa-question"></i>';
       $strSidebar .= '                <span>FAQs</span></a>';
       $strSidebar .= '        </li>';

       // <!-- Nav Item - Document -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '         <a class="nav-link" href="logout.php">';
       $strSidebar .= '             <i class="fas fa-fw fa-sign-out-alt"></i>';
       $strSidebar .= '            <span>Logout</span></a>';
       $strSidebar .= '     </li>';
       $strSidebar .= '</ul>';
} elseif ($pageValue === 6) {
       $strSidebar = '';
       // <!-- Sidebar -->
       $strSidebar .= '<ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:#432616;">';

       // <!-- Sidebar - Brand -->
       $strSidebar .= '        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">';
       $strSidebar .= '            <div class="sidebar-brand-icon rotate-n-10">';
       $strSidebar .= '               <img src="img/CSTA_SMALL.png" width="100" style="margin-top:100px; margin-bottom:50px;" alt="">';
       $strSidebar .= '            </div>';
       $strSidebar .= '        </a>';
       $strSidebar .= '        ';
       $strSidebar .= '        <div class="sidebar-brand-text text-center text-gray-100" style="margin-top:50px;"><strong>CSTA Student Portal</strong></div>';
       $strSidebar .= '        <br>';
       // <!-- Nav Item - Dashboard -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link" href="index.php">';
       $strSidebar .= '                <i class="fas fa-fw fa-home"></i>';
       $strSidebar .= '                <span>Home</span></a>';
       $strSidebar .= '        </li>';

       // <!-- Nav Item - Profile -->
       $strSidebar .= '          <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link" href="profile.php">';
       $strSidebar .= '                <i class="fas fa-fw fa-user"></i>';
       $strSidebar .= '                <span>Profile</span></a>';
       $strSidebar .= '        </li>';

       // <!-- Nav Item - Class Schedules -->
       $strSidebar .= '          <li class="nav-item" '.$sidebar_schedule.'>';
       $strSidebar .= '            <a class="nav-link" href="schedules.php">';
       $strSidebar .= '				<i class="fas fa-fw fa-thumbtack"></i>';
       $strSidebar .= '                <span>Class Schedules</span></a>';
       $strSidebar .= '        </li>';

       // <!-- Nav Item - Calendar -->
       $strSidebar .= '          <li class="nav-item" '.$sidebar_calendar.'>';
       $strSidebar .= '            <a class="nav-link" href="calendar.php">';
       $strSidebar .= '				<i class="fas fa-fw fa-calendar"></i>';
       $strSidebar .= '                <span>Calendar of Events</span></a>';
       $strSidebar .= '        </li>';

       //<!-- Nav Item - Enrollment -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '            <a class="nav-link" href="settings.php">';
       $strSidebar .= '                <i class="fas fa-fw fa-key"></i>';
       $strSidebar .= '                <span>Change Password</span></a>';
       $strSidebar .= '        </li>';

       
       // <!-- Nav Item - Faqs -->
       $strSidebar .= '          <li class="nav-item active">';
       $strSidebar .= '            <a class="nav-link" href="frequently-asked-questions.php">';
       $strSidebar .= '				<i class="fas fa-fw fa-question"></i>';
       $strSidebar .= '                <span>FAQs</span></a>';
       $strSidebar .= '        </li>';

       // <!-- Nav Item - Document -->
       $strSidebar .= '        <li class="nav-item">';
       $strSidebar .= '         <a class="nav-link" href="logout.php">';
       $strSidebar .= '             <i class="fas fa-fw fa-sign-out-alt"></i>';
       $strSidebar .= '            <span>Logout</span></a>';
       $strSidebar .= '     </li>';
       $strSidebar .= '</ul>';
}
echo $strSidebar;
