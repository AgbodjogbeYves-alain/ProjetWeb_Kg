CREATE TABLE "Client" (
	"id_entreprise" serial NOT NULL,
	"nom_entreprise" varchar(255) NOT NULL,
	"descriptif_client" varchar(255) NOT NULL,
  "representant" varchar(255) NOT NULL,
  "email_client" varchar(255) NOT NULL,
	"password_client" varchar(255) NOT NULL,
	"type_client" int NOT NULL,
	CONSTRAINT Entreprise_pk PRIMARY KEY ("id_entreprise")
) WITH (
  OIDS=FALSE
);

CREATE TABLE "Type_Client"(
	id_type int NOT NULL,
	libelle varchar(255) NOT NULL,
	CONSTRAINT Type_Client_pk PRIMARY KEY("id_type")
)WITH (
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

CREATE TABLE "Administrateur"(
	"id_admin" serial NOT NULL,
	"nom_admin" varchar(255) NOT NULL,
	"prenom_admin" varchar(255) NOT NULL,
	"numero_admin" varchar(255) NOT NULL,
	"email_admin" varchar(255) NOT NULL,
	"privilege_admin" int NOT NULL,
	CONSTRAINT Admin_pk PRIMARY KEY ("id_admin")
	) WITH (
  	OIDS=FALSE
	);
)



ALTER TABLE "Contrat" ADD CONSTRAINT "Contrat_fk0" FOREIGN KEY ("num_client") REFERENCES "Client"("num_client") ON DELETE CASCADE;
ALTER TABLE "Contrat" ADD CONSTRAINT "Contrat_fk1" FOREIGN KEY ("type_contrat") REFERENCES "Type_contrat"("id_type") ON DELETE CASCADE;
ALTER TABLE "Client" ADD CONSTRAINT "Client_fk1" FOREIGN KEY ("id_type") REFERENCES "Type_Client"("id_type") ON DELETE CASCADE;
