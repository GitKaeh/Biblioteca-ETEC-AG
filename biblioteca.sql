-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13/11/2024 às 22:19
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `emprestimos`
--

CREATE TABLE `emprestimos` (
  `id` int(11) NOT NULL,
  `id_livro` int(11) DEFAULT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `data_emprestimo` date DEFAULT NULL,
  `data_devolucao` date DEFAULT NULL,
  `devolvido` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `emprestimos`
--

INSERT INTO `emprestimos` (`id`, `id_livro`, `usuario`, `data_emprestimo`, `data_devolucao`, `devolvido`) VALUES
(2, 2, 'matheus', '2024-11-13', '2024-11-13', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `livros`
--

CREATE TABLE `livros` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `ano` int(11) DEFAULT NULL,
  `disponivel` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `livros`
--

INSERT INTO `livros` (`id`, `titulo`, `autor`, `ano`, `disponivel`) VALUES
(2, 'Engenharia de software', 'Ian Sommerville', 2011, 1),
(3, 'Fórmulas e Funções com Microsoft® Office Excel 2007', 'Paul McFedries', 2008, 1),
(4, 'Sistemas de Informação Gerenciais', 'Kenneth Laudon e Jane Laudon', 2011, 1),
(5, 'Sistemas de Banco de Dados', 'Ramez Elmasri e Shamkant B. Navathe', 2010, 1),
(6, 'Arquitetura de Sistemas Operacionais', 'Francis Berenger Machado e Luiz Paulo Maia', 2013, 1),
(7, 'Introdução à Informática Edição 1ª', 'Peter Norton', 1996, 1),
(8, 'Hardware PC', 'Almir Lima Writh', 2000, 1),
(9, 'Use a Cabeça! Servlets & jsp Edição 2ª', 'Bryan Basham', 2009, 1),
(10, 'Microsoft® Windows® XP Professional Resource Kit Documentation Edition 1st', 'Microsoft Corporation', 2001, 1),
(11, 'Aprenda Em 21 Dias Dreamweaver UltraDev 4', 'John Ray', 2001, 1),
(12, 'IPV6 na prática: Coleção Academy', 'Florentino Adilson Aparecido', 2014, 1),
(13, 'Desenvolvendo Aplicativos Com Visual Basic E UML Edição 1ª', 'Paul R. Reed Jr', 2000, 1),
(14, 'Treinamento em Linguagem C++: Módulo 2', 'Viviane Victorine Mizrahi', 2005, 1),
(15, 'Adobe Photoshop CS4: Classroom in a Book: Guia Oficial de Treinamento Edição 1ª', 'Adobe Creative Team', 2009, 1),
(16, 'Análise Estruturada de Sistemas Edição 1ª', 'Gane e Sarson', 1983, 1),
(17, 'Projeto de banco de dados: Uma visão prática - Edição revisada e ampliada Edição 17ª', 'Felipe Nery Rodrigues Machado e Mauricio Pereira de Abreu', 2009, 1),
(18, 'A Terceira Onda da Internet: Como Reinventar os Negócios na era Digital Idioma', 'Steve Case', 2019, 1),
(19, 'Vantagem Digital: um Guia Prático Para a Transformação Digital', 'Rafael Sampaio', 2018, 1),
(20, 'Programação Estruturada de Computadores - Algoritmos Estruturados Edição 3ª', 'Vários autores', 1999, 1),
(21, 'Logistica Empresarial - O Processo De Integracao Da Cadeia De Suprimento Edição 1ª', 'David J. Closs e Donald J. Bowersox', 2004, 1),
(22, 'Logística e Gerenciamento da Cadeia de Distribuição - Estratégia, Avaliação e Operação', 'Antonio Galvão Novaes', 2021, 1),
(23, 'Síntese da coleção história geral da Africa, I: pré-história ao século XVI', 'Valter Roberto', 2013, 1),
(24, 'As Ideias que Formaram a Civilização Ocidental Edição 1ª', 'Roberto Pinto de Souza', 2012, 1),
(25, 'Logística aeroportuária: Análises setoriais e o modelo de cidades-aeroportos', 'Hugo Tadeu', 2010, 1),
(26, 'Avaliação Econômica de Empresas. Técnica e Prática', 'Primo Falcini', 1995, 1),
(27, 'Comércio Exterior: Teoria E Gestão Edição 2ª', 'Reinaldo Dias e Waldemar Rodrigues', 2007, 1),
(28, 'Estrutura, Analise E Interpretacao De Balancos', 'Hilario Franco Jr.', 1989, 1),
(29, 'Administração 3.0: por que e Como \"uberizar\" uma Organização Tradicional', 'Carlos Nepomuceno', 2017, 1),
(30, 'Economia e Mercados. Introdução À Economia Edição 19ª', 'Cesar Roberto Silva', 2012, 1),
(31, 'Administração de Meios de Hospedagem', 'Júlio César Butuhy', 1999, 1),
(32, 'Serviços Em Hotelaria', 'Roseli Gabriel', 1999, 1),
(33, 'Benchmarking. O Caminho Da Qualidade Total', 'Robert C. Camp', 2018, 1),
(34, 'Tire seu projeto do papel com Scrum: Atitudes e práticas para realizar seus projetos no trabalho e na vida', 'Alexandre Magno', 2019, 1),
(35, 'Meu Caderno de Formação do Balanço', 'Prof. Rogerio Pfalitzgraff', 1973, 1),
(36, 'Mini Aurelio. O Dicionário Da Lingua Portuguesa - Conforme Nova Ortografia', 'Aurélio Buarque De Holanda Ferreira', 2008, 1),
(37, 'Psicologias - uma Introdução ao Estudo de Psicologia', 'Ana Merces Bahia Bock e Outros', 2003, 1),
(38, 'Formação Pedagógica para Docentes da Educação Profissional', 'Adhemar Batista Heméritas', 2007, 1),
(39, 'Viagem ao centro da Terra', 'Júlio Verne', 2019, 1),
(40, 'Literatura e Cultura Dimensões Simbólicas', 'Gerson Gonçalves da Silva e Outros', 2013, 1),
(41, 'Diário de um Banana 7: Segurando vela', 'Jeff Kinney', 2013, 1),
(42, 'Cantare Estórias', 'José Alaercio Zamuner', 2008, 1),
(43, 'PAGADOR DE PROMESSAS', 'Dias Gomes', 1994, 1),
(44, 'Dicionário Do Brasileiro De Bolso', 'Teixeira Coelho', 1991, 1),
(45, 'A Vida íntima de Laura e Outros Contos', 'Clarice Lispector', 2011, 1),
(46, 'Tudo Pode Dar Certo', 'Paulo Henrique Durci ', 2019, 1),
(47, 'Quem conta um conto', 'Machado de Assis', 2001, 1),
(48, 'Benchmarking. O Caminho Da Qualidade Total Edição 3ª', 'Robert C. Camp', 2018, 1),
(49, 'Tire seu projeto do papel com Scrum: Atitudes e práticas para realizar seus projetos no trabalho e na vida ', 'Alexandre Magno', 2019, 1),
(50, 'Meu Caderno De Formação Do Balanço - (Cultrix)', 'Rogério Pfaltzgraff', 1900, 1),
(51, 'Código Tributário Nacional Mini 2010. Constituição Federal E Legislação Complementar', 'Vários Autores', 2010, 1),
(52, 'Clt saraiva academica e Constituição Federal', ' Professores de Direito', 2009, 1),
(53, 'Vinte Mil Léguas Submarinas', 'Vários Autores', 2016, 1),
(54, 'ANTES DO BAILE VERDE', 'Telles e Lygia Fagundes', 2010, 1),
(55, 'Aspectos Legais e Ações Afirmativas: São Paulo Contra o Racismo', 'especialistas em direito e estudos sociais.', 2000, 1),
(56, 'Dr. Slump', 'Akira Toriyama', 1990, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo` enum('admin','usuario') DEFAULT 'usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `tipo`) VALUES
(1, 'kaeh', 'sirkawhop@gmail.com', '$2y$10$BsUv9cPu5DViYsM1S9prgOkqo/lVzD7rM0Nnb8x9BPnbwBA77UsLC', 'admin'),
(3, 'eduarda', 'mariaeduardasiq@gmail.com', '$2y$10$dI33WPPrgTBYF1b5MBB9EuSUpy2esMGHaBJrE1ndVNej6Bg9TCaW6', 'usuario'),
(6, 'guilherme', 'guilherguart@gmail.com', '$2y$10$FR1zskrCv2FnO1KcOf0JaeYddHMmKPFnA8QTxH06b7D69o3MscHmm', 'usuario');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `emprestimos`
--
ALTER TABLE `emprestimos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emprestimos_ibfk_1` (`id_livro`);

--
-- Índices de tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `emprestimos`
--
ALTER TABLE `emprestimos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `emprestimos`
--
ALTER TABLE `emprestimos`
  ADD CONSTRAINT `emprestimos_ibfk_1` FOREIGN KEY (`id_livro`) REFERENCES `livros` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
