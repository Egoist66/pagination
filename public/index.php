<?php

ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

require_once '../app/bootstrap.php';


echo view(
    'templates->main.template',
    [
        "content" => [
            "users" => view('templates->users.template', [
                "users" => $users,
                "pages" => $pages
            ])->render(),
            

        ],


    ],
)->render();