import functools
from flask import Blueprint, g, render_template, request, session, redirect, url_for, flash, abort
#les views ont besoin des classes de modèles pour communiquer avec la base de données
from models import Equide, Transport
from forms import CreateEquideForm,UpdateEquideForm,DeleteEquideForm, CreateTransportForm, UpdateTransportForm, DeleteTransportForm
from todolist import db


equides = Blueprint('equides',__name__)

@equides.route('/')
def home():

    return render_template('equides/home.html', title="Homepage", equides=equides)

@equides.route("/equides/create",methods=['GET','POST'])
def create():
    
    #Création d'un équidé
    
    form = CreateEquideForm(request.form)

    if request.method=='POST' and form.validate():
        name = form.name.data
        numero_sire = form.numero_sire.data
        race = form.race.data
        date_naissance = form.date_naissance.data
        lieu_detention = form.lieu_detention.data
        sexe = form.sexe.data
        numero_puce = form.numero_puce.data
        nom_pere = form.nom_pere.data
        nom_mere = form.nom_mere.data
        proprietaire = form.proprietaire.data
        veterinaire = form.veterinaire.data
        distinctions = form.distinctions.data
        equide = Equide(name=name, race=race, numero_sire=numero_sire, date_naissance=date_naissance, lieu_detention=lieu_detention, sexe=sexe, numero_puce=numero_puce, nom_pere=nom_pere, nom_mere=nom_mere, proprietaire=proprietaire, veterinaire=veterinaire, distinctions=distinctions)
        db.session.add(equide)
        db.session.commit()#exécute la requête

        flash("Nouvel équidé créé")#affiche un message informatif
        return redirect(url_for('equides.read_all'))#redirige vers la page /equides
    
    return render_template('equides/create.html',title="Création d'un équidé",form=form)
    


@equides.route("/equides/<int:id>/update", methods=['GET','POST'])
def update(id):
    
    #Formulaire de mise à jour d'un équidé
    

    equide = Equide.query.filter_by(id=id).first()#récupère l'équidé dont l'id est égal à id

    # si l'équidé n'existe pas, retourne une erreur 404
    if equide is None:
        abort(404)

    form = UpdateEquideForm(request.form,obj=equide)

    if request.method=='POST' and form.validate():
        form.populate_obj(equide)

        equide.name = form.name.data
        equide.numero_sire = form.numero_sire.data
        equide.race = form.race.data
        equide.date_naissance = form.date_naissance.data
        equide.lieu_detention = form.lieu_detention.data
        equide.sexe = form.sexe.data
        equide.numero_puce = form.numero_puce.data
        equide.nom_pere = form.nom_pere.data
        equide.nom_mere = form.nom_mere.data
        equide.proprietaire = form.proprietaire.data
        equide.veterinaire = form.veterinaire.data
        equide.distinctions = form.distinctions.data

        db.session.commit()#exécute la requête

        flash(f'Equidé #{id} mis à jour')#affiche un message informatif
        return redirect(url_for('equides.read_one', id=id))#redirige vers la page /equides/<id>

    return render_template("equides/update.html", equide=equide, title=f"Mise à jour de l'équidé' #{equide.id}", form=form)


@equides.route("/equides/<int:id>/delete",methods=['GET','POST'])
def delete(id):
    
    #Formulaire de suppression d'un equide
    equide = Equide.query.filter_by(id=id).first()

    # si l'équidé n'existe pas, retourne une erreur 404
    if equide is None:
        abort(404)#retourne une erreur 404

    form = DeleteEquideForm(request.form,obj=equide)#créé un formulaire de type DeleteEquideForm

    if request.method=='POST' and form.validate():
        form.populate_obj(equide)
        db.session.delete(equide)
        db.session.commit()#exécute la requête
        flash(f'Equidé #{id} supprimé')#affiche un message informatif
        return redirect(url_for('equides.read_all'))#redirige vers la page /equides

    return render_template("equides/delete.html", equide=equide, form=form, title=f"Suppression de l'équidé #{equide.id}")

    
@equides.get('/equides/index')
def read_all():
    
    #Affiche la liste de toutes les équidés
    

    equides = Equide.query.all()#récupère toutes les équidés

    return render_template('equides/index.html', title="Tous les équidés", equides=equides)


@equides.get("/equides/<int:id>")
def read_one(id):

    #Affichage des données d'un équidé selon l'id renseigné dans l'URI
    
    equide = Equide.query.filter_by(id=id).first()#récupère l'équidé dont l'id est égal à id

    # si l'équidé n'existe pas, retourne une erreur 404
    if equide is None:
        abort(404)#retourne une erreur 404

    return render_template("equides/read_one.html", equide=equide, title=f"Equidé #{equide.id}")


