<?php
  echo "<option value=''>- Pilih -</option>";
  foreach ($kandang as $row){
      echo "<option value='$row[id_kandang]'>$row[nama_kandang]</option>";
  }