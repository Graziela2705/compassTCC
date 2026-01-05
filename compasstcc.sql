-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21/11/2024 às 21:15
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
-- Banco de dados: `compasstcc`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `admin`
--

INSERT INTO `admin` (`id`, `username`, `password_hash`) VALUES
(1, 'admin', '$2y$10$o8sAabxfVaGFxPrItFOkq.3wUJJur2ZJL72Zq50jg.oDeKUuUpeMO');

-- --------------------------------------------------------

--
-- Estrutura para tabela `dicas`
--

CREATE TABLE `dicas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `introducao` text NOT NULL,
  `introducao_completa` text DEFAULT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `dicas`
--

INSERT INTO `dicas` (`id`, `titulo`, `introducao`, `introducao_completa`, `imagem`) VALUES
(61, ' Conheça o Conteúdo', 'Leia e revise seu TCC várias vezes antes da defesa. Domine os conceitos, objetivos e conclusões para se sentir seguro e preparado para responder perguntas da banca. Conhecer bem cada parte do trabalho aumenta sua confiança e evita surpresas na apresentação. Faça um resumo dos pontos principais para consultar rapidamente, caso necessário.', NULL, '../../Dashboard Do Admin/uploads/1.png'),
(62, 'Apresentação Visual', 'Elabore slides objetivos com os principais tópicos, como tema, objetivos, metodologia, resultados e conclusão. Evite excesso de texto e use gráficos ou imagens para facilitar o entendimento. Uma apresentação visual organizada ajuda a banca e o público a acompanhar melhor o que será apresentado.', NULL, '../../Dashboard Do Admin/uploads/2.png'),
(63, 'Estruture a Apresentação', 'Organize a apresentação oral em uma ordem clara: introdução, objetivos, metodologia, resultados e conclusão. Treine o tempo total, que costuma ser de 10 a 20 minutos. Com uma estrutura definida, fica mais fácil para você seguir o plano e transmitir as informações sem perder o foco.', NULL, '../../Dashboard Do Admin/uploads/3.png'),
(64, 'Pratique a Apresentação em', 'Treinar a apresentação em voz alta ajuda a melhorar o ritmo e a segurança. Ensaiar com amigos ou familiares ajuda a ajustar o tempo e a reduzir o nervosismo. Isso também permite identificar e aprimorar partes onde você possa se sentir menos confiante.', NULL, '../../Dashboard Do Admin/uploads/4.png'),
(65, 'Antecipe Perguntas da Banca', 'Pense em perguntas que a banca pode fazer sobre seu tema, metodologia ou resultados e prepare respostas diretas. Consultar o orientador também ajuda a prever questões. Treinar essas respostas fortalece sua confiança e o prepara para responder com clareza.', NULL, '../../Dashboard Do Admin/uploads/5.png'),
(66, 'Tenha uma Postura Profissional', 'Durante a apresentação, mantenha-se calmo e confiante. Faça contato visual com a banca e fale claramente. Evite gírias e tenha uma linguagem formal. Uma postura profissional mostra que você domina o conteúdo e transmite confiança aos avaliadores.', NULL, '../../Dashboard Do Admin/uploads/6.png'),
(67, 'Escute e Responda as Perguntas com Calma', 'Escute com atenção as perguntas da banca, mesmo que já saiba a resposta. Responda com clareza e objetividade. Se não souber responder, seja sincero, agradeça e diga que estudará mais sobre o tema. Mostrar calma e respeito é essencial para uma boa defesa.', NULL, '../../Dashboard Do Admin/uploads/7.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresas`
--

