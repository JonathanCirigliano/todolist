SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `todolist`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `azioni`
--

CREATE TABLE `azioni` (
  `id` int(11) NOT NULL,
  `azione` text,
  `user` int(11) DEFAULT NULL,
  `done` tinyint(4) DEFAULT NULL,
  `elimina` tinyint(1) DEFAULT NULL,
  `data` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `azioni`
--

INSERT INTO `azioni` (`id`, `azione`, `user`, `done`, `elimina`, `data`) VALUES
(1, 'Partire per il Brasile', NULL, 1, NULL, NULL),
(2, 'Fotografare cascate Iguazù', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `obiettivi`
--

CREATE TABLE `obiettivi` (
  `id` int(11) NOT NULL,
  `obiettivo` text,
  `user` int(11) DEFAULT NULL,
  `done` tinyint(1) DEFAULT NULL,
  `data` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `obiettivi`
--

INSERT INTO `obiettivi` (`id`, `obiettivo`, `user`, `done`, `data`) VALUES
(1, 'Viaggiare per il mondo', NULL, NULL, NULL);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `azioni`
--
ALTER TABLE `azioni`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `obiettivi`
--
ALTER TABLE `obiettivi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `azioni`
--
ALTER TABLE `azioni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `obiettivi`
--
ALTER TABLE `obiettivi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
