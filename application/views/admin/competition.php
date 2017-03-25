<?php $this->load->view('header');?>

<?php include_once 'menu.php';?>
<h1 class="h1 text-success">Конкурс</h1>
<div class="row">
    <div class="col-md-6">
        <table class="table table-striped" id="main_table">
            <caption>Участники соревнования</caption>
            <tbody>
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
</div>
<?php $this->load->view('footer'); ?>