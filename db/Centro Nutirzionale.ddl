-- *********************************************
-- * SQL MySQL generation                      
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.2              
-- * Generator date: Sep 14 2021              
-- * Generation date: Tue May 21 17:27:21 2024 
-- * LUN file: C:\Users\Utente\Desktop\Uni\2 Anno\Data Base\elaborato\Centro Nutirzionale.lun 
-- * Schema: Schema Logico finale/1 
-- ********************************************* 


-- Database Section
-- ________________ 

create database centronutrizionale;
use centronutrizionale;


-- Tables Section
-- _____________ 

create table ALIMENTO (
     NomeAlimento char(1) not null,
     TipoAlimento char(1) not null,
     constraint ID_ALIMENTO_ID primary key (NomeAlimento));

create table ALIMENTO_ALTERNATIVO (
     Pos_CodiceScheda char(1) not null,
     Pos_CodTabPasti char(1) not null,
     Pos_NomeAlimento char(1) not null,
     Pos_QuantitaPrescr char(1) not null,
     NomeAlimento char(1) not null,
     QuantitaAlter char(1) not null,
     constraint ID_ALIMENTO_ALTERNATIVO_ID primary key (Pos_CodiceScheda, Pos_CodTabPasti, Pos_NomeAlimento, Pos_QuantitaPrescr, NomeAlimento, QuantitaAlter));

create table ALIMENTO_PRESCRITTO (
     CodiceScheda char(1) not null,
     CodTabPasti char(1) not null,
     NomeAlimento char(1) not null,
     QuantitaPrescr char(1) not null,
     constraint ID_ALIMENTO_PRESCRITTO_ID primary key (CodiceScheda, CodTabPasti, NomeAlimento, QuantitaPrescr));

create table appartiene (
     CodiceScheda char(1) not null,
     CodTabPasti char(1) not null,
     NomeAlimento char(1) not null,
     QuantitaPrescr char(1) not null,
     NomePasto char(1) not null,
     constraint ID_appartiene_ID primary key (NomePasto, CodiceScheda, CodTabPasti, NomeAlimento, QuantitaPrescr));

create table CLIENTE (
     CAP char(1) not null,
     Citta char(1) not null,
     Nome char(1) not null,
     Cognome char(1) not null,
     Email char(1) not null,
     Password char(1) not null,
     IDClinete char(1) not null,
     constraint ID_CLIENTE_ID primary key (IDClinete));

create table CONSIGLIO (
     CodiceScheda char(1) not null,
     CodTabCons char(1) not null,
     Descrizione char(1) not null,
     constraint ID_CONSIGLIO_ID primary key (CodiceScheda, CodTabCons, Descrizione));

create table CONSULENZA (
     IDNutrizionista char(1) not null,
     IDClinete char(1) not null,
     OraInizio char(1) not null,
     Giorno char(1) not null,
     CodiceScheda char(1) not null,
     OraFine char(1) not null,
     Presenza char(1),
     Online char(1),
     Tipo char(1) not null,
     constraint ID_CONSULENZA_ID primary key (IDClinete, IDNutrizionista, OraInizio, Giorno),
     constraint FKproduce_ID unique (CodiceScheda));

create table DIARIO (
     IDClinete char(1) not null,
     Data char(1) not null,
     Ora char(1) not null,
     CodDiario char(1) not null,
     constraint ID_DIARIO_ID primary key (IDClinete, Data, Ora, CodDiario),
     constraint FKcomporta_ID unique (IDClinete, Data, Ora));

create table ESERCIZIO (
     NomeEsercizio char(1) not null,
     Descrizione char(1) not null,
     constraint ID_ESERCIZIO_ID primary key (NomeEsercizio));

create table ESERCIZIO_IN_TABELLA (
     CodiceScheda char(1) not null,
     CodTabAll char(1) not null,
     Posizione char(1) not null,
     FrequenzaSettimanale char(1) not null,
     Durata char(1) not null,
     NomeEsercizio char(1) not null,
     constraint ID_ESERCIZIO_IN_TABELLA_ID primary key (CodiceScheda, CodTabAll, Posizione));

create table INDIRIZZO_PROF (
     IDNutrizionista char(1) not null,
     Citta char(1) not null,
     CAP char(1) not null,
     Via char(1) not null,
     NCivico char(1) not null,
     constraint FKriferimento_ID primary key (IDNutrizionista));

create table INFORMAZIONE (
     IDNutrizionista char(1) not null,
     Esperienza char(1),
     Specializzazione char(1),
     Orari char(1) not null,
     Telefono char(1),
     constraint FKpossiede_inf_ID primary key (IDNutrizionista));

