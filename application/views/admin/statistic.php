<?php $this->load->view('header');?>

<h1 class="h4 text-success">Статистика по стилям</h1>
<?php $this->load->view('admin/menu');?>
<div class="row">
    
    <div class="col-md-12">
        <select class="form-control" id="way_select">
            <?php echo $ways; ?>
        </select>
        <select class="form-control" id="style_select">
            
        </select>
        <div id="stat_block">
            <table id="main_table" class="table table-striped table-condensed">
                <tbody></tbody>
                <thead>
                    <tr>
                        <th>Ф.И.О.</th>
                        <th>Город</th>
                        <th>Клуб</th>
                        <th>Тренер</th>
                        <th>Год рожд.</th>
                        <th>Танец</th>
                        <th>Сумм. опыт</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<?php $this->load->view('footer'); ?>
<script src="<?php echo base_url(); ?>/js/admin/statistic.js"></script>