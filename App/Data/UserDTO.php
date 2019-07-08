<?php

namespace App\Data;



class UserDTO
{
    private const EMAIL_MIN_LENGTH = 4;
    private const EMAIL_MAX_LENGTH = 255;

    private const PASSWORD_MIN_LENGTH = 4;
    private const PASSWORD_MAX_LENGTH = 255;

    private const NAME_MIN_LENGTH = 5;
    private const NAME_MAX_LENGTH = 255;


    private const PHONE_MIN_LENGTH = 4;
    private const PHONE_MAX_LENGTH = 255;

    private $id;
    private $email;
    private $password;
    private $name;
    private $phone;
    private $moneySpent;



    public function getId()
    {
        return $this->id;
    }

    public function setId($id): UserDTO
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param $email
     * @return UserDTO
     * @throws \Exception
     */
    public function setEmail($email): UserDTO
    {
        DTOValidator::validate(self::EMAIL_MIN_LENGTH, self::EMAIL_MAX_LENGTH, $email, "email", "Email");
        $this->email = $email;
        return  $this;
    }



    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param $password
     * @return UserDTO
     * @throws \Exception
     */
    public function setPassword($password): UserDTO
    {
        DTOValidator::validate(self::PASSWORD_MIN_LENGTH, self::PASSWORD_MAX_LENGTH,
            $password, "text", "Password");
        $this->password = $password;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     * @return UserDTO
     * @throws \Exception
     */
    public function setName($name): UserDTO
    {
        DTOValidator::validate(self::NAME_MIN_LENGTH, self::NAME_MAX_LENGTH, $name, 'text', 'Name');
        $this->name = $name;
        return $this;
    }





    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param $phone
     * @return UserDTO
     * @throws \Exception
     */
    public function setPhone($phone): UserDTO
    {

        DTOValidator::validate(self::PHONE_MIN_LENGTH, self::PHONE_MAX_LENGTH, $phone, 'phone', 'Phone');
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMoneySpent()
    {
        return $this->moneySpent;
    }

    /**
     * @param mixed $moneySpent
     */
    public function setMoneySpent($moneySpent): void
    {
        $this->moneySpent = $moneySpent;
    }



}