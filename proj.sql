create schema Movie_review;
use Movie_review;

create table User(
    id int not null auto_increment primary key,
    username varchar(50) not null,
    email varchar(50) not null,
    password varchar(20) not null,
    usertype varchar(20) not null
    );
create table Movies(
    Mov_id int not null auto_increment primary key,
    Mov_name varchar(50) not null,
    Mov_poster varchar(300) not null,
    Mov_cost numeric(10,2) not null,
    Mov_date date not null,
    Mov_detail varchar(1000) not null
    );
create table Actor(
    Mov_id int,
    Act_id int not null auto_increment,
    Act_name varchar(50) not null,
    Act_rating numeric(10,2) not null,
    Act_detail varchar(1000) not null,
    Act_portrait varchar(300) not null,
    primary key(Act_id, Mov_id),
    foreign key (Mov_id) references Movies(Mov_id)
    );
create table Cinema(
    Mov_id int,
	Cin_id int not null auto_increment primary key,
    Cin_name varchar(100) not null,
    Cin_showtime varchar(20) not null,
    Cin_location varchar(100) not null,
    foreign key (Mov_id) references Movies(Mov_id)
    );

insert into User values(1, 'Pat', 'admin@gmail.com', 'PLN6821', 'admin');

insert into Movies values(1, 'Parasite', 'https://cdn.discordapp.com/attachments/878906669747281920/921364987115606036/263672562_1015132565700252_8535665771655556426_n.jpg', 190.00, '2019-07-25', '--');
insert into Actor values(1, 1, 'Kang ho Song', 8.5, '--', 'https://cdn.discordapp.com/attachments/878906669747281920/921364987337916426/263793769_946763379260537_2070660062876097019_n.jpg');
insert into Cinema values(1, 1, 'Major', '10 : 30', 'Major Cineplex Ratchayothin');

insert into Movies values(2, 'The Suicide Squad', 'https://cdn.discordapp.com/attachments/878906669747281920/921364986578751498/257194223_449686996491091_142649479966741856_n.jpg', 190.00, '2021-08-05', '--');
insert into Actor values(2, 2, 'Margot Elise Robbie', 7.3, '--', 'https://cdn.discordapp.com/attachments/878906669747281920/921364986889138197/263729743_629963558446864_5203747932860830162_n.jpg');
insert into Cinema values(2, 2, 'Major', '12 : 00', 'Major Cineplex Future Park Rangsit');

insert into Movies values(3, 'Joker', 'https://cdn.discordapp.com/attachments/878906669747281920/921368193140932638/260822139_4505367759559236_8202367828859391671_n.jpg', 200.00, '2021-10-03', '--');
insert into Actor values(3, 3, 'Joaquin Rafael Phoenix', 8.4, '--', 'https://cdn.discordapp.com/attachments/878906669747281920/921368193375809556/263849944_287847756690998_3069879685504887880_n.jpg');
insert into Cinema values(3, 3, 'Major', '13 : 30', 'Major Cineplex Future Park Rangsit');

insert into Movies values(4, 'Maleficent : Mistress of Evil', 'https://cdn.discordapp.com/attachments/878906669747281920/921368192486625351/264183118_3115667602035245_7012774484704607264_n.jpg', 200.00, '2019-10-16', '--');
insert into Actor values(4, 4, 'Angelina Jolie', 6.6, '--', 'https://cdn.discordapp.com/attachments/878906669747281920/921368192880902164/263662100_516074469391503_9191275836239031322_n.jpg');
insert into Cinema values(4, 4, 'Major', '11 : 00', 'Major Cineplex Lotus Bang Pakok');

insert into Movies values(5, 'Spider man far from home', 'https://cdn.discordapp.com/attachments/878906669747281920/921375380215062608/265237440_715103166138309_3451540950757951439_n.jpg', 200.00, '2019-12-23', '--');
insert into Actor values(5, 5, 'Tom Holland', 7.4, '--', 'https://cdn.discordapp.com/attachments/878906669747281920/921375380575748147/263760580_596261501641016_2866794188325625376_n.jpg');
insert into Cinema values(5, 5, 'Major', '14 : 30', 'Major Cineplex Ratchayothin');

insert into Movies values(6, 'Fantastic Beasts: The Crimes of Grindelwald', 'https://cdn.discordapp.com/attachments/878906669747281920/921375379661393920/264137855_444016294014710_7128464143448249962_n.jpg', 220.00, '2018-11-08', '--');
insert into Actor values(6, 6, 'Edward John David Redmayne', 6.5, '--', 'https://cdn.discordapp.com/attachments/878906669747281920/921375379980165141/263809051_519400825696138_690445793405506071_n.jpg');
insert into Cinema values(6, 6, 'Major', '11 : 30', 'Major Cineplex Lotus Bang Pakok');

insert into Movies values(7, 'Shang-Chi and The Legend of the Ten Rings', 'https://cdn.discordapp.com/attachments/878906669747281920/921379725212012544/255137374_618912822490415_6627243157926259114_n.jpg', 200.00, '2021-10-13', '--');
insert into Actor values(7, 7, 'Simu Liu', 7.5, '--', 'https://cdn.discordapp.com/attachments/878906669747281920/921379725585285150/263953684_666844701389810_2124258949843653322_n.jpg');
insert into Cinema values(7, 7, 'Major', '15 : 40', 'Major Cineplex Central Rama II');

insert into Movies values(8, 'A Quiet Place Part II', 'https://cdn.discordapp.com/attachments/878906669747281920/921379724972929034/266309455_214625660850752_7726232184173028533_n.jpg', 200.00, '2021-10-01', '--');
insert into Actor values(8, 8, 'Emily Olivia Leah Blunt', 7.3, '--', 'https://cdn.discordapp.com/attachments/878906669747281920/921379724687720478/264098267_431292268489231_6550820464433961271_n.jpg');
insert into Cinema values(8, 8, 'Major', '16 : 30', 'Major Cineplex Ratchayothin');

insert into Movies values(9, 'Venom: Let There Be Carnage', 'https://cdn.discordapp.com/attachments/878906669747281920/921379724423483412/262524735_1312749092572149_9151515697318393119_n.jpg', 200.00, '2021-12-17', '--');
insert into Actor values(9, 9, 'Edward Thomas Hardy', 6.0, '--', 'https://cdn.discordapp.com/attachments/878906669747281920/921379724192788561/267611003_328171532463216_3302518943474443862_n.jpg');
insert into Cinema values(9, 9, 'Major', '19 : 00', 'Paragon Cineplex');