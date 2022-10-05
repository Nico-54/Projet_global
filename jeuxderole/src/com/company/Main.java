package com.company;

public class Main {

    public static void main(String[] args) {


        Caracter warrior = new Caracter("Garrosh", 20, 300);
        warrior.nom = "Garrosh le combattant orc";
        System.out.println("Nom du personnage :" + " " + warrior.nom);
        System.out.println("L'attaque de Garrosh :" + " " + warrior.attackPower);
        System.out.println("La vie de Garrosh :" + " " + warrior.healthPoints);

        System.out.println("+-----------------------------------------------------------+");
        System.out.println("+-----------------------------------------------------------+");

        Caracter wizard = new Caracter("Jaina");
        wizard.nom = "Jaina la magicienne humaine";
        wizard.attackPower = 15;
        wizard.healthPoints = 350;
        System.out.println("Nom du personnage :" + " " + wizard.noms);
        System.out.println("L'attaque de Jaina :" + " " + wizard.attackPower);
        System.out.println("La vie de Jaina :" + " " + wizard.healthPoints);

        System.out.println("+-----------------------------------------------------------+");
        System.out.println("+-----------------------------------------------------------+");

        warrior.combattre(wizard);
        System.out.println("+-----------------------------------------------------------+");
    }
}