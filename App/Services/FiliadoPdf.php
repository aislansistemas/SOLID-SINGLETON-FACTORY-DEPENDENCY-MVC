<?php


namespace App\Services;

use DateTimeImmutable;
use Fpdf\Fpdf;

/**
 * Class FiliadoPdf
 *
 * @package App\Services
 * @version 1.0.0 - Versionamento inicial da classe.
 */
class FiliadoPdf extends Fpdf
{
	/**
	 * @var DateTimeImmutable $tData
	 */
	private $tData = new DateTimeImmutable();

	/**
	 * Função que gera pdf da carterinha dofiliado com base no array passado no parâmetro
	 *
	 * @param array $aDados
	 * @return void
	 *
	 * @author Aislan Peixoto aislanpeixoto@moobitech.com.br
	 *
	 * @since 1.0.0 - Definição do versionamento do método.
	 */
	public function geraCarteirinhaFrenteSegundo(array $aDados):void{
		$this->AddPage();
		$this->SetFont('Arial', '', 10);
		$this->SetY(10);
		$this->Image('public\assets\img\base2.jpg',60,30,-231,54.75);
		$this->SetFont('Arial', 'B', 8);
		$this->SetY(32);
		$this->SetX(63);
		$this->setTextColor(255,255,255);
		$this->MultiCell(50, 5,utf8_decode('Sindicato dos Trabalhadores da Universidade Federal de Alagoas'),0,'C', false);
		$this->Image('public\assets\img\quadrado.jpg',63,44,-240,23);
		$this->Image('public\assets\img\sintufal.jpg',130,32,-250,15);
		$this->SetFont('Arial', 'B', 8);
		$this->SetTextColor(255,255,255);
		$this->SetY(45);
		$this->SetX(84);
		$this->Cell(20,5,'Nome: '.$aDados['nome'],0,1);
		$this->SetX(84);
		$this->Cell(20,5,utf8_decode('Matrícula: '.$aDados['id']),0,1);
		$this->SetX(84);
		$this->Cell(30,5,'CPF: 073.920.665-80'.$aDados['cpf'],0,0);
		$this->Cell(20,5,'RG: 036495762 SSP/SE'.$aDados['rg'],0,1);
		$this->SetX(84);
		$this->Cell(20,5,'Data de nasc.: '.$aDados['data_nascimento'],0);
		$this->SetFont('Arial', 'B', 8);
		$this->setTextColor(255,255,255);
		$this->setFillColor(255,0,0);
		$this->SetY(71);
		$this->SetX(60);
		$this->MultiCell(88.11, 7,utf8_decode('Sede Rua Brasil Morel nº240 Maceió-Al, CEP 57020-560 http://sintufal.org.br'),0,'C', true);
		$this->Output();
	}

	/**
	 * Função que gera pdf o verso da carteirinha de filiados
	 *
	 * @return void
	 *
	 * @author Aislan Peixoto aislanpeixoto@moobitech.com.br
	 *
	 * @since 1.0.0 - Definição do versionamento do método.
	 */
	public function geraCarteirinhaVersoPdf():void {
		$this->AddPage();
		$this->SetFont('Arial', '', 9);
		$this->SetY(35);
		$this->SetX(73);
		$this->MultiCell(60, 5,utf8_decode('Este cartão é pessoal e de uso exclusivo dos associados. Deverá apresentá-lo sempre que solicitado.'),0,'J', false);
		$this->SetY(10);
		$this->RoundedRect(70, 34, 67, 20, 2, '1234', 'D');
		$this->RoundedRect(60, 30, 88.11, 54.75, 2, '1234', 'D');
		$this->SetY(62);
		$this->SetX(75);
		$this->Cell(60,5,utf8_decode('Presidente SINTUF/AL'),'T',1,'C');
		$this->Image('public\assets\img\barra.jpg', 82, 70, -231);
		$this->Output();
	}

