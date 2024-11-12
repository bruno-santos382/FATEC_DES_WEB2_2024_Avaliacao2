<?php 

require_once __DIR__.'/Conexao.php';

class Cadastro
{
    protected ?Conexao $conexao;

    public function __construct() 
    {
        $this->conexao = new Conexao();
    }

    public function __destruct()
    {
        $this->conexao = null;
    }

    // Implementar método cadastrarVaga
    public function cadastrarVaga(): array
    {
        $dados = $this->obterDadosInput([
            'nome_empresa' => ['filter' => FILTER_DEFAULT, 'erro' => 'Nome da empresa é obrigatório.'],
            'numero_whatsapp' => ['filter' => FILTER_DEFAULT, 'erro' => 'Número de WhatsApp inválido.'],
            'email_contato' => ['filter' => FILTER_VALIDATE_EMAIL, 'erro' => 'Endereço de e-mail inválido.'],
            'descricao_vaga' => ['filter' => FILTER_DEFAULT, 'erro' => 'Descrição da vaga é obrigatória.'],
            'curso' => ['filter' => FILTER_DEFAULT, 'erro' => 'Curso inválido.']
        ]);

        $query = <<<SQL

        INSERT INTO vagas (
            nome_empresa,
            numero_whatsapp,
            email_contato,
            descritivo_vaga,
            curso
        ) VALUES (
            :nome_empresa,
            :numero_whatsapp,
            :email_contato,
            :descritivo_vaga,
            :curso
        )
SQL;
        $stmt = $this->conexao->prepare($query);
        $stmt->execute([
            'nome_empresa' => $dados['nome_empresa'],
            'numero_whatsapp' => $dados['numero_whatsapp'],
            'email_contato' => $dados['email_contato'],
            'descritivo_vaga' => $dados['descricao_vaga'],
            'curso' => $dados['curso'],
        ]);

        return ['status' => 'ok'];
    }

    public function removerVaga(): array
    {
        $dados = $this->obterDadosInput([
            'id' => ['filter' => FILTER_VALIDATE_INT, 'erro' => 'O código da vaga é obrigatório']
        ]);

        $query = <<<SQL

        DELETE 
        FROM vagas
        WHERE id = :id
SQL;
        $stmt = $this->conexao->prepare($query);
        $stmt->execute([
            'id' => $dados['id']
        ]);

        return ['status' => 'ok'];
    }

    public function consultarVagas(): array
    {
        $query = <<<SQL

        SELECT v.*, 
                    CASE v.curso 
                        WHEN 1 THEN 'DSM' 
                        WHEN 2 THEN 'GE' 
                        ELSE v.curso -- Optional: Default value if curso is neither 1 nor 2
                    END AS curso
        FROM vagas v
        ORDER BY id ASC;
SQL;
        $stmt = $this->conexao->query($query);
        
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    private function obterDadosInput(array $parametros): array
    {
        $dados = filter_input_array(INPUT_POST, $parametros);

        foreach ($parametros as $campo => $parametro)
        {
            if (!isset($dados[$campo])) {
                throw new \Exception($parametro['erro']);
            }
        }

        return $dados;
    }
}