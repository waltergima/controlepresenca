<?php
require_once("fpdf/fpdf.php");	
include("conection.inc.php");//import


if (isset($_GET["lista"])) 
{

	$sql = "SELECT
				r.descricao, r.data, r.horainicio, r.igrejadescricaoreuniao
				from 
					reuniao r where r.codigo = ".$_GET["lista"];

	$result = $conn->query($sql);
		
	$row = $result->fetch_assoc();
	$reuniaoDescricao = $row["descricao"];
	$reuniaoData =  date("d/m/Y", strtotime($row["data"])) ;
	$reuniaoHora = $row["data"];
	$reuniaoCidade = $row["igrejadescricaoreuniao"];
	
	
	$sql = "SELECT
				r.descricao, rp.participantenome, rp.participantecargodescricao, rp.participantecidadenome, rp.presenca,  TIME_FORMAT(rp.horachegada, '%T') hora
				from 
					reuniao r inner join reuniaoparticipantes rp on r.codigo = rp.reuniaocodigo
				where 
				rp.presenca = 1 AND
				r.codigo = ".$_GET["lista"] ." order by participantecargodescricao, participantecidadenome, participantenome ASC";

	//echo $sql;
	$result = $conn->query($sql);
	

	$pdf= new FPDF("L","pt","A4");
	$pdf->AddPage();
	
	$pdf->SetFont('arial','B',7);
	$pdf->Cell(0,5,"RELATORIO PRESENCA - $reuniaoDescricao  - $reuniaoCidade  - $reuniaoData",0,1,'C');
	$pdf->Cell(0,5,"","B",1,'C');
	$pdf->Ln(30);
	
	//cabeçalho da tabela 
	$pdf->SetFont('arial','B',7);
	$pdf->Cell(300,20,'Nomes',1,0,"C");
	
	$pdf->Cell(150,20,'Ministerio/Cargo',1,0,"C");
	$pdf->Cell(150,20,'Cidade',1,0,"C");
	$pdf->Cell(50,20,'Presente',1,0,"C");
	$pdf->Cell(50,20,'Ausente',1,0,"C");
	$pdf->Cell(50,20,'Entrada',1,1,"C");
	
	//linhas da tabela
	$pdf->SetFont('arial','',7);
	
	while($row = $result->fetch_assoc()) {
	    $pdf->Cell(300,18, strtoupper(substr($row["participantenome"], 0, 26)),1,0,"L");
		$pdf->Cell(150,18, strtoupper(substr($row["participantecargodescricao"], 0, 26)),1,0,"C");
		$pdf->Cell(150,18, strtoupper(substr($row["participantecidadenome"], 0, 26)),1,0,"C");
		
		if ($row["presenca"] == "1") {
			$pdf->Cell(50,18,'X',1,0,"C");
			$pdf->Cell(50,18,' ',1,0,"C");
			$pdf->Cell(50,18,$row["hora"],1,1,"C");
		}
		else 
		{
			$pdf->Cell(50,18,' ',1,0,"C");
			$pdf->Cell(50,18,'X',1,0,"C");
			$pdf->Cell(50,18,$row["hora"],1,1,"C");
		}
	}
	
	$pdf->Output("lista_presenca.pdf","D");
	

} 
else 
{
	echo "Lista não encontrada!";
 }
?>