<?php
                foreach($results2 as $row){
                    $product_i = $row->site_id;
            ?>          
          <tr>
		 <?php
           if($row->site_status != 0){
            ?>
            <td><a href="#" class="btn btn-success" target="_blank">Active</a></td>
            <?php }else{  ?>
            <td><a href="#" class="btn btn-danger" target="_blank">Inactive</a></td>
            <?php } ?>


            <td><?php echo $row->user_name; ?></td>   
            <td><?php echo $row->site_title; ?></td>      
            <td><a href="<?php echo base_url(); ?>site/tapdim_news" class="btn btn-info" target="_blank">Preview</a></td>
              <td><a href="<?php echo base_url(); ?>site/editsurf/<?php echo $product_i; ?>" class="btn btn-info" >Edit</a></td>
               <td><a href="<?php echo base_url(); ?>site/deletesurf/<?php echo $product_i; ?>" class="btn btn-danger" >Delete</a></td>
			  
          </tr>
          
          <?php
          }
          ?>