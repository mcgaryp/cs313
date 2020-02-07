-- Create database
-- CREATE DATABASE conference;

-- Moves into the database
-- \c conference

-- Good notes to have
-- \dt                     lists the tables
-- \d+ public.user         shows the details of the user table
-- DROP TABLE public.user  Removes the user table completely so it can be recreated
-- \q                      Quites the Application

CREATE TABLE "speaker" (
	"speaker_id" serial NOT NULL,
	"first_name" serial(255) NOT NULL,
	"last_name" serial(255) NOT NULL,
	"talk_id" VARCHAR(255) NOT NULL,
	CONSTRAINT "speaker_pk" PRIMARY KEY ("speaker_id")
);



CREATE TABLE "note" (
	"note_id" serial NOT NULL,
	"note" serial NOT NULL,
	"user_id" serial NOT NULL,
	"conference_id" serial NOT NULL,
	"speaker_id" serial NOT NULL,
	CONSTRAINT "note_pk" PRIMARY KEY ("note_id")
);



CREATE TABLE "conference" (
	"conference_id" serial NOT NULL,
	"year" serial NOT NULL,
	"isSpring" serial NOT NULL,
	"session_id" integer NOT NULL,
	CONSTRAINT "conference_pk" PRIMARY KEY ("conference_id")
);



CREATE TABLE "note_taker" (
	"note_taker_id" serial NOT NULL,
	"first_name" serial(255) NOT NULL,
	"last_name" serial(255) NOT NULL,
	"note_id" integer NOT NULL,
	CONSTRAINT "note_taker_pk" PRIMARY KEY ("note_taker_id")
);



CREATE TABLE "session" (
	"session_id" serial NOT NULL,
	"session" serial(255) NOT NULL,
	CONSTRAINT "session_pk" PRIMARY KEY ("session_id")
);



CREATE TABLE "talks" (
	"talk_id" serial NOT NULL,
	"speaker_id" serial NOT NULL,
	"talk_text" serial NOT NULL,
	CONSTRAINT "talks_pk" PRIMARY KEY ("talk_id")
);



ALTER TABLE "speaker" ADD CONSTRAINT "speaker_fk0" FOREIGN KEY ("talk_id") REFERENCES "talks"("talk_id");

ALTER TABLE "note" ADD CONSTRAINT "note_fk0" FOREIGN KEY ("user_id") REFERENCES "note_taker"("note_taker_id");
ALTER TABLE "note" ADD CONSTRAINT "note_fk1" FOREIGN KEY ("conference_id") REFERENCES "conference"("conference_id");
ALTER TABLE "note" ADD CONSTRAINT "note_fk2" FOREIGN KEY ("speaker_id") REFERENCES "speaker"("speaker_id");

ALTER TABLE "conference" ADD CONSTRAINT "conference_fk0" FOREIGN KEY ("session_id") REFERENCES "session"("session_id");

ALTER TABLE "note_taker" ADD CONSTRAINT "note_taker_fk0" FOREIGN KEY ("note_id") REFERENCES "note"("note_id");

ALTER TABLE "talks" ADD CONSTRAINT "talks_fk0" FOREIGN KEY ("speaker_id") REFERENCES "speaker"("speaker_id");



