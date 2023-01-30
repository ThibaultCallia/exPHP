<?php
$db_host = '127.0.0.1';
$db_user = 'root';
$db_password = 'root';
$db_db = 'examenDB';
$db_port = 8889;

try {
    $pdo = new PDO('mysql:host=' . $db_host . '; port=' . $db_port . '; dbname=' . $db_db, $db_user, $db_password);
} catch (PDOException $e) {
    echo "Error!: " . $e->getMessage() . "<br/>";
    die();
}

function getDbInfo($sort)
{
    global $pdo;

    $stmt = $pdo->prepare("SELECT * FROM `230130_soorten` ORDER BY " . $sort . " ASC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getDbInfoFiltered($filterCat)
{
    global $pdo;

    $stmt = $pdo->prepare("SELECT * FROM `230130_soorten` WHERE category = '" . $filterCat . "' ORDER BY name ASC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getCategories()
{
    global $pdo;

    $stmt = $pdo->prepare("SELECT DISTINCT category FROM `230130_soorten` ORDER BY category ASC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getSpecificInfo($id)
{
    global $pdo;

    $stmt = $pdo->prepare("SELECT * FROM `230130_soorten` WHERE id = '" . $id . "'");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getName($id)
{
    global $pdo;

    $stmt = $pdo->prepare("SELECT name FROM `230130_soorten` WHERE id = '" . $id . "'");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function raiseViews($id)
{
    global $pdo;

    $stmt = $pdo->prepare("UPDATE `230130_soorten` SET views = views + 1 WHERE id = '" . $id . "'");
    $stmt->execute();
}