CREATE TABLE `empresas` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `senha` char(60) NOT NULL,
  `data_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `acesso_concedido` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `empresas`
--

INSERT INTO `empresas` (`id`, `nome`, `email`, `senha`, `data_registro`, `acesso_concedido`) VALUES
(14, 'Biblioteca', 'biblioteca@gmail.com', '$2y$10$NtNGbQqoBUY6vAXaCkNqYOF9N16itYWLlrbEQvXCZgThRsJA6gu7S', '2024-11-21 19:54:11', 1),
(15, 'TechNova Solutions', 'contato@technova.com', '$2y$10$QF4BEU50c4Vlg5nZnnKuT.HSG6Bn2RfNAEypDAm40VQ4VDScSrPe2', '2024-11-21 19:55:22', 0),
(16, 'EvoluWeb Agency', 'suporte@evoluweb.com', '$2y$10$Vi2x3NTA5t/CXD93P/y9iOXpY5.G8MBSQJeOqWL/ryClRo8qVN6LC', '2024-11-21 19:55:41', 0),
(17, 'InovaEdu Consultoria', 'info@inovaedu.com', '$2y$10$exXedYp/JieZC3UpaeheMOKZcSSOv3QTodohpFfK8rqdOJrQj6Dg.', '2024-11-21 19:55:58', 0),
(18, 'GlobalLink TI', 'atendimento@globallinkti.com', '$2y$10$5kdTBxsewSrx9UO7nRF0Pe6ejtPnwJ1VBU9KmkaMukwX/AcI6yLbO', '2024-11-21 19:56:15', 0),
(19, 'EcoPrime Sustentabilidade', 'comercial@ecoprime.com', '$2y$10$D2.50qZ1Gq1XDDqRte7Z4OTJBjbFg8VebYsOq12mWJGwMKyfkJidO', '2024-11-21 19:56:36', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `etapas_manual`
--

CREATE TABLE `etapas_manual` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `etapas_manual`
--

INSERT INTO `etapas_manual` (`id`, `titulo`, `descricao`, `imagem`) VALUES
(32, 'Escolha do Tema', 'Escolher um tema relevante e específico é fundamental para iniciar o TCC. O tema deve ser algo que desperte seu interesse e seja útil na área de estudo. Quanto mais claro e focado ele for, mais fácil será a pesquisa. Evite temas muito amplos, pois isso pode dificultar o aprofundamento e a organização do conteúdo.', '../../Dashboard Do Admin/uploads/numero-um.png'),
(33, 'Elaboração da Introdução', 'Na introdução, apresente o tema, explicando seu contexto e importância. Justifique a escolha do tema e seus objetivos principais e específicos, mostrando o que o trabalho pretende alcançar. Descreva a metodologia de forma resumida e explique a estrutura do trabalho, dando uma visão geral dos capítulos que virão.', 'numero-2.png'),
(34, 'Revisão Bibliográfica', 'A revisão bibliográfica organiza os estudos e teorias que fundamentam o tema escolhido. Use fontes confiáveis, como livros e artigos acadêmicos, e resuma as ideias principais que ajudarão a contextualizar seu trabalho. Divida a revisão em subtemas relevantes para facilitar a organização e dar coerência.', 'numero-3.png'),
(35, 'Metodologia', 'Defina o tipo de pesquisa (qualitativa, quantitativa ou exploratória) e descreva os métodos que usará para coletar dados (como entrevistas ou questionários). Explique como será o público-alvo ou amostra e a forma de análise dos dados. Isso ajuda a justificar as escolhas feitas para o desenvolvimento.', 'numero-quatro.png'),
(36, 'Desenvolvimento', 'O desenvolvimento é o corpo do TCC, onde você aprofunda o tema. Divida em capítulos: o primeiro aborda o contexto, o segundo explora a teoria, o terceiro explica a metodologia e o quarto analisa os dados. Seja objetivo e vá direto ao ponto, mantendo o foco no tema e evitando desviar-se do assunto central.', 'numero-5.png'),
(37, 'Resultados', 'Aqui você apresenta os dados coletados e os interpreta, relacionando-os com as teorias da revisão bibliográfica. Exponha os resultados de forma clara, usando gráficos ou tabelas, se necessário. Explique o que os dados significam e como eles contribuem para responder ao problema de pesquisa.', 'seis.png'),
(38, 'Conclusão', 'A conclusão deve resumir os principais achados e mostrar se os objetivos foram atingidos. Explique o que o estudo trouxe de novo e destaque suas contribuições para o tema. Mencione as limitações da pesquisa e sugira direções para futuros estudos, contribuindo para novos trabalhos na área.', 'sete.png'),
(39, 'Referências', 'Inclua todas as fontes citadas ao longo do trabalho, seguindo o padrão solicitado (ABNT, APA, etc.). Isso mostra que sua pesquisa é bem fundamentada e permite que leitores interessados encontrem as fontes originais. Certifique-se de que todas as fontes foram realmente usadas no texto.', 'numero-8.png'),
(40, 'Anexos', 'Se você tiver documentos complementares, como entrevistas ou questionários, adicione-os como anexos. Esses materiais são opcionais e servem para dar mais suporte à pesquisa, ajudando o leitor a entender melhor as informações apresentadas no trabalho.', 'numero-9.png'),
(41, 'Revisão e Finalização', 'Revise o trabalho completo, corrigindo erros de português e de formatação. Peça feedback a colegas ou ao orientador para melhorar a qualidade. Prepare também a apresentação oral, se necessário, destacando os pontos principais e se preparando para possíveis perguntas da banca.\r\n\r\n', 'numero-10.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `mapas_mentais`
--

CREATE TABLE `mapas_mentais` (
  `id` int(11) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `mapas_mentais`
--

INSERT INTO `mapas_mentais` (`id`, `imagem`, `data_criacao`) VALUES
(5, '../../Dashboard Do Admin/uploads/Map1.png', '2024-11-20 15:07:25'),
(6, '../../Dashboard Do Admin/uploads/Map2.png', '2024-11-20 15:07:41'),
(7, 'Map3.png', '2024-11-20 15:07:52');

-- --------------------------------------------------------

--
-- Estrutura para tabela `mapas_mentais_manual`
--

CREATE TABLE `mapas_mentais_manual` (
  `id` int(11) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `mapas_mentais_manual`
--

INSERT INTO `mapas_mentais_manual` (`id`, `imagem`, `data_criacao`) VALUES
(25, 'Map5.png', '2024-11-20 15:05:12'),
(26, 'Map4.png', '2024-11-20 15:05:24'),
(27, 'Map6.png', '2024-11-20 15:05:36');

-- --------------------------------------------------------

--
-- Estrutura para tabela `referencias`
--

CREATE TABLE `referencias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `introducao` text NOT NULL,
  `arquivo` varchar(255) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `referencias`
