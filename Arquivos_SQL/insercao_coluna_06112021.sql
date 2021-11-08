/*06/11/2021* - Bruna/
--
/*Inserindo Coluna tipo_categoria, tendo os valores : 'E'-entrada de dinheiro ou 'S'-saída de dinheiro*/
ALTER TABLE `categoria` 
ADD COLUMN `tipo_categoria` VARCHAR(1) NOT NULL 
COMMENT 'Tipo da Categoria, valores: \"E\" - Entrada de Dinheiro e \"S\" -Saída de Dinheiro' AFTER `ativo`;
--
/*Inserindo Coluna id_usuario, para verificar qual usuário criou a categoria */
ALTER TABLE `categoria` 
ADD COLUMN `id_usuario` INT(11) NOT NULL 
COMMENT 'Usuário criador da categoria' AFTER `tipo_categoria`;
--
/*Inserindo FK fk_id_usuario_categ*/
ALTER TABLE `categoria` 
ADD CONSTRAINT fk_id_usuario_categ
FOREIGN KEY (id_usuario) REFERENCES `usuario`(id_usuario);
--
--
/*Inserindo Coluna id_usuario na tabela sub_categoria, para verificar qual usuário criou a subcategoria*/
ALTER TABLE `sub_categoria` 
ADD COLUMN `id_usuario` INT(11) NOT NULL 
COMMENT 'Usuário criador da sub_categoria' AFTER `ativo`;
--
/*Inserindo FK fk_id_usuario_sub_categ*/
ALTER TABLE `sub_categoria` 
ADD CONSTRAINT fk_id_usuario_sub_categ
FOREIGN KEY (id_usuario) REFERENCES `usuario`(id_usuario);
-------------------------------------------------------------------------------------------------------------------------------