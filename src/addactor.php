<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<form class="form-horizontal" action = "addac.php" method = "post">
<input type = "hidden" id ="Mov_id" name="Mov_id" value="<?php echo $row["Mov_id"];?>">
<fieldset>


<legend>Highest rating actor</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Actor_name">Actor name</label>  
  <div class="col-md-4">
  <input id="Actor_name" name="Actor_name" placeholder="Actor name" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="Actor_rating">Actor rating</label>  
  <div class="col-md-4">
  <input id="Actor_rating" name="Actor_rating" placeholder="Actor rating" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="Actor_detail">Actor detail</label>  
  <div class="col-md-4">
  <input id="Actor_detail" name="Actor_detail" placeholder="Actor detail" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="Actor_portrait">Actor portrait</label>  
  <div class="col-md-4">
  <input id="Actor_portrait" name="Actor_portrait" placeholder="Actor portrait" class="form-control input-md" required="" type="text">
    
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