@equides.errorhandler(404)
# Permet de réagir à toutes les erreurs de type 404
def not_found(error):
    
    #Affiche une page d'erreur 404 personnalisée
    
    return render_template('404.html'), 404










transports = Blueprint('transports',__name__)

@transports.route("/transports/create",methods=['GET','POST'])
def create():
    '''
    Création d'un transport
    '''
    form = CreateTransportForm(request.form)

    if request.method=='POST' and form.validate():
        name_equide = form.name_equide.data
        nombre_equide = form.nombre_equide.data
        transporteur = form.transporteur.data
        type_transport = form.type_transport.data
        lieu_depart = form.lieu_depart.data
        date_depart = form.date_depart.data
        lieu_arrivee = form.lieu_arrivee.data
        date_arrivee = form.date_arrivee.data
        duree_trajet = form.duree_trajet.data
        commentaire = form.commentaire.data
        transport = Transport(name_equide=name_equide, nombre_equide=nombre_equide, transporteur=transporteur, type_transport=type_transport, lieu_depart=lieu_depart, date_depart=date_depart, lieu_arrivee=lieu_arrivee, date_arrivee=date_arrivee, duree_trajet=duree_trajet, commentaire=commentaire)
        db.session.add(transport)
        db.session.commit()#exécute la requête

        flash("Nouveau transport créé")#affiche un message informatif
        return redirect(url_for('transports.read_all'))#redirige vers la page /equides
    
    return render_template('transports/create.html',title="Création d'un transport",form=form)
    


@transports.route("/transports/<int:id>/update", methods=['GET','POST'])
def update(id):
    '''
    Formulaire de mise à jour d'un transport
    '''

    transport = Transport.query.filter_by(id=id).first()#récupère l'équidé dont l'id est égal à id

    # si l'équidé n'existe pas, retourne une erreur 404
    if transport is None:
        abort(404)

    form = UpdateTransportForm(request.form,obj=transport)

    if request.method=='POST' and form.validate():
        form.populate_obj(transport)

        transport.name_equide = form.name_equide.data
        transport.nombre_equide = form.nombre_equide.data
        transport.transporteur = form.transporteur.data
        transport.type_transport = form.type_transport.data 
        transport.lieu_depart = form.lieu_depart.data
        transport.date_depart = form.date_depart.data
        transport.lieu_arrivee = form.lieu_arrivee.data
        transport.date_arrivee = form.date_arrivee.data
        transport.duree_trajet = form.duree_trajet.data
        transport.commentaire = form.commentaire.data

        db.session.commit()#exécute la requête

        flash(f'Transport #{id} mis à jour')#affiche un message informatif
        return redirect(url_for('transports.read_one', id=id))#redirige vers la page /transports/<id>

    return render_template("transports/update.html", transport=transport, title=f"Mise à jour de l'équidé' #{transport.id}", form=form)


@transports.route("/transports/<int:id>/delete",methods=['GET','POST'])
def delete(id):
    '''
    Formulaire de suppression d'un transport
    '''
    transport = Transport.query.filter_by(id=id).first()

    # si l'équidé n'existe pas, retourne une erreur 404
    if transport is None:
        abort(404)#retourne une erreur 404

    form = DeleteTransportForm(request.form,obj=transport)#créé un formulaire de type DeleteTransportForm

    if request.method=='POST' and form.validate():
        form.populate_obj(transport)
        db.session.delete(transport)
        db.session.commit()#exécute la requête
        flash(f'Transport #{id} supprimé')#affiche un message informatif
        return redirect(url_for('transports.read_all'))#redirige vers la page /equides

    return render_template("transports/delete.html", transport=transport, form=form, title=f"Suppression du transport #{transport.id}")

    
@transports.get('/transports/index')
def read_all():
    '''
    Affiche la liste de toutes les transports
    '''

    transports = Transport.query.all()#récupère toutes les transports

    return render_template('transports/index.html', title="Tous les transports", transports=transports)



@transports.get("/transports/<int:id>")
def read_one(id):
    '''
    Affichage des données d'un transport selon l'id renseigné dans l'URI
    '''
    transport = Transport.query.filter_by(id=id).first()#récupère le transport dont l'id est égal à id

    # si l'équidé n'existe pas, retourne une erreur 404
    if transport is None:
        abort(404)#retourne une erreur 404

    return render_template("transports/read_one.html", transport=transport, title=f"Transport #{transport.id}")