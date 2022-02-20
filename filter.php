<?php  

session_start();
include('includes/config.php');

 //filter.php  
 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  
     
      $output = '';  
      $query = "  
           SELECT * FROM roznamcha  
           WHERE date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'  
      ";  
      $result = mysqli_query($con, $query);  
      $output .= '  
           <table class="table table-bordered">  
                <tr>  
                     <th width="5%">ID</th>  
                     <th width="30%">date</th>  
                     <th width="43%">name</th>  
                     <th width="10%">tafseel</th>  
                     <th width="12%">jama</th>  
                     <th width="12%">banam</th>  
                     <th width="12%">jamayabanam</th>  
                     <th width="12%">baqaya</th>  
                </tr>  
      ';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>'. $row["id"] .'</td>  
                          <td>'.(date('d-m-Y', strtotime($row['date']))) .'</td>  
                          <td>'. $row["name"] .'</td>  
                          <td>'. $row["tafseel"] .'</td>  
                          <td>'. $row["jama"] .'</td>  
                          <td>'. $row["banam"] .'</td>  
                          <td>'. $row["jamaOrBanam"] .'</td>  
                          <td>'. $row["baqaya"] .'</td>  

                     </tr>  
                ';  
           }  
      }  
      else  
      {  
           $output .= '  
                <tr>  
                     <td colspan="5">No Order Found</td>  
                </tr>  
           ';  
      }  
      $output .= '</table>';  
      echo $output;  
 }  
 ?>








