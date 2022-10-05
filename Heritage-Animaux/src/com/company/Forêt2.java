package com.company;

public class Forêt2 extends AnimForêt {

    protected String régime;

    public Forêt2 (String type, int nbpattes, double poids, String régime, String nom) {
        super(type, nbpattes, poids, nom);
        this.régime = régime;
    }

    @Override
    protected void lieux() {
        super.lieux();
        System.out.println("Je suis un Gnou");
        System.out.println("Je suis un "+régime+" de :"+" "+ poids+" "+"kg");
    }
}
