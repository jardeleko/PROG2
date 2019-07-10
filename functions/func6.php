<?php

$hierarquia = array(
	array(
	'nome_cargo' => 'CEO',
	//inicio diretor
	'subordinados' => array(
		array(
			'nome_cargo' => 'Diretor Comercial',
			'subordinados' => array( 
			
			array(
				'nome_cargo' => 'Gerente de Vendas'
				)
		 	//termino Gerente de Vendas
			)
		//termino do Diretor Comercial
		),

		//termino do comercial ;

		//Inicio do financeiro
		array(
			'nome_cargo' => 'Diretor Financeiro',
			'subordinados' => array( 
				//inicio do Gerente de Contas
				array(
					'nome_cargo' => 'Gerente de Contas',
					'subordinados' => array(
					//inicio do supervisor
						array('nome_cargo' => 'Supervisor de Contas a pagar'
					
						)
						//termino supervisor
						)

					),//termino gerente de Contas
					array(
						'nome_cargo' => 'Gerente de Compras',
						'subordinados' => array(

						array('nome_cargo' =>'Supervisor de Suprimentos')
						//termino supervisor de suprimentos	
						)

					) 
					//termino Gerente de compras

				)
			)
			//termino Diretor Financeiro
		)
		//termino CEO
		
	)	
);

function exibe($cargos){

	$html = '<ul>';
		foreach ($cargos as $cargo) {
			$html.= "<li>";
			$html.= $cargo['nome_cargo'];
			$html.= "</li>";

			if(isset($cargo['subordinados']) && count($cargo['subordinados'])> 0){
				$html.= exibe($cargo['subordinados']);
			}
		}

	$html .= "</ul>";

	return $html;
}

echo exibe($hierarquia);
?>