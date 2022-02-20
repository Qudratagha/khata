<?php

session_start();
include('includes/config.php');

if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  
     
      $out = '';  
      $fquery = "  
           SELECT * FROM roznamcha  
           WHERE date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'  
      ";  
      $fresult = mysqli_query($con, $fquery);  
      $out .= '  
           <table class="table table-bordered">  
                <tr>  
                     <th width="5%">ID</th>  
                     <th width="30%">date</th>  
                     <th width="10%">name</th>  
                     <th width="43%">tafseel</th>  
                     <th width="12%">jama</th>  
                     <th width="12%">banam</th>  
                     <th width="12%">jamayabanam</th>  
                     <th width="12%">baqaya</th>  
                </tr>  
      ';  
      if(mysqli_num_rows($fresult) > 0)  
      {  
           while($row = mysqli_fetch_array($fresult))  
           {  
                $out .= '  
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
           $out .= '  
                <tr>  
                     <td colspan="5">No Order Found</td>  
                </tr>  
           ';  
      }  
      $out .= '</table>';  
      echo $out;  
 }  




$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($con, $_POST["query"]);
	$query = "
	SELECT * FROM roznamcha 
	WHERE id LIKE '%".$search."%'
	OR date LIKE '%".$search."%' 
	OR name LIKE '%".$search."%' 
	OR tafseel LIKE '%".$search."%' 
	";
}
else
{
	$query = "
	SELECT * FROM roznamcha ORDER BY id";
}
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							 <th width="5%">ID</th>  
		                     <th width="10%">date</th>  
		                     <th width="20%">name</th>  
		                     <th width="34%">tafseel</th>  
		                     <th width="12%">jama</th>  
		                     <th width="12%">banam</th>  
		                     <th width="12%">jamayabanam</th>  
		                     <th width="12%">baqaya</th>  
						</tr>';
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
	echo $output;
}
else
{
	echo 'Data Not Found';
}


 
?>