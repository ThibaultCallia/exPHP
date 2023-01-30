<?php


// This function will return the data from the wikipedia endpoint as an array - given a name
function getWikiInfo($name)
{
    $endpoint = "https://nl.wikipedia.org/w/api.php?action=query&list=search&srsearch=" . $name . "&format=json";
    $json = file_get_contents($endpoint);
    $data = json_decode($json, true);
    // Take only first array element as this is the actual info we need - the rest is just metadata and could be added if needed
    return $data["query"]["search"][0];
}
