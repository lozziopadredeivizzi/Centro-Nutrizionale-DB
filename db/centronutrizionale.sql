-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 23, 2024 alle 16:56
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

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

--
-- Dump dei dati per la tabella `alimento`
--

INSERT INTO `alimento` (`NomeAlimento`, `TipoAlimento`) VALUES
('/', '/'),
('Alici', 'Pesce'),
('Ananas', 'Frutta'),
('Asparagi', 'Verdura'),
('Avena', 'Cereali'),
('Avocado', 'Frutta'),
('Banana', 'Frutta'),
('Bistecca di Manzo', 'Carne'),
('Breasaola', 'Carne'),
('Broccoli', 'Verdura'),
('Bulgur', 'Cereali'),
('Burro di Arachidi', 'Frutta secca'),
('Carota', 'Verdura'),
('Cavolfiore', 'Verdura'),
('Ceci', 'Legumi'),
('Cereali', 'Cereali'),
('Cioccolato fondente', 'dolce'),
('Crackers', 'Cereali'),
('Fagioli Neri', 'Legumi'),
('Farina di Mandorle', 'Frutta secca'),
('Fetta Biscottata', 'Cereali'),
('Formaggio di Capra', 'Latticini'),
('Frutta secca', 'Frutta Secca'),
('Frutto Fresco', 'Frutta'),
('Funghi Shiitake', 'Verdura'),
('Gallette', 'cereali'),
('Grana', 'Latticini'),
('Kale', 'Verdura'),
('Kerif', 'Latticino'),
('Latte', 'Latticini'),
('Latte di Soia', 'Latticini'),
('Lenticchie', 'Legumi'),
('Mandorle', 'Frutta secca'),
('Marmellata', 'Confettura'),
('Mela', 'Frutta'),
('Miele', 'Dolci'),
('Mirtilli', 'Frutta'),
('Mozzarella', 'Latticini'),
('Olio', 'Olio'),
('Olio Ex. Oliva', 'Olio'),
('Olive', 'Olive'),
('Orzo', 'Cereali'),
('Pane', 'Cereali'),
('Pane Tostato', 'Cereali'),
('Pasta', 'Cereali'),
('Pasta di legumi', 'Cereali'),
('Pasta Integrale', 'Cereali'),
('Patate', 'Verdura'),
('Pesce', 'Pesce'),
('Pollo', 'Carne'),
('Pomodoro', 'Verdura'),
('Prosciutto Cotto', 'Carne'),
('Prosciutto Crudo', 'Carne'),
('Quinoa', 'Cereali'),
('Ricotta', 'Latticini'),
('Riso', 'Cereali'),
('Salmone', 'Pesce'),
('Salmone Affumicato', 'Pesce'),
('Sardine', 'Pesce'),
('Seitan', 'Proteine'),
('Semi di Chia', 'Frutta secca'),
('Spinaci', 'Verdura'),
('Tempeh', 'Proteine'),
('Tofu', 'Proteine'),
('Uova', 'Proteine'),
('Yogurt', 'Latticini'),
('Yogurt Greco', 'Latticini'),
('Yogurt greco senza lattosio', 'Latticini'),
('Zucchine', 'Verdura');

-- --------------------------------------------------------

--
-- Struttura della tabella `alimento_alternativo`
--

