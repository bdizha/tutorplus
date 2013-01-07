CREATE TABLE academic_period (id BIGSERIAL, name VARCHAR(255) NOT NULL, start_date TIMESTAMP NOT NULL, end_date TIMESTAMP NOT NULL, grades_due TIMESTAMP NOT NULL, max_credits VARCHAR(10) NOT NULL, academic_year_id BIGINT NOT NULL, PRIMARY KEY(id));
CREATE TABLE academic_year (id BIGSERIAL, year_start BIGINT NOT NULL, year_end BIGINT NOT NULL, PRIMARY KEY(id));
CREATE TABLE activity_feed (id BIGSERIAL, profile_id BIGINT NOT NULL, item_id BIGINT NOT NULL, replacements TEXT NOT NULL, activity_template_id BIGINT NOT NULL, created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, PRIMARY KEY(id));
CREATE TABLE activity_template (id BIGSERIAL, patterns VARCHAR(500), content TEXT NOT NULL, type BIGINT DEFAULT 0 NOT NULL, created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, PRIMARY KEY(id));
CREATE TABLE announcement (id BIGSERIAL, profile_id BIGINT NOT NULL, subject VARCHAR(255) NOT NULL, message TEXT NOT NULL, is_published BOOLEAN DEFAULT 'false' NOT NULL, lock_until TIMESTAMP, lock_after TIMESTAMP, created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, slug VARCHAR(255), PRIMARY KEY(id));
CREATE TABLE assessment_type (id BIGSERIAL, name VARCHAR(255) NOT NULL, weight NUMERIC(18,2) DEFAULT 0 NOT NULL, course_id BIGINT NOT NULL, created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, PRIMARY KEY(id));
CREATE TABLE assignment (id BIGSERIAL, title VARCHAR(255) NOT NULL, assessment_type_id BIGINT NOT NULL, description TEXT NOT NULL, submission BIGINT NOT NULL, due_date TIMESTAMP, points BIGINT NOT NULL, weight NUMERIC(18,2) DEFAULT 0 NOT NULL, lock_until TIMESTAMP, lock_after TIMESTAMP, notify_users BOOLEAN DEFAULT 'false', is_graded BOOLEAN DEFAULT 'false', allow_late_submission BOOLEAN DEFAULT 'false', graded_by BIGINT NOT NULL, course_id BIGINT NOT NULL, created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, slug VARCHAR(255), PRIMARY KEY(id));
CREATE TABLE assignment_discussion (id BIGSERIAL, assignment_id BIGINT NOT NULL, discussion_id BIGINT NOT NULL, PRIMARY KEY(id));
CREATE TABLE assignment_file (id BIGSERIAL, assignment_id BIGINT NOT NULL, file_id BIGINT NOT NULL, PRIMARY KEY(id));
CREATE TABLE assignment_submission (id BIGSERIAL, assignment_id BIGINT NOT NULL, generated_file VARCHAR(255) NOT NULL, original_file VARCHAR(255) NOT NULL, profile_id BIGINT NOT NULL, status BIGINT DEFAULT 0 NOT NULL, created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, PRIMARY KEY(id));
CREATE TABLE attendance (id BIGSERIAL, date TIMESTAMP, course_id BIGINT NOT NULL, course_meeting_time_id BIGINT NOT NULL, created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, PRIMARY KEY(id));
CREATE TABLE building (id BIGSERIAL, name VARCHAR(255) NOT NULL, abbreviation VARCHAR(10), PRIMARY KEY(id));
CREATE TABLE calendar (id BIGSERIAL, name VARCHAR(255) NOT NULL, description TEXT NOT NULL, is_public BOOLEAN DEFAULT 'false' NOT NULL, type BIGINT DEFAULT 0 NOT NULL, color VARCHAR(255) NOT NULL, PRIMARY KEY(id));
CREATE TABLE calendar_event (id BIGSERIAL, calendar_id BIGINT NOT NULL, profile_id BIGINT NOT NULL, name VARCHAR(255) NOT NULL, location VARCHAR(255) NOT NULL, from_date TIMESTAMP NOT NULL, to_date TIMESTAMP NOT NULL, reminder BIGINT DEFAULT 0 NOT NULL, description TEXT NOT NULL, is_personal BOOLEAN DEFAULT 'false' NOT NULL, notify_changes BOOLEAN DEFAULT 'false' NOT NULL, created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, slug VARCHAR(255), PRIMARY KEY(id));
CREATE TABLE calendar_event_attendee (id BIGSERIAL, calendar_event_id BIGINT NOT NULL, profile_id BIGINT NOT NULL, status BIGINT DEFAULT 0 NOT NULL, comment TEXT NOT NULL, created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, PRIMARY KEY(id));
CREATE TABLE campus (id BIGSERIAL, name VARCHAR(255) NOT NULL, is_primary BOOLEAN DEFAULT 'false', address VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, postcode VARCHAR(10) NOT NULL, institution_id BIGINT NOT NULL, PRIMARY KEY(id));
CREATE TABLE campus_course (id BIGSERIAL, campus_id BIGINT NOT NULL, course_id BIGINT NOT NULL, PRIMARY KEY(id));
CREATE TABLE contact (id BIGSERIAL, email_address VARCHAR(255), phone_work VARCHAR(200), phone_home VARCHAR(200), phone_mobile VARCHAR(200), address_line_1 VARCHAR(300), address_line_2 VARCHAR(300), postcode VARCHAR(10), city VARCHAR(255), country_id BIGINT NOT NULL, state_province_id BIGINT NOT NULL, created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, PRIMARY KEY(id));
CREATE TABLE country (id BIGSERIAL, name VARCHAR(255) NOT NULL, code VARCHAR(10) NOT NULL, PRIMARY KEY(id));
CREATE TABLE course (id BIGSERIAL, name VARCHAR(255) NOT NULL, code VARCHAR(10) NOT NULL, department_id BIGINT NOT NULL, description TEXT NOT NULL, background TEXT DEFAULT 'This course has been developed collaboratively by a team of TutorPlus tutors and educationists.' NOT NULL, is_finalized BOOLEAN DEFAULT 'false' NOT NULL, academic_period_id BIGINT NOT NULL, start_date TIMESTAMP NOT NULL, end_date TIMESTAMP NOT NULL, credits NUMERIC(18,2) DEFAULT 0, hours BIGINT NOT NULL, max_enrolled BIGINT NOT NULL, created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, slug VARCHAR(255), PRIMARY KEY(id));
CREATE TABLE course_announcement (id BIGSERIAL, course_id BIGINT NOT NULL, announcement_id BIGINT NOT NULL, PRIMARY KEY(id));
CREATE TABLE course_discussion (id BIGSERIAL, course_id BIGINT NOT NULL, discussion_id BIGINT NOT NULL, PRIMARY KEY(id));
CREATE TABLE course_faq (id BIGSERIAL, course_id BIGINT NOT NULL, faq_id BIGINT NOT NULL, PRIMARY KEY(id));
CREATE TABLE course_folder (id BIGSERIAL, course_id BIGINT NOT NULL, folder_id BIGINT NOT NULL, PRIMARY KEY(id));
CREATE TABLE course_link (id BIGSERIAL, name VARCHAR(255) NOT NULL, url VARCHAR(255) NOT NULL, course_id BIGINT NOT NULL, PRIMARY KEY(id));
CREATE TABLE course_mailing_list (id BIGSERIAL, mailing_list_id BIGINT NOT NULL, course_id BIGINT NOT NULL, PRIMARY KEY(id));
CREATE TABLE course_meeting_time (id BIGSERIAL, day BIGINT NOT NULL, from_time VARCHAR(255) NOT NULL, to_time VARCHAR(255) NOT NULL, course_id BIGINT NOT NULL, building_id BIGINT NOT NULL, room_id BIGINT NOT NULL, PRIMARY KEY(id));
CREATE TABLE course_reading_item (id BIGSERIAL, title VARCHAR(255) NOT NULL, author VARCHAR(255) NOT NULL, course_id BIGINT NOT NULL, PRIMARY KEY(id));
CREATE TABLE department (id BIGSERIAL, name VARCHAR(255) NOT NULL, abbreviation VARCHAR(10) NOT NULL, faculty_id BIGINT NOT NULL, PRIMARY KEY(id));
CREATE TABLE discussion (id BIGSERIAL, name VARCHAR(255) NOT NULL, profile_id BIGINT NOT NULL, description TEXT NOT NULL, access_level BIGINT NOT NULL, last_visit TIMESTAMP, latest_comment_id BIGINT, nb_topics BIGINT DEFAULT 0, nb_members BIGINT DEFAULT 1, nb_replies BIGINT DEFAULT 1, is_primary BOOLEAN DEFAULT 'false', is_removed BOOLEAN DEFAULT 'false', created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, slug VARCHAR(255), PRIMARY KEY(id));
CREATE TABLE discussion_comment (id BIGSERIAL, reply TEXT NOT NULL, profile_id BIGINT NOT NULL, discussion_post_id BIGINT NOT NULL, created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, PRIMARY KEY(id));
CREATE TABLE discussion_peer (id BIGSERIAL, nickname VARCHAR(255) NOT NULL, subscription_type BIGINT DEFAULT 0 NOT NULL, membership_type BIGINT DEFAULT 0 NOT NULL, status BIGINT DEFAULT 0 NOT NULL, discussion_id BIGINT NOT NULL, profile_id BIGINT NOT NULL, is_removed BOOLEAN DEFAULT 'false', created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, PRIMARY KEY(id));
CREATE TABLE discussion_post (id BIGSERIAL, message TEXT NOT NULL, profile_id BIGINT NOT NULL, discussion_topic_id BIGINT NOT NULL, created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, PRIMARY KEY(id));
CREATE TABLE discussion_topic (id BIGSERIAL, subject VARCHAR(255) NOT NULL, discussion_type_id BIGINT NOT NULL, message TEXT NOT NULL, discussion_id BIGINT NOT NULL, profile_id BIGINT NOT NULL, latest_comment_id BIGINT, nb_replies BIGINT DEFAULT 0, nb_views BIGINT DEFAULT 0, is_primary BOOLEAN DEFAULT 'false', created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, slug VARCHAR(255), PRIMARY KEY(id));
CREATE TABLE discussion_type (id BIGSERIAL, name VARCHAR(255) NOT NULL, created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, PRIMARY KEY(id));
CREATE TABLE email_message (id BIGSERIAL, from_email VARCHAR(255) NOT NULL, to_email TEXT, cc_email TEXT, bcc_email TEXT, email_template_id BIGINT, sender_id BIGINT NOT NULL, reply_to VARCHAR(255) NOT NULL, subject VARCHAR(255) NOT NULL, body TEXT NOT NULL, status BIGINT DEFAULT 0 NOT NULL, is_read BOOLEAN DEFAULT 'false' NOT NULL, is_trashed BOOLEAN DEFAULT 'false' NOT NULL, created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, PRIMARY KEY(id));
CREATE TABLE email_message_correspondence (id BIGSERIAL, initiator_id BIGINT NOT NULL, invitee_id BIGINT NOT NULL, created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, PRIMARY KEY(id));
CREATE TABLE email_message_reply (id BIGSERIAL, sender_id BIGINT NOT NULL, responder_id BIGINT NOT NULL, email_message_id BIGINT NOT NULL, email_message_reply_id BIGINT NOT NULL, PRIMARY KEY(id));
CREATE TABLE email_template (id BIGSERIAL, name VARCHAR(255) NOT NULL UNIQUE, subject VARCHAR(5000) NOT NULL, description VARCHAR(5000), patterns VARCHAR(500), body TEXT NOT NULL, from_email VARCHAR(5000) NOT NULL, from_name VARCHAR(255) DEFAULT 'Tutor+ team' NOT NULL, to_email VARCHAR(5000), cc_email VARCHAR(5000), bcc_email VARCHAR(5000), reply_to VARCHAR(5000) NOT NULL, is_html BOOLEAN DEFAULT 'false' NOT NULL, is_active BOOLEAN DEFAULT 'true' NOT NULL, created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, slug VARCHAR(255), PRIMARY KEY(id));
CREATE TABLE faculty (id BIGSERIAL, name VARCHAR(255) NOT NULL, abbreviation VARCHAR(10) NOT NULL, institution_id BIGINT NOT NULL, PRIMARY KEY(id));
CREATE TABLE faq (id BIGSERIAL, profile_id BIGINT NOT NULL, question VARCHAR(255) NOT NULL, answer TEXT NOT NULL, is_published BOOLEAN DEFAULT 'false' NOT NULL, created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, slug VARCHAR(255), PRIMARY KEY(id));
CREATE TABLE file (id BIGSERIAL, folder_id BIGINT NOT NULL, original_name VARCHAR(255) NOT NULL, generated_name VARCHAR(255) NOT NULL, mime_type VARCHAR(128) NOT NULL, size BIGINT NOT NULL, created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, PRIMARY KEY(id));
CREATE TABLE folder (id BIGSERIAL, name VARCHAR(255) NOT NULL, type BIGINT DEFAULT 0 NOT NULL, parent_id BIGINT DEFAULT 1 NOT NULL, created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, lft INT, rgt INT, level SMALLINT, PRIMARY KEY(id));
CREATE TABLE gradebook (id BIGSERIAL, items BIGINT DEFAULT 0 NOT NULL, course_id BIGINT NOT NULL, created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, PRIMARY KEY(id));
CREATE TABLE gradebook_item (id BIGSERIAL, name VARCHAR(255) NOT NULL, weight NUMERIC(18,2) DEFAULT 0 NOT NULL, gradebook_id BIGINT NOT NULL, created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, PRIMARY KEY(id));
CREATE TABLE gradebook_scale (id BIGSERIAL, min_points NUMERIC(18,2) DEFAULT 0 NOT NULL, max_points NUMERIC(18,2) DEFAULT 0 NOT NULL, code VARCHAR(255) NOT NULL, gradebook_id BIGINT NOT NULL, created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, PRIMARY KEY(id));
CREATE TABLE institution (id BIGSERIAL, name VARCHAR(255) NOT NULL, abbreviation VARCHAR(10) NOT NULL, description TEXT NOT NULL, country_id BIGINT NOT NULL, PRIMARY KEY(id));
CREATE TABLE mailing_list (id BIGSERIAL, name VARCHAR(255) NOT NULL, profile_id BIGINT NOT NULL, created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, PRIMARY KEY(id));
CREATE TABLE mailing_list_email_message (id BIGSERIAL, mailing_list_id BIGINT NOT NULL, email_message_id BIGINT NOT NULL, PRIMARY KEY(id));
CREATE TABLE news_item (id BIGSERIAL, profile_id BIGINT NOT NULL, heading VARCHAR(255) NOT NULL, blurb TEXT NOT NULL, body TEXT NOT NULL, is_published BOOLEAN DEFAULT 'false' NOT NULL, lock_until TIMESTAMP, lock_after TIMESTAMP, created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, slug VARCHAR(255), PRIMARY KEY(id));
CREATE TABLE notification_settings (id BIGSERIAL, email BOOLEAN DEFAULT 'false', reply BOOLEAN DEFAULT 'false', peer_activities BOOLEAN DEFAULT 'false', news_alerts BOOLEAN DEFAULT 'false', announcement_alerts BOOLEAN DEFAULT 'false', event_alerts BOOLEAN DEFAULT 'false', discussion_updates BOOLEAN DEFAULT 'false', course_updates BOOLEAN DEFAULT 'false', assignment_due BOOLEAN DEFAULT 'false', system_updates BOOLEAN DEFAULT 'false', system_maintenance BOOLEAN DEFAULT 'false', profile_id BIGINT NOT NULL, PRIMARY KEY(id));
CREATE TABLE peer (id BIGSERIAL, inviter_id BIGINT NOT NULL, invitee_id BIGINT NOT NULL, status BIGINT DEFAULT 0 NOT NULL, PRIMARY KEY(id));
CREATE TABLE profile (id BIGSERIAL, first_name VARCHAR(255), last_name VARCHAR(255), middle_name VARCHAR(255), birth_date TIMESTAMP, gender VARCHAR(255), is_instructor BOOLEAN DEFAULT 'false', high_school VARCHAR(255), studied_at VARCHAR(255), current_study VARCHAR(255), title VARCHAR(255), email VARCHAR(255), username VARCHAR(255), password VARCHAR(255), algorithm VARCHAR(255), salt VARCHAR(255), is_super_admin BOOLEAN DEFAULT 'false', is_active BOOLEAN DEFAULT 'true', institution_id BIGINT NOT NULL, last_login TIMESTAMP, created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, slug VARCHAR(255), PRIMARY KEY(id));
CREATE TABLE profile_activity_feed (id BIGSERIAL, profile_id BIGINT NOT NULL, activity_feed_id BIGINT NOT NULL, PRIMARY KEY(id));
CREATE TABLE profile_attendance (id BIGSERIAL, status BIGINT DEFAULT 0 NOT NULL, attendance_id BIGINT NOT NULL, profile_id BIGINT NOT NULL, created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, PRIMARY KEY(id));
CREATE TABLE profile_award (id BIGSERIAL, profile_id BIGINT, institution VARCHAR(255), description VARCHAR(500), year VARCHAR(255), PRIMARY KEY(id));
CREATE TABLE profile_book (id BIGSERIAL, profile_id BIGINT, title VARCHAR(255) NOT NULL, author VARCHAR(255), PRIMARY KEY(id));
CREATE TABLE profile_calendar (id BIGSERIAL, owner_id BIGINT NOT NULL, calendar_id BIGINT NOT NULL, PRIMARY KEY(id));
CREATE TABLE profile_course (id BIGSERIAL, profile_id BIGINT NOT NULL, course_id BIGINT NOT NULL, PRIMARY KEY(id));
CREATE TABLE profile_folder (id BIGSERIAL, profile_id BIGINT NOT NULL, folder_id BIGINT NOT NULL, PRIMARY KEY(id));
CREATE TABLE profile_forgot_password (id BIGSERIAL, profile_id BIGINT, unique_key VARCHAR(255), expires_at TIMESTAMP NOT NULL, created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, PRIMARY KEY(id));
CREATE TABLE profile_gradebook_item (id BIGSERIAL, points NUMERIC(18,2) DEFAULT 0 NOT NULL, gradebook_item_id BIGINT NOT NULL, profile_id BIGINT NOT NULL, created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, PRIMARY KEY(id));
CREATE TABLE profile_group (id BIGSERIAL, name VARCHAR(255) NOT NULL, description VARCHAR(1000) NOT NULL, created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, PRIMARY KEY(id));
CREATE TABLE profile_group_permission (id BIGSERIAL, group_id BIGINT NOT NULL, permission_id BIGINT NOT NULL, created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, PRIMARY KEY(id));
CREATE TABLE profile_interest (id BIGSERIAL, profile_id BIGINT, name VARCHAR(500) NOT NULL, PRIMARY KEY(id));
CREATE TABLE profile_permission (id BIGSERIAL, name VARCHAR(255) NOT NULL, description VARCHAR(1000) NOT NULL, created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, PRIMARY KEY(id));
CREATE TABLE profile_profile_group (id BIGSERIAL, profile_id BIGINT NOT NULL, group_id BIGINT NOT NULL, created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, PRIMARY KEY(id));
CREATE TABLE profile_profile_permission (id BIGSERIAL, profile_id BIGINT NOT NULL, permission_id BIGINT NOT NULL, created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, PRIMARY KEY(id));
CREATE TABLE profile_programme (id BIGSERIAL, profile_id BIGINT NOT NULL, program_id BIGINT NOT NULL, PRIMARY KEY(id));
CREATE TABLE profile_publication (id BIGSERIAL, profile_id BIGINT, title VARCHAR(255) NOT NULL, link VARCHAR(500), year VARCHAR(255), PRIMARY KEY(id));
CREATE TABLE profile_qualification (id BIGSERIAL, profile_id BIGINT, institution VARCHAR(255), description VARCHAR(500), year VARCHAR(255), PRIMARY KEY(id));
CREATE TABLE profile_remember_key (id BIGSERIAL, profile_id BIGINT, remember_key VARCHAR(32), ip_address VARCHAR(50), created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, PRIMARY KEY(id));
CREATE TABLE program (id BIGSERIAL, name VARCHAR(255) NOT NULL, abbreviation VARCHAR(10) NOT NULL, code VARCHAR(255) NOT NULL, description TEXT NOT NULL, type BIGINT DEFAULT 0 NOT NULL, department_id BIGINT NOT NULL, program_level_id BIGINT NOT NULL, PRIMARY KEY(id));
CREATE TABLE program_level (id BIGSERIAL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id));
CREATE TABLE room (id BIGSERIAL, name VARCHAR(255) NOT NULL, abbreviation VARCHAR(10) NOT NULL, building_id BIGINT NOT NULL, PRIMARY KEY(id));
CREATE TABLE state_province (id BIGSERIAL, name VARCHAR(255) NOT NULL, country_id BIGINT NOT NULL, PRIMARY KEY(id));
CREATE UNIQUE INDEX announcement_sluggable ON announcement (slug);
CREATE UNIQUE INDEX assignment_sluggable ON assignment (slug);
CREATE UNIQUE INDEX calendar_event_sluggable ON calendar_event (slug);
CREATE UNIQUE INDEX course_sluggable ON course (slug, code, name);
CREATE UNIQUE INDEX discussion_sluggable ON discussion (slug);
CREATE UNIQUE INDEX discussion_topic_sluggable ON discussion_topic (slug);
CREATE UNIQUE INDEX email_template_sluggable ON email_template (slug, name);
CREATE UNIQUE INDEX faq_sluggable ON faq (slug);
CREATE UNIQUE INDEX folderFile ON file (folder_id, original_name);
CREATE UNIQUE INDEX news_item_sluggable ON news_item (slug);
CREATE UNIQUE INDEX profile_sluggable ON profile (slug, first_name, last_name);
CREATE INDEX is_active_idx ON profile (is_active);
ALTER TABLE academic_period ADD CONSTRAINT academic_period_academic_year_id_academic_year_id FOREIGN KEY (academic_year_id) REFERENCES academic_year(id) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE activity_feed ADD CONSTRAINT activity_feed_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE activity_feed ADD CONSTRAINT activity_feed_activity_template_id_activity_template_id FOREIGN KEY (activity_template_id) REFERENCES activity_template(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE announcement ADD CONSTRAINT announcement_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE assessment_type ADD CONSTRAINT assessment_type_course_id_course_id FOREIGN KEY (course_id) REFERENCES course(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE assignment ADD CONSTRAINT assignment_course_id_course_id FOREIGN KEY (course_id) REFERENCES course(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE assignment ADD CONSTRAINT assignment_assessment_type_id_assessment_type_id FOREIGN KEY (assessment_type_id) REFERENCES assessment_type(id) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE assignment_discussion ADD CONSTRAINT assignment_discussion_discussion_id_discussion_id FOREIGN KEY (discussion_id) REFERENCES discussion(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE assignment_file ADD CONSTRAINT assignment_file_file_id_file_id FOREIGN KEY (file_id) REFERENCES file(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE assignment_file ADD CONSTRAINT assignment_file_assignment_id_assignment_id FOREIGN KEY (assignment_id) REFERENCES assignment(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE assignment_submission ADD CONSTRAINT assignment_submission_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE assignment_submission ADD CONSTRAINT assignment_submission_assignment_id_assignment_id FOREIGN KEY (assignment_id) REFERENCES assignment(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE attendance ADD CONSTRAINT attendance_course_meeting_time_id_course_meeting_time_id FOREIGN KEY (course_meeting_time_id) REFERENCES course_meeting_time(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE attendance ADD CONSTRAINT attendance_course_id_course_id FOREIGN KEY (course_id) REFERENCES course(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE calendar_event ADD CONSTRAINT calendar_event_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE calendar_event ADD CONSTRAINT calendar_event_calendar_id_calendar_id FOREIGN KEY (calendar_id) REFERENCES calendar(id) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE calendar_event_attendee ADD CONSTRAINT calendar_event_attendee_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE calendar_event_attendee ADD CONSTRAINT calendar_event_attendee_calendar_event_id_calendar_event_id FOREIGN KEY (calendar_event_id) REFERENCES calendar_event(id) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE campus ADD CONSTRAINT campus_institution_id_institution_id FOREIGN KEY (institution_id) REFERENCES institution(id) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE campus_course ADD CONSTRAINT campus_course_course_id_course_id FOREIGN KEY (course_id) REFERENCES course(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE campus_course ADD CONSTRAINT campus_course_campus_id_campus_id FOREIGN KEY (campus_id) REFERENCES campus(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE contact ADD CONSTRAINT contact_state_province_id_state_province_id FOREIGN KEY (state_province_id) REFERENCES state_province(id) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE contact ADD CONSTRAINT contact_country_id_country_id FOREIGN KEY (country_id) REFERENCES country(id) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE course ADD CONSTRAINT course_department_id_department_id FOREIGN KEY (department_id) REFERENCES department(id) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE course ADD CONSTRAINT course_academic_period_id_academic_period_id FOREIGN KEY (academic_period_id) REFERENCES academic_period(id) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE course_announcement ADD CONSTRAINT course_announcement_course_id_course_id FOREIGN KEY (course_id) REFERENCES course(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE course_announcement ADD CONSTRAINT course_announcement_announcement_id_announcement_id FOREIGN KEY (announcement_id) REFERENCES announcement(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE course_discussion ADD CONSTRAINT course_discussion_discussion_id_discussion_id FOREIGN KEY (discussion_id) REFERENCES discussion(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE course_discussion ADD CONSTRAINT course_discussion_course_id_course_id FOREIGN KEY (course_id) REFERENCES course(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE course_faq ADD CONSTRAINT course_faq_faq_id_faq_id FOREIGN KEY (faq_id) REFERENCES faq(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE course_faq ADD CONSTRAINT course_faq_course_id_course_id FOREIGN KEY (course_id) REFERENCES course(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE course_folder ADD CONSTRAINT course_folder_folder_id_folder_id FOREIGN KEY (folder_id) REFERENCES folder(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE course_folder ADD CONSTRAINT course_folder_course_id_course_id FOREIGN KEY (course_id) REFERENCES course(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE course_link ADD CONSTRAINT course_link_course_id_course_id FOREIGN KEY (course_id) REFERENCES course(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE course_mailing_list ADD CONSTRAINT course_mailing_list_mailing_list_id_mailing_list_id FOREIGN KEY (mailing_list_id) REFERENCES mailing_list(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE course_mailing_list ADD CONSTRAINT course_mailing_list_course_id_course_id FOREIGN KEY (course_id) REFERENCES course(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE course_meeting_time ADD CONSTRAINT course_meeting_time_room_id_room_id FOREIGN KEY (room_id) REFERENCES room(id) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE course_meeting_time ADD CONSTRAINT course_meeting_time_course_id_course_id FOREIGN KEY (course_id) REFERENCES course(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE course_meeting_time ADD CONSTRAINT course_meeting_time_building_id_building_id FOREIGN KEY (building_id) REFERENCES building(id) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE course_reading_item ADD CONSTRAINT course_reading_item_course_id_course_id FOREIGN KEY (course_id) REFERENCES course(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE department ADD CONSTRAINT department_faculty_id_faculty_id FOREIGN KEY (faculty_id) REFERENCES faculty(id) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE discussion ADD CONSTRAINT discussion_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE discussion ADD CONSTRAINT discussion_latest_comment_id_discussion_comment_id FOREIGN KEY (latest_comment_id) REFERENCES discussion_comment(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE discussion_comment ADD CONSTRAINT discussion_comment_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE discussion_comment ADD CONSTRAINT discussion_comment_discussion_post_id_discussion_post_id FOREIGN KEY (discussion_post_id) REFERENCES discussion_post(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE discussion_peer ADD CONSTRAINT discussion_peer_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE discussion_peer ADD CONSTRAINT discussion_peer_discussion_id_discussion_id FOREIGN KEY (discussion_id) REFERENCES discussion(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE discussion_post ADD CONSTRAINT discussion_post_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE discussion_post ADD CONSTRAINT discussion_post_discussion_topic_id_discussion_topic_id FOREIGN KEY (discussion_topic_id) REFERENCES discussion_topic(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE discussion_topic ADD CONSTRAINT discussion_topic_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE discussion_topic ADD CONSTRAINT discussion_topic_discussion_type_id_discussion_type_id FOREIGN KEY (discussion_type_id) REFERENCES discussion_type(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE discussion_topic ADD CONSTRAINT discussion_topic_discussion_id_discussion_id FOREIGN KEY (discussion_id) REFERENCES discussion(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE email_message ADD CONSTRAINT email_message_sender_id_profile_id FOREIGN KEY (sender_id) REFERENCES profile(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE email_message ADD CONSTRAINT email_message_email_template_id_email_template_id FOREIGN KEY (email_template_id) REFERENCES email_template(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE email_message_correspondence ADD CONSTRAINT email_message_correspondence_invitee_id_email_message_id FOREIGN KEY (invitee_id) REFERENCES email_message(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE email_message_correspondence ADD CONSTRAINT email_message_correspondence_initiator_id_email_message_id FOREIGN KEY (initiator_id) REFERENCES email_message(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE email_message_reply ADD CONSTRAINT email_message_reply_sender_id_profile_id FOREIGN KEY (sender_id) REFERENCES profile(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE email_message_reply ADD CONSTRAINT email_message_reply_responder_id_profile_id FOREIGN KEY (responder_id) REFERENCES profile(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE email_message_reply ADD CONSTRAINT email_message_reply_email_message_reply_id_email_message_id FOREIGN KEY (email_message_reply_id) REFERENCES email_message(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE email_message_reply ADD CONSTRAINT email_message_reply_email_message_id_email_message_id FOREIGN KEY (email_message_id) REFERENCES email_message(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE faculty ADD CONSTRAINT faculty_institution_id_institution_id FOREIGN KEY (institution_id) REFERENCES institution(id) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE faq ADD CONSTRAINT faq_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE file ADD CONSTRAINT file_folder_id_folder_id FOREIGN KEY (folder_id) REFERENCES folder(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE gradebook ADD CONSTRAINT gradebook_course_id_course_id FOREIGN KEY (course_id) REFERENCES course(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE gradebook_item ADD CONSTRAINT gradebook_item_gradebook_id_gradebook_id FOREIGN KEY (gradebook_id) REFERENCES gradebook(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE gradebook_scale ADD CONSTRAINT gradebook_scale_gradebook_id_gradebook_id FOREIGN KEY (gradebook_id) REFERENCES gradebook(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE institution ADD CONSTRAINT institution_country_id_country_id FOREIGN KEY (country_id) REFERENCES country(id) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE mailing_list ADD CONSTRAINT mailing_list_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE mailing_list_email_message ADD CONSTRAINT mailing_list_email_message_mailing_list_id_mailing_list_id FOREIGN KEY (mailing_list_id) REFERENCES mailing_list(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE mailing_list_email_message ADD CONSTRAINT mailing_list_email_message_email_message_id_email_message_id FOREIGN KEY (email_message_id) REFERENCES email_message(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE news_item ADD CONSTRAINT news_item_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE notification_settings ADD CONSTRAINT notification_settings_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE peer ADD CONSTRAINT peer_inviter_id_profile_id FOREIGN KEY (inviter_id) REFERENCES profile(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE peer ADD CONSTRAINT peer_invitee_id_profile_id FOREIGN KEY (invitee_id) REFERENCES profile(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE profile ADD CONSTRAINT profile_institution_id_institution_id FOREIGN KEY (institution_id) REFERENCES institution(id) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE profile_activity_feed ADD CONSTRAINT profile_activity_feed_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE profile_activity_feed ADD CONSTRAINT profile_activity_feed_activity_feed_id_activity_feed_id FOREIGN KEY (activity_feed_id) REFERENCES activity_feed(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE profile_attendance ADD CONSTRAINT profile_attendance_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE profile_attendance ADD CONSTRAINT profile_attendance_attendance_id_attendance_id FOREIGN KEY (attendance_id) REFERENCES attendance(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE profile_award ADD CONSTRAINT profile_award_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE profile_book ADD CONSTRAINT profile_book_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE profile_calendar ADD CONSTRAINT profile_calendar_owner_id_profile_id FOREIGN KEY (owner_id) REFERENCES profile(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE profile_calendar ADD CONSTRAINT profile_calendar_calendar_id_calendar_id FOREIGN KEY (calendar_id) REFERENCES calendar(id) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE profile_course ADD CONSTRAINT profile_course_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE profile_course ADD CONSTRAINT profile_course_course_id_course_id FOREIGN KEY (course_id) REFERENCES course(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE profile_folder ADD CONSTRAINT profile_folder_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE profile_folder ADD CONSTRAINT profile_folder_folder_id_folder_id FOREIGN KEY (folder_id) REFERENCES folder(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE profile_forgot_password ADD CONSTRAINT profile_forgot_password_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE profile_gradebook_item ADD CONSTRAINT profile_gradebook_item_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE profile_gradebook_item ADD CONSTRAINT profile_gradebook_item_gradebook_item_id_gradebook_item_id FOREIGN KEY (gradebook_item_id) REFERENCES gradebook_item(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE profile_group_permission ADD CONSTRAINT profile_group_permission_permission_id_profile_permission_id FOREIGN KEY (permission_id) REFERENCES profile_permission(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE profile_group_permission ADD CONSTRAINT profile_group_permission_group_id_profile_group_id FOREIGN KEY (group_id) REFERENCES profile_group(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE profile_interest ADD CONSTRAINT profile_interest_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE profile_profile_group ADD CONSTRAINT profile_profile_group_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE profile_profile_group ADD CONSTRAINT profile_profile_group_group_id_profile_group_id FOREIGN KEY (group_id) REFERENCES profile_group(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE profile_profile_permission ADD CONSTRAINT profile_profile_permission_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE profile_profile_permission ADD CONSTRAINT profile_profile_permission_permission_id_profile_permission_id FOREIGN KEY (permission_id) REFERENCES profile_permission(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE profile_programme ADD CONSTRAINT profile_programme_program_id_program_id FOREIGN KEY (program_id) REFERENCES program(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE profile_programme ADD CONSTRAINT profile_programme_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE profile_publication ADD CONSTRAINT profile_publication_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE profile_qualification ADD CONSTRAINT profile_qualification_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE profile_remember_key ADD CONSTRAINT profile_remember_key_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE program ADD CONSTRAINT program_program_level_id_program_level_id FOREIGN KEY (program_level_id) REFERENCES program_level(id) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE program ADD CONSTRAINT program_department_id_department_id FOREIGN KEY (department_id) REFERENCES department(id) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE room ADD CONSTRAINT room_building_id_building_id FOREIGN KEY (building_id) REFERENCES building(id) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE state_province ADD CONSTRAINT state_province_country_id_country_id FOREIGN KEY (country_id) REFERENCES country(id) NOT DEFERRABLE INITIALLY IMMEDIATE;
