CREATE TABLE "Entreprise" (
	"id_entreprise" serial NOT NULL,
	"nom_entreprise" varchar(255) NOT NULL,
	"descriptif_entreprise" varchar(255) NOT NULL,
  "representant" varchar(255) NOT NULL,
  "email_entreprise" varchar(255) NOT NULL,
	CONSTRAINT Entreprise_pk PRIMARY KEY ("id_entreprise")
) WITH (
  OIDS=FALSE
);

CREATE TABLE "Rendezvous_prospect" (
	"id_rdv" serial NOT NULL,
  "nom_prospect"varchar(255) NOT NULL,
  "representant_prospect" varchar(255),
	"date_rdv" DATE NOT NULL,
	CONSTRAINT Rendezvous_prospect_pk PRIMARY KEY ("id_rdv")
) WITH (
  OIDS=FALSE
);



CREATE TABLE "Type_contrat" (
	"id_type" serial NOT NULL,
	"descriptif_type" varchar NOT NULL,
	CONSTRAINT Type_contrat_pk PRIMARY KEY ("id_type")
) WITH (
  OIDS=FALSE
);

CREATE TABLE "Contrat" (
	"id_contrat" serial NOT NULL,
	"num_client" serial NOT NULL,
	"type_contrat" serial NOT NULL,
	"liens_contrat" varchar UNIQUE,
	CONSTRAINT Contrat_pk PRIMARY KEY ("id_contrat")
) WITH (
  OIDS=FALSE
);


CREATE TABLE "Client" (
	"num_client" serial NOT NULL,
	"password_client" varchar(255) NOT NULL UNIQUE,
  "type_client" int NOT NULL,
  "email_client" varchar(255) NOT NULL,
	CONSTRAINT Client_pk PRIMARY KEY ("num_client")
) WITH (
  OIDS=FALSE
);

CREATE TABLE "Particulier"(
  "id_particulier" serial NOT NULL,
  "nom_particulier" varchar(255) NOT NULL,
  "prenom_particulier" varchar(255) NOT NULL,
  "telephone_particulier" varchar(255) NOT NULL,
  "email_particulier" varchar(255) NOT NULL,
  CONSTRAINT Particulier_pk PRIMARY KEY ("id_particulier")
) WITH (
  OIDS=FALSE
);



ALTER TABLE "Contrat" ADD CONSTRAINT "Contrat_fk0" FOREIGN KEY ("num_client") REFERENCES "Client"("num_client") ON DELETE CASCADE;
ALTER TABLE "Contrat" ADD CONSTRAINT "Contrat_fk1" FOREIGN KEY ("type_contrat") REFERENCES "Type_contrat"("id_type") ON DELETE CASCADE;

ALTER TABLE "Entreprise" ADD CONSTRAINT "Entreprise_fk0" FOREIGN KEY ("id_entreprise") REFERENCES "Client"("num_client") ON DELETE CASCADE;
ALTER TABLE "Entreprise" ADD CONSTRAINT "Entreprise_fk1" FOREIGN KEY ("email_entreprise") REFERENCES "Client"("email_client") ON DELETE CASCADE;
ALTER TABLE "Particulier" ADD CONSTRAINT "Particulier_fk0" FOREIGN KEY ("id_particulier") REFERENCES "Client"("num_client") ON DELETE CASCADE;
ALTER TABLE "Particulier" ADD CONSTRAINT "Particulier_fk1" FOREIGN KEY ("email_particulier") REFERENCES "Client"("email_client") ON DELETE CASCADE;
