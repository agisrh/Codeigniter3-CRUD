<?php $this->load->view('backend/layout/Head'); ?>
<?php $this->load->view('backend/layout/Navbar'); ?>
<?php $this->load->view('backend/layout/Navigation'); ?>
      <div class="main-content">
        <section class="section">
			<?php echo $contents; ?>
	</section>
	</div>
<?php $this->load->view('backend/layout/Footer'); ?>
<?php $this->load->view('backend/layout/Scripts'); ?>
