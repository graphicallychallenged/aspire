<?php include('config.php'); ?>
<?php

$zipcode = $_POST['zip'];

if(!empty($zipcode)):

$query = mysql_query('SELECT * FROM cable_providers WHERE zip_code = "'.$zipcode.'" ORDER BY provider ASC');
$num = mysql_num_rows($query);

endif;

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Find ASPiRE on Your TV! - ASPiRE.TV</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="http://getbootstrap.com/2.3.2/assets/css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 10px; /* 60px to make the container go all the way to the bottom of the topbar */
        height: 600px !important;
      }
    </style>
    <link href="http://getbootstrap.com/2.3.2/assets/css/bootstrap-responsive.css" rel="stylesheet">


  </head>

  <body>

    <div class="container">
    <br/>
      <p>To see if Aspire is available through your cable or satellite provider, please follow the instructions below.</p>

      <form action="http://www.aspire.tv/cdm/index.php" method="post">

        <div class="form-group">
          <label for="exampleInputEmail1">Enter your zip code</label>
          <input type="text" class="form-control" name="zip" maxlength="5" pattern="[0-9]{5}" id="exampleInputEmail1" placeholder="zip code">
        </div>

        <div class="form-group">

        <button type="submit" class="btn btn-default">Search</button>
      </form>

      <br/><br/>
      <?php if($num > 1): ?>
      <?php while($res = mysql_fetch_object($query)): ?>
			 <div class="alert alert-warning" role="alert"
       ><strong><?=$res->channel;?></strong> <?=$res->provider;?> <?php echo $res->type == "ASPREHD" ? "- HD": false; ?> </div>
	  <?php endwhile; ?>
      <?php elseif(!empty($zipcode) AND $num == 0): ?>
        <?php echo "No provider was found."; ?>
      <?php endif; ?>
    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->


  </body>
</html>
