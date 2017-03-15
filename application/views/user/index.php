<?php $this->load->view('header');?>
<h1 class="h1 text-success">Кабинет пользователя</h1>
	<div class="row">
		<div class="col-md-1">
		</div>
		<div class="col-md-2">
			<?php 
			echo '<p>Имя: <strong>'.$_SESSION['name'].'</strong></p>';
			echo '<p>Email: '.$_SESSION['email'].'</p>';
			 ?>
		</div>
		
		<div class="col-md-6">
			<table class="table">
				<tbody>
					<tr>
						<td>Танцор</td>
						<td id="dancer_status">
							<?php 
							if($_SESSION['dancer']==0) echo "нет";
							if($_SESSION['dancer']==1) echo "запрошена";
							if($_SESSION['dancer']==2) echo "активна";
							if($_SESSION['dancer']==3) echo "отказ Администратора";
							 ?>
						</td>
						<td id="dancer_action">
						<?php
							if ($_SESSION['dancer']==0)
								echo '<button class="btn btn-success" id="dancer_add">запросить</button>';
							elseif($_SESSION['dancer']!=3)
								echo '<button class="btn btn-danger" id="dancer_del">удалить</button>';

						?>
						</td>
					</tr>
					<tr>
						<td>Тренер</td>
						<td id="trainer_status">
							<?php 
							if($_SESSION['trainer']==0) echo "нет";
							if($_SESSION['trainer']==1) echo "запрошена";
							if($_SESSION['trainer']==2) echo "активна";
							if($_SESSION['trainer']==3) echo "отказ Администратора";
							 ?>
						</td>
						<td  id="trainer_action">
							<?php
							if ($_SESSION['trainer']==0) 
								echo '<button class="btn btn-success" id="trainer_add">запросить</button>';
							elseif($_SESSION['trainer']!=3)
								echo '<button class="btn btn-danger" id="trainer_del">удалить</button>';
							?>
						</td>
					</tr>
					<tr>
						<td>Руководитель клуба</td>
						<td id="cluber_status">
							<?php 
							if($_SESSION['cluber']==0) echo "нет";
							if($_SESSION['cluber']==1) echo "запрошена";
							if($_SESSION['cluber']==2) echo "активна";
							if($_SESSION['cluber']==3) echo "отказ Администратора";
							 ?>
						</td>
						<td id="cluber_action">
							<?php
							if ($_SESSION['cluber']==0) 
								echo '<button class="btn btn-success" id="cluber_add">запросить</button>';
							elseif($_SESSION['cluber']!=3)
								echo '<button class="btn btn-danger" id="cluber_del">удалить</button>';
						?>
						</td>
					</tr>
					<tr>
						<td>Организатор</td>
						<td id="organizer_status">
							<?php 
							if($_SESSION['organizer']==0) echo "нет";
							if($_SESSION['organizer']==1) echo "запрошена";
							if($_SESSION['organizer']==2) echo "активна";
							if($_SESSION['organizer']==3) echo "отказ Администратора";
							 ?>
						</td>
						<td  id="organizer_action">
							<?php
							if ($_SESSION['organizer']==0) 
								echo '<button class="btn btn-success" id="organizer_add">запросить</button>';
							elseif($_SESSION['organizer']!=3)
								echo '<button class="btn btn-danger" id="organizer_del">удалить</button>';
						?>
						</td>
					</tr>
					<tr>
						<td>Администратор</td>
						<td id="admin_status">
							<?php 
							if($_SESSION['admin']==0) echo "нет";
							if($_SESSION['admin']==1) echo "запрошена";
							if($_SESSION['admin']==2) echo "активна";
							if($_SESSION['admin']==3) echo "отказ Администратора";
							 ?>
						</td>
						<td>
						</td>
					</tr>
				</tbody>
				<thead>
					<tr>
						<th>Роль</th>
						<th>Статус роли</th>
						<th>Действия</th>
					</tr>
				</thead>
			</table>
			
		</div>
	</div>
<script src="<?php echo base_url(); ?>/js/usercabinet_index.js"></script>
<?php $this->load->view('footer'); ?>