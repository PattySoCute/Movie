<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<form class="form-horizontal" action = "addcin.php" method = "post">
<fieldset>


<legend>Cinema</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Cinema_name">Cinema name</label>  
  <div class="col-md-4">
  <input id="Cinema_name" name="Cinema_name" placeholder="Cinema name" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="Cinema_showtime">Cinema showtime</label>  
  <div class="col-md-4">
  <input id="Cinema_showtime" name="Cinema_showtime" placeholder="Cinema showtime" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="Cinema_location">Cinema location</label>  
  <div class="col-md-4">
  <input id="Cinema_location" name="Cinema_location" placeholder="Cinema location" class="form-control input-md" required="" type="text">
    
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