--

INSERT INTO `referencias` (`id`, `titulo`, `introducao`, `arquivo`, `data_criacao`) VALUES
(10, 'Educação Ambiental: Desafios e Conscientização', 'Este PDF explora o papel da educação ambiental na conscientização e preservação do meio ambiente. Ao abordar temas sobre sustentabilidade, busca-se ensinar práticas que garantam o equilíbrio ecológico, promovendo atitudes conscientes em todas as esferas da sociedade.', 'uploads/referencias de educação ambientavel.pdf', '2024-11-21 03:05:03'),
(11, 'Psicologia: Abordagens e Aplicações', 'Neste PDF, apresentamos os fundamentos da psicologia, suas abordagens e áreas de atuação. A psicologia estuda os processos mentais humanos, focando na compreensão das emoções e comportamentos, além de oferecer técnicas que melhoram a saúde mental e a qualidade de vida.\r\n\r\n', 'uploads/referencias de psicologia.pdf', '2024-11-21 03:05:36'),
(12, 'Referências de Monografia: Formatação e Utilização', 'Este PDF oferece um guia prático para organizar e formatar referências bibliográficas de uma monografia. Apresentamos como utilizar diferentes tipos de fontes acadêmicas, garantindo a correta citação e a apresentação adequada, fundamental para um trabalho de qualidade.', 'uploads/referencias de relativa geral.pdf', '2024-11-21 03:06:15'),
(13, 'Desafios da Educação: Superando Obstáculos', 'Este PDF aborda os principais desafios enfrentados pela educação moderna, como as disparidades no acesso ao ensino e a adaptação tecnológica. Propõe soluções e alternativas para melhorar a qualidade da educação, visando um ensino mais justo e eficiente para todos.', 'uploads/referencias desafios da educação.pdf', '2024-11-21 03:06:48'),
(14, 'Qualidade da Educação: Avaliação e Melhoria Contínua', 'Este PDF discute a qualidade da educação, destacando a importância das avaliações e os fatores que impactam o aprendizado. São apresentadas estratégias para melhorar o ensino e garantir uma educação de excelência, essencial para o desenvolvimento social e individual.', 'uploads/referencias qualiadade de educação.pdf', '2024-11-21 03:07:16'),
(15, 'Sustentabilidade na Educação: Desafios e Práticas', 'Este PDF explora como a sustentabilidade pode ser integrada ao ambiente educacional, desde o currículo até as práticas cotidianas. Discute a importância de formar cidadãos conscientes dos problemas ambientais e sociais, incentivando ações que promovam o bem-estar coletivo', 'uploads/referencias desafios da educação.pdf', '2024-11-21 03:08:31');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('ativo','inativo') DEFAULT 'ativo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `data_cadastro`, `status`) VALUES
(48, 'Graziela', 'taylor@gmail.com', '$2y$10$zDtmqdCTsiMmNPwOVEroxOCnJGCwiom4l5MtwI4Rbipjm.c7or/tu', '2024-11-21 19:46:00', 'ativo'),
(52, 'Samara', 'samara@gmail.com', '$2y$10$nTRB6PWws7HjYdLv625.pOD0j4FCzvRExg88TYVYfDH1NCoytZixu', '2024-11-21 19:51:19', 'ativo'),
(53, 'Daniel', 'daniel@gmail.com', '$2y$10$N/BaIJ/q0KxfbMUrcBX3OOZVIpd0pOsP9QlFUR7DtzV6i8d0m7IPa', '2024-11-21 19:51:32', 'ativo'),
(54, 'ana', 'eduarda@gmail.com', '$2y$10$dJphx0GILxk44Ed8ppNF7eedi0dWgaQZmcvGhISl5FTJwFew9lr32', '2024-11-21 19:52:01', 'ativo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `subtitulo` varchar(255) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `caminho_imagem` varchar(255) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `videos`
--

INSERT INTO `videos` (`id`, `titulo`, `subtitulo`, `descricao`, `caminho_imagem`, `data_criacao`) VALUES
(9, 'Como Fazer um TCC Inovador', 'Estratégias para Criar um TCC Diferenciado e Impactante', 'Estratégias para Criar um TCC Diferenciado,Impactante e com uma relevância acadêmica', '../uploads/repetir.png', '2024-11-20 17:20:41'),
(10, 'Como Escolher um Bom Tema de TCC', 'Dicas para Encontrar um Tema Relevante ', 'Veja como escolher um tema que desperte seu interesse e tenha relevância acadêmica ', '../uploads/repetir.png', '2024-11-20 17:22:10'),
(11, 'Três Formas Erradas de Escolher seu Tema', ' Evite os Erros Mais Comuns na Escolha do Tema do TCC', 'Conheça os erros que podem comprometer seu TCC e saiba como evitá-los ao escolher o tema.', '../uploads/repetir.png', '2024-11-20 17:22:37');

-- --------------------------------------------------------

--
-- Estrutura para tabela `videos_manual`
--

CREATE TABLE `videos_manual` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `subtitulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `videos_manual`
--

INSERT INTO `videos_manual` (`id`, `titulo`, `subtitulo`, `descricao`, `url`, `imagem`, `data_criacao`) VALUES
(42, 'O que é uma Monografia', 'Entenda o formato e a importância de uma monografia', ' Saiba o que é uma monografia, sua estrutura e como ela contribui para a conclusão do curso acadêmeco', 'https://youtu.be/3KvIt6EWhBw?si=wGuFdjatfFdXyTDw', 'repetir.png', '2024-11-20 17:10:17'),
(43, 'Por Onde Começar Seu TCC', 'Descubra os passos iniciais para planejar seu trabalho acadêmico', 'Saiba como escolher um tema, organizar ideias e iniciar seu TCC com eficiência e confiança.', 'https://youtu.be/2IAbGIOtFUE?si=jPZHFi6RZr6mxWkI', 'repetir.png', '2024-11-20 17:28:59'),
(44, 'Introdução do TCC', 'Dicas práticas para iniciar seu trabalho acadêmico com clareza', 'Aprenda a estruturar a introdução do seu TCC, abordando contexto, objetivos e a relevância do tema de forma objetiva.', 'https://youtu.be/NZLzp9RlQvg?si=c-1Qqhz2Z1XVP_nk', 'repetir.png', '2024-11-20 17:32:33');

-- --------------------------------------------------------

--
-- Estrutura para tabela `videos_multimidia`
--

CREATE TABLE `videos_multimidia` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `subtitulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `link` varchar(255) NOT NULL,
  `data_adicao` timestamp NOT NULL DEFAULT current_timestamp(),
  `caminho_imagem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `videos_multimidia`
--

INSERT INTO `videos_multimidia` (`id`, `titulo`, `subtitulo`, `descricao`, `link`, `data_adicao`, `caminho_imagem`) VALUES
(55, 'O que é uma Monografia', 'Entenda o formato e sua importância acadêmica', 'Neste vídeo, você aprenderá o que é uma monografia, como ela está estruturada e por que é essencial para concluir seu curso com sucesso. Descubra as principais características desse tipo de trabalho acadêmico.', 'https://www.todamateria.com.br/normas-abnt-trabalhos/', '2024-11-21 04:50:50', '../../Dashboard Do Admin/uploads/vid.png'),
(56, 'Como Organizar um Cronograma de TCC', 'Planeje seu tempo e evite atrasos no trabalho', 'Aprenda a montar um cronograma eficiente para seu TCC, organizando etapas e prazos. Este vídeo oferece dicas práticas para gerenciar seu tempo e concluir o trabalho dentro do prazo.', 'https://youtu.be/C0C5PcQjW5g?si=6o9ddNOM_cD5deWY', '2024-11-21 04:52:42', '../../Dashboard Do Admin/uploads/vid.png'),
(57, 'Como Ter um TCC Inovador', 'Dicas para um TCC Diferente e Criativo', 'Descubra como desenvolver um TCC inovador, com ideias criativas e abordagens únicas. Este vídeo oferece estratégias para destacar seu trabalho de forma original e interessante.', 'https://youtu.be/x8-d08tARXU?si=1cX3Npgh7UFJ1sNl', '2024-11-21 04:53:50', '../../Dashboard Do Admin/uploads/vid.png'),
(58, 'Como Selecionar o Tema Ideal para o TCC', 'Escolha um tema relevante e bem fundamentado', 'Saiba como escolher um tema relevante para seu TCC, alinhado aos seus interesses e ao seu curso. Este vídeo apresenta critérios que ajudam a definir um bom tema.', 'https://youtu.be/qvJV0XKMMos?si=Pq2uuT1CvQWTG5Ju', '2024-11-21 04:54:57', '../../Dashboard Do Admin/uploads/vid.png'),
(59, 'Primeiros Passos para Iniciar o Seu TCC', 'Comece o trabalho com planejamento e clareza', 'Neste vídeo, você aprenderá como dar os primeiros passos no TCC, desde o planejamento inicial até a organização das ideias. Descubra como começar com confiança.', 'https://youtu.be/2IAbGIOtFUE?si=7yfbazne1f84zOmF', '2024-11-21 04:56:05', '../../Dashboard Do Admin/uploads/vid.png'),
(60, 'Como Criar uma Introdução Clara e Objetiva', 'Escreva a introdução perfeita para seu trabalho', 'Saiba como estruturar a introdução do seu TCC, destacando o contexto, os objetivos e a relevância do tema. ', 'https://youtu.be/NZLzp9RlQvg?si=n8qzUB_MdRn6nGLb', '2024-11-21 04:56:38', '../../Dashboard Do Admin/uploads/vid.png'),
(61, 'Montando a Estrutura do Seu Trabalho Acadêmico', 'Entenda a organização de um TCC completo', 'Este vídeo explica como estruturar seu TCC, desde a introdução até a conclusão, com dicas sobre cada parte. Aprenda a organizar o trabalho de forma clara e objetiva.\r\n\r\n', 'https://youtu.be/MQIbeE9jY84?si=v-y0VgZ3CyqC_u4Y', '2024-11-21 04:57:25', '../../Dashboard Do Admin/uploads/vid.png'),
(62, 'Evite Erros ao Escolher o Tema do TCC', 'Três maneiras de não definir seu tema acadêmico', 'Descubra os erros mais comuns na escolha do tema do TCC e como evitá-los. Este vídeo mostra o que não fazer ao definir o foco do seu trabalho acadêmico.', 'https://youtu.be/ZQnI-utX4VA?si=WmHaJ6dnQOEjTlrW', '2024-11-21 04:58:04', '../../Dashboard Do Admin/uploads/vid.png');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `dicas`
--
ALTER TABLE `dicas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `etapas_manual`
--
ALTER TABLE `etapas_manual`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `mapas_mentais`
--
ALTER TABLE `mapas_mentais`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `mapas_mentais_manual`
--
ALTER TABLE `mapas_mentais_manual`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `referencias`
--
ALTER TABLE `referencias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `videos_manual`
--
ALTER TABLE `videos_manual`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `videos_multimidia`
--
ALTER TABLE `videos_multimidia`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `dicas`
--
ALTER TABLE `dicas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de tabela `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `etapas_manual`
--
ALTER TABLE `etapas_manual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de tabela `mapas_mentais`
--
ALTER TABLE `mapas_mentais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `mapas_mentais_manual`
--
ALTER TABLE `mapas_mentais_manual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `referencias`
--
ALTER TABLE `referencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de tabela `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `videos_manual`
--
ALTER TABLE `videos_manual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de tabela `videos_multimidia`
--
ALTER TABLE `videos_multimidia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
