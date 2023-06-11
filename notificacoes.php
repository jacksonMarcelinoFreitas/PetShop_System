<?php

// function config(){
//   echo '<script> toastr.options = {
//         "closeButton": true,
//         "debug": false,
//         "newestOnTop": false,
//         "progressBar": true,
//         "positionClass": "toast-top-right",
//         "preventDuplicates": false,
//         "onclick": null,
//         "showDuration": "60000",
//         "hideDuration": "60000",
//         "timeOut": "60000",
//         "extendedTimeOut": "1000",
//         "showEasing": "swing",
//         "hideEasing": "linear",
//         "showMethod": "fadeIn",
//         "hideMethod": "fadeOut"};
//         </script>';
// }

  function info($msg) {
    // config();
    ?> <script>toastr.info("<?php echo $msg ?>")</script> <?php
  }
  function warning($msg) {
    // config();
    ?> <script>toastr.warning("' . $msg . '")</script> <?php
  }
  function success($msg) {
    // config();
    ?> <script>toastr.success("' . $msg . '")</script> <?php
  }
  function error($msg) {
    // config();
    ?> <script>toastr.error("' . $msg . '")</script> <?php
  }

?>
