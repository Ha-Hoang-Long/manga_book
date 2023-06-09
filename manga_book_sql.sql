USE [master]
GO
/****** Object:  Database [manga_book]    Script Date: 26/04/2023 10:48:04 SA ******/
CREATE DATABASE [manga_book]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'manga_book', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL15.LONG\MSSQL\DATA\manga_book.mdf' , SIZE = 8192KB , MAXSIZE = UNLIMITED, FILEGROWTH = 65536KB )
 LOG ON 
( NAME = N'manga_book_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL15.LONG\MSSQL\DATA\manga_book_log.ldf' , SIZE = 8192KB , MAXSIZE = 2048GB , FILEGROWTH = 65536KB )
 WITH CATALOG_COLLATION = DATABASE_DEFAULT
GO
ALTER DATABASE [manga_book] SET COMPATIBILITY_LEVEL = 150
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [manga_book].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [manga_book] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [manga_book] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [manga_book] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [manga_book] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [manga_book] SET ARITHABORT OFF 
GO
ALTER DATABASE [manga_book] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [manga_book] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [manga_book] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [manga_book] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [manga_book] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [manga_book] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [manga_book] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [manga_book] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [manga_book] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [manga_book] SET  DISABLE_BROKER 
GO
ALTER DATABASE [manga_book] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [manga_book] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [manga_book] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [manga_book] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [manga_book] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [manga_book] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [manga_book] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [manga_book] SET RECOVERY FULL 
GO
ALTER DATABASE [manga_book] SET  MULTI_USER 
GO
ALTER DATABASE [manga_book] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [manga_book] SET DB_CHAINING OFF 
GO
ALTER DATABASE [manga_book] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [manga_book] SET TARGET_RECOVERY_TIME = 60 SECONDS 
GO
ALTER DATABASE [manga_book] SET DELAYED_DURABILITY = DISABLED 
GO
ALTER DATABASE [manga_book] SET ACCELERATED_DATABASE_RECOVERY = OFF  
GO
EXEC sys.sp_db_vardecimal_storage_format N'manga_book', N'ON'
GO
ALTER DATABASE [manga_book] SET QUERY_STORE = OFF
GO
USE [manga_book]
GO
/****** Object:  Table [dbo].[admins]    Script Date: 26/04/2023 10:48:04 SA ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[admins](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[name] [nvarchar](255) NOT NULL,
	[email] [nvarchar](255) NOT NULL,
	[password] [nvarchar](255) NOT NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[chapters]    Script Date: 26/04/2023 10:48:04 SA ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[chapters](
	[Ma_chap] [nvarchar](20) NOT NULL,
	[Ma_truyen] [nvarchar](20) NOT NULL,
	[Ten_chap] [nvarchar](100) NOT NULL,
	[Status] [int] NOT NULL,
	[Hinh_anh_1] [nvarchar](max) NULL,
	[Hinh_anh_2] [nvarchar](max) NULL,
	[Hinh_anh_3] [nvarchar](max) NULL,
	[Hinh_anh_4] [nvarchar](max) NULL,
	[Hinh_anh_5] [nvarchar](max) NULL,
	[Hinh_anh_6] [nvarchar](max) NULL,
	[Hinh_anh_7] [nvarchar](max) NULL,
	[Hinh_anh_8] [nvarchar](max) NULL,
	[Hinh_anh_9] [nvarchar](max) NULL,
	[Hinh_anh_10] [nvarchar](max) NULL,
	[Hinh_anh_11] [nvarchar](max) NULL,
	[Hinh_anh_12] [nvarchar](max) NULL,
	[Hinh_anh_13] [nvarchar](max) NULL,
	[Hinh_anh_14] [nvarchar](max) NULL,
	[Hinh_anh_15] [nvarchar](max) NULL,
	[Hinh_anh_16] [nvarchar](max) NULL,
	[Hinh_anh_17] [nvarchar](max) NULL,
	[Hinh_anh_18] [nvarchar](max) NULL,
	[Hinh_anh_19] [nvarchar](max) NULL,
	[Hinh_anh_20] [nvarchar](max) NULL,
	[updated_at] [datetime] NULL,
	[created_at] [datetime] NOT NULL,
 CONSTRAINT [chapters_ma_chap_primary] PRIMARY KEY CLUSTERED 
(
	[Ma_chap] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[comments]    Script Date: 26/04/2023 10:48:04 SA ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[comments](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[Ma_truyen] [nvarchar](20) NOT NULL,
	[user_id_comment] [int] NOT NULL,
	[Noi_dung] [nvarchar](max) NOT NULL,
	[updated_at] [datetime] NULL,
	[created_at] [datetime] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[failed_jobs]    Script Date: 26/04/2023 10:48:04 SA ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[failed_jobs](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[uuid] [nvarchar](255) NOT NULL,
	[connection] [nvarchar](max) NOT NULL,
	[queue] [nvarchar](max) NOT NULL,
	[payload] [nvarchar](max) NOT NULL,
	[exception] [nvarchar](max) NOT NULL,
	[failed_at] [datetime] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[migrations]    Script Date: 26/04/2023 10:48:04 SA ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[migrations](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[migration] [nvarchar](255) NOT NULL,
	[batch] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[password_resets]    Script Date: 26/04/2023 10:48:04 SA ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[password_resets](
	[email] [nvarchar](255) NOT NULL,
	[token] [nvarchar](255) NOT NULL,
	[created_at] [datetime] NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[personal_access_tokens]    Script Date: 26/04/2023 10:48:04 SA ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[personal_access_tokens](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[tokenable_type] [nvarchar](255) NOT NULL,
	[tokenable_id] [bigint] NOT NULL,
	[name] [nvarchar](255) NOT NULL,
	[token] [nvarchar](64) NOT NULL,
	[abilities] [nvarchar](max) NULL,
	[last_used_at] [datetime] NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[sessions]    Script Date: 26/04/2023 10:48:04 SA ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[sessions](
	[id] [nvarchar](255) NOT NULL,
	[user_id] [bigint] NULL,
	[ip_address] [nvarchar](45) NULL,
	[user_agent] [nvarchar](max) NULL,
	[payload] [nvarchar](max) NOT NULL,
	[last_activity] [int] NOT NULL,
 CONSTRAINT [sessions_id_primary] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[statuss]    Script Date: 26/04/2023 10:48:04 SA ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[statuss](
	[id] [int] NOT NULL,
	[name] [nvarchar](255) NOT NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
 CONSTRAINT [statuss_id_primary] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[theloais]    Script Date: 26/04/2023 10:48:04 SA ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[theloais](
	[Ma_the_loai] [nvarchar](10) NOT NULL,
	[Ten_the_loai] [nvarchar](255) NOT NULL,
	[updated_at] [datetime] NULL,
	[created_at] [datetime] NOT NULL,
 CONSTRAINT [theloais_ma_the_loai_primary] PRIMARY KEY CLUSTERED 
(
	[Ma_the_loai] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[truyens]    Script Date: 26/04/2023 10:48:04 SA ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[truyens](
	[Ma_truyen] [nvarchar](20) NOT NULL,
	[Ten_truyen] [nvarchar](100) NOT NULL,
	[Ma_the_loai] [nvarchar](10) NOT NULL,
	[Noi_dung] [nvarchar](max) NOT NULL,
	[user_id] [int] NULL,
	[Status] [int] NOT NULL,
	[Hinh_anh_truyen] [nvarchar](max) NOT NULL,
	[updated_at] [datetime] NULL,
	[created_at] [datetime] NOT NULL,
 CONSTRAINT [truyens_ma_truyen_primary] PRIMARY KEY CLUSTERED 
(
	[Ma_truyen] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[users]    Script Date: 26/04/2023 10:48:04 SA ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[users](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[name] [nvarchar](255) NOT NULL,
	[email] [nvarchar](255) NOT NULL,
	[phone_number] [nvarchar](255) NOT NULL,
	[email_verified_at] [datetime] NULL,
	[password] [nvarchar](255) NOT NULL,
	[remember_token] [nvarchar](100) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
SET IDENTITY_INSERT [dbo].[admins] ON 

INSERT [dbo].[admins] ([id], [name], [email], [password], [created_at], [updated_at]) VALUES (1, N'Hoàng Long', N'admin', N'$2y$10$QhAvfAZ/ElCyskj95jS1FuvAWoqqavfiRoH32uOVLz9d6C2LBlokO', NULL, NULL)
SET IDENTITY_INSERT [dbo].[admins] OFF
GO
SET IDENTITY_INSERT [dbo].[migrations] ON 

INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (11, N'2014_10_12_000000_create_users_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (12, N'2014_10_12_100000_create_password_resets_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (13, N'2019_08_19_000000_create_failed_jobs_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (14, N'2019_12_14_000001_create_personal_access_tokens_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (15, N'2023_04_10_080622_create_admins_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (16, N'2023_04_10_233537_create_theloai_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (17, N'2023_04_10_234254_create_truyen_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (19, N'2023_04_10_235625_create_comment_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (20, N'2023_04_19_042531_create_sessions_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (21, N'2023_04_24_072844_create_statuss_table', 2)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (22, N'2023_04_10_234917_create_chapter_table', 3)
SET IDENTITY_INSERT [dbo].[migrations] OFF
GO
INSERT [dbo].[statuss] ([id], [name], [created_at], [updated_at]) VALUES (1, N'Chờ xử lý', NULL, NULL)
INSERT [dbo].[statuss] ([id], [name], [created_at], [updated_at]) VALUES (2, N'đã duyệt', NULL, NULL)
INSERT [dbo].[statuss] ([id], [name], [created_at], [updated_at]) VALUES (3, N'Không duyệt', NULL, NULL)
GO
INSERT [dbo].[theloais] ([Ma_the_loai], [Ten_the_loai], [updated_at], [created_at]) VALUES (N'HH', N'Huyền huyển', NULL, CAST(N'2023-04-24T14:43:44.637' AS DateTime))
INSERT [dbo].[theloais] ([Ma_the_loai], [Ten_the_loai], [updated_at], [created_at]) VALUES (N'TH', N'Tiên Hiệp', NULL, CAST(N'2023-04-24T14:43:49.333' AS DateTime))
GO
INSERT [dbo].[truyens] ([Ma_truyen], [Ten_truyen], [Ma_the_loai], [Noi_dung], [user_id], [Status], [Hinh_anh_truyen], [updated_at], [created_at]) VALUES (N'dptk', N'Đấu phá thương khung', N'HH', N'đấu phá thương khung', NULL, 2, N'1MzpWQBT5lAKhdJcizPFY7V6BKjKDKNfN', NULL, CAST(N'2023-04-26T10:29:17.163' AS DateTime))
INSERT [dbo].[truyens] ([Ma_truyen], [Ten_truyen], [Ma_the_loai], [Noi_dung], [user_id], [Status], [Hinh_anh_truyen], [updated_at], [created_at]) VALUES (N'tavt', N'Thần ấn vương tọa', N'HH', N'Thần ấn vương tọa', 9, 2, N'1uwX02Jr6zuKHyCUs4ih4T_5gjleTBZz1', CAST(N'2023-04-25T18:59:46.333' AS DateTime), CAST(N'2023-04-24T14:58:11.597' AS DateTime))
INSERT [dbo].[truyens] ([Ma_truyen], [Ten_truyen], [Ma_the_loai], [Noi_dung], [user_id], [Status], [Hinh_anh_truyen], [updated_at], [created_at]) VALUES (N'tghm', N'Thế giới hoàn mỹ', N'HH', N'Thế giới hoàn mỹ', NULL, 2, N'1UzuZxa2390j9NKrRbgoxXMWnOzkG3e11', NULL, CAST(N'2023-04-24T15:19:20.433' AS DateTime))
GO
SET IDENTITY_INSERT [dbo].[users] ON 

INSERT [dbo].[users] ([id], [name], [email], [phone_number], [email_verified_at], [password], [remember_token], [created_at], [updated_at]) VALUES (9, N'long', N'hoanglongvt1216@gmail.com', N'0932402110', NULL, N'$2y$10$LMektXk92fSMRKJSke.OH.iR.m7wHuqiT3N4wulvFxUyQsO8YsA9G', NULL, CAST(N'2023-04-23T14:00:35.227' AS DateTime), CAST(N'2023-04-23T14:00:35.227' AS DateTime))
INSERT [dbo].[users] ([id], [name], [email], [phone_number], [email_verified_at], [password], [remember_token], [created_at], [updated_at]) VALUES (10, N'manga_book', N'long@gmail.com', N'0935542105', NULL, N'$2y$10$S44NDx2eti.Ac3fEH.bPieM2HhHGL7PaSZKm7OBW4e5PxqEO9/u0m', NULL, CAST(N'2023-04-24T08:17:18.837' AS DateTime), CAST(N'2023-04-24T08:17:18.837' AS DateTime))
SET IDENTITY_INSERT [dbo].[users] OFF
GO
SET ANSI_PADDING ON
GO
/****** Object:  Index [admins_email_unique]    Script Date: 26/04/2023 10:48:04 SA ******/
CREATE UNIQUE NONCLUSTERED INDEX [admins_email_unique] ON [dbo].[admins]
(
	[email] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, IGNORE_DUP_KEY = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
SET ANSI_PADDING ON
GO
/****** Object:  Index [failed_jobs_uuid_unique]    Script Date: 26/04/2023 10:48:04 SA ******/
CREATE UNIQUE NONCLUSTERED INDEX [failed_jobs_uuid_unique] ON [dbo].[failed_jobs]
(
	[uuid] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, IGNORE_DUP_KEY = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
SET ANSI_PADDING ON
GO
/****** Object:  Index [password_resets_email_index]    Script Date: 26/04/2023 10:48:04 SA ******/
CREATE NONCLUSTERED INDEX [password_resets_email_index] ON [dbo].[password_resets]
(
	[email] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
SET ANSI_PADDING ON
GO
/****** Object:  Index [personal_access_tokens_token_unique]    Script Date: 26/04/2023 10:48:04 SA ******/
CREATE UNIQUE NONCLUSTERED INDEX [personal_access_tokens_token_unique] ON [dbo].[personal_access_tokens]
(
	[token] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, IGNORE_DUP_KEY = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
SET ANSI_PADDING ON
GO
/****** Object:  Index [personal_access_tokens_tokenable_type_tokenable_id_index]    Script Date: 26/04/2023 10:48:04 SA ******/
CREATE NONCLUSTERED INDEX [personal_access_tokens_tokenable_type_tokenable_id_index] ON [dbo].[personal_access_tokens]
(
	[tokenable_type] ASC,
	[tokenable_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
/****** Object:  Index [sessions_last_activity_index]    Script Date: 26/04/2023 10:48:04 SA ******/
CREATE NONCLUSTERED INDEX [sessions_last_activity_index] ON [dbo].[sessions]
(
	[last_activity] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
/****** Object:  Index [sessions_user_id_index]    Script Date: 26/04/2023 10:48:04 SA ******/
CREATE NONCLUSTERED INDEX [sessions_user_id_index] ON [dbo].[sessions]
(
	[user_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
SET ANSI_PADDING ON
GO
/****** Object:  Index [users_email_unique]    Script Date: 26/04/2023 10:48:04 SA ******/
CREATE UNIQUE NONCLUSTERED INDEX [users_email_unique] ON [dbo].[users]
(
	[email] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, IGNORE_DUP_KEY = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
SET ANSI_PADDING ON
GO
/****** Object:  Index [users_phone_number_unique]    Script Date: 26/04/2023 10:48:04 SA ******/
CREATE UNIQUE NONCLUSTERED INDEX [users_phone_number_unique] ON [dbo].[users]
(
	[phone_number] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, IGNORE_DUP_KEY = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
ALTER TABLE [dbo].[chapters] ADD  DEFAULT (getdate()) FOR [created_at]
GO
ALTER TABLE [dbo].[comments] ADD  DEFAULT (getdate()) FOR [created_at]
GO
ALTER TABLE [dbo].[failed_jobs] ADD  DEFAULT (getdate()) FOR [failed_at]
GO
ALTER TABLE [dbo].[theloais] ADD  DEFAULT (getdate()) FOR [created_at]
GO
ALTER TABLE [dbo].[truyens] ADD  DEFAULT (getdate()) FOR [created_at]
GO
ALTER TABLE [dbo].[chapters]  WITH CHECK ADD  CONSTRAINT [chapters_ma_truyen_foreign] FOREIGN KEY([Ma_truyen])
REFERENCES [dbo].[truyens] ([Ma_truyen])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[chapters] CHECK CONSTRAINT [chapters_ma_truyen_foreign]
GO
ALTER TABLE [dbo].[comments]  WITH CHECK ADD  CONSTRAINT [comments_ma_truyen_foreign] FOREIGN KEY([Ma_truyen])
REFERENCES [dbo].[truyens] ([Ma_truyen])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[comments] CHECK CONSTRAINT [comments_ma_truyen_foreign]
GO
ALTER TABLE [dbo].[comments]  WITH CHECK ADD  CONSTRAINT [comments_user_id_comment_foreign] FOREIGN KEY([user_id_comment])
REFERENCES [dbo].[users] ([id])
GO
ALTER TABLE [dbo].[comments] CHECK CONSTRAINT [comments_user_id_comment_foreign]
GO
ALTER TABLE [dbo].[truyens]  WITH CHECK ADD  CONSTRAINT [truyens_ma_the_loai_foreign] FOREIGN KEY([Ma_the_loai])
REFERENCES [dbo].[theloais] ([Ma_the_loai])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[truyens] CHECK CONSTRAINT [truyens_ma_the_loai_foreign]
GO
ALTER TABLE [dbo].[truyens]  WITH CHECK ADD  CONSTRAINT [truyens_user_id_foreign] FOREIGN KEY([user_id])
REFERENCES [dbo].[users] ([id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[truyens] CHECK CONSTRAINT [truyens_user_id_foreign]
GO
USE [master]
GO
ALTER DATABASE [manga_book] SET  READ_WRITE 
GO
