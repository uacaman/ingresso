<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<com:THead Title="Consultar E-Mails"> 
	<meta http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
	<meta http-equiv="Pragma" content="no-cache"/>
	<meta http-equiv="Cache-Control" content="no-cache" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</com:THead> 
<body>
<com:TForm >
	<div class="principal">
		<div class="titulo">Consultar E-Mails</div>
		
		<com:TRepeater ID="rptResultado"  >
				<prop:EmptyTemplate>
					<div class="titulo">Nenhum registro encontrado.</div>
				</prop:EmptyTemplate>
				<prop:HeaderTemplate>
					<table width="100%" class="tblResultado">
						<tr class="tblResultadoCabecalho">
							<td width='50%'>Nome</td>
							<td width='50%'>E-Mail</td>
                        </tr>
				</prop:HeaderTemplate>
				<prop:ItemTemplate>
                	<tr class="tblResultadoItem">
                    	<td><%# $this->Data['nome'] %></td>
                       	<td><%# $this->Data['email'] %></td>
					</tr>
                </prop:ItemTemplate>
				<prop:AlternatingItemTemplate>
                	<tr class="tblResultadoItemA">
                    	<td ><%# $this->Data['nome'] %></td>
                       	<td><%# $this->Data['email'] %></td>
					</tr>				
				</prop:AlternatingItemTemplate>
                <prop:FooterTemplate>
                	</table>
				</prop:FooterTemplate>                	
		</com:TRepeater>
	</div>
</com:TForm> 
</body>
</html>