CREATE TABLE `alimento_alternativo` (
  `Pos_NomePasto` varchar(50) NOT NULL,
  `Pos_CodiceScheda` int(11) NOT NULL,
  `Pos_CodTabPasti` int(11) NOT NULL,
  `Pos_NomeAlimento` varchar(255) NOT NULL,
  `Pos_QuantitaPrescr` int(11) NOT NULL,
  `NomeAlimento` varchar(255) NOT NULL,
  `QuantitaAlter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `alimento_alternativo`
--

INSERT INTO `alimento_alternativo` (`Pos_NomePasto`, `Pos_CodiceScheda`, `Pos_CodTabPasti`, `Pos_NomeAlimento`, `Pos_QuantitaPrescr`, `NomeAlimento`, `QuantitaAlter`) VALUES
('Cena', 1, 1, 'Bistecca di Manzo', 1, 'Pollo', 30),
('Cena', 1, 1, 'Spinaci', 30, 'Asparagi', 0),
('Cena', 1, 1, 'Spinaci', 30, 'Patate', 30),
('Cena', 4, 4, 'Salmone Affumicato', 50, 'Alici', 0),
('Cena', 4, 4, 'Salmone Affumicato', 50, 'Sardine', 30),
('Cena', 4, 4, 'Uova', 2, 'Banana', 2),
('Cena', 9, 9, 'Gallette', 2, 'Ceci', 30),
('Cena', 9, 9, 'Gallette', 2, 'Pane', 25),
('Cena', 9, 9, 'Gallette', 2, 'Patate', 100),
('Cena', 9, 9, 'Pesce', 150, 'Breasaola', 7),
('Cena', 9, 9, 'Pesce', 150, 'Formaggio di Capra', 60),
('Cena', 9, 9, 'Pesce', 150, 'Pollo', 110),
('Cena', 9, 9, 'Pesce', 150, 'Uova', 3),
('Cena', 10, 10, 'Pane', 50, 'Gallette', 4),
('Cena', 10, 10, 'Pane', 50, 'Patate', 200),
('Cena', 10, 10, 'Pesce', 120, 'Bistecca di Manzo', 100),
('Cena', 10, 10, 'Pesce', 120, 'Prosciutto Crudo', 0),
('Cena', 11, 11, 'Pane', 50, 'Gallette', 4),
('Cena', 11, 11, 'Pane', 50, 'Patate', 200),
('Cena', 11, 11, 'Pesce', 130, 'Breasaola', 7),
('Cena', 11, 11, 'Pesce', 130, 'Pollo', 100),
('Cena', 11, 11, 'Pesce', 130, 'Uova', 3),
('Cena', 12, 12, 'Pesce', 160, 'Mozzarella', 1),
('Cena', 12, 12, 'Pesce', 160, 'Pollo', 130),
('Cena', 12, 12, 'Pesce', 160, 'Prosciutto Crudo', 8),
('Cena', 12, 12, 'Pesce', 160, 'Uova', 3),
('Colazione', 1, 1, 'Ananas', 20, 'Mela', 1),
('Colazione', 1, 1, 'Yogurt Greco', 1, 'Banana', 0),
('Colazione', 1, 1, 'Yogurt Greco', 1, 'Mandorle', 0),
('Colazione', 4, 4, 'Fetta Biscottata', 3, 'Mandorle', 0),
('Colazione', 4, 4, 'Fetta Biscottata', 3, 'Mela', 0),
('Colazione', 9, 9, 'Marmellata', 15, 'Frutta secca', 30),
('Colazione', 9, 9, 'Marmellata', 15, 'Frutto Fresco', 90),
('Colazione', 9, 9, 'Marmellata', 15, 'Miele', 0),
('Colazione', 9, 9, 'Pane', 50, 'Cereali', 30),
('Colazione', 9, 9, 'Pane', 50, 'Fetta Biscottata', 4),
('Colazione', 9, 9, 'Pane', 50, 'Gallette', 4),
('Colazione', 9, 9, 'Yogurt Greco', 90, 'Kerif', 200),
('Colazione', 9, 9, 'Yogurt Greco', 90, 'Prosciutto Cotto', 45),
('Colazione', 9, 9, 'Yogurt Greco', 90, 'Ricotta', 50),
('Colazione', 10, 10, 'Cioccolato fondente', 20, 'Avocado', 20),
('Colazione', 10, 10, 'Cioccolato fondente', 20, 'Frutta secca', 20),
('Colazione', 10, 10, 'Pane Tostato', 50, 'Avena', 0),
('Colazione', 10, 10, 'Pane Tostato', 50, 'Fetta Biscottata', 0),
('Colazione', 10, 10, 'Pane Tostato', 50, 'Gallette', 4),
('Colazione', 10, 10, 'Yogurt Greco', 170, 'Prosciutto Crudo', 50),
('Colazione', 10, 10, 'Yogurt Greco', 170, 'Ricotta', 30),
('Colazione', 10, 10, 'Yogurt Greco', 170, 'Salmone Affumicato', 30),
('Colazione', 10, 10, 'Yogurt Greco', 170, 'Uova', 2),
('Colazione', 11, 11, 'Cioccolato fondente', 20, 'Avocado', 50),
('Colazione', 11, 11, 'Cioccolato fondente', 20, 'Frutta secca', 20),
('Colazione', 11, 11, 'Cioccolato fondente', 20, 'Olio', 1),
('Colazione', 11, 11, 'Pane Tostato', 50, 'Cereali', 30),
('Colazione', 11, 11, 'Pane Tostato', 50, 'Gallette', 4),
('Colazione', 11, 11, 'Yogurt greco senza lattosio', 170, 'Prosciutto Cotto', 50),
('Colazione', 11, 11, 'Yogurt greco senza lattosio', 170, 'Ricotta', 50),
('Colazione', 11, 11, 'Yogurt greco senza lattosio', 170, 'Salmone Affumicato', 50),
('Colazione', 11, 11, 'Yogurt greco senza lattosio', 170, 'Uova', 2),
('Colazione', 12, 12, 'Frutta secca', 20, 'Cioccolato fondente', 20),
('Colazione', 12, 12, 'Pane', 50, 'Cereali', 40),
('Colazione', 12, 12, 'Pane', 50, 'Gallette', 4),
('Colazione', 12, 12, 'Yogurt Greco', 90, 'Kerif', 200),
('Colazione', 12, 12, 'Yogurt Greco', 90, 'Prosciutto Cotto', 45),
('Colazione', 12, 12, 'Yogurt Greco', 90, 'Ricotta', 50),
('Merenda', 9, 9, 'Cereali', 40, 'Fetta Biscottata', 4),
('Merenda', 9, 9, 'Cereali', 40, 'Kerif', 150),
('Merenda', 9, 9, 'Yogurt', 1, 'Breasaola', 3),
('Merenda', 9, 9, 'Yogurt', 1, 'Crackers', 35),
('Merenda', 10, 10, 'Breasaola', 30, 'Banana', 1),
('Merenda', 10, 10, 'Gallette', 3, 'Frutto Fresco', 1),
('Merenda', 10, 10, 'Gallette', 3, 'Yogurt Greco', 60),
('Merenda', 11, 11, 'Gallette', 3, 'Frutto Fresco', 1),
('Merenda', 11, 11, 'Gallette', 3, 'Yogurt Greco', 90),
('Merenda', 11, 11, 'Prosciutto Cotto', 30, 'Frutto Fresco', 1),
('Pranzo', 1, 1, 'Prosciutto Crudo', 20, 'Salmone Affumicato', 20),
('Pranzo', 4, 4, 'Bistecca di Manzo', 1, 'Pollo', 40),
('Pranzo', 9, 9, 'Bistecca di Manzo', 100, 'Mozzarella', 1),
('Pranzo', 9, 9, 'Bistecca di Manzo', 100, 'Pesce', 90),
('Pranzo', 9, 9, 'Bistecca di Manzo', 100, 'Prosciutto Crudo', 5),
('Pranzo', 9, 9, 'Bistecca di Manzo', 100, 'Uova', 2),
('Pranzo', 9, 9, 'Pasta', 70, 'Riso', 70),
('Pranzo', 10, 10, 'Bistecca di Manzo', 90, 'Breasaola', 90),
('Pranzo', 10, 10, 'Bistecca di Manzo', 90, 'Pesce', 100),
('Pranzo', 10, 10, 'Bistecca di Manzo', 90, 'Uova', 3),
('Pranzo', 10, 10, 'Pasta', 80, 'Pasta di legumi', 80),
('Pranzo', 11, 11, 'Bistecca di Manzo', 90, 'Pesce', 100),
('Pranzo', 11, 11, 'Bistecca di Manzo', 90, 'Prosciutto Crudo', 100),
('Pranzo', 11, 11, 'Bistecca di Manzo', 90, 'Uova', 2),
('Pranzo', 11, 11, 'Pasta', 80, 'Pasta di legumi', 80),
('Pranzo', 12, 12, 'Bistecca di Manzo', 70, 'Breasaola', 2),
('Pranzo', 12, 12, 'Bistecca di Manzo', 70, 'Lenticchie', 60),
('Pranzo', 12, 12, 'Bistecca di Manzo', 70, 'Mozzarella', 1),
('Pranzo', 12, 12, 'Bistecca di Manzo', 70, 'Pesce', 55),
('Pranzo', 12, 12, 'Bistecca di Manzo', 70, 'Uova', 1),
('Pranzo', 12, 12, 'Pasta', 60, 'Orzo', 60),
('Pranzo', 12, 12, 'Pasta', 60, 'Riso', 60),
('Spuntino Post Cena', 12, 12, 'Frutto Fresco', 150, 'Gallette', 2),
('Spuntino Pre Pranzo', 12, 12, 'Cioccolato fondente', 20, 'Grana', 30),
('Spuntino Pre Pranzo', 12, 12, 'Cioccolato fondente', 20, 'Olive', 10);

-- --------------------------------------------------------

--
-- Struttura della tabella `alimento_prescritto`
--

CREATE TABLE `alimento_prescritto` (
  `CodiceScheda` int(11) NOT NULL,
  `CodTabPasti` int(11) NOT NULL,
  `NomePasto` varchar(50) NOT NULL,
  `NomeAlimento` varchar(255) NOT NULL,
  `QuantitaPrescr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `alimento_prescritto`
--

INSERT INTO `alimento_prescritto` (`CodiceScheda`, `CodTabPasti`, `NomePasto`, `NomeAlimento`, `QuantitaPrescr`) VALUES
(1, 1, 'Cena', 'Bistecca di Manzo', 1),
(1, 1, 'Cena', 'Spinaci', 30),
(4, 4, 'Cena', 'Riso', 100),
(4, 4, 'Cena', 'Salmone Affumicato', 50),
(4, 4, 'Cena', 'Uova', 2),
(9, 9, 'Cena', 'Gallette', 2),
(9, 9, 'Cena', 'Olio Ex. Oliva', 1),
(9, 9, 'Cena', 'Pesce', 150),
(9, 9, 'Cena', 'Zucchine', 65),
(10, 10, 'Cena', 'Asparagi', 60),
(10, 10, 'Cena', 'Pane', 50),
(10, 10, 'Cena', 'Pesce', 120),
(11, 11, 'Cena', 'Pane', 50),
(11, 11, 'Cena', 'Pesce', 130),
(11, 11, 'Cena', 'Pomodoro', 100),
(12, 12, 'Cena', 'Asparagi', 60),
(12, 12, 'Cena', 'Olio Ex. Oliva', 1),
(12, 12, 'Cena', 'Pesce', 160),
(1, 1, 'Colazione', 'Ananas', 20),
(1, 1, 'Colazione', 'Latte', 0),
(1, 1, 'Colazione', 'Yogurt Greco', 1),
(4, 4, 'Colazione', 'Fetta Biscottata', 3),
(6, 6, 'Colazione', 'Banana', 0),
(6, 6, 'Colazione', 'Burro di Arachidi', 0),
(9, 9, 'Colazione', 'Marmellata', 15),
(9, 9, 'Colazione', 'Pane', 50),
(9, 9, 'Colazione', 'Yogurt Greco', 90),
(10, 10, 'Colazione', 'Cioccolato fondente', 20),
(10, 10, 'Colazione', 'Pane Tostato', 50),
(10, 10, 'Colazione', 'Yogurt Greco', 170),
(11, 11, 'Colazione', 'Cioccolato fondente', 20),
(11, 11, 'Colazione', 'Pane Tostato', 50),
(11, 11, 'Colazione', 'Yogurt greco senza lattosio', 170),
(12, 12, 'Colazione', 'Frutta secca', 20),
(12, 12, 'Colazione', 'Pane', 50),
(12, 12, 'Colazione', 'Yogurt Greco', 90),
(4, 4, 'Merenda', 'Burro di Arachidi', 0),
(6, 6, 'Merenda', 'Ananas', 0),
(6, 6, 'Merenda', 'Fetta Biscottata', 0),
(9, 9, 'Merenda', 'Cereali', 40),
(9, 9, 'Merenda', 'Yogurt', 1),
(10, 10, 'Merenda', 'Breasaola', 30),
(10, 10, 'Merenda', 'Gallette', 3),
(11, 11, 'Merenda', 'Gallette', 3),
(11, 11, 'Merenda', 'Prosciutto Cotto', 30),
(12, 12, 'Merenda', 'Frutto Fresco', 165),
(1, 1, 'Pranzo', 'Pasta Integrale', 40),
(1, 1, 'Pranzo', 'Prosciutto Crudo', 20),
(4, 4, 'Pranzo', 'Bistecca di Manzo', 1),
(4, 4, 'Pranzo', 'Pasta', 100),
(9, 9, 'Pranzo', 'Bistecca di Manzo', 100),
(9, 9, 'Pranzo', 'Olio Ex. Oliva', 1),
(9, 9, 'Pranzo', 'Pasta', 70),
(9, 9, 'Pranzo', 'Spinaci', 70),
(10, 10, 'Pranzo', 'Bistecca di Manzo', 90),
(10, 10, 'Pranzo', 'Pasta', 80),
(10, 10, 'Pranzo', 'Spinaci', 65),
(11, 11, 'Pranzo', 'Bistecca di Manzo', 90),
(11, 11, 'Pranzo', 'Olio Ex. Oliva', 1),
(11, 11, 'Pranzo', 'Pasta', 80),
(11, 11, 'Pranzo', 'Spinaci', 60),
(12, 12, 'Pranzo', 'Bistecca di Manzo', 70),
(12, 12, 'Pranzo', 'Olio Ex. Oliva', 1),
(12, 12, 'Pranzo', 'Pasta', 60),
(12, 12, 'Pranzo', 'Zucchine', 60),
(12, 12, 'Spuntino Post Cena', 'Frutto Fresco', 150),
(9, 9, 'Spuntino Pre Pranzo', 'Frutto Fresco', 150),
(10, 10, 'Spuntino Pre Pranzo', 'Frutto Fresco', 1),
(11, 11, 'Spuntino Pre Pranzo', 'Frutto Fresco', 150),
(12, 12, 'Spuntino Pre Pranzo', 'Cioccolato fondente', 20);

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
(47869, 'Sassofeltrio', 'Lorenzo', 'Tordi', 'lorenzotordi9@gmail.com', 'dio', 1),
(20097, 'Milano', 'Hamza', 'Manouar', 'hamzamenu@gmail.com', 'hamza1', 2),
(80122, 'Napoli', 'Beatrice', 'di Gregorio', 'bea@gmail.com', 'beatrice1', 3),
(186, 'Roma', 'Sofia', 'Ceccaroli', 'sofiacecca@gmail.com', 'sofia1', 4),
(47921, 'Rimini', 'Susanna', 'Mini', 'susannamini@gmail.com', 'susanna1', 5),
(40100, 'Bologna', 'Alessia', 'Tordi', 'alessia@gmail.com', 'alessia1', 6);

-- --------------------------------------------------------

--
-- Struttura della tabella `consiglio`
--

CREATE TABLE `consiglio` (
  `CodiceScheda` int(11) NOT NULL,
  `CodTabCons` int(11) NOT NULL,
  `Descrizione` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `consiglio`
--

INSERT INTO `consiglio` (`CodiceScheda`, `CodTabCons`, `Descrizione`) VALUES
(1, 1, 'per il nuoto vedi tu le vasche da fare, l\'importante è incrementare la resistenza e allenare la forza'),
(8, 8, 'alterna come credi gli esercizi alle attività.'),
(8, 8, 'Puoi scegliere tra la camminata e la corsa leggera, ma attenta a non privilegiare l\'una all\'altra'),
(9, 9, 'le quantità degli alimenti liquidi sono considerate in ml o cucchiai'),
(9, 9, 'Puoi alternare le verdure anche con altre, come preferisci, basta siano verdure'),
(9, 9, 'Questi sono i giorni ON, per i giorni OFF considera la stessa scheda ma con l\'aggiunta di un pasto sgarro a settimana'),
(10, 10, 'gli alimenti sulla scheda sono i giorni ON, ovvero 3 giorni alla settimana. Per i giorni off la scheda è la stessa, ma puoi fare delle quantità un pò più \'grandi\''),
(11, 11, 'per i liquidi, la quantità è riferita a cucchiai'),
(11, 11, 'Questi sono i giorni ON, per i giorni OFF considera le stesse cose ma puoi spaziare con la quantità, ma attenzione!'),
(12, 12, 'Aumentiamo l’apporto di proteine nella cena;\r\n2. Inseriamo una fonte proteica nella merenda del pomeriggio;\r\n3. Modifichiamo la grammatura del primo piatto;\r\n4. Variamo lo spuntino di metà mattino nell’intake di carboidrati.'),
(12, 12, 'Gli alimenti liquidi hanno quantità in funzione di cucchiai o ml'),
(12, 12, 'I giorni ON sono 2. Quelli OFF 5'),
(12, 12, 'N.1 pasto libero a settimana.'),
(12, 12, 'Per il giorno OFF, Nella merenda del pomeriggio inseriamo una fonte glucidica che\r\noccasionalmente, ovvero 1-2 giorni a settimana, potrai alternare con un\r\nsucco di frutta, meglio ancora un frullato fatto da te');

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

--
-- Dump dei dati per la tabella `consulenza`
--

INSERT INTO `consulenza` (`IDNutrizionista`, `IDCliente`, `OraInizio`, `Giorno`, `CodiceScheda`, `OraFine`, `Completa`, `Presenza`, `Online`, `Tipo`) VALUES
(2, 1, '15:00:00', '2024-06-06', 1, '16:00:00', 's', '1', '0', 'Completa'),
(2, 1, '15:00:00', '2024-06-12', 6, '16:00:00', 's', '1', '0', 'Alimentare'),
(2, 1, '19:30:00', '2024-06-11', 5, '20:30:00', 's', '1', '0', 'Fisica'),
(8, 2, '15:00:00', '2024-06-26', 13, '16:00:00', 'n', '0', '1', 'Completa'),
(8, 2, '16:00:00', '2024-06-12', 3, '17:00:00', 's', '1', '0', 'Fisica'),
(2, 3, '10:00:00', '2024-06-18', 4, '11:00:00', 's', '1', '0', 'Alimentare'),
(2, 3, '14:00:00', '2024-06-20', 8, '15:00:00', 's', '0', '1', 'Fisica'),
(4, 4, '11:00:00', '2024-04-08', 12, '12:00:00', 's', '0', '1', 'Alimentare'),
(4, 4, '14:00:00', '2024-06-18', 9, '15:00:00', 's', '1', '0', 'Alimentare'),
(13, 5, '11:00:00', '2024-01-17', 10, '12:00:00', 's', '1', '0', 'Alimentare'),
(13, 5, '15:00:00', '2024-03-07', 11, '16:00:00', 's', '1', '0', 'Alimentare'),
(8, 6, '14:00:00', '2024-06-26', 14, '15:00:00', 'n', '1', '0', 'Alimentare');

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

--
-- Dump dei dati per la tabella `diario`
--

INSERT INTO `diario` (`IDCliente`, `Data`, `Ora`, `CodDiario`, `IDNutrizionista`) VALUES
(1, '2024-06-05', '23:01:05', 0, 2),
(1, '2024-06-12', '14:17:02', 8, 2),
(2, '2024-06-05', '23:47:09', 1, 2),
(2, '2024-06-06', '11:37:42', 3, 2),
(2, '2024-06-12', '16:09:47', 9, 2),
(3, '2024-06-08', '00:14:53', 6, 2),
(4, '2024-06-17', '12:15:49', 11, 4),
(3, '2024-06-08', '00:14:43', 5, 7),
(2, '2024-06-06', '11:36:14', 2, 8),
(2, '2024-06-06', '11:38:03', 4, 8),
(2, '2024-06-12', '16:10:50', 10, 8),
(6, '2024-06-23', '16:54:22', 13, 8),
(1, '2024-06-12', '14:16:54', 7, 9),
(5, '2024-01-09', '18:16:27', 12, 13);

-- --------------------------------------------------------

--
-- Struttura della tabella `esercizio`
--

CREATE TABLE `esercizio` (
  `NomeEsercizio` varchar(50) NOT NULL,
  `Descrizione` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `esercizio`
--

INSERT INTO `esercizio` (`NomeEsercizio`, `Descrizione`) VALUES
('Bench Press', 'Un esercizio con pesi per il petto, tricipiti e spalle, eseguito su una panca.'),
('Bicep Curl', 'Un esercizio specifico per i bicipiti, eseguito con manubri o bilanciere.'),
('Burpee', 'Un esercizio a corpo libero che coinvolge tutto il corpo, migliorando forza e resistenza.'),
('Camminata', 'Un esercizio a basso impatto che aiuta a migliorare la salute cardiovascolare e la forma fisica generale.'),
('Ciclismo', 'Un esercizio aerobico che lavora su gambe e resistenza, eseguito su una bicicletta.'),
('Corsa Leggera', 'Un esercizio cardiovascolare moderato che migliora la resistenza e la salute del cuore.'),
('Crunch', 'Un esercizio per gli addominali che coinvolge principalmente il retto addominale.'),
('Deadlift', 'Un esercizio di sollevamento pesi che lavora su schiena, glutei e muscoli posteriori della coscia.'),
('Ellittica', 'Un esercizio a basso impatto che simula la camminata o la corsa, ideale per migliorare la resistenza cardiovascolare senza stressare le articolazioni.'),
('Hiking', 'Un esercizio all’aperto che coinvolge camminare su terreni naturali, migliorando resistenza e forza delle gambe.'),
('Leg Press', 'Un esercizio per le gambe che utilizza una macchina, lavorando su quadricipiti, glutei e muscoli posteriori della coscia.'),
('Leg Raise', 'Un esercizio per il core che rafforza gli addominali inferiori.'),
('Lunges', 'Un esercizio che rafforza gambe e glutei, migliorando equilibrio e stabilità.'),
('Nuoto', 'Un esercizio completo che coinvolge tutti i principali gruppi muscolari, migliorando forza e resistenza.'),
('Pilates', 'Un sistema di esercizi che migliora la forza del core, la flessibilità e la postura attraverso movimenti controllati e precisi.'),
('Plank', 'Un esercizio per il core che rafforza gli addominali e la parte bassa della schiena.'),
('Pull-Up', 'Un esercizio di trazione che rafforza la schiena, le spalle e i bicipiti.'),
('Push-Up', 'Un esercizio di base per la parte superiore del corpo che coinvolge petto, spalle e tricipiti.'),
('Russian Twist', 'Un esercizio per gli addominali obliqui, eseguito ruotando il busto da un lato all\'altro.'),
('Salto con la Corda', 'Un esercizio cardiovascolare ad alta intensità che migliora la coordinazione e la resistenza.'),
('Shoulder Press', 'Un esercizio per le spalle, eseguito con manubri o bilanciere.'),
('Squat', 'Un esercizio fondamentale per le gambe che lavora quadricipiti, glutei e muscoli posteriori della coscia.'),
('Step Aerobics', 'Un esercizio cardiovascolare che coinvolge salire e scendere da uno step, migliorando resistenza e forza delle gambe.'),
('Tricep Dip', 'Un esercizio per i tricipiti eseguito su una panca o parallele.'),
('Yoga', 'Una pratica che combina posture fisiche, respirazione e meditazione per migliorare la flessibilità, la forza e il benessere mentale.');

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

--
-- Dump dei dati per la tabella `esercizio_in_tabella`
--

INSERT INTO `esercizio_in_tabella` (`CodiceScheda`, `CodTabAll`, `Posizione`, `FrequenzaSettimanale`, `Durata`, `NomeEsercizio`) VALUES
(1, 1, 0, '3', '/', 'Nuoto'),
(1, 1, 1, '2', '1 ora e mezza', 'Corsa Leggera'),
(3, 3, 0, '6', '20 ripetizioni per 4 serie', 'Push-Up'),
(3, 3, 1, '6', '10 ripetizioni per 4 serie', 'Bench Press'),
(3, 3, 2, '6', '30 secondi per 4 serie', 'Plank'),
(3, 3, 3, '6', '20 ripetizioni per 4 serie', 'Squat'),
(5, 5, 0, '3', '2 ore', 'Ciclismo'),
(5, 5, 1, '3', '3 ore', 'Corsa Leggera'),
(5, 5, 2, '3', '2 ore', 'Nuoto'),
(8, 8, 0, '4', '1 minuto e mezzo per 4 serie', 'Salto con la Corda'),
(8, 8, 1, '4', '40 min', 'Corsa Leggera'),
(8, 8, 2, '4', '1 ora e mezza', 'Camminata'),
(8, 8, 3, '4', '20 ripetizioni per 4 serie', 'Squat'),
(8, 8, 4, '4', '30 secondi per 4 ripetizioni', 'Plank');

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
(12, 'Bari', 70121, 'Via Spartano', 15),
(13, 'Rimini', 47922, 'Via Garibaldi', 45);

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
(12, '', '', 'Lunedì-Giovedì 08:30-17:30', '320-101112'),
(13, '7 anni', 'Biologa Nutrizionista', 'Dal Lunedì al Venerdì: 10:00 - 12:30 e 14:00 - 18:30', '3457896457');

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
  `DataNota` date NOT NULL,
  `IdNota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `note`
--

INSERT INTO `note` (`IDCliente`, `Data`, `Ora`, `CodDiario`, `Nota`, `OrarioNota`, `OggettoNota`, `DataNota`, `IdNota`) VALUES
(1, '2024-06-05', '23:01:05', 0, 'Ho mangiato al mc oggi', '12:13:52', 'Pranzo', '2024-06-09', 0),
(1, '2024-06-12', '14:17:02', 8, 'Ho mangiato al mc oggi', '14:18:09', 'Pranzo', '2024-06-15', 3),
(2, '2024-06-06', '11:38:03', 4, 'Farò ritardo di 5 minuti', '19:09:20', 'Consulenza', '2024-06-11', 1),
(2, '2024-06-12', '16:10:50', 10, 'Ho continuato a usare l\'ultima scheda dell\'allenamento per un\'altra settimana', '16:40:01', 'Allenamento', '2024-06-23', 6),
(3, '2024-06-08', '00:14:53', 6, 'Farò ritardo di 5 minuti', '15:06:11', 'Consulenza', '2024-06-19', 2),
(4, '2024-06-17', '12:15:49', 11, 'ho mangiato la pizza ', '16:01:55', 'Giorno OFF ', '2024-06-22', 4),
(5, '2024-01-09', '18:16:27', 12, 'Oggi avrò un matrimonio quindi non riusciròa seguire il piano per la cena e il pomeriggio', '16:36:22', 'Giorno OFF ', '2024-06-23', 5);

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
('Erica', 'Bennardo', 'ericabennardo@gmail.com', 2, 'erica1', 5),
('Alessandra', 'Rossi', 'alessandra.rossi@example.com', 3, 'alessandra1', 0),
('Marco', 'Bianchi', 'marco.bianchi@example.com', 4, 'marco1', 4),
('Laura', 'Verdi', 'laura.verdi@example.com', 5, 'laura1', 0),
('Giovanni', 'Neri', 'giovanni.neri@example.com', 6, 'giovanni1', 0),
('Chiara', 'Ferrari', 'chiara.ferrari@example.com', 7, 'chiara1', 0),
('Luca', 'Esposito', 'luca.esposito@example.com', 8, 'luca1', 4),
('Francesca', 'Conti', 'francesca.conti@example.com', 9, 'francesca1', 0),
('Matteo', 'Ricci', 'matteo.ricci@example.com', 10, 'matteo1', 0),
('Elena', 'Colombo', 'elena.colombo@example.com', 11, 'elena1', 0),
('Andrea', 'Fontana', 'andrea.fontana@example.com', 12, 'andrea1', 0),
('Ilaria', 'Cupioli', 'ilariacupioli@gmail.com', 13, 'ilaria1', 4);

-- --------------------------------------------------------

--
-- Struttura della tabella `obiettivo`
--

CREATE TABLE `obiettivo` (
  `Descrizione` varchar(100) NOT NULL,
  `CodiceObiettivo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `obiettivo`
--

INSERT INTO `obiettivo` (`Descrizione`, `CodiceObiettivo`) VALUES
('Perdita di Peso', 1),
('Aumento della Massa Muscolare', 2),
('Miglioramento della Composizione Corporea', 3),
('Gestione delle Intolleranze Alimentari', 4),
('Aumento dell\'Energia e della Vitalità', 5),
('Controllo del Diabete o dell\'Ipertensione', 6),
('Miglioramento delle Prestazioni Sportive', 7),
('Promozione di uno Stile di Vita Salutare', 8),
('Obiettivo da definire', 9),
('Definizione', 10);

-- --------------------------------------------------------

--
-- Struttura della tabella `pasto`
--

CREATE TABLE `pasto` (
  `NomePasto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `pasto`
--

INSERT INTO `pasto` (`NomePasto`) VALUES
('Cena'),
('Colazione'),
('Merenda'),
('Pranzo'),
('Spuntino Post Cena'),
('Spuntino Pre Pranzo');

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
(12, 'Specialista in Disturbi Alimentari'),
(13, 'Consulente Nutrizionale');

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

--
-- Dump dei dati per la tabella `recensione`
--

INSERT INTO `recensione` (`IDCliente`, `IDNutrizionista`, `Voto`, `Commento`) VALUES
(1, 2, 5, 'competente sempre puntuale nelle richieste'),
(3, 2, 5, 'Mi piace molto la sua attitude. Molto competente anche per schede fisiche'),
(4, 4, 4, 'Mi sono da subito trovata bene. Competente e preciso con le prescrizioni sia alimentari che fisiche'),
(2, 8, 4, 'Mi sto trovando molto bene'),
(5, 13, 4, 'Molto brava e professionale. Mi sono trovata molto bene con le consulenze alimentari.');

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

--
-- Dump dei dati per la tabella `scelta`
--

INSERT INTO `scelta` (`IDCliente`, `Data`, `Ora`, `IDNutrizionista`) VALUES
(1, '2024-06-05', '23:01:05', 2),
(1, '2024-06-12', '14:17:02', 2),
(2, '2024-06-05', '23:47:09', 2),
(2, '2024-06-06', '11:37:42', 2),
(2, '2024-06-12', '16:09:47', 2),
(3, '2024-06-08', '00:14:53', 2),
(4, '2024-06-17', '12:15:49', 4),
(3, '2024-06-08', '00:14:43', 7),
(2, '2024-06-06', '11:36:14', 8),
(2, '2024-06-06', '11:38:03', 8),
(2, '2024-06-12', '16:10:50', 8),
(6, '2024-06-23', '16:54:22', 8),
(1, '2024-06-12', '14:16:54', 9),
(4, '2023-11-07', '12:00:00', 11),
(5, '2024-01-09', '18:16:27', 13);

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

--
-- Dump dei dati per la tabella `scheda`
--

INSERT INTO `scheda` (`CodiceScheda`, `dataInizioValidita`, `Durata`, `IDCliente`, `CodiceObiettivo`) VALUES
(1, '2024-06-06', 4, 1, 1),
(3, '2024-06-12', 2, 2, 3),
(4, '2024-06-18', 4, 3, 2),
(5, '2024-06-11', 4, 1, 5),
(6, '2024-06-12', 2, 1, 8),
(8, '2024-06-20', 3, 3, 7),
(9, '2024-06-18', 4, 4, 10),
(10, '2024-01-17', 4, 5, 1),
(11, '2024-03-07', 4, 5, 3),
(12, '2024-04-08', 5, 4, 2),
(13, '2024-06-26', 0, 2, 9),
(14, '2024-06-26', 0, 6, 9);

-- --------------------------------------------------------

--
-- Struttura della tabella `tabella_allenamento`
--

CREATE TABLE `tabella_allenamento` (
  `CodiceScheda` int(11) NOT NULL,
  `CodTabAll` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `tabella_allenamento`
--

INSERT INTO `tabella_allenamento` (`CodiceScheda`, `CodTabAll`) VALUES
(1, 1),
(3, 3),
(5, 5),
(8, 8);

-- --------------------------------------------------------

--
-- Struttura della tabella `tabella_consiglo`
--

CREATE TABLE `tabella_consiglo` (
  `CodiceScheda` int(11) NOT NULL,
  `CodTabCons` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `tabella_consiglo`
--

INSERT INTO `tabella_consiglo` (`CodiceScheda`, `CodTabCons`) VALUES
(1, 1),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12);

-- --------------------------------------------------------

--
-- Struttura della tabella `tabella_pasto`
--

CREATE TABLE `tabella_pasto` (
  `CodiceScheda` int(11) NOT NULL,
  `CodTabPasti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `tabella_pasto`
--

INSERT INTO `tabella_pasto` (`CodiceScheda`, `CodTabPasti`) VALUES
(1, 1),
(4, 4),
(6, 6),
(9, 9),
(10, 10),
(11, 11),
(12, 12);

-- --------------------------------------------------------

--
-- Struttura della tabella `tipo_consulenza`
--

CREATE TABLE `tipo_consulenza` (
  `Tariffa` int(11) NOT NULL,
  `Tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `tipo_consulenza`
--

INSERT INTO `tipo_consulenza` (`Tariffa`, `Tipo`) VALUES
(35, 'Alimentare'),
(50, 'Completa'),
(40, 'Fisica');

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
  ADD PRIMARY KEY (`Pos_NomePasto`,`Pos_CodiceScheda`,`Pos_CodTabPasti`,`Pos_NomeAlimento`,`Pos_QuantitaPrescr`,`NomeAlimento`,`QuantitaAlter`),
  ADD UNIQUE KEY `ID_ALIMENTO_ALTERNATIVO_IND` (`Pos_NomePasto`,`Pos_CodiceScheda`,`Pos_CodTabPasti`,`Pos_NomeAlimento`,`Pos_QuantitaPrescr`,`NomeAlimento`,`QuantitaAlter`),
  ADD KEY `FKtipologia_alt_IND` (`NomeAlimento`);

--
-- Indici per le tabelle `alimento_prescritto`
--
ALTER TABLE `alimento_prescritto`
  ADD PRIMARY KEY (`NomePasto`,`CodiceScheda`,`CodTabPasti`,`NomeAlimento`,`QuantitaPrescr`),
  ADD UNIQUE KEY `ID_ALIMENTO_PRESCRITTO_IND` (`NomePasto`,`CodiceScheda`,`CodTabPasti`,`NomeAlimento`,`QuantitaPrescr`),
  ADD KEY `FKtipologia_pres_IND` (`NomeAlimento`),
  ADD KEY `FKcontiene_IND` (`CodiceScheda`,`CodTabPasti`);

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
  MODIFY `IDCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `nutrizionista`
--
ALTER TABLE `nutrizionista`
  MODIFY `IDNutrizionista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT per la tabella `obiettivo`
--
ALTER TABLE `obiettivo`
  MODIFY `CodiceObiettivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la tabella `scheda`
--
ALTER TABLE `scheda`
  MODIFY `CodiceScheda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `alimento_alternativo`
--
ALTER TABLE `alimento_alternativo`
  ADD CONSTRAINT `FKpossiede_alt` FOREIGN KEY (`Pos_NomePasto`,`Pos_CodiceScheda`,`Pos_CodTabPasti`,`Pos_NomeAlimento`,`Pos_QuantitaPrescr`) REFERENCES `alimento_prescritto` (`NomePasto`, `CodiceScheda`, `CodTabPasti`, `NomeAlimento`, `QuantitaPrescr`),
  ADD CONSTRAINT `FKtipologia_alt_FK` FOREIGN KEY (`NomeAlimento`) REFERENCES `alimento` (`NomeAlimento`);

--
-- Limiti per la tabella `alimento_prescritto`
--
ALTER TABLE `alimento_prescritto`
  ADD CONSTRAINT `FKappartiene` FOREIGN KEY (`NomePasto`) REFERENCES `pasto` (`NomePasto`),
  ADD CONSTRAINT `FKcontiene_FK` FOREIGN KEY (`CodiceScheda`,`CodTabPasti`) REFERENCES `tabella_pasto` (`CodiceScheda`, `CodTabPasti`),
  ADD CONSTRAINT `FKtipologia_pres_FK` FOREIGN KEY (`NomeAlimento`) REFERENCES `alimento` (`NomeAlimento`);

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
