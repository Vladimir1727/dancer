<?php $this->load->view('header');?>
<?php include_once 'menu.php';?>
<h1 class="h1 text-success">Контакты</h1>
<div class="row">
    <div class="col-md-3">
        <p>
            <strong>Мои:</strong>
            <?php echo $contact['trainer_name'];?>
        </p>
        <p>
            E-mail: <?php echo $contact['trainer_email'];?>
        </p>
        <p>
            Телефон: <?php echo $contact['trainer_phone'];?>
        </p>
    </div>
    <div class="col-md-3">
        <p>
            <strong>Клуб:</strong>
            <?php echo $contact['club_title'];?>
        </p>
        <p>
            <strong>Руководитель:</strong>
            <?php echo $contact['club_name'];?>
        </p>
        <p>
            E-mail: <?php echo $contact['club_email'];?>
        </p>
        <p>
            Телефон: <?php echo $contact['club_phone'];?>
        </p>
    </div>
</div>
<?php $this->load->view('footer'); ?>