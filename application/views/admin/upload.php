<?php $this->load->view('header');
$this->load->helper('form');
include_once 'menu.php';?>
<h1 class="h3">Номера участников соревнования</h1>
<input type="hidden" value="<?php echo $comp_id;?>" id="comp_id">
<button class="btn btn-warning" id="upload">Загрузить таблицу результатов</button>
<a href="<?php echo base_url().$file; ?>" class="btn btn-info">Получить CSV</a>
<input type="file" name="userfile" id="file" class="hidden"/>

<p class="alert alert-success" id="success">Всё загрузилось упешно</p>
<table class="table table-striped table-condensed" id="main_table">
    <caption  class="alert alert-danger">Не удалось загрузить</caption>
    <tbody>
        
    </tbody>
    <thead>
        <tr>
            <th>Имя</th>
            <th>Город</th>
            <th>Клуб</th>
            <th>Тренер</th>
            <th>Год рождения</th>
            <th>Возраст</th>
            <th>Танец</th>
            <th>Кат.кол.</th>
            <th>Лига</th>
            <th>Место</th>
        </tr>
    </thead>
</table>

<script src="<?php echo base_url(); ?>/js/admin/upload.js"></script>
<?php $this->load->view('footer'); ?>