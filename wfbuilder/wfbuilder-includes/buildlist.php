<?php






    //GENERATE TITLES AND SEARCH RESULTS HERE
    if (empty($_GET['buildtype'])) {
        $buildType = "Warframe";
    } else {
        $buildType = $_GET['buildtype'];
    }
?>

<!-- Custom CSS -->


<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Build Name</th>
      <th scope="col"><?=$buildType?></th>
      <th scope="col">Rating</th>
      <th scope="col">Views</th>
      <th scope="col">Comments</th>
      <th scope="col">Forma</th>
      <th scope="col">Endo</th>
      <th scope="col">Updated</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Test Build Name</th>
      <td>Saryn</td>
      <?php //IF GREATER THAN 0, GREEN TEXT, LOWER RED TEXT, 0 = GRAY ?>
      <td class="text-success">+50</td>
      <td>3</td>
      <td>0</td>
      <td>3</td>
      <td>3540</td>
      <td>2 days ago</td>
    </tr>
  </tbody>
</table>



<!-- Custom JS -->


<?php




?>