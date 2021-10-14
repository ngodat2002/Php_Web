-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 14, 2021 lúc 03:58 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `food`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employee`
--

CREATE TABLE `employee` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `restaurant_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `meals`
--

CREATE TABLE `meals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `meals`
--

INSERT INTO `meals` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Breakfast', NULL, NULL),
(2, 'Lunch', NULL, NULL),
(3, 'Dinner', NULL, NULL),
(4, 'Snacks', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_08_26_153911_create_orders_table', 1),
(7, '2021_08_26_154508_create_order_details_table', 1),
(8, '2021_08_26_154545_create_restaurants_table', 1),
(9, '2021_08_26_154905_create_products_table', 1),
(10, '2021_08_26_154954_create_meals_table', 1),
(11, '2021_08_26_155336_create_product_categories_table', 1),
(12, '2021_08_29_073038_create_employee_table', 1),
(13, '2021_10_02_042651_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `restaurant_id` int(10) UNSIGNED DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode_zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `town_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` double NOT NULL,
  `tracking_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `restaurant_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `amount` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meal_id` int(10) UNSIGNED NOT NULL,
  `product_categories_id` int(10) UNSIGNED NOT NULL,
  `restaurant_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `qty` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` double NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `meal_id`, `product_categories_id`, `restaurant_id`, `name`, `price`, `qty`, `description`, `rate`, `image`, `tag`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'Dumplings', 10, 200, 'Dumplings are a type of dough dish that surrounds the filling.', 5, 'product1_banhbao.jpg', NULL, NULL, NULL),
