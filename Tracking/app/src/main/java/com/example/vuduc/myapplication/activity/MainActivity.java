package com.example.vuduc.myapplication.activity;

import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.View;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.AdapterView;
import android.widget.ListView;
import android.widget.TextView;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonObjectRequest;
import com.android.volley.toolbox.StringRequest;
import com.example.vuduc.myapplication.R;
import com.example.vuduc.myapplication.helper.SQLiteHandler;
import com.example.vuduc.myapplication.helper.SessionManager;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

public class MainActivity extends AppCompatActivity {

    private SQLiteHandler db;
    private SessionManager session;
    ArrayList<RowItems> rowItems;
    //replace later with data from db
    String[] exercise_name = new String[5];
    int[] weight = new int[5];
    //
    ListView myList;
    TextView calories;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        Toolbar toolbar = findViewById(R.id.toolbar);
        toolbar.setTitle("Tracking");
        setSupportActionBar(toolbar);

        session = new SessionManager(getApplicationContext());

        if (!session.isLoggedIn()) {
            logoutUser();
        }

        //get current user for other activities intents here //
        db = new SQLiteHandler(getApplicationContext());
        HashMap<String, String> user = db.getUserDetails();
        final String name = user.get("username");
        //get calories from database // //replace default with current user//
        calories = findViewById(R.id.displayCalories);
        Uri.Builder urlBuilder = new Uri.Builder();
        urlBuilder.scheme("http");
        urlBuilder.authority("hedspi-strength.000webhostapp.com");
        urlBuilder.appendEncodedPath("app/calories.php");
        // replace with current user //
        urlBuilder.appendQueryParameter("username", name);
        String url = urlBuilder.build().toString();
        JsonObjectRequest jsonObjectRequest = new JsonObjectRequest
                (Request.Method.GET, url, null, new Response.Listener<JSONObject>() {
                    @Override
                    public void onResponse(JSONObject response) {
                        try {
                            String gender = response.getString("gender");
                            Double calorie_count;
                            int weight = response.getInt("weight");
                            int height = response.getInt("height");
                            int age = response.getInt("age");
                            if (gender.equals("male"))
                                calorie_count = 13.397 * weight + 4.799 * height - 5.677 * age + 88.362;
                            else
                                calorie_count = 9.247 * weight + 3.098 * height - 4.330 * age + 447.593;
                            String formato = String.format("%.1f", calorie_count);
                            calories.setText("Today's caloric needs: " + formato);
                        } catch (JSONException e) {
                            Log.e("ERROR", e.getMessage(), e);
                        }
                    }
                }, new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Log.e("ERROR", error.getMessage(), error);
                    }
                });
        MySingleton.getInstance(getApplicationContext()).addToRequestQueue(jsonObjectRequest);

        //get exercises and weights from database // //replace default later with current user//

        String URL = "http://hedspi-strength.000webhostapp.com/app/get_workout.php";

        StringRequest workoutRequest = new StringRequest(Request.Method.POST, URL, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                JSONObject json;
                try {
                    json = new JSONObject(response);
                    for(int i = 0; i < 5 ; i ++){
                        JSONObject data = json.getJSONObject("" + (i + 1));
                        String exercise_record;
                        int weight_record;
                        exercise_record = data.getString("exercise");
                        weight_record = data.getInt("weight");
                        exercise_name[i] = exercise_record;
                        weight[i] = weight_record;
                    }

                    rowItems = new ArrayList<RowItems>();
                    for (int j = 0; j < exercise_name.length; j++) {
                        RowItems item = new RowItems(exercise_name[j], weight[j]);
                        rowItems.add(item);
                    }

                    myList = findViewById(R.id.exerciseList);
                    myList.setOnItemClickListener(new AdapterView.OnItemClickListener() {
                        @Override
                        public void onItemClick(AdapterView<?> adapterView, View view, int i, long l) {
                            // graph activity
                            Intent intent;
                            Bundle bundle = new Bundle();
                            if(i == 0) {
                                bundle.putString("exercise", exercise_name[i]);
                            }
                            else if(i == 1) {
                                bundle.putString("exercise", exercise_name[i]);
                            }
                            else if(i == 2) {
                                bundle.putString("exercise", exercise_name[i]);
                            }
                            else if(i == 3) {
                                bundle.putString("exercise", exercise_name[i]);
                            }
                            else {
                                bundle.putString("exercise", exercise_name[i]);
                            }
                            bundle.putString("username", name);
                            intent = new Intent(MainActivity.this, GraphActivity.class);
                            intent.putExtras(bundle);
                            startActivity(intent);
                        }
                    });

                    CustomAdapter adapter = new CustomAdapter(getApplicationContext(), rowItems);
                    myList.setAdapter(adapter);

                    FloatingActionButton fab = findViewById(R.id.fab);
                    fab.setOnClickListener(new View.OnClickListener()

                    {
                        @Override
                        public void onClick(View view) {
                            Bundle bundle = new Bundle();
                            bundle.putStringArray("exercise_name_array", exercise_name);
                            bundle.putIntArray("weight_array", weight);
                            bundle.putString("username", name);
                            Intent intent = new Intent(MainActivity.this, TrackingActivity.class);
                            intent.putExtras(bundle);
                            startActivity(intent);
                        }
                    });
                } catch (JSONException e) {
                    e.printStackTrace();
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Log.e("VOLLEY", error.toString());
            }
        }) {
            @Override
            protected Map<String,String> getParams(){
                Map<String,String> params = new HashMap<String, String>();
                // replace with current user //
                params.put("username", name);
                return params;
            }

            @Override
            public Map<String, String> getHeaders() throws AuthFailureError {
                Map<String,String> params = new HashMap<String, String>();
                params.put("Content-Type","application/x-www-form-urlencoded");
                return params;
            }
        };

        MySingleton.getInstance(getApplicationContext()).addToRequestQueue(workoutRequest);
        //

    }
    private void logoutUser() {
        session.setLogin(false);

        db.deleteUsers();

        // Launching the login activity
        Intent intent = new Intent(MainActivity.this, LoginActivity.class);
        startActivity(intent);
        finish();
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
        if (id == R.id.action_logout) {
            logoutUser();
            return true;
        }

        if(id == R.id.action_web) {
            Intent intent = new Intent(Intent.ACTION_VIEW).setData(Uri.parse("https://hedspi-strength.000webhostapp.com"));
            startActivity(intent);
            return true;
        }

        return super.onOptionsItemSelected(item);
    }
}
