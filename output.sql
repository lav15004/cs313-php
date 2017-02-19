--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.1
-- Dumped by pg_dump version 9.6.1

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

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
-- Name: ms_environments; Type: TABLE; Schema: public; Owner: bnidklrvliaidf
--

CREATE TABLE ms_environments (
    ms_environment_id integer NOT NULL,
    environment_name character varying(256) NOT NULL,
    environment_version character varying(5) NOT NULL
);


ALTER TABLE ms_environments OWNER TO bnidklrvliaidf;

--
-- Name: ms_server_list; Type: TABLE; Schema: public; Owner: bnidklrvliaidf
--

CREATE TABLE ms_server_list (
    ms_server_list_id integer NOT NULL,
    ms_environment_id integer NOT NULL,
    host_name character varying(256) NOT NULL,
    host_user_id character varying(25) NOT NULL,
    host_password character varying(50) NOT NULL
);


ALTER TABLE ms_server_list OWNER TO bnidklrvliaidf;

--
-- Name: env_for_ddl; Type: VIEW; Schema: public; Owner: bnidklrvliaidf
--

CREATE VIEW env_for_ddl AS
 SELECT s.ms_server_list_id AS server_id,
    ((((e.environment_name)::text || ' ('::text) || (e.environment_version)::text) || ')'::text) AS env
   FROM (ms_environments e
     JOIN ms_server_list s ON ((e.ms_environment_id = s.ms_environment_id)));


ALTER TABLE env_for_ddl OWNER TO bnidklrvliaidf;

--
-- Name: ms_environment_ms_environment_id_seq; Type: SEQUENCE; Schema: public; Owner: bnidklrvliaidf
--

CREATE SEQUENCE ms_environment_ms_environment_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE ms_environment_ms_environment_id_seq OWNER TO bnidklrvliaidf;

--
-- Name: ms_environment_ms_environment_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: bnidklrvliaidf
--

ALTER SEQUENCE ms_environment_ms_environment_id_seq OWNED BY ms_environments.ms_environment_id;


--
-- Name: ms_projects; Type: TABLE; Schema: public; Owner: bnidklrvliaidf
--

CREATE TABLE ms_projects (
    ms_project_id integer NOT NULL,
    ms_server_list_id integer NOT NULL,
    project_name character varying(256) NOT NULL
);


ALTER TABLE ms_projects OWNER TO bnidklrvliaidf;

--
-- Name: ms_projects_ms_project_id_seq; Type: SEQUENCE; Schema: public; Owner: bnidklrvliaidf
--

CREATE SEQUENCE ms_projects_ms_project_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE ms_projects_ms_project_id_seq OWNER TO bnidklrvliaidf;

--
-- Name: ms_projects_ms_project_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: bnidklrvliaidf
--

ALTER SEQUENCE ms_projects_ms_project_id_seq OWNED BY ms_projects.ms_project_id;


--
-- Name: ms_request_queue; Type: TABLE; Schema: public; Owner: bnidklrvliaidf
--

CREATE TABLE ms_request_queue (
    ms_request_queue_id integer NOT NULL,
    ms_project_id integer NOT NULL,
    ms_request_type_id integer NOT NULL,
    userid character varying(25) NOT NULL,
    lastname_firstname character varying(100) NOT NULL,
    web_user_id integer NOT NULL
);


ALTER TABLE ms_request_queue OWNER TO bnidklrvliaidf;

--
-- Name: ms_request_queue_history_ms_request_queue_history_id_seq; Type: SEQUENCE; Schema: public; Owner: bnidklrvliaidf
--

CREATE SEQUENCE ms_request_queue_history_ms_request_queue_history_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE ms_request_queue_history_ms_request_queue_history_id_seq OWNER TO bnidklrvliaidf;

--
-- Name: ms_request_queue_history; Type: TABLE; Schema: public; Owner: bnidklrvliaidf
--

CREATE TABLE ms_request_queue_history (
    ms_request_queue_history_id integer DEFAULT nextval('ms_request_queue_history_ms_request_queue_history_id_seq'::regclass) NOT NULL,
    ms_request_queue_id integer NOT NULL,
    ms_project_id integer NOT NULL,
    ms_request_type_id integer NOT NULL,
    userid character varying(25) NOT NULL,
    lastname_firstname character varying(100) NOT NULL,
    web_user_id integer NOT NULL
);


