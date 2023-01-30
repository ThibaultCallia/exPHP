<?php
require "./includes/db.inc.php";
include "./includes/functions.inc.php";


// Check if name is set
// If it is, get the data from the DB and show it
// Also raise the views by 1
// Also get the wiki info
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $name = getName($id);
    // replace spaces with %20 for the wikipedia api - spaces are not allowed in the url
    $name = str_replace(' ', '%20', $name[0]["name"]);
    raiseViews($id);
    $data = getSpecificInfo($id);
    $wikiInfo = getWikiInfo($name);
}
?>

<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>


<body>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Views</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $dataItem) {
                ?>
                    <tr>
                        <td><?= $dataItem["name"] ?></td>
                        <td><?= $dataItem["category"] ?></td>
                        <td><?= $dataItem["views"] ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <h1>Results Wikipedia</h1>
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Snippet</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $wikiInfo["title"] ?></td>
                        <td><?= $wikiInfo["snippet"] ?></td>

                    </tr>
                </tbody>
            </table>
        </div>
</body>

</html>