<?php
function BuscaFilial($Cod){
	$xconexao = mysql_connect("localhost", "admin", "mu125030");
	$RSS = mysql_query("select ds_filial from filial where cd_filial = '".$Cod."' limit 1 ", $xconexao);
	$RS = mysql_fetch_assoc($RSS);
	return strtoupper($RS["ds_filial"]);

}
function BuscaCargo($Cod){
	$xconexao = mysql_connect("localhost", "admin", "mu125030");
	$RSS = mysql_query("select ds_cargo from cargos where cd_cargo = '".$Cod."' limit 1 ", $xconexao);
	$RS = mysql_fetch_assoc($RSS);
	return strtoupper($RS["ds_cargo"]);

}
function BuscaGrupo($Cod){
	$xconexao = mysql_connect("localhost", "admin", "mu125030");
	$RSS = mysql_query("select ds_grupo from grupos where cd_grupo = '".$Cod."' limit 1 ", $xconexao);
	$RS = mysql_fetch_assoc($RSS);
	return strtoupper($RS["ds_grupo"]);

}

function BuscaGrupoUser($Cod){
	$xconexao = mysql_connect("localhost", "admin", "mu125030");
	$RSS = mysql_query("select cd_grupo from usuarios where cd_codigo = '".$Cod."' limit 1 ", $xconexao);
	$RS = mysql_fetch_assoc($RSS);
	return BuscaGrupo($RS["cd_grupo"]);

}

function BuscaSupervisor($Cod){
	 $xconexao = mysql_connect("localhost", "admin", "mu125030");
	 $RSS = mysql_query("select ds_usuario from usuarios where cd_codigo = '".$Cod."' and cd_perfil = 3 limit 1 ", $xconexao);
	 $RS = mysql_fetch_assoc($RSS);
	 return $RS["ds_usuario"];
}

function BuscaDSSupervisor($Cod){
	 $xconexao = mysql_connect("localhost", "admin", "mu125030");
	 $RSS = mysql_query("select ds_usuario from usuarios where cd_codigo = '".$Cod."' and cd_perfil = 3 limit 1 ", $xconexao);
	 $RS = mysql_fetch_assoc($RSS);
	 return $RS["ds_usuario"];
}

function BuscaCampanha($Cod){
	$xconexao = mysql_connect("localhost", "admin", "mu125030");
	$RSS = mysql_query("select ds_campanha from campanhas where cd_campanha = '".$Cod."' limit 1 ", $xconexao);
	$RS = mysql_fetch_assoc($RSS);
	return strtoupper($RS["ds_campanha"]);

}
function BuscaNCidade($Cod){
	$xconexao = mysql_connect("localhost", "admin", "mu125030");
	$RSS = mysql_query("select ds_cidade from cidades where cd_cidade = '".$Cod."' limit 1", $xconexao);
	$RS = mysql_fetch_assoc($RSS);
	return strtoupper(removerCaracter($RS["ds_cidade"]));
}

function BuscaNUf($Cod){
	$xconexao = mysql_connect("localhost", "campanha_verao", "mmmu125030");
	$RSS = mysql_query("select ds_uf from cidades where cd_cidade = '".$Cod."' limit 1 ", $xconexao);
	$RS = mysql_fetch_assoc($RSS);
	return strtoupper($RS["ds_uf"]);
}

function BuscaUsuario($Cod){
	$xconexao = mysql_connect("localhost", "admin", "mu125030");
	$SQL = "select ds_usuario from usuarios where cd_codigo = '".$Cod."' limit 1 ";
	$RSS = mysql_query($SQL, $xconexao);
	$RS = mysql_fetch_assoc($RSS);

	switch($Cod){
		case '8030':
			return 'TONINHO';
		break;
		case '8040':
			return 'LORO';
		break;
		default:
			return strtoupper($RS["ds_usuario"]);
		break;
	}

}

function BuscaRca($Cod){
	$xconexao = mysql_connect("localhost", "admin", "mu125030");
	$RSS = mysql_query("select ds_usuario from usuarios where cd_codigo = '".$Cod."' and cd_perfil = 4 limit 1 ", $xconexao);
	$RS = mysql_fetch_assoc($RSS);
	return strtoupper($RS["ds_usuario"]);
}

function BuscaSuper($Cod){
	$xconexao = mysql_connect("localhost", "admin", "mu125030");
	$RSS = mysql_query("select ds_usuario from usuarios where cd_codigo = '".$Cod."' and cd_perfil = 3 limit 1 ", $xconexao);
	$RS = mysql_fetch_assoc($RSS);
	return strtoupper($RS["ds_usuario"]);
}

function BuscaGerente($Cod){
	$xconexao = mysql_connect("localhost", "admin", "mu125030");
	$RSS = mysql_query("select ds_usuario from usuarios where cd_perfil = 2 and cd_codigo = '".$Cod."' limit 1 ", $xconexao);
	$RS = mysql_fetch_assoc($RSS);
	return strtoupper($RS["ds_usuario"]);
}

function BuscaConsultor($Cod){
	$xconexao = mysql_connect("localhost", "admin", "mu125030");
	$RSS = mysql_query("select ds_usuario from usuarios where cd_cargo = 7 and cd_usuario = '".$Cod."' limit 1 ", $xconexao);
	$RS = mysql_fetch_assoc($RSS);
	return strtoupper($RS["ds_usuario"]);
}

function BuscaClifor($Cod){
	$xconexao = mysql_connect("localhost", "admin", "mu125030");
	$RSS = mysql_query("select ds_razao from clifor where cd_fornecedor = '".$Cod."' limit 1 ", $xconexao);
	$RS = mysql_fetch_assoc($RSS);
	return strtoupper($RS["ds_razao"]);
}

function BuscaCPFClifor($Cod){
	$xconexao = mysql_connect("localhost", "admin", "mu125030");
	$RSS = mysql_query("select ds_cnpjcpf from clifor where cd_clifor = '".$Cod."' limit 1 ", $xconexao);
	$RS = mysql_fetch_assoc($RSS);
	return $RS["ds_cnpjcpf"];
}

function BuscaCliforcpfcnpj($Cod){
	$xconexao = mysql_connect("localhost", "admin", "mu125030");
	$RSS = mysql_query("select ds_fantasia from clifor where ds_cnpjcpf = '".$Cod."' limit 1 ", $xconexao);
	$RS = mysql_fetch_assoc($RSS);
	return strtoupper($RS["ds_fantasia"]);
	
}

function BuscaTreinamento($Cod){
	$xconexao = mysql_connect("localhost", "admin", "mu125030");
	$RSS = mysql_query("select ds_treinamento from t_treinamento where cd_treinamento = '".$Cod."' limit 1 ", $xconexao);
	$RS = mysql_fetch_assoc($RSS);
	return strtoupper($RS["ds_treinamento"]);
	
}	

function contarDiasUteis($data_inicio, $data_fim) {
    $dias_uteis = 0;

    // Converte as datas para objetos DateTime
    $inicio = new DateTime($data_inicio);
    $fim = new DateTime($data_fim);

    // Adiciona um dia à data final para que o loop inclua o último dia
    $fim->modify('+1 day');

    // Itera sobre os dias entre a data inicial e a data final
    while ($inicio < $fim) {
        // Verifica se o dia da semana é um dia útil (segunda a sexta-feira)
        if ($inicio->format('N') < 6) {
            $dias_uteis++;
        }
        // Avança para o próximo dia
        $inicio->modify('+1 day');
    }

    return $dias_uteis;
}

?>