ALTER TABLE ms_request_queue_history OWNER TO bnidklrvliaidf;

--
-- Name: ms_request_queue_ms_request_queue_id_seq; Type: SEQUENCE; Schema: public; Owner: bnidklrvliaidf
--

CREATE SEQUENCE ms_request_queue_ms_request_queue_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE ms_request_queue_ms_request_queue_id_seq OWNER TO bnidklrvliaidf;

--
-- Name: ms_request_queue_ms_request_queue_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: bnidklrvliaidf
--

ALTER SEQUENCE ms_request_queue_ms_request_queue_id_seq OWNED BY ms_request_queue.ms_request_queue_id;


--
-- Name: ms_request_types; Type: TABLE; Schema: public; Owner: bnidklrvliaidf
--

CREATE TABLE ms_request_types (
    ms_request_type_id integer NOT NULL,
    request_type character varying(50) NOT NULL
);


ALTER TABLE ms_request_types OWNER TO bnidklrvliaidf;

--
-- Name: ms_request_types_ms_request_type_id_seq; Type: SEQUENCE; Schema: public; Owner: bnidklrvliaidf
--

CREATE SEQUENCE ms_request_types_ms_request_type_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE ms_request_types_ms_request_type_id_seq OWNER TO bnidklrvliaidf;

--
-- Name: ms_request_types_ms_request_type_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: bnidklrvliaidf
--

ALTER SEQUENCE ms_request_types_ms_request_type_id_seq OWNED BY ms_request_types.ms_request_type_id;


--
-- Name: ms_server_list_ms_server_list_id_seq; Type: SEQUENCE; Schema: public; Owner: bnidklrvliaidf
--

CREATE SEQUENCE ms_server_list_ms_server_list_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE ms_server_list_ms_server_list_id_seq OWNER TO bnidklrvliaidf;

--
-- Name: ms_server_list_ms_server_list_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: bnidklrvliaidf
--

ALTER SEQUENCE ms_server_list_ms_server_list_id_seq OWNED BY ms_server_list.ms_server_list_id;


--
-- Name: ms_server_users; Type: TABLE; Schema: public; Owner: bnidklrvliaidf
--

CREATE TABLE ms_server_users (
    ms_server_user_id integer NOT NULL,
    ms_server_list_id integer NOT NULL,
    ms_user_id character varying(25) NOT NULL
);


ALTER TABLE ms_server_users OWNER TO bnidklrvliaidf;

--
-- Name: ms_server_users_ms_server_user_id_seq; Type: SEQUENCE; Schema: public; Owner: bnidklrvliaidf
--

CREATE SEQUENCE ms_server_users_ms_server_user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE ms_server_users_ms_server_user_id_seq OWNER TO bnidklrvliaidf;

--
-- Name: ms_server_users_ms_server_user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: bnidklrvliaidf
--

ALTER SEQUENCE ms_server_users_ms_server_user_id_seq OWNED BY ms_server_users.ms_server_user_id;


--
-- Name: ms_web_users; Type: TABLE; Schema: public; Owner: bnidklrvliaidf
--

CREATE TABLE ms_web_users (
    id integer NOT NULL,
    user_id character varying(25) NOT NULL,
    full_name character varying(100) NOT NULL,
    pw_hash text NOT NULL
);


ALTER TABLE ms_web_users OWNER TO bnidklrvliaidf;

--
-- Name: ms_web_users_id_seq; Type: SEQUENCE; Schema: public; Owner: bnidklrvliaidf
--

CREATE SEQUENCE ms_web_users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE ms_web_users_id_seq OWNER TO bnidklrvliaidf;

--
-- Name: ms_web_users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: bnidklrvliaidf
--

ALTER SEQUENCE ms_web_users_id_seq OWNED BY ms_web_users.id;


--
-- Name: vw_queue; Type: VIEW; Schema: public; Owner: bnidklrvliaidf
--

