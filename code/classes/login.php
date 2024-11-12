<?php 
session_start();

/**
 * Classe responsável por gerenciar o login do usuário.
 */
class Login { 
    /**
     * @var string Nome de usuário padrão para login.
     */
    private $name = 'estagio'; 
    
    /**
     * @var string Senha padrão para login.
     */
    private $password = 'estagio'; 
    
    /**
     * Verifica as credenciais do usuário.
     *
     * @param string $name Nome de usuário inserido pelo usuário.
     * @param string $password Senha inserida pelo usuário.
     * @return bool Retorna TRUE se as credenciais estão corretas, FALSE caso contrário.
     */
    public function verificar_credenciais($name, $password) { 
        if ($name == $this->name) {
            if ($password == $this->password) {
                $_SESSION["logged_in"] = TRUE;
                return TRUE;
            }
        }
        return FALSE;
    } 

    /**
     * Verifica se o usuário está logado.
     *
     * @return bool Retorna TRUE se o usuário está logado, chama logout() e redireciona caso contrário.
     */
    public function verificar_logado() { 
        if ($_SESSION["logged_in"]) {
            return TRUE;
        }
        $this->logout();
    } 

    /**
     * Realiza o logout do usuário.
     *
     * Destroi a sessão e redireciona para a página de login.
     */
    public function logout() { 
        session_destroy();
        header("Location: index.php");
        exit();
    } 
} 
?>
