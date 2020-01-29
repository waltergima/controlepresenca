<?php
header("Content-type: application/pdf");
header("Content-disposition: attachment;filename=".'Carta_'.$_POST['txtNomeCandidato'].'.pdf');
readfile('Carta_oi21.pdf');
?>