	/**
	 * Função que gera pdf da frente da carteirinha do filiado com base no parâmetro passado
	 *
	 * @param array $aDados
	 * @return void
	 *
	 * @author Aislan Peixoto aislanpeixoto@moobitech.com.br
	 *
	 * @since 1.0.0 - Definição do versionamento do método.
	 */
	public function geraCarteirinhaFrentePrimeiro(array $aDados):void {
		$this->AddPage();
		$this->SetFont('Arial', '', 10);
		$this->SetY(10);
		$this->Image('public\assets\img\frente.jpg',62,32,-230);
		$this->RoundedRect(60, 30, 88.11, 54.75, 2, '1234', 'D');
		$this->SetMargins( 40, 40, 40, 40 );
		$this->Rect(125,33,19,22,'D');
		$this->SetY(50);
		$this->SetX(63);
		$this->SetFont('Arial', 'B', 11);
		$this->Cell(20,10,'CARTEIRA DO FILIADO');
		$this->Image('public\assets\img\base.jpg',60,60,-231);
		$this->SetFont('Arial', 'B', 9);
		$this->SetTextColor(255,255,255);
		$this->SetY(65);
		$this->SetX(63);
		$this->Cell(20,6,'Nome: '.$aDados['nome'],0,1);
		$this->SetX(63);
		$this->Cell(20,6,utf8_decode('Matrícula: '.$aDados['id']),0,1);
		$this->SetX(63);
		$this->Cell(40,6,'CPF: '.$aDados['cpf'],0,0);
		$this->Cell(20,6,'RG: '.$aDados['rg'],0,1);
		$this->Output();
	}

	/**
	 * Função que gera relatorio dos filiados em pdf
	 *
	 * @param array $aDados
	 * @return void
	 *
	 * @author Aislan Peixoto aislanpeixoto@moobitech.com.br
	 *
	 * @since 1.0.0 - Definição do versionamento do método.
	 */
	public function geraRelatorioFiliados(array $aDados):void {
		$this->AddPage();
		$this->SetFont('Arial', '', 10);
		$this->SetY(10);
		$this->SetX(150);
		$this->Cell(40, 5, 'Data : ' . $this->tData->format('d/m/Y'), 0, 1);
		$this->SetX(150);
		$this->Cell(40, 5, utf8_decode('Usuário : Administrador'), 0, 1);
		$this->Image('C:\xampp\htdocs\trainee.aislan\modulo_4\fpdf_2\public\assets\img\logo.png', 10, 10, -380);
		$this->SetY(22);
		$this->SetX(150);
		$this->Cell(42, 8, 'Quantidade de registros:', 0);
		$this->Cell(10, 8, $this->oFiliado->getTotalFiliados()['totalFiliados']);
		$this->Ln(8);
		$this->SetFont('Arial', 'B', 12);
		$this->Cell(190, 8, 'NOME DO FILIADO', 1, 1);
		$this->SetFont('Arial', '', 10);
		foreach ($aDados as $key => $aValores) {
			$this->Cell(190, 6, ucfirst($aValores['nome']), 1);
			$this->Ln();
		}
		$this->Output();
	}

