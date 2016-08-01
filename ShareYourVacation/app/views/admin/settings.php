<?php include('../app/views/includes/header.php') ?>


<h1>Create a new Vacation Story</h1>

  <!-- Listing Content -->
 
    <?php if ($data) : ?>
      <p class="success"><?= $data[0];  ?></p>
    <?php endif; ?>
<div class="row">
    <form id="sign_in" method="post" action=""  enctype="multipart/form-data" > 
      <p><label for="title">Title Text: </label><input type="text" name="title" id="title" ></p>
      <p><label for="body">Body Text:</label><textarea name="body" id="body" cols="50" rows="5"></textarea></p>
      <p>
        <label for="latitude">Latitude: </label> <input type="text" name="latitude" id="latitude" >
        <label for="longitude">Longitude: </label> <input type="text" name="longitude" id="longitude" >
      </p>
      
      <div id="map" class="form_map"></div>

      <p> <input type="submit" name="add_article" value="Submit"> </p> 
    </form>
    <br>
      <?php if ($data) : ?>
      <p class="success"><?= $data[0];  ?></p>
    <?php endif; ?>



</div>


<?php include('../app/views/includes/footer.php') ?>


