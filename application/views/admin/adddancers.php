<?php $this->load->view('header');?>
<h1 class="h4 text-success">Добавление танцоров</h1>
<?php $this->load->view('admin/menu');?>

<select class="form-control" id="club_select">
    <?php echo $clubes; ?>
</select>
<select class="form-control" id="trainer_select">

</select>
<div id="main_block">
    <form method="POST" action="/index.php/cabinet/adminaddtocomp">
        <input type="hidden" id="comp_id" value="<?php echo $comp_id;?>" name="comp_id">
        <input type="hidden" id="trainer_id" name="trainer_id">
        <table id="main_table" class="table table-striped table-condensed">
            <tbody></tbody>
            <thead>
                <tr>
                    <th>Ф.И.О.</th>
                    <th>Возраст</th>
                </tr>
            </thead>
        </table>
        <input type="submit" class="btn btn-success" value="Добавить">
    </form>
</div>

<?php $this->load->view('footer'); ?>
<script src="<?php echo base_url(); ?>/js/admin/adddancers.js"></script>