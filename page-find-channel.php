<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package aspire
 */

get_header();

// $hostname = "localhost:3306";
// $username = "wordpress_0";
// $password = "DQj50!Bte3";
// $dbname = "wordpress_2";
// $link = mysql_connect($hostname, $username, $password);
// mysql_select_db($dbname) or die("Unknown database!");
//
// $zipcode = $_POST['zip'];
//
// if(!empty($zipcode)):
//   $query = mysql_query('SELECT * FROM cable_providers WHERE zip_code = "'.$zipcode.'" ORDER BY provider ASC');
//   $num = mysql_num_rows($query);
// endif;

?>

<div class="site-container container" id="site-container">
  <div class="site-content row" id="site-content">
    <main class="site-main col-lg-7" id="site-main" role="main">

      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
          <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        </header>

        <div class="entry-content">
          <iframe src="http://www.aspire.tv/cdm/index.php" style="width:100%; height: 100%; min-height: 700px; border:0; padding:0;"></iframe>
        </div>

      <!-- <form action="http://www.aspire.tv/cdm/index.php" method="post">

        <div class="form-group">
          <label for="exampleInputEmail1">Enter your zip code</label>
          <input type="text" class="form-control" name="zip" maxlength="5" pattern="[0-9]{5}" id="exampleInputEmail1" placeholder="zip code">
        </div>

        <div class="form-group">

        <button type="submit" class="btn btn-default">Search</button>
      </form>

      <br/><br/>
      <?php
      if($num > 1):
        while($res = mysql_fetch_object($query)): ?>
			     <div class="alert alert-warning" role="alert">
             <strong><?=$res->channel;?></strong>
             <?=$res->provider;?>
             <?php echo $res->type == "ASPREHD" ? "- HD": false; ?>
           </div>
  	   <?php
      endwhile;
      elseif(!empty($zipcode) AND $num == 0):
        echo "No provider was found.";
      endif;?> -->

      </article>
    </main>

    <div id="sidebar" class="sidebar sidebar-primary col-lg-4 offset-lg-1" role="complementary">
      <?php get_sidebar('primary'); ?>
    </div>

  </div>
</div>

<?php
get_footer();
