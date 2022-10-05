package com.company;

public class NP extends Animaux {

    protected String régime;

    public NP(String type, int nbpattes, double poids, String régime, String nom) {
        super(type, nbpattes, poids, nom);
        this.régime = régime ;
    }

    @Override
    protected void localisation() {
        super.localisation();
        System.out.println("Je suis un serpent");
    }
}