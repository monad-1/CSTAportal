<?php
require_once("includes/connect.php");

require_once("codes/fetchuserdetails.php");

if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
  header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calendar</title>

  <!-- Site Icons -->
  <link rel="shortcut icon" href="img/cstalogonew.png">

  <!-- Site Icons -->
  <link rel="shortcut icon" href="img/CSTA_SMALL.png" type="image/x-icon">
  <link rel="apple-touch-icon" href="img/CSTA_SMALL.png">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet" />
  <!-- JS for jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- JS for full calender -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
  <!-- bootstrap css and js -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" /> -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

  <style>
    ::-webkit-scrollbar {
      width: .5em;
    }
  </style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <?php
    $pageValue = 1;
    require_once("includes/sidebar.php");
    ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        <?php
        require_once("includes/header.php");
        ?>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <div id="calendar"></div>

        </div>
        <!-- /.container-fluid -->
        <!-- Start popup dialog box -->
        <div class="modal fade" id="event_entry_modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
          <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalLabel"> Add New Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="img-container">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="event_name">Event name</label>
                        <input type="text" name="event_name" id="event_name" class="form-control" placeholder="Enter your event name">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="event_start_date">Event start</label>
                        <input type="date" name="event_start_date" id="event_start_date" class="form-control onlydatepicker" placeholder="Event start date">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="event_end_date">Event end</label>
                        <input type="date" name="event_end_date" id="event_end_date" class="form-control" placeholder="Event end date">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="save_event()">Save Event</button>
              </div>
            </div>
          </div>
        </div>
        <!-- End popup dialog box -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php
      require_once("includes/footer.php");
      ?>
      <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <?php
  include_once("includes/scripts.php");
  ?>


  <!-- Start popup dialog box -->
  <div class="modal fade" id="event_entry_modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabel">Add New Event</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="img-container">
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="event_name">Event name</label>
                  <input type="text" name="event_name" id="event_name" class="form-control" placeholder="Enter your event name">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="event_start_date">Event start</label>
                  <input type="date" name="event_start_date" id="event_start_date" class="form-control onlydatepicker" placeholder="Event start date">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="event_end_date">Event end</label>
                  <input type="date" name="event_end_date" id="event_end_date" class="form-control" placeholder="Event end date">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" onclick="save_event()">Save Event</button>
        </div>
      </div>
    </div>
  </div>
  <!-- End popup dialog box -->

</body>
<script>
  $(document).ready(function() {
    display_events();
  }); //end document.ready block

  function display_events() {
    var events = new Array();
    $.ajax({
      url: 'display_event.php',
      dataType: 'json',
      success: function(response) {

        var result = response.data;
        $.each(result, function(i, item) {
          events.push({
            event_id: result[i].event_id,
            title: result[i].title,
            start: result[i].start,
            end: result[i].end,
            color: result[i].color,
            url: result[i].url
          });
        })
        var calendar = $('#calendar').fullCalendar({
          defaultView: 'month',
          timeZone: 'local',
          editable: true,
          selectable: true,
          selectHelper: true,
       
          select: function(start, end) {
            alert(start);
            alert(end);
            $('#event_start_date').val(moment(start).format('YYYY-MM-DD'));
            $('#event_end_date').val(moment(end).format('YYYY-MM-DD'));
            $('#event_entry_modal').modal('show');
          },
          events: events,
          eventRender: function(event, element, view) {
            element.bind('click', function() {
              alert(event.event_id);
            });
          }
        }); //end fullCalendar block	
      }, //end success block
      error: function(xhr, status) {
        alert(response.msg);
      }
    }); //end ajax block	
  }

  function save_event() {
    var event_name = $("#event_name").val();
    var event_start_date = $("#event_start_date").val();
    var event_end_date = $("#event_end_date").val();
    if (event_name == "" || event_start_date == "" || event_end_date == "") {
      alert("Please enter all required details.");
      return false;
    }
    $.ajax({
      url: "save_event.php",
      type: "POST",
      dataType: 'json',
      data: {
        event_name: event_name,
        event_start_date: event_start_date,
        event_end_date: event_end_date
      },
      success: function(response) {
        $('#event_entry_modal').modal('hide');
        if (response.status == true) {
          alert(response.msg);
          location.reload();
        } else {
          alert(response.msg);
        }
      },
      error: function(xhr, status) {
        console.log('ajax error = ' + xhr.statusText);
        alert(response.msg);
      }
    });
    return false;
  }
</script>

</html>