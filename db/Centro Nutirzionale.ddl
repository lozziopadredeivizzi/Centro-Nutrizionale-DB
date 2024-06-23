-- *********************************************
-- * SQL MySQL generation                      
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.2              
-- * Generator date: Sep 14 2021              
-- * Generation date: Sat Jun 22 20:01:56 2024 
-- * LUN file: C:\Users\Utente\Desktop\Uni\2 Anno\Data Base\elaborato\Centro Nutirzionale.lun 
-- * Schema: centronutrizionale/1 
-- ********************************************* 


-- Database Section
-- ________________ 

create database centronutrizionale1;
use centronutrizionale1;


-- Tables Section
-- _____________ 

create table ALIMENTO (
     NomeAlimento varchar(255) not null,
     TipoAlimento varchar(100) not null,
     constraint ID_ALIMENTO_ID primary key (NomeAlimento));

create table ALIMENTO_ALTERNATIVO (
     Pos_NomePasto varchar(50) not null,
     Pos_CodiceScheda int not null,
     Pos_CodTabPasti int not null,
     Pos_NomeAlimento varchar(255) not null,
     Pos_QuantitaPrescr int not null,
     NomeAlimento varchar(255) not null,
     QuantitaAlter int not null,
     constraint ID_ALIMENTO_ALTERNATIVO_ID primary key (Pos_NomePasto, Pos_CodiceScheda, Pos_CodTabPasti, Pos_NomeAlimento, Pos_QuantitaPrescr, NomeAlimento, QuantitaAlter));

create table ALIMENTO_PRESCRITTO (
     CodiceScheda int not null,
     CodTabPasti int not null,
     NomePasto varchar(50) not null,
     NomeAlimento varchar(255) not null,
     QuantitaPrescr int not null,
     constraint ID_ALIMENTO_PRESCRITTO_ID primary key (NomePasto, CodiceScheda, CodTabPasti, NomeAlimento, QuantitaPrescr));

create table CLIENTE (
     CAP int not null,
     Citta varchar(50) not null,
     Nome varchar(50) not null,
     Cognome varchar(50) not null,
     Email varchar(50) not null,
     Password varchar(255) not null,
     IDCliente int not null AUTO_INCREMENT,
     constraint ID_CLIENTE_ID primary key (IDCliente));

create table CONSIGLIO (
     CodiceScheda int not null,
     CodTabCons int not null,
     Descrizione varchar(255) not null,
     constraint ID_CONSIGLIO_ID primary key (CodiceScheda, CodTabCons, Descrizione));

create table CONSULENZA (
     IDNutrizionista int not null,
     IDCliente int not null,
     OraInizio time not null,
     Giorno date not null,
     CodiceScheda int not null,
     OraFine time not null,
     Completa char not null,
     Presenza char,
     Online char,
     Tipo varchar(20) not null,
     constraint ID_CONSULENZA_ID primary key (IDCliente, IDNutrizionista, OraInizio, Giorno),
     constraint FKproduce_ID unique (CodiceScheda));

create table DIARIO (
     IDCliente int not null,
     Data date not null,
     Ora varchar(10) not null,
     CodDiario int not null,
     IDNutrizionista int not null,
     constraint ID_DIARIO_ID primary key (IDCliente, Data, Ora, CodDiario),
     constraint FKcomporta_ID unique (IDCliente, Data, Ora));

create table ESERCIZIO (
     NomeEsercizio varchar(50) not null,
     Descrizione varchar(255) not null,
     constraint ID_ESERCIZIO_ID primary key (NomeEsercizio));

create table ESERCIZIO_IN_TABELLA (
     CodiceScheda int not null,
     CodTabAll int not null,
     Posizione int not null,
     FrequenzaSettimanale varchar(100) not null,
     Durata varchar(100) not null,
     NomeEsercizio varchar(50) not null,
     constraint ID_ESERCIZIO_IN_TABELLA_ID primary key (CodiceScheda, CodTabAll, Posizione));

create table INDIRIZZO_PROF (
     IDNutrizionista int not null,
     Citta varchar(50) not null,
     CAP int not null,
     Via varchar(50) not null,
     NCivico int not null,
     constraint FKriferimento_ID primary key (IDNutrizionista));

create table INFORMAZIONE (
     IDNutrizionista int not null,
     Esperienza varchar(255),
     Specializzazione varchar(255),
     Orari varchar(255) not null,
     Telefono varchar(10),
     constraint FKpossiede_inf_ID primary key (IDNutrizionista));

