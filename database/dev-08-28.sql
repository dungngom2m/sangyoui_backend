/*
 Navicat Premium Data Transfer

 Source Server         : Sangyoui - Dev
 Source Server Type    : PostgreSQL
 Source Server Version : 140007
 Source Host           : awseb-e-exrdmrccbp-stack-awsebrdsdatabase-nk62qs84kmc6.c2vo378sk4im.ap-northeast-1.rds.amazonaws.com:5432
 Source Catalog        : ebdb
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 140007
 File Encoding         : 65001

 Date: 28/08/2023 12:00:16
*/


-- ----------------------------
-- Sequence structure for m_client_employee_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."m_client_employee_id_seq";
CREATE SEQUENCE "public"."m_client_employee_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;
ALTER SEQUENCE "public"."m_client_employee_id_seq" OWNER TO "root";

-- ----------------------------
-- Sequence structure for m_client_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."m_client_id_seq";
CREATE SEQUENCE "public"."m_client_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;
ALTER SEQUENCE "public"."m_client_id_seq" OWNER TO "root";

-- ----------------------------
-- Sequence structure for m_client_user_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."m_client_user_id_seq";
CREATE SEQUENCE "public"."m_client_user_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;
ALTER SEQUENCE "public"."m_client_user_id_seq" OWNER TO "root";

-- ----------------------------
-- Sequence structure for m_gensen_zeiritsu_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."m_gensen_zeiritsu_id_seq";
CREATE SEQUENCE "public"."m_gensen_zeiritsu_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;
ALTER SEQUENCE "public"."m_gensen_zeiritsu_id_seq" OWNER TO "root";

-- ----------------------------
-- Sequence structure for m_maching_ng_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."m_maching_ng_id_seq";
CREATE SEQUENCE "public"."m_maching_ng_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;
ALTER SEQUENCE "public"."m_maching_ng_id_seq" OWNER TO "root";

-- ----------------------------
-- Sequence structure for m_questionnaire_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."m_questionnaire_id_seq";
CREATE SEQUENCE "public"."m_questionnaire_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;
ALTER SEQUENCE "public"."m_questionnaire_id_seq" OWNER TO "root";

-- ----------------------------
-- Sequence structure for m_sangyoi_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."m_sangyoi_id_seq";
CREATE SEQUENCE "public"."m_sangyoi_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;
ALTER SEQUENCE "public"."m_sangyoi_id_seq" OWNER TO "root";

-- ----------------------------
-- Sequence structure for m_user_company_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."m_user_company_id_seq";
CREATE SEQUENCE "public"."m_user_company_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;
ALTER SEQUENCE "public"."m_user_company_id_seq" OWNER TO "root";

-- ----------------------------
-- Sequence structure for m_user_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."m_user_id_seq";
CREATE SEQUENCE "public"."m_user_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;
ALTER SEQUENCE "public"."m_user_id_seq" OWNER TO "root";

-- ----------------------------
-- Sequence structure for migrations_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."migrations_id_seq";
CREATE SEQUENCE "public"."migrations_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;
ALTER SEQUENCE "public"."migrations_id_seq" OWNER TO "root";

-- ----------------------------
-- Sequence structure for personal_access_tokens_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."personal_access_tokens_id_seq";
CREATE SEQUENCE "public"."personal_access_tokens_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."personal_access_tokens_id_seq" OWNER TO "root";

-- ----------------------------
-- Sequence structure for posts_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."posts_id_seq";
CREATE SEQUENCE "public"."posts_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;
ALTER SEQUENCE "public"."posts_id_seq" OWNER TO "root";

-- ----------------------------
-- Sequence structure for t_certification_code_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."t_certification_code_id_seq";
CREATE SEQUENCE "public"."t_certification_code_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;
ALTER SEQUENCE "public"."t_certification_code_id_seq" OWNER TO "root";

-- ----------------------------
-- Sequence structure for t_counseling_reserve_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."t_counseling_reserve_id_seq";
CREATE SEQUENCE "public"."t_counseling_reserve_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;
ALTER SEQUENCE "public"."t_counseling_reserve_id_seq" OWNER TO "root";

-- ----------------------------
-- Sequence structure for t_counseling_reserve_notice_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."t_counseling_reserve_notice_id_seq";
CREATE SEQUENCE "public"."t_counseling_reserve_notice_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;
ALTER SEQUENCE "public"."t_counseling_reserve_notice_id_seq" OWNER TO "root";

-- ----------------------------
-- Sequence structure for t_kihoninf_general_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."t_kihoninf_general_id_seq";
CREATE SEQUENCE "public"."t_kihoninf_general_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;
ALTER SEQUENCE "public"."t_kihoninf_general_id_seq" OWNER TO "root";

-- ----------------------------
-- Sequence structure for t_kihoninf_hospital_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."t_kihoninf_hospital_id_seq";
CREATE SEQUENCE "public"."t_kihoninf_hospital_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;
ALTER SEQUENCE "public"."t_kihoninf_hospital_id_seq" OWNER TO "root";

-- ----------------------------
-- Sequence structure for t_question_answer_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."t_question_answer_id_seq";
CREATE SEQUENCE "public"."t_question_answer_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;
ALTER SEQUENCE "public"."t_question_answer_id_seq" OWNER TO "root";

-- ----------------------------
-- Sequence structure for t_report_general_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."t_report_general_id_seq";
CREATE SEQUENCE "public"."t_report_general_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;
ALTER SEQUENCE "public"."t_report_general_id_seq" OWNER TO "root";

-- ----------------------------
-- Sequence structure for t_report_hospital_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."t_report_hospital_id_seq";
CREATE SEQUENCE "public"."t_report_hospital_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;
ALTER SEQUENCE "public"."t_report_hospital_id_seq" OWNER TO "root";

-- ----------------------------
-- Sequence structure for t_sangyoi_schedule_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."t_sangyoi_schedule_id_seq";
CREATE SEQUENCE "public"."t_sangyoi_schedule_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;
ALTER SEQUENCE "public"."t_sangyoi_schedule_id_seq" OWNER TO "root";

-- ----------------------------
-- Sequence structure for t_working_time_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."t_working_time_id_seq";
CREATE SEQUENCE "public"."t_working_time_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;
ALTER SEQUENCE "public"."t_working_time_id_seq" OWNER TO "root";

-- ----------------------------
-- Sequence structure for users_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."users_id_seq";
CREATE SEQUENCE "public"."users_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;
ALTER SEQUENCE "public"."users_id_seq" OWNER TO "root";

-- ----------------------------
-- Table structure for m_client
-- ----------------------------
DROP TABLE IF EXISTS "public"."m_client";
CREATE TABLE "public"."m_client" (
  "id" int4 NOT NULL GENERATED ALWAYS AS IDENTITY (
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
),
  "user_company_id" int4 NOT NULL,
  "client_code" varchar(5) COLLATE "pg_catalog"."default" NOT NULL,
  "client_status" int4 NOT NULL,
  "keiyaku_date" date,
  "client_name" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "client_name_kana" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "post_number" varchar(7) COLLATE "pg_catalog"."default" NOT NULL,
  "todofuken" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "chikucyoson" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "tatemono" varchar(100) COLLATE "pg_catalog"."default",
  "heyabango" varchar(100) COLLATE "pg_catalog"."default",
  "tel_number" varchar(13) COLLATE "pg_catalog"."default" NOT NULL,
  "manager_name_1" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "manager_name_kana_1" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "manager_mailaddr_1" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "manager_contact_telnumber_1" varchar(13) COLLATE "pg_catalog"."default" NOT NULL,
  "manager_name_2" varchar(100) COLLATE "pg_catalog"."default",
  "manager_name_kana_2" varchar(100) COLLATE "pg_catalog"."default",
  "manager_mailaddr_2" varchar(100) COLLATE "pg_catalog"."default",
  "manager_contact_telnumber_2" varchar(13) COLLATE "pg_catalog"."default",
  "manager_name_3" varchar(100) COLLATE "pg_catalog"."default",
  "manager_name_kana_3" varchar(100) COLLATE "pg_catalog"."default",
  "manager_mailaddr_3" varchar(100) COLLATE "pg_catalog"."default",
  "manager_contact_telnumber_3" varchar(13) COLLATE "pg_catalog"."default",
  "manager_name_4" varchar(100) COLLATE "pg_catalog"."default",
  "manager_name_kana_4" varchar(100) COLLATE "pg_catalog"."default",
  "manager_mailaddr_4" varchar(100) COLLATE "pg_catalog"."default",
  "manager_contact_telnumber_4" varchar(13) COLLATE "pg_catalog"."default",
  "manager_name_5" varchar(100) COLLATE "pg_catalog"."default",
  "manager_name_kana_5" varchar(100) COLLATE "pg_catalog"."default",
  "manager_mailaddr_5" varchar(100) COLLATE "pg_catalog"."default",
  "manager_contact_telnumber_5" varchar(13) COLLATE "pg_catalog"."default",
  "regist_id" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamptz(6) NOT NULL,
  "update_id" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "updated_at" timestamptz(6) NOT NULL,
  "deleted_at" timestamptz(6),
  "api_key" varchar(1000) COLLATE "pg_catalog"."default",
  "overtime_border" int4 NOT NULL,
  "chiiki_cd" int4 NOT NULL,
  "base_price_fixed" int4 NOT NULL DEFAULT 0,
  "base_price_paruse" int4 NOT NULL DEFAULT 0
)
;
ALTER TABLE "public"."m_client" OWNER TO "root";
COMMENT ON COLUMN "public"."m_client"."client_status" IS '0:病院・医院、1:その他企業';