(2, 1, 2, 2, 'Fried noodles', 20.5, 100, 'Fried noodles is a rustic dish but very delicious and good health.', 4.5, 'product2_mixao.jpg', NULL, NULL, NULL),
(3, 1, 1, 3, 'Noodles', 50, 20, 'Noodles is a traditional Vietnamese dish and it delicious and amazing.', 4, 'product3_hutieu.jpg', NULL, NULL, NULL),
(4, 2, 1, 1, 'Fried rice', 35, 20, 'Fried rice is a simple dish that is especially chosen by many people.', 4.5, 'product4_comrang.jpg', NULL, NULL, NULL),
(5, 2, 2, 1, 'Broken rice', 10, 200, 'Broken rice is a popular dish of poor farmers and workers,it very good.', 4, 'product5_comtam.jpg', NULL, NULL, NULL),
(6, 2, 3, 1, 'Fried pork', 10, 200, 'Stir-fried pork is a nutritious and nutritious dish suitable for lunch.', 5, 'product6_thitheoxao.jpg', NULL, NULL, NULL),
(7, 2, 1, 2, 'Garlic fried fish', 5, 200, 'Garlic fried fish is a seafood dish that is fried with garlic which makes...', 5, 'product7_cachientoi.jpg', NULL, NULL, NULL),
(8, 4, 1, 4, 'Fried beef', 10, 200, 'Fried beef is a rustic and nutritious dish for everyone, sports...', 5, 'product8_thitboxao.jpg', NULL, NULL, NULL),
(9, 3, 4, 1, 'Steak', 100, 200, 'Steak is a dish consisting of flat slices of beef, usually grilled pan-fried.', 4, 'product9_bitet.jpg', NULL, NULL, NULL),
(10, 1, 3, 2, 'Sandwiches', 18, 20, 'Sandwich is a food that usually consists of vegetables,placed of bread.', 5, 'product10_sandwiches.jpg', NULL, NULL, NULL),
(11, 3, 3, 1, 'Grilled chicken', 9, 200, 'Grilled chicken is a dish for the masses and it is delicious and easy to eat.', 4.5, 'product11_ganuongchao.jpg', NULL, NULL, NULL),
(12, 4, 3, 3, 'Custard cake', 19, 20, 'Custard cake cake is a snack for those who like to eat fast and clean.', 4.5, 'product12_banhbonglan.jpg', NULL, NULL, NULL),
(13, 1, 1, 2, 'Pancakes', 7, 200, 'Pancakes are delicious snacks that are well received by many students...', 5, 'product13_banhxeo.jpg', NULL, NULL, NULL),
(14, 4, 1, 4, 'Chicken feet', 10, 200, 'Chicken feet is a snack that is worth eating it easy to eat and very delicious.', 5, 'product14_changa.jpg', NULL, NULL, NULL),
(15, 2, 2, 2, 'Chicken frequency', 12, 200, 'Chicken a very nutritious dish of the Chinese people,very for health.', 4, 'product15_gatan.jpg', NULL, NULL, NULL),
(16, 3, 4, 4, 'Sushi', 10, 200, 'Sushi is a Korean folk dish and it  like rice, easy to eat and great...', 3.5, 'product16_sushi.jpg', NULL, NULL, NULL),
(17, 2, 1, 4, 'Pork ribs', 14, 200, 'Pork ribs are very good dish,a very good and nutritious dish worth.', 5, 'product17_suonheo.jpg', NULL, NULL, NULL),
(18, 3, 2, 1, 'Grilled beef patties', 11, 200, 'Grilled beef rolls is a dish in the form of fragrant grilled pork rolls...', 5, 'product18_chabonuong.jpg', NULL, NULL, NULL),
(19, 4, 1, 4, 'Fried meatballs', 2, 200, 'Fried meatballs are snack-shaped snacks that are easy eat and delicious.', 4, 'product19_thitvienchien.jpg', NULL, NULL, NULL),
(20, 2, 4, 2, 'Stir-fried vegetable', 30, 200, 'Stir-fried vegetables are a nutritious and fiber-rich dish for every meal.', 4.5, 'product20_rauxao.jpg', NULL, NULL, NULL),
(21, 4, 4, 4, 'Peanut icecream', 19.5, 200, 'Peanut butter ice cream is an ice cream for every snack and hot weather.', 5, 'product21_kembodauphong.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Vietnamese', NULL, NULL),
(2, 'Chinese', NULL, NULL),
(3, 'Mexico', NULL, NULL),
(4, 'Korea', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `restaurants`
--

CREATE TABLE `restaurants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `restaurants`
--

INSERT INTO `restaurants` (`id`, `name`, `images`, `description`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Sen restaurant', 'Restaurant4.jpg', 'Sen Restaurant, a modern Japanese restaurant, has been a mainstay in Sag Harbor, New York since 1994. Zagat raves, “strike sushi gold at this trendy Sag Harbor phenomenon serving superb, slightly modernized Japanese dishes.” The warm and richly textured dining room is illuminated by amber lighting and framed with copper-capped wood beams. Small wood tables and hand-painted, rock encrusted walls complete the peaceful and dynamic decor.', '23 Main Street ,Sag Harbor, NY 11963', '(631) 725-1774', NULL, NULL),
(2, 'Saigon Kitchen Restaurant', 'Restaurant3.jpg', 'Saigon Kitchen Restaurant - Hotel Des Arts Saigon on the second floor of the hotel brings diners back to Indochinese street atmosphere in the past. Street kitchens where diners can directly watch Experienced chefs prepare.', ' 8 Nguyễn Bỉnh Khiêm, Đa Kao, Quận 1, TP HCM', '097 500 2288', NULL, NULL),
(3, ' Windsor Plaza Hotel', 'Restaurant2.jpg', 'Windsor Plaza Hotel is one of the most luxurious and classy 5-star seafood buffet restaurants in Ho Chi Minh City. With a modern restaurant space, along with fresh seafood, professional service attitude of staff has helped Windsor Plaza Hotel assert its position in this culinary world.', '18 An Dương Vương, Quận 5, TP HCM', '028 3833 6688', NULL, NULL),
(4, 'The Log', 'Restaurant1.jpg', 'Located on the rooftop of GEM Center, The LOG restaurant is a unique destination nestled away from the hustle and bustle of the city. Luxurious space covered with warm deep wood interspersed with green patches of grass, The LOG is the place to end fully enjoy the quintessence of contemporary cuisine.', 'Nguyệt Cầu Tam Giang Yên Phong Bắc Ninh', '(+84) 394480757', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('45t7MRhmR9aGMgB8l3AbT9gZuqfIvwNSmmHBgiCw', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.71 Safari/537.36 Edg/94.0.992.38', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiR0xjbWNqZ29xQXBObWhBWVk4Ym50WUJvZXZJdmpqMlYyYUxMbUlUNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9mb29kIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJFJ1N1VzRUFhczVJNm9zZ1VSTThKaE9jNkRJdlNwdjlUYi9NMjUwbmFQN09EOHJlYTFtZER5Ijt9', 1634113447),
('6AqZDDdxy7HpJZlo0ErlEXjpdQGUqZdfiG2dgL65', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.71 Safari/537.36 Edg/94.0.992.38', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRjRuTFdkbTVtVmFJaUVpcWt3VXhTSkV1Q1ZUUUx2RWgyTWlERTBTTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9mb29kIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1634176010),
('E0OIvgYjqGESqHMFFUih6KffQOijBddhVBhDTT5F', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.71 Safari/537.36 Edg/94.0.992.38', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidlgwN09FcTRvcFg0OHpTeUVnZjBDNDhrRzFKVFdiV2VOV1VaOEtYRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9mb29kIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1634123971),
('oI7E8Hb6SLHzjALI2PGACWoO70UJ0F0EqfzZb99Q', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.71 Safari/537.36 Edg/94.0.992.38', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiekdpNnMzV2w2eFI1dlhCS1FNYUFpaTdyQWxrdkRraVY0U0VTeUFOYiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1634027148);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `usertype`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Ngô Chí Thành Đạt', 'dat3578@gmail.com', '0394480757', 'Bắc Ninh', '0', NULL, '$2y$10$BqaGPw6ZAtVlxMtYwF824OYatEKTWJiZf/y4elm/vm3jUceyHeBAi', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Nguyễn Minh Hiệp', 'hiep@gmail.com', '0394480757', 'Hà Nội', '0', NULL, '$2y$10$Wn.d0llrzzqe8hm8Lyyf/.o77XAm1kVh2JIGFarGKWK5X7QWppwZC', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Nguyễn Văn Lập', 'lap@gmail.com', '038479745', 'Hà Nội', '0', NULL, '$2y$10$h0/lsgSJxivA1yFapfmX0empR67P/9UiGOjmQjiokROA84rFPVXYS', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Staff', 'staff@gmail.com', '0394480757', 'Bắc Ninh', '1', NULL, '$2y$10$Ru7UsEAas5I6osgURM8JhOc6DIvSpv9Tb/M250naP7OD8rea1mdDy', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `employee`
--
ALTER TABLE `employee`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `meals`
--
ALTER TABLE `meals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
