<?php
/**
 * 
 * Página para visualização de e-mails cadastrados
 * 
 * Esta classe é o controler para o template home.tpl
 * 
 * @author Ângelo Ayres Camargo
 *
 */
class home extends TPage { 

	/**
	 * Evento executado quando o usuário entra na página
	 * 
	 * Carrega registros da base de dados
	 * 
	 * @param mixed $param
	 */
	public function onLoad($s) {
		parent::onLoad($s);
		
		$db = new db();
		
		// associar registros a tela
		$this->rptResultado->DataSource = $db->Consultar() ;
		$this->rptResultado->DataBind();
	}
}