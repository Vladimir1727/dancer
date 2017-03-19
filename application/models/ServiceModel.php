<?php
class ServiceModel extends CI_Model{
	function __construct(){
		$this->load->database();
		$this->load->dbforge();
	}
    
	function CreateTables(){
		/*
		$this->dbforge->add_field('id');
		$fields=array(
			'first_name'=> array(
				'type' => 'VARCHAR',
				'constraint'=>'100'
				),
			'last_name'=> array(
				'type' => 'VARCHAR',
				'constraint'=>'100'
				),
			'father_name'=> array(
				'type' => 'VARCHAR',
				'constraint'=>'100',
				'default'=>''
				),
			'email'=> array(
				'type' => 'VARCHAR',
				'constraint'=>'100',
				'null'=>true
				),
			'password'=> array(
				'type' => 'VARCHAR',
				'constraint'=>'50',
				'null'=>true
				),
			'phone'=> array(
				'type' => 'VARCHAR',
				'constraint'=>'20',
				'null'=>true
				),
			'dancer'=> array(
				'type' => 'tinyint',
				'default'=>0
				),
			'trainer'=> array(
				'type' => 'tinyint',
				'default'=>0
				),
			'cluber'=> array(
				'type' => 'tinyint',
				'default'=>0
				),
			'organizer'=> array(
				'type' => 'tinyint',
				'default'=>0
				),
			'admin'=> array(
				'type' => 'tinyint',
				'default'=>0
				),
		);
		$this->dbforge->add_field($fields);
		$this->dbforge->create_table('users',TRUE);
		$this->dbforge->add_field('id');
		$fields=array(
			'region'=>array(
				'type'=>'varchar',
				'constraint'=>'64',
				),
			);
		$this->dbforge->add_field($fields);
		$this->dbforge->create_table('regions',TRUE);
		$cities='create table cities(
		id int not null auto_increment primary key,
		city varchar(64) not null,
		region_id int,
		foreign key (region_id) references regions(id)
		on update cascade
		)default charset=utf8';
		$this->db->query($cities);
		$organizer='create table organizers(
			id int not null auto_increment primary key,
			user_id int,
			foreign key (user_id) references users(id)
			on update cascade,
			city_id int,
			foreign key (city_id) references cities(id)
			on update cascade
		)';
		$this->db->query($organizer);
		$cluber='create table clubers(
			id int not null auto_increment primary key,
			title varchar(128),
			user_id int,
			foreign key (user_id) references users(id)
			on update cascade,
			city_id int,
			foreign key (city_id) references cities(id)
			on update cascade
		)';
		$this->db->query($cluber);
		$trainer='create table trainers(
			id int not null auto_increment primary key,
			user_id int,
			foreign key (user_id) references users(id)
			on update cascade,
			club_id int,
			foreign key (club_id) references clubers(id)
			on update cascade
		)';
		$this->db->query($trainer);
		$bellydance='create table bellydance(
			id int not null auto_increment primary key,
			name varchar(32),
			type tinyint,
                        deleted  tinyint default 0
		)';
		$this->db->query($bellydance);
		$dancer='create table dancers(
		id int not null auto_increment primary key,
		trainer_id int,
		foreign key (trainer_id) references trainers(id)
		on update cascade,
		birthdate date,
		user_id int,
		foreign key (user_id) references users(id)
		on update cascade,
		bell_id int,
		foreign key (bell_id) references bellydance(id)
		on update cascade
		)default charset=utf8';
		$this->db->query($dancer);
                $ways='create table ways('
                        . 'id int not null auto_increment primary key,'
                        . 'way varchar(128),'
                        .'deleted  tinyint default 0'
                        . ')default charset=utf8';
                $this->db->query($ways);
                $styles='create table styles('
                        . 'id int not null auto_increment primary key,'
                        . 'style varchar(128),'
                        . 'way_id int,'
                        . 'foreign key (way_id) references ways(id) on update cascade,'
                        . 'dancers_count tinyint default 0,'
                        .'deleted  tinyint default 0'
                        . ')default charset=utf8';
                $this->db->query($styles);
                $count_cat='create table cat_count('
                        . 'id int not null auto_increment primary key,'
                        . 'name varchar(64),'
                        . 'min_count smallint,'
                        . 'max_count smallint,'
                        .'deleted  tinyint default 0'
                        . ')default charset=utf8';
                $this->db->query($count_cat);
                $ligs='create table ligs('
                        . 'id int not null auto_increment primary key,'
                        . 'number tinyint default 0,'
                        . 'name varchar(64),'
                        . 'points smallint,'
                        . 'days smallint default 0,'
                        . 'way_id int,'
                        . 'foreign key (way_id) references ways(id) on update cascade,'
                        . 'deleted tinyint default 0'
                        . ')default charset=utf8';
                $this->db->query($ligs);
                $statuses='create table statuses('
                        . 'id int not null auto_increment primary key,'
                        . 'status varchar (32)'
                        . ')default charset=utf8';
                $this->db->query($statuses);*/
                $showLigs='create table show_ligs('
                        . 'id int not null auto_increment primary key,'
                        . 'lig_id int,'
                        . 'foreign key (lig_id) references ligs(id) on update cascade,'
                        . 'age_id int,'
                        . 'foreign key (age_id) references cat_age(id) on update cascade'
                        . ')default charset=utf8';
                $this->db->query($showLigs);
                /*$age='create table cat_age('
                        . 'id int not null auto_increment primary key,'
                        . 'name varchar(64),'
                        . 'min_age tinyint,'
                        . 'max_age tinyint,'
                        . 'dancers_count tinyint default 0,'
                        . 'deleted tinyint default 0'
                        . ')default charset=utf8';
                $this->db->query($age);
                $reight='create table reight(
		id int not null auto_increment primary key,
		minn tinyint default 0,
		maxn tinyint default 0,
		reight tinyint default 0,
		points tinyint default 0
		)default charset=utf8';
                $this->db->query($reight);*/
		return true;
	}

