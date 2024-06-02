-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 02, 2024 alle 11:04
-- Versione del server: 10.4.28-MariaDB
-- Versione PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `centronutrizionale`
--
create database centronutrizionale;
use centronutrizionale;
-- --------------------------------------------------------

--
-- Struttura della tabella `alimento`
--

CREATE TABLE `alimento` (
  `NomeAlimento` varchar(255) NOT NULL,
  `TipoAlimento` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `alimento_alternativo`
--

CREATE TABLE `alimento_alternativo` (
  `Pos_CodiceScheda` int(11) NOT NULL,
  `Pos_CodTabPasti` int(11) NOT NULL,
  `Pos_NomeAlimento` varchar(255) NOT NULL,
  `Pos_QuantitaPrescr` int(11) NOT NULL,
  `NomeAlimento` varchar(255) NOT NULL,
  `QuantitaAlter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `alimento_prescritto`
--

CREATE TABLE `alimento_prescritto` (
  `CodiceScheda` int(11) NOT NULL,
  `CodTabPasti` int(11) NOT NULL,
  `NomeAlimento` varchar(255) NOT NULL,
  `QuantitaPrescr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `appartiene`
--

CREATE TABLE `appartiene` (
  `CodiceScheda` int(11) NOT NULL,
  `CodTabPasti` int(11) NOT NULL,
  `NomeAlimento` varchar(255) NOT NULL,
  `QuantitaPrescr` int(11) NOT NULL,
  `NomePasto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `cliente`
--

CREATE TABLE `cliente` (
  `CAP` int(11) NOT NULL,
  `Citta` varchar(50) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Cognome` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `IDCliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `cliente`
--

INSERT INTO `cliente` (`CAP`, `Citta`, `Nome`, `Cognome`, `Email`, `Password`, `IDCliente`) VALUES
(47869, 'Sassofeltrio', 'Lorenzo', 'Tordi', 'lorenzotordi9@gmail.com', 'dio', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `consiglio`
--

CREATE TABLE `consiglio` (
  `CodiceScheda` int(11) NOT NULL,
  `CodTabCons` int(11) NOT NULL,
  `Descrizione` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `consulenza`
--

CREATE TABLE `consulenza` (
  `IDNutrizionista` int(11) NOT NULL,
  `IDCliente` int(11) NOT NULL,
  `OraInizio` time NOT NULL,
  `Giorno` date NOT NULL,
  `CodiceScheda` int(11) NOT NULL,
  `OraFine` time NOT NULL,
  `Completa` char(1) NOT NULL,
  `Presenza` char(1) DEFAULT NULL,
  `Online` char(1) DEFAULT NULL,
  `Tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `diario`
--

CREATE TABLE `diario` (
  `IDCliente` int(11) NOT NULL,
  `Data` date NOT NULL,
  `Ora` varchar(10) NOT NULL,
  `CodDiario` int(11) NOT NULL,
  `IDNutrizionista` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `esercizio`
--

CREATE TABLE `esercizio` (
  `NomeEsercizio` varchar(50) NOT NULL,
  `Descrizione` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `esercizio_in_tabella`
--

CREATE TABLE `esercizio_in_tabella` (
  `CodiceScheda` int(11) NOT NULL,
  `CodTabAll` int(11) NOT NULL,
  `Posizione` int(11) NOT NULL,
  `FrequenzaSettimanale` varchar(100) NOT NULL,
  `Durata` varchar(100) NOT NULL,
  `NomeEsercizio` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `indirizzo_prof`
--

CREATE TABLE `indirizzo_prof` (
  `IDNutrizionista` int(11) NOT NULL,
  `Citta` varchar(50) NOT NULL,
  `CAP` int(11) NOT NULL,
  `Via` varchar(50) NOT NULL,
  `NCivico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `indirizzo_prof`
--

INSERT INTO `indirizzo_prof` (`IDNutrizionista`, `Citta`, `CAP`, `Via`, `NCivico`) VALUES
(2, 'Cesena', 47521, 'Via Università', 50),
(3, 'Milano', 20121, 'Via Roma', 25),
(4, 'Roma', 186, 'Via del Corso', 50),
(5, 'Firenze', 50123, 'Via de Tornabuoni', 12),
(6, 'Torino', 10122, 'Via Garibaldi', 33),
(7, 'Napoli', 80134, 'Via Toledo', 90),
(8, 'Bologna', 40121, 'Via Indipendenza', 45),
(9, 'Palermo', 90143, 'Via Libertà', 78),
(10, 'Genova', 16121, 'Via XX Settembre', 60),
(11, 'Venezia', 30124, 'Via San Marco', 2),
(12, 'Bari', 70121, 'Via Spartano', 15);

-- --------------------------------------------------------

--
-- Struttura della tabella `informazione`
--

CREATE TABLE `informazione` (
  `IDNutrizionista` int(11) NOT NULL,
  `Esperienza` varchar(255) DEFAULT NULL,
  `Specializzazione` varchar(255) DEFAULT NULL,
  `Orari` varchar(255) NOT NULL,
  `Telefono` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `informazione`
--

INSERT INTO `informazione` (`IDNutrizionista`, `Esperienza`, `Specializzazione`, `Orari`, `Telefono`) VALUES
(2, '', 'Specializzazione in scienze alimentari', 'dal lunedi al venerdi: 10:00 - 18:00', '3776614861'),
(3, '10 anni', 'Specialista in Nutrizione Clinica', 'Lunedì-Venerdì 09:00-18:00', '329-123456'),
(4, '8 anni', 'Specialista in Nutrizione Sportiva', 'Lunedì-Venerdì 08:00-17:00', '328-987654'),
(5, '12 anni', '', 'Martedì-Sabato 09:30-18:30', '327-112233'),
(6, '15 anni', '', 'Lunedì-Venerdì 10:00-19:00', '326-443322'),
(7, '7 anni', '', 'Lunedì-Giovedì 09:00-17:00', '325-556677'),
(8, '6 anni', '', 'Martedì-Venerdì 08:00-16:00', '324-667788'),
(9, '9 anni', '', 'Lunedì-Venerdì 10:00-18:00', '323-778899'),
(10, '5 anni', '', 'Mercoledì-Domenica 11:00-19:00', '322-889900'),
(11, '14 anni', '', ' Lunedì-Sabato 09:00-17:00', '321-990011'),
(12, '', '', 'Lunedì-Giovedì 08:30-17:30', '320-101112');

-- --------------------------------------------------------

--
-- Struttura della tabella `note`
--

CREATE TABLE `note` (
  `IDCliente` int(11) NOT NULL,
  `Data` date NOT NULL,
  `Ora` varchar(10) NOT NULL,
  `CodDiario` int(11) NOT NULL,
  `Nota` varchar(255) NOT NULL,
  `OrarioNota` varchar(10) NOT NULL,
  `OggettoNota` varchar(100) NOT NULL,
  `IdNota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `nutrizionista`
--

CREATE TABLE `nutrizionista` (
  `Nome` varchar(50) NOT NULL,
  `Cognome` varchar(50) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `IDNutrizionista` int(11) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `MediaVoti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `nutrizionista`
--

INSERT INTO `nutrizionista` (`Nome`, `Cognome`, `Email`, `IDNutrizionista`, `Password`, `MediaVoti`) VALUES
('Erica', 'Bennardo', 'ericabennardo@gmail.com', 2, 'erica1', 0),
('Alessandra', 'Rossi', 'alessandra.rossi@example.com', 3, 'alessandra1', 0),
('Marco', 'Bianchi', 'marco.bianchi@example.com', 4, 'marco1', 0),
('Laura', 'Verdi', 'laura.verdi@example.com', 5, 'laura1', 0),
('Giovanni', 'Neri', 'giovanni.neri@example.com', 6, 'giovanni1', 0),
('Chiara', 'Ferrari', 'chiara.ferrari@example.com', 7, 'chiara1', 0),
('Luca', 'Esposito', 'luca.esposito@example.com', 8, 'luca1', 0),
('Francesca', 'Conti', 'francesca.conti@example.com', 9, 'francesca1', 0),
('Matteo', 'Ricci', 'matteo.ricci@example.com', 10, 'matteo1', 0),
('Elena', 'Colombo', 'elena.colombo@example.com', 11, 'elena1', 0),
('Andrea', 'Fontana', 'andrea.fontana@example.com', 12, 'andrea1', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `obiettivo`
--

CREATE TABLE `obiettivo` (
  `Descrizione` varchar(100) NOT NULL,
  `CodiceObiettivo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `pasto`
--

CREATE TABLE `pasto` (
  `NomePasto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `possiede_q`
--

CREATE TABLE `possiede_q` (
  `IDNutrizionista` int(11) NOT NULL,
  `Titolo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `possiede_q`
--

INSERT INTO `possiede_q` (`IDNutrizionista`, `Titolo`) VALUES
(2, 'Specialista in Disturbi Alimentari'),
(3, 'Dietista Registrato (RD)'),
(4, 'Specialista in Nutrizione Sportiva'),
(5, 'Specialista in Nutrizione Pediatrica'),
(6, 'Specialista in Nutrizione Geriatrica'),
(7, 'Esperto in Nutrizione Comportamentale'),
(8, 'Educatore Alimentare'),
(9, 'Esperto in Nutrizione Preventiva'),
(10, 'Esperto in Nutrizione Olistica'),
(11, 'Consulente di Salute e Benessere'),
(12, 'Specialista in Disturbi Alimentari');

-- --------------------------------------------------------

--
-- Struttura della tabella `qualifica`
--

CREATE TABLE `qualifica` (
  `Titolo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `qualifica`
--

INSERT INTO `qualifica` (`Titolo`) VALUES
('Consulente di Salute e Benessere'),
('Consulente Nutrizionale'),
('Dietista Registrato (RD)'),
('Educatore Alimentare'),
('Esperto in Nutrizione Comportamentale'),
('Esperto in Nutrizione Olistica'),
('Esperto in Nutrizione Preventiva'),
('Specialista in Disturbi Alimentari'),
('Specialista in Nutrizione Clinica'),
('Specialista in Nutrizione Diabetica'),
('Specialista in Nutrizione Geriatrica'),
('Specialista in Nutrizione Oncologica'),
('Specialista in Nutrizione Pediatrica'),
('Specialista in Nutrizione Renale'),
('Specialista in Nutrizione Sportiva');

-- --------------------------------------------------------

--
-- Struttura della tabella `recensione`
--

CREATE TABLE `recensione` (
  `IDCliente` int(11) NOT NULL,
  `IDNutrizionista` int(11) NOT NULL,
  `Voto` int(11) NOT NULL,
  `Commento` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `scelta`
--

CREATE TABLE `scelta` (
  `IDCliente` int(11) NOT NULL,
  `Data` date NOT NULL,
  `Ora` varchar(10) NOT NULL,
  `IDNutrizionista` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `scheda`
--

CREATE TABLE `scheda` (
  `CodiceScheda` int(11) NOT NULL,
  `dataInizioValidita` date NOT NULL,
  `Durata` int(11) NOT NULL,
  `IDCliente` int(11) NOT NULL,
  `CodiceObiettivo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `tabella_allenamento`
--

CREATE TABLE `tabella_allenamento` (
  `CodiceScheda` int(11) NOT NULL,
  `CodTabAll` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `tabella_consiglo`
--

CREATE TABLE `tabella_consiglo` (
  `CodiceScheda` int(11) NOT NULL,
  `CodTabCons` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `tabella_pasto`
--

CREATE TABLE `tabella_pasto` (
  `CodiceScheda` int(11) NOT NULL,
  `CodTabPasti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `tipo_consulenza`
--

CREATE TABLE `tipo_consulenza` (
  `Tariffa` int(11) NOT NULL,
  `Tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `alimento`
--
ALTER TABLE `alimento`
  ADD PRIMARY KEY (`NomeAlimento`),
  ADD UNIQUE KEY `ID_ALIMENTO_IND` (`NomeAlimento`);

--
-- Indici per le tabelle `alimento_alternativo`
--
ALTER TABLE `alimento_alternativo`
  ADD PRIMARY KEY (`Pos_CodiceScheda`,`Pos_CodTabPasti`,`Pos_NomeAlimento`,`Pos_QuantitaPrescr`,`NomeAlimento`,`QuantitaAlter`),
  ADD UNIQUE KEY `ID_ALIMENTO_ALTERNATIVO_IND` (`Pos_CodiceScheda`,`Pos_CodTabPasti`,`Pos_NomeAlimento`,`Pos_QuantitaPrescr`,`NomeAlimento`,`QuantitaAlter`),
  ADD KEY `FKtipologia_alt_IND` (`NomeAlimento`);

--
-- Indici per le tabelle `alimento_prescritto`
--
ALTER TABLE `alimento_prescritto`
  ADD PRIMARY KEY (`CodiceScheda`,`CodTabPasti`,`NomeAlimento`,`QuantitaPrescr`),
  ADD UNIQUE KEY `ID_ALIMENTO_PRESCRITTO_IND` (`CodiceScheda`,`CodTabPasti`,`NomeAlimento`,`QuantitaPrescr`),
  ADD KEY `FKtipologia_pres_IND` (`NomeAlimento`);

--
-- Indici per le tabelle `appartiene`
--
ALTER TABLE `appartiene`
  ADD PRIMARY KEY (`NomePasto`,`CodiceScheda`,`CodTabPasti`,`NomeAlimento`,`QuantitaPrescr`),
  ADD UNIQUE KEY `ID_appartiene_IND` (`NomePasto`,`CodiceScheda`,`CodTabPasti`,`NomeAlimento`,`QuantitaPrescr`),
  ADD KEY `FKapp_ALI_IND` (`CodiceScheda`,`CodTabPasti`,`NomeAlimento`,`QuantitaPrescr`);

--
-- Indici per le tabelle `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`IDCliente`),
  ADD UNIQUE KEY `ID_CLIENTE_IND` (`IDCliente`);

--
-- Indici per le tabelle `consiglio`
--
ALTER TABLE `consiglio`
  ADD PRIMARY KEY (`CodiceScheda`,`CodTabCons`,`Descrizione`),
  ADD UNIQUE KEY `ID_CONSIGLIO_IND` (`CodiceScheda`,`CodTabCons`,`Descrizione`);

--
-- Indici per le tabelle `consulenza`
--
ALTER TABLE `consulenza`
  ADD PRIMARY KEY (`IDCliente`,`IDNutrizionista`,`OraInizio`,`Giorno`),
  ADD UNIQUE KEY `FKproduce_ID` (`CodiceScheda`),
  ADD UNIQUE KEY `ID_CONSULENZA_IND` (`IDCliente`,`IDNutrizionista`,`OraInizio`,`Giorno`),
  ADD UNIQUE KEY `FKproduce_IND` (`CodiceScheda`),
  ADD KEY `FKtipologia_cons_IND` (`Tipo`),
  ADD KEY `FKpreseide_IND` (`IDNutrizionista`);

--
-- Indici per le tabelle `diario`
--
ALTER TABLE `diario`
  ADD PRIMARY KEY (`IDCliente`,`Data`,`Ora`,`CodDiario`),
  ADD UNIQUE KEY `FKcomporta_ID` (`IDCliente`,`Data`,`Ora`),
  ADD UNIQUE KEY `ID_DIARIO_IND` (`IDCliente`,`Data`,`Ora`,`CodDiario`),
  ADD KEY `FKpartecipa_IND` (`IDNutrizionista`);

--
-- Indici per le tabelle `esercizio`
--
ALTER TABLE `esercizio`
  ADD PRIMARY KEY (`NomeEsercizio`),
  ADD UNIQUE KEY `ID_ESERCIZIO_IND` (`NomeEsercizio`);

--
-- Indici per le tabelle `esercizio_in_tabella`
--
ALTER TABLE `esercizio_in_tabella`
  ADD PRIMARY KEY (`CodiceScheda`,`CodTabAll`,`Posizione`),
  ADD UNIQUE KEY `ID_ESERCIZIO_IN_TABELLA_IND` (`CodiceScheda`,`CodTabAll`,`Posizione`),
  ADD KEY `FKtipologia_IND` (`NomeEsercizio`);

--
-- Indici per le tabelle `indirizzo_prof`
--
ALTER TABLE `indirizzo_prof`
  ADD PRIMARY KEY (`IDNutrizionista`),
  ADD UNIQUE KEY `FKriferimento_IND` (`IDNutrizionista`);

--
-- Indici per le tabelle `informazione`
--
ALTER TABLE `informazione`
  ADD PRIMARY KEY (`IDNutrizionista`),
  ADD UNIQUE KEY `FKpossiede_inf_IND` (`IDNutrizionista`);

--
-- Indici per le tabelle `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`IDCliente`,`Data`,`Ora`,`CodDiario`,`IdNota`),
  ADD UNIQUE KEY `ID_NOTE_IND` (`IDCliente`,`Data`,`Ora`,`CodDiario`,`IdNota`);

--
-- Indici per le tabelle `nutrizionista`
--
ALTER TABLE `nutrizionista`
  ADD PRIMARY KEY (`IDNutrizionista`),
  ADD UNIQUE KEY `ID_NUTRIZIONISTA_IND` (`IDNutrizionista`);

--
-- Indici per le tabelle `obiettivo`
--
ALTER TABLE `obiettivo`
  ADD PRIMARY KEY (`CodiceObiettivo`),
  ADD UNIQUE KEY `ID_OBIETTIVO_IND` (`CodiceObiettivo`);

--
-- Indici per le tabelle `pasto`
--
ALTER TABLE `pasto`
  ADD PRIMARY KEY (`NomePasto`),
  ADD UNIQUE KEY `ID_PASTO_IND` (`NomePasto`);

--
-- Indici per le tabelle `possiede_q`
--
ALTER TABLE `possiede_q`
  ADD PRIMARY KEY (`IDNutrizionista`,`Titolo`),
  ADD UNIQUE KEY `ID_possiede_q_IND` (`IDNutrizionista`,`Titolo`),
  ADD KEY `FKpos_QUA_IND` (`Titolo`);

--
-- Indici per le tabelle `qualifica`
--
ALTER TABLE `qualifica`
  ADD PRIMARY KEY (`Titolo`),
  ADD UNIQUE KEY `ID_QUALIFICA_IND` (`Titolo`);

--
-- Indici per le tabelle `recensione`
--
ALTER TABLE `recensione`
  ADD PRIMARY KEY (`IDNutrizionista`,`IDCliente`),
  ADD UNIQUE KEY `ID_recensione_IND` (`IDNutrizionista`,`IDCliente`),
  ADD KEY `FKrec_CLI_IND` (`IDCliente`);

--
-- Indici per le tabelle `scelta`
--
ALTER TABLE `scelta`
  ADD PRIMARY KEY (`IDCliente`,`Data`,`Ora`),
  ADD UNIQUE KEY `ID_SCELTA_IND` (`IDCliente`,`Data`,`Ora`),
  ADD KEY `FKsubisce_IND` (`IDNutrizionista`);

--
-- Indici per le tabelle `scheda`
--
ALTER TABLE `scheda`
  ADD PRIMARY KEY (`CodiceScheda`),
  ADD UNIQUE KEY `ID_SCHEDA_IND` (`CodiceScheda`),
  ADD KEY `FKpossiede_IND` (`IDCliente`),
  ADD KEY `FKobiettivo_scheda_IND` (`CodiceObiettivo`);

--
-- Indici per le tabelle `tabella_allenamento`
--
ALTER TABLE `tabella_allenamento`
  ADD PRIMARY KEY (`CodiceScheda`,`CodTabAll`),
  ADD UNIQUE KEY `FKcomposizione_a_ID` (`CodiceScheda`),
  ADD UNIQUE KEY `ID_TABELLA_ALLENAMENTO_IND` (`CodiceScheda`,`CodTabAll`);

--
-- Indici per le tabelle `tabella_consiglo`
--
ALTER TABLE `tabella_consiglo`
  ADD PRIMARY KEY (`CodiceScheda`,`CodTabCons`),
  ADD UNIQUE KEY `FKcomposizione_c_ID` (`CodiceScheda`),
  ADD UNIQUE KEY `ID_TABELLA_CONSIGLO_IND` (`CodiceScheda`,`CodTabCons`);

--
-- Indici per le tabelle `tabella_pasto`
--
ALTER TABLE `tabella_pasto`
  ADD PRIMARY KEY (`CodiceScheda`,`CodTabPasti`),
  ADD UNIQUE KEY `FKcomposizione_p_ID` (`CodiceScheda`),
  ADD UNIQUE KEY `ID_TABELLA_PASTO_IND` (`CodiceScheda`,`CodTabPasti`);

--
-- Indici per le tabelle `tipo_consulenza`
--
ALTER TABLE `tipo_consulenza`
  ADD PRIMARY KEY (`Tipo`),
  ADD UNIQUE KEY `ID_TIPO_CONSULENZA_IND` (`Tipo`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `cliente`
--
ALTER TABLE `cliente`
  MODIFY `IDCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `nutrizionista`
--
ALTER TABLE `nutrizionista`
  MODIFY `IDNutrizionista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT per la tabella `obiettivo`
--
ALTER TABLE `obiettivo`
  MODIFY `CodiceObiettivo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `scheda`
--
ALTER TABLE `scheda`
  MODIFY `CodiceScheda` int(11) NOT NULL AUTO_INCREMENT;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `alimento_alternativo`
--
ALTER TABLE `alimento_alternativo`
  ADD CONSTRAINT `FKpossiede_alt` FOREIGN KEY (`Pos_CodiceScheda`,`Pos_CodTabPasti`,`Pos_NomeAlimento`,`Pos_QuantitaPrescr`) REFERENCES `alimento_prescritto` (`CodiceScheda`, `CodTabPasti`, `NomeAlimento`, `QuantitaPrescr`),
  ADD CONSTRAINT `FKtipologia_alt_FK` FOREIGN KEY (`NomeAlimento`) REFERENCES `alimento` (`NomeAlimento`);

--
-- Limiti per la tabella `alimento_prescritto`
--
ALTER TABLE `alimento_prescritto`
  ADD CONSTRAINT `FKcontiene` FOREIGN KEY (`CodiceScheda`,`CodTabPasti`) REFERENCES `tabella_pasto` (`CodiceScheda`, `CodTabPasti`),
  ADD CONSTRAINT `FKtipologia_pres_FK` FOREIGN KEY (`NomeAlimento`) REFERENCES `alimento` (`NomeAlimento`);

--
-- Limiti per la tabella `appartiene`
--
ALTER TABLE `appartiene`
  ADD CONSTRAINT `FKapp_ALI_FK` FOREIGN KEY (`CodiceScheda`,`CodTabPasti`,`NomeAlimento`,`QuantitaPrescr`) REFERENCES `alimento_prescritto` (`CodiceScheda`, `CodTabPasti`, `NomeAlimento`, `QuantitaPrescr`),
  ADD CONSTRAINT `FKapp_PAS` FOREIGN KEY (`NomePasto`) REFERENCES `pasto` (`NomePasto`);

--
-- Limiti per la tabella `consiglio`
--
ALTER TABLE `consiglio`
  ADD CONSTRAINT `FKraggruppa` FOREIGN KEY (`CodiceScheda`,`CodTabCons`) REFERENCES `tabella_consiglo` (`CodiceScheda`, `CodTabCons`);

--
-- Limiti per la tabella `consulenza`
--
ALTER TABLE `consulenza`
  ADD CONSTRAINT `FKpreseide_FK` FOREIGN KEY (`IDNutrizionista`) REFERENCES `nutrizionista` (`IDNutrizionista`),
  ADD CONSTRAINT `FKproduce_FK` FOREIGN KEY (`CodiceScheda`) REFERENCES `scheda` (`CodiceScheda`),
  ADD CONSTRAINT `FKrichiesta` FOREIGN KEY (`IDCliente`) REFERENCES `cliente` (`IDCliente`),
  ADD CONSTRAINT `FKtipologia_cons_FK` FOREIGN KEY (`Tipo`) REFERENCES `tipo_consulenza` (`Tipo`);

--
-- Limiti per la tabella `diario`
--
ALTER TABLE `diario`
  ADD CONSTRAINT `FKcomporta_FK` FOREIGN KEY (`IDCliente`,`Data`,`Ora`) REFERENCES `scelta` (`IDCliente`, `Data`, `Ora`),
  ADD CONSTRAINT `FKpartecipa_FK` FOREIGN KEY (`IDNutrizionista`) REFERENCES `nutrizionista` (`IDNutrizionista`);

--
-- Limiti per la tabella `esercizio_in_tabella`
--
ALTER TABLE `esercizio_in_tabella`
  ADD CONSTRAINT `FKcomposizione_tab_a` FOREIGN KEY (`CodiceScheda`,`CodTabAll`) REFERENCES `tabella_allenamento` (`CodiceScheda`, `CodTabAll`),
  ADD CONSTRAINT `FKtipologia_FK` FOREIGN KEY (`NomeEsercizio`) REFERENCES `esercizio` (`NomeEsercizio`);

--
-- Limiti per la tabella `indirizzo_prof`
--
ALTER TABLE `indirizzo_prof`
  ADD CONSTRAINT `FKriferimento_FK` FOREIGN KEY (`IDNutrizionista`) REFERENCES `nutrizionista` (`IDNutrizionista`);

--
-- Limiti per la tabella `informazione`
--
ALTER TABLE `informazione`
  ADD CONSTRAINT `FKpossiede_inf_FK` FOREIGN KEY (`IDNutrizionista`) REFERENCES `nutrizionista` (`IDNutrizionista`);

--
-- Limiti per la tabella `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `FKpossiede_n` FOREIGN KEY (`IDCliente`,`Data`,`Ora`,`CodDiario`) REFERENCES `diario` (`IDCliente`, `Data`, `Ora`, `CodDiario`);

--
-- Limiti per la tabella `possiede_q`
--
ALTER TABLE `possiede_q`
  ADD CONSTRAINT `FKpos_NUT` FOREIGN KEY (`IDNutrizionista`) REFERENCES `nutrizionista` (`IDNutrizionista`),
  ADD CONSTRAINT `FKpos_QUA_FK` FOREIGN KEY (`Titolo`) REFERENCES `qualifica` (`Titolo`);

--
-- Limiti per la tabella `recensione`
--
ALTER TABLE `recensione`
  ADD CONSTRAINT `FKrec_CLI_FK` FOREIGN KEY (`IDCliente`) REFERENCES `cliente` (`IDCliente`),
  ADD CONSTRAINT `FKrec_NUT` FOREIGN KEY (`IDNutrizionista`) REFERENCES `nutrizionista` (`IDNutrizionista`);

--
-- Limiti per la tabella `scelta`
--
ALTER TABLE `scelta`
  ADD CONSTRAINT `FKesegue` FOREIGN KEY (`IDCliente`) REFERENCES `cliente` (`IDCliente`),
  ADD CONSTRAINT `FKsubisce_FK` FOREIGN KEY (`IDNutrizionista`) REFERENCES `nutrizionista` (`IDNutrizionista`);

--
-- Limiti per la tabella `scheda`
--
ALTER TABLE `scheda`
  ADD CONSTRAINT `FKobiettivo_scheda_FK` FOREIGN KEY (`CodiceObiettivo`) REFERENCES `obiettivo` (`CodiceObiettivo`),
  ADD CONSTRAINT `FKpossiede_FK` FOREIGN KEY (`IDCliente`) REFERENCES `cliente` (`IDCliente`);

--
-- Limiti per la tabella `tabella_allenamento`
--
ALTER TABLE `tabella_allenamento`
  ADD CONSTRAINT `FKcomposizione_a_FK` FOREIGN KEY (`CodiceScheda`) REFERENCES `scheda` (`CodiceScheda`);

--
-- Limiti per la tabella `tabella_consiglo`
--
ALTER TABLE `tabella_consiglo`
  ADD CONSTRAINT `FKcomposizione_c_FK` FOREIGN KEY (`CodiceScheda`) REFERENCES `scheda` (`CodiceScheda`);

--
-- Limiti per la tabella `tabella_pasto`
--
ALTER TABLE `tabella_pasto`
  ADD CONSTRAINT `FKcomposizione_p_FK` FOREIGN KEY (`CodiceScheda`) REFERENCES `scheda` (`CodiceScheda`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
