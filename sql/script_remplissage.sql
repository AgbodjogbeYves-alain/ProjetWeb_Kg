INSERT INTO "Client"("id_client","nom_client","descriptif_client","representant","email_client","password_client","type_client") VALUES (0,'Prima Center','Centre Commercial','Jean Marcher','prima.center@yahoo.fr','$2y$10$TUfXPG.qp.J9dupmcogeeu7G0bdrNFuKEraX0.UOzhayxBe4P4ur.',0);/*password clair = moi*/
INSERT INTO "Client"("id_client","nom_client","descriptif_client","representant","email_client","password_client","type_client") VALUES (1,'Super Hayat','Super Marché','Marc Cascade','super.hayat@gmail.fr','$2y$10$n71eHSjv8fJzKrm3w.MYm.yigGOvpkm48kQ.1IvB6UrA08zOJCD7q',0); /*password clair = toi*/
INSERT INTO "Client"("id_client","nom_client","descriptif_client","representant","email_client","password_client","type_client") VALUES (2,'Agbodjogbe Alexis','Cabinet Ophtalmologique','Agbodjogbe Alexis','agbo.alexis@yahoo.fr','$2y$10$N5RE.cEh7XFKBkFMY8oyxOtU6AnsUb3CyE07k0QFhwP4Uhlrgksr.',1); /*password clair = nous*/
INSERT INTO "Client"("id_client","nom_client","descriptif_client","representant","email_client","password_client","type_client") VALUES (3,'Trevor Phillips','Acteur','Trevor Phillips','trevor.phil@gta.fr','$2y$10$20aqqddi/KBFFwIlDAPnv.AWBJx3caHUZZG.Rzbx2NVwWDG2FGRou',1); /*password clair = vous*/
INSERT INTO "Client"("id_client","nom_client","descriptif_client","representant","email_client","password_client","type_client") VALUES (4,'Aircraft Major','Société de jeux vidéos','Sangoku Am','aircraft.m@vivant.fr','$2y$10$nwhmZ3tPdkqvpXqiBN2CGudF7.ilctnde7DG3AUMZSt1wW.A//aXi',0); /*password clair = leur*/


INSERT INTO "Type_client"("id_type","libelle") VALUES (0,'Entreprise');
INSERT INTO "Type_client"("id_type","libelle") VALUES (1,'Particulier');

INSERT INTO "Privileges"("id_privilege","libelle") VALUES (0,'All');
INSERT INTO "Privileges"("id_privilege","libelle") VALUES (1,'Commerciaux');
INSERT INTO "Privileges"("id_privilege","libelle") VALUES (2,'Autre');



INSERT INTO "Type_contrat"("id_type","descriptif_type") VALUES (0,'Business Plan');
INSERT INTO "Type_contrat"("id_type","descriptif_type") VALUES (1,'Consulting');

INSERT INTO "Administrateurs"("id_admin","nom_admin","prenom_admin","password_admin","numero_admin","email_admin","privilege_admin") VALUES (0,'Kouame','Nathan','$2y$10$TUfXPG.qp.J9dupmcogeeu7G0bdrNFuKEraX0.UOzhayxBe4P4ur.',0101010101,'nathan.kouame@ieseg.fr',0); /*ultimate*/
INSERT INTO "Administrateurs"("id_admin","nom_admin","prenom_admin","password_admin","numero_admin","email_admin","privilege_admin") VALUES (1,'Goly','Constant','$2y$10$n71eHSjv8fJzKrm3w.MYm.yigGOvpkm48kQ.1IvB6UrA08zOJCD7q',0101010102,'goly.constant@ieseg.fr',0); /*ultimate2*/
  INSERT INTO "Administrateurs"("id_admin","nom_admin","prenom_admin","password_admin","numero_admin","email_admin","privilege_admin") VALUES (2,'Boué','Joel','$2y$10$N5RE.cEh7XFKBkFMY8oyxOtU6AnsUb3CyE07k0QFhwP4Uhlrgksr.',0101010102,'boue.joel@ba.fr',1); /*ultimate4*/
INSERT INTO "Administrateurs"("id_admin","nom_admin","prenom_admin","password_admin","numero_admin","email_admin","privilege_admin") VALUES (3,'Ourigou','Zokou','$2y$10$20aqqddi/KBFFwIlDAPnv.AWBJx3caHUZZG.Rzbx2NVwWDG2FGRou',0101010102,'zokou.ourigou@ba.fr',1); /*ultimate3*/


INSERT INTO "Contrat"("id_contrat","num_client","type_contrat") VALUES (0,3,0); /*ultimate3*/
INSERT INTO "Contrat"("id_contrat","num_client","type_contrat") VALUES (1,2,0); /*ultimate3*/
INSERT INTO "Contrat"("id_contrat","num_client","type_contrat") VALUES (2,3,1); /*ultimate3*/
INSERT INTO "Contrat"("id_contrat","num_client","type_contrat") VALUES (3,2,1); /*ultimate3*/
