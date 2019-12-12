<?php
/**
 * Question 5: To solve this challenge, you are required to write an HTTP GET CURL method to retrieve information from a movie database.
 * Function Description Given a string substr, getMovieTitles() must search the database for an input field's search string:
 * Example URL and API Key: http://www.omdbapi.com/?s=spider&apikey=1763074f
 * Initialize the titles array to store total string elements.
 * Store the Title of each movie meeting the search criterion in the titles array.
 * Sort titles in ascending order and return it to the screen as your answer.
 * The design and layout of the elements is up to you to create.
 */

function getMovieTitles($searchString)
{
  $titles = [];

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "http://www.omdbapi.com/?s=" . $searchString . "&apikey=1763074f");

  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

  $output = curl_exec($ch);

  $jsonObj = json_decode($output);


  foreach ($jsonObj->Search as $movieObj) {
    array_push($titles, $movieObj->Title);
  }

  curl_close($ch);

  sort($titles);

  return $titles;
}

$title = [];
$errors = [];

if (isset($_POST['submit'])) {
  if (isset($_POST['search']) && $_POST['search'] != '') {
    $titles = getMovieTitles($_POST['search']);
  }else{
    array_push($errors, 'Search cannot be empty.');
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Question 5</title>

  <style>
    body {
      font-family: Verdana;
    }

    .error-container {
      background-color: indianred;
      border: 1px solid darkred;
      color: #fff;
      padding: 15px;
    }

    .error-container li {
      list-style: none;
    }

    .movies-collection {
      padding: 0;
    }

    .movies-collection li {
      list-style: none;
      padding: 10px;
    }

    .movies-collection li:nth-child(even) {
      background: #c3c3c3;
    }

    .movies-collection li:nth-child(odd) {
      background: #ccc;
    }
  </style>
</head>
<body>
<h1>Search for Movies</h1>

<form action="" method="post">
  <?php if (count($errors) > 0) { ?>
    <ul class="error-container">
      <?php
      foreach ($errors as $error) {
        ?>
        <li><?php echo $error ?></li>
      <?php } ?>
    </ul>
  <?php } ?>

  <label for="search"></label>
  <input type="text" name="search" value="<?php echo !empty($_POST['search']) ? $_POST['search'] : '' ?>" placeholder="Search for movie"/>
  <input type="submit" name="submit" value="Submit"/>
</form>

<h3>Movie Titles</h3>

<?php if (count($titles) > 0) { ?>
  <ul class="movies-collection">
    <?php
    foreach ($titles as $title) {
      ?>
      <li><?php echo $title ?></li>
    <?php } ?>
  </ul>
<?php } ?>

</body>
</html>

