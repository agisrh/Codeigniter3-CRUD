          <div class="section-header">
            <h1>Detail Materi</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Posts</a></div>
              <div class="breadcrumb-item">Detail Materi</div>
            </div>
          </div>

          <div class="section-body">

            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-body">
                    <a href="#" class="btn btn-primary btn-icon icon-left btn-lg btn-block mb-4 d-md-none" data-toggle-slide="#ticket-items">
                      <i class="fas fa-list"></i> All Tickets
                    </a>
                    <div class="tickets">
                      <div class="ticket-items" id="ticket-items">
                        <div class="ticket-item active">
                          <div class="ticket-title">
                            <h4><?php echo $posts->categoryName ?></h4>
                          </div>
                          <div class="ticket-desc">
                            <div><?php echo $posts->categoryDesc ?></div>
                          </div>
                        </div>
                      </div>
                      <div class="ticket-content">
                        <div class="ticket-header">
                          <div class="ticket-sender-picture img-shadow">
                            <img src="<?php echo base_url() ?>assets/img/avatar/avatar-5.png" alt="image">
                          </div>
                          <div class="ticket-detail">
                            <div class="ticket-title">
                              <h4><?php echo $posts->postsTitle ?></h4>
                            </div>
                            <div class="ticket-info">
                              <div class="font-weight-600"><?php echo $posts->fullname ?></div>
                              <div class="bullet"></div>
                              <div class="text-primary font-weight-600">
                                <?php
                                echo $this->MY_Model->time_since(strtotime($posts->createdAt));
                                ?>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="ticket-description">
                          <p><?php echo $posts->postsDesc ?></p>

                          <div class="images">
                            <a href="<?php echo base_url()."uploads/dosen/".$posts->postsFile ?>">
                            <?php
                            $icons = $this->MY_Model->format_icon($posts->postsFile);
                            echo $icons;
                            ?>
                            </a>
                            <div class="text-muted form-text">
                               <?php echo $posts->postsFile ?>
                              </div>
                          </div>

                          <div class="ticket-divider"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>