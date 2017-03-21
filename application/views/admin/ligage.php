<?php $this->load->view('header');?>

<h1 class="h4 text-success">Соответствие лиг и возраста</h1>
<?php $this->load->view('admin/menu');?>
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-7">
        <select class="form-control" id="way_select">
            <?php echo $ways; ?>
        </select>
        <div id="ligs_block">
            <table class="table table-striped" id="agelig_table">
                <tbody>

                </tbody>
                <thead>
                    <tr>
                        <th>
                            Возраст
                        </th>
                        <th>
                            Лига
                        </th>
                    </tr>
                </thead>
            </table>
            <form id="add_form" class="form-horizontal">
                <input type="hidden" id="way_id">
                <div class="col-md-4">
				    <select class="form-control" name="age_id">
					    <?php echo $ages; ?>
					</select>
                </div>
                <div class="col-md-4">
                    <select class="form-control" name="lig_id" id="lig_id">
					</select>
                </div>
                <div class="col-md-2">
                    <input type="submit" value="добавить" class="btn btn-success" id="new_but">
                </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $this->load->view('footer'); ?>
<script src="<?php echo base_url(); ?>/js/admin_ligage.js"></script>