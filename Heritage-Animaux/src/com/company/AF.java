package com.company;

public class AF extends Animaux {


        protected String régime;


    public AF(String type, int nbpattes, double poids, String régime, String nom) {
            super(type, nbpattes, poids, nom);
            this.régime = régime ;
    }

    @Override
    protected void localisation() {
            super.localisation();
            System.out.println(nom);
            System.out.println("Je pèse : "+poids+" "+"kg");
            System.out.println("Je suis un : "+régime+" "+"et je me déplace sur : "+nbpattes+" "+"pattes");
    }
}