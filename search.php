
<?php  
 // $connect = mysqli_connect("localhost", "root", "", "tayab");  
session_start();
include('includes/config.php');
 $query = "SELECT * FROM roznamcha ORDER BY id asc";  
$result = mysqli_query($con, $query);
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
    <title>Search and Filter Page</title>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
           <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  
         
      
           <style> 
input[type=text] {
  width: 60%;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
  background-color: white;
  background-image: url('searchicon.png');
  background-position: 10px 10px; 
  background-repeat: no-repeat;
  padding: 12px 20px 12px 40px;
  -webkit-transition: width 0.4s ease-in-out;
  transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
  width: 95%;
}
</style>

</head>  
<body>  
      <div class="container form-group">
      <h2 align="center">Search Data by ID, Name & Tafseel <br/> Filter Data Between Dates</h2>

      <br/>
          <div class="col-md-2">  
               <a href="index.php"><input type="button" value="Home" class="btn btn-primary btn-lg" /> </a> 
          </div> 
          <div class="col-md-2">  
               <a href="search.php"><input type="button" value="wapis" class="btn btn-primary btn-lg" /> </a> 
          </div> 
     <div> 
          
          

          <div class="col-md-3">  
               <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From" />
          </div>  
          <div class="col-md-3">  
               <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To" />  
          </div>  
          <div class="col-md-1 input-group">  
               <input type="button" name="filter" id="filter" value="Filter" class="btn btn-info" />  
          </div>  

          <div style="clear:both"></div>                 
          <br />  
          
          </div>  

     
        <div class="input-group">
          <span class="input-group-addon">SearchBox</span>
          <input type="text" name="search_text" id="search_text" placeholder="Search Data by ID, Name & Tafseel"  />
        </div>
       
  
      <div id="order_table"></div>
      <div style="clear:both"></div>
     
      <br/>
      <br/>
      <br/>
      <div id="result"></div>
      <div style="clear:both"></div>
       </div>
   
  
      </body>  
 </html>  

 <script>
$(document).ready(function(){
  load_data();
  function load_data(query)
  {
    $.ajax({
      url:"fetch.php",
      method:"post",
      data:{query:query},
      success:function(data)
      {
        $('#result').html(data);
      }
    });
  }
  
  $('#search_text').keyup(function(){
    var search = $(this).val();
    if(search != '')
    {
      load_data(search);
    }
    else
    {
      load_data();      
    }
  });
});
</script>



 <script>  
      $(document).ready(function(){  
           $.datepicker.setDefaults({  
                dateFormat: 'yy-mm-dd'   
           });  
           $(function(){  
                $("#from_date").datepicker();  
                $("#to_date").datepicker();  
           });  
           $('#filter').click(function(){  
                var from_date = $('#from_date').val();  
                var to_date = $('#to_date').val();  
                console.log(from_date)
                console.log(to_date)
                if(from_date != '' && to_date != '')  
                {  
                     $.ajax({  
                          url:"filter.php",  
                          method:"POST",  
                          data:{from_date:from_date, to_date:to_date},  
                          success:function(data)  
                          {  
                               $('#order_table').html(data);  
                          }  
                     });  
                }  
                else  
                {  
                     alert("Please Select Date");  
                }  
           });  
      });  
 </script>
