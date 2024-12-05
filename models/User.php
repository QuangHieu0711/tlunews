<?php
//strict type
declare(strict_types= 1);
class User{
    //Thuoc tinh
    private int $id;
    private $username;
    private $password;
    private $role;

    //Methods
    public function __construct(int $id, string $username, string $password, string $role){
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;

    }
    public function getId(): int{ 
        return $this->id;
    }
    public function getUsername(): string{
        return $this->username;
    }
    public function getPassword(): string{
        return $this->password;
    }
    public function getRole(): string{
        return $this->role;
    }
    public function setID(int $id): void{
        $this->id = $id;
    }
    public function setUsername(string $username): void{
        $this->username = $username;
    }
    public function setPassword(string $password): void{
        $this->password = $password;
    }
    public function setRole(string $role): void{
        $this->role = $role;
    }
    
}