	/**
	 * Função que gera ficha de filiados em pdf
	 *
	 * @return void
	 *
	 * @author Aislan Peixoto aislanpeixoto@moobitech.com.br
	 *
	 * @since 1.0.0 - Definição do versionamento do método.
	 */
	public function geraFichaPdf():void {
		$this->AddPage();
		$this->SetMargins( 10, 10, 10, 10 );
		$this->SetFont('Times','B',11);
		$this->Image('public\assets\img\logo.png',10,10,-380);
		$this->SetX(30);
		$sTitulo = "Sindicato dos Trabalhadores na Movimentação de Mercadorias em Geral do Estado do";
		$sTitulo .= "Maranhão Fundado em 17 de fevereiro de 1994 - Reconhecido pelo Ministério do Trabalho em";
		$sTitulo .= "18 de Abril de 1994. Rua Coronel Eurípedes Bezerra, nº15. Bairro: Turu, São Luís- MA. CEP";
		$sTitulo .= "65066 - 260. Fone: (98) 3089 - 5625 / 3089 - 5627 / 3084 - 1579 / E - mail: ssintrama@hotmail.com";
		$this->MultiCell(170, 5,utf8_decode($sTitulo),0,'J', false);
		$this->Ln(10);
		$this->SetFont('Times','BI',14);
		$this->SetAutoPageBreak(true,15);
		$this->MultiCell(190, 5,utf8_decode('Ficha de Filiado do contribuinte do Sindicato dos Trabalhadores na Movimentação de Mercadorias em Geral do Estado do Maranhão.')
			,0,'C', false);
		$this->Ln();
		$this->SetFont('Arial','B',8);
		$this->Cell(130,7,'Nome:',1);
		$this->Cell(60,7,utf8_decode('Matrícula:'),1,1);
		$this->Cell(95,7,utf8_decode('Filiação (Pai):'),1);
		$this->Cell(95,7,utf8_decode('Filiação (Mãe):'),1,1);
		$this->Cell(50,7,utf8_decode('Estado civil :'),1);
		$this->Cell(45,7,utf8_decode('Data Nasc.  ___/___/___'),1);
		$this->Cell(50,7,utf8_decode('Natural de:'),1);
		$this->Cell(45,7,utf8_decode('Estado:'),1,1);
		$this->Cell(35,7,utf8_decode('CPTS:'),1);
		$this->Cell(30,7,utf8_decode('Série:'),1);
		$this->Cell(40,7,utf8_decode('RG nº '),1);
		$this->Cell(40,7,utf8_decode('CPF nº'),1);
		$this->Cell(45,7,utf8_decode('Telefone:'),1,1);
		$this->Cell(100,7,utf8_decode('Endereço'),1);
		$this->Cell(25,7,utf8_decode('N.º '),1);
		$this->Cell(65,7,utf8_decode('Bairro'),1,1);
		$this->Cell(35,7,utf8_decode('CEP:'),1);
		$this->Cell(60,7,utf8_decode('Cidade:'),1);
		$this->Cell(40,7,utf8_decode('Estado:'),1);
		$this->Cell(55,7,utf8_decode('Escolaridade'),1,1);
		$this->Cell(190,7,utf8_decode('Empresa onde trabalha:'),1,1);
		$this->Cell(100,7,utf8_decode('Endereço:'),1);
		$this->Cell(25,7,utf8_decode('N.º'),1);
		$this->Cell(65,7,utf8_decode('Bairro:'),1,1);
		$this->Cell(35,7,utf8_decode('CEP:'),1);
		$this->Cell(60,7,utf8_decode('Cidade:'),1);
		$this->Cell(40,7,utf8_decode('Estado:'),1);
		$this->Cell(55,7,utf8_decode('Telefone:'),1,1);
		$this->Cell(90,7,utf8_decode('Ramo de atividades:'),1);
		$this->Cell(55,7,utf8_decode('Profissão:'),1);
		$this->Cell(45,7,utf8_decode('Data admissão ___/___/___'),1);
		$this->Ln();
		$this->SetFont('Arial','BI',12);
		$this->Cell(55,8,utf8_decode('Dependentes'));
		$this->Ln();
		$this->SetFont('Arial','B',8);
		$this->Cell(145,7,utf8_decode('Cônjugue:'),1);
		$this->Cell(45,7,utf8_decode('Data Nasc. ___/___/___'),1);
		$this->Ln();
		$this->SetFont('Arial','B',10);
		$this->Cell(190,7,utf8_decode('FILHOS MENORES DE 18 ANOS'),1,0,'C');
		$this->Ln();
		$this->SetFont('Arial','B',8);
		$this->Cell(145,7,utf8_decode('Filho (a):'),1);
		$this->Cell(45,7,utf8_decode('Data Nasc. ___/___/___'),1,1);
		$this->Cell(145,7,utf8_decode('Filho (a):'),1);
		$this->Cell(45,7,utf8_decode('Data Nasc. ___/___/___'),1,1);
		$this->Cell(145,7,utf8_decode('Filho (a):'),1);
		$this->Cell(45,7,utf8_decode('Data Nasc. ___/___/___'),1,1);
		$this->Ln();
		$this->SetFont('Times','B',10);
		$sTextoInformativo = "AUTORIZAÇÃO PARA CONSIGNAÇÃO EM MEU CONTRACHEQUE/HOLERITE - Solicito,";
		$sTextoInformativo .= "minha inscrição como filiado ao Sindicato dos Trabalhadores na Movimentação de Mercadoria em Geral do ";
		$sTextoInformativo .= "Estado do Maranhão, bem como o Setor competente da Empresa Empregadora a consignar em meu";
		$sTextoInformativo .= "contracheque/holerite, o valor correspondente a 1% (um por Cento)da Contribuição Assistencial Laborale 1% (um por Cento) da Contribuição Confederativa calculados sob minha renda bruta. Valores que";
		$sTextoInformativo .= "deverá ser descontado na rubrica própria do Sindicato e creditado à sua conta";
		$sTextoInformativo .= "AG - 0027 OP - 003 - CONTA - 2095 - 0, CaixaE conômica Federal.";
		$sTextoInformativo .= "Fica ainda, o Sindicato autorizado a representar - me como substituto processual em quaisquer ações ou processos, na esfera administrativa ou judicial que envolva";
		$sTextoInformativo .= "meus direitos coletivos ou individuais, nos termos do Estatuto da Entidade e Norma vigente.";
		$this->MultiCell(190, 5,utf8_decode( $sTextoInformativo
		),0,'J', false);
		$this->Ln();
		$this->MultiCell(190, 5,utf8_decode( 'DECLARAÇÃO: Declaro para todos os fins de direito que todas as informações aqui prestadas são a expressão da verdade.'
		),0,'J', false);
		$this->Ln();
		$this->Cell(190,5,'Nestes Termos,',0,1);
		$this->Cell(120,15,'Pede Deferimento',0);
		$this->Cell(40,15,utf8_decode('São Luis - MA, ______/_______/______.'),0,1);
		$this->Ln(15);
		$this->Cell(140,5,'Assinatura do Filiado',0);
		$this->Cell(40,5,'Assinatura do Presidente',0);

		$this->Output('Relatorio-de-filiados.pdf','I');
	}

