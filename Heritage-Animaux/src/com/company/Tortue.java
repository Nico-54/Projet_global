package com.company;

public class Tortue extends AnimEau {

    protected String carapace;

    public Tortue(String type, int nbpattes, double poids, String nom, String attribut) {
        super(type, nbpattes, poids, nom);
        this.carapace = attribut;
    }

@Override
    protected void Lieu() {
        super.Lieu();
        System.out.println("Je suis une tortue "+nom+" de : "+poids+" "+"kg, et j'ai une "+carapace);
    }
}
