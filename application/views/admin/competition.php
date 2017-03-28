<?php $this->load->view('header');?>
<div id="rewardmodal" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Для награждения</h4>
            </div>
            <div class="modal-body">
                <table class="table table-condensed table-striped" id="reward_table">
                    <tbody>
                        
                    </tbody>
                    <thead>
                        <tr>
                            <th>Категория</th>
                            <th>Участников</th>
                            <th>Медаль 1 место</th>
                            <th>Медаль 2 место</th>
                            <th>Медаль 3 место</th>
                            <th>Кубок 1 место</th>
                            <th>Кубок 2 место</th>
                            <th>Кубок 3 место</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
<?php include_once 'menu.php';?>
<h1 class="h1 text-success">Конкурс</h1>
<button class="btn btn-info" id="reward_but" data-toggle="modal" data-target="#rewardmodal">Для награждения</button>
<a class="btn btn-info" href="../numbers/<?php echo $comp_id; ?>" target="_blank">Номера участников</a>
<div class="row">
    <div class="col-md-4">
        <table class="table table-striped" id="main_table">
            <caption>Участники соревнования</caption>
            <tbody id="comp_list">
                <?php echo $comp_list; ?>
            </tbody>
            <thead>
                <tr>
                    <th>Имя</th>
                    <th>Категория</th>
                    <th>Оплата</th>
                </tr>
            </thead>
        </table>
    </div>
    <div class="col-md-8">
        <form id="pay_form">
            <input type="hidden" value="<?php echo $comp_id; ?>" id="comp_id">
            <table class="table table-striped" id="main_table">
                <caption>Оплата</caption>
                <tbody>
                    <?php echo $pay_list; ?>
                </tbody>
                <thead>
                    <tr>
                        <th>Категория по количеству</th>
                        <th>Лига</th>
                        <th>Опл. IUDE</th>
                        <th>Опл. др.орг.</th>
                        <th>Опл. нет орг.</th>
                    </tr>
                </thead>
            </table>
            <input class="btn btn-success" type="submit" value="СОХРАНИТЬ" id="save_but">
        </form>
    </div>
</div>
<script src="<?php echo base_url(); ?>/js/admin/competition.js"></script>
<?php $this->load->view('footer'); ?>