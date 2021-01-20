DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `select_arquivo`(
tipo_relatorio VARCHAR(64), 
industria VARCHAR(64), 
unidade VARCHAR(64), 
dt_inicio date,
dt_Fim date


)
BEGIN

  SELECT * FROM dadosarquivo 
  where dt_arquivo = dt_inicio 
  and dt_arquivo = dt_Fim
  and regiao = unidade
  order by  tipo_relatorio;	
    
END$$
DELIMITER ;