create table NOTE (
     IDClinete char(1) not null,
     Data char(1) not null,
     Ora char(1) not null,
     CodDiario char(1) not null,
     Nota char(1) not null,
     OrarioNota char(1) not null,
     OggettoNota char(1) not null,
     IdNota char(1) not null,
     constraint ID_NOTE_ID primary key (IDClinete, Data, Ora, CodDiario, IdNota));

create table NUTRIZIONISTA (
     Nome char(1) not null,
     Cognome char(1) not null,
     Email char(1) not null,
     IDNutrizionista char(1) not null,
     Password char(1) not null,
     constraint ID_NUTRIZIONISTA_ID primary key (IDNutrizionista));

create table OBIETTIVO (
     Descrizione char(1) not null,
     CodiceObiettivo char(1) not null,
     constraint ID_OBIETTIVO_ID primary key (CodiceObiettivo));

create table PASTO (
     NomePasto char(1) not null,
     constraint ID_PASTO_ID primary key (NomePasto));

create table QUALIFICA (
     Titolo char(1) not null,
     constraint ID_QUALIFICA_ID primary key (Titolo));

create table possiede_q (
     IDNutrizionista char(1) not null,
     Titolo char(1) not null,
     constraint ID_possiede_q_ID primary key (IDNutrizionista, Titolo));

create table recensione (
     IDClinete char(1) not null,
     IDNutrizionista char(1) not null,
     Voto char(1) not null,
     Commento char(1),
     constraint ID_recensione_ID primary key (IDNutrizionista, IDClinete));

create table SCELTA (
     IDClinete char(1) not null,
     Data char(1) not null,
     Ora char(1) not null,
     IDNutrizionista char(1) not null,
     constraint ID_SCELTA_ID primary key (IDClinete, Data, Ora));

create table SCHEDA (
     CodiceScheda char(1) not null,
     dataInizioValidita char(1) not null,
     Durata char(1) not null,
     IDClinete char(1) not null,
     CodiceObiettivo char(1) not null,
     constraint ID_SCHEDA_ID primary key (CodiceScheda));

create table TABELLA_ALLENAMENTO (
     CodiceScheda char(1) not null,
     CodTabAll char(1) not null,
     constraint ID_TABELLA_ALLENAMENTO_ID primary key (CodiceScheda, CodTabAll),
     constraint FKcomposizione_a_ID unique (CodiceScheda));

create table TABELLA_CONSIGLO (
     CodiceScheda char(1) not null,
     CodTabCons char(1) not null,
     constraint ID_TABELLA_CONSIGLO_ID primary key (CodiceScheda, CodTabCons),
     constraint FKcomposizione_c_ID unique (CodiceScheda));

create table TABELLA_PASTO (
     CodiceScheda char(1) not null,
     CodTabPasti char(1) not null,
     constraint ID_TABELLA_PASTO_ID primary key (CodiceScheda, CodTabPasti),
     constraint FKcomposizione_p_ID unique (CodiceScheda));

create table TIPO_CONSULENZA (
     Tariffa char(1) not null,
     Tipo char(1) not null,
     constraint ID_TIPO_CONSULENZA_ID primary key (Tipo));


-- Constraints Section
-- ___________________ 

alter table ALIMENTO_ALTERNATIVO add constraint FKtipologia_alt_FK
     foreign key (NomeAlimento)
     references ALIMENTO (NomeAlimento);

alter table ALIMENTO_ALTERNATIVO add constraint FKpossiede_alt
     foreign key (Pos_CodiceScheda, Pos_CodTabPasti, Pos_NomeAlimento, Pos_QuantitaPrescr)
     references ALIMENTO_PRESCRITTO (CodiceScheda, CodTabPasti, NomeAlimento, QuantitaPrescr);

-- Not implemented
-- alter table ALIMENTO_PRESCRITTO add constraint ID_ALIMENTO_PRESCRITTO_CHK
--     check(exists(select * from appartiene
--                  where appartiene.CodiceScheda = CodiceScheda and appartiene.CodTabPasti = CodTabPasti and appartiene.NomeAlimento = NomeAlimento and appartiene.QuantitaPrescr = QuantitaPrescr)); 

alter table ALIMENTO_PRESCRITTO add constraint FKtipologia_pres_FK
     foreign key (NomeAlimento)
     references ALIMENTO (NomeAlimento);

alter table ALIMENTO_PRESCRITTO add constraint FKcontiene
     foreign key (CodiceScheda, CodTabPasti)
     references TABELLA_PASTO (CodiceScheda, CodTabPasti);

alter table appartiene add constraint FKapp_PAS
     foreign key (NomePasto)
     references PASTO (NomePasto);

alter table appartiene add constraint FKapp_ALI_FK
     foreign key (CodiceScheda, CodTabPasti, NomeAlimento, QuantitaPrescr)
     references ALIMENTO_PRESCRITTO (CodiceScheda, CodTabPasti, NomeAlimento, QuantitaPrescr);

