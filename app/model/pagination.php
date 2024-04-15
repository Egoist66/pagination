<?php

final class Pagination {

    public string $page;

    public function __construct(string $page = '') {

        $this->page = $page;
    }

    final public function getAll(): array {

        global $connect;

        
        $stmt = $connect->prepare("SELECT * FROM users");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    final public function paginate(): array{
        global $connect;

        $notesOnPage = 3;
        $from = ($this->page - 1) * $notesOnPage;


        $stmt = $connect->prepare("SELECT * FROM users WHERE id > 0 LIMIT $from, $notesOnPage");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

$paginator = new Pagination($_GET['page'] ?? 0);


$users = $paginator->paginate();
$pages = $paginator->getAll();