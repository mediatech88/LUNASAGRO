-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 17 Mar 2023 pada 21.56
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lunasagro`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `provinsi` bigint NOT NULL,
  `kota` bigint NOT NULL,
  `kecamatan` bigint NOT NULL,
  `desa` bigint NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_hpt`
--

CREATE TABLE `data_hpt` (
  `id` bigint UNSIGNED NOT NULL,
  `pohon_id` bigint UNSIGNED NOT NULL,
  `gejala_serangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pohon`
--

CREATE TABLE `data_pohon` (
  `id` bigint UNSIGNED NOT NULL,
  `komoditas_id` bigint UNSIGNED NOT NULL,
  `varietas_id` bigint UNSIGNED NOT NULL,
  `mitra_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pupuk`
--

CREATE TABLE `data_pupuk` (
  `id` bigint UNSIGNED NOT NULL,
  `mitra_id` bigint UNSIGNED NOT NULL,
  `komoditas_id` bigint UNSIGNED NOT NULL,
  `merek_pupuk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cara aplikasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dosis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jml_tanam` int NOT NULL,
  `total_bahan` int NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `fb_hpt`
--

CREATE TABLE `fb_hpt` (
  `id` bigint UNSIGNED NOT NULL,
  `data_hpt_id` bigint UNSIGNED NOT NULL,
  `diagnosis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `fb_kontrol_korlap`
--

CREATE TABLE `fb_kontrol_korlap` (
  `id` bigint UNSIGNED NOT NULL,
  `kontrol_korlap_id` bigint UNSIGNED NOT NULL,
  `diagnosis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `komoditas`
--

CREATE TABLE `komoditas` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontrol_korlap`
--

CREATE TABLE `kontrol_korlap` (
  `id` bigint UNSIGNED NOT NULL,
  `pohon_id` bigint UNSIGNED NOT NULL,
  `ph_tanah` int NOT NULL,
  `kesuburan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kondisi_khusus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_kontrol` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `korlap`
--

CREATE TABLE `korlap` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `pelayanan_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` bigint NOT NULL,
  `kota` bigint NOT NULL,
  `kecamatan` bigint NOT NULL,
  `desa` bigint NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_13_195930_create_admins_table', 1),
(6, '2023_03_13_201038_create_korlaps_table', 1),
(7, '2023_03_13_201217_create_tim_ahlis_table', 1),
(8, '2023_03_13_201419_create_mitra_tanis_table', 1),
(9, '2023_03_13_201704_create_pelayanans_table', 1),
(10, '2023_03_13_235246_create_kontrol_korlaps_table', 1),
(11, '2023_03_13_235601_create_data_pupuks_table', 1),
(12, '2023_03_13_235634_create_data_hpts_table', 1),
(13, '2023_03_13_235717_create_data_pohons_table', 1),
(14, '2023_03_13_235758_create_fb_kontrol_korlaps_table', 1),
(15, '2023_03_13_235832_create_fb_hpts_table', 1),
(16, '2023_03_13_235906_create_komoditas_table', 1),
(17, '2023_03_13_235934_create_varietas_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mitra_tani`
--

CREATE TABLE `mitra_tani` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `korlap_id` bigint UNSIGNED NOT NULL,
  `provinsi` bigint NOT NULL,
  `kota` bigint NOT NULL,
  `kecamatan` bigint NOT NULL,
  `desa` bigint NOT NULL,
  `koordinat_lat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `koordinat_long` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `elevasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `luas_lahan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelayanan`
--

CREATE TABLE `pelayanan` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `provinsi` bigint NOT NULL,
  `kota` bigint NOT NULL,
  `kecamatan` bigint NOT NULL,
  `desa` bigint NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pelayanan`
--

INSERT INTO `pelayanan` (`id`, `user_id`, `provinsi`, `kota`, `kecamatan`, `desa`, `code`, `created_at`, `updated_at`) VALUES
(1, 1, 35, 3551, 3551, 3551, 'ADM001', '2023-03-17 14:43:13', '2023-03-17 14:43:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tim_ahli`
--

CREATE TABLE `tim_ahli` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `admin_id` bigint UNSIGNED NOT NULL,
  `provinsi` bigint NOT NULL,
  `kota` bigint NOT NULL,
  `kecamatan` bigint NOT NULL,
  `desa` bigint NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reff` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `role`, `password`, `reff`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'januar', 'januar@gmail.com', '082116162688', 1, '$2y$10$NKeYtGI3iWlBUL5F/lT4Le.AjxAIlJXp80li0D5FTNsY3LucvH0uO', 'ADM000', '2023-03-17 14:43:13', 'iLGvnV7Gpx', '2023-03-17 14:43:13', '2023-03-17 14:43:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `varietas`
--

CREATE TABLE `varietas` (
  `id` bigint UNSIGNED NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_code_unique` (`code`);

--
-- Indeks untuk tabel `data_hpt`
--
ALTER TABLE `data_hpt`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_pohon`
--
ALTER TABLE `data_pohon`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_pupuk`
--
ALTER TABLE `data_pupuk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `fb_hpt`
--
ALTER TABLE `fb_hpt`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `fb_kontrol_korlap`
--
ALTER TABLE `fb_kontrol_korlap`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `komoditas`
--
ALTER TABLE `komoditas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kontrol_korlap`
--
ALTER TABLE `kontrol_korlap`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `korlap`
--
ALTER TABLE `korlap`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korlap_code_unique` (`code`),
  ADD KEY `korlap_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mitra_tani`
--
ALTER TABLE `mitra_tani`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mitra_tani_code_unique` (`code`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pelayanan`
--
ALTER TABLE `pelayanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelayanan_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `tim_ahli`
--
ALTER TABLE `tim_ahli`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tim_ahli_code_unique` (`code`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `varietas`
--
ALTER TABLE `varietas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_hpt`
--
ALTER TABLE `data_hpt`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_pohon`
--
ALTER TABLE `data_pohon`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_pupuk`
--
ALTER TABLE `data_pupuk`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `fb_hpt`
--
ALTER TABLE `fb_hpt`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `fb_kontrol_korlap`
--
ALTER TABLE `fb_kontrol_korlap`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `komoditas`
--
ALTER TABLE `komoditas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kontrol_korlap`
--
ALTER TABLE `kontrol_korlap`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `korlap`
--
ALTER TABLE `korlap`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `mitra_tani`
--
ALTER TABLE `mitra_tani`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pelayanan`
--
ALTER TABLE `pelayanan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tim_ahli`
--
ALTER TABLE `tim_ahli`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `varietas`
--
ALTER TABLE `varietas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `korlap`
--
ALTER TABLE `korlap`
  ADD CONSTRAINT `korlap_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pelayanan`
--
ALTER TABLE `pelayanan`
  ADD CONSTRAINT `pelayanan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
