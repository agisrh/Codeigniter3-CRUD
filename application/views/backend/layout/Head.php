<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>STT Duta Bangsa</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/modules/jquery-selectric/selectric.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/components.css">

  <!-- Dynamic Stylesheet -->
    <?php if(isset($includes_for_layout['css']) AND count($includes_for_layout['css']) > 0): ?>
        <?php foreach($includes_for_layout['css'] as $css): ?>
            <link rel="stylesheet" type="text/css" href="<?php echo $css['file']; ?>"<?php echo ($css['options'] === NULL ? '' : ' media="' . $css['options'] . '"'); ?>>
        <?php endforeach; ?>
    <?php endif; ?>
    
    <?php if(isset($includes_for_layout['js']) AND count($includes_for_layout['js']) > 0): ?>
        <?php foreach($includes_for_layout['js'] as $js): ?>
            <?php if($js['options'] !== NULL AND $js['options'] == 'header'): ?>
                <script type="text/javascript" src="<?php echo $js['file']; ?>"></script>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
</head>