alter table CONSIGLIO add constraint FKraggruppa
     foreign key (CodiceScheda, CodTabCons)
     references TABELLA_CONSIGLO (CodiceScheda, CodTabCons);

alter table CONSULENZA add constraint FKtipologia_cons_FK
     foreign key (Tipo)
     references TIPO_CONSULENZA (Tipo);

alter table CONSULENZA add constraint FKrichiesta
     foreign key (IDClinete)
     references CLIENTE (IDClinete);

alter table CONSULENZA add constraint FKproduce_FK
     foreign key (CodiceScheda)
     references SCHEDA (CodiceScheda);

alter table CONSULENZA add constraint FKpreseide_FK
     foreign key (IDNutrizionista)
     references NUTRIZIONISTA (IDNutrizionista);

alter table DIARIO add constraint FKcomporta_FK
     foreign key (IDClinete, Data, Ora)
     references SCELTA (IDClinete, Data, Ora);

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
     foreign key (IDClinete, Data, Ora, CodDiario)
     references DIARIO (IDClinete, Data, Ora, CodDiario);

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
     foreign key (IDClinete)
     references CLIENTE (IDClinete);

-- Not implemented
-- alter table SCELTA add constraint ID_SCELTA_CHK
--     check(exists(select * from DIARIO
--                  where DIARIO.IDClinete = IDClinete and DIARIO.Data = Data and DIARIO.Ora = Ora)); 

alter table SCELTA add constraint FKsubisce_FK
     foreign key (IDNutrizionista)
     references NUTRIZIONISTA (IDNutrizionista);

alter table SCELTA add constraint FKesegue
     foreign key (IDClinete)
     references CLIENTE (IDClinete);

-- Not implemented
-- alter table SCHEDA add constraint ID_SCHEDA_CHK
--     check(exists(select * from CONSULENZA
--                  where CONSULENZA.CodiceScheda = CodiceScheda)); 

alter table SCHEDA add constraint FKpossiede_FK
     foreign key (IDClinete)
     references CLIENTE (IDClinete);

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
     on ALIMENTO_ALTERNATIVO (Pos_CodiceScheda, Pos_CodTabPasti, Pos_NomeAlimento, Pos_QuantitaPrescr, NomeAlimento, QuantitaAlter);

create index FKtipologia_alt_IND
     on ALIMENTO_ALTERNATIVO (NomeAlimento);

create unique index ID_ALIMENTO_PRESCRITTO_IND
     on ALIMENTO_PRESCRITTO (CodiceScheda, CodTabPasti, NomeAlimento, QuantitaPrescr);

create index FKtipologia_pres_IND
     on ALIMENTO_PRESCRITTO (NomeAlimento);

create unique index ID_appartiene_IND
     on appartiene (NomePasto, CodiceScheda, CodTabPasti, NomeAlimento, QuantitaPrescr);

create index FKapp_ALI_IND
     on appartiene (CodiceScheda, CodTabPasti, NomeAlimento, QuantitaPrescr);

create unique index ID_CLIENTE_IND
     on CLIENTE (IDClinete);

create unique index ID_CONSIGLIO_IND
     on CONSIGLIO (CodiceScheda, CodTabCons, Descrizione);

create unique index ID_CONSULENZA_IND
     on CONSULENZA (IDClinete, IDNutrizionista, OraInizio, Giorno);

create index FKtipologia_cons_IND
     on CONSULENZA (Tipo);

create unique index FKproduce_IND
     on CONSULENZA (CodiceScheda);

create index FKpreseide_IND
     on CONSULENZA (IDNutrizionista);

create unique index ID_DIARIO_IND
     on DIARIO (IDClinete, Data, Ora, CodDiario);

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
     on NOTE (IDClinete, Data, Ora, CodDiario, IdNota);

create unique index ID_NUTRIZIONISTA_IND
     on NUTRIZIONISTA (IDNutrizionista);

create unique index ID_OBIETTIVO_IND
     on OBIETTIVO (CodiceObiettivo);

create unique index ID_PASTO_IND
     on PASTO (NomePasto);

create unique index ID_QUALIFICA_IND
     on QUALIFICA (Titolo);

create unique index ID_possiede_q_IND
     on possiede_q (IDNutrizionista, Titolo);

create index FKpos_QUA_IND
     on possiede_q (Titolo);

create unique index ID_recensione_IND
     on recensione (IDNutrizionista, IDClinete);

create index FKrec_CLI_IND
     on recensione (IDClinete);

create unique index ID_SCELTA_IND
     on SCELTA (IDClinete, Data, Ora);

create index FKsubisce_IND
     on SCELTA (IDNutrizionista);

create unique index ID_SCHEDA_IND
     on SCHEDA (CodiceScheda);

create index FKpossiede_IND
     on SCHEDA (IDClinete);

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

