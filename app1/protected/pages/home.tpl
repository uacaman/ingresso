<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<com:THead Title=""> 
	<meta http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
	<meta http-equiv="Pragma" content="no-cache"/>
	<meta http-equiv="Cache-Control" content="no-cache" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
<com:TClientScript>
	function mensagem_mostrar(msg) {
	    XMessage.show({ text: msg });
	}
</com:TClientScript>
	
</com:THead> 
<body>
<com:TForm >
<com:TActivePanel id="apnPrincipal" cssClass="principal" ActiveControl.EnableUpdate="true">
	<div class="titulo">Manter E-Mails</div>
		<div class="esquerda">
			<div class="legenda">Nome:</div>
			<div class="campo">
				<com:TTextBox ID="txtNome" Text="" Autotrim="true" MaxLength="250" />
				<com:TRequiredFieldValidator 
					ValidationGroup="vAdicionar" 
					ControlToValidate="txtNome" 
					Text="Campo obrigatório" 
					ControlCssClass="campo_erro" 
					InitialValue="" 
					Display="Dynamic" />
			</div>
	</div>
	<div class="direita">
		<div class="legenda">E-Mail</div>
		<div class="campo">
			<com:TTextBox ID="txtEmail" Text="" Autotrim="true" MaxLength="250" />
			<com:TRequiredFieldValidator 
				ValidationGroup="vAdicionar" 
				ControlToValidate="txtEmail" 
				Text="Campo obrigatório" 
				InitialValue="" 
			/>
			
			<com:TEmailAddressValidator
			    ValidationGroup="vAdicionar"
			    ControlToValidate="txtEmail"
			    Text="Endereço de E-mail inválido." 
			    />
			    	
			<com:TRequiredFieldValidator 
				ValidationGroup="vRemover" 
				ControlToValidate="txtEmail" 
				Text="Campo obrigatório" 
				InitialValue="" 
				 />

			<com:TEmailAddressValidator
			    ValidationGroup="vRemover"
			    ControlToValidate="txtEmail"
			    Text="Endereço de E-mail inválido." 
			     />				
			
    									
			</div>	
		</div>
	<div class="nova_linha"></div>
	<div class="linha"></div> 
	<div class="acao">
		<com:TActiveLinkButton id="lnkAdicionar" 
			Text="Adicionar" 
			ValidationGroup="vAdicionar" 
			OnCallback="OnAdicionarCallBack"
			ClientSide.OnLoading="mensagem_mostrar('Aguarde...')"
			/> | 
		<com:TActiveLinkButton id="lnkRemover" 
			Text="Remover"
			OnCallback="OnRemoverCallBack"  
			ValidationGroup="vRemover" 
			ClientSide.OnLoading="mensagem_mostrar('Aguarde...')"
			
			/>			
	</div>
</com:TActivePanel>
</com:TForm> 
</body>
</html>