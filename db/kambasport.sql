-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14-Ago-2022 às 17:28
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kambasport`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alerts`
--

CREATE TABLE `alerts` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `status` enum('see','visa') NOT NULL COMMENT 'see:ver / visa: visto',
  `subject` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `alerts`
--

INSERT INTO `alerts` (`id`, `text`, `status`, `subject`, `created_at`) VALUES
(1, 'ool', 'see', 'ckkkkkkk', '2022-05-02 16:46:37'),
(2, 'kllllllllll', 'visa', 'ckkkkkkk', '2022-05-02 16:46:24');

-- --------------------------------------------------------

--
-- Estrutura da tabela `app_orders`
--

CREATE TABLE `app_orders` (
  `id` int(11) UNSIGNED NOT NULL,
  `costumer_id` int(11) UNSIGNED DEFAULT NULL,
  `subscription_id` int(11) UNSIGNED DEFAULT NULL,
  `typepayment` varchar(255) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `app_orders`
--

INSERT INTO `app_orders` (`id`, `costumer_id`, `subscription_id`, `typepayment`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(9, 520224, 16, 'Cash', 50, 'active', '2022-05-18 21:25:54', '2022-05-18 21:25:54');

-- --------------------------------------------------------

--
-- Estrutura da tabela `book_points`
--

CREATE TABLE `book_points` (
  `id` int(11) NOT NULL,
  `costumer` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `presence` enum('P','F') NOT NULL COMMENT 'P:presente - F:falta',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `book_points`
--

INSERT INTO `book_points` (`id`, `costumer`, `date`, `presence`, `created_at`, `id_user`) VALUES
(2, 5, '2022-05-19 00:00:00', 'P', '2022-05-19 20:02:21', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `tel` int(11) DEFAULT NULL,
  `email` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `contacts`
--

INSERT INTO `contacts` (`id`, `tel`, `email`) VALUES
(50, 2147483647, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `costumers`
--

CREATE TABLE `costumers` (
  `id` int(11) NOT NULL,
  `people` int(11) NOT NULL,
  `IDcode` varchar(40) NOT NULL,
  `observation` text NOT NULL,
  `contact` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `check_in` enum('Dentro','Fora') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `costumers`
--

INSERT INTO `costumers` (`id`, `people`, `IDcode`, `observation`, `contact`, `status`, `created_at`, `updated_at`, `check_in`) VALUES
(5, 52, '520224', 'client novo', 50, 'Activo', '2022-05-18 21:25:54', NULL, 'Dentro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `people` int(11) NOT NULL,
  `contact` int(11) NOT NULL,
  `function_e` varchar(100) NOT NULL,
  `bi` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `employees`
--

INSERT INTO `employees` (`id`, `people`, `contact`, `function_e`, `bi`, `status`, `created_at`, `updated_at`) VALUES
(3, 49, 47, 'Trainer', '4449', 'Activo', '2022-05-18 19:30:32', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `functions`
--

CREATE TABLE `functions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `access_level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `functions`
--

INSERT INTO `functions` (`id`, `name`, `access_level`) VALUES
(1, 'Gerente', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `modalitys`
--

CREATE TABLE `modalitys` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text,
  `status` varchar(50) NOT NULL,
  `trainer` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `modalitys`
--

INSERT INTO `modalitys` (`id`, `name`, `description`, `status`, `trainer`, `created_at`, `updated_at`) VALUES
(1, 'Alfredo Manuel', 'Alfredo Manuel', 'Activo', 1, '2022-05-16 13:06:42', NULL),
(2, 'CrossFit', 'Alfredo Manuel', 'Activo', 1, '2022-05-16 13:07:18', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `monthlys`
--

CREATE TABLE `monthlys` (
  `id` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `typePayment` varchar(50) NOT NULL,
  `datePayment` date NOT NULL,
  `datePaymentVenc` date NOT NULL,
  `id_costumer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `peoples`
--

CREATE TABLE `peoples` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `gender` enum('Masculino','Feminino') NOT NULL,
  `dateBirth` date DEFAULT NULL,
  `last_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `peoples`
--

INSERT INTO `peoples` (`id`, `first_name`, `gender`, `dateBirth`, `last_name`) VALUES
(49, 'Alfredo', 'Masculino', NULL, 'Manuel'),
(50, 'Alfredo', 'Masculino', NULL, 'Manuel'),
(51, 'Alfredo', 'Masculino', NULL, 'Manuel'),
(52, 'Alfredo', 'Masculino', NULL, 'Manuel');

-- --------------------------------------------------------

--
-- Estrutura da tabela `plans`
--

CREATE TABLE `plans` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `period` varchar(11) NOT NULL DEFAULT '',
  `period_str` varchar(11) NOT NULL DEFAULT '',
  `price` decimal(10,2) NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `plans`
--

INSERT INTO `plans` (`id`, `name`, `period`, `period_str`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PRO', 'mês', 'mês', '8000.00', 'canceled', '2018-12-21 06:02:22', '2022-05-18 21:17:31'),
(2, 'PRO', '1month', '1month', '50.00', 'Active', '2018-12-21 06:02:57', '2022-05-18 21:21:12'),
(3, 'EXPERT', '1month', 'mês', '75.00', 'canceled', '2018-12-21 06:04:02', '2022-05-18 19:28:55');

-- --------------------------------------------------------

--
-- Estrutura da tabela `prices`
--

CREATE TABLE `prices` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sport`
--

CREATE TABLE `sport` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `nif` text,
  `contacto` int(11) NOT NULL,
  `email` int(11) DEFAULT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `codAccess` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sport`
--

INSERT INTO `sport` (`id`, `name`, `nif`, `contacto`, `email`, `data_inicio`, `data_fim`, `codAccess`) VALUES
(1, 'OD Sport', '000000000000', 0, NULL, '2022-03-05', '2022-03-06', 'sport2022');

-- --------------------------------------------------------

--
-- Estrutura da tabela `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(11) UNSIGNED NOT NULL,
  `costumer_id` int(11) UNSIGNED DEFAULT NULL,
  `plan_id` int(11) UNSIGNED DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active' COMMENT 'active,inactive,past_due,canceled',
  `started` date NOT NULL,
  `due_day` int(2) NOT NULL,
  `next_due` date NOT NULL,
  `last_charge` date NOT NULL,
  `modality` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `costumer_id`, `plan_id`, `status`, `started`, `due_day`, `next_due`, `last_charge`, `modality`, `created_at`, `updated_at`) VALUES
(16, 520224, 2, 'active', '2022-05-19', 19, '2022-06-19', '2022-05-19', 2, '2022-05-18 21:25:54', '2022-05-18 22:05:48');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL DEFAULT '',
  `last_name` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) DEFAULT '',
  `status` varchar(50) DEFAULT 'registered' COMMENT 'registered, confirmed',
  `codAccess` text,
  `password` varchar(255) DEFAULT '',
  `forget` varchar(255) DEFAULT NULL,
  `function` int(11) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `status`, `codAccess`, `password`, `forget`, `function`, `photo`, `created_at`, `updated_at`) VALUES
(5, 'Alfredo', 'Manuel', '', 'Desativo', 'sport2022', '$2y$10$O6PAUmyhNwF9XR9bJGPEY.3PKcf6XnScTraQAYifp4xc48NLdRvki', NULL, 1, NULL, '2022-03-07 08:33:58', '2022-03-07 14:13:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alerts`
--
ALTER TABLE `alerts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_orders`
--
ALTER TABLE `app_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_points`
--
ALTER TABLE `book_points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `costumers`
--
ALTER TABLE `costumers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `functions`
--
ALTER TABLE `functions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modalitys`
--
ALTER TABLE `modalitys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monthlys`
--
ALTER TABLE `monthlys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peoples`
--
ALTER TABLE `peoples`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sport`
--
ALTER TABLE `sport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alerts`
--
ALTER TABLE `alerts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `app_orders`
--
ALTER TABLE `app_orders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `book_points`
--
ALTER TABLE `book_points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `costumers`
--
ALTER TABLE `costumers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `functions`
--
ALTER TABLE `functions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `modalitys`
--
ALTER TABLE `modalitys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `monthlys`
--
ALTER TABLE `monthlys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peoples`
--
ALTER TABLE `peoples`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sport`
--
ALTER TABLE `sport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