CREATE VIEW vw_queue AS
 SELECT q.ms_request_queue_id AS id,
    p.project_name AS name,
    t.request_type AS rtype,
    q.userid,
    q.lastname_firstname AS lfname,
    p.ms_project_id
   FROM ((ms_request_queue q
     JOIN ms_projects p ON ((q.ms_project_id = p.ms_project_id)))
     JOIN ms_request_types t ON ((q.ms_request_type_id = t.ms_request_type_id)));


ALTER TABLE vw_queue OWNER TO bnidklrvliaidf;

--
-- Name: ms_environments ms_environment_id; Type: DEFAULT; Schema: public; Owner: bnidklrvliaidf
--

ALTER TABLE ONLY ms_environments ALTER COLUMN ms_environment_id SET DEFAULT nextval('ms_environment_ms_environment_id_seq'::regclass);


--
-- Name: ms_projects ms_project_id; Type: DEFAULT; Schema: public; Owner: bnidklrvliaidf
--

ALTER TABLE ONLY ms_projects ALTER COLUMN ms_project_id SET DEFAULT nextval('ms_projects_ms_project_id_seq'::regclass);


--
-- Name: ms_request_queue ms_request_queue_id; Type: DEFAULT; Schema: public; Owner: bnidklrvliaidf
--

ALTER TABLE ONLY ms_request_queue ALTER COLUMN ms_request_queue_id SET DEFAULT nextval('ms_request_queue_ms_request_queue_id_seq'::regclass);


--
-- Name: ms_request_types ms_request_type_id; Type: DEFAULT; Schema: public; Owner: bnidklrvliaidf
--

ALTER TABLE ONLY ms_request_types ALTER COLUMN ms_request_type_id SET DEFAULT nextval('ms_request_types_ms_request_type_id_seq'::regclass);


--
-- Name: ms_server_list ms_server_list_id; Type: DEFAULT; Schema: public; Owner: bnidklrvliaidf
--

ALTER TABLE ONLY ms_server_list ALTER COLUMN ms_server_list_id SET DEFAULT nextval('ms_server_list_ms_server_list_id_seq'::regclass);


--
-- Name: ms_server_users ms_server_user_id; Type: DEFAULT; Schema: public; Owner: bnidklrvliaidf
--

ALTER TABLE ONLY ms_server_users ALTER COLUMN ms_server_user_id SET DEFAULT nextval('ms_server_users_ms_server_user_id_seq'::regclass);


--
-- Name: ms_web_users id; Type: DEFAULT; Schema: public; Owner: bnidklrvliaidf
--

ALTER TABLE ONLY ms_web_users ALTER COLUMN id SET DEFAULT nextval('ms_web_users_id_seq'::regclass);


--
-- Name: ms_environment_ms_environment_id_seq; Type: SEQUENCE SET; Schema: public; Owner: bnidklrvliaidf
--

SELECT pg_catalog.setval('ms_environment_ms_environment_id_seq', 4, true);


--
-- Data for Name: ms_environments; Type: TABLE DATA; Schema: public; Owner: bnidklrvliaidf
--

COPY ms_environments (ms_environment_id, environment_name, environment_version) FROM stdin;
1	Prod1	10.2
2	Prod1	10.4
3	Stage1	10.2
4	Stage1	10.4
\.


--
-- Data for Name: ms_projects; Type: TABLE DATA; Schema: public; Owner: bnidklrvliaidf
--

COPY ms_projects (ms_project_id, ms_server_list_id, project_name) FROM stdin;
1	1	jira automation
2	2	jira automation
3	3	jira automation
4	4	jira automation
\.


--
-- Name: ms_projects_ms_project_id_seq; Type: SEQUENCE SET; Schema: public; Owner: bnidklrvliaidf
--

SELECT pg_catalog.setval('ms_projects_ms_project_id_seq', 4, true);


--
-- Data for Name: ms_request_queue; Type: TABLE DATA; Schema: public; Owner: bnidklrvliaidf
--

COPY ms_request_queue (ms_request_queue_id, ms_project_id, ms_request_type_id, userid, lastname_firstname, web_user_id) FROM stdin;
8	1	3	jlavold	Aaron Lavold	7
9	2	1	llavold	Liz Lavold	7
10	3	2	jhalpert	Jim Halpert	7
\.


