package com.company;

public abstract class AnimEau {

    protected int nbpattes;
    protected String type;
    protected double poids;
    protected String nom;


    public AnimEau(String type, int nbpattes, double poids, String nom) {

        this.type = type;
        this.nbpattes = nbpattes;
        this.poids = poids;
        this.nom = nom;
    }


    public double getPoids() {
        return poids;
    }

    public void setPoids(double poids) {
        this.poids = poids;
    }

    public int getNbpattes (int nbpattes) { return nbpattes; }

    public void setNbpattes(int nbpattes) {
        this.nbpattes = nbpattes;
    }

    protected void Lieu() {
        System.out.println("Je suis dans l'eau");
    }

}