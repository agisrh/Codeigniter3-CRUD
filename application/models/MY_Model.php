<?php

class MY_Model extends CI_Model{

   public function __construct() {
    
    parent::__construct();
    $this->load->database();
    
  }

  // menampilkan semua data dari sebuah tabel.
  public function getAll($tables){
    return $this->db->get($tables);
  }

  // menampilkan semua data berdasarkan sebuah statement.
  public function getWhere($tables, $param, $value){
    $this->db->where($param,$value);
    return $this->db->get($tables);
  }

  // menampilkan limit data dari sebuah tabel.
  public function getLimit($tables, $limit){
    return $this->db->get($tables, $limit);
  }

     // menampilkan semua data dari sebuah tabel dengan order.
  public function getOrder($tables,$field,$sort){
    $this->db->order_by($field, $sort);
    return $this->db->get($tables);
  }

    //menampilkan satu record brdasarkan parameter.
  public  function getByID($tables,$pk,$id){
    $this->db->where($pk,$id);
    return $this->db->get($tables);
  }

    // memasukan data ke database.
  public function insert($tables,$data){
    $this->db->insert($tables,$data);
  }

    // update data kedalalam sebuah tabel
  public function update($tables,$data,$pk,$id){
    $this->db->where($pk,$id);
    $this->db->update($tables,$data);
  }

    // menghapus data dari sebuah tabel
  public function delete($tables,$pk,$id){
    $this->db->where($pk,$id);
    $this->db->delete($tables);
  }

    // menjumlahkan data dari sebuah tabel
  public function sum($tables,$field,$pk,$id){
    $query = $this->db->select_sum($field, 'Amount');
    $query = $this->db->where($pk,$id);
    $query = $this->db->get($tables);
    $result = $query->result();

    return $result[0]->Amount;
  }

  // menghitung rows data dari sebuah tabel
  public function numrows($tables){
    $this->db->select('*');
    $this->db->from($tables);
    $result = $this->db->get()->num_rows();
    return $result;
  }

  // menghitung rows data dari sebuah tabel
  public function numWhereIn($tables,$field,$statement){
    $this->db->select('*');
    $this->db->from($tables);
    $this->db->or_where_in($field,$statement);
    $result = $this->db->get()->num_rows();
    return $result;
  }

  

  public function join2($table1,$id1,$table2,$id2,$field,$sort) 
  {
   $this->db->select('*');
   $this->db->from($table1);
   $this->db->join($table2, $table2.'.'.$id2.'='.$table1.'.'.$id1);
   $this->db->order_by($field,$sort);
   $query = $this->db->get();
   return $query->result();
 }

 public function join2_where($table1,$id1,$table2,$id2,$param,$code) 
 {
   $this->db->select('*');
   $this->db->from($table1);
   $this->db->join($table2, $table2.'.'.$id2.'='.$table1.'.'.$id1);
   $this->db->where($param,$code);
   return $this->db->get();
 }

 public function _do_upload($directory,$data)
 {
        $config['upload_path']          = $directory;
        $config['allowed_types']        = 'gif|jpg|png|pdf|xls|ppt|pptx|zip|doc|docx|word';
        $config['max_size']             = 0; //set max size allowed in Kilobyte
        $config['max_width']            = 0; // set max width image allowed
        $config['max_height']           = 0; // set max height allowed

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload($data)) //upload and validate
        {
          $error = array('error' => $this->upload->display_errors());
        }
        return $this->upload->data('file_name');
      }


      function unlink($tables,$pk,$id,$foto){
        $row = $this->db->where($pk,$id)->get($tables)->row();
        // Jika terdapat foto maka hapus
        if(file_exists('uploads/product/'.$row->$foto) && $row->$foto)
        {
          unlink('uploads/product/'.$row->$foto);
        }
        $this->db->where($pk, $id);
        $this->db->delete($tables);
        return true;      
      } 

      public function auto_id($table,$field,$prefix,$max)   {

              $this->db->select('RIGHT('.$table.'.'.$field.','.$max.') as kode', FALSE);
              $this->db->order_by($field,'DESC');    
              $this->db->limit(1);    
              $query = $this->db->get($table);      //cek dulu apakah ada sudah ada kode di tabel.    
              if($query->num_rows() <> 0){      
               //jika kode ternyata sudah ada.      
               $data = $query->row();      
               $kode = intval($data->kode) + 1;    
             }
             else {      
               //jika kode belum ada      
               $kode = 1;    
             }

              $kodemax  = str_pad($kode, $max, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
              $kodejadi = $prefix.$kodemax;    // hasilnya ODJ-9921-0001 dst.
              return $kodejadi;  
      }

      function format_icon($filename) {
            $akhiran   = strrchr($filename, ".");
            if($akhiran=='.pdf') {
                $icon = base_url()."assets/img/icons/pdf.png";
            }
            else if($akhiran=='.doc') {
                $icon = base_url()."assets/img/icons/doc.png";
            }
            else if($akhiran=='.docx') {
                $icon = base_url()."assets/img/icons/doc.png";
            }
            else if($akhiran=='.xls') {
                $icon = base_url()."assets/img/icons/xls.png";
            }
            else if($akhiran=='.zip') {
                $icon = base_url()."assets/img/icons/zip.png";
            }
            else if($akhiran=='.txt') {
                $icon = base_url()."assets/img/icons/txt.png";
            }
            else if($akhiran=='.rar') {
                $icon = base_url()."assets/img/icons/rar.png";
            }
            else if($akhiran=='.7z') {
                $icon = base_url()."assets/img/icons/7z.png";
            }
            else if($akhiran=='.gz') {
                $icon = base_url()."assets/img/icons/gz.png";
            }
            else if($akhiran=='.pps') {
                $icon = base_url()."assets/img/icons/pps.png";
            }
            else if($akhiran=='.ppt') {
                $icon = base_url()."assets/img/icons/ppt.png";
            }
            else if($akhiran=='.png') {
                $icon = base_url()."assets/img/icons/png.png";
            }
            else if($akhiran=='.jpg' OR $akhiran=='.jpeg') {
                $icon = base_url()."assets/img/icons/jpg.png";
            }
            else if($akhiran=='.gif') {
                $icon = base_url()."assets/img/icons/gif.png";
            }

            $format = "<img class='mr-3 rounded' width='60' src='$icon'>";

            return $format;
        }


        function time_since($original)
          {
            date_default_timezone_set('Asia/Jakarta');
            $chunks = array(
                array(60 * 60 * 24 * 365, 'tahun'),
                array(60 * 60 * 24 * 30, 'bulan'),
                array(60 * 60 * 24 * 7, 'minggu'),
                array(60 * 60 * 24, 'hari'),
                array(60 * 60, 'jam'),
                array(60, 'menit'),
            );
            $today = time();
            $since = $today - $original;
           
            if ($since > 604800)
            {
              $print = date("M jS", $original);
              if ($since > 31536000)
              {
                $print .= ", " . date("Y", $original);
              }
              return $print;
            }
           
            for ($i = 0, $j = count($chunks); $i < $j; $i++)
            {
              $seconds = $chunks[$i][0];
              $name = $chunks[$i][1];
           
              if (($count = floor($since / $seconds)) != 0)
                break;
            }
           
            $print = ($count == 1) ? '1 ' . $name : "$count {$name}";
            return $print . ' yang lalu';
          }


    }

    ?>
