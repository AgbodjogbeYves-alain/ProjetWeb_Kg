<?php
echo '<div class="pagination right">';
      for($j=0;$j<(count($listeC)/10);$j++){
             echo "<a href=";
             echo base_url('clients/get/'.($j/10));
             echo '>';
             echo $j;
             echo "</a>";
      }
echo '</div>';

  ?>
