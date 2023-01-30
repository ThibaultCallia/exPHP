<?php

require "./includes/db.inc.php";

// Set standard sort and filter
$sort = "ID";
$filter = "";

// Get data from database
$data = $data = getDbInfo($sort);

// Check if sort or filter is set
if (isset($_GET['sort'])) {
    $sort = $_GET['sort'];
    $data = getDbInfo($sort);
}
if (isset($_GET['filter'])) {
    $filter = $_GET['filter'];
    $data = getDbInfoFiltered($filter);
}
// get categories
$categories = getCategories();
?>

<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>


<body>

    <!-- Three links that will sort the data -->
    <a href="<?php echo $_SERVER['PHP_SELF'] . "?sort=name"; ?>">Sort by name</a><br>
    <a href="<?php echo $_SERVER['PHP_SELF'] . "?sort=category"; ?>">Sort by Cat</a><br>
    <a href="<?php echo $_SERVER['PHP_SELF'] . "?sort=views"; ?>">Sort by Views</a><br>


    <!-- Form that shows all categories in DB  -->
    <form class="btn" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
        <select name="filter">
            <option value="">Select Category</option>
            <?php
            foreach ($categories as $category) {
                echo "<option value='" . $category['category'] . "'>" . $category['category'] . "</option>";
            }
            ?>
        </select>
        <input type="submit" value="Submit" class="myButton">
    </form>


    <!-- This table represents the data out of the DB that was selected -->
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

                // Loop through the data and display it in the table
                foreach ($data as $dataItem) {
                ?>
                    <tr>
                        <td><a href="detail.php?id=<?= $dataItem["id"] ?>"><?= $dataItem["name"] ?></a></td>
                        <td><?= $dataItem["category"] ?></td>
                        <td><?= $dataItem["views"] ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>