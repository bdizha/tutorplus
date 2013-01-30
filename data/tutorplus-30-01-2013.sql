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
-- Name: discussion_group; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE discussion_group (
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


ALTER TABLE public.discussion_group OWNER TO tutorplus;

--
-- Name: discussion_group_id_seq; Type: SEQUENCE; Schema: public; Owner: tutorplus
--

CREATE SEQUENCE discussion_group_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.discussion_group_id_seq OWNER TO tutorplus;

--
-- Name: discussion_group_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tutorplus
--

ALTER SEQUENCE discussion_group_id_seq OWNED BY discussion_group.id;


--
-- Name: discussion_peer; Type: TABLE; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE TABLE discussion_peer (
    id bigint NOT NULL,
    nickname character varying(255) NOT NULL,
    subscription_type bigint DEFAULT 0 NOT NULL,
    membership_type bigint DEFAULT 0 NOT NULL,
    status bigint DEFAULT 0 NOT NULL,
    discussion_group_id bigint NOT NULL,
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
    discussion_group_id bigint NOT NULL,
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
    slug character varying(255)
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

ALTER TABLE ONLY department ALTER COLUMN id SET DEFAULT nextval('department_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY discussion_comment ALTER COLUMN id SET DEFAULT nextval('discussion_comment_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY discussion_group ALTER COLUMN id SET DEFAULT nextval('discussion_group_id_seq'::regclass);


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
2	9	8	8	2013-01-13 16:21:35	2013-01-13 16:21:35
3	9	9	8	2013-01-13 16:23:15	2013-01-13 16:23:15
4	9	10	8	2013-01-13 17:04:05	2013-01-13 17:04:05
5	9	11	8	2013-01-13 17:04:42	2013-01-13 17:04:42
8	9	12	9	2013-01-13 17:27:14	2013-01-13 17:27:14
9	9	13	9	2013-01-13 17:27:28	2013-01-13 17:27:28
10	9	14	9	2013-01-13 17:27:42	2013-01-13 17:27:42
11	9	15	9	2013-01-13 17:28:03	2013-01-13 17:28:03
12	9	16	9	2013-01-13 17:30:05	2013-01-13 17:30:05
13	9	17	9	2013-01-13 17:30:54	2013-01-13 17:30:54
14	9	18	9	2013-01-13 17:35:16	2013-01-13 17:35:16
15	9	19	9	2013-01-13 17:35:22	2013-01-13 17:35:22
16	9	20	9	2013-01-13 17:35:29	2013-01-13 17:35:29
17	9	21	9	2013-01-13 17:35:36	2013-01-13 17:35:36
18	9	12	8	2013-01-13 17:35:50	2013-01-13 17:35:50
19	9	22	9	2013-01-13 17:35:56	2013-01-13 17:35:56
20	9	23	9	2013-01-13 17:36:30	2013-01-13 17:36:30
21	9	24	9	2013-01-13 17:36:35	2013-01-13 17:36:35
22	9	25	9	2013-01-13 17:36:50	2013-01-13 17:36:50
23	9	26	9	2013-01-13 17:36:56	2013-01-13 17:36:56
24	9	27	9	2013-01-13 17:37:08	2013-01-13 17:37:08
25	9	28	9	2013-01-13 17:37:14	2013-01-13 17:37:14
26	9	29	9	2013-01-13 17:37:45	2013-01-13 17:37:45
27	9	13	8	2013-01-13 17:42:38	2013-01-13 17:42:38
28	9	30	9	2013-01-13 17:42:45	2013-01-13 17:42:45
29	9	31	9	2013-01-13 17:42:51	2013-01-13 17:42:51
30	9	14	8	2013-01-13 18:03:40	2013-01-13 18:03:40
31	9	15	8	2013-01-13 18:03:54	2013-01-13 18:03:54
32	9	32	9	2013-01-13 18:08:58	2013-01-13 18:08:58
33	9	33	9	2013-01-13 18:09:15	2013-01-13 18:09:15
34	12	8	6	2013-01-15 20:09:43	2013-01-15 20:09:43
35	10	9	6	2013-01-15 21:45:27	2013-01-15 21:45:27
36	10	10	6	2013-01-15 21:51:40	2013-01-15 21:51:40
37	10	11	7	2013-01-15 21:51:40	2013-01-15 21:51:40
38	10	1	5	2013-01-15 22:01:07	2013-01-15 22:01:07
39	10	2	4	2013-01-15 22:02:14	2013-01-15 22:02:14
40	10	3	4	2013-01-15 22:04:38	2013-01-15 22:04:38
41	10	4	4	2013-01-15 22:05:13	2013-01-15 22:05:13
42	10	34	9	2013-01-16 00:03:16	2013-01-16 00:03:16
43	10	35	9	2013-01-16 00:03:28	2013-01-16 00:03:28
44	10	36	9	2013-01-16 00:03:34	2013-01-16 00:03:34
45	10	37	9	2013-01-16 00:03:41	2013-01-16 00:03:41
46	10	38	9	2013-01-16 00:03:46	2013-01-16 00:03:46
47	10	2	5	2013-01-16 19:06:39	2013-01-16 19:06:39
48	10	3	5	2013-01-16 19:18:10	2013-01-16 19:18:10
49	10	11	6	2013-01-17 20:38:56	2013-01-17 20:38:56
50	10	12	6	2013-01-17 20:40:26	2013-01-17 20:40:26
51	10	16	8	2013-01-19 01:23:58	2013-01-19 01:23:58
52	10	39	9	2013-01-19 01:24:20	2013-01-19 01:24:20
53	14	13	6	2013-01-19 14:05:09	2013-01-19 14:05:09
54	14	12	7	2013-01-19 14:05:09	2013-01-19 14:05:09
55	14	17	8	2013-01-19 14:06:06	2013-01-19 14:06:06
56	14	14	6	2013-01-19 14:53:18	2013-01-19 14:53:18
57	10	40	9	2013-01-20 18:06:00	2013-01-20 18:06:00
58	10	18	8	2013-01-20 18:14:30	2013-01-20 18:14:30
59	10	15	6	2013-01-20 18:55:50	2013-01-20 18:55:50
60	10	16	6	2013-01-20 18:57:08	2013-01-20 18:57:08
61	10	41	9	2013-01-20 19:06:42	2013-01-20 19:06:42
62	10	13	7	2013-01-20 19:11:20	2013-01-20 19:11:20
63	15	17	6	2013-01-20 19:15:24	2013-01-20 19:15:24
64	15	14	7	2013-01-20 19:15:25	2013-01-20 19:15:25
65	15	19	8	2013-01-20 19:20:51	2013-01-20 19:20:51
66	15	42	9	2013-01-20 19:21:12	2013-01-20 19:21:12
67	8	18	6	2013-01-23 03:29:55	2013-01-23 03:29:55
68	8	15	7	2013-01-23 03:29:55	2013-01-23 03:29:55
69	10	20	8	2013-01-23 10:40:22	2013-01-23 10:40:22
70	10	21	8	2013-01-23 10:40:36	2013-01-23 10:40:36
71	10	22	8	2013-01-23 10:40:50	2013-01-23 10:40:50
72	10	19	6	2013-01-23 21:16:08	2013-01-23 21:16:08
73	10	23	8	2013-01-26 23:30:05	2013-01-26 23:30:05
74	24	20	6	2013-01-28 01:51:06	2013-01-28 01:51:06
75	24	16	7	2013-01-28 01:51:07	2013-01-28 01:51:07
76	10	1	6	2013-01-28 23:13:52	2013-01-28 23:13:52
77	10	2	7	2013-01-28 23:14:40	2013-01-28 23:14:40
78	10	2	6	2013-01-28 23:23:28	2013-01-28 23:23:28
79	10	3	7	2013-01-28 23:23:28	2013-01-28 23:23:28
80	10	3	8	2013-01-29 19:57:03	2013-01-29 19:57:03
81	10	1	9	2013-01-29 20:23:18	2013-01-29 20:23:18
82	10	2	9	2013-01-29 20:25:05	2013-01-29 20:25:05
83	10	3	9	2013-01-29 20:25:21	2013-01-29 20:25:21
84	10	4	9	2013-01-29 20:26:28	2013-01-29 20:26:28
85	10	5	9	2013-01-29 20:30:51	2013-01-29 20:30:51
86	10	4	8	2013-01-29 21:14:50	2013-01-29 21:14:50
87	10	6	9	2013-01-29 21:16:29	2013-01-29 21:16:29
88	10	5	8	2013-01-29 21:39:07	2013-01-29 21:39:07
89	10	6	8	2013-01-29 21:42:38	2013-01-29 21:42:38
90	10	7	9	2013-01-29 21:44:18	2013-01-29 21:44:18
91	10	8	9	2013-01-29 21:47:30	2013-01-29 21:47:30
92	10	9	9	2013-01-29 22:03:47	2013-01-29 22:03:47
93	10	7	8	2013-01-29 22:48:09	2013-01-29 22:48:09
94	10	8	8	2013-01-29 22:49:35	2013-01-29 22:49:35
95	10	10	9	2013-01-29 22:50:21	2013-01-29 22:50:21
96	10	11	9	2013-01-29 22:51:06	2013-01-29 22:51:06
97	10	3	6	2013-01-29 23:59:28	2013-01-29 23:59:28
98	10	4	6	2013-01-30 00:06:41	2013-01-30 00:06:41
99	19	5	6	2013-01-30 00:51:01	2013-01-30 00:51:01
100	19	4	7	2013-01-30 00:51:01	2013-01-30 00:51:01
\.


--
-- Name: activity_feed_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('activity_feed_id_seq', 100, true);


--
-- Data for Name: announcement; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY announcement (id, profile_id, subject, message, is_published, lock_until, lock_after, created_at, updated_at, slug) FROM stdin;
1	9	Tutorplus has been voted the best educational technological platform.	<p>It's with great honor that we're announcing to all of you, the Tutorians, that this platform has been voted the best online learning platform in the entire world. We would like to attribute this great achievement to all of you, students and instructors, who have become part of our rapidly growing community of lifelong learners.</p><p>We're, also, very proud and excited to continue making TutorPlus the defacto platform for learning anything anyone might be interested in learning.</p><p>Thank you very much for being part of this platform and may God bless all our future collaborations to come.</p>\r\n	t	2014-05-09 00:00:00	2013-11-15 00:00:00	2013-01-11 00:07:03	2013-01-12 06:52:22	tutorplus-has-been-voted-the-best-educational-technological-platform
2	10	TutorPlus has been voted the best learning platform of 2013. And it's with great pleasure to announce that we've been voted as the most profound and educative learning platform of all time.	<p>TutorPlus has been voted the best learning platform of 2013. And it's with great pleasure to announce that we've been voted as the most profound and educative learning platform of all time.<br></p><p>TutorPlus has been voted the best learning platform of 2013. And it's with great pleasure to announce that we've been voted as the most profound and educative learning platform of all time.<br></p><p>TutorPlus has been voted the best learning platform of 2013. And it's with great pleasure to announce that we've been voted as the most profound and educative learning platform of all time.<br></p>	t	\N	\N	2013-01-15 22:02:14	2013-01-15 22:02:14	tutorplus-has-been-voted-the-best-learning-platform-of-2013-and-it-s-with-great-pleasure-to-announce-that-we-ve-been-voted-as-the-most-profound-and-educative-learning-platform-of-all-time
3	10	TutorPlus has been voted the best learning platform of 2013. And it's with great pleasure to announce that we've been voted as the most profound and educative learning platform of all time.	<p>TutorPlus has been voted the best learning platform of 2013. And it's with great pleasure to announce that we've been voted as the most profound and educative learning platform of all time.<br></p><p>TutorPlus has been voted the best learning platform of 2013. And it's with great pleasure to announce that we've been voted as the most profound and educative learning platform of all time.<br></p><p>TutorPlus has been voted the best learning platform of 2013. And it's with great pleasure to announce that we've been voted as the most profound and educative learning platform of all time.<br></p>	t	\N	\N	2013-01-15 22:04:38	2013-01-15 22:04:38	tutorplus-has-been-voted-the-best-learning-platform-of-2013-and-it-s-with-great-pleasure-to-announce-that-we-ve-been-voted-as-the-most-profound-and-educative-learning-platform-of-all-time-1
4	10	TutorPlus has been voted the best learning platform of 2013. And it's with great pleasure to announce that we've been voted as the most profound and educative learning platform of all time.	<p>TutorPlus has been voted the best learning platform of 2013. And it's with great pleasure to announce that we've been voted as the most profound and educative learning platform of all time.<br></p><p>TutorPlus has been voted the best learning platform of 2013. And it's with great pleasure to announce that we've been voted as the most profound and educative learning platform of all time.<br></p><p>TutorPlus has been voted the best learning platform of 2013. And it's with great pleasure to announce that we've been voted as the most profound and educative learning platform of all time.<br></p>	t	\N	\N	2013-01-15 22:05:13	2013-01-15 22:05:13	tutorplus-has-been-voted-the-best-learning-platform-of-2013-and-it-s-with-great-pleasure-to-announce-that-we-ve-been-voted-as-the-most-profound-and-educative-learning-platform-of-all-time-2
\.


--
-- Name: announcement_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('announcement_id_seq', 4, true);


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
-- Data for Name: assignment_discussion_group; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY assignment_discussion_group (id, assignment_id, discussion_group_id) FROM stdin;
\.


--
-- Name: assignment_discussion_group_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('assignment_discussion_group_id_seq', 1, false);


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
1	E-learning and Digital Cultures	CRW2602	1	<p>E-learning and Digital Cultures is aimed at teachers, learning technologists, and people with a general interest in education who want to deepen their understanding of what it means to teach and learn in the digital age. The course is about how digital cultures intersect with learning cultures online, and how our ideas about online education are shaped through “narratives”, or big stories, about the relationship between people and technology. We’ll explore some of the most engaging perspectives on digital culture in its popular and academic forms, and we’ll consider how our practices as teachers and learners are informed by the difference of the digital. We’ll look at how learning and literacy is represented in popular digital-, (or cyber-) culture. For example, how is ‘learning’ represented in the film The Matrix, and how does this representation influence our understanding of the nature of e-learning?&nbsp;<br><br>On this course, you will be invited to think critically and creatively about e-learning, to try out new ideas in a supportive environment, and to gain fresh perspectives on your own experiences of teaching and learning. The course will begin with a ‘film festival’, in which we’ll view a range of interesting short films and classic clips, and begin discussing how these might relate to the themes emerging from the course readings. We will then move on to a consideration of multimodal literacies and digital media, and you’ll be encouraged to think about visual methods for presenting knowledge and conveying understanding. The final part of the course will involve the creation of your own visual artefact; a pictorial, filmic or graphic representation of any of the themes encountered during the course, and you‘ll have the opportunity to use digital spaces in new ways to present this work.&nbsp;<br><br>E-learning and Digital Cultures will make use of online spaces beyond the Coursera environment, and we want some aspects of participation in this course to involve the wider social web. We hope that participants will share in the creation of course content and assessed work that will be publicly available online.<br></p>		t	1	2013-01-05 00:00:00	2013-04-27 00:00:00	40.00	1680	15000	2013-01-10 21:21:34	2013-01-10 21:21:34	e-learning-and-digital-cultures
4	Fundamentals of Online Education: Planning and Application	FOEPA	1	<p>In this course you will learn about the fundamentals of online education. The emphasis will be on planning&nbsp;and application. In the planning phase, you will explore online learning pedagogy, online course design,privacy and copyright issues, online assessments, managing an online class, web tools and Learning&nbsp;Management Systems. In the application phase, you will create online learning materials. The final&nbsp;project for the course will consist of you building an online course based on everything that you learned&nbsp;and created in the course.<br></p>		t	1	2011-06-04 00:00:00	2011-06-12 00:00:00	40.00	1680	2000	2013-01-10 21:27:36	2013-01-10 21:27:36	fundamentals-of-online-education-planning-and-application
2	An Introduction to Interactive Programming in Python	ABT1514	1	<p>This course is designed to help students with very little or no computing background learn the basics of building simple interactive applications.  Our language of choice, Python, is an easy-to learn, high-level computer language that is used in many of the computational courses offered on Coursera. To make learning Python easy, we have developed a new browser-based programming environment that makes developing interactive applications in Python simple.  These applications will involve windows whose contents are graphical and respond to buttons, the keyboard and the mouse. <br><br>The primary method for learning the course material will be to work through multiple "mini-projects" in Python.  To make this class enjoyable, these projects will include building fun games such as Pong, Blackjack, and Asteroids.  When you’ve finished our course, we can’t promise that you will be a professional programmer, but we think that you will learn a lot about programming in Python and have fun while you’re doing it.<br></p>		t	1	2015-06-06 00:00:00	2015-10-07 00:00:00	40.00	1680	1500	2013-01-10 21:25:00	2013-01-12 18:47:27	an-introduction-to-interactive-programming-in-python
3	Introduction to Philosophy	CRW2602	1	<p>This course will introduce you to some of the main areas of research in contemporary philosophy. Each week a different philosopher will talk you through some of the most important questions and issues in their area of expertise. We’ll begin by trying to understand what philosophy is – what are its characteristic aims and methods, and how does it differ from other subjects? Then we’ll spend the rest of the course gaining an introductory overview of several different areas of philosophy. Topics you’ll learn about will include:<br><br><ul><li>Epistemology, where we’ll consider what our knowledge of the world and ourselves consists in, and how we come to have it;</li><li>Philosophy of science, where we’ll investigate foundational conceptual issues in scientific research and practice;</li><li>Philosophy of Mind, where we’ll ask questions about what it means for something to have a mind, and how minds should be understood and explained;</li><li>Moral Philosophy, where we’ll attempt to understand the nature of our moral judgements and reactions – whether they aim at some objective moral truth, or are mere personal or cultural preferences, and;</li><li>Metaphysics, where we’ll think through some fundamental conceptual questions about the nature of reality.</li></ul></p>		t	1	2013-07-06 00:00:00	2012-09-04 00:00:00	0.00	1680	750	2013-01-10 21:25:57	2013-01-20 18:34:41	introduction-to-philosophy
\.


--
-- Data for Name: course_announcement; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY course_announcement (id, course_id, announcement_id) FROM stdin;
\.


--
-- Name: course_announcement_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('course_announcement_id_seq', 1, false);


--
-- Data for Name: course_discussion_group; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY course_discussion_group (id, course_id, discussion_group_id) FROM stdin;
2	2	4
\.


--
-- Name: course_discussion_group_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('course_discussion_group_id_seq', 2, true);


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

SELECT pg_catalog.setval('course_id_seq', 4, true);


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
-- Data for Name: discussion_comment; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY discussion_comment (id, reply, profile_id, discussion_post_id, created_at, updated_at) FROM stdin;
1	<p>More and more testing<br></p>	10	3	2013-01-29 20:23:18	2013-01-29 20:23:18
2	<p>More and more testing<br></p>	10	3	2013-01-29 20:25:05	2013-01-29 20:25:05
3	<p>More and more testing<br></p>	10	3	2013-01-29 20:25:21	2013-01-29 20:25:21
4	<p>More and more testing<br></p>	10	3	2013-01-29 20:26:28	2013-01-29 20:26:28
5	<p>More and more testing<br></p>	10	3	2013-01-29 20:30:51	2013-01-29 20:30:51
6	<p>In many cases you will need to specify to us what you mean by this? First, would you make it possible for us to possibly meet anytime soon to discuss over this?</p>	10	4	2013-01-29 21:16:29	2013-01-29 21:16:29
7	<p>So do you imply to say that more and more collaborative activities are going to emerge out of this platform? If so, then how are we going to make it happen? And what are the steps you're going to follow in order for the institutions to get to know about this must have platform?</p>	10	6	2013-01-29 21:44:18	2013-01-29 21:44:18
8	<p>This is so much of a great question! I really wish I would have some answers to it yet we all have experienced the power of technology in our lives especially among the Millenias, the youth. They have been brought up in this day and age where technology has always been part of their lives and it's very natural to them to want to use these digital tools in augmenting their learning activities..</p>	10	6	2013-01-29 21:47:30	2013-01-29 21:47:30
9	<p>I'm just too lazy to be typing anything in this field here and the next thing I wanna see myself doing is to make sure the stuff going through to the right places</p>	10	6	2013-01-29 22:03:47	2013-01-29 22:03:47
10	<p>demo here and we can all see what happening here...</p>	10	8	2013-01-29 22:50:20	2013-01-29 22:50:20
11	<p>This is the last one and all you need to do is to click on show more comments and there you go, boy!</p>	10	3	2013-01-29 22:51:06	2013-01-29 22:51:06
\.


--
-- Name: discussion_comment_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('discussion_comment_id_seq', 11, true);


--
-- Data for Name: discussion_group; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY discussion_group (id, name, profile_id, description, access_level, last_visit, latest_comment_id, comment_count, post_count, view_count, is_primary, is_removed, created_at, updated_at, slug) FROM stdin;
4	ABT1514 - main discussion	10	This is the main group for the "An Introduction to Interactive Programming in Python" course. Essentially, all the peers of this course are encouraged to participate and collaborate with each other in order for each one involved to fully benefit from the rest of their group.	1	\N	\N	0	0	0	f	f	2013-01-30 00:06:41	2013-01-30 00:06:41	abt1514-main-discussion
2	Lufuno Sadiki's general group	10	This is Lufuno Sadiki's general group in which you can share anything with them.	1	\N	11	11	6	25	t	f	2013-01-28 23:23:28	2013-01-30 00:47:13	lufuno-sadiki-s-general-group
5	Wallace Chigona's general group	19	This is Wallace Chigona's general group in which you can share anything with them.	1	\N	\N	0	0	0	t	f	2013-01-30 00:51:01	2013-01-30 00:51:01	wallace-chigona-s-general-group
\.


--
-- Name: discussion_group_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('discussion_group_id_seq', 5, true);


--
-- Data for Name: discussion_peer; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY discussion_peer (id, nickname, subscription_type, membership_type, status, discussion_group_id, profile_id, is_removed, created_at, updated_at) FROM stdin;
1	lufuno	0	2	4	1	10	f	2013-01-28 23:13:53	2013-01-28 23:13:53
2	lufuno	0	2	4	2	10	f	2013-01-28 23:23:28	2013-01-28 23:23:28
3	Tendayi	0	0	0	3	14	f	2013-01-29 23:59:28	2013-01-29 23:59:28
4	Dele	0	0	0	3	13	f	2013-01-29 23:59:28	2013-01-29 23:59:28
5	Chido	0	0	0	3	8	f	2013-01-29 23:59:28	2013-01-29 23:59:28
6	Danny 	0	0	0	3	15	f	2013-01-29 23:59:28	2013-01-29 23:59:28
7	Lindela	0	0	0	3	16	f	2013-01-29 23:59:28	2013-01-29 23:59:28
8	Henry	0	0	0	3	17	f	2013-01-29 23:59:28	2013-01-29 23:59:28
9	William	0	0	0	3	18	f	2013-01-29 23:59:28	2013-01-29 23:59:28
10	Wallace	0	0	0	3	19	f	2013-01-29 23:59:29	2013-01-29 23:59:29
11	John	0	0	0	3	12	f	2013-01-29 23:59:29	2013-01-29 23:59:29
12	Michael	0	0	0	3	20	f	2013-01-29 23:59:29	2013-01-29 23:59:29
13	Gareth	0	0	0	3	11	f	2013-01-29 23:59:29	2013-01-29 23:59:29
14	Robb	0	0	0	3	7	f	2013-01-29 23:59:29	2013-01-29 23:59:29
15	Yolanda	0	0	0	3	6	f	2013-01-29 23:59:29	2013-01-29 23:59:29
16	Elisha	0	0	0	3	9	f	2013-01-29 23:59:29	2013-01-29 23:59:29
17	Lufuno	0	0	0	3	10	f	2013-01-29 23:59:29	2013-01-29 23:59:29
18	Tendayi	0	0	0	4	14	f	2013-01-30 00:06:42	2013-01-30 00:06:42
19	Dele	0	0	0	4	13	f	2013-01-30 00:06:42	2013-01-30 00:06:42
20	Chido	0	0	0	4	8	f	2013-01-30 00:06:42	2013-01-30 00:06:42
21	Danny 	0	0	0	4	15	f	2013-01-30 00:06:42	2013-01-30 00:06:42
22	Lindela	0	0	0	4	16	f	2013-01-30 00:06:42	2013-01-30 00:06:42
23	Henry	0	0	0	4	17	f	2013-01-30 00:06:42	2013-01-30 00:06:42
24	William	0	0	0	4	18	f	2013-01-30 00:06:42	2013-01-30 00:06:42
25	Wallace	0	0	0	4	19	f	2013-01-30 00:06:42	2013-01-30 00:06:42
26	John	0	0	0	4	12	f	2013-01-30 00:06:42	2013-01-30 00:06:42
27	Michael	0	0	0	4	20	f	2013-01-30 00:06:42	2013-01-30 00:06:42
28	Gareth	0	0	0	4	11	f	2013-01-30 00:06:42	2013-01-30 00:06:42
29	Robb	0	0	0	4	7	f	2013-01-30 00:06:42	2013-01-30 00:06:42
30	Yolanda	0	0	0	4	6	f	2013-01-30 00:06:42	2013-01-30 00:06:42
31	Elisha	0	0	0	4	9	f	2013-01-30 00:06:42	2013-01-30 00:06:42
32	Lufuno	0	0	0	4	10	f	2013-01-30 00:06:42	2013-01-30 00:06:42
33	wallace	0	2	4	5	19	f	2013-01-30 00:51:01	2013-01-30 00:51:01
\.


--
-- Name: discussion_peer_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('discussion_peer_id_seq', 33, true);


--
-- Data for Name: discussion_post; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY discussion_post (id, message, profile_id, discussion_topic_id, created_at, updated_at) FROM stdin;
3	<p>Here we're testing...<br></p>	10	3	2013-01-29 19:57:03	2013-01-29 19:57:03
4	<p>I'm just speculative with what may go right and what might not work. And here's the thing; we're having an incredible time in out history that's we've so much to be doing all the time. And here's what one might do if they were supported profusely;</p><p>-- interact with fellow peers and collaborate on making any single idea work</p><p>-- investigate some&nbsp;multidisciplinary issues that are currently facing our problems today.</p><p>-- among many other things.&nbsp;</p>	10	3	2013-01-29 21:14:49	2013-01-29 21:14:49
5	<p>It appears everything happens for a great reason; like for instance I'm working on this platform to make sure it's working. Why I'm working on this platform I really would like to see how it turns out to be. I've always loved to have my ideas coming together like this. It truly soothes my spirit. :)</p>	10	3	2013-01-29 21:39:07	2013-01-29 21:39:07
6	<p>Well, here's what I'm thinking could be the real cause of this platform being developed. First, the world wants to redefine itself every now and then. Second, there's a new way of doing things that people can't help trying out. Third, they ought to be a platform like this one through which new ideas can be developed and made to work.</p>	10	3	2013-01-29 21:42:37	2013-01-29 21:42:37
7	<p>We're testing here and still testing&nbsp;<img src="http://tutorplus.org/profile/show/photo/10/24/1359488800" style=""></p>	10	3	2013-01-29 22:48:09	2013-01-29 22:48:09
8	<p><span style="background-color: transparent;"><font color="#f79646">This is text in color.</font></span></p>	10	3	2013-01-29 22:49:35	2013-01-29 22:49:35
\.


--
-- Name: discussion_post_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('discussion_post_id_seq', 8, true);


--
-- Data for Name: discussion_topic; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY discussion_topic (id, subject, type, message, discussion_group_id, profile_id, latest_comment_id, view_count, comment_count, is_primary, created_at, updated_at, slug) FROM stdin;
3	Welcome to TutorPlus!	General	Hi fellow participant, It's a great pleasure to have you as a part of this collaborative learning platform and we would like you to be readily available to share with your peers any relevant academic experiences we all have to endure in all our varied learning objectives. I hope we will all exhibit the same sincereness and sense of belonging in enganging with the learning materials and our peers. God bless!	2	10	11	50	11	t	2013-01-28 23:23:28	2013-01-29 22:51:06	welcome-to-tutorplus-2
4	Welcome to TutorPlus!	General	Hi fellow participant, It's a great pleasure to have you as a part of this collaborative learning platform and we would like you to be readily available to share with your peers any relevant academic experiences we all have to endure in all our varied learning objectives. I hope we will all exhibit the same sincereness and sense of belonging in enganging with the learning materials and our peers. God bless!	5	19	\N	0	0	t	2013-01-30 00:51:01	2013-01-30 00:51:01	welcome-to-tutorplus-5
\.


--
-- Name: discussion_topic_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('discussion_topic_id_seq', 4, true);


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
\.


--
-- Name: email_template_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('email_template_id_seq', 1, false);


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

COPY faq (id, profile_id, question, answer, is_published, created_at, updated_at, slug) FROM stdin;
\.


--
-- Name: faq_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('faq_id_seq', 1, false);


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
\.


--
-- Name: gradebook_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('gradebook_id_seq', 8, true);


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
\.


--
-- Name: gradebook_scale_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('gradebook_scale_id_seq', 48, true);


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
-- Data for Name: news_item; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY news_item (id, profile_id, heading, blurb, body, is_published, lock_until, lock_after, created_at, updated_at, slug) FROM stdin;
1	10	TutorPlus voted the best learning platform of 2013	TutorPlus has been voted the best learning platform of 2013. And it's with great pleasure to announce that we've been voted as the most profound and educative learning platform of all time.	<p>TutorPlus has been voted the best learning platform of 2013. And it's with great pleasure to announce that we've been voted as the most profound and educative learning platform of all time.<br></p>	t	2012-07-10 00:00:00	2011-07-09 00:00:00	2013-01-15 22:01:07	2013-01-15 22:01:07	tutorplus-voted-the-best-learning-platform-of-2013
2	10	Court to police: Excessive force unacceptable	Highest administrative court sends clear message to police who broke up oil pipeline protest in Hat Yai in 2002 before Thaksin mobile cabinet meeting.	The Supreme Administrative Court on Wednesday ordered the Royal Thai Police Office (RTPO) to pay 24 people 100,000 baht in damages for using force to break up a protest against the Thai-Malaysian gas pipeline and gas separation plant projects in Songkhla's Chana district in 2002.<br><br>Twenty-four villagers filed a lawsuit with the Songkhla Administrative Court against the RTPO and the Interior Ministry demanding compensation for damages caused by excessive use of force to disperse the protesters in violation of their right to unarmed and peaceful rally under Section 40 of the 1997 constitution.<br><br>The Songkhla Administrative Court accepted the case for consideration.\r\n\r\nThe case was considered a precedent. It was the first to have been brought by local people against government authorities and agencies demanding compensation for damage for violation of the people's right to stage a peaceful and unarmed protest as permitted by the constitution.<br><br>According to the lawsuit, the incident occurred on Dec 20, 2002 on Juti Anusorn road near J.B. Hotel in Hat Yai district when local residents demonstrated ahead of a plan to submit a petition to then prime minister Thaksin Shinawatra, who was scheduled to attend a mobile cabinet meeting at the hotel on Dec 21.\r\n\r\nThe petition asked the government to reconsider the Thai-Malaysian gas pipeline and Thai-Malaysian gas separation plant projects.\r\n	t	2014-05-11 00:00:00	2016-05-11 00:00:00	2013-01-16 19:06:39	2013-01-16 19:06:39	court-to-police-excessive-force-unacceptable
3	10	Connected Learning: An Agenda for Social Change	A teenager who developed her creative writing skills, in large part by interacting with peers on the Internet, and who was eventually offered admissions to selective colleges on the basis of her strong writing samples. A young man who learned how to make a living as a professional web comics artist by connecting with knowledge and communities of artists on the Internet. A public school in Chicago experimenting with a two-week period each term where students work on complex and collaborative projects where they need to define roles, problem solve together, and share their work with a broader community.	<p>All of these are examples of what my colleagues and I have been \r\ncalling "connected learning" -- learning that is highly social, \r\ninterest-driven, and oriented toward educational, economic, or civic \r\nopportunity. </p>\r\n\r\n<p>This week, the Connected Learning Research Network, a research group that I chair, released a <a href="http://dmlhub.net/sites/default/files/ConnectedLearning_report.pdf">report</a>\r\n (PDF) that outlines how connected learning environments are designed \r\nand how they can benefit youth in networked society, especially the \r\nunderprivileged and vulnerable. The report calls for several core \r\nchanges in education, including:</p>\r\n\r\n<p>•\tClose the gap between the no-frills learning that too often happens\r\n in-school and the interactive, hands-on learning that usually takes \r\nplace out of school;</p>\r\n\r\n<p>•\tTake advantage of the Internet's ability to help youth develop knowledge, expertise, skills and important new literacies;</p>\r\n\r\n<p>•\tUse the benefits of digital technology and social networking to \r\ncombat the increasing reality of the haves and have-nots in education.</p>\r\n\r\n<p>Connected learning is when you're pursuing knowledge and expertise \r\naround something you care deeply about, and you're supported by friends \r\nand institutions who share and recognize this common passion or purpose.\r\n Connected learning is <em>not</em> about any particular platform, \r\ntechnology, or teaching technique, like blended learning or the flipped \r\nclassroom or Khan Academy or massive open online courses. It's agnostic \r\nabout the method and content area. Instead, it's about asking what is \r\nthe optimal experience for each learner and for a high-functioning \r\nlearning community?</p>\r\n\r\n<p>Our research network is seeing tremendous potential in the Internet \r\nfor advancing learning. But right now, it's only the most activated and \r\nwell-supported learners who are reaping the benefits of connected \r\nlearning. In fact, we are at risk of seeing yet another way privileged \r\nindividuals gain advantage -- even though the Internet and digital \r\ntechnology give us the potential to multiply opportunities for all youth\r\n to realize their learning potential and their right to thrive. Left \r\nunchecked, this is an inequity that will only worsen.</p>\r\n\r\n<p>Our report outlines a number of disturbing socioeconomic trends that \r\npromise to further undermine existing inequities and issues in public \r\neducation:</p>\r\n\r\n<p><b>Broken pathways from education to opportunity</b>: Youth are \r\nentering a labor market strikingly different from earlier generations. \r\nEducation, even a college degree, no longer offers a sure pathway to \r\nopportunity. Young people find themselves competing for a scarcer number\r\n of good jobs. An "arms race" in educational attainment has broken out, \r\nespecially among upper income households to gain advantage.</p>\r\n\r\n<p><b>A growing learning divide</b>: The achievement gap in public \r\neducation disproportionately impacts African American and Latino youth. \r\nInequity is aggravated by the accelerating rate of family investments in\r\n out-of-school enrichment and learning activities, many of which \r\nleverage the learning advances offered by the Internet and digital \r\ntechnology.</p>\r\n\r\n<p><b>A commercialized and fragmented media ecology</b>: We are living \r\nthrough a dramatic shift in media and technology and this shift is most \r\npronounced among children and youth. Increasingly, there is a disconnect\r\n between classroom learning and the everyday lives and interests of many\r\n young people -- further alienating many youth from their schooling. </p>\r\n\r\n<p>In contrast to other educational reform approaches, connected \r\nlearning is distinguished by an aggressive social change agenda. It is \r\nmotivated by a desire to witness a transformation in the educational \r\nsystem that is fundamentally about fairness and possibility. It is both \r\nevidence-driven and visionary in its aspirations. We believe this social\r\n vision can be realized because connected learning seeks to:</p>\r\n\r\n<p><strong>- Address inequity in education</strong>;<br>\r\n<strong>- Engender 21st century skills and literacies in all youth</strong>;<br>\r\n<strong>- Attune to the learning possibilities of a networked society</strong>;<br>\r\n<strong>- Elevate the quality of knowledge and learning for the collective good</strong>. </p>\r\n\r\n<p>There is a unique opportunity before us with today's technologies to \r\nmake the entry points and pathways to knowledge, learning and \r\nopportunity accessible to many more young people. Learning research has \r\nshown us that the most resilient and effective forms of learning happen \r\nwhen there's motivation, engagement, social support, and when the \r\nlearning is real-world, intergenerational, and connected to young \r\npeople's lives in a meaningful way.</p>\r\n\r\n<p>With today's networked world, we have the capacity to address <em>all</em>\r\n young people's right to learn, to thrive, to find a place, and to \r\ncontribute to our society. It's really no longer a question of how. It's\r\n a question of will.</p>\r\n\r\n<p><em>The report by the Connected Learning Research Network, whose work\r\n is supported by the MacArthur Foundation as part of its digital media \r\nand learning initiative, can be found <a href="http://dmlhub.net/sites/default/files/ConnectedLearning_report.pdf">here</a>.</em></p><p><br></p>	t	2017-09-11 00:00:00	2017-07-13 00:00:00	2013-01-16 19:18:10	2013-01-16 19:18:10	connected-learning-an-agenda-for-social-change
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
\.


--
-- Name: notification_settings_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('notification_settings_id_seq', 4, true);


--
-- Data for Name: peer; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY peer (id, inviter_id, invitee_id, status) FROM stdin;
39	10	10	0
40	19	19	0
\.


--
-- Name: peer_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('peer_id_seq', 40, true);


--
-- Data for Name: profile; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY profile (id, first_name, last_name, middle_name, birth_date, gender, is_instructor, high_school, studied_at, current_study, title, email, password, algorithm, salt, is_super_admin, is_active, institution_id, last_login, created_at, updated_at, slug, about_me) FROM stdin;
21	Nyaradzai	Mugaragumbo		1950-08-08 00:00:00	Male	t				Sir	nyaradzai@tutorplus.org	1a2b1b11fc9cdefecd0574edbaf9e8802b44dabf	sha1	551a0aa7e2fb10d23fd34e325359ecbc	f	t	1	\N	2013-01-27 19:46:29	2013-01-30 00:21:45	nyaradzai-mugaragumbo	
14	Tendayi	Matuku		2008-03-11 00:00:00	Female	f	Kambuzuma High 2	NUST	The future of learning institutions in the digital culture.	Mr	tendayi@tutorplus.org	1dfbbb17d0fdf594c210112585feeb597236917a	sha1	16ef40f0bd5bc9f21cb7f3b340909c79	f	t	2	2013-01-19 14:12:50	2013-01-19 14:04:23	2013-01-19 14:45:23	tendayi-matuku	<p>I enjoy learning and anyone who's something to share or contribute is more than welcome</p>
13	Dele	Agugu		1984-05-05 00:00:00	Male	f				Mr	dele@tutorplus.org	b8ced36cd5c0fd375a61937d3108aa71a850cd0c	sha1	9242c9f82e33a936b174132b195acd7d	f	f	1	\N	2013-01-18 16:37:12	2013-01-23 01:52:11	dele-agugu	
22	Nyaradzai	Mugaragumbo		1950-08-08 00:00:00	Male	t				Ms	nyaradzai@tutorplus.org	6648c9e828c5e25f29fddc42aaa713dc02d4cdb3	sha1	de30484931bb1c9cd5688b87985c305d	f	t	1	\N	2013-01-27 19:48:17	2013-01-30 00:22:14	nyaradzai-mugaragumbo-1	
8	Chido	Mushaya		2009-02-02 00:00:00	Female	f	Zimuto High School	National University of Science and Technology	Professional modelling	Miss	chido@tutorplus.org	6137f90f18bed01262dad1e84c11a1b19a2303c4	sha1	ec285fe10bc5041cf2561079a2c38ab0	f	t	1	2013-01-23 20:25:34	2013-01-10 17:29:35	2013-01-23 20:25:34	chido-mushaya	
24	Bill	Gates		1946-04-13 00:00:00	Male	t				Mr	bill@tutorplus.org	a95ca3572a0b2025fc5e9ba0ba033bf3afe76d87	sha1	533bf7f9e357730623db98c98eb02728	f	t	3	\N	2013-01-28 01:40:38	2013-01-30 00:22:44	bill-gates	
19	Wallace	Chigona		1950-03-05 00:00:00	Male	t				Mr	wallace@tutorplus.org	f4f3279da0b9d4ef0bd4bd01208faf096d9b2108	sha1	d109ec761c7117cd7db589905fd385c5	f	t	1	2013-01-30 00:51:00	2013-01-24 20:42:16	2013-01-30 00:51:00	wallace-chigona	
16	Lindela	Ndlovu		1951-05-06 00:00:00	Male	t				Mr	lindela@tutorplus.org	75050ca1e3354d04888386ec54eb628bf92b26cd	sha1	e206d178a000f79e0474f5cd3db922db	f	t	1	\N	2013-01-24 20:35:35	2013-01-24 20:35:35	lindela-ndlovu	
17	Henry	James		1947-09-07 00:00:00	Male	t				Mr	henry@tutorplus.org	951386cc0d8c5c4e94693b65d18423cf346637e1	sha1	a091e8f3c9d8e183c8122af1fd0464c0	f	t	1	\N	2013-01-24 20:38:56	2013-01-24 20:38:56	henry-james	
18	William	James		1946-03-02 00:00:00	Male	t				Mr	james@tutorplus.org	fd54cad7df67d79006431a533bd7afabc46f218d	sha1	7a07b0843d5bc8e1fe5ab4625529408c	f	t	1	\N	2013-01-24 20:40:13	2013-01-24 20:40:13	william-james	
20	Michael	Tyobe		1945-03-02 00:00:00	Male	t				Mr	michael@tutorplus.org	ca49e07ab18a518728bff5df347cd45d085955be	sha1	1a1aed5f33aafafeb4a2fb8b4806e89c	f	t	1	\N	2013-01-24 20:44:11	2013-01-24 20:44:11	michael-tyobe	
15	Danny 	King		1948-08-05 00:00:00	Male	f	AISB	UCT	International Relations	Mr	d.king@uct.ca.za	594ffcbc11c128e4ac55ab9e2c568bc8826cfd1e	sha1	bdee4d2bc02888b6d1f0eb1a520d32f6	f	t	2	\N	2013-01-20 19:15:11	2013-01-24 20:45:02	danny-king	
11	Gareth	Edwards		2013-03-05 00:00:00	Male	f				Mr	gareth@tutorplus.org	4f226dd4ce50f847059887a57f91c7eed2fe1289	sha1	a106ed5098c08d8c307f6f108648e271	f	t	3	\N	2013-01-15 20:00:07	2013-01-24 20:45:27	gareth-edwards	
7	Robb	Willer		2010-02-02 00:00:00	Male	f				Mr	robb@tutorplus.org	47d95de2c020fccb0c4b7a78b66dc06b6c534437	sha1		f	t	1	\N	2013-01-10 01:15:06	2013-01-24 20:45:49	robb-willer	
6	Yolanda	Matuku		2009-01-28 00:00:00	Male	f				Mr	yolanda@gmail.com	bacc51603d3ba899c8b67e735932c6c65ec02211	sha1		f	t	1	\N	2013-01-09 23:20:42	2013-01-24 20:46:09	yolanda-matuku	
9	Elisha	Moyo		2010-01-02 00:00:00	Male	f	Shungu High	NUST	Med Education	Mr	elisha@tutorplus.org	d1cf572de34f99e8cfcf248965c5a33fb5fda96a	sha1	677f582d5f92a91de16ccdb303c4bb85	f	t	1	2013-01-14 22:23:50	2013-01-10 18:40:32	2013-01-15 00:01:26	elisha-moyo	\N
10	Lufuno	Sadiki	Dizha	1949-07-10 00:00:00	Female	f	Shungu High	NUST	Doctrate in Education	Mrs	lufuno@tutorplus.org	f4067bc73ca84be92914dfa2cf2d6e250ab249c2	sha1	4cd7b719a7d7e908356295e314aebe48	f	t	3	2013-01-29 23:25:49	2013-01-15 19:19:50	2013-01-29 23:25:49	lufuno-sadiki	
12	John	Searle		2013-10-04 00:00:00	Male	t	Shungu High	NUST	Doctrate studies	Prof	john@tutorplus.org	8ae564c674e8aee2cf4756710429af6407b928db	sha1	c6effff50036e77eb7d61158512b5917	f	f	3	\N	2013-01-15 20:05:45	2013-01-30 00:20:31	john-searle	
23	Nomsa	Moyo		1951-05-06 00:00:00	Male	f				Mr	nomsa@gmail.com	cc195f051efdd31211e06dd971ba39f2a71b0520	sha1	92b9227ac72475fee3f9c35ca27baa82	f	t	1	\N	2013-01-27 19:49:20	2013-01-30 00:21:19	nomsa-moyo	
\.


--
-- Data for Name: profile_activity_feed; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY profile_activity_feed (id, profile_id, activity_feed_id) FROM stdin;
1	9	2
2	9	3
3	9	4
4	9	5
5	9	8
6	9	9
7	9	10
8	9	11
9	9	12
10	9	13
11	9	14
12	9	15
13	9	16
14	9	17
15	9	18
16	9	19
17	9	20
18	9	21
19	9	22
20	9	23
21	9	24
22	9	25
23	9	26
24	9	27
25	9	28
26	9	29
27	9	30
28	9	31
29	9	32
30	9	33
31	12	34
32	10	35
33	10	36
34	10	37
35	10	38
36	10	39
37	10	40
38	10	41
39	10	42
40	10	43
41	10	44
42	10	45
43	10	46
44	10	47
45	10	48
46	10	49
47	10	50
48	10	51
49	10	52
50	14	53
51	14	54
52	14	55
53	14	56
54	10	57
55	10	58
56	10	59
57	10	60
58	10	61
59	10	62
60	15	63
61	15	64
62	15	65
63	15	66
64	8	67
65	8	68
66	10	69
67	10	70
68	10	71
69	10	72
70	10	73
71	24	74
72	24	75
73	10	76
74	10	77
75	10	78
76	10	79
77	10	80
78	10	81
79	10	82
80	10	83
81	10	84
82	10	85
83	10	86
84	10	87
85	10	88
86	10	89
87	10	90
88	10	91
89	10	92
90	10	93
91	10	94
92	10	95
93	10	96
94	10	97
95	10	98
96	19	99
97	19	100
\.


--
-- Name: profile_activity_feed_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('profile_activity_feed_id_seq', 97, true);


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
\.


--
-- Name: profile_award_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('profile_award_id_seq', 2, true);


--
-- Data for Name: profile_book; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY profile_book (id, profile_id, title, author) FROM stdin;
1	9	Philosophy of Money	Georg Simmel
2	10	The future for higher learning	B Matuku
3	14	The queen and her people	Anonymous
4	15	Of mice and  men	john stienbeck
\.


--
-- Name: profile_book_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('profile_book_id_seq', 4, true);


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
72	16	1
73	17	1
74	19	1
77	16	3
78	17	3
79	18	3
81	20	3
86	14	2
87	13	2
88	8	2
89	15	2
90	16	2
91	17	2
92	18	2
93	19	2
94	12	2
95	20	2
96	11	2
97	7	2
98	6	2
99	9	2
100	12	2
102	10	2
103	18	4
104	19	4
105	20	4
106	14	4
107	13	4
109	17	4
110	12	4
111	8	4
112	16	4
113	17	4
114	18	4
115	19	4
116	20	4
117	15	4
118	11	4
51	12	3
71	12	1
\.


--
-- Name: profile_course_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('profile_course_id_seq', 118, true);


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
\.


--
-- Name: profile_forgot_password_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('profile_forgot_password_id_seq', 1, false);


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

SELECT pg_catalog.setval('profile_id_seq', 24, true);


--
-- Data for Name: profile_interest; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY profile_interest (id, profile_id, name) FROM stdin;
1	9	Skiing and mountaineering
2	9	Reading any texts
3	9	Gossiping with friends
4	10	Playing pool
5	10	Programming in PHP and Open Source
6	14	Skiing and mountaineering
7	10	Reading Romantic Novels
8	10	Mountain Climbing
9	15	Gym
\.


--
-- Name: profile_interest_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('profile_interest_id_seq', 9, true);


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
1	11	2	2013-01-15 20:00:07	2013-01-15 20:00:07
4	14	2	2013-01-19 14:04:23	2013-01-19 14:04:23
5	15	2	2013-01-20 19:15:11	2013-01-20 19:15:11
12	8	2	2013-01-23 03:27:23	2013-01-23 03:27:23
13	16	1	2013-01-24 20:35:35	2013-01-24 20:35:35
14	17	1	2013-01-24 20:38:57	2013-01-24 20:38:57
15	18	1	2013-01-24 20:40:13	2013-01-24 20:40:13
16	19	1	2013-01-24 20:42:16	2013-01-24 20:42:16
17	20	1	2013-01-24 20:44:11	2013-01-24 20:44:11
18	7	2	2013-01-24 20:45:49	2013-01-24 20:45:49
19	6	2	2013-01-24 20:46:09	2013-01-24 20:46:09
20	12	1	2013-01-30 00:20:31	2013-01-30 00:20:31
21	23	2	2013-01-30 00:21:19	2013-01-30 00:21:19
22	21	1	2013-01-30 00:21:45	2013-01-30 00:21:45
23	22	1	2013-01-30 00:22:14	2013-01-30 00:22:14
24	24	1	2013-01-30 00:22:44	2013-01-30 00:22:44
\.


--
-- Name: profile_profile_permission_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('profile_profile_permission_id_seq', 24, true);


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
\.


--
-- Name: profile_publication_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('profile_publication_id_seq', 4, true);


--
-- Data for Name: profile_qualification; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY profile_qualification (id, profile_id, institution, description, year) FROM stdin;
1	9	National University of Science and Technology	Bachelor of Science in Computer Science	2008
2	9	Harvard	Doctoral degree in E-learning and Digital Cultures	2006
\.


--
-- Name: profile_qualification_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('profile_qualification_id_seq', 2, true);


--
-- Data for Name: profile_remember_key; Type: TABLE DATA; Schema: public; Owner: tutorplus
--

COPY profile_remember_key (id, profile_id, remember_key, ip_address, created_at, updated_at) FROM stdin;
7	11	h131e8chyds8ookc04ssks048wgkc84	127.0.0.1	2013-01-15 20:00:07	2013-01-15 20:00:07
8	12	r31s9u7w2j4cow00c4gskc0c0o00wgw	127.0.0.1	2013-01-15 20:05:46	2013-01-15 20:05:46
9	13	o4pn98897usks04o0oos008ksw0k8go	127.0.0.1	2013-01-18 16:37:12	2013-01-18 16:37:12
10	14	gp4av0j6fpwswcs4ws00ow4ksgc8044	127.0.0.1	2013-01-19 14:04:24	2013-01-19 14:04:24
11	15	doa4letlm60wk800wswkkccskg84owc	127.0.0.1	2013-01-20 19:15:11	2013-01-20 19:15:11
13	10	3hnxepxm4nwg04g8wc0os0o88sskcks	127.0.0.1	2013-01-27 19:52:52	2013-01-27 19:52:52
14	19	40hvsxu0aa0wcw8kc0okg448cs0so08	127.0.0.1	2013-01-29 22:53:26	2013-01-29 22:53:26
\.


--
-- Name: profile_remember_key_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tutorplus
--

SELECT pg_catalog.setval('profile_remember_key_id_seq', 14, true);


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
-- Name: discussion_group_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY discussion_group
    ADD CONSTRAINT discussion_group_pkey PRIMARY KEY (id);


--
-- Name: discussion_peer_pkey; Type: CONSTRAINT; Schema: public; Owner: tutorplus; Tablespace: 
--

ALTER TABLE ONLY discussion_peer
    ADD CONSTRAINT discussion_peer_pkey PRIMARY KEY (id);


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
-- Name: discussion_group_sluggable; Type: INDEX; Schema: public; Owner: tutorplus; Tablespace: 
--

CREATE UNIQUE INDEX discussion_group_sluggable ON discussion_group USING btree (slug);


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
-- Name: addi; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY assignment_discussion_group
    ADD CONSTRAINT addi FOREIGN KEY (discussion_group_id) REFERENCES discussion_group(id) ON DELETE CASCADE;


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
-- Name: course_discussion_group_course_id_course_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY course_discussion_group
    ADD CONSTRAINT course_discussion_group_course_id_course_id FOREIGN KEY (course_id) REFERENCES course(id) ON DELETE CASCADE;


--
-- Name: course_discussion_group_discussion_group_id_discussion_group_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY course_discussion_group
    ADD CONSTRAINT course_discussion_group_discussion_group_id_discussion_group_id FOREIGN KEY (discussion_group_id) REFERENCES discussion_group(id) ON DELETE CASCADE;


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
-- Name: discussion_group_latest_comment_id_discussion_comment_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY discussion_group
    ADD CONSTRAINT discussion_group_latest_comment_id_discussion_comment_id FOREIGN KEY (latest_comment_id) REFERENCES discussion_comment(id) ON DELETE CASCADE;


--
-- Name: discussion_group_profile_id_profile_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY discussion_group
    ADD CONSTRAINT discussion_group_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE;


--
-- Name: discussion_topic_discussion_group_id_discussion_group_id; Type: FK CONSTRAINT; Schema: public; Owner: tutorplus
--

ALTER TABLE ONLY discussion_topic
    ADD CONSTRAINT discussion_topic_discussion_group_id_discussion_group_id FOREIGN KEY (discussion_group_id) REFERENCES discussion_group(id) ON DELETE CASCADE;


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

