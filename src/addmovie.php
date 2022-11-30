<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<form class="form-horizontal" action = "addmov.php" method = "post">
<fieldset>


<legend>Movie</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Movie_name">Movie name</label>  
  <div class="col-md-4">
  <input id="Movie_name" name="Movie_name" placeholder="Movie name" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="Movie_cost">Movie cost</label>  
  <div class="col-md-4">
  <input id="Movie_cost" name="Movie_cost" placeholder="Movie cost" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="Movie_detail">Movie detail</label>  
  <div class="col-md-4">
  <input id="Movie_detail" name="Movie_detail" placeholder="Movie detail" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="Movie_date">Movie date</label>  
  <div class="col-md-4">
  <input id="Movie_date" name="Movie_date" placeholder="Movie date" class="form-control input-md" required="" type="text">
    
  </div>
</div>

 <div class="form-group">
  <label class="col-md-4 control-label" for="Movie_poster">Movie poster</label>  
  <div class="col-md-4">
  <input id="Movie_poster" name="Movie_poster" placeholder="Movie poster" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button type = "submit" class="btn btn-primary">Confirm</button>
  </div>
  </div>

</fieldset>
</form>