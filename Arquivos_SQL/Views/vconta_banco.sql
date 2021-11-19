/*View que retorna dados das contas do usuário*/
CREATE OR REPLACE VIEW vconta_banco AS
SELECT banco.nome,
       banco.agencia,
       caixa.saldo,
       caixa.numeroconta,
       caixa.ativo,
       caixa.id_usuario,
       caixa.id_caixa
       CASE caixa.tipoconta
            WHEN 'S' then 'Conta Salário' 
            WHEN 'P' then 'Conta Poupança' 
	    WHEN 'C' then 'Conta Corrente' 
            WHEN 'U' then 'Conta Universitária'
        END AS tipo_conta_d       
FROM banco,
	 caixa
WHERE caixa.id_banco = banco.id_banco
  AND caixa.id_usuario = banco.id_usuario;

SELECT *
FROM vconta_banco
LIMIT 100;