<?php
  echo "<option value=''>- Pilih -</option>";
  foreach ($plant as $row){
      echo "<option value='$row[id_plant]'>$row[nama_plant]</option>";
  }