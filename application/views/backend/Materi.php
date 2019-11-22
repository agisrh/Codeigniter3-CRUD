  <div class="section-header">
  <h1>Materi</h1>
  <div class="section-header-button">
    <?php 
    $group_id = $this->ion_auth->get_user_group(); 
            if($group_id=='1'){
    ?>
    <a href="<?php echo base_url()?>materi/create" class="btn btn-primary">Tambah Baru</a>
    <?php
  }
  ?>
  </div>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
    <div class="breadcrumb-item"><a href="#">Posts</a></div>
    <div class="breadcrumb-item">All Posts</div>
  </div>
  </div>

  <div class="section-body">

          
            <div class="row mt-4">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>All Posts</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th class="text-center pt-2">
                            <div class="custom-checkbox custom-checkbox-table custom-control">
                             <i class="fas fa-th"></i>
                            </div>
                          </th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Author</th>
                          <th>Created At</th>
                          <th>Status</th>
                        </tr>
                        <?php
                        foreach ($posts as $row) {
                          $time = explode(' ', $row->createdAt);
                          if($row->postsStatus=='Draft'){
                            $badge = 'badge-warning';
                          }else{
                            $badge = 'badge-success';
                          }
                          echo '<tr>
                          <td>
                            <div class="custom-checkbox custom-control">
                              <i class="fas fa-th"></i>
                            </div>
                          </td>
                          <td>'.$row->postsTitle.'
                            <div class="table-links">
                            '.anchor('materi/detail/'.$row->postsId, 'View').'
                              <div class="bullet"></div>
                              <a href="#">Edit</a>
                              <div class="bullet"></div>
                              <a href="#" class="text-danger">Trash</a>
                            </div>
                          </td>
                          <td>
                            <a href="#">'.$row->categoryName.'</a>
                          </td>
                          <td>
                            <a href="#">
                              <img alt="image" src="'.base_url().'assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="title" title=""> <div class="d-inline-block ml-1">'.$row->fullname.'</div>
                            </a>
                          </td>
                          <td>'.$time[0].'</td>
                          <td><div class="badge '.$badge.'">'.$row->postsStatus.'</div></td>
                        </tr>';
                        }
                        ?>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>