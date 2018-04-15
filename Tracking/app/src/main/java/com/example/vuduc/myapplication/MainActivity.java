package com.example.vuduc.myapplication;

import android.content.Intent;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.View;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.AdapterView;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

import java.util.ArrayList;

public class MainActivity extends AppCompatActivity {

    ArrayList<RowItems> rowItems;
    //replace later with data from db
    String[] exercise_name = {"Squat", "Overhead Press", "Bent Over Row", "Bench Press", "Deadlift"};
    int[] weight = {100, 120, 140, 160, 180};
    //
    ListView myList;
    TextView calories;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        Toolbar toolbar = findViewById(R.id.toolbar);
        toolbar.setTitle("Theo dõi");
        setSupportActionBar(toolbar);

        calories = findViewById(R.id.displayCalories);
        //replace
        calories.setText("2000");

        //
        rowItems = new ArrayList<RowItems>();
        for(int i = 0; i < exercise_name.length; i++)
        {
            RowItems item = new RowItems(exercise_name[i], weight[i]);
            rowItems.add(item);
        }
        //

        myList = findViewById(R.id.exerciseList);
        myList.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> adapterView, View view, int i, long l) {
                // graph activity
                //
                Toast toast = Toast.makeText(getApplicationContext(), "TODO: graph", Toast.LENGTH_SHORT);
                toast.show();
            }
        });
        CustomAdapter adapter = new CustomAdapter(this, rowItems);
        myList.setAdapter(adapter);



        FloatingActionButton fab = findViewById(R.id.fab);
        fab.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Toast toast = Toast.makeText(getApplicationContext(), "Thành tích ngày hôm nay", Toast.LENGTH_SHORT);
                toast.show();
                Bundle bundle = new Bundle();
                bundle.putStringArray("exercise_name_array", exercise_name);
                bundle.putIntArray("weight_array", weight);
                Intent intent = new Intent(MainActivity.this, TrackingActivity.class);
                intent.putExtras(bundle);
                startActivity(intent);
            }
        });
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_main, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }
}
