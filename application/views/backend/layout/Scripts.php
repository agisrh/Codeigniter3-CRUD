
  <!-- General JS Scripts -->
  <script src="<?php echo base_url() ?>assets/modules/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>assets/modules/popper.js"></script>
  <script src="<?php echo base_url() ?>assets/modules/tooltip.js"></script>
  <script src="<?php echo base_url() ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url() ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?php echo base_url() ?>assets/modules/moment.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->
  <script src="<?php echo base_url() ?>assets/modules/jquery-selectric/jquery.selectric.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?php echo base_url() ?>assets/js/page/features-posts.js"></script>
  
  
  <!-- Template JS File -->
  <script src="<?php echo base_url() ?>assets/js/scripts.js"></script>
  <script src="<?php echo base_url() ?>assets/js/custom.js"></script>

   <!-- Dynamic JQuery -->
      <?php if(isset($includes_for_layout['js']) AND count($includes_for_layout['js']) > 0): ?>
      <?php foreach($includes_for_layout['js'] as $js): ?>
        <?php if($js['options'] === NULL OR $js['options'] == 'footer'): ?>
          <script type="text/javascript" src="<?php echo $js['file']; ?>"></script>
        <?php endif; ?>
      <?php endforeach; ?>
    <?php endif; ?>


</body>
</html>