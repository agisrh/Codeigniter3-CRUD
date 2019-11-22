<div class="section-header">
            <h1>Dashboard</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <?php
              foreach ($posts as $row) {
                echo '<div class="col-lg-6">
                      <div class="card card-large-icons">
                        <div class="card-icon bg-primary text-white">
                          <i class="far fa-newspaper"></i>
                        </div>
                        <div class="card-body">
                          <h4>'.$row->categoryName.'</h4>
                          <h3 class="mb-2">'.$row->total.' Materi</h3>
                          <a href="'.base_url().'materi/category/'.$row->categoryId.'" class="card-cta">Lihat <i class="fas fa-chevron-right"></i></a>
                        </div>
                      </div>
                    </div>';
              }
              ?>
             
            </div>
          </div>