<?php

namespace Model\Class;

use DateTime;
use PDO;

class News
{
    private static $db = null;
    private int $id = 0;
    private string $title = '';
    private string $announce = '';
    private string $text = '';
    private string $date = '';
    
    public static function setConnection(PDO $db): void
    {
        self::$db = $db;
    }
    
    public function __set($name, $value)
    {
        $this->$name = $value;
    }
    
    public function __get($name)
    {
        return $this->$name;
    }
    
    public function save(): void
    {
        if ($this->id) {
            $statement = self::$db->prepare('UPDATE "news" SET "title" = :title, "announce" = :announce, "text" = :text WHERE "id" = :id');
            $statement->bindParam(':id', $this->id, PDO::PARAM_INT);
            $statement->bindParam(':title', $this->title, PDO::PARAM_STR);
            $statement->bindParam(':announce', $this->announce, PDO::PARAM_STR);
            $statement->bindParam(':text', $this->text, PDO::PARAM_STR);
            $statement->execute();
        } else {
            $statement = self::$db->prepare('INSERT INTO "news" VALUES(default, :title, :announce, :text, default)');
            $statement->bindParam(':title', $this->title, PDO::PARAM_STR);
            $statement->bindParam(':announce', $this->announce, PDO::PARAM_STR);
            $statement->bindParam(':text', $this->text, PDO::PARAM_STR);
            $statement->execute();
        }
    }
    
    public static function allCount(): int
    {
        $statement = self::$db->query('SELECT COUNT(*) FROM "news"');
        return $statement->fetch()['count'];
    }
    
    public static function findAll()
    {
        $statement = self::$db->query('SELECT * FROM "news" ORDER BY "id" ASC');
        return $statement->fetchAll(PDO::FETCH_CLASS, self::class);
    }
    
    public static function findRange(int $limit, int $offset)
    {
        $statement = self::$db->prepare('SELECT * FROM "news" ORDER BY "id" ASC LIMIT :limit OFFSET :offset');
        $statement->bindParam('limit', $limit, PDO::PARAM_INT);
        $statement->bindParam('offset', $offset, PDO::PARAM_INT);
        $statement->execute();
        
        return $statement->fetchAll(PDO::FETCH_CLASS, self::class);
    }
    
    public static function find(int $id)
    {
        $statement = self::$db->prepare('SELECT * FROM "news" WHERE "id" = :id');
        $statement->bindParam('id', $id, PDO::PARAM_INT);
        $statement->execute();
        
        return $statement->fetchObject(self::class);
    }

    public static function delete(int $id): void
    {
        $statement = self::$db->prepare('DELETE FROM "news" WHERE "id" = :id');
        $statement->bindParam('id', $id, PDO::PARAM_INT);
        $statement->execute();
    }
    
}