create table NOTE (
     IDCliente int not null,
     Data date not null,
     Ora varchar(10) not null,
     CodDiario int not null,
     Nota varchar(255) not null,
     OrarioNota varchar(10) not null,
     OggettoNota varchar(100) not null,
     DataNota date not null,
     IdNota int not null,
     constraint ID_NOTE_ID primary key (IDCliente, Data, Ora, CodDiario, IdNota));

create table NUTRIZIONISTA (
     Nome varchar(50) not null,
     Cognome varchar(50) not null,
     Email varchar(30) not null,
     IDNutrizionista int not null AUTO_INCREMENT,
     Password varchar(255) not null,
     MediaVoti int not null,
     constraint ID_NUTRIZIONISTA_ID primary key (IDNutrizionista));

create table OBIETTIVO (
     Descrizione varchar(100) not null,
     CodiceObiettivo int not null AUTO_INCREMENT,
     constraint ID_OBIETTIVO_ID primary key (CodiceObiettivo));

create table PASTO (
     NomePasto varchar(50) not null,
     constraint ID_PASTO_ID primary key (NomePasto));

create table possiede_q (
     IDNutrizionista int not null,
     Titolo varchar(100) not null,
     constraint ID_possiede_q_ID primary key (IDNutrizionista, Titolo));

create table QUALIFICA (
     Titolo varchar(100) not null,
     constraint ID_QUALIFICA_ID primary key (Titolo));

create table recensione (
     IDCliente int not null,
     IDNutrizionista int not null,
     Voto int not null,
     Commento varchar(255),
     constraint ID_recensione_ID primary key (IDNutrizionista, IDCliente));

create table SCELTA (
     IDCliente int not null,
     Data date not null,
     Ora varchar(10) not null,
     IDNutrizionista int not null,
     constraint ID_SCELTA_ID primary key (IDCliente, Data, Ora));

create table SCHEDA (
     CodiceScheda int not null AUTO_INCREMENT,
     dataInizioValidita date not null,
     Durata int not null,
     IDCliente int not null,
     CodiceObiettivo int not null,
     constraint ID_SCHEDA_ID primary key (CodiceScheda));

create table TABELLA_ALLENAMENTO (
     CodiceScheda int not null,
     CodTabAll int not null,
     constraint ID_TABELLA_ALLENAMENTO_ID primary key (CodiceScheda, CodTabAll),
     constraint FKcomposizione_a_ID unique (CodiceScheda));

create table TABELLA_CONSIGLO (
     CodiceScheda int not null,
     CodTabCons int not null,
     constraint ID_TABELLA_CONSIGLO_ID primary key (CodiceScheda, CodTabCons),
     constraint FKcomposizione_c_ID unique (CodiceScheda));

create table TABELLA_PASTO (
     CodiceScheda int not null,
     CodTabPasti int not null,
     constraint ID_TABELLA_PASTO_ID primary key (CodiceScheda, CodTabPasti),
     constraint FKcomposizione_p_ID unique (CodiceScheda));

create table TIPO_CONSULENZA (
     Tariffa int not null,
     Tipo varchar(20) not null,
     constraint ID_TIPO_CONSULENZA_ID primary key (Tipo));


-- Constraints Section
-- ___________________ 

alter table ALIMENTO_ALTERNATIVO add constraint FKtipologia_alt_FK
     foreign key (NomeAlimento)
     references ALIMENTO (NomeAlimento);

alter table ALIMENTO_ALTERNATIVO add constraint FKpossiede_alt
     foreign key (Pos_NomePasto, Pos_CodiceScheda, Pos_CodTabPasti, Pos_NomeAlimento, Pos_QuantitaPrescr)
     references ALIMENTO_PRESCRITTO (NomePasto, CodiceScheda, CodTabPasti, NomeAlimento, QuantitaPrescr);

alter table ALIMENTO_PRESCRITTO add constraint FKtipologia_pres_FK
     foreign key (NomeAlimento)
     references ALIMENTO (NomeAlimento);

alter table ALIMENTO_PRESCRITTO add constraint FKappartiene
     foreign key (NomePasto)
     references PASTO (NomePasto);

alter table ALIMENTO_PRESCRITTO add constraint FKcontiene_FK
     foreign key (CodiceScheda, CodTabPasti)
     references TABELLA_PASTO (CodiceScheda, CodTabPasti);

alter table CONSIGLIO add constraint FKraggruppa
     foreign key (CodiceScheda, CodTabCons)
     references TABELLA_CONSIGLO (CodiceScheda, CodTabCons);

alter table CONSULENZA add constraint FKtipologia_cons_FK
     foreign key (Tipo)
     references TIPO_CONSULENZA (Tipo);

