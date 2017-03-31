<?php $this->load->view('header');?>
<?php include_once 'menu.php';?>
<h1 class="h3">Контактная информация</h1>
<div class="row>">
    <div class="col-md-6">
        <table class="table table-striped" id="main_table">
            <caption>Руководители клубов</caption>
            <tbody>
                <?php echo $clubers; ?>
            </tbody>
            <thead>
                <tr>
                    <th>Имя</th>
                    <th>Клуб</th>
                    <th>Город</th>
                    <th>Номер телефона</th>
                    <th>E-mail</th>
                </tr>
            </thead>
        </table>
    </div>
    <div class="col-md-6">
        <table class="table table-striped" id="main_table">
            <caption>Тренера</caption>
            <tbody id="group_list">
                <?php echo $trainers; ?>
            </tbody>
            <thead>
                <tr>
                    <th>Имя</th>
                    <th>Клуб</th>
                    <th>Город</th>
                    <th>Номер телефона</th>
                    <th>E-mail</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<?php $this->load->view('footer'); ?>