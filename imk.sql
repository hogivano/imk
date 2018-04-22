/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     4/22/2018 6:57:43 PM                         */
/*==============================================================*/


drop table if exists bentuks;

drop table if exists jawabans;

drop table if exists pertanyaan_selesais;

drop table if exists pertanyaans;

drop table if exists poin_users;

drop table if exists users;

drop table if exists warnas;

/*==============================================================*/
/* Table: bentuks                                               */
/*==============================================================*/
create table bentuks
(
   id_bentuks           int not null,
   bentuk               text not null,
   primary key (id_bentuks)
)
auto_increment = 1;

/*==============================================================*/
/* Table: jawabans                                              */
/*==============================================================*/
create table jawabans
(
   id_jawabans          int not null,
   id_pertanyaans       int not null,
   jawaban              text not null,
   benar_salah          bool not null,
   primary key (id_jawabans)
)
auto_increment = 1;

/*==============================================================*/
/* Table: pertanyaan_selesais                                   */
/*==============================================================*/
create table pertanyaan_selesais
(
   id_pertanyaan_selesais int not null,
   id_pertanyaans       int not null,
   id_users             int not null,
   primary key (id_pertanyaan_selesais)
)
auto_increment = 1;

/*==============================================================*/
/* Table: pertanyaans                                           */
/*==============================================================*/
create table pertanyaans
(
   id_pertanyaans       int not null,
   id_warnas            int not null,
   id_bentuks           int not null,
   judul                text not null,
   pertanyaan           text not null,
   poin                 int not null,
   primary key (id_pertanyaans)
)
auto_increment = 1;

/*==============================================================*/
/* Table: poin_users                                            */
/*==============================================================*/
create table poin_users
(
   id_poin_users        int not null,
   id_users             int not null,
   poin_users           int not null,
   primary key (id_poin_users)
)
auto_increment = 1;

/*==============================================================*/
/* Table: users                                                 */
/*==============================================================*/
create table users
(
   id_users             int not null,
   nama_lengkap         text not null,
   email                text not null,
   password             text not null,
   auth_key             text not null,
   remember_token       text,
   role                 int not null,
   created_at           datetime not null,
   updated_at           datetime not null,
   primary key (id_users)
)
auto_increment = 1;

/*==============================================================*/
/* Table: warnas                                                */
/*==============================================================*/
create table warnas
(
   id_warnas            int not null,
   warna                text not null,
   hex                  text not null,
   primary key (id_warnas)
)
auto_increment = 1;

alter table jawabans add constraint FK_pertanyaan_dan_jawaban foreign key (id_pertanyaans)
      references pertanyaans (id_pertanyaans) on delete restrict on update restrict;

alter table pertanyaan_selesais add constraint FK_pertanyaan_selesai foreign key (id_pertanyaans)
      references pertanyaans (id_pertanyaans) on delete restrict on update restrict;

alter table pertanyaan_selesais add constraint FK_pertanyaan_user_selesai foreign key (id_users)
      references users (id_users) on delete restrict on update restrict;

alter table pertanyaans add constraint FK_bentuk_pertanyaan foreign key (id_bentuks)
      references bentuks (id_bentuks) on delete restrict on update restrict;

alter table pertanyaans add constraint FK_pertanyaan_warna foreign key (id_warnas)
      references warnas (id_warnas) on delete restrict on update restrict;

alter table poin_users add constraint FK_poin_users foreign key (id_users)
      references users (id_users) on delete restrict on update restrict;