alter table CONSULENZA add constraint FKrichiesta
     foreign key (IDCliente)
     references CLIENTE (IDCliente);

alter table CONSULENZA add constraint FKproduce_FK
     foreign key (CodiceScheda)
     references SCHEDA (CodiceScheda);

alter table CONSULENZA add constraint FKpreseide_FK
     foreign key (IDNutrizionista)
     references NUTRIZIONISTA (IDNutrizionista);

alter table DIARIO add constraint FKpartecipa_FK
     foreign key (IDNutrizionista)
     references NUTRIZIONISTA (IDNutrizionista);

alter table DIARIO add constraint FKcomporta_FK
     foreign key (IDCliente, Data, Ora)
     references SCELTA (IDCliente, Data, Ora);

alter table ESERCIZIO_IN_TABELLA add constraint FKtipologia_FK
     foreign key (NomeEsercizio)
     references ESERCIZIO (NomeEsercizio);

alter table ESERCIZIO_IN_TABELLA add constraint FKcomposizione_tab_a
     foreign key (CodiceScheda, CodTabAll)
     references TABELLA_ALLENAMENTO (CodiceScheda, CodTabAll);

alter table INDIRIZZO_PROF add constraint FKriferimento_FK
     foreign key (IDNutrizionista)
     references NUTRIZIONISTA (IDNutrizionista);

alter table INFORMAZIONE add constraint FKpossiede_inf_FK
     foreign key (IDNutrizionista)
     references NUTRIZIONISTA (IDNutrizionista);

alter table NOTE add constraint FKpossiede_n
     foreign key (IDCliente, Data, Ora, CodDiario)
     references DIARIO (IDCliente, Data, Ora, CodDiario);

-- Not implemented
-- alter table NUTRIZIONISTA add constraint ID_NUTRIZIONISTA_CHK
--     check(exists(select * from possiede_q
--                  where possiede_q.IDNutrizionista = IDNutrizionista)); 

alter table possiede_q add constraint FKpos_QUA_FK
     foreign key (Titolo)
     references QUALIFICA (Titolo);

alter table possiede_q add constraint FKpos_NUT
     foreign key (IDNutrizionista)
     references NUTRIZIONISTA (IDNutrizionista);

alter table recensione add constraint FKrec_NUT
     foreign key (IDNutrizionista)
     references NUTRIZIONISTA (IDNutrizionista);

alter table recensione add constraint FKrec_CLI_FK
     foreign key (IDCliente)
     references CLIENTE (IDCliente);

-- Not implemented
-- alter table SCELTA add constraint ID_SCELTA_CHK
--     check(exists(select * from DIARIO
--                  where DIARIO.IDCliente = IDCliente and DIARIO.Data = Data and DIARIO.Ora = Ora)); 

alter table SCELTA add constraint FKsubisce_FK
     foreign key (IDNutrizionista)
     references NUTRIZIONISTA (IDNutrizionista);

alter table SCELTA add constraint FKesegue
     foreign key (IDCliente)
     references CLIENTE (IDCliente);

-- Not implemented
-- alter table SCHEDA add constraint ID_SCHEDA_CHK
--     check(exists(select * from CONSULENZA
--                  where CONSULENZA.CodiceScheda = CodiceScheda)); 

alter table SCHEDA add constraint FKpossiede_FK
     foreign key (IDCliente)
     references CLIENTE (IDCliente);

alter table SCHEDA add constraint FKobiettivo_scheda_FK
     foreign key (CodiceObiettivo)
     references OBIETTIVO (CodiceObiettivo);

-- Not implemented
-- alter table TABELLA_ALLENAMENTO add constraint ID_TABELLA_ALLENAMENTO_CHK
--     check(exists(select * from ESERCIZIO_IN_TABELLA
--                  where ESERCIZIO_IN_TABELLA.CodiceScheda = CodiceScheda and ESERCIZIO_IN_TABELLA.CodTabAll = CodTabAll)); 

alter table TABELLA_ALLENAMENTO add constraint FKcomposizione_a_FK
     foreign key (CodiceScheda)
     references SCHEDA (CodiceScheda);

-- Not implemented
-- alter table TABELLA_CONSIGLO add constraint ID_TABELLA_CONSIGLO_CHK
--     check(exists(select * from CONSIGLIO
--                  where CONSIGLIO.CodiceScheda = CodiceScheda and CONSIGLIO.CodTabCons = CodTabCons)); 

alter table TABELLA_CONSIGLO add constraint FKcomposizione_c_FK
     foreign key (CodiceScheda)
     references SCHEDA (CodiceScheda);

