<?php
include_once("../Config/connect.php");
/**
 * Created by PhpStorm.
 * User: BELIEVE
 * Date: 07-Jul-16
 * Time: 1:22 AM
 */
class Pedido
{
    private $id;
    private $nome;
    private $email;
    private $telefone;
    private $assunto;
    private $mensagem;
    private $estado;
    private $idusuario;
    private $idprioridade;
    private $conexao;

    /**
     * Pedido constructor.
     */
    public function __construct()
    {
        $this->conexao=new Conexao();
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * @param mixed $telefone
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    /**
     * @return mixed
     */
    public function getAssunto()
    {
        return $this->assunto;
    }

    /**
     * @param mixed $assunto
     */
    public function setAssunto($assunto)
    {
        $this->assunto = $assunto;
    }

    /**
     * @return mixed
     */
    public function getMensagem()
    {
        return $this->mensagem;
    }

    /**
     * @param mixed $mensagem
     */
    public function setMensagem($mensagem)
    {
        $this->mensagem = $mensagem;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    /**
     * @return mixed
     */
    public function getIdusuario()
    {
        return $this->idusuario;
    }

    /**
     * @param mixed $idusuario
     */
    public function setIdusuario($idusuario)
    {
        $this->idusuario = $idusuario;
    }

    /**
     * @return mixed
     */
    public function getIdprioridade()
    {
        return $this->idprioridade;
    }

    /**
     * @param mixed $idprioridade
     */
    public function setIdprioridade($idprioridade)
    {
        $this->idprioridade = $idprioridade;
    }

    /**
     * @return mixed
     */
    public function getConexao()
    {
        return $this->conexao;
    }

    /**
     * @param mixed $conexao
     */
    public function setConexao($conexao)
    {
        $this->conexao = $conexao;
    }


   function salvar()
    {
       echo "'$this->nome', '$this->email','$this->telefone','$this->assunto','$this->mensagem','$this->estado','$this->idusuario','$this->idprioridade'";
        $sql = "INSERT INTO pedido (nome,email,telefone,assunto,mensagem,estado,idusuario,idprioridade) VALUES ('$this->nome', '$this->email','$this->telefone','$this->assunto','$this->mensagem','$this->estado','$this->idusuario','$this->idprioridade')";
       return $this->conexao->query($sql);
        echo "Salvo com sucesso";
    }

    public function buscarTodos()
    {
        $sql = "SELECT * FROM pedido p natural join prioridade pp where p.idprioridade = pp.idprioridade and pp.designacao= 'alta'";
        return $this->conexao->query($sql);
    }
    function actualizar($id)
    {
        $sql = "UPDATE pedido SET nome='" . $this->nome . "', telefone='" . $this->telefone. "', estado ='".$this->estado."' WHERE idpedido='" . $id . "'";
        return $this->conexao->query($sql);
    }

    function buscarPeloId($id)
    {
        $sql = "SELECT * FROM pedido p natural join prioridade pp where p.idprioridade = pp.idprioridade and p.idpedido='" . $id . "'";
        return $this->conexao->query($sql);
    }


    public function buscarPeloAssunto($assunto)
    {
        $sql = "SELECT * FROM pedido p natural join prioridade pp where p.idprioridade = pp.idprioridade and p.assunto like %'" . $assunto . "'%";
        return $this->conexao->query($sql);
    }


 function apagar($id)
    {
        $sql = "DELETE FROM pedido WHERE idpedido='" . $id . "'";
        return $this->conexao->query($sql);
    }



}
?>