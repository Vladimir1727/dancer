<?php $this->load->view('header');?>
<h1>Конкурсы</h1>
<table id="main_competition_list">
    <tbody>
<?php
$month = array('Янв','Фев','Мар','Апр','Май','Июн','Июл','Авг','Сен','Окт','Ноя','Дек');
if (isset($list)){
    foreach ($list as $l){
        echo '<tr>';
        if ($l['date_open'] == $l['date_close']){
            echo '<td><div>';
            echo substr($l['date_open'],8,2).' '.$month[substr($l['date_open'],5,2)-1].', ';
            echo substr($l['date_close'],0,4);
            echo '</div></td>';
        } else {
            echo '<td><div>';
            echo substr($l['date_open'],8,2).' '.$month[substr($l['date_open'],5,2)-1].' - ';
            echo substr($l['date_close'],8,2).' '.$month[substr($l['date_open'],5,2)-1].', ';
            echo substr($l['date_close'],0,4);
            echo '</td></div>';
        }
        echo '<td><div>';
        echo '<h3>'.$l['name'].'</h3>';
        echo '<p>г.'.$l['city'].', Организатор: '.$l['first_name'].' '.$l['last_name'].'</p>';
        echo '</td></div>';
        echo '</tr>';
    }
}
?>
    </tbody>
</table>
<?php $this->load->view('footer'); ?>