-- Not implemented
-- alter table TABELLA_PASTO add constraint ID_TABELLA_PASTO_CHK
--     check(exists(select * from ALIMENTO_PRESCRITTO
--                  where ALIMENTO_PRESCRITTO.CodiceScheda = CodiceScheda and ALIMENTO_PRESCRITTO.CodTabPasti = CodTabPasti)); 

alter table TABELLA_PASTO add constraint FKcomposizione_p_FK
     foreign key (CodiceScheda)
     references SCHEDA (CodiceScheda);


-- Index Section
-- _____________ 

create unique index ID_ALIMENTO_IND
     on ALIMENTO (NomeAlimento);

create unique index ID_ALIMENTO_ALTERNATIVO_IND
     on ALIMENTO_ALTERNATIVO (Pos_NomePasto, Pos_CodiceScheda, Pos_CodTabPasti, Pos_NomeAlimento, Pos_QuantitaPrescr, NomeAlimento, QuantitaAlter);

create index FKtipologia_alt_IND
     on ALIMENTO_ALTERNATIVO (NomeAlimento);

create unique index ID_ALIMENTO_PRESCRITTO_IND
     on ALIMENTO_PRESCRITTO (NomePasto, CodiceScheda, CodTabPasti, NomeAlimento, QuantitaPrescr);

create index FKtipologia_pres_IND
     on ALIMENTO_PRESCRITTO (NomeAlimento);

create index FKcontiene_IND
     on ALIMENTO_PRESCRITTO (CodiceScheda, CodTabPasti);

create unique index ID_CLIENTE_IND
     on CLIENTE (IDCliente);

create unique index ID_CONSIGLIO_IND
     on CONSIGLIO (CodiceScheda, CodTabCons, Descrizione);

create unique index ID_CONSULENZA_IND
     on CONSULENZA (IDCliente, IDNutrizionista, OraInizio, Giorno);

create index FKtipologia_cons_IND
     on CONSULENZA (Tipo);

create unique index FKproduce_IND
     on CONSULENZA (CodiceScheda);

create index FKpreseide_IND
     on CONSULENZA (IDNutrizionista);

create unique index ID_DIARIO_IND
     on DIARIO (IDCliente, Data, Ora, CodDiario);

create index FKpartecipa_IND
     on DIARIO (IDNutrizionista);

create unique index ID_ESERCIZIO_IND
     on ESERCIZIO (NomeEsercizio);

create unique index ID_ESERCIZIO_IN_TABELLA_IND
     on ESERCIZIO_IN_TABELLA (CodiceScheda, CodTabAll, Posizione);

create index FKtipologia_IND
     on ESERCIZIO_IN_TABELLA (NomeEsercizio);

create unique index FKriferimento_IND
     on INDIRIZZO_PROF (IDNutrizionista);

create unique index FKpossiede_inf_IND
     on INFORMAZIONE (IDNutrizionista);

create unique index ID_NOTE_IND
     on NOTE (IDCliente, Data, Ora, CodDiario, IdNota);

create unique index ID_NUTRIZIONISTA_IND
     on NUTRIZIONISTA (IDNutrizionista);

create unique index ID_OBIETTIVO_IND
     on OBIETTIVO (CodiceObiettivo);

create unique index ID_PASTO_IND
     on PASTO (NomePasto);

create unique index ID_possiede_q_IND
     on possiede_q (IDNutrizionista, Titolo);

create index FKpos_QUA_IND
     on possiede_q (Titolo);

create unique index ID_QUALIFICA_IND
     on QUALIFICA (Titolo);

create unique index ID_recensione_IND
     on recensione (IDNutrizionista, IDCliente);

create index FKrec_CLI_IND
     on recensione (IDCliente);

create unique index ID_SCELTA_IND
     on SCELTA (IDCliente, Data, Ora);

create index FKsubisce_IND
     on SCELTA (IDNutrizionista);

create unique index ID_SCHEDA_IND
     on SCHEDA (CodiceScheda);

create index FKpossiede_IND
     on SCHEDA (IDCliente);

create index FKobiettivo_scheda_IND
     on SCHEDA (CodiceObiettivo);

create unique index ID_TABELLA_ALLENAMENTO_IND
     on TABELLA_ALLENAMENTO (CodiceScheda, CodTabAll);

create unique index ID_TABELLA_CONSIGLO_IND
     on TABELLA_CONSIGLO (CodiceScheda, CodTabCons);

create unique index ID_TABELLA_PASTO_IND
     on TABELLA_PASTO (CodiceScheda, CodTabPasti);

create unique index ID_TIPO_CONSULENZA_IND
     on TIPO_CONSULENZA (Tipo);

