<?php
require '../libs/fpdf/fpdf.php';
echo "......";
//CIDADE ONDE SERA REALIZADO O EXAME
$cidade = "Araras/SP";

class PDF extends FPDF {  

  	//CABECALHO  
    function Header(){

		$exame_selecionado = $_POST['cbTipoExame'];

    global $codigo;  
        
    $l=5; // DEFINI ESTA VARIAVEL PARA ALTURA DA LINHA  
        
    $this->SetXY(10,10); // SetXY - DEFINE O X E O Y NA PAGINA  
      
    $this->Image('../images/bg.jpg',190,-10,22,310);

    //$this->Image('logo.jpg',11,11,40); // INSERE UMA LOGOMARCA NO PONTO X = 11, Y = 11, E DE TAMANHO 40.  
       
    $this->SetFont('Calibri','',24); // DEFINE A FONTE ARIAL, NEGRITO (B), DE TAMANHO 8    
    
    switch ($exame_selecionado) {
				case 'OFI_ORG':
					$this->Cell(170,15,utf8_decode('Pedido de Exame e Teste para Organistas'),0,0,'C');
					break;
				case 'RJM_ORG':
					$this->Cell(170,15,utf8_decode('Pedido de Exame e Teste para Organistas'),0,0,'C');
					break;
				case 'CUL_ORG':
					$this->Cell(170,15,utf8_decode('Pedido de Exame e Teste para Organistas'),0,0,'C');
					break;
				case 'OFI_MUS':
					$this->Cell(170,15,utf8_decode('Pedido de Exame e Teste para Músicos'),0,0,'C');
					break;
				case 'CUL_MUS':
					$this->Cell(170,15,utf8_decode('Pedido de Exame e Teste para Músicos'),0,0,'C');
					break;
				case 'TROCA':
					$this->Cell(170,15,utf8_decode('Pedido de Exame e Teste para Músicos'),0,0,'C');
					break;
	}

    //$this->Cell(170,15,utf8_decode('Pedido de Exame e Teste para Músicos'),0,0,'C');
  
    $this->Ln(); // QUEBRA DE LINHA  
          
		$this->SetFont('Calibri','',11);
		$this->Cell(170,15,utf8_decode($_POST['txtCidade'].', ').date('d/m/Y'),0,0,'L');

		$this->Ln(); // QUEBRA DE LINHA  

		$this->SetFont('Calibri','',11);
		$this->Cell(170,15,'****',0,0,'L');

		$this->Ln(); // QUEBRA DE LINHA  

		$this->SetFont('Calibri','',11);
		$this->Cell(170,15,utf8_decode('Aos irmãos anciães ou responsáveis pela parte musical.'),0,0,'L');

		$this->Ln(); // QUEBRA DE LINHA 

		$this->SetFont('Calibri','',11);
		$this->Cell(170,15,'A Paz de Deus!',0,0,'L');

		$this->Ln(); // QUEBRA DE LINHA 

		$this->SetFont('Calibri','',11);
		
			switch ($exame_selecionado) {
				case 'OFI_ORG':
					$tipo_exame = "EXAME DE OFICIALIZAÇÃO";
					$this->MultiCell(170,5,utf8_decode('Por meio desta vimos solicitar '.$tipo_exame.'  para a irmã '.strtoupper($_POST['txtNomeCandidato']).'.'),0,'L');		
					break;
				case 'RJM_ORG':
					$tipo_exame = "TESTE PARA REUNIÃO DE JOVENS E MENORES";
					$this->MultiCell(170,5,utf8_decode('Por meio desta vimos solicitar '.$tipo_exame.'  para a irmã '.strtoupper($_POST['txtNomeCandidato']).'.'),0,'L');		
					break;
				case 'CUL_ORG':
					$tipo_exame = "TESTE PARA CULTOS OFICIAIS";
					$this->MultiCell(170,5,utf8_decode('Por meio desta vimos solicitar '.$tipo_exame.'  para a irmã '.strtoupper($_POST['txtNomeCandidato']).'.'),0,'L');		
					break;
				case 'CUL_MUS':
					$tipo_exame = "TESTE PARA CULTOS OFICIAIS";
					$this->MultiCell(170,5,utf8_decode('Por meio desta vimos solicitar '.$tipo_exame.'  para o irmão '.strtoupper($_POST['txtNomeCandidato']).' no instrumento '.$_POST['txtInstrumento'].'.'),0,'L');		
					break;
				case 'OFI_MUS':
					$tipo_exame = "EXAME DE OFICIALIZAÇÃO";
					$this->MultiCell(170,5,utf8_decode('Por meio desta vimos solicitar '.$tipo_exame.'  para o irmão '.strtoupper($_POST['txtNomeCandidato']).' no instrumento '.$_POST['txtInstrumento'].'.'),0,'L');		
					break;
				case 'TROCA':
					$tipo_exame = "TROCA DE INSTRUMENTO";
					$this->MultiCell(170,5,utf8_decode('Por meio desta vimos solicitar '.$tipo_exame.'  para a irmão '.strtoupper($_POST['txtNomeCandidato']).' no instrumento '.$_POST['txtInstrumento'].'.'),0,'L');		
					break;
			}		
		$this->Ln(); // QUEBRA DE LINHA

		$this->SetFont('Calibri','',11); 
		
		switch ($exame_selecionado) {
				case 'OFI_ORG':
					$this->Cell(170,15,utf8_decode('A irmã fará sua comum congregação no(a) '.$_POST['txtComum'].'.'),0,0,'L');
					break;
				case 'RJM_ORG':
					$this->Cell(170,15,utf8_decode('A irmã fará sua comum congregação no(a) '.$_POST['txtComum'].'.'),0,0,'L');
					break;
				case 'CUL_ORG':
					$this->Cell(170,15,utf8_decode('A irmã fará sua comum congregação no(a) '.$_POST['txtComum'].'.'),0,0,'L');
					break;
				case 'CUL_MUS':
					$this->Cell(170,15,utf8_decode('O irmão fará sua comum congregação no(a) '.$_POST['txtComum'].'.'),0,0,'L');
					break;
				case 'OFI_MUS':
					$this->Cell(170,15,utf8_decode('O irmão fará sua comum congregação no(a) '.$_POST['txtComum'].'.'),0,0,'L');
					break;
				case 'TROCA':
					$this->Cell(170,15,utf8_decode('O irmão fará sua comum congregação no(a) '.$_POST['txtComum'].'.'),0,0,'L');
					break;
			}		
		$this->Ln(); // QUEBRA DE LINHA

		$this->SetFont('Calibri','',11);
		$this->Cell(170,15,utf8_decode('Deus vos abençoe.'),0,0,'L');	

		$this->Ln(); // QUEBRA DE LINHA  
		
		$this->Cell(170,15,'____________________________________________',0,0,'C');		
		$this->Ln(7); // QUEBRA DE LINHA  
		$this->Cell(170,15,utf8_decode($_POST['txtNomeAnciao']),0,0,'C');		
		$this->Ln(5); // QUEBRA DE LINHA  		
		$this->SetFont('Arial','B',11);
		$this->Cell(170,15,utf8_decode('Ancião'),0,0,'C');		

		$this->Ln(15); // QUEBRA DE LINHA  
		
		$this->SetFont('Calibri','',11);
		$this->Cell(170,15,'____________________________________________',0,0,'C');		
		$this->Ln(7); // QUEBRA DE LINHA  
		$this->Cell(170,15,utf8_decode($_POST['txtNomeCoopera']),0,0,'C');
		$this->Ln(5); // QUEBRA DE LINHA  		
		$this->SetFont('Arial','B',11);
		$this->Cell(170,15,utf8_decode('Cooperador do Ofício Ministerial'),0,0,'C');		

		$this->Ln(15); // QUEBRA DE LINHA  
		
		$this->SetFont('Calibri','',11);
		$this->Cell(170,15,'____________________________________________',0,0,'C');		
		$this->Ln(7); // QUEBRA DE LINHA  		
		$this->Cell(170,15,utf8_decode($_POST['txtNomeEncarregado']),0,0,'C');
		$this->Ln(5); // QUEBRA DE LINHA  		
		$this->SetFont('Arial','B',11);
		$this->Cell(170,15,utf8_decode('Encarregado Local de Orquestra'),0,0,'C');		

		$this->Ln(); // QUEBRA DE LINHA  
		$this->Image('../images/result.jpg',35,210,120,30);

		$this->Ln(30); // QUEBRA DE LINHA  
		
		$this->SetFont('Calibri','',11);
		$this->Cell(170,15,'____________________________________________',0,0,'C');		
		$this->Ln(7); // QUEBRA DE LINHA  
		$this->Cell(170,15,utf8_decode('Ancião'),0,0,'C');

		$this->Ln(15); // QUEBRA DE LINHA  
		
		$this->SetFont('Calibri','',11);
		$this->Cell(170,15,'____________________________________________',0,0,'C');		
		$this->Ln(7); // QUEBRA DE LINHA  
		
		switch ($exame_selecionado) {
				case 'OFI_ORG':
					$this->Cell(170,15,utf8_decode('Examinadora'),0,0,'C');
					break;
				case 'RJM_ORG':
					$this->Cell(170,15,utf8_decode('Examinadora'),0,0,'C');
					break;
				case 'OFI_MUS':
					$this->Cell(170,15,utf8_decode('Encarregado Regional de Orquestra'),0,0,'C');
					break;
				case 'TROCA':
					$this->Cell(170,15,utf8_decode('Encarregado Regional de Orquestra'),0,0,'C');
					break;
		}

		//$this->Cell(170,15,utf8_decode('Encarregado Regional de Orquestra'),0,0,'C');


    }  
 
  
}

