package com.company;

public class Main {

    public static void main(String[] args) {

            System.out.println("+-------------------------------------------------------------+");
            System.out.println("Animaux de la forêt");
            System.out.println("+-------------------------------------------------------------+");


            AF test = new AF("sauvage", 4, 31, "carnassier", "Panthère" );
            test.localisation();

            System.out.println("+-------------------------------------------------------------+");

            NP test2 = new NP("sauvage", 0, 250, "carnassier", "Serpent");
            test2.localisation();

            System.out.println("+-------------------------------------------------------------+");
            System.out.println("+-------------------------------------------------------------+");
            System.out.println("Animaux de la savane");
            System.out.println("+-------------------------------------------------------------+");

            Forêt lion = new Forêt("sauvage", 4, 190, "carnassier", "Lion");
            lion.lieux();
            System.out.println("+-------------------------------------------------------------+");
            Forêt2 gnou = new Forêt2("sauvage", 4, 130, "herbivore", "gnou");
            gnou.lieux();

            System.out.println("+-------------------------------------------------------------+");
            System.out.println("+-------------------------------------------------------------+");
            System.out.println("Animaux marins");
            System.out.println("+-------------------------------------------------------------+");

            Tortue tortue = new Tortue("Sauvage",4, 250, "Luth", "carapace");
            tortue.Lieu();

    }
}
