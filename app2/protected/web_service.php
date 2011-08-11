<?php
/**
 * 
 * Classe para criação de um SoapServer
 * 
 * O registro do serviço fica em application.xml. Parametros para criação do 
 * WSDL necessário a um cliente são feitos por meio de DocBlocks 
 * 
 * @author uaca
 *
 */
class web_service {
    /**
     * @param string $nome 
     * @param string $email 
     * @return int codigo de erro. 0 - inserido com sucesso. 1 - E-mail já existe.
     * @soapmethod
     */
    public function adicionar($nome, $email) {
        $db = new db();
        if ( $db->ExisteEmail($email) == true) { 
        	return 1;
        }
        
        $db->Adicionar($nome, $email);
        
        return 0;
    }
    
    /**
     * @param string $email 
     * @return int codigo de erro. 0 - excluido com sucesso. 1 - E-mail não existe.
     * @soapmethod
     */
    public function excluir($email) {
        
    	$db = new db();
    	
    	if ( $db->ExisteEmail($email) == false) { 
        	return 1;
        }
        
        $db->Excluir($email);
        
        return 0;
    }    
}