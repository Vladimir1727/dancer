<?php $this->load->view('header');?>
<?php include_once 'menu.php';?>
<h1 class="h3">Ежегодная оплата</h1>

<div class="btn-group">
    <button class="btn btn-default" id="all_but">Все</button>
    <button class="btn btn-default" id="yes_but">Оплачен</button>
    <button class="btn btn-default" id="no_but">Нет оплаты</button>
    <button class="btn btn-success" id="save_but">Сохранить</button>
</div>
<form id="pay_form">
    <table class="table table-striped table-condensed" id="main_table">
        <tbody>
            <?php echo $list; ?>
        </tbody>
        <thead>
            <tr>
                <th>Имя</th>
                <th>Контакт</th>
                <th>Клуб</th>
                <th>Год опл.</th>
            </tr>
        </thead>
    </table>
</form>
<div id="pagg"><?php echo $pagg; ?></div>
<script src="<?php echo base_url(); ?>/js/admin/yearpay.js"></script>
<?php $this->load->view('footer'); ?>