SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
DROP DATABASE IF EXISTS `login_data`;
DROP DATABASE IF EXISTS `nhom2_1`;
CREATE DATABASE `nhom2_1`;

--
-- Cơ sở dữ liệu: `nhom2_1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `datalink`
--

CREATE TABLE `datalink` (
  `id` int(11) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `datalink`
--

INSERT INTO `datalink` (`id`, `name`, `link`) VALUES
(1, 'helicopter', 'assets/modelviewer/helicopter_v2.glb'),
(2, 'robot', 'assets/modelviewer/RobotExpressive.glb'),
(3, 'Drossel', 'assets/modelviewer/Drossel.glb'),
(4, 'neilArmstrong', 'assets/modelviewer/NeilArmstrong.glb'),
(5, 'horse', 'assets/modelviewer/Horse.glb');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `account` varchar(35) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `name_users` varchar(30) DEFAULT NULL,
  `gioitinh` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `account`, `password`, `name_users`, `gioitinh`) VALUES
(1, 'account1', '1234', 'Chinh', 'nam'),
(2, 'account2', '1234', 'Duc Anh', 'nam'),
(3, 'account3', '1234', 'Dat', 'nam'),
(4, 'account4', '1234', 'Chinh', 'nam');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `datalink`
--
ALTER TABLE `datalink`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `datalink`
--
ALTER TABLE `datalink`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;
