      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
          </nav>
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="https://www.creative-tim.com" target="_blank">KBS</a> for a better web.
          </div>
        </div>
      </footer>
    </div>
  </div>
  
  <!--   Core JS Files   -->
  <script src="{{asset('backend/assets/js/core/jquery.min.js')}}"></script>
  <script src="{{asset('backend/assets/js/core/popper.min.js')}}"></script>
  <script src="{{asset('backend/assets/js/core/bootstrap-material-design.min.js')}}"></script>
  <script src="{{asset('backend/assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
  <!-- Plugin for the momentJs  -->
  <script src="{{asset('backend/assets/js/plugins/moment.min.js')}}"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="{{asset('backend/assets/js/plugins/sweetalert2.js')}}"></script>
  <!-- Forms Validations Plugin -->
  <script src="{{asset('backend/assets/js/plugins/jquery.validate.min.js')}}"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="{{asset('backend/assets/js/plugins/jquery.bootstrap-wizard.js')}}"></script>
  <!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="{{asset('backend/assets/js/plugins/bootstrap-selectpicker.js')}}"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="{{asset('backend/assets/js/plugins/bootstrap-datetimepicker.min.js')}}"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="{{asset('backend/assets/js/plugins/jquery.dataTables.min.js')}}"></script>
  <!--  Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="{{asset('backend/assets/js/plugins/bootstrap-tagsinput.js')}}"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="{{asset('backend/assets/js/plugins/jasny-bootstrap.min.js')}}"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="{{asset('backend/assets/js/plugins/fullcalendar.min.js')}}"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="{{asset('backend/assets/js/plugins/jquery-jvectormap.js')}}"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{asset('backend/assets/js/plugins/nouislider.min.js')}}"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="{{asset('backend/assets/js/plugins/arrive.min.js')}}"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="{{asset('backend/assets/js/plugins/chartist.min.js')}}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{asset('backend/assets/js/plugins/bootstrap-notify.js')}}"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('backend/assets/js/material-dashboard.js?v=2.1.1')}}" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{asset('backend/assets/demo/demo.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.7/js/intlTelInput.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  <script>
   <?php if(Session::has('success')) { ?>
     toastr.success("<?php echo Session::get('success') ?>");
   <?php } else if(Session::has('error')) { ?>
     toastr.error("<?php echo Session::get('error') ?>");
   <?php } else if(Session::has('warning')) { ?>
     toastr.warning("<?php echo Session::get('warning') ?>");
   <?php } else if(Session::has('info')) { ?>
     toastr.info("<?php echo Session::get('info') ?>");
   <?php }?>
 </script>
 <script>
  $(document).ready(function(){
    $('[id^="deleteBtn"]').click(function(){
     var href = $(this).attr('data-url');
     Swal.fire({
      title: 'Are you sure to delete user?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!',
      closeOnConfirm: false,
      closeOnCancel: true 
    }).then((result) => {
      if (result.value) {
        window.location.href=href;
      } else  {   return false; }
    })
  });
  });
  $(document).ready(function(){
    $('[id^="blockUnblock"]').click(function(){
     var href = $(this).attr('data-url');
     var status = $(this).attr('data-status');
     if(status ==1) {
      var title = 'Are you sure to block the user.';
      var btnmsg ='Yes, block it!'; }
      else {  var title = 'Are you sure to unblock the user.';
      var btnmsg ='Yes, unblock it!'; }
      Swal.fire({
        title: title,
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: btnmsg,
        closeOnConfirm: false,
        closeOnCancel: true 
      }).then((result) => {
        if (result.value) {
          window.location.href=href;
        } else  {   return false; }
      })
    });
  });
  $(document).ready(function(){
    $('[id^="deleteBtn1"]').click(function(){
     var href = $(this).attr('data-url');
     Swal.fire({
      title: 'Are you sure to delete sms?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!',
      closeOnConfirm: false,
      closeOnCancel: true 
    }).then((result) => {
      if (result.value) {
        window.location.href=href;
      } else  {   return false; }
    })
  });
  });
  $(document).ready(function(){
    $('[id^="blockUnblock1"]').click(function(){
     var href = $(this).attr('data-url');
     var status = $(this).attr('data-status');
     if(status ==1) {
      var title = 'Are you sure to block the sms.';
      var btnmsg ='Yes, block it!'; }
      else {  var title = 'Are you sure to unblock the sms.';
      var btnmsg ='Yes, unblock it!'; }
      Swal.fire({
        title: title,
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: btnmsg,
        closeOnConfirm: false,
        closeOnCancel: true 
      }).then((result) => {
        if (result.value) {
          window.location.href=href;
        } else  {   return false; }
      })
    });
  });
</script>
<script type="text/javascript">
  function countChar(val) {
    var len = val.value.length;
    if (len >= 1600) {
      val.value = val.value.substring(0, 1600);
    } else {
      var leftlen = 1600 - len;
      $('#charNum').text('Characters left '+ leftlen);
    }
  };

</script>

<script>
  $(document).on('click', '#select_all', function() {
    $(".emp_checkbox").prop("checked", this.checked);

    $("#select_count").html($("input.emp_checkbox:checked").length+" Selected");
  });
  $(document).on('click', '.emp_checkbox', function() {
    if ($('.emp_checkbox:checked').length == $('.emp_checkbox').length) {
      $('#select_all').prop('checked', true);
      
    } else {
      $('#select_all').prop('checked', false);

    }
    $("#select_count").html($("input.emp_checkbox:checked").length+" Selected");
  });
</script>
<script>
  $('#delete_records').on('click', function(e) {
    var employee = [];
    $(".emp_checkbox:checked").each(function() {
       employee.push($(this).data('emp-id'));
    });
    if(employee.length <=0) { 
      Swal("Please select records."); } 
      else { WRN_PROFILE_DELETE = "Are you sure you want to delete "+(employee.length>1?"these":"this")+" records?";

      Swal.fire({
        title: WRN_PROFILE_DELETE,
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        closeOnConfirm: false,
        closeOnCancel: true 
      }).then((result) => {
        if (result.value) {
         var selected_values = employee.join(",");
         $.ajax({
          type: "POST",
          url: "<?= route('admin.sms.deleteAll'); ?>",
          cache:false,
          data: {sms_id: selected_values, _token: '{{ csrf_token()}}'},
          success: function(response) {
            if(response.success != '' || response.success != undefined) {
                toastr.success(response.success);
                 setTimeout(function(){
                     window.location.reload();
                  }, 1000);
             } else if(response.error != '' || response.error != undefined) {
               toastr.error(response.error);
                  setTimeout(function(){
                     window.location.reload();
                  }, 1000);
             }
            }
         });
         }  else {  
                $('#select_all').prop('checked', false);
                $('.emp_checkbox').prop('checked', false);
      }
    })
    } 
  });
</script>
</body>
</html>