//COMPONDO DADOS PARA ARQUIVO de texto
//$dados = "CIDADE:".$_POST['txtCidade']." | COMUM:".$_POST['txtComum']." | TIPO DE EXAME:".$_POST['cbTipoExame']." | NOME DO CANDIDATO:".$_POST['txtNomeCandidato']." | INSTRUMENTO:".$_POST['txtInstrumento']." | NOME ANCIAO:".$_POST['txtNomeAnciao']." | NOME COOPERA:".$_POST['txtNomeCoopera']." | NOME ENC.:".$_POST['txtNomeEncarregado'].";\r\n";

//Gravando dados em Arquivo txt
//$fp = fopen("exame_araras_2019.txt", "a");

//$escreve = fwrite($fp, $dados);

// Fecha o arquivo
//fclose($fp); 


$pdf = new PDF('P','mm','A4'); //CRIA UM NOVO ARQUIVO PDF NO TAMANHO A4  
$pdf->AddFont('Calibri','','calibri.php');
$pdf->AddPage(); // ADICIONA UMA PAGINA  
$pdf->AliasNbPages(); // SELECIONA O NUMERO TOTAL DE PAGINAS, USADO NO RODAPE  
$pdf->SetFont('Arial','',8);  
$y = 59; // AQUI EU COLOCO O Y INICIAL DOS DADOS   

$pdf->Output('Carta_'.$_POST['txtNomeCandidato'].'.pdf','D'); // IMPRIME O PDF NA TELA  //

//header("Content-type: application/pdf");
//header("Content-disposition: attachment;filename=".'Carta_'.$_POST['txtNomeCandidato'].'.pdf');



//readfile('Carta_'.$_POST['txtNomeCandidato'].'.pdf');

?>