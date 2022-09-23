from wtforms import Form, StringField, validators, BooleanField, HiddenField, PasswordField
from wtforms.validators import DataRequired

class CreateEquideForm(Form):
    name  = StringField('Nom', validators=[validators.input_required(),validators.Length(min=1, max=50)])
    numero_sire  = StringField('Numéro Sire', validators=[validators.Length(max=9)])
    race = StringField('Race', validators=[validators.input_required(),validators.Length(max=50)])
    date_naissance  = StringField('Date de naissance', validators=[validators.Length(max=10)])
    lieu_detention  = StringField('Lieu de détention', validators=[validators.Length(max=30)])
    sexe  = StringField('Sexe', validators=[validators.input_required(),validators.Length(min=1, max=1)])
    numero_puce  = StringField('Numero de puce', validators=[validators.Length(max=15)])
    nom_pere  = StringField('Nom du père', validators=[validators.Length(max=50)])
    nom_mere  = StringField('Nom de la mère', validators=[validators.Length(max=50)])
    proprietaire  = StringField('Propriétaire', validators=[validators.Length(max=30)])
    veterinaire  = StringField('Vétérinaire', validators=[validators.input_required(),validators.Length(max=30)])
    distinctions  = StringField('Distinctions', validators=[validators.Length(max=250)])

class UpdateEquideForm(Form):
    id = HiddenField('Id',validators=[validators.input_required()])
    name  = StringField('Nom', validators=[validators.input_required(),validators.Length(min=1, max=50)])
    numero_sire  = StringField('Numéro Sire', validators=[validators.Length(max=9)])
    race = StringField('Race', validators=[validators.input_required(),validators.Length(max=50)])
    date_naissance  = StringField('Date de naissance', validators=[validators.Length(max=10)])
    lieu_detention  = StringField('Lieu de détention', validators=[validators.Length(max=30)])
    sexe  = StringField('Sexe', validators=[validators.input_required(),validators.Length(min=1, max=1)])
    numero_puce  = StringField('Numero de puce', validators=[validators.Length(max=15)])
    nom_pere  = StringField('Nom du père', validators=[validators.Length(max=50)])
    nom_mere  = StringField('Nom de la mère', validators=[validators.Length(max=50)])
    proprietaire  = StringField('Propriétaire', validators=[validators.Length(max=30)])
    veterinaire  = StringField('Vétérinaire', validators=[validators.input_required(),validators.Length(max=30)])
    distinctions  = StringField('Distinctions', validators=[validators.Length(max=250)])

    
class DeleteEquideForm(Form):
    id = HiddenField('Id',validators=[validators.input_required()])

class CreateTransportForm(Form):
    name_equide  = StringField('Noms des chevaux', validators=[validators.input_required(),validators.Length(min=1, max=50)])
    nombre_equide = StringField('Nombre de chevaux', validators=[validators.input_required(),validators.Length(max=2)])
    transporteur = StringField('Transporteur', validators=[validators.input_required(),validators.Length(max=50)])
    type_transport = StringField('Type de véhicule', validators=[validators.input_required(),validators.Length(max=50)])
    lieu_depart = StringField('Lieu de départ', validators=[validators.input_required(),validators.Length(max=50)])
    date_depart = StringField('Date et heure de départ', validators=[validators.input_required(),validators.Length(max=15)])
    lieu_arrivee = StringField("Lieu d'arrivée", validators=[validators.input_required(),validators.Length(max=50)])
    date_arrivee = StringField("Date et heure d'arrivée", validators=[validators.input_required(),validators.Length(max=15)])
    duree_trajet = StringField('Durée du voyage', validators=[validators.input_required(),validators.Length(max=10)])
    commentaire = StringField('Commentaire', validators=[validators.input_required(),validators.Length(max=250)])

class UpdateTransportForm(Form):
    id = HiddenField('Id',validators=[validators.input_required()])
    name_equide  = StringField('Noms des chevaux', validators=[validators.input_required(),validators.Length(min=1, max=50)])
    nombre_equide = StringField('Nombre de chevaux', validators=[validators.input_required(),validators.Length(max=2)])
    transporteur = StringField('Transporteur', validators=[validators.input_required(),validators.Length(max=50)])
    type_transport = StringField('Type de véhicule', validators=[validators.input_required(),validators.Length(max=50)])
    lieu_depart = StringField('Lieu de départ', validators=[validators.input_required(),validators.Length(max=50)])
    date_depart = StringField('Date et heure de départ', validators=[validators.input_required(),validators.Length(max=15)])
    lieu_arrivee = StringField("Lieu d'arrivée", validators=[validators.input_required(),validators.Length(max=50)])
    date_arrivee = StringField("Date et heure d'arrivée", validators=[validators.input_required(),validators.Length(max=15)])
    duree_trajet = StringField('Durée du voyage', validators=[validators.input_required(),validators.Length(max=10)])
    commentaire = StringField('Commentaire', validators=[validators.input_required(),validators.Length(max=250)])

class DeleteTransportForm(Form):
    id = HiddenField('Id',validators=[validators.input_required()])
