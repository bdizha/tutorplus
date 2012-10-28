--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = off;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET escape_string_warning = off;

SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: academic_period; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE academic_period (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    start_date timestamp without time zone NOT NULL,
    end_date timestamp without time zone NOT NULL,
    grades_due timestamp without time zone NOT NULL,
    max_credits character varying(10) NOT NULL,
    academic_year_id bigint NOT NULL
);


ALTER TABLE public.academic_period OWNER TO tutorplus;

--
-- Name: academic_period_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE academic_period_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.academic_period_id_seq OWNER TO tutorplus;

--
-- Name: academic_period_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE academic_period_id_seq OWNED BY academic_period.id;


--
-- Name: academic_period_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('academic_period_id_seq', 1, false);


--
-- Name: academic_year; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE academic_year (
    id bigint NOT NULL,
    year_start bigint NOT NULL,
    year_end bigint NOT NULL
);


ALTER TABLE public.academic_year OWNER TO tutorplus;

--
-- Name: academic_year_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE academic_year_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.academic_year_id_seq OWNER TO tutorplus;

--
-- Name: academic_year_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE academic_year_id_seq OWNED BY academic_year.id;


--
-- Name: academic_year_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('academic_year_id_seq', 1, false);


--
-- Name: activity_feed; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE activity_feed (
    id bigint NOT NULL,
    user_id bigint NOT NULL,
    replacements text NOT NULL,
    activity_template_id bigint NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.activity_feed OWNER TO tutorplus;

--
-- Name: activity_feed_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE activity_feed_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.activity_feed_id_seq OWNER TO tutorplus;

--
-- Name: activity_feed_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE activity_feed_id_seq OWNED BY activity_feed.id;


--
-- Name: activity_feed_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('activity_feed_id_seq', 1, false);


--
-- Name: activity_template; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE activity_template (
    id bigint NOT NULL,
    patterns character varying(500),
    content text NOT NULL,
    type bigint DEFAULT 0 NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.activity_template OWNER TO tutorplus;

--
-- Name: activity_template_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE activity_template_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.activity_template_id_seq OWNER TO tutorplus;

--
-- Name: activity_template_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE activity_template_id_seq OWNED BY activity_template.id;


--
-- Name: activity_template_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('activity_template_id_seq', 1, false);


--
-- Name: announcement; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE announcement (
    id bigint NOT NULL,
    user_id bigint NOT NULL,
    subject character varying(255) NOT NULL,
    message text NOT NULL,
    is_published boolean DEFAULT false NOT NULL,
    lock_until timestamp without time zone,
    lock_after timestamp without time zone,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    slug character varying(255)
);


ALTER TABLE public.announcement OWNER TO tutorplus;

--
-- Name: announcement_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE announcement_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.announcement_id_seq OWNER TO tutorplus;

--
-- Name: announcement_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE announcement_id_seq OWNED BY announcement.id;


--
-- Name: announcement_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('announcement_id_seq', 1, false);


--
-- Name: application; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE application (
    id bigint NOT NULL,
    number character varying(255),
    first_name character varying(255) NOT NULL,
    last_name character varying(255) NOT NULL,
    middle_name character varying(200),
    email character varying(255) NOT NULL,
    program_id bigint NOT NULL,
    academic_period_id bigint NOT NULL,
    status bigint DEFAULT 0 NOT NULL,
    enquiry_date timestamp without time zone,
    last_activity timestamp without time zone,
    completed bigint DEFAULT 0 NOT NULL,
    phone_work character varying(200),
    phone_home character varying(255) NOT NULL,
    phone_mobile character varying(255) NOT NULL,
    gender bigint DEFAULT 0 NOT NULL,
    address_line_one character varying(300) NOT NULL,
    address_line_two character varying(300),
    city character varying(300),
    postcode character varying(10),
    state_province_id bigint,
    country_id bigint
);


ALTER TABLE public.application OWNER TO tutorplus;

--
-- Name: application_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE application_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.application_id_seq OWNER TO tutorplus;

--
-- Name: application_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE application_id_seq OWNED BY application.id;


--
-- Name: application_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('application_id_seq', 1, false);


--
-- Name: assessment_type; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE assessment_type (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    weight numeric(18,2) DEFAULT 0 NOT NULL,
    course_id bigint NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.assessment_type OWNER TO tutorplus;

--
-- Name: assessment_type_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE assessment_type_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.assessment_type_id_seq OWNER TO tutorplus;

--
-- Name: assessment_type_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE assessment_type_id_seq OWNED BY assessment_type.id;


--
-- Name: assessment_type_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('assessment_type_id_seq', 1, false);


--
-- Name: assignment; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE assignment (
    id bigint NOT NULL,
    title character varying(255) NOT NULL,
    assessment_type_id bigint NOT NULL,
    description text NOT NULL,
    submission bigint NOT NULL,
    due_date timestamp without time zone,
    points bigint NOT NULL,
    weight numeric(18,2) DEFAULT 0 NOT NULL,
    lock_until timestamp without time zone,
    lock_after timestamp without time zone,
    notify_users boolean DEFAULT false,
    is_graded boolean DEFAULT false,
    allow_late_submission boolean DEFAULT false,
    graded_by bigint NOT NULL,
    course_id bigint NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    slug character varying(255)
);


ALTER TABLE public.assignment OWNER TO tutorplus;

--
-- Name: assignment_discussion; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE assignment_discussion (
    id bigint NOT NULL,
    assignment_id bigint NOT NULL,
    discussion_id bigint NOT NULL
);


ALTER TABLE public.assignment_discussion OWNER TO tutorplus;

--
-- Name: assignment_discussion_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE assignment_discussion_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.assignment_discussion_id_seq OWNER TO tutorplus;

--
-- Name: assignment_discussion_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE assignment_discussion_id_seq OWNED BY assignment_discussion.id;


--
-- Name: assignment_discussion_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('assignment_discussion_id_seq', 1, false);


--
-- Name: assignment_file; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE assignment_file (
    id bigint NOT NULL,
    assignment_id bigint NOT NULL,
    file_id bigint NOT NULL
);


ALTER TABLE public.assignment_file OWNER TO tutorplus;

--
-- Name: assignment_file_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE assignment_file_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.assignment_file_id_seq OWNER TO tutorplus;

--
-- Name: assignment_file_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE assignment_file_id_seq OWNED BY assignment_file.id;


--
-- Name: assignment_file_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('assignment_file_id_seq', 1, false);


--
-- Name: assignment_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE assignment_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.assignment_id_seq OWNER TO tutorplus;

--
-- Name: assignment_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE assignment_id_seq OWNED BY assignment.id;


--
-- Name: assignment_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('assignment_id_seq', 1, false);


--
-- Name: assignment_submission; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE assignment_submission (
    id bigint NOT NULL,
    assignment_id bigint NOT NULL,
    generated_file character varying(255) NOT NULL,
    original_file character varying(255) NOT NULL,
    user_id bigint NOT NULL,
    status bigint DEFAULT 0 NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.assignment_submission OWNER TO tutorplus;

--
-- Name: assignment_submission_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE assignment_submission_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.assignment_submission_id_seq OWNER TO tutorplus;

--
-- Name: assignment_submission_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE assignment_submission_id_seq OWNED BY assignment_submission.id;


--
-- Name: assignment_submission_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('assignment_submission_id_seq', 1, false);


--
-- Name: attendance; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE attendance (
    id bigint NOT NULL,
    date timestamp without time zone,
    course_id bigint NOT NULL,
    course_meeting_time_id bigint NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.attendance OWNER TO tutorplus;

--
-- Name: attendance_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE attendance_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.attendance_id_seq OWNER TO tutorplus;

--
-- Name: attendance_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE attendance_id_seq OWNED BY attendance.id;


--
-- Name: attendance_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('attendance_id_seq', 1, false);


--
-- Name: building; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE building (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    abbreviation character varying(10) NOT NULL
);


ALTER TABLE public.building OWNER TO tutorplus;

--
-- Name: building_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE building_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.building_id_seq OWNER TO tutorplus;

--
-- Name: building_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE building_id_seq OWNED BY building.id;


--
-- Name: building_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('building_id_seq', 1, false);


--
-- Name: calendar; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE calendar (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    description text NOT NULL,
    is_public boolean DEFAULT false NOT NULL,
    type bigint DEFAULT 0 NOT NULL,
    color character varying(255) NOT NULL
);


ALTER TABLE public.calendar OWNER TO tutorplus;

--
-- Name: calendar_event; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE calendar_event (
    id bigint NOT NULL,
    calendar_id bigint NOT NULL,
    user_id bigint NOT NULL,
    name character varying(255) NOT NULL,
    location character varying(255) NOT NULL,
    from_date timestamp without time zone NOT NULL,
    to_date timestamp without time zone NOT NULL,
    reminder bigint DEFAULT 0 NOT NULL,
    description text NOT NULL,
    is_personal boolean DEFAULT false NOT NULL,
    notify_changes boolean DEFAULT false NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    slug character varying(255)
);


ALTER TABLE public.calendar_event OWNER TO tutorplus;

--
-- Name: calendar_event_attendee; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE calendar_event_attendee (
    id bigint NOT NULL,
    calendar_event_id bigint NOT NULL,
    user_id bigint NOT NULL,
    status bigint DEFAULT 0 NOT NULL,
    comment text NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.calendar_event_attendee OWNER TO tutorplus;

--
-- Name: calendar_event_attendee_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE calendar_event_attendee_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.calendar_event_attendee_id_seq OWNER TO tutorplus;

--
-- Name: calendar_event_attendee_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE calendar_event_attendee_id_seq OWNED BY calendar_event_attendee.id;


--
-- Name: calendar_event_attendee_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('calendar_event_attendee_id_seq', 7, true);


--
-- Name: calendar_event_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE calendar_event_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.calendar_event_id_seq OWNER TO tutorplus;

--
-- Name: calendar_event_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE calendar_event_id_seq OWNED BY calendar_event.id;


--
-- Name: calendar_event_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('calendar_event_id_seq', 2, true);


--
-- Name: calendar_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE calendar_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.calendar_id_seq OWNER TO tutorplus;

--
-- Name: calendar_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE calendar_id_seq OWNED BY calendar.id;


--
-- Name: calendar_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('calendar_id_seq', 2, true);


--
-- Name: campus; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE campus (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    is_primary boolean DEFAULT false,
    address character varying(255) NOT NULL,
    city character varying(255) NOT NULL,
    postcode character varying(10) NOT NULL,
    country_id bigint NOT NULL
);


ALTER TABLE public.campus OWNER TO tutorplus;

--
-- Name: campus_course; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE campus_course (
    id bigint NOT NULL,
    campus_id bigint NOT NULL,
    course_id bigint NOT NULL
);


ALTER TABLE public.campus_course OWNER TO tutorplus;

--
-- Name: campus_course_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE campus_course_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.campus_course_id_seq OWNER TO tutorplus;

--
-- Name: campus_course_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE campus_course_id_seq OWNED BY campus_course.id;


--
-- Name: campus_course_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('campus_course_id_seq', 1, false);


--
-- Name: campus_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE campus_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.campus_id_seq OWNER TO tutorplus;

--
-- Name: campus_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE campus_id_seq OWNED BY campus.id;


--
-- Name: campus_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('campus_id_seq', 1, false);


--
-- Name: contact; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE contact (
    id bigint NOT NULL,
    email_address character varying(255),
    phone_work character varying(200),
    phone_home character varying(200),
    phone_mobile character varying(200),
    address_line_1 character varying(300),
    address_line_2 character varying(300),
    postcode character varying(10),
    city character varying(255),
    country_id bigint NOT NULL,
    state_province_id bigint NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.contact OWNER TO tutorplus;

--
-- Name: contact_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE contact_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.contact_id_seq OWNER TO tutorplus;

--
-- Name: contact_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE contact_id_seq OWNED BY contact.id;


--
-- Name: contact_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('contact_id_seq', 1, false);


--
-- Name: country; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE country (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    code character varying(10) NOT NULL
);


ALTER TABLE public.country OWNER TO tutorplus;

--
-- Name: country_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE country_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.country_id_seq OWNER TO tutorplus;

--
-- Name: country_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE country_id_seq OWNED BY country.id;


--
-- Name: country_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('country_id_seq', 1, true);


--
-- Name: course; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE course (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    code character varying(10) NOT NULL,
    department_id bigint NOT NULL,
    description text NOT NULL,
    is_finalized boolean DEFAULT false NOT NULL,
    academic_period_id bigint NOT NULL,
    start_date timestamp without time zone NOT NULL,
    end_date timestamp without time zone NOT NULL,
    credits numeric(18,2) DEFAULT 0,
    hours bigint NOT NULL,
    max_enrolled bigint NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    slug character varying(255)
);


ALTER TABLE public.course OWNER TO tutorplus;

--
-- Name: course_activity_feed; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE course_activity_feed (
    id bigint NOT NULL,
    course_id bigint NOT NULL,
    activity_feed_id bigint NOT NULL
);


ALTER TABLE public.course_activity_feed OWNER TO tutorplus;

--
-- Name: course_activity_feed_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE course_activity_feed_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.course_activity_feed_id_seq OWNER TO tutorplus;

--
-- Name: course_activity_feed_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE course_activity_feed_id_seq OWNED BY course_activity_feed.id;


--
-- Name: course_activity_feed_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('course_activity_feed_id_seq', 1, false);


--
-- Name: course_announcement; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE course_announcement (
    id bigint NOT NULL,
    course_id bigint NOT NULL,
    announcement_id bigint NOT NULL
);


ALTER TABLE public.course_announcement OWNER TO tutorplus;

--
-- Name: course_announcement_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE course_announcement_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.course_announcement_id_seq OWNER TO tutorplus;

--
-- Name: course_announcement_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE course_announcement_id_seq OWNED BY course_announcement.id;


--
-- Name: course_announcement_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('course_announcement_id_seq', 1, false);


--
-- Name: course_discussion; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE course_discussion (
    id bigint NOT NULL,
    course_id bigint NOT NULL,
    discussion_id bigint NOT NULL
);


ALTER TABLE public.course_discussion OWNER TO tutorplus;

--
-- Name: course_discussion_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE course_discussion_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.course_discussion_id_seq OWNER TO tutorplus;

--
-- Name: course_discussion_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE course_discussion_id_seq OWNED BY course_discussion.id;


--
-- Name: course_discussion_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('course_discussion_id_seq', 1, false);


--
-- Name: course_folder; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE course_folder (
    id bigint NOT NULL,
    course_id bigint NOT NULL,
    folder_id bigint NOT NULL
);


ALTER TABLE public.course_folder OWNER TO tutorplus;

--
-- Name: course_folder_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE course_folder_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.course_folder_id_seq OWNER TO tutorplus;

--
-- Name: course_folder_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE course_folder_id_seq OWNED BY course_folder.id;


--
-- Name: course_folder_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('course_folder_id_seq', 1, false);


--
-- Name: course_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE course_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.course_id_seq OWNER TO tutorplus;

--
-- Name: course_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE course_id_seq OWNED BY course.id;


--
-- Name: course_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('course_id_seq', 1, false);


--
-- Name: course_link; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE course_link (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    url character varying(255) NOT NULL,
    course_id bigint NOT NULL
);


ALTER TABLE public.course_link OWNER TO tutorplus;

--
-- Name: course_link_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE course_link_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.course_link_id_seq OWNER TO tutorplus;

--
-- Name: course_link_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE course_link_id_seq OWNED BY course_link.id;


--
-- Name: course_link_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('course_link_id_seq', 1, false);


--
-- Name: course_meeting_time; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE course_meeting_time (
    id bigint NOT NULL,
    day bigint NOT NULL,
    from_time character varying(255) NOT NULL,
    to_time character varying(255) NOT NULL,
    course_id bigint NOT NULL,
    building_id bigint NOT NULL,
    room_id bigint NOT NULL
);


ALTER TABLE public.course_meeting_time OWNER TO tutorplus;

--
-- Name: course_meeting_time_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE course_meeting_time_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.course_meeting_time_id_seq OWNER TO tutorplus;

--
-- Name: course_meeting_time_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE course_meeting_time_id_seq OWNED BY course_meeting_time.id;


--
-- Name: course_meeting_time_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('course_meeting_time_id_seq', 1, false);


--
-- Name: course_reading_item; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE course_reading_item (
    id bigint NOT NULL,
    title character varying(255) NOT NULL,
    author character varying(255) NOT NULL,
    course_id bigint NOT NULL
);


ALTER TABLE public.course_reading_item OWNER TO tutorplus;

--
-- Name: course_reading_item_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE course_reading_item_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.course_reading_item_id_seq OWNER TO tutorplus;

--
-- Name: course_reading_item_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE course_reading_item_id_seq OWNED BY course_reading_item.id;


--
-- Name: course_reading_item_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('course_reading_item_id_seq', 1, false);


--
-- Name: department; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE department (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    abbreviation character varying(10) NOT NULL,
    faculty_id bigint NOT NULL
);


ALTER TABLE public.department OWNER TO tutorplus;

--
-- Name: department_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE department_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.department_id_seq OWNER TO tutorplus;

--
-- Name: department_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE department_id_seq OWNED BY department.id;


--
-- Name: department_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('department_id_seq', 1, false);


--
-- Name: discussion; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE discussion (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    user_id bigint NOT NULL,
    description text NOT NULL,
    access_level bigint NOT NULL,
    last_visit timestamp without time zone,
    latest_topic_reply_id bigint,
    nb_topics bigint DEFAULT 0,
    nb_members bigint DEFAULT 1,
    nb_replies bigint DEFAULT 1,
    is_primary boolean DEFAULT false,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    slug character varying(255)
);


ALTER TABLE public.discussion OWNER TO tutorplus;

--
-- Name: discussion_activity_feed; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE discussion_activity_feed (
    id bigint NOT NULL,
    discussion_id bigint NOT NULL,
    activity_feed_id bigint NOT NULL
);


ALTER TABLE public.discussion_activity_feed OWNER TO tutorplus;

--
-- Name: discussion_activity_feed_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE discussion_activity_feed_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.discussion_activity_feed_id_seq OWNER TO tutorplus;

--
-- Name: discussion_activity_feed_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE discussion_activity_feed_id_seq OWNED BY discussion_activity_feed.id;


--
-- Name: discussion_activity_feed_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('discussion_activity_feed_id_seq', 1, false);


--
-- Name: discussion_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE discussion_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.discussion_id_seq OWNER TO tutorplus;

--
-- Name: discussion_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE discussion_id_seq OWNED BY discussion.id;


--
-- Name: discussion_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('discussion_id_seq', 1, true);


--
-- Name: discussion_member; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE discussion_member (
    id bigint NOT NULL,
    nickname character varying(255) NOT NULL,
    subscription_type bigint DEFAULT 0 NOT NULL,
    membership_type bigint DEFAULT 0 NOT NULL,
    posting_permission_type bigint DEFAULT 0 NOT NULL,
    status bigint DEFAULT 0 NOT NULL,
    discussion_id bigint NOT NULL,
    user_id bigint NOT NULL,
    is_removed boolean DEFAULT false,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.discussion_member OWNER TO tutorplus;

--
-- Name: discussion_member_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE discussion_member_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.discussion_member_id_seq OWNER TO tutorplus;

--
-- Name: discussion_member_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE discussion_member_id_seq OWNED BY discussion_member.id;


--
-- Name: discussion_member_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('discussion_member_id_seq', 1, true);


--
-- Name: discussion_topic; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE discussion_topic (
    id bigint NOT NULL,
    subject character varying(255) NOT NULL,
    message text NOT NULL,
    discussion_id bigint NOT NULL,
    user_id bigint NOT NULL,
    latest_topic_reply_id bigint,
    nb_replies bigint DEFAULT 0,
    nb_views bigint DEFAULT 0,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    slug character varying(255)
);


ALTER TABLE public.discussion_topic OWNER TO tutorplus;

--
-- Name: discussion_topic_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE discussion_topic_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.discussion_topic_id_seq OWNER TO tutorplus;

--
-- Name: discussion_topic_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE discussion_topic_id_seq OWNED BY discussion_topic.id;


--
-- Name: discussion_topic_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('discussion_topic_id_seq', 1, true);


--
-- Name: discussion_topic_message; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE discussion_topic_message (
    id bigint NOT NULL,
    message text NOT NULL,
    user_id bigint NOT NULL,
    discussion_topic_id bigint NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.discussion_topic_message OWNER TO tutorplus;

--
-- Name: discussion_topic_message_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE discussion_topic_message_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.discussion_topic_message_id_seq OWNER TO tutorplus;

--
-- Name: discussion_topic_message_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE discussion_topic_message_id_seq OWNED BY discussion_topic_message.id;


--
-- Name: discussion_topic_message_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('discussion_topic_message_id_seq', 1, true);


--
-- Name: discussion_topic_reply; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE discussion_topic_reply (
    id bigint NOT NULL,
    reply text NOT NULL,
    user_id bigint NOT NULL,
    discussion_topic_message_id bigint NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.discussion_topic_reply OWNER TO tutorplus;

--
-- Name: discussion_topic_reply_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE discussion_topic_reply_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.discussion_topic_reply_id_seq OWNER TO tutorplus;

--
-- Name: discussion_topic_reply_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE discussion_topic_reply_id_seq OWNED BY discussion_topic_reply.id;


--
-- Name: discussion_topic_reply_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('discussion_topic_reply_id_seq', 1, true);


--
-- Name: email_message; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE email_message (
    id bigint NOT NULL,
    from_email character varying(255) NOT NULL,
    to_email text,
    cc_email text,
    bcc_email text,
    email_template_id bigint,
    sender_id bigint NOT NULL,
    reply_to character varying(255) NOT NULL,
    subject character varying(255) NOT NULL,
    body text NOT NULL,
    status bigint DEFAULT 0 NOT NULL,
    is_read boolean DEFAULT false NOT NULL,
    is_trashed boolean DEFAULT false NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.email_message OWNER TO tutorplus;

--
-- Name: email_message_correspondence; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE email_message_correspondence (
    id bigint NOT NULL,
    initiator_id bigint NOT NULL,
    invitee_id bigint NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.email_message_correspondence OWNER TO tutorplus;

--
-- Name: email_message_correspondence_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE email_message_correspondence_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.email_message_correspondence_id_seq OWNER TO tutorplus;

--
-- Name: email_message_correspondence_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE email_message_correspondence_id_seq OWNED BY email_message_correspondence.id;


--
-- Name: email_message_correspondence_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('email_message_correspondence_id_seq', 1, false);


--
-- Name: email_message_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE email_message_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.email_message_id_seq OWNER TO tutorplus;

--
-- Name: email_message_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE email_message_id_seq OWNED BY email_message.id;


--
-- Name: email_message_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('email_message_id_seq', 1, false);


--
-- Name: email_message_reply; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE email_message_reply (
    id bigint NOT NULL,
    sender_id bigint NOT NULL,
    responder_id bigint NOT NULL,
    email_message_id bigint NOT NULL,
    email_message_reply_id bigint NOT NULL
);


ALTER TABLE public.email_message_reply OWNER TO tutorplus;

--
-- Name: email_message_reply_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE email_message_reply_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.email_message_reply_id_seq OWNER TO tutorplus;

--
-- Name: email_message_reply_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE email_message_reply_id_seq OWNED BY email_message_reply.id;


--
-- Name: email_message_reply_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('email_message_reply_id_seq', 1, false);


--
-- Name: email_template; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE email_template (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    subject character varying(5000) NOT NULL,
    description character varying(5000),
    body text NOT NULL,
    from_email character varying(5000) NOT NULL,
    to_email character varying(5000),
    cc_email character varying(5000),
    bcc_email character varying(5000),
    reply_to character varying(5000) NOT NULL,
    is_html boolean DEFAULT false NOT NULL,
    is_active boolean DEFAULT true NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    slug character varying(255)
);


ALTER TABLE public.email_template OWNER TO tutorplus;

--
-- Name: email_template_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE email_template_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.email_template_id_seq OWNER TO tutorplus;

--
-- Name: email_template_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE email_template_id_seq OWNED BY email_template.id;


--
-- Name: email_template_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('email_template_id_seq', 1, false);


--
-- Name: faculty; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE faculty (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    abbreviation character varying(10) NOT NULL
);


ALTER TABLE public.faculty OWNER TO tutorplus;

--
-- Name: faculty_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE faculty_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.faculty_id_seq OWNER TO tutorplus;

--
-- Name: faculty_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE faculty_id_seq OWNED BY faculty.id;


--
-- Name: faculty_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('faculty_id_seq', 1, false);


--
-- Name: file; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE file (
    id bigint NOT NULL,
    folder_id bigint NOT NULL,
    original_name character varying(255) NOT NULL,
    generated_name character varying(255) NOT NULL,
    mime_type character varying(128) NOT NULL,
    size bigint NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.file OWNER TO tutorplus;

--
-- Name: file_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE file_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.file_id_seq OWNER TO tutorplus;

--
-- Name: file_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE file_id_seq OWNED BY file.id;


--
-- Name: file_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('file_id_seq', 1, false);


--
-- Name: folder; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE folder (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    type bigint DEFAULT 0 NOT NULL,
    parent_id bigint DEFAULT 1 NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    lft integer,
    rgt integer,
    level smallint
);


ALTER TABLE public.folder OWNER TO tutorplus;

--
-- Name: folder_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE folder_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.folder_id_seq OWNER TO tutorplus;

--
-- Name: folder_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE folder_id_seq OWNED BY folder.id;


--
-- Name: folder_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('folder_id_seq', 1, false);


--
-- Name: gradebook; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE gradebook (
    id bigint NOT NULL,
    items bigint DEFAULT 0 NOT NULL,
    course_id bigint NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.gradebook OWNER TO tutorplus;

--
-- Name: gradebook_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE gradebook_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.gradebook_id_seq OWNER TO tutorplus;

--
-- Name: gradebook_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE gradebook_id_seq OWNED BY gradebook.id;


--
-- Name: gradebook_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('gradebook_id_seq', 1, false);


--
-- Name: gradebook_item; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE gradebook_item (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    weight numeric(18,2) DEFAULT 0 NOT NULL,
    gradebook_id bigint NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.gradebook_item OWNER TO tutorplus;

--
-- Name: gradebook_item_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE gradebook_item_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.gradebook_item_id_seq OWNER TO tutorplus;

--
-- Name: gradebook_item_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE gradebook_item_id_seq OWNED BY gradebook_item.id;


--
-- Name: gradebook_item_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('gradebook_item_id_seq', 1, false);


--
-- Name: gradebook_scale; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE gradebook_scale (
    id bigint NOT NULL,
    min_points numeric(18,2) DEFAULT 0 NOT NULL,
    max_points numeric(18,2) DEFAULT 0 NOT NULL,
    code character varying(255) NOT NULL,
    gradebook_id bigint NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.gradebook_scale OWNER TO tutorplus;

--
-- Name: gradebook_scale_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE gradebook_scale_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.gradebook_scale_id_seq OWNER TO tutorplus;

--
-- Name: gradebook_scale_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE gradebook_scale_id_seq OWNED BY gradebook_scale.id;


--
-- Name: gradebook_scale_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('gradebook_scale_id_seq', 1, false);


--
-- Name: instructor; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE instructor (
    id bigint NOT NULL,
    user_id bigint NOT NULL,
    about character varying(500),
    middle_name character varying(200),
    date_of_birth timestamp without time zone,
    gender character varying(255),
    employment character varying(255),
    is_student boolean DEFAULT false,
    high_school character varying(255),
    studied_at character varying(255),
    current_study character varying(255),
    employment_start_date timestamp without time zone,
    employment_end_date timestamp without time zone,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.instructor OWNER TO tutorplus;

--
-- Name: instructor_contact; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE instructor_contact (
    id bigint NOT NULL,
    email_address character varying(255),
    phone_work character varying(200),
    phone_home character varying(200),
    phone_mobile character varying(200),
    address_line_1 character varying(300),
    address_line_2 character varying(300),
    postcode character varying(10),
    city character varying(255),
    country_id bigint NOT NULL,
    state_province_id bigint NOT NULL,
    instructor_id bigint NOT NULL,
    postal_address_line_1 character varying(300),
    postal_address_line_2 character varying(300),
    postal_postcode character varying(10),
    postal_city character varying(255),
    postal_country_id bigint NOT NULL,
    postal_state_province_id bigint NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.instructor_contact OWNER TO tutorplus;

--
-- Name: instructor_contact_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE instructor_contact_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.instructor_contact_id_seq OWNER TO tutorplus;

--
-- Name: instructor_contact_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE instructor_contact_id_seq OWNED BY instructor_contact.id;


--
-- Name: instructor_contact_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('instructor_contact_id_seq', 1, false);


--
-- Name: instructor_course; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE instructor_course (
    id bigint NOT NULL,
    instructor_id bigint NOT NULL,
    course_id bigint NOT NULL
);


ALTER TABLE public.instructor_course OWNER TO tutorplus;

--
-- Name: instructor_course_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE instructor_course_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.instructor_course_id_seq OWNER TO tutorplus;

--
-- Name: instructor_course_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE instructor_course_id_seq OWNED BY instructor_course.id;


--
-- Name: instructor_course_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('instructor_course_id_seq', 1, false);


--
-- Name: instructor_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE instructor_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.instructor_id_seq OWNER TO tutorplus;

--
-- Name: instructor_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE instructor_id_seq OWNED BY instructor.id;


--
-- Name: instructor_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('instructor_id_seq', 1, false);


--
-- Name: instructor_mailing_list; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE instructor_mailing_list (
    id bigint NOT NULL,
    instructor_id bigint NOT NULL,
    mailing_list_id bigint NOT NULL
);


ALTER TABLE public.instructor_mailing_list OWNER TO tutorplus;

--
-- Name: instructor_mailing_list_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE instructor_mailing_list_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.instructor_mailing_list_id_seq OWNER TO tutorplus;

--
-- Name: instructor_mailing_list_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE instructor_mailing_list_id_seq OWNED BY instructor_mailing_list.id;


--
-- Name: instructor_mailing_list_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('instructor_mailing_list_id_seq', 1, false);


--
-- Name: mailing_list; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE mailing_list (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    user_id bigint NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.mailing_list OWNER TO tutorplus;

--
-- Name: mailing_list_course; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE mailing_list_course (
    id bigint NOT NULL,
    mailing_list_id bigint NOT NULL,
    course_id bigint NOT NULL
);


ALTER TABLE public.mailing_list_course OWNER TO tutorplus;

--
-- Name: mailing_list_course_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE mailing_list_course_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.mailing_list_course_id_seq OWNER TO tutorplus;

--
-- Name: mailing_list_course_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE mailing_list_course_id_seq OWNED BY mailing_list_course.id;


--
-- Name: mailing_list_course_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('mailing_list_course_id_seq', 1, false);


--
-- Name: mailing_list_email_message; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE mailing_list_email_message (
    id bigint NOT NULL,
    mailing_list_id bigint NOT NULL,
    email_message_id bigint NOT NULL
);


ALTER TABLE public.mailing_list_email_message OWNER TO tutorplus;

--
-- Name: mailing_list_email_message_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE mailing_list_email_message_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.mailing_list_email_message_id_seq OWNER TO tutorplus;

--
-- Name: mailing_list_email_message_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE mailing_list_email_message_id_seq OWNED BY mailing_list_email_message.id;


--
-- Name: mailing_list_email_message_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('mailing_list_email_message_id_seq', 1, false);


--
-- Name: mailing_list_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE mailing_list_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.mailing_list_id_seq OWNER TO tutorplus;

--
-- Name: mailing_list_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE mailing_list_id_seq OWNED BY mailing_list.id;


--
-- Name: mailing_list_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('mailing_list_id_seq', 1, false);


--
-- Name: news; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE news (
    id bigint NOT NULL,
    user_id bigint NOT NULL,
    heading character varying(255) NOT NULL,
    blurb text NOT NULL,
    description text NOT NULL,
    is_published boolean DEFAULT false NOT NULL,
    lock_until timestamp without time zone,
    lock_after timestamp without time zone,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    slug character varying(255)
);


ALTER TABLE public.news OWNER TO tutorplus;

--
-- Name: news_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE news_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.news_id_seq OWNER TO tutorplus;

--
-- Name: news_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE news_id_seq OWNED BY news.id;


--
-- Name: news_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('news_id_seq', 1, false);


--
-- Name: notification_settings; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE notification_settings (
    id bigint NOT NULL,
    can_receive_email boolean DEFAULT false,
    can_receive_reply boolean DEFAULT false,
    can_receive_peer_activities boolean DEFAULT false,
    can_receive_news_alerts boolean DEFAULT false,
    can_receive_announcement_alerts boolean DEFAULT false,
    can_receive_event_alerts boolean DEFAULT false,
    can_receive_discussion_updates boolean DEFAULT false,
    can_receive_course_updates boolean DEFAULT false,
    can_receive_assignment_due boolean DEFAULT false,
    can_receive_system_updates boolean DEFAULT false,
    can_receive_system_maintenance boolean DEFAULT false,
    user_id bigint NOT NULL
);


ALTER TABLE public.notification_settings OWNER TO tutorplus;

--
-- Name: notification_settings_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE notification_settings_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.notification_settings_id_seq OWNER TO tutorplus;

--
-- Name: notification_settings_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE notification_settings_id_seq OWNED BY notification_settings.id;


--
-- Name: notification_settings_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('notification_settings_id_seq', 1, true);


--
-- Name: peer; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE peer (
    id bigint NOT NULL,
    inviter_id bigint NOT NULL,
    invitee_id bigint NOT NULL,
    status bigint DEFAULT 0 NOT NULL,
    type bigint DEFAULT 0 NOT NULL
);


ALTER TABLE public.peer OWNER TO tutorplus;

--
-- Name: peer_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE peer_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.peer_id_seq OWNER TO tutorplus;

--
-- Name: peer_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE peer_id_seq OWNED BY peer.id;


--
-- Name: peer_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('peer_id_seq', 8, true);


--
-- Name: profile; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE profile (
    id bigint NOT NULL,
    user_id bigint NOT NULL,
    about character varying(500),
    middle_name character varying(200),
    date_of_birth timestamp without time zone,
    gender character varying(255),
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.profile OWNER TO tutorplus;

--
-- Name: profile_award; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE profile_award (
    id bigint NOT NULL,
    user_id bigint,
    institution character varying(255),
    description character varying(500),
    year character varying(255)
);


ALTER TABLE public.profile_award OWNER TO tutorplus;

--
-- Name: profile_award_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE profile_award_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.profile_award_id_seq OWNER TO tutorplus;

--
-- Name: profile_award_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE profile_award_id_seq OWNED BY profile_award.id;


--
-- Name: profile_award_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('profile_award_id_seq', 1, false);


--
-- Name: profile_book; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE profile_book (
    id bigint NOT NULL,
    user_id bigint,
    title character varying(255) NOT NULL,
    author character varying(255)
);


ALTER TABLE public.profile_book OWNER TO tutorplus;

--
-- Name: profile_book_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE profile_book_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.profile_book_id_seq OWNER TO tutorplus;

--
-- Name: profile_book_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE profile_book_id_seq OWNED BY profile_book.id;


--
-- Name: profile_book_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('profile_book_id_seq', 1, false);


--
-- Name: profile_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE profile_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.profile_id_seq OWNER TO tutorplus;

--
-- Name: profile_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE profile_id_seq OWNED BY profile.id;


--
-- Name: profile_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('profile_id_seq', 1, false);


--
-- Name: profile_interest; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE profile_interest (
    id bigint NOT NULL,
    user_id bigint,
    name character varying(500) NOT NULL
);


ALTER TABLE public.profile_interest OWNER TO tutorplus;

--
-- Name: profile_interest_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE profile_interest_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.profile_interest_id_seq OWNER TO tutorplus;

--
-- Name: profile_interest_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE profile_interest_id_seq OWNED BY profile_interest.id;


--
-- Name: profile_interest_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('profile_interest_id_seq', 1, false);


--
-- Name: profile_publication; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE profile_publication (
    id bigint NOT NULL,
    user_id bigint,
    title character varying(255) NOT NULL,
    link character varying(500),
    year character varying(255)
);


ALTER TABLE public.profile_publication OWNER TO tutorplus;

--
-- Name: profile_publication_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE profile_publication_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.profile_publication_id_seq OWNER TO tutorplus;

--
-- Name: profile_publication_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE profile_publication_id_seq OWNED BY profile_publication.id;


--
-- Name: profile_publication_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('profile_publication_id_seq', 1, false);


--
-- Name: profile_qualification; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE profile_qualification (
    id bigint NOT NULL,
    user_id bigint,
    institution character varying(255),
    description character varying(500),
    year character varying(255)
);


ALTER TABLE public.profile_qualification OWNER TO tutorplus;

--
-- Name: profile_qualification_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE profile_qualification_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.profile_qualification_id_seq OWNER TO tutorplus;

--
-- Name: profile_qualification_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE profile_qualification_id_seq OWNED BY profile_qualification.id;


--
-- Name: profile_qualification_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('profile_qualification_id_seq', 1, false);


--
-- Name: program; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE program (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    abbreviation character varying(10) NOT NULL,
    code character varying(255) NOT NULL,
    description text NOT NULL,
    type bigint DEFAULT 0 NOT NULL,
    department_id bigint NOT NULL,
    program_level_id bigint NOT NULL
);


ALTER TABLE public.program OWNER TO tutorplus;

--
-- Name: program_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE program_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.program_id_seq OWNER TO tutorplus;

--
-- Name: program_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE program_id_seq OWNED BY program.id;


--
-- Name: program_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('program_id_seq', 1, false);


--
-- Name: program_level; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE program_level (
    id bigint NOT NULL,
    name character varying(255) NOT NULL
);


ALTER TABLE public.program_level OWNER TO tutorplus;

--
-- Name: program_level_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE program_level_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.program_level_id_seq OWNER TO tutorplus;

--
-- Name: program_level_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE program_level_id_seq OWNED BY program_level.id;


--
-- Name: program_level_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('program_level_id_seq', 1, false);


--
-- Name: room; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE room (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    abbreviation character varying(10) NOT NULL,
    building_id bigint NOT NULL
);


ALTER TABLE public.room OWNER TO tutorplus;

--
-- Name: room_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE room_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.room_id_seq OWNER TO tutorplus;

--
-- Name: room_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE room_id_seq OWNED BY room.id;


--
-- Name: room_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('room_id_seq', 1, false);


--
-- Name: sf_guard_forgot_password; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE sf_guard_forgot_password (
    id bigint NOT NULL,
    user_id bigint NOT NULL,
    unique_key character varying(255),
    expires_at timestamp without time zone NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.sf_guard_forgot_password OWNER TO tutorplus;

--
-- Name: sf_guard_forgot_password_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE sf_guard_forgot_password_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.sf_guard_forgot_password_id_seq OWNER TO tutorplus;

--
-- Name: sf_guard_forgot_password_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE sf_guard_forgot_password_id_seq OWNED BY sf_guard_forgot_password.id;


--
-- Name: sf_guard_forgot_password_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('sf_guard_forgot_password_id_seq', 1, false);


--
-- Name: sf_guard_group; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE sf_guard_group (
    id bigint NOT NULL,
    name character varying(255),
    description character varying(1000),
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.sf_guard_group OWNER TO tutorplus;

--
-- Name: sf_guard_group_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE sf_guard_group_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.sf_guard_group_id_seq OWNER TO tutorplus;

--
-- Name: sf_guard_group_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE sf_guard_group_id_seq OWNED BY sf_guard_group.id;


--
-- Name: sf_guard_group_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('sf_guard_group_id_seq', 1, false);


--
-- Name: sf_guard_group_permission; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE sf_guard_group_permission (
    group_id bigint NOT NULL,
    permission_id bigint NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.sf_guard_group_permission OWNER TO tutorplus;

--
-- Name: sf_guard_permission; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE sf_guard_permission (
    id bigint NOT NULL,
    name character varying(255),
    description character varying(1000),
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.sf_guard_permission OWNER TO tutorplus;

--
-- Name: sf_guard_permission_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE sf_guard_permission_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.sf_guard_permission_id_seq OWNER TO tutorplus;

--
-- Name: sf_guard_permission_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE sf_guard_permission_id_seq OWNED BY sf_guard_permission.id;


--
-- Name: sf_guard_permission_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('sf_guard_permission_id_seq', 1, false);


--
-- Name: sf_guard_remember_key; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE sf_guard_remember_key (
    id bigint NOT NULL,
    user_id bigint,
    remember_key character varying(32),
    ip_address character varying(50),
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.sf_guard_remember_key OWNER TO tutorplus;

--
-- Name: sf_guard_remember_key_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE sf_guard_remember_key_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.sf_guard_remember_key_id_seq OWNER TO tutorplus;

--
-- Name: sf_guard_remember_key_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE sf_guard_remember_key_id_seq OWNED BY sf_guard_remember_key.id;


--
-- Name: sf_guard_remember_key_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('sf_guard_remember_key_id_seq', 1, true);


--
-- Name: sf_guard_user; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE sf_guard_user (
    id bigint NOT NULL,
    first_name character varying(255),
    last_name character varying(255),
    email_address character varying(255) NOT NULL,
    username character varying(128) NOT NULL,
    algorithm character varying(128) DEFAULT 'sha1'::character varying NOT NULL,
    salt character varying(128),
    password character varying(128),
    is_active boolean DEFAULT true,
    is_super_admin boolean DEFAULT false,
    last_login timestamp without time zone,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    slug character varying(255)
);


ALTER TABLE public.sf_guard_user OWNER TO tutorplus;

--
-- Name: sf_guard_user_group; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE sf_guard_user_group (
    user_id bigint NOT NULL,
    group_id bigint NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.sf_guard_user_group OWNER TO tutorplus;

--
-- Name: sf_guard_user_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE sf_guard_user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.sf_guard_user_id_seq OWNER TO tutorplus;

--
-- Name: sf_guard_user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE sf_guard_user_id_seq OWNED BY sf_guard_user.id;


--
-- Name: sf_guard_user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('sf_guard_user_id_seq', 6, true);


--
-- Name: sf_guard_user_permission; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE sf_guard_user_permission (
    user_id bigint NOT NULL,
    permission_id bigint NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.sf_guard_user_permission OWNER TO tutorplus;

--
-- Name: staff; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE staff (
    id bigint NOT NULL,
    user_id bigint NOT NULL,
    about character varying(500),
    middle_name character varying(200),
    date_of_birth timestamp without time zone,
    gender character varying(255),
    employment bigint DEFAULT 0 NOT NULL,
    is_student boolean DEFAULT false,
    employment_start_date timestamp without time zone,
    employment_end_date timestamp without time zone,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.staff OWNER TO tutorplus;

--
-- Name: staff_contact; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE staff_contact (
    id bigint NOT NULL,
    email_address character varying(255),
    phone_work character varying(200),
    phone_home character varying(200),
    phone_mobile character varying(200),
    address_line_1 character varying(300),
    address_line_2 character varying(300),
    postcode character varying(10),
    city character varying(255),
    country_id bigint NOT NULL,
    state_province_id bigint NOT NULL,
    staff_id bigint NOT NULL,
    postal_address_line_1 character varying(300),
    postal_address_line_2 character varying(300),
    postal_postcode character varying(10),
    postal_city character varying(255),
    postal_country_id bigint NOT NULL,
    postal_state_province_id bigint NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.staff_contact OWNER TO tutorplus;

--
-- Name: staff_contact_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE staff_contact_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.staff_contact_id_seq OWNER TO tutorplus;

--
-- Name: staff_contact_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE staff_contact_id_seq OWNED BY staff_contact.id;


--
-- Name: staff_contact_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('staff_contact_id_seq', 1, false);


--
-- Name: staff_course; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE staff_course (
    id bigint NOT NULL,
    staff_id bigint NOT NULL,
    course_id bigint NOT NULL
);


ALTER TABLE public.staff_course OWNER TO tutorplus;

--
-- Name: staff_course_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE staff_course_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.staff_course_id_seq OWNER TO tutorplus;

--
-- Name: staff_course_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE staff_course_id_seq OWNED BY staff_course.id;


--
-- Name: staff_course_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('staff_course_id_seq', 1, false);


--
-- Name: staff_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE staff_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.staff_id_seq OWNER TO tutorplus;

--
-- Name: staff_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE staff_id_seq OWNED BY staff.id;


--
-- Name: staff_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('staff_id_seq', 1, false);


--
-- Name: staff_mailing_list; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE staff_mailing_list (
    id bigint NOT NULL,
    staff_id bigint NOT NULL,
    mailing_list_id bigint NOT NULL
);


ALTER TABLE public.staff_mailing_list OWNER TO tutorplus;

--
-- Name: staff_mailing_list_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE staff_mailing_list_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.staff_mailing_list_id_seq OWNER TO tutorplus;

--
-- Name: staff_mailing_list_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE staff_mailing_list_id_seq OWNED BY staff_mailing_list.id;


--
-- Name: staff_mailing_list_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('staff_mailing_list_id_seq', 1, false);


--
-- Name: state_province; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE state_province (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    country_id bigint NOT NULL
);


ALTER TABLE public.state_province OWNER TO tutorplus;

--
-- Name: state_province_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE state_province_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.state_province_id_seq OWNER TO tutorplus;

--
-- Name: state_province_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE state_province_id_seq OWNED BY state_province.id;


--
-- Name: state_province_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('state_province_id_seq', 1, true);


--
-- Name: student; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE student (
    id bigint NOT NULL,
    user_id bigint NOT NULL,
    about character varying(500),
    middle_name character varying(200),
    date_of_birth timestamp without time zone,
    gender character varying(255),
    number character varying(255),
    high_school character varying(255),
    studied_at character varying(255),
    current_study character varying(255),
    enrollment character varying(255),
    status character varying(255),
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.student OWNER TO tutorplus;

--
-- Name: student_attendance; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE student_attendance (
    id bigint NOT NULL,
    status bigint DEFAULT 0 NOT NULL,
    attendance_id bigint NOT NULL,
    student_id bigint NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.student_attendance OWNER TO tutorplus;

--
-- Name: student_attendance_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE student_attendance_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.student_attendance_id_seq OWNER TO tutorplus;

--
-- Name: student_attendance_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE student_attendance_id_seq OWNED BY student_attendance.id;


--
-- Name: student_attendance_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('student_attendance_id_seq', 1, false);


--
-- Name: student_contact; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE student_contact (
    id bigint NOT NULL,
    email_address character varying(255),
    phone_work character varying(200),
    phone_home character varying(200),
    phone_mobile character varying(200),
    address_line_1 character varying(300),
    address_line_2 character varying(300),
    postcode character varying(10),
    city character varying(255),
    country_id bigint NOT NULL,
    state_province_id bigint NOT NULL,
    student_id bigint NOT NULL,
    postal_address_line_1 character varying(300),
    postal_address_line_2 character varying(300),
    postal_postcode character varying(10),
    postal_city character varying(255),
    postal_country_id bigint NOT NULL,
    postal_state_province_id bigint NOT NULL,
    guardian_first_name character varying(255),
    guardian_last_name character varying(255),
    guardian_email_address character varying(255),
    guardian_phone_work character varying(200),
    guardian_phone_home character varying(200),
    guardian_phone_mobile character varying(200),
    guardian_address_line_1 character varying(300),
    guardian_address_line_2 character varying(300),
    guardian_postcode character varying(10),
    guardian_city character varying(255),
    guardian_country_id bigint,
    guardian_state_province_id bigint,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.student_contact OWNER TO tutorplus;

--
-- Name: student_contact_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE student_contact_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.student_contact_id_seq OWNER TO tutorplus;

--
-- Name: student_contact_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE student_contact_id_seq OWNED BY student_contact.id;


--
-- Name: student_contact_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('student_contact_id_seq', 2, true);


--
-- Name: student_course; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE student_course (
    id bigint NOT NULL,
    student_id bigint NOT NULL,
    course_id bigint NOT NULL
);


ALTER TABLE public.student_course OWNER TO tutorplus;

--
-- Name: student_course_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE student_course_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.student_course_id_seq OWNER TO tutorplus;

--
-- Name: student_course_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE student_course_id_seq OWNED BY student_course.id;


--
-- Name: student_course_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('student_course_id_seq', 1, false);


--
-- Name: student_gradebook_item; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE student_gradebook_item (
    id bigint NOT NULL,
    points numeric(18,2) DEFAULT 0 NOT NULL,
    gradebook_item_id bigint NOT NULL,
    student_id bigint NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.student_gradebook_item OWNER TO tutorplus;

--
-- Name: student_gradebook_item_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE student_gradebook_item_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.student_gradebook_item_id_seq OWNER TO tutorplus;

--
-- Name: student_gradebook_item_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE student_gradebook_item_id_seq OWNED BY student_gradebook_item.id;


--
-- Name: student_gradebook_item_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('student_gradebook_item_id_seq', 1, false);


--
-- Name: student_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE student_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.student_id_seq OWNER TO tutorplus;

--
-- Name: student_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE student_id_seq OWNED BY student.id;


--
-- Name: student_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('student_id_seq', 6, true);


--
-- Name: student_mailing_list; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE student_mailing_list (
    id bigint NOT NULL,
    student_id bigint NOT NULL,
    mailing_list_id bigint NOT NULL
);


ALTER TABLE public.student_mailing_list OWNER TO tutorplus;

--
-- Name: student_mailing_list_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE student_mailing_list_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.student_mailing_list_id_seq OWNER TO tutorplus;

--
-- Name: student_mailing_list_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE student_mailing_list_id_seq OWNED BY student_mailing_list.id;


--
-- Name: student_mailing_list_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('student_mailing_list_id_seq', 1, false);


--
-- Name: student_program; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE student_program (
    id bigint NOT NULL,
    student_id bigint NOT NULL,
    program_id bigint NOT NULL
);


ALTER TABLE public.student_program OWNER TO tutorplus;

--
-- Name: student_program_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE student_program_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.student_program_id_seq OWNER TO tutorplus;

--
-- Name: student_program_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE student_program_id_seq OWNED BY student_program.id;


--
-- Name: student_program_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('student_program_id_seq', 1, false);


--
-- Name: user_activity_feed; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE user_activity_feed (
    id bigint NOT NULL,
    user_id bigint NOT NULL,
    activity_feed_id bigint NOT NULL
);


ALTER TABLE public.user_activity_feed OWNER TO tutorplus;

--
-- Name: user_activity_feed_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE user_activity_feed_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.user_activity_feed_id_seq OWNER TO tutorplus;

--
-- Name: user_activity_feed_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE user_activity_feed_id_seq OWNED BY user_activity_feed.id;


--
-- Name: user_activity_feed_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('user_activity_feed_id_seq', 1, false);


--
-- Name: user_calendar; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE user_calendar (
    id bigint NOT NULL,
    owner_id bigint NOT NULL,
    calendar_id bigint NOT NULL
);


ALTER TABLE public.user_calendar OWNER TO tutorplus;

--
-- Name: user_calendar_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE user_calendar_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.user_calendar_id_seq OWNER TO tutorplus;

--
-- Name: user_calendar_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE user_calendar_id_seq OWNED BY user_calendar.id;


--
-- Name: user_calendar_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('user_calendar_id_seq', 2, true);


--
-- Name: user_folder; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE user_folder (
    id bigint NOT NULL,
    user_id bigint NOT NULL,
    folder_id bigint NOT NULL
);


ALTER TABLE public.user_folder OWNER TO tutorplus;

--
-- Name: user_folder_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE user_folder_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.user_folder_id_seq OWNER TO tutorplus;

--
-- Name: user_folder_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE user_folder_id_seq OWNED BY user_folder.id;


--
-- Name: user_folder_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('user_folder_id_seq', 1, false);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY academic_period ALTER COLUMN id SET DEFAULT nextval('academic_period_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY academic_year ALTER COLUMN id SET DEFAULT nextval('academic_year_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY activity_feed ALTER COLUMN id SET DEFAULT nextval('activity_feed_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY activity_template ALTER COLUMN id SET DEFAULT nextval('activity_template_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY announcement ALTER COLUMN id SET DEFAULT nextval('announcement_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY application ALTER COLUMN id SET DEFAULT nextval('application_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY assessment_type ALTER COLUMN id SET DEFAULT nextval('assessment_type_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY assignment ALTER COLUMN id SET DEFAULT nextval('assignment_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY assignment_discussion ALTER COLUMN id SET DEFAULT nextval('assignment_discussion_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY assignment_file ALTER COLUMN id SET DEFAULT nextval('assignment_file_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY assignment_submission ALTER COLUMN id SET DEFAULT nextval('assignment_submission_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY attendance ALTER COLUMN id SET DEFAULT nextval('attendance_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY building ALTER COLUMN id SET DEFAULT nextval('building_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY calendar ALTER COLUMN id SET DEFAULT nextval('calendar_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY calendar_event ALTER COLUMN id SET DEFAULT nextval('calendar_event_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY calendar_event_attendee ALTER COLUMN id SET DEFAULT nextval('calendar_event_attendee_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY campus ALTER COLUMN id SET DEFAULT nextval('campus_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY campus_course ALTER COLUMN id SET DEFAULT nextval('campus_course_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY contact ALTER COLUMN id SET DEFAULT nextval('contact_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY country ALTER COLUMN id SET DEFAULT nextval('country_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY course ALTER COLUMN id SET DEFAULT nextval('course_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY course_activity_feed ALTER COLUMN id SET DEFAULT nextval('course_activity_feed_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY course_announcement ALTER COLUMN id SET DEFAULT nextval('course_announcement_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY course_discussion ALTER COLUMN id SET DEFAULT nextval('course_discussion_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY course_folder ALTER COLUMN id SET DEFAULT nextval('course_folder_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY course_link ALTER COLUMN id SET DEFAULT nextval('course_link_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY course_meeting_time ALTER COLUMN id SET DEFAULT nextval('course_meeting_time_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY course_reading_item ALTER COLUMN id SET DEFAULT nextval('course_reading_item_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY department ALTER COLUMN id SET DEFAULT nextval('department_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY discussion ALTER COLUMN id SET DEFAULT nextval('discussion_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY discussion_activity_feed ALTER COLUMN id SET DEFAULT nextval('discussion_activity_feed_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY discussion_member ALTER COLUMN id SET DEFAULT nextval('discussion_member_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY discussion_topic ALTER COLUMN id SET DEFAULT nextval('discussion_topic_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY discussion_topic_message ALTER COLUMN id SET DEFAULT nextval('discussion_topic_message_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY discussion_topic_reply ALTER COLUMN id SET DEFAULT nextval('discussion_topic_reply_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY email_message ALTER COLUMN id SET DEFAULT nextval('email_message_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY email_message_correspondence ALTER COLUMN id SET DEFAULT nextval('email_message_correspondence_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY email_message_reply ALTER COLUMN id SET DEFAULT nextval('email_message_reply_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY email_template ALTER COLUMN id SET DEFAULT nextval('email_template_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY faculty ALTER COLUMN id SET DEFAULT nextval('faculty_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY file ALTER COLUMN id SET DEFAULT nextval('file_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY folder ALTER COLUMN id SET DEFAULT nextval('folder_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY gradebook ALTER COLUMN id SET DEFAULT nextval('gradebook_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY gradebook_item ALTER COLUMN id SET DEFAULT nextval('gradebook_item_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY gradebook_scale ALTER COLUMN id SET DEFAULT nextval('gradebook_scale_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY instructor ALTER COLUMN id SET DEFAULT nextval('instructor_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY instructor_contact ALTER COLUMN id SET DEFAULT nextval('instructor_contact_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY instructor_course ALTER COLUMN id SET DEFAULT nextval('instructor_course_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY instructor_mailing_list ALTER COLUMN id SET DEFAULT nextval('instructor_mailing_list_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY mailing_list ALTER COLUMN id SET DEFAULT nextval('mailing_list_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY mailing_list_course ALTER COLUMN id SET DEFAULT nextval('mailing_list_course_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY mailing_list_email_message ALTER COLUMN id SET DEFAULT nextval('mailing_list_email_message_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY news ALTER COLUMN id SET DEFAULT nextval('news_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY notification_settings ALTER COLUMN id SET DEFAULT nextval('notification_settings_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY peer ALTER COLUMN id SET DEFAULT nextval('peer_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile ALTER COLUMN id SET DEFAULT nextval('profile_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_award ALTER COLUMN id SET DEFAULT nextval('profile_award_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_book ALTER COLUMN id SET DEFAULT nextval('profile_book_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_interest ALTER COLUMN id SET DEFAULT nextval('profile_interest_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_publication ALTER COLUMN id SET DEFAULT nextval('profile_publication_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_qualification ALTER COLUMN id SET DEFAULT nextval('profile_qualification_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY program ALTER COLUMN id SET DEFAULT nextval('program_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY program_level ALTER COLUMN id SET DEFAULT nextval('program_level_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY room ALTER COLUMN id SET DEFAULT nextval('room_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY sf_guard_forgot_password ALTER COLUMN id SET DEFAULT nextval('sf_guard_forgot_password_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY sf_guard_group ALTER COLUMN id SET DEFAULT nextval('sf_guard_group_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY sf_guard_permission ALTER COLUMN id SET DEFAULT nextval('sf_guard_permission_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY sf_guard_remember_key ALTER COLUMN id SET DEFAULT nextval('sf_guard_remember_key_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY sf_guard_user ALTER COLUMN id SET DEFAULT nextval('sf_guard_user_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY staff ALTER COLUMN id SET DEFAULT nextval('staff_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY staff_contact ALTER COLUMN id SET DEFAULT nextval('staff_contact_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY staff_course ALTER COLUMN id SET DEFAULT nextval('staff_course_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY staff_mailing_list ALTER COLUMN id SET DEFAULT nextval('staff_mailing_list_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY state_province ALTER COLUMN id SET DEFAULT nextval('state_province_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY student ALTER COLUMN id SET DEFAULT nextval('student_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY student_attendance ALTER COLUMN id SET DEFAULT nextval('student_attendance_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY student_contact ALTER COLUMN id SET DEFAULT nextval('student_contact_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY student_course ALTER COLUMN id SET DEFAULT nextval('student_course_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY student_gradebook_item ALTER COLUMN id SET DEFAULT nextval('student_gradebook_item_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY student_mailing_list ALTER COLUMN id SET DEFAULT nextval('student_mailing_list_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY student_program ALTER COLUMN id SET DEFAULT nextval('student_program_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY user_activity_feed ALTER COLUMN id SET DEFAULT nextval('user_activity_feed_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY user_calendar ALTER COLUMN id SET DEFAULT nextval('user_calendar_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY user_folder ALTER COLUMN id SET DEFAULT nextval('user_folder_id_seq'::regclass);


--
-- Data for Name: academic_period; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY academic_period (id, name, start_date, end_date, grades_due, max_credits, academic_year_id) FROM stdin;
\.


--
-- Data for Name: academic_year; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY academic_year (id, year_start, year_end) FROM stdin;
\.


--
-- Data for Name: activity_feed; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY activity_feed (id, user_id, replacements, activity_template_id, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: activity_template; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY activity_template (id, patterns, content, type, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: announcement; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY announcement (id, user_id, subject, message, is_published, lock_until, lock_after, created_at, updated_at, slug) FROM stdin;
\.


--
-- Data for Name: application; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY application (id, number, first_name, last_name, middle_name, email, program_id, academic_period_id, status, enquiry_date, last_activity, completed, phone_work, phone_home, phone_mobile, gender, address_line_one, address_line_two, city, postcode, state_province_id, country_id) FROM stdin;
\.


--
-- Data for Name: assessment_type; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY assessment_type (id, name, weight, course_id, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: assignment; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY assignment (id, title, assessment_type_id, description, submission, due_date, points, weight, lock_until, lock_after, notify_users, is_graded, allow_late_submission, graded_by, course_id, created_at, updated_at, slug) FROM stdin;
\.


--
-- Data for Name: assignment_discussion; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY assignment_discussion (id, assignment_id, discussion_id) FROM stdin;
\.


--
-- Data for Name: assignment_file; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY assignment_file (id, assignment_id, file_id) FROM stdin;
\.


--
-- Data for Name: assignment_submission; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY assignment_submission (id, assignment_id, generated_file, original_file, user_id, status, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: attendance; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY attendance (id, date, course_id, course_meeting_time_id, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: building; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY building (id, name, abbreviation) FROM stdin;
\.


--
-- Data for Name: calendar; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY calendar (id, name, description, is_public, type, color) FROM stdin;
1	Public calendar	Public calendar	t	2	#228822
2	Task list	Task list	t	1	#CC0066
\.


--
-- Data for Name: calendar_event; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY calendar_event (id, calendar_id, user_id, name, location, from_date, to_date, reminder, description, is_personal, notify_changes, created_at, updated_at, slug) FROM stdin;
1	1	1	Work on the reset password	Touchlab	2012-10-23 18:15:55	2012-10-23 18:15:55	0	Please work on the password reset functionality today.	t	t	2012-10-24 06:56:47	2012-10-24 06:56:47	work-on-the-reset-password
2	2	1	Work on the system emails	Touchlab	2012-10-24 18:44:05	2012-10-24 18:44:05	0	I would like to start working on all the system emails (discussions, events, courses, assignments, notifications, peers, etc)	t	t	2012-10-24 06:59:40	2012-10-24 07:01:40	work-on-the-system-emails
\.


--
-- Data for Name: calendar_event_attendee; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY calendar_event_attendee (id, calendar_event_id, user_id, status, comment, created_at, updated_at) FROM stdin;
1	1	1	0	Invited	2012-10-24 06:57:10	2012-10-24 06:57:10
2	1	2	0	Invited	2012-10-24 06:57:10	2012-10-24 06:57:10
3	1	4	0	Invited	2012-10-24 06:57:10	2012-10-24 06:57:10
4	1	5	0	Invited	2012-10-24 06:57:10	2012-10-24 06:57:10
5	1	2	0	Invited	2012-10-24 06:57:10	2012-10-24 06:57:10
6	2	4	0	Invited	2012-10-24 07:00:43	2012-10-24 07:00:43
7	2	5	0	Invited	2012-10-24 07:00:43	2012-10-24 07:00:43
\.


--
-- Data for Name: campus; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY campus (id, name, is_primary, address, city, postcode, country_id) FROM stdin;
\.


--
-- Data for Name: campus_course; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY campus_course (id, campus_id, course_id) FROM stdin;
\.


--
-- Data for Name: contact; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY contact (id, email_address, phone_work, phone_home, phone_mobile, address_line_1, address_line_2, postcode, city, country_id, state_province_id, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: country; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY country (id, name, code) FROM stdin;
1	South Africa	ZA
\.


--
-- Data for Name: course; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY course (id, name, code, department_id, description, is_finalized, academic_period_id, start_date, end_date, credits, hours, max_enrolled, created_at, updated_at, slug) FROM stdin;
\.


--
-- Data for Name: course_activity_feed; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY course_activity_feed (id, course_id, activity_feed_id) FROM stdin;
\.


--
-- Data for Name: course_announcement; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY course_announcement (id, course_id, announcement_id) FROM stdin;
\.


--
-- Data for Name: course_discussion; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY course_discussion (id, course_id, discussion_id) FROM stdin;
\.


--
-- Data for Name: course_folder; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY course_folder (id, course_id, folder_id) FROM stdin;
\.


--
-- Data for Name: course_link; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY course_link (id, name, url, course_id) FROM stdin;
\.


--
-- Data for Name: course_meeting_time; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY course_meeting_time (id, day, from_time, to_time, course_id, building_id, room_id) FROM stdin;
\.


--
-- Data for Name: course_reading_item; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY course_reading_item (id, title, author, course_id) FROM stdin;
\.


--
-- Data for Name: department; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY department (id, name, abbreviation, faculty_id) FROM stdin;
\.


--
-- Data for Name: discussion; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY discussion (id, name, user_id, description, access_level, last_visit, latest_topic_reply_id, nb_topics, nb_members, nb_replies, is_primary, created_at, updated_at, slug) FROM stdin;
1	Francois Van Der Elst's discussion wall	2	This is Francois Van Der Elst's discussion wall and if you have anything to share with him/her please post it in this discussion.	1	\N	1	3	1	2	t	2012-10-24 18:58:16	2012-10-24 18:59:18	francois-van-der-elst-s-discussion-wall
\.


--
-- Data for Name: discussion_activity_feed; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY discussion_activity_feed (id, discussion_id, activity_feed_id) FROM stdin;
\.


--
-- Data for Name: discussion_member; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY discussion_member (id, nickname, subscription_type, membership_type, posting_permission_type, status, discussion_id, user_id, is_removed, created_at, updated_at) FROM stdin;
1	francois	0	2	1	4	1	2	f	2012-10-24 18:58:16	2012-10-24 18:58:16
\.


--
-- Data for Name: discussion_topic; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY discussion_topic (id, subject, message, discussion_id, user_id, latest_topic_reply_id, nb_replies, nb_views, created_at, updated_at, slug) FROM stdin;
1	Welcome message from the TutorPlus team!	Hi fellow participants, It's a great pleasure to be part of this collaborative learning platform and be readily available to share relevant academic experiences we all have to endure in our varied normal discources. I hope we will all exhibit the same sincereness and sense of belonging in enganging with the learning materials and our peers. God bless!	1	2	1	2	0	2012-10-24 18:58:16	2012-10-24 18:59:18	welcome-message-from-the-tutorplus-team
\.


--
-- Data for Name: discussion_topic_message; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY discussion_topic_message (id, message, user_id, discussion_topic_id, created_at, updated_at) FROM stdin;
1	Something here...	2	1	2012-10-24 18:58:50	2012-10-24 18:58:50
\.


--
-- Data for Name: discussion_topic_reply; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY discussion_topic_reply (id, reply, user_id, discussion_topic_message_id, created_at, updated_at) FROM stdin;
1	What is it you're talking about?	2	1	2012-10-24 18:59:18	2012-10-24 18:59:18
\.


--
-- Data for Name: email_message; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY email_message (id, from_email, to_email, cc_email, bcc_email, email_template_id, sender_id, reply_to, subject, body, status, is_read, is_trashed, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: email_message_correspondence; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY email_message_correspondence (id, initiator_id, invitee_id, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: email_message_reply; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY email_message_reply (id, sender_id, responder_id, email_message_id, email_message_reply_id) FROM stdin;
\.


--
-- Data for Name: email_template; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY email_template (id, name, subject, description, body, from_email, to_email, cc_email, bcc_email, reply_to, is_html, is_active, created_at, updated_at, slug) FROM stdin;
\.


--
-- Data for Name: faculty; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY faculty (id, name, abbreviation) FROM stdin;
\.


--
-- Data for Name: file; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY file (id, folder_id, original_name, generated_name, mime_type, size, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: folder; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY folder (id, name, type, parent_id, created_at, updated_at, lft, rgt, level) FROM stdin;
\.


--
-- Data for Name: gradebook; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY gradebook (id, items, course_id, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: gradebook_item; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY gradebook_item (id, name, weight, gradebook_id, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: gradebook_scale; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY gradebook_scale (id, min_points, max_points, code, gradebook_id, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: instructor; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY instructor (id, user_id, about, middle_name, date_of_birth, gender, employment, is_student, high_school, studied_at, current_study, employment_start_date, employment_end_date, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: instructor_contact; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY instructor_contact (id, email_address, phone_work, phone_home, phone_mobile, address_line_1, address_line_2, postcode, city, country_id, state_province_id, instructor_id, postal_address_line_1, postal_address_line_2, postal_postcode, postal_city, postal_country_id, postal_state_province_id, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: instructor_course; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY instructor_course (id, instructor_id, course_id) FROM stdin;
\.


--
-- Data for Name: instructor_mailing_list; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY instructor_mailing_list (id, instructor_id, mailing_list_id) FROM stdin;
\.


--
-- Data for Name: mailing_list; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY mailing_list (id, name, user_id, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: mailing_list_course; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY mailing_list_course (id, mailing_list_id, course_id) FROM stdin;
\.


--
-- Data for Name: mailing_list_email_message; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY mailing_list_email_message (id, mailing_list_id, email_message_id) FROM stdin;
\.


--
-- Data for Name: news; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY news (id, user_id, heading, blurb, description, is_published, lock_until, lock_after, created_at, updated_at, slug) FROM stdin;
\.


--
-- Data for Name: notification_settings; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY notification_settings (id, can_receive_email, can_receive_reply, can_receive_peer_activities, can_receive_news_alerts, can_receive_announcement_alerts, can_receive_event_alerts, can_receive_discussion_updates, can_receive_course_updates, can_receive_assignment_due, can_receive_system_updates, can_receive_system_maintenance, user_id) FROM stdin;
1	f	f	f	f	t	t	f	f	f	f	f	4
\.


--
-- Data for Name: peer; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY peer (id, inviter_id, invitee_id, status, type) FROM stdin;
1	3	1	2	0
2	3	5	2	0
5	2	5	2	0
6	2	1	2	0
7	2	6	2	0
8	2	3	2	0
4	2	4	3	0
3	3	4	3	0
\.


--
-- Data for Name: profile; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY profile (id, user_id, about, middle_name, date_of_birth, gender, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: profile_award; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY profile_award (id, user_id, institution, description, year) FROM stdin;
\.


--
-- Data for Name: profile_book; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY profile_book (id, user_id, title, author) FROM stdin;
\.


--
-- Data for Name: profile_interest; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY profile_interest (id, user_id, name) FROM stdin;
\.


--
-- Data for Name: profile_publication; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY profile_publication (id, user_id, title, link, year) FROM stdin;
\.


--
-- Data for Name: profile_qualification; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY profile_qualification (id, user_id, institution, description, year) FROM stdin;
\.


--
-- Data for Name: program; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY program (id, name, abbreviation, code, description, type, department_id, program_level_id) FROM stdin;
\.


--
-- Data for Name: program_level; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY program_level (id, name) FROM stdin;
\.


--
-- Data for Name: room; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY room (id, name, abbreviation, building_id) FROM stdin;
\.


--
-- Data for Name: sf_guard_forgot_password; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY sf_guard_forgot_password (id, user_id, unique_key, expires_at, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: sf_guard_group; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY sf_guard_group (id, name, description, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: sf_guard_group_permission; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY sf_guard_group_permission (group_id, permission_id, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: sf_guard_permission; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY sf_guard_permission (id, name, description, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: sf_guard_remember_key; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY sf_guard_remember_key (id, user_id, remember_key, ip_address, created_at, updated_at) FROM stdin;
1	2	dtqotbruqgowk8c4kwc08kw8c4808kc	152.111.1.47	2012-10-23 18:16:16	2012-10-23 18:16:16
\.


--
-- Data for Name: sf_guard_user; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY sf_guard_user (id, first_name, last_name, email_address, username, algorithm, salt, password, is_active, is_super_admin, last_login, created_at, updated_at, slug) FROM stdin;
5	Kaykon	Dizha	tdizha@graffiti.net	kaykon	sha1	03dd51057252281c9b4618d20dfb5bd5	971952e1d561f03f5c63443196458c6990750322	t	f	\N	2012-10-23 18:57:30	2012-10-23 18:57:30	kaykon-dizha
1	Batanayi	Matuku	batanayi@tutorplus.org	batanayi	sha1	a8e66339dfbc9d808928f5d5926d3865	a29069a3b38116e3446624be72f23bb306c024a9	t	f	2012-10-24 06:46:20	2012-10-16 18:56:59	2012-10-24 06:46:20	batanayi-matuku
6	Lance	Roberts	lancemroberts@gmail.com	lance	sha1	54091c59b5e097b8a53cd8ee6ee1f7ca	e1bddb60f7180bdd166a0c78e8098f2af3a03ef8	t	f	2012-10-24 07:07:54	2012-10-24 07:06:30	2012-10-24 07:07:54	lance-roberts
3	Musavengana	Zirebwa	musaz01@gmail.com	musa	sha1	5369ebcaf05b95d227091cbe14f98856	239ab4747ec48a1c226ef87a1d5ca961174c9b5e	t	f	2012-10-24 09:53:47	2012-10-23 18:44:05	2012-10-24 09:53:47	musavengana-zirebwa
2	Francois	Van Der Elst	chapter2@gmail.com	frank	sha1	649a41304078e0be9d3ab41988298898	73f5e4ccf7c1e6536e5babf38bd7781528eb7e2c	t	f	2012-10-24 18:54:36	2012-10-23 18:15:55	2012-10-24 18:54:36	francois-van-der-elst
4	Bright	Dodo	brightdodo@gmail.com	bright	sha1	cf35bf7e24c2000074bff9460cc4aa07	28fe266875f32e243ca24ed97dcc00d5b8445c99	t	f	2012-10-25 15:22:25	2012-10-23 18:49:55	2012-10-25 15:22:25	bright-dodo
\.


--
-- Data for Name: sf_guard_user_group; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY sf_guard_user_group (user_id, group_id, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: sf_guard_user_permission; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY sf_guard_user_permission (user_id, permission_id, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: staff; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY staff (id, user_id, about, middle_name, date_of_birth, gender, employment, is_student, employment_start_date, employment_end_date, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: staff_contact; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY staff_contact (id, email_address, phone_work, phone_home, phone_mobile, address_line_1, address_line_2, postcode, city, country_id, state_province_id, staff_id, postal_address_line_1, postal_address_line_2, postal_postcode, postal_city, postal_country_id, postal_state_province_id, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: staff_course; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY staff_course (id, staff_id, course_id) FROM stdin;
\.


--
-- Data for Name: staff_mailing_list; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY staff_mailing_list (id, staff_id, mailing_list_id) FROM stdin;
\.


--
-- Data for Name: state_province; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY state_province (id, name, country_id) FROM stdin;
1	Western Cape	1
\.


--
-- Data for Name: student; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY student (id, user_id, about, middle_name, date_of_birth, gender, number, high_school, studied_at, current_study, enrollment, status, created_at, updated_at) FROM stdin;
1	1			1984-05-12 00:00:00	Male			University of Cape Town	UCT	Full time	Application accepted	2012-10-16 18:56:59	2012-10-16 18:56:59
2	2	\N	\N	2012-10-23 18:15:55	\N	\N	\N	\N	\N	\N	1	2012-10-23 18:15:55	2012-10-23 18:15:55
3	3	\N	\N	2012-10-23 18:44:05	\N	\N	\N	\N	\N	\N	1	2012-10-23 18:44:05	2012-10-23 18:44:05
4	4	\N	\N	2012-10-23 18:49:55	\N	\N	\N	\N	\N	\N	1	2012-10-23 18:49:55	2012-10-23 18:49:55
5	5	\N	\N	2012-10-23 18:57:30	\N	\N	\N	\N	\N	\N	1	2012-10-23 18:57:30	2012-10-23 18:57:30
6	6	\N	\N	2012-10-24 07:06:30	\N	\N	\N	\N	\N	\N	1	2012-10-24 07:06:30	2012-10-24 07:06:30
\.


--
-- Data for Name: student_attendance; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY student_attendance (id, status, attendance_id, student_id, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: student_contact; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY student_contact (id, email_address, phone_work, phone_home, phone_mobile, address_line_1, address_line_2, postcode, city, country_id, state_province_id, student_id, postal_address_line_1, postal_address_line_2, postal_postcode, postal_city, postal_country_id, postal_state_province_id, guardian_first_name, guardian_last_name, guardian_email_address, guardian_phone_work, guardian_phone_home, guardian_phone_mobile, guardian_address_line_1, guardian_address_line_2, guardian_postcode, guardian_city, guardian_country_id, guardian_state_province_id, created_at, updated_at) FROM stdin;
2	\N	\N	\N	\N	\N	\N	\N	\N	1	1	3	\N	\N	\N	\N	1	1	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	1	1	2012-10-24 19:02:40	2012-10-24 19:02:40
\.


--
-- Data for Name: student_course; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY student_course (id, student_id, course_id) FROM stdin;
\.


--
-- Data for Name: student_gradebook_item; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY student_gradebook_item (id, points, gradebook_item_id, student_id, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: student_mailing_list; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY student_mailing_list (id, student_id, mailing_list_id) FROM stdin;
\.


--
-- Data for Name: student_program; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY student_program (id, student_id, program_id) FROM stdin;
\.


--
-- Data for Name: user_activity_feed; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY user_activity_feed (id, user_id, activity_feed_id) FROM stdin;
\.


--
-- Data for Name: user_calendar; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY user_calendar (id, owner_id, calendar_id) FROM stdin;
1	1	1
2	1	2
\.


--
-- Data for Name: user_folder; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY user_folder (id, user_id, folder_id) FROM stdin;
\.


--
-- Name: academic_period_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY academic_period
    ADD CONSTRAINT academic_period_pkey PRIMARY KEY (id);


--
-- Name: academic_year_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY academic_year
    ADD CONSTRAINT academic_year_pkey PRIMARY KEY (id);


--
-- Name: activity_feed_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY activity_feed
    ADD CONSTRAINT activity_feed_pkey PRIMARY KEY (id);


--
-- Name: activity_template_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY activity_template
    ADD CONSTRAINT activity_template_pkey PRIMARY KEY (id);


--
-- Name: announcement_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY announcement
    ADD CONSTRAINT announcement_pkey PRIMARY KEY (id);


--
-- Name: application_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY application
    ADD CONSTRAINT application_pkey PRIMARY KEY (id);


--
-- Name: assessment_type_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY assessment_type
    ADD CONSTRAINT assessment_type_pkey PRIMARY KEY (id);


--
-- Name: assignment_discussion_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY assignment_discussion
    ADD CONSTRAINT assignment_discussion_pkey PRIMARY KEY (id);


--
-- Name: assignment_file_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY assignment_file
    ADD CONSTRAINT assignment_file_pkey PRIMARY KEY (id);


--
-- Name: assignment_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY assignment
    ADD CONSTRAINT assignment_pkey PRIMARY KEY (id);


--
-- Name: assignment_submission_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY assignment_submission
    ADD CONSTRAINT assignment_submission_pkey PRIMARY KEY (id);


--
-- Name: attendance_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY attendance
    ADD CONSTRAINT attendance_pkey PRIMARY KEY (id);


--
-- Name: building_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY building
    ADD CONSTRAINT building_pkey PRIMARY KEY (id);


--
-- Name: calendar_event_attendee_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY calendar_event_attendee
    ADD CONSTRAINT calendar_event_attendee_pkey PRIMARY KEY (id);


--
-- Name: calendar_event_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY calendar_event
    ADD CONSTRAINT calendar_event_pkey PRIMARY KEY (id);


--
-- Name: calendar_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY calendar
    ADD CONSTRAINT calendar_pkey PRIMARY KEY (id);


--
-- Name: campus_course_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY campus_course
    ADD CONSTRAINT campus_course_pkey PRIMARY KEY (id);


--
-- Name: campus_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY campus
    ADD CONSTRAINT campus_pkey PRIMARY KEY (id);


--
-- Name: contact_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY contact
    ADD CONSTRAINT contact_pkey PRIMARY KEY (id);


--
-- Name: country_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY country
    ADD CONSTRAINT country_pkey PRIMARY KEY (id);


--
-- Name: course_activity_feed_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY course_activity_feed
    ADD CONSTRAINT course_activity_feed_pkey PRIMARY KEY (id);


--
-- Name: course_announcement_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY course_announcement
    ADD CONSTRAINT course_announcement_pkey PRIMARY KEY (id);


--
-- Name: course_discussion_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY course_discussion
    ADD CONSTRAINT course_discussion_pkey PRIMARY KEY (id);


--
-- Name: course_folder_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY course_folder
    ADD CONSTRAINT course_folder_pkey PRIMARY KEY (id);


--
-- Name: course_link_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY course_link
    ADD CONSTRAINT course_link_pkey PRIMARY KEY (id);


--
-- Name: course_meeting_time_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY course_meeting_time
    ADD CONSTRAINT course_meeting_time_pkey PRIMARY KEY (id);


--
-- Name: course_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY course
    ADD CONSTRAINT course_pkey PRIMARY KEY (id);


--
-- Name: course_reading_item_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY course_reading_item
    ADD CONSTRAINT course_reading_item_pkey PRIMARY KEY (id);


--
-- Name: department_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY department
    ADD CONSTRAINT department_pkey PRIMARY KEY (id);


--
-- Name: discussion_activity_feed_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY discussion_activity_feed
    ADD CONSTRAINT discussion_activity_feed_pkey PRIMARY KEY (id);


--
-- Name: discussion_member_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY discussion_member
    ADD CONSTRAINT discussion_member_pkey PRIMARY KEY (id);


--
-- Name: discussion_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY discussion
    ADD CONSTRAINT discussion_pkey PRIMARY KEY (id);


--
-- Name: discussion_topic_message_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY discussion_topic_message
    ADD CONSTRAINT discussion_topic_message_pkey PRIMARY KEY (id);


--
-- Name: discussion_topic_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY discussion_topic
    ADD CONSTRAINT discussion_topic_pkey PRIMARY KEY (id);


--
-- Name: discussion_topic_reply_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY discussion_topic_reply
    ADD CONSTRAINT discussion_topic_reply_pkey PRIMARY KEY (id);


--
-- Name: email_message_correspondence_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY email_message_correspondence
    ADD CONSTRAINT email_message_correspondence_pkey PRIMARY KEY (id);


--
-- Name: email_message_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY email_message
    ADD CONSTRAINT email_message_pkey PRIMARY KEY (id);


--
-- Name: email_message_reply_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY email_message_reply
    ADD CONSTRAINT email_message_reply_pkey PRIMARY KEY (id);


--
-- Name: email_template_name_key; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY email_template
    ADD CONSTRAINT email_template_name_key UNIQUE (name);


--
-- Name: email_template_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY email_template
    ADD CONSTRAINT email_template_pkey PRIMARY KEY (id);


--
-- Name: faculty_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY faculty
    ADD CONSTRAINT faculty_pkey PRIMARY KEY (id);


--
-- Name: file_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY file
    ADD CONSTRAINT file_pkey PRIMARY KEY (id);


--
-- Name: folder_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY folder
    ADD CONSTRAINT folder_pkey PRIMARY KEY (id);


--
-- Name: gradebook_item_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY gradebook_item
    ADD CONSTRAINT gradebook_item_pkey PRIMARY KEY (id);


--
-- Name: gradebook_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY gradebook
    ADD CONSTRAINT gradebook_pkey PRIMARY KEY (id);


--
-- Name: gradebook_scale_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY gradebook_scale
    ADD CONSTRAINT gradebook_scale_pkey PRIMARY KEY (id);


--
-- Name: instructor_contact_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY instructor_contact
    ADD CONSTRAINT instructor_contact_pkey PRIMARY KEY (id);


--
-- Name: instructor_course_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY instructor_course
    ADD CONSTRAINT instructor_course_pkey PRIMARY KEY (id);


--
-- Name: instructor_mailing_list_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY instructor_mailing_list
    ADD CONSTRAINT instructor_mailing_list_pkey PRIMARY KEY (id);


--
-- Name: instructor_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY instructor
    ADD CONSTRAINT instructor_pkey PRIMARY KEY (id);


--
-- Name: mailing_list_course_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY mailing_list_course
    ADD CONSTRAINT mailing_list_course_pkey PRIMARY KEY (id);


--
-- Name: mailing_list_email_message_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY mailing_list_email_message
    ADD CONSTRAINT mailing_list_email_message_pkey PRIMARY KEY (id);


--
-- Name: mailing_list_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY mailing_list
    ADD CONSTRAINT mailing_list_pkey PRIMARY KEY (id);


--
-- Name: news_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY news
    ADD CONSTRAINT news_pkey PRIMARY KEY (id);


--
-- Name: notification_settings_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY notification_settings
    ADD CONSTRAINT notification_settings_pkey PRIMARY KEY (id);


--
-- Name: peer_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY peer
    ADD CONSTRAINT peer_pkey PRIMARY KEY (id);


--
-- Name: profile_award_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY profile_award
    ADD CONSTRAINT profile_award_pkey PRIMARY KEY (id);


--
-- Name: profile_book_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY profile_book
    ADD CONSTRAINT profile_book_pkey PRIMARY KEY (id);


--
-- Name: profile_interest_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY profile_interest
    ADD CONSTRAINT profile_interest_pkey PRIMARY KEY (id);


--
-- Name: profile_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY profile
    ADD CONSTRAINT profile_pkey PRIMARY KEY (id);


--
-- Name: profile_publication_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY profile_publication
    ADD CONSTRAINT profile_publication_pkey PRIMARY KEY (id);


--
-- Name: profile_qualification_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY profile_qualification
    ADD CONSTRAINT profile_qualification_pkey PRIMARY KEY (id);


--
-- Name: program_level_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY program_level
    ADD CONSTRAINT program_level_pkey PRIMARY KEY (id);


--
-- Name: program_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY program
    ADD CONSTRAINT program_pkey PRIMARY KEY (id);


--
-- Name: room_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY room
    ADD CONSTRAINT room_pkey PRIMARY KEY (id);


--
-- Name: sf_guard_forgot_password_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY sf_guard_forgot_password
    ADD CONSTRAINT sf_guard_forgot_password_pkey PRIMARY KEY (id);


--
-- Name: sf_guard_group_name_key; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY sf_guard_group
    ADD CONSTRAINT sf_guard_group_name_key UNIQUE (name);


--
-- Name: sf_guard_group_permission_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY sf_guard_group_permission
    ADD CONSTRAINT sf_guard_group_permission_pkey PRIMARY KEY (group_id, permission_id);


--
-- Name: sf_guard_group_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY sf_guard_group
    ADD CONSTRAINT sf_guard_group_pkey PRIMARY KEY (id);


--
-- Name: sf_guard_permission_name_key; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY sf_guard_permission
    ADD CONSTRAINT sf_guard_permission_name_key UNIQUE (name);


--
-- Name: sf_guard_permission_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY sf_guard_permission
    ADD CONSTRAINT sf_guard_permission_pkey PRIMARY KEY (id);


--
-- Name: sf_guard_remember_key_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY sf_guard_remember_key
    ADD CONSTRAINT sf_guard_remember_key_pkey PRIMARY KEY (id);


--
-- Name: sf_guard_user_email_address_key; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY sf_guard_user
    ADD CONSTRAINT sf_guard_user_email_address_key UNIQUE (email_address);


--
-- Name: sf_guard_user_group_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY sf_guard_user_group
    ADD CONSTRAINT sf_guard_user_group_pkey PRIMARY KEY (user_id, group_id);


--
-- Name: sf_guard_user_permission_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY sf_guard_user_permission
    ADD CONSTRAINT sf_guard_user_permission_pkey PRIMARY KEY (user_id, permission_id);


--
-- Name: sf_guard_user_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY sf_guard_user
    ADD CONSTRAINT sf_guard_user_pkey PRIMARY KEY (id);


--
-- Name: sf_guard_user_username_key; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY sf_guard_user
    ADD CONSTRAINT sf_guard_user_username_key UNIQUE (username);


--
-- Name: staff_contact_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY staff_contact
    ADD CONSTRAINT staff_contact_pkey PRIMARY KEY (id);


--
-- Name: staff_course_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY staff_course
    ADD CONSTRAINT staff_course_pkey PRIMARY KEY (id);


--
-- Name: staff_mailing_list_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY staff_mailing_list
    ADD CONSTRAINT staff_mailing_list_pkey PRIMARY KEY (id);


--
-- Name: staff_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY staff
    ADD CONSTRAINT staff_pkey PRIMARY KEY (id);


--
-- Name: state_province_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY state_province
    ADD CONSTRAINT state_province_pkey PRIMARY KEY (id);


--
-- Name: student_attendance_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY student_attendance
    ADD CONSTRAINT student_attendance_pkey PRIMARY KEY (id);


--
-- Name: student_contact_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY student_contact
    ADD CONSTRAINT student_contact_pkey PRIMARY KEY (id);


--
-- Name: student_course_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY student_course
    ADD CONSTRAINT student_course_pkey PRIMARY KEY (id);


--
-- Name: student_gradebook_item_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY student_gradebook_item
    ADD CONSTRAINT student_gradebook_item_pkey PRIMARY KEY (id);


--
-- Name: student_mailing_list_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY student_mailing_list
    ADD CONSTRAINT student_mailing_list_pkey PRIMARY KEY (id);


--
-- Name: student_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY student
    ADD CONSTRAINT student_pkey PRIMARY KEY (id);


--
-- Name: student_program_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY student_program
    ADD CONSTRAINT student_program_pkey PRIMARY KEY (id);


--
-- Name: user_activity_feed_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY user_activity_feed
    ADD CONSTRAINT user_activity_feed_pkey PRIMARY KEY (id);


--
-- Name: user_calendar_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY user_calendar
    ADD CONSTRAINT user_calendar_pkey PRIMARY KEY (id);


--
-- Name: user_folder_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY user_folder
    ADD CONSTRAINT user_folder_pkey PRIMARY KEY (id);


--
-- Name: announcement_sluggable; Type: INDEX; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE UNIQUE INDEX announcement_sluggable ON announcement USING btree (slug);


--
-- Name: assignment_sluggable; Type: INDEX; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE UNIQUE INDEX assignment_sluggable ON assignment USING btree (slug);


--
-- Name: calendar_event_sluggable; Type: INDEX; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE UNIQUE INDEX calendar_event_sluggable ON calendar_event USING btree (slug);


--
-- Name: course_sluggable; Type: INDEX; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE UNIQUE INDEX course_sluggable ON course USING btree (slug, code, name);


--
-- Name: discussion_sluggable; Type: INDEX; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE UNIQUE INDEX discussion_sluggable ON discussion USING btree (slug);


--
-- Name: discussion_topic_sluggable; Type: INDEX; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE UNIQUE INDEX discussion_topic_sluggable ON discussion_topic USING btree (slug);


--
-- Name: email_template_sluggable; Type: INDEX; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE UNIQUE INDEX email_template_sluggable ON email_template USING btree (slug, name);


--
-- Name: folderfile; Type: INDEX; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE UNIQUE INDEX folderfile ON file USING btree (folder_id, original_name);


--
-- Name: is_active_idx; Type: INDEX; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE INDEX is_active_idx ON sf_guard_user USING btree (is_active);


--
-- Name: news_sluggable; Type: INDEX; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE UNIQUE INDEX news_sluggable ON news USING btree (slug);


--
-- Name: sf_guard_user_sluggable; Type: INDEX; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE UNIQUE INDEX sf_guard_user_sluggable ON sf_guard_user USING btree (slug, first_name, last_name);


--
-- Name: academic_period_academic_year_id_academic_year_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY academic_period
    ADD CONSTRAINT academic_period_academic_year_id_academic_year_id FOREIGN KEY (academic_year_id) REFERENCES academic_year(id);


--
-- Name: activity_feed_activity_template_id_activity_template_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY activity_feed
    ADD CONSTRAINT activity_feed_activity_template_id_activity_template_id FOREIGN KEY (activity_template_id) REFERENCES activity_template(id) ON DELETE CASCADE;


--
-- Name: activity_feed_user_id_sf_guard_user_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY activity_feed
    ADD CONSTRAINT activity_feed_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;


--
-- Name: announcement_user_id_sf_guard_user_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY announcement
    ADD CONSTRAINT announcement_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;


--
-- Name: application_academic_period_id_academic_period_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY application
    ADD CONSTRAINT application_academic_period_id_academic_period_id FOREIGN KEY (academic_period_id) REFERENCES academic_period(id);


--
-- Name: application_country_id_country_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY application
    ADD CONSTRAINT application_country_id_country_id FOREIGN KEY (country_id) REFERENCES country(id);


--
-- Name: application_program_id_program_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY application
    ADD CONSTRAINT application_program_id_program_id FOREIGN KEY (program_id) REFERENCES program(id);


--
-- Name: assessment_type_course_id_course_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY assessment_type
    ADD CONSTRAINT assessment_type_course_id_course_id FOREIGN KEY (course_id) REFERENCES course(id) ON DELETE CASCADE;


--
-- Name: assignment_assessment_type_id_assessment_type_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY assignment
    ADD CONSTRAINT assignment_assessment_type_id_assessment_type_id FOREIGN KEY (assessment_type_id) REFERENCES assessment_type(id);


--
-- Name: assignment_course_id_course_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY assignment
    ADD CONSTRAINT assignment_course_id_course_id FOREIGN KEY (course_id) REFERENCES course(id) ON DELETE CASCADE;


--
-- Name: assignment_discussion_discussion_id_discussion_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY assignment_discussion
    ADD CONSTRAINT assignment_discussion_discussion_id_discussion_id FOREIGN KEY (discussion_id) REFERENCES discussion(id) ON DELETE CASCADE;


--
-- Name: assignment_file_assignment_id_assignment_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY assignment_file
    ADD CONSTRAINT assignment_file_assignment_id_assignment_id FOREIGN KEY (assignment_id) REFERENCES assignment(id) ON DELETE CASCADE;


--
-- Name: assignment_file_file_id_file_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY assignment_file
    ADD CONSTRAINT assignment_file_file_id_file_id FOREIGN KEY (file_id) REFERENCES file(id) ON DELETE CASCADE;


--
-- Name: assignment_submission_assignment_id_assignment_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY assignment_submission
    ADD CONSTRAINT assignment_submission_assignment_id_assignment_id FOREIGN KEY (assignment_id) REFERENCES assignment(id) ON DELETE CASCADE;


--
-- Name: assignment_submission_user_id_sf_guard_user_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY assignment_submission
    ADD CONSTRAINT assignment_submission_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;


--
-- Name: attendance_course_id_course_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY attendance
    ADD CONSTRAINT attendance_course_id_course_id FOREIGN KEY (course_id) REFERENCES course(id) ON DELETE CASCADE;


--
-- Name: attendance_course_meeting_time_id_course_meeting_time_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY attendance
    ADD CONSTRAINT attendance_course_meeting_time_id_course_meeting_time_id FOREIGN KEY (course_meeting_time_id) REFERENCES course_meeting_time(id) ON DELETE CASCADE;


--
-- Name: calendar_event_attendee_calendar_event_id_calendar_event_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY calendar_event_attendee
    ADD CONSTRAINT calendar_event_attendee_calendar_event_id_calendar_event_id FOREIGN KEY (calendar_event_id) REFERENCES calendar_event(id);


--
-- Name: calendar_event_attendee_user_id_sf_guard_user_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY calendar_event_attendee
    ADD CONSTRAINT calendar_event_attendee_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;


--
-- Name: calendar_event_calendar_id_calendar_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY calendar_event
    ADD CONSTRAINT calendar_event_calendar_id_calendar_id FOREIGN KEY (calendar_id) REFERENCES calendar(id);


--
-- Name: calendar_event_user_id_sf_guard_user_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY calendar_event
    ADD CONSTRAINT calendar_event_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;


--
-- Name: campus_country_id_country_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY campus
    ADD CONSTRAINT campus_country_id_country_id FOREIGN KEY (country_id) REFERENCES country(id);


--
-- Name: campus_course_campus_id_campus_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY campus_course
    ADD CONSTRAINT campus_course_campus_id_campus_id FOREIGN KEY (campus_id) REFERENCES campus(id) ON DELETE CASCADE;


--
-- Name: campus_course_course_id_course_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY campus_course
    ADD CONSTRAINT campus_course_course_id_course_id FOREIGN KEY (course_id) REFERENCES course(id) ON DELETE CASCADE;


--
-- Name: contact_country_id_country_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY contact
    ADD CONSTRAINT contact_country_id_country_id FOREIGN KEY (country_id) REFERENCES country(id);


--
-- Name: contact_state_province_id_state_province_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY contact
    ADD CONSTRAINT contact_state_province_id_state_province_id FOREIGN KEY (state_province_id) REFERENCES state_province(id);


--
-- Name: course_academic_period_id_academic_period_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY course
    ADD CONSTRAINT course_academic_period_id_academic_period_id FOREIGN KEY (academic_period_id) REFERENCES academic_period(id);


--
-- Name: course_activity_feed_activity_feed_id_activity_feed_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY course_activity_feed
    ADD CONSTRAINT course_activity_feed_activity_feed_id_activity_feed_id FOREIGN KEY (activity_feed_id) REFERENCES activity_feed(id) ON DELETE CASCADE;


--
-- Name: course_activity_feed_course_id_course_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY course_activity_feed
    ADD CONSTRAINT course_activity_feed_course_id_course_id FOREIGN KEY (course_id) REFERENCES course(id) ON DELETE CASCADE;


--
-- Name: course_announcement_announcement_id_announcement_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY course_announcement
    ADD CONSTRAINT course_announcement_announcement_id_announcement_id FOREIGN KEY (announcement_id) REFERENCES announcement(id) ON DELETE CASCADE;


--
-- Name: course_announcement_course_id_course_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY course_announcement
    ADD CONSTRAINT course_announcement_course_id_course_id FOREIGN KEY (course_id) REFERENCES course(id) ON DELETE CASCADE;


--
-- Name: course_department_id_department_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY course
    ADD CONSTRAINT course_department_id_department_id FOREIGN KEY (department_id) REFERENCES department(id);


--
-- Name: course_discussion_course_id_course_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY course_discussion
    ADD CONSTRAINT course_discussion_course_id_course_id FOREIGN KEY (course_id) REFERENCES course(id) ON DELETE CASCADE;


--
-- Name: course_discussion_discussion_id_discussion_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY course_discussion
    ADD CONSTRAINT course_discussion_discussion_id_discussion_id FOREIGN KEY (discussion_id) REFERENCES discussion(id) ON DELETE CASCADE;


--
-- Name: course_folder_course_id_course_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY course_folder
    ADD CONSTRAINT course_folder_course_id_course_id FOREIGN KEY (course_id) REFERENCES course(id) ON DELETE CASCADE;


--
-- Name: course_folder_folder_id_folder_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY course_folder
    ADD CONSTRAINT course_folder_folder_id_folder_id FOREIGN KEY (folder_id) REFERENCES folder(id) ON DELETE CASCADE;


--
-- Name: course_link_course_id_course_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY course_link
    ADD CONSTRAINT course_link_course_id_course_id FOREIGN KEY (course_id) REFERENCES course(id) ON DELETE CASCADE;


--
-- Name: course_meeting_time_building_id_building_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY course_meeting_time
    ADD CONSTRAINT course_meeting_time_building_id_building_id FOREIGN KEY (building_id) REFERENCES building(id);


--
-- Name: course_meeting_time_course_id_course_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY course_meeting_time
    ADD CONSTRAINT course_meeting_time_course_id_course_id FOREIGN KEY (course_id) REFERENCES course(id) ON DELETE CASCADE;


--
-- Name: course_meeting_time_room_id_room_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY course_meeting_time
    ADD CONSTRAINT course_meeting_time_room_id_room_id FOREIGN KEY (room_id) REFERENCES room(id);


--
-- Name: course_reading_item_course_id_course_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY course_reading_item
    ADD CONSTRAINT course_reading_item_course_id_course_id FOREIGN KEY (course_id) REFERENCES course(id) ON DELETE CASCADE;


--
-- Name: dddi; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY discussion_topic_reply
    ADD CONSTRAINT dddi FOREIGN KEY (discussion_topic_message_id) REFERENCES discussion_topic_message(id) ON DELETE CASCADE;


--
-- Name: department_faculty_id_faculty_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY department
    ADD CONSTRAINT department_faculty_id_faculty_id FOREIGN KEY (faculty_id) REFERENCES faculty(id);


--
-- Name: discussion_activity_feed_activity_feed_id_activity_feed_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY discussion_activity_feed
    ADD CONSTRAINT discussion_activity_feed_activity_feed_id_activity_feed_id FOREIGN KEY (activity_feed_id) REFERENCES activity_feed(id) ON DELETE CASCADE;


--
-- Name: discussion_activity_feed_discussion_id_discussion_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY discussion_activity_feed
    ADD CONSTRAINT discussion_activity_feed_discussion_id_discussion_id FOREIGN KEY (discussion_id) REFERENCES discussion(id) ON DELETE CASCADE;


--
-- Name: discussion_latest_topic_reply_id_discussion_topic_reply_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY discussion
    ADD CONSTRAINT discussion_latest_topic_reply_id_discussion_topic_reply_id FOREIGN KEY (latest_topic_reply_id) REFERENCES discussion_topic_reply(id) ON DELETE CASCADE;


--
-- Name: discussion_member_discussion_id_discussion_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY discussion_member
    ADD CONSTRAINT discussion_member_discussion_id_discussion_id FOREIGN KEY (discussion_id) REFERENCES discussion(id) ON DELETE CASCADE;


--
-- Name: discussion_member_user_id_sf_guard_user_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY discussion_member
    ADD CONSTRAINT discussion_member_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;


--
-- Name: discussion_topic_discussion_id_discussion_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY discussion_topic
    ADD CONSTRAINT discussion_topic_discussion_id_discussion_id FOREIGN KEY (discussion_id) REFERENCES discussion(id) ON DELETE CASCADE;


--
-- Name: discussion_topic_message_discussion_topic_id_discussion_topic_i; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY discussion_topic_message
    ADD CONSTRAINT discussion_topic_message_discussion_topic_id_discussion_topic_i FOREIGN KEY (discussion_topic_id) REFERENCES discussion_topic(id) ON DELETE CASCADE;


--
-- Name: discussion_topic_message_user_id_sf_guard_user_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY discussion_topic_message
    ADD CONSTRAINT discussion_topic_message_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;


--
-- Name: discussion_topic_reply_user_id_sf_guard_user_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY discussion_topic_reply
    ADD CONSTRAINT discussion_topic_reply_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;


--
-- Name: discussion_topic_user_id_sf_guard_user_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY discussion_topic
    ADD CONSTRAINT discussion_topic_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;


--
-- Name: discussion_user_id_sf_guard_user_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY discussion
    ADD CONSTRAINT discussion_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;


--
-- Name: email_message_correspondence_initiator_id_email_message_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY email_message_correspondence
    ADD CONSTRAINT email_message_correspondence_initiator_id_email_message_id FOREIGN KEY (initiator_id) REFERENCES email_message(id) ON DELETE CASCADE;


--
-- Name: email_message_correspondence_invitee_id_email_message_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY email_message_correspondence
    ADD CONSTRAINT email_message_correspondence_invitee_id_email_message_id FOREIGN KEY (invitee_id) REFERENCES email_message(id) ON DELETE CASCADE;


--
-- Name: email_message_email_template_id_email_template_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY email_message
    ADD CONSTRAINT email_message_email_template_id_email_template_id FOREIGN KEY (email_template_id) REFERENCES email_template(id) ON DELETE CASCADE;


--
-- Name: email_message_reply_email_message_id_email_message_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY email_message_reply
    ADD CONSTRAINT email_message_reply_email_message_id_email_message_id FOREIGN KEY (email_message_id) REFERENCES email_message(id) ON DELETE CASCADE;


--
-- Name: email_message_reply_email_message_reply_id_email_message_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY email_message_reply
    ADD CONSTRAINT email_message_reply_email_message_reply_id_email_message_id FOREIGN KEY (email_message_reply_id) REFERENCES email_message(id) ON DELETE CASCADE;


--
-- Name: email_message_reply_responder_id_sf_guard_user_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY email_message_reply
    ADD CONSTRAINT email_message_reply_responder_id_sf_guard_user_id FOREIGN KEY (responder_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;


--
-- Name: email_message_reply_sender_id_sf_guard_user_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY email_message_reply
    ADD CONSTRAINT email_message_reply_sender_id_sf_guard_user_id FOREIGN KEY (sender_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;


--
-- Name: email_message_sender_id_sf_guard_user_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY email_message
    ADD CONSTRAINT email_message_sender_id_sf_guard_user_id FOREIGN KEY (sender_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;


--
-- Name: file_folder_id_folder_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY file
    ADD CONSTRAINT file_folder_id_folder_id FOREIGN KEY (folder_id) REFERENCES folder(id) ON DELETE CASCADE;


--
-- Name: gradebook_course_id_course_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY gradebook
    ADD CONSTRAINT gradebook_course_id_course_id FOREIGN KEY (course_id) REFERENCES course(id) ON DELETE CASCADE;


--
-- Name: gradebook_item_gradebook_id_gradebook_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY gradebook_item
    ADD CONSTRAINT gradebook_item_gradebook_id_gradebook_id FOREIGN KEY (gradebook_id) REFERENCES gradebook(id) ON DELETE CASCADE;


--
-- Name: gradebook_scale_gradebook_id_gradebook_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY gradebook_scale
    ADD CONSTRAINT gradebook_scale_gradebook_id_gradebook_id FOREIGN KEY (gradebook_id) REFERENCES gradebook(id) ON DELETE CASCADE;


--
-- Name: instructor_contact_country_id_country_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY instructor_contact
    ADD CONSTRAINT instructor_contact_country_id_country_id FOREIGN KEY (country_id) REFERENCES country(id);


--
-- Name: instructor_contact_instructor_id_instructor_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY instructor_contact
    ADD CONSTRAINT instructor_contact_instructor_id_instructor_id FOREIGN KEY (instructor_id) REFERENCES instructor(id) ON DELETE CASCADE;


--
-- Name: instructor_contact_postal_country_id_country_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY instructor_contact
    ADD CONSTRAINT instructor_contact_postal_country_id_country_id FOREIGN KEY (postal_country_id) REFERENCES country(id) ON DELETE CASCADE;


--
-- Name: instructor_contact_postal_state_province_id_state_province_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY instructor_contact
    ADD CONSTRAINT instructor_contact_postal_state_province_id_state_province_id FOREIGN KEY (postal_state_province_id) REFERENCES state_province(id) ON DELETE CASCADE;


--
-- Name: instructor_contact_state_province_id_state_province_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY instructor_contact
    ADD CONSTRAINT instructor_contact_state_province_id_state_province_id FOREIGN KEY (state_province_id) REFERENCES state_province(id);


--
-- Name: instructor_course_course_id_course_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY instructor_course
    ADD CONSTRAINT instructor_course_course_id_course_id FOREIGN KEY (course_id) REFERENCES course(id) ON DELETE CASCADE;


--
-- Name: instructor_course_instructor_id_instructor_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY instructor_course
    ADD CONSTRAINT instructor_course_instructor_id_instructor_id FOREIGN KEY (instructor_id) REFERENCES instructor(id) ON DELETE CASCADE;


--
-- Name: instructor_mailing_list_instructor_id_instructor_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY instructor_mailing_list
    ADD CONSTRAINT instructor_mailing_list_instructor_id_instructor_id FOREIGN KEY (instructor_id) REFERENCES instructor(id) ON DELETE CASCADE;


--
-- Name: instructor_mailing_list_mailing_list_id_mailing_list_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY instructor_mailing_list
    ADD CONSTRAINT instructor_mailing_list_mailing_list_id_mailing_list_id FOREIGN KEY (mailing_list_id) REFERENCES mailing_list(id) ON DELETE CASCADE;


--
-- Name: instructor_user_id_sf_guard_user_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY instructor
    ADD CONSTRAINT instructor_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;


--
-- Name: mailing_list_course_course_id_course_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY mailing_list_course
    ADD CONSTRAINT mailing_list_course_course_id_course_id FOREIGN KEY (course_id) REFERENCES course(id) ON DELETE CASCADE;


--
-- Name: mailing_list_course_mailing_list_id_mailing_list_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY mailing_list_course
    ADD CONSTRAINT mailing_list_course_mailing_list_id_mailing_list_id FOREIGN KEY (mailing_list_id) REFERENCES mailing_list(id) ON DELETE CASCADE;


--
-- Name: mailing_list_email_message_email_message_id_email_message_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY mailing_list_email_message
    ADD CONSTRAINT mailing_list_email_message_email_message_id_email_message_id FOREIGN KEY (email_message_id) REFERENCES email_message(id) ON DELETE CASCADE;


--
-- Name: mailing_list_email_message_mailing_list_id_mailing_list_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY mailing_list_email_message
    ADD CONSTRAINT mailing_list_email_message_mailing_list_id_mailing_list_id FOREIGN KEY (mailing_list_id) REFERENCES mailing_list(id) ON DELETE CASCADE;


--
-- Name: mailing_list_user_id_sf_guard_user_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY mailing_list
    ADD CONSTRAINT mailing_list_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;


--
-- Name: news_user_id_sf_guard_user_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY news
    ADD CONSTRAINT news_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;


--
-- Name: notification_settings_user_id_sf_guard_user_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY notification_settings
    ADD CONSTRAINT notification_settings_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;


--
-- Name: peer_invitee_id_sf_guard_user_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY peer
    ADD CONSTRAINT peer_invitee_id_sf_guard_user_id FOREIGN KEY (invitee_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;


--
-- Name: peer_inviter_id_sf_guard_user_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY peer
    ADD CONSTRAINT peer_inviter_id_sf_guard_user_id FOREIGN KEY (inviter_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;


--
-- Name: profile_award_user_id_sf_guard_user_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_award
    ADD CONSTRAINT profile_award_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;


--
-- Name: profile_book_user_id_sf_guard_user_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_book
    ADD CONSTRAINT profile_book_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;


--
-- Name: profile_interest_user_id_sf_guard_user_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_interest
    ADD CONSTRAINT profile_interest_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;


--
-- Name: profile_publication_user_id_sf_guard_user_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_publication
    ADD CONSTRAINT profile_publication_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;


--
-- Name: profile_qualification_user_id_sf_guard_user_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_qualification
    ADD CONSTRAINT profile_qualification_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;


--
-- Name: profile_user_id_sf_guard_user_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile
    ADD CONSTRAINT profile_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;


--
-- Name: program_department_id_department_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY program
    ADD CONSTRAINT program_department_id_department_id FOREIGN KEY (department_id) REFERENCES department(id);


--
-- Name: program_program_level_id_program_level_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY program
    ADD CONSTRAINT program_program_level_id_program_level_id FOREIGN KEY (program_level_id) REFERENCES program_level(id);


--
-- Name: room_building_id_building_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY room
    ADD CONSTRAINT room_building_id_building_id FOREIGN KEY (building_id) REFERENCES building(id);


--
-- Name: sf_guard_forgot_password_user_id_sf_guard_user_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY sf_guard_forgot_password
    ADD CONSTRAINT sf_guard_forgot_password_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;


--
-- Name: sf_guard_group_permission_group_id_sf_guard_group_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY sf_guard_group_permission
    ADD CONSTRAINT sf_guard_group_permission_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;


--
-- Name: sf_guard_group_permission_permission_id_sf_guard_permission_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY sf_guard_group_permission
    ADD CONSTRAINT sf_guard_group_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;


--
-- Name: sf_guard_remember_key_user_id_sf_guard_user_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY sf_guard_remember_key
    ADD CONSTRAINT sf_guard_remember_key_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;


--
-- Name: sf_guard_user_group_group_id_sf_guard_group_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY sf_guard_user_group
    ADD CONSTRAINT sf_guard_user_group_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;


--
-- Name: sf_guard_user_group_user_id_sf_guard_user_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY sf_guard_user_group
    ADD CONSTRAINT sf_guard_user_group_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;


--
-- Name: sf_guard_user_permission_permission_id_sf_guard_permission_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY sf_guard_user_permission
    ADD CONSTRAINT sf_guard_user_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;


--
-- Name: sf_guard_user_permission_user_id_sf_guard_user_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY sf_guard_user_permission
    ADD CONSTRAINT sf_guard_user_permission_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;


--
-- Name: staff_contact_country_id_country_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY staff_contact
    ADD CONSTRAINT staff_contact_country_id_country_id FOREIGN KEY (country_id) REFERENCES country(id);


--
-- Name: staff_contact_postal_country_id_country_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY staff_contact
    ADD CONSTRAINT staff_contact_postal_country_id_country_id FOREIGN KEY (postal_country_id) REFERENCES country(id) ON DELETE CASCADE;


--
-- Name: staff_contact_postal_state_province_id_state_province_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY staff_contact
    ADD CONSTRAINT staff_contact_postal_state_province_id_state_province_id FOREIGN KEY (postal_state_province_id) REFERENCES state_province(id) ON DELETE CASCADE;


--
-- Name: staff_contact_staff_id_staff_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY staff_contact
    ADD CONSTRAINT staff_contact_staff_id_staff_id FOREIGN KEY (staff_id) REFERENCES staff(id) ON DELETE CASCADE;


--
-- Name: staff_contact_state_province_id_state_province_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY staff_contact
    ADD CONSTRAINT staff_contact_state_province_id_state_province_id FOREIGN KEY (state_province_id) REFERENCES state_province(id);


--
-- Name: staff_course_course_id_course_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY staff_course
    ADD CONSTRAINT staff_course_course_id_course_id FOREIGN KEY (course_id) REFERENCES course(id) ON DELETE CASCADE;


--
-- Name: staff_course_staff_id_staff_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY staff_course
    ADD CONSTRAINT staff_course_staff_id_staff_id FOREIGN KEY (staff_id) REFERENCES staff(id) ON DELETE CASCADE;


--
-- Name: staff_mailing_list_mailing_list_id_mailing_list_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY staff_mailing_list
    ADD CONSTRAINT staff_mailing_list_mailing_list_id_mailing_list_id FOREIGN KEY (mailing_list_id) REFERENCES mailing_list(id) ON DELETE CASCADE;


--
-- Name: staff_mailing_list_staff_id_staff_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY staff_mailing_list
    ADD CONSTRAINT staff_mailing_list_staff_id_staff_id FOREIGN KEY (staff_id) REFERENCES staff(id) ON DELETE CASCADE;


--
-- Name: staff_user_id_sf_guard_user_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY staff
    ADD CONSTRAINT staff_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;


--
-- Name: state_province_country_id_country_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY state_province
    ADD CONSTRAINT state_province_country_id_country_id FOREIGN KEY (country_id) REFERENCES country(id);


--
-- Name: student_attendance_attendance_id_attendance_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY student_attendance
    ADD CONSTRAINT student_attendance_attendance_id_attendance_id FOREIGN KEY (attendance_id) REFERENCES attendance(id) ON DELETE CASCADE;


--
-- Name: student_attendance_student_id_student_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY student_attendance
    ADD CONSTRAINT student_attendance_student_id_student_id FOREIGN KEY (student_id) REFERENCES student(id) ON DELETE CASCADE;


--
-- Name: student_contact_country_id_country_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY student_contact
    ADD CONSTRAINT student_contact_country_id_country_id FOREIGN KEY (country_id) REFERENCES country(id);


--
-- Name: student_contact_guardian_country_id_country_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY student_contact
    ADD CONSTRAINT student_contact_guardian_country_id_country_id FOREIGN KEY (guardian_country_id) REFERENCES country(id) ON DELETE CASCADE;


--
-- Name: student_contact_guardian_state_province_id_state_province_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY student_contact
    ADD CONSTRAINT student_contact_guardian_state_province_id_state_province_id FOREIGN KEY (guardian_state_province_id) REFERENCES state_province(id) ON DELETE CASCADE;


--
-- Name: student_contact_postal_country_id_country_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY student_contact
    ADD CONSTRAINT student_contact_postal_country_id_country_id FOREIGN KEY (postal_country_id) REFERENCES country(id) ON DELETE CASCADE;


--
-- Name: student_contact_postal_state_province_id_state_province_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY student_contact
    ADD CONSTRAINT student_contact_postal_state_province_id_state_province_id FOREIGN KEY (postal_state_province_id) REFERENCES state_province(id) ON DELETE CASCADE;


--
-- Name: student_contact_state_province_id_state_province_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY student_contact
    ADD CONSTRAINT student_contact_state_province_id_state_province_id FOREIGN KEY (state_province_id) REFERENCES state_province(id);


--
-- Name: student_contact_student_id_student_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY student_contact
    ADD CONSTRAINT student_contact_student_id_student_id FOREIGN KEY (student_id) REFERENCES student(id) ON DELETE CASCADE;


--
-- Name: student_course_course_id_course_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY student_course
    ADD CONSTRAINT student_course_course_id_course_id FOREIGN KEY (course_id) REFERENCES course(id) ON DELETE CASCADE;


--
-- Name: student_course_student_id_student_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY student_course
    ADD CONSTRAINT student_course_student_id_student_id FOREIGN KEY (student_id) REFERENCES student(id) ON DELETE CASCADE;


--
-- Name: student_gradebook_item_gradebook_item_id_gradebook_item_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY student_gradebook_item
    ADD CONSTRAINT student_gradebook_item_gradebook_item_id_gradebook_item_id FOREIGN KEY (gradebook_item_id) REFERENCES gradebook_item(id) ON DELETE CASCADE;


--
-- Name: student_gradebook_item_student_id_student_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY student_gradebook_item
    ADD CONSTRAINT student_gradebook_item_student_id_student_id FOREIGN KEY (student_id) REFERENCES student(id) ON DELETE CASCADE;


--
-- Name: student_mailing_list_mailing_list_id_mailing_list_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY student_mailing_list
    ADD CONSTRAINT student_mailing_list_mailing_list_id_mailing_list_id FOREIGN KEY (mailing_list_id) REFERENCES mailing_list(id) ON DELETE CASCADE;


--
-- Name: student_mailing_list_student_id_student_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY student_mailing_list
    ADD CONSTRAINT student_mailing_list_student_id_student_id FOREIGN KEY (student_id) REFERENCES student(id) ON DELETE CASCADE;


--
-- Name: student_program_program_id_program_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY student_program
    ADD CONSTRAINT student_program_program_id_program_id FOREIGN KEY (program_id) REFERENCES program(id) ON DELETE CASCADE;


--
-- Name: student_program_student_id_student_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY student_program
    ADD CONSTRAINT student_program_student_id_student_id FOREIGN KEY (student_id) REFERENCES student(id) ON DELETE CASCADE;


--
-- Name: student_user_id_sf_guard_user_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY student
    ADD CONSTRAINT student_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;


--
-- Name: user_activity_feed_activity_feed_id_activity_feed_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY user_activity_feed
    ADD CONSTRAINT user_activity_feed_activity_feed_id_activity_feed_id FOREIGN KEY (activity_feed_id) REFERENCES activity_feed(id) ON DELETE CASCADE;


--
-- Name: user_activity_feed_user_id_sf_guard_user_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY user_activity_feed
    ADD CONSTRAINT user_activity_feed_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;


--
-- Name: user_calendar_calendar_id_calendar_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY user_calendar
    ADD CONSTRAINT user_calendar_calendar_id_calendar_id FOREIGN KEY (calendar_id) REFERENCES calendar(id);


--
-- Name: user_calendar_owner_id_sf_guard_user_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY user_calendar
    ADD CONSTRAINT user_calendar_owner_id_sf_guard_user_id FOREIGN KEY (owner_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;


--
-- Name: user_folder_folder_id_folder_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY user_folder
    ADD CONSTRAINT user_folder_folder_id_folder_id FOREIGN KEY (folder_id) REFERENCES folder(id) ON DELETE CASCADE;


--
-- Name: user_folder_user_id_sf_guard_user_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY user_folder
    ADD CONSTRAINT user_folder_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

