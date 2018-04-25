package com.example.vuduc.myapplication;

/**
 * Created by vuduc on 4/14/2018.
 */

public class RowItems {
    private String exercise;
    private int weight;

    public RowItems(String exercise, int weight) {
        this.exercise = exercise;
        this.weight = weight;
    }

    public String getExercise() {
        return exercise;
    }

    public void setExercise(String exercise) {
        this.exercise = exercise;
    }

    public int getWeight() {
        return weight;
    }

    public void setWeight(int weight) {
        this.weight = weight;
    }
}
