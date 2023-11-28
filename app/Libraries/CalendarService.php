<?php 

namespace App\Libraries;

use CodeIgniter\I18n\Time;
use InvalidArgumentException;

class CalendarService 
{
    /** @var array meses  */
    private static array $months = [
        1 => 'Janeiro',
        2 => 'Fevereiro',
        3 => 'Marçoi',
        4 => 'Abril',
        5 => 'Maio',
        6 => 'Junho',
        7 => 'Julho',
        8 => 'Agosto',
        9 => 'Setembro',
        10 => 'Outubro',
        11 => 'Novembro',
        12 => 'Dezembro',
    ];

    /**
     * Renderiza um dropdown dos meses para serem escolhidos 
     * 
     *  @return string 
     * */
    public function renderMonths() : string
    {
        $today          = Time::now();
        $currentYear    = $today->getYear();
        $currentMonth   = $today->getMonth();

       /*  $options = [];
        $options[null] = '--- Escolha ---'; */
        $style = '<style>
                ul.demo {
                  list-style-type: none;
                  margin: 0;
                  padding: 0;
                }
                </style>';
        $ul = '<h3>' . $style . '<ul class="demo">';

        foreach(self::$months as $key => $month)
        {       

            if($currentMonth > $key)
            {   
                continue;

            }

            /* $options[$key] = "{$month} / {$currentYear}"; */
            $radio = " <div class='mb-3 form-check'>";
            $radio .= "  <input type='radio' name='months' value='{$month}/{$currentYear}' class='custom-control-input' id='{$key}'> ";
            $radio .= "  <label class='custom-control-label' name'months_label'  for='{$key}'>$month /$currentYear </label>";
            $radio .= "</div>";
           $ul .= "<li class='list-group-item'>{$radio}</li>";
        }
        $ul .= '</ul>'. '</h3>';
        return $ul;

    }

    /**
     * Renderiza os dias para o mês informado para serem escolhidos no front
     * 
     * @param $month
     *  @return string 
     * */
    public function generate(int $month): string
    {
        try{
            $now = Time::now();
            $currentMonth = (int) $now->getMonth();
            $year = (int) $now->getYear();

            if($month < $currentMonth || ! in_array($month, array_keys(self::$months)))
            {

                throw new InvalidArgumentException("o mês {$month} não é um mês válido para gerar o calendário");

            }

            $firstDayObject = $now::create(year: $year, month: $month, day: 1);
            $daysOfMonth = $firstDayObject->format('t');
            
     
            foreach(self::$months as $key => $month_now)
        {       
            
             if($currentMonth == $key)
            {   
                
               $mes = $month_now;

            } 
        } 


           $startDay = (int) $firstDayObject->format('w');
           $calendar = "<h3>Escolha o dia do Mês {$mes} </h3>"; 
           $calendar .= '<div style="overflow-x:auto;">';
           $calendar .= '<table>';
           $calendar .= '<tr>
                            <th>Dom</td>
                            <th>Seg</th>
                            <th>Ter</th>
                            <th>Qua</th>
                            <th>Quin</hd>
                            <th>Sex</th>
                            <th>Sab</th>
                          </tr>  ';


            if($startDay > 0){
                for($i = 0; $i < $startDay; $i++)
                {
                    $calendar .= '<td>&nbsp;</td>';
                }
            }



            for($day = 1; $day <= $daysOfMonth; $day++)
            {
                $btnDay = $this->renderDayButom($day, $month, $this->isWeekend($year, $month, $day));

                $calendar .= "<td>{$btnDay}</td>";
                $startDay++;

                if($startDay == 7)
                {
                    $startDay = 0;
                    if($day < $daysOfMonth)
                    {
                        $calendar .= '<tr>';
                    }
                }
            }



            if($startDay > 0)
            {
                for($i = $startDay; $i < 7; $i++)
                {
                    $calendar .= '<td>&nbsp;</td>';
                }
                $calendar .= '</tr>';
            }

            $calendar .= '</table> </div>';

            return $calendar;

        }catch(\Throwable $th) {
            log_message('error', '[ERROR] {exception}', ['exception' => $th]);
            return "Não foi possivel gerar o calendário para o dia informado";
        }

    }

      /**
     * Verificar se a data informada é um final de semana 
     * 
     * @param $year
     * @param $month
     * @param $day
     *  @return bool 
     * */
    private function isWeekend(int $year, int $month, int $day): bool
    {
        $timeCreated = Time::create($year, $month, $day);
        $dayOfWeek = (int) $timeCreated->format('w'); // formata em minúsculo

        
        // 0 = domingo
        // 6 = Sábado
        return ($dayOfWeek === 0 || $dayOfWeek == 6 );
    }


     /**
     * Renderiza o botão HTML para clicke no front end
     * 
     * @param $isweeked
     * @param $month
     * @param $day
     *  @return string 
     * */
    public function renderDayButom(int $day, int $month, bool $isweekend = false): string
    {

        $attr = [
            'type' => 'button', 
            'class' => 'btn',
            'name' => 'button-day',
            'id' => 'btn-day'
        ];


        $now = Time::now();
        $currentDay = (int) $now->getDay();
        $currentMonth = (int) $now->getMonth();

        //se o dia for menor que o dia atual e o mês for igual ao mês atual OU a semana atual for true 
        // então desabilitaremos o botão
        if($day < $currentDay && $month == $currentMonth || $isweekend )
        {
            $attr['disabled'] = true ;
            $attr['class'] = "chosenDay btn-disabled" ;
        }else{

            $attr['class'] = "chosenDay {$attr['class']}" ;

        }

        return form_button($attr, "{$day}");
    }  

}