-- ----------------------------
-- Records of m_client
-- ----------------------------
BEGIN;
INSERT INTO "public"."m_client" OVERRIDING SYSTEM VALUE VALUES (7, 5, '130aw', 0, '2023-08-09', 'Client Name 8', 'Client Name kana', '9999999', '11111', '111111', '1111111', '111111', '111111111', '12b', 'Manager 12', 'clientmana@sample.com', '111111111', '12baaa', 'Manager 1aaa2', 'clientmanaaaa@sample.com', '1111131111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5', '2023-07-27 01:00:41+00', '5', '2023-07-27 01:02:42+00', NULL, '1111111111111111111111111111', 13, 4, 110, 120);
INSERT INTO "public"."m_client" OVERRIDING SYSTEM VALUE VALUES (8, 5, 'Y001', 0, '2023-07-28', '21Y', 'ふりがな', '1000000', '岩手県', '山口県', '山口県y', 'Test', '90000000000', 'M1-1', 'ふりがな', 'nguyenhaiyenkm11@gmail.com', '09746820311', 'M2', 'ふりがなふりがな', 'nguyenhaiyenkm11@gmail.com', '09746820311', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5', '2023-07-28 12:37:43+00', '5', '2023-07-28 12:38:23+00', NULL, 'API 123', 123, 5, 12000, 10000);
INSERT INTO "public"."m_client" OVERRIDING SYSTEM VALUE VALUES (9, 5, 'Y002', 0, '2023-07-22', '21Y', 'ふりがな', '1000000', '北海道', '山口県', '山口県y', 'Test', '90000000009', 'M1-2', 'ふりがな', 'nguyenhaiyenkm11@gmail.com', '09746820312', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5', '2023-07-28 12:40:27+00', '5', '2023-07-28 12:40:27+00', NULL, NULL, 123, 3, 10000, 10000);
INSERT INTO "public"."m_client" OVERRIDING SYSTEM VALUE VALUES (10, 5, 'Y010', 0, '2023-07-28', '2807', 'ふりがな', '1000000', '青森県', '山口県', '山口県y', 'Test', '90000000009', 'Y010-M1', 'ふりがな', 'nguyenhaiyenkm11@gmail.com', '09746820311', 'Y010- M2', 'ふりがなふりがな', 'yenesnguyen711@gmail.com', '09746820312', 'Y010-M3', 'ふりがな', 'haiyen@m2m-vn.com', '09746820313', 'Y010-M4', 'ふりがな', 'tieuyetchanngan@gmail.com', '09746820314', 'Y010-M5', 'ふりがな', 'yen.nguyen@thinkclimax.com', '09746820315', '5', '2023-07-28 15:34:44+00', '5', '2023-07-28 15:34:44+00', NULL, NULL, 123, 2, 10000, 10000);
INSERT INTO "public"."m_client" OVERRIDING SYSTEM VALUE VALUES (13, 5, 'CODi1', 0, '2023-08-09', 'Client Name', 'Client Name kana', '9999999', '11111', '111111', '111111', '1111111', '111111111', '12b', 'Manager 1', 'clientmana@sample.com', '111111111', '12baaa', 'Manager 1aaa', 'clientmanaaaa@sample.com', '1111131111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5', '2023-08-04 21:55:12+00', '5', '2023-08-04 21:55:12+00', NULL, '1111111111111111111111111111', 10, 2, 110, 120);
INSERT INTO "public"."m_client" OVERRIDING SYSTEM VALUE VALUES (14, 5, 'CODi1', 0, '2023-08-09', 'Client Name', 'Client Name kana', '9999999', '11111', '111111', '111111', '1111111', '111111111', '12b', 'Manager 1', 'clientmana@sample.com', '111111111', '12baaa', 'Manager 1aaa', 'clientmanaaaa@sample.com', '1111131111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5', '2023-08-04 21:55:48+00', '5', '2023-08-04 21:55:48+00', NULL, '1111111111111111111111111111', 10, 2, 110, 120);
INSERT INTO "public"."m_client" OVERRIDING SYSTEM VALUE VALUES (3, 5, 'Yeni2', 0, '2023-07-18', 'Company 1', 'ふりがな', '1234456', '青森県', '山口県', '山口県y', 'Test', '12345678901', 'Name 1', 'ふりがな', 'nguyenhaiyenkm11@gmail.com', '12345678901', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5', '2023-07-19 23:35:54+00', '5', '2023-08-20 19:06:05+00', NULL, 'API 123', 80, 3, 1000, 2000);
INSERT INTO "public"."m_client" OVERRIDING SYSTEM VALUE VALUES (2, 5, 'Yeni1', 0, '2023-07-18', 'Company 1', 'ふりがな', '1234456', '青森県', '山口県', '山口県y', 'Test', '12345678901', 'Name 1', 'ふりがな', 'nguyenhaiyenkm11@gmail.com', '12345678901', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5', '2023-07-19 23:35:54+00', '5', '2023-08-20 19:06:30+00', NULL, 'API 123', 80, 3, 1000, 2000);
INSERT INTO "public"."m_client" OVERRIDING SYSTEM VALUE VALUES (11, 5, '001', 1, '2023-07-29', 'Client NameTest', 'ふりがな', '1000000', '宮城県', '山口県', '山口県y', 'Test', '90000000007', 'M1', 'ふりがな', 'test@test.comn', '09746820311', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5', '2023-07-30 01:11:56+00', '5', '2023-08-12 16:15:55+00', NULL, '123', 123, 2, 10000, 10000);
COMMIT;

-- ----------------------------
-- Table structure for m_client_employee
-- ----------------------------
DROP TABLE IF EXISTS "public"."m_client_employee";
CREATE TABLE "public"."m_client_employee" (
  "id" int4 NOT NULL GENERATED ALWAYS AS IDENTITY (
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
),
  "user_company_id" int4 NOT NULL,
  "client_id" int4 NOT NULL,
  "employee_number" varchar(5) COLLATE "pg_catalog"."default" NOT NULL,
  "name" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "name_kana" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "employee_type" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "busho" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "yakushoku" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "manager_id_1" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "manager_name_1" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "manager_id_2" varchar(100) COLLATE "pg_catalog"."default",
  "manager_name_2" varchar(100) COLLATE "pg_catalog"."default",
  "manager_id_3" varchar(100) COLLATE "pg_catalog"."default",
  "manager_name_3" varchar(100) COLLATE "pg_catalog"."default",
  "manager_id_4" varchar(100) COLLATE "pg_catalog"."default",
  "manager_name_4" varchar(100) COLLATE "pg_catalog"."default",
  "manager_id_5" varchar(100) COLLATE "pg_catalog"."default",
  "manager_name_5" varchar(100) COLLATE "pg_catalog"."default",
  "nyusha_date" date NOT NULL,
  "sex" char(1) COLLATE "pg_catalog"."default" NOT NULL,
  "sms_number" varchar(11) COLLATE "pg_catalog"."default" NOT NULL,
  "mailaddr" varchar(255) COLLATE "pg_catalog"."default",
  "kenkoshindankekka_update_date" date,
  "kenkoshindankekka_filepath" varchar(1000) COLLATE "pg_catalog"."default",
  "retirement_date" date,
  "retirement_flg" char(1) COLLATE "pg_catalog"."default" NOT NULL DEFAULT 0,
  "regist_id" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamptz(6) NOT NULL,
  "update_id" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "updated_at" timestamptz(6) NOT NULL,
  "deleted_at" timestamptz(6),
  "jigyosho" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "token" varchar(8) COLLATE "pg_catalog"."default"
)
;
ALTER TABLE "public"."m_client_employee" OWNER TO "root";

-- ----------------------------
-- Records of m_client_employee
-- ----------------------------
BEGIN;
INSERT INTO "public"."m_client_employee" OVERRIDING SYSTEM VALUE VALUES (3, 5, 2, 'tes', 'HY', 'ふりがな', 'test', 'test', 'test', 'test', 'test', 'test', 'test', NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-19', '2', '12345678907', 'haiyen@m2m-vn.com', NULL, NULL, NULL, '0', '4', '2023-07-20 02:20:14+00', '3', '2023-07-21 03:17:23+00', NULL, 'test', NULL);
INSERT INTO "public"."m_client_employee" OVERRIDING SYSTEM VALUE VALUES (9, 5, 11, 'YEN04', 'Employee', 'Employee Kana', '1a111114', 'a111114', 'a11114', 'a114', 'a111114', 'a114', 'a114', 'a1114', 'a114', 'a114', 'a114', 'a114', 'a114', '2023-07-31', '1', '11111111116', 'yen04@sample.com', NULL, NULL, NULL, '0', '11', '2023-08-02 01:05:05+00', '11', '2023-08-28 09:00:02+00', NULL, 'a11114', 'XvXXJl1g');
INSERT INTO "public"."m_client_employee" OVERRIDING SYSTEM VALUE VALUES (10, 5, 11, 'YEN05', 'Employee', 'Employee Kana', '1a111115', 'a111115', 'a11115', 'a115', 'a111115', 'a115', 'a115', 'a1115', 'a115', 'a115', 'a115', 'a115', 'a115', '2023-07-31', '1', '08077027826', 'yen05@sample.com', NULL, NULL, NULL, '0', '11', '2023-08-02 01:05:05+00', '11', '2023-08-28 09:00:02+00', NULL, 'a11115', 'TirDs4S0');
INSERT INTO "public"."m_client_employee" OVERRIDING SYSTEM VALUE VALUES (6, 5, 11, 'YEN01', 'Employee', 'Employee Kana', '1a111111', 'a111111', 'a11111', 'a111', 'a111111', 'a111', 'a111', 'a1111', 'a111', 'a111', 'a111', 'a111', 'a111', '2023-07-31', '1', '11111111112', 'nguyenhaiyenkm11@gmail.com', NULL, NULL, NULL, '0', '11', '2023-07-25 16:21:41+00', '11', '2023-08-28 09:00:02+00', NULL, 'a11111', 'mHVVBF5B');
INSERT INTO "public"."m_client_employee" OVERRIDING SYSTEM VALUE VALUES (11, 5, 11, 'YEN06', 'Employee', 'Employee Kana', '1a111116', 'a111116', 'a11116', 'a116', 'a111116', 'a116', 'a116', 'a1116', 'a116', 'a116', 'a116', 'a116', 'a116', '2023-07-31', '1', '11111111117', 'yen06@sample.com', NULL, NULL, NULL, '0', '11', '2023-08-02 01:05:05+00', '11', '2023-08-02 01:05:05+00', NULL, 'a11116', NULL);
INSERT INTO "public"."m_client_employee" OVERRIDING SYSTEM VALUE VALUES (12, 5, 11, 'YEN07', 'Employee', 'Employee Kana', '1a111117', 'a111117', 'a11117', 'a117', 'a111117', 'a117', 'a117', 'a1117', 'a117', 'a117', 'a117', 'a117', 'a117', '2023-07-31', '1', '11111111118', 'yen07@sample.com', NULL, NULL, NULL, '0', '11', '2023-08-02 01:05:05+00', '11', '2023-08-02 01:05:05+00', NULL, 'a11117', NULL);
INSERT INTO "public"."m_client_employee" OVERRIDING SYSTEM VALUE VALUES (13, 5, 11, 'YEN08', 'Employee', 'Employee Kana', '1a111118', 'a111118', 'a11118', 'a118', 'a111118', 'a118', 'a118', 'a1118', 'a118', 'a118', 'a118', 'a118', 'a118', '2023-07-31', '1', '11111111119', 'yen08@sample.com', NULL, NULL, NULL, '0', '11', '2023-08-02 01:05:05+00', '11', '2023-08-02 01:05:05+00', NULL, 'a11118', NULL);
INSERT INTO "public"."m_client_employee" OVERRIDING SYSTEM VALUE VALUES (14, 5, 11, 'YEN09', 'Employee', 'Employee Kana', '1a111119', 'a111119', 'a11119', 'a119', 'a111119', 'a119', 'a119', 'a1119', 'a119', 'a119', 'a119', 'a119', 'a119', '2023-07-31', '1', '11111111120', 'yen09@sample.com', NULL, NULL, NULL, '0', '11', '2023-08-02 01:05:05+00', '11', '2023-08-02 01:05:05+00', NULL, 'a11119', NULL);
INSERT INTO "public"."m_client_employee" OVERRIDING SYSTEM VALUE VALUES (15, 5, 11, 'YEN10', 'Employee', 'Employee Kana', '1a111120', 'a111120', 'a11120', 'a120', 'a111120', 'a120', 'a120', 'a1120', 'a120', 'a120', 'a120', 'a120', 'a120', '2023-07-31', '1', '11111111121', 'yen10@sample.com', NULL, NULL, NULL, '0', '11', '2023-08-02 01:05:05+00', '11', '2023-08-02 01:05:05+00', NULL, 'a11120', NULL);
INSERT INTO "public"."m_client_employee" OVERRIDING SYSTEM VALUE VALUES (16, 5, 11, 'YEN11', 'Employee', 'Employee Kana', '1a111121', 'a111121', 'a11121', 'a121', 'a111121', 'a121', 'a121', 'a1121', 'a121', 'a121', 'a121', 'a121', 'a121', '2023-07-31', '1', '11111111122', 'yen11@sample.com', NULL, NULL, NULL, '0', '11', '2023-08-02 01:05:05+00', '11', '2023-08-02 01:05:05+00', NULL, 'a11121', NULL);
INSERT INTO "public"."m_client_employee" OVERRIDING SYSTEM VALUE VALUES (17, 5, 11, 'YEN12', 'Employee', 'Employee Kana', '1a111122', 'a111122', 'a11122', 'a122', 'a111122', 'a122', 'a122', 'a1122', 'a122', 'a122', 'a122', 'a122', 'a122', '2023-07-31', '1', '11111111123', 'yen12@sample.com', NULL, NULL, NULL, '0', '11', '2023-08-02 01:05:05+00', '11', '2023-08-02 01:05:05+00', NULL, 'a11122', NULL);
INSERT INTO "public"."m_client_employee" OVERRIDING SYSTEM VALUE VALUES (2, 5, 2, '123', 'HY', 'ふりがな', '従業員区分', '従業員区分', '従業員区分', '従業員区分', '従業員区分', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-17', '2', '11111111115', NULL, '2023-07-27', 'uploads/client-employee/2023/7/20/l1Cn58M8VNCz9plEB5aAJacGXUOzQ6nhZTTOUDkY.pdf', '2023-07-20', '1', '4', '2023-07-20 02:18:20+00', '3', '2023-07-27 23:49:59+00', NULL, '従業員区分', '5PD00XVq');
INSERT INTO "public"."m_client_employee" OVERRIDING SYSTEM VALUE VALUES (7, 5, 11, 'YEN02', 'Employee', 'Employee Kana', '1a111112', 'a111112', 'a11112', 'a112', 'a111112', 'a112', 'a112', 'a1112', 'a112', 'a112', 'a112', 'a112', 'a112', '2023-07-31', '1', '11111111113', 'yen02@sample.com', NULL, NULL, NULL, '0', '11', '2023-07-28 12:05:12+00', '11', '2023-08-28 09:00:02+00', NULL, 'a11112', 'f3sstjBX');
INSERT INTO "public"."m_client_employee" OVERRIDING SYSTEM VALUE VALUES (8, 5, 11, 'YEN03', 'EmployeeTest2', 'Employee Kana', '1a111113', 'a111113', 'a11113', 'a113', 'a111113', 'a113', 'a113', 'a1113', 'a113', 'a113', 'a113', 'a113', 'a113', '2023-07-31', '1', '11111111114', 'yen03@sample.com', NULL, NULL, NULL, '0', '11', '2023-08-04 10:46:23+00', '11', '2023-08-28 09:00:02+00', NULL, 'a11113', 'VK7ccdxC');
INSERT INTO "public"."m_client_employee" OVERRIDING SYSTEM VALUE VALUES (29, 5, 3, 'YEN13', 'Employee', 'ふりがな', '1a111120', 'a111120', 'a11120', 'a120', 'a111120', 'a120', 'a120', 'a1120', 'a120', 'a120', 'a120', 'a120', 'a120', '2023-09-29', '1', '11111111121', 'yen13@sample.com', NULL, NULL, NULL, '0', '3', '2023-08-05 20:47:32+00', '3', '2023-08-05 20:47:32+00', NULL, 'a11120', NULL);
INSERT INTO "public"."m_client_employee" OVERRIDING SYSTEM VALUE VALUES (30, 5, 3, 'YEN14', 'Employee', 'ふりがな', '1a111121', 'a111121', 'a11121', 'a121', 'a111121', 'a121', 'a121', 'a1121', 'a121', 'a121', 'a121', 'a121', 'a121', '2023-09-29', '1', '11111111122', 'yen14@sample.com', NULL, NULL, NULL, '0', '3', '2023-08-05 20:47:32+00', '3', '2023-08-05 20:47:32+00', NULL, 'a11121', NULL);
INSERT INTO "public"."m_client_employee" OVERRIDING SYSTEM VALUE VALUES (31, 5, 3, 'YEN15', 'Employee', 'ふりがな', '1a111122', 'a111122', 'a11122', 'a122', 'a111122', 'a122', 'a122', 'a1122', 'a122', 'a122', 'a122', 'a122', 'a122', '2023-09-29', '1', '11111111123', 'yen15@sample.com', NULL, NULL, NULL, '0', '3', '2023-08-05 20:47:32+00', '3', '2023-08-05 20:47:32+00', NULL, 'a11122', NULL);
INSERT INTO "public"."m_client_employee" OVERRIDING SYSTEM VALUE VALUES (5, 5, 2, '121ru', 'Employee 3', 'Employee 3', 'Type 2', '111111', '1111111', '1b', 'Manager b1', '2', 'Manager 2', '3', 'Manager 3', '4', 'Manager 4', NULL, NULL, '2023-02-15', '1', '11111111111', 'employee3@sample.com', NULL, NULL, '2023-07-20', '1', '3', '2023-07-28 14:21:40+00', '3', '2023-08-07 23:49:33+00', NULL, '11111', NULL);
INSERT INTO "public"."m_client_employee" OVERRIDING SYSTEM VALUE VALUES (34, 5, 2, 'test', 'Hải Yến', 'ふりがな', 'test', 'test', '12', '12', '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-09', '2', '11111111111', NULL, NULL, NULL, NULL, '0', '3', '2023-08-09 21:41:43+00', '3', '2023-08-09 21:41:43+00', NULL, '12', NULL);
COMMIT;

-- ----------------------------
-- Table structure for m_client_user
-- ----------------------------
DROP TABLE IF EXISTS "public"."m_client_user";
CREATE TABLE "public"."m_client_user" (
  "id" int4 NOT NULL GENERATED ALWAYS AS IDENTITY (
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
),
  "user_company_id" int4 NOT NULL,
  "client_id" int4 NOT NULL,
  "name" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "name_kana" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "mailaddr" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "password" varchar(99) COLLATE "pg_catalog"."default",
  "regist_id" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamptz(6) NOT NULL,
  "update_id" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "updated_at" timestamptz(6) NOT NULL,
  "deleted_at" timestamptz(6),
  "token" varchar(32) COLLATE "pg_catalog"."default",
  "token_issued" timestamptz(6)
)
;
ALTER TABLE "public"."m_client_user" OWNER TO "root";

-- ----------------------------
-- Records of m_client_user
-- ----------------------------
BEGIN;
INSERT INTO "public"."m_client_user" OVERRIDING SYSTEM VALUE VALUES (5, 5, 2, 'xóa', 'ふりがな', 'xia@xoa.com', '$2y$10$buawVdWyLXI80QHaAbXzwuZCSG/iRuBbu5p3Xek20bUheQ5oYOHs.', '4', '2023-07-20 02:25:54+00', '4', '2023-07-20 02:25:59+00', '2023-07-20 02:25:59+00', NULL, NULL);
INSERT INTO "public"."m_client_user" OVERRIDING SYSTEM VALUE VALUES (4, 5, 2, 'HY', 'ふりがな', 'tieuyetchanngan@gmail.com', '$2y$10$xCZBne4TCTw1xKvik8nSqO0L5qKESZba8IyRas9EUs/ClZ.OQgSA2', '3', '2023-07-20 02:04:40+00', '3', '2023-07-20 02:26:12+00', '2023-07-20 02:26:12+00', NULL, NULL);
INSERT INTO "public"."m_client_user" OVERRIDING SYSTEM VALUE VALUES (3, 5, 2, 'Y010-M3', 'ふりがな', 'haiyen@m2m-vn.com', '$2y$10$bXBziD0XH9ceZbqGrW7nUegC/M8/u.HTiBLeZlqZFax4Uv8hRYX9a', '1', '2023-05-30 13:17:16+00', '1', '2023-07-28 15:34:45+00', NULL, 'OaYsQ7fKeZoiFey8336hYap03KQ0sVHM', '2023-07-22 23:00:37+00');
INSERT INTO "public"."m_client_user" OVERRIDING SYSTEM VALUE VALUES (10, 5, 10, 'Y010-M4', 'ふりがな', 'tieuyetchanngan@gmail.com', '$2y$10$b1baxbuQPgDZaMkt4qGmXukS5Cjw7JLBzbxJBcTOHvDtxWrWOq122', '5', '2023-07-28 15:34:45+00', '5', '2023-07-28 15:34:45+00', NULL, NULL, NULL);
INSERT INTO "public"."m_client_user" OVERRIDING SYSTEM VALUE VALUES (11, 5, 10, 'Y010-M5', 'ふりがな', 'yen.nguyen@thinkclimax.com', '$2y$10$zZlfT/DCR/f6xcB32hAlMOTNFrl53yY/PBX5kh/eAVFkCSSW1i1KC', '5', '2023-07-28 15:34:45+00', '5', '2023-07-28 15:34:45+00', NULL, NULL, NULL);
INSERT INTO "public"."m_client_user" OVERRIDING SYSTEM VALUE VALUES (6, 5, 7, '12b', 'Manager 1', 'clientmana@sample.com', '$2y$10$D5Bcx8HLOpbzmYcnro1gfeD74eFupG8EsN5a0aiNj9JTyBVF5k.vK', '5', '2023-07-27 01:00:42+00', '5', '2023-08-04 21:55:18+00', NULL, NULL, NULL);
INSERT INTO "public"."m_client_user" OVERRIDING SYSTEM VALUE VALUES (7, 5, 7, '12baaa', 'Manager 1aaa', 'clientmanaaaa@sample.com', '$2y$10$JqJBCGySefD121UA96cDEOXKF65kW8uXLflb5XiwKG3ftVmsE6Uxy', '5', '2023-07-27 01:00:49+00', '5', '2023-08-04 21:55:19+00', NULL, NULL, NULL);
INSERT INTO "public"."m_client_user" OVERRIDING SYSTEM VALUE VALUES (8, 5, 8, 'Name 1', 'ふりがな', 'nguyenhaiyenkm11@gmail.com', '$2y$10$dPNuq1uNleAd0Fc4R0.nzuxV2UIfmDLrqFaHUV3rSlYbWyllUK8hi', '5', '2023-07-28 12:37:43+00', '5', '2023-08-05 20:47:35+00', NULL, NULL, NULL);
INSERT INTO "public"."m_client_user" OVERRIDING SYSTEM VALUE VALUES (12, 5, 11, 'M1', 'ふりがな', 'testforwork2710@gmail.com', '$2y$10$eA1cyL3QjNl2P/jsoPlkLOJvn3Qicko/IlnqAaj72yCClnqbK/cIu', '5', '2023-07-30 01:11:57+00', '5', '2023-07-30 01:11:57+00', NULL, NULL, NULL);
INSERT INTO "public"."m_client_user" OVERRIDING SYSTEM VALUE VALUES (13, 5, 11, 'M1', 'ふりがな', 'yenesnguyen711@gmail.com', '$2y$10$yq5daBNk08jxRvio/id7q.o9YHgSJIdm0HhZkd9.xOjzg0tVS3cbK', '5', '2023-08-12 16:15:55+00', '5', '2023-08-12 16:15:55+00', NULL, NULL, NULL);
INSERT INTO "public"."m_client_user" OVERRIDING SYSTEM VALUE VALUES (9, 5, 10, 'Y010- M2', 'ふりがなふりがな', 'yenesnguyen711@gmail.coma', '$2y$10$tZ1hxDmMliikhQBNHRgbU.esGv7g4pZQKX2hY5t5LWWxYnNjaArHW', '5', '2023-07-28 15:34:44+00', '5', '2023-07-28 15:34:44+00', NULL, NULL, NULL);
INSERT INTO "public"."m_client_user" OVERRIDING SYSTEM VALUE VALUES (14, 5, 11, 'M1', 'ふりがな', 'test@test.comn', '$2y$10$2vk/JMjwA4anjbYH8wpkeOkK1KK92H/4K36TQFzJ8dCNHnSrrHUje', '5', '2023-08-20 17:53:09+00', '5', '2023-08-20 17:53:09+00', NULL, NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for m_gensen_zeiritsu
-- ----------------------------
DROP TABLE IF EXISTS "public"."m_gensen_zeiritsu";
CREATE TABLE "public"."m_gensen_zeiritsu" (
  "id" int4 NOT NULL GENERATED ALWAYS AS IDENTITY (
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
),
  "zei_ritsu" float8 NOT NULL,
  "regist_id" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamptz(6) NOT NULL,
  "update_id" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "updated_at" timestamptz(6) NOT NULL,
  "deleted_at" timestamptz(6)
)
;
ALTER TABLE "public"."m_gensen_zeiritsu" OWNER TO "root";

-- ----------------------------
-- Records of m_gensen_zeiritsu
-- ----------------------------
BEGIN;
INSERT INTO "public"."m_gensen_zeiritsu" OVERRIDING SYSTEM VALUE VALUES (1, 10.21, '5', '2023-06-20 22:44:10+00', '1', '2023-06-20 22:44:10+00', NULL);
COMMIT;

-- ----------------------------
-- Table structure for m_maching_ng
-- ----------------------------
DROP TABLE IF EXISTS "public"."m_maching_ng";
CREATE TABLE "public"."m_maching_ng" (
  "id" int4 NOT NULL GENERATED ALWAYS AS IDENTITY (
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
),
  "sangyoi_id" int4 NOT NULL,
  "client_id" int4 NOT NULL,
  "regist_id" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamptz(6) NOT NULL,
  "update_id" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "updated_at" timestamptz(6) NOT NULL,
  "deleted_at" timestamptz(6)
)
;
ALTER TABLE "public"."m_maching_ng" OWNER TO "root";

-- ----------------------------
-- Records of m_maching_ng
-- ----------------------------
BEGIN;
INSERT INTO "public"."m_maching_ng" OVERRIDING SYSTEM VALUE VALUES (26, 2, 2, '5', '2023-08-28 07:26:41+00', '5', '2023-08-28 07:26:41+00', NULL);
INSERT INTO "public"."m_maching_ng" OVERRIDING SYSTEM VALUE VALUES (27, 2, 3, '5', '2023-08-28 07:26:41+00', '5', '2023-08-28 07:26:41+00', NULL);
INSERT INTO "public"."m_maching_ng" OVERRIDING SYSTEM VALUE VALUES (28, 2, 7, '5', '2023-08-28 07:26:41+00', '5', '2023-08-28 07:26:41+00', NULL);
INSERT INTO "public"."m_maching_ng" OVERRIDING SYSTEM VALUE VALUES (29, 2, 8, '5', '2023-08-28 07:26:41+00', '5', '2023-08-28 07:26:41+00', NULL);
INSERT INTO "public"."m_maching_ng" OVERRIDING SYSTEM VALUE VALUES (30, 2, 9, '5', '2023-08-28 07:26:41+00', '5', '2023-08-28 07:26:41+00', NULL);
INSERT INTO "public"."m_maching_ng" OVERRIDING SYSTEM VALUE VALUES (31, 2, 10, '5', '2023-08-28 07:26:41+00', '5', '2023-08-28 07:26:41+00', NULL);
INSERT INTO "public"."m_maching_ng" OVERRIDING SYSTEM VALUE VALUES (32, 2, 11, '5', '2023-08-28 07:26:41+00', '5', '2023-08-28 07:26:41+00', NULL);
INSERT INTO "public"."m_maching_ng" OVERRIDING SYSTEM VALUE VALUES (33, 2, 13, '5', '2023-08-28 07:26:41+00', '5', '2023-08-28 07:26:41+00', NULL);
INSERT INTO "public"."m_maching_ng" OVERRIDING SYSTEM VALUE VALUES (34, 2, 14, '5', '2023-08-28 07:26:41+00', '5', '2023-08-28 07:26:41+00', NULL);
COMMIT;

-- ----------------------------
-- Table structure for m_questionnaire
-- ----------------------------
DROP TABLE IF EXISTS "public"."m_questionnaire";
CREATE TABLE "public"."m_questionnaire" (
  "id" int4 NOT NULL GENERATED ALWAYS AS IDENTITY (
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
),
  "user_company_id" int4 NOT NULL,
  "client_status" int4 NOT NULL,
  "question_lev1_no" int4 NOT NULL,
  "question_lev2_no" int4 NOT NULL,
  "question_title" varchar(1000) COLLATE "pg_catalog"."default" NOT NULL,
  "question_text" varchar(1000) COLLATE "pg_catalog"."default" NOT NULL,
  "answer_text_1" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "answer_text_2" varchar(100) COLLATE "pg_catalog"."default",
  "answer_text_3" varchar(100) COLLATE "pg_catalog"."default",
  "answer_text_4" varchar(100) COLLATE "pg_catalog"."default",
  "regist_id" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamptz(6) NOT NULL,
  "update_id" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "updated_at" timestamptz(6) NOT NULL,
  "deleted_at" timestamptz(6),
  "answer_score_1" int4 DEFAULT 0,
  "answer_score_2" int4 DEFAULT 0,
  "answer_score_3" int4 DEFAULT 0,
  "answer_score_4" int4 DEFAULT 0
)
;
ALTER TABLE "public"."m_questionnaire" OWNER TO "root";

-- ----------------------------
-- Records of m_questionnaire
-- ----------------------------
BEGIN;
INSERT INTO "public"."m_questionnaire" OVERRIDING SYSTEM VALUE VALUES (3, 5, 0, 1, 1, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 'イライラする', 'ほとんどない', '時々ある', 'よくある', NULL, '1', '2023-07-14 02:36:15.852+00', '1', '2023-07-14 02:36:33.73+00', NULL, 0, 1, 3, 0);
INSERT INTO "public"."m_questionnaire" OVERRIDING SYSTEM VALUE VALUES (4, 5, 0, 1, 2, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', '不安だ', 'ほとんどない', '時々ある', 'よくある', NULL, '1', '2023-07-14 02:36:15.852+00', '1', '2023-07-14 02:36:33.73+00', NULL, 0, 1, 3, 0);
INSERT INTO "public"."m_questionnaire" OVERRIDING SYSTEM VALUE VALUES (5, 5, 0, 1, 3, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', '落ち着かない', 'ほとんどない', '時々ある', 'よくある', NULL, '1', '2023-07-14 02:36:15.852+00', '1', '2023-07-14 02:36:33.73+00', NULL, 0, 1, 3, 0);
INSERT INTO "public"."m_questionnaire" OVERRIDING SYSTEM VALUE VALUES (6, 5, 0, 1, 4, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 'ゆううつだ', 'ほとんどない', '時々ある', 'よくある', NULL, '1', '2023-07-14 02:36:15.852+00', '1', '2023-07-14 02:36:33.73+00', NULL, 0, 1, 3, 0);
INSERT INTO "public"."m_questionnaire" OVERRIDING SYSTEM VALUE VALUES (7, 5, 0, 1, 5, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 'よく眠れない', 'ほとんどない', '時々ある', 'よくある', NULL, '1', '2023-07-14 02:36:15.852+00', '1', '2023-07-14 02:36:33.73+00', NULL, 0, 1, 3, 0);
INSERT INTO "public"."m_questionnaire" OVERRIDING SYSTEM VALUE VALUES (8, 5, 0, 1, 6, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', '体の調子が悪い', 'ほとんどない', '時々ある', 'よくある', NULL, '1', '2023-07-14 02:36:15.852+00', '1', '2023-07-14 02:36:33.73+00', NULL, 0, 1, 3, 0);
INSERT INTO "public"."m_questionnaire" OVERRIDING SYSTEM VALUE VALUES (9, 5, 0, 1, 7, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', '物事に集中できない', 'ほとんどない', '時々ある', 'よくある', NULL, '1', '2023-07-14 02:36:15.852+00', '1', '2023-07-14 02:36:33.73+00', NULL, 0, 1, 3, 0);
INSERT INTO "public"."m_questionnaire" OVERRIDING SYSTEM VALUE VALUES (10, 5, 0, 1, 8, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 'することに間違いが多い', 'ほとんどない', '時々ある', 'よくある', '', '1', '2023-07-14 02:36:15.852+00', '1', '2023-07-14 02:36:33.73+00', NULL, 0, 1, 3, 0);
INSERT INTO "public"."m_questionnaire" OVERRIDING SYSTEM VALUE VALUES (11, 5, 0, 1, 9, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', '仕事中、強い眠気に襲われる', 'ほとんどない', '時々ある', 'よくある', '', '1', '2023-07-14 02:36:15.852+00', '1', '2023-07-14 02:36:33.73+00', NULL, 0, 1, 3, 0);
INSERT INTO "public"."m_questionnaire" OVERRIDING SYSTEM VALUE VALUES (12, 5, 0, 1, 10, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 'やる気が出ない', 'ほとんどない', '時々ある', 'よくある', '', '1', '2023-07-14 02:36:15.852+00', '1', '2023-07-14 02:36:33.73+00', NULL, 0, 1, 3, 0);
INSERT INTO "public"."m_questionnaire" OVERRIDING SYSTEM VALUE VALUES (13, 5, 0, 1, 11, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 'へとへとだ(運動後を除く) ※へとへと(非常に疲れて体に力がなくなったさま)', 'ほとんどない', '時々ある', 'よくある', '', '1', '2023-07-14 02:36:15.852+00', '1', '2023-07-14 02:36:33.73+00', NULL, 0, 1, 3, 0);
INSERT INTO "public"."m_questionnaire" OVERRIDING SYSTEM VALUE VALUES (14, 5, 0, 1, 12, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', '朝、起きた時、ぐったりした 疲れを感じる', 'ほとんどない', '時々ある', 'よくある', '', '1', '2023-07-14 02:36:15.852+00', '1', '2023-07-14 02:36:33.73+00', NULL, 0, 1, 3, 0);
INSERT INTO "public"."m_questionnaire" OVERRIDING SYSTEM VALUE VALUES (15, 5, 0, 1, 13, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', '以前とくらべて、疲れやすい', 'ほとんどない', '時々ある', 'よくある', '', '1', '2023-07-14 02:36:15.852+00', '1', '2023-07-14 02:36:33.73+00', NULL, 0, 1, 3, 0);
INSERT INTO "public"."m_questionnaire" OVERRIDING SYSTEM VALUE VALUES (16, 5, 0, 1, 14, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', '食欲がないと感じる', 'ほとんどない', '時々ある', 'よくある', '', '1', '2023-07-14 02:36:15.852+00', '1', '2023-07-14 02:36:33.73+00', NULL, 0, 1, 3, 0);
INSERT INTO "public"."m_questionnaire" OVERRIDING SYSTEM VALUE VALUES (17, 5, 0, 2, 1, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', '1か月の時間外労働(時間外・休日労働時間を含む)', '適当', '多い', '非常に多い', '', '1', '2023-07-14 02:36:15.852+00', '1', '2023-07-14 02:36:33.73+00', NULL, 0, 1, 3, 0);
INSERT INTO "public"."m_questionnaire" OVERRIDING SYSTEM VALUE VALUES (18, 5, 0, 2, 2, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', '不規則な勤務(予定の変更、突然の仕事)', '少ない', '多い', '', '', '1', '2023-07-14 02:36:15.852+00', '1', '2023-07-14 02:36:33.73+00', NULL, 0, 1, 3, 0);
INSERT INTO "public"."m_questionnaire" OVERRIDING SYSTEM VALUE VALUES (19, 5, 0, 2, 3, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', '出張に伴う負担(頻度・拘束時間・時差など)', 'ない又は適当', '大きい', '', '', '1', '2023-07-14 02:36:15.852+00', '1', '2023-07-14 02:36:33.73+00', NULL, 0, 1, 0, 0);
INSERT INTO "public"."m_questionnaire" OVERRIDING SYSTEM VALUE VALUES (20, 5, 0, 2, 4, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', '深夜勤務に伴う負担 ※深夜勤務の頻度や時間数などから総合的に判断してください。 深夜勤務は、深夜時間帯(午後10時-午前5時)の一部または全部を含む勤務をいいます。', 'ない又は小さい', '大きい', '非常に大きい', '', '1', '2023-07-14 02:36:15.852+00', '1', '2023-07-14 02:36:33.73+00', NULL, 0, 1, 0, 0);
INSERT INTO "public"."m_questionnaire" OVERRIDING SYSTEM VALUE VALUES (21, 5, 0, 2, 5, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', '休憩・仮眠の時間数及び施設', '適切である', '不適切である', '', '', '1', '2023-07-14 02:36:15.852+00', '1', '2023-07-14 02:36:33.73+00', NULL, 0, 1, 3, 0);
INSERT INTO "public"."m_questionnaire" OVERRIDING SYSTEM VALUE VALUES (22, 5, 0, 2, 6, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', '仕事についての精神的負担', '小さい', '大きい', '非常に大きい', '', '1', '2023-07-14 02:36:15.852+00', '1', '2023-07-14 02:36:33.73+00', NULL, 0, 1, 0, 0);
INSERT INTO "public"."m_questionnaire" OVERRIDING SYSTEM VALUE VALUES (23, 5, 0, 2, 7, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', '仕事についての身体的負担 ※肉体的作業や寒冷・暑熱作業などの身体的な面での負担をいいます。', '小さい', '大きい', '非常に大きい', '', '1', '2023-07-14 02:36:15.852+00', '1', '2023-07-14 02:36:33.73+00', NULL, 0, 1, 3, 0);
INSERT INTO "public"."m_questionnaire" OVERRIDING SYSTEM VALUE VALUES (24, 5, 0, 2, 8, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', '職場・顧客などの人間関係による負担', '小さい', '大きい', '非常に大きい', '', '1', '2023-07-14 02:36:15.852+00', '1', '2023-07-14 02:36:33.73+00', NULL, 0, 1, 3, 0);
INSERT INTO "public"."m_questionnaire" OVERRIDING SYSTEM VALUE VALUES (25, 5, 0, 2, 9, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', '時間内に処理しきれない仕事', '少ない', '多い', '非常に多い', '', '1', '2023-07-14 02:36:15.852+00', '1', '2023-07-14 02:36:33.73+00', NULL, 0, 1, 3, 0);
INSERT INTO "public"."m_questionnaire" OVERRIDING SYSTEM VALUE VALUES (26, 5, 0, 2, 10, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', '自分のペースでできない仕事', '少ない', '多い', '非常に多い', '', '1', '2023-07-14 02:36:15.852+00', '1', '2023-07-14 02:36:33.73+00', NULL, 0, 1, 3, 0);
INSERT INTO "public"."m_questionnaire" OVERRIDING SYSTEM VALUE VALUES (27, 5, 0, 2, 11, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', '勤務時間外でも仕事のことが気にかかって仕方がない', 'ほとんどない', '時々ある', 'よくある', '', '1', '2023-07-14 02:36:15.852+00', '1', '2023-07-14 02:36:33.73+00', NULL, 0, 1, 3, 0);
INSERT INTO "public"."m_questionnaire" OVERRIDING SYSTEM VALUE VALUES (28, 5, 0, 2, 12, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', '勤務日の睡眠時間', '十分', 'やや足りない', '足りない', '', '1', '2023-07-14 02:36:15.852+00', '1', '2023-07-14 02:36:33.73+00', NULL, 0, 1, 3, 0);
INSERT INTO "public"."m_questionnaire" OVERRIDING SYSTEM VALUE VALUES (29, 5, 0, 2, 13, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', '終業時刻から次の始業時刻の間にある休息時間 ※これを勤務間インターバルといいます', '十分', 'やや足りない', '足りない', '', '1', '2023-07-14 02:36:15.852+00', '1', '2023-07-14 02:36:33.73+00', NULL, 0, 1, 3, 0);
COMMIT;

-- ----------------------------
-- Table structure for m_sangyoi
-- ----------------------------
DROP TABLE IF EXISTS "public"."m_sangyoi";
CREATE TABLE "public"."m_sangyoi" (
  "id" int4 NOT NULL GENERATED ALWAYS AS IDENTITY (
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
),
  "user_company_id" int4 NOT NULL,
  "name" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "name_kana" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "birthday" date NOT NULL,
  "sex" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "post_number" varchar(7) COLLATE "pg_catalog"."default" NOT NULL,
  "todofuken" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "shikucyoson" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "tatemono" varchar(100) COLLATE "pg_catalog"."default",
  "heyabango" varchar(100) COLLATE "pg_catalog"."default",
  "chiiki_cd" int4 NOT NULL,
  "shorui_flg" varchar(1) COLLATE "pg_catalog"."default",
  "shorui_post_number" varchar(7) COLLATE "pg_catalog"."default",
  "shorui_todofuken" varchar(100) COLLATE "pg_catalog"."default",
  "shorui_shikucyoson" varchar(100) COLLATE "pg_catalog"."default",
  "shorui_tatemono" varchar(100) COLLATE "pg_catalog"."default",
  "shorui_heyabango" varchar(100) COLLATE "pg_catalog"."default",
  "contact_mailaddr" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "contact_telnumber" varchar(11) COLLATE "pg_catalog"."default" NOT NULL,
  "shozoku_kbn" int4 NOT NULL,
  "shozoku" varchar(100) COLLATE "pg_catalog"."default",
  "shozoku_busho" varchar(100) COLLATE "pg_catalog"."default",
  "clinical_department" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "keiyaku_kbn" int4 NOT NULL,
  "kyuyo_kbn" int4 NOT NULL,
  "price_1" int4 NOT NULL,
  "price_2" int4 NOT NULL,
  "ginko_name" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "ginko_shiten_name" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "ginko_shiten_name_kana" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "koza_type" varchar(1) COLLATE "pg_catalog"."default" NOT NULL,
  "koza_name_kana" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "koza_number" varchar(7) COLLATE "pg_catalog"."default" NOT NULL,
  "invoice_number" varchar(14) COLLATE "pg_catalog"."default",
  "shousho_number" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "nihonishi_license_flg" varchar(1) COLLATE "pg_catalog"."default" NOT NULL DEFAULT 0,
  "sangyoi_diploma_license_flg" varchar(1) COLLATE "pg_catalog"."default" NOT NULL DEFAULT 0,
  "consultant_license_flg" varchar(1) COLLATE "pg_catalog"."default" NOT NULL DEFAULT 0,
  "other_license_flg" varchar(1) COLLATE "pg_catalog"."default" NOT NULL DEFAULT 0,
  "other_license_memo" varchar(1000) COLLATE "pg_catalog"."default",
  "sangyoi_experience" int4 NOT NULL DEFAULT 0,
  "counseling_experience" int4 NOT NULL DEFAULT 0,
  "clinical_experience" int4 NOT NULL DEFAULT 0,
  "shousho_file_path" varchar(1000) COLLATE "pg_catalog"."default" NOT NULL,
  "memo" varchar(1000) COLLATE "pg_catalog"."default",
  "password" varchar(100) COLLATE "pg_catalog"."default",
  "zoom_client_id" varchar(23) COLLATE "pg_catalog"."default" NOT NULL,
  "zoom_client_secret" varchar(33) COLLATE "pg_catalog"."default" NOT NULL,
  "zoom_mailaddr" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "zoom_token" varchar(256) COLLATE "pg_catalog"."default",
  "regist_id" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamptz(6) NOT NULL,
  "update_id" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "updated_at" timestamptz(6) NOT NULL,
  "deleted_at" timestamptz(6),
  "token" varchar(32) COLLATE "pg_catalog"."default",
  "token_issued" timestamptz(6),
  "zoom_account_id" varchar(23) COLLATE "pg_catalog"."default" NOT NULL
)
;
ALTER TABLE "public"."m_sangyoi" OWNER TO "root";
COMMENT ON COLUMN "public"."m_sangyoi"."sangyoi_experience" IS '0:10年以上, 1:5年以上, 2:2年以上, 3:1年以上, 4:未経験';
COMMENT ON COLUMN "public"."m_sangyoi"."counseling_experience" IS '0:100件以上, 1:50件以上, 2:10件以上, 3:10件未満, 4:なし';
COMMENT ON COLUMN "public"."m_sangyoi"."clinical_experience" IS '0:10年以上, 1:5年以上, 2:2年以上, 3:1年以上, 4:未経験';

-- ----------------------------
-- Records of m_sangyoi
-- ----------------------------
BEGIN;
INSERT INTO "public"."m_sangyoi" OVERRIDING SYSTEM VALUE VALUES (60, 5, 'Name 1', 'Kana 1', '1999-09-09', '1', '1234567', '1234567', '11111', '1111111', '1111111', 1, '0', '1', '111111', '11111111', '111111', '111111', 'sangyoi21y1@sample.com', '111111111', 0, '1', '1111', '11111', 0, 0, 1000, 1000, '111111', '111111', '333', '0', '1234567', '1234567', '1234567', '1234567', '0', '0', '0', '0', 'memooooooooooo', 0, 0, 0, 'uploads/sangyoi/2023/6/15/dSm3jvtMQTnmoPXclozdk8iHTSKmiXSZPmuvx4fn.pdf', '1234567', '$2y$10$uSXHvuJQkovb.Tr14bpt..TVesGAroqRFX.SXjyyXHB5qnbL/H3CS', 'DKq_NkdDRO2ZyijjWATexQ', '8F5vx2mNOTUKzVVnnyHLagS1rTkTSkgJ', '1234567', NULL, '5', '2023-08-27 19:34:14+00', '5', '2023-08-27 19:34:14+00', NULL, NULL, NULL, 'mTOpVWnWRc-I2yNH9AHIEQ');
INSERT INTO "public"."m_sangyoi" OVERRIDING SYSTEM VALUE VALUES (2, 5, 'Name 1', 'ふりがな', '1999-09-09', '1', '1234567', '1234567', '11111', '1111111', '1111111', 1, NULL, '1', '111111', '11111111', '111111', '111111', 'nguyenhaiyenkm11@gmail.com', '99999999999', 1, '1', '1111', '11111', 1, 0, 1000, 1000, '111111', '111111', '333', '0', '1234567', '1234567', '1234567', '1234567', '1', '0', '0', '0', 'memooooooooooo', 0, 0, 0, 'uploads/sangyoi/2023/7/20/8fyNhCH11MYAjyO0NShAQbV9rt2nTFPrLZN3ezZr.pdf', '1234567', '$2y$10$kDdOTsY9gaZOdwsPgx/pD.MhqqsGyJpWVTJM92.DT.o9kd.Km.wQy', 'DKq_NkdDRO2ZyijjWATexQ', '8F5vx2mNOTUKzVVnnyHLagS1rTkTSkgJ', '1234567', NULL, '5', '2023-07-20 00:44:38+00', '5', '2023-08-27 21:49:19+00', NULL, 'bP70kyGBF4ZtO5MmKUWbjQJCZiWUK6ae', '2023-07-21 01:55:03+00', 'mTOpVWnWRc-I2yNH9AHIEQ');
INSERT INTO "public"."m_sangyoi" OVERRIDING SYSTEM VALUE VALUES (62, 5, 'Yeni', 'ふりがな', '2023-08-01', '1', '1000000', '秋田県', '11111Y', '山口県y', 'Test', 2, NULL, '0', NULL, NULL, NULL, NULL, 'testing@dgmail.com', '99999999999', 1, '123', 'test', '11111Y', 1, 0, 20000, 20000, '11111Y', 'Y711', '123', '1', 'Y711', '123', '12345456780676', 'Y711', '0', '1', '0', '0', NULL, 0, 0, 0, 'uploads/sangyoi/2023/8/28/a1AMDuLB9O1wiNiVelaZSkeQdfTar3dvwY7ycIeO.pdf', NULL, '$2y$10$RmLPnukMxYaep7UzLrRXTeHqb/1E3/Tux5gWWRwkmlCw86QXhDwyC', 'DKq_NkdDRO2ZyijjWATexQ', '8F5vx2mNOTUKzVVnnyHLagS1rTkTSkgJ', 'yenesnguyen711@gmail.com', NULL, '5', '2023-08-28 09:30:17+00', '5', '2023-08-28 09:30:17+00', NULL, NULL, NULL, 'mTOpVWnWRc-I2yNH9AHIEQ');
INSERT INTO "public"."m_sangyoi" OVERRIDING SYSTEM VALUE VALUES (3, 5, 'Tieu Yet', 'りがな', '2023-03-23', '0', '1235455', '岩手県', 'りがな', 'test', 'test', 1, NULL, '0', NULL, NULL, NULL, NULL, 'tieuyetchanngan@gmail.com', '12323464576', 3, NULL, 'test', 'test', 0, 1, 180000, 180000, '金融機関名', '支店名- value', '123', '1', '口座名義(カナ) - f', '213', '12354465', 'test', '1', '0', '0', '0', NULL, 0, 0, 0, 'uploads/sangyoi/2023/7/20/NVThy8WQ4qmskvh0eHLcF8vtMuKssxmoIIriK81b.pdf', 'test', '$2y$10$vf5pZazRyWo2EvNaRjHv/OyjQzo2YF40wSIup5g2OzELIqogMQAuG', 'ZoomClientID  111', 'ZoomClientSecret  111', 'http://stg-sangyoui-frontend.s3-website-ap-northeast-1.amazonaws.com/cp/user/sangyoi/create/', NULL, '5', '2023-07-20 02:47:25+00', '5', '2023-07-20 03:08:27+00', NULL, 'O46v4LkWsGGWKMkufUz0vxpxiJAq0q30', '2023-07-20 03:08:03+00', 'DKq_NkdDRO2ZyijjWATexQ');
INSERT INTO "public"."m_sangyoi" OVERRIDING SYSTEM VALUE VALUES (7, 5, 'Name 1', 'ふりがな', '1999-09-08', '1', '1234567', '青森県', '11111', NULL, NULL, 1, '1', '1000000', '栃木県', '11111111', NULL, NULL, 'sangyoi211@sample.com', '99999999999', 0, '1', '1111', '11111', 0, 0, 1000, 1000, '111111', '111111', '333', '0', '1234567', '1234567', '1234567', '1234567', '0', '1', '0', '0', 'memooooooooooo', 0, 0, 0, 'uploads/sangyoi/2023/6/15/dSm3jvtMQTnmoPXclozdk8iHTSKmiXSZPmuvx4fn.pdf', '1234567', '$2y$10$uAoTgBXRGMyHGvyB53MRt.dp4aGfaTl.f6qN.6erXXCIv76K71soi', '1234567', '1234567', '1234567', NULL, '5', '2023-07-24 23:43:28+00', '5', '2023-07-28 14:15:51+00', NULL, NULL, NULL, 'DKq_NkdDRO2ZyijjWATexQ');
INSERT INTO "public"."m_sangyoi" OVERRIDING SYSTEM VALUE VALUES (12, 5, 'Name 1', 'Kana 1', '1999-09-09', '1', '1234567', '1234567', '11111', '1111111', '1111111', 1, '0', '1', '111111', '11111111', '111111', '111111', 'sangyoi21@sample.com', '111111111', 0, '1', '1111', '11111', 0, 0, 1000, 1000, '111111', '111111', '333', '0', '1234567', '1234567', '1234567', '1234567', '0', '0', '0', '0', 'memooooooooooo', 0, 0, 0, 'uploads/sangyoi/2023/6/15/dSm3jvtMQTnmoPXclozdk8iHTSKmiXSZPmuvx4fn.pdf', '1234567', '$2y$10$YQ7BYafKWo6lOHFFbPS12.HnjkPfWtj1C6xNSRoYXPzFGPGZOXknK', '1234567', '1234567', '1234567', NULL, '5', '2023-07-24 23:59:05+00', '5', '2023-07-24 23:59:05+00', NULL, NULL, NULL, 'DKq_NkdDRO2ZyijjWATexQ');
INSERT INTO "public"."m_sangyoi" OVERRIDING SYSTEM VALUE VALUES (61, 5, 'Name 1', 'Kana 1', '1999-09-09', '1', '1234567', '1234567', '11111', '1111111', '1111111', 1, '0', '1', '111111', '11111111', '111111', '111111', 'sangyoi21y1@ysample.com', '111111111', 0, '1', '1111', '11111', 0, 0, 1000, 1000, '111111', '111111', '333', '0', '1234567', '1234567', '1234567', '1234567', '0', '0', '0', '0', 'memooooooooooo', 0, 0, 0, 'uploads/sangyoi/2023/6/15/dSm3jvtMQTnmoPXclozdk8iHTSKmiXSZPmuvx4fn.pdf', '1234567', '$2y$10$qs4QConZppgCLU8bLCHu4ONCCIT.eKIAhNT5yXiekkjdn.oz8IG/.', 'DKq_NkdDRO2ZyijjWATexQ', '8F5vx2mNOTUKzVVnnyHLagS1rTkTSkgJ', '1234567', NULL, '5', '2023-08-27 19:44:01+00', '5', '2023-08-27 19:44:01+00', NULL, NULL, NULL, 'mTOpVWnWRc-I2yNH9AHIEQ');
INSERT INTO "public"."m_sangyoi" OVERRIDING SYSTEM VALUE VALUES (17, 5, 'Import', 'aaaaaaaaaaa', '2020-11-18', '1', 'update', 'aaaaaaaaa', 'aaa', NULL, NULL, 1, '0', '1111111', 'aaa', 'aaaa', 'aaaa', 'aaaaa', 'haiyen1@m2m-vn.com', '11111111111', 1, 'aaaa', 'aaa', 'aaa', 1, 0, 1, 1, 'aa111', 'aaa111', 'aaaa111', '1', 'aaa111', '1', '1', 'aaaa111', '1', '1', '1', '1', '1aaaa1111', 1, 1, 1, '', '11aa111', '$2y$10$PvLWXMBjOji8E5wXpCbF/OdM.C/UaPMwk5ePrm.oFXhswnQ1/EeqG', 'aaa111111111', '11aaa1111111', 'a@lll.ccccccccccc', NULL, '5', '2023-07-26 23:54:34+00', '5', '2023-07-26 23:54:34+00', NULL, NULL, NULL, 'DKq_NkdDRO2ZyijjWATexQ');
INSERT INTO "public"."m_sangyoi" OVERRIDING SYSTEM VALUE VALUES (18, 5, 'Hải Yến n', 'ふりがな', '2023-07-05', '0', '1000000', '岩手県', '11111Y', NULL, NULL, 3, '1', '1000000', '栃木県', '434545', NULL, NULL, 'testing@gmail.com', '99999999999', 0, '123', NULL, '11111Y', 0, 1, 0, 0, '11111Y', '11111Y', '111', '2', '11111Y', '11111', '11111', '11111Y', '0', '1', '0', '0', NULL, 0, 0, 0, 'uploads/sangyoi/2023/7/28/4IalIRHOOIK2fpc7aO76X8wvuh5keHaRTMVEwg1Z.pdf', '11111Y', '$2y$10$xCgcGLKlpjhPgWkecMGqzeDK6bwZjpJj158.C.TYdFVslNZ6hgD16', '11111Y', '11111Y', '11111Y', NULL, '5', '2023-07-28 14:18:38+00', '5', '2023-07-28 14:18:38+00', NULL, NULL, NULL, 'DKq_NkdDRO2ZyijjWATexQ');
INSERT INTO "public"."m_sangyoi" OVERRIDING SYSTEM VALUE VALUES (19, 5, 'Hải Yến test', 'ふりがな', '2023-07-12', '0', '1000000', '青森県', '11111Y', NULL, NULL, 3, '1', '1000000', '茨城県', '434545', NULL, NULL, 'testing123@gmail.com', '99999999999', 0, '11111Y', NULL, '123', 0, 1, 0, 0, '11111Y', '11111Y', '11', '2', '11111Y', '11111', '11111', '11111Y', '0', '1', '0', '0', NULL, 0, 0, 0, 'uploads/sangyoi/2023/7/28/S6Vr4zUhhwA9Sg1bEWTMENklCowumUv2K2eKcUPU.pdf', '11111Y', '$2y$10$DU7/1QW/TR0UaWz5gtButOZxYFmaYqVHSKVzn6X/j3fyMmpTNdsYm', '11111Y', '11111Y', '11111Y', NULL, '5', '2023-07-28 14:26:17+00', '5', '2023-07-28 14:26:17+00', NULL, NULL, NULL, 'DKq_NkdDRO2ZyijjWATexQ');
INSERT INTO "public"."m_sangyoi" OVERRIDING SYSTEM VALUE VALUES (23, 5, 'import', 'import', '2023-07-28', '2', '12345', 'import', 'import', 'import', 'import', 2, '0', '1234', 'import', 'import', 'import', 'import', 'nguyenhaiyen1@gmail.cnb', '11111111111', 1, 'aaaa', 'aaa', 'aaa', 1, 0, 1, 1, 'aa111', 'aaa111', 'aaaa111', '1', 'aaa111', '1', '1', 'aaaa111', '1', '1', '1', '1', '1aaaa1111', 1, 1, 1, '', '11aa111', '$2y$10$/gCuUATXELTxqz2nawkaoeWRYlWIKym8kPexNMv11hs.t50ZG5lQW', 'aaa111111111', '11aaa1111111', 'a@lll.ccccccccccc', NULL, '5', '2023-07-30 00:21:51+00', '5', '2023-07-30 00:21:51+00', NULL, NULL, NULL, 'DKq_NkdDRO2ZyijjWATexQ');
INSERT INTO "public"."m_sangyoi" OVERRIDING SYSTEM VALUE VALUES (24, 5, 'import 2', 'import', '2023-07-29', '2', '12345', 'import', 'import', 'import', 'import', 2, '0', '1234', 'import', 'import', 'import', 'import', 'nguyenhaiyen2@gmail.cnb', '11111111111', 1, 'aaaa', 'aaa', 'aaa', 1, 0, 1, 1, 'aa111', 'aaa111', 'aaaa111', '1', 'aaa111', '1', '1', 'aaaa111', '1', '1', '1', '1', '1aaaa1111', 1, 1, 1, '', '11aa111', '$2y$10$Au.1ZZ81euPjMQNwVeJo5uGk/sKApJQYuUiXuvULwY6CEQHkxFv4m', 'aaa111111111', '11aaa1111111', 'a@lll.ccccccccccc', NULL, '5', '2023-07-30 01:06:16+00', '5', '2023-07-30 01:06:16+00', NULL, NULL, NULL, 'DKq_NkdDRO2ZyijjWATexQ');
INSERT INTO "public"."m_sangyoi" OVERRIDING SYSTEM VALUE VALUES (25, 5, 'Hải Yến 2', 'ふりがな', '2023-07-29', '0', '1000000', '茨城県', '11111Y', NULL, NULL, 7, '1', '1000000', '青森県', '434545', NULL, NULL, 'testing@gmail.comn', '99999999999', 0, '11111Y', NULL, '11111Y', 0, 1, 0, 0, '11111Y', '11111Y', '123', '1', 'Y711', '123', '12', '11111Y', '0', '1', '0', '0', NULL, 0, 0, 0, 'uploads/sangyoi/2023/7/30/Ohq6j8VaLv3A4QLiHTiYVplZ6ZiHgxAwpDhCjm5L.pdf', '123', '$2y$10$4xlyb2jXWPkcvNqBzBAK3.git.zf9r9RECo7K8t.q3alooE9QYMci', '11111Y', '11111Y', '11111Y', NULL, '5', '2023-07-30 01:15:33+00', '5', '2023-07-30 01:15:33+00', NULL, NULL, NULL, 'DKq_NkdDRO2ZyijjWATexQ');
INSERT INTO "public"."m_sangyoi" OVERRIDING SYSTEM VALUE VALUES (26, 5, 'import 3', 'import', '2023-07-30', '2', '12345', '山形県', 'import', 'import', 'import', 2, '0', '1234', 'import', 'import', 'import', 'import', 'nguyenhaiyen3@gmail.cnb', '11111111111', 1, 'aaaa', 'aaa', 'aaa', 1, 0, 1, 1, 'aa111', 'aaa111', 'aaaa111', '1', 'aaa111', '1', '1', 'aaaa111', '1', '1', '1', '1', '1aaaa1111', 1, 1, 1, '', '11aa111', '$2y$10$5TcztgTW15YlM/h3Ru/vourB.1y0VAwXBsr4mXDHGURWor2q11qEW', 'aaa111111111', '11aaa1111111', 'a@lll.ccccccccccc', NULL, '5', '2023-07-30 19:40:52+00', '5', '2023-07-30 19:40:52+00', NULL, NULL, NULL, 'DKq_NkdDRO2ZyijjWATexQ');
INSERT INTO "public"."m_sangyoi" OVERRIDING SYSTEM VALUE VALUES (27, 5, '123', 'さんぎょういじろう', '2023-12-31', '1', '1234567', 'テスト県', 'テスト市', 'テストビル', '115', 1, NULL, '0', NULL, NULL, NULL, NULL, 'matchingtest202307@gmail.com', '90200989709', 1, '123', 'テスト課', '結合テスト', 1, 1, 20000, 25000, 'テスト総合銀行', 'アロハ支店', '123', '0', 'サンギョウイジロウ', '1223567', '12345678901234', '第1234569号', '1', '0', '0', '0', '特になし', 1, 1, 1, 'uploads/sangyoi/2023/8/2/P6gKIXzOP8tYWlGMGIObCcriaJYLwVVgk87ftj0E.pdf', NULL, '$2y$10$/YsCzdQ7cFsZU1FPr04kCOTrBUfdALpUxcyHDhIJgpKIJHwm204hu', '813 6643 2759', '23791919aA', 'kaisanbutuskiya@gmail.com', NULL, '5', '2023-07-31 15:44:11+00', '5', '2023-08-02 00:13:14+00', NULL, NULL, NULL, 'DKq_NkdDRO2ZyijjWATexQ');
INSERT INTO "public"."m_sangyoi" OVERRIDING SYSTEM VALUE VALUES (28, 5, 'aaaaaa', 'aaaaaaaaaaa', '2022-08-10', '1', '1111111', 'aaaaaaaaa', 'aaa', 'aaaa', 'aaa', 1, '0', '1111111', 'aaa', 'aaaa', 'aaaa', 'aaaaa', 'a@sample.com', '11111111111', 1, 'aaaa', 'aaa', 'aaa', 1, 0, 1, 1, 'aa111', 'aaa111', 'aaaa111', '1', 'aaa111', '1', '1', 'aaaa111', '1', '1', '1', '1', '1aaaa1111', 1, 1, 1, '', '11aa111', '$2y$10$XEQTIk1n8jzpu6hP17YNmeXhuKH.VMIs3ruaE.2iPkbtQOJPy9byi', 'aaa111111111', '11aaa1111111', 'a@lll.ccccccccccc', NULL, '5', '2023-07-31 18:23:56+00', '5', '2023-07-31 18:23:56+00', NULL, NULL, NULL, 'DKq_NkdDRO2ZyijjWATexQ');
INSERT INTO "public"."m_sangyoi" OVERRIDING SYSTEM VALUE VALUES (31, 5, 'aaaaaa', 'aaaaaaaaaaa', '2025-07-07', '1', '1111111', 'aaaaaaaaa', 'aaa', 'aaaa', 'aaa', 1, '0', '1111111', 'aaa', 'aaaa', 'aaaa', 'aaaaa', 'cca@sample.com', '11111111111', 1, 'aaaa', 'aaa', 'aaa', 1, 0, 1, 1, 'aa111', 'aaa111', 'aaaa111', '1', 'aaa111', '1', '1', 'aaaa111', '1', '1', '1', '1', '1aaaa1111', 1, 1, 1, '', '11aa111', '$2y$10$AE0tk/6UrUNytuVOQx7WhedJRFRk.oRB50Z89i9ncOAUn7C9aYZGa', 'aaa111111111', '11aaa1111111', 'a@lll.ccccccccccc', NULL, '5', '2023-07-31 19:25:43+00', '5', '2023-07-31 19:25:43+00', NULL, NULL, NULL, 'DKq_NkdDRO2ZyijjWATexQ');
INSERT INTO "public"."m_sangyoi" OVERRIDING SYSTEM VALUE VALUES (32, 5, '産業医次郎', 'さんぎょういじろう', '2025-07-07', '1', '1234567', 'テスト県', 'テスト市', 'テストビル', '115', 1, '0', NULL, NULL, NULL, NULL, NULL, 'test@sma.ccccc', '9020098970', 1, NULL, 'テスト課', '結合テスト', 1, 1, 20000, 25000, 'テスト総合銀行', 'アロハ支店', 'a101', '0', 'サンギョウイジロウ', '1223567', '12345678901234', '第1234569号', '1', '0', '0', '0', '特になし', 1, 1, 1, '', NULL, '$2y$10$iy6LliE.NrRsmxbXEA3Dn.J2d5OYv7ENla8SRk.UtLQtRdzyUkifO', '813 6643 2759', '23791919aA', 'test@mmm.cc', NULL, '5', '2023-07-31 19:25:50+00', '5', '2023-07-31 19:25:50+00', NULL, NULL, NULL, 'DKq_NkdDRO2ZyijjWATexQ');
INSERT INTO "public"."m_sangyoi" OVERRIDING SYSTEM VALUE VALUES (33, 5, 'aaaaaa', 'aaaaaaaaaaa', '2020-11-18', '1', '1111111', 'aaaaaaaaa', 'aaa', 'aaaa', 'aaa', 1, '0', '1111111', 'aaa', 'aaaa', 'aaaa', 'aaaaa', 'abre@sample.com', '11111111111', 1, 'aaaa', 'aaa', 'aaa', 1, 0, 1, 1, 'aa111', 'aaa111', 'aaaa111', '1', 'aaa111', '1', '1', 'aaaa111', '1', '1', '1', '1', '1aaaa1111', 1, 1, 1, '', '11aa111', '$2y$10$4GatjM5KlUm80zbTbZBO/uHo8E/eU9mzXNG/7WG4lJhm4RMtYCBc.', 'aaa111111111', '11aaa1111111', 'a@lll.ccccccccccc', NULL, '5', '2023-08-01 00:28:18+00', '5', '2023-08-01 00:28:18+00', NULL, NULL, NULL, 'DKq_NkdDRO2ZyijjWATexQ');
INSERT INTO "public"."m_sangyoi" OVERRIDING SYSTEM VALUE VALUES (37, 5, '産業医次郎', 'さんぎょういじろう', '2023-07-31', '2', '12345', '山形県', 'import', 'import', 'import', 2, '0', '1234', 'import', 'import', 'import', 'import', 'nguyenhaiyen4@gmail.cnb', '11111111111', 1, 'aaaa', 'aaa', 'aaa', 1, 0, 1, 1, 'aa111', 'aaa111', 'aaaa111', '1', 'aaa111', '1', '1', 'aaaa111', '1', '1', '1', '1', '1aaaa1111', 1, 1, 1, '', '11aa111', '$2y$10$Hs9wIM3OsZaKsqZt3S6znO3UKl8ez0k4/D74K0qefbaVJ6Yso5JMi', 'aaa111111111', '11aaa1111111', 'a@lll.ccccccccccc', NULL, '5', '2023-08-02 00:51:44+00', '5', '2023-08-02 00:51:44+00', NULL, NULL, NULL, 'DKq_NkdDRO2ZyijjWATexQ');
INSERT INTO "public"."m_sangyoi" OVERRIDING SYSTEM VALUE VALUES (42, 5, 'import 4', 'import', '2023-07-31', '2', '12345', '山形県', 'import', 'import', 'import', 2, '0', '1234', 'import', 'import', 'import', 'import', 'nguyenhaiyen4@gmail.cnbssss', '11111111111', 1, 'aaaa', 'aaa', 'aaa', 1, 0, 1, 1, 'aa111', 'aaa111', 'aaaa111', '1', 'aaa111', '1', '1', 'aaaa111', '1', '1', '1', '1', 'kkk', 1, 1, 1, '', '11aa111', '$2y$10$qeAUKhLX0ASOLZy3/o6dn.bjJhZ3.kCAcqngiXYt37mOjXdefGzz2', 'aaa111111111', '11aaa1111111', 'a@lll.ccccccccccc', NULL, '5', '2023-08-02 23:29:27+00', '5', '2023-08-02 23:29:27+00', NULL, NULL, NULL, 'DKq_NkdDRO2ZyijjWATexQ');
INSERT INTO "public"."m_sangyoi" OVERRIDING SYSTEM VALUE VALUES (50, 5, '産業医一括太郎', 'さんぎょういいっかつたろう', '2023-12-12', '1', '0987767', '北海道', '札幌市', NULL, NULL, 1, '1', '0123456', '島根県', '松江市', NULL, NULL, 'test@lll.ccccc', '09020098970', 1, '皮膚科医療研究機関', '基礎皮膚科(所属部署)', '皮膚科', 1, 1, 20000, 25000, '山陰合同銀行', '本店', '001', '0', 'サンギョウイイッカツタロウ', '1234567', '12345678901234', '123456789', '1', '0', '0', '0', NULL, 1, 1, 1, '', NULL, '$2y$10$PDTEqZJgMB9GG0FtpYYmz.wPYOrR.Lq734mq5j0yq1JA0RbtdSZ/S', '81366432759', '23791919aA', 'test@lll.ccccc', NULL, '5', '2023-08-03 21:47:27+00', '5', '2023-08-03 21:47:27+00', NULL, NULL, NULL, 'DKq_NkdDRO2ZyijjWATexQ');
INSERT INTO "public"."m_sangyoi" OVERRIDING SYSTEM VALUE VALUES (53, 5, 'aaa', 'aaa', '2023-03-31', '1', '1234444', 'aaa', 'aâ', NULL, NULL, 1, '1', NULL, NULL, NULL, NULL, NULL, 'a@sam.caos', '22222222222', 1, NULL, 'âaaa', 'aaaa111', 1, 1, 1, 1, 'aaa', 'aaaa', 'aaaa', '1', 'â', '0123456', '1111111', '11', '1', '1', '1', '1', 'âaaaaaa', 1, 1, 1, '', NULL, '$2y$10$/lnXykuta5tVhDTw6c/IWeLBOo76nOQ4BG8RuXmtOniJnmObPl0oy', '11111', '1111', 'a@lll.cacc', NULL, '5', '2023-08-04 19:18:48+00', '5', '2023-08-04 19:18:48+00', NULL, NULL, NULL, 'DKq_NkdDRO2ZyijjWATexQ');
INSERT INTO "public"."m_sangyoi" OVERRIDING SYSTEM VALUE VALUES (54, 5, '産業医一括太郎', 'さんぎょういいっかつたろう', '2023-07-31', '1', '1234567', '北海道', '札幌市', NULL, NULL, 1, '1', '1234567', '島根県', '松江市', NULL, NULL, 'yeniretest202308@gmail.com', '09020098970', 1, '皮膚科医療研究機関', '基礎皮膚科(所属部署)', '皮膚科', 1, 1, 20000, 25000, '山陰合同銀行', '本店', '001', '0', 'サンギョウイイッカツタロウ', '1234567', '12345678901234', '123456789', '1', '0', '0', '0', NULL, 1, 1, 1, '', NULL, '$2y$10$GyP/hmMqbwUhmkk/bTyQRuFBKA80YX.fvsb/HHl8/R/kU48kiDCXW', '81366432759', '23791919aA', 'nguyenhaiyenkm11@gmail.com', NULL, '5', '2023-08-05 19:46:16+00', '5', '2023-08-05 19:46:16+00', NULL, NULL, NULL, 'DKq_NkdDRO2ZyijjWATexQ');
INSERT INTO "public"."m_sangyoi" OVERRIDING SYSTEM VALUE VALUES (55, 5, '産業医一括太郎', 'さんぎょういいっかつたろう', '2023-07-31', '1', '1234567', '北海道', '札幌市', NULL, NULL, 1, '1', '1234567', '島根県', '松江市', NULL, NULL, 'yeni2retest202308@gmail.com', '09020098970', 1, '皮膚科医療研究機関', '基礎皮膚科(所属部署)', '皮膚科', 1, 1, 20000, 25000, '山陰合同銀行', '本店', '001', '0', 'サンギョウイイッカツタロウ', '1234567', '12345678901234', '123456789', '1', '0', '0', '1', 'input', 1, 1, 1, '', NULL, '$2y$10$7x56d15gLC/pZtYh6Gj35.iHgkbQKwqfsDUG3yx9CQImjXSEZq/JO', '81366432759', '23791919aA', 'nguyenhaiyenkm11@gmail.com', NULL, '5', '2023-08-05 20:08:04+00', '5', '2023-08-05 20:08:04+00', NULL, NULL, NULL, 'DKq_NkdDRO2ZyijjWATexQ');
INSERT INTO "public"."m_sangyoi" OVERRIDING SYSTEM VALUE VALUES (56, 5, '産業医一括太郎', 'さんぎょういいっかつたろう', '2023-07-02', '1', '1234567', '北海道', '札幌市', NULL, NULL, 1, '1', '1234567', '島根県', '松江市', NULL, NULL, 'yeni3retest202308@gmail.com', '09020098970', 1, '皮膚科医療研究機関', '基礎皮膚科(所属部署)', '皮膚科', 1, 1, 20000, 25000, '山陰合同銀行', '本店', '001', '0', 'サンギョウイイッカツタロウ', '1234567', '12345678901234', '123456789', '1', '0', '0', '1', 'input', 1, 1, 1, '', NULL, '$2y$10$hDrkTBkG7vNeZobWSxpxdOM9Hub0yXXwo.djOsSu7w2oo6RyvmfTS', '81366432759', '23791919aA', 'nguyenhaiyenkm11@gmail.com', NULL, '5', '2023-08-05 20:37:15+00', '5', '2023-08-05 20:37:15+00', NULL, NULL, NULL, 'DKq_NkdDRO2ZyijjWATexQ');
INSERT INTO "public"."m_sangyoi" OVERRIDING SYSTEM VALUE VALUES (57, 5, '産業医一括太郎', 'さんぎょういいっかつたろう', '2023-07-02', '1', '1234567', '北海道', '札幌市', NULL, NULL, 1, '0', NULL, NULL, NULL, NULL, NULL, 'yeni4retest202308@gmail.com', '09020098970', 1, '皮膚科医療研究機関', '基礎皮膚科(所属部署)', '皮膚科', 1, 1, 20000, 25000, '山陰合同銀行', '本店', '001', '0', 'サンギョウイイッカツタロウ', '1234567', '12345678901234', '123456789', '1', '0', '0', '1', 'input', 1, 1, 1, '', NULL, '$2y$10$rflcdEDdlRUw5E4gQ/yuC.KK4ee006U23Ak8/N6Y4905QE1QLoLn2', '81366432759', '23791919aA', 'nguyenhaiyenkm11@gmail.com', NULL, '5', '2023-08-05 21:11:17+00', '5', '2023-08-05 21:11:17+00', NULL, NULL, NULL, 'DKq_NkdDRO2ZyijjWATexQ');
INSERT INTO "public"."m_sangyoi" OVERRIDING SYSTEM VALUE VALUES (58, 5, '産業医一括太郎', 'さんぎょういいっかつたろう', '2023-07-02', '1', '1234567', '北海道', '札幌市', NULL, NULL, 1, '1', '0', NULL, NULL, NULL, NULL, 'yeni5retest202308@gmail.com', '09020098970', 1, '皮膚科医療研究機関', '基礎皮膚科(所属部署)', '皮膚科', 1, 1, 20000, 25000, '山陰合同銀行', '本店', '001', '0', 'サンギョウイイッカツタロウ', '1234567', '12345678901234', '123456789', '1', '0', '0', '1', 'input', 1, 1, 1, 'uploads/sangyoi/2023/8/5/NbKhQJ3SQPmzv3UgkGHr1WCoJwUE9529YvzKelCR.pdf', NULL, '$2y$10$Rnj6gQTTUHKeRgFsdNoD1emA6qvuAK6YaHT6zTohHTTW78EBZlNOi', '81366432759', '23791919aA', 'nguyenhaiyenkm11@gmail.com', NULL, '5', '2023-08-05 21:12:19+00', '5', '2023-08-05 21:13:53+00', NULL, NULL, NULL, 'DKq_NkdDRO2ZyijjWATexQ');
INSERT INTO "public"."m_sangyoi" OVERRIDING SYSTEM VALUE VALUES (59, 5, '産業医一括太郎', 'さんぎょういいっかつたろう', '2023-07-31', '1', '1234567', '北海道', '札幌市', NULL, NULL, 1, '1', NULL, NULL, NULL, NULL, NULL, 'yeni6retest202308@gmail.com', '09020098970', 1, '皮膚科医療研究機関', '基礎皮膚科(所属部署)', '皮膚科', 1, 0, 24000, 25000, '山陰合同銀行', '本店', '001', '0', 'サンギョウイイッカツタロウ', '1234567', '12345678901234', '123456789', '1', '0', '0', '1', 'input', 1, 1, 1, '', NULL, '$2y$10$Tr//Gr83xElBPNHCfqtg.OH2cWs7fGjjb7kSPisOLU759VQ5Bdg0.', '81366432759', '23791919aA', 'nguyenhaiyenkm11@gmail.com', NULL, '5', '2023-08-12 16:25:47+00', '5', '2023-08-12 16:25:47+00', NULL, NULL, NULL, 'DKq_NkdDRO2ZyijjWATexQ');
INSERT INTO "public"."m_sangyoi" OVERRIDING SYSTEM VALUE VALUES (15, 5, 'Hải Yến Update', 'ふりがな', '2020-11-17', '1', '1111111', 'aaaaaaaaa', 'aaa', 'aaaa', 'aaa', 1, NULL, '1111111', 'aaa', 'aaaa', 'aaaa', 'aaaaa', 'haiyen@m2m-vn.com', '11111111111', 1, 'aaaa', 'aaa', 'aaa', 1, 0, 1, 1, 'aa111', 'aaa111', '111', '1', 'aaa111', '1', '1', 'aaaa111', '1', '1', '1', '1', '1aaaa1111', 1, 1, 1, 'uploads/sangyoi/2023/7/29/hiu7oq5guoBTYvSehF20hEGa1bMkIpTmi7Iw6RSV.pdf', '11aa111', '$2y$10$5Aj.l/OgtbXkzN.mnIfwwufTRJzNhmTH/O2ayrxRizm8I/sbg0ply', 'aaa111111111', '11aaa1111111', 'a@lll.ccccccccccc', NULL, '5', '2023-07-25 23:22:23+00', '5', '2023-08-27 20:29:59+00', NULL, 'UAko4wB1ZrbWney5m2LzgOcpnRCu8Ihy', '2023-08-27 20:28:56+00', 'DKq_NkdDRO2ZyijjWATexQ');
COMMIT;

-- ----------------------------
-- Table structure for m_user
-- ----------------------------
DROP TABLE IF EXISTS "public"."m_user";
CREATE TABLE "public"."m_user" (
  "id" int4 NOT NULL GENERATED ALWAYS AS IDENTITY (
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
),
  "user_company_id" int4 NOT NULL,
  "mailaddr" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "name" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "name_kana" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "password" varchar(99) COLLATE "pg_catalog"."default",
  "regist_id" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamptz(6) NOT NULL,
  "update_id" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "updated_at" timestamptz(6) NOT NULL,
  "deleted_at" timestamptz(6),
  "token" varchar(32) COLLATE "pg_catalog"."default",
  "token_issued" timestamptz(6)
)
;
ALTER TABLE "public"."m_user" OWNER TO "root";

-- ----------------------------
-- Records of m_user
-- ----------------------------
BEGIN;
INSERT INTO "public"."m_user" OVERRIDING SYSTEM VALUE VALUES (5, 5, 'yenesnguyen711@gmail.com', '田中崇雅', 'たなかたかまさ', '$2y$10$Lq1WeeAn9/9z7XPCrFkfGu1153JNTJrxS/IWKDsjuCLFjL6Y7nE8m', '1', '2023-07-14 02:53:59.768+00', '1', '2023-07-19 23:22:59+00', NULL, 'NIn6Yl1xvihBrOqUpBIv7IPtZnsBnkUx', '2023-07-19 23:10:58+00');
INSERT INTO "public"."m_user" OVERRIDING SYSTEM VALUE VALUES (10, 5, 'yen.nguyen@thinkclimax.com', 'Climx', 'ふりがな', '$2y$10$DsDYzUtpCZI72V116sIiwO8yVxFU/biMrkLPMysvBYzeOjLbMh6la', '9', '2023-07-20 03:17:41+00', '9', '2023-07-20 03:23:37+00', '2023-07-20 03:23:37+00', 'OsLAX3qyOG7EWFRWw437na0QWm863vFr', '2023-07-20 03:22:05+00');
INSERT INTO "public"."m_user" OVERRIDING SYSTEM VALUE VALUES (9, 5, 'tieuyetchanngan@gmail.com', 'NHY', 'ふりがな', '$2y$10$OpMfRZH4vutjNWEtmvN/be.S0XuEvUJQsl1zyV7s0Oc4a0Isnt7wi', '5', '2023-07-20 02:54:38+00', '5', '2023-07-22 23:42:42+00', '2023-07-22 23:42:42+00', 'YdGK2KG7LSsoJ1pFC2xQn3XpfiYmozlt', '2023-07-20 02:58:33+00');
INSERT INTO "public"."m_user" OVERRIDING SYSTEM VALUE VALUES (11, 5, 'tieuyetchanngan@gmail.com', 'Tieu Yet', 'ふりがな', '$2y$10$EaWAbj9kymYc9LBltE8fxeqD9RZmdcK6M8bp12hO6g/3k8HJ8Wxwu', '5', '2023-07-22 23:43:14+00', '5', '2023-07-22 23:43:14+00', '2023-07-20 03:23:37+00', NULL, NULL);
INSERT INTO "public"."m_user" OVERRIDING SYSTEM VALUE VALUES (12, 5, 'user3a0@isamrrrple.com', 'User 3', 'User 3', '$2y$10$KlFinXJwROhAlVltkwImoez4vJ15dTWYwv7WJtGMu25D5up9eHDN2', '5', '2023-08-28 12:39:57+00', '5', '2023-08-28 12:39:57+00', NULL, NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for m_user_company
-- ----------------------------
DROP TABLE IF EXISTS "public"."m_user_company";
CREATE TABLE "public"."m_user_company" (
  "id" int4 NOT NULL GENERATED ALWAYS AS IDENTITY (
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
),
  "user_company_name" varchar(100) COLLATE "pg_catalog"."default",
  "user_company_name_kana" varchar(100) COLLATE "pg_catalog"."default",
  "post_number" varchar(7) COLLATE "pg_catalog"."default",
  "todofuken" varchar(100) COLLATE "pg_catalog"."default",
  "shikucyoson" varchar(100) COLLATE "pg_catalog"."default",
  "tatemono" varchar(100) COLLATE "pg_catalog"."default",
  "heyabango" varchar(100) COLLATE "pg_catalog"."default",
  "tel_number" varchar(13) COLLATE "pg_catalog"."default",
  "regist_id" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamptz(6) NOT NULL,
  "update_id" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "updated_at" timestamptz(6) NOT NULL,
  "deleted_at" timestamptz(6),
  "fax_number" varchar(13) COLLATE "pg_catalog"."default",
  "invoice_number" varchar(100) COLLATE "pg_catalog"."default",
  "seikyu_tantosha" varchar(100) COLLATE "pg_catalog"."default"
)
;
ALTER TABLE "public"."m_user_company" OWNER TO "root";

-- ----------------------------
-- Records of m_user_company
-- ----------------------------
BEGIN;
INSERT INTO "public"."m_user_company" OVERRIDING SYSTEM VALUE VALUES (5, 'test企業', 'テストヨウ', '1638001', '東京都', '新宿区西新宿2-8-1', '東京都庁', '101', '9020098970', '1', '2023-05-25 00:00:00+00', '1', '2023-07-12 01:03:00+00', NULL, NULL, NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS "public"."migrations";
CREATE TABLE "public"."migrations" (
  "id" int4 NOT NULL DEFAULT nextval('migrations_id_seq'::regclass),
  "migration" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "batch" int4 NOT NULL
)
;
ALTER TABLE "public"."migrations" OWNER TO "root";

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
INSERT INTO "public"."migrations" VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO "public"."migrations" VALUES (2, '2017_06_13_162437_create_posts_table', 1);
INSERT INTO "public"."migrations" VALUES (3, '2019_12_14_000001_create_personal_access_tokens_table', 1);
COMMIT;

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS "public"."personal_access_tokens";
CREATE TABLE "public"."personal_access_tokens" (
  "id" int8 NOT NULL DEFAULT nextval('personal_access_tokens_id_seq'::regclass),
  "tokenable_type" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "tokenable_id" int8 NOT NULL,
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "token" varchar(64) COLLATE "pg_catalog"."default" NOT NULL,
  "abilities" text COLLATE "pg_catalog"."default",
  "last_used_at" timestamp(0),
  "expires_at" timestamp(0),
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;
ALTER TABLE "public"."personal_access_tokens" OWNER TO "root";

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS "public"."posts";
CREATE TABLE "public"."posts" (
  "id" int4 NOT NULL DEFAULT nextval('posts_id_seq'::regclass),
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "user_id" int4 NOT NULL,
  "title" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "content" text COLLATE "pg_catalog"."default" NOT NULL
)
;
ALTER TABLE "public"."posts" OWNER TO "root";

-- ----------------------------
-- Records of posts
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for t_certification_code
-- ----------------------------
DROP TABLE IF EXISTS "public"."t_certification_code";
CREATE TABLE "public"."t_certification_code" (
  "id" int4 NOT NULL GENERATED ALWAYS AS IDENTITY (
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
),
  "sms_number" varchar(11) COLLATE "pg_catalog"."default" NOT NULL,
  "certification_code" varchar(4) COLLATE "pg_catalog"."default" NOT NULL,
  "certification_status" varchar(1) COLLATE "pg_catalog"."default" NOT NULL DEFAULT 0,
  "created_at" timestamptz(6) NOT NULL,
  "updated_at" timestamptz(6) NOT NULL,
  "deleted_at" timestamptz(6)
)
;
ALTER TABLE "public"."t_certification_code" OWNER TO "root";
COMMENT ON COLUMN "public"."t_certification_code"."certification_status" IS '0:未認証、1:ログイン済';

-- ----------------------------
-- Records of t_certification_code
-- ----------------------------
BEGIN;
INSERT INTO "public"."t_certification_code" OVERRIDING SYSTEM VALUE VALUES (5, '11111111112', '8570', '1', '2023-08-06 15:49:27+00', '2023-08-27 21:22:02+00', NULL);
INSERT INTO "public"."t_certification_code" OVERRIDING SYSTEM VALUE VALUES (6, '11111111113', '0953', '1', '2023-08-06 15:52:30+00', '2023-08-21 23:57:19+00', NULL);
INSERT INTO "public"."t_certification_code" OVERRIDING SYSTEM VALUE VALUES (4, '11111111114', '4149', '1', '2023-08-03 18:22:04+00', '2023-08-28 12:01:18+00', NULL);
INSERT INTO "public"."t_certification_code" OVERRIDING SYSTEM VALUE VALUES (2, '0948363007', '0971', '0', '2023-07-27 16:10:36+00', '2023-08-28 12:39:06+00', NULL);
INSERT INTO "public"."t_certification_code" OVERRIDING SYSTEM VALUE VALUES (3, '11111111111', '8061', '0', '2023-08-01 22:33:16+00', '2023-08-04 23:11:07+00', NULL);
INSERT INTO "public"."t_certification_code" OVERRIDING SYSTEM VALUE VALUES (7, '08077027826', '9298', '1', '2023-08-13 18:14:33+00', '2023-08-23 22:34:52+00', NULL);
INSERT INTO "public"."t_certification_code" OVERRIDING SYSTEM VALUE VALUES (1, '07020040304', '5350', '1', '2023-07-20 23:59:40+00', '2023-08-11 19:40:45+00', NULL);
COMMIT;

-- ----------------------------
-- Table structure for t_counseling_reserve
-- ----------------------------
DROP TABLE IF EXISTS "public"."t_counseling_reserve";
CREATE TABLE "public"."t_counseling_reserve" (
  "id" int4 NOT NULL GENERATED ALWAYS AS IDENTITY (
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
),
  "reserve_issue_id" int4 NOT NULL,
  "sangyoi_schedule_id" int4 NOT NULL,
  "reserve_date" date NOT NULL,
  "reserve_time_from" timetz(6) NOT NULL,
  "reserve_time_to" timetz(6) NOT NULL,
  "reserve_status" int4 NOT NULL,
  "cancel_person_type" int4,
  "cancel_reason" varchar(1000) COLLATE "pg_catalog"."default",
  "zoom_meeting_id" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "zoom_meeting_pw" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "zoom_meeting_url" varchar(1000) COLLATE "pg_catalog"."default" NOT NULL,
  "counseling_type" int4 NOT NULL,
  "price" int4 NOT NULL,
  "regist_id" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamptz(6) NOT NULL,
  "update_id" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "updated_at" timestamptz(6) NOT NULL,
  "deleted_at" timestamptz(6),
  "cancel_date" date,
  "cancel_delay_kbn" int4,
  "cancel_reason_kbn" int4
)
;
ALTER TABLE "public"."t_counseling_reserve" OWNER TO "root";
COMMENT ON COLUMN "public"."t_counseling_reserve"."reserve_status" IS '0:新規予約 1:遅刻 2:キャンセル';
COMMENT ON COLUMN "public"."t_counseling_reserve"."cancel_person_type" IS '0:従業員 1:産業医';
COMMENT ON COLUMN "public"."t_counseling_reserve"."cancel_delay_kbn" IS '0:キャンセル 1:遅刻';
COMMENT ON COLUMN "public"."t_counseling_reserve"."cancel_reason_kbn" IS '0:急患発生 1:他医師欠勤 2:体調不良 3:その他';

-- ----------------------------
-- Records of t_counseling_reserve
-- ----------------------------
BEGIN;
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (2, 4, 274, '2023-07-21', '00:00:00+00', '00:30:00+00', 0, NULL, NULL, 'zoom_id', 'zoom_password', 'https://zoom.us/vi/signin#/login', 0, 0, '2', '2023-07-21 01:25:45+00', '2', '2023-07-21 01:25:45+00', NULL, NULL, NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (3, 4, 267, '2023-07-22', '00:30:00+00', '01:00:00+00', 0, NULL, NULL, 'zoom_id', 'zoom_password', 'https://zoom.us/vi/signin#/login', 0, 0, '2', '2023-07-21 01:56:56+00', '2', '2023-07-21 02:04:11+00', '2023-07-21 02:04:11+00', NULL, NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (4, 4, 10, '2023-07-25', '01:00:00+00', '01:30:00+00', 0, NULL, NULL, 'zoom_id', 'zoom_password', 'https://zoom.us/vi/signin#/login', 0, 0, '2', '2023-07-21 02:04:11+00', '2', '2023-07-21 02:07:24+00', '2023-07-21 02:07:24+00', NULL, NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (5, 4, 307, '2023-07-26', '01:00:00+00', '01:30:00+00', 0, NULL, NULL, 'zoom_id', 'zoom_password', 'https://zoom.us/vi/signin#/login', 0, 180000, '2', '2023-07-21 02:07:24+00', '2', '2023-07-21 02:08:00+00', '2023-07-21 02:08:00+00', NULL, NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (6, 4, 275, '2023-07-21', '01:00:00+00', '01:30:00+00', 0, NULL, NULL, 'zoom_id', 'zoom_password', 'https://zoom.us/vi/signin#/login', 0, 0, '2', '2023-07-21 02:08:00+00', '2', '2023-07-21 02:08:00+00', NULL, NULL, NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (7, 4, 294, '2023-07-22', '01:00:00+00', '01:30:00+00', 0, NULL, NULL, 'zoom_id', 'zoom_password', 'https://zoom.us/vi/signin#/login', 0, 180000, '2', '2023-07-21 02:10:43+00', '2', '2023-07-21 02:13:08+00', '2023-07-21 02:13:08+00', NULL, NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (8, 4, 10, '2023-07-25', '01:00:00+00', '01:30:00+00', 2, 1, '1', 'zoom_id', 'zoom_password', 'https://zoom.us/vi/signin#/login', 0, 0, '2', '2023-07-21 02:13:08+00', '2', '2023-07-21 02:36:17+00', '2023-07-21 02:36:17+00', '2023-07-21', 0, 1);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (9, 4, 10, '2023-07-25', '01:00:00+00', '01:30:00+00', 0, NULL, NULL, 'zoom_id', 'zoom_password', 'https://zoom.us/vi/signin#/login', 0, 0, '2', '2023-07-21 02:37:12+00', '2', '2023-07-21 02:41:34+00', '2023-07-21 02:41:34+00', NULL, NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (10, 4, 294, '2023-07-22', '01:00:00+00', '01:30:00+00', 0, NULL, NULL, 'zoom_id', 'zoom_password', 'https://zoom.us/vi/signin#/login', 0, 180000, '2', '2023-07-21 02:41:34+00', '2', '2023-07-21 02:48:01+00', '2023-07-21 02:48:01+00', NULL, NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (11, 4, 10, '2023-07-25', '01:00:00+00', '01:30:00+00', 2, 0, 'tôi huye lịch', 'zoom_id', 'zoom_password', 'https://zoom.us/vi/signin#/login', 0, 0, '2', '2023-07-21 02:48:01+00', '2', '2023-07-21 03:33:08+00', NULL, '2023-07-21', NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (12, 4, 268, '2023-07-22', '01:00:00+00', '01:30:00+00', 0, NULL, NULL, 'zoom_id', 'zoom_password', 'https://zoom.us/vi/signin#/login', 0, 0, '2', '2023-07-22 23:51:39+00', '2', '2023-07-22 23:51:39+00', NULL, NULL, NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (13, 4, 307, '2023-07-26', '01:00:00+00', '01:30:00+00', 1, 0, 'muônnj', 'zoom_id', 'zoom_password', 'https://zoom.us/vi/signin#/login', 0, 180000, '2', '2023-07-23 00:16:53+00', '2', '2023-07-23 17:02:18+00', '2023-07-23 17:02:18+00', '2023-07-23', NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (14, 4, 311, '2023-07-25', '00:30:00+00', '01:00:00+00', 0, NULL, NULL, 'zoom_id', 'zoom_password', 'https://zoom.us/vi/signin#/login', 0, 180000, '2', '2023-07-23 17:02:18+00', '2', '2023-07-23 17:08:51+00', '2023-07-23 17:08:51+00', NULL, NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (15, 4, 325, '2023-07-30', '03:00:00+00', '03:30:00+00', 0, NULL, NULL, 'zoom_id', 'zoom_password', 'https://zoom.us/vi/signin#/login', 0, 180000, '2', '2023-07-23 17:08:51+00', '2', '2023-07-23 17:09:16+00', '2023-07-23 17:09:16+00', NULL, NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (16, 4, 332, '2023-07-23', '03:00:00+00', '03:30:00+00', 0, NULL, NULL, 'zoom_id', 'zoom_password', 'https://zoom.us/vi/signin#/login', 0, 180000, '2', '2023-07-23 17:09:16+00', '2', '2023-07-23 17:09:16+00', NULL, NULL, NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (17, 4, 307, '2023-07-26', '01:00:00+00', '01:30:00+00', 0, NULL, NULL, 'zoom_id', 'zoom_password', 'https://zoom.us/vi/signin#/login', 0, 180000, '2', '2023-07-23 17:11:19+00', '2', '2023-07-23 17:13:04+00', '2023-07-23 17:13:04+00', NULL, NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (19, 4, 33, '2023-08-15', '00:30:00+00', '01:00:00+00', 2, 1, '1', 'zoom_id', 'zoom_password', 'https://zoom.us/vi/signin#/login', 0, 1000, '2', '2023-08-09 22:01:09+00', '2', '2023-08-09 23:07:05+00', NULL, '2023-08-09', 0, 1);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (21, 4, 157, '2023-08-23', '02:00:00+00', '02:30:00+00', 2, 0, 'huỷ', 'zoom_id', 'zoom_password', 'https://zoom.us/vi/signin#/login', 0, 1000, '2', '2023-08-09 23:42:03+00', '2', '2023-08-09 23:43:10+00', NULL, '2023-08-09', NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (22, 4, 37, '2023-08-15', '02:30:00+00', '03:00:00+00', 2, 1, '他医師欠勤', 'zoom_id', 'zoom_password', 'https://zoom.us/vi/signin#/login', 0, 1000, '2', '2023-08-09 23:47:41+00', '2', '2023-08-09 23:50:59+00', NULL, '2023-08-09', 0, 1);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (24, 15, 334, '2023-08-10', '01:30:00+00', '02:00:00+00', 0, NULL, NULL, 'zoom_id', 'zoom_password', 'https://zoom.us/vi/signin#/login', 0, 1000, '8', '2023-08-10 23:57:54+00', '8', '2023-08-10 23:57:54+00', NULL, NULL, NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (26, 15, 145, '2023-08-16', '01:30:00+00', '02:00:00+00', 0, NULL, NULL, '87369939816', 'KGEdakRz', 'https://us05web.zoom.us/j/87369939816?pwd=ZYajJWa1K4zmP7VpveF9zTsmpOB2Io.1', 0, 1000, '8', '2023-08-12 19:54:02+00', '8', '2023-08-12 21:22:23+00', '2023-08-12 21:22:23+00', NULL, NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (28, 14, 336, '2023-08-17', '01:30:00+00', '02:00:00+00', 0, NULL, NULL, '86780848619', 'fJX8pm7C', 'https://us05web.zoom.us/j/86780848619?pwd=Za3xmN2xdENbxbIDKakEpfIsOO7OzI.1', 0, 1000, '6', '2023-08-13 15:08:00+00', '6', '2023-08-13 15:22:05+00', '2023-08-13 15:22:05+00', NULL, NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (29, 14, 150, '2023-08-16', '04:00:00+00', '04:30:00+00', 2, 1, '急患発生', '81893456740', 'cLcfCTpd', 'https://us05web.zoom.us/j/81893456740?pwd=sk9eE680Zt0SASrezbb8xRUFQ8REPW.1', 0, 1000, '6', '2023-08-13 15:22:05+00', '6', '2023-08-13 15:24:12+00', NULL, '2023-08-13', 0, 0);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (30, 14, 336, '2023-08-17', '01:30:00+00', '02:00:00+00', 0, NULL, NULL, '81873821802', 'MmrEcfKk', 'https://us05web.zoom.us/j/81873821802?pwd=Yt5OLsnzRvKiuchcM1V4TbapJiuDWK.1', 0, 1000, '6', '2023-08-13 15:24:38+00', '6', '2023-08-13 17:25:40+00', '2023-08-13 17:25:40+00', NULL, NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (31, 14, 152, '2023-08-16', '05:00:00+00', '05:30:00+00', 0, NULL, NULL, '84019420474', 'D1k0BzbN', 'https://us05web.zoom.us/j/84019420474?pwd=pkU0eVjMO8y6iU3oJwkvevU7Vnal7h.1', 0, 1000, '6', '2023-08-13 17:25:40+00', '6', '2023-08-13 17:32:07+00', '2023-08-13 17:32:07+00', NULL, NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (33, 17, 145, '2023-08-16', '01:30:00+00', '02:00:00+00', 0, NULL, NULL, '83384051441', 'l0sIvZOj', 'https://us05web.zoom.us/j/83384051441?pwd=F9ba6NmD3unsEiEZ1P9HA3buN0WJNJ.1', 0, 1000, '9', '2023-08-13 18:15:52+00', '9', '2023-08-13 20:49:48+00', '2023-08-13 20:49:48+00', NULL, NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (27, 15, 147, '2023-08-16', '02:30:00+00', '03:00:00+00', 0, NULL, NULL, '89352200999', 'rzLBv7mJ', 'https://us05web.zoom.us/j/89352200999?pwd=b9vnb1uTnUuLqfr0SN9DVjH9sqmT5U.1', 0, 1000, '8', '2023-08-12 21:22:23+00', '8', '2023-08-13 20:53:56+00', '2023-08-13 20:53:56+00', NULL, NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (35, 17, 343, '2023-08-18', '03:00:00+00', '03:30:00+00', 1, 0, 'cancel', '82811584996', '8rmYXE21', 'https://us05web.zoom.us/j/82811584996?pwd=5LeSSznlT2Brb0EAJW84v9zMhWipz0.1', 0, 1000, '9', '2023-08-13 20:49:48+00', '9', '2023-08-13 20:50:36+00', '2023-08-13 20:50:36+00', '2023-08-13', NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (37, 15, 344, '2023-08-18', '03:30:00+00', '04:00:00+00', 2, 1, '急患発生', '89883756673', 'vRhiWMou', 'https://us05web.zoom.us/j/89883756673?pwd=NK9G8GJhp21Mnsyw4UTxCFMW9GvbIQ.1', 0, 1000, '8', '2023-08-13 20:53:56+00', '8', '2023-08-13 20:54:54+00', NULL, '2023-08-13', 0, 0);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (36, 17, 360, '2023-08-17', '03:00:00+00', '03:30:00+00', 2, 1, '体調不良', '85142925798', 'txSP6KX3', 'https://us05web.zoom.us/j/85142925798?pwd=f8F1Z3UicJDfbtvg96P0jto6DEsc3a.1', 0, 1000, '9', '2023-08-13 20:50:36+00', '9', '2023-08-13 20:55:14+00', NULL, '2023-08-13', 0, 2);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (34, 13, 342, '2023-08-18', '02:00:00+00', '02:30:00+00', 2, 1, '他医師欠勤', '87419393814', '28Eb0emh', 'https://us05web.zoom.us/j/87419393814?pwd=v2T3YXlMHT4l06HatwPbEz5xpUX2u8.1', 0, 1000, '7', '2023-08-13 20:48:03+00', '7', '2023-08-13 20:59:37+00', NULL, '2023-08-13', 0, 1);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (38, 17, 147, '2023-08-16', '02:30:00+00', '03:00:00+00', 2, 1, '他医師欠勤', '88410625599', 'RcLAFrPS', 'https://us05web.zoom.us/j/88410625599?pwd=0oKk4MNLDOxbHMnublBRS5wXKnkb4p.1', 0, 1000, '9', '2023-08-13 20:55:22+00', '9', '2023-08-13 20:59:51+00', NULL, '2023-08-13', 0, 1);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (32, 14, 336, '2023-08-17', '01:30:00+00', '02:00:00+00', 2, 1, '体調不良', '89788755026', '9qH6qJYF', 'https://us05web.zoom.us/j/89788755026?pwd=x0B4Ilh3q36dZ08GbaWuqZhnk6tqk6.1', 0, 1000, '6', '2023-08-13 17:32:07+00', '6', '2023-08-13 21:00:15+00', NULL, '2023-08-13', 0, 2);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (25, 15, 35, '2023-08-15', '01:30:00+00', '02:00:00+00', 2, 1, '他医師欠勤', 'zoom_id', 'zoom_password', 'https://zoom.us/vi/signin#/login', 0, 1000, '8', '2023-08-11 00:15:08+00', '8', '2023-08-13 21:00:32+00', NULL, '2023-08-13', 0, 1);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (39, 15, 364, '2023-08-17', '04:30:00+00', '05:00:00+00', 2, 1, '急患発生', '86828895873', 'Er0EtcJG', 'https://us05web.zoom.us/j/86828895873?pwd=iUiBYi9OU0EvjSs1h7PVOKAaQcagVP.1', 0, 1000, '8', '2023-08-13 21:00:42+00', '8', '2023-08-15 23:57:15+00', NULL, '2023-08-15', 0, 0);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (18, 4, 323, '2023-07-28', '01:00:00+00', '01:30:00+00', 0, NULL, NULL, 'zoom_id', 'zoom_password', 'https://zoom.us/vi/signin#/login', 0, 180000, '2', '2023-07-23 17:13:04+00', '2', '2023-07-23 17:13:04+00', NULL, NULL, NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (20, 4, 134, '2023-08-09', '01:30:00+00', '02:00:00+00', 0, NULL, NULL, 'zoom_id', 'zoom_password', 'https://zoom.us/vi/signin#/login', 0, 1000, '2', '2023-08-09 23:25:25+00', '2', '2023-08-09 23:25:25+00', NULL, NULL, NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (41, 15, 339, '2023-08-18', '01:00:00+00', '01:30:00+00', 0, NULL, NULL, '89640313543', 'lUtISYai', 'https://us05web.zoom.us/j/89640313543?pwd=JxCCq6GeakXhIoTdKT8gCiXwkBkiY1.1', 0, 1000, '8', '2023-08-16 13:25:51+00', '8', '2023-08-16 13:25:51+00', NULL, NULL, NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (40, 14, 349, '2023-08-19', '01:30:00+00', '02:00:00+00', 2, 1, '他医師欠勤', '83519244042', 'P6ow9177', 'https://us05web.zoom.us/j/83519244042?pwd=yV2bkWpilIekX4Zu5eesddbejjDaPW.1', 0, 1000, '6', '2023-08-16 00:02:05+00', '6', '2023-08-19 23:58:18+00', '2023-08-19 23:58:18+00', '2023-08-16', 0, 1);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (42, 14, 420, '2023-08-23', '00:00:00+00', '00:30:00+00', 0, NULL, NULL, '87609019964', 'KGdjwpqO', 'https://us05web.zoom.us/j/87609019964?pwd=0hqr4oAaZBMnbBDwWW0ykGSFym4T3O.1', 0, 1, '6', '2023-08-19 23:57:13+00', '6', '2023-08-20 00:00:35+00', '2023-08-20 00:00:35+00', NULL, NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (43, 14, 373, '2023-08-20', '01:00:00+00', '01:30:00+00', 0, NULL, NULL, '84204844347', '4iMhTYng', 'https://us05web.zoom.us/j/84204844347?pwd=EJ8O7qGpE0zVcG9gruSD7VgTm49mtL.1', 0, 1000, '6', '2023-08-20 00:00:35+00', '6', '2023-08-20 00:01:50+00', '2023-08-20 00:01:50+00', NULL, NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (44, 14, 157, '2023-08-23', '02:00:00+00', '02:30:00+00', 2, 1, '他医師欠勤', '82394110321', 'Pn0mS5LS', 'https://us05web.zoom.us/j/82394110321?pwd=mkEbxWHvOL1QaQZtBG89UsK0P093Hi.1', 0, 1000, '6', '2023-08-20 00:01:50+00', '6', '2023-08-20 00:02:08+00', NULL, '2023-08-20', 0, 1);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (46, 14, 381, '2023-08-25', '02:30:00+00', '03:00:00+00', 2, 1, '他医師欠勤', '81833018537', '8nTHDnec', 'https://us05web.zoom.us/j/81833018537?pwd=a2Rtu1X4MLraag8nPfRT56gCIegptW.1', 0, 1000, '6', '2023-08-20 02:56:53+00', '6', '2023-08-20 02:57:35+00', NULL, '2023-08-20', 0, 1);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (47, 14, 438, '2023-08-20', '16:00:00+00', '16:30:00+00', 2, 0, 'huỶ', '83758923395', 'LWqiwHIu', 'https://us05web.zoom.us/j/83758923395?pwd=booUkRonVz9bEx0g7CytuFTRd0lYhl.1', 0, 1000, '6', '2023-08-20 17:57:34+00', '6', '2023-08-20 18:18:21+00', NULL, '2023-08-20', NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (48, 14, 440, '2023-08-20', '17:00:00+00', '17:30:00+00', 2, 0, 'Cancel', '87842757185', 'Bs7zt9lD', 'https://us05web.zoom.us/j/87842757185?pwd=HNwK0AfYCedFsDqbSEIiIIYtS61OKD.1', 0, 1000, '6', '2023-08-20 18:56:56+00', '6', '2023-08-20 19:13:31+00', NULL, '2023-08-20', NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (49, 13, 447, '2023-08-21', '22:30:00+00', '23:00:00+00', 2, 1, '他医師欠勤', '89356085392', '2PICHy0k', 'https://us05web.zoom.us/j/89356085392?pwd=4gNyWNWc4LTbruDLgNmGadU7uY5Cco.1', 0, 1000, '7', '2023-08-22 00:15:20+00', '7', '2023-08-22 00:36:30+00', NULL, '2023-08-22', 0, 1);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (50, 15, 42, '2023-08-22', '01:00:00+00', '01:30:00+00', 0, NULL, NULL, '83691527398', 'xtHnkpZL', 'https://us05web.zoom.us/j/83691527398?pwd=G5KjOVnMbr5o9iU5RxxY6BtjHkWrXe.1', 0, 1000, '8', '2023-08-22 00:36:41+00', '8', '2023-08-22 00:44:55+00', '2023-08-22 00:44:55+00', NULL, NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (51, 15, 48, '2023-08-22', '04:00:00+00', '04:30:00+00', 0, NULL, NULL, '89172172696', '27quqVop', 'https://us05web.zoom.us/j/89172172696?pwd=aaEFGtLs6ODCa0S0LglF4vNSAVFhem.1', 0, 1000, '8', '2023-08-22 00:44:55+00', '8', '2023-08-22 00:47:36+00', '2023-08-22 00:47:36+00', NULL, NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (52, 15, 159, '2023-08-23', '03:00:00+00', '03:30:00+00', 0, NULL, NULL, '83541599338', 'iNoTkw9l', 'https://us05web.zoom.us/j/83541599338?pwd=oHe4JuhNqQX6l9hgyoVxoyDOr5qFzF.1', 0, 1000, '8', '2023-08-22 00:47:36+00', '8', '2023-08-22 01:25:47+00', '2023-08-22 01:25:47+00', NULL, NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (53, 15, 163, '2023-08-23', '05:00:00+00', '05:30:00+00', 0, NULL, NULL, '81885003428', '5I6spwdH', 'https://us05web.zoom.us/j/81885003428?pwd=ATxtodd0xLRbVZkNWOl1SgRbj7D4n6.1', 0, 1000, '8', '2023-08-22 01:25:47+00', '8', '2023-08-22 01:26:09+00', '2023-08-22 01:26:09+00', NULL, NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (63, 22, 421, '2023-08-24', '00:00:00+00', '00:30:00+00', 2, 0, 'huye', '84169681083', 'U46TcuMr', 'https://us05web.zoom.us/j/84169681083?pwd=paxmmEUWUgE8waadRbixPpnY2lgtSr.1', 0, 1, '10', '2023-08-23 23:26:15+00', '10', '2023-08-23 23:27:54+00', NULL, '2023-08-23', NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (45, 14, 372, '2023-08-20', '01:30:00+00', '02:00:00+00', 1, 0, 'dời', '86896070904', 'TgluoWZT', 'https://us05web.zoom.us/j/86896070904?pwd=u7ppSmVjgPrkjdTnOZHbiTPXIMHKag.1', 0, 1000, '6', '2023-08-20 00:02:41+00', '6', '2023-08-23 01:32:10+00', NULL, '2023-08-23', NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (64, 22, 448, '2023-08-26', '01:00:00+00', '01:30:00+00', 2, 1, 'Huỷ nhé', '86700013365', 'K1F5W14Q', 'https://us05web.zoom.us/j/86700013365?pwd=6KaYL2batWpbv3AOM0pquwrKO4Q1Sh.1', 0, 1000, '10', '2023-08-23 23:28:11+00', '10', '2023-08-23 23:38:44+00', NULL, '2023-08-23', NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (55, 14, 420, '2023-08-23', '00:00:00+00', '00:30:00+00', 1, 0, 'dời', '81758919189', '3caFE378', 'https://us05web.zoom.us/j/81758919189?pwd=UyYRYITin6yuPuT2kSCFfJORzW5JaK.1', 0, 1, '6', '2023-08-23 01:32:40+00', '6', '2023-08-23 09:41:57+00', NULL, '2023-08-23', NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (56, 14, 421, '2023-08-24', '00:00:00+00', '00:30:00+00', 0, NULL, NULL, '87372635836', 'MSBd14t4', 'https://us05web.zoom.us/j/87372635836?pwd=znseZg7uBbayIwBt7wNUrwa7IYRT1e.1', 1, 1, '6', '2023-08-23 16:44:06+00', '6', '2023-08-23 16:48:54+00', '2023-08-23 16:48:54+00', NULL, NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (57, 14, 422, '2023-08-25', '00:00:00+00', '00:30:00+00', 0, NULL, NULL, '88286917798', 'hnZdfgos', 'https://us05web.zoom.us/j/88286917798?pwd=Wjj5Z1O1BzJwbL6lGqvYrOsfRq2pVO.1', 0, 1, '6', '2023-08-23 16:48:54+00', '6', '2023-08-23 16:51:28+00', '2023-08-23 16:51:28+00', NULL, NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (58, 14, 452, '2023-08-25', '01:00:00+00', '01:30:00+00', 0, NULL, NULL, '89141090971', 'bvl8IT1f', 'https://us05web.zoom.us/j/89141090971?pwd=EFvzYy68AKWo5tTqwBNN0CZRrjRlQe.1', 2, 1000, '6', '2023-08-23 16:51:28+00', '6', '2023-08-23 17:57:27+00', '2023-08-23 17:57:27+00', NULL, NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (59, 14, 50, '2023-08-29', '01:00:00+00', '01:30:00+00', 2, 0, 'cancel', '85646834663', 'dFuuLIDd', 'https://us05web.zoom.us/j/85646834663?pwd=x2Uy99FP9Sb2dl5v7DaOmiii8NRadm.1', 2, 1000, '6', '2023-08-23 17:57:27+00', '6', '2023-08-23 17:58:04+00', NULL, '2023-08-23', NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (60, 22, 380, '2023-08-24', '04:00:00+00', '04:30:00+00', 0, NULL, NULL, '81956769734', 'pfIHjrIV', 'https://us05web.zoom.us/j/81956769734?pwd=39CnKhlCbSkcAGpgBuUWxB16ofZvmU.1', 0, 1000, '10', '2023-08-23 22:36:08+00', '10', '2023-08-23 22:40:51+00', '2023-08-23 22:40:51+00', NULL, NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (61, 22, 462, '2023-08-25', '09:00:00+00', '09:30:00+00', 0, NULL, NULL, '82981148098', 'sl1GKUQy', 'https://us05web.zoom.us/j/82981148098?pwd=lOl7kHEuaaUqoWQubI5qbJYN4Wyn8Y.1', 0, 1000, '10', '2023-08-23 22:40:51+00', '10', '2023-08-23 22:44:21+00', '2023-08-23 22:44:21+00', NULL, NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (62, 22, 383, '2023-08-25', '03:30:00+00', '04:00:00+00', 0, NULL, NULL, '85936414881', 'AEro6lYZ', 'https://us05web.zoom.us/j/85936414881?pwd=kyGvM7Ff6X5nEajzGHKiDxay0a0fsm.1', 0, 1000, '10', '2023-08-23 22:44:21+00', '10', '2023-08-23 23:26:15+00', '2023-08-23 23:26:15+00', NULL, NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (68, 15, 51, '2023-08-29', '01:30:00+00', '02:00:00+00', 0, NULL, NULL, '85392082334', 'BghBtKfX', 'https://us05web.zoom.us/j/85392082334?pwd=UpDbbyh3IATabi5QOt7pxByMtThqNA.1', 0, 1000, '8', '2023-08-28 11:13:18+00', '8', '2023-08-28 11:29:16+00', '2023-08-28 11:29:16+00', NULL, NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (65, 22, 383, '2023-08-25', '03:30:00+00', '04:00:00+00', 1, 0, 'dời', '81309158410', 'zhvm6K0P', 'https://us05web.zoom.us/j/81309158410?pwd=NE9hoAzlria67jJM0BFnb2IippY9aX.1', 0, 1000, '10', '2023-08-23 23:41:12+00', '10', '2023-08-23 23:55:59+00', NULL, '2023-08-23', NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (66, 15, 168, '2023-08-30', '02:00:00+00', '02:30:00+00', 0, NULL, NULL, '86026365238', 'z1Gogkdj', 'https://us05web.zoom.us/j/86026365238?pwd=EpvxU3iaU9Q46Gmf0yFbYvaRrLlyJP.1', 0, 1000, '8', '2023-08-28 10:07:30+00', '8', '2023-08-28 11:12:42+00', '2023-08-28 11:12:42+00', NULL, NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (54, 15, 377, '2023-08-24', '02:30:00+00', '03:00:00+00', 1, 0, 'alooo', '86006562153', 'fl36aIVm', 'https://us05web.zoom.us/j/86006562153?pwd=AlU8UGyg1kCHGcNtU1xJrgVb2z4Y8T.1', 0, 1000, '8', '2023-08-22 01:26:10+00', '8', '2023-08-25 13:20:49+00', NULL, '2023-08-25', NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (67, 15, 49, '2023-08-29', '00:30:00+00', '01:00:00+00', 0, NULL, NULL, '83399164090', '7tNcB0jz', 'https://us05web.zoom.us/j/83399164090?pwd=JORdoBFb2TnMTac4D0tvwGmjwmQtKE.1', 0, 1000, '8', '2023-08-28 11:12:44+00', '8', '2023-08-28 11:13:17+00', '2023-08-28 11:13:17+00', NULL, NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (69, 15, 49, '2023-08-29', '00:30:00+00', '01:00:00+00', 0, NULL, NULL, '85364429691', 'C1xjS7aV', 'https://us05web.zoom.us/j/85364429691?pwd=Ia96HlFvqadM9OBUe6BTWAvPsZ4DGZ.1', 0, 1000, '8', '2023-08-28 11:29:17+00', '8', '2023-08-28 11:29:41+00', '2023-08-28 11:29:41+00', NULL, NULL, NULL);
INSERT INTO "public"."t_counseling_reserve" OVERRIDING SYSTEM VALUE VALUES (70, 15, 167, '2023-08-30', '01:30:00+00', '02:00:00+00', 0, NULL, NULL, '82547448081', 'iLAReQzh', 'https://us05web.zoom.us/j/82547448081?pwd=eBrgsIPnZtNtckHNkaisxWeRri0Iyt.1', 0, 1000, '8', '2023-08-28 11:29:42+00', '8', '2023-08-28 11:29:42+00', NULL, NULL, NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for t_counseling_reserve_notice
-- ----------------------------
DROP TABLE IF EXISTS "public"."t_counseling_reserve_notice";
CREATE TABLE "public"."t_counseling_reserve_notice" (
  "id" int4 NOT NULL GENERATED ALWAYS AS IDENTITY (
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
),
  "user_company_id" int4 NOT NULL,
  "client_id" int4 NOT NULL,
  "employee_id" varchar(5) COLLATE "pg_catalog"."default" NOT NULL,
  "target_month" date NOT NULL,
  "notice_date" date NOT NULL,
  "implementation_status" int4 NOT NULL DEFAULT 0,
  "regist_id" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamptz(6) NOT NULL,
  "update_id" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "updated_at" timestamptz(6) NOT NULL,
  "deleted_at" timestamptz(6)
)
;
ALTER TABLE "public"."t_counseling_reserve_notice" OWNER TO "root";
COMMENT ON COLUMN "public"."t_counseling_reserve_notice"."implementation_status" IS '0:セルフチェック回答待ち、1:面談実施待ち、2:意見書提出待ち、3:意見書確認中、4:意見書提出済、5:クライアント確認済、9:キャンセル、';

-- ----------------------------
-- Records of t_counseling_reserve_notice
-- ----------------------------
BEGIN;
INSERT INTO "public"."t_counseling_reserve_notice" OVERRIDING SYSTEM VALUE VALUES (4, 5, 2, '123', '2023-07-01', '2023-07-20', 4, '2', '2023-07-20 23:47:30+00', '2', '2023-08-23 17:01:52+00', NULL);
INSERT INTO "public"."t_counseling_reserve_notice" OVERRIDING SYSTEM VALUE VALUES (22, 5, 11, 'YEN05', '2023-08-01', '2023-08-23', 1, '11', '2023-08-23 22:31:52+00', '11', '2023-08-23 23:41:12+00', NULL);
INSERT INTO "public"."t_counseling_reserve_notice" OVERRIDING SYSTEM VALUE VALUES (14, 5, 11, 'YEN01', '2023-08-01', '2023-08-03', 9, '11', '2023-08-03 18:20:51+00', '11', '2023-08-23 17:58:04+00', NULL);
INSERT INTO "public"."t_counseling_reserve_notice" OVERRIDING SYSTEM VALUE VALUES (23, 5, 11, 'YEN02', '2023-08-01', '2023-08-23', 0, '11', '2023-08-23 22:31:55+00', '11', '2023-08-23 22:31:55+00', NULL);
INSERT INTO "public"."t_counseling_reserve_notice" OVERRIDING SYSTEM VALUE VALUES (13, 5, 11, 'YEN01', '2023-08-01', '2023-08-03', 1, '11', '2023-08-03 10:08:22+00', '11', '2023-08-22 00:36:30+00', NULL);
INSERT INTO "public"."t_counseling_reserve_notice" OVERRIDING SYSTEM VALUE VALUES (15, 5, 11, 'YEN03', '2023-08-01', '2023-08-03', 1, '11', '2023-08-03 18:20:54+00', '11', '2023-08-28 10:07:30+00', NULL);
INSERT INTO "public"."t_counseling_reserve_notice" OVERRIDING SYSTEM VALUE VALUES (17, 5, 11, 'YEN04', '2023-08-01', '2023-08-13', 4, '11', '2023-08-13 14:05:54+00', '11', '2023-08-18 02:23:46+00', NULL);
COMMIT;

-- ----------------------------
-- Table structure for t_kihoninf_general
-- ----------------------------
DROP TABLE IF EXISTS "public"."t_kihoninf_general";
CREATE TABLE "public"."t_kihoninf_general" (
  "id" int4 NOT NULL GENERATED ALWAYS AS IDENTITY (
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
),
  "reserve_issue_id" int4 NOT NULL,
  "employee_no" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "join_progress_year" int4 NOT NULL,
  "join_progress_month" int4 NOT NULL,
  "company_name" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "department" varchar(100) COLLATE "pg_catalog"."default",
  "name" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "age" int4 NOT NULL,
  "sex" int4 NOT NULL,
  "jikangai_workhour_lastmonth" int4 NOT NULL,
  "kyujitsu_workhour_lastmonth" int4 NOT NULL,
  "total_workhour_lastmonth" int4 NOT NULL,
  "tukin_hour" int4 NOT NULL,
  "tukin_min" int4 NOT NULL,
  "jikangai_workhour_2month_hour" int4 NOT NULL,
  "jikangai_workhour_2month_min" int4 NOT NULL,
  "jikangai_workhour_3month_hour" int4 NOT NULL,
  "jikangai_workhour_3month_min" int4 NOT NULL,
  "suimin_hour_from" int4 NOT NULL,
  "suimin_hour_to" int4 NOT NULL,
  "suimin_hour_total" int4 NOT NULL,
  "regist_id" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamptz(6) NOT NULL,
  "update_id" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "updated_at" timestamptz(6) NOT NULL,
  "deleted_at" timestamptz(6)
)
;
ALTER TABLE "public"."t_kihoninf_general" OWNER TO "root";

-- ----------------------------
-- Records of t_kihoninf_general
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for t_kihoninf_hospital
-- ----------------------------
DROP TABLE IF EXISTS "public"."t_kihoninf_hospital";
CREATE TABLE "public"."t_kihoninf_hospital" (
  "id" int4 NOT NULL GENERATED ALWAYS AS IDENTITY (
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
),
  "reserve_issue_id" int4 NOT NULL,
  "hospital_name" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "department" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "employee_no" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "name" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "name_kana" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "birthday_year" int4 NOT NULL,
  "birthday_month" int4 NOT NULL,
  "birthday_day" int4 NOT NULL,
  "sex" int4 NOT NULL,
  "jikangai_kbn_lastmonth" int4 NOT NULL DEFAULT 0,
  "interval_low9_flg_lastmonth" varchar(1) COLLATE "pg_catalog"."default" NOT NULL DEFAULT 0,
  "interval_low18_flg_lastmonth" varchar(1) COLLATE "pg_catalog"."default" NOT NULL DEFAULT 0,
  "jikangai_kbn" int4 NOT NULL DEFAULT 0,
  "interval_low9_flg" varchar(1) COLLATE "pg_catalog"."default" NOT NULL DEFAULT 0,
  "interval_low18_flg" varchar(1) COLLATE "pg_catalog"."default" NOT NULL DEFAULT 0,
  "busy_kbn" int4 NOT NULL DEFAULT 0,
  "oncall_cnt" int4 NOT NULL,
  "tocyoku_cnt" int4 NOT NULL,
  "niccyoku_cnt" int4 NOT NULL,
  "tukin_hour" int4 NOT NULL,
  "tukin_min" int4 NOT NULL,
  "tukin_kbn" int4 NOT NULL DEFAULT 0,
  "fukugyo_hour" int4,
  "fukugyo_tukin_hour" int4,
  "fukugyo_tukin_min" int4,
  "suimin_hour_wd_kbn" int4 NOT NULL DEFAULT 0,
  "suimin_hour_hd_kbn" int4 NOT NULL DEFAULT 0,
  "kisyo_diff_hour_kbn" int4 NOT NULL DEFAULT 0,
  "holiday_cnt_lastmonth" int4,
  "holiday_cnt_fumei_flg" varchar(1) COLLATE "pg_catalog"."default" NOT NULL DEFAULT 0,
  "yukyu_kbn" int4 NOT NULL DEFAULT 0,
  "doctor_fusoku_flg" varchar(1) COLLATE "pg_catalog"."default" NOT NULL DEFAULT 0,
  "kodo_gyomu_flg" varchar(1) COLLATE "pg_catalog"."default" NOT NULL DEFAULT 0,
  "study_none_flg" varchar(1) COLLATE "pg_catalog"."default" NOT NULL DEFAULT 0,
  "fukugyo_need_flg" varchar(1) COLLATE "pg_catalog"."default" NOT NULL DEFAULT 0,
  "doctor_com_flg" varchar(1) COLLATE "pg_catalog"."default" NOT NULL DEFAULT 0,
  "no_doctor_com_flg" varchar(1) COLLATE "pg_catalog"."default" NOT NULL DEFAULT 0,
  "other_flg_9" varchar(1) COLLATE "pg_catalog"."default" NOT NULL DEFAULT 0,
  "other_memo_9" varchar(100) COLLATE "pg_catalog"."default",
  "ryoritsu_flg" varchar(1) COLLATE "pg_catalog"."default" NOT NULL DEFAULT 0,
  "kyoyo_flg" varchar(1) COLLATE "pg_catalog"."default" NOT NULL DEFAULT 0,
  "koreisya_kaigo_flg" varchar(1) COLLATE "pg_catalog"."default" NOT NULL DEFAULT 0,
  "byonin_kaigo_flg" varchar(1) COLLATE "pg_catalog"."default" NOT NULL DEFAULT 0,
  "tukin_long_flg" varchar(1) COLLATE "pg_catalog"."default" NOT NULL DEFAULT 0,
  "other_flg_10" varchar(1) COLLATE "pg_catalog"."default" NOT NULL DEFAULT 0,
  "other_memo_10" varchar(100) COLLATE "pg_catalog"."default",
  "chiryo_kbn" int4 NOT NULL DEFAULT 0,
  "chiryo_memo" varchar(1000) COLLATE "pg_catalog"."default",
  "sochi_kbn" int4 NOT NULL DEFAULT 0,
  "insyu_kbn" int4 NOT NULL DEFAULT 0,
  "kitsuen_kbn" int4 NOT NULL DEFAULT 0,
  "tokki_none_flg" varchar(1) COLLATE "pg_catalog"."default" NOT NULL DEFAULT 0,
  "sleepy_flg" varchar(1) COLLATE "pg_catalog"."default" NOT NULL DEFAULT 0,
  "fat_flg" varchar(1) COLLATE "pg_catalog"."default" NOT NULL DEFAULT 0,
  "other_flg_12" varchar(1) COLLATE "pg_catalog"."default" NOT NULL DEFAULT 0,
  "other_memo_12" varchar(100) COLLATE "pg_catalog"."default",
  "memo" varchar(1000) COLLATE "pg_catalog"."default",
  "regist_id" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamptz(6) NOT NULL,
  "update_id" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "updated_at" timestamptz(6) NOT NULL,
  "deleted_at" timestamptz(6)
)
;
ALTER TABLE "public"."t_kihoninf_hospital" OWNER TO "root";

-- ----------------------------
-- Records of t_kihoninf_hospital
-- ----------------------------
BEGIN;
INSERT INTO "public"."t_kihoninf_hospital" OVERRIDING SYSTEM VALUE VALUES (4, 4, 'test', 'test', 'test', 'test', 'ふりがな', 2023, 12, 12, 1, 0, '0', '1', 0, '1', '0', 0, 12, 12, 12, 12, 12, 0, 12, 1, 12, 0, 0, 0, 21, '0', 0, '0', '0', '0', '0', '1', '0', '0', NULL, '0', '1', '0', '0', '0', '0', NULL, 1, '12', 0, 0, 0, '1', '0', '0', '0', NULL, '12', '2', '2023-07-21 01:45:20+00', '2', '2023-07-21 01:45:20+00', NULL);
INSERT INTO "public"."t_kihoninf_hospital" OVERRIDING SYSTEM VALUE VALUES (5, 4, 'HY', 'HY', 'HY', 'HY', 'ふりがな', 2023, 7, 12, 1, 0, '1', '0', 0, '1', '0', 0, 12, 21, 12, 12, 12, 0, 12, 12, 12, 0, 0, 0, NULL, '1', 0, '0', '0', '1', '0', '0', '0', '0', NULL, '0', '1', '0', '0', '0', '0', NULL, 1, 'ふりがな', 0, 0, 0, '1', '0', '0', '0', NULL, 'HY', '2', '2023-07-23 17:02:05+00', '2', '2023-07-23 17:02:05+00', NULL);
INSERT INTO "public"."t_kihoninf_hospital" OVERRIDING SYSTEM VALUE VALUES (14, 13, 'test', 'test', 'test', 'Hải Yến', 'ふりがな', 2023, 2, 5, 1, 0, '0', '1', 0, '0', '1', 0, 12, 12, 12, 12, 12, 0, 11, 1, 12, 0, 0, 0, NULL, '1', 0, '0', '0', '1', '0', '0', '0', '0', NULL, '0', '0', '1', '0', '0', '0', NULL, 0, NULL, 0, 0, 0, '1', '0', '0', '0', NULL, NULL, '7', '2023-08-06 16:13:51+00', '7', '2023-08-06 16:13:51+00', NULL);
INSERT INTO "public"."t_kihoninf_hospital" OVERRIDING SYSTEM VALUE VALUES (13, 15, 'test', 'test', 'Test sđt', 'Hải Yến', 'ふりがな', 2023, 2, 1, 1, 0, '0', '1', 0, '1', '0', 0, 12, 1, 12, 12, 2, 0, 12, 12, 12, 0, 0, 0, NULL, '1', 0, '0', '0', '0', '0', '1', '0', '0', NULL, '1', '0', '0', '0', '0', '0', NULL, 0, 'dsw', 1, 0, 0, '0', '1', '0', '0', NULL, NULL, '8', '2023-08-06 15:52:13+00', '8', '2023-08-07 21:59:16+00', '2023-08-07 21:59:16+00');
INSERT INTO "public"."t_kihoninf_hospital" OVERRIDING SYSTEM VALUE VALUES (16, 14, 'test', 'test', 'test', 'Hải Yến 2', 'ふりがな', 2023, 2, 1, 1, 0, '0', '1', 0, '1', '0', 0, 12, 1, 2, 12, 12, 0, 2, 12, 12, 0, 0, 0, NULL, '1', 0, '0', '1', '0', '0', '0', '0', '0', NULL, '0', '1', '0', '0', '0', '0', NULL, 0, NULL, 0, 0, 0, '1', '0', '0', '0', NULL, NULL, '6', '2023-08-13 15:07:38+00', '6', '2023-08-13 15:07:38+00', NULL);
INSERT INTO "public"."t_kihoninf_hospital" OVERRIDING SYSTEM VALUE VALUES (17, 17, 'test', 'Tê', 'Test sđt', 'Q', 'ふりがな', 2023, 12, 12, 1, 0, '1', '0', 0, '1', '0', 0, 12, 12, 12, 12, 12, 0, 12, 12, 12, 0, 0, 0, NULL, '1', 0, '0', '0', '0', '1', '0', '0', '0', NULL, '1', '0', '0', '0', '0', '0', NULL, 0, NULL, 0, 2, 0, '0', '1', '0', '0', NULL, NULL, '9', '2023-08-13 18:15:47+00', '9', '2023-08-13 18:15:47+00', NULL);
INSERT INTO "public"."t_kihoninf_hospital" OVERRIDING SYSTEM VALUE VALUES (15, 15, '病院', '病院', '病院', '病院', 'ふりがな', 1111, 1, 1, 1, 2, '1', '0', 0, '0', '1', 0, 1, 1, 1, 1, 1, 0, 1, 1, 1, 0, 0, 0, 1, '0', 0, '0', '0', '0', '0', '1', '0', '0', NULL, '0', '0', '1', '0', '0', '0', NULL, 1, '1', 0, 0, 0, '0', '0', '1', '0', NULL, NULL, '8', '2023-08-07 22:14:04+00', '8', '2023-08-22 23:10:54+00', '2023-08-22 23:10:54+00');
INSERT INTO "public"."t_kihoninf_hospital" OVERRIDING SYSTEM VALUE VALUES (18, 15, '病院名', '病院名', '病院名 病院名', '病院名', 'ふりがな', 1222, 1, 1, 1, 0, '1', '1', 0, '1', '1', 0, 1, 1, 1, 1, 1, 0, 1, 1, 1, 0, 0, 0, NULL, '1', 0, '1', '0', '0', '0', '0', '0', '0', NULL, '1', '0', '0', '0', '0', '0', NULL, 1, '1', 0, 0, 0, '1', '0', '0', '0', NULL, '1', '8', '2023-08-22 23:21:43+00', '8', '2023-08-22 23:22:16+00', '2023-08-22 23:22:16+00');
INSERT INTO "public"."t_kihoninf_hospital" OVERRIDING SYSTEM VALUE VALUES (19, 15, '病院', '病院', '病院', '病院', 'ふりがな', 1112, 1, 1, 1, 0, '1', '1', 0, '1', '0', 0, 1, 1, 1, 1, 1, 0, 1, 1, 1, 0, 0, 0, 1, '0', 0, '1', '0', '0', '0', '0', '0', '0', NULL, '1', '0', '0', '0', '0', '0', NULL, 1, '1', 0, 0, 0, '1', '0', '0', '0', NULL, '1', '8', '2023-08-22 23:42:51+00', '8', '2023-08-23 19:12:04+00', '2023-08-23 19:12:04+00');
INSERT INTO "public"."t_kihoninf_hospital" OVERRIDING SYSTEM VALUE VALUES (21, 22, 'test', 'Test', 'test', 'Hải Yến', 'ふりがな', 2023, 9, 12, 1, 0, '0', '1', 0, '1', '0', 0, 12, 12, 34, 23, 45, 0, 12, 12, 12, 0, 0, 0, NULL, '1', 0, '0', '0', '0', '0', '1', '0', '0', NULL, '0', '1', '0', '0', '1', '0', NULL, 0, NULL, 0, 0, 0, '0', '1', '0', '0', NULL, NULL, '10', '2023-08-23 23:16:21+00', '10', '2023-08-23 23:16:21+00', NULL);
INSERT INTO "public"."t_kihoninf_hospital" OVERRIDING SYSTEM VALUE VALUES (22, 15, 'aa', 'aa', 'aa', 'â', 'ふりが', 1111, 11, 20, 1, 0, '0', '1', 0, '1', '0', 0, 11, 11, 11, 11, 11, 0, 11, 11, 11, 0, 0, 0, 11, '0', 0, '0', '0', '0', '0', '0', '1', '0', NULL, '1', '0', '0', '0', '0', '0', NULL, 1, '11', 0, 0, 0, '0', '1', '0', '0', NULL, NULL, '8', '2023-08-28 10:07:24+00', '8', '2023-08-28 10:07:24+00', NULL);
COMMIT;

-- ----------------------------
-- Table structure for t_question_answer
-- ----------------------------
DROP TABLE IF EXISTS "public"."t_question_answer";
CREATE TABLE "public"."t_question_answer" (
  "id" int4 NOT NULL GENERATED ALWAYS AS IDENTITY (
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
),
  "reserve_issue_id" int4 NOT NULL,
  "user_company_id" int4 NOT NULL,
  "client_status" int4 NOT NULL,
  "question_title" varchar(1000) COLLATE "pg_catalog"."default" NOT NULL,
  "question_lev1_no" int4 NOT NULL,
  "question_lev2_no" int4 NOT NULL,
  "question_text" varchar(1000) COLLATE "pg_catalog"."default" NOT NULL,
  "answer_text" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "regist_id" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamptz(6) NOT NULL,
  "update_id" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "updated_at" timestamptz(6) NOT NULL,
  "deleted_at" timestamptz(6),
  "answer_score" int4 NOT NULL DEFAULT 0
)
;
ALTER TABLE "public"."t_question_answer" OWNER TO "root";

-- ----------------------------
-- Records of t_question_answer
-- ----------------------------
BEGIN;
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (2, 4, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 1, 'イライラする', 'ほとんどない', '2', '2023-07-21 00:22:53+00', '2', '2023-07-21 00:32:00+00', '2023-07-21 00:32:00+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (490, 22, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 1, 'イライラする', 'ほとんどない', '10', '2023-08-23 23:14:59+00', '10', '2023-08-23 23:14:59+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (4, 4, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 3, '落ち着かない', 'ほとんどない', '2', '2023-07-21 00:22:55+00', '2', '2023-07-21 00:32:00+00', '2023-07-21 00:32:00+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (502, 22, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 13, '以前とくらべて、疲れやすい', 'ほとんどない', '10', '2023-08-23 23:15:10+00', '10', '2023-08-23 23:15:10+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (6, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 5, 'よく眠れない', 'ほとんどない', '2', '2023-07-21 00:22:56+00', '2', '2023-07-21 00:32:00+00', '2023-07-21 00:32:00+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (8, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 7, '物事に集中できない', 'ほとんどない', '2', '2023-07-21 00:22:57+00', '2', '2023-07-21 00:32:00+00', '2023-07-21 00:32:00+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (511, 22, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 8, '職場・顧客などの人間関係による負担', '非常に大きい', '10', '2023-08-23 23:15:17+00', '10', '2023-08-23 23:15:17+00', NULL, 3);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (10, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 9, '仕事中、強い眠気に襲われる', 'ほとんどない', '2', '2023-07-21 00:22:59+00', '2', '2023-07-21 00:32:00+00', '2023-07-21 00:32:00+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (520, 15, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 4, 'ゆううつだ', 'ほとんどない', '8', '2023-08-28 10:06:20+00', '8', '2023-08-28 10:06:20+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (12, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 11, 'へとへとだ(運動後を除く) ※へとへと(非常に疲れて体に力がなくなったさま)', 'ほとんどない', '2', '2023-07-21 00:23:01+00', '2', '2023-07-21 00:32:00+00', '2023-07-21 00:32:00+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (527, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 11, 'へとへとだ(運動後を除く) ※へとへと(非常に疲れて体に力がなくなったさま)', 'ほとんどない', '8', '2023-08-28 10:06:25+00', '8', '2023-08-28 10:06:25+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (16, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 1, '1か月の時間外労働(時間外・休日労働時間を含む)', '適当', '2', '2023-07-21 00:23:05+00', '2', '2023-07-21 00:32:00+00', '2023-07-21 00:32:00+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (18, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 3, '出張に伴う負担(頻度・拘束時間・時差など)', 'ない又は適当', '2', '2023-07-21 00:24:53+00', '2', '2023-07-21 00:32:00+00', '2023-07-21 00:32:00+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (19, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 4, '深夜勤務に伴う負担 ※深夜勤務の頻度や時間数などから総合的に判断してください。 深夜勤務は、深夜時間帯(午後10時-午前5時)の一部または全部を含む勤務をいいます。', 'ない又は小さい', '2', '2023-07-21 00:24:54+00', '2', '2023-07-21 00:32:00+00', '2023-07-21 00:32:00+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (21, 4, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 1, 'イライラする', 'ほとんどない', '2', '2023-07-21 00:32:06+00', '2', '2023-07-21 00:32:06+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (22, 4, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 2, '不安だ', 'ほとんどない', '2', '2023-07-21 00:32:07+00', '2', '2023-07-21 00:32:07+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (23, 4, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 3, '落ち着かない', 'ほとんどない', '2', '2023-07-21 00:32:08+00', '2', '2023-07-21 00:32:08+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (24, 4, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 4, 'ゆううつだ', 'ほとんどない', '2', '2023-07-21 00:32:08+00', '2', '2023-07-21 00:32:08+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (25, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 5, 'よく眠れない', 'ほとんどない', '2', '2023-07-21 00:32:08+00', '2', '2023-07-21 00:32:08+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (26, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 6, '体の調子が悪い', 'ほとんどない', '2', '2023-07-21 00:32:09+00', '2', '2023-07-21 00:32:09+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (27, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 7, '物事に集中できない', 'ほとんどない', '2', '2023-07-21 00:32:09+00', '2', '2023-07-21 00:32:09+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (28, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 8, 'することに間違いが多い', 'ほとんどない', '2', '2023-07-21 00:32:10+00', '2', '2023-07-21 00:32:10+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (29, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 9, '仕事中、強い眠気に襲われる', 'ほとんどない', '2', '2023-07-21 00:32:10+00', '2', '2023-07-21 00:32:10+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (30, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 10, 'やる気が出ない', 'ほとんどない', '2', '2023-07-21 00:32:10+00', '2', '2023-07-21 00:32:10+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (31, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 11, 'へとへとだ(運動後を除く) ※へとへと(非常に疲れて体に力がなくなったさま)', 'ほとんどない', '2', '2023-07-21 00:32:11+00', '2', '2023-07-21 00:32:11+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (17, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 2, '不規則な勤務(予定の変更、突然の仕事)', '多い', '2', '2023-07-21 00:23:06+00', '2', '2023-07-21 00:32:00+00', '2023-07-21 00:32:00+00', 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (20, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 5, '休憩・仮眠の時間数及び施設', '不適切である', '2', '2023-07-21 00:24:55+00', '2', '2023-07-21 00:32:00+00', '2023-07-21 00:32:00+00', 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (7, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 6, '体の調子が悪い', 'よくある', '2', '2023-07-21 00:22:57+00', '2', '2023-07-21 00:32:00+00', '2023-07-21 00:32:00+00', 3);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (14, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 13, '以前とくらべて、疲れやすい', 'よくある', '2', '2023-07-21 00:23:02+00', '2', '2023-07-21 00:32:00+00', '2023-07-21 00:32:00+00', 3);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (32, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 12, '朝、起きた時、ぐったりした 疲れを感じる', 'ほとんどない', '2', '2023-07-21 00:32:11+00', '2', '2023-07-21 00:32:11+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (33, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 13, '以前とくらべて、疲れやすい', 'ほとんどない', '2', '2023-07-21 00:32:12+00', '2', '2023-07-21 00:32:12+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (34, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 14, '食欲がないと感じる', 'ほとんどない', '2', '2023-07-21 00:32:12+00', '2', '2023-07-21 00:32:12+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (35, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 1, '1か月の時間外労働(時間外・休日労働時間を含む)', '適当', '2', '2023-07-21 00:32:13+00', '2', '2023-07-21 00:32:13+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (36, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 2, '不規則な勤務(予定の変更、突然の仕事)', '少ない', '2', '2023-07-21 00:32:13+00', '2', '2023-07-21 00:32:13+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (37, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 3, '出張に伴う負担(頻度・拘束時間・時差など)', 'ない又は適当', '2', '2023-07-21 00:32:13+00', '2', '2023-07-21 00:32:13+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (38, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 4, '深夜勤務に伴う負担 ※深夜勤務の頻度や時間数などから総合的に判断してください。 深夜勤務は、深夜時間帯(午後10時-午前5時)の一部または全部を含む勤務をいいます。', 'ない又は小さい', '2', '2023-07-21 00:32:14+00', '2', '2023-07-21 00:32:14+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (39, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 5, '休憩・仮眠の時間数及び施設', '適切である', '2', '2023-07-21 00:32:15+00', '2', '2023-07-21 00:32:15+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (40, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 6, '仕事についての精神的負担', '小さい', '2', '2023-07-21 00:32:16+00', '2', '2023-07-21 00:32:16+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (41, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 7, '仕事についての身体的負担 ※肉体的作業や寒冷・暑熱作業などの身体的な面での負担をいいます。', '小さい', '2', '2023-07-21 00:32:17+00', '2', '2023-07-21 00:32:17+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (47, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 8, '職場・顧客などの人間関係による負担', '小さい', '2', '2023-07-21 01:44:15+00', '2', '2023-07-21 01:44:15+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (49, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 10, '自分のペースでできない仕事', '少ない', '2', '2023-07-21 01:44:17+00', '2', '2023-07-21 01:44:17+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (50, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 11, '勤務時間外でも仕事のことが気にかかって仕方がない', 'ほとんどない', '2', '2023-07-21 01:44:18+00', '2', '2023-07-21 01:44:18+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (51, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 12, '勤務日の睡眠時間', '十分', '2', '2023-07-21 01:44:18+00', '2', '2023-07-21 01:44:18+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (232, 14, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 1, 'イライラする', 'ほとんどない', '6', '2023-08-06 15:50:20+00', '6', '2023-08-06 15:50:20+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (491, 22, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 2, '不安だ', '時々ある', '10', '2023-08-23 23:15:01+00', '10', '2023-08-23 23:15:01+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (56, 4, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 2, '不安だ', 'ほとんどない', '2', '2023-07-23 17:00:20+00', '2', '2023-07-23 17:00:20+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (57, 4, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 3, '落ち着かない', 'ほとんどない', '2', '2023-07-23 17:00:21+00', '2', '2023-07-23 17:00:21+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (503, 22, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 14, '食欲がないと感じる', '時々ある', '10', '2023-08-23 23:15:10+00', '10', '2023-08-23 23:15:10+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (512, 22, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 9, '時間内に処理しきれない仕事', '多い', '10', '2023-08-23 23:15:18+00', '10', '2023-08-23 23:15:18+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (521, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 5, 'よく眠れない', 'ほとんどない', '8', '2023-08-28 10:06:21+00', '8', '2023-08-28 10:06:21+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (528, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 12, '朝、起きた時、ぐったりした 疲れを感じる', 'ほとんどない', '8', '2023-08-28 10:06:26+00', '8', '2023-08-28 10:06:26+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (533, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 3, '出張に伴う負担(頻度・拘束時間・時差など)', 'ない又は適当', '8', '2023-08-28 10:06:30+00', '8', '2023-08-28 10:06:30+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (537, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 7, '仕事についての身体的負担 ※肉体的作業や寒冷・暑熱作業などの身体的な面での負担をいいます。', '小さい', '8', '2023-08-28 10:06:33+00', '8', '2023-08-28 10:06:33+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (540, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 10, '自分のペースでできない仕事', '多い', '8', '2023-08-28 10:06:35+00', '8', '2023-08-28 10:06:35+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (236, 15, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 4, 'ゆううつだ', 'ほとんどない', '6', '2023-08-06 15:50:21+00', '6', '2023-08-07 21:59:16+00', '2023-08-07 21:59:16+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (55, 4, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 1, 'イライラする', '時々ある', '2', '2023-07-23 17:00:18+00', '2', '2023-07-23 17:00:18+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (48, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 9, '時間内に処理しきれない仕事', '多い', '2', '2023-07-21 01:44:16+00', '2', '2023-07-21 01:44:16+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (67, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 13, '以前とくらべて、疲れやすい', 'ほとんどない', '2', '2023-07-23 17:00:27+00', '2', '2023-07-23 17:00:27+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (68, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 14, '食欲がないと感じる', 'ほとんどない', '2', '2023-07-23 17:00:27+00', '2', '2023-07-23 17:00:27+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (69, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 1, '1か月の時間外労働(時間外・休日労働時間を含む)', '適当', '2', '2023-07-23 17:00:28+00', '2', '2023-07-23 17:00:28+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (70, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 2, '不規則な勤務(予定の変更、突然の仕事)', '少ない', '2', '2023-07-23 17:00:28+00', '2', '2023-07-23 17:00:28+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (71, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 3, '出張に伴う負担(頻度・拘束時間・時差など)', 'ない又は適当', '2', '2023-07-23 17:00:29+00', '2', '2023-07-23 17:00:29+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (72, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 4, '深夜勤務に伴う負担 ※深夜勤務の頻度や時間数などから総合的に判断してください。 深夜勤務は、深夜時間帯(午後10時-午前5時)の一部または全部を含む勤務をいいます。', 'ない又は小さい', '2', '2023-07-23 17:00:29+00', '2', '2023-07-23 17:00:29+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (73, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 5, '休憩・仮眠の時間数及び施設', '適切である', '2', '2023-07-23 17:00:30+00', '2', '2023-07-23 17:00:30+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (74, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 6, '仕事についての精神的負担', '小さい', '2', '2023-07-23 17:00:30+00', '2', '2023-07-23 17:00:30+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (492, 22, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 3, '落ち着かない', 'よくある', '10', '2023-08-23 23:15:01+00', '10', '2023-08-23 23:15:01+00', NULL, 3);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (504, 22, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 1, '1か月の時間外労働(時間外・休日労働時間を含む)', '非常に多い', '10', '2023-08-23 23:15:11+00', '10', '2023-08-23 23:15:11+00', NULL, 3);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (235, 15, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 3, '落ち着かない', 'ほとんどない', '6', '2023-08-06 15:50:21+00', '6', '2023-08-07 21:59:16+00', '2023-08-07 21:59:16+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (237, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 5, 'よく眠れない', 'ほとんどない', '6', '2023-08-06 15:50:22+00', '6', '2023-08-07 21:59:16+00', '2023-08-07 21:59:16+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (238, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 6, '体の調子が悪い', 'ほとんどない', '6', '2023-08-06 15:50:22+00', '6', '2023-08-07 21:59:16+00', '2023-08-07 21:59:16+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (239, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 7, '物事に集中できない', 'ほとんどない', '6', '2023-08-06 15:50:22+00', '6', '2023-08-07 21:59:16+00', '2023-08-07 21:59:16+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (240, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 8, 'することに間違いが多い', 'ほとんどない', '6', '2023-08-06 15:50:23+00', '6', '2023-08-07 21:59:16+00', '2023-08-07 21:59:16+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (241, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 9, '仕事中、強い眠気に襲われる', 'ほとんどない', '6', '2023-08-06 15:50:23+00', '6', '2023-08-07 21:59:16+00', '2023-08-07 21:59:16+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (242, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 10, 'やる気が出ない', 'ほとんどない', '6', '2023-08-06 15:50:24+00', '6', '2023-08-07 21:59:16+00', '2023-08-07 21:59:16+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (244, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 12, '朝、起きた時、ぐったりした 疲れを感じる', 'ほとんどない', '6', '2023-08-06 15:50:25+00', '6', '2023-08-07 21:59:16+00', '2023-08-07 21:59:16+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (245, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 13, '以前とくらべて、疲れやすい', 'ほとんどない', '6', '2023-08-06 15:50:25+00', '6', '2023-08-07 21:59:16+00', '2023-08-07 21:59:16+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (246, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 14, '食欲がないと感じる', 'ほとんどない', '6', '2023-08-06 15:50:26+00', '6', '2023-08-07 21:59:16+00', '2023-08-07 21:59:16+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (247, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 1, '1か月の時間外労働(時間外・休日労働時間を含む)', '適当', '6', '2023-08-06 15:50:26+00', '6', '2023-08-07 21:59:16+00', '2023-08-07 21:59:16+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (248, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 2, '不規則な勤務(予定の変更、突然の仕事)', '少ない', '6', '2023-08-06 15:50:30+00', '6', '2023-08-07 21:59:16+00', '2023-08-07 21:59:16+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (249, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 3, '出張に伴う負担(頻度・拘束時間・時差など)', 'ない又は適当', '6', '2023-08-06 15:50:31+00', '6', '2023-08-07 21:59:16+00', '2023-08-07 21:59:16+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (79, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 11, '勤務時間外でも仕事のことが気にかかって仕方がない', '時々ある', '2', '2023-07-23 17:00:35+00', '2', '2023-07-23 17:00:35+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (77, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 9, '時間内に処理しきれない仕事', '多い', '2', '2023-07-23 17:00:34+00', '2', '2023-07-23 17:00:34+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (78, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 10, '自分のペースでできない仕事', '多い', '2', '2023-07-23 17:00:35+00', '2', '2023-07-23 17:00:35+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (80, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 12, '勤務日の睡眠時間', 'やや足りない', '2', '2023-07-23 17:00:35+00', '2', '2023-07-23 17:00:35+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (75, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 7, '仕事についての身体的負担 ※肉体的作業や寒冷・暑熱作業などの身体的な面での負担をいいます。', '非常に大きい', '2', '2023-07-23 17:00:32+00', '2', '2023-07-23 17:00:32+00', NULL, 3);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (493, 22, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 4, 'ゆううつだ', 'ほとんどない', '10', '2023-08-23 23:15:02+00', '10', '2023-08-23 23:15:02+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (505, 22, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 2, '不規則な勤務(予定の変更、突然の仕事)', '少ない', '10', '2023-08-23 23:15:12+00', '10', '2023-08-23 23:15:12+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (260, 14, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 2, '不安だ', 'ほとんどない', '6', '2023-08-06 16:03:25+00', '6', '2023-08-06 16:03:25+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (261, 14, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 3, '落ち着かない', 'ほとんどない', '6', '2023-08-06 16:03:25+00', '6', '2023-08-06 16:03:25+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (262, 14, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 4, 'ゆううつだ', 'ほとんどない', '6', '2023-08-06 16:03:26+00', '6', '2023-08-06 16:03:26+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (513, 22, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 10, '自分のペースでできない仕事', '少ない', '10', '2023-08-23 23:15:19+00', '10', '2023-08-23 23:15:19+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (522, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 6, '体の調子が悪い', 'ほとんどない', '8', '2023-08-28 10:06:21+00', '8', '2023-08-28 10:06:21+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (529, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 13, '以前とくらべて、疲れやすい', 'ほとんどない', '8', '2023-08-28 10:06:26+00', '8', '2023-08-28 10:06:26+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (534, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 4, '深夜勤務に伴う負担 ※深夜勤務の頻度や時間数などから総合的に判断してください。 深夜勤務は、深夜時間帯(午後10時-午前5時)の一部または全部を含む勤務をいいます。', 'ない又は小さい', '8', '2023-08-28 10:06:31+00', '8', '2023-08-28 10:06:31+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (538, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 8, '職場・顧客などの人間関係による負担', '非常に大きい', '8', '2023-08-28 10:06:33+00', '8', '2023-08-28 10:06:33+00', NULL, 3);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (541, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 11, '勤務時間外でも仕事のことが気にかかって仕方がない', 'よくある', '8', '2023-08-28 10:06:35+00', '8', '2023-08-28 10:06:35+00', NULL, 3);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (543, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 13, '終業時刻から次の始業時刻の間にある休息時間 ※これを勤務間インターバルといいます', 'やや足りない', '8', '2023-08-28 10:06:37+00', '8', '2023-08-28 10:06:37+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (272, 13, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 2, '不安だ', 'ほとんどない', '7', '2023-08-06 16:09:05+00', '7', '2023-08-06 16:09:05+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (273, 13, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 3, '落ち着かない', 'ほとんどない', '7', '2023-08-06 16:09:22+00', '7', '2023-08-06 16:09:22+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (274, 13, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 4, 'ゆううつだ', 'ほとんどない', '7', '2023-08-06 16:09:24+00', '7', '2023-08-06 16:09:24+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (275, 13, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 5, 'よく眠れない', 'ほとんどない', '7', '2023-08-06 16:09:24+00', '7', '2023-08-06 16:09:24+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (276, 13, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 6, '体の調子が悪い', 'ほとんどない', '7', '2023-08-06 16:09:26+00', '7', '2023-08-06 16:09:26+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (277, 13, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 7, '物事に集中できない', 'ほとんどない', '7', '2023-08-06 16:09:29+00', '7', '2023-08-06 16:09:29+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (278, 13, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 8, 'することに間違いが多い', 'ほとんどない', '7', '2023-08-06 16:09:31+00', '7', '2023-08-06 16:09:31+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (279, 13, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 9, '仕事中、強い眠気に襲われる', 'ほとんどない', '7', '2023-08-06 16:09:32+00', '7', '2023-08-06 16:09:32+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (251, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 5, '休憩・仮眠の時間数及び施設', '適切である', '6', '2023-08-06 15:50:31+00', '6', '2023-08-07 21:59:16+00', '2023-08-07 21:59:16+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (255, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 9, '時間内に処理しきれない仕事', '多い', '6', '2023-08-06 15:50:34+00', '6', '2023-08-07 21:59:16+00', '2023-08-07 21:59:16+00', 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (263, 14, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 5, 'よく眠れない', '時々ある', '6', '2023-08-06 16:03:36+00', '6', '2023-08-06 16:03:36+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (256, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 10, '自分のペースでできない仕事', '多い', '6', '2023-08-06 15:50:34+00', '6', '2023-08-07 21:59:16+00', '2023-08-07 21:59:16+00', 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (252, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 6, '仕事についての精神的負担', '大きい', '6', '2023-08-06 15:50:33+00', '6', '2023-08-07 21:59:16+00', '2023-08-07 21:59:16+00', 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (253, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 7, '仕事についての身体的負担 ※肉体的作業や寒冷・暑熱作業などの身体的な面での負担をいいます。', '大きい', '6', '2023-08-06 15:50:33+00', '6', '2023-08-07 21:59:16+00', '2023-08-07 21:59:16+00', 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (254, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 8, '職場・顧客などの人間関係による負担', '大きい', '6', '2023-08-06 15:50:33+00', '6', '2023-08-07 21:59:16+00', '2023-08-07 21:59:16+00', 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (258, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 12, '勤務日の睡眠時間', 'やや足りない', '6', '2023-08-06 15:50:35+00', '6', '2023-08-07 21:59:16+00', '2023-08-07 21:59:16+00', 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (259, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 13, '終業時刻から次の始業時刻の間にある休息時間 ※これを勤務間インターバルといいます', 'やや足りない', '6', '2023-08-06 15:50:36+00', '6', '2023-08-07 21:59:16+00', '2023-08-07 21:59:16+00', 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (280, 13, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 10, 'やる気が出ない', 'ほとんどない', '7', '2023-08-06 16:09:33+00', '7', '2023-08-06 16:09:33+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (281, 13, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 11, 'へとへとだ(運動後を除く) ※へとへと(非常に疲れて体に力がなくなったさま)', 'ほとんどない', '7', '2023-08-06 16:09:35+00', '7', '2023-08-06 16:09:35+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (494, 22, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 5, 'よく眠れない', '時々ある', '10', '2023-08-23 23:15:04+00', '10', '2023-08-23 23:15:04+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (506, 22, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 3, '出張に伴う負担(頻度・拘束時間・時差など)', '大きい', '10', '2023-08-23 23:15:13+00', '10', '2023-08-23 23:15:13+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (286, 13, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 2, '不規則な勤務(予定の変更、突然の仕事)', '少ない', '7', '2023-08-06 16:09:44+00', '7', '2023-08-06 16:09:44+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (287, 13, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 3, '出張に伴う負担(頻度・拘束時間・時差など)', 'ない又は適当', '7', '2023-08-06 16:09:45+00', '7', '2023-08-06 16:09:45+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (288, 13, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 4, '深夜勤務に伴う負担 ※深夜勤務の頻度や時間数などから総合的に判断してください。 深夜勤務は、深夜時間帯(午後10時-午前5時)の一部または全部を含む勤務をいいます。', 'ない又は小さい', '7', '2023-08-06 16:09:47+00', '7', '2023-08-06 16:09:47+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (289, 13, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 5, '休憩・仮眠の時間数及び施設', '適切である', '7', '2023-08-06 16:09:47+00', '7', '2023-08-06 16:09:47+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (291, 13, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 7, '仕事についての身体的負担 ※肉体的作業や寒冷・暑熱作業などの身体的な面での負担をいいます。', '小さい', '7', '2023-08-06 16:09:51+00', '7', '2023-08-06 16:09:51+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (292, 13, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 8, '職場・顧客などの人間関係による負担', '小さい', '7', '2023-08-06 16:09:53+00', '7', '2023-08-06 16:09:53+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (293, 13, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 9, '時間内に処理しきれない仕事', '少ない', '7', '2023-08-06 16:09:54+00', '7', '2023-08-06 16:09:54+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (294, 13, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 10, '自分のペースでできない仕事', '少ない', '7', '2023-08-06 16:09:56+00', '7', '2023-08-06 16:09:56+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (295, 13, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 11, '勤務時間外でも仕事のことが気にかかって仕方がない', 'ほとんどない', '7', '2023-08-06 16:09:56+00', '7', '2023-08-06 16:09:56+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (296, 13, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 12, '勤務日の睡眠時間', '十分', '7', '2023-08-06 16:09:57+00', '7', '2023-08-06 16:09:57+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (297, 13, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 13, '終業時刻から次の始業時刻の間にある休息時間 ※これを勤務間インターバルといいます', '十分', '7', '2023-08-06 16:09:59+00', '7', '2023-08-06 16:09:59+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (234, 15, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 3, '落ち着かない', 'ほとんどない', '6', '2023-08-06 15:50:21+00', '6', '2023-08-07 21:59:16+00', '2023-08-07 21:59:16+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (233, 15, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 2, '不安だ', 'ほとんどない', '6', '2023-08-06 15:50:20+00', '6', '2023-08-07 21:59:16+00', '2023-08-07 21:59:16+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (243, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 11, 'へとへとだ(運動後を除く) ※へとへと(非常に疲れて体に力がなくなったさま)', 'ほとんどない', '6', '2023-08-06 15:50:24+00', '6', '2023-08-07 21:59:16+00', '2023-08-07 21:59:16+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (250, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 4, '深夜勤務に伴う負担 ※深夜勤務の頻度や時間数などから総合的に判断してください。 深夜勤務は、深夜時間帯(午後10時-午前5時)の一部または全部を含む勤務をいいます。', 'ない又は小さい', '6', '2023-08-06 15:50:31+00', '6', '2023-08-07 21:59:16+00', '2023-08-07 21:59:16+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (514, 22, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 11, '勤務時間外でも仕事のことが気にかかって仕方がない', '時々ある', '10', '2023-08-23 23:15:20+00', '10', '2023-08-23 23:15:20+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (299, 15, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 2, '不安だ', 'ほとんどない', '8', '2023-08-07 22:00:19+00', '8', '2023-08-22 23:10:54+00', '2023-08-22 23:10:54+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (300, 15, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 3, '落ち着かない', 'ほとんどない', '8', '2023-08-07 22:00:20+00', '8', '2023-08-22 23:10:54+00', '2023-08-22 23:10:54+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (301, 15, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 4, 'ゆううつだ', 'ほとんどない', '8', '2023-08-07 22:01:06+00', '8', '2023-08-22 23:10:54+00', '2023-08-22 23:10:54+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (302, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 5, 'よく眠れない', 'ほとんどない', '8', '2023-08-07 22:01:08+00', '8', '2023-08-22 23:10:54+00', '2023-08-22 23:10:54+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (303, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 6, '体の調子が悪い', 'ほとんどない', '8', '2023-08-07 22:01:09+00', '8', '2023-08-22 23:10:54+00', '2023-08-22 23:10:54+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (282, 13, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 12, '朝、起きた時、ぐったりした 疲れを感じる', '時々ある', '7', '2023-08-06 16:09:39+00', '7', '2023-08-06 16:09:39+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (285, 13, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 1, '1か月の時間外労働(時間外・休日労働時間を含む)', '多い', '7', '2023-08-06 16:09:43+00', '7', '2023-08-06 16:09:43+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (290, 13, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 6, '仕事についての精神的負担', '大きい', '7', '2023-08-06 16:09:48+00', '7', '2023-08-06 16:09:48+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (495, 22, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 6, '体の調子が悪い', 'よくある', '10', '2023-08-23 23:15:04+00', '10', '2023-08-23 23:15:04+00', NULL, 3);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (507, 22, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 4, '深夜勤務に伴う負担 ※深夜勤務の頻度や時間数などから総合的に判断してください。 深夜勤務は、深夜時間帯(午後10時-午前5時)の一部または全部を含む勤務をいいます。', 'ない又は小さい', '10', '2023-08-23 23:15:14+00', '10', '2023-08-23 23:15:14+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (325, 4, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 1, 'イライラする', 'ほとんどない', '2', '2023-08-09 23:41:41+00', '2', '2023-08-09 23:41:41+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (327, 4, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 3, '落ち着かない', 'ほとんどない', '2', '2023-08-09 23:41:42+00', '2', '2023-08-09 23:41:42+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (515, 22, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 12, '勤務日の睡眠時間', '足りない', '10', '2023-08-23 23:15:20+00', '10', '2023-08-23 23:15:20+00', NULL, 3);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (523, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 7, '物事に集中できない', 'ほとんどない', '8', '2023-08-28 10:06:24+00', '8', '2023-08-28 10:06:24+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (530, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 14, '食欲がないと感じる', 'ほとんどない', '8', '2023-08-28 10:06:27+00', '8', '2023-08-28 10:06:27+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (305, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 8, 'することに間違いが多い', 'ほとんどない', '8', '2023-08-07 22:01:12+00', '8', '2023-08-22 23:10:54+00', '2023-08-22 23:10:54+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (306, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 9, '仕事中、強い眠気に襲われる', 'ほとんどない', '8', '2023-08-07 22:01:13+00', '8', '2023-08-22 23:10:54+00', '2023-08-22 23:10:54+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (307, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 10, 'やる気が出ない', 'ほとんどない', '8', '2023-08-07 22:01:14+00', '8', '2023-08-22 23:10:54+00', '2023-08-22 23:10:54+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (308, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 11, 'へとへとだ(運動後を除く) ※へとへと(非常に疲れて体に力がなくなったさま)', 'ほとんどない', '8', '2023-08-07 22:01:14+00', '8', '2023-08-22 23:10:54+00', '2023-08-22 23:10:54+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (309, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 12, '朝、起きた時、ぐったりした 疲れを感じる', 'ほとんどない', '8', '2023-08-07 22:01:15+00', '8', '2023-08-22 23:10:54+00', '2023-08-22 23:10:54+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (310, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 13, '以前とくらべて、疲れやすい', 'ほとんどない', '8', '2023-08-07 22:01:15+00', '8', '2023-08-22 23:10:54+00', '2023-08-22 23:10:54+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (311, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 14, '食欲がないと感じる', 'ほとんどない', '8', '2023-08-07 22:01:16+00', '8', '2023-08-22 23:10:54+00', '2023-08-22 23:10:54+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (312, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 1, '1か月の時間外労働(時間外・休日労働時間を含む)', '適当', '8', '2023-08-07 22:01:17+00', '8', '2023-08-22 23:10:54+00', '2023-08-22 23:10:54+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (313, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 2, '不規則な勤務(予定の変更、突然の仕事)', '少ない', '8', '2023-08-07 22:01:18+00', '8', '2023-08-22 23:10:54+00', '2023-08-22 23:10:54+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (314, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 3, '出張に伴う負担(頻度・拘束時間・時差など)', 'ない又は適当', '8', '2023-08-07 22:01:18+00', '8', '2023-08-22 23:10:54+00', '2023-08-22 23:10:54+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (316, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 5, '休憩・仮眠の時間数及び施設', '適切である', '8', '2023-08-07 22:01:20+00', '8', '2023-08-22 23:10:54+00', '2023-08-22 23:10:54+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (317, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 6, '仕事についての精神的負担', '小さい', '8', '2023-08-07 22:01:21+00', '8', '2023-08-22 23:10:54+00', '2023-08-22 23:10:54+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (318, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 7, '仕事についての身体的負担 ※肉体的作業や寒冷・暑熱作業などの身体的な面での負担をいいます。', '小さい', '8', '2023-08-07 22:01:22+00', '8', '2023-08-22 23:10:54+00', '2023-08-22 23:10:54+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (319, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 8, '職場・顧客などの人間関係による負担', '小さい', '8', '2023-08-07 22:01:23+00', '8', '2023-08-22 23:10:54+00', '2023-08-22 23:10:54+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (320, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 9, '時間内に処理しきれない仕事', '少ない', '8', '2023-08-07 22:01:23+00', '8', '2023-08-22 23:10:54+00', '2023-08-22 23:10:54+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (321, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 10, '自分のペースでできない仕事', '少ない', '8', '2023-08-07 22:01:24+00', '8', '2023-08-22 23:10:54+00', '2023-08-22 23:10:54+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (322, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 11, '勤務時間外でも仕事のことが気にかかって仕方がない', 'ほとんどない', '8', '2023-08-07 22:01:25+00', '8', '2023-08-22 23:10:54+00', '2023-08-22 23:10:54+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (323, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 12, '勤務日の睡眠時間', '十分', '8', '2023-08-07 22:01:25+00', '8', '2023-08-22 23:10:54+00', '2023-08-22 23:10:54+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (324, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 13, '終業時刻から次の始業時刻の間にある休息時間 ※これを勤務間インターバルといいます', '十分', '8', '2023-08-07 22:01:26+00', '8', '2023-08-22 23:10:54+00', '2023-08-22 23:10:54+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (326, 4, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 2, '不安だ', '時々ある', '2', '2023-08-09 23:41:42+00', '2', '2023-08-09 23:41:42+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (328, 4, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 4, 'ゆううつだ', '時々ある', '2', '2023-08-09 23:41:43+00', '2', '2023-08-09 23:41:43+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (329, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 5, 'よく眠れない', '時々ある', '2', '2023-08-09 23:41:44+00', '2', '2023-08-09 23:41:44+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (496, 22, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 7, '物事に集中できない', 'ほとんどない', '10', '2023-08-23 23:15:06+00', '10', '2023-08-23 23:15:06+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (508, 22, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 5, '休憩・仮眠の時間数及び施設', '不適切である', '10', '2023-08-23 23:15:14+00', '10', '2023-08-23 23:15:14+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (516, 22, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 13, '終業時刻から次の始業時刻の間にある休息時間 ※これを勤務間インターバルといいます', 'やや足りない', '10', '2023-08-23 23:15:21+00', '10', '2023-08-23 23:15:21+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (524, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 8, 'することに間違いが多い', 'ほとんどない', '8', '2023-08-28 10:06:24+00', '8', '2023-08-28 10:06:24+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (531, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 1, '1か月の時間外労働(時間外・休日労働時間を含む)', '適当', '8', '2023-08-28 10:06:28+00', '8', '2023-08-28 10:06:28+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (535, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 5, '休憩・仮眠の時間数及び施設', '適切である', '8', '2023-08-28 10:06:31+00', '8', '2023-08-28 10:06:31+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (539, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 9, '時間内に処理しきれない仕事', '多い', '8', '2023-08-28 10:06:34+00', '8', '2023-08-28 10:06:34+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (542, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 12, '勤務日の睡眠時間', 'やや足りない', '8', '2023-08-28 10:06:36+00', '8', '2023-08-28 10:06:36+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (355, 17, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 1, 'イライラする', 'ほとんどない', '9', '2023-08-13 18:14:45+00', '9', '2023-08-13 18:14:45+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (356, 17, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 2, '不安だ', 'ほとんどない', '9', '2023-08-13 18:14:45+00', '9', '2023-08-13 18:14:45+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (357, 17, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 3, '落ち着かない', 'ほとんどない', '9', '2023-08-13 18:14:46+00', '9', '2023-08-13 18:14:46+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (358, 17, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 4, 'ゆううつだ', 'ほとんどない', '9', '2023-08-13 18:14:46+00', '9', '2023-08-13 18:14:46+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (359, 17, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 5, 'よく眠れない', 'ほとんどない', '9', '2023-08-13 18:14:46+00', '9', '2023-08-13 18:14:46+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (360, 17, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 6, '体の調子が悪い', 'ほとんどない', '9', '2023-08-13 18:14:47+00', '9', '2023-08-13 18:14:47+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (361, 17, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 7, '物事に集中できない', 'ほとんどない', '9', '2023-08-13 18:14:47+00', '9', '2023-08-13 18:14:47+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (339, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 1, '1か月の時間外労働(時間外・休日労働時間を含む)', '多い', '2', '2023-08-09 23:41:48+00', '2', '2023-08-09 23:41:48+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (342, 14, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 1, '1か月の時間外労働(時間外・休日労働時間を含む)', '多い', '6', '2023-08-13 15:06:48+00', '6', '2023-08-13 15:06:48+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (343, 14, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 2, '不規則な勤務(予定の変更、突然の仕事)', '多い', '6', '2023-08-13 15:06:48+00', '6', '2023-08-13 15:06:48+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (350, 14, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 9, '時間内に処理しきれない仕事', '多い', '6', '2023-08-13 15:06:51+00', '6', '2023-08-13 15:06:51+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (351, 14, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 10, '自分のペースでできない仕事', '多い', '6', '2023-08-13 15:06:51+00', '6', '2023-08-13 15:06:51+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (344, 14, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 3, '出張に伴う負担(頻度・拘束時間・時差など)', '大きい', '6', '2023-08-13 15:06:49+00', '6', '2023-08-13 15:06:49+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (345, 14, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 4, '深夜勤務に伴う負担 ※深夜勤務の頻度や時間数などから総合的に判断してください。 深夜勤務は、深夜時間帯(午後10時-午前5時)の一部または全部を含む勤務をいいます。', '大きい', '6', '2023-08-13 15:06:49+00', '6', '2023-08-13 15:06:49+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (347, 14, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 6, '仕事についての精神的負担', '大きい', '6', '2023-08-13 15:06:50+00', '6', '2023-08-13 15:06:50+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (346, 14, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 5, '休憩・仮眠の時間数及び施設', '不適切である', '6', '2023-08-13 15:06:49+00', '6', '2023-08-13 15:06:49+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (353, 14, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 12, '勤務日の睡眠時間', 'やや足りない', '6', '2023-08-13 15:06:52+00', '6', '2023-08-13 15:06:52+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (354, 14, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 13, '終業時刻から次の始業時刻の間にある休息時間 ※これを勤務間インターバルといいます', 'やや足りない', '6', '2023-08-13 15:06:53+00', '6', '2023-08-13 15:06:53+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (362, 17, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 8, 'することに間違いが多い', 'ほとんどない', '9', '2023-08-13 18:14:48+00', '9', '2023-08-13 18:14:48+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (363, 17, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 9, '仕事中、強い眠気に襲われる', 'ほとんどない', '9', '2023-08-13 18:14:48+00', '9', '2023-08-13 18:14:48+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (364, 17, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 10, 'やる気が出ない', 'ほとんどない', '9', '2023-08-13 18:14:49+00', '9', '2023-08-13 18:14:49+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (365, 17, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 11, 'へとへとだ(運動後を除く) ※へとへと(非常に疲れて体に力がなくなったさま)', 'ほとんどない', '9', '2023-08-13 18:14:49+00', '9', '2023-08-13 18:14:49+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (366, 17, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 12, '朝、起きた時、ぐったりした 疲れを感じる', 'ほとんどない', '9', '2023-08-13 18:14:49+00', '9', '2023-08-13 18:14:49+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (367, 17, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 13, '以前とくらべて、疲れやすい', 'ほとんどない', '9', '2023-08-13 18:14:50+00', '9', '2023-08-13 18:14:50+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (368, 17, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 14, '食欲がないと感じる', 'ほとんどない', '9', '2023-08-13 18:14:50+00', '9', '2023-08-13 18:14:50+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (369, 17, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 1, '1か月の時間外労働(時間外・休日労働時間を含む)', '適当', '9', '2023-08-13 18:14:51+00', '9', '2023-08-13 18:14:51+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (370, 17, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 2, '不規則な勤務(予定の変更、突然の仕事)', '少ない', '9', '2023-08-13 18:14:51+00', '9', '2023-08-13 18:14:51+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (371, 17, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 3, '出張に伴う負担(頻度・拘束時間・時差など)', 'ない又は適当', '9', '2023-08-13 18:14:51+00', '9', '2023-08-13 18:14:51+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (372, 17, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 4, '深夜勤務に伴う負担 ※深夜勤務の頻度や時間数などから総合的に判断してください。 深夜勤務は、深夜時間帯(午後10時-午前5時)の一部または全部を含む勤務をいいます。', 'ない又は小さい', '9', '2023-08-13 18:14:52+00', '9', '2023-08-13 18:14:52+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (373, 17, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 5, '休憩・仮眠の時間数及び施設', '適切である', '9', '2023-08-13 18:14:52+00', '9', '2023-08-13 18:14:52+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (374, 17, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 6, '仕事についての精神的負担', '小さい', '9', '2023-08-13 18:14:52+00', '9', '2023-08-13 18:14:52+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (375, 17, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 7, '仕事についての身体的負担 ※肉体的作業や寒冷・暑熱作業などの身体的な面での負担をいいます。', '小さい', '9', '2023-08-13 18:14:53+00', '9', '2023-08-13 18:14:53+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (376, 17, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 8, '職場・顧客などの人間関係による負担', '小さい', '9', '2023-08-13 18:14:53+00', '9', '2023-08-13 18:14:53+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (377, 17, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 9, '時間内に処理しきれない仕事', '少ない', '9', '2023-08-13 18:14:53+00', '9', '2023-08-13 18:14:53+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (378, 17, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 10, '自分のペースでできない仕事', '少ない', '9', '2023-08-13 18:14:54+00', '9', '2023-08-13 18:14:54+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (379, 17, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 11, '勤務時間外でも仕事のことが気にかかって仕方がない', 'ほとんどない', '9', '2023-08-13 18:14:54+00', '9', '2023-08-13 18:14:54+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (380, 17, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 12, '勤務日の睡眠時間', '十分', '9', '2023-08-13 18:14:54+00', '9', '2023-08-13 18:14:54+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (381, 17, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 13, '終業時刻から次の始業時刻の間にある休息時間 ※これを勤務間インターバルといいます', '十分', '9', '2023-08-13 18:14:55+00', '9', '2023-08-13 18:14:55+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (298, 15, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 1, 'イライラする', 'ほとんどない', '8', '2023-08-07 22:00:18+00', '8', '2023-08-22 23:10:54+00', '2023-08-22 23:10:54+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (304, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 7, '物事に集中できない', 'ほとんどない', '8', '2023-08-07 22:01:10+00', '8', '2023-08-22 23:10:54+00', '2023-08-22 23:10:54+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (315, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 4, '深夜勤務に伴う負担 ※深夜勤務の頻度や時間数などから総合的に判断してください。 深夜勤務は、深夜時間帯(午後10時-午前5時)の一部または全部を含む勤務をいいます。', 'ない又は小さい', '8', '2023-08-07 22:01:19+00', '8', '2023-08-22 23:10:54+00', '2023-08-22 23:10:54+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (497, 22, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 8, 'することに間違いが多い', '時々ある', '10', '2023-08-23 23:15:06+00', '10', '2023-08-23 23:15:06+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (383, 15, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 2, '不安だ', 'ほとんどない', '8', '2023-08-22 23:20:32+00', '8', '2023-08-22 23:22:16+00', '2023-08-22 23:22:16+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (384, 15, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 3, '落ち着かない', 'ほとんどない', '8', '2023-08-22 23:20:33+00', '8', '2023-08-22 23:22:16+00', '2023-08-22 23:22:16+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (385, 15, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 4, 'ゆううつだ', 'ほとんどない', '8', '2023-08-22 23:20:34+00', '8', '2023-08-22 23:22:16+00', '2023-08-22 23:22:16+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (386, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 5, 'よく眠れない', 'ほとんどない', '8', '2023-08-22 23:20:35+00', '8', '2023-08-22 23:22:16+00', '2023-08-22 23:22:16+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (498, 22, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 9, '仕事中、強い眠気に襲われる', 'よくある', '10', '2023-08-23 23:15:06+00', '10', '2023-08-23 23:15:06+00', NULL, 3);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (509, 22, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 6, '仕事についての精神的負担', '大きい', '10', '2023-08-23 23:15:15+00', '10', '2023-08-23 23:15:15+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (436, 15, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 1, 'イライラする', 'ほとんどない', '8', '2023-08-23 19:25:11+00', '8', '2023-08-28 10:06:14+00', '2023-08-28 10:06:14+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (382, 15, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 1, 'イライラする', 'ほとんどない', '8', '2023-08-22 23:20:31+00', '8', '2023-08-22 23:22:16+00', '2023-08-22 23:22:16+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (387, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 6, '体の調子が悪い', 'ほとんどない', '8', '2023-08-22 23:20:36+00', '8', '2023-08-22 23:22:16+00', '2023-08-22 23:22:16+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (388, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 7, '物事に集中できない', 'ほとんどない', '8', '2023-08-22 23:20:37+00', '8', '2023-08-22 23:22:16+00', '2023-08-22 23:22:16+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (389, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 8, 'することに間違いが多い', 'ほとんどない', '8', '2023-08-22 23:20:38+00', '8', '2023-08-22 23:22:16+00', '2023-08-22 23:22:16+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (390, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 9, '仕事中、強い眠気に襲われる', 'ほとんどない', '8', '2023-08-22 23:20:39+00', '8', '2023-08-22 23:22:16+00', '2023-08-22 23:22:16+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (391, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 10, 'やる気が出ない', 'ほとんどない', '8', '2023-08-22 23:20:39+00', '8', '2023-08-22 23:22:16+00', '2023-08-22 23:22:16+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (392, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 11, 'へとへとだ(運動後を除く) ※へとへと(非常に疲れて体に力がなくなったさま)', 'ほとんどない', '8', '2023-08-22 23:20:40+00', '8', '2023-08-22 23:22:16+00', '2023-08-22 23:22:16+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (399, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 4, '深夜勤務に伴う負担 ※深夜勤務の頻度や時間数などから総合的に判断してください。 深夜勤務は、深夜時間帯(午後10時-午前5時)の一部または全部を含む勤務をいいます。', '大きい', '8', '2023-08-22 23:20:45+00', '8', '2023-08-22 23:22:16+00', '2023-08-22 23:22:16+00', 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (394, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 13, '以前とくらべて、疲れやすい', 'ほとんどない', '8', '2023-08-22 23:20:41+00', '8', '2023-08-22 23:22:16+00', '2023-08-22 23:22:16+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (401, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 6, '仕事についての精神的負担', '大きい', '8', '2023-08-22 23:20:46+00', '8', '2023-08-22 23:22:16+00', '2023-08-22 23:22:16+00', 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (396, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 1, '1か月の時間外労働(時間外・休日労働時間を含む)', '適当', '8', '2023-08-22 23:20:43+00', '8', '2023-08-22 23:22:16+00', '2023-08-22 23:22:16+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (397, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 2, '不規則な勤務(予定の変更、突然の仕事)', '少ない', '8', '2023-08-22 23:20:43+00', '8', '2023-08-22 23:22:16+00', '2023-08-22 23:22:16+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (398, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 3, '出張に伴う負担(頻度・拘束時間・時差など)', 'ない又は適当', '8', '2023-08-22 23:20:44+00', '8', '2023-08-22 23:22:16+00', '2023-08-22 23:22:16+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (408, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 13, '終業時刻から次の始業時刻の間にある休息時間 ※これを勤務間インターバルといいます', 'やや足りない', '8', '2023-08-22 23:20:53+00', '8', '2023-08-22 23:22:16+00', '2023-08-22 23:22:16+00', 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (400, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 5, '休憩・仮眠の時間数及び施設', '適切である', '8', '2023-08-22 23:20:45+00', '8', '2023-08-22 23:22:16+00', '2023-08-22 23:22:16+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (409, 15, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 1, 'イライラする', 'ほとんどない', '8', '2023-08-22 23:39:33+00', '8', '2023-08-23 19:12:04+00', '2023-08-23 19:12:04+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (402, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 7, '仕事についての身体的負担 ※肉体的作業や寒冷・暑熱作業などの身体的な面での負担をいいます。', '小さい', '8', '2023-08-22 23:20:47+00', '8', '2023-08-22 23:22:16+00', '2023-08-22 23:22:16+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (410, 15, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 2, '不安だ', 'ほとんどない', '8', '2023-08-22 23:39:34+00', '8', '2023-08-23 19:12:04+00', '2023-08-23 19:12:04+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (404, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 9, '時間内に処理しきれない仕事', '少ない', '8', '2023-08-22 23:20:49+00', '8', '2023-08-22 23:22:16+00', '2023-08-22 23:22:16+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (405, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 10, '自分のペースでできない仕事', '少ない', '8', '2023-08-22 23:20:51+00', '8', '2023-08-22 23:22:16+00', '2023-08-22 23:22:16+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (403, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 8, '職場・顧客などの人間関係による負担', '大きい', '8', '2023-08-22 23:20:48+00', '8', '2023-08-22 23:22:16+00', '2023-08-22 23:22:16+00', 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (407, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 12, '勤務日の睡眠時間', '十分', '8', '2023-08-22 23:20:52+00', '8', '2023-08-22 23:22:16+00', '2023-08-22 23:22:16+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (411, 15, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 3, '落ち着かない', 'ほとんどない', '8', '2023-08-22 23:39:35+00', '8', '2023-08-23 19:12:04+00', '2023-08-23 19:12:04+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (444, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 9, '仕事中、強い眠気に襲われる', 'よくある', '8', '2023-08-23 19:25:52+00', '8', '2023-08-28 10:06:14+00', '2023-08-28 10:06:14+00', 3);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (525, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 9, '仕事中、強い眠気に襲われる', 'ほとんどない', '8', '2023-08-28 10:06:25+00', '8', '2023-08-28 10:06:25+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (413, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 5, 'よく眠れない', 'ほとんどない', '8', '2023-08-22 23:39:36+00', '8', '2023-08-23 19:12:04+00', '2023-08-23 19:12:04+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (499, 22, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 10, 'やる気が出ない', 'ほとんどない', '10', '2023-08-23 23:15:07+00', '10', '2023-08-23 23:15:07+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (3, 4, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 2, '不安だ', '時々ある', '2', '2023-07-21 00:22:54+00', '2', '2023-07-21 00:32:00+00', '2023-07-21 00:32:00+00', 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (5, 4, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 4, 'ゆううつだ', '時々ある', '2', '2023-07-21 00:22:56+00', '2', '2023-07-21 00:32:00+00', '2023-07-21 00:32:00+00', 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (9, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 8, 'することに間違いが多い', '時々ある', '2', '2023-07-21 00:22:58+00', '2', '2023-07-21 00:32:00+00', '2023-07-21 00:32:00+00', 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (11, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 10, 'やる気が出ない', '時々ある', '2', '2023-07-21 00:23:00+00', '2', '2023-07-21 00:32:00+00', '2023-07-21 00:32:00+00', 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (13, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 12, '朝、起きた時、ぐったりした 疲れを感じる', '時々ある', '2', '2023-07-21 00:23:01+00', '2', '2023-07-21 00:32:00+00', '2023-07-21 00:32:00+00', 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (15, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 14, '食欲がないと感じる', '時々ある', '2', '2023-07-21 00:23:04+00', '2', '2023-07-21 00:32:00+00', '2023-07-21 00:32:00+00', 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (58, 4, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 4, 'ゆううつだ', '時々ある', '2', '2023-07-23 17:00:22+00', '2', '2023-07-23 17:00:22+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (59, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 5, 'よく眠れない', '時々ある', '2', '2023-07-23 17:00:23+00', '2', '2023-07-23 17:00:23+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (416, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 8, 'することに間違いが多い', 'ほとんどない', '8', '2023-08-22 23:41:19+00', '8', '2023-08-23 19:12:04+00', '2023-08-23 19:12:04+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (417, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 9, '仕事中、強い眠気に襲われる', 'ほとんどない', '8', '2023-08-22 23:41:20+00', '8', '2023-08-23 19:12:04+00', '2023-08-23 19:12:04+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (418, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 10, 'やる気が出ない', 'ほとんどない', '8', '2023-08-22 23:41:21+00', '8', '2023-08-23 19:12:04+00', '2023-08-23 19:12:04+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (420, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 12, '朝、起きた時、ぐったりした 疲れを感じる', 'ほとんどない', '8', '2023-08-22 23:41:22+00', '8', '2023-08-23 19:12:04+00', '2023-08-23 19:12:04+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (421, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 13, '以前とくらべて、疲れやすい', 'ほとんどない', '8', '2023-08-22 23:41:22+00', '8', '2023-08-23 19:12:04+00', '2023-08-23 19:12:04+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (422, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 14, '食欲がないと感じる', 'ほとんどない', '8', '2023-08-22 23:41:23+00', '8', '2023-08-23 19:12:04+00', '2023-08-23 19:12:04+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (423, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 1, '1か月の時間外労働(時間外・休日労働時間を含む)', '適当', '8', '2023-08-22 23:41:23+00', '8', '2023-08-23 19:12:04+00', '2023-08-23 19:12:04+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (424, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 2, '不規則な勤務(予定の変更、突然の仕事)', '少ない', '8', '2023-08-22 23:41:24+00', '8', '2023-08-23 19:12:04+00', '2023-08-23 19:12:04+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (425, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 3, '出張に伴う負担(頻度・拘束時間・時差など)', 'ない又は適当', '8', '2023-08-22 23:41:25+00', '8', '2023-08-23 19:12:04+00', '2023-08-23 19:12:04+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (426, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 4, '深夜勤務に伴う負担 ※深夜勤務の頻度や時間数などから総合的に判断してください。 深夜勤務は、深夜時間帯(午後10時-午前5時)の一部または全部を含む勤務をいいます。', 'ない又は小さい', '8', '2023-08-22 23:41:26+00', '8', '2023-08-23 19:12:04+00', '2023-08-23 19:12:04+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (427, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 5, '休憩・仮眠の時間数及び施設', '適切である', '8', '2023-08-22 23:41:26+00', '8', '2023-08-23 19:12:04+00', '2023-08-23 19:12:04+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (428, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 6, '仕事についての精神的負担', '小さい', '8', '2023-08-22 23:41:27+00', '8', '2023-08-23 19:12:04+00', '2023-08-23 19:12:04+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (429, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 7, '仕事についての身体的負担 ※肉体的作業や寒冷・暑熱作業などの身体的な面での負担をいいます。', '小さい', '8', '2023-08-22 23:41:28+00', '8', '2023-08-23 19:12:04+00', '2023-08-23 19:12:04+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (430, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 8, '職場・顧客などの人間関係による負担', '小さい', '8', '2023-08-22 23:41:29+00', '8', '2023-08-23 19:12:04+00', '2023-08-23 19:12:04+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (431, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 9, '時間内に処理しきれない仕事', '少ない', '8', '2023-08-22 23:41:29+00', '8', '2023-08-23 19:12:04+00', '2023-08-23 19:12:04+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (432, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 10, '自分のペースでできない仕事', '少ない', '8', '2023-08-22 23:41:30+00', '8', '2023-08-23 19:12:04+00', '2023-08-23 19:12:04+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (433, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 11, '勤務時間外でも仕事のことが気にかかって仕方がない', 'ほとんどない', '8', '2023-08-22 23:41:31+00', '8', '2023-08-23 19:12:04+00', '2023-08-23 19:12:04+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (434, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 12, '勤務日の睡眠時間', '十分', '8', '2023-08-22 23:41:31+00', '8', '2023-08-23 19:12:04+00', '2023-08-23 19:12:04+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (435, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 13, '終業時刻から次の始業時刻の間にある休息時間 ※これを勤務間インターバルといいます', '十分', '8', '2023-08-22 23:41:32+00', '8', '2023-08-23 19:12:04+00', '2023-08-23 19:12:04+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (60, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 6, '体の調子が悪い', '時々ある', '2', '2023-07-23 17:00:23+00', '2', '2023-07-23 17:00:23+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (61, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 7, '物事に集中できない', '時々ある', '2', '2023-07-23 17:00:24+00', '2', '2023-07-23 17:00:24+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (62, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 8, 'することに間違いが多い', '時々ある', '2', '2023-07-23 17:00:24+00', '2', '2023-07-23 17:00:24+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (63, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 9, '仕事中、強い眠気に襲われる', '時々ある', '2', '2023-07-23 17:00:24+00', '2', '2023-07-23 17:00:24+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (64, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 10, 'やる気が出ない', '時々ある', '2', '2023-07-23 17:00:25+00', '2', '2023-07-23 17:00:25+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (65, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 11, 'へとへとだ(運動後を除く) ※へとへと(非常に疲れて体に力がなくなったさま)', '時々ある', '2', '2023-07-23 17:00:25+00', '2', '2023-07-23 17:00:25+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (66, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 12, '朝、起きた時、ぐったりした 疲れを感じる', '時々ある', '2', '2023-07-23 17:00:26+00', '2', '2023-07-23 17:00:26+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (264, 14, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 6, '体の調子が悪い', '時々ある', '6', '2023-08-06 16:03:36+00', '6', '2023-08-06 16:03:36+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (265, 14, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 7, '物事に集中できない', '時々ある', '6', '2023-08-06 16:03:36+00', '6', '2023-08-06 16:03:36+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (266, 14, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 8, 'することに間違いが多い', '時々ある', '6', '2023-08-06 16:03:37+00', '6', '2023-08-06 16:03:37+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (267, 14, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 9, '仕事中、強い眠気に襲われる', '時々ある', '6', '2023-08-06 16:03:37+00', '6', '2023-08-06 16:03:37+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (268, 14, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 10, 'やる気が出ない', '時々ある', '6', '2023-08-06 16:03:37+00', '6', '2023-08-06 16:03:37+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (269, 14, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 11, 'へとへとだ(運動後を除く) ※へとへと(非常に疲れて体に力がなくなったさま)', '時々ある', '6', '2023-08-06 16:03:38+00', '6', '2023-08-06 16:03:38+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (270, 14, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 12, '朝、起きた時、ぐったりした 疲れを感じる', '時々ある', '6', '2023-08-06 16:03:39+00', '6', '2023-08-06 16:03:39+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (271, 13, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 1, 'イライラする', '時々ある', '7', '2023-08-06 16:08:56+00', '7', '2023-08-06 16:08:56+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (257, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 11, '勤務時間外でも仕事のことが気にかかって仕方がない', '時々ある', '6', '2023-08-06 15:50:35+00', '6', '2023-08-07 21:59:16+00', '2023-08-07 21:59:16+00', 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (283, 13, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 13, '以前とくらべて、疲れやすい', '時々ある', '7', '2023-08-06 16:09:41+00', '7', '2023-08-06 16:09:41+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (284, 13, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 14, '食欲がないと感じる', '時々ある', '7', '2023-08-06 16:09:42+00', '7', '2023-08-06 16:09:42+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (330, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 6, '体の調子が悪い', '時々ある', '2', '2023-08-09 23:41:44+00', '2', '2023-08-09 23:41:44+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (331, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 7, '物事に集中できない', '時々ある', '2', '2023-08-09 23:41:45+00', '2', '2023-08-09 23:41:45+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (332, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 8, 'することに間違いが多い', '時々ある', '2', '2023-08-09 23:41:45+00', '2', '2023-08-09 23:41:45+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (333, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 9, '仕事中、強い眠気に襲われる', '時々ある', '2', '2023-08-09 23:41:45+00', '2', '2023-08-09 23:41:45+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (334, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 10, 'やる気が出ない', '時々ある', '2', '2023-08-09 23:41:46+00', '2', '2023-08-09 23:41:46+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (335, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 11, 'へとへとだ(運動後を除く) ※へとへと(非常に疲れて体に力がなくなったさま)', '時々ある', '2', '2023-08-09 23:41:46+00', '2', '2023-08-09 23:41:46+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (336, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 12, '朝、起きた時、ぐったりした 疲れを感じる', '時々ある', '2', '2023-08-09 23:41:47+00', '2', '2023-08-09 23:41:47+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (337, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 13, '以前とくらべて、疲れやすい', '時々ある', '2', '2023-08-09 23:41:47+00', '2', '2023-08-09 23:41:47+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (338, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 14, '食欲がないと感じる', '時々ある', '2', '2023-08-09 23:41:47+00', '2', '2023-08-09 23:41:47+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (340, 14, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 13, '以前とくらべて、疲れやすい', '時々ある', '6', '2023-08-13 15:06:47+00', '6', '2023-08-13 15:06:47+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (341, 14, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 14, '食欲がないと感じる', '時々ある', '6', '2023-08-13 15:06:47+00', '6', '2023-08-13 15:06:47+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (517, 15, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 1, 'イライラする', 'ほとんどない', '8', '2023-08-28 10:06:19+00', '8', '2023-08-28 10:06:19+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (352, 14, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 11, '勤務時間外でも仕事のことが気にかかって仕方がない', '時々ある', '6', '2023-08-13 15:06:52+00', '6', '2023-08-13 15:06:52+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (393, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 12, '朝、起きた時、ぐったりした 疲れを感じる', '時々ある', '8', '2023-08-22 23:20:40+00', '8', '2023-08-22 23:22:16+00', '2023-08-22 23:22:16+00', 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (395, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 14, '食欲がないと感じる', '時々ある', '8', '2023-08-22 23:20:42+00', '8', '2023-08-22 23:22:16+00', '2023-08-22 23:22:16+00', 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (406, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 11, '勤務時間外でも仕事のことが気にかかって仕方がない', '時々ある', '8', '2023-08-22 23:20:52+00', '8', '2023-08-22 23:22:16+00', '2023-08-22 23:22:16+00', 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (348, 14, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 7, '仕事についての身体的負担 ※肉体的作業や寒冷・暑熱作業などの身体的な面での負担をいいます。', '大きい', '6', '2023-08-13 15:06:50+00', '6', '2023-08-13 15:06:50+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (349, 14, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 8, '職場・顧客などの人間関係による負担', '大きい', '6', '2023-08-13 15:06:51+00', '6', '2023-08-13 15:06:51+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (76, 4, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 8, '職場・顧客などの人間関係による負担', '非常に大きい', '2', '2023-07-23 17:00:33+00', '2', '2023-07-23 17:00:33+00', NULL, 3);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (415, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 7, '物事に集中できない', 'ほとんどない', '8', '2023-08-22 23:39:38+00', '8', '2023-08-23 19:12:04+00', '2023-08-23 19:12:04+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (419, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 11, 'へとへとだ(運動後を除く) ※へとへと(非常に疲れて体に力がなくなったさま)', 'ほとんどない', '8', '2023-08-22 23:41:21+00', '8', '2023-08-23 19:12:04+00', '2023-08-23 19:12:04+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (412, 15, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 4, 'ゆううつだ', '時々ある', '8', '2023-08-22 23:39:35+00', '8', '2023-08-23 19:12:04+00', '2023-08-23 19:12:04+00', 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (414, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 6, '体の調子が悪い', '時々ある', '8', '2023-08-22 23:39:37+00', '8', '2023-08-23 19:12:04+00', '2023-08-23 19:12:04+00', 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (500, 22, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 11, 'へとへとだ(運動後を除く) ※へとへと(非常に疲れて体に力がなくなったさま)', '時々ある', '10', '2023-08-23 23:15:08+00', '10', '2023-08-23 23:15:08+00', NULL, 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (437, 15, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 2, '不安だ', 'ほとんどない', '8', '2023-08-23 19:25:31+00', '8', '2023-08-28 10:06:14+00', '2023-08-28 10:06:14+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (438, 15, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 3, '落ち着かない', '時々ある', '8', '2023-08-23 19:25:37+00', '8', '2023-08-28 10:06:14+00', '2023-08-28 10:06:14+00', 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (439, 15, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 4, 'ゆううつだ', 'よくある', '8', '2023-08-23 19:25:40+00', '8', '2023-08-28 10:06:14+00', '2023-08-28 10:06:14+00', 3);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (440, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 5, 'よく眠れない', 'よくある', '8', '2023-08-23 19:25:45+00', '8', '2023-08-28 10:06:14+00', '2023-08-28 10:06:14+00', 3);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (441, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 6, '体の調子が悪い', 'ほとんどない', '8', '2023-08-23 19:25:48+00', '8', '2023-08-28 10:06:14+00', '2023-08-28 10:06:14+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (442, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 7, '物事に集中できない', '時々ある', '8', '2023-08-23 19:25:49+00', '8', '2023-08-28 10:06:14+00', '2023-08-28 10:06:14+00', 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (443, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 8, 'することに間違いが多い', '時々ある', '8', '2023-08-23 19:25:51+00', '8', '2023-08-28 10:06:14+00', '2023-08-28 10:06:14+00', 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (445, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 10, 'やる気が出ない', 'ほとんどない', '8', '2023-08-23 19:25:55+00', '8', '2023-08-28 10:06:14+00', '2023-08-28 10:06:14+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (446, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 11, 'へとへとだ(運動後を除く) ※へとへと(非常に疲れて体に力がなくなったさま)', '時々ある', '8', '2023-08-23 19:25:57+00', '8', '2023-08-28 10:06:14+00', '2023-08-28 10:06:14+00', 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (447, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 12, '朝、起きた時、ぐったりした 疲れを感じる', '時々ある', '8', '2023-08-23 19:26:04+00', '8', '2023-08-28 10:06:14+00', '2023-08-28 10:06:14+00', 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (448, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 13, '以前とくらべて、疲れやすい', 'ほとんどない', '8', '2023-08-23 19:26:04+00', '8', '2023-08-28 10:06:14+00', '2023-08-28 10:06:14+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (449, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 14, '食欲がないと感じる', 'よくある', '8', '2023-08-23 19:26:06+00', '8', '2023-08-28 10:06:14+00', '2023-08-28 10:06:14+00', 3);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (450, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 1, '1か月の時間外労働(時間外・休日労働時間を含む)', '適当', '8', '2023-08-23 19:28:02+00', '8', '2023-08-28 10:06:14+00', '2023-08-28 10:06:14+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (451, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 2, '不規則な勤務(予定の変更、突然の仕事)', '多い', '8', '2023-08-23 19:28:03+00', '8', '2023-08-28 10:06:14+00', '2023-08-28 10:06:14+00', 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (452, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 3, '出張に伴う負担(頻度・拘束時間・時差など)', 'ない又は適当', '8', '2023-08-23 19:28:04+00', '8', '2023-08-28 10:06:14+00', '2023-08-28 10:06:14+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (518, 15, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 2, '不安だ', 'ほとんどない', '8', '2023-08-28 10:06:20+00', '8', '2023-08-28 10:06:20+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (501, 22, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 12, '朝、起きた時、ぐったりした 疲れを感じる', 'よくある', '10', '2023-08-23 23:15:08+00', '10', '2023-08-23 23:15:08+00', NULL, 3);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (510, 22, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 7, '仕事についての身体的負担 ※肉体的作業や寒冷・暑熱作業などの身体的な面での負担をいいます。', '非常に大きい', '10', '2023-08-23 23:15:16+00', '10', '2023-08-23 23:15:16+00', NULL, 3);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (453, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 4, '深夜勤務に伴う負担 ※深夜勤務の頻度や時間数などから総合的に判断してください。 深夜勤務は、深夜時間帯(午後10時-午前5時)の一部または全部を含む勤務をいいます。', 'ない又は小さい', '8', '2023-08-23 19:28:05+00', '8', '2023-08-28 10:06:14+00', '2023-08-28 10:06:14+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (454, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 5, '休憩・仮眠の時間数及び施設', '適切である', '8', '2023-08-23 19:28:06+00', '8', '2023-08-28 10:06:14+00', '2023-08-28 10:06:14+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (455, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 6, '仕事についての精神的負担', '小さい', '8', '2023-08-23 19:28:08+00', '8', '2023-08-28 10:06:14+00', '2023-08-28 10:06:14+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (456, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 7, '仕事についての身体的負担 ※肉体的作業や寒冷・暑熱作業などの身体的な面での負担をいいます。', '小さい', '8', '2023-08-23 19:28:09+00', '8', '2023-08-28 10:06:14+00', '2023-08-28 10:06:14+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (457, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 8, '職場・顧客などの人間関係による負担', '小さい', '8', '2023-08-23 19:28:10+00', '8', '2023-08-28 10:06:14+00', '2023-08-28 10:06:14+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (458, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 9, '時間内に処理しきれない仕事', '多い', '8', '2023-08-23 19:28:11+00', '8', '2023-08-28 10:06:14+00', '2023-08-28 10:06:14+00', 1);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (459, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 10, '自分のペースでできない仕事', '非常に多い', '8', '2023-08-23 19:28:12+00', '8', '2023-08-28 10:06:14+00', '2023-08-28 10:06:14+00', 3);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (460, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 11, '勤務時間外でも仕事のことが気にかかって仕方がない', 'ほとんどない', '8', '2023-08-23 19:28:13+00', '8', '2023-08-28 10:06:14+00', '2023-08-28 10:06:14+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (461, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 12, '勤務日の睡眠時間', '十分', '8', '2023-08-23 19:28:14+00', '8', '2023-08-28 10:06:14+00', '2023-08-28 10:06:14+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (462, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 13, '終業時刻から次の始業時刻の間にある休息時間 ※これを勤務間インターバルといいます', '十分', '8', '2023-08-23 19:28:15+00', '8', '2023-08-28 10:06:14+00', '2023-08-28 10:06:14+00', 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (519, 15, 5, 0, '最近1ヶ月間の自覚症状について、各質問に対し最も 当てはまる項目を選択してください', 1, 3, '落ち着かない', 'ほとんどない', '8', '2023-08-28 10:06:20+00', '8', '2023-08-28 10:06:20+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (526, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 1, 10, 'やる気が出ない', 'ほとんどない', '8', '2023-08-28 10:06:25+00', '8', '2023-08-28 10:06:25+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (532, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 2, '不規則な勤務(予定の変更、突然の仕事)', '少ない', '8', '2023-08-28 10:06:29+00', '8', '2023-08-28 10:06:29+00', NULL, 0);
INSERT INTO "public"."t_question_answer" OVERRIDING SYSTEM VALUE VALUES (536, 15, 5, 0, '最近1ヶ月間の勤務状況について、各質問に対し最も 当てはまる項目を選択してください', 2, 6, '仕事についての精神的負担', '大きい', '8', '2023-08-28 10:06:32+00', '8', '2023-08-28 10:06:32+00', NULL, 1);
COMMIT;

-- ----------------------------
-- Table structure for t_report_general
-- ----------------------------
DROP TABLE IF EXISTS "public"."t_report_general";
CREATE TABLE "public"."t_report_general" (
  "id" int4 NOT NULL GENERATED ALWAYS AS IDENTITY (
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
),
  "reserve_issue_id" int4 NOT NULL,
  "report_status" varchar(1) COLLATE "pg_catalog"."default" NOT NULL DEFAULT 0,
  "hirou_situation" int4 NOT NULL,
  "kenko_situation" int4 NOT NULL,
  "kenko_situation_memo" varchar(100) COLLATE "pg_catalog"."default",
  "shindan_kbn" int4 NOT NULL,
  "shindan_kbn_memo" varchar(100) COLLATE "pg_catalog"."default",
  "syugyo_kbn" int4 NOT NULL,
  "syugyo_kbn2_naiyo_kbn" int4,
  "syugyo_kbn2_naiyo_memo" varchar(1000) COLLATE "pg_catalog"."default",
  "syugyo_kbn3_naiyo_kbn" int4,
  "syugyo_kbn3a_hour" int4,
  "syugyo_kbn3c_from_hour" int4,
  "syugyo_kbn3c_from_min" int4,
  "syugyo_kbn3c_to_hour" int4,
  "syugyo_kbn3c_to_min" int4,
  "syugyo_kbn4_naiyo_kbn" int4,
  "syugyo_kbn4_naiyo_memo" varchar(1000) COLLATE "pg_catalog"."default",
  "syochi_kikan" int4,
  "syochi_kikan_kbn" int4,
  "bikou" varchar(1000) COLLATE "pg_catalog"."default",
  "open_flg" varchar(1) COLLATE "pg_catalog"."default" NOT NULL DEFAULT 0,
  "regist_id" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamptz(6) NOT NULL,
  "update_id" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "updated_at" timestamptz(6) NOT NULL,
  "deleted_at" timestamptz(6)
)
;
ALTER TABLE "public"."t_report_general" OWNER TO "root";
COMMENT ON COLUMN "public"."t_report_general"."report_status" IS '1:完了';
COMMENT ON COLUMN "public"."t_report_general"."syochi_kikan_kbn" IS '0:日　1:週　2:月';
COMMENT ON COLUMN "public"."t_report_general"."open_flg" IS '1:参照済み';

-- ----------------------------
-- Records of t_report_general
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for t_report_hospital
-- ----------------------------
DROP TABLE IF EXISTS "public"."t_report_hospital";
CREATE TABLE "public"."t_report_hospital" (
  "id" int4 NOT NULL GENERATED ALWAYS AS IDENTITY (
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
),
  "reserve_issue_id" int4 NOT NULL,
  "report_status" varchar(1) COLLATE "pg_catalog"."default" NOT NULL DEFAULT 0,
  "work_situation" varchar(1000) COLLATE "pg_catalog"."default",
  "suimin_situation" int4 NOT NULL DEFAULT 0,
  "suimin_situation_memo" varchar(1000) COLLATE "pg_catalog"."default",
  "hirou_situation" int4 NOT NULL DEFAULT 0,
  "hirou_situation_memo" varchar(1000) COLLATE "pg_catalog"."default",
  "other_memo" varchar(1000) COLLATE "pg_catalog"."default",
  "syugyo_taisyo_fuyo_flg" varchar(1) COLLATE "pg_catalog"."default" NOT NULL DEFAULT 0,
  "shinshin_keizoku_flg" varchar(1) COLLATE "pg_catalog"."default" NOT NULL DEFAULT 0,
  "shinshin_keizoku_memo" varchar(1000) COLLATE "pg_catalog"."default",
  "shinshin_jushin_flg" varchar(1) COLLATE "pg_catalog"."default" NOT NULL DEFAULT 0,
  "shinshin_jushin_memo" varchar(1000) COLLATE "pg_catalog"."default",
  "shinshin_renkei_flg" varchar(1) COLLATE "pg_catalog"."default" NOT NULL DEFAULT 0,
  "shinshin_renkei_memo" varchar(1000) COLLATE "pg_catalog"."default",
  "shinshin_other_flg" varchar(1) COLLATE "pg_catalog"."default" NOT NULL DEFAULT 0,
  "shinshin_other_memo" varchar(1000) COLLATE "pg_catalog"."default",
  "kinmujokyo_1_flg" varchar(1) COLLATE "pg_catalog"."default" NOT NULL DEFAULT 0,
  "kinmujokyo_2_flg" varchar(1) COLLATE "pg_catalog"."default" NOT NULL DEFAULT 0,
  "kinmujokyo_other_flg" varchar(1) COLLATE "pg_catalog"."default" NOT NULL DEFAULT 0,
  "kinmujokyo_other_memo" varchar(1000) COLLATE "pg_catalog"."default",
  "tokki_memo" varchar(1000) COLLATE "pg_catalog"."default",
  "mensetsu_ishi_shozoku" varchar(100) COLLATE "pg_catalog"."default",
  "sangyoi_iken" varchar(1000) COLLATE "pg_catalog"."default",
  "iken_update_date" date,
  "iken_update_person_name" varchar(100) COLLATE "pg_catalog"."default",
  "sochi_naiyo" varchar(1000) COLLATE "pg_catalog"."default",
  "sochi_update_date" date,
  "iryokikan_name" varchar(100) COLLATE "pg_catalog"."default",
  "kanrisha_name" varchar(100) COLLATE "pg_catalog"."default",
  "jigyosha_name" varchar(100) COLLATE "pg_catalog"."default",
  "open_flg" varchar(1) COLLATE "pg_catalog"."default" NOT NULL DEFAULT 0,
  "regist_id" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamptz(6) NOT NULL,
  "update_id" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "updated_at" timestamptz(6) NOT NULL,
  "deleted_at" timestamptz(6)
)
;
ALTER TABLE "public"."t_report_hospital" OWNER TO "root";
COMMENT ON COLUMN "public"."t_report_hospital"."report_status" IS '1:完了';

-- ----------------------------
-- Records of t_report_hospital
-- ----------------------------
BEGIN;
INSERT INTO "public"."t_report_hospital" OVERRIDING SYSTEM VALUE VALUES (10, 15, '1', 'test2', 2, 'a', 3, 'memoeeeeeeeeee', NULL, '0', '1', 'test', '0', NULL, '0', NULL, '0', NULL, '1', '1', '1', 'a', NULL, NULL, NULL, '2023-07-22', NULL, NULL, '2023-07-22', NULL, NULL, NULL, '0', '5', '2023-07-21 02:26:09+00', '2', '2023-08-11 00:14:02+00', '2023-08-11 00:14:02+00');
INSERT INTO "public"."t_report_hospital" OVERRIDING SYSTEM VALUE VALUES (11, 15, '0', NULL, 0, NULL, 0, 'うつ症状の疑い (No.16)', NULL, '0', '0', NULL, '0', NULL, '0', NULL, '0', NULL, '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '5', '2023-08-12 01:53:30+00', '2', '2023-08-13 20:53:01+00', '2023-08-13 20:53:01+00');
INSERT INTO "public"."t_report_hospital" OVERRIDING SYSTEM VALUE VALUES (2, 4, '1', 'test2', 2, 'a', 2, 'high ...', NULL, '0', '1', '心身の状況への対処', '1', '心身の状況への対処', '1', 'shinshinJushinMemo', '1', '心身の状況への対処', '1', '1', '1', '心身の状況への', 'test', 'alooo', NULL, '2023-07-22', 'Tester', NULL, '2023-07-22', 'test', 'test', NULL, '0', '5', '2023-07-21 02:26:09+00', '5', '2023-08-23 17:01:52+00', NULL);
INSERT INTO "public"."t_report_hospital" OVERRIDING SYSTEM VALUE VALUES (12, 14, '1', 'ddd', 0, NULL, 0, NULL, '111', '1', '1', '1111111111', '1', '111111111', '1', NULL, '1', '1111111', '1', '1', '1', 'aaaaaaaaaaaaaaaaaa', 'bbbbbbbbbbb', 'ccccccccccc', NULL, '2023-07-22', 'Tester', NULL, '2023-07-22', 'test', 'test', NULL, '0', '2', '2023-08-13 18:54:38+00', '3', '2023-09-18 02:23:46+00', NULL);
COMMIT;

-- ----------------------------
-- Table structure for t_sangyoi_schedule
-- ----------------------------
DROP TABLE IF EXISTS "public"."t_sangyoi_schedule";
CREATE TABLE "public"."t_sangyoi_schedule" (
  "id" int4 NOT NULL GENERATED ALWAYS AS IDENTITY (
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
),
  "doctor_id" int4 NOT NULL,
  "schedule_date" date NOT NULL,
  "schedule_time_from" timetz(6) NOT NULL,
  "reserved_flg" char(1) COLLATE "pg_catalog"."default" NOT NULL DEFAULT 0,
  "regist_id" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamptz(6) NOT NULL,
  "update_id" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "updated_at" timestamptz(6) NOT NULL,
  "deleted_at" timestamptz(6)
)
;
ALTER TABLE "public"."t_sangyoi_schedule" OWNER TO "root";
COMMENT ON COLUMN "public"."t_sangyoi_schedule"."schedule_time_from" IS '開始～30分枠のスケジュールと扱う';

-- ----------------------------
-- Records of t_sangyoi_schedule
-- ----------------------------
BEGIN;
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (168, 2, '2023-08-30', '02:00:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-08-28 11:12:42+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (80, 2, '2023-09-19', '04:00:00+00', '0', '2', '2023-07-20 02:40:43+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (2, 2, '2023-07-27', '01:30:00+00', '0', '2', '2023-07-20 02:39:28+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (49, 2, '2023-08-29', '00:30:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-08-28 11:29:41+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (91, 2, '2023-10-03', '01:30:00+00', '0', '2', '2023-07-20 02:40:43+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (92, 2, '2023-10-03', '02:00:00+00', '0', '2', '2023-07-20 02:40:43+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (269, 2, '2023-07-22', '02:00:00+00', '0', '2', '2023-07-20 02:43:15+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (270, 2, '2023-07-22', '04:00:00+00', '0', '2', '2023-07-20 02:43:15+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (352, 2, '2023-08-19', '03:00:00+00', '0', '2', '2023-08-13 18:34:51+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (353, 2, '2023-08-19', '03:30:00+00', '0', '2', '2023-08-13 18:34:51+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (381, 2, '2023-08-25', '02:30:00+00', '1', '2', '2023-08-13 18:34:51+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (435, 2, '2023-08-20', '10:30:00+00', '0', '2', '2023-08-20 17:57:18+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (436, 2, '2023-08-20', '15:00:00+00', '0', '2', '2023-08-20 17:57:18+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (437, 2, '2023-08-20', '15:30:00+00', '0', '2', '2023-08-20 17:57:18+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (439, 2, '2023-08-20', '16:30:00+00', '0', '2', '2023-08-20 17:57:18+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (441, 2, '2023-08-20', '17:30:00+00', '0', '2', '2023-08-20 17:57:18+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (438, 2, '2023-08-20', '16:00:00+00', '0', '2', '2023-08-20 17:57:18+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (3, 2, '2023-07-26', '01:30:00+00', '0', '2', '2023-07-20 02:39:28+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (4, 2, '2023-07-24', '00:30:00+00', '0', '2', '2023-07-20 02:39:28+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (5, 2, '2023-07-24', '01:30:00+00', '0', '2', '2023-07-20 02:39:28+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (6, 2, '2023-07-24', '02:00:00+00', '0', '2', '2023-07-20 02:39:28+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (7, 2, '2023-07-24', '02:30:00+00', '0', '2', '2023-07-20 02:39:28+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (8, 2, '2023-07-23', '01:30:00+00', '0', '2', '2023-07-20 02:39:28+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (9, 2, '2023-07-25', '00:30:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (11, 2, '2023-07-25', '01:30:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (12, 2, '2023-07-25', '02:00:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (13, 2, '2023-07-25', '02:30:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (14, 2, '2023-07-25', '03:00:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (15, 2, '2023-07-25', '03:30:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (16, 2, '2023-07-25', '04:00:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (17, 2, '2023-08-01', '00:30:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (18, 2, '2023-08-01', '01:00:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (19, 2, '2023-08-01', '01:30:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (20, 2, '2023-08-01', '02:00:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (21, 2, '2023-08-01', '02:30:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (22, 2, '2023-08-01', '03:00:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (23, 2, '2023-08-01', '03:30:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (24, 2, '2023-08-01', '04:00:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (25, 2, '2023-08-08', '00:30:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (26, 2, '2023-08-08', '01:00:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (27, 2, '2023-08-08', '01:30:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (28, 2, '2023-08-08', '02:00:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (29, 2, '2023-08-08', '02:30:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (30, 2, '2023-08-08', '03:00:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (31, 2, '2023-08-08', '03:30:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (32, 2, '2023-08-08', '04:00:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (34, 2, '2023-08-15', '01:00:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (36, 2, '2023-08-15', '02:00:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (38, 2, '2023-08-15', '03:00:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (39, 2, '2023-08-15', '03:30:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (40, 2, '2023-08-15', '04:00:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (41, 2, '2023-08-22', '00:30:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (43, 2, '2023-08-22', '01:30:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (440, 2, '2023-08-20', '17:00:00+00', '0', '2', '2023-08-20 17:57:18+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (442, 2, '2023-08-21', '11:00:00+00', '0', '2', '2023-08-21 23:54:27+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (443, 2, '2023-08-21', '21:00:00+00', '0', '2', '2023-08-21 23:54:27+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (444, 2, '2023-08-21', '21:30:00+00', '0', '2', '2023-08-21 23:54:27+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (445, 2, '2023-08-21', '20:30:00+00', '0', '2', '2023-08-21 23:54:27+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (446, 2, '2023-08-21', '22:00:00+00', '0', '2', '2023-08-21 23:54:27+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (447, 2, '2023-08-21', '22:30:00+00', '1', '2', '2023-08-21 23:54:27+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (48, 2, '2023-08-22', '04:00:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (44, 2, '2023-08-22', '02:00:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (45, 2, '2023-08-22', '02:30:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (46, 2, '2023-08-22', '03:00:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (47, 2, '2023-08-22', '03:30:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (52, 2, '2023-08-29', '02:00:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (53, 2, '2023-08-29', '02:30:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (54, 2, '2023-08-29', '03:00:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (55, 2, '2023-08-29', '03:30:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (56, 2, '2023-08-29', '04:00:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (57, 2, '2023-09-05', '00:30:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (58, 2, '2023-09-05', '01:00:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (59, 2, '2023-09-05', '01:30:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (60, 2, '2023-09-05', '02:00:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (61, 2, '2023-09-05', '02:30:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (62, 2, '2023-09-05', '03:00:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (63, 2, '2023-09-05', '03:30:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (64, 2, '2023-09-05', '04:00:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (65, 2, '2023-09-12', '00:30:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (66, 2, '2023-09-12', '01:00:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (67, 2, '2023-09-12', '01:30:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (68, 2, '2023-09-12', '02:00:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (69, 2, '2023-09-12', '02:30:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (70, 2, '2023-09-12', '03:00:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (71, 2, '2023-09-12', '03:30:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (72, 2, '2023-09-12', '04:00:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (73, 2, '2023-09-19', '00:30:00+00', '0', '2', '2023-07-20 02:40:43+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (74, 2, '2023-09-19', '01:00:00+00', '0', '2', '2023-07-20 02:40:43+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (75, 2, '2023-09-19', '01:30:00+00', '0', '2', '2023-07-20 02:40:43+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (76, 2, '2023-09-19', '02:00:00+00', '0', '2', '2023-07-20 02:40:43+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (77, 2, '2023-09-19', '02:30:00+00', '0', '2', '2023-07-20 02:40:43+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (78, 2, '2023-09-19', '03:00:00+00', '0', '2', '2023-07-20 02:40:43+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (79, 2, '2023-09-19', '03:30:00+00', '0', '2', '2023-07-20 02:40:43+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (81, 2, '2023-09-26', '00:30:00+00', '0', '2', '2023-07-20 02:40:43+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (82, 2, '2023-09-26', '01:00:00+00', '0', '2', '2023-07-20 02:40:43+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (83, 2, '2023-09-26', '01:30:00+00', '0', '2', '2023-07-20 02:40:43+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (84, 2, '2023-09-26', '02:00:00+00', '0', '2', '2023-07-20 02:40:43+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (85, 2, '2023-09-26', '02:30:00+00', '0', '2', '2023-07-20 02:40:43+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (86, 2, '2023-09-26', '03:00:00+00', '0', '2', '2023-07-20 02:40:43+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (87, 2, '2023-09-26', '03:30:00+00', '0', '2', '2023-07-20 02:40:43+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (88, 2, '2023-09-26', '04:00:00+00', '0', '2', '2023-07-20 02:40:43+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (89, 2, '2023-10-03', '00:30:00+00', '0', '2', '2023-07-20 02:40:43+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (90, 2, '2023-10-03', '01:00:00+00', '0', '2', '2023-07-20 02:40:43+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (37, 2, '2023-08-15', '02:30:00+00', '1', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (35, 2, '2023-08-15', '01:30:00+00', '1', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (42, 2, '2023-08-22', '01:00:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (50, 2, '2023-08-29', '01:00:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (93, 2, '2023-10-03', '02:30:00+00', '0', '2', '2023-07-20 02:40:43+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (94, 2, '2023-10-03', '03:00:00+00', '0', '2', '2023-07-20 02:40:43+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (95, 2, '2023-10-03', '03:30:00+00', '0', '2', '2023-07-20 02:40:43+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (96, 2, '2023-10-03', '04:00:00+00', '0', '2', '2023-07-20 02:40:43+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (97, 2, '2023-10-10', '00:30:00+00', '0', '2', '2023-07-20 02:40:43+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (98, 2, '2023-10-10', '01:00:00+00', '0', '2', '2023-07-20 02:40:43+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (99, 2, '2023-10-10', '01:30:00+00', '0', '2', '2023-07-20 02:40:43+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (100, 2, '2023-10-10', '02:00:00+00', '0', '2', '2023-07-20 02:40:43+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (101, 2, '2023-10-10', '02:30:00+00', '0', '2', '2023-07-20 02:40:43+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (102, 2, '2023-10-10', '03:00:00+00', '0', '2', '2023-07-20 02:40:43+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (103, 2, '2023-10-10', '03:30:00+00', '0', '2', '2023-07-20 02:40:43+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (104, 2, '2023-10-10', '04:00:00+00', '0', '2', '2023-07-20 02:40:43+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (105, 2, '2023-10-17', '00:30:00+00', '0', '2', '2023-07-20 02:40:43+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (106, 2, '2023-10-17', '01:00:00+00', '0', '2', '2023-07-20 02:40:43+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (107, 2, '2023-10-17', '01:30:00+00', '0', '2', '2023-07-20 02:40:43+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (108, 2, '2023-10-17', '02:00:00+00', '0', '2', '2023-07-20 02:40:43+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (109, 2, '2023-10-17', '02:30:00+00', '0', '2', '2023-07-20 02:40:43+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (110, 2, '2023-10-17', '03:00:00+00', '0', '2', '2023-07-20 02:40:43+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (111, 2, '2023-10-17', '03:30:00+00', '0', '2', '2023-07-20 02:40:43+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (112, 2, '2023-10-17', '04:00:00+00', '0', '2', '2023-07-20 02:40:43+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (113, 2, '2023-07-26', '02:00:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (114, 2, '2023-07-26', '02:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (115, 2, '2023-07-26', '03:00:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (116, 2, '2023-07-26', '03:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (117, 2, '2023-07-26', '04:00:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (118, 2, '2023-07-26', '04:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (119, 2, '2023-07-26', '05:00:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (120, 2, '2023-07-26', '05:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (121, 2, '2023-07-26', '06:00:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (122, 2, '2023-07-26', '06:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (123, 2, '2023-08-02', '01:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (124, 2, '2023-08-02', '02:00:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (125, 2, '2023-08-02', '02:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (126, 2, '2023-08-02', '03:00:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (127, 2, '2023-08-02', '03:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (128, 2, '2023-08-02', '04:00:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (129, 2, '2023-08-02', '04:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (130, 2, '2023-08-02', '05:00:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (131, 2, '2023-08-02', '05:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (132, 2, '2023-08-02', '06:00:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (51, 2, '2023-08-29', '01:30:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-08-28 11:29:16+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (133, 2, '2023-08-02', '06:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (135, 2, '2023-08-09', '02:00:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (136, 2, '2023-08-09', '02:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (137, 2, '2023-08-09', '03:00:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (138, 2, '2023-08-09', '03:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (139, 2, '2023-08-09', '04:00:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (140, 2, '2023-08-09', '04:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (141, 2, '2023-08-09', '05:00:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (142, 2, '2023-08-09', '05:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (143, 2, '2023-08-09', '06:00:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (144, 2, '2023-08-09', '06:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (146, 2, '2023-08-16', '02:00:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (148, 2, '2023-08-16', '03:00:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (149, 2, '2023-08-16', '03:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (151, 2, '2023-08-16', '04:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (153, 2, '2023-08-16', '05:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (154, 2, '2023-08-16', '06:00:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (155, 2, '2023-08-16', '06:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (156, 2, '2023-08-23', '01:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (158, 2, '2023-08-23', '02:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (160, 2, '2023-08-23', '03:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (161, 2, '2023-08-23', '04:00:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (162, 2, '2023-08-23', '04:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (164, 2, '2023-08-23', '05:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (165, 2, '2023-08-23', '06:00:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (166, 2, '2023-08-23', '06:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (169, 2, '2023-08-30', '02:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (170, 2, '2023-08-30', '03:00:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (171, 2, '2023-08-30', '03:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (172, 2, '2023-08-30', '04:00:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (173, 2, '2023-08-30', '04:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (174, 2, '2023-08-30', '05:00:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (175, 2, '2023-08-30', '05:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (176, 2, '2023-08-30', '06:00:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (177, 2, '2023-08-30', '06:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (178, 2, '2023-09-06', '01:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (150, 2, '2023-08-16', '04:00:00+00', '1', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (163, 2, '2023-08-23', '05:00:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (145, 2, '2023-08-16', '01:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (157, 2, '2023-08-23', '02:00:00+00', '1', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (152, 2, '2023-08-16', '05:00:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (159, 2, '2023-08-23', '03:00:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (179, 2, '2023-09-06', '02:00:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (180, 2, '2023-09-06', '02:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (181, 2, '2023-09-06', '03:00:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (182, 2, '2023-09-06', '03:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (183, 2, '2023-09-06', '04:00:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (184, 2, '2023-09-06', '04:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (185, 2, '2023-09-06', '05:00:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (186, 2, '2023-09-06', '05:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (187, 2, '2023-09-06', '06:00:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (188, 2, '2023-09-06', '06:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (189, 2, '2023-09-13', '01:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (190, 2, '2023-09-13', '02:00:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (191, 2, '2023-09-13', '02:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (192, 2, '2023-09-13', '03:00:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (193, 2, '2023-09-13', '03:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (194, 2, '2023-09-13', '04:00:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (195, 2, '2023-09-13', '04:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (196, 2, '2023-09-13', '05:00:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (197, 2, '2023-09-13', '05:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (198, 2, '2023-09-13', '06:00:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (199, 2, '2023-09-13', '06:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (200, 2, '2023-09-20', '01:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (201, 2, '2023-09-20', '02:00:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (202, 2, '2023-09-20', '02:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (203, 2, '2023-09-20', '03:00:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (204, 2, '2023-09-20', '03:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (205, 2, '2023-09-20', '04:00:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (206, 2, '2023-09-20', '04:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (207, 2, '2023-09-20', '05:00:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (208, 2, '2023-09-20', '05:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (209, 2, '2023-09-20', '06:00:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (210, 2, '2023-09-20', '06:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (211, 2, '2023-09-27', '01:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (212, 2, '2023-09-27', '02:00:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (213, 2, '2023-09-27', '02:30:00+00', '0', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (214, 2, '2023-09-27', '03:00:00+00', '0', '2', '2023-07-20 02:41:11+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (215, 2, '2023-09-27', '03:30:00+00', '0', '2', '2023-07-20 02:41:11+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (216, 2, '2023-09-27', '04:00:00+00', '0', '2', '2023-07-20 02:41:11+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (217, 2, '2023-09-27', '04:30:00+00', '0', '2', '2023-07-20 02:41:11+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (218, 2, '2023-09-27', '05:00:00+00', '0', '2', '2023-07-20 02:41:11+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (219, 2, '2023-09-27', '05:30:00+00', '0', '2', '2023-07-20 02:41:11+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (220, 2, '2023-09-27', '06:00:00+00', '0', '2', '2023-07-20 02:41:11+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (221, 2, '2023-09-27', '06:30:00+00', '0', '2', '2023-07-20 02:41:11+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (222, 2, '2023-10-04', '01:30:00+00', '0', '2', '2023-07-20 02:41:11+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (167, 2, '2023-08-30', '01:30:00+00', '1', '2', '2023-07-20 02:41:10+00', '2', '2023-08-28 11:29:41+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (223, 2, '2023-10-04', '02:00:00+00', '0', '2', '2023-07-20 02:41:11+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (224, 2, '2023-10-04', '02:30:00+00', '0', '2', '2023-07-20 02:41:11+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (225, 2, '2023-10-04', '03:00:00+00', '0', '2', '2023-07-20 02:41:11+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (226, 2, '2023-10-04', '03:30:00+00', '0', '2', '2023-07-20 02:41:11+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (227, 2, '2023-10-04', '04:00:00+00', '0', '2', '2023-07-20 02:41:11+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (228, 2, '2023-10-04', '04:30:00+00', '0', '2', '2023-07-20 02:41:11+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (229, 2, '2023-10-04', '05:00:00+00', '0', '2', '2023-07-20 02:41:11+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (230, 2, '2023-10-04', '05:30:00+00', '0', '2', '2023-07-20 02:41:11+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (231, 2, '2023-10-04', '06:00:00+00', '0', '2', '2023-07-20 02:41:11+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (232, 2, '2023-10-04', '06:30:00+00', '0', '2', '2023-07-20 02:41:11+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (233, 2, '2023-10-11', '01:30:00+00', '0', '2', '2023-07-20 02:41:11+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (234, 2, '2023-10-11', '02:00:00+00', '0', '2', '2023-07-20 02:41:11+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (235, 2, '2023-10-11', '02:30:00+00', '0', '2', '2023-07-20 02:41:11+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (236, 2, '2023-10-11', '03:00:00+00', '0', '2', '2023-07-20 02:41:11+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (237, 2, '2023-10-11', '03:30:00+00', '0', '2', '2023-07-20 02:41:11+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (238, 2, '2023-10-11', '04:00:00+00', '0', '2', '2023-07-20 02:41:11+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (239, 2, '2023-10-11', '04:30:00+00', '0', '2', '2023-07-20 02:41:11+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (240, 2, '2023-10-11', '05:00:00+00', '0', '2', '2023-07-20 02:41:11+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (241, 2, '2023-10-11', '05:30:00+00', '0', '2', '2023-07-20 02:41:11+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (242, 2, '2023-10-11', '06:00:00+00', '0', '2', '2023-07-20 02:41:11+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (243, 2, '2023-10-11', '06:30:00+00', '0', '2', '2023-07-20 02:41:11+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (244, 2, '2023-10-18', '01:30:00+00', '0', '2', '2023-07-20 02:41:11+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (245, 2, '2023-10-18', '02:00:00+00', '0', '2', '2023-07-20 02:41:11+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (246, 2, '2023-10-18', '02:30:00+00', '0', '2', '2023-07-20 02:41:11+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (247, 2, '2023-10-18', '03:00:00+00', '0', '2', '2023-07-20 02:41:11+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (248, 2, '2023-10-18', '03:30:00+00', '0', '2', '2023-07-20 02:41:11+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (249, 2, '2023-10-18', '04:00:00+00', '0', '2', '2023-07-20 02:41:11+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (250, 2, '2023-10-18', '04:30:00+00', '0', '2', '2023-07-20 02:41:11+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (251, 2, '2023-10-18', '05:00:00+00', '0', '2', '2023-07-20 02:41:11+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (252, 2, '2023-10-18', '05:30:00+00', '0', '2', '2023-07-20 02:41:11+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (253, 2, '2023-10-18', '06:00:00+00', '0', '2', '2023-07-20 02:41:11+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (254, 2, '2023-10-18', '06:30:00+00', '0', '2', '2023-07-20 02:41:11+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (255, 2, '2023-07-18', '01:30:00+00', '0', '2', '2023-07-20 02:41:34+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (256, 2, '2023-07-18', '02:00:00+00', '0', '2', '2023-07-20 02:41:34+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (257, 2, '2023-07-19', '01:30:00+00', '0', '2', '2023-07-20 02:41:34+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (258, 2, '2023-07-19', '02:00:00+00', '0', '2', '2023-07-20 02:41:34+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (259, 2, '2023-07-16', '01:00:00+00', '0', '2', '2023-07-20 02:41:34+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (260, 2, '2023-07-16', '02:30:00+00', '0', '2', '2023-07-20 02:41:34+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (261, 2, '2023-07-16', '01:30:00+00', '0', '2', '2023-07-20 02:41:34+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (262, 2, '2023-07-16', '02:00:00+00', '0', '2', '2023-07-20 02:41:34+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (263, 2, '2023-07-17', '03:00:00+00', '0', '2', '2023-07-20 02:41:34+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (264, 2, '2023-07-17', '01:30:00+00', '0', '2', '2023-07-20 02:41:34+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (265, 2, '2023-07-17', '02:00:00+00', '0', '2', '2023-07-20 02:41:34+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (266, 2, '2023-07-22', '00:00:00+00', '0', '2', '2023-07-20 02:43:15+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (271, 2, '2023-07-22', '02:30:00+00', '0', '2', '2023-07-20 02:43:15+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (272, 2, '2023-07-22', '03:00:00+00', '0', '2', '2023-07-20 02:43:15+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (273, 2, '2023-07-22', '03:30:00+00', '0', '2', '2023-07-20 02:43:15+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (276, 2, '2023-07-21', '02:30:00+00', '0', '2', '2023-07-20 02:43:15+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (277, 2, '2023-07-21', '03:00:00+00', '0', '2', '2023-07-20 02:43:15+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (278, 2, '2023-07-21', '00:30:00+00', '0', '2', '2023-07-20 02:43:15+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (279, 2, '2023-07-21', '01:30:00+00', '0', '2', '2023-07-20 02:43:15+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (280, 2, '2023-07-21', '02:00:00+00', '0', '2', '2023-07-20 02:43:15+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (281, 2, '2023-07-20', '00:30:00+00', '0', '2', '2023-07-20 02:43:15+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (282, 2, '2023-07-20', '01:30:00+00', '0', '2', '2023-07-20 02:43:15+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (283, 2, '2023-07-20', '02:00:00+00', '0', '2', '2023-07-20 02:43:15+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (284, 2, '2023-07-20', '01:00:00+00', '0', '2', '2023-07-20 02:43:15+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (285, 2, '2023-07-20', '03:00:00+00', '0', '2', '2023-07-20 02:43:15+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (286, 2, '2023-07-20', '02:30:00+00', '0', '2', '2023-07-20 02:43:15+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (287, 3, '2023-07-29', '02:00:00+00', '0', '3', '2023-07-20 03:09:17+00', '3', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (288, 3, '2023-07-29', '04:00:00+00', '0', '3', '2023-07-20 03:09:17+00', '3', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (289, 3, '2023-07-29', '00:30:00+00', '0', '3', '2023-07-20 03:09:17+00', '3', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (290, 3, '2023-07-29', '01:00:00+00', '0', '3', '2023-07-20 03:09:17+00', '3', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (291, 3, '2023-07-29', '21:30:00+00', '0', '3', '2023-07-20 03:09:17+00', '3', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (292, 3, '2023-07-29', '23:30:00+00', '0', '3', '2023-07-20 03:09:17+00', '3', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (293, 3, '2023-07-22', '00:30:00+00', '0', '3', '2023-07-20 03:09:17+00', '3', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (295, 3, '2023-07-22', '01:30:00+00', '0', '3', '2023-07-20 03:09:17+00', '3', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (296, 3, '2023-07-22', '02:00:00+00', '0', '3', '2023-07-20 03:09:17+00', '3', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (297, 3, '2023-07-22', '02:30:00+00', '0', '3', '2023-07-20 03:09:17+00', '3', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (298, 3, '2023-07-22', '03:00:00+00', '0', '3', '2023-07-20 03:09:17+00', '3', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (299, 3, '2023-07-22', '03:30:00+00', '0', '3', '2023-07-20 03:09:17+00', '3', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (300, 3, '2023-07-22', '18:30:00+00', '0', '3', '2023-07-20 03:09:17+00', '3', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (301, 3, '2023-07-24', '02:00:00+00', '0', '3', '2023-07-20 03:09:17+00', '3', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (302, 3, '2023-07-24', '01:00:00+00', '0', '3', '2023-07-20 03:09:17+00', '3', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (303, 3, '2023-07-24', '21:30:00+00', '0', '3', '2023-07-20 03:09:17+00', '3', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (304, 3, '2023-07-24', '18:30:00+00', '0', '3', '2023-07-20 03:09:17+00', '3', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (305, 3, '2023-07-26', '02:00:00+00', '0', '3', '2023-07-20 03:09:17+00', '3', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (306, 3, '2023-07-26', '01:30:00+00', '0', '3', '2023-07-20 03:09:17+00', '3', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (308, 3, '2023-07-26', '20:30:00+00', '0', '3', '2023-07-20 03:09:17+00', '3', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (309, 3, '2023-07-26', '23:30:00+00', '0', '3', '2023-07-20 03:09:17+00', '3', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (310, 3, '2023-07-26', '18:30:00+00', '0', '3', '2023-07-20 03:09:17+00', '3', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (312, 3, '2023-07-25', '23:00:00+00', '0', '3', '2023-07-20 03:09:17+00', '3', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (313, 3, '2023-07-25', '18:30:00+00', '0', '3', '2023-07-20 03:09:17+00', '3', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (314, 3, '2023-07-21', '01:30:00+00', '0', '3', '2023-07-20 03:09:17+00', '3', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (315, 3, '2023-07-21', '00:30:00+00', '0', '3', '2023-07-20 03:09:17+00', '3', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (316, 3, '2023-07-21', '01:00:00+00', '0', '3', '2023-07-20 03:09:17+00', '3', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (317, 3, '2023-07-21', '02:00:00+00', '0', '3', '2023-07-20 03:09:17+00', '3', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (318, 3, '2023-07-21', '02:30:00+00', '0', '3', '2023-07-20 03:09:17+00', '3', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (319, 3, '2023-07-21', '03:00:00+00', '0', '3', '2023-07-20 03:09:17+00', '3', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (320, 3, '2023-07-21', '03:30:00+00', '0', '3', '2023-07-20 03:09:17+00', '3', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (321, 3, '2023-07-21', '21:00:00+00', '0', '3', '2023-07-20 03:09:17+00', '3', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (322, 3, '2023-07-28', '04:00:00+00', '0', '3', '2023-07-20 03:09:17+00', '3', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (324, 3, '2023-07-28', '23:30:00+00', '0', '3', '2023-07-20 03:09:17+00', '3', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (326, 3, '2023-07-31', '02:30:00+00', '0', '3', '2023-07-20 03:09:17+00', '3', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (327, 3, '2023-07-31', '01:00:00+00', '0', '3', '2023-07-20 03:09:17+00', '3', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (328, 3, '2023-07-31', '23:30:00+00', '0', '3', '2023-07-20 03:09:17+00', '3', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (329, 3, '2023-08-01', '23:30:00+00', '0', '3', '2023-07-20 03:09:17+00', '3', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (330, 3, '2023-08-02', '23:30:00+00', '0', '3', '2023-07-20 03:09:17+00', '3', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (274, 2, '2023-07-21', '00:00:00+00', '1', '2', '2023-07-20 02:43:15+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (294, 3, '2023-07-22', '01:00:00+00', '0', '3', '2023-07-20 03:09:17+00', '3', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (267, 2, '2023-07-22', '00:30:00+00', '0', '2', '2023-07-20 02:43:15+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (10, 2, '2023-07-25', '01:00:00+00', '0', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (275, 2, '2023-07-21', '01:00:00+00', '1', '2', '2023-07-20 02:43:15+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (268, 2, '2023-07-22', '01:00:00+00', '1', '2', '2023-07-20 02:43:15+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (335, 2, '2023-08-10', '02:00:00+00', '0', '2', '2023-08-10 23:12:13+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (331, 3, '2023-07-23', '00:00:00+00', '0', '3', '2023-07-23 17:08:39+00', '3', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (311, 3, '2023-07-25', '00:30:00+00', '0', '3', '2023-07-20 03:09:17+00', '3', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (340, 2, '2023-08-18', '01:30:00+00', '0', '2', '2023-08-13 18:34:51+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (325, 3, '2023-07-30', '03:00:00+00', '0', '3', '2023-07-20 03:09:17+00', '3', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (332, 3, '2023-07-23', '03:00:00+00', '1', '3', '2023-07-23 17:08:39+00', '3', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (334, 2, '2023-08-10', '01:30:00+00', '1', '2', '2023-08-10 23:12:13+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (307, 3, '2023-07-26', '01:00:00+00', '0', '3', '2023-07-20 03:09:17+00', '3', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (323, 3, '2023-07-28', '01:00:00+00', '1', '3', '2023-07-20 03:09:17+00', '3', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (33, 2, '2023-08-15', '00:30:00+00', '1', '2', '2023-07-20 02:40:42+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (134, 2, '2023-08-09', '01:30:00+00', '1', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (337, 2, '2023-08-17', '01:00:00+00', '0', '2', '2023-08-13 15:02:01+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (338, 2, '2023-08-17', '02:00:00+00', '0', '2', '2023-08-13 15:02:01+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (341, 2, '2023-08-18', '02:30:00+00', '0', '2', '2023-08-13 18:34:51+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (336, 2, '2023-08-17', '01:30:00+00', '1', '2', '2023-08-13 15:02:01+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (345, 2, '2023-08-18', '04:00:00+00', '0', '2', '2023-08-13 18:34:51+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (346, 2, '2023-08-18', '05:00:00+00', '0', '2', '2023-08-13 18:34:51+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (347, 2, '2023-08-18', '04:30:00+00', '0', '2', '2023-08-13 18:34:51+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (348, 2, '2023-08-19', '01:00:00+00', '0', '2', '2023-08-13 18:34:51+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (350, 2, '2023-08-19', '02:00:00+00', '0', '2', '2023-08-13 18:34:51+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (351, 2, '2023-08-19', '02:30:00+00', '0', '2', '2023-08-13 18:34:51+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (343, 2, '2023-08-18', '03:00:00+00', '0', '2', '2023-08-13 18:34:51+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (147, 2, '2023-08-16', '02:30:00+00', '1', '2', '2023-07-20 02:41:10+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (339, 2, '2023-08-18', '01:00:00+00', '1', '2', '2023-08-13 18:34:51+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (349, 2, '2023-08-19', '01:30:00+00', '0', '2', '2023-08-13 18:34:51+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (354, 2, '2023-08-19', '04:00:00+00', '0', '2', '2023-08-13 18:34:51+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (355, 2, '2023-08-19', '04:30:00+00', '0', '2', '2023-08-13 18:34:51+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (356, 2, '2023-08-19', '05:00:00+00', '0', '2', '2023-08-13 18:34:51+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (357, 2, '2023-08-21', '01:30:00+00', '0', '2', '2023-08-13 18:34:51+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (358, 2, '2023-08-21', '02:00:00+00', '0', '2', '2023-08-13 18:34:51+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (359, 2, '2023-08-21', '04:00:00+00', '0', '2', '2023-08-13 18:34:51+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (361, 2, '2023-08-17', '02:30:00+00', '0', '2', '2023-08-13 18:34:51+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (362, 2, '2023-08-17', '03:30:00+00', '0', '2', '2023-08-13 18:34:51+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (363, 2, '2023-08-17', '04:00:00+00', '0', '2', '2023-08-13 18:34:51+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (365, 2, '2023-08-17', '05:00:00+00', '0', '2', '2023-08-13 18:34:51+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (366, 2, '2023-08-17', '05:30:00+00', '0', '2', '2023-08-13 18:34:51+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (367, 2, '2023-08-20', '04:00:00+00', '0', '2', '2023-08-13 18:34:51+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (368, 2, '2023-08-20', '03:30:00+00', '0', '2', '2023-08-13 18:34:51+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (369, 2, '2023-08-20', '03:00:00+00', '0', '2', '2023-08-13 18:34:51+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (370, 2, '2023-08-20', '02:30:00+00', '0', '2', '2023-08-13 18:34:51+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (371, 2, '2023-08-20', '02:00:00+00', '0', '2', '2023-08-13 18:34:51+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (374, 2, '2023-08-20', '04:30:00+00', '0', '2', '2023-08-13 18:34:51+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (375, 2, '2023-08-20', '05:00:00+00', '0', '2', '2023-08-13 18:34:51+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (376, 2, '2023-08-24', '02:00:00+00', '0', '2', '2023-08-13 18:34:51+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (378, 2, '2023-08-24', '03:00:00+00', '0', '2', '2023-08-13 18:34:51+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (379, 2, '2023-08-24', '03:30:00+00', '0', '2', '2023-08-13 18:34:51+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (382, 2, '2023-08-25', '03:00:00+00', '0', '2', '2023-08-13 18:34:51+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (342, 2, '2023-08-18', '02:00:00+00', '1', '2', '2023-08-13 18:34:51+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (360, 2, '2023-08-17', '03:00:00+00', '1', '2', '2023-08-13 18:34:51+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (344, 2, '2023-08-18', '03:30:00+00', '1', '2', '2023-08-13 18:34:51+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (364, 2, '2023-08-17', '04:30:00+00', '1', '2', '2023-08-13 18:34:51+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (384, 15, '2023-08-19', '00:00:00+00', '0', '15', '2023-08-19 10:56:03+00', '15', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (385, 15, '2023-08-19', '00:30:00+00', '0', '15', '2023-08-19 10:56:03+00', '15', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (386, 15, '2023-08-19', '01:00:00+00', '0', '15', '2023-08-19 10:56:03+00', '15', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (387, 15, '2023-08-19', '01:30:00+00', '0', '15', '2023-08-19 10:56:03+00', '15', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (388, 15, '2023-08-19', '02:30:00+00', '0', '15', '2023-08-19 10:56:03+00', '15', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (389, 15, '2023-08-19', '03:00:00+00', '0', '15', '2023-08-19 10:56:03+00', '15', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (390, 15, '2023-08-19', '02:00:00+00', '0', '15', '2023-08-19 10:56:03+00', '15', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (391, 15, '2023-08-19', '03:30:00+00', '0', '15', '2023-08-19 10:56:03+00', '15', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (392, 15, '2023-08-19', '04:00:00+00', '0', '15', '2023-08-19 10:56:03+00', '15', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (393, 15, '2023-08-19', '04:30:00+00', '0', '15', '2023-08-19 10:56:03+00', '15', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (394, 15, '2023-08-19', '05:00:00+00', '0', '15', '2023-08-19 10:56:03+00', '15', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (395, 15, '2023-08-19', '05:30:00+00', '0', '15', '2023-08-19 10:56:03+00', '15', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (396, 15, '2023-08-19', '06:00:00+00', '0', '15', '2023-08-19 10:56:03+00', '15', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (397, 15, '2023-08-19', '06:30:00+00', '0', '15', '2023-08-19 10:56:03+00', '15', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (398, 15, '2023-08-19', '07:00:00+00', '0', '15', '2023-08-19 10:56:03+00', '15', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (399, 15, '2023-08-19', '07:30:00+00', '0', '15', '2023-08-19 10:56:03+00', '15', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (400, 15, '2023-08-19', '08:00:00+00', '0', '15', '2023-08-19 10:56:03+00', '15', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (401, 15, '2023-08-19', '08:30:00+00', '0', '15', '2023-08-19 10:56:03+00', '15', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (402, 15, '2023-08-19', '09:00:00+00', '0', '15', '2023-08-19 10:56:03+00', '15', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (403, 15, '2023-08-19', '09:30:00+00', '0', '15', '2023-08-19 10:56:03+00', '15', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (404, 15, '2023-08-19', '10:00:00+00', '0', '15', '2023-08-19 10:56:03+00', '15', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (405, 15, '2023-08-19', '10:30:00+00', '0', '15', '2023-08-19 10:56:03+00', '15', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (406, 15, '2023-08-19', '11:00:00+00', '0', '15', '2023-08-19 10:56:03+00', '15', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (407, 15, '2023-08-19', '11:30:00+00', '0', '15', '2023-08-19 10:56:03+00', '15', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (408, 15, '2023-08-19', '12:30:00+00', '0', '15', '2023-08-19 10:56:03+00', '15', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (409, 15, '2023-08-19', '12:00:00+00', '0', '15', '2023-08-19 10:56:03+00', '15', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (410, 15, '2023-08-19', '18:00:00+00', '0', '15', '2023-08-19 10:56:03+00', '15', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (411, 15, '2023-08-19', '17:30:00+00', '0', '15', '2023-08-19 10:56:03+00', '15', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (412, 15, '2023-08-19', '17:00:00+00', '0', '15', '2023-08-19 10:56:03+00', '15', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (413, 15, '2023-08-19', '16:30:00+00', '0', '15', '2023-08-19 10:56:03+00', '15', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (414, 15, '2023-08-19', '15:30:00+00', '0', '15', '2023-08-19 10:56:03+00', '15', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (415, 15, '2023-08-19', '13:00:00+00', '0', '15', '2023-08-19 10:56:03+00', '15', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (416, 15, '2023-08-19', '13:30:00+00', '0', '15', '2023-08-19 10:56:03+00', '15', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (417, 15, '2023-08-19', '19:30:00+00', '0', '15', '2023-08-19 10:56:17+00', '15', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (418, 15, '2023-08-19', '19:00:00+00', '0', '15', '2023-08-19 10:56:17+00', '15', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (419, 15, '2023-08-19', '18:30:00+00', '0', '15', '2023-08-19 10:56:17+00', '15', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (373, 2, '2023-08-20', '01:00:00+00', '0', '2', '2023-08-13 18:34:51+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (423, 2, '2023-08-19', '00:30:00+00', '0', '2', '2023-08-19 23:58:18+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (424, 2, '2023-08-19', '00:00:00+00', '0', '2', '2023-08-19 23:58:18+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (425, 2, '2023-08-19', '21:30:00+00', '0', '2', '2023-08-19 23:58:40+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (426, 2, '2023-08-19', '21:00:00+00', '0', '2', '2023-08-19 23:58:40+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (427, 2, '2023-08-19', '20:30:00+00', '0', '2', '2023-08-19 23:58:40+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (428, 2, '2023-08-19', '22:00:00+00', '0', '2', '2023-08-19 23:58:40+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (429, 2, '2023-08-19', '22:30:00+00', '0', '2', '2023-08-19 23:58:40+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (383, 2, '2023-08-25', '03:30:00+00', '1', '2', '2023-08-13 18:34:51+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (372, 2, '2023-08-20', '01:30:00+00', '1', '2', '2023-08-13 18:34:51+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (430, 2, '2023-08-20', '23:30:00+00', '0', '2', '2023-08-20 01:56:37+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (431, 2, '2023-08-20', '23:00:00+00', '0', '2', '2023-08-20 01:56:37+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (432, 2, '2023-08-20', '22:30:00+00', '0', '2', '2023-08-20 01:56:37+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (433, 2, '2023-08-20', '00:00:00+00', '0', '2', '2023-08-20 02:55:20+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (434, 2, '2023-08-20', '00:30:00+00', '0', '2', '2023-08-20 02:55:20+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (377, 2, '2023-08-24', '02:30:00+00', '1', '2', '2023-08-13 18:34:51+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (420, 15, '2023-08-23', '00:00:00+00', '1', '15', '2023-08-19 11:38:04+00', '15', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (422, 15, '2023-08-25', '00:00:00+00', '0', '15', '2023-08-19 11:38:04+00', '15', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (380, 2, '2023-08-24', '04:00:00+00', '0', '2', '2023-08-13 18:34:51+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (449, 2, '2023-08-26', '02:30:00+00', '0', '2', '2023-08-23 16:49:56+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (450, 2, '2023-08-26', '04:30:00+00', '0', '2', '2023-08-23 16:49:56+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (451, 2, '2023-08-26', '05:30:00+00', '0', '2', '2023-08-23 16:49:56+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (453, 2, '2023-08-27', '05:30:00+00', '0', '2', '2023-08-23 16:49:56+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (454, 2, '2023-08-27', '04:30:00+00', '0', '2', '2023-08-23 16:49:56+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (455, 2, '2023-08-27', '06:00:00+00', '0', '2', '2023-08-23 16:49:56+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (452, 2, '2023-08-25', '01:00:00+00', '0', '2', '2023-08-23 16:49:56+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (456, 2, '2023-08-25', '07:00:00+00', '0', '2', '2023-08-23 22:40:40+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (457, 2, '2023-08-25', '06:30:00+00', '0', '2', '2023-08-23 22:40:40+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (458, 2, '2023-08-25', '06:00:00+00', '0', '2', '2023-08-23 22:40:40+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (459, 2, '2023-08-25', '07:30:00+00', '0', '2', '2023-08-23 22:40:40+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (460, 2, '2023-08-25', '08:00:00+00', '0', '2', '2023-08-23 22:40:40+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (461, 2, '2023-08-25', '08:30:00+00', '0', '2', '2023-08-23 22:40:40+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (463, 2, '2023-08-25', '09:30:00+00', '0', '2', '2023-08-23 22:40:40+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (464, 2, '2023-08-25', '10:00:00+00', '0', '2', '2023-08-23 22:40:40+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (465, 2, '2023-08-25', '20:00:00+00', '0', '2', '2023-08-23 22:43:54+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (466, 2, '2023-08-25', '20:30:00+00', '0', '2', '2023-08-23 22:43:54+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (467, 2, '2023-08-25', '21:00:00+00', '0', '2', '2023-08-23 22:43:54+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (468, 2, '2023-08-25', '21:30:00+00', '0', '2', '2023-08-23 22:43:54+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (462, 2, '2023-08-25', '09:00:00+00', '0', '2', '2023-08-23 22:40:40+00', '2', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (421, 15, '2023-08-24', '00:00:00+00', '0', '15', '2023-08-19 11:38:04+00', '15', '2023-07-20 02:39:28+00', NULL);
INSERT INTO "public"."t_sangyoi_schedule" OVERRIDING SYSTEM VALUE VALUES (448, 2, '2023-08-26', '01:00:00+00', '0', '2', '2023-08-23 16:49:56+00', '2', '2023-07-20 02:39:28+00', NULL);
COMMIT;

-- ----------------------------
-- Table structure for t_working_time
-- ----------------------------
DROP TABLE IF EXISTS "public"."t_working_time";
CREATE TABLE "public"."t_working_time" (
  "id" int4 NOT NULL GENERATED ALWAYS AS IDENTITY (
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
),
  "user_company_code" int4 NOT NULL,
  "client_id" int4 NOT NULL,
  "employee_number" varchar(5) COLLATE "pg_catalog"."default" NOT NULL,
  "year" varchar(4) COLLATE "pg_catalog"."default" NOT NULL,
  "month" varchar(2) COLLATE "pg_catalog"."default" NOT NULL,
  "overtime_bef_month" int4 NOT NULL,
  "overtime" int4 NOT NULL,
  "regist_id" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamptz(6) NOT NULL,
  "update_id" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "updated_at" timestamptz(6) NOT NULL,
  "deleted_at" timestamptz(6),
  "target_month" date
)
;
ALTER TABLE "public"."t_working_time" OWNER TO "root";

-- ----------------------------
-- Records of t_working_time
-- ----------------------------
BEGIN;
INSERT INTO "public"."t_working_time" OVERRIDING SYSTEM VALUE VALUES (2, 5, 2, '123', '2023', '7', 150, 150, '1', '2023-07-20 02:18:20+00', '1', '2023-07-20 02:18:20+00', NULL, '2023-07-01');
INSERT INTO "public"."t_working_time" OVERRIDING SYSTEM VALUE VALUES (6, 5, 11, 'YEN02', '2023', '8', 152, 152, '11', '2023-08-02 16:20:43+00', '11', '2023-08-02 16:20:43+00', NULL, '2023-08-01');
INSERT INTO "public"."t_working_time" OVERRIDING SYSTEM VALUE VALUES (7, 5, 11, 'YEN03', '2023', '8', 153, 153, '11', '2023-08-02 16:20:43+00', '11', '2023-08-02 16:20:43+00', NULL, '2023-08-01');
INSERT INTO "public"."t_working_time" OVERRIDING SYSTEM VALUE VALUES (8, 5, 11, 'YEN04', '2023', '8', 153, 153, '11', '2023-08-02 16:20:43+00', '11', '2023-08-02 16:20:43+00', NULL, '2023-08-01');
INSERT INTO "public"."t_working_time" OVERRIDING SYSTEM VALUE VALUES (5, 5, 11, 'YEN01', '2023', '8', 2, 150, '11', '2023-08-02 15:52:48+00', '11', '2023-08-20 17:52:57+00', NULL, '2023-08-01');
INSERT INTO "public"."t_working_time" OVERRIDING SYSTEM VALUE VALUES (9, 5, 11, 'YEN05', '2023', '8', 150, 150, '1', '2023-07-20 02:18:20+00', '1', '2023-07-20 02:18:20+00', NULL, '2023-08-01');
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS "public"."users";
CREATE TABLE "public"."users" (
  "id" int4 NOT NULL DEFAULT nextval('users_id_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "email" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "password" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "remember_token" varchar(100) COLLATE "pg_catalog"."default",
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;
ALTER TABLE "public"."users" OWNER TO "root";

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."m_client_employee_id_seq"
OWNED BY "public"."m_client_employee"."id";
SELECT setval('"public"."m_client_employee_id_seq"', 35, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."m_client_id_seq"
OWNED BY "public"."m_client"."id";
SELECT setval('"public"."m_client_id_seq"', 15, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."m_client_user_id_seq"
OWNED BY "public"."m_client_user"."id";
SELECT setval('"public"."m_client_user_id_seq"', 15, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."m_gensen_zeiritsu_id_seq"
OWNED BY "public"."m_gensen_zeiritsu"."id";
SELECT setval('"public"."m_gensen_zeiritsu_id_seq"', 2, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."m_maching_ng_id_seq"
OWNED BY "public"."m_maching_ng"."id";
SELECT setval('"public"."m_maching_ng_id_seq"', 35, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."m_questionnaire_id_seq"
OWNED BY "public"."m_questionnaire"."id";
SELECT setval('"public"."m_questionnaire_id_seq"', 30, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."m_sangyoi_id_seq"
OWNED BY "public"."m_sangyoi"."id";
SELECT setval('"public"."m_sangyoi_id_seq"', 63, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."m_user_company_id_seq"
OWNED BY "public"."m_user_company"."id";
SELECT setval('"public"."m_user_company_id_seq"', 6, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."m_user_id_seq"
OWNED BY "public"."m_user"."id";
SELECT setval('"public"."m_user_id_seq"', 13, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."migrations_id_seq"
OWNED BY "public"."migrations"."id";
SELECT setval('"public"."migrations_id_seq"', 4, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."personal_access_tokens_id_seq"
OWNED BY "public"."personal_access_tokens"."id";
SELECT setval('"public"."personal_access_tokens_id_seq"', 2, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."posts_id_seq"
OWNED BY "public"."posts"."id";
SELECT setval('"public"."posts_id_seq"', 2, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."t_certification_code_id_seq"
OWNED BY "public"."t_certification_code"."id";
SELECT setval('"public"."t_certification_code_id_seq"', 8, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."t_counseling_reserve_id_seq"
OWNED BY "public"."t_counseling_reserve"."id";
SELECT setval('"public"."t_counseling_reserve_id_seq"', 71, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."t_counseling_reserve_notice_id_seq"
OWNED BY "public"."t_counseling_reserve_notice"."id";
SELECT setval('"public"."t_counseling_reserve_notice_id_seq"', 24, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."t_kihoninf_general_id_seq"
OWNED BY "public"."t_kihoninf_general"."id";
SELECT setval('"public"."t_kihoninf_general_id_seq"', 2, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."t_kihoninf_hospital_id_seq"
OWNED BY "public"."t_kihoninf_hospital"."id";
SELECT setval('"public"."t_kihoninf_hospital_id_seq"', 23, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."t_question_answer_id_seq"
OWNED BY "public"."t_question_answer"."id";
SELECT setval('"public"."t_question_answer_id_seq"', 544, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."t_report_general_id_seq"
OWNED BY "public"."t_report_general"."id";
SELECT setval('"public"."t_report_general_id_seq"', 2, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."t_report_hospital_id_seq"
OWNED BY "public"."t_report_hospital"."id";
SELECT setval('"public"."t_report_hospital_id_seq"', 13, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."t_sangyoi_schedule_id_seq"
OWNED BY "public"."t_sangyoi_schedule"."id";
SELECT setval('"public"."t_sangyoi_schedule_id_seq"', 469, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."t_working_time_id_seq"
OWNED BY "public"."t_working_time"."id";
SELECT setval('"public"."t_working_time_id_seq"', 11, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."users_id_seq"
OWNED BY "public"."users"."id";
SELECT setval('"public"."users_id_seq"', 2, false);

-- ----------------------------
-- Primary Key structure for table m_client
-- ----------------------------
ALTER TABLE "public"."m_client" ADD CONSTRAINT "m_client_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Uniques structure for table m_client_employee
-- ----------------------------
ALTER TABLE "public"."m_client_employee" ADD CONSTRAINT "m_client_employee_user_company_id_client_id_employee_number_key" UNIQUE ("user_company_id", "client_id", "employee_number");

-- ----------------------------
-- Primary Key structure for table m_client_employee
-- ----------------------------
ALTER TABLE "public"."m_client_employee" ADD CONSTRAINT "m_client_employee_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table m_client_user
-- ----------------------------
ALTER TABLE "public"."m_client_user" ADD CONSTRAINT "m_client_user_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table m_gensen_zeiritsu
-- ----------------------------
ALTER TABLE "public"."m_gensen_zeiritsu" ADD CONSTRAINT "m_gensen_zeiritsu_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table m_maching_ng
-- ----------------------------
ALTER TABLE "public"."m_maching_ng" ADD CONSTRAINT "m_maching_ng_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Uniques structure for table m_questionnaire
-- ----------------------------
ALTER TABLE "public"."m_questionnaire" ADD CONSTRAINT "m_questionnaire_user_company_id_client_status_question_lev1_key" UNIQUE ("user_company_id", "client_status", "question_lev1_no", "question_lev2_no");

-- ----------------------------
-- Primary Key structure for table m_questionnaire
-- ----------------------------
ALTER TABLE "public"."m_questionnaire" ADD CONSTRAINT "m_questionnaire_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table m_sangyoi
-- ----------------------------
ALTER TABLE "public"."m_sangyoi" ADD CONSTRAINT "m_sangyoi_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table m_user
-- ----------------------------
ALTER TABLE "public"."m_user" ADD CONSTRAINT "m_user_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table m_user_company
-- ----------------------------
ALTER TABLE "public"."m_user_company" ADD CONSTRAINT "m_user_company_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table migrations
-- ----------------------------
ALTER TABLE "public"."migrations" ADD CONSTRAINT "migrations_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table personal_access_tokens
-- ----------------------------
CREATE INDEX "personal_access_tokens_tokenable_type_tokenable_id_index" ON "public"."personal_access_tokens" USING btree (
  "tokenable_type" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST,
  "tokenable_id" "pg_catalog"."int8_ops" ASC NULLS LAST
);

-- ----------------------------
-- Uniques structure for table personal_access_tokens
-- ----------------------------
ALTER TABLE "public"."personal_access_tokens" ADD CONSTRAINT "personal_access_tokens_token_unique" UNIQUE ("token");

-- ----------------------------
-- Primary Key structure for table personal_access_tokens
-- ----------------------------
ALTER TABLE "public"."personal_access_tokens" ADD CONSTRAINT "personal_access_tokens_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table posts
-- ----------------------------
ALTER TABLE "public"."posts" ADD CONSTRAINT "posts_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Uniques structure for table t_certification_code
-- ----------------------------
ALTER TABLE "public"."t_certification_code" ADD CONSTRAINT "t_certification_code_certification_code_key" UNIQUE ("certification_code");
ALTER TABLE "public"."t_certification_code" ADD CONSTRAINT "t_certification_code_sms_number_key" UNIQUE ("sms_number");

-- ----------------------------
-- Primary Key structure for table t_certification_code
-- ----------------------------
ALTER TABLE "public"."t_certification_code" ADD CONSTRAINT "t_certification_code_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_counseling_reserve
-- ----------------------------
ALTER TABLE "public"."t_counseling_reserve" ADD CONSTRAINT "t_counseling_reserve_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_counseling_reserve_notice
-- ----------------------------
ALTER TABLE "public"."t_counseling_reserve_notice" ADD CONSTRAINT "t_counseling_reserve_notice_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_kihoninf_general
-- ----------------------------
ALTER TABLE "public"."t_kihoninf_general" ADD CONSTRAINT "t_kihoninf_general_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_kihoninf_hospital
-- ----------------------------
ALTER TABLE "public"."t_kihoninf_hospital" ADD CONSTRAINT "t_kihoninf_hospital_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_question_answer
-- ----------------------------
ALTER TABLE "public"."t_question_answer" ADD CONSTRAINT "t_question_answer_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_report_general
-- ----------------------------
ALTER TABLE "public"."t_report_general" ADD CONSTRAINT "t_report_general_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_report_hospital
-- ----------------------------
ALTER TABLE "public"."t_report_hospital" ADD CONSTRAINT "t_report_hospital_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_sangyoi_schedule
-- ----------------------------
ALTER TABLE "public"."t_sangyoi_schedule" ADD CONSTRAINT "t_sangyoi_schedule_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_working_time
-- ----------------------------
ALTER TABLE "public"."t_working_time" ADD CONSTRAINT "t_working_time_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Uniques structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "users_email_unique" UNIQUE ("email");

-- ----------------------------
-- Primary Key structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "users_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Foreign Keys structure for table m_client
-- ----------------------------
ALTER TABLE "public"."m_client" ADD CONSTRAINT "m_client_user_company_id_fkey" FOREIGN KEY ("user_company_id") REFERENCES "public"."m_user_company" ("id") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table m_client_employee
-- ----------------------------
ALTER TABLE "public"."m_client_employee" ADD CONSTRAINT "m_client_employee_client_id_fkey" FOREIGN KEY ("client_id") REFERENCES "public"."m_client" ("id") ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE "public"."m_client_employee" ADD CONSTRAINT "m_client_employee_user_company_id_fkey" FOREIGN KEY ("user_company_id") REFERENCES "public"."m_user_company" ("id") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table m_client_user
-- ----------------------------
ALTER TABLE "public"."m_client_user" ADD CONSTRAINT "m_client_user_client_id_fkey" FOREIGN KEY ("client_id") REFERENCES "public"."m_client" ("id") ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE "public"."m_client_user" ADD CONSTRAINT "m_client_user_user_company_id_fkey" FOREIGN KEY ("user_company_id") REFERENCES "public"."m_user_company" ("id") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table m_maching_ng
-- ----------------------------
ALTER TABLE "public"."m_maching_ng" ADD CONSTRAINT "m_maching_ng_client_id_fkey" FOREIGN KEY ("client_id") REFERENCES "public"."m_client" ("id") ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE "public"."m_maching_ng" ADD CONSTRAINT "m_maching_ng_sangyoi_id_fkey" FOREIGN KEY ("sangyoi_id") REFERENCES "public"."m_sangyoi" ("id") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table m_questionnaire
-- ----------------------------
ALTER TABLE "public"."m_questionnaire" ADD CONSTRAINT "m_questionnaire_user_company_id_fkey" FOREIGN KEY ("user_company_id") REFERENCES "public"."m_user_company" ("id") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table m_sangyoi
-- ----------------------------
ALTER TABLE "public"."m_sangyoi" ADD CONSTRAINT "m_sangyoi_user_company_id_fkey" FOREIGN KEY ("user_company_id") REFERENCES "public"."m_user_company" ("id") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table m_user
-- ----------------------------
ALTER TABLE "public"."m_user" ADD CONSTRAINT "m_user_user_company_id_fkey" FOREIGN KEY ("user_company_id") REFERENCES "public"."m_user_company" ("id") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table t_counseling_reserve
-- ----------------------------
ALTER TABLE "public"."t_counseling_reserve" ADD CONSTRAINT "t_counseling_reserve_reserve_issue_id_fkey" FOREIGN KEY ("reserve_issue_id") REFERENCES "public"."t_counseling_reserve_notice" ("id") ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE "public"."t_counseling_reserve" ADD CONSTRAINT "t_counseling_reserve_sangyoi_schedule_id_fkey" FOREIGN KEY ("sangyoi_schedule_id") REFERENCES "public"."t_sangyoi_schedule" ("id") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table t_counseling_reserve_notice
-- ----------------------------
ALTER TABLE "public"."t_counseling_reserve_notice" ADD CONSTRAINT "t_counseling_reserve_notice_user_company_id_client_id_empl_fkey" FOREIGN KEY ("user_company_id", "client_id", "employee_id") REFERENCES "public"."m_client_employee" ("user_company_id", "client_id", "employee_number") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table t_kihoninf_general
-- ----------------------------
ALTER TABLE "public"."t_kihoninf_general" ADD CONSTRAINT "t_kihoninf_general_reserve_issue_id_fkey" FOREIGN KEY ("reserve_issue_id") REFERENCES "public"."t_counseling_reserve_notice" ("id") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table t_kihoninf_hospital
-- ----------------------------
ALTER TABLE "public"."t_kihoninf_hospital" ADD CONSTRAINT "t_kihoninf_hospital_reserve_issue_id_fkey" FOREIGN KEY ("reserve_issue_id") REFERENCES "public"."t_counseling_reserve_notice" ("id") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table t_question_answer
-- ----------------------------
ALTER TABLE "public"."t_question_answer" ADD CONSTRAINT "t_question_answer_reserve_issue_id_fkey" FOREIGN KEY ("reserve_issue_id") REFERENCES "public"."t_counseling_reserve_notice" ("id") ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE "public"."t_question_answer" ADD CONSTRAINT "t_question_answer_user_company_id_client_status_question_l_fkey" FOREIGN KEY ("user_company_id", "client_status", "question_lev1_no", "question_lev2_no") REFERENCES "public"."m_questionnaire" ("user_company_id", "client_status", "question_lev1_no", "question_lev2_no") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table t_report_general
-- ----------------------------
ALTER TABLE "public"."t_report_general" ADD CONSTRAINT "t_report_general_reserve_issue_id_fkey" FOREIGN KEY ("reserve_issue_id") REFERENCES "public"."t_counseling_reserve_notice" ("id") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table t_report_hospital
-- ----------------------------
ALTER TABLE "public"."t_report_hospital" ADD CONSTRAINT "t_report_hospital_reserve_issue_id_fkey" FOREIGN KEY ("reserve_issue_id") REFERENCES "public"."t_counseling_reserve_notice" ("id") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table t_sangyoi_schedule
-- ----------------------------
ALTER TABLE "public"."t_sangyoi_schedule" ADD CONSTRAINT "t_sangyoi_schedule_doctor_id_fkey" FOREIGN KEY ("doctor_id") REFERENCES "public"."m_sangyoi" ("id") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table t_working_time
-- ----------------------------
ALTER TABLE "public"."t_working_time" ADD CONSTRAINT "t_working_time_user_company_code_client_id_employee_number_fkey" FOREIGN KEY ("user_company_code", "client_id", "employee_number") REFERENCES "public"."m_client_employee" ("user_company_id", "client_id", "employee_number") ON DELETE CASCADE ON UPDATE CASCADE;