--
-- Data for Name: ms_request_queue_history; Type: TABLE DATA; Schema: public; Owner: bnidklrvliaidf
--

COPY ms_request_queue_history (ms_request_queue_history_id, ms_request_queue_id, ms_project_id, ms_request_type_id, userid, lastname_firstname, web_user_id) FROM stdin;
3	7	1	1	klavold	Kaelen Lavold	7
\.


--
-- Name: ms_request_queue_history_ms_request_queue_history_id_seq; Type: SEQUENCE SET; Schema: public; Owner: bnidklrvliaidf
--

SELECT pg_catalog.setval('ms_request_queue_history_ms_request_queue_history_id_seq', 3, true);


--
-- Name: ms_request_queue_ms_request_queue_id_seq; Type: SEQUENCE SET; Schema: public; Owner: bnidklrvliaidf
--

SELECT pg_catalog.setval('ms_request_queue_ms_request_queue_id_seq', 10, true);


--
-- Data for Name: ms_request_types; Type: TABLE DATA; Schema: public; Owner: bnidklrvliaidf
--

COPY ms_request_types (ms_request_type_id, request_type) FROM stdin;
1	Architect
2	Web Professional
3	Web Analyst
4	Web Reporter
\.


--
-- Name: ms_request_types_ms_request_type_id_seq; Type: SEQUENCE SET; Schema: public; Owner: bnidklrvliaidf
--

SELECT pg_catalog.setval('ms_request_types_ms_request_type_id_seq', 4, true);


--
-- Data for Name: ms_server_list; Type: TABLE DATA; Schema: public; Owner: bnidklrvliaidf
--

COPY ms_server_list (ms_server_list_id, ms_environment_id, host_name, host_user_id, host_password) FROM stdin;
1	1	abc.abc.com	testid	testpw
2	2	abc.abc.com	testid	testpw
3	3	stage.abc.com	stageid	stagepw
4	4	stage.abc.com	stageid	stagepw
\.


--
-- Name: ms_server_list_ms_server_list_id_seq; Type: SEQUENCE SET; Schema: public; Owner: bnidklrvliaidf
--

SELECT pg_catalog.setval('ms_server_list_ms_server_list_id_seq', 4, true);


--
-- Data for Name: ms_server_users; Type: TABLE DATA; Schema: public; Owner: bnidklrvliaidf
--

COPY ms_server_users (ms_server_user_id, ms_server_list_id, ms_user_id) FROM stdin;
1	1	jlavold
2	2	jlavold
3	3	jlavold
4	4	jlavold
\.


--
-- Name: ms_server_users_ms_server_user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: bnidklrvliaidf
--

SELECT pg_catalog.setval('ms_server_users_ms_server_user_id_seq', 4, true);


--
-- Data for Name: ms_web_users; Type: TABLE DATA; Schema: public; Owner: bnidklrvliaidf
--

COPY ms_web_users (id, user_id, full_name, pw_hash) FROM stdin;
7	jlavold	Aaron Lavold	kolvnlshjfAOOLVKVNLOSDHFOIH
\.


--
-- Name: ms_web_users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: bnidklrvliaidf
--

SELECT pg_catalog.setval('ms_web_users_id_seq', 7, true);


--
-- Name: ms_environments ms_environment_environment_name_environment_version_pk; Type: CONSTRAINT; Schema: public; Owner: bnidklrvliaidf
--

ALTER TABLE ONLY ms_environments
    ADD CONSTRAINT ms_environment_environment_name_environment_version_pk PRIMARY KEY (environment_name, environment_version);


--
-- Name: ms_projects ms_projects_ms_server_list_id_project_name_pk; Type: CONSTRAINT; Schema: public; Owner: bnidklrvliaidf
--

ALTER TABLE ONLY ms_projects
    ADD CONSTRAINT ms_projects_ms_server_list_id_project_name_pk PRIMARY KEY (ms_server_list_id, project_name);


--
-- Name: ms_request_queue_history ms_request_queue_history_pkey; Type: CONSTRAINT; Schema: public; Owner: bnidklrvliaidf
--

