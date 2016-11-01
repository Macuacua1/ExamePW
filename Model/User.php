<?php

include_once("../Config/connect.php");

class User
{
    private $username;
    private $password;
    private $conexao;


    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return Conexao
     */
    public function getConexao()
    {
        return $this->conexao;
    }

    /**
     * @param Conexao $conexao
     */
    public function setConexao($conexao)
    {
        $this->conexao = $conexao;
    }



    public function salvar()
    {
        $sql = "INSERT INTO usuario (username,password) VALUES ('$this->username', '$this->password')";
        return $this->conexao->query($sql);
    }

    public function buscarTodos()
    {
        $sql = "SELECT * FROM usuario";
        return $this->conexao->query($sql);
    }

}