<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">STTDB</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
          </div>
          <ul class="sidebar-menu">
          
            <li class="menu-header">Starter</li>
            <?php 
            $group_id = $this->ion_auth->get_user_group(); 
            if($group_id=='1'){
            ?>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user"></i> <span>Dosen</span></a>
              <ul class="dropdown-menu">
                <li>
                <?php
                $user = $this->session->userdata('user_id');
                echo '<a href="'.base_url().'materi/materi_dosen/'.$user.'" class="nav-link">Materi</a>';
                ?>
                <li>
                  <?php
                   echo '<a href="'.base_url().'tugas" class="nav-link">Tugas Mahasiswa</a>';
                  ?>
                </li>
              </ul>
            </li>
            <?php
          }else{
            ?>
              <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>Mahasiswa</span></a>
              <ul class="dropdown-menu">
                <li>
                  <?php
                   echo '<a href="'.base_url().'materi" class="nav-link">Materi</a>';
                  ?>
                </li>
                <li>
                   <?php
                    $user = $this->session->userdata('user_id');
                    echo '<a href="'.base_url().'tugas/tugas_mahasiswa/'.$user.'" class="nav-link">Tugas</a>';
                  ?>
                </li>
              </ul>
            </li>
            <?php 
            }
            ?>
          </ul>
       
        </aside>
      </div>