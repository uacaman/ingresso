<?php
/**
 * 
 * Formulário para adição/remoção de nome e email.
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
	 * Registra bibliotecas javascript necessárias
	 * 
	 * @param mixed $param
	 */
	public function onLoad($param) {
		parent::onLoad($param);
		$sm = $this->page->clientScript;
		$sm->registerPradoScript('prado');
		$sm->registerPradoScript('effects');
		$sm->registerScriptFile('XUtil', 'js/XMessage.js');
	}

	/**
	 * 
	 * Usuário clicou no link adicionar.
	 * 
	 * Evento executado via ajax. Coneca na aplicação 2 usando um web service. 
	 * É necessário alterar o endeço do servidor de web service no arquivo application.xml 
	 * 
	 * @param mixed $sender
	 * @param mixed $param
	 */
	public function OnAdicionarCallBack($sender, $param) {
		
		// recuperar url para o web service do application.xml
		$wsdl = $this->getApplication()->Parameters['ServidorWebService'] . 'index.php?web_service=ws.wsdl';
		
		// enviar solicitação
		$ws = new SoapClient($wsdl);
		$retorno = $ws->adicionar($this->txtNome->text, $this->txtEmail->text);
		
		// verificar tipo de retorno
		if($retorno == 1) {
			// email já existe
			$mensagem = 'Não foi possível adicionar. E-mail já existe.';
		}
		else {
			$mensagem = 'E-Mail adicionado com sucesso.';
		}
		
		// exibir mensagem para o usuário
		$this->getCallbackClient()->callClientFunction('mensagem_mostrar', $mensagem);
		
		// limpar tela
		$this->txtNome->text = '';
		$this->txtEmail->text = '';
		$this->apnPrincipal->render($param->newWriter);
	
	}
	
	/**
	 * 
	 * Usuário clicou no link excluir.
	 * 
	 * Evento executado via ajax. Coneca na aplicação 2 usando um web service. 
	 * É necessário alterar o endeço do servidor de web service no arquivo application.xml 
	 * 
	 * @param mixed $sender
	 * @param mixed $param
	 */	
	public function OnRemoverCallBack($sender, $param) {

		// recuperar url para o web service do application.xml
		$wsdl = $this->getApplication()->Parameters['ServidorWebService'] . 'index.php?web_service=ws.wsdl';

		// enviar solicitação
		$ws = new SoapClient($wsdl);
		$retorno = $ws->excluir($this->txtEmail->text);
		
		// verificar tipo de retorno
		if($retorno == 1) {
			// email não existe
			$mensagem = 'Não foi possível excluir. E-mail não existe.';
			
			
		}
		else {
			$mensagem = 'E-Mail excluído com sucesso.';
			
			// limpar tela
			$this->txtNome->text = '';
			$this->txtEmail->text = '';
		}
		
		// exibir mensagem para o usuário
		$this->getCallbackClient()->callClientFunction('mensagem_mostrar', $mensagem);
		
		$this->apnPrincipal->render($param->newWriter);
	}
	
}
