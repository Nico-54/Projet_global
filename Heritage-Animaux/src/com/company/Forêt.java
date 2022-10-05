package com.company;

public class Forêt extends AnimForêt {

    protected String régime;

    public Forêt (String type, int nbpattes, double poids, String régime, String nom) {
        super(type, nbpattes, poids, nom);
        this.régime = régime;
    }

    @Override
    protected void lieux() {
        super.lieux();
        System.out.println("Je suis un Lion, le roi des animaux");
        System.out.println("Je suis un carnassier de :"+" "+ poids+" "+"kg");
    }
}
