<?php
require_once "vendor/autoload.php";

$faker = Faker\Factory::create();

$db = new PDO();

$db->query("DELETE FROM articles");

foreach (range(1, 100) as $x) {
    $body = implode("<p>", $faker->paragraphs(20));

    $db->query("INSERT INTO articles(title, body, created)
        VALUES('{$faker->sentence(20)}', {$body}, {$faker->iso8601})");
}
