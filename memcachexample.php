<?php

class Person
{
    private $firstName;
    private $surName;
    private $age;
    private $available;

    public function __construct(string $firstName,string $surName,int $age,bool $available)
    {
        $this->firstName = $firstName;
        $this->surName   = $surName;
        $this->age       = $age;
        $this->available = $available;
    }

    public function __sleep()
    {
        echo 'Sleep instance of Person' . PHP_EOL;
        return array('firstName', 'surName', 'age');
    }

    public function __wakeup()
    {
        echo 'Wake up Instance Of Person' . PHP_EOL;
    }
}


$person = new Person('Peter','Smith',19,TRUE);

$memcached = new Memcached();
$memcached->addServer('localhost',11211);
$memcached->set('person',$person);
echo "<pre>";
var_dump($memcached->get('person'));
echo "</pre>";