	public function Seed()
	{
		/*$admin= array(
			'first_name'=>'admin',
			'last_name'=>'admin',
			'father_name'=>'admin',
			'email'=>'admin@i.ua',
			'phone'=>'7777777',
			'password'=>'1111',
			'trainer'=>2,
			'dancer'=>2,
			'organizer'=>2,
			'cluber'=>2,
			'admin'=>2,
			);
		$this->db->insert('users', $admin);
		$regions='insert into regions(region)
		values
		("Автономная Республика Крым"),
		("Винницкая область"),
		("Волынская область"),
		("Днепропетровская область"),
		("Донецкая область"),
		("Житомирская область"),
		("Закарпатская область"),
		("Запорожская область"),
		("Ивано-Франковская область"),
		("Киевская область"),
		("Кировоградская область"),
		("Луганская область"),
		("Львовская область"),
		("Николаевская область"),
		("Одесская область"),
		("Полтавская область"),
		("Ровенская область"),
		("Сумская область"),
		("Тернопольская область"),
		("Харьковская область"),
		("Херсонская область"),
		("Хмельницкая область"),
		("Черкасская область"),
		("Черниговская область"),
		("Черновицкая область")
		';
		$this->db->query($regions);
		$cities='insert into cities(city,region_id) values
		("Алупка",(select id from regions where region="Автономная Республика Крым")),
("Алушта",(select id from regions where region="Автономная Республика Крым")),
("Армянск",(select id from regions where region="Автономная Республика Крым")),
("Бахчисарай",(select id from regions where region="Автономная Республика Крым")),
("Белогорск",(select id from regions where region="Автономная Республика Крым")),
("Джанкой",(select id from regions where region="Автономная Республика Крым")),
("Евпатория",(select id from regions where region="Автономная Республика Крым")),
("Керчь",(select id from regions where region="Автономная Республика Крым")),
("Красноперекопск",(select id from regions where region="Автономная Республика Крым")),
("Саки",(select id from regions where region="Автономная Республика Крым")),
("Севастополь",(select id from regions where region="Автономная Республика Крым")),
("Симферополь",(select id from regions where region="Автономная Республика Крым")),
("Старый Крым",(select id from regions where region="Автономная Республика Крым")),
("Судак",(select id from regions where region="Автономная Республика Крым")),
("Феодосия",(select id from regions where region="Автономная Республика Крым")),
("Щёлкино",(select id from regions where region="Автономная Республика Крым")),
("Ялта",(select id from regions where region="Автономная Республика Крым")),
("Бар",(select id from regions where region="Винницкая область")),
("Бершадь",(select id from regions where region="Винницкая область")),
("Винница",(select id from regions where region="Винницкая область")),
("Гайсин",(select id from regions where region="Винницкая область")),
("Жмеринка",(select id from regions where region="Винницкая область")),
("Казатин",(select id from regions where region="Винницкая область")),
("Калиновка",(select id from regions where region="Винницкая область")),
("Ладыжин",(select id from regions where region="Винницкая область")),
("Могилёв-Подольский",(select id from regions where region="Винницкая область")),
("Немиров",(select id from regions where region="Винницкая область")),
("Погребище",(select id from regions where region="Винницкая область")),
("Тульчин",(select id from regions where region="Винницкая область")),
("Хмельник",(select id from regions where region="Винницкая область")),
("Шаргород",(select id from regions where region="Винницкая область")),
("Ямполь",(select id from regions where region="Винницкая область")),
("Берестечко",(select id from regions where region="Волынская область")),
("Владимир-Волынский",(select id from regions where region="Волынская область")),
("Горохов",(select id from regions where region="Волынская область")),
("Камень-Каширский",(select id from regions where region="Волынская область")),
("Киверцы",(select id from regions where region="Волынская область")),
("Ковель",(select id from regions where region="Волынская область")),
("Луцк",(select id from regions where region="Волынская область")),
("Любомль",(select id from regions where region="Волынская область")),
("Нововолынск",(select id from regions where region="Волынская область")),
("Рожище",(select id from regions where region="Волынская область")),
("Устилуг",(select id from regions where region="Волынская область")),
("Апостолово",(select id from regions where region="Днепропетровская область")),
("Верхнеднепровск",(select id from regions where region="Днепропетровская область")),
("Вольногорск",(select id from regions where region="Днепропетровская область")),
("Днепродзержинск",(select id from regions where region="Днепропетровская область")),
("Днепропетровск",(select id from regions where region="Днепропетровская область")),
("Жёлтые Воды",(select id from regions where region="Днепропетровская область")),
("Кривой Рог",(select id from regions where region="Днепропетровская область")),
("Марганец",(select id from regions where region="Днепропетровская область")),
("Никополь",(select id from regions where region="Днепропетровская область")),
("Новомосковск",(select id from regions where region="Днепропетровская область")),
("Орджоникидзе",(select id from regions where region="Днепропетровская область")),
("Павлоград",(select id from regions where region="Днепропетровская область")),
("Перещепино",(select id from regions where region="Днепропетровская область")),
("Першотравенск",(select id from regions where region="Днепропетровская область")),
("Подгородное",(select id from regions where region="Днепропетровская область")),
("Пятихатки",(select id from regions where region="Днепропетровская область")),
("Синельниково",(select id from regions where region="Днепропетровская область")),
("Терновка",(select id from regions where region="Днепропетровская область")),
("Авдеевка",(select id from regions where region="Донецкая область")),
("Артёмовск",(select id from regions where region="Донецкая область")),
("Волноваха",(select id from regions where region="Донецкая область")),
("Горловка",(select id from regions where region="Донецкая область")),
("Дзержинск",(select id from regions where region="Донецкая область")),
("Дебальцево",(select id from regions where region="Донецкая область")),
("Димитров",(select id from regions where region="Донецкая область")),
("Доброполье",(select id from regions where region="Донецкая область")),
("Докучаевск",(select id from regions where region="Донецкая область")),
("Донецк",(select id from regions where region="Донецкая область")),
("Дружковка",(select id from regions where region="Донецкая область")),
("Енакиево",(select id from regions where region="Донецкая область")),
("Ждановка",(select id from regions where region="Донецкая область")),
("Зугрэс",(select id from regions where region="Донецкая область")),
("Кировское",(select id from regions where region="Донецкая область")),
("Краматорск",(select id from regions where region="Донецкая область")),
("Красноармейск",(select id from regions where region="Донецкая область")),
("Красный Лиман",(select id from regions where region="Донецкая область")),
("Константиновка",(select id from regions where region="Донецкая область")),
("Мариуполь",(select id from regions where region="Донецкая область")),
("Макеевка",(select id from regions where region="Донецкая область")),
("Новогродовка",(select id from regions where region="Донецкая область")),
("Селидово",(select id from regions where region="Донецкая область")),
("Славянск",(select id from regions where region="Донецкая область")),
("Снежное",(select id from regions where region="Донецкая область")),
("Соледар",(select id from regions where region="Донецкая область")),
("Торез",(select id from regions where region="Донецкая область")),
("Угледар",(select id from regions where region="Донецкая область")),
("Харцызск",(select id from regions where region="Донецкая область")),
("Шахтёрск",(select id from regions where region="Донецкая область")),
("Ясиноватая",(select id from regions where region="Донецкая область")),
("Андрушёвка",(select id from regions where region="Житомирская область")),
("Барановка",(select id from regions where region="Житомирская область")),
("Бердичев",(select id from regions where region="Житомирская область")),
("Житомир",(select id from regions where region="Житомирская область")),
("Коростень",(select id from regions where region="Житомирская область")),
("Коростышев",(select id from regions where region="Житомирская область")),
("Малин",(select id from regions where region="Житомирская область")),
("Новоград-Волынский",(select id from regions where region="Житомирская область")),
("Овруч",(select id from regions where region="Житомирская область")),
("Радомышль",(select id from regions where region="Житомирская область")),
("Берегово",(select id from regions where region="Закарпатская область")),
("Виноградов",(select id from regions where region="Закарпатская область")),
("Иршава",(select id from regions where region="Закарпатская область")),
("Мукачево",(select id from regions where region="Закарпатская область")),
("Перечин",(select id from regions where region="Закарпатская область")),
("Рахов",(select id from regions where region="Закарпатская область")),
("Свалява",(select id from regions where region="Закарпатская область")),
("Тячев",(select id from regions where region="Закарпатская область")),
("Ужгород",(select id from regions where region="Закарпатская область")),
("Хуст",(select id from regions where region="Закарпатская область")),
("Чоп",(select id from regions where region="Закарпатская область")),
("Бердянск",(select id from regions where region="Запорожская область")),
("Васильевка",(select id from regions where region="Запорожская область")),
("Вольнянск",(select id from regions where region="Запорожская область")),
("Гуляйполе",(select id from regions where region="Запорожская область")),
("Днепрорудное",(select id from regions where region="Запорожская область")),
("Запорожье",(select id from regions where region="Запорожская область")),
("Каменка-Днепровская",(select id from regions where region="Запорожская область")),
("Мелитополь",(select id from regions where region="Запорожская область")),
("Молочанск",(select id from regions where region="Запорожская область")),
("Орехов",(select id from regions where region="Запорожская область")),
("Пологи",(select id from regions where region="Запорожская область")),
("Приморск",(select id from regions where region="Запорожская область")),
("Токмак",(select id from regions where region="Запорожская область")),
("Энергодар",(select id from regions where region="Запорожская область")),
("Болехов",(select id from regions where region="Ивано-Франковская область")),
("Бурштын",(select id from regions where region="Ивано-Франковская область")),
("Галич",(select id from regions where region="Ивано-Франковская область")),
("Городенка",(select id from regions where region="Ивано-Франковская область")),
("Долина",(select id from regions where region="Ивано-Франковская область")),
("Ивано-Франковск",(select id from regions where region="Ивано-Франковская область")),
("Калуш",(select id from regions where region="Ивано-Франковская область")),
("Коломыя",(select id from regions where region="Ивано-Франковская область")),
("Косов",(select id from regions where region="Ивано-Франковская область")),
("Надворная",(select id from regions where region="Ивано-Франковская область")),
("Рогатин",(select id from regions where region="Ивано-Франковская область")),
("Снятын",(select id from regions where region="Ивано-Франковская область")),
("Тысменица",(select id from regions where region="Ивано-Франковская область")),
("Тлумач",(select id from regions where region="Ивано-Франковская область")),
("Яремче",(select id from regions where region="Ивано-Франковская область")),
("Белая Церковь",(select id from regions where region="Киевская область")),
("Березань",(select id from regions where region="Киевская область")),
("Богуслав",(select id from regions where region="Киевская область")),
("Борисполь",(select id from regions where region="Киевская область")),
("Боярка",(select id from regions where region="Киевская область")),
("Бровары",(select id from regions where region="Киевская область")),
("Буча",(select id from regions where region="Киевская область")),
("Васильков",(select id from regions where region="Киевская область")),
("Вишнёвое",(select id from regions where region="Киевская область")),
("Вышгород",(select id from regions where region="Киевская область")),
("Ирпень",(select id from regions where region="Киевская область")),
("Кагарлык",(select id from regions where region="Киевская область")),
("Киев",(select id from regions where region="Киевская область")),
("Мироновка",(select id from regions where region="Киевская область")),
("Обухов",(select id from regions where region="Киевская область")),
("Переяслав-Хмельницкий",(select id from regions where region="Киевская область")),
("Припять",(select id from regions where region="Киевская область")),
("Ржищев",(select id from regions where region="Киевская область")),
("Сквира",(select id from regions where region="Киевская область")),
("Славутич",(select id from regions where region="Киевская область")),
("Тараща",(select id from regions where region="Киевская область")),
("Тетиев",(select id from regions where region="Киевская область")),
("Узин",(select id from regions where region="Киевская область")),
("Украинка",(select id from regions where region="Киевская область")),
("Фастов",(select id from regions where region="Киевская область")),
("Чернобыль",(select id from regions where region="Киевская область")),
("Яготин",(select id from regions where region="Киевская область")),
("Александрия",(select id from regions where region="Кировоградская область")),
("Бобринец",(select id from regions where region="Кировоградская область")),
("Гайворон",(select id from regions where region="Кировоградская область")),
("Долинская",(select id from regions where region="Кировоградская область")),
("Знаменка",(select id from regions where region="Кировоградская область")),
("Кировоград",(select id from regions where region="Кировоградская область")),
("Малая Виска",(select id from regions where region="Кировоградская область")),
("Новомиргород",(select id from regions where region="Кировоградская область")),
("Новоукраинка",(select id from regions where region="Кировоградская область")),
("Светловодск",(select id from regions where region="Кировоградская область")),
("Александровск",(select id from regions where region="Луганская область")),
("Алмазная",(select id from regions where region="Луганская область")),
("Алчевск",(select id from regions where region="Луганская область")),
("Антрацит",(select id from regions where region="Луганская область")),
("Брянка",(select id from regions where region="Луганская область")),
("Вахрушево",(select id from regions where region="Луганская область")),
("Горное",(select id from regions where region="Луганская область")),
("Зимогорье",(select id from regions where region="Луганская область")),
("Золотое",(select id from regions where region="Луганская область")),
("Зоринск",(select id from regions where region="Луганская область")),
("Краснодон",(select id from regions where region="Луганская область")),
("Красный Луч",(select id from regions where region="Луганская область")),
("Лисичанск",(select id from regions where region="Луганская область")),
("Луганск",(select id from regions where region="Луганская область")),
("Лутугино",(select id from regions where region="Луганская область")),
("Миусинск",(select id from regions where region="Луганская область")),
("Молодогвардейск",(select id from regions where region="Луганская область")),
("Новодружеск",(select id from regions where region="Луганская область")),
("Новопсков",(select id from regions where region="Луганская область")),
("Первомайск",(select id from regions where region="Луганская область")),
("Перевальск",(select id from regions where region="Луганская область")),
("Петровское",(select id from regions where region="Луганская область")),
("Попасная",(select id from regions where region="Луганская область")),
("Приволье",(select id from regions where region="Луганская область")),
("Ровеньки",(select id from regions where region="Луганская область")),
("Рубежное",(select id from regions where region="Луганская область")),
("Сватово",(select id from regions where region="Луганская область")),
("Свердловск",(select id from regions where region="Луганская область")),
("Северодонецк",(select id from regions where region="Луганская область")),
("Старобельск",(select id from regions where region="Луганская область")),
("Стаханов",(select id from regions where region="Луганская область")),
("Суходольск",(select id from regions where region="Луганская область")),
("Счастье",(select id from regions where region="Луганская область")),
("Теплогорск",(select id from regions where region="Луганская область")),
("Червонопартизанск",(select id from regions where region="Луганская область")),
("Белз",(select id from regions where region="Львовская область")),
("Бобрка",(select id from regions where region="Львовская область")),
("Борислав",(select id from regions where region="Львовская область")),
("Броды",(select id from regions where region="Львовская область")),
("Буск",(select id from regions where region="Львовская область")),
("Великие Мосты",(select id from regions where region="Львовская область")),
("Глиняны",(select id from regions where region="Львовская область")),
("Городок",(select id from regions where region="Львовская область")),
("Добромиль",(select id from regions where region="Львовская область")),
("Дрогобыч",(select id from regions where region="Львовская область")),
("Дубляны",(select id from regions where region="Львовская область")),
("Жидачов",(select id from regions where region="Львовская область")),
("Жолква",(select id from regions where region="Львовская область")),
("Золочев",(select id from regions where region="Львовская область")),
("Каменка-Бугская",(select id from regions where region="Львовская область")),
("Львов",(select id from regions where region="Львовская область")),
("Мостиска",(select id from regions where region="Львовская область")),
("Перемышляны",(select id from regions where region="Львовская область")),
("Пустомыты",(select id from regions where region="Львовская область")),
("Рава-Русская",(select id from regions where region="Львовская область")),
("Радехов",(select id from regions where region="Львовская область")),
("Рудки",(select id from regions where region="Львовская область")),
("Самбор",(select id from regions where region="Львовская область")),
("Сколе",(select id from regions where region="Львовская область")),
("Сокаль",(select id from regions where region="Львовская область")),
("Старый Самбор",(select id from regions where region="Львовская область")),
("Стрый",(select id from regions where region="Львовская область")),
("Трускавец",(select id from regions where region="Львовская область")),
("Угнев",(select id from regions where region="Львовская область")),
("Хыров",(select id from regions where region="Львовская область")),
("Червоноград",(select id from regions where region="Львовская область")),
("Яворов",(select id from regions where region="Львовская область")),
("Баштанка",(select id from regions where region="Николаевская область")),
("Вознесенск",(select id from regions where region="Николаевская область")),
("Николаев",(select id from regions where region="Николаевская область")),
("Новая Одесса",(select id from regions where region="Николаевская область")),
("Новый Буг",(select id from regions where region="Николаевская область")),
("Очаков",(select id from regions where region="Николаевская область")),
("Первомайск",(select id from regions where region="Николаевская область")),
("Снигирёвка",(select id from regions where region="Николаевская область")),
("Южноукраинск",(select id from regions where region="Николаевская область")),
("Ананьев",(select id from regions where region="Одесская область")),
("Арциз",(select id from regions where region="Одесская область")),
("Балта",(select id from regions where region="Одесская область")),
("Белгород-Днестровский",(select id from regions where region="Одесская область")),
("Болград",(select id from regions where region="Одесская область")),
("Измаил",(select id from regions where region="Одесская область")),
("Ильичёвск",(select id from regions where region="Одесская область")),
("Килия",(select id from regions where region="Одесская область")),
("Кодыма",(select id from regions where region="Одесская область")),
("Котовск",(select id from regions where region="Одесская область")),
("Одесса",(select id from regions where region="Одесская область")),
("Татарбунары",(select id from regions where region="Одесская область")),
("Теплодар",(select id from regions where region="Одесская область")),
("Южное",(select id from regions where region="Одесская область")),
("Гадяч",(select id from regions where region="Полтавская область")),
("Глобино",(select id from regions where region="Полтавская область")),
("Гребёнка",(select id from regions where region="Полтавская область")),
("Зеньков",(select id from regions where region="Полтавская область")),
("Карловка",(select id from regions where region="Полтавская область")),
("Кременчуг",(select id from regions where region="Полтавская область")),
("Кобеляки",(select id from regions where region="Полтавская область")),
("Комсомольск",(select id from regions where region="Полтавская область")),
("Лохвица",(select id from regions where region="Полтавская область")),
("Лубны",(select id from regions where region="Полтавская область")),
("Миргород",(select id from regions where region="Полтавская область")),
("Пирятин",(select id from regions where region="Полтавская область")),
("Полтава",(select id from regions where region="Полтавская область")),
("Хорол",(select id from regions where region="Полтавская область")),
("Червонозаводское",(select id from regions where region="Полтавская область")),
("Березне",(select id from regions where region="Ровенская область")),
("Дубно",(select id from regions where region="Ровенская область")),
("Дубровица",(select id from regions where region="Ровенская область")),
("Здолбунов",(select id from regions where region="Ровенская область")),
("Корец",(select id from regions where region="Ровенская область")),
("Костополь",(select id from regions where region="Ровенская область")),
("Кузнецовск",(select id from regions where region="Ровенская область")),
("Острог",(select id from regions where region="Ровенская область")),
("Радивилов",(select id from regions where region="Ровенская область")),
("Ровно",(select id from regions where region="Ровенская область")),
("Сарны",(select id from regions where region="Ровенская область")),
("Ахтырка",(select id from regions where region="Сумская область")),
("Белополье",(select id from regions where region="Сумская область")),
("Бурынь",(select id from regions where region="Сумская область")),
("Глухов",(select id from regions where region="Сумская область")),
("Кролевец",(select id from regions where region="Сумская область")),
("Конотоп",(select id from regions where region="Сумская область")),
("Лебедин",(select id from regions where region="Сумская область")),
("Путивль",(select id from regions where region="Сумская область")),
("Ромны",(select id from regions where region="Сумская область")),
("Середина-Буда",(select id from regions where region="Сумская область")),
("Сумы",(select id from regions where region="Сумская область")),
("Тростянец",(select id from regions where region="Сумская область")),
("Шостка",(select id from regions where region="Сумская область")),
("Бережаны",(select id from regions where region="Тернопольская область")),
("Борщёв",(select id from regions where region="Тернопольская область")),
("Бучач",(select id from regions where region="Тернопольская область")),
("Залещики",(select id from regions where region="Тернопольская область")),
("Збараж",(select id from regions where region="Тернопольская область")),
("Зборов",(select id from regions where region="Тернопольская область")),
("Кременец",(select id from regions where region="Тернопольская область")),
("Лановцы",(select id from regions where region="Тернопольская область")),
("Монастыриска",(select id from regions where region="Тернопольская область")),
("Подволочиск",(select id from regions where region="Тернопольская область")),
("Подгайцы",(select id from regions where region="Тернопольская область")),
("Почаев",(select id from regions where region="Тернопольская область")),
("Скалат",(select id from regions where region="Тернопольская область")),
("Тернополь",(select id from regions where region="Тернопольская область")),
("Теребовля",(select id from regions where region="Тернопольская область")),
("Чортков",(select id from regions where region="Тернопольская область")),
("Шумск",(select id from regions where region="Тернопольская область")),
("Балаклея",(select id from regions where region="Харьковская область")),
("Барвенково",(select id from regions where region="Харьковская область")),
("Богодухов",(select id from regions where region="Харьковская область")),
("Валки",(select id from regions where region="Харьковская область")),
("Великий Бурлук",(select id from regions where region="Харьковская область")),
("Волчанск",(select id from regions where region="Харьковская область")),
("Дергачи",(select id from regions where region="Харьковская область")),
("Змиев",(select id from regions where region="Харьковская область")),
("Изюм",(select id from regions where region="Харьковская область")),
("Красноград",(select id from regions where region="Харьковская область")),
("Купянск",(select id from regions where region="Харьковская область")),
("Лозовая",(select id from regions where region="Харьковская область")),
("Люботин",(select id from regions where region="Харьковская область")),
("Мерефа",(select id from regions where region="Харьковская область")),
("Первомайский",(select id from regions where region="Харьковская область")),
("Харьков",(select id from regions where region="Харьковская область")),
("Чугуев",(select id from regions where region="Харьковская область")),
("Берислав",(select id from regions where region="Херсонская область")),
("Геническ",(select id from regions where region="Херсонская область")),
("Голая Пристань",(select id from regions where region="Херсонская область")),
("Каховка",(select id from regions where region="Херсонская область")),
("Новая Каховка",(select id from regions where region="Херсонская область")),
("Скадовск",(select id from regions where region="Херсонская область")),
("Таврийск",(select id from regions where region="Херсонская область")),
("Херсон",(select id from regions where region="Херсонская область")),
("Цюрупинск",(select id from regions where region="Херсонская область")),
("Волочиск",(select id from regions where region="Хмельницкая область")),
("Городок",(select id from regions where region="Хмельницкая область")),
("Деражня",(select id from regions where region="Хмельницкая область")),
("Дунаевцы",(select id from regions where region="Хмельницкая область")),
("Изяслав",(select id from regions where region="Хмельницкая область")),
("Каменец-Подольский",(select id from regions where region="Хмельницкая область")),
("Красилов",(select id from regions where region="Хмельницкая область")),
("Нетешин",(select id from regions where region="Хмельницкая область")),
("Полонное",(select id from regions where region="Хмельницкая область")),
("Славута",(select id from regions where region="Хмельницкая область")),
("Староконстантинов",(select id from regions where region="Хмельницкая область")),
("Хмельницкий",(select id from regions where region="Хмельницкая область")),
("Шепетовка",(select id from regions where region="Хмельницкая область")),
("Ватутино",(select id from regions where region="Черкасская область")),
("Городище",(select id from regions where region="Черкасская область")),
("Жашков",(select id from regions where region="Черкасская область")),
("Звенигородка",(select id from regions where region="Черкасская область")),
("Золотоноша",(select id from regions where region="Черкасская область")),
("Каменка",(select id from regions where region="Черкасская область")),
("Канев",(select id from regions where region="Черкасская область")),
("Корсунь-Шевченковский",(select id from regions where region="Черкасская область")),
("Монастырище",(select id from regions where region="Черкасская область")),
("Смела",(select id from regions where region="Черкасская область")),
("Тальное",(select id from regions where region="Черкасская область")),
("Умань",(select id from regions where region="Черкасская область")),
("Христиновка",(select id from regions where region="Черкасская область")),
("Черкассы",(select id from regions where region="Черкасская область")),
("Чигирин",(select id from regions where region="Черкасская область")),
("Шпола",(select id from regions where region="Черкасская область")),
("Бахмач",(select id from regions where region="Черниговская область")),
("Бобровица",(select id from regions where region="Черниговская область")),
("Борзна",(select id from regions where region="Черниговская область")),
("Городня",(select id from regions where region="Черниговская область")),
("Десна",(select id from regions where region="Черниговская область")),
("Ичня",(select id from regions where region="Черниговская область")),
("Корюковка",(select id from regions where region="Черниговская область")),
("Мена",(select id from regions where region="Черниговская область")),
("Нежин",(select id from regions where region="Черниговская область")),
("Новгород-Северский",(select id from regions where region="Черниговская область")),
("Носовка",(select id from regions where region="Черниговская область")),
("Прилуки",(select id from regions where region="Черниговская область")),
("Седнев",(select id from regions where region="Черниговская область")),
("Семёновка",(select id from regions where region="Черниговская область")),
("Чернигов",(select id from regions where region="Черниговская область")),
("Щорс",(select id from regions where region="Черниговская область")),
("Вашковцы",(select id from regions where region="Черновицкая область")),
("Вижница",(select id from regions where region="Черновицкая область")),
("Герца",(select id from regions where region="Черновицкая область")),
("Заставна",(select id from regions where region="Черновицкая область")),
("Кицмань",(select id from regions where region="Черновицкая область")),
("Новоднестровск",(select id from regions where region="Черновицкая область")),
("Новоселица",(select id from regions where region="Черновицкая область")),
("Сокиряны",(select id from regions where region="Черновицкая область")),
("Сторожинец",(select id from regions where region="Черновицкая область")),
("Хотин",(select id from regions where region="Черновицкая область")),
("Черновцы",(select id from regions where region="Черновицкая область"))';
	$this->db->query($cities);
	$bellydance='insert into bellydance(name,type) values
		("IUDE",1),
		("WorldUCA",2),
		("АСЭТУ",2),
		("УАИВТ",2),
		("УФСТ",2),
		("УРТ",2),
		("СГОСТУ",2),
		("IAED",2),
		("МАРКС",2),
		("БЛТ",2),
		("IDF",2),
		("IDO",2),
		("ЛПВТУ",2),
		("нет членства",3)
		';
	$this->db->query($bellydance);
        $ways='insert into ways(way) values'
                . '("Восточный танец"),'
                . '("Современная хореография")';
        $this->db->query($ways);
        $q=$this->db->query('select * from ways');
        foreach ($q->result() as $row)
        {
            if ($row->way == "Восточный танец"){
                $east = $row->id;
            }
            if ($row->way == "Современная хореография"){
                $west = $row->id;
            }
        }
        
        $styles='insert into styles (style,way_id,dancers_count) values'
                . '("Raqs el Sharqi",'.$east.',0),'
                . '("Эстрадная Песня",'.$east.',1),'
                . '("Фольклор",'.$east.',2),'
                . '("Египетский Фольклор",'.$east.',1),'
                . '("Неегипетский Фольклор",'.$east.',1),'
                . '("Табла",'.$east.',1),'
                . '("Шааби Балади",'.$east.',1),'
                . '("Tribal",'.$east.',0),'
                . '("Fusion",'.$east.',0),'
                . '("Стрит-Шааби",'.$east.',1),'
                . '("Шоу-Bellydance",'.$east.',0),'
                . '("СТК",'.$east.',0),'
                . '("Сценический танец",'.$east.',0),'
                . '("Импровизация",'.$east.',1),'
                . '("Импровизация под дарбуку",'.$east.',1),'
                . '("Импровизация под оркестр",'.$east.',1),'
                . '("Импровизация Балади",'.$east.',1),'
                . '("Импровизация Бандари",'.$east.',1),'
                . '("Импровизация Ирак",'.$east.',1),'
                . '("Импровизация Марокко",'.$east.',1),'
                . '("Импровизация Саиди",'.$east.',1),'
                . '("Импровизация Халиджи",'.$east.',1),'
                . '("Цыганский танец",'.$east.',0),'
                . '("Индийский танец",'.$east.',1),'
                . '("Табла Dance",'.$east.',2),'
                . '("Синхронный танец",'.$east.',2),'
                . '("СЭТ",'.$west.',0),'
                . '("Dance Show",'.$west.',0),'
                . '("Fantasy",'.$west.',0),'
                . '("Современная хореография",'.$west.',0),'
                . '("Народный танец",'.$west.',0),'
                . '("Стилизованный народный танец",'.$west.',0),'
                . '("Street Dance Revue",'.$west.',0),'
                . '("Jazz",'.$west.',0),'
                . '("Modern",'.$west.',0),'
                . '("Contemporary",'.$west.',0),'
                . '("Импровизация Contemporary",'.$west.',1),'
                . '("Ballroom Show",'.$west.',0),'
                . '("Latin Show",'.$west.',0),'
                . '("Hip-Hop",'.$west.',0),'
                . '("Импровизация Hip-Hop",'.$west.',1),'
                . '("Jazz-Funk",'.$west.',0),'
                . '("Импровизация Jazz-Funk",'.$west.',1),'
                . '("Disco",'.$west.',0),'
                . '("Импровизация Disco",'.$west.',1),'
                . '("СТК",'.$west.',0)';
        $this->db->query($styles);
        $cat_count='insert into cat_count (name,min_count,max_count) values'
                    . '("Соло",1,1),'
                    . '("Дуэт",2,2),'
                    . '("Трио",3,3),'
                    . '("Малая группа",3,7),'
                    . '("Формейшн",8,24),'
                    . '("Продакшн",25,1000)';
        $this->db->query($cat_count);
        $ligs='insert into ligs (number, name, points, days,way_id) values'
                . '(1, "Дебют",10,365,'.$east.'),'
                . '(2,"Начинающие",16,0,'.$east.'),'
                . '(3,"Продолжающие",20,0,'.$east.'),'
                . '(4,"Высшая лига",24,0,'.$east.'),'
                . '(5,"Любители",26,0,'.$east.'),'
                . '(6,"Открытая лига",22,0,'.$east.'),'
                . '(7,"Профессионалы",1000,0,'.$east.'),'
                . '(1,"Дебют",10,365,'.$west.'),'
                . '(2,"Открытая лига",22,0,'.$west.'),'
                . '(3,"Профессионалы",1000,0,'.$west.')';
        $this->db->query($ligs);
        $statuses='insert into statuses (status) values'
                   . '("ON"),'
                   . '("OFF"),'
                   . '("PRE"),'
                   . '("CLOSE"),'
                   . '("DONE")';
        $this->db->query($statuses);          
        $showligs='insert into show_ligs(lig_id,age_id) values
                ((select id from ligs where name="Дебют" and way_id=(select id from ways where way="Восточный танец")),
				(select id from cat_age where name="Мини-беби")),
				((select id from ligs where name="Начинающие" and way_id=(select id from ways where way="Восточный танец")),
				(select id from cat_age where name="Мини-беби")),
				((select id from ligs where name="Продолжающие" and way_id=(select id from ways where way="Восточный танец")),
				(select id from cat_age where name="Мини-беби")),
				((select id from ligs where name="Дебют" and way_id=(select id from ways where way="Восточный танец")),
				(select id from cat_age where name="Беби")),
				((select id from ligs where name="Начинающие" and way_id=(select id from ways where way="Восточный танец")),
				(select id from cat_age where name="Беби")),
				((select id from ligs where name="Продолжающие" and way_id=(select id from ways where way="Восточный танец")),
				(select id from cat_age where name="Беби")),
				((select id from ligs where name="Дебют" and way_id=(select id from ways where way="Восточный танец")),
				(select id from cat_age where name="Ювеналы 1")),
				((select id from ligs where name="Начинающие" and way_id=(select id from ways where way="Восточный танец")),
				(select id from cat_age where name="Ювеналы 1")),
				((select id from ligs where name="Продолжающие" and way_id=(select id from ways where way="Восточный танец")),
				(select id from cat_age where name="Ювеналы 1")),
				((select id from ligs where name="Высшая лига" and way_id=(select id from ways where way="Восточный танец")),
				(select id from cat_age where name="Ювеналы 1")),
				((select id from ligs where name="Дебют" and way_id=(select id from ways where way="Восточный танец")),
				(select id from cat_age where name="Юниоры 2")),
				((select id from ligs where name="Начинающие" and way_id=(select id from ways where way="Восточный танец")),
				(select id from cat_age where name="Юниоры 2")),
				((select id from ligs where name="Продолжающие" and way_id=(select id from ways where way="Восточный танец")),
				(select id from cat_age where name="Юниоры 2")),
				((select id from ligs where name="Высшая лига" and way_id=(select id from ways where way="Восточный танец")),
				(select id from cat_age where name="Юниоры 2")),
				((select id from ligs where name="Дебют" and way_id=(select id from ways where way="Восточный танец")),
				(select id from cat_age where name="Юниоры 1")),
				((select id from ligs where name="Начинающие" and way_id=(select id from ways where way="Восточный танец")),
				(select id from cat_age where name="Юниоры 1")),
				((select id from ligs where name="Продолжающие" and way_id=(select id from ways where way="Восточный танец")),
				(select id from cat_age where name="Юниоры 1")),
				((select id from ligs where name="Высшая лига" and way_id=(select id from ways where way="Восточный танец")),
				(select id from cat_age where name="Юниоры 1")),
				((select id from ligs where name="Дебют" and way_id=(select id from ways where way="Восточный танец")),
				(select id from cat_age where name="Юниоры 2")),
				((select id from ligs where name="Начинающие" and way_id=(select id from ways where way="Восточный танец")),
				(select id from cat_age where name="Юниоры 2")),
				((select id from ligs where name="Продолжающие" and way_id=(select id from ways where way="Восточный танец")),
				(select id from cat_age where name="Юниоры 2")),
				((select id from ligs where name="Высшая лига" and way_id=(select id from ways where way="Восточный танец")),
				(select id from cat_age where name="Юниоры 2")),
				((select id from ligs where name="Дебют" and way_id=(select id from ways where way="Восточный танец")),
				(select id from cat_age where name="Молодёжь")),
				((select id from ligs where name="Начинающие" and way_id=(select id from ways where way="Восточный танец")),
				(select id from cat_age where name="Молодёжь")),
				((select id from ligs where name="Продолжающие" and way_id=(select id from ways where way="Восточный танец")),
				(select id from cat_age where name="Молодёжь")),
				((select id from ligs where name="Любители" and way_id=(select id from ways where way="Восточный танец")),
				(select id from cat_age where name="Молодёжь")),
				((select id from ligs where name="Профессионалы" and way_id=(select id from ways where way="Восточный танец")),
				(select id from cat_age where name="Молодёжь")),
				((select id from ligs where name="Дебют" and way_id=(select id from ways where way="Восточный танец")),
				(select id from cat_age where name="Взрослые")),
				((select id from ligs where name="Начинающие" and way_id=(select id from ways where way="Восточный танец")),
				(select id from cat_age where name="Взрослые")),
				((select id from ligs where name="Продолжающие" and way_id=(select id from ways where way="Восточный танец")),
				(select id from cat_age where name="Взрослые")),
				((select id from ligs where name="Любители" and way_id=(select id from ways where way="Восточный танец")),
				(select id from cat_age where name="Взрослые")),
				((select id from ligs where name="Профессионалы" and way_id=(select id from ways where way="Восточный танец")),
				(select id from cat_age where name="Взрослые")),
				((select id from ligs where name="Дебют" and way_id=(select id from ways where way="Восточный танец")),
				(select id from cat_age where name="Синьорины")),
				((select id from ligs where name="Начинающие" and way_id=(select id from ways where way="Восточный танец")),
				(select id from cat_age where name="Синьорины")),
				((select id from ligs where name="Продолжающие" and way_id=(select id from ways where way="Восточный танец")),
				(select id from cat_age where name="Синьорины")),
				((select id from ligs where name="Любители" and way_id=(select id from ways where way="Восточный танец")),
				(select id from cat_age where name="Синьорины")),
				((select id from ligs where name="Профессионалы" and way_id=(select id from ways where way="Восточный танец")),
				(select id from cat_age where name="Синьорины")),
				((select id from ligs where name="Дебют" and way_id=(select id from ways where way="Восточный танец")),
				(select id from cat_age where name="Грандсиньорины")),
				((select id from ligs where name="Начинающие" and way_id=(select id from ways where way="Восточный танец")),
				(select id from cat_age where name="Грандсиньорины")),
				((select id from ligs where name="Продолжающие" and way_id=(select id from ways where way="Восточный танец")),
				(select id from cat_age where name="Грандсиньорины")),
				((select id from ligs where name="Любители" and way_id=(select id from ways where way="Восточный танец")),
				(select id from cat_age where name="Грандсиньорины")),
				((select id from ligs where name="Профессионалы" and way_id=(select id from ways where way="Восточный танец")),
				(select id from cat_age where name="Грандсиньорины")),
				((select id from ligs where name="Дебют" and way_id=(select id from ways where way="Современная хореография")),
				(select id from cat_age where name="Мини-беби")),
				((select id from ligs where name="Открытая лига" and way_id=(select id from ways where way="Современная хореография")),
				(select id from cat_age where name="Мини-беби")),
				((select id from ligs where name="Дебют" and way_id=(select id from ways where way="Современная хореография")),
				(select id from cat_age where name="Беби")),
				((select id from ligs where name="Открытая лига" and way_id=(select id from ways where way="Современная хореография")),
				(select id from cat_age where name="Беби")),
				((select id from ligs where name="Дебют" and way_id=(select id from ways where way="Современная хореография")),
				(select id from cat_age where name="Ювеналы 1")),
				((select id from ligs where name="Открытая лига" and way_id=(select id from ways where way="Современная хореография")),
				(select id from cat_age where name="Ювеналы 1")),
				((select id from ligs where name="Дебют" and way_id=(select id from ways where way="Современная хореография")),
				(select id from cat_age where name="Ювеналы 2")),
				((select id from ligs where name="Открытая лига" and way_id=(select id from ways where way="Современная хореография")),
				(select id from cat_age where name="Ювеналы 2")),
				((select id from ligs where name="Дебют" and way_id=(select id from ways where way="Современная хореография")),
				(select id from cat_age where name="Юниоры 1")),
				((select id from ligs where name="Открытая лига" and way_id=(select id from ways where way="Современная хореография")),
				(select id from cat_age where name="Юниоры 1")),
				((select id from ligs where name="Дебют" and way_id=(select id from ways where way="Современная хореография")),
				(select id from cat_age where name="Юниоры 2")),
				((select id from ligs where name="Открытая лига" and way_id=(select id from ways where way="Современная хореография")),
				(select id from cat_age where name="Юниоры 2")),
				((select id from ligs where name="Дебют" and way_id=(select id from ways where way="Современная хореография")),
				(select id from cat_age where name="Молодёжь")),
				((select id from ligs where name="Открытая лига" and way_id=(select id from ways where way="Современная хореография")),
				(select id from cat_age where name="Молодёжь")),
				((select id from ligs where name="Профессионалы" and way_id=(select id from ways where way="Современная хореография")),
				(select id from cat_age where name="Молодёжь")),
				((select id from ligs where name="Дебют" and way_id=(select id from ways where way="Современная хореография")),
				(select id from cat_age where name="Взрослые")),
				((select id from ligs where name="Открытая лига" and way_id=(select id from ways where way="Современная хореография")),
				(select id from cat_age where name="Взрослые")),
				((select id from ligs where name="Профессионалы" and way_id=(select id from ways where way="Современная хореография")),
				(select id from cat_age where name="Взрослые")),
				((select id from ligs where name="Дебют" and way_id=(select id from ways where way="Современная хореография")),
				(select id from cat_age where name="Синьорины")),
				((select id from ligs where name="Открытая лига" and way_id=(select id from ways where way="Современная хореография")),
				(select id from cat_age where name="Синьорины")),
				((select id from ligs where name="Профессионалы" and way_id=(select id from ways where way="Современная хореография")),
				(select id from cat_age where name="Синьорины")),
				((select id from ligs where name="Дебют" and way_id=(select id from ways where way="Современная хореография")),
				(select id from cat_age where name="Грандсиньорины")),
				((select id from ligs where name="Открытая лига" and way_id=(select id from ways where way="Современная хореография")),
				(select id from cat_age where name="Грандсиньорины")),
				((select id from ligs where name="Профессионалы" and way_id=(select id from ways where way="Современная хореография")),
				(select id from cat_age where name="Грандсиньорины"))
				';
        $this->db->query($showligs);
        $age='insert into cat_age (name,min_age,max_age,dancers_count) values'
                . '("Мини-беби",2,5,0),'
                . '("Беби",6,7,0),'
                . '("Мини-беби+Беби",2,7,2),'
                . '("Ювеналы 1",8,9,0),'
                . '("Ювеналы 2",10,11,0),'
                . '("Юниоры 1",12,13,0),'
                . '("Юниоры 2",14,15,0),'
                . '("Ювеналы+Юниоры",8,15,2),'
                . '("Молодёжь",16,22,0),'
                . '("Взрослые",21,35,0),'
                . '("Молодёжь+Взрослые",16,35,2),'
                . '("Синьорины",36,45,0),'
                . '("Грандсиньорины",46,100,0),'
                . '("Разновозрастной",2,100,0)';
        $this->db->query($age);
        $reight='insert into reight(minn,maxn,reight,points)
		values
		(1,4,1,1),
		(5,10,1,2),(5,10,2,1),
		(11,16,1,3),(11,16,2,2),(11,16,3,1),
		(17,22,1,3),(17,22,2,2),(17,22,3,2),(17,22,4,1),
		(23,28,1,4),(23,28,2,3),(23,28,3,2),(23,28,4,2),(23,28,5,1),
		(29,32,1,4),(29,32,2,3),(29,32,3,1),(29,32,4,1),(29,32,5,1),(29,32,6,1),
		(34,40,1,4),(34,40,2,3),(34,40,3,3),(34,40,4,2),(34,40,5,2),(34,40,6,2),(34,40,7,1),
		(41,46,1,4),(41,46,2,3),(41,46,3,3),(41,46,4,2),(41,46,5,2),(41,46,6,2),(41,46,7,2),(41,46,8,1),
		(47,52,1,5),(47,52,2,4),(47,52,3,3),(47,52,4,3),(47,52,5,2),(47,52,6,2),(47,52,7,2),(47,52,8,2),(47,52,9,1),
		(53,58,1,5),(53,58,2,4),(53,58,3,3),(53,58,4,3),(53,58,5,2),(53,58,6,2),(53,58,7,2),(53,58,8,2),(53,58,9,2),(53,58,10,1),
		(59,64,1,5),(59,64,2,4),(59,64,3,3),(59,64,4,3),(59,64,5,3),(59,64,6,2),(59,64,6,2),(59,64,8,2),(59,64,9,2),(59,64,10,2),(59,64,11,1),
		(65,70,1,5),(65,70,2,4),(65,70,3,3),(65,70,4,3),(65,70,5,3),(65,70,6,2),(65,70,7,2),(65,70,8,2),(65,70,8,2),(65,70,10,2),(65,70,11,2),(65,70,12,1),
		(71,76,1,5),(71,76,2,4),(71,76,3,4),(71,76,4,3),(71,76,5,3),(71,76,6,2),(71,76,7,2),(71,76,8,2),(71,76,9,2),(71,76,10,2),(71,76,11,2),(71,76,12,2),(71,76,13,1),
		(77,82,1,5),(77,82,2,4),(77,82,3,4),(77,82,4,3),(77,82,5,3),(77,82,6,3),(77,82,7,2),(77,82,8,2),(77,82,9,2),(77,82,10,2),(77,82,11,2),(77,82,12,2),(77,82,13,2),(77,82,14,1),
		(83,88,1,5),(83,88,2,4),(83,88,3,4),(83,88,4,3),(83,88,5,3),(83,88,6,3),(83,88,7,3),(83,88,8,2),(83,88,9,2),(83,88,10,2),(83,88,11,2),(83,88,12,2),(83,88,13,2),(83,88,14,2),(83,88,15,1),
		(90,95,1,5),(90,95,2,4),(90,95,3,4),(90,95,4,3),(90,95,5,3),(90,95,6,3),(90,95,7,3),(90,95,8,2),(90,95,9,2),(90,95,10,2),(90,95,11,2),(90,95,12,2),(90,95,13,2),(90,95,14,2),(90,95,15,2),(90,95,16,1),
		(96,100,1,6),(96,100,2,5),(96,100,3,4),(96,100,4,4),(96,100,5,3),(96,100,6,3),(96,100,7,3),(96,100,8,3),(96,100,9,2),(96,100,10,2),(96,100,11,2),(96,100,12,2),(96,100,13,2),(96,100,14,2),(96,100,15,2),(96,100,16,2),(96,100,17,1)
		';
        $this->db->query($reight);*/
        return true;
	}
}