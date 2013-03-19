--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.academic_period_id_seq OWNER TO tutorplus;

--
-- Name: academic_period_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE academic_period_id_seq OWNED BY academic_period.id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.academic_year_id_seq OWNER TO tutorplus;

--
-- Name: academic_year_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE academic_year_id_seq OWNED BY academic_year.id;


--
-- Name: activity_feed; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE activity_feed (
    id bigint NOT NULL,
    profile_id bigint NOT NULL,
    item_id bigint NOT NULL,
    type bigint DEFAULT 0 NOT NULL,
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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.activity_feed_id_seq OWNER TO tutorplus;

--
-- Name: activity_feed_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE activity_feed_id_seq OWNED BY activity_feed.id;


--
-- Name: announcement; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE announcement (
    id bigint NOT NULL,
    profile_id bigint NOT NULL,
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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.announcement_id_seq OWNER TO tutorplus;

--
-- Name: announcement_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE announcement_id_seq OWNED BY announcement.id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.assessment_type_id_seq OWNER TO tutorplus;

--
-- Name: assessment_type_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE assessment_type_id_seq OWNED BY assessment_type.id;


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
-- Name: assignment_discussion_group; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE assignment_discussion_group (
    id bigint NOT NULL,
    assignment_id bigint NOT NULL,
    discussion_group_id bigint NOT NULL
);


ALTER TABLE public.assignment_discussion_group OWNER TO tutorplus;

--
-- Name: assignment_discussion_group_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE assignment_discussion_group_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.assignment_discussion_group_id_seq OWNER TO tutorplus;

--
-- Name: assignment_discussion_group_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE assignment_discussion_group_id_seq OWNED BY assignment_discussion_group.id;


--
-- Name: assignment_discussion_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE assignment_discussion_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.assignment_discussion_id_seq OWNER TO tutorplus;

--
-- Name: assignment_discussion_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE assignment_discussion_id_seq OWNED BY assignment_discussion.id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.assignment_file_id_seq OWNER TO tutorplus;

--
-- Name: assignment_file_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE assignment_file_id_seq OWNED BY assignment_file.id;


--
-- Name: assignment_group; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE assignment_group (
    id bigint NOT NULL,
    assignment_id bigint NOT NULL,
    discussion_group_id bigint NOT NULL
);


ALTER TABLE public.assignment_group OWNER TO tutorplus;

--
-- Name: assignment_group_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE assignment_group_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.assignment_group_id_seq OWNER TO tutorplus;

--
-- Name: assignment_group_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE assignment_group_id_seq OWNED BY assignment_group.id;


--
-- Name: assignment_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE assignment_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.assignment_id_seq OWNER TO tutorplus;

--
-- Name: assignment_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE assignment_id_seq OWNED BY assignment.id;


--
-- Name: assignment_submission; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE assignment_submission (
    id bigint NOT NULL,
    assignment_id bigint NOT NULL,
    generated_file character varying(255) NOT NULL,
    original_file character varying(255) NOT NULL,
    profile_id bigint NOT NULL,
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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.assignment_submission_id_seq OWNER TO tutorplus;

--
-- Name: assignment_submission_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE assignment_submission_id_seq OWNED BY assignment_submission.id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.attendance_id_seq OWNER TO tutorplus;

--
-- Name: attendance_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE attendance_id_seq OWNED BY attendance.id;


--
-- Name: building; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE building (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    abbreviation character varying(10)
);


ALTER TABLE public.building OWNER TO tutorplus;

--
-- Name: building_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE building_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.building_id_seq OWNER TO tutorplus;

--
-- Name: building_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE building_id_seq OWNED BY building.id;


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
    profile_id bigint NOT NULL,
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
    profile_id bigint NOT NULL,
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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.calendar_event_attendee_id_seq OWNER TO tutorplus;

--
-- Name: calendar_event_attendee_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE calendar_event_attendee_id_seq OWNED BY calendar_event_attendee.id;


--
-- Name: calendar_event_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE calendar_event_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.calendar_event_id_seq OWNER TO tutorplus;

--
-- Name: calendar_event_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE calendar_event_id_seq OWNED BY calendar_event.id;


--
-- Name: calendar_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE calendar_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.calendar_id_seq OWNER TO tutorplus;

--
-- Name: calendar_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE calendar_id_seq OWNED BY calendar.id;


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
    institution_id bigint NOT NULL
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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.campus_course_id_seq OWNER TO tutorplus;

--
-- Name: campus_course_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE campus_course_id_seq OWNED BY campus_course.id;


--
-- Name: campus_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE campus_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.campus_id_seq OWNER TO tutorplus;

--
-- Name: campus_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE campus_id_seq OWNED BY campus.id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.contact_id_seq OWNER TO tutorplus;

--
-- Name: contact_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE contact_id_seq OWNED BY contact.id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.country_id_seq OWNER TO tutorplus;

--
-- Name: country_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE country_id_seq OWNED BY country.id;


--
-- Name: course; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE course (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    code character varying(10) NOT NULL,
    department_id bigint NOT NULL,
    description text NOT NULL,
    background text DEFAULT 'This course has been developed collaboratively by a team of TutorPlus tutors and educationists.'::text NOT NULL,
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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.course_announcement_id_seq OWNER TO tutorplus;

--
-- Name: course_announcement_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE course_announcement_id_seq OWNED BY course_announcement.id;


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
-- Name: course_discussion_group; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE course_discussion_group (
    id bigint NOT NULL,
    course_id bigint NOT NULL,
    discussion_group_id bigint NOT NULL
);


ALTER TABLE public.course_discussion_group OWNER TO tutorplus;

--
-- Name: course_discussion_group_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE course_discussion_group_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.course_discussion_group_id_seq OWNER TO tutorplus;

--
-- Name: course_discussion_group_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE course_discussion_group_id_seq OWNED BY course_discussion_group.id;


--
-- Name: course_discussion_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE course_discussion_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.course_discussion_id_seq OWNER TO tutorplus;

--
-- Name: course_discussion_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE course_discussion_id_seq OWNED BY course_discussion.id;


--
-- Name: course_faq; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE course_faq (
    id bigint NOT NULL,
    course_id bigint NOT NULL,
    faq_id bigint NOT NULL
);


ALTER TABLE public.course_faq OWNER TO tutorplus;

--
-- Name: course_faq_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE course_faq_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.course_faq_id_seq OWNER TO tutorplus;

--
-- Name: course_faq_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE course_faq_id_seq OWNED BY course_faq.id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.course_folder_id_seq OWNER TO tutorplus;

--
-- Name: course_folder_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE course_folder_id_seq OWNED BY course_folder.id;


--
-- Name: course_group; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE course_group (
    id bigint NOT NULL,
    course_id bigint NOT NULL,
    discussion_group_id bigint NOT NULL
);


ALTER TABLE public.course_group OWNER TO tutorplus;

--
-- Name: course_group_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE course_group_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.course_group_id_seq OWNER TO tutorplus;

--
-- Name: course_group_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE course_group_id_seq OWNED BY course_group.id;


--
-- Name: course_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE course_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.course_id_seq OWNER TO tutorplus;

--
-- Name: course_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE course_id_seq OWNED BY course.id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.course_link_id_seq OWNER TO tutorplus;

--
-- Name: course_link_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE course_link_id_seq OWNED BY course_link.id;


--
-- Name: course_mailing_list; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE course_mailing_list (
    id bigint NOT NULL,
    mailing_list_id bigint NOT NULL,
    course_id bigint NOT NULL
);


ALTER TABLE public.course_mailing_list OWNER TO tutorplus;

--
-- Name: course_mailing_list_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE course_mailing_list_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.course_mailing_list_id_seq OWNER TO tutorplus;

--
-- Name: course_mailing_list_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE course_mailing_list_id_seq OWNED BY course_mailing_list.id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.course_meeting_time_id_seq OWNER TO tutorplus;

--
-- Name: course_meeting_time_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE course_meeting_time_id_seq OWNED BY course_meeting_time.id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.course_reading_item_id_seq OWNER TO tutorplus;

--
-- Name: course_reading_item_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE course_reading_item_id_seq OWNED BY course_reading_item.id;


--
-- Name: course_syllabus; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE course_syllabus (
    id bigint NOT NULL,
    content text DEFAULT 'Edit me'::text NOT NULL,
    course_id bigint NOT NULL
);


ALTER TABLE public.course_syllabus OWNER TO tutorplus;

--
-- Name: course_syllabus_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE course_syllabus_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.course_syllabus_id_seq OWNER TO tutorplus;

--
-- Name: course_syllabus_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE course_syllabus_id_seq OWNED BY course_syllabus.id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.department_id_seq OWNER TO tutorplus;

--
-- Name: department_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE department_id_seq OWNED BY department.id;


--
-- Name: discussion; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE discussion (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    profile_id bigint NOT NULL,
    description text NOT NULL,
    access_level bigint NOT NULL,
    last_visit timestamp without time zone,
    latest_comment_id bigint,
    comment_count bigint DEFAULT 0,
    post_count bigint DEFAULT 0,
    view_count bigint DEFAULT 0,
    is_primary boolean DEFAULT false,
    is_removed boolean DEFAULT false,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    slug character varying(255)
);


ALTER TABLE public.discussion OWNER TO tutorplus;

--
-- Name: discussion_comment; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE discussion_comment (
    id bigint NOT NULL,
    reply text NOT NULL,
    profile_id bigint NOT NULL,
    discussion_post_id bigint NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.discussion_comment OWNER TO tutorplus;

--
-- Name: discussion_comment_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE discussion_comment_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.discussion_comment_id_seq OWNER TO tutorplus;

--
-- Name: discussion_comment_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE discussion_comment_id_seq OWNED BY discussion_comment.id;


--
-- Name: discussion_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE discussion_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.discussion_id_seq OWNER TO tutorplus;

--
-- Name: discussion_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE discussion_id_seq OWNED BY discussion.id;


--
-- Name: discussion_peer; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE discussion_peer (
    id bigint NOT NULL,
    nickname character varying(255) NOT NULL,
    subscription_type bigint DEFAULT 0 NOT NULL,
    membership_type bigint DEFAULT 0 NOT NULL,
    status bigint DEFAULT 0 NOT NULL,
    discussion_id bigint NOT NULL,
    profile_id bigint NOT NULL,
    is_removed boolean DEFAULT false,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.discussion_peer OWNER TO tutorplus;

--
-- Name: discussion_peer_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE discussion_peer_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.discussion_peer_id_seq OWNER TO tutorplus;

--
-- Name: discussion_peer_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE discussion_peer_id_seq OWNED BY discussion_peer.id;


--
-- Name: discussion_post; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE discussion_post (
    id bigint NOT NULL,
    message text NOT NULL,
    profile_id bigint NOT NULL,
    discussion_topic_id bigint NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.discussion_post OWNER TO tutorplus;

--
-- Name: discussion_post_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE discussion_post_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.discussion_post_id_seq OWNER TO tutorplus;

--
-- Name: discussion_post_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE discussion_post_id_seq OWNED BY discussion_post.id;


--
-- Name: discussion_topic; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE discussion_topic (
    id bigint NOT NULL,
    subject character varying(255) NOT NULL,
    type character varying(255) DEFAULT 'General'::character varying NOT NULL,
    message text NOT NULL,
    discussion_id bigint NOT NULL,
    profile_id bigint NOT NULL,
    latest_comment_id bigint,
    view_count bigint DEFAULT 0,
    comment_count bigint DEFAULT 0,
    is_primary boolean DEFAULT false,
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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.discussion_topic_id_seq OWNER TO tutorplus;

--
-- Name: discussion_topic_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE discussion_topic_id_seq OWNED BY discussion_topic.id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.email_message_correspondence_id_seq OWNER TO tutorplus;

--
-- Name: email_message_correspondence_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE email_message_correspondence_id_seq OWNED BY email_message_correspondence.id;


--
-- Name: email_message_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE email_message_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.email_message_id_seq OWNER TO tutorplus;

--
-- Name: email_message_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE email_message_id_seq OWNED BY email_message.id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.email_message_reply_id_seq OWNER TO tutorplus;

--
-- Name: email_message_reply_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE email_message_reply_id_seq OWNED BY email_message_reply.id;


--
-- Name: email_template; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE email_template (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    subject character varying(5000) NOT NULL,
    description character varying(5000),
    patterns character varying(500),
    body text NOT NULL,
    from_email character varying(5000) NOT NULL,
    from_name character varying(255) DEFAULT 'Tutor+ team'::character varying NOT NULL,
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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.email_template_id_seq OWNER TO tutorplus;

--
-- Name: email_template_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE email_template_id_seq OWNED BY email_template.id;


--
-- Name: faculty; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE faculty (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    abbreviation character varying(10) NOT NULL,
    institution_id bigint NOT NULL
);


ALTER TABLE public.faculty OWNER TO tutorplus;

--
-- Name: faculty_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE faculty_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.faculty_id_seq OWNER TO tutorplus;

--
-- Name: faculty_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE faculty_id_seq OWNED BY faculty.id;


--
-- Name: faq; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE faq (
    id bigint NOT NULL,
    profile_id bigint NOT NULL,
    question character varying(255) NOT NULL,
    answer text NOT NULL,
    is_published boolean DEFAULT false NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    slug character varying(255),
    "position" bigint DEFAULT 1 NOT NULL
);


ALTER TABLE public.faq OWNER TO tutorplus;

--
-- Name: faq_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE faq_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.faq_id_seq OWNER TO tutorplus;

--
-- Name: faq_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE faq_id_seq OWNED BY faq.id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.file_id_seq OWNER TO tutorplus;

--
-- Name: file_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE file_id_seq OWNED BY file.id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.folder_id_seq OWNER TO tutorplus;

--
-- Name: folder_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE folder_id_seq OWNED BY folder.id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.gradebook_id_seq OWNER TO tutorplus;

--
-- Name: gradebook_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE gradebook_id_seq OWNED BY gradebook.id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.gradebook_item_id_seq OWNER TO tutorplus;

--
-- Name: gradebook_item_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE gradebook_item_id_seq OWNED BY gradebook_item.id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.gradebook_scale_id_seq OWNER TO tutorplus;

--
-- Name: gradebook_scale_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE gradebook_scale_id_seq OWNED BY gradebook_scale.id;


--
-- Name: institution; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE institution (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    abbreviation character varying(10) NOT NULL,
    description text NOT NULL,
    country_id bigint NOT NULL
);


ALTER TABLE public.institution OWNER TO tutorplus;

--
-- Name: institution_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE institution_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.institution_id_seq OWNER TO tutorplus;

--
-- Name: institution_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE institution_id_seq OWNED BY institution.id;


--
-- Name: mailing_list; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE mailing_list (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    profile_id bigint NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.mailing_list OWNER TO tutorplus;

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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.mailing_list_email_message_id_seq OWNER TO tutorplus;

--
-- Name: mailing_list_email_message_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE mailing_list_email_message_id_seq OWNED BY mailing_list_email_message.id;


--
-- Name: mailing_list_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE mailing_list_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.mailing_list_id_seq OWNER TO tutorplus;

--
-- Name: mailing_list_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE mailing_list_id_seq OWNED BY mailing_list.id;


--
-- Name: media_asset; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE media_asset (
    id bigint NOT NULL,
    type bigint NOT NULL,
    name character varying(255) NOT NULL,
    is_default boolean DEFAULT false,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.media_asset OWNER TO tutorplus;

--
-- Name: media_asset_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE media_asset_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.media_asset_id_seq OWNER TO tutorplus;

--
-- Name: media_asset_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE media_asset_id_seq OWNED BY media_asset.id;


--
-- Name: news_item; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE news_item (
    id bigint NOT NULL,
    profile_id bigint NOT NULL,
    heading character varying(255) NOT NULL,
    blurb text NOT NULL,
    body text NOT NULL,
    is_published boolean DEFAULT false NOT NULL,
    lock_until timestamp without time zone,
    lock_after timestamp without time zone,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    slug character varying(255)
);


ALTER TABLE public.news_item OWNER TO tutorplus;

--
-- Name: news_item_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE news_item_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.news_item_id_seq OWNER TO tutorplus;

--
-- Name: news_item_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE news_item_id_seq OWNED BY news_item.id;


--
-- Name: notification_settings; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE notification_settings (
    id bigint NOT NULL,
    email boolean DEFAULT false,
    reply boolean DEFAULT false,
    peer_activities boolean DEFAULT false,
    news_alerts boolean DEFAULT false,
    announcement_alerts boolean DEFAULT false,
    event_alerts boolean DEFAULT false,
    discussion_updates boolean DEFAULT false,
    course_updates boolean DEFAULT false,
    assignment_due boolean DEFAULT false,
    system_updates boolean DEFAULT false,
    system_maintenance boolean DEFAULT false,
    profile_id bigint NOT NULL
);


ALTER TABLE public.notification_settings OWNER TO tutorplus;

--
-- Name: notification_settings_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE notification_settings_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.notification_settings_id_seq OWNER TO tutorplus;

--
-- Name: notification_settings_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE notification_settings_id_seq OWNED BY notification_settings.id;


--
-- Name: peer; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE peer (
    id bigint NOT NULL,
    inviter_id bigint NOT NULL,
    invitee_id bigint NOT NULL,
    status bigint DEFAULT 0 NOT NULL
);


ALTER TABLE public.peer OWNER TO tutorplus;

--
-- Name: peer_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE peer_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.peer_id_seq OWNER TO tutorplus;

--
-- Name: peer_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE peer_id_seq OWNED BY peer.id;


--
-- Name: profile; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE profile (
    id bigint NOT NULL,
    first_name character varying(255),
    last_name character varying(255),
    middle_name character varying(255),
    birth_date timestamp without time zone,
    gender character varying(255),
    is_instructor boolean DEFAULT false,
    high_school character varying(255),
    studied_at character varying(255),
    current_study character varying(255),
    title character varying(255),
    email character varying(255),
    password character varying(255),
    algorithm character varying(255),
    salt character varying(255),
    is_super_admin boolean DEFAULT false,
    is_active boolean DEFAULT true,
    institution_id bigint NOT NULL,
    last_login timestamp without time zone,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    slug character varying(255),
    about_me text
);


ALTER TABLE public.profile OWNER TO tutorplus;

--
-- Name: profile_activity_feed; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE profile_activity_feed (
    id bigint NOT NULL,
    profile_id bigint NOT NULL,
    activity_feed_id bigint NOT NULL
);


ALTER TABLE public.profile_activity_feed OWNER TO tutorplus;

--
-- Name: profile_activity_feed_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE profile_activity_feed_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.profile_activity_feed_id_seq OWNER TO tutorplus;

--
-- Name: profile_activity_feed_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE profile_activity_feed_id_seq OWNED BY profile_activity_feed.id;


--
-- Name: profile_attendance; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE profile_attendance (
    id bigint NOT NULL,
    status bigint DEFAULT 0 NOT NULL,
    attendance_id bigint NOT NULL,
    profile_id bigint NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.profile_attendance OWNER TO tutorplus;

--
-- Name: profile_attendance_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE profile_attendance_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.profile_attendance_id_seq OWNER TO tutorplus;

--
-- Name: profile_attendance_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE profile_attendance_id_seq OWNED BY profile_attendance.id;


--
-- Name: profile_award; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE profile_award (
    id bigint NOT NULL,
    profile_id bigint,
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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.profile_award_id_seq OWNER TO tutorplus;

--
-- Name: profile_award_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE profile_award_id_seq OWNED BY profile_award.id;


--
-- Name: profile_book; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE profile_book (
    id bigint NOT NULL,
    profile_id bigint,
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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.profile_book_id_seq OWNER TO tutorplus;

--
-- Name: profile_book_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE profile_book_id_seq OWNED BY profile_book.id;


--
-- Name: profile_calendar; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE profile_calendar (
    id bigint NOT NULL,
    owner_id bigint NOT NULL,
    calendar_id bigint NOT NULL
);


ALTER TABLE public.profile_calendar OWNER TO tutorplus;

--
-- Name: profile_calendar_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE profile_calendar_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.profile_calendar_id_seq OWNER TO tutorplus;

--
-- Name: profile_calendar_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE profile_calendar_id_seq OWNED BY profile_calendar.id;


--
-- Name: profile_course; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE profile_course (
    id bigint NOT NULL,
    profile_id bigint NOT NULL,
    course_id bigint NOT NULL
);


ALTER TABLE public.profile_course OWNER TO tutorplus;

--
-- Name: profile_course_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE profile_course_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.profile_course_id_seq OWNER TO tutorplus;

--
-- Name: profile_course_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE profile_course_id_seq OWNED BY profile_course.id;


--
-- Name: profile_folder; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE profile_folder (
    id bigint NOT NULL,
    profile_id bigint NOT NULL,
    folder_id bigint NOT NULL
);


ALTER TABLE public.profile_folder OWNER TO tutorplus;

--
-- Name: profile_folder_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE profile_folder_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.profile_folder_id_seq OWNER TO tutorplus;

--
-- Name: profile_folder_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE profile_folder_id_seq OWNED BY profile_folder.id;


--
-- Name: profile_forgot_password; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE profile_forgot_password (
    id bigint NOT NULL,
    profile_id bigint,
    unique_key character varying(255),
    expires_at timestamp without time zone NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.profile_forgot_password OWNER TO tutorplus;

--
-- Name: profile_forgot_password_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE profile_forgot_password_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.profile_forgot_password_id_seq OWNER TO tutorplus;

--
-- Name: profile_forgot_password_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE profile_forgot_password_id_seq OWNED BY profile_forgot_password.id;


--
-- Name: profile_gradebook_item; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE profile_gradebook_item (
    id bigint NOT NULL,
    points numeric(18,2) DEFAULT 0 NOT NULL,
    gradebook_item_id bigint NOT NULL,
    profile_id bigint NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.profile_gradebook_item OWNER TO tutorplus;

--
-- Name: profile_gradebook_item_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE profile_gradebook_item_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.profile_gradebook_item_id_seq OWNER TO tutorplus;

--
-- Name: profile_gradebook_item_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE profile_gradebook_item_id_seq OWNED BY profile_gradebook_item.id;


--
-- Name: profile_group; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE profile_group (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    description character varying(1000) NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.profile_group OWNER TO tutorplus;

--
-- Name: profile_group_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE profile_group_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.profile_group_id_seq OWNER TO tutorplus;

--
-- Name: profile_group_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE profile_group_id_seq OWNED BY profile_group.id;


--
-- Name: profile_group_permission; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE profile_group_permission (
    id bigint NOT NULL,
    group_id bigint NOT NULL,
    permission_id bigint NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.profile_group_permission OWNER TO tutorplus;

--
-- Name: profile_group_permission_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE profile_group_permission_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.profile_group_permission_id_seq OWNER TO tutorplus;

--
-- Name: profile_group_permission_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE profile_group_permission_id_seq OWNED BY profile_group_permission.id;


--
-- Name: profile_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE profile_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.profile_id_seq OWNER TO tutorplus;

--
-- Name: profile_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE profile_id_seq OWNED BY profile.id;


--
-- Name: profile_interest; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE profile_interest (
    id bigint NOT NULL,
    profile_id bigint,
    name character varying(500) NOT NULL
);


ALTER TABLE public.profile_interest OWNER TO tutorplus;

--
-- Name: profile_interest_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE profile_interest_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.profile_interest_id_seq OWNER TO tutorplus;

--
-- Name: profile_interest_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE profile_interest_id_seq OWNED BY profile_interest.id;


--
-- Name: profile_permission; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE profile_permission (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    description character varying(1000) NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.profile_permission OWNER TO tutorplus;

--
-- Name: profile_permission_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE profile_permission_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.profile_permission_id_seq OWNER TO tutorplus;

--
-- Name: profile_permission_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE profile_permission_id_seq OWNED BY profile_permission.id;


--
-- Name: profile_profile_group; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE profile_profile_group (
    id bigint NOT NULL,
    profile_id bigint NOT NULL,
    group_id bigint NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.profile_profile_group OWNER TO tutorplus;

--
-- Name: profile_profile_group_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE profile_profile_group_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.profile_profile_group_id_seq OWNER TO tutorplus;

--
-- Name: profile_profile_group_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE profile_profile_group_id_seq OWNED BY profile_profile_group.id;


--
-- Name: profile_profile_permission; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE profile_profile_permission (
    id bigint NOT NULL,
    profile_id bigint NOT NULL,
    permission_id bigint NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.profile_profile_permission OWNER TO tutorplus;

--
-- Name: profile_profile_permission_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE profile_profile_permission_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.profile_profile_permission_id_seq OWNER TO tutorplus;

--
-- Name: profile_profile_permission_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE profile_profile_permission_id_seq OWNED BY profile_profile_permission.id;


--
-- Name: profile_programme; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE profile_programme (
    id bigint NOT NULL,
    profile_id bigint NOT NULL,
    program_id bigint NOT NULL
);


ALTER TABLE public.profile_programme OWNER TO tutorplus;

--
-- Name: profile_programme_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE profile_programme_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.profile_programme_id_seq OWNER TO tutorplus;

--
-- Name: profile_programme_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE profile_programme_id_seq OWNED BY profile_programme.id;


--
-- Name: profile_publication; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE profile_publication (
    id bigint NOT NULL,
    profile_id bigint,
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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.profile_publication_id_seq OWNER TO tutorplus;

--
-- Name: profile_publication_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE profile_publication_id_seq OWNED BY profile_publication.id;


--
-- Name: profile_qualification; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE profile_qualification (
    id bigint NOT NULL,
    profile_id bigint,
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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.profile_qualification_id_seq OWNER TO tutorplus;

--
-- Name: profile_qualification_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE profile_qualification_id_seq OWNED BY profile_qualification.id;


--
-- Name: profile_remember_key; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE profile_remember_key (
    id bigint NOT NULL,
    profile_id bigint,
    remember_key character varying(32),
    ip_address character varying(50),
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.profile_remember_key OWNER TO tutorplus;

--
-- Name: profile_remember_key_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE profile_remember_key_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.profile_remember_key_id_seq OWNER TO tutorplus;

--
-- Name: profile_remember_key_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE profile_remember_key_id_seq OWNED BY profile_remember_key.id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.program_id_seq OWNER TO tutorplus;

--
-- Name: program_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE program_id_seq OWNED BY program.id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.program_level_id_seq OWNER TO tutorplus;

--
-- Name: program_level_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE program_level_id_seq OWNED BY program_level.id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.room_id_seq OWNER TO tutorplus;

--
-- Name: room_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE room_id_seq OWNED BY room.id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.state_province_id_seq OWNER TO tutorplus;

--
-- Name: state_province_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE state_province_id_seq OWNED BY state_province.id;


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

ALTER TABLE ONLY announcement ALTER COLUMN id SET DEFAULT nextval('announcement_id_seq'::regclass);


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

ALTER TABLE ONLY assignment_discussion_group ALTER COLUMN id SET DEFAULT nextval('assignment_discussion_group_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY assignment_file ALTER COLUMN id SET DEFAULT nextval('assignment_file_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY assignment_group ALTER COLUMN id SET DEFAULT nextval('assignment_group_id_seq'::regclass);


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

ALTER TABLE ONLY course_announcement ALTER COLUMN id SET DEFAULT nextval('course_announcement_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY course_discussion ALTER COLUMN id SET DEFAULT nextval('course_discussion_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY course_discussion_group ALTER COLUMN id SET DEFAULT nextval('course_discussion_group_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY course_faq ALTER COLUMN id SET DEFAULT nextval('course_faq_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY course_folder ALTER COLUMN id SET DEFAULT nextval('course_folder_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY course_group ALTER COLUMN id SET DEFAULT nextval('course_group_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY course_link ALTER COLUMN id SET DEFAULT nextval('course_link_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY course_mailing_list ALTER COLUMN id SET DEFAULT nextval('course_mailing_list_id_seq'::regclass);


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

ALTER TABLE ONLY course_syllabus ALTER COLUMN id SET DEFAULT nextval('course_syllabus_id_seq'::regclass);


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

ALTER TABLE ONLY discussion_comment ALTER COLUMN id SET DEFAULT nextval('discussion_comment_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY discussion_peer ALTER COLUMN id SET DEFAULT nextval('discussion_peer_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY discussion_post ALTER COLUMN id SET DEFAULT nextval('discussion_post_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY discussion_topic ALTER COLUMN id SET DEFAULT nextval('discussion_topic_id_seq'::regclass);


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

ALTER TABLE ONLY faq ALTER COLUMN id SET DEFAULT nextval('faq_id_seq'::regclass);


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

ALTER TABLE ONLY institution ALTER COLUMN id SET DEFAULT nextval('institution_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY mailing_list ALTER COLUMN id SET DEFAULT nextval('mailing_list_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY mailing_list_email_message ALTER COLUMN id SET DEFAULT nextval('mailing_list_email_message_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY media_asset ALTER COLUMN id SET DEFAULT nextval('media_asset_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY news_item ALTER COLUMN id SET DEFAULT nextval('news_item_id_seq'::regclass);


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

ALTER TABLE ONLY profile_activity_feed ALTER COLUMN id SET DEFAULT nextval('profile_activity_feed_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_attendance ALTER COLUMN id SET DEFAULT nextval('profile_attendance_id_seq'::regclass);


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

ALTER TABLE ONLY profile_calendar ALTER COLUMN id SET DEFAULT nextval('profile_calendar_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_course ALTER COLUMN id SET DEFAULT nextval('profile_course_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_folder ALTER COLUMN id SET DEFAULT nextval('profile_folder_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_forgot_password ALTER COLUMN id SET DEFAULT nextval('profile_forgot_password_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_gradebook_item ALTER COLUMN id SET DEFAULT nextval('profile_gradebook_item_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_group ALTER COLUMN id SET DEFAULT nextval('profile_group_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_group_permission ALTER COLUMN id SET DEFAULT nextval('profile_group_permission_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_interest ALTER COLUMN id SET DEFAULT nextval('profile_interest_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_permission ALTER COLUMN id SET DEFAULT nextval('profile_permission_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_profile_group ALTER COLUMN id SET DEFAULT nextval('profile_profile_group_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_profile_permission ALTER COLUMN id SET DEFAULT nextval('profile_profile_permission_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_programme ALTER COLUMN id SET DEFAULT nextval('profile_programme_id_seq'::regclass);


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

ALTER TABLE ONLY profile_remember_key ALTER COLUMN id SET DEFAULT nextval('profile_remember_key_id_seq'::regclass);


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

ALTER TABLE ONLY state_province ALTER COLUMN id SET DEFAULT nextval('state_province_id_seq'::regclass);


--
-- Data for Name: academic_period; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY academic_period (id, name, start_date, end_date, grades_due, max_credits, academic_year_id) FROM stdin;
1	Summer	2013-01-28 00:00:00	2013-04-28 00:00:00	2013-04-28 00:00:00	400	1
\.


--
-- Name: academic_period_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('academic_period_id_seq', 1, true);


--
-- Data for Name: academic_year; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY academic_year (id, year_start, year_end) FROM stdin;
1	2013	2013
\.


--
-- Name: academic_year_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('academic_year_id_seq', 1, true);


--
-- Data for Name: activity_feed; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY activity_feed (id, profile_id, item_id, type, created_at, updated_at) FROM stdin;
149	10	307	0	2013-02-05 08:59:50	2013-02-05 08:59:50
150	10	17	6	2013-02-05 22:01:05	2013-02-05 22:01:05
151	10	18	6	2013-02-05 23:33:00	2013-02-05 23:33:00
152	10	11	7	2013-02-05 23:40:00	2013-02-05 23:40:00
153	10	4	17	2013-02-06 00:13:01	2013-02-06 00:13:01
154	10	2	17	2013-02-06 00:13:03	2013-02-06 00:13:03
155	10	3	17	2013-02-06 00:13:10	2013-02-06 00:13:10
156	10	1	17	2013-02-06 00:13:11	2013-02-06 00:13:11
157	19	309	0	2013-02-06 00:19:49	2013-02-06 00:19:49
158	19	19	6	2013-02-06 00:20:51	2013-02-06 00:20:51
162	19	312	0	2013-02-06 00:29:52	2013-02-06 00:29:52
163	19	312	1	2013-02-06 00:30:12	2013-02-06 00:30:12
164	10	313	0	2013-02-06 00:33:12	2013-02-06 00:33:12
165	10	313	1	2013-02-06 00:33:44	2013-02-06 00:33:44
166	19	314	0	2013-02-06 00:36:19	2013-02-06 00:36:19
167	19	314	1	2013-02-06 00:36:30	2013-02-06 00:36:30
168	10	315	0	2013-02-06 00:39:18	2013-02-06 00:39:18
169	19	315	1	2013-02-06 00:39:26	2013-02-06 00:39:26
170	10	316	0	2013-02-06 00:42:16	2013-02-06 00:42:16
171	10	316	1	2013-02-06 00:42:27	2013-02-06 00:42:27
172	19	317	0	2013-02-06 01:01:33	2013-02-06 01:01:33
173	19	317	1	2013-02-06 01:01:49	2013-02-06 01:01:49
174	10	18	8	2013-02-06 01:50:32	2013-02-06 01:50:32
175	10	19	8	2013-02-06 01:51:01	2013-02-06 01:51:01
176	10	20	8	2013-02-06 19:29:57	2013-02-06 19:29:57
177	10	21	8	2013-02-06 19:44:22	2013-02-06 19:44:22
178	10	29	9	2013-02-06 19:49:19	2013-02-06 19:49:19
179	10	22	8	2013-02-06 19:55:48	2013-02-06 19:55:48
180	10	30	9	2013-02-06 19:56:23	2013-02-06 19:56:23
181	10	31	9	2013-02-06 20:07:34	2013-02-06 20:07:34
182	10	2	17	2013-02-06 20:10:32	2013-02-06 20:10:32
183	10	20	6	2013-02-06 20:10:48	2013-02-06 20:10:48
184	10	21	6	2013-02-07 21:54:58	2013-02-07 21:54:58
185	10	22	6	2013-02-07 21:57:46	2013-02-07 21:57:46
186	10	23	6	2013-02-07 22:02:04	2013-02-07 22:02:04
187	10	24	6	2013-02-07 22:03:45	2013-02-07 22:03:45
188	10	25	6	2013-02-07 22:26:29	2013-02-07 22:26:29
189	10	2	18	2013-02-07 23:09:47	2013-02-07 23:09:47
190	10	2	17	2013-02-07 23:16:19	2013-02-07 23:16:19
191	10	2	18	2013-02-07 23:17:08	2013-02-07 23:17:08
192	10	2	17	2013-02-07 23:18:30	2013-02-07 23:18:30
193	10	2	18	2013-02-07 23:18:43	2013-02-07 23:18:43
194	10	2	17	2013-02-07 23:19:36	2013-02-07 23:19:36
195	10	2	18	2013-02-07 23:20:00	2013-02-07 23:20:00
196	10	2	17	2013-02-07 23:20:42	2013-02-07 23:20:42
197	10	2	17	2013-02-07 23:21:36	2013-02-07 23:21:36
198	10	2	18	2013-02-07 23:21:44	2013-02-07 23:21:44
199	10	1	18	2013-02-07 23:24:04	2013-02-07 23:24:04
200	10	1	17	2013-02-07 23:24:31	2013-02-07 23:24:31
201	10	1	18	2013-02-07 23:24:41	2013-02-07 23:24:41
202	10	1	17	2013-02-07 23:24:51	2013-02-07 23:24:51
203	10	1	18	2013-02-07 23:25:03	2013-02-07 23:25:03
204	10	1	17	2013-02-07 23:26:02	2013-02-07 23:26:02
205	10	1	18	2013-02-07 23:26:16	2013-02-07 23:26:16
206	10	1	17	2013-02-07 23:27:21	2013-02-07 23:27:21
207	10	1	18	2013-02-07 23:28:57	2013-02-07 23:28:57
208	10	1	17	2013-02-07 23:29:05	2013-02-07 23:29:05
209	10	1	18	2013-02-07 23:29:29	2013-02-07 23:29:29
210	10	1	17	2013-02-07 23:29:36	2013-02-07 23:29:36
211	10	1	18	2013-02-07 23:29:45	2013-02-07 23:29:45
212	10	1	17	2013-02-07 23:29:57	2013-02-07 23:29:57
213	10	1	18	2013-02-07 23:30:15	2013-02-07 23:30:15
214	10	1	17	2013-02-07 23:31:37	2013-02-07 23:31:37
215	10	1	18	2013-02-07 23:32:11	2013-02-07 23:32:11
216	10	1	17	2013-02-07 23:32:21	2013-02-07 23:32:21
217	10	1	18	2013-02-07 23:32:35	2013-02-07 23:32:35
218	10	1	17	2013-02-07 23:35:28	2013-02-07 23:35:28
219	14	319	0	2013-02-07 23:38:16	2013-02-07 23:38:16
220	14	26	6	2013-02-07 23:38:44	2013-02-07 23:38:44
221	14	13	7	2013-02-07 23:38:44	2013-02-07 23:38:44
222	21	322	0	2013-02-07 23:54:16	2013-02-07 23:54:16
223	22	323	0	2013-02-07 23:54:17	2013-02-07 23:54:17
224	24	324	0	2013-02-07 23:54:17	2013-02-07 23:54:17
225	17	325	0	2013-02-07 23:54:18	2013-02-07 23:54:18
226	15	326	0	2013-02-07 23:54:19	2013-02-07 23:54:19
227	21	327	0	2013-02-07 23:55:01	2013-02-07 23:55:01
228	22	328	0	2013-02-08 00:06:18	2013-02-08 00:06:18
229	24	329	0	2013-02-08 00:06:27	2013-02-08 00:06:27
230	10	318	1	2013-02-08 00:12:19	2013-02-08 00:12:19
231	10	318	1	2013-02-08 00:12:57	2013-02-08 00:12:57
232	15	331	0	2013-02-08 00:13:03	2013-02-08 00:13:03
233	17	330	0	2013-02-08 00:13:04	2013-02-08 00:13:04
234	10	318	1	2013-02-08 00:13:05	2013-02-08 00:13:05
235	13	332	0	2013-02-08 00:13:26	2013-02-08 00:13:26
236	16	333	0	2013-02-08 00:13:27	2013-02-08 00:13:27
237	11	334	0	2013-02-08 00:13:27	2013-02-08 00:13:27
238	13	335	0	2013-02-08 00:29:50	2013-02-08 00:29:50
239	16	336	0	2013-02-08 00:29:55	2013-02-08 00:29:55
240	19	4	17	2013-02-08 00:34:29	2013-02-08 00:34:29
241	19	2	17	2013-02-08 00:34:30	2013-02-08 00:34:30
242	14	338	0	2013-02-08 00:34:43	2013-02-08 00:34:43
243	10	3	18	2013-02-08 00:53:32	2013-02-08 00:53:32
244	10	3	17	2013-02-08 00:53:53	2013-02-08 00:53:53
245	10	2	17	2013-02-08 00:54:08	2013-02-08 00:54:08
246	10	4	17	2013-02-08 00:54:57	2013-02-08 00:54:57
247	10	14	7	2013-02-09 03:03:54	2013-02-09 03:03:54
248	10	15	7	2013-02-09 03:04:02	2013-02-09 03:04:02
249	10	16	7	2013-02-09 03:24:32	2013-02-09 03:24:32
250	21	27	6	2013-02-09 03:26:48	2013-02-09 03:26:48
251	21	17	7	2013-02-09 03:26:48	2013-02-09 03:26:48
252	10	32	9	2013-02-09 03:30:48	2013-02-09 03:30:48
253	10	33	9	2013-02-09 03:31:01	2013-02-09 03:31:01
254	10	34	9	2013-02-09 03:31:16	2013-02-09 03:31:16
255	10	35	9	2013-02-09 03:32:24	2013-02-09 03:32:24
256	10	23	8	2013-02-09 03:32:53	2013-02-09 03:32:53
257	10	24	8	2013-02-09 03:34:23	2013-02-09 03:34:23
258	19	28	6	2013-02-09 03:38:02	2013-02-09 03:38:02
259	10	18	7	2013-02-09 18:24:34	2013-02-09 18:24:34
260	10	19	7	2013-02-09 18:36:45	2013-02-09 18:36:45
261	10	29	6	2013-02-10 13:01:30	2013-02-10 13:01:30
262	10	30	6	2013-02-10 13:13:37	2013-02-10 13:13:37
263	10	31	6	2013-02-10 13:29:33	2013-02-10 13:29:33
264	10	32	6	2013-02-10 13:30:02	2013-02-10 13:30:02
265	10	36	9	2013-02-10 13:42:25	2013-02-10 13:42:25
266	10	37	9	2013-02-10 13:46:20	2013-02-10 13:46:20
267	19	25	8	2013-02-10 13:52:29	2013-02-10 13:52:29
268	10	26	8	2013-02-10 13:59:22	2013-02-10 13:59:22
269	10	3	18	2013-02-10 15:07:29	2013-02-10 15:07:29
270	10	3	17	2013-02-10 15:08:39	2013-02-10 15:08:39
271	10	4	18	2013-02-10 15:09:25	2013-02-10 15:09:25
272	10	3	18	2013-02-10 15:09:43	2013-02-10 15:09:43
273	23	360	0	2013-02-10 21:50:52	2013-02-10 21:50:52
274	25	361	0	2013-02-10 21:50:56	2013-02-10 21:50:56
275	20	362	0	2013-02-10 21:51:04	2013-02-10 21:51:04
276	18	363	0	2013-02-10 21:51:06	2013-02-10 21:51:06
277	10	1	18	2013-02-10 21:52:16	2013-02-10 21:52:16
278	10	1	17	2013-02-10 21:53:45	2013-02-10 21:53:45
279	10	6	4	2013-02-10 22:34:30	2013-02-10 22:34:30
280	10	7	4	2013-02-10 23:06:02	2013-02-10 23:06:02
281	10	8	4	2013-02-10 23:17:58	2013-02-10 23:17:58
282	10	9	4	2013-02-10 23:18:24	2013-02-10 23:18:24
283	10	10	4	2013-02-10 23:25:38	2013-02-10 23:25:38
284	10	33	6	2013-02-11 00:46:37	2013-02-11 00:46:37
285	24	34	6	2013-02-11 00:49:13	2013-02-11 00:49:13
286	24	20	7	2013-02-11 00:49:13	2013-02-11 00:49:13
287	10	11	4	2013-02-11 01:25:26	2013-02-11 01:25:26
288	11	337	0	2013-02-12 21:35:57	2013-02-12 21:35:57
289	10	4	17	2013-02-12 22:35:32	2013-02-12 22:35:32
290	26	35	6	2013-02-14 19:38:11	2013-02-14 19:38:11
291	26	21	7	2013-02-14 19:38:11	2013-02-14 19:38:11
292	26	2	17	2013-02-14 19:43:31	2013-02-14 19:43:31
293	19	378	0	2013-02-14 19:47:28	2013-02-14 19:47:28
294	7	389	0	2013-02-14 20:15:26	2013-02-14 20:15:26
295	9	390	0	2013-02-14 20:15:27	2013-02-14 20:15:27
296	28	36	6	2013-02-23 00:20:50	2013-02-23 00:20:50
297	28	22	7	2013-02-23 00:20:50	2013-02-23 00:20:50
298	29	37	6	2013-02-23 01:01:27	2013-02-23 01:01:27
299	29	23	7	2013-02-23 01:01:27	2013-02-23 01:01:27
300	14	399	0	2013-02-23 01:20:44	2013-02-23 01:20:44
301	22	400	0	2013-02-23 01:20:48	2013-02-23 01:20:48
302	24	401	0	2013-02-23 01:20:52	2013-02-23 01:20:52
303	29	4	17	2013-02-23 01:27:48	2013-02-23 01:27:48
304	29	404	0	2013-02-23 11:02:00	2013-02-23 11:02:00
305	26	405	0	2013-02-23 11:02:02	2013-02-23 11:02:02
306	19	3	17	2013-02-23 12:00:33	2013-02-23 12:00:33
307	19	1	17	2013-02-23 12:07:43	2013-02-23 12:07:43
308	19	4	18	2013-02-23 12:09:48	2013-02-23 12:09:48
309	19	4	17	2013-02-23 12:11:55	2013-02-23 12:11:55
310	19	4	18	2013-02-23 12:12:09	2013-02-23 12:12:09
311	19	4	17	2013-02-23 12:12:35	2013-02-23 12:12:35
312	19	4	18	2013-02-23 12:13:02	2013-02-23 12:13:02
313	19	4	17	2013-02-23 12:13:39	2013-02-23 12:13:39
314	19	4	18	2013-02-23 12:13:55	2013-02-23 12:13:55
315	19	4	17	2013-02-23 12:16:36	2013-02-23 12:16:36
316	29	408	0	2013-02-23 12:26:19	2013-02-23 12:26:19
317	20	373	0	2013-02-23 12:27:02	2013-02-23 12:27:02
318	25	374	0	2013-02-23 12:28:18	2013-02-23 12:28:18
319	23	375	0	2013-02-23 12:30:33	2013-02-23 12:30:33
320	18	376	0	2013-02-23 12:31:36	2013-02-23 12:31:36
321	7	406	0	2013-02-23 12:32:38	2013-02-23 12:32:38
322	9	407	0	2013-02-23 12:34:24	2013-02-23 12:34:24
323	19	378	1	2013-02-23 13:07:39	2013-02-23 13:07:39
324	19	4	18	2013-02-23 13:10:10	2013-02-23 13:10:10
325	19	4	17	2013-02-23 13:27:23	2013-02-23 13:27:23
326	19	4	18	2013-02-23 13:28:26	2013-02-23 13:28:26
327	19	4	17	2013-02-23 13:28:42	2013-02-23 13:28:42
328	19	4	18	2013-02-23 13:29:03	2013-02-23 13:29:03
329	27	417	0	2013-02-24 14:30:59	2013-02-24 14:30:59
330	10	27	8	2013-02-24 20:15:47	2013-02-24 20:15:47
331	10	38	9	2013-02-24 20:19:30	2013-02-24 20:19:30
332	10	3	17	2013-02-25 20:47:23	2013-02-25 20:47:23
333	10	38	6	2013-02-25 22:29:30	2013-02-25 22:29:30
334	6	39	6	2013-02-25 23:51:01	2013-02-25 23:51:01
335	6	24	7	2013-02-25 23:51:01	2013-02-25 23:51:01
336	10	25	7	2013-02-25 23:58:35	2013-02-25 23:58:35
337	10	26	7	2013-02-26 00:01:49	2013-02-26 00:01:49
338	12	419	0	2013-02-26 01:18:37	2013-02-26 01:18:37
339	28	420	0	2013-02-26 01:18:40	2013-02-26 01:18:40
340	10	1	18	2013-02-26 20:36:28	2013-02-26 20:36:28
341	10	3	18	2013-02-26 20:36:52	2013-02-26 20:36:52
342	10	2	18	2013-02-26 20:37:24	2013-02-26 20:37:24
343	10	4	18	2013-02-26 21:09:41	2013-02-26 21:09:41
344	10	3	17	2013-02-26 21:15:06	2013-02-26 21:15:06
345	10	4	17	2013-02-26 21:16:54	2013-02-26 21:16:54
346	10	2	17	2013-02-26 21:17:35	2013-02-26 21:17:35
347	10	1	17	2013-02-26 21:18:18	2013-02-26 21:18:18
348	10	5	17	2013-02-26 21:18:23	2013-02-26 21:18:23
349	10	4	18	2013-02-26 21:18:34	2013-02-26 21:18:34
350	10	2	18	2013-02-26 21:18:38	2013-02-26 21:18:38
351	10	3	18	2013-02-26 21:18:41	2013-02-26 21:18:41
352	10	4	17	2013-02-26 21:19:08	2013-02-26 21:19:08
353	10	2	17	2013-02-26 21:19:11	2013-02-26 21:19:11
354	10	3	17	2013-02-26 21:19:19	2013-02-26 21:19:19
355	10	2	18	2013-02-26 21:21:32	2013-02-26 21:21:32
356	10	4	18	2013-02-26 21:21:39	2013-02-26 21:21:39
357	10	3	18	2013-02-26 21:22:01	2013-02-26 21:22:01
358	10	4	17	2013-02-26 21:27:37	2013-02-26 21:27:37
359	10	1	18	2013-02-26 21:27:41	2013-02-26 21:27:41
360	10	4	18	2013-02-26 21:28:01	2013-02-26 21:28:01
361	10	5	18	2013-02-26 21:29:29	2013-02-26 21:29:29
362	10	5	17	2013-02-26 21:29:37	2013-02-26 21:29:37
363	10	1	17	2013-02-26 21:29:52	2013-02-26 21:29:52
364	10	3	17	2013-02-26 21:29:55	2013-02-26 21:29:55
365	10	3	18	2013-02-26 21:30:28	2013-02-26 21:30:28
366	10	2	17	2013-02-26 21:31:37	2013-02-26 21:31:37
367	10	3	17	2013-02-26 21:31:47	2013-02-26 21:31:47
368	10	4	17	2013-02-26 21:32:24	2013-02-26 21:32:24
369	10	1	18	2013-02-26 21:32:58	2013-02-26 21:32:58
370	10	2	18	2013-02-26 21:33:06	2013-02-26 21:33:06
371	10	3	18	2013-02-26 21:33:15	2013-02-26 21:33:15
372	10	2	17	2013-02-26 21:34:01	2013-02-26 21:34:01
373	10	2	18	2013-02-26 21:34:28	2013-02-26 21:34:28
374	10	1	17	2013-02-26 21:36:04	2013-02-26 21:36:04
375	10	2	17	2013-02-26 21:38:41	2013-02-26 21:38:41
376	10	1	18	2013-02-26 21:39:08	2013-02-26 21:39:08
377	10	1	17	2013-02-26 21:39:15	2013-02-26 21:39:15
378	10	4	18	2013-02-26 21:40:42	2013-02-26 21:40:42
379	10	4	17	2013-02-26 21:40:51	2013-02-26 21:40:51
380	10	2	18	2013-02-26 21:41:47	2013-02-26 21:41:47
381	10	2	17	2013-02-26 21:41:50	2013-02-26 21:41:50
382	10	2	18	2013-02-26 21:42:19	2013-02-26 21:42:19
383	10	1	18	2013-02-26 21:42:49	2013-02-26 21:42:49
384	10	5	18	2013-02-26 21:43:07	2013-02-26 21:43:07
385	10	4	18	2013-02-26 21:43:22	2013-02-26 21:43:22
386	22	40	6	2013-02-26 23:35:42	2013-02-26 23:35:42
387	22	27	7	2013-02-26 23:35:42	2013-02-26 23:35:42
388	22	328	1	2013-02-26 23:36:11	2013-02-26 23:36:11
389	22	323	1	2013-02-26 23:36:21	2013-02-26 23:36:21
390	22	400	1	2013-02-26 23:36:28	2013-02-26 23:36:28
391	10	3	17	2013-02-26 23:36:57	2013-02-26 23:36:57
392	10	2	17	2013-02-26 23:37:00	2013-02-26 23:37:00
393	10	2	18	2013-02-26 23:37:05	2013-02-26 23:37:05
394	10	2	17	2013-02-26 23:37:07	2013-02-26 23:37:07
395	10	3	18	2013-02-26 23:38:07	2013-02-26 23:38:07
396	10	3	17	2013-02-26 23:38:09	2013-02-26 23:38:09
397	10	2	18	2013-02-26 23:54:12	2013-02-26 23:54:12
398	10	1	17	2013-02-26 23:54:16	2013-02-26 23:54:16
399	10	5	17	2013-02-26 23:54:19	2013-02-26 23:54:19
400	10	4	17	2013-02-26 23:54:27	2013-02-26 23:54:27
401	10	2	17	2013-02-26 23:54:33	2013-02-26 23:54:33
402	10	4	18	2013-02-27 20:53:09	2013-02-27 20:53:09
403	13	41	6	2013-02-28 21:57:17	2013-02-28 21:57:17
404	13	28	7	2013-02-28 21:57:17	2013-02-28 21:57:17
405	10	2	18	2013-03-02 13:39:23	2013-03-02 13:39:23
406	10	1	18	2013-03-02 13:39:28	2013-03-02 13:39:28
407	10	3	18	2013-03-02 13:39:34	2013-03-02 13:39:34
408	10	5	18	2013-03-02 13:39:42	2013-03-02 13:39:42
409	10	4	17	2013-03-02 13:40:35	2013-03-02 13:40:35
410	10	2	17	2013-03-02 13:40:36	2013-03-02 13:40:36
411	10	3	17	2013-03-02 13:40:37	2013-03-02 13:40:37
412	10	3	18	2013-03-02 13:54:02	2013-03-02 13:54:02
413	10	4	18	2013-03-02 13:54:05	2013-03-02 13:54:05
414	10	2	18	2013-03-02 13:54:07	2013-03-02 13:54:07
415	10	4	17	2013-03-02 13:54:15	2013-03-02 13:54:15
416	10	2	17	2013-03-02 13:54:19	2013-03-02 13:54:19
417	10	3	17	2013-03-02 13:54:22	2013-03-02 13:54:22
418	10	4	18	2013-03-02 13:54:29	2013-03-02 13:54:29
419	10	2	18	2013-03-02 13:54:49	2013-03-02 13:54:49
420	10	3	18	2013-03-03 13:50:49	2013-03-03 13:50:49
421	10	4	17	2013-03-03 13:50:56	2013-03-03 13:50:56
422	10	4	18	2013-03-03 13:51:06	2013-03-03 13:51:06
423	10	4	17	2013-03-03 13:51:25	2013-03-03 13:51:25
424	10	4	18	2013-03-03 13:51:31	2013-03-03 13:51:31
425	10	2	17	2013-03-03 13:51:38	2013-03-03 13:51:38
426	10	3	17	2013-03-03 13:51:41	2013-03-03 13:51:41
427	10	2	18	2013-03-03 13:51:47	2013-03-03 13:51:47
428	10	3	18	2013-03-03 13:51:55	2013-03-03 13:51:55
429	10	3	17	2013-03-03 13:52:02	2013-03-03 13:52:02
430	10	1	17	2013-03-03 13:52:04	2013-03-03 13:52:04
431	10	5	17	2013-03-03 13:52:15	2013-03-03 13:52:15
432	10	4	17	2013-03-03 14:36:00	2013-03-03 14:36:00
433	10	42	6	2013-03-03 15:03:09	2013-03-03 15:03:09
434	10	29	7	2013-03-03 15:05:23	2013-03-03 15:05:23
435	10	30	7	2013-03-03 15:06:25	2013-03-03 15:06:25
436	10	31	7	2013-03-03 15:06:51	2013-03-03 15:06:51
437	10	32	7	2013-03-03 15:07:28	2013-03-03 15:07:28
438	10	33	7	2013-03-03 15:07:52	2013-03-03 15:07:52
439	19	1	6	2013-03-03 21:23:09	2013-03-03 21:23:09
440	10	1	6	2013-03-04 21:59:06	2013-03-04 21:59:06
441	10	1	7	2013-03-04 21:59:07	2013-03-04 21:59:07
442	26	2	6	2013-03-04 21:59:07	2013-03-04 21:59:07
443	26	2	7	2013-03-04 21:59:07	2013-03-04 21:59:07
444	18	4	6	2013-03-05 00:35:16	2013-03-05 00:35:16
445	18	3	7	2013-03-05 00:35:16	2013-03-05 00:35:16
446	19	5	6	2013-03-05 20:07:42	2013-03-05 20:07:42
447	19	4	7	2013-03-05 20:07:43	2013-03-05 20:07:43
448	10	6	6	2013-03-05 20:09:20	2013-03-05 20:09:20
449	10	7	6	2013-03-05 20:14:56	2013-03-05 20:14:56
450	10	8	6	2013-03-05 20:15:24	2013-03-05 20:15:24
451	10	9	6	2013-03-05 20:15:48	2013-03-05 20:15:48
452	10	10	6	2013-03-05 20:16:08	2013-03-05 20:16:08
453	10	11	6	2013-03-05 20:16:40	2013-03-05 20:16:40
454	10	12	6	2013-03-05 20:17:13	2013-03-05 20:17:13
455	10	13	6	2013-03-05 20:17:34	2013-03-05 20:17:34
456	10	14	6	2013-03-05 20:17:52	2013-03-05 20:17:52
457	10	15	6	2013-03-05 20:18:10	2013-03-05 20:18:10
458	10	16	6	2013-03-05 20:18:31	2013-03-05 20:18:31
459	10	17	6	2013-03-05 20:19:11	2013-03-05 20:19:11
460	10	18	6	2013-03-05 20:19:37	2013-03-05 20:19:37
461	10	19	6	2013-03-05 20:20:26	2013-03-05 20:20:26
462	10	20	6	2013-03-05 20:20:45	2013-03-05 20:20:45
463	10	21	6	2013-03-05 20:21:06	2013-03-05 20:21:06
464	10	22	6	2013-03-05 20:21:25	2013-03-05 20:21:25
465	10	23	6	2013-03-05 20:22:29	2013-03-05 20:22:29
466	10	24	6	2013-03-05 20:22:30	2013-03-05 20:22:30
467	10	25	6	2013-03-05 20:23:04	2013-03-05 20:23:04
468	10	26	6	2013-03-05 20:23:37	2013-03-05 20:23:37
469	10	27	6	2013-03-05 20:24:10	2013-03-05 20:24:10
470	10	28	6	2013-03-05 20:24:34	2013-03-05 20:24:34
471	10	29	6	2013-03-05 20:25:05	2013-03-05 20:25:05
472	10	30	6	2013-03-05 20:25:26	2013-03-05 20:25:26
473	10	31	6	2013-03-05 20:26:22	2013-03-05 20:26:22
474	10	32	6	2013-03-05 20:27:40	2013-03-05 20:27:40
475	10	5	7	2013-03-05 20:29:57	2013-03-05 20:29:57
476	10	6	7	2013-03-05 20:30:40	2013-03-05 20:30:40
477	10	7	7	2013-03-05 20:31:01	2013-03-05 20:31:01
478	10	8	7	2013-03-05 20:31:29	2013-03-05 20:31:29
479	10	9	7	2013-03-05 20:32:08	2013-03-05 20:32:08
480	14	33	6	2013-03-06 00:40:54	2013-03-06 00:40:54
481	14	10	7	2013-03-06 00:40:54	2013-03-06 00:40:54
482	10	3	18	2013-03-08 20:09:23	2013-03-08 20:09:23
483	10	4	18	2013-03-08 20:09:26	2013-03-08 20:09:26
484	10	1	8	2013-03-10 11:54:58	2013-03-10 11:54:58
485	10	1	9	2013-03-10 11:55:58	2013-03-10 11:55:58
486	10	2	9	2013-03-10 11:56:15	2013-03-10 11:56:15
487	10	3	9	2013-03-10 11:56:28	2013-03-10 11:56:28
488	10	4	9	2013-03-10 11:56:39	2013-03-10 11:56:39
489	10	5	9	2013-03-10 11:56:57	2013-03-10 11:56:57
490	10	6	9	2013-03-10 11:57:24	2013-03-10 11:57:24
491	10	12	4	2013-03-10 12:11:42	2013-03-10 12:11:42
492	10	13	4	2013-03-10 12:18:33	2013-03-10 12:18:33
493	17	34	6	2013-03-10 17:04:47	2013-03-10 17:04:47
494	17	11	7	2013-03-10 17:04:47	2013-03-10 17:04:47
495	25	35	6	2013-03-17 01:50:49	2013-03-17 01:50:49
496	25	12	7	2013-03-17 01:50:49	2013-03-17 01:50:49
497	10	2	17	2013-03-17 14:37:33	2013-03-17 14:37:33
498	10	4	17	2013-03-17 14:37:35	2013-03-17 14:37:35
499	10	3	17	2013-03-17 14:37:38	2013-03-17 14:37:38
500	22	36	6	2013-03-17 14:43:43	2013-03-17 14:43:43
501	22	13	7	2013-03-17 14:43:43	2013-03-17 14:43:43
502	10	2	18	2013-03-19 12:32:13	2013-03-19 12:32:13
\.


--
-- Name: activity_feed_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('activity_feed_id_seq', 502, true);


--
-- Data for Name: announcement; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY announcement (id, profile_id, subject, message, is_published, lock_until, lock_after, created_at, updated_at, slug) FROM stdin;
10	10	Week 1 - Introduction to e-learning and digital cultures	<p>This is the first week of this course and we will be introducing the course to everyone registered into this course. And everyone is expected to be available or they can watch the course videos.</p>	t	2013-06-06 00:00:00	2012-07-05 00:00:00	2013-02-10 23:25:38	2013-02-10 23:25:38	week-1-introduction-to-e-learning-and-digital-cultures
8	10	Tutorplus has been voted the best educational technological platform.	<p>TutorPlus has been voted the best learning platform of 2013. And it's with great pleasure to announce that we've been voted as the most profound and educative learning platform of all time.<br></p><p>Thanks everyone for supporting us and we would to continue achieving more understanding of our world.</p>	t	2012-05-05 00:00:00	2012-04-10 00:00:00	2013-02-10 23:17:58	2013-02-10 23:17:58	tutorplus-has-been-voted-the-best-educational-technological-platform
11	10	South African government on Education.	<p>Government should pay the legal fees of the miners injured or arrested in the Marikana shooting.<br></p>	t	2014-08-06 00:00:00	2012-07-13 00:00:00	2013-02-11 01:25:26	2013-02-11 01:25:26	south-african-government-on-education
12	10	When will this course be commencing?	<p>Well, we're just not very sure when I will be commencing offering this course, but there's a high likelihood of launching it sometime in April this year. But like always I will let you know of our plans quite in advance.</p>	t	2013-03-11 00:00:00	2013-04-09 00:00:00	2013-03-10 12:11:42	2013-03-10 12:11:42	when-will-this-course-be-commencing
13	10	The Philosophy of Money course has been voted the best online course in 2013	<p>We're proud to announce that our first course, Philosophy of Money, has been voted the best course ever produced online. And we're also making sure we continue to deliver the same quality across all our courses. As we believe the better quality give to our followers the better they will gain from our offerings in general. Thank you all.</p>	t	2012-04-04 00:00:00	2011-06-04 00:00:00	2013-03-10 12:18:33	2013-03-10 12:18:33	the-philosophy-of-money-course-has-been-voted-the-best-online-course-in-2013
\.


--
-- Name: announcement_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('announcement_id_seq', 13, true);


--
-- Data for Name: assessment_type; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY assessment_type (id, name, weight, course_id, created_at, updated_at) FROM stdin;
\.


--
-- Name: assessment_type_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('assessment_type_id_seq', 1, false);


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
-- Data for Name: assignment_discussion_group; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY assignment_discussion_group (id, assignment_id, discussion_group_id) FROM stdin;
\.


--
-- Name: assignment_discussion_group_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('assignment_discussion_group_id_seq', 1, false);


--
-- Name: assignment_discussion_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('assignment_discussion_id_seq', 1, false);


--
-- Data for Name: assignment_file; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY assignment_file (id, assignment_id, file_id) FROM stdin;
\.


--
-- Name: assignment_file_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('assignment_file_id_seq', 1, false);


--
-- Data for Name: assignment_group; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY assignment_group (id, assignment_id, discussion_group_id) FROM stdin;
\.


--
-- Name: assignment_group_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('assignment_group_id_seq', 1, false);


--
-- Name: assignment_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('assignment_id_seq', 1, false);


--
-- Data for Name: assignment_submission; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY assignment_submission (id, assignment_id, generated_file, original_file, profile_id, status, created_at, updated_at) FROM stdin;
\.


--
-- Name: assignment_submission_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('assignment_submission_id_seq', 1, false);


--
-- Data for Name: attendance; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY attendance (id, date, course_id, course_meeting_time_id, created_at, updated_at) FROM stdin;
\.


--
-- Name: attendance_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('attendance_id_seq', 1, false);


--
-- Data for Name: building; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY building (id, name, abbreviation) FROM stdin;
\.


--
-- Name: building_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('building_id_seq', 1, false);


--
-- Data for Name: calendar; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY calendar (id, name, description, is_public, type, color) FROM stdin;
1	Public calendar	Public calendar	t	2	#FF6600
\.


--
-- Data for Name: calendar_event; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY calendar_event (id, calendar_id, profile_id, name, location, from_date, to_date, reminder, description, is_personal, notify_changes, created_at, updated_at, slug) FROM stdin;
1	1	9	Christmas	Here	2013-12-25 00:00:00	2013-12-25 00:00:00	0	<p>This is the day we celebrate the birth of Jesus Christ.</p>	t	t	2013-01-12 05:45:22	2013-01-23 21:15:58	christmas
\.


--
-- Data for Name: calendar_event_attendee; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY calendar_event_attendee (id, calendar_event_id, profile_id, status, comment, created_at, updated_at) FROM stdin;
\.


--
-- Name: calendar_event_attendee_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('calendar_event_attendee_id_seq', 1, false);


--
-- Name: calendar_event_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('calendar_event_id_seq', 1, true);


--
-- Name: calendar_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('calendar_id_seq', 1, true);


--
-- Data for Name: campus; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY campus (id, name, is_primary, address, city, postcode, institution_id) FROM stdin;
\.


--
-- Data for Name: campus_course; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY campus_course (id, campus_id, course_id) FROM stdin;
\.


--
-- Name: campus_course_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('campus_course_id_seq', 1, false);


--
-- Name: campus_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('campus_id_seq', 1, false);


--
-- Data for Name: contact; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY contact (id, email_address, phone_work, phone_home, phone_mobile, address_line_1, address_line_2, postcode, city, country_id, state_province_id, created_at, updated_at) FROM stdin;
\.


--
-- Name: contact_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('contact_id_seq', 1, false);


--
-- Data for Name: country; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY country (id, name, code) FROM stdin;
1	South Africa	za
\.


--
-- Name: country_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('country_id_seq', 1, true);


--
-- Data for Name: course; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY course (id, name, code, department_id, description, background, is_finalized, academic_period_id, start_date, end_date, credits, hours, max_enrolled, created_at, updated_at, slug) FROM stdin;
4	Fundamentals of Online Education: Planning and Application	FOEPA	1	<p>In this course you will learn about the fundamentals of online education. The emphasis will be on planning&nbsp;and application. In the planning phase, you will explore online learning pedagogy, online course design,privacy and copyright issues, online assessments, managing an online class, web tools and Learning&nbsp;Management Systems. In the application phase, you will create online learning materials. The final&nbsp;project for the course will consist of you building an online course based on everything that you learned&nbsp;and created in the course.<br></p>		t	1	2011-06-04 00:00:00	2011-06-12 00:00:00	40.00	1680	2000	2013-01-10 21:27:36	2013-01-10 21:27:36	fundamentals-of-online-education-planning-and-application
2	An Introduction to Interactive Programming in Python	ABT1514	1	<p>This course is designed to help students with very little or no computing background learn the basics of building simple interactive applications.  Our language of choice, Python, is an easy-to learn, high-level computer language that is used in many of the computational courses offered on Coursera. To make learning Python easy, we have developed a new browser-based programming environment that makes developing interactive applications in Python simple.  These applications will involve windows whose contents are graphical and respond to buttons, the keyboard and the mouse. <br><br>The primary method for learning the course material will be to work through multiple "mini-projects" in Python.  To make this class enjoyable, these projects will include building fun games such as Pong, Blackjack, and Asteroids.  When you’ve finished our course, we can’t promise that you will be a professional programmer, but we think that you will learn a lot about programming in Python and have fun while you’re doing it.<br></p>		t	1	2015-06-06 00:00:00	2015-10-07 00:00:00	40.00	1680	1500	2013-01-10 21:25:00	2013-01-12 18:47:27	an-introduction-to-interactive-programming-in-python
3	Introduction to Philosophy	CRW2602	1	<p>This course will introduce you to some of the main areas of research in contemporary philosophy. Each week a different philosopher will talk you through some of the most important questions and issues in their area of expertise. We’ll begin by trying to understand what philosophy is – what are its characteristic aims and methods, and how does it differ from other subjects? Then we’ll spend the rest of the course gaining an introductory overview of several different areas of philosophy. Topics you’ll learn about will include:<br><br><ul><li>Epistemology, where we’ll consider what our knowledge of the world and ourselves consists in, and how we come to have it;</li><li>Philosophy of science, where we’ll investigate foundational conceptual issues in scientific research and practice;</li><li>Philosophy of Mind, where we’ll ask questions about what it means for something to have a mind, and how minds should be understood and explained;</li><li>Moral Philosophy, where we’ll attempt to understand the nature of our moral judgements and reactions – whether they aim at some objective moral truth, or are mere personal or cultural preferences, and;</li><li>Metaphysics, where we’ll think through some fundamental conceptual questions about the nature of reality.</li></ul></p>		t	1	2013-07-06 00:00:00	2012-09-04 00:00:00	0.00	1680	750	2013-01-10 21:25:57	2013-01-20 18:34:41	introduction-to-philosophy
1	Introduction to Sociology	TPSCLG	1	<p>E-learning and Digital Cultures is aimed at teachers, learning technologists, and people with a general interest in education who want to deepen their understanding of what it means to teach and learn in the digital age. The course is about how digital cultures intersect with learning cultures online, and how our ideas about online education are shaped through “narratives”, or big stories, about the relationship between people and technology. We’ll explore some of the most engaging perspectives on digital culture in its popular and academic forms, and we’ll consider how our practices as teachers and learners are informed by the difference of the digital. We’ll look at how learning and literacy is represented in popular digital-, (or cyber-) culture. For example, how is ‘learning’ represented in the film The Matrix, and how does this representation influence our understanding of the nature of e-learning? <br><br>On this course, you will be invited to think critically and creatively about e-learning, to try out new ideas in a supportive environment, and to gain fresh perspectives on your own experiences of teaching and learning. The course will begin with a ‘film festival’, in which we’ll view a range of interesting short films and classic clips, and begin discussing how these might relate to the themes emerging from the course readings. We will then move on to a consideration of multimodal literacies and digital media, and you’ll be encouraged to think about visual methods for presenting knowledge and conveying understanding. The final part of the course will involve the creation of your own visual artefact; a pictorial, filmic or graphic representation of any of the themes encountered during the course, and you‘ll have the opportunity to use digital spaces in new ways to present this work. <br><br>E-learning and Digital Cultures will make use of online spaces beyond the TutorPlus environment, and we want some aspects of participation in this course to involve the wider social web. We hope that participants will share in the creation of course content and assessed work that will be publicly available online.<br></p>\r\n		t	1	2013-01-05 00:00:00	2013-04-27 00:00:00	40.00	1680	15000	2013-01-10 21:21:34	2013-02-25 20:15:39	introduction-to-sociology
5	Philosophy of Money	TPMONY	1	<p></p><p>In this course you will learn the intricacies of the philosophy of money and how money almost determines people's attitudes, generally ,as well as their interactions with each other. Money is discussed in such a manner that makes you shift your understanding of its societal and economic significance at large.</p><p>Traditionally and historically we've seen a radical shift of human kind conception of our actions and their subsequent values as brought about by an endured sacrifice which inevitably crystallizes into its monetary equivalent.  In this context money is being perceived as the utmost representational form and a neutral valuation of each individual's power in relation to their world and its objects in an absolute sense. Also, it will turn out that money is what it is because we think and regard it as money hence its instability and psychological indispensability. There will be also instances where the contents of this life will be dissected in the light of various monetary transactions that are believed to exclusively and entirely bring out meaning of  each human relations, actions and their respective ultimate purpose. Again, the human species dominance and its direct authority and control over everything in the world will be precisely illuminated when we get to discuss the crucial exchange and extension of personal values through an endless and inherent movement of the currency of money, from one hand to another, in form of divergent and ever changing and maturing economic processes.</p><p></p>\r\n		t	1	2013-03-04 00:00:00	2013-06-15 00:00:00	40.00	1680	750	2013-02-25 22:18:35	2013-03-03 13:23:46	philosophy-of-money
\.


--
-- Data for Name: course_announcement; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY course_announcement (id, course_id, announcement_id) FROM stdin;
2	1	10
3	5	13
\.


--
-- Name: course_announcement_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('course_announcement_id_seq', 3, true);


--
-- Data for Name: course_discussion; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY course_discussion (id, course_id, discussion_id) FROM stdin;
1	5	6
2	5	7
3	5	7
4	5	8
5	5	9
6	5	10
7	5	11
8	5	12
9	5	13
10	5	14
11	5	15
12	5	16
13	5	17
14	5	18
15	5	19
16	5	20
17	5	21
18	5	22
19	5	23
20	5	24
21	5	25
22	5	26
23	5	27
24	5	28
25	5	29
26	5	30
27	5	31
28	5	31
29	5	32
\.


--
-- Data for Name: course_discussion_group; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY course_discussion_group (id, course_id, discussion_group_id) FROM stdin;
9	3	20
10	3	21
11	3	22
12	1	23
13	2	24
14	3	25
15	4	28
16	4	29
17	4	30
18	2	33
19	5	38
20	5	42
\.


--
-- Name: course_discussion_group_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('course_discussion_group_id_seq', 20, true);


--
-- Name: course_discussion_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('course_discussion_id_seq', 29, true);


--
-- Data for Name: course_faq; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY course_faq (id, course_id, faq_id) FROM stdin;
\.


--
-- Name: course_faq_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('course_faq_id_seq', 1, false);


--
-- Data for Name: course_folder; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY course_folder (id, course_id, folder_id) FROM stdin;
\.


--
-- Name: course_folder_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('course_folder_id_seq', 1, false);


--
-- Data for Name: course_group; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY course_group (id, course_id, discussion_group_id) FROM stdin;
\.


--
-- Name: course_group_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('course_group_id_seq', 1, false);


--
-- Name: course_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('course_id_seq', 5, true);


--
-- Data for Name: course_link; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY course_link (id, name, url, course_id) FROM stdin;
\.


--
-- Name: course_link_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('course_link_id_seq', 1, false);


--
-- Data for Name: course_mailing_list; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY course_mailing_list (id, mailing_list_id, course_id) FROM stdin;
\.


--
-- Name: course_mailing_list_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('course_mailing_list_id_seq', 1, false);


--
-- Data for Name: course_meeting_time; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY course_meeting_time (id, day, from_time, to_time, course_id, building_id, room_id) FROM stdin;
\.


--
-- Name: course_meeting_time_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('course_meeting_time_id_seq', 1, false);


--
-- Data for Name: course_reading_item; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY course_reading_item (id, title, author, course_id) FROM stdin;
\.


--
-- Name: course_reading_item_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('course_reading_item_id_seq', 1, false);


--
-- Data for Name: course_syllabus; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY course_syllabus (id, content, course_id) FROM stdin;
1		3
4	<p><b>THE ANALYTICAL PART</b></p>\r\n\r\n\r\n\r\n\r\n<p><b><b>Week 1: Value and Money (I)</b></b></p>\r\n\r\n\r\n\r\n\r\n<ol>\r\n<li>Reality and value as mutually independent categories through which our conceptions become images of the world</li>\r\n<li>The psychological fact of objective value</li>\r\n<li>Objectivity in practice as standardization or as a guarantee for the totality of subjective values</li>\r\n<li>Economic value as the objectification of subjective values, as a result of establishing distance between the consuming subject and the object</li>\r\n<li>An analogy with aesthetic value</li>\r\n</ol>\r\n<p><b><b><b><br></b></b></b></p><p><b><b><b>Week 2: Value and Money (II)</b></b></b></p>\r\n\r\n\r\n\r\n\r\n<ol>\r\n<li>Economic activity establishes distances and overcomes them</li>\r\n<li>Exchange as a means of overcoming the purely subjective value significance of an object</li>\r\n<li>In exchange, objects express their value reciprocally</li>\r\n<li>The value of an object becomes objectified by exchanging it for another object</li>\r\n<li>Exchange as a form of life and as the condition of economic value, as a primary economic fact</li>\r\n</ol>\r\n<p><b><b><b><b><b><br></b></b></b></b></b></p><p><b><b><b><b><b>Week 3: Value and Money (III)</b></b></b></b></b></p>\r\n\r\n\r\n\r\n\r\n<ol>\r\n<li>Analysis of the theories of utility and scarcity</li>\r\n<li>Value and price: the socially fixed price as a preliminary stage of the objectively regulated price</li>\r\n<li>Incorporation of economic value and a relativistic world view</li>\r\n<li>The epistemology of a relativistic world view</li>\r\n<li>The construction of proofs in infinite series and their reciprocal legitimation</li>\r\n</ol>\r\n<p><b><b><b><b><b><br></b></b></b></b></b></p><p><b><b><b><b><b>Week 4: Value and Money (IV)</b></b></b></b></b></p>\r\n\r\n\r\n\r\n\r\n<ol>\r\n<li>The objectivity of truth as well as of value viewed as a relation between subjective elements</li>\r\n<li>Money as the autonomous manifestation of the exchange relation which transforms desired objects into economic objects, and establishes the substitutability of objects</li>\r\n<li>Analysis of the nature of money with reference to its value stability, its development and its objectivity</li>\r\n<li>Money as a reification of the general form of existence according to which things derive their significance from their relationship to each other</li>\r\n</ol>\r\n<p><b><br></b></p><p><b>Week 5: The Value of Money as a Substance (I)</b></p>\r\n\r\n\r\n\r\n\r\n<ol>\r\n<li>The intrinsic value of money and the measurement of value</li>\r\n<li>Problems of measurement</li>\r\n<li>The quantity of effective money</li>\r\n<li>Does money possess an intrinsic value?</li>\r\n<li>The development of the purely symbolic character of money</li>\r\n</ol>\r\n<p><b><br></b></p><p><b>Week 6: The Value of Money as a Substance (II)</b></p>\r\n\r\n\r\n\r\n\r\n<ol>\r\n<li>Renunciation of the non-monetary uses of monetary material</li>\r\n<li>The first argument against money as merely a symbol</li>\r\n<li>The second argument against money as merely a symbol</li>\r\n<li>The supply of money</li>\r\n<li>The reciprocal nature of the limitation that reality places on pure concepts</li>\r\n</ol>\r\n<p><b><br></b></p><p><b>Week 7: The Value of Money as a Substance (III)</b></p>\r\n\r\n\r\n\r\n\r\n<ol>\r\n<li>The historical development of money from substance to function</li>\r\n<li>Social interactions and their crystallization into separate structures</li>\r\n<li>Monetary policy: largeness and smallness, diffuseness and concentration of the economic circle in their</li>\r\n<li>significance for the intrinsic character of money</li>\r\n<li>Social interaction and exchange relations</li>\r\n</ol>\r\n<p><b><br></b></p><p><b>Week 8: The Value of Money as a Substance (IV)</b></p>\r\n\r\n\r\n\r\n\r\n<ol>\r\n<li>The nature of the economic circle and its significance for money</li>\r\n<li>The transition to money’s general functional character 183</li>\r\n<li>The declining significance of money as substance 190</li>\r\n<li>The increasing significance of money as value</li>\r\n</ol>\r\n<p><b><br></b></p><p><b>Week 9: Money in the Sequence of Purposes (I)</b></p>\r\n\r\n\r\n\r\n\r\n<ol>\r\n<li>Money in the Sequence of Purposes</li>\r\n<li>Action towards an end as the conscious interaction</li>\r\n<li>between subject and object</li>\r\n<li>The varying length of teleological series</li>\r\n<li>The tool as intensified means</li>\r\n</ol>\r\n<p><b><br></b></p><p><b>Week 10: Money in the Sequence of Purposes (II)</b></p>\r\n\r\n\r\n\r\n\r\n<ol>\r\n<li>Money as the purest example of the tool</li>\r\n<li>The unlimited possibilities for the utilization of money</li>\r\n<li>The unearned increment of wealth</li>\r\n<li>The difference between the same amount of money as part of a large and of a small fortune</li>\r\n<li>Money - because of its character as pure means</li>\r\n</ol>\r\n<p><b><br></b></p><p><b>Week 11: Money in the Sequence of Purposes (III)</b></p>\r\n\r\n\r\n\r\n\r\n<ol>\r\n<li>The psychological growth of means into ends</li>\r\n<li>Money as the most extreme example of a means becoming an end</li>\r\n<li>Money as an end depends upon the cultural tendencies of an epoch</li>\r\n<li>Psychological consequences of money’s teleological position</li>\r\n<li>Greed and avarice</li>\r\n<li>Extravagance</li>\r\n</ol>\r\n<p><b><br></b></p><p><b>Week 12: Money in the Sequence of Purposes (IV)</b></p>\r\n\r\n\r\n\r\n\r\n<ol>\r\n<li>Ascetic poverty</li>\r\n<li>Cynicism</li>\r\n<li>The blasé attitude</li>\r\n<li>The quantity of money as its quality</li>\r\n<li>Subjective differences in amounts of risk</li>\r\n<li>The qualitatively different consequences of quantitatively altered causes</li>\r\n<li>The threshold of economic awareness</li>\r\n</ol>\r\n<p><b><br></b></p><p><b>Week 13: Money in the Sequence of Purposes (V)</b></p>\r\n\r\n\r\n\r\n\r\n<ol>\r\n<li>Differential sensitivity towards economic stimuli</li>\r\n<li>Relations between external stimuli and emotional responses in the field of money</li>\r\n<li>Significance of the personal unity of the owner</li>\r\n<li>The material and cultural relation of form and amount</li>\r\n<li>The relation between quantity and quality of things, and the significance of money for this relation</li>\r\n</ol>\r\n<p><b><br></b></p><p><b>THE SYNTHETIC PART</b></p>\r\n\r\n\r\n\r\n\r\n<p><b>Week 14: Individual Freedom (I)</b></p>\r\n\r\n\r\n\r\n\r\n<ol>\r\n<li>Freedom exists in conjunction with duties</li>\r\n<li>The gradations of this freedom depend on whether the duties are directly personal or apply only to the products of labour</li>\r\n<li>Money payment as the form most congruent with personal freedom</li>\r\n<li>The maximization of value through changes in ownership</li>\r\n<li>Cultural development increases the number of persons on whom one is dependent and the simultaneous decrease in ties to persons viewed as individuals</li>\r\n</ol>\r\n<p><b><br></b></p><p><b>Week 15: Individual Freedom (II)</b></p>\r\n\r\n\r\n\r\n\r\n<ol>\r\n<li>Money is responsible for impersonal relations between people, and thus for individual freedom</li>\r\n<li>Possession as activity</li>\r\n<li>The mutual dependence of having and being</li>\r\n<li>The dissolving of this dependency by the possession of money</li>\r\n</ol>\r\n<p><b><br></b></p><p><b>Week 16: Individual Freedom (III)</b></p>\r\n\r\n\r\n\r\n\r\n<ol>\r\n<li>Lack of freedom as the interweaving of the mental series</li>\r\n<li>Its application to limitations deriving from economic interests</li>\r\n<li>Freedom as the articulation of the self in the medium of things, that is, freedom as possession</li>\r\n<li>The possession of money and the self</li>\r\n<li>Differentiation of person and possession</li>\r\n</ol>\r\n<p><b><br></b></p><p><b>Week 17: Individual Freedom (IV)</b></p>\r\n\r\n\r\n\r\n\r\n<ol>\r\n<li>Spatial separation and technical objectification through money</li>\r\n<li>The separation of the total personality from individual work activities and the results of this separation for the evaluation of these work activities</li>\r\n<li>The development of the individual’s independence from the group</li>\r\n<li>New forms of association brought about by money</li>\r\n<li>General relations between a money economy and the principle of individualism</li>\r\n</ol>\r\n<p><b><br></b></p><p><b>Week 18: The Money Equivalent of Personal Values (I)</b></p>\r\n\r\n\r\n\r\n\r\n<ol>\r\n<li>The transition from the utilitarian to the objective and absolute valuation of the human being</li>\r\n<li>Punishment by fine and the stages of culture &nbsp;The increasing inadequacy of money</li>\r\n<li>Marriage by purchase</li>\r\n<li>Marriage by purchase and the value of women</li>\r\n<li>Division of labour among the sexes, and the dowry</li>\r\n</ol>\r\n<p><b><br></b></p><p><b>Week 19: The Money Equivalent of Personal Values (I)</b></p>\r\n\r\n\r\n\r\n\r\n<ol>\r\n<li>The typical relation between money and prostitution, its development analogous to that of wergild</li>\r\n<li>Marriage for money</li>\r\n<li>Bribery</li>\r\n<li>Money and the ideal of distinction</li>\r\n<li>The transformation of specific rights into monetary claims</li>\r\n</ol>\r\n<p><b><br></b></p><p><b>Week 20: The Money Equivalent of Personal Values (I)</b></p>\r\n\r\n\r\n\r\n\r\n<ol>\r\n<li>The enforceability of demands</li>\r\n<li>The transformation of substantive values into money values</li>\r\n<li>The negative meaning of freedom and the extirpation of the personality</li>\r\n<li>The difference in value between personal achievement and monetary equivalent</li>\r\n<li>‘Labour money’ and its rationale</li>\r\n</ol>\r\n<p><b><br></b></p><p><b>Week 21: The Money Equivalent of Personal Values (I)</b></p>\r\n\r\n\r\n\r\n\r\n<ol>\r\n<li>The unpaid contribution of mental effort</li>\r\n<li>Differences in types of labour as quantitative differences</li>\r\n<li>Manual labour as the unit of labour</li>\r\n<li>The value of physical activity reducible to that of mental activity</li>\r\n<li>Differences in the utility of labour as arguments against&nbsp;‘labour money’</li>\r\n</ol>\r\n<p><b><br></b></p><p><b>Week 22: The Style of Life (I)</b></p>\r\n\r\n\r\n\r\n\r\n<ol>\r\n<li>The preponderance of intellectual over emotional functions brought about by the money economy</li>\r\n<li>Lack of character and objectivity of the style of life&nbsp;</li>\r\n<li>The dual roles of both intellect and money: with regard to content they are supra-personal</li>\r\n<li>The dual roles of intellect and money: with regard to function they are individualistic and egoistic</li>\r\n<li>Money’s relationship to the rationalism of law and logic</li>\r\n</ol>\r\n<p><b><br></b></p><p><b>Week 23: The Style of Life (II)</b></p>\r\n\r\n\r\n\r\n\r\n<ol>\r\n<li>The calculating character of modern times</li>\r\n<li>The concept of culture</li>\r\n<li>The increase in material culture and the lag in individual culture</li>\r\n<li>The objectification of the mind</li>\r\n<li>The division of labour as the cause of the divergence of subjective and objective culture</li>\r\n</ol>\r\n<p><b><br></b></p><p><b>Week 24: The Style of Life (III)</b></p>\r\n\r\n\r\n\r\n\r\n<ol>\r\n<li>The occasional greater weight of subjective culture</li>\r\n<li>The relation of money to the agents of these opposing tendencies</li>\r\n<li>Alterations in the distance between the self and objects as the manifestation of varying styles of life</li>\r\n<li>Modern tendencies towards the increase and diminution of this distance</li>\r\n<li>The part played by money in this dual process</li>\r\n</ol>\r\n<p><b><br></b></p><p><b>Week 25: The Style of Life (IV)</b></p>\r\n\r\n\r\n\r\n\r\n<ol>\r\n<li>Credit</li>\r\n<li>The pre-eminence of technology</li>\r\n<li>The rhythm or symmetry, and its opposite, of the contents of life</li>\r\n<li>The sequence and simultaneity of rhythm and symmetry</li>\r\n<li>Analogous developments in money</li>\r\n</ol>\r\n<p><b><br></b></p><p><b>Week 26: The Style of Life (The End)</b></p>\r\n\r\n\r\n\r\n\r\n<ol>\r\n<li>The pace of life, its alterations and those of the money supply</li>\r\n<li>The concentration of monetary activity</li>\r\n<li>The mobilization of values</li>\r\n<li>Constancy and flux as categories for comprehending the world, their synthesis in the relative character of existence</li>\r\n<li>Money as the historical symbol of the relative character of existence</li>\r\n</ol><br>\r\n	5
2	Edit me	4
3	Edit me	2
5	Edit me	1
\.


--
-- Name: course_syllabus_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('course_syllabus_id_seq', 5, true);


--
-- Data for Name: department; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY department (id, name, abbreviation, faculty_id) FROM stdin;
1	Psychology	PSY	1
\.


--
-- Name: department_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('department_id_seq', 1, true);


--
-- Data for Name: discussion; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY discussion (id, name, profile_id, description, access_level, last_visit, latest_comment_id, comment_count, post_count, view_count, is_primary, is_removed, created_at, updated_at, slug) FROM stdin;
10	Week 5: The Value of Money as a Substance (I)	10	<p><ol><li>The intrinsic value of money and the measurement of value</li><li>Problems of measurement</li><li>The quantity of effective money</li><li>Does money possess an intrinsic value?</li><li>The development of the purely symbolic character of money</li></ol></p>	1	\N	\N	0	0	0	f	f	2013-03-05 20:16:08	2013-03-05 20:16:08	week-5-the-value-of-money-as-a-substance-i
11	Week 6: The Value of Money as a Substance (II)	10	<p><ol><li>Renunciation of the non-monetary uses of monetary material</li><li>The first argument against money as merely a symbol</li><li>The second argument against money as merely a symbol</li><li>The supply of money</li><li>The reciprocal nature of the limitation that reality places on pure concepts</li></ol></p>	1	\N	\N	0	0	0	f	f	2013-03-05 20:16:40	2013-03-05 20:16:40	week-6-the-value-of-money-as-a-substance-ii
12	Week 7: The Value of Money as a Substance (III)	10	<p><ol><li>The historical development of money from substance to function</li><li>Social interactions and their crystallization into separate structures</li><li>Monetary policy: largeness and smallness, diffuseness and concentration of the economic circle in their</li><li>significance for the intrinsic character of money</li><li>Social interaction and exchange relations</li></ol></p>	1	\N	\N	0	0	0	f	f	2013-03-05 20:17:13	2013-03-05 20:17:13	week-7-the-value-of-money-as-a-substance-iii
13	Week 8: The Value of Money as a Substance (IV)	10	<p><ol><li>The nature of the economic circle and its significance for money</li><li>The transition to money’s general functional character 183</li><li>The declining significance of money as substance 190</li><li>The increasing significance of money as value</li></ol></p>	1	\N	\N	0	0	0	f	f	2013-03-05 20:17:34	2013-03-05 20:17:34	week-8-the-value-of-money-as-a-substance-iv
14	Week 9: Money in the Sequence of Purposes (I)	10	<p><ol><li>Money in the Sequence of Purposes</li><li>Action towards an end as the conscious interaction</li><li>between subject and object</li><li>The varying length of teleological series</li><li>The tool as intensified means</li></ol></p>	1	\N	\N	0	0	0	f	f	2013-03-05 20:17:52	2013-03-05 20:17:52	week-9-money-in-the-sequence-of-purposes-i
15	Week 10: Money in the Sequence of Purposes (II)	10	<p><ol><li>Money as the purest example of the tool</li><li>The unlimited possibilities for the utilization of money</li><li>The unearned increment of wealth</li><li>The difference between the same amount of money as part of a large and of a small fortune</li><li>Money - because of its character as pure means</li></ol></p>	1	\N	\N	0	0	0	f	f	2013-03-05 20:18:10	2013-03-05 20:18:10	week-10-money-in-the-sequence-of-purposes-ii
16	Week 11: Money in the Sequence of Purposes (III)	10	<p><ol><li>The psychological growth of means into ends</li><li>Money as the most extreme example of a means becoming an end</li><li>Money as an end depends upon the cultural tendencies of an epoch</li><li>Psychological consequences of money’s teleological position</li><li>Greed and avarice</li><li>Extravagance</li></ol><br></p>	1	\N	\N	0	0	0	f	f	2013-03-05 20:18:31	2013-03-05 20:18:31	week-11-money-in-the-sequence-of-purposes-iii
17	Week 12: Money in the Sequence of Purposes (IV)	10	<p><ol><li>Ascetic poverty</li><li>Cynicism</li><li>The blasé attitude</li><li>The quantity of money as its quality</li><li>Subjective differences in amounts of risk</li><li>The qualitatively different consequences of quantitatively altered causes</li><li>The threshold of economic awareness</li></ol></p>	1	\N	\N	0	0	0	f	f	2013-03-05 20:19:11	2013-03-05 20:19:11	week-12-money-in-the-sequence-of-purposes-iv
8	Week 3: Value and Money (III)	10	<p><ol><li>Analysis of the theories of utility and scarcity</li><li>Value and price: the socially fixed price as a preliminary stage of the objectively regulated price</li><li>Incorporation of economic value and a relativistic world view</li><li>The epistemology of a relativistic world view</li><li>The construction of proofs in infinite series and their reciprocal legitimation</li></ol></p>	1	\N	\N	0	0	1	f	f	2013-03-05 20:15:24	2013-03-10 12:26:28	week-3-value-and-money-iii
9	Week 4: Value and Money (IV)	10	<p><ol><li>The objectivity of truth as well as of value viewed as a relation between subjective elements</li><li>Money as the autonomous manifestation of the exchange relation which transforms desired objects into economic objects, and establishes the substitutability of objects</li><li>Analysis of the nature of money with reference to its value stability, its development and its objectivity</li><li>Money as a reification of the general form of existence according to which things derive their significance from their relationship to each other</li></ol></p>	1	\N	\N	0	0	1	f	f	2013-03-05 20:15:48	2013-03-05 21:51:44	week-4-value-and-money-iv
1	Lufuno Sadiki's general discussion	10	This is Lufuno Sadiki's general discussion in which you can share anything with them.	1	\N	6	6	1	6	t	f	2013-03-04 21:59:06	2013-03-10 11:57:24	lufuno-sadiki-s-general-discussion
2	Batanayi Matuku's general discussion	26	This is Batanayi Matuku's general discussion in which you can share anything with them.	1	\N	\N	0	0	17	t	f	2013-03-04 21:59:07	2013-03-10 16:33:11	batanayi-matuku-s-general-discussion
4	William James's general discussion	18	This is William James's general discussion in which you can share anything with them.	1	\N	\N	0	0	0	t	f	2013-03-05 00:35:16	2013-03-05 00:35:16	william-james-s-general-discussion
5	Wallace Chigona's general discussion	19	This is Wallace Chigona's general discussion in which you can share anything with them.	1	\N	\N	0	0	0	t	f	2013-03-05 20:07:41	2013-03-05 20:07:41	wallace-chigona-s-general-discussion
7	Week 2: Value and Money (II)	10	<p><ol><li>Economic activity establishes distances and overcomes them</li><li>Exchange as a means of overcoming the purely subjective value significance of an object</li><li>In exchange, objects express their value reciprocally</li><li>The value of an object becomes objectified by exchanging it for another object</li><li>Exchange as a form of life and as the condition of economic value, as a primary economic fact</li></ol></p>	1	\N	\N	0	0	0	f	f	2013-03-05 20:14:56	2013-03-05 20:15:03	week-2-value-and-money-ii
18	Week 13: Money in the Sequence of Purposes (V)	10	<p><ol><li>Differential sensitivity towards economic stimuli</li><li>Relations between external stimuli and emotional responses in the field of money</li><li>Significance of the personal unity of the owner</li><li>The material and cultural relation of form and amount</li><li>The relation between quantity and quality of things, and the significance of money for this relation</li></ol></p>	1	\N	\N	0	0	0	f	f	2013-03-05 20:19:37	2013-03-05 20:19:37	week-13-money-in-the-sequence-of-purposes-v
19	Week 14: Individual Freedom (I)	10	<p><ol><li>Freedom exists in conjunction with duties</li><li>The gradations of this freedom depend on whether the duties are directly personal or apply only to the products of labour</li><li>Money payment as the form most congruent with personal freedom</li><li>The maximization of value through changes in ownership</li><li>Cultural development increases the number of persons on whom one is dependent and the simultaneous decrease in ties to persons viewed as individuals</li></ol></p>	1	\N	\N	0	0	0	f	f	2013-03-05 20:20:26	2013-03-05 20:20:26	week-14-individual-freedom-i
20	Week 15: Individual Freedom (II)	10	<p><ol><li>Money is responsible for impersonal relations between people, and thus for individual freedom</li><li>Possession as activity</li><li>The mutual dependence of having and being</li><li>The dissolving of this dependency by the possession of money</li></ol></p>	1	\N	\N	0	0	0	f	f	2013-03-05 20:20:45	2013-03-05 20:20:45	week-15-individual-freedom-ii
21	Week 16: Individual Freedom (III)	10	<p><ol><li>Lack of freedom as the interweaving of the mental series</li><li>Its application to limitations deriving from economic interests</li><li>Freedom as the articulation of the self in the medium of things, that is, freedom as possession</li><li>The possession of money and the self</li><li>Differentiation of person and possession</li></ol></p>	1	\N	\N	0	0	0	f	f	2013-03-05 20:21:06	2013-03-05 20:21:06	week-16-individual-freedom-iii
22	Week 17: Individual Freedom (IV)	10	<p><ol><li>Spatial separation and technical objectification through money</li><li>The separation of the total personality from individual work activities and the results of this separation for the evaluation of these work activities</li><li>The development of the individual’s independence from the group</li><li>New forms of association brought about by money</li><li>General relations between a money economy and the principle of individualism</li></ol></p>	1	\N	\N	0	0	0	f	f	2013-03-05 20:21:25	2013-03-05 20:21:25	week-17-individual-freedom-iv
24	Week 18: The Money Equivalent of Personal Values (I)	10	<p><ol><li>The transition from the utilitarian to the objective and absolute valuation of the human being</li><li>Punishment by fine and the stages of culture &nbsp;The increasing inadequacy of money</li><li>Marriage by purchase</li><li>Marriage by purchase and the value of women</li><li>Division of labour among the sexes, and the dowry</li></ol></p>	1	\N	\N	0	0	0	f	f	2013-03-05 20:22:30	2013-03-05 20:22:30	week-18-the-money-equivalent-of-personal-values-i-1
25	Week 19: The Money Equivalent of Personal Values (I)	10	<p><ol><li>The typical relation between money and prostitution, its development analogous to that of wergild</li><li>Marriage for money</li><li>Bribery</li><li>Money and the ideal of distinction</li><li>The transformation of specific rights into monetary claims</li></ol></p>	1	\N	\N	0	0	0	f	f	2013-03-05 20:23:04	2013-03-05 20:23:04	week-19-the-money-equivalent-of-personal-values-i
26	Week 20: The Money Equivalent of Personal Values (I)	10	<p><ol><li>The enforceability of demands</li><li>The transformation of substantive values into money values</li><li>The negative meaning of freedom and the extirpation of the personality</li><li>The difference in value between personal achievement and monetary equivalent</li><li>‘Labour money’ and its rationale</li></ol></p>	1	\N	\N	0	0	0	f	f	2013-03-05 20:23:37	2013-03-05 20:23:37	week-20-the-money-equivalent-of-personal-values-i
27	Week 21: The Money Equivalent of Personal Values (I)	10	<p><ol><li>The unpaid contribution of mental effort</li><li>Differences in types of labour as quantitative differences</li><li>Manual labour as the unit of labour</li><li>The value of physical activity reducible to that of mental activity</li><li>Differences in the utility of labour as arguments against&nbsp;‘labour money’</li></ol></p>	1	\N	\N	0	0	0	f	f	2013-03-05 20:24:10	2013-03-05 20:24:10	week-21-the-money-equivalent-of-personal-values-i
28	Week 22: The Style of Life (I)	10	<p><ol><li>The preponderance of intellectual over emotional functions brought about by the money economy</li><li>Lack of character and objectivity of the style of life&nbsp;</li><li>The dual roles of both intellect and money: with regard to content they are supra-personal</li><li>The dual roles of intellect and money: with regard to function they are individualistic and egoistic</li><li>Money’s relationship to the rationalism of law and logic</li></ol></p>	1	\N	\N	0	0	0	f	f	2013-03-05 20:24:34	2013-03-05 20:24:34	week-22-the-style-of-life-i
29	Week 23: The Style of Life (II)	10	<p><ol><li>The calculating character of modern times</li><li>The concept of culture</li><li>The increase in material culture and the lag in individual culture</li><li>The objectification of the mind</li><li>The division of labour as the cause of the divergence of subjective and objective culture</li></ol></p>	1	\N	\N	0	0	0	f	f	2013-03-05 20:25:05	2013-03-05 20:25:05	week-23-the-style-of-life-ii
30	Week 24: The Style of Life (III)	10	<p><ol><li>The occasional greater weight of subjective culture</li><li>The relation of money to the agents of these opposing tendencies</li><li>Alterations in the distance between the self and objects as the manifestation of varying styles of life</li><li>Modern tendencies towards the increase and diminution of this distance</li><li>The part played by money in this dual process</li></ol></p>	1	\N	\N	0	0	0	f	f	2013-03-05 20:25:26	2013-03-05 20:25:26	week-24-the-style-of-life-iii
31	Week 25: The Style of Life (IV)	10	<p><ol><li>Credit</li><li>The pre-eminence of technology</li><li>The rhythm or symmetry, and its opposite, of the contents of life</li><li>The sequence and simultaneity of rhythm and symmetry</li><li>Analogous developments in money</li></ol></p>	1	\N	\N	0	0	1	f	f	2013-03-05 20:26:22	2013-03-08 20:08:51	week-25-the-style-of-life-iv
32	Week 26: The Style of Life (The End)	10	<p><ol><li>The pace of life, its alterations and those of the money supply</li><li>The concentration of monetary activity</li><li>The mobilization of values</li><li>Constancy and flux as categories for comprehending the world, their synthesis in the relative character of existence</li><li>Money as the historical symbol of the relative character of existence</li></ol></p>	1	\N	\N	0	0	0	f	f	2013-03-05 20:27:39	2013-03-05 20:27:39	week-26-the-style-of-life-the-end
34	Henry James's general discussion	17	This is Henry James's general discussion in which you can share anything with them.	1	\N	\N	0	0	0	t	f	2013-03-10 17:04:47	2013-03-10 17:04:47	henry-james-s-general-discussion
33	Tendayi Matuku's general discussion	14	This is Tendayi Matuku's general discussion in which you can share anything with them.	1	\N	\N	0	0	1	t	f	2013-03-06 00:40:54	2013-03-11 20:50:56	tendayi-matuku-s-general-discussion
35	Bright Dodoh's general discussion	25	This is Bright Dodoh's general discussion in which you can share anything with them.	1	\N	\N	0	0	0	t	f	2013-03-17 01:50:49	2013-03-17 01:50:49	bright-dodoh-s-general-discussion
23	Week 18: The Money Equivalent of Personal Values (I)	10	<p><ol><li>The transition from the utilitarian to the objective and absolute valuation of the human being</li><li>Punishment by fine and the stages of culture &nbsp;The increasing inadequacy of money</li><li>Marriage by purchase</li><li>Marriage by purchase and the value of women</li><li>Division of labour among the sexes, and the dowry</li></ol></p>	1	\N	\N	0	0	2	f	f	2013-03-05 20:22:29	2013-03-06 00:35:25	week-18-the-money-equivalent-of-personal-values-i
6	Week 1: Value and Money (I)	10	<p><ol><li>Reality and value as mutually independent categories through which our conceptions become images of the world</li><li>The psychological fact of objective value</li><li>Objectivity in practice as standardization or as a guarantee for the totality of subjective values</li><li>Economic value as the objectification of subjective values, as a result of establishing distance between the consuming subject and the object</li><li>An analogy with aesthetic value</li></ol></p>	0	\N	\N	0	0	60	f	f	2013-03-05 20:09:20	2013-03-17 10:44:21	week-1-value-and-money-i
36	Nyaradzai Mugaragumbo's general discussion	22	This is Nyaradzai Mugaragumbo's general discussion in which you can share anything with them.	1	\N	\N	0	0	0	t	f	2013-03-17 14:43:43	2013-03-17 14:43:43	nyaradzai-mugaragumbo-s-general-discussion
\.


--
-- Data for Name: discussion_comment; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY discussion_comment (id, reply, profile_id, discussion_post_id, created_at, updated_at) FROM stdin;
1	<p>There are 2 glasses of water, representing the men is full to the top. Representing the women is only a quarter full. Would you take some of the water in men's glass and pour it in the women's glass to achieve equality?<br></p>	10	1	2013-03-10 11:55:57	2013-03-10 11:55:57
2	<p>Or maybe the women fetch more water to fill their glass and achieve equity? My question to your question.<br></p>	10	1	2013-03-10 11:56:14	2013-03-10 11:56:14
3	<p><span><span>I tend to wonder, where are you getting that misunderstanding of our gender differences here. It appears that even your analogue has some systematic biases that of prejudice in its utmost subtle form. And for once only you could probe why our glass of water is full and theirs isn't in the first place, here. In a nutshell it's only a social norm and a historical preconception that women should be subjected to our presupposed superiority and our endless demands for that matter, needless to mention we're yet to prove these claims of our dominion over our female counterparts as there's absolutely nothing on the ground to support it. Let's hear more about this topic&nbsp;</span></span><br></p>	10	1	2013-03-10 11:56:28	2013-03-10 11:56:28
4	<p>A social norm and historical preconceptions should not undermine our generation to suppose that all persons should be treated equal, with preservation of dignity and humanity. It is the same cultural stereo types of imbalance that hinder our conception.<br></p>	10	1	2013-03-10 11:56:39	2013-03-10 11:56:39
5	<p><span><span>Mind you social norms are dynamics of change. Our conservatism make us myopic to the demands of social imbalance.</span></span><br></p>	10	1	2013-03-10 11:56:57	2013-03-10 11:56:57
6	<p><span>You've said it all, Mdara. Actually, I'm suddenly cheerful from reading your finest analysis, here. And to say the least; women are becoming more and more involved in those institutions that were mainly dominated by men and even proving to be better.&nbsp;</span><span><span>So the point we're making here is this: provided that every woman sees and act upon these inevitable transformations of their own thinking about their social position they are likely to fully realize their true nature that of not having to fall prey to an unfruitful and unaccounted for dependency on what almost every man promises to offer, but never dare to keep. Remember in the past they were strictly dictated whom to marry without any permitted revokes. It's just the begging of a long and intriguing battle, Mzaya. What do you think?</span></span><br></p>	10	1	2013-03-10 11:57:24	2013-03-10 11:57:24
\.


--
-- Name: discussion_comment_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('discussion_comment_id_seq', 6, true);


--
-- Name: discussion_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('discussion_id_seq', 36, true);


--
-- Data for Name: discussion_peer; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY discussion_peer (id, nickname, subscription_type, membership_type, status, discussion_id, profile_id, is_removed, created_at, updated_at) FROM stdin;
2	batanayi	0	2	4	2	26	f	2013-03-04 21:59:07	2013-03-04 21:59:07
4	william	0	2	4	4	18	f	2013-03-05 00:35:16	2013-03-05 00:35:16
5	wallace	0	2	4	5	19	f	2013-03-05 20:07:42	2013-03-05 20:07:42
6	henry	0	0	0	1	17	f	2013-03-05 20:51:22	2013-03-05 20:51:22
7	danny 	0	0	0	1	15	f	2013-03-05 20:51:22	2013-03-05 20:51:22
8	robb	0	0	0	1	7	f	2013-03-05 20:51:22	2013-03-05 20:51:22
9	elisha	0	0	0	1	9	f	2013-03-05 20:51:22	2013-03-05 20:51:22
10	nyaradzai	0	0	0	1	21	f	2013-03-05 20:51:22	2013-03-05 20:51:22
11	wallace	0	0	0	1	19	f	2013-03-05 20:51:22	2013-03-05 20:51:22
12	tendayi	0	0	0	1	14	f	2013-03-05 20:52:28	2013-03-05 20:52:28
13	bill	0	0	0	1	24	f	2013-03-05 20:55:33	2013-03-05 20:55:33
14	robert	0	0	0	1	29	f	2013-03-05 20:55:33	2013-03-05 20:55:33
3	Lufuno	0	0	0	2	10	f	2013-03-05 00:02:47	2013-03-05 22:03:45
15	tendayi	0	2	4	33	14	f	2013-03-06 00:40:54	2013-03-06 00:40:54
17	tendayi	0	0	0	6	14	f	2013-03-10 14:24:33	2013-03-10 14:24:33
19	innocent	0	0	0	6	28	f	2013-03-10 14:48:59	2013-03-10 14:48:59
20	live	0	0	0	6	27	f	2013-03-10 14:48:59	2013-03-10 14:48:59
21	john	0	0	0	6	12	f	2013-03-10 14:48:59	2013-03-10 14:48:59
22	wallace	0	0	0	6	19	f	2013-03-10 14:49:08	2013-03-10 14:49:08
23	danny 	0	0	0	6	15	f	2013-03-10 14:49:08	2013-03-10 14:49:08
24	robb	0	0	0	6	7	f	2013-03-10 14:49:08	2013-03-10 14:49:08
25	nyaradzai	0	0	0	6	21	f	2013-03-10 14:49:08	2013-03-10 14:49:08
27	henry	0	2	4	34	17	f	2013-03-10 17:04:47	2013-03-10 17:04:47
28	TutorPlus	0	0	0	33	10	f	2013-03-11 20:51:38	2013-03-11 20:51:38
29	bright	0	2	4	35	25	f	2013-03-17 01:50:49	2013-03-17 01:50:49
26	TutorPlus	2	0	0	6	10	f	2013-03-10 16:42:47	2013-03-17 10:43:56
30	nyaradzai	0	2	4	36	22	f	2013-03-17 14:43:43	2013-03-17 14:43:43
\.


--
-- Name: discussion_peer_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('discussion_peer_id_seq', 30, true);


--
-- Data for Name: discussion_post; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY discussion_post (id, message, profile_id, discussion_topic_id, created_at, updated_at) FROM stdin;
1	<p>The unaccounted for submission of women. We're indeed scrutinizing it very closely and, without any doubts, there're some institutional difficulties involved in tackling this highly controversial matter. i.e should a woman always be subjected to or under an obligation of her man's command? Is their submission to men natural or a necessary practice for general societal goodness? Are they biologically unfit to be equal to any man? Certainly, your views are really of an enormous value to any woman out there. Let's hear them :)<br></p>	10	1	2013-03-10 11:54:58	2013-03-10 11:54:58
\.


--
-- Name: discussion_post_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('discussion_post_id_seq', 1, true);


--
-- Data for Name: discussion_topic; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY discussion_topic (id, subject, type, message, discussion_id, profile_id, latest_comment_id, view_count, comment_count, is_primary, created_at, updated_at, slug) FROM stdin;
5	Reality and value as mutually independent categories through which our conceptions become images of the world	General	<p>Reality and value as mutually independent categories through which our conceptions become images of the world<br></p>	6	10	\N	13	0	f	2013-03-05 20:29:57	2013-03-10 17:05:11	reality-and-value-as-mutually-independent-categories-through-which-our-conceptions-become-images-of-the-world-6
3	Welcome to TutorPlus!	General	Hi fellow participant, It's a great pleasure to have you as a part of this collaborative learning platform and we would like you to be readily available to share with your peers any relevant academic experiences we all have to endure in all our varied learning objectives. I hope we will all exhibit the same sincereness and sense of belonging in enganging with the learning materials and our peers. God bless!	4	18	\N	0	0	t	2013-03-05 00:35:16	2013-03-05 00:35:16	welcome-to-tutorplus-4
4	Welcome to TutorPlus!	General	Hi fellow participant, It's a great pleasure to have you as a part of this collaborative learning platform and we would like you to be readily available to share with your peers any relevant academic experiences we all have to endure in all our varied learning objectives. I hope we will all exhibit the same sincereness and sense of belonging in enganging with the learning materials and our peers. God bless!	5	19	\N	0	0	t	2013-03-05 20:07:42	2013-03-05 20:07:42	welcome-to-tutorplus-5
12	Welcome to TutorPlus!	General	Hi fellow participant, It's a great pleasure to have you as a part of this collaborative learning platform and we would like you to be readily available to share with your peers any relevant academic experiences we all have to endure in all our varied learning objectives. I hope we will all exhibit the same sincereness and sense of belonging in enganging with the learning materials and our peers. God bless!	35	25	\N	0	0	t	2013-03-17 01:50:49	2013-03-17 01:50:49	welcome-to-tutorplus-35
13	Welcome to TutorPlus!	General	Hi fellow participant, It's a great pleasure to have you as a part of this collaborative learning platform and we would like you to be readily available to share with your peers any relevant academic experiences we all have to endure in all our varied learning objectives. I hope we will all exhibit the same sincereness and sense of belonging in enganging with the learning materials and our peers. God bless!	36	22	\N	0	0	t	2013-03-17 14:43:43	2013-03-17 14:43:43	welcome-to-tutorplus-36
7	Objectivity in practice as standardization or as a guarantee for the totality of subjective values	General	<p>Objectivity in practice as standardization or as a guarantee for the totality of subjective values<br></p>	6	10	\N	20	0	f	2013-03-05 20:31:01	2013-03-06 00:40:28	objectivity-in-practice-as-standardization-or-as-a-guarantee-for-the-totality-of-subjective-values-6
10	Welcome to TutorPlus!	General	Hi fellow participant, It's a great pleasure to have you as a part of this collaborative learning platform and we would like you to be readily available to share with your peers any relevant academic experiences we all have to endure in all our varied learning objectives. I hope we will all exhibit the same sincereness and sense of belonging in enganging with the learning materials and our peers. God bless!	33	14	\N	0	0	t	2013-03-06 00:40:54	2013-03-06 00:40:54	welcome-to-tutorplus-33
1	Welcome to TutorPlus!	General	Hi fellow participant, It's a great pleasure to have you as a part of this collaborative learning platform and we would like you to be readily available to share with your peers any relevant academic experiences we all have to endure in all our varied learning objectives. I hope we will all exhibit the same sincereness and sense of belonging in enganging with the learning materials and our peers. God bless!	1	10	6	2	6	t	2013-03-04 21:59:07	2013-03-10 11:57:24	welcome-to-tutorplus-1
8	Economic value as the objectification of subjective values, as a result of establishing distance between the consuming subject and the object	General	<p>Economic value as the objectification of subjective values, as a result of establishing distance between the consuming subject and the object<br></p>\r\n	6	10	\N	1	0	f	2013-03-05 20:31:29	2013-03-10 13:36:21	economic-value-as-the-objectification-of-subjective-values-as-a-result-of-establishing-distance-between-the-consuming-subject-and-the-object-6
11	Welcome to TutorPlus!	General	Hi fellow participant, It's a great pleasure to have you as a part of this collaborative learning platform and we would like you to be readily available to share with your peers any relevant academic experiences we all have to endure in all our varied learning objectives. I hope we will all exhibit the same sincereness and sense of belonging in enganging with the learning materials and our peers. God bless!	34	17	\N	0	0	t	2013-03-10 17:04:47	2013-03-10 17:04:47	welcome-to-tutorplus-34
6	The psychological fact of objective value	General	<p>The psychological fact of objective value<br></p>	6	10	\N	2	0	f	2013-03-05 20:30:40	2013-03-10 13:55:36	the-psychological-fact-of-objective-value-6
2	Welcome to TutorPlus!	General	Hi fellow participant, It's a great pleasure to have you as a part of this collaborative learning platform and we would like you to be readily available to share with your peers any relevant academic experiences we all have to endure in all our varied learning objectives. I hope we will all exhibit the same sincereness and sense of belonging in enganging with the learning materials and our peers. God bless!	2	26	\N	2	0	t	2013-03-04 21:59:07	2013-03-05 22:03:17	welcome-to-tutorplus-2
9	An analogy with aesthetic value	General	<p>An analogy with aesthetic value<br></p>	6	10	\N	1	0	f	2013-03-05 20:32:08	2013-03-10 13:56:05	an-analogy-with-aesthetic-value-6
\.


--
-- Name: discussion_topic_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('discussion_topic_id_seq', 13, true);


--
-- Data for Name: email_message; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY email_message (id, from_email, to_email, cc_email, bcc_email, email_template_id, sender_id, reply_to, subject, body, status, is_read, is_trashed, created_at, updated_at) FROM stdin;
18	lufuno@tutorplus.org	wallace@tutorplus.org			\N	10	lufuno@tutorplus.org	Hi there Prof	<p>Hi Prof, how are you doing today?</p>	1	t	f	2013-01-27 11:53:51	2013-01-27 12:04:27
19	wallace@tutorplus.org	lufuno@tutorplus.org			\N	19	lufuno@tutorplus.org	Re: Hi there Prof	<p>I'm very well, how are you doing yourself? Thanks!<br></p>	0	f	f	2013-01-27 12:14:28	2013-01-27 12:14:28
20	wallace@tutorplus.org	lufuno@tutorplus.org			\N	19	lufuno@tutorplus.org	Re: Hi there Prof	<p>I'm very well, how are you doing yourself? Thanks!<br></p>	1	t	f	2013-01-27 12:14:28	2013-01-27 12:15:51
21	lufuno@tutorplus.org	wallace@tutorplus.org			\N	10	lufuno@tutorplus.org	New message	<p>Hi Prof, I would like us to meet today if that's possible? Thanks!</p>	0	t	f	2013-01-27 12:30:40	2013-01-27 12:30:52
17	lufuno@tutorplus.org	wallace@tutorplus.org			\N	10	lufuno@tutorplus.org	Hi there Prof	<p>Hi Prof, how are you doing today?</p>	0	t	f	2013-01-27 11:53:51	2013-01-27 12:31:09
22	lufuno@tutorplus.org	wallace@tutorplus.org			\N	10	lufuno@tutorplus.org	New message	<p>Hi Prof, I would like us to meet today if that's possible? Thanks!</p>	1	t	f	2013-01-27 12:30:40	2013-01-27 12:32:51
24	lufuno@tutorplus.org	wallace@tutorplus.org			\N	10	lufuno@tutorplus.org	Re: Hi there Prof	<p>Pretty well, I've sent you an email separate from this and please check it out. Thanks!</p>	1	t	f	2013-01-27 12:32:11	2013-01-27 12:33:19
25	wallace@tutorplus.org	lufuno@tutorplus.org			\N	19	lufuno@tutorplus.org	Re: Hi there Prof	<p>Ok, I will read it and come back to you. Thanks!<br></p>	0	f	f	2013-01-27 12:35:01	2013-01-27 12:35:01
26	wallace@tutorplus.org	lufuno@tutorplus.org			\N	19	lufuno@tutorplus.org	Re: Hi there Prof	<p>Ok, I will read it and come back to you. Thanks!<br></p>	1	t	f	2013-01-27 12:35:01	2013-01-28 02:15:32
23	lufuno@tutorplus.org	wallace@tutorplus.org			\N	10	lufuno@tutorplus.org	Re: Hi there Prof	<p>Pretty well, I've sent you an email separate from this and please check it out. Thanks!</p>	0	t	f	2013-01-27 12:32:11	2013-01-29 01:26:25
27	lufuno@tutorplus.org	wallace@tutorplus.org			\N	10	lufuno@tutorplus.org	Re: Hi there Prof	<p>Hi there this is Luvo trying to see if this module is now working....</p>	0	t	f	2013-01-29 22:52:38	2013-01-29 22:52:52
28	lufuno@tutorplus.org	wallace@tutorplus.org			\N	10	lufuno@tutorplus.org	Re: Hi there Prof	<p>Hi there this is Luvo trying to see if this module is now working....</p>	1	t	f	2013-01-29 22:52:38	2013-01-29 22:53:57
29	wallace@tutorplus.org	lufuno@tutorplus.org			\N	19	lufuno@tutorplus.org	Re: Hi there Prof	<p>Huh? Do you think it's ready to production now? If so please make sure all the other modules are pretty much working as well :)<br></p>	0	f	f	2013-01-29 22:54:34	2013-01-29 22:54:34
30	wallace@tutorplus.org	lufuno@tutorplus.org			\N	19	lufuno@tutorplus.org	Re: Hi there Prof	<p>Huh? Do you think it's ready to production now? If so please make sure all the other modules are pretty much working as well :)<br></p>	1	t	f	2013-01-29 22:54:34	2013-01-29 22:54:47
\.


--
-- Data for Name: email_message_correspondence; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY email_message_correspondence (id, initiator_id, invitee_id, created_at, updated_at) FROM stdin;
15	17	18	2013-01-27 11:53:51	2013-01-27 11:53:51
16	21	22	2013-01-27 12:30:40	2013-01-27 12:30:40
\.


--
-- Name: email_message_correspondence_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('email_message_correspondence_id_seq', 16, true);


--
-- Name: email_message_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('email_message_id_seq', 30, true);


--
-- Data for Name: email_message_reply; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY email_message_reply (id, sender_id, responder_id, email_message_id, email_message_reply_id) FROM stdin;
1	10	19	17	20
2	10	19	18	19
3	10	10	18	24
4	10	10	17	23
5	10	19	17	26
6	10	19	18	25
7	10	10	18	28
8	10	10	17	27
9	10	19	17	30
10	10	19	18	29
\.


--
-- Name: email_message_reply_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('email_message_reply_id_seq', 10, true);


--
-- Data for Name: email_template; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY email_template (id, name, subject, description, patterns, body, from_email, from_name, to_email, cc_email, bcc_email, reply_to, is_html, is_active, created_at, updated_at, slug) FROM stdin;
1	Welcome to TutorPlus!	Welcome to TutorPlus!	This is 	USER	<p>\r\n</p><p>Hi <b>##USER##</b>,</p>\r\n\r\n<p>We would like to warmly welcome you to TutorPlus - connected learning platform. We believe you've diverse learning needs and pledge to collaborate with you and your peers in realizing that. And you're probably wondering what to do next? Well, we're here to take the baby the steps with you and lead to you unleashing your learning potential via the TutorPlus platform.</p>\r\n\r\n<p>Below you will find your profile access details and please keep them safe:</p>\r\n\r\n<p>Email: <b>##EMAIL##</b></p>\r\n\r\n<p>Password: <b>##PASSWORD##</b></p>\r\n\r\n<p>Basically, there's only a few steps you need to follow to make yourself fully engaged with the rest of learners (peers) from around the world. Here they are:</p>\r\n\r\n<p>-- Sign into TutorPlus anytime and make the best of what we've to offer you and your peers on there.</p>\r\n\r\n<p>-- Enroll into your favorable courses and participate in those course discussions fully and don't hesitate to express your views and opinions about the course content freely.</p>\r\n\r\n<p>-- Make connections with your peers for a mutual learning experience without any restrictions.</p>\r\n<p></p>\r\n	support@tutorplus.org	Tutor+ team				support@tutorplus.org	t	t	2013-02-14 21:07:39	2013-02-18 21:52:57	welcome-to-tutorplus
3	Password change confirmation	Tutorplus password change confirmation	This is an email that gets sent each time a profile resets their passord	PASSWORD,USER,PASSWORD_UNIQUE_KEY	<div>Hello:&nbsp;##USER##,<br>\r\n</div>\r\nThis email confirms your recent TutorPlus password change to: <b>##PASSWORD##</b>\r\n<p>If your TutorPlus password was changed without your knowledge, then please click the link below to change it again: </p>\r\n\r\n<p><a style="color: #B5A072;" href="http://www.tutorplus.org/profile/reset/password/##PASSWORD_UNIQUE_KEY##">http://www.tutorplus.org/profile/reset/password/##PASSWORD_UNIQUE_KEY##</a></p>\r\n\r\n<p>This link will work for 2 hours or until you reset your password.</p>	support@tutorplus.org	Tutor+ team				support@tutorplus.org	t	t	2013-02-19 21:48:07	2013-02-21 20:29:13	password-change-confirmation
2	Password change request	Tutorplus password change request	This email is sent out to each and every time a profile decides to change their password.	PASSWORD_UNIQUE_KEY,USER	<p>Hello: ##USER##</p><p>We have received a password change request for your TutorPlus account.</p>\r\n\r\n<p>If you made this request, then please copy and paste or click on the link below.</p>\r\n\r\n<p><a style="color: #B5A072;" href="http://www.tutorplus.org/profile/reset/password/##PASSWORD_UNIQUE_KEY##">http://www.tutorplus.org/profile/reset/password/##PASSWORD_UNIQUE_KEY##</a></p>\r\n<p>If you did not ask to change your password, then please ignore this email. Another user may have entered your username by mistake. No changes will be made to your account.</p>\r\n	support@tutorplus.org	Tutor+ team				support@tutorplus.org	t	t	2013-02-19 21:04:35	2013-02-24 19:47:45	password-change-request
\.


--
-- Name: email_template_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('email_template_id_seq', 3, true);


--
-- Data for Name: faculty; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY faculty (id, name, abbreviation, institution_id) FROM stdin;
1	Social Affairs	SA	1
2	Social Matters	SM	1
3	Personal Development	PD	1
\.


--
-- Name: faculty_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('faculty_id_seq', 3, true);


--
-- Data for Name: faq; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY faq (id, profile_id, question, answer, is_published, created_at, updated_at, slug, "position") FROM stdin;
1	10	What is TutorPlus?	<p>TutorPlus is a connected learning platform that is specifically developed to provide a learning medium through which students, instructors and their peers are expected to collaboratively learn with the support of each other. It is essentially free of charge and accessible to anyone, anytime, and anywhere.<br></p>	t	2013-02-02 12:49:22	2013-02-11 02:17:13	what-is-tutorplus	1
2	10	What are the main objectives of TutorPlus?	<p>Here at TutorPlus, we're not only redefining how learning should be conducted, but also complementing traditional learning practices that are so sincerely being practiced at institutions to this day. This implies our second objective, that of nurturing a restructuring of our institutions in making them fully meet the demands of the young generation pedagogically.<br></p>	t	2013-02-02 13:15:57	2013-02-11 02:17:28	what-are-the-main-objectives-of-tutorplus	2
5	10	How does TutorPlus differ from any other learning platforms out there?	<p>Well, one thing for sure is that we're quite very unique in a number of ways, namely: we've an unshakable belief that learning is not a passive process of acquiring knowledge by an means, but rather an ever changing process that tap into the unknown as well as redefining the known itself. We're also very deliberately informal in our approaches in fostering a learning culture in our society. This implies we welcome anyone who sees the virtue of learning without a hierarchical structure that is common in most of the traditional pedagogues. Indeed, education is a right, which is equivalent to also say that TutorPlus is here to fully meet that inescapable obligation that is upon everyone.<br></p>\r\n	t	2013-02-02 13:51:13	2013-02-11 02:17:46	how-does-tutorplus-differ-from-any-other-learning-platforms-out-there	3
4	10	How does TutorPlus relate to the institutions that are on this platform?	<p>TutorPlus could be perceived as a bridge that Higher Learning (HE) institutions use to be transformed from being confined, closed, and formalized to becoming open, horizontal and more attuned to the new mediums of learning.<br></p>	t	2013-02-02 13:38:29	2013-02-11 02:18:02	how-does-tutorplus-relate-to-the-institutions-that-are-on-this-platform	4
3	10	How do you make the best out of our platform?	<p>We encourage every participant on our platform to freely express their view points of any subject or topic they might be involved in while at the same time acknowledging other peers' perspectives and opinions for collective goodness. Indeed, this new kind of learning bases its effectiveness on the quality of interactions that you allow yourself to be part of. Again, our platform remains neutral to any form of interaction, but yet it helps to offer such an objective learning medium through which a common footing can easily be accomplished as a result of its explicitness and objectivity.<br></p>\r\n	t	2013-02-02 13:29:41	2013-02-11 02:18:17	how-do-you-make-the-best-out-of-our-platform	5
\.


--
-- Name: faq_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('faq_id_seq', 5, true);


--
-- Data for Name: file; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY file (id, folder_id, original_name, generated_name, mime_type, size, created_at, updated_at) FROM stdin;
\.


--
-- Name: file_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('file_id_seq', 1, false);


--
-- Data for Name: folder; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY folder (id, name, type, parent_id, created_at, updated_at, lft, rgt, level) FROM stdin;
\.


--
-- Name: folder_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('folder_id_seq', 1, false);


--
-- Data for Name: gradebook; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY gradebook (id, items, course_id, created_at, updated_at) FROM stdin;
1	0	1	2013-01-10 21:21:34	2013-01-10 21:21:34
2	0	2	2013-01-10 21:25:00	2013-01-10 21:25:00
3	0	3	2013-01-10 21:25:57	2013-01-10 21:25:57
4	0	4	2013-01-10 21:27:36	2013-01-10 21:27:36
5	0	2	2013-01-12 18:47:27	2013-01-12 18:47:27
6	0	3	2013-01-17 00:16:58	2013-01-17 00:16:58
7	0	3	2013-01-20 18:33:04	2013-01-20 18:33:04
8	0	3	2013-01-20 18:34:41	2013-01-20 18:34:41
9	0	1	2013-01-31 02:39:17	2013-01-31 02:39:17
10	0	1	2013-02-25 20:15:39	2013-02-25 20:15:39
11	0	5	2013-02-25 22:18:35	2013-02-25 22:18:35
12	0	5	2013-02-25 22:24:27	2013-02-25 22:24:27
13	0	5	2013-02-25 22:27:06	2013-02-25 22:27:06
14	0	5	2013-02-25 22:28:26	2013-02-25 22:28:26
15	0	5	2013-03-03 13:23:46	2013-03-03 13:23:46
\.


--
-- Name: gradebook_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('gradebook_id_seq', 15, true);


--
-- Data for Name: gradebook_item; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY gradebook_item (id, name, weight, gradebook_id, created_at, updated_at) FROM stdin;
\.


--
-- Name: gradebook_item_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('gradebook_item_id_seq', 1, false);


--
-- Data for Name: gradebook_scale; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY gradebook_scale (id, min_points, max_points, code, gradebook_id, created_at, updated_at) FROM stdin;
1	75.00	100.00	A	1	2013-01-10 21:21:34	2013-01-10 21:21:34
2	65.00	74.00	B	1	2013-01-10 21:21:34	2013-01-10 21:21:34
3	55.00	64.00	C	1	2013-01-10 21:21:34	2013-01-10 21:21:34
4	45.00	54.00	D	1	2013-01-10 21:21:34	2013-01-10 21:21:34
5	35.00	44.00	E	1	2013-01-10 21:21:34	2013-01-10 21:21:34
6	0.00	34.00	F	1	2013-01-10 21:21:34	2013-01-10 21:21:34
7	75.00	100.00	A	2	2013-01-10 21:25:00	2013-01-10 21:25:00
8	65.00	74.00	B	2	2013-01-10 21:25:00	2013-01-10 21:25:00
9	55.00	64.00	C	2	2013-01-10 21:25:00	2013-01-10 21:25:00
10	45.00	54.00	D	2	2013-01-10 21:25:01	2013-01-10 21:25:01
11	35.00	44.00	E	2	2013-01-10 21:25:01	2013-01-10 21:25:01
12	0.00	34.00	F	2	2013-01-10 21:25:01	2013-01-10 21:25:01
13	75.00	100.00	A	3	2013-01-10 21:25:57	2013-01-10 21:25:57
14	65.00	74.00	B	3	2013-01-10 21:25:57	2013-01-10 21:25:57
15	55.00	64.00	C	3	2013-01-10 21:25:57	2013-01-10 21:25:57
16	45.00	54.00	D	3	2013-01-10 21:25:57	2013-01-10 21:25:57
17	35.00	44.00	E	3	2013-01-10 21:25:57	2013-01-10 21:25:57
18	0.00	34.00	F	3	2013-01-10 21:25:57	2013-01-10 21:25:57
19	75.00	100.00	A	4	2013-01-10 21:27:36	2013-01-10 21:27:36
20	65.00	74.00	B	4	2013-01-10 21:27:36	2013-01-10 21:27:36
21	55.00	64.00	C	4	2013-01-10 21:27:36	2013-01-10 21:27:36
22	45.00	54.00	D	4	2013-01-10 21:27:36	2013-01-10 21:27:36
23	35.00	44.00	E	4	2013-01-10 21:27:36	2013-01-10 21:27:36
24	0.00	34.00	F	4	2013-01-10 21:27:36	2013-01-10 21:27:36
25	75.00	100.00	A	5	2013-01-12 18:47:27	2013-01-12 18:47:27
26	65.00	74.00	B	5	2013-01-12 18:47:27	2013-01-12 18:47:27
27	55.00	64.00	C	5	2013-01-12 18:47:27	2013-01-12 18:47:27
28	45.00	54.00	D	5	2013-01-12 18:47:27	2013-01-12 18:47:27
29	35.00	44.00	E	5	2013-01-12 18:47:27	2013-01-12 18:47:27
30	0.00	34.00	F	5	2013-01-12 18:47:27	2013-01-12 18:47:27
31	75.00	100.00	A	6	2013-01-17 00:16:58	2013-01-17 00:16:58
32	65.00	74.00	B	6	2013-01-17 00:16:58	2013-01-17 00:16:58
33	55.00	64.00	C	6	2013-01-17 00:16:58	2013-01-17 00:16:58
34	45.00	54.00	D	6	2013-01-17 00:16:58	2013-01-17 00:16:58
35	35.00	44.00	E	6	2013-01-17 00:16:58	2013-01-17 00:16:58
36	0.00	34.00	F	6	2013-01-17 00:16:58	2013-01-17 00:16:58
37	75.00	100.00	A	7	2013-01-20 18:33:04	2013-01-20 18:33:04
38	65.00	74.00	B	7	2013-01-20 18:33:04	2013-01-20 18:33:04
39	55.00	64.00	C	7	2013-01-20 18:33:04	2013-01-20 18:33:04
40	45.00	54.00	D	7	2013-01-20 18:33:04	2013-01-20 18:33:04
41	35.00	44.00	E	7	2013-01-20 18:33:04	2013-01-20 18:33:04
42	0.00	34.00	F	7	2013-01-20 18:33:04	2013-01-20 18:33:04
43	75.00	100.00	A	8	2013-01-20 18:34:41	2013-01-20 18:34:41
44	65.00	74.00	B	8	2013-01-20 18:34:41	2013-01-20 18:34:41
45	55.00	64.00	C	8	2013-01-20 18:34:41	2013-01-20 18:34:41
46	45.00	54.00	D	8	2013-01-20 18:34:41	2013-01-20 18:34:41
47	35.00	44.00	E	8	2013-01-20 18:34:41	2013-01-20 18:34:41
48	0.00	34.00	F	8	2013-01-20 18:34:41	2013-01-20 18:34:41
49	75.00	100.00	A	9	2013-01-31 02:39:17	2013-01-31 02:39:17
50	65.00	74.00	B	9	2013-01-31 02:39:17	2013-01-31 02:39:17
51	55.00	64.00	C	9	2013-01-31 02:39:17	2013-01-31 02:39:17
52	45.00	54.00	D	9	2013-01-31 02:39:17	2013-01-31 02:39:17
53	35.00	44.00	E	9	2013-01-31 02:39:17	2013-01-31 02:39:17
54	0.00	34.00	F	9	2013-01-31 02:39:17	2013-01-31 02:39:17
55	75.00	100.00	A	10	2013-02-25 20:15:39	2013-02-25 20:15:39
56	65.00	74.00	B	10	2013-02-25 20:15:39	2013-02-25 20:15:39
57	55.00	64.00	C	10	2013-02-25 20:15:39	2013-02-25 20:15:39
58	45.00	54.00	D	10	2013-02-25 20:15:39	2013-02-25 20:15:39
59	35.00	44.00	E	10	2013-02-25 20:15:39	2013-02-25 20:15:39
60	0.00	34.00	F	10	2013-02-25 20:15:39	2013-02-25 20:15:39
61	75.00	100.00	A	11	2013-02-25 22:18:35	2013-02-25 22:18:35
62	65.00	74.00	B	11	2013-02-25 22:18:35	2013-02-25 22:18:35
63	55.00	64.00	C	11	2013-02-25 22:18:35	2013-02-25 22:18:35
64	45.00	54.00	D	11	2013-02-25 22:18:35	2013-02-25 22:18:35
65	35.00	44.00	E	11	2013-02-25 22:18:35	2013-02-25 22:18:35
66	0.00	34.00	F	11	2013-02-25 22:18:35	2013-02-25 22:18:35
67	75.00	100.00	A	12	2013-02-25 22:24:27	2013-02-25 22:24:27
68	65.00	74.00	B	12	2013-02-25 22:24:27	2013-02-25 22:24:27
69	55.00	64.00	C	12	2013-02-25 22:24:27	2013-02-25 22:24:27
70	45.00	54.00	D	12	2013-02-25 22:24:27	2013-02-25 22:24:27
71	35.00	44.00	E	12	2013-02-25 22:24:27	2013-02-25 22:24:27
72	0.00	34.00	F	12	2013-02-25 22:24:27	2013-02-25 22:24:27
73	75.00	100.00	A	13	2013-02-25 22:27:06	2013-02-25 22:27:06
74	65.00	74.00	B	13	2013-02-25 22:27:06	2013-02-25 22:27:06
75	55.00	64.00	C	13	2013-02-25 22:27:06	2013-02-25 22:27:06
76	45.00	54.00	D	13	2013-02-25 22:27:06	2013-02-25 22:27:06
77	35.00	44.00	E	13	2013-02-25 22:27:06	2013-02-25 22:27:06
78	0.00	34.00	F	13	2013-02-25 22:27:06	2013-02-25 22:27:06
79	75.00	100.00	A	14	2013-02-25 22:28:26	2013-02-25 22:28:26
80	65.00	74.00	B	14	2013-02-25 22:28:26	2013-02-25 22:28:26
81	55.00	64.00	C	14	2013-02-25 22:28:26	2013-02-25 22:28:26
82	45.00	54.00	D	14	2013-02-25 22:28:26	2013-02-25 22:28:26
83	35.00	44.00	E	14	2013-02-25 22:28:26	2013-02-25 22:28:26
84	0.00	34.00	F	14	2013-02-25 22:28:26	2013-02-25 22:28:26
85	75.00	100.00	A	15	2013-03-03 13:23:46	2013-03-03 13:23:46
86	65.00	74.00	B	15	2013-03-03 13:23:46	2013-03-03 13:23:46
87	55.00	64.00	C	15	2013-03-03 13:23:46	2013-03-03 13:23:46
88	45.00	54.00	D	15	2013-03-03 13:23:46	2013-03-03 13:23:46
89	35.00	44.00	E	15	2013-03-03 13:23:46	2013-03-03 13:23:46
90	0.00	34.00	F	15	2013-03-03 13:23:46	2013-03-03 13:23:46
\.


--
-- Name: gradebook_scale_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('gradebook_scale_id_seq', 90, true);


--
-- Data for Name: institution; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY institution (id, name, abbreviation, description, country_id) FROM stdin;
2	University of Cape Town	UCT	The second biggest university in South Africa. This university is well know for it's excellent academic achievements.	1
3	University of Pretoria	UP	This is the university of Pretoria in South Africa	1
1	None	None	None	1
\.


--
-- Name: institution_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('institution_id_seq', 3, true);


--
-- Data for Name: mailing_list; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY mailing_list (id, name, profile_id, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: mailing_list_email_message; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY mailing_list_email_message (id, mailing_list_id, email_message_id) FROM stdin;
\.


--
-- Name: mailing_list_email_message_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('mailing_list_email_message_id_seq', 1, false);


--
-- Name: mailing_list_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('mailing_list_id_seq', 1, false);


--
-- Data for Name: media_asset; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY media_asset (id, type, name, is_default, created_at, updated_at) FROM stdin;
\.


--
-- Name: media_asset_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('media_asset_id_seq', 1, false);


--
-- Data for Name: news_item; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY news_item (id, profile_id, heading, blurb, body, is_published, lock_until, lock_after, created_at, updated_at, slug) FROM stdin;
1	10	TutorPlus voted the best learning platform of 2013	TutorPlus has been voted the best learning platform of 2013. And it's with great pleasure to announce that we've been voted as the most profound and educative learning platform of all time.	<p>TutorPlus has been voted the best learning platform of 2013. And it's with great pleasure to announce that we've been voted as the most profound and educative learning platform of all time.<br></p>	t	2012-07-10 00:00:00	2011-07-09 00:00:00	2013-01-15 22:01:07	2013-01-15 22:01:07	tutorplus-voted-the-best-learning-platform-of-2013
2	10	Court to police: Excessive force unacceptable	Highest administrative court sends clear message to police who broke up oil pipeline protest in Hat Yai in 2002 before Thaksin mobile cabinet meeting.	The Supreme Administrative Court on Wednesday ordered the Royal Thai Police Office (RTPO) to pay 24 people 100,000 baht in damages for using force to break up a protest against the Thai-Malaysian gas pipeline and gas separation plant projects in Songkhla's Chana district in 2002.<br><br>Twenty-four villagers filed a lawsuit with the Songkhla Administrative Court against the RTPO and the Interior Ministry demanding compensation for damages caused by excessive use of force to disperse the protesters in violation of their right to unarmed and peaceful rally under Section 40 of the 1997 constitution.<br><br>The Songkhla Administrative Court accepted the case for consideration.\r\n\r\nThe case was considered a precedent. It was the first to have been brought by local people against government authorities and agencies demanding compensation for damage for violation of the people's right to stage a peaceful and unarmed protest as permitted by the constitution.<br><br>According to the lawsuit, the incident occurred on Dec 20, 2002 on Juti Anusorn road near J.B. Hotel in Hat Yai district when local residents demonstrated ahead of a plan to submit a petition to then prime minister Thaksin Shinawatra, who was scheduled to attend a mobile cabinet meeting at the hotel on Dec 21.\r\n\r\nThe petition asked the government to reconsider the Thai-Malaysian gas pipeline and Thai-Malaysian gas separation plant projects.\r\n	t	2014-05-11 00:00:00	2016-05-11 00:00:00	2013-01-16 19:06:39	2013-01-16 19:06:39	court-to-police-excessive-force-unacceptable
3	10	Connected Learning: An Agenda for Social Change	<p>A teenager who developed her creative writing skills, in large part by interacting with peers on the Internet, and who was eventually offered admissions to selective colleges on the basis of her strong writing samples. A young man who learned how to make a living as a professional web comics artist by connecting with knowledge and communities of artists on the Internet.</p><p>A public school in Chicago experimenting with a two-week period each term where students work on complex and collaborative projects where they need to define roles, problem solve together, and share their work with a broader community.<br></p>\r\n	<p>All of these are examples of what my colleagues and I have been \r\ncalling "connected learning" -- learning that is highly social, \r\ninterest-driven, and oriented toward educational, economic, or civic \r\nopportunity. </p>\r\n\r\n<p>This week, the Connected Learning Research Network, a research group that I chair, released a <a href="http://dmlhub.net/sites/default/files/ConnectedLearning_report.pdf">report</a>\r\n (PDF) that outlines how connected learning environments are designed \r\nand how they can benefit youth in networked society, especially the \r\nunderprivileged and vulnerable. The report calls for several core \r\nchanges in education, including:</p>\r\n\r\n<p>•\tClose the gap between the no-frills learning that too often happens\r\n in-school and the interactive, hands-on learning that usually takes \r\nplace out of school;</p>\r\n\r\n<p>•\tTake advantage of the Internet's ability to help youth develop knowledge, expertise, skills and important new literacies;</p>\r\n\r\n<p>•\tUse the benefits of digital technology and social networking to \r\ncombat the increasing reality of the haves and have-nots in education.</p>\r\n\r\n<p>Connected learning is when you're pursuing knowledge and expertise \r\naround something you care deeply about, and you're supported by friends \r\nand institutions who share and recognize this common passion or purpose.\r\n Connected learning is <em>not</em> about any particular platform, \r\ntechnology, or teaching technique, like blended learning or the flipped \r\nclassroom or Khan Academy or massive open online courses. It's agnostic \r\nabout the method and content area. Instead, it's about asking what is \r\nthe optimal experience for each learner and for a high-functioning \r\nlearning community?</p>\r\n\r\n<p>Our research network is seeing tremendous potential in the Internet \r\nfor advancing learning. But right now, it's only the most activated and \r\nwell-supported learners who are reaping the benefits of connected \r\nlearning. In fact, we are at risk of seeing yet another way privileged \r\nindividuals gain advantage -- even though the Internet and digital \r\ntechnology give us the potential to multiply opportunities for all youth\r\n to realize their learning potential and their right to thrive. Left \r\nunchecked, this is an inequity that will only worsen.</p>\r\n\r\n<p>Our report outlines a number of disturbing socioeconomic trends that \r\npromise to further undermine existing inequities and issues in public \r\neducation:</p>\r\n\r\n<p><b>Broken pathways from education to opportunity</b>: Youth are \r\nentering a labor market strikingly different from earlier generations. \r\nEducation, even a college degree, no longer offers a sure pathway to \r\nopportunity. Young people find themselves competing for a scarcer number\r\n of good jobs. An "arms race" in educational attainment has broken out, \r\nespecially among upper income households to gain advantage.</p>\r\n\r\n<p><b>A growing learning divide</b>: The achievement gap in public \r\neducation disproportionately impacts African American and Latino youth. \r\nInequity is aggravated by the accelerating rate of family investments in\r\n out-of-school enrichment and learning activities, many of which \r\nleverage the learning advances offered by the Internet and digital \r\ntechnology.</p>\r\n\r\n<p><b>A commercialized and fragmented media ecology</b>: We are living \r\nthrough a dramatic shift in media and technology and this shift is most \r\npronounced among children and youth. Increasingly, there is a disconnect\r\n between classroom learning and the everyday lives and interests of many\r\n young people -- further alienating many youth from their schooling. </p>\r\n\r\n<p>In contrast to other educational reform approaches, connected \r\nlearning is distinguished by an aggressive social change agenda. It is \r\nmotivated by a desire to witness a transformation in the educational \r\nsystem that is fundamentally about fairness and possibility. It is both \r\nevidence-driven and visionary in its aspirations. We believe this social\r\n vision can be realized because connected learning seeks to:</p>\r\n\r\n<p><strong>- Address inequity in education</strong>;<br>\r\n<strong>- Engender 21st century skills and literacies in all youth</strong>;<br>\r\n<strong>- Attune to the learning possibilities of a networked society</strong>;<br>\r\n<strong>- Elevate the quality of knowledge and learning for the collective good</strong>. </p>\r\n\r\n<p>There is a unique opportunity before us with today's technologies to \r\nmake the entry points and pathways to knowledge, learning and \r\nopportunity accessible to many more young people. Learning research has \r\nshown us that the most resilient and effective forms of learning happen \r\nwhen there's motivation, engagement, social support, and when the \r\nlearning is real-world, intergenerational, and connected to young \r\npeople's lives in a meaningful way.</p>\r\n\r\n<p>With today's networked world, we have the capacity to address <em>all</em>\r\n young people's right to learn, to thrive, to find a place, and to \r\ncontribute to our society. It's really no longer a question of how. It's\r\n a question of will.</p>\r\n\r\n<p><em>The report by the Connected Learning Research Network, whose work\r\n is supported by the MacArthur Foundation as part of its digital media \r\nand learning initiative, can be found <a href="http://dmlhub.net/sites/default/files/ConnectedLearning_report.pdf">here</a>.</em></p><p><br></p>	t	2017-09-11 00:00:00	2017-07-13 00:00:00	2013-01-16 19:18:10	2013-01-31 22:20:23	connected-learning-an-agenda-for-social-change
\.


--
-- Name: news_item_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('news_item_id_seq', 3, true);


--
-- Data for Name: notification_settings; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY notification_settings (id, email, reply, peer_activities, news_alerts, announcement_alerts, event_alerts, discussion_updates, course_updates, assignment_due, system_updates, system_maintenance, profile_id) FROM stdin;
1	t	t	f	t	t	t	f	f	t	t	t	9
2	f	f	f	f	f	f	f	f	f	f	f	12
4	f	t	f	t	f	f	t	f	t	t	f	14
3	t	t	f	t	t	t	f	f	f	f	t	10
5	f	f	f	f	f	f	f	f	f	f	f	29
6	t	t	t	f	t	f	t	t	f	t	t	19
\.


--
-- Name: notification_settings_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('notification_settings_id_seq', 6, true);


--
-- Data for Name: peer; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY peer (id, inviter_id, invitee_id, status) FROM stdin;
424	29	16	1
425	29	17	1
426	29	20	1
427	29	15	1
428	29	11	1
429	29	7	1
430	29	9	1
431	29	25	1
432	29	28	1
433	29	13	1
434	29	27	1
435	29	12	1
436	29	23	1
437	29	18	1
451	14	20	1
452	14	7	1
453	14	9	1
454	14	25	1
455	14	28	1
456	14	27	1
457	14	12	1
458	14	23	1
459	14	18	1
460	22	16	1
461	22	20	1
462	22	15	1
463	22	11	1
464	22	7	1
465	22	9	1
466	22	25	1
467	22	28	1
468	22	27	1
469	22	12	1
470	22	23	1
471	22	18	1
472	26	28	1
473	26	27	1
474	26	12	1
488	17	20	1
489	17	7	1
490	17	9	1
491	17	25	1
492	17	28	1
493	17	27	1
494	17	12	1
495	17	23	1
496	25	16	1
497	25	20	1
498	25	15	1
499	25	11	1
500	25	7	1
501	25	9	1
502	25	28	1
503	25	27	1
504	25	12	1
505	25	23	1
389	10	7	3
390	10	9	3
391	28	28	3
392	29	29	3
393	21	20	3
394	21	7	3
395	21	9	3
396	21	25	3
397	21	23	3
398	21	18	3
399	29	14	3
317	10	19	3
318	10	10	3
319	10	14	3
321	19	19	3
322	19	21	3
324	19	24	3
325	19	17	3
326	19	15	3
327	10	21	3
329	10	24	3
331	10	15	3
401	29	24	3
404	10	29	3
330	10	17	3
332	19	13	3
333	19	16	3
334	19	11	3
335	10	13	3
336	10	16	3
338	19	14	3
339	21	14	3
340	21	13	3
341	21	22	3
342	21	24	3
343	21	16	3
344	21	17	3
345	21	15	3
346	21	11	3
347	17	14	3
348	17	13	3
349	17	22	3
350	17	24	3
351	17	16	3
352	17	15	3
353	17	11	3
354	14	13	3
355	14	22	3
356	14	24	3
357	14	16	3
358	14	15	3
359	14	11	3
360	10	23	3
361	10	25	3
362	10	20	3
363	10	18	3
364	24	13	3
365	24	22	3
366	24	16	3
367	24	20	3
368	24	15	3
369	24	11	3
370	24	25	3
371	24	23	3
372	24	18	3
337	10	11	3
377	26	26	3
423	22	22	3
380	26	21	3
381	26	14	3
382	26	22	3
383	26	24	3
384	26	16	3
385	26	17	3
386	26	15	3
387	26	11	3
388	26	13	3
405	10	26	3
408	19	29	3
373	19	20	3
374	19	25	3
375	19	23	3
376	19	18	3
406	19	7	3
407	19	9	3
378	26	19	3
409	21	29	3
410	26	20	3
411	26	7	3
412	26	9	3
413	26	25	3
414	26	23	3
415	26	18	3
416	26	29	3
417	10	27	3
418	19	27	3
419	10	12	3
420	10	28	3
421	19	28	3
422	19	12	3
328	10	22	3
323	19	22	3
400	29	22	3
438	13	16	1
439	13	20	1
440	13	15	1
441	13	11	1
442	13	7	1
443	13	9	1
444	13	25	1
445	13	28	1
446	13	27	1
447	13	22	1
448	13	12	1
449	13	23	1
450	13	18	1
476	18	16	1
477	18	17	1
478	18	20	1
479	18	15	1
480	18	11	1
481	18	7	1
482	18	9	1
483	18	25	1
484	18	28	1
485	18	27	1
486	18	12	1
487	18	23	1
\.


--
-- Name: peer_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('peer_id_seq', 505, true);


--
-- Data for Name: profile; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY profile (id, first_name, last_name, middle_name, birth_date, gender, is_instructor, high_school, studied_at, current_study, title, email, password, algorithm, salt, is_super_admin, is_active, institution_id, last_login, created_at, updated_at, slug, about_me) FROM stdin;
14	Tendayi	Matuku		2008-03-11 00:00:00	Female	f	Kambuzuma High 2	NUST	The future of learning institutions in the digital culture.	Mr	tendayi@tutorplus.org	1dfbbb17d0fdf594c210112585feeb597236917a	sha1	16ef40f0bd5bc9f21cb7f3b340909c79	f	t	2	2013-01-19 14:12:50	2013-01-19 14:04:23	2013-01-19 14:45:23	tendayi-matuku	<p>I enjoy learning and anyone who's something to share or contribute is more than welcome</p>
8	Chido	Mushaya		2009-02-02 00:00:00	Female	f	Zimuto High School	National University of Science and Technology	Professional modelling	Miss	chido@tutorplus.org	6137f90f18bed01262dad1e84c11a1b19a2303c4	sha1	ec285fe10bc5041cf2561079a2c38ab0	f	t	1	2013-01-23 20:25:34	2013-01-10 17:29:35	2013-01-23 20:25:34	chido-mushaya	
24	Bill	Gates		1946-04-13 00:00:00	Male	t				Mr	bill@tutorplus.org	a95ca3572a0b2025fc5e9ba0ba033bf3afe76d87	sha1	533bf7f9e357730623db98c98eb02728	f	t	3	\N	2013-01-28 01:40:38	2013-01-30 00:22:44	bill-gates	
26	Batanayi	Matuku		1984-05-05 00:00:00	\N	t				Mr	batanayi@tutorplus.org	d268fb9df219f4f09feb253363e34ede5ddf811f	sha1	94e37627cdaf4c61b9f52cd0ac95d6df	t	t	1	2013-02-21 19:35:59	2013-02-14 19:38:11	2013-02-21 20:32:56	batanayi-matuku	
16	Lindela	Ndlovu		1951-05-06 00:00:00	Male	t				Mr	lindela@tutorplus.org	75050ca1e3354d04888386ec54eb628bf92b26cd	sha1	e206d178a000f79e0474f5cd3db922db	f	t	1	\N	2013-01-24 20:35:35	2013-01-24 20:35:35	lindela-ndlovu	
17	Henry	James		1947-09-07 00:00:00	Male	t				Mr	henry@tutorplus.org	951386cc0d8c5c4e94693b65d18423cf346637e1	sha1	a091e8f3c9d8e183c8122af1fd0464c0	f	t	1	\N	2013-01-24 20:38:56	2013-01-24 20:38:56	henry-james	
20	Michael	Tyobe		1945-03-02 00:00:00	Male	t				Mr	michael@tutorplus.org	ca49e07ab18a518728bff5df347cd45d085955be	sha1	1a1aed5f33aafafeb4a2fb8b4806e89c	f	t	1	\N	2013-01-24 20:44:11	2013-01-24 20:44:11	michael-tyobe	
15	Danny 	King		1948-08-05 00:00:00	Male	f	AISB	UCT	International Relations	Mr	d.king@uct.ca.za	594ffcbc11c128e4ac55ab9e2c568bc8826cfd1e	sha1	bdee4d2bc02888b6d1f0eb1a520d32f6	f	t	2	\N	2013-01-20 19:15:11	2013-01-24 20:45:02	danny-king	
11	Gareth	Edwards		2013-03-05 00:00:00	Male	f				Mr	gareth@tutorplus.org	4f226dd4ce50f847059887a57f91c7eed2fe1289	sha1	a106ed5098c08d8c307f6f108648e271	f	t	3	\N	2013-01-15 20:00:07	2013-01-24 20:45:27	gareth-edwards	
7	Robb	Willer		2010-02-02 00:00:00	Male	f				Mr	robb@tutorplus.org	47d95de2c020fccb0c4b7a78b66dc06b6c534437	sha1		f	t	1	\N	2013-01-10 01:15:06	2013-01-24 20:45:49	robb-willer	
6	Yolanda	Matuku		2009-01-28 00:00:00	Male	f				Mr	yolanda@gmail.com	bacc51603d3ba899c8b67e735932c6c65ec02211	sha1		f	t	1	\N	2013-01-09 23:20:42	2013-01-24 20:46:09	yolanda-matuku	
9	Elisha	Moyo		2010-01-02 00:00:00	Male	f	Shungu High	NUST	Med Education	Mr	elisha@tutorplus.org	d1cf572de34f99e8cfcf248965c5a33fb5fda96a	sha1	677f582d5f92a91de16ccdb303c4bb85	f	t	1	2013-01-14 22:23:50	2013-01-10 18:40:32	2013-01-15 00:01:26	elisha-moyo	\N
21	Nyaradzai	Mugaragumbo		1950-08-08 00:00:00	Male	t				Sir	nyaradzai@tutorplus.org	1a2b1b11fc9cdefecd0574edbaf9e8802b44dabf	sha1	551a0aa7e2fb10d23fd34e325359ecbc	f	t	1	\N	2013-01-27 19:46:29	2013-02-26 23:33:45	nyaradzai-mugaragumbo	
25	Bright	Dodoh		1981-03-03 00:00:00	\N	t				Mr	bright@tutorplus.org	18c654548884641b4383d5e7d8ce04103b24c793	sha1	0c4f553285f77e674742c57629bd7350	f	t	3	2013-02-01 18:12:03	2013-02-01 18:12:03	2013-02-01 18:12:03	bright-dodoh	
28	Innocent	Puraze		1985-03-03 00:00:00	Male	t				Mr	innocent@tutorplus.org	10e7c20ea9b9bfa2cca5e19e1c8b8cca7fd6651c	sha1	03c661d775f453feca81cefd01b57daf	f	t	2	2013-02-23 00:20:50	2013-02-23 00:20:50	2013-02-23 00:20:50	innocent-puraze	
13	Dele	Agugu		1984-05-05 00:00:00	Male	f				Mr	dele@tutorplus.org	b8ced36cd5c0fd375a61937d3108aa71a850cd0c	sha1	9242c9f82e33a936b174132b195acd7d	f	f	1	\N	2013-01-18 16:37:12	2013-02-12 22:36:35	dele-agugu	
27	Live	Life		1984-05-05 00:00:00	Male	t				Mr	live@gmail.com	c36953a199bd6bed228112138cd4eec31f564b42	sha1	c0867cee11e2b1942502b24322e3cdb6	f	t	1	\N	2013-02-19 20:38:01	2013-02-19 20:38:01	live-life	
22	Nyaradzai	Mugaragumbo		1950-08-08 00:00:00	Male	t				Ms	nyaradzai@tutorplus.org	6648c9e828c5e25f29fddc42aaa713dc02d4cdb3	sha1	de30484931bb1c9cd5688b87985c305d	f	t	1	2013-02-26 23:35:42	2013-01-27 19:48:17	2013-02-26 23:35:42	nyaradzai-mugaragumbo-1	
12	John	Searle		2013-10-04 00:00:00	Male	t	Shungu High	NUST	Doctrate studies	Prof	john@tutorplus.org	8ae564c674e8aee2cf4756710429af6407b928db	sha1	c6effff50036e77eb7d61158512b5917	f	f	3	\N	2013-01-15 20:05:45	2013-01-30 00:20:31	john-searle	
23	Nomsa	Moyo		1951-05-06 00:00:00	Male	f				Mr	nomsa@gmail.com	cc195f051efdd31211e06dd971ba39f2a71b0520	sha1	92b9227ac72475fee3f9c35ca27baa82	f	t	1	\N	2013-01-27 19:49:20	2013-01-30 00:21:19	nomsa-moyo	
18	William	James		1946-03-02 00:00:00	Male	t				Mr	james@tutorplus.org	fd54cad7df67d79006431a533bd7afabc46f218d	sha1	7a07b0843d5bc8e1fe5ab4625529408c	f	t	1	\N	2013-01-24 20:40:13	2013-02-02 23:48:30	william-james	
29	Robert	Mugabe		1946-04-03 00:00:00	Male	t				Mr	robert@tutorplus.org	fd2a4b7066733b1f7c27080938aadd0fb2595055	sha1	81934ab72241e839f4262e35dd10e747	f	t	1	2013-02-23 01:01:27	2013-02-23 01:01:27	2013-02-23 01:01:27	robert-mugabe	
19	Wallace	Chigona		1950-03-05 00:00:00	Male	t				Mr	wallace@tutorplus.org	f4f3279da0b9d4ef0bd4bd01208faf096d9b2108	sha1	d109ec761c7117cd7db589905fd385c5	f	t	1	2013-03-16 19:34:04	2013-01-24 20:42:16	2013-03-16 20:10:27	wallace-chigona	I'm an educational technologist who love fostering a virtual learning culture :) I also believe in partnering with institutions that see the virtue of technologically enabled collaborative learning.
10	TutorPlus	Team		1984-05-05 00:00:00	Male	f	Shungu High	NUST	Educational Technologies	The	team@tutorplus.org	9add0a197464d52cf8ba81ae637dca015094d4a2	sha1	4cd7b719a7d7e908356295e314aebe48	t	t	3	2013-03-19 12:31:58	2013-01-15 19:19:50	2013-03-19 12:31:58	tutorplus-team	
\.


--
-- Data for Name: profile_activity_feed; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY profile_activity_feed (id, profile_id, activity_feed_id) FROM stdin;
146	10	149
147	10	150
148	10	151
149	10	152
150	10	153
151	10	154
152	10	155
153	10	156
154	19	157
155	19	158
159	19	162
160	19	163
161	10	164
162	10	165
163	19	166
164	10	167
165	10	168
166	19	169
167	10	170
168	19	171
169	19	172
170	10	173
171	19	173
172	10	174
173	10	175
174	10	176
175	10	177
176	10	178
177	10	179
178	10	180
179	10	181
180	10	182
181	10	183
182	10	184
183	10	185
184	10	186
185	10	187
186	10	188
187	10	189
188	10	190
189	10	191
190	10	192
191	10	193
192	10	194
193	10	195
194	10	196
195	10	197
196	10	198
197	10	199
198	10	200
199	10	201
200	10	202
201	10	203
202	10	204
203	10	205
204	10	206
205	10	207
206	10	208
207	10	209
208	10	210
209	10	211
210	10	212
211	10	213
212	10	214
213	10	215
214	10	216
215	10	217
216	10	218
217	14	219
218	14	220
219	14	221
220	21	222
221	22	223
222	24	224
223	17	225
224	15	226
225	21	227
226	22	228
227	24	229
228	10	230
229	10	230
230	10	231
231	10	231
232	15	232
233	17	233
234	10	234
235	10	234
236	13	235
237	16	236
238	11	237
239	13	238
240	16	239
241	19	240
242	19	241
243	14	242
244	10	243
245	10	244
246	10	245
247	10	246
248	10	247
249	10	248
250	10	249
251	21	250
252	21	251
253	10	252
254	10	253
255	10	254
256	10	255
257	10	256
258	10	257
259	19	258
260	10	259
261	10	260
262	10	261
263	10	262
264	10	263
265	10	264
266	10	265
267	10	266
268	19	267
269	10	268
270	10	269
271	10	270
272	10	271
273	10	272
274	23	273
275	25	274
276	20	275
277	18	276
278	10	277
279	10	278
280	10	279
281	10	280
282	10	281
283	10	282
284	10	283
285	10	284
286	24	285
287	24	286
288	10	287
289	11	288
290	10	289
291	26	290
292	26	291
293	26	292
294	19	293
295	7	294
296	9	295
297	28	296
298	28	297
299	29	298
300	29	299
301	14	300
302	22	301
303	24	302
304	29	303
305	29	304
306	26	305
307	19	306
308	19	307
309	19	308
310	19	309
311	19	310
312	19	311
313	19	312
314	19	313
315	19	314
316	19	315
317	29	316
318	20	317
319	25	318
320	23	319
321	18	320
322	7	321
323	9	322
324	26	323
325	19	323
326	19	324
327	19	325
328	19	326
329	19	327
330	19	328
331	27	329
332	10	330
333	10	331
334	10	332
335	10	333
336	6	334
337	6	335
338	10	336
339	10	337
340	12	338
341	28	339
342	10	340
343	10	341
344	10	342
345	10	343
346	10	344
347	10	345
348	10	346
349	10	347
350	10	348
351	10	349
352	10	350
353	10	351
354	10	352
355	10	353
356	10	354
357	10	355
358	10	356
359	10	357
360	10	358
361	10	359
362	10	360
363	10	361
364	10	362
365	10	363
366	10	364
367	10	365
368	10	366
369	10	367
370	10	368
371	10	369
372	10	370
373	10	371
374	10	372
375	10	373
376	10	374
377	10	375
378	10	376
379	10	377
380	10	378
381	10	379
382	10	380
383	10	381
384	10	382
385	10	383
386	10	384
387	10	385
388	22	386
389	22	387
390	10	388
391	22	388
392	19	389
393	22	389
394	29	390
395	22	390
396	10	391
397	10	392
398	10	393
399	10	394
400	10	395
401	10	396
402	10	397
403	10	398
404	10	399
405	10	400
406	10	401
407	10	402
408	13	403
409	13	404
410	10	405
411	10	406
412	10	407
413	10	408
414	10	409
415	10	410
416	10	411
417	10	412
418	10	413
419	10	414
420	10	415
421	10	416
422	10	417
423	10	418
424	10	419
425	10	420
426	10	421
427	10	422
428	10	423
429	10	424
430	10	425
431	10	426
432	10	427
433	10	428
434	10	429
435	10	430
436	10	431
437	10	432
438	10	433
439	10	434
440	10	435
441	10	436
442	10	437
443	10	438
444	19	439
445	10	440
446	10	441
447	26	442
448	26	443
449	18	444
450	18	445
451	19	446
452	19	447
453	10	448
454	10	449
455	10	450
456	10	451
457	10	452
458	10	453
459	10	454
460	10	455
461	10	456
462	10	457
463	10	458
464	10	459
465	10	460
466	10	461
467	10	462
468	10	463
469	10	464
470	10	465
471	10	466
472	10	467
473	10	468
474	10	469
475	10	470
476	10	471
477	10	472
478	10	473
479	10	474
480	10	475
481	10	476
482	10	477
483	10	478
484	10	479
485	14	480
486	14	481
487	10	482
488	10	483
489	10	484
490	10	485
491	10	486
492	10	487
493	10	488
494	10	489
495	10	490
496	10	491
497	10	492
498	17	493
499	17	494
500	25	495
501	25	496
502	10	497
503	10	498
504	10	499
505	22	500
506	22	501
507	10	502
\.


--
-- Name: profile_activity_feed_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('profile_activity_feed_id_seq', 507, true);


--
-- Data for Name: profile_attendance; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY profile_attendance (id, status, attendance_id, profile_id, created_at, updated_at) FROM stdin;
\.


--
-- Name: profile_attendance_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('profile_attendance_id_seq', 1, false);


--
-- Data for Name: profile_award; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY profile_award (id, profile_id, institution, description, year) FROM stdin;
1	9	National University of Science and Technology	Honors degree in Computer Science	2007
2	10	Harvard College	Phd in Computer Science	2013
3	10	University of Cape Town	Master of Commerce in Information Systems	2012
\.


--
-- Name: profile_award_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('profile_award_id_seq', 3, true);


--
-- Data for Name: profile_book; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY profile_book (id, profile_id, title, author) FROM stdin;
1	9	Philosophy of Money	Georg Simmel
3	14	The queen and her people	Anonymous
4	15	Of mice and  men	john stienbeck
5	19	Philosophy of Money	Georg Simmel
2	10	The future for higher education.	B Matuku
\.


--
-- Name: profile_book_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('profile_book_id_seq', 5, true);


--
-- Data for Name: profile_calendar; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY profile_calendar (id, owner_id, calendar_id) FROM stdin;
\.


--
-- Name: profile_calendar_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('profile_calendar_id_seq', 1, false);


--
-- Data for Name: profile_course; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY profile_course (id, profile_id, course_id) FROM stdin;
239	22	3
255	10	1
256	10	5
258	24	5
260	10	4
261	10	3
262	21	5
263	29	5
199	29	4
200	19	3
201	19	1
212	19	2
213	19	5
\.


--
-- Name: profile_course_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('profile_course_id_seq', 263, true);


--
-- Data for Name: profile_folder; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY profile_folder (id, profile_id, folder_id) FROM stdin;
\.


--
-- Name: profile_folder_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('profile_folder_id_seq', 1, false);


--
-- Data for Name: profile_forgot_password; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY profile_forgot_password (id, profile_id, unique_key, expires_at, created_at, updated_at) FROM stdin;
2	9	6d989aad868d8a3b3f0d1abcf39516bb	2013-02-21 17:49:50	2013-02-21 18:49:50	2013-02-21 18:49:50
20	26	e0337700e9bbeb9f8204a03c6884feb1	2013-02-21 22:35:56	2013-02-21 20:35:56	2013-02-21 20:35:56
\.


--
-- Name: profile_forgot_password_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('profile_forgot_password_id_seq', 20, true);


--
-- Data for Name: profile_gradebook_item; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY profile_gradebook_item (id, points, gradebook_item_id, profile_id, created_at, updated_at) FROM stdin;
\.


--
-- Name: profile_gradebook_item_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('profile_gradebook_item_id_seq', 1, false);


--
-- Data for Name: profile_group; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY profile_group (id, name, description, created_at, updated_at) FROM stdin;
\.


--
-- Name: profile_group_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('profile_group_id_seq', 1, false);


--
-- Data for Name: profile_group_permission; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY profile_group_permission (id, group_id, permission_id, created_at, updated_at) FROM stdin;
\.


--
-- Name: profile_group_permission_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('profile_group_permission_id_seq', 1, false);


--
-- Name: profile_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('profile_id_seq', 29, true);


--
-- Data for Name: profile_interest; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY profile_interest (id, profile_id, name) FROM stdin;
1	9	Skiing and mountaineering
2	9	Reading any texts
3	9	Gossiping with friends
5	10	Programming in PHP and Open Source
6	14	Skiing and mountaineering
7	10	Reading Romantic Novels
9	15	Gym
10	19	Reading technology news
11	19	Going to the gym
12	19	Playing pool
4	10	Playing pool with friends
8	10	Mountain climbing
\.


--
-- Name: profile_interest_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('profile_interest_id_seq', 12, true);


--
-- Data for Name: profile_permission; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY profile_permission (id, name, description, created_at, updated_at) FROM stdin;
1	Instructor	<p>Instructor permission type.</p>	2013-01-12 06:42:34	2013-01-12 06:42:34
2	Student	This is the student permission	2013-01-15 19:34:16	2013-01-15 19:34:16
3	Administrator	<p>This is the administrator permission</p>\r\n	2013-01-21 22:56:54	2013-01-21 23:09:40
\.


--
-- Name: profile_permission_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('profile_permission_id_seq', 3, true);


--
-- Data for Name: profile_profile_group; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY profile_profile_group (id, profile_id, group_id, created_at, updated_at) FROM stdin;
\.


--
-- Name: profile_profile_group_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('profile_profile_group_id_seq', 1, false);


--
-- Data for Name: profile_profile_permission; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY profile_profile_permission (id, profile_id, permission_id, created_at, updated_at) FROM stdin;
13	16	1	2013-01-24 20:35:35	2013-01-24 20:35:35
14	17	1	2013-01-24 20:38:57	2013-01-24 20:38:57
15	18	1	2013-01-24 20:40:13	2013-01-24 20:40:13
16	19	1	2013-01-24 20:42:16	2013-01-24 20:42:16
17	20	1	2013-01-24 20:44:11	2013-01-24 20:44:11
20	12	1	2013-01-30 00:20:31	2013-01-30 00:20:31
22	21	1	2013-01-30 00:21:45	2013-01-30 00:21:45
23	22	1	2013-01-30 00:22:14	2013-01-30 00:22:14
24	24	1	2013-01-30 00:22:44	2013-01-30 00:22:44
28	25	1	2013-02-01 18:12:03	2013-02-01 18:12:03
29	13	1	2013-02-12 22:36:35	2013-02-12 22:36:35
30	26	1	2013-02-14 19:38:11	2013-02-14 19:38:11
31	27	1	2013-02-19 20:38:01	2013-02-19 20:38:01
32	28	1	2013-02-23 00:20:50	2013-02-23 00:20:50
33	29	1	2013-02-23 01:01:27	2013-02-23 01:01:27
34	10	3	2013-03-17 02:35:39	2013-03-17 02:35:39
\.


--
-- Name: profile_profile_permission_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('profile_profile_permission_id_seq', 34, true);


--
-- Data for Name: profile_programme; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY profile_programme (id, profile_id, program_id) FROM stdin;
\.


--
-- Name: profile_programme_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('profile_programme_id_seq', 1, false);


--
-- Data for Name: profile_publication; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY profile_publication (id, profile_id, title, link, year) FROM stdin;
1	9	Collective intentionality in collaborative learning contexts		
2	10	Connected learning as the future for learning		2013
3	14	 How to become a lifelong learner		2011
4	15	Powers within you		2003
5	19	Virtual learning and it's implications		2013
\.


--
-- Name: profile_publication_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('profile_publication_id_seq', 5, true);


--
-- Data for Name: profile_qualification; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY profile_qualification (id, profile_id, institution, description, year) FROM stdin;
1	9	National University of Science and Technology	Bachelor of Science in Computer Science	2008
2	9	Harvard	Doctoral degree in E-learning and Digital Cultures	2006
3	10	NUST	Bachelor of Honors Degree in Computer Science.	2008
\.


--
-- Name: profile_qualification_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('profile_qualification_id_seq', 3, true);


--
-- Data for Name: profile_remember_key; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY profile_remember_key (id, profile_id, remember_key, ip_address, created_at, updated_at) FROM stdin;
17	22	rq6il1s03kg8o40gg0osocg444sgs8k	127.0.0.1	2013-02-26 23:35:42	2013-02-26 23:35:42
\.


--
-- Name: profile_remember_key_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('profile_remember_key_id_seq', 17, true);


--
-- Data for Name: program; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY program (id, name, abbreviation, code, description, type, department_id, program_level_id) FROM stdin;
\.


--
-- Name: program_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('program_id_seq', 1, false);


--
-- Data for Name: program_level; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY program_level (id, name) FROM stdin;
\.


--
-- Name: program_level_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('program_level_id_seq', 1, false);


--
-- Data for Name: room; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY room (id, name, abbreviation, building_id) FROM stdin;
\.


--
-- Name: room_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('room_id_seq', 1, false);


--
-- Data for Name: state_province; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY state_province (id, name, country_id) FROM stdin;
\.


--
-- Name: state_province_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('state_province_id_seq', 1, false);


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
-- Name: announcement_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY announcement
    ADD CONSTRAINT announcement_pkey PRIMARY KEY (id);


--
-- Name: assessment_type_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY assessment_type
    ADD CONSTRAINT assessment_type_pkey PRIMARY KEY (id);


--
-- Name: assignment_discussion_group_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY assignment_discussion_group
    ADD CONSTRAINT assignment_discussion_group_pkey PRIMARY KEY (id);


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
-- Name: assignment_group_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY assignment_group
    ADD CONSTRAINT assignment_group_pkey PRIMARY KEY (id);


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
-- Name: course_announcement_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY course_announcement
    ADD CONSTRAINT course_announcement_pkey PRIMARY KEY (id);


--
-- Name: course_discussion_group_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY course_discussion_group
    ADD CONSTRAINT course_discussion_group_pkey PRIMARY KEY (id);


--
-- Name: course_discussion_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY course_discussion
    ADD CONSTRAINT course_discussion_pkey PRIMARY KEY (id);


--
-- Name: course_faq_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY course_faq
    ADD CONSTRAINT course_faq_pkey PRIMARY KEY (id);


--
-- Name: course_folder_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY course_folder
    ADD CONSTRAINT course_folder_pkey PRIMARY KEY (id);


--
-- Name: course_group_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY course_group
    ADD CONSTRAINT course_group_pkey PRIMARY KEY (id);


--
-- Name: course_link_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY course_link
    ADD CONSTRAINT course_link_pkey PRIMARY KEY (id);


--
-- Name: course_mailing_list_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY course_mailing_list
    ADD CONSTRAINT course_mailing_list_pkey PRIMARY KEY (id);


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
-- Name: course_syllabus_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY course_syllabus
    ADD CONSTRAINT course_syllabus_pkey PRIMARY KEY (id);


--
-- Name: department_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY department
    ADD CONSTRAINT department_pkey PRIMARY KEY (id);


--
-- Name: discussion_comment_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY discussion_comment
    ADD CONSTRAINT discussion_comment_pkey PRIMARY KEY (id);


--
-- Name: discussion_peer_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY discussion_peer
    ADD CONSTRAINT discussion_peer_pkey PRIMARY KEY (id);


--
-- Name: discussion_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY discussion
    ADD CONSTRAINT discussion_pkey PRIMARY KEY (id);


--
-- Name: discussion_post_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY discussion_post
    ADD CONSTRAINT discussion_post_pkey PRIMARY KEY (id);


--
-- Name: discussion_topic_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY discussion_topic
    ADD CONSTRAINT discussion_topic_pkey PRIMARY KEY (id);


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
-- Name: faq_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY faq
    ADD CONSTRAINT faq_pkey PRIMARY KEY (id);


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
-- Name: institution_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY institution
    ADD CONSTRAINT institution_pkey PRIMARY KEY (id);


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
-- Name: media_asset_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY media_asset
    ADD CONSTRAINT media_asset_pkey PRIMARY KEY (id);


--
-- Name: news_item_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY news_item
    ADD CONSTRAINT news_item_pkey PRIMARY KEY (id);


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
-- Name: profile_activity_feed_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY profile_activity_feed
    ADD CONSTRAINT profile_activity_feed_pkey PRIMARY KEY (id);


--
-- Name: profile_attendance_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY profile_attendance
    ADD CONSTRAINT profile_attendance_pkey PRIMARY KEY (id);


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
-- Name: profile_calendar_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY profile_calendar
    ADD CONSTRAINT profile_calendar_pkey PRIMARY KEY (id);


--
-- Name: profile_course_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY profile_course
    ADD CONSTRAINT profile_course_pkey PRIMARY KEY (id);


--
-- Name: profile_folder_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY profile_folder
    ADD CONSTRAINT profile_folder_pkey PRIMARY KEY (id);


--
-- Name: profile_forgot_password_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY profile_forgot_password
    ADD CONSTRAINT profile_forgot_password_pkey PRIMARY KEY (id);


--
-- Name: profile_gradebook_item_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY profile_gradebook_item
    ADD CONSTRAINT profile_gradebook_item_pkey PRIMARY KEY (id);


--
-- Name: profile_group_permission_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY profile_group_permission
    ADD CONSTRAINT profile_group_permission_pkey PRIMARY KEY (id);


--
-- Name: profile_group_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY profile_group
    ADD CONSTRAINT profile_group_pkey PRIMARY KEY (id);


--
-- Name: profile_interest_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY profile_interest
    ADD CONSTRAINT profile_interest_pkey PRIMARY KEY (id);


--
-- Name: profile_permission_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY profile_permission
    ADD CONSTRAINT profile_permission_pkey PRIMARY KEY (id);


--
-- Name: profile_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY profile
    ADD CONSTRAINT profile_pkey PRIMARY KEY (id);


--
-- Name: profile_profile_group_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY profile_profile_group
    ADD CONSTRAINT profile_profile_group_pkey PRIMARY KEY (id);


--
-- Name: profile_profile_permission_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY profile_profile_permission
    ADD CONSTRAINT profile_profile_permission_pkey PRIMARY KEY (id);


--
-- Name: profile_programme_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY profile_programme
    ADD CONSTRAINT profile_programme_pkey PRIMARY KEY (id);


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
-- Name: profile_remember_key_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY profile_remember_key
    ADD CONSTRAINT profile_remember_key_pkey PRIMARY KEY (id);


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
-- Name: state_province_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY state_province
    ADD CONSTRAINT state_province_pkey PRIMARY KEY (id);


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
-- Name: faq_sluggable; Type: INDEX; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE UNIQUE INDEX faq_sluggable ON faq USING btree (slug);


--
-- Name: folderfile; Type: INDEX; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE UNIQUE INDEX folderfile ON file USING btree (folder_id, original_name);


--
-- Name: is_active_idx; Type: INDEX; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE INDEX is_active_idx ON profile USING btree (is_active);


--
-- Name: news_item_sluggable; Type: INDEX; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE UNIQUE INDEX news_item_sluggable ON news_item USING btree (slug);


--
-- Name: profile_sluggable; Type: INDEX; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE UNIQUE INDEX profile_sluggable ON profile USING btree (slug, first_name, last_name);


--
-- Name: academic_period_academic_year_id_academic_year_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY academic_period
    ADD CONSTRAINT academic_period_academic_year_id_academic_year_id FOREIGN KEY (academic_year_id) REFERENCES academic_year(id);


--
-- Name: activity_feed_profile_id_profile_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY activity_feed
    ADD CONSTRAINT activity_feed_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE;


--
-- Name: announcement_profile_id_profile_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY announcement
    ADD CONSTRAINT announcement_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE;


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
-- Name: assignment_submission_profile_id_profile_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY assignment_submission
    ADD CONSTRAINT assignment_submission_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE;


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
-- Name: calendar_event_attendee_profile_id_profile_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY calendar_event_attendee
    ADD CONSTRAINT calendar_event_attendee_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE;


--
-- Name: calendar_event_calendar_id_calendar_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY calendar_event
    ADD CONSTRAINT calendar_event_calendar_id_calendar_id FOREIGN KEY (calendar_id) REFERENCES calendar(id);


--
-- Name: calendar_event_profile_id_profile_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY calendar_event
    ADD CONSTRAINT calendar_event_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE;


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
-- Name: campus_institution_id_institution_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY campus
    ADD CONSTRAINT campus_institution_id_institution_id FOREIGN KEY (institution_id) REFERENCES institution(id);


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
-- Name: course_discussion_group_course_id_course_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY course_discussion_group
    ADD CONSTRAINT course_discussion_group_course_id_course_id FOREIGN KEY (course_id) REFERENCES course(id) ON DELETE CASCADE;


--
-- Name: course_faq_course_id_course_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY course_faq
    ADD CONSTRAINT course_faq_course_id_course_id FOREIGN KEY (course_id) REFERENCES course(id) ON DELETE CASCADE;


--
-- Name: course_faq_faq_id_faq_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY course_faq
    ADD CONSTRAINT course_faq_faq_id_faq_id FOREIGN KEY (faq_id) REFERENCES faq(id) ON DELETE CASCADE;


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
-- Name: course_mailing_list_course_id_course_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY course_mailing_list
    ADD CONSTRAINT course_mailing_list_course_id_course_id FOREIGN KEY (course_id) REFERENCES course(id) ON DELETE CASCADE;


--
-- Name: course_mailing_list_mailing_list_id_mailing_list_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY course_mailing_list
    ADD CONSTRAINT course_mailing_list_mailing_list_id_mailing_list_id FOREIGN KEY (mailing_list_id) REFERENCES mailing_list(id) ON DELETE CASCADE;


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
-- Name: course_syllabus_course_id_course_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY course_syllabus
    ADD CONSTRAINT course_syllabus_course_id_course_id FOREIGN KEY (course_id) REFERENCES course(id) ON DELETE CASCADE;


--
-- Name: department_faculty_id_faculty_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY department
    ADD CONSTRAINT department_faculty_id_faculty_id FOREIGN KEY (faculty_id) REFERENCES faculty(id);


--
-- Name: discussion_comment_discussion_post_id_discussion_post_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY discussion_comment
    ADD CONSTRAINT discussion_comment_discussion_post_id_discussion_post_id FOREIGN KEY (discussion_post_id) REFERENCES discussion_post(id) ON DELETE CASCADE;


--
-- Name: discussion_comment_profile_id_profile_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY discussion_comment
    ADD CONSTRAINT discussion_comment_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE;


--
-- Name: discussion_latest_comment_id_discussion_comment_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY discussion
    ADD CONSTRAINT discussion_latest_comment_id_discussion_comment_id FOREIGN KEY (latest_comment_id) REFERENCES discussion_comment(id) ON DELETE CASCADE;


--
-- Name: discussion_peer_profile_id_profile_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY discussion_peer
    ADD CONSTRAINT discussion_peer_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE;


--
-- Name: discussion_profile_id_profile_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY discussion
    ADD CONSTRAINT discussion_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE;


--
-- Name: discussion_topic_profile_id_profile_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY discussion_topic
    ADD CONSTRAINT discussion_topic_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE;


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
-- Name: email_message_reply_responder_id_profile_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY email_message_reply
    ADD CONSTRAINT email_message_reply_responder_id_profile_id FOREIGN KEY (responder_id) REFERENCES profile(id) ON DELETE CASCADE;


--
-- Name: email_message_reply_sender_id_profile_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY email_message_reply
    ADD CONSTRAINT email_message_reply_sender_id_profile_id FOREIGN KEY (sender_id) REFERENCES profile(id) ON DELETE CASCADE;


--
-- Name: email_message_sender_id_profile_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY email_message
    ADD CONSTRAINT email_message_sender_id_profile_id FOREIGN KEY (sender_id) REFERENCES profile(id) ON DELETE CASCADE;


--
-- Name: faculty_institution_id_institution_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY faculty
    ADD CONSTRAINT faculty_institution_id_institution_id FOREIGN KEY (institution_id) REFERENCES institution(id);


--
-- Name: faq_profile_id_profile_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY faq
    ADD CONSTRAINT faq_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE;


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
-- Name: institution_country_id_country_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY institution
    ADD CONSTRAINT institution_country_id_country_id FOREIGN KEY (country_id) REFERENCES country(id);


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
-- Name: mailing_list_profile_id_profile_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY mailing_list
    ADD CONSTRAINT mailing_list_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE;


--
-- Name: news_item_profile_id_profile_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY news_item
    ADD CONSTRAINT news_item_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE;


--
-- Name: notification_settings_profile_id_profile_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY notification_settings
    ADD CONSTRAINT notification_settings_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE;


--
-- Name: peer_invitee_id_profile_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY peer
    ADD CONSTRAINT peer_invitee_id_profile_id FOREIGN KEY (invitee_id) REFERENCES profile(id) ON DELETE CASCADE;


--
-- Name: peer_inviter_id_profile_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY peer
    ADD CONSTRAINT peer_inviter_id_profile_id FOREIGN KEY (inviter_id) REFERENCES profile(id) ON DELETE CASCADE;


--
-- Name: profile_activity_feed_activity_feed_id_activity_feed_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_activity_feed
    ADD CONSTRAINT profile_activity_feed_activity_feed_id_activity_feed_id FOREIGN KEY (activity_feed_id) REFERENCES activity_feed(id) ON DELETE CASCADE;


--
-- Name: profile_activity_feed_profile_id_profile_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_activity_feed
    ADD CONSTRAINT profile_activity_feed_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE;


--
-- Name: profile_attendance_attendance_id_attendance_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_attendance
    ADD CONSTRAINT profile_attendance_attendance_id_attendance_id FOREIGN KEY (attendance_id) REFERENCES attendance(id) ON DELETE CASCADE;


--
-- Name: profile_attendance_profile_id_profile_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_attendance
    ADD CONSTRAINT profile_attendance_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE;


--
-- Name: profile_award_profile_id_profile_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_award
    ADD CONSTRAINT profile_award_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE;


--
-- Name: profile_book_profile_id_profile_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_book
    ADD CONSTRAINT profile_book_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE;


--
-- Name: profile_calendar_calendar_id_calendar_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_calendar
    ADD CONSTRAINT profile_calendar_calendar_id_calendar_id FOREIGN KEY (calendar_id) REFERENCES calendar(id);


--
-- Name: profile_calendar_owner_id_profile_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_calendar
    ADD CONSTRAINT profile_calendar_owner_id_profile_id FOREIGN KEY (owner_id) REFERENCES profile(id) ON DELETE CASCADE;


--
-- Name: profile_course_course_id_course_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_course
    ADD CONSTRAINT profile_course_course_id_course_id FOREIGN KEY (course_id) REFERENCES course(id) ON DELETE CASCADE;


--
-- Name: profile_course_profile_id_profile_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_course
    ADD CONSTRAINT profile_course_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE;


--
-- Name: profile_folder_folder_id_folder_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_folder
    ADD CONSTRAINT profile_folder_folder_id_folder_id FOREIGN KEY (folder_id) REFERENCES folder(id) ON DELETE CASCADE;


--
-- Name: profile_folder_profile_id_profile_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_folder
    ADD CONSTRAINT profile_folder_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE;


--
-- Name: profile_forgot_password_profile_id_profile_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_forgot_password
    ADD CONSTRAINT profile_forgot_password_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE;


--
-- Name: profile_gradebook_item_gradebook_item_id_gradebook_item_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_gradebook_item
    ADD CONSTRAINT profile_gradebook_item_gradebook_item_id_gradebook_item_id FOREIGN KEY (gradebook_item_id) REFERENCES gradebook_item(id) ON DELETE CASCADE;


--
-- Name: profile_gradebook_item_profile_id_profile_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_gradebook_item
    ADD CONSTRAINT profile_gradebook_item_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE;


--
-- Name: profile_group_permission_group_id_profile_group_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_group_permission
    ADD CONSTRAINT profile_group_permission_group_id_profile_group_id FOREIGN KEY (group_id) REFERENCES profile_group(id) ON DELETE CASCADE;


--
-- Name: profile_group_permission_permission_id_profile_permission_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_group_permission
    ADD CONSTRAINT profile_group_permission_permission_id_profile_permission_id FOREIGN KEY (permission_id) REFERENCES profile_permission(id) ON DELETE CASCADE;


--
-- Name: profile_institution_id_institution_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile
    ADD CONSTRAINT profile_institution_id_institution_id FOREIGN KEY (institution_id) REFERENCES institution(id);


--
-- Name: profile_interest_profile_id_profile_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_interest
    ADD CONSTRAINT profile_interest_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE;


--
-- Name: profile_profile_group_group_id_profile_group_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_profile_group
    ADD CONSTRAINT profile_profile_group_group_id_profile_group_id FOREIGN KEY (group_id) REFERENCES profile_group(id) ON DELETE CASCADE;


--
-- Name: profile_profile_group_profile_id_profile_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_profile_group
    ADD CONSTRAINT profile_profile_group_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE;


--
-- Name: profile_profile_permission_permission_id_profile_permission_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_profile_permission
    ADD CONSTRAINT profile_profile_permission_permission_id_profile_permission_id FOREIGN KEY (permission_id) REFERENCES profile_permission(id) ON DELETE CASCADE;


--
-- Name: profile_profile_permission_profile_id_profile_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_profile_permission
    ADD CONSTRAINT profile_profile_permission_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE;


--
-- Name: profile_programme_profile_id_profile_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_programme
    ADD CONSTRAINT profile_programme_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE;


--
-- Name: profile_programme_program_id_program_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_programme
    ADD CONSTRAINT profile_programme_program_id_program_id FOREIGN KEY (program_id) REFERENCES program(id) ON DELETE CASCADE;


--
-- Name: profile_publication_profile_id_profile_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_publication
    ADD CONSTRAINT profile_publication_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE;


--
-- Name: profile_qualification_profile_id_profile_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_qualification
    ADD CONSTRAINT profile_qualification_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE;


--
-- Name: profile_remember_key_profile_id_profile_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY profile_remember_key
    ADD CONSTRAINT profile_remember_key_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE;


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
-- Name: state_province_country_id_country_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY state_province
    ADD CONSTRAINT state_province_country_id_country_id FOREIGN KEY (country_id) REFERENCES country(id);


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

