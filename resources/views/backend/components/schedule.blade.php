@extends('backend.dashboard');
@section('content')


<head>
    <!-- vendor css -->
    <link href="https://www.bootstrapdash.com/demo/azia/v1.0.0/lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://www.bootstrapdash.com/demo/azia/v1.0.0/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="https://www.bootstrapdash.com/demo/azia/v1.0.0/lib/typicons.font/typicons.css" rel="stylesheet">
    <link href="https://www.bootstrapdash.com/demo/azia/v1.0.0/lib/fullcalendar/fullcalendar.min.css" rel="stylesheet">
    <link href="https://www.bootstrapdash.com/demo/azia/v1.0.0/lib/select2/css/select2.min.css" rel="stylesheet">

    <!-- azia CSS -->
    <link rel="stylesheet" href="https://www.bootstrapdash.com/demo/azia/v1.0.0/css/azia.css">
</head>

{{-- <div class="az-header">
    <div class="container">
      <div class="az-header-left">
        <a href="index.html" class="az-logo"><span></span> azia</a>
        <a href="" id="azContentLeftShow" class="az-header-arrow d-block d-lg-none"><i class="icon ion-md-arrow-back"></i></a>
      </div><!-- az-header-left -->
      <div class="az-header-menu">
        <div class="az-header-menu-header">
          <a href="index.html" class="az-logo"><span></span> azia</a>
          <a href="" class="close">&times;</a>
        </div><!-- az-header-menu-header -->
        <ul class="nav">
          <li class="nav-item">
            <a href="" class="nav-link with-sub"><i class="typcn typcn-chart-area-outline"></i> Dashboard</a>
            <div class="az-menu-sub">
              <nav class="nav">
                <a href="dashboard-one.html" class="nav-link">Web Analytics</a>
                <a href="dashboard-two.html" class="nav-link">Sales Monitoring</a>
                <a href="dashboard-three.html" class="nav-link">Ad Campaign</a>
                <a href="dashboard-four.html" class="nav-link">Event Management</a>
                <a href="dashboard-five.html" class="nav-link">Helpdesk Management</a>
                <a href="dashboard-six.html" class="nav-link">Finance Monitoring</a>
                <a href="dashboard-seven.html" class="nav-link">Cryptocurrency</a>
                <a href="dashboard-eight.html" class="nav-link">Executive / SaaS</a>
                <a href="dashboard-nine.html" class="nav-link">Campaign Monitoring</a>
                <a href="dashboard-ten.html" class="nav-link">Product Management</a>
              </nav>
            </div><!-- az-menu-sub -->
          </li>
          <li class="nav-item active show">
            <a href="" class="nav-link with-sub"><i class="typcn typcn-folder"></i> Apps</a>
            <nav class="az-menu-sub">
              <a href="app-mail.html" class="nav-link">Mailbox</a>
              <a href="app-chat.html" class="nav-link">Chat</a>
              <a href="app-calendar.html" class="nav-link active">Calendar</a>
              <a href="app-contacts.html" class="nav-link">Contacts</a>
              <a href="app-kanban.html" class="nav-link">Kanban</a>
              <a href="app-tickets.html" class="nav-link">Tickets</a>
            </nav>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link with-sub"><i class="typcn typcn-document"></i> Pages</a>
            <nav class="az-menu-sub">
              <a href="page-profile.html" class="nav-link">Profile</a>
              <a href="page-invoice.html" class="nav-link">Invoice</a>
              <a href="page-signin.html" class="nav-link">Sign In</a>
              <a href="page-signup.html" class="nav-link">Sign Up</a>
              <a href="page-404.html" class="nav-link">Page 404</a>
              <a href="page-faq.html" class="nav-link">Faq</a>
              <a href="page-news-grid.html" class="nav-link">News Grid</a>
              <a href="page-product-catalogue.html" class="nav-link">Product Catalogue</a>
              <a href="page-project-list.html" class="nav-link">Project List</a>
              <a href="page-order.html" class="nav-link">Orders</a>
              <a href="page-pricing.html" class="nav-link">Pricing</a>
              <a href="landing-sass.html" class="nav-link">Landing Page</a>
            </nav>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link with-sub"><i class="typcn typcn-book"></i> Components</a>
            <div class="az-menu-sub az-menu-sub-mega">
              <div class="container">
                <div>
                  <nav class="nav">
                    <span>UI Elements</span>
                    <a href="elem-accordion.html" class="nav-link">Accordion</a>
                    <a href="elem-alerts.html" class="nav-link">Alerts</a>
                    <a href="elem-avatar.html" class="nav-link">Avatar</a>
                    <a href="elem-badge.html" class="nav-link">Badge</a>
                    <a href="elem-breadcrumbs.html" class="nav-link">Breadcrumbs</a>
                    <a href="elem-buttons.html" class="nav-link">Buttons</a>
                    <a href="elem-cards.html" class="nav-link">Cards</a>
                    <a href="elem-carousel.html" class="nav-link">Carousel</a>
                  </nav>
                  <nav class="nav">
                    <a href="elem-collapse.html" class="nav-link">Collapse</a>
                    <a href="elem-dropdown.html" class="nav-link">Dropdown</a>
                    <a href="elem-icons.html" class="nav-link">Icons</a>
                    <a href="elem-images.html" class="nav-link">Images</a>
                    <a href="elem-list-group.html" class="nav-link">List Group</a>
                    <a href="elem-media-object.html" class="nav-link">Media Object</a>
                    <a href="elem-modals.html" class="nav-link">Modals</a>
                    <a href="elem-navigation.html" class="nav-link">Navigation</a>
                  </nav>
                  <nav class="nav">
                    <a href="elem-pagination.html" class="nav-link">Pagination</a>
                    <a href="elem-popover.html" class="nav-link">Popover</a>
                    <a href="elem-progress.html" class="nav-link">Progress</a>
                    <a href="elem-spinners.html" class="nav-link">Spinners</a>
                    <a href="elem-toast.html" class="nav-link">Toast</a>
                    <a href="elem-tooltip.html" class="nav-link">Tooltip</a>
                  </nav>
                </div>
                <div>
                  <nav class="nav">
                    <span>Forms</span>
                    <a href="form-elements.html" class="nav-link">Form Elements</a>
                    <a href="form-layouts.html" class="nav-link">Form Layouts</a>
                    <a href="form-validation.html" class="nav-link">Form Validation</a>
                    <a href="form-wizards.html" class="nav-link">Form Wizards</a>
                    <a href="form-editor.html" class="nav-link">WYSIWYG Editor</a>
                  </nav>
                </div>
                <div>
                  <nav class="nav">
                    <span>Charts</span>
                    <a href="chart-morris.html" class="nav-link">Morris Charts</a>
                    <a href="chart-flot.html" class="nav-link">Flot Charts</a>
                    <a href="chart-chartjs.html" class="nav-link">ChartJS</a>
                    <a href="chart-sparkline.html" class="nav-link">Sparkline</a>
                    <a href="chart-peity.html" class="nav-link">Peity</a>
                  </nav>
                </div>
                <div>
                  <nav class="nav">
                    <span>Maps</span>
                    <a href="map-google.html" class="nav-link">Google Maps</a>
                    <a href="map-leaflet.html" class="nav-link">Leaflet</a>
                    <a href="map-vector.html" class="nav-link">Vector Maps</a>
                    <span>Tables</span>
                    <a href="table-basic.html" class="nav-link">Basic Tables</a>
                    <a href="table-data.html" class="nav-link">Data Tables</a>
                  </nav>
                </div>
              </div><!-- container -->
            </div>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link with-sub"><i class="typcn typcn-tabs-outline"></i> Utilities</a>
            <nav class="az-menu-sub">
              <a href="util-background.html" class="nav-link">Background</a>
              <a href="util-border.html" class="nav-link">Border</a>
              <a href="util-display.html" class="nav-link">Display</a>
              <a href="util-flex.html" class="nav-link">Flex</a>
              <a href="util-height.html" class="nav-link">Height</a>
              <a href="util-margin.html" class="nav-link">Margin</a>
              <a href="util-padding.html" class="nav-link">Padding</a>
              <a href="util-position.html" class="nav-link">Position</a>
              <a href="util-typography.html" class="nav-link">Typography</a>
              <a href="util-width.html" class="nav-link">Width</a>
              <a href="util-extras.html" class="nav-link">Extras</a>
            </nav>
          </li>
        </ul>
      </div><!-- az-header-menu -->
      <div class="az-header-right">
        <a href="" class="az-header-search-link"><i class="fas fa-search"></i></a>
        <div class="az-header-message">
          <a href="app-chat.html"><i class="typcn typcn-messages"></i></a>
        </div><!-- az-header-message -->
        <div class="dropdown az-header-notification">
          <a href="" class="new"><i class="typcn typcn-bell"></i></a>
          <div class="dropdown-menu">
            <div class="az-dropdown-header mg-b-20 d-sm-none">
              <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
            </div>
            <h6 class="az-notification-title">Notifications</h6>
            <p class="az-notification-text">You have 2 unread notification</p>
            <div class="az-notification-list">
              <div class="media new">
                <div class="az-img-user"><img src="../img/faces/face2.jpg" alt=""></div>
                <div class="media-body">
                  <p>Congratulate <strong>Socrates Itumay</strong> for work anniversaries</p>
                  <span>Mar 15 12:32pm</span>
                </div><!-- media-body -->
              </div><!-- media -->
              <div class="media new">
                <div class="az-img-user online"><img src="../img/faces/face3.jpg" alt=""></div>
                <div class="media-body">
                  <p><strong>Joyce Chua</strong> just created a new blog post</p>
                  <span>Mar 13 04:16am</span>
                </div><!-- media-body -->
              </div><!-- media -->
              <div class="media">
                <div class="az-img-user"><img src="../img/faces/face4.jpg" alt=""></div>
                <div class="media-body">
                  <p><strong>Althea Cabardo</strong> just created a new blog post</p>
                  <span>Mar 13 02:56am</span>
                </div><!-- media-body -->
              </div><!-- media -->
              <div class="media">
                <div class="az-img-user"><img src="../img/faces/face5.jpg" alt=""></div>
                <div class="media-body">
                  <p><strong>Adrian Monino</strong> added new comment on your photo</p>
                  <span>Mar 12 10:40pm</span>
                </div><!-- media-body -->
              </div><!-- media -->
            </div><!-- az-notification-list -->
            <div class="dropdown-footer"><a href="">View All Notifications</a></div>
          </div><!-- dropdown-menu -->
        </div><!-- az-header-notification -->
        <div class="dropdown az-profile-menu">
          <a href="" class="az-img-user"><img src="../img/faces/face1.jpg" alt=""></a>
          <div class="dropdown-menu">
            <div class="az-dropdown-header d-sm-none">
              <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
            </div>
            <div class="az-header-profile">
              <div class="az-img-user">
                <img src="../img/faces/face1.jpg" alt="">
              </div><!-- az-img-user -->
              <h6>Aziana Pechon</h6>
              <span>Premium Member</span>
            </div><!-- az-header-profile -->

            <a href="" class="dropdown-item"><i class="typcn typcn-user-outline"></i> My Profile</a>
            <a href="" class="dropdown-item"><i class="typcn typcn-edit"></i> Edit Profile</a>
            <a href="" class="dropdown-item"><i class="typcn typcn-time"></i> Activity Logs</a>
            <a href="" class="dropdown-item"><i class="typcn typcn-cog-outline"></i> Account Settings</a>
            <a href="page-signin.html" class="dropdown-item"><i class="typcn typcn-power-outline"></i> Sign Out</a>
          </div><!-- dropdown-menu -->
        </div>
      </div><!-- az-header-right -->
    </div><!-- container -->
  </div><!-- az-header -->

  <div class="az-content az-content-calendar">
    <div class="container">
      <div class="az-content-left az-content-left-calendar">
        <div class="az-content-header">
          <a href="" id="azMenuShow" class="az-header-menu-icon"><span></span></a>
          <a href="index.html" class="az-logo">az<span>i</span>a</a>
          <a href="" id="azContentLeftHide" class="az-header-arrow">
            <i class="icon ion-md-arrow-forward d-sm-none"></i>
            <i class="icon ion-md-close d-none d-sm-block"></i>
          </a>
        </div><!-- az-content-header --> --}}

        <div id="dateToday" class="az-content-label az-content-label-sm tx-medium lh-1 mg-b-10"></div>
        <h2 class="az-content-title mg-b-25 tx-24">My Calendar</h2>

        <div class="fc-datepicker az-datepicker mg-b-30"></div>

        <label class="az-content-label tx-13 tx-bold mg-b-10">Event List</label>
        <nav class="nav az-nav-column az-nav-calendar-event">
          <a href="" class="nav-link"><i class="icon ion-ios-calendar tx-primary"></i> <div>Calendar Events</div></a>
          <a href="" class="nav-link"><i class="icon ion-ios-calendar tx-success"></i> <div>Birthday Events</div></a>
          <a href="" class="nav-link"><i class="icon ion-ios-calendar tx-danger"></i> <div>Holiday Calendar</div></a>
          <a href="" class="nav-link"><i class="icon ion-ios-calendar tx-warning"></i> <div>Other Calendar</div></a>
          <a href="" class="nav-link exclude"><i class="icon ion-ios-calendar tx-info"></i> <div>Discovered Events</div></a>
        </nav>
      </div>
      <div class="az-content-body az-content-body-calendar">

        <div id="calendar" class="az-calendar"></div>
      </div><!-- az-content-body -->
    </div><!-- container -->
  </div><!-- az-content -->

  <div class="az-footer ht-40">
    <div class="container ht-100p pd-t-0-f">
      <span>&copy; 2019 Azia Responsive Bootstrap 4 Dashboard Template</span>
    </div><!-- container -->
  </div><!-- az-footer -->

  <div class="modal az-modal-calendar-schedule" id="modalSetSchedule" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title">Create New Event</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div><!-- modal-header -->
        <div class="modal-body">
          <form id="azFormCalendar" method="post" action="calendar.html">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Add title">
            </div><!-- form-group -->
            <div class="form-group d-flex align-items-center">
              <label class="rdiobox mg-r-60">
                <input type="radio" name="etype" value="event" checked>
                <span>Event</span>
              </label>
              <label class="rdiobox">
                <input type="radio" name="etype" value="reminder">
                <span>Reminder</span>
              </label>
            </div><!-- form-group -->
            <div class="form-group mg-t-30">
              <label class="tx-13 mg-b-5 tx-gray-600">Start Date</label>
              <div class="row row-xs">
                <div class="col-7">
                  <input id="azEventStartDate" type="text" value="" class="form-control" placeholder="Select date">
                </div><!-- col-7 -->
                <div class="col-5">
                  <select id="azEventStartTime" class="select2-modal az-event-time" data-placeholder="Select time">
                    <option label="Select time">Select time</option>
                  </select>
                </div><!-- col-5 -->
              </div><!-- row -->
            </div><!-- form-group -->
            <div class="form-group">
              <label class="tx-13 mg-b-5 tx-gray-600">End Date</label>
              <div class="row row-xs">
                <div class="col-7">
                  <input id="azEventEndDate" type="text" value="" class="form-control" placeholder="Select date">
                </div><!-- col-7 -->
                <div class="col-5">
                  <select id="azEventEndTime" class="select2-modal az-event-time" data-placeholder="Select time">
                    <option label="Select time">Select time</option>
                  </select>
                </div><!-- col-5 -->
              </div><!-- row -->
            </div><!-- form-group -->
            <div class="form-group">
              <textarea class="form-control" rows="2" placeholder="Write some description (optional)"></textarea>
            </div><!-- form-group -->

            <div class="d-flex mg-t-15 mg-lg-t-30">
              <button type="submit" class="btn btn-az-primary pd-x-25 mg-r-5">Save</button>
              <a href="" class="btn btn-light" data-dismiss="modal">Discard</a>
            </div>
          </form>
        </div><!-- modal-body -->
      </div><!-- modal-content -->
    </div><!-- modal-dialog -->
  </div><!-- modal -->

  <div class="modal az-modal-calendar-event" id="modalCalendarEvent" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="event-title"></h6>
          <nav class="nav nav-modal-event">
            <a href="#" class="nav-link"><i class="icon ion-md-open"></i></a>
            <a href="#" class="nav-link"><i class="icon ion-md-trash"></i></a>
            <a href="#" class="nav-link" data-dismiss="modal"><i class="icon ion-md-close"></i></a>
          </nav>
        </div><!-- modal-header -->
        <div class="modal-body">
          <div class="row row-sm">
            <div class="col-sm-6">
              <label class="tx-13 tx-gray-600 mg-b-2">Start Date</label>
              <p class="event-start-date"></p>
            </div>
            <div class="col-sm-6">
              <label class="tx-13 mg-b-2">End Date</label>
              <p class="event-end-date"></p>
            </div><!-- col-6 -->
          </div><!-- row -->

          <label class="tx-13 tx-gray-600 mg-b-2">Description</label>
          <p class="event-desc tx-gray-900 mg-b-30"></p>

          <a href="" class="btn btn-secondary wd-80" data-dismiss="modal">Close</a>
        </div><!-- modal-body -->
      </div><!-- modal-content -->
    </div><!-- modal-dialog -->
  </div><!-- modal -->


  <script src="https://www.bootstrapdash.com/demo/azia/v1.0.0/lib/jquery/jquery.min.js"></script>
  <script src="https://www.bootstrapdash.com/demo/azia/v1.0.0/lib/moment/min/moment.min.js"></script>
  <script src="https://www.bootstrapdash.com/demo/azia/v1.0.0/lib/jquery-ui/ui/widgets/datepicker.js"></script>
  <script src="https://www.bootstrapdash.com/demo/azia/v1.0.0/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://www.bootstrapdash.com/demo/azia/v1.0.0/lib/ionicons/ionicons.js"></script>
  <script src="https://www.bootstrapdash.com/demo/azia/v1.0.0/lib/fullcalendar/fullcalendar.min.js"></script>
  <script src="https://www.bootstrapdash.com/demo/azia/v1.0.0/lib/select2/js/select2.full.min.js"></script>

  <script src="https://www.bootstrapdash.com/demo/azia/v1.0.0/js/azia.js"></script>
  <script src="https://www.bootstrapdash.com/demo/azia/v1.0.0/js/app-calendar-events.js"></script>
  <script src="https://www.bootstrapdash.com/demo/azia/v1.0.0/js/app-calendar.js"></script>
  <script>
    $(function(){
      'use strict'

      $('.select2-modal').select2({
        minimumResultsForSearch: Infinity,
        dropdownCssClass: 'az-select2-dropdown-modal',
      });

      $('#dateToday').text(moment().format('ddd, MMMM DD YYYY'));

    });
  </script>


@endsection
