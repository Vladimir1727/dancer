<?php $this->load->view('header');?>
<?php include_once 'menu.php';?>
<h1 class="h3">Номера участников соревнования</h1>
<input type="hidden" value="<?php echo $comp_id;?>" id="comp_id">
<button class="btn btn-warning" id="calc">Рассчитать номера</button>
<div class="row>">
    <div class="col-md-4">
        <table class="table table-striped" id="main_table">
            <caption>Участники Соло</caption>
            <tbody id="solo_list">
                <?php echo $solo; ?>
            </tbody>
            <thead>
                <tr>
                    <th>Имя</th>
                    <th>Номер</th>
                </tr>
            </thead>
        </table>
    </div>
    <div class="col-md-8">
        <table class="table table-striped" id="main_table">
            <caption>Группы</caption>
            <tbody id="group_list">
                <?php echo $group; ?>
            </tbody>
            <thead>
                <tr>
                    <th>Категория</th>
                    <th>Участники</th>
                    <th>Номер</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<script src="<?php echo base_url(); ?>/js/admin/numbers.js"></script>
<?php $this->load->view('footer'); ?>