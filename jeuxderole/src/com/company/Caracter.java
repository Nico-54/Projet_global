package com.company;

public class Caracter {

    public int attackPower;
    public int healthPoints;
    String nom;

    public Caracter(String nom, int attackPower, int healthPoints) {

        this.nom = nom;
        this.attackPower = attackPower;
        this.healthPoints = healthPoints;
    }


    String noms;

    public Caracter(String nom) {

        this.nom = nom;
    }

    // fonction combattre qui permet de lancer le combat
    // boucle tant que pas de gagnat
    // fait appel à la méthode attaque
    public void combattre (Caracter player1) {

        // remplacer la condition ou || par un et &&
        // en fait tu veux que la vie des 2 perso soit supérieure à 0 et donc dès qu'un des 2 arrive à 0
        // tu arrêtes le programme
        while (player1.healthPoints >= 0 && this.healthPoints >= 0) {
            player1.attack(this);
            if (this.healthPoints > 0 ) {
                this.attack(player1);
            }
        }
        if (this.healthPoints < 0) {
            System.out.println(player1.nom + " l'emporte");
        } else {
            System.out.println(this.nom + " l'emporte");
        }
    }


    public void attack(Caracter player1) {
        player1.healthPoints -= this.attackPower;
        System.out.println(this.nom + " " + "attaque");
        System.out.println("Vie restante de" + " " + player1.nom + " " +  player1.healthPoints);
    }
}