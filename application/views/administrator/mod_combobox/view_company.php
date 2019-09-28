<?php
  echo "<option value=''>- Pilih -</option>";
  foreach ($perusahaan as $row){
      echo "<option value='$row[id_perusahaan]'>$row[nama_perusahaan]</option>";
  }