ALTER TABLE ONLY ms_request_queue_history
    ADD CONSTRAINT ms_request_queue_history_pkey PRIMARY KEY (ms_request_queue_history_id);


--
-- Name: ms_request_queue ms_request_queue_pkey; Type: CONSTRAINT; Schema: public; Owner: bnidklrvliaidf
--

ALTER TABLE ONLY ms_request_queue
    ADD CONSTRAINT ms_request_queue_pkey PRIMARY KEY (ms_request_queue_id);


--
-- Name: ms_request_types ms_request_types_pkey; Type: CONSTRAINT; Schema: public; Owner: bnidklrvliaidf
--

ALTER TABLE ONLY ms_request_types
    ADD CONSTRAINT ms_request_types_pkey PRIMARY KEY (request_type);


--
-- Name: ms_server_list ms_server_list_environment_id_host_name_pk; Type: CONSTRAINT; Schema: public; Owner: bnidklrvliaidf
--

ALTER TABLE ONLY ms_server_list
    ADD CONSTRAINT ms_server_list_environment_id_host_name_pk PRIMARY KEY (ms_environment_id, host_name);


--
-- Name: ms_server_users ms_server_users_ms_user_id_ms_server_list_id_pk; Type: CONSTRAINT; Schema: public; Owner: bnidklrvliaidf
--

ALTER TABLE ONLY ms_server_users
    ADD CONSTRAINT ms_server_users_ms_user_id_ms_server_list_id_pk PRIMARY KEY (ms_user_id, ms_server_list_id);


--
-- Name: ms_web_users ms_web_users_pkey; Type: CONSTRAINT; Schema: public; Owner: bnidklrvliaidf
--

ALTER TABLE ONLY ms_web_users
    ADD CONSTRAINT ms_web_users_pkey PRIMARY KEY (id);


--
-- Name: ms_environment_ms_environment_id_uindex; Type: INDEX; Schema: public; Owner: bnidklrvliaidf
--

CREATE UNIQUE INDEX ms_environment_ms_environment_id_uindex ON ms_environments USING btree (ms_environment_id);


--
-- Name: ms_projects_ms_project_id_uindex; Type: INDEX; Schema: public; Owner: bnidklrvliaidf
--

CREATE UNIQUE INDEX ms_projects_ms_project_id_uindex ON ms_projects USING btree (ms_project_id);


--
-- Name: ms_request_queue_history_ms_request_queue_id_history_uindex; Type: INDEX; Schema: public; Owner: bnidklrvliaidf
--

CREATE UNIQUE INDEX ms_request_queue_history_ms_request_queue_id_history_uindex ON ms_request_queue_history USING btree (ms_request_queue_history_id);


--
-- Name: ms_request_queue_ms_request_queue_id_uindex; Type: INDEX; Schema: public; Owner: bnidklrvliaidf
--

CREATE UNIQUE INDEX ms_request_queue_ms_request_queue_id_uindex ON ms_request_queue USING btree (ms_request_queue_id);


--
-- Name: ms_request_types_ms_request_type_id_uindex; Type: INDEX; Schema: public; Owner: bnidklrvliaidf
--

CREATE UNIQUE INDEX ms_request_types_ms_request_type_id_uindex ON ms_request_types USING btree (ms_request_type_id);


--
-- Name: ms_server_list_ms_server_list_id_uindex; Type: INDEX; Schema: public; Owner: bnidklrvliaidf
--

CREATE UNIQUE INDEX ms_server_list_ms_server_list_id_uindex ON ms_server_list USING btree (ms_server_list_id);


--
-- Name: ms_server_users_ms_server_users_uindex; Type: INDEX; Schema: public; Owner: bnidklrvliaidf
--

CREATE UNIQUE INDEX ms_server_users_ms_server_users_uindex ON ms_server_users USING btree (ms_server_user_id);


--
-- Name: ms_web_users_id_uindex; Type: INDEX; Schema: public; Owner: bnidklrvliaidf
--

CREATE UNIQUE INDEX ms_web_users_id_uindex ON ms_web_users USING btree (id);


