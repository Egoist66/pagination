<?php

final class Pagination {

    public string $page;

    public function __construct(string $page = '') {

        $this->page = $page;
    }

    final public function countAll(): array {

        global $connect;

        
        $stmt = $connect->prepare("SELECT COUNT(*) AS count FROM users");
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    final public function paginate(): array{
        global $connect;

        if(!is_numeric($this->page)){
            $this->page = 1;
           
        }

        $notesOnPage = 2;
        $from = ($this->page - 1) * $notesOnPage;


        $stmt = $connect->prepare("SELECT * FROM users WHERE id > 0 LIMIT $from, $notesOnPage");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

$paginator = new Pagination($_GET['page'] ?? 0);


$users = $paginator->paginate() ?? [];
$entityCount = $paginator->countAll() ?? [];
$page = $paginator->page;

