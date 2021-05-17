<?php

namespace App\Models;

use Doctrine\DBAL\Schema\AbstractAsset;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicoEspecilidade extends Model
{
    use HasFactory;
    protected $table = 'medico_especialidade';
    protected $fillable = [
        'medico_id',
        'especialidade_id'
    ];

    public function medico(){
        return $this->hasOne(Medico::class, 'id', 'medico_id');
    }

    public function especialidade(){
        return $this->hasOne(Especialidade::class, 'id', 'especialidade_id');
    }

    public function agenda(){
        return $this->hasMany(AgendaMedico::class, 'medico_especialidade_id', 'id');
    }

    public function agendaCosultaMaisProxima(){ //PROCURAR POR CONSULTA MAIS PROXIMA
        $dataAtual = date('Y-m-d H:i:s');
        $dataFimAtual = date('Y-m-d 23:59:59');
        $agendaConsultasExiste = AgendaConsultas::where('agenda_id', $this->id)->where('data_consulta', '>=', $dataAtual)->get();
        //verificar se existe consulta para os proximos periodos
        if (!is_null($agendaConsultasExiste->first())) {
            //verifica se existe consulta na data atual
            $agendaConsultasPeriodo = AgendaConsultas::where('agenda_id', $this->id)->whereBetween('data_consulta', [$dataAtual, $dataFimAtual])->get();
            $i = 1; // INDEXADOR
            while (is_null($agendaConsultasPeriodo->first())) { //CASO NAO EXISTA PROCURA PELA DATA MAIS PROXIMA
                $dataSoma = date('Y-m-d 00:00:00', strtotime('+'.$i.' day')); //DATA A PARTIDA DAS 00:00:00 + 1 dia
                $dataFimSoma = date('Y-m-d 23:59:59', strtotime('+'.$i.' day')); //DATA FINAL 23:59:59 + 1 DIA
                $agendaConsultasPeriodo = AgendaConsultas::where('agenda_id', $this->id)->whereBetween('data_consulta', [$dataSoma, $dataFimSoma])->get();
                $i++;
            }
            return $agendaConsultasPeriodo;
        }
        return null;
    }

    public function converteData($data){
        $data = new \DateTime($data);
        $numero_dia = $data->format('w')*1;
        $dia_mes = $data->format('d')*1;
        $numero_mes = $data->format('m')*1;
        $ano = date('Y');
        $dia = array('Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado');
        $mes = array('', 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');

        echo $dia[$numero_dia] . ", " .$dia_mes . " de " . $mes[$numero_mes] . " de " . $ano . ".";
    }

}