--
-- Name: ms_web_users_pw_hash_uindex; Type: INDEX; Schema: public; Owner: bnidklrvliaidf
--

CREATE UNIQUE INDEX ms_web_users_pw_hash_uindex ON ms_web_users USING btree (pw_hash);


--
-- Name: ms_web_users_user_id_uindex; Type: INDEX; Schema: public; Owner: bnidklrvliaidf
--

CREATE UNIQUE INDEX ms_web_users_user_id_uindex ON ms_web_users USING btree (user_id);


--
-- Name: ms_projects ms_projects_ms_server_list_ms_server_list_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: bnidklrvliaidf
--

ALTER TABLE ONLY ms_projects
    ADD CONSTRAINT ms_projects_ms_server_list_ms_server_list_id_fk FOREIGN KEY (ms_server_list_id) REFERENCES ms_server_list(ms_server_list_id);


--
-- Name: ms_request_queue_history ms_request_queue_history_ms_web_users_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: bnidklrvliaidf
--

ALTER TABLE ONLY ms_request_queue_history
    ADD CONSTRAINT ms_request_queue_history_ms_web_users_id_fk FOREIGN KEY (web_user_id) REFERENCES ms_web_users(id);


--
-- Name: ms_request_queue ms_request_queue_ms_projects_ms_project_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: bnidklrvliaidf
--

ALTER TABLE ONLY ms_request_queue
    ADD CONSTRAINT ms_request_queue_ms_projects_ms_project_id_fk FOREIGN KEY (ms_project_id) REFERENCES ms_projects(ms_project_id);


--
-- Name: ms_request_queue_history ms_request_queue_ms_projects_ms_project_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: bnidklrvliaidf
--

ALTER TABLE ONLY ms_request_queue_history
    ADD CONSTRAINT ms_request_queue_ms_projects_ms_project_id_fk FOREIGN KEY (ms_project_id) REFERENCES ms_projects(ms_project_id);


--
-- Name: ms_request_queue ms_request_queue_ms_request_types_ms_request_type_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: bnidklrvliaidf
--

ALTER TABLE ONLY ms_request_queue
    ADD CONSTRAINT ms_request_queue_ms_request_types_ms_request_type_id_fk FOREIGN KEY (ms_request_type_id) REFERENCES ms_request_types(ms_request_type_id);


--
-- Name: ms_request_queue_history ms_request_queue_ms_request_types_ms_request_type_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: bnidklrvliaidf
--

ALTER TABLE ONLY ms_request_queue_history
    ADD CONSTRAINT ms_request_queue_ms_request_types_ms_request_type_id_fk FOREIGN KEY (ms_request_type_id) REFERENCES ms_request_types(ms_request_type_id);


--
-- Name: ms_request_queue ms_request_queue_ms_web_users_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: bnidklrvliaidf
--

ALTER TABLE ONLY ms_request_queue
    ADD CONSTRAINT ms_request_queue_ms_web_users_id_fk FOREIGN KEY (web_user_id) REFERENCES ms_web_users(id);


--
-- Name: ms_server_list ms_server_list_ms_environments_ms_environment_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: bnidklrvliaidf
--

ALTER TABLE ONLY ms_server_list
    ADD CONSTRAINT ms_server_list_ms_environments_ms_environment_id_fk FOREIGN KEY (ms_environment_id) REFERENCES ms_environments(ms_environment_id);


--
-- Name: ms_server_users ms_server_users_ms_server_list_ms_server_list_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: bnidklrvliaidf
--

ALTER TABLE ONLY ms_server_users
    ADD CONSTRAINT ms_server_users_ms_server_list_ms_server_list_id_fk FOREIGN KEY (ms_server_list_id) REFERENCES ms_server_list(ms_server_list_id);


--
-- Name: public; Type: ACL; Schema: -; Owner: bnidklrvliaidf
--

REVOKE ALL ON SCHEMA public FROM postgres;
REVOKE ALL ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO bnidklrvliaidf;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- Name: plpgsql; Type: ACL; Schema: -; Owner: postgres
--

GRANT ALL ON LANGUAGE plpgsql TO bnidklrvliaidf;


--
-- PostgreSQL database dump complete
--

