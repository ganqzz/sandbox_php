<?php
// declare(strict_types=1);

interface Logger
{
    public function log($message);
}

(new class implements Logger {
    public function log($message)
    {
        var_dump($message);
    }
})->log("ほげほげ");

//---
class User
{
    private $name;
    private $age;

    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function name()
    {
        return $this->name;
    }

    public function age()
    {
        return $this->age;
    }
}

class UserCollection
{
    private $users;

    public function __construct(array $users)
    {
        $this->users = $users;
    }

    public function users()
    {
        return $this->users;
    }

    public function sortBy($property)
    {
        usort($this->users, function($userOne, $userTwo) use ($property) {
            // Combined comparison Operator : "Spaceship" oprerator
            return $userOne->$property() <=> $userTwo->$property();
        });
    }
}

$collection = new UserCollection([
    new User('Hoge', 20),
    new User('Fuga', 40),
    new User('Fefe', 35),
    new User('Awawa', 5),
]);

$collection->sortBy('name');
var_dump($collection->users());

$collection->sortBy('age');
var_dump($collection->users());

// Null coalesce operator
$hoge = null;
$fuga = $hoge ?? 'fuga';
echo $fuga;
