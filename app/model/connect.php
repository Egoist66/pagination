<?php

$connect = db('pagination');

$stmt = $connect->prepare("SELECT email FROM users");
$stmt->execute();


$emails = $stmt->fetchAll(PDO::FETCH_COLUMN);


foreach (require '../app/model/users-data.php' as $user) {

    if (!in_array($user['email'], $emails)) {

        $stmt = $connect->prepare("INSERT INTO users (name, email, lastname) VALUES (:name, :email, :lastname)");
        $stmt->execute($user);
    }
}
