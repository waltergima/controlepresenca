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
				r.codigo = ".$_GET["lista"] ." order by participantecargodescricao,participantecidadenome, participantenome ASC";
	
	 $sql;
	 $result = $conn->query($sql);


	$pdf= new FPDF("L","pt","A4");
	$pdf->AddPage();
	
	$pdf->SetFont('arial','B', 10);
	$pdf->Cell(0,5,"RELATORIO PRESENCA - $reuniaoDescricao  - $reuniaoCidade  - $reuniaoData",0,1,'C');
	$pdf->Cell(0,5,"","B",1,'C');
	$pdf->Ln(30);
	
	//cabeçalho da tabela 
	$pdf->SetFont('arial','B', 7);
	$pdf->Cell(250,20,'Nomes',1,0,"C");
	
	$pdf->Cell(300,20,'Ministerio/Cargo',1,0,"C");
	$pdf->Cell(150,20,'Cidade',1,0,"C");
	//$pdf->Cell(50,20,'Ausente',1,0,"C");
	$pdf->Cell(50,20,'Presente',1,0,"C");
	$pdf->Cell(50,20,'Entrada',1,1,"C");
	
	//linhas da tabela
	$pdf->SetFont('arial','',5);
	
	while($row = $result->fetch_assoc()) {

	    $pdf->Cell(250,12, strtoupper(substr($row["participantenome"], 0, 70)),1,0,"L");
		$pdf->Cell(300,12, strtoupper(substr($row["participantecargodescricao"], 0, 70)),1,0,"C");
		$pdf->Cell(150,12, strtoupper(substr($row["participantecidadenome"], 0, 26)),1,0,"C");
		
		if ($row["presenca"] == "1") {
			//$pdf->Cell(50,12,' ',1,0,"C");
			$pdf->Cell(50,12,'X',1,0,"C");
			$pdf->Cell(50,12,$row["hora"],1,1,"C");
		}
		else 
		{
			//$pdf->Cell(50,12,'X',1,0,"C");
			$pdf->Cell(50,12,' ',1,0,"C");
			$pdf->Cell(50,12,' ',1,1,"C");
		}
	}

	 //echo $sql;--AND rp.presenca is null

	$sql2 = "SELECT participantecargodescricao, SUM(TOTAL)TOTAL, SUM(PRESENCA) PRESENCA, FORMAT(COALESCE((SUM(PRESENCA)/SUM(TOTAL)) * 100, 0), 2) PERCENTAGEM_PRESENCA  from (
			SELECT rp.participantenome,  SPLIT_STR(rp.participantecargodescricao, ',', 1) participantecargodescricao, 1 as TOTAL,
			 0 presenca  
				 from reuniao r inner join reuniaoparticipantes rp on r.codigo = rp.reuniaocodigo 
			where rp.convocado = 1 AND r.codigo = ".$_GET["lista"] ." 		
		UNION ALL
			
			SELECT rp.participantenome,  SPLIT_STR(rp.participantecargodescricao, ',', 1) participantecargodescricao, 0 as TOTAL, 1 as presenca 
					from reuniao r inner join reuniaoparticipantes rp on r.codigo = rp.reuniaocodigo 
				where r.codigo = ".$_GET["lista"] ." and rp.presenca = 1
		) AS total group by participantecargodescricao";
		
		
	$result2 = $conn->query($sql2);

	

	$pdf->Ln(30);
	$pdf->SetFont('arial','B', 7);
	$pdf->Cell(250,20,'MINISTERIO/CARGOS',1,0,"C");
	$pdf->Cell(60,20,'CONVOCADOS',1,0,"C");
	$pdf->Cell(60,20,'PRESENTES',1,0,"C");
	$pdf->MultiCell(120,20,'PERCENTAGEM_PRESENTES', 1, 'L', false);

	$totalConvodados = 0;
	$totalPresentes = 0;
	$totalPercentagem = 0;
	$pdf->SetFont('arial','', 6);
	$row2 = $result2->fetch_assoc();
	 while($row2 = $result2->fetch_assoc()) {

		$totalConvodados += $row2["TOTAL"];
		$totalPresentes += $row2["PRESENCA"];
			
	     $pdf->Cell(250,20, strtoupper(substr($row2["participantecargodescricao"], 0, 70)),1,0,"L");
		 $pdf->Cell(60,20, strtoupper(substr($row2["TOTAL"], 0, 70)),1,0,"C");
		 $pdf->Cell(60,20, strtoupper(substr($row2["PRESENCA"], 0, 26)),1,0,"C");
		 $pdf->MultiCell(120,20, $row2["PERCENTAGEM_PRESENCA"]." %", 1, 'R', false);
	 }

	if ($totalConvodados > 0) 
	{ 
		$totalPercentagem = ($totalPresentes/$totalConvodados) * 100;
	} 
	$pdf->SetFont('arial','B', 7);
	$pdf->Cell(250,20, strtoupper('TOTAL'),1,0,"L");
	$pdf->Cell(60,20, $totalConvodados,1,0,"C");
	$pdf->Cell(60,20, $totalPresentes,1,0,"C");
	$pdf->MultiCell(120,20, number_format($totalPercentagem,2). " %" , 1, 'R', false);



	$pdf->Output("lista_presenca.pdf","F");
} 
else 
{
	echo "Lista não encontrada!";
 }
?>