CREATE OR REPLACE FUNCTION recherche_correspondances(ville_depart VARCHAR(25), ville_arrivee VARCHAR(25),nb_personne INT, dist INT DEFAULT 0, heure INT DEFAULT 0, ville VARCHAR DEFAULT '', id_voyage VARCHAR DEFAULT '')
RETURNS TABLE (v_ville VARCHAR(25), v_id VARCHAR(25))
LANGUAGE plpgsql
AS $$
DECLARE
    v_voyage record;
     
BEGIN
    
    FOR v_voyage IN
         SELECT jabaianb.voyage.id, depart, arrivee, distance, nbplace,heureDepart
        FROM jabaianb.voyage
        INNER JOIN jabaianb.trajet ON jabaianb.voyage.trajet = jabaianb.trajet.id
        WHERE depart = ville_depart 
    LOOP

        IF (v_voyage.nbplace >= nb_personne AND v_voyage.distance+dist < 1440 AND v_voyage.arrivee != v_voyage.depart AND heure <= v_voyage.heureDepart) THEN
            
            IF ( v_voyage.arrivee = ville_arrivee) THEN
            v_ville := ville||'-'||v_voyage.depart||'-'||v_voyage.arrivee;
            v_id := id_voyage||'-'||v_voyage.id;
                RETURN NEXT ;
            ELSE
                
                 RETURN QUERY SELECT * FROM recherche_correspondances(v_voyage.arrivee , ville_arrivee,nb_personne,dist+v_voyage.distance,v_voyage.heureDepart+(v_voyage.distance/60), ville||'-'||v_voyage.depart, id_voyage||'-'||v_voyage.id);
            END IF;
        END IF;
    END LOOP;

    RETURN;
END;
$$;



CREATE OR REPLACE FUNCTION recherche_correspondances(
    ville_depart VARCHAR(25),
    ville_arrivee VARCHAR(25),
    nb_personne INT,
    dist INT DEFAULT 0,
    heure INT DEFAULT 0,
    ville VARCHAR DEFAULT '',
    id_voyage VARCHAR DEFAULT '',
    villes_visitees VARCHAR[] DEFAULT ARRAY[]::VARCHAR[] --tableau de villes visitees
)
RETURNS TABLE (v_ville VARCHAR(25), v_id VARCHAR(25))
LANGUAGE plpgsql
AS $$
DECLARE
    v_voyage record;
     
BEGIN
    
    FOR v_voyage IN
         SELECT jabaianb.voyage.id, depart, arrivee, distance, nbplace, heureDepart
        FROM jabaianb.voyage
        INNER JOIN jabaianb.trajet ON jabaianb.voyage.trajet = jabaianb.trajet.id
        WHERE depart = ville_depart 
    LOOP

        IF (v_voyage.nbplace >= nb_personne AND v_voyage.distance+dist < 1440 AND v_voyage.arrivee != v_voyage.depart AND heure <= v_voyage.heureDepart AND NOT (v_voyage.arrivee = ANY(villes_visitees))) THEN--je regarde tout mon tableau et m'assure que la ville n'a pas deja ete visitee
            
            IF (v_voyage.arrivee = ville_arrivee) THEN
                v_ville := ville||'-'||v_voyage.depart||'-'||v_voyage.arrivee;
                v_id := id_voyage||'-'||v_voyage.id;
                RETURN NEXT;
            ELSE
                villes_visitees := array_append(villes_visitees, v_voyage.depart);--j'ajoute la ville a mon tableau
                RETURN QUERY SELECT * FROM recherche_correspondances(v_voyage.arrivee, ville_arrivee, nb_personne, dist+v_voyage.distance, v_voyage.heureDepart+(v_voyage.distance/60), ville||'-'||v_voyage.depart, id_voyage||'-'||v_voyage.id, villes_visitees);--on rappelle aussi la function avec le tableu
            END IF;
        END IF;
    END LOOP;

    RETURN;
END;
$$;

SELECT * FROM recherche_correspondances('Paris', 'Nice', 2, 0, 0, '', '', ARRAY['']);



//trigger pour empecher l insertion d un utilisateur avec un identifiant deja existant
CREATE OR REPLACE FUNCTION verif_identifiant()    
RETURNS TRIGGER
LANGUAGE plpgsql
AS $$
DECLARE
    v_identifiant VARCHAR(25);
BEGIN
    SELECT login INTO v_identifiant FROM jabaianb.utilisateur WHERE identifiant = NEW.identifiant;
    IF (v_identifiant IS NOT NULL) THEN
        RAISE EXCEPTION 'identifiant déjà existant';
    END IF;
    RETURN NEW;
END;
$$;

CREATE TRIGGER verif_identifiant
BEFORE INSERT ON jabaianb.utilisateur
FOR EACH ROW
EXECUTE PROCEDURE verif_identifiant();

