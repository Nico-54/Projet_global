from ast import Str
from todolist import db
from flask_sqlalchemy import SQLAlchemy

class Equide(db.Model):

    id = db.Column(db.Integer, primary_key=True)
    numero_sire = db.Column(db.String(9), nullable=True)
    name = db.Column(db.String(50), nullable=False)
    race = db.Column(db.String(80), nullable=False)
    date_naissance = db.Column(db.String(20), nullable=False)
    lieu_detention = db.Column(db.String(30), nullable=True)
    sexe = db.Column(db.String(1), nullable=False)
    numero_puce = db.Column(db.String(15), nullable=True)
    nom_pere = db.Column(db.String(50), nullable=True)
    nom_mere = db.Column(db.String(50), nullable=True)
    proprietaire = db.Column(db.String(30), nullable=True)
    veterinaire = db.Column(db.String(30), nullable=True)
    distinctions = db.Column(db.String(250), nullable=True)

    def __str__(self) -> str:
        
        #affiche l'objet Equide sous forme de chaîne de caractères
        
        return f'Equide name is "{self.name}", id is {self.id} and {self.race} and {self.date_naissance} and {self.numero_sire} and {self.lieu_detention} and {self.sexe} and {self.numero_puce} and {self.nom_pere} and {self.nom_mere} and {self.proprietaire} and {self.veterinaire} and {self.distinctions}'


    def repr(self) -> Str:
        
        #affiche l'objet Equide sous forme de chaîne de caractères
        
        return f'Equide(name={self.name}, id={self.id}, race={self.race}, date_naissance={self.date_naissance}, numero_sire={self.numero_sire}, lieu_detention={self.lieu_detention}, sexe={self.sexe}, numero_puce={self.numero_puce}, nom_pere={self.nom_pere}, nom_mere={self.nom_mere}, proprietaire={self.proprietaire}, veterinaire={self.veterinaire}, distinctions={self.distinctions})'

    def serialize(self) -> dict:
        
        #serialise l'objet Equide sous forme de dict
        
        return {"id": self.id,
                "numero_sire": self.numero_sire,
                "name": self.name,
                "race": self.race,
                "date_naissance": self.date_naissance,
                "lieu_detention": self.lieu_detention,
                "sexe" : self.sexe,
                "numero_puce" : self.numero_puce,
                "nom_pere" : self.nom_pere,
                "nom_mere" : self.nom_mere,
                "proprietaire" : self.proprietaire,
                "distinctions" : self.distinctions,
                }

class Transport(db.Model):

    id = db.Column(db.Integer, primary_key=True)
    name_equide = db.Column(db.String(250), nullable=False)
    nombre_equide = db.Column(db.String(2), nullable=False)
    transporteur = db.Column(db.String(50), nullable=True)
    type_transport = db.Column(db.String(50), nullable=True)
    lieu_depart = db.Column(db.String(50), nullable=True)
    date_depart = db.Column(db.String(15), nullable=True)
    lieu_arrivee = db.Column(db.String(50), nullable=True)
    date_arrivee = db.Column(db.String(15), nullable=True)
    duree_trajet = db.Column(db.String(10), nullable = False)
    commentaire = db.Column(db.String(250), nullable = True)

    def str(self) -> str:
        return f'Transport name is "{self.name_equide}" {self.id}{self.nombre_equide}{self.transporteur}{self.type_transport}{self.date_depart}{self.lieu_depart}{self.date_arrivee}{self.lieu_arrivee}{self.duree_trajet}{self.commentaire}'

    def repr(self) -> str:
        return f'Transport(name={self.name_equide}{self.id}{self.nombre_equide}{self.transporteur}{self.type_transport}{self.date_depart}{self.lieu_depart}{self.date_arrivee}{self.lieu_arrivee}{self.duree_trajet}{self.commentaire})'

    def serialize(self) -> dict:
        return {"id": self.id,
                "name_equide": self.name_equide,
                "nombre_equide":self.nombre_equide,
                "transporteur":self.transporteur,
                "type_transport":self.type_transport,
                "lieu_depart":self.lieu_depart,
                "date_depart":self.date_depart,
                "lieu_arrivee":self.lieu_arrivee,
                "date_arrivee":self.date_arrivee,
                "duree_trajet":self.duree_trajet,
                "commentaire":self.commentaire
        }