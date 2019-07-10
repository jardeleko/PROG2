<?php
function hour(){
  if(date("H")< 12){
    return "Bom dia";
  }
  elseif (date("H")>12 && date("<19")) {
    return "Boa tarde";
  }
  else{
    return "Boa noite";
  }
}
function  semana(){
  switch (date("w")) {
    case '1':
      return "Segunda-feira";
      break;
    case '2':
      return "Terça-feira";
    case '3':
      return "Quarta-feira";
    case '4':
      return "Quinta-feira";
    case '5':
      return "Sexta-feira";
      break;
    case '6':
      return "Sábado";
    case '7':
      return "Domingo";
    default:
      return "Dia invalido";
      break;
  }
}

$hr= hour();
$week= semana();


echo $hr, ", Hoje é dia", date("d/m/Y"), " ", $week;
?>
