<?php
require_once("../Config/connect.php");
/**
 * Created by PhpStorm.
 * User: BELIEVE
 * Date: 07-Jul-16
 * Time: 1:38 AM
 */
class Prioridade
{
    private $id;
    private $designacao;
    private $conexao;

    /**
     * prioridade constructor.
     */
    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getDesignacao()
    {
        return $this->designacao;
    }

    /**
     * @param mixed $designacao
     */
    public function setDesignacao($designacao)
    {
        $this->designacao = $designacao;
    }

    public function buscarTodos()
{
    $sql = "SELECT * FROM prioridade";
    return $this->conexao->query($sql);
}

}
?>