	/**
	 * Função que gera um retangulo arredondado
	 *
	 * @param $x
	 * @param $y
	 * @param $w
	 * @param $h
	 * @param $r
	 * @param string $corners
	 * @param string $style
	 * @return void
	 *
	 * @author Aislan Peixoto aislanpeixoto@moobitech.com.br
	 *
	 * @since 1.0.0 - Definição do versionamento do método.
	 */
	private function RoundedRect($x, $y, $w, $h, $r, $corners = '1234', $style = '')
	{
		$k = $this->k;
		$hp = $this->h;
		if($style=='F')
			$op='f';
		elseif($style=='FD' || $style=='DF')
			$op='B';
		else
			$op='S';
		$MyArc = 4/3 * (sqrt(2) - 1);
		$this->_out(sprintf('%.2F %.2F m',($x+$r)*$k,($hp-$y)*$k ));

		$xc = $x+$w-$r;
		$yc = $y+$r;
		$this->_out(sprintf('%.2F %.2F l', $xc*$k,($hp-$y)*$k ));
		if (strpos($corners, '2')===false)
			$this->_out(sprintf('%.2F %.2F l', ($x+$w)*$k,($hp-$y)*$k ));
		else
			$this->_Arc($xc + $r*$MyArc, $yc - $r, $xc + $r, $yc - $r*$MyArc, $xc + $r, $yc);

		$xc = $x+$w-$r;
		$yc = $y+$h-$r;
		$this->_out(sprintf('%.2F %.2F l',($x+$w)*$k,($hp-$yc)*$k));
		if (strpos($corners, '3')===false)
			$this->_out(sprintf('%.2F %.2F l',($x+$w)*$k,($hp-($y+$h))*$k));
		else
			$this->_Arc($xc + $r, $yc + $r*$MyArc, $xc + $r*$MyArc, $yc + $r, $xc, $yc + $r);

		$xc = $x+$r;
		$yc = $y+$h-$r;
		$this->_out(sprintf('%.2F %.2F l',$xc*$k,($hp-($y+$h))*$k));
		if (strpos($corners, '4')===false)
			$this->_out(sprintf('%.2F %.2F l',($x)*$k,($hp-($y+$h))*$k));
		else
			$this->_Arc($xc - $r*$MyArc, $yc + $r, $xc - $r, $yc + $r*$MyArc, $xc - $r, $yc);

		$xc = $x+$r ;
		$yc = $y+$r;
		$this->_out(sprintf('%.2F %.2F l',($x)*$k,($hp-$yc)*$k ));
		if (strpos($corners, '1')===false)
		{
			$this->_out(sprintf('%.2F %.2F l',($x)*$k,($hp-$y)*$k ));
			$this->_out(sprintf('%.2F %.2F l',($x+$r)*$k,($hp-$y)*$k ));
		}
		else
			$this->_Arc($xc - $r, $yc - $r*$MyArc, $xc - $r*$MyArc, $yc - $r, $xc, $yc - $r);
		$this->_out($op);
	}

	/**
	 * Função que ajusta medidas do retangulo gerado pela função RoundedRect com base em calculos
	 *
	 * @param $x1
	 * @param $y1
	 * @param $x2
	 * @param $y2
	 * @param $x3
	 * @param $y3
	 * @return void
	 *
	 * @author Aislan Peixoto aislanpeixoto@moobitech.com.br
	 *
	 * @since 1.0.0 - Definição do versionamento do método.
	 */
	private function _Arc($x1, $y1, $x2, $y2, $x3, $y3)
	{
		$h = $this->h;
		$this->_out(sprintf('%.2F %.2F %.2F %.2F %.2F %.2F c ', $x1*$this->k, ($h-$y1)*$this->k,
			$x2*$this->k, ($h-$y2)*$this->k, $x3*$this->k, ($h-$y3)*$this->k));
	}

}